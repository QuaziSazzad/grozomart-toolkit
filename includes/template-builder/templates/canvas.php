<?php

use Elementor\Plugin;

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<?php
	$settings     = get_post_meta(get_the_ID(), 'grozomart_tb_settings', true);
	$menu_width   = $settings['mega_menu_width'] ?? 'full';
	$custom_width = $settings['set_mega_menu_width'] ?? ['width' => ''];
	if ('custom' === $menu_width && ! empty($custom_width['width'])) {
		$width = $custom_width['width'] . 'px';
	} else {
		$width = '100%';
	}
	?>
	<style id="grozomart-mega-menu">
		.elementor-edit-mode {
			max-width: <?php echo esc_attr($width); ?>;
			margin: 0 auto;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php
	Plugin::$instance->modules_manager->get_modules('page-templates')->print_content();
	wp_footer();
	?>
</body>

</html>