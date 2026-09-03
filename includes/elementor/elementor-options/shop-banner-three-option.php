<?php

//content
$this->start_controls_section(
	'layout_three_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_three'
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
	'banner_icon',
	[
		'label' => esc_html__('Icon Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$repeater->add_control(
	'banner_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$5 off your first order', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_title_two',
	[
		'label' => esc_html__('Title 2', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Delivery by 6:15am', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_expiry_text',
	[
		'label' => esc_html__('Expiry Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Expries Aug 5', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'banner_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Explore Shop', 'grozomart-toolkit'),
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
	'layout_three_banner_items',
	[
		'label' => esc_html__('Banner Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'banner_title' => esc_html__('$5 off your first order', 'grozomart-toolkit'),
				'banner_title_two' => esc_html__('Delivery by 6:15am', 'grozomart-toolkit'),
				'banner_expiry_text' => esc_html__('Expries Aug 5', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Explore Shop', 'grozomart-toolkit'),
			],
			[
				'banner_title' => esc_html__('$5 off your first order', 'grozomart-toolkit'),
				'banner_title_two' => esc_html__('Delivery by 6:15am', 'grozomart-toolkit'),
				'banner_expiry_text' => esc_html__('Expries Aug 5', 'grozomart-toolkit'),
				'banner_button_label' => esc_html__('Explore Shop', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ banner_title }}}',
	]
);

$this->end_controls_section();
