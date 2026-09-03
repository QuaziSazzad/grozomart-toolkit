<?php

namespace GrozomartToolkit\ElementorAddon\Helper;

defined('ABSPATH') || exit;

class Grozomart_Icons_Manager
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
		add_filter('elementor/icons_manager/additional_tabs', [$this, 'add_icons_tab']);
	}

	public function add_icons_tab($tabs)
	{
		$icon_css = GROZOMART_TOOLKIT_VENDOR . '/flaticon/flaticon.css';

		$tabs['grozomart-flaticon'] = [
			'name'          => 'grozomart-flaticon',
			'label'         => esc_html__('Grozomart Icons', 'grozomart-toolkit'),
			'url'           => $icon_css,
			'prefix'        => '',
			'displayPrefix' => '',
			'labelIcon'     => 'far fa-folder-open',
			'ver'           => '1.0',
			'icons'         => $this->icon_list(),
			'native'        => true,
		];

		return $tabs;
	}

	public function icon_list()
	{
		return [
			"flaticon-add-to-cart",
			"flaticon-bio",
			"flaticon-credit-card",
			"flaticon-customer-support",
			"flaticon-leaves",
			"flaticon-no-chemical",
			"flaticon-phone",
			"flaticon-star",
		];
	}
}

Grozomart_Icons_Manager::instance();
