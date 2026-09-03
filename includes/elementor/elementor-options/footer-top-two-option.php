<?php

//content
$this->start_controls_section(
	'layout_two_section_left_content',
	[
		'label' => esc_html__('Left Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_left_title',
	[
		'label' => esc_html__('Left Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Need Any Support ?', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_left_summary_text',
	[
		'label' => esc_html__('Left Summary Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Default Summary', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your summary text here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_left_url',
	[
		'label' => esc_html__('URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);


$this->end_controls_section();


//content
$this->start_controls_section(
	'layout_two_section_right_content',
	[
		'label' => esc_html__('Right Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_right_title',
	[
		'label' => esc_html__('Right Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Need Any Support ?', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_right_summary_text',
	[
		'label' => esc_html__('Right Summary Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Default Summary', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your summary text here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_right_url',
	[
		'label' => esc_html__('URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);


$this->end_controls_section();
