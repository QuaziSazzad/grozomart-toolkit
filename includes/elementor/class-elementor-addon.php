<?php

namespace GrozomartToolkit\ElementorAddon;

defined('ABSPATH') || exit;

class Grozomart_Elementor_Addon
{

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
		add_action('elementor/theme/register_locations', [$this, 'register_locations']);
		add_action('elementor/elements/categories_registered', [$this, 'init_categories']);
		add_action('elementor/editor/after_enqueue_styles', [$this, 'enqueue_admin_css']);
		add_action('elementor/widgets/register', [$this, 'init_widgets']);

		add_action('elementor/frontend/after_enqueue_scripts', function () {
			wp_deregister_style('e-animations');
			wp_dequeue_style('e-animations');
		}, 20);

		$this->include_templates();
		$this->include_files();
	}

	public function register_locations($manager)
	{
		$manager->register_all_core_location();
	}

	public function init_categories($elements_manager)
	{
		$elements_manager->add_category(
			'grozomart_elements',
			[
				'title' => esc_html__('Grozomart Elements', 'grozomart-toolkit'),
				'icon'  => 'fa fa-smile-o',
			]
		);
	}

	public function enqueue_admin_css()
	{
		wp_enqueue_style('grozomart-elementor-editor', GROZOMART_TOOLKIT_THEME_ASSETS . '/css/elementor-editor.css', [], '1.0');
	}

	public function init_widgets($widgets_manager)
	{
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/header.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/banner.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/features.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/shop-category.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/shop-banner.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/contact-info.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/shop.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/shop-details.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/product.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/full-footer.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/contact-form.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/testimonial.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/call-to-action.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/widgets/recent-post.php';

		$widgets_manager->register(new Widgets\Header());
		$widgets_manager->register(new Widgets\Banner());
		$widgets_manager->register(new Widgets\Testimonial());
		$widgets_manager->register(new Widgets\Call_To_Action());
		$widgets_manager->register(new Widgets\Recent_Post());
		$widgets_manager->register(new Widgets\Features());
		$widgets_manager->register(new Widgets\Shop_Category());
		$widgets_manager->register(new Widgets\Shop_Banner());
		$widgets_manager->register(new Widgets\Contact_Info());
		$widgets_manager->register(new Widgets\Shop());
		$widgets_manager->register(new Widgets\Shop_Details());
		$widgets_manager->register(new Widgets\Product());
		$widgets_manager->register(new Widgets\Full_Footer());
		$widgets_manager->register(new Widgets\Contact_Form());
	}

	public function include_templates()
	{
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/templates/class-portfolio.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/templates/class-posts.php';
	}

	public function include_files()
	{
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/traits/carousel-helper.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/helper/class-icons-manager.php';
		include_once GROZOMART_TOOLKIT_ELEMENTOR . '/helper/class-extender.php';
	}
}

Grozomart_Elementor_Addon::instance();
