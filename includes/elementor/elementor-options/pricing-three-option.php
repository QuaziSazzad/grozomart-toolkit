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
		'default' => esc_html__('Easy to Start, Easy to Scale Website Builder Plans', 'grozomart-toolkit'),
		'label_block' => true,
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

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_three_package_title',
	[
		'label' => esc_html__('Package Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Regular', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_package_color',
	[
		'label' => esc_html__('Title Color Class', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '',
		'options' => [
			'' => esc_html__('Default', 'grozomart-toolkit'),
			'color-two' => esc_html__('Color Two', 'grozomart-toolkit'),
			'color-four' => esc_html__('Color Four', 'grozomart-toolkit'),
		],
	]
);

$repeater->add_control(
	'layout_three_price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('15', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_duration',
	[
		'label' => esc_html__('Duration', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/m', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Data curation involve the careful election organization, and maintenance', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_features',
	[
		'label' => esc_html__('Features', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => [
			[
				'name' => 'feature_text',
				'label' => esc_html__('Feature Text', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('2 Limited sites available', 'grozomart-toolkit'),
				'label_block' => true,
			],
			[
				'name' => 'is_hidden',
				'label' => esc_html__('Hide Feature', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
				'label_off' => esc_html__('No', 'grozomart-toolkit'),
				'return_value' => 'yes',
				'default' => 'no',
			],
		],
		'default' => [
			[
				'feature_text' => esc_html__('2 Limited sites available', 'grozomart-toolkit'),
				'is_hidden' => 'no',
			],
			[
				'feature_text' => esc_html__('1 GB storage per site', 'grozomart-toolkit'),
				'is_hidden' => 'no',
			],
			[
				'feature_text' => esc_html__('Up to 5 pages per site', 'grozomart-toolkit'),
				'is_hidden' => 'no',
			],
			[
				'feature_text' => esc_html__('Free SSL for custom domain', 'grozomart-toolkit'),
				'is_hidden' => 'yes',
			],
			[
				'feature_text' => esc_html__('Connect custom domain', 'grozomart-toolkit'),
				'is_hidden' => 'yes',
			],
		],
		'title_field' => '{{{ feature_text }}}',
	]
);

$repeater->add_control(
	'layout_three_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_footer_text',
	[
		'label' => esc_html__('Footer Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('No credit card required', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_pricing_items',
	[
		'label' => esc_html__('Pricing Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_three_package_title' => esc_html__('Regular', 'grozomart-toolkit'),
				'layout_three_package_color' => '',
				'layout_three_price' => '15',
				'layout_three_duration' => '/m',
			],
			[
				'layout_three_package_title' => esc_html__('Standard', 'grozomart-toolkit'),
				'layout_three_package_color' => 'color-two',
				'layout_three_price' => '35',
				'layout_three_duration' => '/m',
			],
			[
				'layout_three_package_title' => esc_html__('Diamond', 'grozomart-toolkit'),
				'layout_three_package_color' => 'color-four',
				'layout_three_price' => '98',
				'layout_three_duration' => '/m',
			],
		],
		'title_field' => '{{{ layout_three_package_title }}}',
	]
);


$this->end_controls_section();
