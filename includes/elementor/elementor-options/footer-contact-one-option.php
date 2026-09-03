<?php

//content
$this->start_controls_section(
	'layout_one_section_content',
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
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_one_contact_list = new \Elementor\Repeater();

$layout_one_contact_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('55 Main Street, 2nd block Melbourne, Australia', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$layout_one_contact_list->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fal fa-map-marker-alt',
			'library' => 'fa-regular',
		],
	]
);

$this->add_control(
	'layout_one_contact_list',
	[
		'label' => esc_html__('Contact List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_contact_list->get_controls(),
		'title_field' => '{{{ title }}}',
	]
);


$this->end_controls_section();
