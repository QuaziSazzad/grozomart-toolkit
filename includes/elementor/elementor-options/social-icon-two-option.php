<?php

//content
$this->start_controls_section(
	'layout_two_section_content',
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
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Follow Us', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$layout_two_social_icons = new \Elementor\Repeater();

$layout_two_social_icons->add_control(
	'social_icon',
	[
		'label' => __('Select Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fab fa-facebook-f',
			'library' => 'brand',
		],
		'label_block' => true,
	]
);

$layout_two_social_icons->add_control(
	'social_url',
	[
		'label' => __('Add Url', 'grozomart-toolkit'),
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
	'layout_two_social_icons',
	[
		'label' => __('Social Icons', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_two_social_icons->get_controls(),
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
