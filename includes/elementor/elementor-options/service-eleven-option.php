<?php

//content
$this->start_controls_section(
	'layout_eleven_content',
	[
		'label' => esc_html__('Content', 'ridda-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_eleven'
		]
	]
);


$layout_eleven_service_list = new \Elementor\Repeater();

$layout_eleven_service_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'ridda-toolkit'),
		'default' => esc_html__('Technical SEO Audits', 'ridda-toolkit'),
		'label_block' => true
	]
);

$layout_eleven_service_list->add_control(
	'url',
	[
		'label' => esc_html__('Url', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'ridda-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$layout_eleven_service_list->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Description', 'ridda-toolkit'),
		'default' => esc_html__('Default description text', 'ridda-toolkit'),
		'label_block' => true
	]
);



$layout_eleven_service_list->add_control(
	'icon',
	[
		'label' => __('Icon', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-idea',
			'library' => 'custom-icon',
		],
	]
);


$this->add_control(
	'layout_eleven_service_list',
	[
		'label' => esc_html__('Service List', 'ridda-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_eleven_service_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ title }}}',
	]
);


$this->end_controls_section();
