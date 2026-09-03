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


$this->add_control(
	'layout_five_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_five_title_tag',
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
	'layout_five_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Sub Title', 'grozomart-toolkit'),
	]
);


$layout_five_testimonial = new \Elementor\Repeater();

$layout_five_testimonial->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Name', 'grozomart-toolkit'),
		'default' => esc_html__('Randall J. Ferguson', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_testimonial->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Designation', 'grozomart-toolkit'),
		'default' => esc_html__('/CEO & Founder', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_testimonial->add_control(
	'testimonial',
	[
		'label' => esc_html__('Testimonial Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Testimonial', 'grozomart-toolkit'),
		'default' => esc_html__('Default Content', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_testimonial->add_control(
	'icon',
	[
		'label' => __('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fas fa-quote-left',
			'library' => 'fa-solid',
		],
	]
);

$layout_five_testimonial->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Image size should be 60*60 px', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_five_testimonial',
	[
		'label' => esc_html__('Testimonial List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_five_testimonial->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ name }}}',
	]
);

$this->end_controls_section();

$this->start_controls_section(
	'layout_five_other_settings',
	[
		'label' => esc_html__('Other Settings', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);

$this->add_control(
	'layout_five_section_image',
	[
		'label' => esc_html__('Section Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_five_image_caption',
	[
		'label' => esc_html__('Image Caption', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Image Caption', 'grozomart-toolkit'),
		'default' => esc_html__('Default Caption', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_five_client_images',
	[
		'label' => esc_html__('Client Images', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::GALLERY,
		'default' => [],
	]
);

$this->end_controls_section();
