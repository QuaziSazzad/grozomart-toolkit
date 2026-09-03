<?php

//content
$this->start_controls_section(
	'layout_five_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'slide_subtitle',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Solution Comapny', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_tagline',
	[
		'label' => esc_html__('Tagline', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('We\'re Digital', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your tagline here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Services Agency', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Let\'s Get Started', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your button text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'label_block' => true,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);


$this->add_control(
	'banner_five_slides',
	[
		'label' => esc_html__('Slider Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'slide_subtitle' => esc_html__('IT Solution Comapny', 'grozomart-toolkit'),
				'slide_tagline' => esc_html__('We\'re Digital', 'grozomart-toolkit'),
				'slide_title' => esc_html__('IT Services Agency', 'grozomart-toolkit'),
				'slide_button_text' => esc_html__('Let\'s Get Started', 'grozomart-toolkit'),
			],
			[
				'slide_subtitle' => esc_html__('IT Solution Comapny', 'grozomart-toolkit'),
				'slide_tagline' => esc_html__('We\'re Digital', 'grozomart-toolkit'),
				'slide_title' => esc_html__('IT Services Agency', 'grozomart-toolkit'),
				'slide_button_text' => esc_html__('Let\'s Get Started', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ slide_title }}}',
	]
);

$this->add_control(
	'layout_five_background_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
