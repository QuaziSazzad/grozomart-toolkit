<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Transforming Ideas into Powerful, Scalable Software', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_title_tag',
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
	'layout_two_subtitle',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Modern IT Solutions', 'grozomart-toolkit'),
		'label_block' => true,
	]
);



$this->add_control(
	'layout_two_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('A reliable support team for ongoing assistance, updates, and troubleshooting ensures clients can rely on the company for long-term success and stability.', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Started', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_button_link',
	[
		'label' => esc_html__('Button Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_image',
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
	'layout_two_features',
	[
		'label' => esc_html__('Features', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => [
			[
				'name' => 'feature_title',
				'label' => esc_html__('Title', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Feature Title', 'grozomart-toolkit'),
				'label_block' => true,
			],
			[
				'name' => 'feature_description',
				'label' => esc_html__('Description', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Feature description goes here', 'grozomart-toolkit'),
				'label_block' => true,
			],
		],
		'default' => [
			[
				'feature_title' => esc_html__('User-Centric Design', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Prioritizing user experience and intuitive interfaces makes the software easy to navigate.', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('Rigorous Quality Assurance', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Comprehensive testing and quality assurance processes ensure that the software is free of bugs.', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('Post-Launch Support and Maintenance', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Prioritizing user experience and intuitive interfaces makes the software easy to navigate.', 'grozomart-toolkit'),
			],
			[
				'feature_title' => esc_html__('Experienced and Multidisciplinary', 'grozomart-toolkit'),
				'feature_description' => esc_html__('Offering ongoing support, updates and maintenance ensures that clients have a long-term partner', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ feature_title }}}',
		'label_block' => true,
	]
);


$this->end_controls_section();
