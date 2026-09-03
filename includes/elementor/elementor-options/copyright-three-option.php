<?php

//content
$this->start_controls_section(
	'layout_three_section_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_three'
		]
	]
);

$this->add_control(
	'layout_three_copyright',
	[
		'label' => esc_html__('Copyright Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add copyright text', 'grozomart-toolkit'),
		'default' => esc_html__('Copyright', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_three_nav_menu = new \Elementor\Repeater();

$layout_three_nav_menu->add_control(
	'title',
	[
		'label' => esc_html__('Nav Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add nav title', 'grozomart-toolkit'),
		'default' => esc_html__('Refund', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_three_nav_menu->add_control(
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
	'layout_three_nav_menu',
	[
		'label' => __('Nav Menu', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_three_nav_menu->get_controls(),
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

$this->end_controls_section();
