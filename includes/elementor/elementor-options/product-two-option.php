<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Featured Products', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => false,
		'options'     => [
			'h1' => [
				'title' => esc_html__('H1', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h6',
			],
		],
		'default'     => 'h2',
		'toggle'      => false,
	]
);

$this->add_control(
	'layout_two_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('View All', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_button_url',
	[
		'label' => esc_html__('Button Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$this->end_controls_section();

//Products
$this->start_controls_section(
	'layout_two_products',
	[
		'label' => esc_html__('Products', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_product_one',
	[
		'label'       => esc_html__('Product 1 (top of column 1)', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_product_one_image',
	[
		'label' => esc_html__('Product 1: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_product_two',
	[
		'label'       => esc_html__('Product 2 (bottom of column 1)', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_product_two_image',
	[
		'label' => esc_html__('Product 2: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_product_three',
	[
		'label'       => esc_html__('Product 3 (column 2, with countdown)', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_product_three_image',
	[
		'label' => esc_html__('Product 3: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_product_three_countdown_date',
	[
		'label' => esc_html__('Product 3: Countdown End Date', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::DATE_TIME,
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_product_three_countdown_text',
	[
		'label' => esc_html__('Product 3: Countdown Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('End of the offer', 'grozomart-toolkit'),
		'description' => esc_html__('You can use <br> to break the line.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_product_four',
	[
		'label'       => esc_html__('Product 4 (top of column 3)', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_product_four_image',
	[
		'label' => esc_html__('Product 4: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//Promo Banner
$this->start_controls_section(
	'layout_two_promo_banner',
	[
		'label' => esc_html__('Promo Banner (bottom of column 3)', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_promo_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('New Arrival Chocolates', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_promo_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Cherry Chocolates <br> healthy yamee', 'grozomart-toolkit'), ['br' => []]),
	]
);

$this->add_control(
	'layout_two_promo_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_promo_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_promo_button_url',
	[
		'label' => esc_html__('Button Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$this->add_control(
	'layout_two_promo_background_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_two_promo_image',
	[
		'label' => esc_html__('Thumb Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
