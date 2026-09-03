<?php

//content
$this->start_controls_section(
	'layout_two_section_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_copyright',
	[
		'label' => esc_html__('Copyright Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add copyright text', 'grozomart-toolkit'),
		'default' => esc_html__('Copyright', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$this->add_control(
	'layout_two_enable_back_to_top',
	[
		'label' => __('Back To Top Section?', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => __('Yes', 'grozomart-toolkit'),
		'label_off' => __('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_icon',
	[
		'label' => __('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-arrow-up',
			'library' => 'custom-icon',
		],
		'condition' => [
			'layout_two_enable_back_to_top' => 'yes',
		]
	]
);

$this->add_control(
	'layout_two_logo',
	[
		'label' => __('Logo', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_two_logo_size',
	[
		'label' => __('Logo Size', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
		'description' => __('Set Logo Size.', 'grozomart-toolkit'),
		'default' => [
			'width' => '123',
			'height' => '35',
		],
	]
);

$this->end_controls_section();
