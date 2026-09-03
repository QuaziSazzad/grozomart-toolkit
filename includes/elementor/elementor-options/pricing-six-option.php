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
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Find the Right Solution for Your Budget Custom Plans', 'grozomart-toolkit'),
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
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Pricing Package', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_six_show_tabs',
	[
		'label' => esc_html__('Show Pricing Tabs', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'grozomart-toolkit'),
		'label_off' => esc_html__('Hide', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_monthly_tab_text',
	[
		'label' => esc_html__('Monthly Tab Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Monthly', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type monthly tab text here', 'grozomart-toolkit'),
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_yearly_tab_text',
	[
		'label' => esc_html__('Yearly Tab Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Yearly', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type yearly tab text here', 'grozomart-toolkit'),
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
		'label_block' => true,
	]
);

// Monthly Pricing Items
$this->add_control(
	'layout_six_monthly_pricing_heading',
	[
		'label' => esc_html__('Monthly Pricing Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$monthly_repeater = new \Elementor\Repeater();

$monthly_repeater->add_control(
	'layout_six_monthly_package_title',
	[
		'label' => esc_html__('Package Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Basic Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_package_subtitle',
	[
		'label' => esc_html__('Package Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$500', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_duration',
	[
		'label' => esc_html__('Duration', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per month', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Our Basic AI Technology Service Plan is design for businesses looking to explore the power of AI with cost-effective', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_button_url',
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

$this->add_control(
	'layout_six_monthly_pricing_items',
	[
		'label' => esc_html__('Monthly Pricing Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $monthly_repeater->get_controls(),
		'default' => [
			[
				'layout_six_monthly_package_title' => esc_html__('Basic Package', 'grozomart-toolkit'),
				'layout_six_monthly_package_subtitle' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
				'layout_six_monthly_price' => esc_html__('$500', 'grozomart-toolkit'),
				'layout_six_monthly_duration' => esc_html__('/per month', 'grozomart-toolkit'),
				'layout_six_monthly_button_text' => esc_html__('Choose Package', 'grozomart-toolkit'),
			],
			[
				'layout_six_monthly_package_title' => esc_html__('Standard Package', 'grozomart-toolkit'),
				'layout_six_monthly_package_subtitle' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
				'layout_six_monthly_price' => esc_html__('$850', 'grozomart-toolkit'),
				'layout_six_monthly_duration' => esc_html__('/per month', 'grozomart-toolkit'),
				'layout_six_monthly_button_text' => esc_html__('Choose Package', 'grozomart-toolkit'),
			],
			[
				'layout_six_monthly_package_title' => esc_html__('Custom Package', 'grozomart-toolkit'),
				'layout_six_monthly_package_subtitle' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
				'layout_six_monthly_price' => esc_html__('$990', 'grozomart-toolkit'),
				'layout_six_monthly_duration' => esc_html__('/per month', 'grozomart-toolkit'),
				'layout_six_monthly_button_text' => esc_html__('Choose Package', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ layout_six_monthly_package_title }}}',
	]
);

// Yearly Pricing Items
$this->add_control(
	'layout_six_yearly_pricing_heading',
	[
		'label' => esc_html__('Yearly Pricing Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
	]
);

$yearly_repeater = new \Elementor\Repeater();

$yearly_repeater->add_control(
	'layout_six_yearly_package_title',
	[
		'label' => esc_html__('Package Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Basic Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_package_subtitle',
	[
		'label' => esc_html__('Package Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$550', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_duration',
	[
		'label' => esc_html__('Duration', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per month', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Our Basic AI Technology Service Plan is design for businesses looking to explore the power of AI with cost-effective', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_button_url',
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

$this->add_control(
	'layout_six_yearly_pricing_items',
	[
		'label' => esc_html__('Yearly Pricing Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $yearly_repeater->get_controls(),
		'default' => [
			[
				'layout_six_yearly_package_title' => esc_html__('Basic Package', 'grozomart-toolkit'),
				'layout_six_yearly_package_subtitle' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
				'layout_six_yearly_price' => esc_html__('$550', 'grozomart-toolkit'),
				'layout_six_yearly_duration' => esc_html__('/per month', 'grozomart-toolkit'),
				'layout_six_yearly_button_text' => esc_html__('Choose Package', 'grozomart-toolkit'),
			],
			[
				'layout_six_yearly_package_title' => esc_html__('Standard Package', 'grozomart-toolkit'),
				'layout_six_yearly_package_subtitle' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
				'layout_six_yearly_price' => esc_html__('$900', 'grozomart-toolkit'),
				'layout_six_yearly_duration' => esc_html__('/per month', 'grozomart-toolkit'),
				'layout_six_yearly_button_text' => esc_html__('Choose Package', 'grozomart-toolkit'),
			],
			[
				'layout_six_yearly_package_title' => esc_html__('Custom Package', 'grozomart-toolkit'),
				'layout_six_yearly_package_subtitle' => esc_html__('Small businesses and startups', 'grozomart-toolkit'),
				'layout_six_yearly_price' => esc_html__('$999', 'grozomart-toolkit'),
				'layout_six_yearly_duration' => esc_html__('/per month', 'grozomart-toolkit'),
				'layout_six_yearly_button_text' => esc_html__('Choose Package', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ layout_six_yearly_package_title }}}',
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
	]
);


$this->end_controls_section();
