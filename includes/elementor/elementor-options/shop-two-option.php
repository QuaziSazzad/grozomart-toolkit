<?php

//Query
$this->start_controls_section(
	'layout_two_query',
	[
		'label' => esc_html__('Query', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_categories',
	[
		'label' => esc_html__('Filter By Category', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_category('product_cat'),
		'multiple' => true,
		'label_block' => true,
		'description' => esc_html__('Limits the product grid. Leave empty to show every category — the sidebar category list is unaffected and always lists all categories.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_limit',
	[
		'label' => esc_html__('Products Per Page', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 12,
		'min' => 1,
	]
);

$this->add_control(
	'layout_two_default_orderby',
	[
		'label' => esc_html__('Default Sorting', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'menu_order',
		'options' => [
			'menu_order' => esc_html__('Default', 'grozomart-toolkit'),
			'popularity' => esc_html__('Popularity', 'grozomart-toolkit'),
			'date'       => esc_html__('Latest', 'grozomart-toolkit'),
		],
		'description' => esc_html__('Used when the shopper has not picked a sort option.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//Sidebar
$this->start_controls_section(
	'layout_two_sidebar',
	[
		'label' => esc_html__('Sidebar Filters', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_show_category_filter',
	[
		'label' => esc_html__('Show Category Filter', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_price_filter',
	[
		'label' => esc_html__('Show Price Filter', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_status_filter',
	[
		'label' => esc_html__('Show Product Status Filter', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->end_controls_section();

//Toolbar
$this->start_controls_section(
	'layout_two_toolbar',
	[
		'label' => esc_html__('Toolbar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_show_result_count',
	[
		'label' => esc_html__('Show Result Count', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_view_tabs',
	[
		'label' => esc_html__('Show View Switcher', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_default_view',
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
	'layout_two_show_ordering',
	[
		'label' => esc_html__('Show Sort Dropdown', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_pagination',
	[
		'label' => esc_html__('Show Pagination', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->end_controls_section();
