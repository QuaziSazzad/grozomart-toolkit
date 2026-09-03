<?php

//content
$this->start_controls_section(
	'layout_one_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'banner_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('New Arrival Chocolates', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => __('Cherry Chocolates <br> healthy yamee', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
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

$this->add_control(
	'layout_one_banner_items',
	[
		'label' => esc_html__('Banner Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'banner_sub_title' => esc_html__('New Arrival Chocolates', 'grozomart-toolkit'),
				'banner_title' => __('Cherry Chocolates <br> healthy yamee', 'grozomart-toolkit'),
				'banner_description' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Shop Now', 'grozomart-toolkit'),
			],
			[
				'banner_sub_title' => esc_html__('Best Deal Of The Day', 'grozomart-toolkit'),
				'banner_title' => __('Cherry Chocolates <br> healthy yamee', 'grozomart-toolkit'),
				'banner_description' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Shop Now', 'grozomart-toolkit'),
			],
			[
				'banner_sub_title' => esc_html__('New Arrival Chocolates', 'grozomart-toolkit'),
				'banner_title' => __('Fresh Organic with <br> lemon fruits juice', 'grozomart-toolkit'),
				'banner_description' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Shop Now', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ banner_sub_title }}}',
	]
);

$this->end_controls_section();
