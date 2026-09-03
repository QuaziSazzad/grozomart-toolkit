<?php

//content
$this->start_controls_section(
	'layout_four_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'banner_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'banner_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Everyday <br class="d-block"> Fresh Meat', 'grozomart-toolkit'), ['br' => ['class' => []]]),
	]
);

$repeater->add_control(
	'banner_price_label',
	[
		'label' => esc_html__('Price Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Starting at', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$60.99', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_button_url',
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
	'layout_four_banner_items',
	[
		'label' => esc_html__('Banner Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'banner_price_label' => esc_html__('Starting at', 'grozomart-toolkit'),
				'banner_price' => esc_html__('$60.99', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Shop Now', 'grozomart-toolkit'),
			],
			[
				'banner_price_label' => esc_html__('Starting at', 'grozomart-toolkit'),
				'banner_price' => esc_html__('$60.99', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Shop Now', 'grozomart-toolkit'),
			],
			[
				'banner_price_label' => esc_html__('Starting at', 'grozomart-toolkit'),
				'banner_price' => esc_html__('$60.99', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Shop Now', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ banner_price }}}',
	]
);

$this->end_controls_section();
