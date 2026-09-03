<?php

//content
$this->start_controls_section(
	'layout_one_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Custom-Built Software Solutions to Drive Your Success', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_title_tag',
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
	'layout_one_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add subtitle', 'grozomart-toolkit'),
		'default' => esc_html__('Modern IT Solutions', 'grozomart-toolkit'),
	]
);



$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add description', 'grozomart-toolkit'),
		'default' => esc_html__('Offering cloud solutions and scalable architecture lets clients expand their software capabilities as their business grows, supporting cost-effective scaling without technical limitations.', 'grozomart-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();


$repeater->add_control(
	'feature_text',
	[
		'label' => esc_html__('Feature Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add feature', 'grozomart-toolkit'),
		'default' => esc_html__('Custom software development', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'feature_icon',
	[
		'label' => esc_html__('Feature Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-check',
			'library' => 'flaticon',
		],
	]
);

$this->add_control(
	'layout_one_features',
	[
		'label' => esc_html__('Features List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_text' => esc_html__('Custom software development', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('Requirement analysis & planning', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('Support and maintenance', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_text }}}',
	]
);

$this->add_control(
	'layout_one_image_1',
	[
		'label' => esc_html__('First Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_image_2',
	[
		'label' => esc_html__('Second Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
