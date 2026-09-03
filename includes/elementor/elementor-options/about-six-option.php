<?php

//content
$this->start_controls_section(
	'layout_six_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_six'
		]
	]
);

$this->add_control(
	'layout_six_section_title',
	[
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Scale Generative artificial intelligence Platform', 'grozomart-toolkit'),
		'default' => esc_html__('Scale Generative artificial intelligence Platform', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_six_title_tag',
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
	'layout_six_section_description',
	[
		'label' => esc_html__('Section Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add section description', 'grozomart-toolkit'),
		'default' => esc_html__('Sed ut perspiciatis unde omnis iste sit voluptatem accusantium doloremque laudantium rem aperiam eaqups quae ab illo inventore veritatis et quasi architecto', 'grozomart-toolkit'),
	]
);

// First Content Block
$this->add_control(
	'layout_six_first_block_heading',
	[
		'label' => esc_html__('First Block', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_six_first_image',
	[
		'label' => esc_html__('First Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_six_first_subtitle',
	[
		'label' => esc_html__('First Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Custom LLM', 'grozomart-toolkit'),
		'default' => esc_html__('Custom LLM', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_first_title',
	[
		'label' => esc_html__('First Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Customize Large Language Models', 'grozomart-toolkit'),
		'default' => esc_html__('Customize Large Language Models', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_first_description',
	[
		'label' => esc_html__('First Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add description', 'grozomart-toolkit'),
		'default' => esc_html__('Customizing large language models involves fine-tuning their pre-trained parameters to adapt them to specific tasks or domains, enhancing their performance relevance in specialized applications. This process enables organizations to leverage', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_six_first_button_text',
	[
		'label' => esc_html__('First Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Read More', 'grozomart-toolkit'),
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_first_button_url',
	[
		'label' => esc_html__('First Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

// Second Content Block
$this->add_control(
	'layout_six_second_block_heading',
	[
		'label' => esc_html__('Second Block', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_six_second_image',
	[
		'label' => esc_html__('Second Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_six_second_subtitle',
	[
		'label' => esc_html__('Second Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Edit & Customizations', 'grozomart-toolkit'),
		'default' => esc_html__('Edit & Customizations', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_second_title',
	[
		'label' => esc_html__('Second Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Data Curation & Customizations', 'grozomart-toolkit'),
		'default' => esc_html__('Data Curation & Customizations', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_second_description',
	[
		'label' => esc_html__('Second Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add description', 'grozomart-toolkit'),
		'default' => esc_html__('Data curation involves the careful selection, organization, and maintenance of data to ensure its quality, relevance', 'grozomart-toolkit'),
	]
);

// List Items
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'list_item',
	[
		'label' => esc_html__('List Item', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('List Item', 'grozomart-toolkit'),
		'label_block' => true,

	]
);

$this->add_control(
	'layout_six_list_items',
	[
		'label' => esc_html__('List Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'list_item' => esc_html__('Connect with leads with zero hassle.', 'grozomart-toolkit'),
			],
			[
				'list_item' => esc_html__('Take quick payments direct from meetings', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ list_item }}}',
	]
);

$this->add_control(
	'layout_six_second_button_text',
	[
		'label' => esc_html__('Second Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Read More', 'grozomart-toolkit'),
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_second_button_url',
	[
		'label' => esc_html__('Second Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);


$this->end_controls_section();
