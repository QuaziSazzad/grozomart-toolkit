<?php

namespace GrozomartToolkit\WpWidgets;

use WP_Widget;

defined('ABSPATH') || exit;

class Grozomart_Deal_Banner extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'grozomart-wp-deal-banner',
			'description' => __('A promotional deal banner for the Grozomart sidebar', 'grozomart-toolkit')
		);

		parent::__construct('grozomart_deal_banner_widget', __('Grozomart Deal Banner', 'grozomart-toolkit'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$image       = $instance['image'] ?? '';
		$sub_title   = $instance['sub_title'] ?? '';
		$title       = $instance['title'] ?? '';
		$highlight   = $instance['highlight'] ?? '';
		$button_text = $instance['button_text'] ?? '';
		$button_url  = ! empty($instance['button_url']) ? $instance['button_url'] : '#';

		echo $args['before_widget'];
?>
		<div class="deal-img">
			<?php if ($image) : ?>
				<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($title)); ?>">
			<?php endif; ?>
			<div class="content">
				<?php if ($sub_title) : ?>
					<span class="text">
						<?php echo esc_html($sub_title); ?>
					</span>
				<?php endif; ?>
				<?php if ($title || $highlight) : ?>
					<span class="title-3">
						<?php if ($highlight) : ?>
							<span><?php echo wp_kses($highlight, ['br' => []]); ?></span>
						<?php endif; ?>
						<?php echo wp_kses($title, ['br' => []]); ?>
					</span>
				<?php endif; ?>
				<?php if ($button_text) : ?>
					<a href="<?php echo esc_url($button_url); ?>" class="theme-btn">
						<?php echo esc_html($button_text); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	<?php

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$image       = $instance['image'] ?? '';
		$sub_title   = ! empty($instance['sub_title']) ? $instance['sub_title'] : __('Deal Of This Week', 'grozomart-toolkit');
		$title       = ! empty($instance['title']) ? $instance['title'] : __('Savings <br> on Your Favorites', 'grozomart-toolkit');
		$highlight   = ! empty($instance['highlight']) ? $instance['highlight'] : __('Hot Deal of the <br> Week Fresh', 'grozomart-toolkit');
		$button_text = ! empty($instance['button_text']) ? $instance['button_text'] : __('Shop Now', 'grozomart-toolkit');
		$button_url  = ! empty($instance['button_url']) ? $instance['button_url'] : '#';
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e('Background Image URL:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text" value="<?php echo esc_attr($image); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('sub_title')); ?>"><?php esc_html_e('Sub Title:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" name="<?php echo esc_attr($this->get_field_name('sub_title')); ?>" type="text" value="<?php echo esc_attr($sub_title); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('highlight')); ?>"><?php esc_html_e('Highlighted Text:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('highlight')); ?>" name="<?php echo esc_attr($this->get_field_name('highlight')); ?>" type="text" value="<?php echo esc_attr($highlight); ?>">
			<small><?php esc_html_e('You can use <br> to break the line.', 'grozomart-toolkit'); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
			<small><?php esc_html_e('You can use <br> to break the line.', 'grozomart-toolkit'); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('button_text')); ?>"><?php esc_html_e('Button Text:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_text')); ?>" name="<?php echo esc_attr($this->get_field_name('button_text')); ?>" type="text" value="<?php echo esc_attr($button_text); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('button_url')); ?>"><?php esc_html_e('Button URL:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_url')); ?>" name="<?php echo esc_attr($this->get_field_name('button_url')); ?>" type="text" value="<?php echo esc_attr($button_url); ?>">
		</p>
<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance                = [];
		$instance['image']       = (! empty($new_instance['image'])) ? esc_url_raw($new_instance['image']) : '';
		$instance['sub_title']   = (! empty($new_instance['sub_title'])) ? sanitize_text_field($new_instance['sub_title']) : '';
		$instance['title']       = (! empty($new_instance['title'])) ? wp_kses($new_instance['title'], ['br' => []]) : '';
		$instance['highlight']   = (! empty($new_instance['highlight'])) ? wp_kses($new_instance['highlight'], ['br' => []]) : '';
		$instance['button_text'] = (! empty($new_instance['button_text'])) ? sanitize_text_field($new_instance['button_text']) : '';
		$instance['button_url']  = (! empty($new_instance['button_url'])) ? esc_url_raw($new_instance['button_url']) : '';

		return $instance;
	}
}
