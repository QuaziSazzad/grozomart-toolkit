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
	'feature_text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Fast & Secure Shipping', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_feature_items',
	[
		'label' => esc_html__('Feature Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_text' => esc_html__('Fast & Secure Shipping', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('Money Back Guarantee', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('40% Discount For First Order', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('Hassel Free Return Policy', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_text }}}',
	]
);

$this->end_controls_section();
