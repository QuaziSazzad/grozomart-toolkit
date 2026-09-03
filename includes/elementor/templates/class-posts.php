<?php

namespace GrozomartToolkit\ElementorAddon\Templates;

use GrozomartTheme\Classes\Grozomart_Post_Helper;
use Elementor\Icons_Manager;
use WP_Query;

class Posts
{

	protected static $instance = null;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function render($settings, $carousel_navigation_html = '')
	{
		$wrapper = 'tekprof-recent-posts';

		if ('carousel' === $settings['layout']) {
			$wrapper .= ' tekprof-carousel-wrapper';
		}
?>
		<div class="<?php echo esc_attr($wrapper); ?>">
			<?php if ('grid' == $settings['layout']) : ?>
				<?php $this->render_loop($settings); ?>
			<?php elseif ('carousel' == $settings['layout']) : ?>
				<div class="tekprof-carousel-active">
					<?php $this->render_loop($settings); ?>
				</div>
				<?php if ($carousel_navigation_html) {
					echo $carousel_navigation_html;
				} ?>
			<?php endif; ?>
		</div>
		<?php
	}

	public function render_loop($settings)
	{
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = [
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $settings['post_limit'],
			'orderby'             => $settings['order_by'],
			'order'               => $settings['sort_order'],
			'ignore_sticky_posts' => 1,
			'paged'               => $paged
		];

		if ('categories' == $settings['post_from'] && $settings['cat_slugs']) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $settings['cat_slugs'],
				],
			];
		}

		if ('specific-post' == $settings['post_from'] && $settings['post_ids']) {
			$args['post__in'] = $settings['post_ids'];
		}

		$wp_query = new WP_Query($args);

		while ($wp_query->have_posts()): $wp_query->the_post();
			if ('grid' == $settings['layout']) :
				$this->render_post_item($settings);
			elseif ('carousel' == $settings['layout']) : ?>
				<div class="tekprof-carousel-item">
					<?php $this->render_post_item($settings); ?>
				</div>
		<?php endif;
		endwhile;
		wp_reset_postdata();

		if ('yes' === $settings['show_pagination']) {
			Grozomart_Post_Helper::pagination($wp_query);
		}
	}

	public function render_post_item($settings)
	{
		$idd = get_the_ID();

		if ($settings['title_word']) {
			$the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
		} else {
			$the_title = get_the_title();
		}

		$excerpt_count = $settings['excerpt_count'];
		$active_meta   = $settings['active_meta'];
		?>
		<div class="recent-post-item">
			<?php if (has_post_thumbnail() && 'yes' === $settings['show_thumbnail']): ?>
				<div class="post-thumbnail">
					<?php
					echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']);

					if (in_array('date', $active_meta)) {
						$current_date  = get_the_date('j');
						$current_month = get_the_date('M');

						if ($current_date < 10) {
							$current_date = '0' . $current_date;
						}

						echo '<span class="post-date"><span class="date">' . $current_date . '</span><span class="month">' . $current_month . '</span></span>';
					}
					?>
				</div>
			<?php endif; ?>
			<div class="post-content">
				<?php
				if (in_array('category', $active_meta)) {
					echo get_the_category_list();
				}
				?>
				<?php echo '<' . grozomart_escape_tags($settings['title_tag'], 'h4') . ' class="post-title">'; ?>
				<a href="<?php echo get_the_permalink() ?>">
					<?php echo $the_title; ?>
				</a>
				<?php echo '</' . grozomart_escape_tags($settings['title_tag'], 'h4') . '>'; ?>
				<?php if ('yes' === $settings['show_excerpt']) : ?>
					<p class="post-excerpt">
						<?php
						if (has_excerpt()) {
							echo wp_trim_words(get_the_excerpt(), $excerpt_count, '...');
						} else {
							echo wp_trim_words(get_the_content(), $excerpt_count, '...');
						}
						?>
					</p>
				<?php endif; ?>
				<?php if ('yes' === $settings['show_read_more'] && ! empty($settings['read_more_text'])) : ?>
					<a href="<?php echo esc_url(get_permalink()) ?>" class="post-read-more">
						<?php echo esc_html($settings['read_more_text']) ?>
						<span class="read-more-icon">
							<?php Icons_Manager::render_icon($settings['read_more_icon']); ?>
						</span>
					</a>
				<?php endif; ?>
			</div>
			<?php if (in_array('author', $active_meta) || in_array('comments', $active_meta)) : ?>
				<div class="post-footer">
					<?php if (in_array('author', $active_meta)) :
						$author_id = get_post_field('post_author', $idd); ?>
						<a href="<?php echo esc_url(get_author_posts_url($author_id)) ?>">
							<i class="far fa-user-circle"></i>
							<?php echo esc_html(get_the_author_meta('display_name', $author_id)) ?>
						</a>
					<?php endif; ?>
					<?php if (in_array('comments', $active_meta) && ! post_password_required() && comments_open()) : ?>
						<a href="<?php echo esc_url(esc_url(get_comments_link())) ?>" class="comments">
							<i class="far fa-comment-lines"></i>
							<span class="comment-text"><?php echo esc_html__('Comments', 'grozomart-toolkit') ?></span>
							<?php echo '(' . esc_html(get_comments_number()) . ')' ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
<?php
	}
}
