<?php

//content
$this->start_controls_section(
	'layout_fourteen_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_fourteen'
		]
	]
);

$this->add_control(
	'layout_fourteen_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<span class="thin">AI-Driven</span> Technology Services', 'grozomart-toolkit'), array(
			'span' => array(
				'class' => array(),
			),
		)),
		'placeholder' => esc_html__('Enter title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_fourteen_title_tag',
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
	'layout_fourteen_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Professional IT Services', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter subtitle', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'service_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('AI-Powered Automation', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter service title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Streamline workflows improve efficiency with intelligent automation solutions.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter service description', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_link',
	[
		'label' => esc_html__('Link', 'grozomart-toolkit'),
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
	'service_icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-algorithm',
			'library' => 'flaticon',
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'read_more',
	[
		'label' => esc_html__('Read More', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter read more', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_fourteen_services',
	[
		'label' => esc_html__('Services', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'service_icon' => [
					'value' => 'flaticon-algorithm',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('AI-Powered Automation', 'grozomart-toolkit'),
				'service_description' => esc_html__('Streamline workflows improve efficiency with intelligent automation solutions.', 'grozomart-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-flexibility',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('Machine Learning Solutions', 'grozomart-toolkit'),
				'service_description' => esc_html__('Unlock data-driven insights predictive analytics smarter decision-making.', 'grozomart-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-data',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('AI-Driven Data Analytics', 'grozomart-toolkit'),
				'service_description' => esc_html__('Leverage AI for deep data analysis, and forecasting, business intelligence.', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ service_title }}}',
	]
);

$this->add_control(
	'layout_fourteen_bg_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'label_block' => true,
	]
);

$this->end_controls_section();
