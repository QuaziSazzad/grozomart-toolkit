<?php

namespace GrozomartToolkit\WpWidgets;

defined('ABSPATH') || exit;

class Grozomart_Widgets_Setup
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
		$this->load_widgets_files();
		add_action('widgets_init', [$this, 'register_widgets']);
	}

	public function load_widgets_files()
	{
		include_once GROZOMART_TOOLKIT_WP_WIDGETS . '/class-search.php';
		include_once GROZOMART_TOOLKIT_WP_WIDGETS . '/class-category.php';
		include_once GROZOMART_TOOLKIT_WP_WIDGETS . '/class-recent-posts.php';
		include_once GROZOMART_TOOLKIT_WP_WIDGETS . '/class-tags.php';
		include_once GROZOMART_TOOLKIT_WP_WIDGETS . '/class-deal-banner.php';
	}

	public function register_widgets()
	{
		register_widget(__NAMESPACE__ . '\Grozomart_Search');
		register_widget(__NAMESPACE__ . '\Grozomart_Categories');
		register_widget(__NAMESPACE__ . '\Grozomart_Recent_Posts');
		register_widget(__NAMESPACE__ . '\Grozomart_Tags');
		register_widget(__NAMESPACE__ . '\Grozomart_Deal_Banner');
	}
}

Grozomart_Widgets_Setup::instance();
