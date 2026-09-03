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
		'default' => esc_html__('Delivering Visionary IT Solutions for Modern Challenges', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_five_title_tag',
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
	'faq_title',
	[
		'label' => esc_html__('FAQ Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('FAQ Title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'faq_content',
	[
		'label' => esc_html__('FAQ Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('FAQ Content goes here', 'grozomart-toolkit'),
		'label_block' => true,
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
	'layout_five_faq_items',
	[
		'label' => esc_html__('FAQ Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'faq_title' => esc_html__('Who Can Benefit from Services?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('Approach Cybersecurity?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'grozomart-toolkit'),
				'is_active' => 'yes',
			],
			[
				'faq_title' => esc_html__('Provide Custom IT Solutions?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('Process for Working?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('Help with Cloud Solutions?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
		],
		'title_field' => '{{{ faq_title }}}',
	]
);

$this->add_control(
	'layout_five_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
