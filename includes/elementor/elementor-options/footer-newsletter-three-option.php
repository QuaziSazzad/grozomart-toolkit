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
	'layout_three_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_three_summary_text',
	[
		'label' => esc_html__('Summary Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Summary Text', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_three_placeholder',
	[
		'label' => esc_html__('Placeholder Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Placeholder Text', 'grozomart-toolkit'),
		'default' => esc_html__('support@gmail.com', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_three_btn_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Placeholder Text', 'grozomart-toolkit'),
		'default' => esc_html__('Sign Up', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_three_social_title',
	[
		'label' => esc_html__('Social Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Social Title', 'grozomart-toolkit'),
		'default' => esc_html__('Follow Us', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_three_social_icons = new \Elementor\Repeater();

$layout_three_social_icons->add_control(
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

$layout_three_social_icons->add_control(
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
	'layout_three_social_icons',
	[
		'label' => __('Social Icons', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_three_social_icons->get_controls(),
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
