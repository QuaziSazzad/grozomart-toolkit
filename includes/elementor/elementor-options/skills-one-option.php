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


$layout_one_skills_list = new \Elementor\Repeater();

$layout_one_skills_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Project Complete', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$layout_one_skills_list->add_control(
	'percentage',
	[
		'label' => esc_html__('percentage', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add percentage', 'grozomart-toolkit'),
		'default' => esc_html__('90', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$this->add_control(
	'layout_one_skills_list',
	[
		'label' => esc_html__('Skill List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_skills_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ title }}}',
	]
);

$this->end_controls_section();
