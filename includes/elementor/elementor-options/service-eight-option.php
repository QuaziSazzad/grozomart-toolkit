<?php

//content
$this->start_controls_section(
	'layout_eight_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_eight'
		]
	]
);

$this->add_control(
	'layout_eight_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Digital Core Services', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eight_title_tag',
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
	'layout_eight_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('What We Provides', 'grozomart-toolkit'),
		'label_block' => true,
	]
);



$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'number',
	[
		'label' => esc_html__('Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('01', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Custom Software Development', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Sed perspiciat unde omnis esteo natus sit voluptatem ways', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'read_more_text',
	[
		'label' => esc_html__('Read More Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$repeater->add_control(
	'url',
	[
		'label' => esc_html__('URL', 'grozomart-toolkit'),
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
	'icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-data',
			'library' => 'flaticon',
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eight_service_list',
	[
		'label' => esc_html__('Service List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'icon' => [
					'value' => 'flaticon-data',
					'library' => 'flaticon',
				],
				'number' => esc_html__('01', 'grozomart-toolkit'),
				'title' => esc_html__('Custom Software Development', 'grozomart-toolkit'),
				'description' => esc_html__('Sed perspiciat unde omnis esteo natus sit voluptatem ways', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
				],
			],
			[
				'icon' => [
					'value' => 'flaticon-layers',
					'library' => 'flaticon',
				],
				'number' => esc_html__('02', 'grozomart-toolkit'),
				'title' => esc_html__('Web Design & Development', 'grozomart-toolkit'),
				'description' => esc_html__('Sed perspiciat unde omnis esteo natus sit voluptatem ways', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
				],
			],
			[
				'icon' => [
					'value' => 'flaticon-cyber-security-1',
					'library' => 'flaticon',
				],
				'number' => esc_html__('03', 'grozomart-toolkit'),
				'title' => esc_html__('Cyber Security and IT Management', 'grozomart-toolkit'),
				'description' => esc_html__('Sed perspiciat unde omnis esteo natus sit voluptatem ways', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
				],
			],
		],
		'title_field' => '{{{ title }}}',
	]
);



$this->end_controls_section();
