<?php

namespace GrozomartToolkit\WpWidgets;

use WP_Widget;

defined('ABSPATH') || exit;

class Grozomart_Tags extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'grozomart-wp-tags',
			'description' => __('A tag cloud styled for the Grozomart sidebar', 'grozomart-toolkit')
		);

		parent::__construct('grozomart_tags_widget', __('Grozomart Tags', 'grozomart-toolkit'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$title  = ! empty($instance['title']) ? $instance['title'] : __('Tags', 'grozomart-toolkit');
		$number = ! empty($instance['number']) ? intval($instance['number']) : 8;

		$tags = get_tags([
			'orderby'    => 'count',
			'order'      => 'DESC',
			'number'     => $number,
			'hide_empty' => true,
		]);

		if (empty($tags) || is_wp_error($tags)) {
			return;
		}

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
		}
?>
		<div class="tagcloud">
			<?php foreach ($tags as $tag) : ?>
				<a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
			<?php endforeach; ?>
		</div>
	<?php

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$title  = ! empty($instance['title']) ? $instance['title'] : __('Tags', 'grozomart-toolkit');
		$number = ! empty($instance['number']) ? intval($instance['number']) : 8;
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of Tags:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" min="1" value="<?php echo esc_attr($number); ?>">
		</p>
<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance           = [];
		$instance['title']  = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['number'] = (! empty($new_instance['number'])) ? intval($new_instance['number']) : 8;

		return $instance;
	}
}
