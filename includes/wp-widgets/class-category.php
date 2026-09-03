<?php

namespace GrozomartToolkit\WpWidgets;

use WP_Widget;

defined('ABSPATH') || exit;

class Grozomart_Categories extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'tekprof-wp-categories widget-category',
			'description' => __('A custom widget to display categories with post counts', 'grozomart-toolkit')
		);

		parent::__construct('grozomart_categories_widget', __('Grozomart Categories', 'grozomart-toolkit'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$title = ! empty($instance['title']) ? $instance['title'] : __('Categories', 'grozomart-toolkit');
		$show_count = $instance['show_count'] ?? 'yes';
		$hide_empty = $instance['hide_empty'] ?? 'yes';
		$orderby = ! empty($instance['orderby']) ? $instance['orderby'] : 'name';
		$order = ! empty($instance['order']) ? $instance['order'] : 'ASC';
		$number = ! empty($instance['number']) ? intval($instance['number']) : 0;

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
		}

		$cat_args = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => ($hide_empty === 'yes') ? true : false,
			'number'     => $number > 0 ? $number : '',
		);

		$categories = get_categories($cat_args);

		if ($categories) {
			echo '<ul class="categories-list">';
			foreach ($categories as $category) {
				echo '<li>';
				echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
				if ('yes' === $show_count) {
					echo '<span>(' . esc_html(str_pad($category->count, 2, '0', STR_PAD_LEFT)) . ')</span>';
				}
				echo '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>' . __('No categories found.', 'grozomart-toolkit') . '</p>';
		}

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$title = ! empty($instance['title']) ? $instance['title'] : __('Categories', 'grozomart-toolkit');
		$show_count = $instance['show_count'] ?? 'yes';
		$hide_empty = $instance['hide_empty'] ?? 'yes';
		$orderby = ! empty($instance['orderby']) ? $instance['orderby'] : 'name';
		$order = ! empty($instance['order']) ? $instance['order'] : 'ASC';
		$number = ! empty($instance['number']) ? $instance['number'] : '';
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_count'); ?>"><?php _e('Show Post Count:', 'grozomart-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>" class="widefat">
				<option value="yes" <?php selected($show_count, 'yes'); ?>><?php _e('Yes', 'grozomart-toolkit'); ?></option>
				<option value="no" <?php selected($show_count, 'no'); ?>><?php _e('No', 'grozomart-toolkit'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('hide_empty'); ?>"><?php _e('Hide Empty Categories:', 'grozomart-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('hide_empty'); ?>" name="<?php echo $this->get_field_name('hide_empty'); ?>" class="widefat">
				<option value="yes" <?php selected($hide_empty, 'yes'); ?>><?php _e('Yes', 'grozomart-toolkit'); ?></option>
				<option value="no" <?php selected($hide_empty, 'no'); ?>><?php _e('No', 'grozomart-toolkit'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order By:', 'grozomart-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat">
				<option value="name" <?php selected($orderby, 'name'); ?>><?php _e('Name', 'grozomart-toolkit'); ?></option>
				<option value="count" <?php selected($orderby, 'count'); ?>><?php _e('Post Count', 'grozomart-toolkit'); ?></option>
				<option value="term_id" <?php selected($orderby, 'term_id'); ?>><?php _e('ID', 'grozomart-toolkit'); ?></option>
				<option value="slug" <?php selected($orderby, 'slug'); ?>><?php _e('Slug', 'grozomart-toolkit'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:', 'grozomart-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" class="widefat">
				<option value="ASC" <?php selected($order, 'ASC'); ?>><?php _e('Ascending', 'grozomart-toolkit'); ?></option>
				<option value="DESC" <?php selected($order, 'DESC'); ?>><?php _e('Descending', 'grozomart-toolkit'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Categories (0 = all):', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" min="0" value="<?php echo esc_attr($number); ?>">
		</p>
<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance = [];
		$instance['title'] = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['show_count'] = $new_instance['show_count'] ?? 'yes';
		$instance['hide_empty'] = $new_instance['hide_empty'] ?? 'yes';
		$instance['orderby'] = (! empty($new_instance['orderby'])) ? sanitize_text_field($new_instance['orderby']) : 'name';
		$instance['order'] = (! empty($new_instance['order'])) ? sanitize_text_field($new_instance['order']) : 'ASC';
		$instance['number'] = (! empty($new_instance['number'])) ? intval($new_instance['number']) : 0;

		return $instance;
	}
}
