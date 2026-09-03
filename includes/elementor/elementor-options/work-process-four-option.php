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
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Improve your writing with artificial intelligence Platform', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_four_number',
	[
		'label' => esc_html__('Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('1', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'layout_four_item_title',
	[
		'label' => esc_html__('Item Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Sing Up Or Create your account Full Free', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_four_with_arrow',
	[
		'label' => esc_html__('Show Arrow', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off' => esc_html__('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'layout_four_items',
	[
		'label' => esc_html__('Process Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_four_number' => '1',
				'layout_four_item_title' => esc_html__('Sing Up Or Create your account Full Free', 'grozomart-toolkit'),
				'layout_four_with_arrow' => 'no',
			],
			[
				'layout_four_number' => '2',
				'layout_four_item_title' => esc_html__('Write what your want? or write something you want', 'grozomart-toolkit'),
				'layout_four_with_arrow' => 'yes',
			],
			[
				'layout_four_number' => '3',
				'layout_four_item_title' => esc_html__('Get Output or results', 'grozomart-toolkit'),
				'layout_four_with_arrow' => 'no',
			],
		],
		'title_field' => '{{{ layout_four_item_title }}}',
	]
);

$this->add_control(
	'layout_four_show_image_area',
	[
		'label' => esc_html__('Show Image Area', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off' => esc_html__('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_four_image',
	[
		'label' => esc_html__('Process Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'condition' => [
			'layout_four_show_image_area' => 'yes',
		],
	]
);

$this->add_control(
	'layout_four_shape_one',
	[
		'label' => esc_html__('Shape One', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_shape_two',
	[
		'label' => esc_html__('Shape Two', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_shape_three',
	[
		'label' => esc_html__('Shape Three', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'condition' => [
			'layout_four_show_image_area' => 'yes',
		],
	]
);

$this->add_control(
	'layout_four_shape_four',
	[
		'label' => esc_html__('Shape Four', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'condition' => [
			'layout_four_show_image_area' => 'yes',
		],
	]
);


$this->end_controls_section();
