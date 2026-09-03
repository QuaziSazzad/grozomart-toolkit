<?php

//content
$this->start_controls_section(
	'layout_four_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$this->add_control(
	'layout_four_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('New Arrivals', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_title_tag',
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
	'layout_four_description',
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
	'layout_four_tabs',
	[
		'label' => esc_html__('Category Tabs', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
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

$this->add_control(
	'layout_four_tab_items',
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
	'layout_four_limit',
	[
		'label' => esc_html__('Products Per Tab', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 4,
		'min' => 1,
	]
);

$this->add_control(
	'layout_four_orderby',
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
