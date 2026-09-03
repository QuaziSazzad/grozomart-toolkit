<?php

//content
$this->start_controls_section(
	'layout_eleven_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_eleven'
		]
	]
);


$this->add_control(
	'layout_eleven_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<span class="thin">Protecting Businesses with</span> Cutting-Edge Cybersecurity', 'grozomart-toolkit'), array(
			'span' => array(
				'class' => array(),
			),
		)),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_title_tag',
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
	]
);

$this->add_control(
	'layout_eleven_subtitle',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Learn About Us', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We are a forward-thinking technology startup agency dedicated to delivering cutting-edge digital solutions that drive business success. With expertise in AI, cloud computing software development, and cybersecurity, we help startups and enterprises', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_eleven_client_percentage',
	[
		'label' => esc_html__('Client Satisfaction Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('99% Clients Satisfied', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_eleven_list_item',
	[
		'label' => esc_html__('List Item', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Advance Technology Solutions', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_list_items_left',
	[
		'label' => esc_html__('Left Column List Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_eleven_list_item' => esc_html__('Advance Technology Solutions', 'grozomart-toolkit'),
			],
			[
				'layout_eleven_list_item' => esc_html__('Advance Technology Solutions', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ layout_eleven_list_item }}}',
	]
);

$this->add_control(
	'layout_eleven_list_items_right',
	[
		'label' => esc_html__('Right Column List Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_eleven_list_item' => esc_html__('Professional Team Members', 'grozomart-toolkit'),
			],
			[
				'layout_eleven_list_item' => esc_html__('Professional Team Members', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ layout_eleven_list_item }}}',
	]
);

$this->add_control(
	'layout_eleven_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Explore UinTech IT Services', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$this->add_control(
	'layout_eleven_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_eleven_shape_image',
	[
		'label' => esc_html__('Shape Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
		],
	]
);

$this->end_controls_section();

