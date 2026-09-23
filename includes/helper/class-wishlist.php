<?php

namespace GrozomartToolkit\Helper;

defined('ABSPATH') || exit;

/**
 * [grozomart_wishlist] - wishlist table in the theme's design.
 *
 * Storzen already owns the wishlist: it stores the list (user meta for
 * logged-in customers, cookie or session for guests), renders the heart
 * button on product cards, and exposes AJAX endpoints for add/remove/clear.
 * Its own [storzen_wishlist] shortcode prints a card grid that does not match
 * this theme's table design, and that markup is not filterable.
 *
 * So this shortcode reuses Storzen's data and AJAX endpoints and only replaces
 * the rendering. Nothing here duplicates the storage layer - removing an item
 * still posts to `storzen_wishlist_remove`, so both views stay in sync.
 *
 * With Storzen inactive it degrades to a notice instead of fataling.
 */
class Grozomart_Wishlist
{
	const SHORTCODE  = 'grozomart_wishlist';
	const AJAX_TABLE = 'grozomart_wishlist_table';

	protected static $instance = null;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		add_shortcode(self::SHORTCODE, [$this, 'render']);

		add_action('wp_enqueue_scripts', [$this, 'enqueue']);

		// Re-render just our table after Storzen's AJAX changes the list.
		add_action('wp_ajax_' . self::AJAX_TABLE, [$this, 'ajax_table']);
		add_action('wp_ajax_nopriv_' . self::AJAX_TABLE, [$this, 'ajax_table']);
	}

	/**
	 * Storzen's wishlist module, or null when unavailable.
	 */
	protected function module()
	{
		if (! class_exists('\Storzen_Module_Wishlist') || ! function_exists('WC')) {
			return null;
		}

		/**
		 * Storzen keeps its own instance private. `get_list()` only reads
		 * storage and fires no side effects, so a throwaway instance is a safe
		 * way to read the list without duplicating the storage rules.
		 */
		static $module = null;

		if (null === $module) {
			$module = new \Storzen_Module_Wishlist();
		}

		return $module;
	}

	/**
	 * Product IDs currently on the wishlist.
	 */
	public function get_ids()
	{
		$module = $this->module();

		if (! $module || ! method_exists($module, 'get_list')) {
			return [];
		}

		return array_map('absint', (array) $module->get_list());
	}

	/**
	 * Visible products for the saved IDs.
	 */
	protected function get_products()
	{
		$products = [];

		foreach ($this->get_ids() as $id) {
			$product = wc_get_product($id);

			if ($product instanceof \WC_Product && $product->is_visible()) {
				$products[] = $product;
			}
		}

		return $products;
	}

	/**
	 * The shortcode.
	 */
	public function render($atts = [])
	{
		if (! $this->module()) {
			return '<div class="wishlist-empty">' . esc_html__('The wishlist requires WooCommerce and the Storzen plugin.', 'grozomart-toolkit') . '</div>';
		}

		$atts = shortcode_atts(
			[
				'cart_text' => __('View Cart', 'grozomart-toolkit'),
			],
			$atts,
			self::SHORTCODE
		);

		ob_start();
		?>
		<!-- Wshlist Section Start -->
		<div class="wshlist-section section-padding fix pt-0">
			<div class="container">
				<?php
				// Escaped inside render_items().
				echo $this->render_items($atts); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>
		</div>
		<!-- Wshlist Section End -->
	<?php
		return ob_get_clean();
	}

	/**
	 * The table itself, separate so AJAX can re-render only this part.
	 */
	public function render_items($atts = [])
	{
		$cart_text = ! empty($atts['cart_text']) ? $atts['cart_text'] : __('View Cart', 'grozomart-toolkit');
		$products  = $this->get_products();

		ob_start();

		if (empty($products)) :
			$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : '';
	?>
			<div class="wishlist-items" data-grozomart-wishlist>
				<div class="wishlist-empty">
					<p><?php esc_html_e('Your wishlist is empty. Browse the shop and tap the heart icon to save products.', 'grozomart-toolkit'); ?></p>
					<?php if ($shop_url) : ?>
						<a href="<?php echo esc_url($shop_url); ?>" class="theme-btn"><?php esc_html_e('Return to Shop', 'grozomart-toolkit'); ?></a>
					<?php endif; ?>
				</div>
			</div>
		<?php
		else :
		?>
			<div class="wishlist-items" data-grozomart-wishlist>
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th class="product-col"><?php esc_html_e('Product name', 'grozomart-toolkit'); ?></th>
								<th class="stock-col"><?php esc_html_e('Stock', 'grozomart-toolkit'); ?></th>
								<th class="action-col"><?php esc_html_e('Action', 'grozomart-toolkit'); ?></th>
								<th class="remove-col"><?php esc_html_e('Remove', 'grozomart-toolkit'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($products as $product) :
								$product_id = $product->get_id();
								$permalink  = get_permalink($product_id);
								$in_stock   = $product->is_in_stock();

								$term    = null;
								$cat_ids = wc_get_product_term_ids($product_id, 'product_cat');
								if (! empty($cat_ids)) {
									$maybe_term = get_term($cat_ids[0], 'product_cat');
									if ($maybe_term && ! is_wp_error($maybe_term)) {
										$term = $maybe_term;
									}
								}

								/**
								 * Only simple, purchasable, in-stock products get
								 * WooCommerce's AJAX classes. Variable and grouped
								 * products need a choice made first, so they link
								 * through to the product page instead.
								 */
								$ajax_ready = $in_stock && $product->is_purchasable() && $product->is_type('simple');
							?>
								<tr data-product-id="<?php echo esc_attr($product_id); ?>">
									<td class="product-col">
										<div class="product-info">
											<div class="img-box">
												<a href="<?php echo esc_url($permalink); ?>">
													<?php
													if ($product->get_image_id()) {
														echo wp_get_attachment_image(
															$product->get_image_id(),
															'woocommerce_thumbnail',
															false,
															['alt' => $product->get_name(), 'loading' => 'lazy']
														);
													} else {
														echo wp_kses_post(wc_placeholder_img('woocommerce_thumbnail'));
													}
													?>
												</a>
											</div>
											<div class="details">
												<?php if ($term) : ?>
													<span class="category"><?php echo esc_html($term->name); ?></span>
												<?php endif; ?>
												<h2><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($product->get_name()); ?></a></h2>
												<p class="price"><?php echo wp_kses_post($product->get_price_html()); ?></p>
											</div>
										</div>
									</td>
									<td class="stock-col">
										<?php if ($in_stock) : ?>
											<span class="stock-status"><?php esc_html_e('In Stock', 'grozomart-toolkit'); ?></span>
										<?php else : ?>
											<span class="stock-status out-of-stock"><?php esc_html_e('Out of Stock', 'grozomart-toolkit'); ?></span>
										<?php endif; ?>
									</td>
									<td class="action-col">
										<a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
											class="theme-btn<?php echo $ajax_ready ? ' add_to_cart_button ajax_add_to_cart' : ''; ?>"
											data-product_id="<?php echo esc_attr($product_id); ?>"
											data-quantity="1"
											<?php echo $in_stock ? '' : ' aria-disabled="true"'; ?>>
											<?php echo esc_html($product->add_to_cart_text()); ?>
										</a>
									</td>
									<td class="remove-col">
										<button type="button"
											class="wishlist-remove"
											data-sz-wishlist-remove="<?php echo esc_attr($product_id); ?>"
											aria-label="<?php esc_attr_e('Remove from wishlist', 'grozomart-toolkit'); ?>">
											<i class="fa-regular fa-trash-can remove-icon"></i>
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="wishlist-footer">
					<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="theme-btn"><?php echo esc_html($cart_text); ?></a>
				</div>
			</div>
<?php
		endif;

		return ob_get_clean();
	}

	/**
	 * Returns the freshly rendered table. Read-only, so no nonce: it exposes
	 * nothing the visitor cannot already see on the wishlist page itself.
	 */
	public function ajax_table()
	{
		wp_send_json_success(
			[
				'html'  => $this->render_items(),
				'count' => count($this->get_ids()),
			]
		);
	}

	/**
	 * Storzen's script replaces `.sz-wishlist-wrap` after a change, which this
	 * markup does not use. This script refreshes our table instead.
	 */
	public function enqueue()
	{
		if (is_admin()) {
			return;
		}

		wp_enqueue_script(
			'grozomart-wishlist',
			GROZOMART_TOOLKIT_ASSETS . '/js/wishlist.js',
			['jquery'],
			GROZOMART_TOOLKIT_VERSION,
			true
		);

		wp_localize_script(
			'grozomart-wishlist',
			'grozomartWishlist',
			[
				'ajaxUrl' => admin_url('admin-ajax.php'),
				'action'  => self::AJAX_TABLE,
			]
		);
	}
}

Grozomart_Wishlist::instance();
