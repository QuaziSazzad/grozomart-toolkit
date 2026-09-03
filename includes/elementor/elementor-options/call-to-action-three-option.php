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

$this->add_control(
	'layout_three_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Super discount for your first purchase', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_three_title_link_text',
	[
		'label' => esc_html__('Title Link Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('first purchase', 'grozomart-toolkit'),
		'label_block' => true,
		'description' => esc_html__('This part of the title text becomes a link. Must match text inside the Title above exactly.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_three_title_link_url',
	[
		'label' => esc_html__('Title Link Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
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
	'layout_three_code_text',
	[
		'label' => esc_html__('Discount Code', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('FREE25BAC', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_code_url',
	[
		'label' => esc_html__('Discount Code Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
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
	'layout_three_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('use discount code to get 20% discount for any item', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();
