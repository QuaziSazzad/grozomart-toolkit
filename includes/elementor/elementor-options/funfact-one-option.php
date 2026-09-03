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
	'layout_one_section_title',
	[
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Modern Design Agency Blueprint Innovation', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_title_tag',
	[
		'label' => esc_html__('Title HTML Tag', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'h2',
		'options' => [
			'h1' => esc_html__('H1', 'grozomart-toolkit'),
			'h2' => esc_html__('H2', 'grozomart-toolkit'),
			'h3' => esc_html__('H3', 'grozomart-toolkit'),
			'h4' => esc_html__('H4', 'grozomart-toolkit'),
			'h5' => esc_html__('H5', 'grozomart-toolkit'),
			'h6' => esc_html__('H6', 'grozomart-toolkit'),
		],
	]
);

$this->add_control(
	'layout_one_section_sub_title',
	[
		'label' => esc_html__('Section Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Great Achievement', 'grozomart-toolkit'),
		'label_block' => true,
	]
);



$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We empower businesses to thrive in the digital system with best innovative IT solutions.', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Consultation', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'number',
	[
		'label' => esc_html__('Counter Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => '8',
		'label_block' => true,
	]
);

$repeater->add_control(
	'symbol',
	[
		'label' => esc_html__('Counter Symbol', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => 'k+',
		'label_block' => true,
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Counter Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Project Complete', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Counter Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => '',
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_counter_list',
	[
		'label' => esc_html__('Counter Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'number' => '8',
				'symbol' => 'k+',
				'title' => esc_html__('Project Complete', 'grozomart-toolkit'),
			],
			[
				'number' => '5',
				'symbol' => 'k+',
				'title' => esc_html__('Global Clients', 'grozomart-toolkit'),
			],
			[
				'number' => '23',
				'symbol' => '+',
				'title' => esc_html__('Awards Winning', 'grozomart-toolkit'),
			],
			[
				'number' => '20',
				'symbol' => '+',
				'title' => esc_html__('Expert Team Member', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);


$this->end_controls_section();

$this->start_controls_section(
	'section_image_one',
	[
		'label' => esc_html__('Images', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_bg_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->end_controls_section();
