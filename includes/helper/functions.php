<?php

/**
 * Helper functions
 */

use GrozomartTheme\Classes\Grozomart_Helper;

defined('ABSPATH') || exit;

/**
 * Get a list of all the allowed html tags.
 */
function grozomart_get_allowed_html_tags()
{
	return [
		'b'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'i'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'u'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		's'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'br'     => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'em'     => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'del'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'ins'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'sub'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'sup'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'code'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'mark'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'small'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strike' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'abbr'   => [
			'title' => [],
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'span'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strong' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h6' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'a' => [
			'i' => [],
			'class' => [],
			'id'    => [],
			'style' => [],
			'href' => [],
		],
		'li' => [
			'class' => []
		],
		'span' => [
			'class' => []
		],
	];
}

/**
 * Escaped title html tags
 */
function grozomart_escape_tags($tag, $default = 'span')
{
	$supports = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];

	if (! in_array($tag, $supports, true)) {
		return $default;
	}

	return $tag;
}

/**
 * Strip all the tags except allowed html tags
 */
function grozomart_kses_basic($string = '')
{
	return wp_kses($string, grozomart_get_allowed_html_tags());
}

/**
 * Get All Category For Query
 */
function grozomart_select_category($category = 'category')
{
	$terms = get_terms([
		'taxonomy'   => $category,
		'hide_empty' => true,
	]);

	$options = [];

	if (! empty($terms) && ! is_wp_error($terms)) {
		foreach ($terms as $term) {
			$options[$term->slug] = $term->name;
		}
	}

	return $options;
}

/**
 * Get a list of Posts
 */
function grozomart_select_post($post_type = 'post')
{
	$args = [
		'post_type'      => $post_type,
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	];

	$query_query = get_posts($args);
	$posts       = [];

	if ($query_query) {
		foreach ($query_query as $query) {
			$posts[$query->ID] = $query->post_title;
		}
	}

	return $posts;
}

/**
 * Get a list of all block builder block
 */
function grozomart_select_builder_template($type = 'block')
{
	$items = [];
	$lists = ['0' => __('--- Select Template ---', 'grozomart-toolkit')];

	$args = [
		'post_type'      => 'grozomart_template',
		'posts_per_page' => -1,
	];

	$posts = get_posts($args);

	foreach ($posts as $post) {
		$meta = get_post_meta($post->ID, 'grozomart_tb_settings', true);

		if (! empty($meta) && $type == $meta['template_type']) {
			$items[$post->ID] = $post->post_title;
		}
	}

	return $lists + $items;
}


/**
 * Post share links
 */
function grozomart_post_share_links()
{
	global $post;

	if (! isset($post->ID)) {
		return;
	}

	$share_items       = Grozomart_Helper::get_option('social_share_item', [
		'enabled' => [
			'facebook' => 'Facebook',
			'twitter'  => 'Twitter',
			'linkedin' => 'Linkedin',
			'reddit'   => 'Reddit',
		]
	]);
	$enabled_platforms = array_key_exists('enabled', $share_items) ? $share_items['enabled'] : [];

	$post_title     = urlencode(get_the_title());
	$post_permalink = urlencode(get_permalink());
	$img_url        = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail')[0] ?? '';

	$social_platforms = [
		'twitter'  => [
			'url'  => 'https://twitter.com/intent/tweet?text=' . $post_title . '&url=' . $post_permalink,
			'icon' => 'fab fa-twitter',
		],
		'facebook' => [
			'url'  => 'https://www.facebook.com/share.php?u=' . $post_permalink,
			'icon' => 'fab fa-facebook-f',
		],
		'linkedin' => [
			'url'  => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_permalink . '&title=' . $post_title,
			'icon' => 'fab fa-linkedin-in',
		],
		'reddit'   => [
			'url'  => 'https://reddit.com/submit?url=' . $post_permalink . '&title=' . $post_title,
			'icon' => 'fab fa-reddit-alien',
		],
		'whatsapp' => [
			'url'  => 'https://wa.me/?text=' . $post_title . '%20' . $post_permalink,
			'icon' => 'fab fa-whatsapp',
		],
		'telegram' => [
			'url'  => 'https://telegram.me/share/url?url=' . $post_permalink . '&text=' . $post_title,
			'icon' => 'fab fa-telegram-plane',
		],
	];

	if (strlen($img_url) > 0) {
		$social_platforms['pinterest'] = [
			'url'  => 'https://pinterest.com/pin/create/button/?url=' . $post_permalink . '&media=' . $img_url,
			'icon' => 'fab fa-pinterest-p',
		];
	}

	$html = '';
	foreach ($enabled_platforms as $key => $platform) {
		if (array_key_exists($key, $social_platforms)) {
			$html .= '<a target="_blank" href="' . esc_url($social_platforms[$key]['url']) . '">
                <i class="fab fa-' . $social_platforms[$key]['icon'] . '"></i>
            </a>';
		}
	}
	echo $html;
}

