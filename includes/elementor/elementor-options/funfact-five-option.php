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


$repeater = new \Elementor\Repeater();

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

$repeater->add_control(
	'number',
	[
		'label' => esc_html__('Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('8', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter number', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'symbol',
	[
		'label' => esc_html__('Symbol', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => 'k+',
		'label_block' => true,
	]
);



$repeater->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-idea',
			'library' => 'flaticon',
		],
	]
);

$this->add_control(
	'layout_five_counter_list',
	[
		'label' => esc_html__('Counter Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'icon' => ['value' => 'flaticon-idea', 'library' => 'flaticon'],
				'number' => '8',
				'symbol' => 'k+',
				'title' => esc_html__('Project Complete', 'grozomart-toolkit'),
			],
			[
				'icon' => ['value' => 'flaticon-grow', 'library' => 'flaticon'],
				'number' => '5',
				'symbol' => 'k+',
				'title' => esc_html__('We\'ve Global Trusted Clients', 'grozomart-toolkit'),
			],
			[
				'icon' => ['value' => 'flaticon-data-protection', 'library' => 'flaticon'],
				'number' => '23',
				'symbol' => '+',
				'title' => esc_html__('Awards Winning', 'grozomart-toolkit'),
			],
			[
				'icon' => ['value' => 'flaticon-protection-1', 'library' => 'flaticon'],
				'number' => '20',
				'symbol' => '+',
				'title' => esc_html__('IT & Tech Services', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);

$this->add_control(
	'layout_five_background',
	[
		'label' => esc_html__('Background Color', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'default' => '#FC5546',
		'selectors' => [
			'{{WRAPPER}} .bgc-primary' => 'background-color: {{VALUE}};',
		],
	]
);



$this->end_controls_section();
