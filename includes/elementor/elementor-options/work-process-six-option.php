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
		'default' => wp_kses(__('<span class="thin">Guiding You Through Every Step</span> of the IT Journey', 'grozomart-toolkit'), [
			'span' => [
				'class' => [],
			],
		]),
		'label_block' => true
	]
);

$this->add_control(
	'layout_six_title_tag',
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
	]
);

$this->add_control(
	'layout_six_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Working Process', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$repeater = new \Elementor\Repeater();


$repeater->add_control(
	'step_number',
	[
		'label' => esc_html__('Step Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('1', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Discovery & Strategy Planning', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Understand client needs, business challenges, and goals. Conduct market research and data analysis', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_six_working_process_list',
	[
		'label' => esc_html__('Work Process Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'step_number' => '1',
				'title' => esc_html__('Discovery & Strategy Planning', 'grozomart-toolkit'),
				'description' => esc_html__('Understand client needs, business challenges, and goals. Conduct market research and data analysis', 'grozomart-toolkit'),
			],
			[
				'step_number' => '2',
				'title' => esc_html__('AI Development & Implementation', 'grozomart-toolkit'),
				'description' => esc_html__('Design, develop, and train AI models tailored the client\'s needs. Integrate AI solutions into existing systems', 'grozomart-toolkit'),
			],
			[
				'step_number' => '3',
				'title' => esc_html__('Deployment, Monitoring & Improvement', 'grozomart-toolkit'),
				'description' => esc_html__('Understand client needs, business challenges, and goals. Conduct market research and data analysis', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);



$this->end_controls_section();
