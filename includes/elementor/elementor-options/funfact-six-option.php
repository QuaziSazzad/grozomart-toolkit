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
		'label' => esc_html__('Title ', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<span class="thin">Modern Design Agency</span> Blueprint Innovation', 'grozomart-toolkit'), ['span' => ['class' => []]]),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
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
	'layout_six_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Great Achievement', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We empower businesses to thrive in the digital system with best innovative IT solutions.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_six_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Consultation', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your button text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'label_block' => true,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'counter_number',
	[
		'label' => esc_html__('Counter Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => '8',
		'placeholder' => esc_html__('Enter counter number', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'counter_suffix',
	[
		'label' => esc_html__('Counter Suffix', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => 'k+',
		'placeholder' => esc_html__('Enter suffix (e.g. k+, +, etc.)', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'counter_title',
	[
		'label' => esc_html__('Counter Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Project Complete', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter counter title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_counter_items',
	[
		'label' => esc_html__('Counter Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'counter_number' => '8',
				'counter_suffix' => 'k+',
				'counter_title' => esc_html__('Project Complete', 'grozomart-toolkit'),
			],
			[
				'counter_number' => '5',
				'counter_suffix' => 'k+',
				'counter_title' => esc_html__('Global Clients', 'grozomart-toolkit'),
			],
			[
				'counter_number' => '23',
				'counter_suffix' => '+',
				'counter_title' => esc_html__('Awards Winning', 'grozomart-toolkit'),
			],
			[
				'counter_number' => '20',
				'counter_suffix' => '+',
				'counter_title' => esc_html__('Expert Team Member', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ counter_title }}}',
	]
);

$this->add_control(
	'layout_six_background_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
