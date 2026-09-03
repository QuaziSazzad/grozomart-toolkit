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
		'default' => esc_html__('Featured Product', 'grozomart-toolkit'),
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
	'layout_five_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Dont miss this opportunity at a special discount just for this week.', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();

//Tabs
$this->start_controls_section(
	'layout_five_tabs',
	[
		'label' => esc_html__('Category Tabs', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'tab_label',
	[
		'label' => esc_html__('Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Cake & Milk', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'tab_categories',
	[
		'label' => esc_html__('Filter By Category', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_category('product_cat'),
		'multiple' => true,
		'label_block' => true,
		'description' => esc_html__('Leave empty to show all products in this tab.', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'tab_left_product_one',
	[
		'label'       => esc_html__('Left Column Product 1', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'tab_left_product_one_image',
	[
		'label' => esc_html__('Left Column Product 1: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'tab_left_product_two',
	[
		'label'       => esc_html__('Left Column Product 2 (with countdown)', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'tab_left_product_two_image',
	[
		'label' => esc_html__('Left Column Product 2: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'tab_left_product_three',
	[
		'label'       => esc_html__('Left Column Product 3', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => grozomart_select_post('product'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'tab_left_product_three_image',
	[
		'label' => esc_html__('Left Column Product 3: Custom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'description' => esc_html__('Overrides the product\'s own featured image. Leave empty to use the product image.', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'tab_countdown_date',
	[
		'label' => esc_html__('Countdown End Date (product 2)', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::DATE_TIME,
		'label_block' => true,
	]
);

$repeater->add_control(
	'tab_countdown_text',
	[
		'label' => esc_html__('Countdown Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Time remaining until the end of the offer.', 'grozomart-toolkit'),
		'description' => esc_html__('You can use <br> to break the line.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_five_tab_items',
	[
		'label' => esc_html__('Tabs', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			['tab_label' => esc_html__('Cake & Milk', 'grozomart-toolkit')],
			['tab_label' => esc_html__('Coffe & Teas', 'grozomart-toolkit')],
			['tab_label' => esc_html__('Pet Foods', 'grozomart-toolkit')],
			['tab_label' => esc_html__('Vegetables', 'grozomart-toolkit')],
			['tab_label' => esc_html__('Fruits & Juices', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ tab_label }}}',
	]
);

$this->add_control(
	'layout_five_orderby',
	[
		'label' => esc_html__('Order By', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'menu_order',
		'options' => [
			'menu_order' => esc_html__('Default', 'grozomart-toolkit'),
			'popularity' => esc_html__('Popularity', 'grozomart-toolkit'),
			'rating'     => esc_html__('Average Rating', 'grozomart-toolkit'),
			'date'       => esc_html__('Latest', 'grozomart-toolkit'),
			'price'      => esc_html__('Price: low to high', 'grozomart-toolkit'),
			'price-desc' => esc_html__('Price: high to low', 'grozomart-toolkit'),
		],
	]
);

$this->end_controls_section();
