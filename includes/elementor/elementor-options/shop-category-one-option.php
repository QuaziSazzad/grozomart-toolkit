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

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'category_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'category_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Organic Fruits', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'category_url',
	[
		'label' => esc_html__('Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$this->add_control(
	'layout_one_category_items',
	[
		'label' => esc_html__('Category Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			['category_title' => esc_html__('Organic Fruits', 'grozomart-toolkit')],
			['category_title' => esc_html__('Dairy & Eggs', 'grozomart-toolkit')],
			['category_title' => esc_html__('Bakery & Bread', 'grozomart-toolkit')],
			['category_title' => esc_html__('Snacks & Chips', 'grozomart-toolkit')],
			['category_title' => esc_html__('Chocolates', 'grozomart-toolkit')],
			['category_title' => esc_html__('Tea & Coffee', 'grozomart-toolkit')],
			['category_title' => esc_html__('Health Drinks', 'grozomart-toolkit')],
			['category_title' => esc_html__('Pasta & Noodles', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ category_title }}}',
	]
);

$this->end_controls_section();
