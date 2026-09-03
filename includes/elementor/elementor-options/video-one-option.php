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
		'default' => esc_html__('We\'re Ready to Growth IT Business', 'grozomart-toolkit'),
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
	'layout_one_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need Any Consultations ?', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your sub title here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'list_item',
	[
		'label' => esc_html__('List Item', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('List Item', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your list item here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_one_list_items',
	[
		'label' => esc_html__('List Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'list_item' => esc_html__('Bringing new IT solutions to the market', 'grozomart-toolkit'),
			],
			[
				'list_item' => esc_html__('To be included the list of the best 100 IT companies', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ list_item }}}',
	]
);

$this->add_control(
	'layout_one_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Free Quote', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your button label here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_button_url',
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
	'layout_one_hotline_text',
	[
		'label' => esc_html__('Hotline Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Hotline', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your hotline text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_hotline_number',
	[
		'label' => esc_html__('Hotline Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+000 (123) 456 88', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your hotline number here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_hotline_number_url',
	[
		'label' => esc_html__('Hotline Number URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('callto:+000 (123) 456 88', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_video_image',
	[
		'label' => esc_html__('Video Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_video_url',
	[
		'label' => esc_html__('Video URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://www.youtube.com/watch?v=9Y7ma241N8k', 'grozomart-toolkit'),
		'label_block' => true,
		'default' => [
			'url' => 'https://www.youtube.com/watch?v=9Y7ma241N8k',
			'is_external' => true,
			'nofollow' => true,
		],
	]
);

$this->add_control(
	'layout_one_background_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);



$this->end_controls_section();
