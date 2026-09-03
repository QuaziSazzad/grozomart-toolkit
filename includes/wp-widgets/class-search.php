<?php

namespace GrozomartToolkit\WpWidgets;

use WP_Widget;

defined('ABSPATH') || exit;

class Grozomart_Search extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'grozomart-wp-search',
			'description' => __('A search form styled for the Grozomart sidebar', 'grozomart-toolkit')
		);

		parent::__construct('grozomart_search_widget', __('Grozomart Search', 'grozomart-toolkit'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$title       = $instance['title'] ?? '';
		$placeholder = ! empty($instance['placeholder']) ? $instance['placeholder'] : __('Search here......', 'grozomart-toolkit');

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
		}
?>
		<div class="search-widget">
			<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
				<input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr($placeholder); ?>">
				<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
			</form>
		</div>
	<?php

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$title       = $instance['title'] ?? '';
		$placeholder = ! empty($instance['placeholder']) ? $instance['placeholder'] : __('Search here......', 'grozomart-toolkit');
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('placeholder')); ?>"><?php esc_html_e('Placeholder:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder')); ?>" name="<?php echo esc_attr($this->get_field_name('placeholder')); ?>" type="text" value="<?php echo esc_attr($placeholder); ?>">
		</p>
<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance                = [];
		$instance['title']       = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['placeholder'] = (! empty($new_instance['placeholder'])) ? sanitize_text_field($new_instance['placeholder']) : '';

		return $instance;
	}
}
