<?php

namespace GrozomartToolkit\Helper;

use GrozomartTheme\Admin\Grozomart_Admin_Panel;
use GrozomartTheme\Classes\Grozomart_Helper;
use CSF;

defined('ABSPATH') || exit;

class Grozomart_Options
{

	protected static $instance = null;

	private $options_prefix = 'grozomart_options';
	private $menu_slug = 'grozomart_options';
	private $template_builder_url;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		if (! class_exists('CSF')) {
			return;
		}

		$this->template_builder_url = admin_url('edit.php?post_type=grozomart_template');

		$this->theme_options();
		$this->general_section();
		$this->header_section();
		$this->footer_section();
		$this->page_title_section();
		$this->blog_section();
		//$this->portfolio_section();
		$this->shop_section();
		$this->color_scheme_section();
		$this->typography_section();
		$this->error_section();
		$this->mailchimp_section();
		$this->maintenance_section();
		$this->custom_scrips_section();
		$this->backup_section();

		add_filter('csf_options_before', [$this, 'add_dashboard_banner']);
		add_filter('csf_color_palette', [$this, 'update_color_palette']);
		add_action('csf_grozomart_options_save_after', [$this, 'after_saved']);
	}

	public function theme_options()
	{
		CSF::createOptions($this->options_prefix, [
			'menu_title'         => esc_html__('Theme Options', 'grozomart-toolkit'),
			'menu_slug'          => $this->menu_slug,
			'framework_title'    => esc_html__('Theme Options', 'grozomart-toolkit'),
			'show_in_customizer' => true,
			'menu_type'          => 'submenu',
			'menu_parent'        => 'grozomart_dashboard',
			'show_bar_menu'      => false,
			'ajax_save'          => false,
			'footer_text'        => ''
		]);
	}

	public function general_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'general_options',
			'title' => esc_html__('General', 'grozomart-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'general_options',
			'title'  => esc_html__('Layout', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Layout', 'grozomart-toolkit'),
				],
				[
					'id'       => 'site_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Set the website layout.', 'grozomart-toolkit'),
					'options'  => [
						'full-width' => esc_html__('Full Width', 'grozomart-toolkit'),
						'boxed'      => esc_html__('Boxed', 'grozomart-toolkit'),
					],
					'default'  => 'full-width',
				],
				[
					'id'         => 'boxed_width',
					'type'       => 'dimensions',
					'title'      => esc_html__('Boxed Container Width.', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Set the boxed outer container width.', 'grozomart-toolkit'),
					'default'    => [
						'width' => '1530',
						'unit'  => 'px',
					],
					'height'     => false,
					'units'      => ['px'],
					'dependency' => ['site_layout', '==', 'boxed'],
				],
				[
					'id'         => 'boxed_container_color',
					'type'       => 'background',
					'title'      => esc_html__('Boxed Background Color', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Set the boxed inner container background color.', 'grozomart-toolkit'),
					'output'     => '.tekprof-boxed-layout .tekprof-body-content',
					'dependency' => ['site_layout', '==', 'boxed'],
				],
				[
					'id'       => 'body_bg',
					'type'     => 'background',
					'title'    => esc_html__('Body Background', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Set the <body> background.', 'grozomart-toolkit'),
					'output'   => 'body',
				],
				[
					'id'       => 'site_border',
					'type'     => 'switcher',
					'title'    => esc_html__('Site Border', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Set a colored border around the website.', 'grozomart-toolkit'),
					'default'  => false,
				],
				[
					'id'          => 'site_border_color',
					'type'        => 'color',
					'title'       => esc_html__('Site Border Color', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Set the site border color.', 'grozomart-toolkit'),
					'output'      => '.bordered-x',
					'output_mode' => 'border-color',
					'dependency'  => ['site_border', '==', true],
				],
				[
					'id'          => 'site_border_width',
					'type'        => 'number',
					'title'       => esc_html__('Site Border Width.', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Set the site border width.', 'grozomart-toolkit'),
					'unit'        => 'px',
					'output'      => '.bordered-x',
					'output_mode' => 'border-width',
					'dependency'  => ['site_border', '==', true],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'general_options',
			'title'  => esc_html__('Preloader', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Preloader', 'grozomart-toolkit'),
				],
				[
					'id'       => 'site_preloader',
					'type'     => 'button_set',
					'title'    => esc_html__('Site Preloader', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable site Preloader', 'grozomart-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enabled', 'grozomart-toolkit'),
						'Disabled' => esc_html__('Disabled', 'grozomart-toolkit'),
					],
					'default'  => 'enabled',
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Preloader Styling', 'grozomart-toolkit'),
					'dependency' => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'preloader_background',
					'type'        => 'color',
					'title'       => esc_html__('Background Color', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Preloader background color', 'grozomart-toolkit'),
					'output'      => '.preloader',
					'output_mode' => 'background-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'spinner_base_color',
					'type'        => 'color',
					'title'       => esc_html__('Spinner Base Color', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Preloader spinner base color', 'grozomart-toolkit'),
					'output'      => '.preloader .custom-loader',
					'output_mode' => 'border-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'spinner_line_top_color',
					'type'        => 'color',
					'title'       => esc_html__('Spinner Line Top Color', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Preloader spinner line color', 'grozomart-toolkit'),
					'output'      => '.preloader .custom-loader',
					'output_mode' => 'border-top-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'spinner_line_bottom_color',
					'type'        => 'color',
					'title'       => esc_html__('Spinner Line Bottom Color', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Preloader spinner line color', 'grozomart-toolkit'),
					'output'      => '.preloader .custom-loader',
					'output_mode' => 'border-bottom-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
			],
		]);

		// CSF::createSection($this->options_prefix, [
		// 	'parent' => 'general_options',
		// 	'title'  => esc_html__('Back to Top', 'grozomart-toolkit'),
		// 	'fields' => [
		// 		[
		// 			'type'    => 'heading',
		// 			'content' => esc_html__('Back to Top', 'grozomart-toolkit'),
		// 		],
		// 		[
		// 			'id'       => 'back_to_top',
		// 			'type'     => 'button_set',
		// 			'title'    => esc_html__('Back to Top', 'grozomart-toolkit'),
		// 			'subtitle' => esc_html__('Add a back to top button on bottom right corner.', 'grozomart-toolkit'),
		// 			'options'  => [
		// 				'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
		// 				'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
		// 			],
		// 			'default'  => 'enabled',
		// 		],
		// 		[
		// 			'id'         => 'back_to_top_mobile',
		// 			'type'       => 'switcher',
		// 			'title'      => esc_html__('Show on Mobile', 'grozomart-toolkit'),
		// 			'subtitle'   => esc_html__('Show the back to top button on mobile devices..', 'grozomart-toolkit'),
		// 			'default'    => true,
		// 			'dependency' => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_to_top_color',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Icon Color', 'grozomart-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon color', 'grozomart-toolkit'),
		// 			'output'      => '.back-to-top',
		// 			'output_mode' => 'color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_to_top_bg',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Background', 'grozomart-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon background color', 'grozomart-toolkit'),
		// 			'output'      => '.back-to-top',
		// 			'output_mode' => 'background-color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_top_hover_color',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Hover Color', 'grozomart-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon hover color', 'grozomart-toolkit'),
		// 			'output'      => '.back-to-top:hover',
		// 			'output_mode' => 'color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_top_hover_bg',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Hover Background', 'grozomart-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon hover background color', 'grozomart-toolkit'),
		// 			'output'      => '.back-to-top:hover',
		// 			'output_mode' => 'background-color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 	],
		// ]);
	}

	public function header_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'header_options',
			'title' => esc_html__('Header', 'grozomart-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'header_options',
			'title'  => esc_html__('General', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('General', 'grozomart-toolkit'),
				],
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for site header then disable default theme header', 'grozomart-toolkit'),
				],
				[
					'id'       => 'default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Theme default header', 'grozomart-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'enabled',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default theme header. Set your site header form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'default_header',
						'==',
						'disabled',
					],
				],
				[
					'id'         => 'header_button',
					'type'       => 'button_set',
					'title'      => esc_html__('Show Header Button', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Show a button to header right side', 'grozomart-toolkit'),
					'options'    => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'    => 'enabled',
					'dependency' => [
						'default_header',
						'==',
						'enabled',
					],
				],
				[
					'id'         => 'button_text',
					'title'      => esc_html__('Button Text', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Text for Header Button.', 'grozomart-toolkit'),
					'type'       => 'text',
					'default'    => esc_html__('Get a Quote', 'grozomart-toolkit'),
					'dependency' => [
						['default_header', '==', 'enabled'],
						['header_button', '==', 'enabled'],
					],
				],
				[
					'id'         => 'button_url',
					'title'      => esc_html__('Button URL', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('URL for Header Button.', 'grozomart-toolkit'),
					'type'       => 'text',
					'default'    => '#',
					'dependency' => [
						['default_header', '==', 'enabled'],
						['header_button', '==', 'enabled'],
					],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'header_options',
			'title'  => esc_html__('Logo', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Header Logo', 'grozomart-toolkit'),
				],
				[
					'id'       => 'site_logo_type',
					'type'     => 'button_set',
					'title'    => esc_html__('Site Logo Type', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Select site logo type', 'grozomart-toolkit'),
					'options'  => [
						'text'  => esc_html__('Text', 'grozomart-toolkit'),
						'image' => esc_html__('Image', 'grozomart-toolkit'),
					],
					'default'  => 'image',
				],
				[
					'id'         => 'site_text_logo',
					'type'       => 'text',
					'title'      => esc_html__('Text logo', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Type logo text', 'grozomart-toolkit'),
					'default'    => esc_html__('grozomart', 'grozomart-toolkit'),
					'dependency' => ['site_logo_type', '==', 'text'],
				],
				[
					'id'           => 'site_image_logo',
					'type'         => 'media',
					'title'        => esc_html__('Image logo', 'grozomart-toolkit'),
					'subtitle'     => esc_html__('Upload OR Select image for site logo', 'grozomart-toolkit'),
					'library'      => 'image',
					'url'          => false,
					'default'      => [
						'url'       => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/logo.png',
						'thumbnail' => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/logo.png',
					],
					'preview_size' => 'full',
					'dependency'   => ['site_logo_type', '==', 'image'],
				],
				[
					'id'         => 'logo_dimension',
					'type'       => 'dimensions',
					'title'      => esc_html__('Logo Dimensions', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Site logo Dimensions', 'grozomart-toolkit'),
					'output'     => '.default-header .tekprof-site-logo img',
					'dependency' => ['site_logo_type', '==', 'image'],
				],
				[
					'id'          => 'logo_max_width',
					'type'        => 'number',
					'unit'        => 'px',
					'title'       => esc_html__('Max Width', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Logo wrapper max width', 'grozomart-toolkit'),
					'output'      => '.default-header .tekprof-site-logo',
					'output_mode' => 'max-width',
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Mobile Panel Logo', 'grozomart-toolkit'),
				],
				[
					'id'       => 'panel_logo_type',
					'type'     => 'button_set',
					'title'    => esc_html__('Panel Logo Type', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Select Logo type', 'grozomart-toolkit'),
					'options'  => [
						'text'  => esc_html__('Text', 'grozomart-toolkit'),
						'image' => esc_html__('Image', 'grozomart-toolkit'),
					],
					'default'  => 'image',
				],
				[
					'id'         => 'panel_text_logo',
					'type'       => 'text',
					'title'      => esc_html__('Text logo', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Type logo text', 'grozomart-toolkit'),
					'default'    => 'grozomart',
					'dependency' => ['panel_logo_type', '==', 'text'],
				],
				[
					'id'           => 'panel_image_logo',
					'type'         => 'media',
					'title'        => esc_html__('Image logo', 'grozomart-toolkit'),
					'subtitle'     => esc_html__('Select OR Upload image', 'grozomart-toolkit'),
					'library'      => 'image',
					'url'          => false,
					'default'      => [
						'url'       => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/logo.png',
						'thumbnail' => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/logo.png',
					],
					'preview_size' => 'full',
					'dependency'   => ['panel_logo_type', '==', 'image'],
				],
				[
					'id'         => 'slide_panel_dimension',
					'type'       => 'dimensions',
					'title'      => esc_html__('Logo Dimensions', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Image logo Dimensions', 'grozomart-toolkit'),
					'output'     => '.default-header .slide-panel-logo img',
					'dependency' => ['panel_logo_type', '==', 'image'],
				],
				[
					'id'          => 'panel_logo_max_width',
					'type'        => 'number',
					'unit'        => 'px',
					'title'       => esc_html__('Max Width', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Logo wrapper max width', 'grozomart-toolkit'),
					'output'      => '.tekprof-nav-menu .slide-panel-wrapper .slide-panel-logo',
					'output_mode' => 'max-width',
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'header_options',
			'title'  => esc_html__('Styling', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Header Styling', 'grozomart-toolkit'),
				],
				[
					'id'               => 'header_bg',
					'type'             => 'color',
					'title'            => esc_html__('Header Background', 'grozomart-toolkit'),
					'output'           => ['.main-header.menu-absolute .header-upper'],
					'output_mode'      => 'background-color',
					'output_important' => true,
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Menu Items', 'grozomart-toolkit'),
				],
				[
					'id'          => 'menu_item_color',
					'type'        => 'color',
					'title'       => esc_html__('Menu Item Color', 'grozomart-toolkit'),
					'desc'        => esc_html__('This is the menu item font color.', 'grozomart-toolkit'),
					'output'      => ['.main-header.white-menu .navbar-collapse > ul > li > a'],
					'output_mode' => 'color',
				],
				[
					'id'          => 'menu_item_hover_color',
					'type'        => 'color',
					'title'       => esc_html__('Active/Hover Color', 'grozomart-toolkit'),
					'desc'        => esc_html__('This is the menu item font color.', 'grozomart-toolkit'),
					'output'      => ['.main-header.white-menu .navbar-collapse > ul > li > a:hover'],
					'output_mode' => 'color',
				],
				[
					'id'     => 'menu_typography',
					'type'   => 'typography',
					'title'  => esc_html__('Menu Typography', 'grozomart-toolkit'),
					'color'  => false,
					'output' => '.default-header .nav-menu-wrapper .menu-item-link',
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Submenu', 'grozomart-toolkit'),
				],
				[
					'id'          => 'submenu_bg',
					'type'        => 'color',
					'title'       => esc_html__('Submenu Background', 'grozomart-toolkit'),
					'output'      => '.main-menu .navbar-collapse li ul',
					'output_mode' => 'background-color',
				],
				[
					'id'          => 'submenu_item_divider',
					'type'        => 'color',
					'title'       => esc_html__('Item Divider', 'grozomart-toolkit'),
					'output'      => '.main-menu .navbar-collapse li li',
					'output_mode' => 'border-color',
				],
				[
					'id'          => 'submenu_item_color',
					'type'        => 'color',
					'title'       => esc_html__('Item Color', 'grozomart-toolkit'),
					'output'      => '.main-menu .navbar-collapse li li a',
					'output_mode' => 'color',
				],
				[
					'id'          => 'submenu_item_hover_color',
					'type'        => 'color',
					'title'       => esc_html__('Item Hover Color', 'grozomart-toolkit'),
					'output'      => '.main-menu .navbar-collapse li li a:hover',
					'output_mode' => 'color',
				],
				[
					'id'     => 'submenu_typography',
					'type'   => 'typography',
					'title'  => esc_html__('Item Typography', 'grozomart-toolkit'),
					'color'  => false,
					'output' => '.main-menu .navbar-collapse li li a',
				],
			],
		]);
	}

	public function footer_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'footer_options',
			'title' => esc_html__('Footer', 'grozomart-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'footer_options',
			'title'  => esc_html__('General', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('General', 'grozomart-toolkit'),
				],
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for site footer then disable default theme header', 'grozomart-toolkit'),
				],
				[
					'id'       => 'default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Theme default footer', 'grozomart-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'enabled',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default theme footer. Set your site footer form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'footer_options',
			'title'  => esc_html__('Footer Copyright', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Footer', 'grozomart-toolkit'),
				],
				[
					'id'      => 'copyright_text',
					'type'    => 'textarea',
					'title'   => esc_html__('Copyright Text', 'grozomart-toolkit'),
					'default' => esc_html__('Copyright © 2025. All rights reserved.', 'grozomart-toolkit'),
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Style', 'grozomart-toolkit'),
				],
				[
					'id'          => 'copyright_color_bg',
					'type'        => 'color',
					'title'       => esc_html__('Copyright Background', 'grozomart-toolkit'),
					'output'      => '.tekprof-site-footer.default-footer',
					'output_mode' => 'background-color',
				],
				[
					'id'     => 'copyright_color',
					'type'   => 'color',
					'title'  => esc_html__('Copyright text color', 'grozomart-toolkit'),
					'output' => '.tekprof-site-footer .footer-copyright, .tekprof-site-footer .footer-copyright a',
				],
			],
		]);
	}

	public function page_title_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Page Title', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'grozomart-toolkit'),
				],
				[
					'id'      => 'site_page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Site Page Title', 'grozomart-toolkit'),
					'options' => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default' => 'enabled',
				],
				[
					'id'         => 'site_breadcrumb',
					'type'       => 'button_set',
					'title'      => esc_html__('Site Breadcrumb', 'grozomart-toolkit'),
					'options'    => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'    => 'enabled',
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Banner Content', 'grozomart-toolkit'),
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'         => 'breadcrumb_image',
					'type'       => 'media',
					'title'      => esc_html__('Breadcrumb Image', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Upload Breadcrumb Image', 'grozomart-toolkit'),
					'library'    => 'image',
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'grozomart-toolkit'),
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'grozomart-toolkit'),
					'output'     => '.page-title',
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'         => 'page_title_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Typography', 'grozomart-toolkit'),
					'output'     => '.page-title',
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'line_height_unit' => 'em',
					'title'            => esc_html__('Breadcrumb Typography', 'grozomart-toolkit'),
					'output'           => '.tekprof-breadcrumb, .tekprof-breadcrumb a, .tekprof-breadcrumb span',
					'dependency'       => ['site_page_title', '==', 'enabled'],
				],
			],
		]);
	}

	public function blog_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'blog_options',
			'title' => esc_html__('Blog', 'grozomart-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'blog_options',
			'title'  => esc_html__('Blog Archive', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Blog Archive', 'grozomart-toolkit'),
				],
				[
					'id'          => 'blog_archive_title',
					'type'        => 'text',
					'title'       => esc_html__('Blog Archive Title', 'grozomart-toolkit'),
					'subtitle'    => esc_html__('Archive page title.', 'grozomart-toolkit'),
					'placeholder' => esc_html__('Type title', 'grozomart-toolkit'),
					'default'     => esc_html__('Latest News', 'grozomart-toolkit'),
				],
				[
					'id'       => 'blog_archive_sidebar',
					'type'     => 'select',
					'title'    => esc_html__('Sidebar', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Select Blog Archive Sidebar. Left sidebar or right sidebar or No sidebar', 'grozomart-toolkit'),
					'options'  => [
						'left-sidebar'  => esc_html__('Left Sidebar', 'grozomart-toolkit'),
						'right-sidebar' => esc_html__('Right Sidebar', 'grozomart-toolkit'),
						'no-sidebar'    => esc_html__('No Sidebar', 'grozomart-toolkit'),
					],
					'default'  => 'right-sidebar',
				],
				[
					'id'       => 'archive_post_category',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Categories', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post categories on blog archive page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'archive_post_meta',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Meta', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post meta on blog archive page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'archive_meta_items',
					'type'       => 'sorter',
					'title'      => esc_html__('Meta Items', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Select ', 'grozomart-toolkit'),
					'default'    => [
						'enabled'  => [
							'author'   => esc_html__('Author', 'grozomart-toolkit'),
							'date'     => esc_html__('Date', 'grozomart-toolkit'),
							'comments' => esc_html__('Comments', 'grozomart-toolkit'),
						],
						'disabled' => [],
					],
					'dependency' => [
						'archive_post_meta',
						'==',
						'yes',
					],
				],
				[
					'id'       => 'archive_post_excerpt',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Excerpt', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post Excerpt on Blog Archive page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'archive_excerpt_count',
					'type'       => 'number',
					'title'      => esc_html__('Excerpt Word Count', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Set how many words you want to show in the post Excerpt', 'grozomart-toolkit'),
					'default'    => 30,
					'dependency' => [
						'archive_post_excerpt',
						'==',
						'yes',
					],
				],
				[
					'id'       => 'archive_post_button',
					'type'     => 'button_set',
					'title'    => esc_html__('Read More Button', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post Read More Button on Blog Archive page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'post_button_text',
					'type'       => 'text',
					'title'      => esc_html__('Button Text', 'grozomart-toolkit'),
					'default'    => esc_html__('Read More', 'grozomart-toolkit'),
					'dependency' => [
						'archive_post_button',
						'==',
						'yes',
					],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'blog_options',
			'title'  => esc_html__('Blog Single', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Blog single', 'grozomart-toolkit'),
				],
				[
					'id'      => 'blog_details_sidebar',
					'type'    => 'select',
					'title'   => esc_html__('Sidebar', 'grozomart-toolkit'),
					'options' => [
						'left-sidebar'  => esc_html__('Left Sidebar', 'grozomart-toolkit'),
						'right-sidebar' => esc_html__('Right Sidebar', 'grozomart-toolkit'),
						'no-sidebar'    => esc_html__('No Sidebar', 'grozomart-toolkit'),
					],
					'default' => 'right-sidebar',
					'desc'    => esc_html__('Select Blog Details Sidebar. Left sidebar or right sidebar or No sidebar', 'grozomart-toolkit'),
				],
				[
					'id'       => 'blog_details_category',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Categories', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post categories on blog single page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'blog_details_share',
					'type'     => 'button_set',
					'title'    => esc_html__('Show Post Share Links', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post social share links.', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'social_share_item',
					'type'       => 'sorter',
					'title'      => esc_html__('Social Share Links', 'grozomart-toolkit'),
					'default'    => [
						'enabled'  => [
							'facebook'  => esc_html__('Facebook', 'grozomart-toolkit'),
							'twitter'   => esc_html__('Twitter', 'grozomart-toolkit'),
							'pinterest' => esc_html__('Pinterest', 'grozomart-toolkit'),
							'linkedin'  => esc_html__('Linkedin', 'grozomart-toolkit'),
						],
						'disabled' => [
							'reddit'   => esc_html__('Reddit', 'grozomart-toolkit'),
							'whatsapp' => esc_html__('Whatsapp', 'grozomart-toolkit'),
							'telegram' => esc_html__('Telegram', 'grozomart-toolkit'),
						],
					],
					'dependency' => [
						'blog_details_share',
						'==',
						'yes',
					],
				],
				[
					'id'       => 'blog_details_tag',
					'type'     => 'button_set',
					'title'    => esc_html__('Related Tags', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable related tag on Blog Details page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'blog_details_nav',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Navigation', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post navigation on Blog Details page', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'blog_author_info',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Author', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post author information box.', 'grozomart-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'  => 'no',
				],
			],
		]);
	}

	public function portfolio_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Portfolio', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Portfolio', 'grozomart-toolkit'),
				],
				[
					'id'          => 'portfolio_slug',
					'type'        => 'text',
					'title'       => esc_html__('Portfolio Slug', 'grozomart-toolkit'),
					'placeholder' => esc_html__('portfolio', 'grozomart-toolkit'),
					'desc'        => esc_html__('You can customize the permalink structure (site_domain/post_type_slug/post_slug) by changing the post type slug (post_type_slug) from here. Don\'t forget to save the permalinks settings from Settings > Permalinks after changing the slug value.', 'grozomart-toolkit'),
				],
				[
					'id'       => 'portfolio_post_per_page',
					'type'     => 'number',
					'title'    => esc_html__('Post Per Page', 'grozomart-toolkit'),
					'default'  => 9,
					'subtitle' => esc_html__('Number of posts to show per page', 'grozomart-toolkit'),
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Portfolio Archive', 'grozomart-toolkit'),
				],
				[
					'id'       => 'archive_page_title',
					'type'     => 'text',
					'title'    => esc_html__('Page Title', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Archive Page Title', 'grozomart-toolkit'),
					'default'  => esc_html__('Our Portfolio', 'grozomart-toolkit'),
				],
				[
					'id'      => 'archive_portfolio_design',
					'type'    => 'select',
					'title'   => esc_html__('Portfolio Design', 'grozomart-toolkit'),
					'options' => [
						'design-one'   => esc_html__('Design One', 'grozomart-toolkit'),
						'design-two'   => esc_html__('Design Two', 'grozomart-toolkit'),
						'design-three' => esc_html__('Design Three', 'grozomart-toolkit'),
						'design-four'  => esc_html__('Design Four', 'grozomart-toolkit'),
					],
					'default' => 'design-one'
				]
			],
		]);
	}

	public function shop_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'     => 'shop_options',
			'title'  => esc_html__('Shop', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Shop', 'grozomart-toolkit'),
				],
				[
					'id'      => 'product_loop_columns',
					'type'    => 'button_set',
					'title'   => esc_html__('Columns', 'grozomart-toolkit'),
					'options' => [
						'1' => esc_html__('One', 'grozomart-toolkit'),
						'2' => esc_html__('Two', 'grozomart-toolkit'),
						'3' => esc_html__('Three', 'grozomart-toolkit'),
						'4' => esc_html__('Four', 'grozomart-toolkit'),
						'5' => esc_html__('Five', 'grozomart-toolkit'),
						'6' => esc_html__('Six', 'grozomart-toolkit'),
					],
					'default' => '4',
					'desc'    => esc_html__('How many column should be shown per row?', 'grozomart-toolkit'),
				],
				[
					'id'      => 'product_loop_per_page',
					'type'    => 'number',
					'title'   => esc_html__('Product Per page', 'grozomart-toolkit'),
					'default' => 12,
					'desc'    => esc_html__('How many products should be shown per page?', 'grozomart-toolkit'),
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Related Product', 'grozomart-toolkit'),
				],
				[
					'id'      => 'enable_related_product',
					'type'    => 'switcher',
					'title'   => esc_html__('Related Product', 'grozomart-toolkit'),
					'default' => true,
				],

				[
					'id'      => 'related_product_columns',
					'type'    => 'button_set',
					'title'   => esc_html__('Columns', 'grozomart-toolkit'),
					'options' => [
						'1' => esc_html__('One', 'grozomart-toolkit'),
						'2' => esc_html__('Two', 'grozomart-toolkit'),
						'3' => esc_html__('Three', 'grozomart-toolkit'),
						'4' => esc_html__('Four', 'grozomart-toolkit'),
						'5' => esc_html__('Five', 'grozomart-toolkit'),
						'6' => esc_html__('Six', 'grozomart-toolkit'),
					],
					'default' => '4',
					'desc'    => esc_html__('How many column should be shown per row?', 'grozomart-toolkit'),
				],
				[
					'id'      => 'related_product_per_page',
					'type'    => 'number',
					'title'   => esc_html__('Product Per page', 'grozomart-toolkit'),
					'default' => 4,
					'desc'    => esc_html__('How many products should be shown per page?', 'grozomart-toolkit'),
				],
			],
		]);
	}

	public function color_scheme_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Color Scheme', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Color Scheme', 'grozomart-toolkit'),
				],
				[
					'id'       => 'primary_color',
					'type'     => 'color',
					'title'    => esc_html__('Primary', 'grozomart-toolkit'),
					'default'  => '#FC5546',
					'subtitle' => esc_html__('Your main brand color. Used by most elements throughout the website.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #FC5546', 'grozomart-toolkit'),
				],
				[
					'id'       => 'secondary_color',
					'type'     => 'color',
					'title'    => esc_html__('Secondary', 'grozomart-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Your secondary brand color. Used mainly as hover color or by secondary elements.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'grozomart-toolkit'),
				],
				[
					'id'       => 'blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Blue', 'grozomart-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'grozomart-toolkit'),
				],
				[
					'id'       => 'nav_blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Nav Blue', 'grozomart-toolkit'),
					'default'  => '#151F39',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #151F39', 'grozomart-toolkit'),
				],
				[
					'id'       => 'body_color',
					'type'     => 'color',
					'title'    => esc_html__('Body', 'grozomart-toolkit'),
					'default'  => '#5B5B5B',
					'subtitle' => esc_html__('A neutral grey, easy to read color, used by all text elements.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #5B5B5B', 'grozomart-toolkit'),
				],
				[
					'id'       => 'heading_color',
					'type'     => 'color',
					'title'    => esc_html__('Heading', 'grozomart-toolkit'),
					'default'  => '#0B0C0C',
					'subtitle' => esc_html__('A dark, contrasting color, used by all headlines in your website.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #0B0C0C', 'grozomart-toolkit'),
				],
				[
					'id'       => 'gray_color',
					'type'     => 'color',
					'title'    => esc_html__('Gray Color', 'grozomart-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('A common light color for all Gray in your website.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'grozomart-toolkit'),
				],
				[
					'id'       => 'light_neutral',
					'type'     => 'color',
					'title'    => esc_html__('Light Color', 'grozomart-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('Generally used as background color for light, alternating sections.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'grozomart-toolkit'),
				],
			],
		]);
	}

	public function typography_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Typography', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Typography', 'grozomart-toolkit'),
				],
				[
					'id'                 => 'primary_font',
					'type'               => 'typography',
					'title'              => esc_html__('Base Font', 'grozomart-toolkit'),
					'subtitle'           => esc_html__('The main font of your website. The most readable font, used by all text elements.', 'grozomart-toolkit'),
					'font_weight'        => true,
					'font_style'         => true,
					'extra_styles'       => true,
					'font_size'          => false,
					'line_height'        => false,
					'letter_spacing'     => false,
					'text_align'         => false,
					'text_transform'     => false,
					'color'              => false,
					'backup_font_family' => true,
					'subset'             => true,
					'preview'            => false,
				],
				[
					'id'                 => 'secondary_font',
					'type'               => 'typography',
					'title'              => esc_html__('Heading Font', 'grozomart-toolkit'),
					'subtitle'           => esc_html__('The secondary font of your website. Used by secondary headlines and smaller elements.', 'grozomart-toolkit'),
					'font_weight'        => true,
					'font_style'         => true,
					'extra_styles'       => true,
					'font_size'          => false,
					'line_height'        => false,
					'letter_spacing'     => false,
					'text_align'         => false,
					'text_transform'     => false,
					'color'              => false,
					'backup_font_family' => true,
					'subset'             => true,
					'preview'            => false,
				],
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('For better performance, it\'s recommended you limit typography to two font families.', 'grozomart-toolkit'),
				],
				[
					'id'      => 'body_typo_types',
					'type'    => 'button_set',
					'title'   => esc_html__('Body Typography', 'grozomart-toolkit'),
					'options' => [
						'default-font' => esc_html__('Default', 'grozomart-toolkit'),
						'custom-font'  => esc_html__('Custom', 'grozomart-toolkit'),
					],
					'default' => 'default-font',
				],
				[
					'id'         => 'body_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Body', 'grozomart-toolkit'),
					'output'     => 'body',
					'preview'    => false,
					'dependency' => [
						'body_typo_types',
						'==',
						'custom-font',
					],
				],
				[
					'id'      => 'heading_typo_type',
					'type'    => 'button_set',
					'title'   => esc_html__('Heading Typography', 'grozomart-toolkit'),
					'options' => [
						'default-font' => esc_html__('Default', 'grozomart-toolkit'),
						'custom-font'  => esc_html__('Custom', 'grozomart-toolkit'),
					],
					'default' => 'default-font',
				],
				[
					'id'         => 'heading1_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 1', 'grozomart-toolkit'),
					'output'     => 'h1',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading2_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 2', 'grozomart-toolkit'),
					'output'     => 'h2',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading3_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 3', 'grozomart-toolkit'),
					'output'     => 'h3',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading4_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 4', 'grozomart-toolkit'),
					'output'     => 'h4',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading5_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 5', 'grozomart-toolkit'),
					'output'     => 'h5',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading6_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 6', 'grozomart-toolkit'),
					'output'     => 'h6',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
			],
		]);
	}

	public function error_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('404 Page', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('404 Page', 'grozomart-toolkit'),
				],
				[
					'id'      => 'error_title',
					'type'    => 'text',
					'title'   => esc_html__('Title', 'grozomart-toolkit'),
					'default' => esc_html__('OPPS!', 'grozomart-toolkit'),
				],
				[
					'id'      => 'error_bottom_message',
					'type'    => 'textarea',
					'title'   => esc_html__('Message', 'grozomart-toolkit'),
					'default' => esc_html__('The page you are looking for does not exist or has been moved', 'grozomart-toolkit'),
				],
				[
					'id'      => 'error_button_text',
					'type'    => 'text',
					'title'   => esc_html__('Error Button Text', 'grozomart-toolkit'),
					'default' => esc_html__('Go to Home', 'grozomart-toolkit'),
				],
				[
					'id'           => 'error_page_image',
					'type'         => 'media',
					'title'        => esc_html__('Error Page Image', 'grozomart-toolkit'),
					'subtitle'     => esc_html__('Upload OR Select image for 404 page', 'grozomart-toolkit'),
					'library'      => 'image',
					'url'          => false,
					'default'      => [
						'url'       => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/error-404.png',
						'thumbnail' => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/error-404.png',
					],
					'preview_size' => 'full',
				],
			],
		]);
	}

	public function mailchimp_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Mailchimp  Api', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Insert Mailchimp Api', 'grozomart-toolkit'),
				],
				[
					'id'      => 'api',
					'type'    => 'text',
					'title'   => esc_html__('Api', 'grozomart-toolkit'),
				],
				[
					'id'      => 'subscribe_list_id',
					'type'    => 'text',
					'title'   => esc_html__('Subscribe List Id', 'grozomart-toolkit'),
				],
				[
					'id'      => 'success_message',
					'type'    => 'text',
					'title'   => esc_html__('Success Message', 'grozomart-toolkit'),
					'default'   => esc_html__('Your email has been subscribed successfully.', 'grozomart-toolkit'),
				],
				[
					'id'      => 'already_subscribed_message',
					'type'    => 'text',
					'title'   => esc_html__('Already Subscribed Message', 'grozomart-toolkit'),
					'default'   => esc_html__('Your email has already been subscribed.', 'grozomart-toolkit'),
				],
				[
					'id'      => 'error_message',
					'type'    => 'text',
					'title'   => esc_html__('Error Message', 'grozomart-toolkit'),
					'default'   => esc_html__('Something went wrong, please try again later.', 'grozomart-toolkit'),
				],
			],
		]);
	}

	public function maintenance_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Maintenance Mode', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Maintenance Mode', 'grozomart-toolkit'),
				],
				[
					'id'       => 'maintenance_mode',
					'type'     => 'button_set',
					'title'    => esc_html__('Maintenance Mode', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable maintenance mode top your website.', 'grozomart-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'disabled',
				],
				[
					'id'          => 'maintenance_page',
					'type'        => 'select',
					'title'       => esc_html__('Maintenance Page', 'grozomart-toolkit'),
					'placeholder' => esc_html__('Default', 'grozomart-toolkit'),
					'options'     => 'pages',
					'dependency'  => ['maintenance_mode', '==', 'enabled'],
				],
				[
					'id'         => 'maintenance_title',
					'type'       => 'text',
					'title'      => esc_html__('Maintenance Title', 'grozomart-toolkit'),
					'default'    => esc_html__('The site is currently down for maintenance', 'grozomart-toolkit'),
					'dependency' => [
						['maintenance_mode', '==', 'enabled'],
						['maintenance_page', '==', ''],
					],
				],
				[
					'id'         => 'maintenance_subtitle',
					'type'       => 'textarea',
					'title'      => esc_html__('Maintenance Subtitle', 'grozomart-toolkit'),
					'default'    => esc_html__('We apologize for any inconvenience caused', 'grozomart-toolkit'),
					'dependency' => [
						['maintenance_mode', '==', 'enabled'],
						['maintenance_page', '==', ''],
					],
				],
				[
					'id'         => 'maintenance_img',
					'type'       => 'media',
					'title'      => esc_html__('Maintenance Img', 'grozomart-toolkit'),
					'subtitle'   => esc_html__('Upload OR Select a illustration for maintenance page', 'grozomart-toolkit'),
					'library'    => 'image',
					'url'        => false,
					'default'    => [
						'url'       => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/maintenance.png',
						'thumbnail' => GROZOMART_TOOLKIT_THEME_ASSETS . '/img/maintenance.png',
					],
					'dependency' => [
						['maintenance_mode', '==', 'enabled'],
						['maintenance_page', '==', ''],
					],
				],
			],
		]);
	}

	public function custom_scrips_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Custom Scripts', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Custom Scripts', 'grozomart-toolkit'),
				],
				[
					'id'       => 'custom_header_scripts',
					'type'     => 'code_editor',
					'title'    => esc_html__('Js Code(Head)', 'grozomart-toolkit'),
					'settings' => [
						'theme' => 'mbo',
						'mode'  => 'javascript',
					],
					'subtitle' => esc_html__('Add your custom js code here. Must Be type without script tag and valid code, It will insert the code to wp_head hook.', 'grozomart-toolkit'),
				],
				[
					'id'       => 'custom_footer_scripts',
					'type'     => 'code_editor',
					'title'    => esc_html__('Js Code(Footer)', 'grozomart-toolkit'),
					'settings' => [
						'theme' => 'mbo',
						'mode'  => 'javascript',
					],
					'subtitle' => esc_html__('Add your custom js code here. Must Be type without script tag and valid code, It will insert the code to wp_footer hook.', 'grozomart-toolkit'),
				],
				[
					'type'    => 'submessage',
					'style'   => 'info',
					'content' => esc_html__('You Can add also custom css in Appearance>Customize>Additional CSS', 'grozomart-toolkit'),
				],
			],
		]);
	}

	public function backup_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Backup', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Backup', 'grozomart-toolkit'),
				],
				[
					'type' => 'backup',
				],
			],
		]);
	}

	public function add_dashboard_banner()
	{
		Grozomart_Admin_Panel::render_heading();
	}

	public function update_color_palette()
	{
		$colors    = Grozomart_Helper::get_global_colors();
		$new_color = [];

		foreach ($colors as $color) {
			$new_color[] = $color['value'];
		}

		return $new_color;
	}

	public function after_saved()
	{
		if (get_option('grozomart_update_elementor_kit') !== false) {
			update_option('grozomart_update_elementor_kit', 'yes');
		} else {
			add_option('grozomart_update_elementor_kit', 'yes');
		}
	}
}

Grozomart_Options::instance();
