<?php

//content
$this->start_controls_section(
	'layout_thirteen_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_thirteen'
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'feature_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Feature Title', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter feature title', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'feature_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Feature description goes here', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Enter feature description', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'feature_link',
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
	'feature_icon',
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

$this->add_control(
	'layout_thirteen_services',
	[
		'label' => esc_html__('Services', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_icon' => [
					'value' => 'flaticon-algorithm',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Innovative & Scalable Technology Solutions', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Our technology startup agency is powered by a team of highly skilled developers, engineers, and tech innovators dedicated', 'grozomart-toolkit'),
			],
			[
				'feature_icon' => [
					'value' => 'flaticon-expert-team',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Expert Development & Engineering Team', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Our highly skilled development and engineering team brings innovation and technical expertise to every project.', 'grozomart-toolkit'),
			],
			[
				'feature_icon' => [
					'value' => 'flaticon-cyber-security-1',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Cloud & Cyber security Solutions', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Our Cloud & Cybersecurity Solutions ensure that your business stays secure, scalable, and efficient in the digital landscape.', 'grozomart-toolkit'),
			],
			[
				'feature_icon' => [
					'value' => 'flaticon-technical-support-1',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Seamless User Experience & Design', 'grozomart-toolkit'),
				'feature_description' => esc_html__('We prioritize human-centered design, creating interfaces that enhance usability and improve customer satisfaction.', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_title }}}',
	]
);

$this->add_control(
    'layout_thirteen_bg_shape',
    [
        'label' => esc_html__( 'Sevice Bg Shape', 'grozomart-toolkit' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'media_types' => [ 'image' ], // Restrict to images only
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'selectors' => [
            '{{WRAPPER}} .feature-item-four:hover' => 'background-image: url("{{URL}}");',
        ],
    ]
);

$this->end_controls_section();
