<?php

//content
$this->start_controls_section(
	'layout_seven_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_seven'
		]
	]
);


$this->add_control(
	'layout_seven_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => wp_kses(__('<span class="thin">Frequently</span> Asked Questions', 'grozomart-toolkit'), ['span' => ['class' => []]]),
	]
);

$this->add_control(
	'layout_seven_title_tag',
	[
		'label' => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => true,
		'options' => [
			'h1' => [
				'title' => esc_html__('H1', 'grozomart-toolkit'),
				'icon' => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'grozomart-toolkit'),
				'icon' => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'grozomart-toolkit'),
				'icon' => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'grozomart-toolkit'),
				'icon' => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'grozomart-toolkit'),
				'icon' => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'grozomart-toolkit'),
				'icon' => 'eicon-editor-h6',
			],
		],
		'default' => 'h2',
	]
);

$this->add_control(
	'layout_seven_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add subtitle', 'grozomart-toolkit'),
		'default' => esc_html__('Asked Questions', 'grozomart-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'faq_title',
	[
		'label' => esc_html__('FAQ Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add FAQ title', 'grozomart-toolkit'),
		'default' => esc_html__('What is cybersecurity, and it important?', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'faq_content',
	[
		'label' => esc_html__('FAQ Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add FAQ content', 'grozomart-toolkit'),
		'default' => esc_html__('Use strong, unique passwords and enable multi-factor authentication update software and systems Educate employees about cybersecurity best practices', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'is_active',
	[
		'label' => esc_html__('Is Active?', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_block' => true,
		'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off' => esc_html__('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'layout_seven_faq_items',
	[
		'label' => esc_html__('FAQ Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'title_field' => '{{{ faq_title }}}',
		'default' => [
			[
				'faq_title' => esc_html__('What is cybersecurity, and it important?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Use strong, unique passwords and enable multi-factor authentication update software and systems Educate employees about cybersecurity best practices', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('How can I protect my organization?', 'grozomart-toolkit'),
				'faq_content' => esc_html__('Use strong, unique passwords and enable multi-factor authentication update software and systems Educate employees cybersecurity', 'grozomart-toolkit'),
				'is_active' => 'yes',
			],
		],
	]
);

$this->add_control(
	'layout_seven_image',
	[
		'label' => esc_html__('FAQ Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_seven_logo',
	[
		'label' => esc_html__('Logo Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [],
	]
);




$this->end_controls_section();
