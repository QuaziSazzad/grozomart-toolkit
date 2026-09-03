<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
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
		'default' => esc_html__('Fish & Meats', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'category_count_text',
	[
		'label' => esc_html__('Product Count Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('125+ Products', 'grozomart-toolkit'),
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
	'layout_two_category_items',
	[
		'label' => esc_html__('Category Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			['category_title' => esc_html__('Fish & Meats', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Desserts', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Drinks & Juice', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Animals Food', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Fresh Fruits', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Yummy Candy', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Dairy & Eggs', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
			['category_title' => esc_html__('Snacks', 'grozomart-toolkit'), 'category_count_text' => esc_html__('125+ Products', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ category_title }}}',
	]
);

$this->end_controls_section();
