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
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Transforming Challenges Into Opportunities with Smart IT Solutions', 'grozomart-toolkit'),
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
		'placeholder' => esc_html__('Add Sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Modern IT Solutions', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Description', 'grozomart-toolkit'),
		'default' => esc_html__('IT solutions integrate cutting-edge technologies with strategic planning to optimize processes and deliver measurable results partnering with IT experts.', 'grozomart-toolkit'),
	]
);

$layout_one_service_list = new \Elementor\Repeater();


$layout_one_service_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('IT Solutions', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_one_service_list->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Description', 'grozomart-toolkit'),
		'default' => esc_html__('IT solutions encompass a broad range of services and technologies.', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_one_service_list->add_control(
	'read_more',
	[
		'label' => esc_html__('Read More', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Read More', 'grozomart-toolkit'),
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'label_block' => true
	]
);



$layout_one_service_list->add_control(
	'url',
	[
		'label' => esc_html__('URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$layout_one_service_list->add_control(
	'read_more_icon',
	[
		'label' => esc_html__('Read More Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-arrow-right',
			'library' => 'fa-regular',
		],
		'recommended' => [
			'fa-solid' => [
				'arrow-right',
				'angle-right',
				'chevron-right',
				'long-arrow-alt-right',
			],
			'fa-regular' => [
				'arrow-right',
				'arrow-alt-circle-right',
			],
		],
	]
);


$layout_one_service_list->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);



$this->add_control(
	'layout_one_service_list',
	[
		'label' => esc_html__('Service List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_service_list->get_controls(),
		'default' => [
			[
				'index' => '01',
				'title' => esc_html__('IT Solutions', 'grozomart-toolkit'),
			],
			[
				'index' => '02',
				'title' => esc_html__('Cyber Security', 'grozomart-toolkit'),
			],
			[
				'index' => '03',
				'title' => esc_html__('Cloud Services', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);


$this->end_controls_section();
