<?php

//content
$this->start_controls_section(
	'layout_one_section_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_copyright',
	[
		'label' => esc_html__('Copyright Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add copyright text', 'grozomart-toolkit'),
		'default' => esc_html__('Copyright', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_one_nav_menu = new \Elementor\Repeater();

$layout_one_nav_menu->add_control(
	'title',
	[
		'label' => esc_html__('Nav Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add nav title', 'grozomart-toolkit'),
		'default' => esc_html__('Refund', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_one_nav_menu->add_control(
	'url',
	[
		'label' => __('Add Nav Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => __('#', 'grozomart-toolkit'),
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
	'layout_one_nav_menu',
	[
		'label' => __('Nav Menu', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_nav_menu->get_controls(),
		'prevent_empty' => false,
		'default' => [
			[
				'social_url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
		],
	]
);

$this->add_control(
	'layout_one_enable_back_to_top',
	[
		'label' => __('Back To Top Section?', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => __('Yes', 'grozomart-toolkit'),
		'label_off' => __('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_icon',
	[
		'label' => __('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-arrow-up',
			'library' => 'custom-icon',
		],
		'condition' => [
			'layout_one_enable_back_to_top' => 'yes',
		]
	]
);

$this->end_controls_section();
