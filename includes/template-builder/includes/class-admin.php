<?php

namespace GrozomartToolkit\TemplateBuilder;

defined('ABSPATH') || exit;

class Template_Admin
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
		add_action('admin_menu', [$this, 'admin_menu']);
		add_filter('manage_grozomart_template_posts_columns', [$this, 'custom_columns']);
		add_filter('manage_grozomart_template_posts_custom_column', [$this, 'display_custom_columns']);
		add_filter('nav_menu_items_grozomart_template', [$this, 'filter_mega_menu_in_nav']);
		add_filter('nav_menu_items_grozomart_template_recent', [$this, 'filter_mega_menu_in_nav']);

		// Add a label to menu area
		add_filter('wp_setup_nav_menu_item', function ($menu_item) {
			if ($menu_item->object === 'grozomart_template') {
				$menu_item->type_label = esc_html__('Template Builder Menu', 'grozomart-toolkit');
			}

			return $menu_item;
		});
	}

	/**
	 * Register admin menu
	 *
	 * @return void
	 */
	public function admin_menu()
	{
		add_menu_page(
			__('Template Builder', 'grozomart-toolkit'),
			__('Template Builder', 'grozomart-toolkit'),
			'manage_options',
			'edit.php?post_type=grozomart_template',
			'',
			GROZOMART_TOOLKIT_THEME_ASSETS . '/img/webtend-logo.png',
			3
		);
	}

	/**
	 * Add Custom Columns in admin view table
	 *
	 * @param $columns
	 *
	 * @return mixed
	 */
	public function custom_columns($columns)
	{
		$columns['type'] = __('Type', 'grozomart-toolkit');
		$columns['info'] = __('Info', 'grozomart-toolkit');

		return $columns;
	}

	/**
	 * Admin Custom Columns view table content
	 *
	 * @param $name
	 *
	 * @return void
	 */
	public function display_custom_columns($name)
	{
		global $post;

		switch ($name) {
			case 'type':
				echo ucwords(str_replace('_', ' ', $this->get_template_type($post->ID)));
				break;
			case 'info':
				echo $this->get_item_info($post->ID);
				break;
		}
	}

	/**
	 * Filter Template in nav menu. Only Keep MegaMenu
	 *
	 * @return array
	 */
	public function filter_mega_menu_in_nav($items)
	{
		$new_items = [];
		foreach ($items as $item) {
			$type = $this->get_template_type($item->ID);

			if ('mega_menu' === $type) {
				$new_items[] = $item;
			}
		}

		return $new_items;
	}

	/**
	 * Get Template Type
	 *
	 * @param $post_id
	 *
	 * @return mixed|string
	 */
	public function get_template_type($post_id)
	{
		$meta = get_post_meta($post_id, 'grozomart_tb_settings', true);

		return $meta['template_type'] ?? '';
	}

	/**
	 * Get Item Info to Display in admin table
	 *
	 * @param $post_id
	 *
	 * @return string
	 */
	public function get_item_info($post_id)
	{
		$type = $this->get_template_type($post_id);
		$info = '';

		if ($type == 'block') {
			$info = '<input class="wp-ui-text-highlight code widefat" type="text" onfocus="this.select();" readonly="readonly" value="[grozomart-tb-block id=&quot;' . $post_id . '&quot;]">';
		} elseif ($type === 'offcanvas') {
			$settings = get_post_meta($post_id, 'grozomart_tb_settings', true);
			$info     .= '<b>' . esc_html('Width:', 'grozomart-toolkit') . '</b> ' . $settings['offcanvas_width']['width'] . 'px';
		} else {
			$info = $this->get_pretty_condition('include', $post_id) . '</br>' . $this->get_pretty_condition('exclude', $post_id);
		}

		return $info;
	}

	/**
	 * Get pretty condition to display in admin table
	 *
	 * @param $type
	 * @param $post_id
	 *
	 * @return string|null
	 */
	public function get_pretty_condition($type, $post_id)
	{
		$info    = null;
		$include = get_post_meta($post_id, 'grozomart_tb_' . $type, true);

		if (is_array($include)) {
			$lastKey = array_keys($include);
			$lastKey = \end($lastKey);
			$info    .= '<b>' . ucfirst($type) . ': </b>';
			$index   = 0;

			foreach ($include as $rule) {
				$index++;

				if ($index != 1) {
					$info .= ', ';
				}
				$info .= ucwords(str_replace('_', ' ', $rule['rule']));
			}
		}

		return $info;
	}
}

Template_Admin::instance();
