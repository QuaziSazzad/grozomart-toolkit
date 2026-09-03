<?php

namespace GrozomartToolkit\WpWidgets;

use WP_Query;
use WP_Widget;

defined('ABSPATH') || exit;

class Grozomart_Recent_Posts extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'grozomart-wp-recent-posts',
			'description' => __('A custom widget to display recent posts with various options', 'grozomart-toolkit')
		);

		parent::__construct('grozomart_recent_posts_widget', __('Grozomart Recent Posts', 'grozomart-toolkit'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$title          = ! empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'grozomart-toolkit');
		$num_posts      = ! empty($instance['num_posts']) ? $instance['num_posts'] : 5;
		$trim_words     = ! empty($instance['trim_words']) ? $instance['trim_words'] : 10;
		$show_date      = $instance['show_date'] ?? 'yes';
		$show_thumbnail = $instance['show_thumbnail'] ?? 'yes';

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
		}

		$recent_posts = new WP_Query(array(
			'posts_per_page'      => $num_posts,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		));

		if ($recent_posts->have_posts()) : ?>
			<div class="recent-post-area">
				<?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
					<div class="recent-items">
						<?php if ('yes' === $show_thumbnail && has_post_thumbnail()) : ?>
							<div class="recent-thumb">
								<?php the_post_thumbnail('grozomart_blog_100X80', ['alt' => esc_attr(get_the_title())]); ?>
							</div>
						<?php endif; ?>
						<div class="recent-content">
							<?php if ('yes' === $show_date) : ?>
								<ul>
									<li>
										<i class="fa-regular fa-calendar"></i>
										<?php echo esc_html(get_the_date()); ?>
									</li>
								</ul>
							<?php endif; ?>
							<span>
								<a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), $trim_words)); ?></a>
							</span>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
<?php
			wp_reset_postdata();
		endif;

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$title          = ! empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'grozomart-toolkit');
		$num_posts      = ! empty($instance['num_posts']) ? $instance['num_posts'] : 5;
		$trim_words     = ! empty($instance['trim_words']) ? $instance['trim_words'] : 10;
		$show_date      = $instance['show_date'] ?? 'yes';
		$show_thumbnail = $instance['show_thumbnail'] ?? 'yes';
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Number of Posts:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" type="number" min="1" value="<?php echo esc_attr($num_posts); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('trim_words'); ?>"><?php _e('Trim Title Words:', 'grozomart-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('trim_words'); ?>" name="<?php echo $this->get_field_name('trim_words'); ?>" type="number" min="1" value="<?php echo esc_attr($trim_words); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Show Date:', 'grozomart-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" class="widefat">
				<option value="yes" <?php selected($show_date, 'yes'); ?>><?php _e('Yes', 'grozomart-toolkit'); ?></option>
				<option value="no" <?php selected($show_date, 'no'); ?>><?php _e('No', 'grozomart-toolkit'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_thumbnail'); ?>"><?php _e('Show Thumbnail:', 'grozomart-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('show_thumbnail'); ?>" name="<?php echo $this->get_field_name('show_thumbnail'); ?>" class="widefat">
				<option value="yes" <?php selected($show_thumbnail, 'yes'); ?>><?php _e('Yes', 'grozomart-toolkit'); ?></option>
				<option value="no" <?php selected($show_thumbnail, 'no'); ?>><?php _e('No', 'grozomart-toolkit'); ?></option>
			</select>
		</p>
<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance                     = [];
		$instance['title']          = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['num_posts']      = (! empty($new_instance['num_posts'])) ? intval($new_instance['num_posts']) : 5;
		$instance['trim_words']     = (! empty($new_instance['trim_words'])) ? intval($new_instance['trim_words']) : 10;
		$instance['show_date']      = $new_instance['show_date'] ?? 'yes';
		$instance['show_thumbnail'] = $new_instance['show_thumbnail'] ?? 'yes';

		return $instance;
	}
}
