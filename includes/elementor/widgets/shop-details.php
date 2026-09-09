<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Shop_Details extends Widget_Base
{
	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);

		add_action('wp_enqueue_scripts', [$this, 'maybe_enqueue_quick_view_assets'], 20);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_compare_icon_override'], 20);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_layout_styles'], 20);
		add_filter('woocommerce_product_review_comment_form_args', [$this, 'filter_review_form_args']);
	}

	/**
	 * Trims WooCommerce's review form to what this design shows.
	 *
	 * The rating <select> is dropped in favour of a hidden input: the select
	 * is only there as a no-JS fallback, and wc-single-product.js writes the
	 * clicked star into whatever `#rating` it finds, so the stars keep
	 * working while the duplicate dropdown never renders. It stays a real
	 * field so the chosen rating is still submitted — but not `required`,
	 * since a hidden required control blocks form submission in the browser.
	 *
	 * The "Your email address will not be published" notice is also removed;
	 * the design has no place for it.
	 *
	 * @param array $args comment_form() arguments.
	 * @return array
	 */
	public function filter_review_form_args($args)
	{
		$args['comment_notes_before'] = '';

		if (!empty($args['comment_field'])) {
			$args['comment_field'] = preg_replace(
				'#<select name="rating".*?</select>#s',
				'<input type="hidden" name="rating" id="rating" value="">',
				$args['comment_field']
			);
		}

		return $args;
	}

	public function get_name()
	{
		return 'grozomart-shop-details';
	}

	public function get_title()
	{
		return esc_html__('Shop Details', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-product-info webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'shop', 'details', 'single', 'product', 'woocommerce'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __('Layout', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Select Layout', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => __('Layout One', 'grozomart-toolkit'),
					'layout_two' => __('Layout Two', 'grozomart-toolkit'),
					'layout_three' => __('Layout Three', 'grozomart-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('shop-details-one-option.php');
		include grozomart_get_elementor_option('shop-details-two-option.php');
		include grozomart_get_elementor_option('shop-details-three-option.php');

		//Modules — shared across every layout, registered once (not per-layout
		// option file) since Elementor requires unique control IDs per widget.
		$this->start_controls_section(
			'layout_modules',
			[
				'label' => esc_html__('Product Card Modules', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'module_wishlist',
			[
				'label' => esc_html__('Wishlist', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'module_compare',
			[
				'label' => esc_html__('Compare', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'module_quick_view',
			[
				'label' => esc_html__('Quick View', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'module_sale_badge',
			[
				'label' => esc_html__('Sale Badge', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Product Title', '{{WRAPPER}} .shop-details-simple-content h2', ['layout_one', 'layout_two', 'layout_three']);
		grozomart_elementor_style_options($this, 'Product Price', '{{WRAPPER}} .shop-details-simple-content h3', ['layout_one', 'layout_two', 'layout_three']);
		grozomart_elementor_style_options($this, 'Tab Label', '{{WRAPPER}} .shop-tab-wrapper .nav-link', ['layout_one', 'layout_two', 'layout_three']);
		grozomart_elementor_style_options($this, 'Related Title', '{{WRAPPER}} .section-title-area .section-title h2', ['layout_one', 'layout_two', 'layout_three']);

		$this->end_controls_section();
	}

	/**
	 * Storzen's Quick View module only enqueues its JS/CSS when the current
	 * page is a shop/product page or `is_singular()` — this widget can be
	 * placed on pages that satisfy neither, leaving the Quick View button
	 * unstyled and non-functional. Load the same assets ourselves as a
	 * fallback (without touching the Storzen plugin) whenever Storzen's own
	 * check didn't already enqueue them.
	 */
	public function maybe_enqueue_quick_view_assets()
	{
		if (!function_exists('WC') || !defined('STORZEN_ROOT_URL') || !defined('STORZEN_VERSION')) {
			return;
		}

		if (wp_script_is('storzen-quick-view', 'enqueued')) {
			return;
		}

		wp_enqueue_style(
			'storzen-quick-view',
			STORZEN_ROOT_URL . 'assets/css/modules/quick-view.css',
			[],
			STORZEN_VERSION
		);

		wp_enqueue_script(
			'storzen-quick-view',
			STORZEN_ROOT_URL . 'assets/js/modules/quick-view.js',
			['jquery'],
			STORZEN_VERSION,
			true
		);

		wp_localize_script(
			'storzen-quick-view',
			'szQuickView',
			[
				'ajaxUrl' => admin_url('admin-ajax.php'),
				'i18n' => [
					'loading'       => esc_html__('Loading…', 'storzen'),
					'error'         => esc_html__('Could not load product. Please try again.', 'storzen'),
					'adding'        => esc_html__('Adding…', 'storzen'),
					'added'         => esc_html__('Added to cart!', 'storzen'),
					'selectOptions' => esc_html__('Select options', 'storzen'),
					'addToCart'     => esc_html__('Add to cart', 'storzen'),
					'outOfStock'    => esc_html__('Out of stock', 'storzen'),
				],
			]
		);
	}

	/**
	 * See Shop widget: Storzen's Compare overlay button carries its own
	 * general-purpose button styling that doesn't match the theme's uniform
	 * 40×40px `.gt-shop-icon` buttons. Reset it here too, scoped to this
	 * widget's markup only.
	 */
	public function enqueue_compare_icon_override()
	{
		if (!function_exists('WC') || !defined('STORZEN_VERSION')) {
			return;
		}

		wp_register_style('grozomart-shop-details-compare-icon', false, [], GROZOMART_TOOLKIT_VERSION);
		wp_enqueue_style('grozomart-shop-details-compare-icon');
		wp_add_inline_style(
			'grozomart-shop-details-compare-icon',
			'.gt-shop-icon .sz-compare-btn.sz-compare-btn--overlay{display:inline-block;width:40px;height:40px;line-height:40px;padding:0;gap:0;border-radius:7px}'
				. '.gt-shop-icon .sz-compare-btn.sz-compare-btn--overlay .fa-columns{font-size:14px;line-height:40px}'
				. '.gt-shop-icon .sz-compare-btn.sz-compare-btn--overlay .fa-columns:before{content:"\\e13a"}'
		);
	}

	/**
	 * Layout fixes for markup this widget introduces. Kept apart from
	 * enqueue_compare_icon_override() because that one returns early when
	 * Storzen isn't installed, and none of this depends on Storzen.
	 */
	public function enqueue_layout_styles()
	{
		if (!function_exists('WC')) {
			return;
		}

		/**
		 * Layout Two's feature list uses the flaticon set. Its stylesheet is
		 * registered by the toolkit but only enqueued on pages that already
		 * pull the addon styles, so request it explicitly here.
		 */
		if (wp_style_is('grozomart-flat-icons', 'registered') && !wp_style_is('grozomart-flat-icons', 'enqueued')) {
			wp_enqueue_style('grozomart-flat-icons');
		}

		/**
		 * The vendor stylesheet resolves its fonts from `../webfonts/`, but the
		 * files actually live in `flaticon/webfonts/` — one level deeper — so
		 * every request 404s and the icons render as empty boxes. Re-declare
		 * the @font-face with the correct paths rather than editing the vendor
		 * file, which any update would overwrite.
		 */
		$flaticon_fonts = GROZOMART_TOOLKIT_VENDOR . '/flaticon/webfonts/flaticon';
		wp_add_inline_style(
			'grozomart-flat-icons',
			'@font-face{font-family:"flaticon";'
				. 'src:url("' . esc_url($flaticon_fonts . '.woff2') . '") format("woff2"),'
				. 'url("' . esc_url($flaticon_fonts . '.woff') . '") format("woff"),'
				. 'url("' . esc_url($flaticon_fonts . '.ttf') . '") format("truetype");'
				. 'font-display:swap;font-weight:normal;font-style:normal}'
		);

		/**
		 * wc-single-product.js draws the star row over the review form's
		 * rating <select> and writes the picked value into it. WooCommerce
		 * only enqueues it when is_product() is true, but this widget can sit
		 * on any page — without the script there are no stars and the select
		 * (which this widget hides, and which is `required`) could never be
		 * filled, so the review form would be unsubmittable.
		 */
		if (!wp_script_is('wc-single-product', 'enqueued')) {
			wp_enqueue_script('wc-single-product');
		}

		/**
		 * Layout Two renders WooCommerce's real variation form, which needs
		 * wc-add-to-cart-variation.js to resolve a selection and update the
		 * price, stock and hidden variation_id. Like the script above,
		 * WooCommerce only enqueues it on is_product() pages.
		 */
		if (!wp_script_is('wc-add-to-cart-variation', 'enqueued')) {
			wp_enqueue_script('wc-add-to-cart-variation');
		}

		wp_enqueue_script(
			'grozomart-shop-details',
			GROZOMART_TOOLKIT_ASSETS . '/js/shop-details.js',
			['jquery', 'wc-add-to-cart-variation'],
			GROZOMART_TOOLKIT_VERSION,
			true
		);

		wp_register_style('grozomart-shop-details-layout', false, [], GROZOMART_TOOLKIT_VERSION);
		wp_enqueue_style('grozomart-shop-details-layout');
		wp_add_inline_style(
			'grozomart-shop-details-layout',
			/**
			 * comments_template() pulls WooCommerce's single-product-reviews.php,
			 * which is the only place its review form exists — but that template
			 * also prints a "Reviews" heading and the review list, both already
			 * rendered above in this layout. Hide those duplicates and keep the
			 * form itself.
			 */
			'.grozomart-wc-review-form #reviews > h2,'
				. '.grozomart-wc-review-form #comments > h2,'
				. '.grozomart-wc-review-form .commentlist,'
				. '.grozomart-wc-review-form .woocommerce-noreviews,'
				. '.grozomart-wc-review-form .woocommerce-pagination{display:none}'
				/**
				 * The theme groups `.qty button, .qty input` under one rule that sets
				 * display:flex. That is right for the buttons but makes the input a
				 * flex CONTAINER, and a flex-container input never paints its own
				 * value — the field renders blank however the value changes. Put the
				 * input back to inline-block (the buttons keep their flex centring
				 * from the shared rule).
				 *
				 * The design's pill also has its own − / + buttons, so the browser's
				 * native number spinner would sit alongside them as a second,
				 * mismatched control; hide it and fix the width so the pill keeps
				 * its shape.
				 */
				. '.shop-details-simple-wrapper .shop-details-simple-content .button-wrapper .cart-quantity .qty input[type=number]{display:inline-block;width:80px;line-height:normal;-moz-appearance:textfield;appearance:textfield}'
				. '.shop-details-simple-wrapper .shop-details-simple-content .button-wrapper .cart-quantity .qty input[type=number]::-webkit-outer-spin-button,'
				. '.shop-details-simple-wrapper .shop-details-simple-content .button-wrapper .cart-quantity .qty input[type=number]::-webkit-inner-spin-button{-webkit-appearance:none;margin:0}'
				/**
				 * The add-to-cart form doubles as .button-wrapper (the flex row), and
				 * WooCommerce/Elementor stylesheets set a bottom margin on forms that
				 * would otherwise fight the row's own spacing.
				 */
				. '.shop-details-simple-content form.cart.button-wrapper{margin-bottom:30px}'
				/**
				 * WooCommerce's rating <select> is the real form field; its
				 * single-product.js draws the star row over it and writes the
				 * chosen value back into it, then hides the select via .hide()
				 * on an `init` event. That hide doesn't take effect here, so the
				 * select shows underneath the stars — hide it in CSS instead.
				 *
				 * Kept in the DOM rather than removed: it carries the submitted
				 * `rating` value. visibility/position rather than display:none
				 * because the field is `required`, and browsers refuse to submit
				 * a form containing a required control that is display:none.
				 */
				/**
				 * The theme already aligns the cookie-consent checkbox with its
				 * label, but only under `.woocommerce.single-product .woocommerce-tabs`
				 * — markup this widget doesn't sit inside, so the checkbox falls
				 * back to stacking above the text. Same treatment, scoped here.
				 */
				. '.grozomart-wc-review-form .comment-form-cookies-consent{display:flex;align-items:center}'
				. '.grozomart-wc-review-form .comment-form-cookies-consent input[type=checkbox]{flex:0 0 15px;position:relative;top:-1px;margin:0}'
				. '.grozomart-wc-review-form .comment-form-cookies-consent label{margin:0 0 0 10px;line-height:1.4}'
				/**
				 * Layout Two shows variation attributes as buttons, but
				 * wc-add-to-cart-variation.js only reads `.variations select`.
				 * The selects stay in the DOM driving WooCommerce and are hidden
				 * here; the buttons write into them (see shop-details.js).
				 * Off-screen rather than display:none so WooCommerce can still
				 * focus/validate them.
				 */
				. '.grozomart-variation-form .variations select,'
				. '.grozomart-variation-form .reset_variations{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:0!important;border:0!important;opacity:0!important;pointer-events:none}'
				. '.shop-details-simple-wrapper.shop-details-two .new-weight-items{flex-wrap:wrap;margin-bottom:20px}'
				. '.shop-details-simple-wrapper.shop-details-two .new-weight-items .number{cursor:pointer}'
				. '.shop-details-simple-wrapper.shop-details-two .new-weight-items .number.active{background:var(--theme);color:var(--white);border-color:var(--theme)}'
				/**
				 * A combination this product doesn't have (WooCommerce drops the
				 * option from the select as choices narrow). Shown greyed rather
				 * than hidden so the row doesn't reflow while choosing.
				 */
				. '.shop-details-simple-wrapper.shop-details-two .new-weight-items .number.disabled{opacity:.4;cursor:not-allowed}'
				. '.shop-details-simple-wrapper.shop-details-two .new-weight-items .number.disabled:hover{background:transparent;color:#6B7280}'
				/**
				 * WooCommerce prints "please select some product options" into
				 * this element; the theme has no styling for it, so it would
				 * otherwise appear as unstyled text jammed against the button.
				 */
				. '.grozomart-variation-form .woocommerce-variation-availability,'
				. '.grozomart-variation-form .wc-no-matching-variations{margin-bottom:15px;color:#6B7280;font-size:14px}'
				/**
				 * Layout Two's wishlist/compare row is rendered by Storzen, so its
				 * icons and labels are Storzen's, not this design's. Two gaps to
				 * close without touching the plugin (which an update would undo,
				 * and which would change these buttons everywhere else too):
				 *
				 * 1. Compare ships a `fa-columns` glyph; the design uses the
				 *    rotate arrows. Swap the glyph via `content`, the same way the
				 *    card overlays already do above.
				 * 2. The wishlist button is icon-only — Storzen hard-codes it with
				 *    no label option — so the text comes from ::after, taken from
				 *    the button's own aria-label so it stays translated and flips
				 *    to "Remove from wishlist" once added.
				 */
				. '.add-list-items .sz-compare-btn .fa-columns:before{content:"\\e13a"}'
				. '.add-list-items .sz-wishlist-btn:after{content:attr(aria-label)}'
				/**
				 * Storzen's own button chrome (its pill padding/border) doesn't
				 * belong in this row — the design shows plain icon+text links.
				 */
				/**
				 * The theme styles this row as `.add-list-items a`, but Storzen
				 * renders <button> — so those rules never applied. Mirror them
				 * here (16px/500/7px gap, per the theme's own rule) and strip
				 * Storzen's pill chrome so the buttons read as the design's plain
				 * icon+text links.
				 */
				. '.add-list-items .sz-wishlist-btn,'
				. '.add-list-items .sz-compare-btn{display:flex;align-items:center;gap:7px;font-size:16px;font-weight:500;color:inherit;padding:0;border:0;background:none;box-shadow:none;width:auto;height:auto;line-height:normal;cursor:pointer}'
				. '.add-list-items .sz-wishlist-btn:hover,'
				. '.add-list-items .sz-compare-btn:hover{color:var(--theme);background:none}'
				/**
				 * Both heart states are always in the DOM; Storzen normally shows
				 * one via its own stylesheet, which isn't scoped to this row.
				 */
				. '.add-list-items .sz-wishlist-btn .sz-wishlist-btn__icon--filled{display:none}'
				. '.add-list-items .sz-wishlist-btn.is-added .sz-wishlist-btn__icon{display:none}'
				. '.add-list-items .sz-wishlist-btn.is-added .sz-wishlist-btn__icon--filled{display:inline-block}'
				/**
				 * WooCommerce prints the resolved variation's price and stock in
				 * this container; without spacing it collides with the cart row.
				 */
				. '.grozomart-variation-form .woocommerce-variation.single_variation:not(:empty){margin-bottom:20px}'
		);
	}

	/**
	 * Storzen gates its overlay buttons and its `wp_footer` Quick View modal
	 * shell on Storzen_Archive_Grid's static module context, which is only
	 * primed while Storzen's own Archive Products Grid widget renders. Without
	 * it, `is_page_module_enabled('quick_view')` returns null on this page, the
	 * `#sz-qv-modal` element is never printed, and quick-view.js aborts in
	 * init() — so clicking the eye icon does nothing.
	 *
	 * Declare the same context on our behalf, driven by this widget's own
	 * module toggles, so the overlay hooks and the footer modal behave
	 * exactly as they do inside Storzen's grid.
	 */
	private function prime_storzen_module_context($settings)
	{
		if (!class_exists('\Elementor\Storzen_Archive_Grid')) {
			return;
		}

		\Elementor\Storzen_Archive_Grid::set_active_module_settings([
			'module_wishlist'   => $settings['module_wishlist'],
			'module_compare'    => $settings['module_compare'],
			'module_quick_view' => $settings['module_quick_view'],
			'module_sale_badge' => $settings['module_sale_badge'],
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$this->prime_storzen_module_context($settings);

		include grozomart_get_elementor_template('shop-details-one.php');
		include grozomart_get_elementor_template('shop-details-two.php');
		include grozomart_get_elementor_template('shop-details-three.php');
	}
}
