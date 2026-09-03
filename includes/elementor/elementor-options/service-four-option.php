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
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Tailored Security Services to Safeguard Your Business', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
	]
);


$this->add_control(
	'layout_four_title_tag',
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
	'layout_four_subtitle',
	[
		'label' => esc_html__('Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('What We Provide', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'grozomart-toolkit'),
	]
);



$this->add_control(
	'layout_four_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Cybersecurity is the practice of protecting systems, networks, and data from malicious attacks, unauthorized access, an digital threats In today\'s interconnected world, businesses face.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'grozomart-toolkit'),
	]
);

$layout_four_services = new \Elementor\Repeater();


$layout_four_services->add_control(
	'icon_class',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-cloud-1',
			'library' => 'flaticon',
		],
	]
);

$layout_four_services->add_control(
	'icon_color',
	[
		'label' => esc_html__('Icon Color', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'yellow',
		'options' => [
			'yellow' => esc_html__('Yellow', 'grozomart-toolkit'),
			'skyblue' => esc_html__('Sky Blue', 'grozomart-toolkit'),
			'pink' => esc_html__('Pink', 'grozomart-toolkit'),
			'blue' => esc_html__('Blue', 'grozomart-toolkit'),
		],
	]
);

$layout_four_services->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Data Protection', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type service title here', 'grozomart-toolkit'),
	]
);

$layout_four_services->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Data protection is the practice of safeguarding sensitive they information unauthorized', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type service description here', 'grozomart-toolkit'),
	]
);

$layout_four_services->add_control(
	'link',
	[
		'label' => esc_html__('Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$layout_four_services->add_control(
	'read_more_text',
	[
		'label' => esc_html__('Read More Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type read more text here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_services',
	[
		'label' => esc_html__('Services', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_four_services->get_controls(),
		'default' => [
			[
				'icon_class' => 'flaticon-cloud-1',
				'icon_color' => 'yellow',
				'title' => esc_html__('Data Protection', 'grozomart-toolkit'),
				'description' => esc_html__('Data protection is the practice of safeguarding sensitive they information unauthorized', 'grozomart-toolkit'),
				'read_more_text' => esc_html__('Read More', 'grozomart-toolkit'),
			],
			[
				'icon_class' => 'flaticon-cyber-security-1',
				'icon_color' => 'skyblue',
				'title' => esc_html__('Cyber Security', 'grozomart-toolkit'),
				'description' => esc_html__('Cybersecurity refers to the practice of protecting digital systems networks sensitive', 'grozomart-toolkit'),
				'read_more_text' => esc_html__('Read More', 'grozomart-toolkit'),
			],
			[
				'icon_class' => 'flaticon-cloud-computing',
				'icon_color' => 'pink',
				'title' => esc_html__('Cloud Services', 'grozomart-toolkit'),
				'description' => esc_html__('Cloud services refer delivery computing resource including storage, processing power', 'grozomart-toolkit'),
				'read_more_text' => esc_html__('Read More', 'grozomart-toolkit'),
			],
			[
				'icon_class' => 'flaticon-data',
				'icon_color' => 'blue',
				'title' => esc_html__('Data Storage', 'grozomart-toolkit'),
				'description' => esc_html__('Data Storage refers a process of saving digital information in a physical or virtual medium', 'grozomart-toolkit'),
				'read_more_text' => esc_html__('Read More', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);




$this->end_controls_section();
