<?php

namespace GrozomartToolkit\Helper;

use CSF;

defined('ABSPATH') || exit;

class Grozomart_Metaboxes
{

	protected static $instance = null;

	private $post_prefix = 'grozomart_post_meta';
	private $page_prefix = 'grozomart_page_meta';
	private $portfolio_prefix = 'grozomart_portfolio_meta';
	private $nav_menu_prefix = 'grozomart_nav_menu_meta';
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

		$this->page_metaboxes();
		$this->post_metaboxes();
		$this->portfolio_metaboxes();
		$this->nav_menu_metaboxes();
	}

	public function page_metaboxes()
	{
		CSF::createMetabox($this->page_prefix, [
			'title'        => esc_html__('Grozomart Page Options', 'grozomart-toolkit'),
			'post_type'    => 'page',
			'show_restore' => true,
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Layout', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Layout', 'grozomart-toolkit'),
				],
				[
					'id'       => 'site_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Set the page layout.', 'grozomart-toolkit'),
					'options'  => [
						'default'    => esc_html__('Theme Default', 'grozomart-toolkit'),
						'full-width' => esc_html__('Full Width', 'grozomart-toolkit'),
						'boxed'      => esc_html__('Boxed', 'grozomart-toolkit'),
					],
					'default'  => 'default',
				],
				// [
				// 	'id'         => 'content_spacing',
				// 	'type'       => 'spacing',
				// 	'title'      => esc_html__('Content Spacing', 'grozomart-toolkit'),
				// 	'show_units' => false,
				// 	'left'       => false,
				// 	'right'      => false,
				// 	'desc'       => esc_html__('Default top: 125px, bottom: 125px', 'grozomart-toolkit'),
				// 	'output'     => '.container-gap',
				// ],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Header', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for page header then disable default header', 'grozomart-toolkit'),
				],
				[
					'id'       => 'page_default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable page default header. Default comes form theme option', 'grozomart-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default header. Set your page header form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'page_default_header',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Page Title', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'grozomart-toolkit'),
				],
				[
					'id'      => 'page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Page Title', 'grozomart-toolkit'),
					'options' => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default' => 'default',
				],
				[
					'id'         => 'page_title_type',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Title Type', 'grozomart-toolkit'),
					'options'    => [
						'default' => esc_html__('Default', 'grozomart-toolkit'),
						'custom'  => esc_html__('Custom', 'grozomart-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'page_custom_title',
					'type'       => 'text',
					'title'      => esc_html__('Custom Title', 'grozomart-toolkit'),
					'dependency' => [
						['page_title', '!=', 'disabled'],
						['page_title_type', '==', 'custom'],
					],
				],
				[
					'id'         => 'page_breadcrumb',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Breadcrumb', 'grozomart-toolkit'),
					'options'    => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'customize_page_title_style',
					'type'       => 'button_set',
					'title'      => esc_html__('Customize Style', 'grozomart-toolkit'),
					'options'    => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'    => 'no',
					'dependency' => ['page_title', '!=', 'disabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'grozomart-toolkit'),
					'dependency' => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'grozomart-toolkit'),
					'output'     => '.page-title-wrapper',
					'dependency' => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'          => 'page_title_overly_color',
					'type'        => 'color',
					'title'       => esc_html__('Overly Color', 'grozomart-toolkit'),
					'output'      => '.page-title-wrapper::before',
					'output_mode' => 'background-color',
					'dependency'  => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_title_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Typography', 'grozomart-toolkit'),
					'output'           => '.page-title-wrapper .page-title',
					'line_height_unit' => 'em',
					'dependency'       => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Breadcrumb Typography', 'grozomart-toolkit'),
					'output'           => '.page-title-wrapper .breadcrumb, .page-title-wrapper .breadcrumb a',
					'line_height_unit' => 'em',
					'dependency'       => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Footer', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for page footer then disable default footer', 'grozomart-toolkit'),
				],
				[
					'id'       => 'page_default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable page default footer. Default comes form theme option', 'grozomart-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default footer. Set your page footer form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'page_default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Back to Top', 'grozomart-toolkit'),
			'fields' => [
				[
					'id'       => 'back_to_top_page',
					'type'     => 'button_set',
					'title'    => esc_html__('Back to Top', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Add a back to top button on bottom right corner.', 'grozomart-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'disabled',
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Color Scheme', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Color Scheme', 'grozomart-toolkit'),
				],
				[
					'id'       => 'page_custom_color_scheme',
					'type'     => 'button_set',
					'title'    => esc_html__('Enable Color', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Page Color Scheme', 'grozomart-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'disabled',

				],
				[
					'id'       => 'primary_color',
					'type'     => 'color',
					'title'    => esc_html__('Primary', 'grozomart-toolkit'),
					'default'  => '#FC5546',
					'subtitle' => esc_html__('Your main brand color. Used by most elements throughout the website.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #FC5546', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'secondary_color',
					'type'     => 'color',
					'title'    => esc_html__('Secondary', 'grozomart-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Your secondary brand color. Used mainly as hover color or by secondary elements.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Blue', 'grozomart-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'nav_blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Nav Blue', 'grozomart-toolkit'),
					'default'  => '#151F39',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #151F39', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'body_color',
					'type'     => 'color',
					'title'    => esc_html__('Body', 'grozomart-toolkit'),
					'default'  => '#5B5B5B',
					'subtitle' => esc_html__('A neutral grey, easy to read color, used by all text elements.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #5B5B5B', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'heading_color',
					'type'     => 'color',
					'title'    => esc_html__('Heading', 'grozomart-toolkit'),
					'default'  => '#0B0C0C',
					'subtitle' => esc_html__('A dark, contrasting color, used by all headlines in your website.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #0B0C0C', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'gray_color',
					'type'     => 'color',
					'title'    => esc_html__('Gray Color', 'grozomart-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('A common light color for all Gray in your website.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'light_neutral',
					'type'     => 'color',
					'title'    => esc_html__('Light Color', 'grozomart-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('Generally used as background color for light, alternating sections.', 'grozomart-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'grozomart-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Typography', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Typography', 'grozomart-toolkit'),
				],
				[
					'id'      => 'custom_typo_type',
					'type'    => 'button_set',
					'title'   => esc_html__('Custom Typography', 'grozomart-toolkit'),
					'options' => [
						'default-font' => esc_html__('Default', 'grozomart-toolkit'),
						'custom-font'  => esc_html__('Custom', 'grozomart-toolkit'),
					],
					'default' => 'default-font',
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
					'dependency' => [
						'custom_typo_type',
						'==',
						'custom-font',
					],
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
					'dependency' => [
						'custom_typo_type',
						'==',
						'custom-font',
					],
				],

			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Body Class', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Add Body Class', 'grozomart-toolkit'),
				],
				[
					'id'       => 'body_class',
					'type'     => 'text',
					'title'    => esc_html__('Body Class', 'grozomart-toolkit'),
					'default'  => '',
					'subtitle' => esc_html__('Append a class in body tag', 'grozomart-toolkit'),
				],
			],
		]);
	}

	public function post_metaboxes()
	{
		CSF::createMetabox($this->post_prefix, [
			'title'        => esc_html__('Grozomart Post Options', 'grozomart-toolkit'),
			'post_type'    => 'post',
			'show_restore' => true,
		]);

		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Layout', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Post Layout', 'grozomart-toolkit'),
				],
				[
					'id'       => 'post_details_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Set the post layout.', 'grozomart-toolkit'),
					'options'  => [
						'default'    => esc_html__('Theme Default', 'grozomart-toolkit'),
						'full-width' => esc_html__('Full Width', 'grozomart-toolkit'),
						'boxed'      => esc_html__('Boxed', 'grozomart-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'id'       => 'post_details_sidebar',
					'type'     => 'select',
					'title'    => esc_html__('Sidebar', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Select Blog Archive Sidebar. Left sidebar or right sidebar or No sidebar', 'grozomart-toolkit'),
					'options'  => [
						'default'       => esc_html__('Theme Default', 'grozomart-toolkit'),
						'left-sidebar'  => esc_html__('Left Sidebar', 'grozomart-toolkit'),
						'right-sidebar' => esc_html__('Right Sidebar', 'grozomart-toolkit'),
						'no-sidebar'    => esc_html__('No Sidebar', 'grozomart-toolkit'),
					],
					'default'  => 'right-sidebar',
				],
				// [
				// 	'id'         => 'content_spacing',
				// 	'type'       => 'spacing',
				// 	'title'      => esc_html__('Content Spacing', 'grozomart-toolkit'),
				// 	'show_units' => false,
				// 	'left'       => false,
				// 	'right'      => false,
				// 	'desc'       => esc_html__('Default top: 125px, bottom: 125px', 'grozomart-toolkit'),
				// 	'output'     => '.container-gap',
				// ],
			],
		]);

		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Header', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post header then disable default header', 'grozomart-toolkit'),
				],
				[
					'id'       => 'post_default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default header. Default comes form theme option', 'grozomart-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default header. Set your post header form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'post_default_header',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Page Title', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'grozomart-toolkit'),
				],
				[
					'id'      => 'post_page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Page Title', 'grozomart-toolkit'),
					'options' => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default' => 'default',
				],
				[
					'id'         => 'post_title_type',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Title Type', 'grozomart-toolkit'),
					'options'    => [
						'default' => esc_html__('Default', 'grozomart-toolkit'),
						'custom'  => esc_html__('Custom', 'grozomart-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['post_page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'post_custom_title',
					'type'       => 'text',
					'title'      => esc_html__('Custom Title', 'grozomart-toolkit'),
					'dependency' => [
						['post_page_title', '!=', 'disabled'],
						['post_title_type', '==', 'custom'],
					],
				],
				[
					'id'         => 'customize_page_title_style',
					'type'       => 'button_set',
					'title'      => esc_html__('Customize Style', 'grozomart-toolkit'),
					'options'    => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'    => 'no',
					'dependency' => ['post_page_title', '!=', 'disabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'grozomart-toolkit'),
					'dependency' => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'grozomart-toolkit'),
					'output'     => '.page-title-wrapper',
					'dependency' => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'          => 'post_title_overly_color',
					'type'        => 'color',
					'title'       => esc_html__('Overly Color', 'grozomart-toolkit'),
					'output'      => '.page-title-wrapper::before',
					'output_mode' => 'background-color',
					'dependency'  => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_title_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Typography', 'grozomart-toolkit'),
					'output'           => '.page-title-wrapper .page-title',
					'line_height_unit' => 'em',
					'dependency'       => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Breadcrumb Typography', 'grozomart-toolkit'),
					'output'           => '.page-title-wrapper .breadcrumb, .page-title-wrapper .breadcrumb a',
					'line_height_unit' => 'em',
					'dependency'       => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
			],
		]);



		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Footer', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post footer then disable default footer', 'grozomart-toolkit'),
				],
				[
					'id'       => 'post_default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default footer. Default comes form theme option', 'grozomart-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default footer. Set your post footer form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'post_default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);
	}

	public function portfolio_metaboxes()
	{
		CSF::createMetabox($this->portfolio_prefix, [
			'title'        => esc_html__('Grozomart Portfolio Options', 'grozomart-toolkit'),
			'post_type'    => 'grozomart_portfolio',
			'show_restore' => true,
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Layout', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Post Layout', 'grozomart-toolkit'),
				],
				[
					'id'       => 'portfolio_details_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Set the post layout.', 'grozomart-toolkit'),
					'options'  => [
						'default'    => esc_html__('Theme Default', 'grozomart-toolkit'),
						'full-width' => esc_html__('Full Width', 'grozomart-toolkit'),
						'boxed'      => esc_html__('Boxed', 'grozomart-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'id'         => 'content_spacing',
					'type'       => 'spacing',
					'title'      => esc_html__('Content Spacing', 'grozomart-toolkit'),
					'show_units' => false,
					'left'       => false,
					'right'      => false,
					'desc'       => esc_html__('Default top: 125px, bottom: 125px', 'grozomart-toolkit'),
					'output'     => '.container-gap',
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Header', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post header then disable default header', 'grozomart-toolkit'),
				],
				[
					'id'       => 'portfolio_default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default header. Default comes form theme option', 'grozomart-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default header. Set your post header form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'portfolio_default_header',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Page Title', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'grozomart-toolkit'),
				],
				[
					'id'      => 'portfolio_page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Page Title', 'grozomart-toolkit'),
					'options' => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default' => 'default',
				],
				[
					'id'         => 'portfolio_page_title_type',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Title Type', 'grozomart-toolkit'),
					'options'    => [
						'default' => esc_html__('Default', 'grozomart-toolkit'),
						'custom'  => esc_html__('Custom', 'grozomart-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['portfolio_page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'portfolio_custom_title',
					'type'       => 'text',
					'title'      => esc_html__('Custom Title', 'grozomart-toolkit'),
					'dependency' => [
						['portfolio_page_title', '!=', 'disabled'],
						['portfolio_page_title_type', '==', 'custom'],
					],
				],
				[
					'id'         => 'portfolio_breadcrumb',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Breadcrumb', 'grozomart-toolkit'),
					'options'    => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['portfolio_page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'customize_page_title_style',
					'type'       => 'button_set',
					'title'      => esc_html__('Customize Style', 'grozomart-toolkit'),
					'options'    => [
						'yes' => esc_html__('Yes', 'grozomart-toolkit'),
						'no'  => esc_html__('No', 'grozomart-toolkit'),
					],
					'default'    => 'no',
					'dependency' => ['portfolio_page_title', '!=', 'disabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'grozomart-toolkit'),
					'dependency' => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'grozomart-toolkit'),
					'output'     => '.page-title-wrapper',
					'dependency' => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'          => 'post_title_overly_color',
					'type'        => 'color',
					'title'       => esc_html__('Overly Color', 'grozomart-toolkit'),
					'output'      => '.page-title-wrapper::before',
					'output_mode' => 'background-color',
					'dependency'  => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_title_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Typography', 'grozomart-toolkit'),
					'output'           => '.page-title-wrapper .page-title',
					'line_height_unit' => 'em',
					'dependency'       => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Breadcrumb Typography', 'grozomart-toolkit'),
					'output'           => '.page-title-wrapper .breadcrumb, .page-title-wrapper .breadcrumb a',
					'line_height_unit' => 'em',
					'dependency'       => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Summary Text', 'grozomart-toolkit'),
			'fields' => [
				[
					'id'          => 'summary_text',
					'type'        => 'textarea',
					'title'       => esc_html__('Summary Text', 'grozomart-toolkit'),
					'placeholder' => esc_html__('Enter a summary text.', 'grozomart-toolkit'),
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Footer', 'grozomart-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post footer then disable default footer', 'grozomart-toolkit'),
				],
				[
					'id'       => 'portfolio_default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'grozomart-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default footer. Default comes form theme option', 'grozomart-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'grozomart-toolkit'),
						'enabled'  => esc_html__('Enable', 'grozomart-toolkit'),
						'disabled' => esc_html__('Disable', 'grozomart-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default footer. Set your post footer form ', 'grozomart-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'grozomart-toolkit') . '</a>',
					'dependency' => [
						'portfolio_default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);
	}

	public function nav_menu_metaboxes()
	{
		CSF::createNavMenuOptions($this->nav_menu_prefix);

		CSF::createSection($this->nav_menu_prefix, [
			'title'  => esc_html__('Grozomart Options', 'grozomart-toolkit'),
			'fields' => [
				[
					'id'      => 'nav_icon_type',
					'type'    => 'button_set',
					'title'   => esc_html__('Icon Type', 'grozomart-toolkit'),
					'options' => [
						'font_icon'  => esc_html__('Font Icon', 'grozomart-toolkit'),
						'image_icon' => esc_html__('Image Icon', 'grozomart-toolkit'),
						'none'       => esc_html__('None', 'grozomart-toolkit'),
					],
					'default' => 'none'
				],
				[
					'id'         => 'nav_font_icon',
					'type'       => 'icon',
					'title'      => esc_html__('Font Icon', 'grozomart-toolkit'),
					'dependency' => [
						'nav_icon_type',
						'==',
						'font_icon',
					],
				],
				[
					'id'           => 'nav_image_icon',
					'type'         => 'media',
					'title'        => esc_html__('Image', 'grozomart-toolkit'),
					'library'      => 'image',
					'preview_size' => 'thumbnail',
					'dependency'   => [
						'nav_icon_type',
						'==',
						'image_icon',
					],
				],
				[
					'id'         => 'nav_icon_color',
					'type'       => 'color',
					'title'      => esc_html__('Icon Color', 'grozomart-toolkit'),
					'dependency' => [
						'nav_icon_type',
						'==',
						'font_icon',
					],
				],
				[
					'id'         => 'nav_icon_position',
					'type'       => 'select',
					'title'      => esc_html__('Icon Position', 'grozomart-toolkit'),
					'options'    => [
						'left'  => esc_html__('Left', 'grozomart-toolkit'),
						'right' => esc_html__('Right', 'grozomart-toolkit'),
					],
					'dependency' => [
						'nav_icon_type',
						'!=',
						'none',
					],
				],
				[
					'id'          => 'nav_menu_badge',
					'type'        => 'text',
					'title'       => esc_html__('Badge', 'grozomart-toolkit'),
					'placeholder' => esc_html__('Enter a nav menu badge. Example "New"', 'grozomart-toolkit'),
				],
				[
					'id'         => 'nav_badge_color',
					'type'       => 'color',
					'title'      => esc_html__('Badge Color', 'grozomart-toolkit'),
					'dependency' => [
						'nav_menu_badge',
						'!=',
						'',
					],
				],
				// [
				// 	'id'      => 'simple_mega_menu',
				// 	'type'    => 'switcher',
				// 	'title'   => esc_html__('Use Simple Menu', 'grozomart-toolkit'),
				// 	'default' => false,
				// 	'class'   => 'simple-mega-menu-meta'
				// ],
				// [
				// 	'id'         => 'simple_mega_menu_width',
				// 	'type'       => 'select',
				// 	'title'      => esc_html__('Mega Menu Width', 'grozomart-toolkit'),
				// 	'options'    => [
				// 		'auto'      => esc_html__('Auto', 'grozomart-toolkit'),
				// 		'menu-area' => esc_html__('Menu Area', 'grozomart-toolkit'),
				// 	],
				// 	'default'    => 'auto',
				// 	'dependency' => [
				// 		'simple_mega_menu',
				// 		'==',
				// 		'true',
				// 	],
				// 	'class'      => 'simple-mega-menu-meta'
				// ]
			],
		]);
	}
}

Grozomart_Metaboxes::instance();
