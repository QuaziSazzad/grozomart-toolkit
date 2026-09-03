<?php

namespace GrozomartToolkit\Helper;

defined('ABSPATH') || exit;

/**
 * Load Theme Assets
 */
class Grozomart_Assets
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
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
	}


	public function register_scripts()
	{
		wp_register_style('swiper', GROZOMART_TOOLKIT_VENDOR . '/swiper/swiper-bundle.min.css', [], '1.1.0');
		wp_register_script('swiper', GROZOMART_TOOLKIT_VENDOR . '/swiper/swiper-bundle.min.js', ['jquery'], '1.1.0', true);

		wp_register_style('nice-select', GROZOMART_TOOLKIT_VENDOR . '/nice-select/nice-select.css', [], '1.1.0');
		wp_register_script('nice-select', GROZOMART_TOOLKIT_VENDOR . '/nice-select/jquery.nice-select.min.js', ['jquery'], '1.1.0', true);

		wp_register_style('magnific-popup', GROZOMART_TOOLKIT_VENDOR . '/magnific-popup/magnific-popup.css', [], '1.1.0');
		wp_register_script('magnific-popup', GROZOMART_TOOLKIT_VENDOR . '/magnific-popup/jquery.magnific-popup.min.js', ['jquery'], '1.1.0', true);

		wp_register_style('grozomart-flat-icons', GROZOMART_TOOLKIT_VENDOR . '/flaticon/flaticon.css', [], '1.8.1');

		wp_register_script('waypoints', GROZOMART_TOOLKIT_VENDOR . '/waypoints/jquery.waypoints.js', ['jquery'], '1.8.1', true);
		wp_register_script('counterup', GROZOMART_TOOLKIT_VENDOR . '/counterup/jquery.counterup.min.js', ['jquery', 'waypoints'], '1.8.1', true);
		wp_register_script('wow', GROZOMART_TOOLKIT_VENDOR . '/wow/wow.min.js', ['jquery'], '1.8.1', true);
		wp_register_script('viewport-jquery', GROZOMART_TOOLKIT_VENDOR . '/parallaxie/viewport.jquery.js', ['jquery'], '1.8.1', true);
		wp_register_script('parallaxie', GROZOMART_TOOLKIT_VENDOR . '/parallaxie/parallaxie.js', ['jquery', 'viewport-jquery'], '1.8.1', true);

		wp_register_script('ajax-mail', GROZOMART_TOOLKIT_ASSETS . '/js/ajax-mail.js', ['jquery'], GROZOMART_TOOLKIT_VERSION, true);
	}

	public function enqueue_styles()
	{
		wp_enqueue_style('magnific-popup');
		wp_enqueue_style('swiper');
		wp_enqueue_style('nice-select');
		wp_enqueue_style('grozomart-flat-icons');
	}


	/**
	 * Enqueue Theme Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script('magnific-popup');
		wp_enqueue_script('nice-select');
		wp_enqueue_script('swiper');
		wp_enqueue_script('waypoints');
		wp_enqueue_script('counterup');
		wp_enqueue_script('wow');
		wp_enqueue_script('viewport-jquery');
		wp_enqueue_script('parallaxie');
		wp_enqueue_script('ajax-mail');
		wp_enqueue_script('grozomart-addon', GROZOMART_TOOLKIT_ASSETS . '/js/grozomart-addon.js', ['jquery', 'magnific-popup'], GROZOMART_TOOLKIT_VERSION, true);

		wp_localize_script(
			'grozomart-addon',
			'GrozomartObject',
			[
				'ajax_url' => admin_url('admin-ajax.php'),
				'error_text' => esc_html__('An error occurred. Please try again.', 'grozomart-toolkit'),
			]
		);
	}
}

Grozomart_Assets::instance();
