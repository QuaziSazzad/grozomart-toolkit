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
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Agile Development for Fast and Scalable Solutions', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_three_title_tag',
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

// Accordion Items Repeater
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'step_number',
	[
		'label' => esc_html__('Step Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('01', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Step number', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'accordion_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Software Development', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type accordion title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'accordion_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'accordion_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Tailored software development that addresses specific client needs is highly valued. From business automation tools enterprise-level systems custom.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type accordion content here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Button text', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => true,
			'nofollow' => true,
		],
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
	'layout_three_accordion_items',
	[
		'label' => esc_html__('Accordion Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'step_number' => '01',
				'accordion_title' => esc_html__('Software Development', 'grozomart-toolkit'),
				'accordion_content' => esc_html__('Tailored software development that addresses specific client needs is highly valued. From business automation tools enterprise-level systems custom.', 'grozomart-toolkit'),
				'button_text' => esc_html__('Read More', 'grozomart-toolkit'),
				'is_active' => 'no',
			],
			[
				'step_number' => '02',
				'accordion_title' => esc_html__('Cloud Solutions and Migration', 'grozomart-toolkit'),
				'accordion_content' => esc_html__('Tailored software development that addresses specific client needs is highly valued. From business automation tools enterprise-level systems custom.', 'grozomart-toolkit'),
				'button_text' => esc_html__('Read More', 'grozomart-toolkit'),
				'is_active' => 'yes',
			],
		],
		'title_field' => '{{{ step_number }}} - {{{ accordion_title }}}',
	]
);

$this->add_control(
	'layout_three_view_more_text',
	[
		'label' => esc_html__('View More Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('View More Services', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Button text', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_view_more_url',
	[
		'label' => esc_html__('View More Button URL', 'grozomart-toolkit'),
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

$this->add_control(
	'layout_three_background_color',
	[
		'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
		'type'      => \Elementor\Controls_Manager::COLOR,
		'default'   => '',
		'selectors' => [
			'{{WRAPPER}} .bgc-gray' => 'background-color: {{VALUE}};',
		],
	]
);

$this->end_controls_section();
