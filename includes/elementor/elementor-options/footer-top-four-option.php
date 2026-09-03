<?php

//content
$this->start_controls_section(
	'layout_four_section_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$this->add_control(
	'layout_four_sec_title',
	[
		'label' => esc_html__('Section Title', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Section Title', 'ridda-toolkit'),
		'default' => esc_html__('Default Section Title', 'ridda-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_four_email_title',
	[
		'label' => esc_html__('Email Title', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Email Title', 'ridda-toolkit'),
		'default' => esc_html__('Default Email Title', 'ridda-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_four_email_address',
	[
		'label' => esc_html__('Email Address', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Email Address', 'ridda-toolkit'),
		'default' => esc_html__('default@ridda.com', 'ridda-toolkit'),
		'label_block' => true
	]
);

$layout_four_social_icons = new \Elementor\Repeater();

$layout_four_social_icons->add_control(
	'social_icon',
	[
		'label' => __('Select Icon', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fab fa-facebook-f',
			'library' => 'brand',
		],
		'label_block' => true,
	]
);

$layout_four_social_icons->add_control(
	'social_url',
	[
		'label' => __('Add Url', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => __('#', 'ridda-toolkit'),
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
	'layout_four_social_icons',
	[
		'label' => __('Social Icons', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_four_social_icons->get_controls(),
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
