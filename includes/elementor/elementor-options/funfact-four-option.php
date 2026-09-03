<?php

//content
$this->start_controls_section(
	'layout_four_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$this->add_control(
	'layout_four_title',
	[
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Adventz Is Partnered With 10k+ Fastest Growing Companies From 2010', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter section title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'default'     => 'h3',
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
	]
);

$this->add_control(
	'layout_four_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Egestas dictum lectus diam commodo. Et tristique nunc faucibus sit tortor commodo aliquet commodo quam.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter description', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-protection-1',
			'library' => 'flaticon',
		],
	]
);

$repeater->add_control(
	'number',
	[
		'label' => esc_html__('Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('2563', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter number', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'symbol',
	[
		'label' => esc_html__('Symbol', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'plus',
		'options' => [
			'plus' => esc_html__('+', 'grozomart-toolkit'),
			'percent' => esc_html__('%', 'grozomart-toolkit'),
			'none' => esc_html__('None', 'grozomart-toolkit'),
		],
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Project Complete', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_counter_list',
	[
		'label' => esc_html__('Counter Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'icon' => ['value' => 'flaticon-protection-1', 'library' => 'flaticon'],
				'number' => '2563',
				'symbol' => 'plus',
				'title' => esc_html__('Project Complete', 'grozomart-toolkit'),
			],
			[
				'icon' => ['value' => 'flaticon-recovery', 'library' => 'flaticon'],
				'number' => '98.9',
				'symbol' => 'percent',
				'title' => esc_html__('Clients Happy', 'grozomart-toolkit'),
			],
			[
				'icon' => ['value' => 'flaticon-cyber-security-2', 'library' => 'flaticon'],
				'number' => '35.6',
				'symbol' => 'plus',
				'title' => esc_html__('Years Experience', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);

$this->add_control(
	'layout_four_background',
	[
		'label' => esc_html__('Background Color', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'default' => '#1b1f2e',
		'selectors' => [
			'{{WRAPPER}} .bgc-gray' => 'background-color: {{VALUE}};',
		],
	]
);


$this->end_controls_section();
