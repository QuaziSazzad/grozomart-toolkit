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
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Hacking the Hackers Strategic Interventions in Cybersecurity', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
		'label_block' => true,
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
		'default' => esc_html__('How to Benefits', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_one_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_awards_number',
	[
		'label' => esc_html__('Awards Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'min' => 0,
		'max' => 1000,
		'step' => 1,
		'default' => 0,
	]
);

$this->add_control(
	'layout_one_awards_text',
	[
		'label' => esc_html__('Awards Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Awards Winning', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_reviews_number',
	[
		'label' => esc_html__('Reviews Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'min' => 0,
		'max' => 1000,
		'step' => 1,
		'default' => 0,
	]
);

$this->add_control(
	'layout_one_reviews_text',
	[
		'label' => esc_html__('Reviews Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Customer review', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_one_faq_title',
	[
		'label' => esc_html__('FAQ Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Network Security & Protection', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your FAQ title here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'layout_one_faq_content',
	[
		'label' => esc_html__('FAQ Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Accelerate innovation with world-class tech teams We\'ll match you to an entire remote team.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your FAQ content here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'layout_one_is_active',
	[
		'label' => esc_html__('Is Active?', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off' => esc_html__('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'layout_one_faq_items',
	[
		'label' => esc_html__('FAQ Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_one_faq_title' => esc_html__('Network Security & Protection', 'grozomart-toolkit'),
				'layout_one_faq_content' => esc_html__('Accelerate innovation with world-class tech teams We\'ll match you to an entire remote team.', 'grozomart-toolkit'),
				'layout_one_is_active' => 'yes',
			],
			[
				'layout_one_faq_title' => esc_html__('Browser Safety & Farewell', 'grozomart-toolkit'),
				'layout_one_faq_content' => esc_html__('Accelerate innovation with world-class tech teams We\'ll match you to an entire remote team.', 'grozomart-toolkit'),
				'layout_one_is_active' => 'no',
			],
			[
				'layout_one_faq_title' => esc_html__('Infrastructure Technology', 'grozomart-toolkit'),
				'layout_one_faq_content' => esc_html__('Accelerate innovation with world-class tech teams We\'ll match you to an entire remote team.', 'grozomart-toolkit'),
				'layout_one_is_active' => 'no',
			],
			[
				'layout_one_faq_title' => esc_html__('Management & Support Services', 'grozomart-toolkit'),
				'layout_one_faq_content' => esc_html__('Accelerate innovation with world-class tech teams We\'ll match you to an entire remote team.', 'grozomart-toolkit'),
				'layout_one_is_active' => 'no',
			],
		],
		'title_field' => '{{{ layout_one_faq_title }}}',
	]
);

$this->add_control(
	'layout_one_background_color',
	[
		'label' => esc_html__('Background Color', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .bgc-blue ' => 'background-color: {{VALUE}}',
		],
		'default' => '#18185e',
	]
);

$this->add_control(
	'layout_one_background_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);



$this->end_controls_section();
