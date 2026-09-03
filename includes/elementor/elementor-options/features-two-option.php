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
	'layout_two_bordered_style',
	[
		'label'        => esc_html__('Bordered Style', 'grozomart-toolkit'),
		'type'         => \Elementor\Controls_Manager::SWITCHER,
		'label_on'     => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off'    => esc_html__('No', 'grozomart-toolkit'),
		'default'      => '',
		'return_value' => 'yes',
		'description'  => esc_html__('Adds a top/bottom border and extra padding to the wrapper.', 'grozomart-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'feature_icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'feature_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Payment only online', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Feature Title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'feature_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Mobile checkout flow enhanced with behavioral UX strategies', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_feature_items',
	[
		'label' => esc_html__('Feature Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_title' => esc_html__('Payment only online', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Mobile checkout flow enhanced with behavioral UX strategies', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('New stocks & sales', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Our collection with fresh stock arriving regularly to choices.', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('Quality assurance', 'grozomart-toolkit'),
				'feature_description' => esc_html__('We follow strict quality control processes and performance.', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('Delivery from 1 hour', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Enjoy fast and reliable delivery starting from just 1 hour.', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_title }}}',
	]
);

$this->end_controls_section();
