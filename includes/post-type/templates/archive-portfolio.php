<?php

/**
 * Portfolio Archive Template
 */

use GrozomartTheme\Classes\Grozomart_Helper as Helper;
use GrozomartTheme\Classes\Grozomart_Post_Helper;
use GrozomartToolkit\ElementorAddon\Templates\Portfolio;

get_header();

$options = [
	'layout'              => 'layout-grid',
	'design'              => Helper::get_option('archive_portfolio_design', 'design-one'),
	'show_read_more'      => 'yes',
	'show_excerpt'        => 'yes',
	'excerpt_word'        => 15,
	'post_thumbnail_size' => 'large',
	'title_tag'           => 'h4',
	'show_category'       => 'yes'
];

?>

<div class="<?php Helper::container() ?>">
	<div class="content-area">
		<div class="portfolio-archive-content">
			<?php if (have_posts()): ?>
				<div class="grozomart-portfolio-items layout-grid <?php echo esc_attr($options['design']) ?>">
					<?php
					while (have_posts()): the_post();
						Portfolio::instance()->render_portfolio_item($options);
					endwhile;
					?>
				</div>
				<?php Grozomart_Post_Helper::pagination(); ?>
			<?php else : ?>
				<?php get_template_part('template-parts/contents/content', 'none'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
