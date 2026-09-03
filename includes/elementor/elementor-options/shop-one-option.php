<?php

//Query
$this->start_controls_section(
	'layout_one_query',
	[
		'label' => esc_html__('Query', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_categories',
	[
		'label' => esc_html__('Filter By Category', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_category('product_cat'),
		'multiple' => true,
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_limit',
	[
		'label' => esc_html__('Products Per Page', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 16,
		'min' => 1,
	]
);

$this->add_control(
	'layout_one_default_orderby',
	[
		'label' => esc_html__('Default Sorting', 'grozomart-toolkit'),
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
		'description' => esc_html__('Used when the shopper has not picked a sort option.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//Toolbar
$this->start_controls_section(
	'layout_one_toolbar',
	[
		'label' => esc_html__('Toolbar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_show_result_count',
	[
		'label' => esc_html__('Show Result Count', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_show_view_tabs',
	[
		'label' => esc_html__('Show View Switcher', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_default_view',
	[
		'label' => esc_html__('Default View', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'grid',
		'options' => [
			'grid' => esc_html__('Grid', 'grozomart-toolkit'),
			'list' => esc_html__('List', 'grozomart-toolkit'),
		],
		'description' => esc_html__('Which view is active when the page first loads.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_show_ordering',
	[
		'label' => esc_html__('Show Sort Dropdown', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_show_pagination',
	[
		'label' => esc_html__('Show Pagination', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->end_controls_section();

//Modules
$this->start_controls_section(
	'layout_one_modules',
	[
		'label' => esc_html__('Product Card Modules', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'module_wishlist',
	[
		'label' => esc_html__('Wishlist', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'module_compare',
	[
		'label' => esc_html__('Compare', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'module_quick_view',
	[
		'label' => esc_html__('Quick View', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'module_sale_badge',
	[
		'label' => esc_html__('Sale Badge', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->end_controls_section();
