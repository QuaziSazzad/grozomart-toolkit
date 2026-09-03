<?php

namespace GrozomartToolkit\TemplateBuilder;

use CSF;

defined('ABSPATH') || exit;

class Template_Metaboxes
{

	protected static $instance = null;

	private $prefix = 'grozomart_template_meta';

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

		$this->init_metaboxes();

		add_filter('wp_nav_menu_item_custom_fields', [$this, 'mega_menu_meta_fields'], 10, 2);
		add_action('wp_update_nav_menu_item', [$this, 'save_mega_menu_meta'], 10, 3);
	}

	public function init_metaboxes()
	{
		CSF::createMetabox($this->prefix, [
			'title'        => esc_html__('Template Settings', 'grozomart-toolkit'),
			'post_type'    => 'grozomart_template',
			'show_restore' => true,
			'theme'        => 'dark',
			'data_type'    => 'unserialize',
		]);

		CSF::createSection($this->prefix, [
			'fields' => [
				[
					'id'     => 'grozomart_tb_settings',
					'type'   => 'fieldset',
					'title'  => esc_html__('Common Settings', 'grozomart-toolkit'),
					'fields' => [
						[
							'id'          => 'template_type',
							'type'        => 'select',
							'title'       => esc_html__('Template Type', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Type', 'grozomart-toolkit'),
							'options'     => [
								'header'    => esc_html__('Header', 'grozomart-toolkit'),
								'footer'    => esc_html__('Footer', 'grozomart-toolkit'),
								'mega_menu' => esc_html__('Mega Menu', 'grozomart-toolkit'),
								'block'     => esc_html__('Block', 'grozomart-toolkit'),
								'popup'     => esc_html__('Popup', 'grozomart-toolkit'),
								'offcanvas' => esc_html__('OffCanvas', 'grozomart-toolkit'),
							],
							'default'     => 'block',
						],
						[
							'id'         => 'mega_menu_width',
							'type'       => 'select',
							'title'      => esc_html__('Mega Menu Width', 'grozomart-toolkit'),
							'subtitle'   => esc_html__('Default is full width.', 'grozomart-toolkit'),
							'options'    => [
								'full'       => esc_html__('Full', 'grozomart-toolkit'),
								'container'  => esc_html__('Container', 'grozomart-toolkit'),
								'menu-area' => esc_html__('Menu Area', 'grozomart-toolkit'),
								'custom'     => esc_html__('Custom', 'grozomart-toolkit'),
							],
							'default'    => 'full',
							'dependency' => ['template_type', '==', 'mega_menu'],
						],
						[
							'id'         => 'set_mega_menu_width',
							'type'       => 'dimensions',
							'title'      => esc_html__('Menu Custom Width', 'grozomart-toolkit'),
							'default'    => [
								'width' => '1650',
							],
							'height'     => false,
							'units'      => ['px'],
							'show_units' => false,
							'dependency' => ['template_type|mega_menu_width', '==|==', 'mega_menu|custom'],
						],
						[
							'id'         => 'popup_width',
							'type'       => 'select',
							'title'      => esc_html__('Popup Width', 'grozomart-toolkit'),
							'subtitle'   => esc_html__('Select or type a value (PX)', 'grozomart-toolkit'),
							'options'    => [
								'full'   => esc_html__('Full', 'grozomart-toolkit'),
								'custom' => esc_html__('Custom', 'grozomart-toolkit'),
							],
							'default'    => 'custom',
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'set_popup_width',
							'type'       => 'dimensions',
							'title'      => esc_html__('Popup Width', 'grozomart-toolkit'),
							'default'    => [
								'width' => '820',
							],
							'height'     => false,
							'units'      => ['px'],
							'show_units' => false,
							'dependency' => ['template_type|popup_width', '==|==', 'popup|custom'],
						],
						[
							'id'         => 'popup_height',
							'type'       => 'select',
							'title'      => esc_html__('Popup Height', 'grozomart-toolkit'),
							'subtitle'   => esc_html__('Set the popup max height.', 'grozomart-toolkit'),
							'options'    => [
								'fit_content' => esc_html__('Fit Content', 'grozomart-toolkit'),
								'full'        => esc_html__('Full', 'grozomart-toolkit'),
								'custom'      => esc_html__('Custom', 'grozomart-toolkit'),
							],
							'default'    => 'fit_content',
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'set_popup_height',
							'type'       => 'dimensions',
							'title'      => esc_html__('Height', 'grozomart-toolkit'),
							'default'    => [
								'height' => '520',
							],
							'width'      => false,
							'units'      => ['px'],
							'show_units' => false,
							'dependency' => ['template_type|popup_height', '==|==', 'popup|custom'],
						],
						[
							'id'         => 'popup_position',
							'type'       => 'select',
							'title'      => esc_html__('Popup Position', 'grozomart-toolkit'),
							'subtitle'   => esc_html__('Choose the popup position on page.', 'grozomart-toolkit'),
							'options'    => [
								'center-center' => esc_html__('Center Center', 'grozomart-toolkit'),
								'center-left'   => esc_html__('Center Left', 'grozomart-toolkit'),
								'center-right'  => esc_html__('Center Right', 'grozomart-toolkit'),
								'bottom-center' => esc_html__('Bottom Center', 'grozomart-toolkit'),
								'top-center'    => esc_html__('Top Center', 'grozomart-toolkit'),
								'bottom-left'   => esc_html__('Bottom Left', 'grozomart-toolkit'),
								'top-left'      => esc_html__('Top Left', 'grozomart-toolkit'),
								'bottom-right'  => esc_html__('Bottom Right', 'grozomart-toolkit'),
								'top-right'     => esc_html__('Top Right', 'grozomart-toolkit'),
							],
							'default'    => 'center-center',
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'popup_bg_color',
							'type'       => 'color',
							'title'      => esc_html__('Popup Background Color', 'grozomart-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_overly_color',
							'type'       => 'color',
							'title'      => esc_html__('Popup Overly Color', 'grozomart-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_close_color',
							'type'       => 'color',
							'title'      => esc_html__('Popup Close Color', 'grozomart-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_close_bg',
							'type'       => 'color',
							'title'      => esc_html__('Popup Close Color', 'grozomart-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_close_size',
							'type'       => 'dimensions',
							'title'      => esc_html__('Popup Close Size', 'grozomart-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'units'      => ['px'],
							'show_units' => false,
						],
						[
							'id'         => 'popup_close_radius',
							'type'       => 'number',
							'title'      => esc_html__('Popup Close Radius', 'grozomart-toolkit'),
							'default'    => 0,
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'popup_delay',
							'type'       => 'number',
							'title'      => esc_html__('Popup Delay', 'grozomart-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => 3,
							'subtitle'   => esc_html__('Show when page is loaded (Second).', 'grozomart-toolkit'),
						],
						[
							'id'         => 'offcanvas_width',
							'type'       => 'dimensions',
							'title'      => esc_html__('Width', 'grozomart-toolkit'),
							'height'     => false,
							'units'      => ['px'],
							'default'    => [
								'width' => '420',
							],
							'show_units' => false,
							'dependency' => ['template_type', '==', 'offcanvas'],
						],
					],
				],
				[
					'id'           => 'grozomart_tb_include',
					'type'         => 'repeater',
					'title'        => esc_html__('Display On', 'grozomart-toolkit'),
					'subtitle'     => esc_html__('Select the locations where this item should be visible.', 'grozomart-toolkit'),
					'button_title' => esc_html__('Add Display Rule', 'grozomart-toolkit'),
					'dependency'   => ['template_type', 'any', 'header,footer,popup'],
					'fields'       => [
						[
							'type'    => 'subheading',
							'content' => esc_html__('Define Rule', 'grozomart-toolkit'),
						],
						[
							'id'      => 'rule',
							'type'    => 'select',
							'title'   => esc_html__('Display on', 'grozomart-toolkit'),
							'options' => [
								'entire_website'     => esc_html__('Entire Website', 'grozomart-toolkit'),
								'all_pages'          => esc_html__('All Pages', 'grozomart-toolkit'),
								'front_page'         => esc_html__('Front Page', 'grozomart-toolkit'),
								'post_page'          => esc_html__('Post Page', 'grozomart-toolkit'),
								'post_details'       => esc_html__('Post Details', 'grozomart-toolkit'),
								'all_archive'        => esc_html__('All Archive', 'grozomart-toolkit'),
								'date_archive'       => esc_html__('Date Archive', 'grozomart-toolkit'),
								'author_archive'     => esc_html__('Author Archive', 'grozomart-toolkit'),
								'search_page'        => esc_html__('Search Page', 'grozomart-toolkit'),
								'404_page'           => esc_html__('404 Page', 'grozomart-toolkit'),
								'specific_pages'     => esc_html__('Specific Pages', 'grozomart-toolkit'),
								'specific_posts'     => esc_html__('Specific Posts', 'grozomart-toolkit'),
								'shop_page'          => esc_html__('Shop Page', 'grozomart-toolkit'),
								'product_details'    => esc_html__('Product Details', 'grozomart-toolkit'),
								'specific_products'  => esc_html__('Specific Products', 'grozomart-toolkit'),
								'portfolio_details'  => esc_html__('Portfolio Details', 'grozomart-toolkit'),
								'specific_portfolio' => esc_html__('Specific Portfolio', 'grozomart-toolkit'),
							],
						],
						[
							'id'          => 'page_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Pages', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Pages', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'pages',
							'dependency'  => ['rule', '==', 'specific_pages'],
						],
						[
							'id'          => 'posts_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Posts', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Posts', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'posts',
							'dependency'  => ['rule', '==', 'specific_posts'],
						],
						[
							'id'          => 'product_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Products', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Products', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'product',
							],
							'dependency'  => ['rule', '==', 'specific_products'],
						],
						[
							'id'          => 'portfolio_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Portfolio', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Portfolio', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'grozomart_portfolio',
							],
							'dependency'  => ['rule', '==', 'specific_portfolio'],
						],
					],
				],
				[
					'id'           => 'grozomart_tb_exclude',
					'type'         => 'repeater',
					'title'        => esc_html__('Hide On', 'grozomart-toolkit'),
					'subtitle'     => esc_html__('Select the locations where this item should be visible.', 'grozomart-toolkit'),
					'button_title' => esc_html__('Add Hide Rule', 'grozomart-toolkit'),
					'dependency'   => ['template_type', 'any', 'header,footer,popup'],
					'fields'       => [
						[
							'type'    => 'subheading',
							'content' => esc_html__('Hide Rule', 'grozomart-toolkit'),
						],
						[
							'id'      => 'rule',
							'type'    => 'select',
							'title'   => esc_html__('Hide on', 'grozomart-toolkit'),
							'options' => [
								'entire_website'     => esc_html__('Entire Website', 'grozomart-toolkit'),
								'all_pages'          => esc_html__('All Pages', 'grozomart-toolkit'),
								'front_page'         => esc_html__('Front Page', 'grozomart-toolkit'),
								'post_page'          => esc_html__('Post Page', 'grozomart-toolkit'),
								'post_details'       => esc_html__('Post Details', 'grozomart-toolkit'),
								'all_archive'        => esc_html__('All Archive', 'grozomart-toolkit'),
								'date_archive'       => esc_html__('Date Archive', 'grozomart-toolkit'),
								'author_archive'     => esc_html__('Author Archive', 'grozomart-toolkit'),
								'search_page'        => esc_html__('Search Page', 'grozomart-toolkit'),
								'404_page'           => esc_html__('404 Page', 'grozomart-toolkit'),
								'specific_pages'     => esc_html__('Specific Pages', 'grozomart-toolkit'),
								'specific_posts'     => esc_html__('Specific Posts', 'grozomart-toolkit'),
								'shop_page'          => esc_html__('Shop Page', 'grozomart-toolkit'),
								'product_details'    => esc_html__('Product Details', 'grozomart-toolkit'),
								'specific_products'  => esc_html__('Specific Products', 'grozomart-toolkit'),
								'portfolio_details'  => esc_html__('Portfolio Details', 'grozomart-toolkit'),
								'specific_portfolio' => esc_html__('Specific Portfolio', 'grozomart-toolkit'),
							],
						],
						[
							'id'          => 'page_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Pages', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Pages', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'pages',
							'dependency'  => ['rule', '==', 'specific_pages'],
						],
						[
							'id'          => 'posts_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Posts', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Posts', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'posts',
							'dependency'  => ['rule', '==', 'specific_posts'],
						],
						[
							'id'          => 'product_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Products', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Products', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'product',
							],
							'dependency'  => ['rule', '==', 'specific_products'],
						],
						[
							'id'          => 'portfolio_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Portfolio', 'grozomart-toolkit'),
							'placeholder' => esc_html__('Select Portfolio', 'grozomart-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'grozomart_portfolio',
							],
							'dependency'  => ['rule', '==', 'specific_portfolio'],
						],
					],
				],
			],
		]);
	}

	public function mega_menu_meta_fields($item_id, $item)
	{
		if ($item->object === 'grozomart_template') {
			$post_type_object = get_post_type_object('grozomart_template');
			$url              = get_post_meta($item_id, '_grozomart_mega_menu_url', true);

			if (! $post_type_object) {
				return;
			}

			if (! current_user_can('edit_post', $item->object_id)) {
				return;
			}

			if ($post_type_object->_edit_link) {
				$link = admin_url(sprintf($post_type_object->_edit_link . '&action=elementor', $item->object_id));
			} else {
				$link = '';
			}

			wp_nonce_field('grozomart_mm_meta_action', 'grozomart_mm_meta_name');

			echo '<p class="description description-wide">
				<label for="edit-menu-item-url-' . $item_id . '">
					' . __('URL', 'grozomart-toolkit') . '<br>
					<input type="text" id="edit-menu-item-url-' . $item_id . '" class="widefat code edit-menu-item-url" name="menu-item-url[' . $item_id . ']" value="' . $url . '">
				</label>
			</p>';

			echo '<a style="display: inline-block; margin: 12px 0; float: left" href="' . esc_url($link) . '">' . esc_html__('Edit with Elementor', 'webtend-toolkit') . '</a>';
		}
	}

	public function save_mega_menu_meta($menu_id, $menu_item_db_id, $menu_item_data)
	{
		if (! isset($_POST['grozomart_mm_meta_name']) || ! wp_verify_nonce($_POST['grozomart_mm_meta_name'], 'grozomart_mm_meta_action')) {
			return;
		}

		if (isset($_POST['menu-item-url'][$menu_item_db_id])) {
			$url = sanitize_text_field($_POST['menu-item-url'][$menu_item_db_id]);
			update_post_meta($menu_item_db_id, '_grozomart_mega_menu_url', $url);
		}
	}
}

Template_Metaboxes::instance();
