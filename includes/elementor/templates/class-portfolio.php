<?php

namespace GrozomartToolkit\ElementorAddon\Templates;

use WP_Query;

class Portfolio
{

	protected static $instance = null;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function render($settings, $carousel_navigation_html)
	{
		$wrapper = ['grozomart-portfolio-items'];

		if ('carousel' == $settings['layout']) {
			$wrapper[] = 'grozomart-carousel-wrapper';
		}

		$wrapper[] = $settings['design'];

?>
		<div class="<?php echo esc_attr(implode(' ', $wrapper)) ?>">
			<?php if ('grid' == $settings['layout']) : ?>
				<?php $this->render_loop($settings); ?>
			<?php elseif ('carousel' == $settings['layout']) : ?>
				<div class="grozomart-carousel-active">
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
		$args = [
			'post_type'           => 'grozomart_portfolio',
			'post_status'         => 'publish',
			'posts_per_page'      => $settings['post_limit'],
			'orderby'             => $settings['order_by'],
			'order'               => $settings['sort_order'],
			'ignore_sticky_posts' => 1,
		];

		if ('categories' == $settings['post_from'] && $settings['cat_slugs']) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'grozomart_portfolio_category',
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
				$this->render_portfolio_item($settings);
			elseif ('carousel' == $settings['layout']) : ?>
				<div class="grozomart-carousel-item">
					<?php $this->render_portfolio_item($settings); ?>
				</div>
		<?php endif;
		endwhile;
		wp_reset_postdata();
	}

	public function render_portfolio_item($settings)
	{
		$idd             = get_the_ID();
		$categories_list = get_the_term_list($idd, 'grozomart_portfolio_category', '', '', '');
		?>
		<div class="portfolio-item">
			<?php if (has_post_thumbnail()) : ?>
				<div class="thumbnail">
					<?php
					echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']);

					if ('yes' === $settings['show_read_more'] && ('design-one' === $settings['design'] || 'design-two' === $settings['design'])) {
						printf(
							'<a href="%1$s" class="details-icon"><i class="fal fa-arrow-right"></i></a>',
							get_the_permalink($idd)
						);
					}
					?>
				</div>
			<?php endif; ?>
			<div class="content">
				<<?php echo grozomart_escape_tags($settings['title_tag']) ?> class="title">
					<a href="<?php echo esc_url(get_the_permalink()) ?>">
						<?php echo wp_kses_post(get_the_title()) ?>
					</a>
				</<?php echo grozomart_escape_tags($settings['title_tag']) ?>>
				<?php if ('yes' === $settings['show_category']) : ?>
					<div class="categories">
						<?php echo $categories_list ?>
					</div>
				<?php endif; ?>
				<?php
				if ('design-three' === $settings['design'] || 'design-four' === $settings['design']) {
					if ('yes' === $settings['show_excerpt']) {
						if (has_excerpt()) {
							$excerpt = wp_trim_words(get_the_excerpt(), $settings['excerpt_word'], '...');
						} else {
							$excerpt = wp_trim_words(get_the_content(), $settings['excerpt_word'], '...');
						}

						if (! empty($excerpt)) {
							printf(
								'<p class="excerpt">%1$s</p>',
								grozomart_kses_basic($excerpt)
							);
						}
					}

					if ('yes' === $settings['show_read_more'] && 'design-four' === $settings['design']) {
						printf(
							'<a href="%1$s" class="details-icon"><i class="fal fa-arrow-right"></i></a>',
							get_the_permalink($idd)
						);
					}
				}
				?>
			</div>
		</div>
<?php
	}
}