/**
 * Set posts per page for custom post types and taxonomies
 */
if (! function_exists('grozomart_cpt_per_page')) {
	add_filter('pre_get_posts', 'grozomart_cpt_per_page');

	function grozomart_cpt_per_page($query)
	{

		if ($query->is_post_type_archive('grozomart_portfolio') && ! is_admin() && $query->is_main_query()) {
			$post_per_page = Grozomart_Helper::get_option('portfolio_post_per_page', '9');
			$query->set('posts_per_page', $post_per_page);
		}

		return $query;
	}
}

if (!function_exists('grozomart_get_nav_menu')) :
	function grozomart_get_nav_menu()
	{
		$nav_menu_list = get_terms(array(
			'taxonomy' => 'nav_menu',
			'hide_empty' => true,
		));
		$options = [];
		if (!empty($nav_menu_list) && !is_wp_error($nav_menu_list)) {
			foreach ($nav_menu_list as $menu) {
				$options[$menu->slug] = $menu->name;
			}
			return $options;
		}
	}
endif;

if (!function_exists('grozomart_get_elementor_template')) :
	function grozomart_get_elementor_template($template_name = null)
	{
		$template_path = apply_filters('elementor/template-path', 'elementor-templates/');
		$template = locate_template($template_path . $template_name);
		if (!$template) {
			$template = GROZOMART_TOOLKIT_ELEMENTOR . '/elementor-templates/' . $template_name;
		}
		if (file_exists($template)) {
			return $template;
		} else {
			return false;
		}
	}
endif;


if (!function_exists('grozomart_get_elementor_option')) :
	function grozomart_get_elementor_option($template_name = null)
	{
		$template_path = apply_filters('elementor/template-options', 'elementor-options/');
		$template = locate_template($template_path . $template_name);
		if (!$template) {
			$template = GROZOMART_TOOLKIT_ELEMENTOR . '/elementor-options/' . $template_name;
		}
		if (file_exists($template)) {
			return $template;
		}
	}
endif;


if (!function_exists('grozomart_elementor_rendered_image')) {
	function grozomart_elementor_rendered_image($content, $name, $class = '')
	{
		// Ensure the content field exists and is an array
		if (!isset($content[$name]) || !is_array($content[$name])) {
			return;
		}

		// Handle single image case (when the content is not a gallery but a single image)
		$is_gallery = isset($content[$name][0]) && is_array($content[$name][0]);
		$images = $is_gallery ? $content[$name] : [$content[$name]];

		foreach ($images as $image_item) {
			// Ensure each item is an array and contains either an ID or a URL
			if (!is_array($image_item) || (empty($image_item['id']) && empty($image_item['url']))) {
				continue;
			}

			// Get the image URL
			$image = !empty($image_item['id'])
				? wp_get_attachment_image_url($image_item['id'], 'full')
				: esc_url($image_item['url']);

			// If the image URL is empty, skip this item
			if (empty($image)) {
				continue;
			}

			// Prepare the image attributes (title, class, alt)
			$image_attr = '';
			$title = \Elementor\Control_Media::get_image_title($image_item);
			$alt = \Elementor\Control_Media::get_image_alt($image_item);

			// Add title attribute if available
			if (!empty($title)) {
				$image_attr .= 'title="' . esc_attr($title) . '" ';
			}

			// Add class attribute if provided
			if (!empty($class)) {
				$image_attr .= 'class="' . esc_attr($class) . '" ';
			}

			// Ensure alt attribute has fallback if empty
			$alt = !empty($alt) ? esc_attr($alt) : '';

			// Output the image tag
			printf(
				'<img src="%s" alt="%s" %s>',
				esc_url($image),
				$alt,
				$image_attr
			);
		}
	}
}

if (!function_exists('grozomart_get_elementor_thumbnail_alt')) :
	function grozomart_get_elementor_thumbnail_alt($thumbnail_id)
	{
		return get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	}
endif;


