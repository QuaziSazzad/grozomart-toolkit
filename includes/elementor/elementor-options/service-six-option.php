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
	'layout_six_section_title',
	[
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Power Generative AI With Your Data', 'grozomart-toolkit'),
		'label_block' => true,
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
	'layout_six_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Started Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
		],
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_six_service_icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-it',
			'library' => 'flaticon',
		],
	]
);

$repeater->add_control(
	'layout_six_service_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('AI Powered Results', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_six_service_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('AI-powered results leverage advanced artificial intelligence algorithms to provide highly accurate', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_six_service_link',
	[
		'label' => esc_html__('Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
		],
	]
);


$this->add_control(
	'layout_six_service_items',
	[
		'label' => esc_html__('Service Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-it',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('AI Powered Results', 'grozomart-toolkit'),
				'layout_six_service_description' => esc_html__('AI-powered results leverage advanced artificial intelligence algorithms to provide highly accurate', 'grozomart-toolkit'),
				'layout_six_animation_delay' => 0,
			],
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-network-security',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('Payment Gateways', 'grozomart-toolkit'),
				'layout_six_service_description' => esc_html__('Payment gateways are secure online platforms that facilitate the transfer of funds customers', 'grozomart-toolkit'),
				'layout_six_animation_delay' => 100,
			],
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-cloud',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('Multilingual', 'grozomart-toolkit'),
				'layout_six_service_description' => esc_html__('Multilingual refers to the capability of a system, software, or individual to operate and communicate', 'grozomart-toolkit'),
				'layout_six_animation_delay' => 0,
			],
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-data-management',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('Support Platform', 'grozomart-toolkit'),
				'layout_six_service_description' => esc_html__('A support platform is a software or service that enables organizations to manage customer inquiries', 'grozomart-toolkit'),
				'layout_six_animation_delay' => 100,
			],
		],
		'title_field' => '{{{ layout_six_service_title }}}',
	]
);


$this->end_controls_section();
