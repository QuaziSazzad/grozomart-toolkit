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
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Growth Advanced IT Solutions', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_three_title_tag',
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
	'layout_three_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('What We Provide', 'grozomart-toolkit'),
	]
);



$this->add_control(
	'layout_three_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('IT services encompass a wide range of solutions designed to support businesses in managing their technology infrastructure, enhancing productivity, and achieving their goals through innovative technology these services include everything from system maintenance network.', 'grozomart-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'service_icon',
	[
		'label' => esc_html__('Icon Class', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('flaticon-troubleshooting', 'grozomart-toolkit'),
		'description' => esc_html__('Enter flaticon class (e.g. flaticon-troubleshooting)', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'service_title',
	[
		'label' => esc_html__('Service Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Managed IT Solutions', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'service_link',
	[
		'label' => esc_html__('Service Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$this->add_control(
	'layout_three_services',
	[
		'label' => esc_html__('Services', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'service_icon' => 'flaticon-troubleshooting',
				'service_title' => 'Managed IT Solutions',
				'service_link' => ['url' => '#'],
			],
			[
				'service_icon' => 'flaticon-service',
				'service_title' => 'IT Consulting Solutions',
				'service_link' => ['url' => '#'],
			],
			[
				'service_icon' => 'flaticon-technical-support-2',
				'service_title' => 'IT Support & Helpdesk',
				'service_link' => ['url' => '#'],
			],
			[
				'service_icon' => 'flaticon-cloud-network',
				'service_title' => 'Hosting and Cloud Services',
				'service_link' => ['url' => '#'],
			],
			[
				'service_icon' => 'flaticon-cyber-security',
				'service_title' => 'Cyber Security Services',
				'service_link' => ['url' => '#'],
			],
			[
				'service_icon' => 'flaticon-layer',
				'service_title' => 'Software Development',
				'service_link' => ['url' => '#'],
			],
		],
		'title_field' => '{{{ service_title }}}',
	]
);

$this->add_control(
	'layout_three_video_image',
	[
		'label' => esc_html__('Video Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);



$this->end_controls_section();

$this->start_controls_section(
	'layout_three_video_content',
	[
		'label' => esc_html__('Video', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_three'
		]
	]
);

$this->add_control(
	'layout_three_video_url',
	[
		'label' => esc_html__('Video URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('https://www.youtube.com/watch?v=TfU0qjuZkJ4', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_video_title',
	[
		'label' => esc_html__('Video Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('How It Works', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_video_description',
	[
		'label' => esc_html__('Video Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Seamless IT Solutions for a Digital Future', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();
