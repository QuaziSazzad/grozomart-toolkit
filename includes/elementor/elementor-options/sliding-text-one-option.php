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

$layout_one_sliding_text = new \Elementor\Repeater();

$layout_one_sliding_text->add_control(
	'text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Video Marketing', 'grozomart-toolkit'),
		'label_block' => true
	]
);


$this->add_control(
	'layout_one_sliding_text',
	[
		'label' => esc_html__('Sliding Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_sliding_text->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ text }}}',
	]
);


$this->end_controls_section();
