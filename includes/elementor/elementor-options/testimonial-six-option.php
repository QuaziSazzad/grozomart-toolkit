<?php

//content
$this->start_controls_section(
	'layout_six_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_six'
		]
	]
);


$this->add_control(
	'layout_six_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_six_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => false,
		'options'     => [
			'h1' => [
				'title' => esc_html__('H1', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h6',
			],
		],
		'default'     => 'h2',
		'toggle'      => false,
	]
);

$this->add_control(
	'layout_six_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Sub Title', 'grozomart-toolkit'),
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Robert S. Hummel', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type client name here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('CEO & Founder', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type client designation here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'testimonial',
	[
		'label' => esc_html__('Testimonial', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type client testimonial here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Client Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'rating',
	[
		'label' => esc_html__('Rating', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '5',
		'options' => [
			'1' => esc_html__('1 Star', 'grozomart-toolkit'),
			'2' => esc_html__('2 Stars', 'grozomart-toolkit'),
			'3' => esc_html__('3 Stars', 'grozomart-toolkit'),
			'4' => esc_html__('4 Stars', 'grozomart-toolkit'),
			'5' => esc_html__('5 Stars', 'grozomart-toolkit'),
		],
	]
);

$this->add_control(
	'layout_six_testimonial',
	[
		'label' => esc_html__('Testimonials', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'name' => esc_html__('Robert S. Hummel', 'grozomart-toolkit'),
				'designation' => esc_html__('CEO & Founder', 'grozomart-toolkit'),
				'testimonial' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'grozomart-toolkit'),
				'rating' => '5',
			],
			[
				'name' => esc_html__('Leonard G. Trahan', 'grozomart-toolkit'),
				'designation' => esc_html__('Web Designer', 'grozomart-toolkit'),
				'testimonial' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'grozomart-toolkit'),
				'rating' => '5',
			],
		],
		'title_field' => '{{{ name }}}',
	]
);

$this->add_control(
	'layout_six_client_title',
	[
		'label' => esc_html__('Client Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Clients Testimonials', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type client title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_client_image',
	[
		'label' => esc_html__('Client Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::GALLERY,
		'default' => [],
	]
);

$this->end_controls_section();
