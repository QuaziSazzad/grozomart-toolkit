<?php

//content
$this->start_controls_section(
	'layout_five_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);


$this->add_control(
	'layout_five_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Guiding You Through Every Step of the IT Journey', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_five_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => true,
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
	'layout_five_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Working Process', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_working_process_list = new \Elementor\Repeater();

$layout_five_working_process_list->add_control(
	'index',
	[
		'label' => esc_html__('Index', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Index', 'grozomart-toolkit'),
		'default' => esc_html__('01', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_working_process_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Default title', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_working_process_list->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Description', 'grozomart-toolkit'),
		'default' => esc_html__('Default description', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_five_working_process_list',
	[
		'label' => esc_html__('Working Process', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_five_working_process_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ title }}}',
		'label_block' => true,
		'default' => [
			[
				'index' => '01',
				'title' => 'Discovery & Assessment',
				'description' => 'Gathering information defining the project scope, and creating roadmap ensures alignment.'
			],
			[
				'index' => '02',
				'title' => 'Design & Prototyping',
				'description' => 'Based on the requirements, the design team to wireframes, user interfaces prototypes.'
			],
			[
				'index' => '03',
				'title' => 'Development & Testing',
				'description' => 'Development team builds the solution by writing integrating systems, and implementing.'
			],
			[
				'index' => '04',
				'title' => 'Deployment & Support',
				'description' => 'Once tested and approved the software develop environment or hosted on the cloud.'
			]
		]
	]
);



$this->end_controls_section();
