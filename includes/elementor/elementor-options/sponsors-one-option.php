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


$layout_one_sponsors = new \Elementor\Repeater();

$layout_one_sponsors->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$layout_one_sponsors->add_control(
	'url',
	[
		'label' => esc_html__('Url', 'grozomart-toolkit'),
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
	'layout_one_sponsors',
	[
		'label' => esc_html__('Sponsor List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_sponsors->get_controls(),
		'prevent_empty' => false,
	]
);

$this->end_controls_section();
