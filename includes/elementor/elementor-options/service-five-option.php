<?php

//content
$this->start_controls_section(
	'layout_five_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);


$this->add_control(
	'layout_five_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Meet your new Powerful intelligent AI Assistant', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_five_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => false,
		'options'     => [
			'h1' => [
				'title' => esc_html__('H1', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h6',
			],
		],
		'default'     => 'h2',
		'toggle'      => false,
	]
);

$this->add_control(
	'layout_five_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => 5,
		'placeholder' => esc_html__('Add description', 'grozomart-toolkit'),
		'default' => esc_html__('Sed ut perspiciatis unde omnis iste sit voluptatem accusantium doloremque laudantium rem aperiam eaqups quae ab illo inventore veritatis et quasi architecto', 'grozomart-toolkit'),
	]
);

// Repeater for service boxes
$layout_five_service_list = new \Elementor\Repeater();

$layout_five_service_list->add_control(
	'number',
	[
		'label' => esc_html__('Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('01', 'grozomart-toolkit'),
		'placeholder' => esc_html__('01', 'grozomart-toolkit'),
	]
);

$layout_five_service_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Live Text Editor', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_service_list->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => 4,
		'placeholder' => esc_html__('Add Description', 'grozomart-toolkit'),
		'default' => esc_html__('A live text editor is dynamic & interactive software tool that allows users to create edit, manipulate text-based', 'grozomart-toolkit'),
	]
);

$layout_five_service_list->add_control(
	'url',
	[
		'label' => esc_html__('URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
		'show_external' => true,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true
	]
);

$layout_five_service_list->add_control(
	'read_more_text',
	[
		'label' => esc_html__('Read More Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Read More', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_five_service_list->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$layout_five_service_list->add_control(
	'box_bg_class',
	[
		'label' => esc_html__('Box Background Class', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '',
		'options' => [
			'' => esc_html__('Default', 'grozomart-toolkit'),
			'bg-two' => esc_html__('Background Two', 'grozomart-toolkit'),
			'bg-three' => esc_html__('Background Three', 'grozomart-toolkit'),
		],
	]
);

$this->add_control(
	'layout_five_service_list',
	[
		'label' => esc_html__('Service Boxes', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_five_service_list->get_controls(),
		'default' => [
			[
				'number' => '01',
				'title' => esc_html__('Live Text Editor', 'grozomart-toolkit'),
				'description' => esc_html__('A live text editor is dynamic & interactive software tool that allows users to create edit, manipulate text-based', 'grozomart-toolkit'),
				'box_bg_class' => '',
			],
			[
				'number' => '02',
				'title' => esc_html__('Track Analytics', 'grozomart-toolkit'),
				'description' => esc_html__('Track analytics refers to the process of collecting and analyzing data related to the performance and usage', 'grozomart-toolkit'),
				'box_bg_class' => 'bg-two',
			],
			[
				'number' => '03',
				'title' => esc_html__('Security & Compliance', 'grozomart-toolkit'),
				'description' => esc_html__('Security and compliance are essentials pillars of any organization\'s strat protect its data, assets, and reputation', 'grozomart-toolkit'),
				'box_bg_class' => 'bg-three',
			],
		],
		'title_field' => '{{{ title }}}',
	]
);


$this->end_controls_section();
