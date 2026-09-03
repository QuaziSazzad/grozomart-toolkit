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


$this->add_control(
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Guiding You Through Every Step of the IT Journey', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_title_tag',
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
	'layout_one_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Working Process', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'step_number',
	[
		'label' => esc_html__('Step Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Step 01', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Step 01', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'step_title',
	[
		'label' => esc_html__('Step Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Discovery & Assessment', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Step Title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'step_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Digital era with innovative IT solutions tailored to their unique needs. With a focus on reliability, scalability, and security, our team delivers cutting-edge technology companies.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'grozomart-toolkit'),
	]
);



$repeater->add_control(
	'step_list_items',
	[
		'label' => esc_html__('List Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'default' => esc_html__("Software Development & Integration\nHelp Desk & Technical Support\nBusiness Continuity & Compliance", 'grozomart-toolkit'),
		'placeholder' => esc_html__('One item per line', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'step_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'is_active',
	[
		'label' => esc_html__('Active Item', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off' => esc_html__('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'work_process_items',
	[
		'label' => esc_html__('Work Process Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'step_number' => esc_html__('Step 01', 'grozomart-toolkit'),
				'step_title' => esc_html__('Discovery & Assessment', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'step_number' => esc_html__('Step 02', 'grozomart-toolkit'),
				'step_title' => esc_html__('Strategy & Planning', 'grozomart-toolkit'),
				'is_active' => 'yes',
			],
			[
				'step_number' => esc_html__('Step 03', 'grozomart-toolkit'),
				'step_title' => esc_html__('Implementation & Integration', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'step_number' => esc_html__('Step 04', 'grozomart-toolkit'),
				'step_title' => esc_html__('Ongoing Support & Optimization', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
		],
		'title_field' => '{{{ step_title }}}',
	]
);




$this->end_controls_section();