if (!function_exists('grozomart_elementor_style_options')) :
	function grozomart_elementor_style_options($agrs, $label, $selector, $condition, $style = 'color', $typo = true, $color = true)
	{

		if ($style == 'background-color') :
			if ($color) :
				$agrs->add_control(
					str_replace(' ', '_', $label) . '_color',
					[
						'label' => __('Background Color', 'grozomart-addon'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							$selector => $style . ': {{VALUE}}',
						],
						'condition' => [
							'layout_type' => $condition
						]
					]
				);
			endif;
			return;
		endif;

		//Label
		$agrs->add_control(
			str_replace(' ', '_', $label) . '_title',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => __($label, 'grozomart-addon'),
				'separator' => 'after',
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$agrs->add_responsive_control(
			str_replace(' ', '_', $label) . '_padding',
			[
				'label' => __(' Padding', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$agrs->add_responsive_control(
			str_replace(' ', '_', $label) . '_margin',
			[
				'label' => __(' Margin', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		if ($typo) :
			$agrs->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => str_replace(' ', '_', $label) . '_typo',
					'label' => esc_html__(' Typography', 'grozomart-addon'),
					'selector' => $selector,
					'condition' => [
						'layout_type' => $condition
					]
				]
			);

		endif;
		if ($color) :
			$agrs->add_control(
				str_replace(' ', '_', $label) . '_color',
				[
					'label' => __('Color', 'grozomart-addon'),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						$selector => $style . ': {{VALUE}} !important;',
					],
					'condition' => [
						'layout_type' => $condition
					]
				]
			);
		endif;
	}
endif;

if (!function_exists('grozomart_elementor_button_style_options')) :
	function grozomart_elementor_button_style_options($init, $label, $selector, $hover_bg_selector = '', $condition = 'layout_one')
	{
		//Label
		$init->add_control(
			str_replace(' ', '_', $label) . '_subtitle_label',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => __($label, 'grozomart-addon'),
				'separator' => 'after',
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_responsive_control(
			str_replace(' ', '_', $label) . '_padding',
			[
				'label' => __('Padding', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => str_replace(' ', '_', $label) . '_typography',
				'selector' => $selector,
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => str_replace(' ', '_', $label) . '_border',
				'selector' => $selector,
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_border_radius',
			[
				'label' => __('Border Radius', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					$selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => str_replace(' ', '_', $label) . '_box_shadow',
				'selector' => $selector,
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'style' => 'thick',
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->start_controls_tabs(str_replace(' ', '_', $label) . '_tabs_button');

		$init->start_controls_tab(
			str_replace(' ', '_', $label) . '_tab_button_normal',
			[
				'label' => __('Normal', 'grozomart-addon'),
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_color',
			[
				'label' => __('Text Color', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					$selector => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_bg_color',
			[
				'label' => __('Background Color', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$selector => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->end_controls_tab();

		$init->start_controls_tab(
			str_replace(' ', '_', $label) . '_tab_button_hover',
			[
				'label' => __('Hover', 'grozomart-addon'),
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_hover_color',
			[
				'label' => __('Text Color', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$selector . ':hover,' . $selector . ':focus' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_hover_bg_color',
			[
				'label' => __('Background Color', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					$hover_bg_selector => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->add_control(
			str_replace(' ', '_', $label) . '_hover_border_color',
			[
				'label' => __('Border Color', 'grozomart-addon'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'button_border_border!' => '',
				],
				'selectors' => [
					$selector . ':hover,' . $selector . ':focus' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'layout_type' => $condition
				]
			]
		);

		$init->end_controls_tab();
		$init->end_controls_tabs();
	}
endif;


/**
 * Automatically add product to cart on visit
 */
if (!function_exists('grozomart_auto_add_product_to_cart')) {
	function grozomart_auto_add_product_to_cart()
	{

		if (!function_exists('is_woocommerce') || !function_exists('is_cart') || !function_exists('is_checkout')) {
			return;
		}

		$auto_cart_status = isset($_GET['cart']) ? $_GET['cart'] : '';

		if (!is_admin() && !empty($auto_cart_status)) {
			$get_product = get_posts([
				'title'     => $auto_cart_status,
				'post_type' => 'product',
			]);
			$product_id = $get_product[0]->ID;
			$found = false;
			//check if product already in cart
			if (sizeof(WC()->cart->get_cart()) > 0) {
				foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
					$_product = $values['data'];
					if ($_product->get_id() == $product_id)
						$found = true;
				}
				// if product not found, add it
				if (!$found)
					WC()->cart->add_to_cart($product_id);
			} else {
				// if no products in cart, add it
				WC()->cart->add_to_cart($product_id);
			}
		}
	}
	add_action('template_redirect', 'grozomart_auto_add_product_to_cart');
}
