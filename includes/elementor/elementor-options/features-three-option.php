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
	'feature_icon',
	[
		'label' => esc_html__('Icon Image', 'grozomart-toolkit'),
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
		'default' => esc_html__('Free Shipping', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Feature Title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'feature_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('ERP provides a complete leave HR. Upcoming holidays and', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_three_feature_items',
	[
		'label' => esc_html__('Feature Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_title' => esc_html__('Free Shipping', 'grozomart-toolkit'),
				'feature_description' => esc_html__('ERP provides a complete leave HR. Upcoming holidays and', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('Money Back Guraantee', 'grozomart-toolkit'),
				'feature_description' => esc_html__('ERP provides a complete leave HR. Upcoming holidays and', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('100% Secure', 'grozomart-toolkit'),
				'feature_description' => esc_html__('ERP provides a complete leave HR. Upcoming holidays and', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_title }}}',
	]
);

$this->end_controls_section();
