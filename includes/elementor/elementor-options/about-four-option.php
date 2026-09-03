<?php

//content
$this->start_controls_section(
	'layout_four_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$this->add_control(
	'layout_four_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Protecting Businesses with Cutting-Edge Cybersecurity', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Learn About Us', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_four_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Cybersecurity solutions provide the tools and strategies to safeguard sensitive information, ensure the integrity of digital assets, and maintain business continuity implementing robust firewalls and encryption to proactive monitoring.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'grozomart-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_four_feature_icon',
	[
		'label' => esc_html__('Feature Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-cyber-security-2',
			'library' => 'flaticon',
		],
	]
);

$repeater->add_control(
	'layout_four_feature_title',
	[
		'label' => esc_html__('Feature Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Comprehensive Threat Assessment', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type feature title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_four_feature_link',
	[
		'label' => esc_html__('Feature Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => true,
			'nofollow' => true,
		],
	]
);

$this->add_control(
	'layout_four_features',
	[
		'label' => esc_html__('Features', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_four_feature_icon' => [
					'value' => 'flaticon-cyber-security-2',
					'library' => 'flaticon',
				],
				'layout_four_feature_title' => esc_html__('Comprehensive Threat Assessment', 'grozomart-toolkit'),
				'layout_four_feature_link' => [
					'url' => '#',
				],
			],
			[
				'layout_four_feature_icon' => [
					'value' => 'flaticon-recovery',
					'library' => 'flaticon',
				],
				'layout_four_feature_title' => esc_html__('Incident Response and Recovery', 'grozomart-toolkit'),
				'layout_four_feature_link' => [
					'url' => '#',
				],
			],
			[
				'layout_four_feature_icon' => [
					'value' => 'flaticon-protection',
					'library' => 'flaticon',
				],
				'layout_four_feature_title' => esc_html__('Data Encryption and Protection', 'grozomart-toolkit'),
				'layout_four_feature_link' => [
					'url' => '#',
				],
			],
			[
				'layout_four_feature_icon' => [
					'value' => 'flaticon-protection-1',
					'library' => 'flaticon',
				],
				'layout_four_feature_title' => esc_html__('Employee Training and Awareness', 'grozomart-toolkit'),
				'layout_four_feature_link' => [
					'url' => '#',
				],
			],
		],
		'title_field' => '{{{ layout_four_feature_title }}}',
	]
);

$this->add_control(
	'layout_four_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Learn More Us', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type button text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_button_link',
	[
		'label' => esc_html__('Button Link', 'grozomart-toolkit'),
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

$this->add_control(
	'layout_four_clients_text',
	[
		'label' => esc_html__('Clients Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('10m+ Trusted Clients', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type clients text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater_clients = new \Elementor\Repeater();

$repeater_clients->add_control(
	'layout_four_client_image',
	[
		'label' => esc_html__('Client Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_clients',
	[
		'label' => esc_html__('Client Images', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater_clients->get_controls(),
		'default' => [
			['layout_four_client_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
			['layout_four_client_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
			['layout_four_client_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
			['layout_four_client_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
			['layout_four_client_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()]],
		],
	]
);


$this->end_controls_section();

$this->start_controls_section(
	'layout_four_section_image',
	[
		'label' => esc_html__('Images', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$this->add_control(
	'layout_four_image_one',
	[
		'label' => esc_html__('Image One', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_image_two',
	[
		'label' => esc_html__('Image Two', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_clients_satisfied_title',
	[
		'label' => esc_html__('Clients Satisfied Caption', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('99% Clients Satisfied', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_clients_satisfied_icon',
	[
		'label' => esc_html__('Clients Satisfied Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-experience',
			'library' => 'flaticon',
		],
	]
);

$this->add_control(
	'layout_four_years_experience_title',
	[
		'label' => esc_html__('Years Experience Caption', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('15+ Years of experience', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_years_experience_icon',
	[
		'label' => esc_html__('Years Experience Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-quality',
			'library' => 'flaticon',
		],
	]
);



$this->end_controls_section();
