<?php

namespace GrozomartToolkit\Helper;

defined('ABSPATH') || exit;

class Grozomart_Admin_Menu
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
		add_action('admin_bar_menu', [$this, 'add_admin_bar_menu'], 99);
	}

	public function add_admin_bar_menu($admin_bar)
	{
		$admin_bar->add_menu([
			'id'    => 'grozomart-menu-item',
			'title' => __('Grozomart', 'grozomart-toolkit'),
			'href'  => get_site_url(null, 'wp-admin/admin.php?page=grozomart_dashboard'),
			'meta'  => [
				'title'  => __('Grozomart', 'grozomart-toolkit'),
				'target' => '_self',
			],
		]);

		$admin_bar->add_menu([
			'parent' => 'grozomart-menu-item',
			'id'     => 'grozomart-welcome',
			'title'  => __('Welcome', 'grozomart-toolkit'),
			'href'   => get_site_url(null, 'wp-admin/admin.php?page=grozomart_dashboard'),
			'meta'   => [
				'title'  => __('Welcome', 'grozomart-toolkit'),
				'target' => '_self',
			],
		]);

		$admin_bar->add_menu([
			'parent' => 'grozomart-menu-item',
			'id'     => 'grozomart-theme-option',
			'title'  => __('Theme Options', 'grozomart-toolkit'),
			'href'   => get_site_url(null, 'wp-admin/admin.php?page=grozomart_options'),
			'meta'   => [
				'title'  => __('Theme Options', 'grozomart-toolkit'),
				'target' => '_self',
			],
		]);

		$admin_bar->add_menu([
			'parent' => 'grozomart-menu-item',
			'id'     => 'grozomart-help-center',
			'title'  => __('Help Center', 'grozomart-toolkit'),
			'href'   => get_site_url(null, 'wp-admin/admin.php?page=grozomart_help_center'),
			'meta'   => [
				'title'  => __('Help Center', 'grozomart-toolkit'),
				'target' => '_self',
			],
		]);
	}
}

Grozomart_Admin_Menu::instance();
