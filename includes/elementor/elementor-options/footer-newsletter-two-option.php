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
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_two_placeholder',
	[
		'label' => esc_html__('Placeholder Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Placeholder Text', 'grozomart-toolkit'),
		'default' => esc_html__('Email Address', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_two_btn_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Button Text', 'grozomart-toolkit'),
		'default' => esc_html__('Sign Up', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$this->end_controls_section();
