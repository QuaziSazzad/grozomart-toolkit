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
		'default' => esc_html__('Solutions Beyond Technology – Success Beyond Boundaries', 'grozomart-toolkit'),
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

$this->add_control(
	'layout_three_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Trust us to be your partner in digital transformation, providing the technology and support.', 'grozomart-toolkit'),
		'label_block' => true,
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
			'library' => 'fa-regular',
		],
	]
);

$this->add_control(
	'layout_three_features',
	[
		'label' => esc_html__('Features List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_text' => esc_html__('Reliable Support &amp; Maintenance Services', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('Data-Driven Insights for Smarter Decisions', 'grozomart-toolkit'),
			],
			[
				'feature_text' => esc_html__('Tailored Software Development for Every Need', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_text }}}',
	]
);

$this->add_control(
	'layout_three_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'label_block' => true,
	]
);



$this->end_controls_section();
