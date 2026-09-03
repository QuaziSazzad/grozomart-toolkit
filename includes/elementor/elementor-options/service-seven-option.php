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

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_seven_service_icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-cloud-1',
			'library' => 'flaticon',
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_seven_service_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Trusted Partner', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_seven_service_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('With over 20 year of experience 850+ employees flexion', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_seven_service_link',
	[
		'label' => esc_html__('Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_seven_service_items',
	[
		'label' => esc_html__('Service Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_seven_service_icon' => [
					'value' => 'flaticon-cloud-1',
					'library' => 'flaticon',
				],
				'layout_seven_service_title' => esc_html__('Trusted Partner', 'grozomart-toolkit'),
				'layout_seven_service_description' => esc_html__('With over 20 year of experience 850+ employees flexion', 'grozomart-toolkit'),
			],
			[
				'layout_seven_service_icon' => [
					'value' => 'flaticon-technical-support',
					'library' => 'flaticon',
				],
				'layout_seven_service_title' => esc_html__('Technical Support', 'grozomart-toolkit'),
				'layout_seven_service_description' => esc_html__('With over 20 year of experience 850+ employees flexion', 'grozomart-toolkit'),
			],
			[
				'layout_seven_service_icon' => [
					'value' => 'flaticon-data',
					'library' => 'flaticon',
				],
				'layout_seven_service_title' => esc_html__('Digital Marketing', 'grozomart-toolkit'),
				'layout_seven_service_description' => esc_html__('With over 20 year of experience 850+ employees flexion', 'grozomart-toolkit'),
			],
			[
				'layout_seven_service_icon' => [
					'value' => 'flaticon-cyber-security-1',
					'library' => 'flaticon',
				],
				'layout_seven_service_title' => esc_html__('IT Consulting', 'grozomart-toolkit'),
				'layout_seven_service_description' => esc_html__('With over 20 year of experience 850+ employees flexion', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ layout_seven_service_title }}}',
	]
);



$this->end_controls_section();
