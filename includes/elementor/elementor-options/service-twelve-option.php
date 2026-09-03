<?php


//content
$this->start_controls_section(
	'layout_twelve_content',
	[
		'label' => esc_html__('Content', 'ridda-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_twelve'
		]
	]
);

$this->add_control(
	'layout_twelve_title',
	[
		'label' => esc_html__('Section Title', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Empowering Businesses With Advanced Tech Solutions', 'ridda-toolkit'),
		'placeholder' => esc_html__('Enter title', 'ridda-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_twelve_title_tag',
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
	'layout_twelve_subtitle',
	[
		'label' => esc_html__('Section Subtitle', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Modern IT Solutions', 'ridda-toolkit'),
		'placeholder' => esc_html__('Enter subtitle', 'ridda-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_twelve_description',
	[
		'label' => esc_html__('Section Description', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We specialize crafting adaptable scalable software solutions evolve business needs team of experts is committed to using', 'ridda-toolkit'),
		'placeholder' => esc_html__('Enter description', 'ridda-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_twelve_button_text',
	[
		'label' => esc_html__('Button Text', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Explore Services', 'ridda-toolkit'),
		'placeholder' => esc_html__('Enter button text', 'ridda-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_twelve_button_url',
	[
		'label' => esc_html__('Button URL', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'ridda-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

// services Repeater
$services_repeater = new \Elementor\Repeater();

$services_repeater->add_control(
	'service_title',
	[
		'label' => esc_html__('Title', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Customizable Solutions', 'ridda-toolkit'),
		'placeholder' => esc_html__('Enter service title', 'ridda-toolkit'),
		'label_block' => true,
	]
);

$services_repeater->add_control(
	'service_description',
	[
		'label' => esc_html__('Description', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Providing highly customizable solutions tailored to each client\'s unique needs can set you apart. Clients are looking.', 'ridda-toolkit'),
		'placeholder' => esc_html__('Enter service description', 'ridda-toolkit'),
		'label_block' => true,
	]
);

$services_repeater->add_control(
	'service_icon',
	[
		'label' => esc_html__('Icon', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-idea',
			'library' => 'custom-icon',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_twelve_services',
	[
		'label' => esc_html__('services', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $services_repeater->get_controls(),
		'default' => [
			[
				'service_icon' => [
					'value' => 'flaticon-idea',
					'library' => 'custom-icon',
				],
				'service_title' => esc_html__('Customizable Solutions', 'ridda-toolkit'),
				'service_description' => esc_html__('Providing highly customizable solutions tailored to each client\'s unique needs can set you apart. Clients are looking.', 'ridda-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-grow',
					'library' => 'custom-icon',
				],
				'service_title' => esc_html__('Scalability & Flexibility', 'ridda-toolkit'),
				'service_description' => esc_html__('Scalable solutions allow companies to grow without needing to overhaul their software infrastructure architecture.', 'ridda-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-data-protection',
					'library' => 'custom-icon',
				],
				'service_title' => esc_html__('Security & Compliance', 'ridda-toolkit'),
				'service_description' => esc_html__('Prioritizing security ensures protection and compliance with industry standards and regulations, safeguarding against.', 'ridda-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-graphic-design',
					'library' => 'custom-icon',
				],
				'service_title' => esc_html__('User-Friendly Interface', 'ridda-toolkit'),
				'service_description' => esc_html__('Accessibility services, and thoughtful design help clients and their teams adapt quickly and use the solution effectively.', 'ridda-toolkit'),
			],
		],
		'title_field' => '{{{ service_title }}}',
	]
);

$this->end_controls_section();
