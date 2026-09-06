<?php

namespace GrozomartToolkit\Helper;

defined('ABSPATH') || exit;

/**
 * AJAX filtering for the Shop widget's Layout Two.
 *
 * Owns the product query and the card/list renderers so the widget template
 * (shop-two.php) and the AJAX endpoint produce identical markup from one
 * implementation — the endpoint re-runs the same query with the filter
 * values posted from the sidebar and returns only the results column
 * (shop-two-results.php), which the JS swaps in place of a page reload.
 */
class Grozomart_Shop_Filter
{
	const ACTION = 'grozomart_shop_filter';
	const NONCE  = 'grozomart_shop_filter';

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
		add_action('wp_ajax_' . self::ACTION, [$this, 'handle']);
		add_action('wp_ajax_nopriv_' . self::ACTION, [$this, 'handle']);
	}

	/**
	 * Widget settings the results markup depends on. Only these are accepted
	 * from the request — everything else in the widget's settings is
	 * irrelevant here, and taking the whole settings array from the client
	 * would let it dictate arbitrary query arguments.
	 *
	 * @return array setting key => sanitizer
	 */
	protected function setting_schema()
	{
		return [
			'layout_two_limit'              => 'absint',
			'layout_two_default_orderby'    => 'sanitize_text_field',
			'layout_two_default_view'       => 'sanitize_key',
			'layout_two_show_result_count'  => 'sanitize_key',
			'layout_two_show_view_tabs'     => 'sanitize_key',
			'layout_two_show_ordering'      => 'sanitize_key',
			'layout_two_show_pagination'    => 'sanitize_key',
		];
	}

	/**
	 * The widget's own "Filter By Category" setting is a query constraint,
	 * so it is not taken from the request either — it is read back from the
	 * saved Elementor document using the posted post/element ids.
	 *
	 * @param int    $post_id    Post holding the Elementor document.
	 * @param string $element_id Widget element id within it.
	 * @return array Category slugs, empty when unset or unreadable.
	 */
	protected function widget_categories($post_id, $element_id)
	{
		if (!$post_id || !$element_id || !class_exists('\Elementor\Plugin')) {
			return [];
		}

		$document = \Elementor\Plugin::$instance->documents->get($post_id);
		if (!$document) {
			return [];
		}

		$element = \Elementor\Utils::find_element_recursive($document->get_elements_data(), $element_id);
		if (empty($element['settings']['layout_two_categories'])) {
			return [];
		}

		return array_filter(array_map('sanitize_title', (array) $element['settings']['layout_two_categories']));
	}

	/**
	 * Builds the query and every variable shop-two-results.php expects, then
	 * returns the rendered fragment.
	 *
	 * @param array $settings           Widget settings (already sanitized).
	 * @param array $request            Filter values (raw; sanitized here).
	 * @param array $widget_categories  Category slugs from the widget setting.
	 * @param string $uid               Unique id for tab anchors.
	 * @return string
	 */
	public function render($settings, $request, $widget_categories, $uid)
	{
		$renderers = self::renderers();

		$shop_two_render_overlay_icons = $renderers['overlay_icons'];
		$shop_two_render_price         = $renderers['price'];
		$shop_two_render_card          = $renderers['card'];
		$shop_two_render_list_item     = $renderers['list_item'];

		$bounds = self::price_bounds();

		$selected_cats  = isset($request['product_cat']) ? array_filter(array_map('sanitize_title', (array) $request['product_cat'])) : [];
		$selected_stock = isset($request['stock_status']) ? array_filter(array_map('sanitize_key', (array) $request['stock_status'])) : [];
		$on_sale_only   = !empty($request['on_sale']) && '1' === (string) $request['on_sale'];
		$selected_min   = isset($request['min_price']) ? max($bounds['floor'], (int) $request['min_price']) : $bounds['floor'];
		$selected_max   = isset($request['max_price']) ? min($bounds['ceil'], (int) $request['max_price']) : $bounds['ceil'];
		$paged          = isset($request['product_page']) ? max(1, absint($request['product_page'])) : 1;
		$orderby_choice = isset($request['orderby']) ? sanitize_text_field($request['orderby']) : $settings['layout_two_default_orderby'];

		$query = self::query([
			'per_page'          => (int) $settings['layout_two_limit'],
			'paged'             => $paged,
			'orderby_choice'    => $orderby_choice,
			'selected_cats'     => $selected_cats,
			'widget_categories' => $widget_categories,
			'selected_stock'    => $selected_stock,
			'on_sale_only'      => $on_sale_only,
			'selected_min'      => $selected_min,
			'selected_max'      => $selected_max,
			'bounds'            => $bounds,
		]);

		$shop_two_query    = $query;
		$shop_two_products = self::collect_products($query);

		$shop_two_paged   = $paged;
		$shop_two_total   = (int) $query->found_posts;
		$per_page         = (int) $settings['layout_two_limit'];
		$shop_two_first   = $shop_two_total ? (($paged - 1) * $per_page) + 1 : 0;
		$shop_two_last    = min($shop_two_total, $paged * $per_page);
		$shop_two_uid     = $uid;

		$shop_two_views           = self::views();
		$shop_two_active_view     = self::active_view($request, $settings);
		$shop_two_sort_labels     = self::sort_labels();
		$shop_two_orderby_choice  = $orderby_choice;

		/**
		 * On the AJAX path there is no $_GET to mirror — the filter state
		 * lives in the posted request instead, so rebuild the sort form's
		 * hidden inputs from that.
		 */
		$shop_two_persist_query_args = function () use ($request) {
			foreach ($request as $key => $val) {
				if (in_array($key, ['orderby', 'product_page', 'paged'], true)) {
					continue;
				}
				$is_list = is_array($val);
				foreach ((array) $val as $single) {
					echo '<input type="hidden" name="' . esc_attr($key) . ($is_list ? '[]' : '') . '" value="' . esc_attr($single) . '">';
				}
			}
		};

		ob_start();
		include grozomart_get_elementor_template('shop-two-results.php');

		return ob_get_clean();
	}

	public function handle()
	{
		/**
		 * Read-only, public endpoint: it returns the same product listing
		 * the page would render anyway, so a missing nonce is not a reason
		 * to refuse — under page caching a logged-out visitor can easily be
		 * served a stale one, and hard-failing there would break filtering
		 * for exactly the visitors it matters most for. A nonce that IS
		 * present still has to be valid, so the CSRF signal isn't discarded.
		 */
		if (!empty($_POST['nonce'])) {
			check_ajax_referer(self::NONCE, 'nonce');
		}

		if (!class_exists('WooCommerce')) {
			wp_send_json_error(['message' => esc_html__('WooCommerce is not active.', 'grozomart-toolkit')]);
		}

		$posted   = isset($_POST['settings']) ? (array) wp_unslash($_POST['settings']) : [];
		$settings = [];
		foreach ($this->setting_schema() as $key => $sanitizer) {
			$settings[$key] = isset($posted[$key]) ? call_user_func($sanitizer, $posted[$key]) : '';
		}
		if ($settings['layout_two_limit'] < 1) {
			$settings['layout_two_limit'] = 12;
		}

		$request    = isset($_POST['filters']) ? (array) wp_unslash($_POST['filters']) : [];
		$post_id    = isset($_POST['post_id']) ? absint($_POST['post_id']) : 0;
		$element_id = isset($_POST['element_id']) ? sanitize_key($_POST['element_id']) : '';
		$uid        = $element_id ? $element_id : 'shop-two';

		/**
		 * paginate_links() builds its hrefs from the current request URI,
		 * which during admin-ajax is /wp-admin/admin-ajax.php. Point it at
		 * the page the widget actually lives on so the links stay usable if
		 * JS is unavailable on a later interaction.
		 */
		$referer = wp_get_referer();
		if ($referer) {
			$_SERVER['REQUEST_URI'] = wp_make_link_relative($referer);
		}

		wp_send_json_success([
			'html' => $this->render($settings, $request, $this->widget_categories($post_id, $element_id), $uid),
		]);
	}

	/**
	 * Lowest and highest published product price, used for the range
	 * slider's bounds and to tell "shopper narrowed the range" apart from
	 * "slider is still at its extremes" (in which case no price constraint
	 * is added at all).
	 *
	 * @return array{floor:int,ceil:int}
	 */
	public static function price_bounds()
	{
		global $wpdb;

		$range = $wpdb->get_row("SELECT MIN(CAST(meta_value AS UNSIGNED)) AS min_price, MAX(CAST(meta_value AS UNSIGNED)) AS max_price FROM {$wpdb->postmeta} WHERE meta_key = '_price' AND meta_value != ''");

		return [
			'floor' => $range && null !== $range->min_price ? (int) floor((float) $range->min_price) : 0,
			'ceil'  => $range && null !== $range->max_price ? (int) ceil((float) $range->max_price) : 500,
		];
	}

	public static function views()
	{
		return [
			'grid' => 'fa-solid fa-grid',
			'list' => 'fa-solid fa-list',
		];
	}

	public static function sort_labels()
	{
		return [
			'menu_order' => esc_html__('Sort by : Default', 'grozomart-toolkit'),
			'popularity' => esc_html__('Sort by popularity', 'grozomart-toolkit'),
			'date'       => esc_html__('Sort by latest', 'grozomart-toolkit'),
		];
	}

	/**
	 * Which tab pane opens. The shopper's own choice (posted back by the JS
	 * so a filter change doesn't bounce them back to grid) wins over the
	 * widget's configured default.
	 */
	public static function active_view($request, $settings)
	{
		$requested = isset($request['view']) ? sanitize_key($request['view']) : '';
		if (isset(self::views()[$requested])) {
			return $requested;
		}

		return ('list' === $settings['layout_two_default_view']) ? 'list' : 'grid';
	}

	/**
	 * @param array $args Normalized filter state.
	 * @return \WP_Query
	 */
	public static function query($args)
	{
		$order_map = [
			'menu_order' => ['orderby' => 'menu_order title', 'order' => 'ASC'],
			'popularity' => ['orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'total_sales'],
			'date'       => ['orderby' => 'date', 'order' => 'DESC'],
		];
		$sort = isset($order_map[$args['orderby_choice']]) ? $order_map[$args['orderby_choice']] : $order_map['menu_order'];

		$query_args = [
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => $args['per_page'],
			'paged'          => $args['paged'],
			'orderby'        => $sort['orderby'],
			'order'          => $sort['order'],
		];
		if (!empty($sort['meta_key'])) {
			$query_args['meta_key'] = $sort['meta_key'];
		}

		$query_args['tax_query'] = [
			[
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => ['exclude-from-catalog'],
				'operator' => 'NOT IN',
			],
		];

		/**
		 * The sidebar's own category checkboxes (what the shopper picked)
		 * always take priority when present; the widget's "Filter By
		 * Category" setting only narrows the pool when the shopper hasn't
		 * picked anything yet.
		 */
		if (!empty($args['selected_cats'])) {
			$query_args['tax_query'][] = [
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => $args['selected_cats'],
			];
		} elseif (!empty($args['widget_categories'])) {
			$query_args['tax_query'][] = [
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => $args['widget_categories'],
			];
		}

		if (!empty($args['selected_stock'])) {
			$query_args['meta_query'][] = [
				'key'     => '_stock_status',
				'value'   => array_values($args['selected_stock']),
				'compare' => 'IN',
			];
		}

		if (!empty($args['on_sale_only'])) {
			$on_sale_ids = wc_get_product_ids_on_sale();
			$query_args['post__in'] = !empty($on_sale_ids) ? $on_sale_ids : [0];
		}

		if ($args['selected_min'] > $args['bounds']['floor'] || $args['selected_max'] < $args['bounds']['ceil']) {
			$query_args['meta_query'][] = [
				'key'     => '_price',
				'value'   => [$args['selected_min'], $args['selected_max']],
				'compare' => 'BETWEEN',
				'type'    => 'NUMERIC',
			];
		}

		return new \WP_Query($query_args);
	}

	/**
	 * @param \WP_Query $query
	 * @return array WC_Product objects.
	 */
	public static function collect_products($query)
	{
		$products = [];

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$products[] = wc_get_product(get_the_ID());
			}
			wp_reset_postdata();
		}

		return $products;
	}

	/**
	 * The card/list/price/overlay renderers, shared by the widget template
	 * and the AJAX endpoint.
	 *
	 * @return array<string,callable>
	 */
	public static function renderers()
	{
		/**
		 * Storzen fires wishlist/compare/quick-view as one combined action,
		 * but the theme's .gt-shop-icon relies on Bootstrap's .d-grid to
		 * stack icons — that only works with separate <li> items. Iterate
		 * the hook's callbacks individually so each button gets its own
		 * <li>, reversing the list because Storzen's fixed priorities emit
		 * eye → compare → heart while the markup wants heart → compare → eye.
		 */
		$overlay_icons = function ($product) {
			global $wp_filter;
			if (empty($wp_filter['storzen_shop_card_overlay'])) {
				return;
			}
			$callbacks_flat = [];
			foreach ($wp_filter['storzen_shop_card_overlay']->callbacks as $callbacks) {
				foreach ($callbacks as $callback) {
					$callbacks_flat[] = $callback['function'];
				}
			}
			foreach (array_reverse($callbacks_flat) as $callback_function) {
				echo '<li>';
				call_user_func($callback_function, $product);
				echo '</li>';
			}
		};

		/**
		 * wc_price()'s default 'in_span' nests each amount in its own
		 * font-sized span, which wins over the size inherited inside <del>.
		 * Render plain text so the flat `.price > span` / `.price > del`
		 * structure the markup expects controls the size.
		 */
		$price = function ($product) {
			if ($product->is_on_sale() && '' !== $product->get_sale_price()) {
				echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_sale_price()]), ['in_span' => false, 'decimals' => 0])) . '</span>';
				echo '<del>' . wp_kses_post(wc_price(wc_get_price_to_display($product, ['price' => $product->get_regular_price()]), ['in_span' => false, 'decimals' => 0])) . '</del>';
			} else {
				echo '<span>' . wp_kses_post(wc_price(wc_get_price_to_display($product), ['in_span' => false, 'decimals' => 0])) . '</span>';
			}
		};

		$card = function ($product) use ($overlay_icons, $price) {
			if (!$product instanceof \WC_Product) {
				return;
			}

			$main_image_id = $product->get_image_id();

			$discount_percent = 0;
			if ($product->is_on_sale() && is_numeric($product->get_regular_price()) && (float) $product->get_regular_price() > 0) {
				$discount_percent = round((((float) $product->get_regular_price() - (float) $product->get_sale_price()) / (float) $product->get_regular_price()) * 100);
			}
?>
			<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
				<div class="shop-card-items">
					<div class="thumb">
						<?php if ($main_image_id) : ?>
							<img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_thumbnail')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
						<?php endif; ?>
						<?php if ($discount_percent > 0) : ?>
							<div class="discount">-<?php echo esc_html($discount_percent); ?>%</div>
						<?php endif; ?>
						<ul class="gt-shop-icon d-grid justify-content-center align-items-center">
							<?php $overlay_icons($product); ?>
						</ul>
					</div>
					<div class="content">
						<?php
						$product_cats = wc_get_product_category_list($product->get_id());
						if (!empty($product_cats)) :
						?>
							<span><?php echo wp_kses_post(wp_strip_all_tags($product_cats)); ?></span>
						<?php endif; ?>
						<h2 class="title">
							<a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
						</h2>
						<?php if (wc_review_ratings_enabled()) : ?>
							<div class="star">
								<?php for ($i = 1; $i <= 5; $i++) : ?>
									<i class="fas fa-star"></i>
								<?php endfor; ?>
								<span>(<?php echo esc_html(number_format($product->get_average_rating(), 2)); ?>)</span>
							</div>
						<?php endif; ?>
						<div class="price-items">
							<div class="price">
								<?php $price($product); ?>
							</div>
							<a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
								data-quantity="1"
								data-product_id="<?php echo esc_attr($product->get_id()); ?>"
								data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
								aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>"
								rel="nofollow"
								class="theme-btn small-btn product_type_<?php echo esc_attr($product->get_type()); ?> add_to_cart_button<?php echo $product->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>">
								<?php echo esc_html($product->add_to_cart_text()); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php
		};

		$list_item = function ($product) use ($overlay_icons, $price) {
			if (!$product instanceof \WC_Product) {
				return;
			}

			$main_image_id = $product->get_image_id();

			$short_desc = $product->get_short_description();
			if (empty($short_desc)) {
				$short_desc = wp_trim_words($product->get_description(), 40);
			}
		?>
			<div class="shop-list-items-area-2">
				<div class="thumb">
					<?php if ($main_image_id) : ?>
						<img src="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'woocommerce_single')); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
					<?php endif; ?>
					<ul class="gt-shop-icon d-grid justify-content-center align-items-center">
						<?php $overlay_icons($product); ?>
					</ul>
				</div>
				<div class="shop-content">
					<div class="content">
						<?php
						$product_cats = wc_get_product_category_list($product->get_id());
						if (!empty($product_cats)) :
						?>
							<span><?php echo wp_kses_post(wp_strip_all_tags($product_cats)); ?></span>
						<?php endif; ?>
						<h2 class="title">
							<a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
						</h2>
						<?php if (wc_review_ratings_enabled()) : ?>
							<div class="star">
								<?php for ($i = 1; $i <= 5; $i++) : ?>
									<i class="fas fa-star"></i>
								<?php endfor; ?>
								<span>(<?php echo esc_html(number_format($product->get_average_rating(), 2)); ?>)</span>
							</div>
						<?php endif; ?>
						<?php if (!empty($short_desc)) : ?>
							<p class="text"><?php echo wp_kses_post($short_desc); ?></p>
						<?php endif; ?>
						<div class="price-items">
							<div class="price">
								<?php $price($product); ?>
							</div>
							<a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
								data-quantity="1"
								data-product_id="<?php echo esc_attr($product->get_id()); ?>"
								data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
								aria-label="<?php echo esc_attr($product->add_to_cart_description()); ?>"
								rel="nofollow"
								class="theme-btn small-btn product_type_<?php echo esc_attr($product->get_type()); ?> add_to_cart_button<?php echo $product->supports('ajax_add_to_cart') ? ' ajax_add_to_cart' : ''; ?>">
								<?php echo esc_html($product->add_to_cart_text()); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
<?php
		};

		return [
			'overlay_icons' => $overlay_icons,
			'price'         => $price,
			'card'          => $card,
			'list_item'     => $list_item,
		];
	}
}

Grozomart_Shop_Filter::instance();
