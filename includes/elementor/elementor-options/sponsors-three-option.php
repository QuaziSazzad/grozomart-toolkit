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
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We\'ve 1253+ Global Clients & lot\'s of Project Complete', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'sponsor_name',
	[
		'label' => esc_html__('Sponsor Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Dropbox', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type sponsor name here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'sponsor_image',
	[
		'label' => esc_html__('Sponsor Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'sponsors_list',
	[
		'label' => esc_html__('Sponsors List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'sponsor_name' => esc_html__('Dropbox', 'grozomart-toolkit'),
			],
			[
				'sponsor_name' => esc_html__('LinkedIn', 'grozomart-toolkit'),
			],
			[
				'sponsor_name' => esc_html__('Slack', 'grozomart-toolkit'),
			],
			[
				'sponsor_name' => esc_html__('Symbol', 'grozomart-toolkit'),
			],
			[
				'sponsor_name' => esc_html__('Shopify', 'grozomart-toolkit'),
			],
			[
				'sponsor_name' => esc_html__('Notion', 'grozomart-toolkit'),
			],
			[
				'sponsor_name' => esc_html__('Twitch', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ sponsor_name }}}',
	]
);

$this->add_control(
	'shape_images_heading',
	[
		'label' => esc_html__('Shape Images', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'shape_one',
	[
		'label' => esc_html__('Shape One', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);

$this->add_control(
	'shape_two',
	[
		'label' => esc_html__('Shape Two', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);

$this->add_control(
	'shape_three',
	[
		'label' => esc_html__('Shape Three', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);

$this->add_control(
	'shape_four',
	[
		'label' => esc_html__('Shape Four', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);


$this->end_controls_section();
