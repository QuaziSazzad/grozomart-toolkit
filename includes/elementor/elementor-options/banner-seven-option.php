<?php

//content
$this->start_controls_section(
	'layout_seven_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_seven'
		]
	]
);

$this->add_control(
	'layout_seven_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => wp_kses(__('<span class="thin">AI-Powered Technology </span>Startup <span class="highlight">Solutions</span>', 'grozomart-toolkit'), array(
			'span' => array(
				'class' => array(),
			),
		)),
	]
);

$this->add_control(
	'layout_seven_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => true,
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
		'default' => 'h1',
	]
);

$this->add_control(
	'layout_seven_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add description', 'grozomart-toolkit'),
		'default' => esc_html__('An IT solution agency is your trusted partner in navigating complexities landscape wide range of services such as software.', 'grozomart-toolkit'),
	]
);

$list_repeater = new \Elementor\Repeater();

$list_repeater->add_control(
	'text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('List Item', 'grozomart-toolkit'),
	]
);

$list_repeater->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-check',
			'library' => 'fa-regular',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_seven_list_items',
	[
		'label' => esc_html__('List Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $list_repeater->get_controls(),
		'default' => [
			[
				'text' => esc_html__('Advance Technology Solutions', 'grozomart-toolkit'),
				'icon' => [
					'value' => 'far fa-check',
					'library' => 'fa-regular',
				],
			],
			[
				'text' => esc_html__('Professional Team Members', 'grozomart-toolkit'),
				'icon' => [
					'value' => 'far fa-check',
					'library' => 'fa-regular',
				],
			],
		],
		'title_field' => '{{{ text }}}',
	]
);

$this->add_control(
	'layout_seven_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add button text', 'grozomart-toolkit'),
		'default' => esc_html__('Explore UinTech IT Services', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_seven_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'label_block' => true,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$this->add_control(
	'layout_seven_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_seven_bg_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
