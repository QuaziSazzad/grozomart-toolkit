<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Product extends Widget_Base
{
	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);

		add_action('wp_enqueue_scripts', [$this, 'maybe_enqueue_quick_view_assets'], 20);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_compare_icon_override'], 20);
	}

	public function get_name()
	{
		return 'grozomart-product';
	}

	public function get_title()
	{
		return esc_html__('Product', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-product-add-to-cart webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'product', 'shop', 'woocommerce', 'tabs', 'category'];
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
					'layout_four' => __('Layout Four', 'grozomart-toolkit'),
					'layout_five' => __('Layout Five', 'grozomart-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('product-one-option.php');
		include grozomart_get_elementor_option('product-two-option.php');
		include grozomart_get_elementor_option('product-three-option.php');
		include grozomart_get_elementor_option('product-four-option.php');
		include grozomart_get_elementor_option('product-five-option.php');

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

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title-area .section-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five']);
		grozomart_elementor_style_options($this, 'Tab Label', '{{WRAPPER}} .section-title-area .nav-link', ['layout_one', 'layout_four', 'layout_five']);
		grozomart_elementor_style_options($this, 'Product Title', '{{WRAPPER}} .shop-card-items .title a, {{WRAPPER}} .feature-product-items .title a, {{WRAPPER}} .feature-product-items-2 .title a, {{WRAPPER}} .shop-best-seller-items .title a, {{WRAPPER}} .shop-card-arrivals-items2 .title a, {{WRAPPER}} .shop-card-arrivals .title a', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five']);
		grozomart_elementor_style_options($this, 'Product Price', '{{WRAPPER}} .price, {{WRAPPER}} .price-item', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five']);
		grozomart_elementor_style_options($this, 'Promo Banner Title', '{{WRAPPER}} .shop-banner-items11 .content .title', ['layout_two']);

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

		wp_register_style('grozomart-product-compare-icon', false, [], GROZOMART_TOOLKIT_VERSION);
		wp_enqueue_style('grozomart-product-compare-icon');
		wp_add_inline_style(
			'grozomart-product-compare-icon',
			'.gt-shop-icon .sz-compare-btn.sz-compare-btn--overlay{display:inline-block;width:40px;height:40px;line-height:40px;padding:0;gap:0;border-radius:7px}'
			. '.gt-shop-icon .sz-compare-btn.sz-compare-btn--overlay .fa-columns{font-size:14px;line-height:40px}'
			. '.gt-shop-icon .sz-compare-btn.sz-compare-btn--overlay .fa-columns:before{content:"\\e13a"}'
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
	 * exactly as they do inside Storzen's grid. Each module still respects
	 * its own global on/off switch, since set_active_module_settings() ANDs
	 * the widget toggle with storzen_module_enabled().
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

		include grozomart_get_elementor_template('product-one.php');
		include grozomart_get_elementor_template('product-two.php');
		include grozomart_get_elementor_template('product-three.php');
		include grozomart_get_elementor_template('product-four.php');
		include grozomart_get_elementor_template('product-five.php');
	}
}
