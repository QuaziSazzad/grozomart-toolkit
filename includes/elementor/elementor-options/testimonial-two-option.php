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
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('What’s Our Clients Say Us', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_title_tag',
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


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('James Carter,', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type client name here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Operations Manager', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type client designation here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'testimonial',
	[
		'label' => esc_html__('Testimonial', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('“An exceptional shopping experience with consistently fresh products and a well-organized layout. Highly dependable.”', 'grozomart-toolkit'),
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
	'layout_two_testimonial',
	[
		'label' => esc_html__('Testimonials', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'name' => esc_html__('James Carter,', 'grozomart-toolkit'),
				'designation' => esc_html__('Operations Manager', 'grozomart-toolkit'),
				'testimonial' => esc_html__('“An exceptional shopping experience with consistently fresh products and a well-organized layout. Highly dependable.”', 'grozomart-toolkit'),
				'rating' => '5',
			],
			[
				'name' => esc_html__('Olivia Bennett,', 'grozomart-toolkit'),
				'designation' => esc_html__('Nutrition Consultant', 'grozomart-toolkit'),
				'testimonial' => esc_html__('“An exceptional shopping experience with consistently fresh products and a well-organized layout. Highly dependable.”', 'grozomart-toolkit'),
				'rating' => '5',
			],
			[
				'name' => esc_html__('Michael Anderson', 'grozomart-toolkit'),
				'designation' => esc_html__('Business Analyst', 'grozomart-toolkit'),
				'testimonial' => esc_html__('“An exceptional shopping experience with consistently fresh products and a well-organized layout. Highly dependable.”', 'grozomart-toolkit'),
				'rating' => '5',
			],
		],
		'title_field' => '{{{ name }}}',
	]
);


$this->end_controls_section();
