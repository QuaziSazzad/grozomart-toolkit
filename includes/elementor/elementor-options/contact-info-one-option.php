<?php

//content
$this->start_controls_section(
	'layout_one_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$this->add_control(
	'layout_type',
	[
		'type' => \Elementor\Controls_Manager::HIDDEN,
		'default' => 'layout_one',
	]
);

$this->add_control(
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Get In Touch', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Description', 'grozomart-toolkit'),
		'default' => esc_html__('We’d love to hear from you! Whether you have a question about our products, need help with an order, or simply want to share your feedback, our team is here to assist you.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//locations
$this->start_controls_section(
	'layout_one_locations',
	[
		'label' => esc_html__('Locations', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'location_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('New York', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'location_address',
	[
		'label' => esc_html__('Address', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('123 Madison Avenue, Suite 1500 <br> New York, United States', 'grozomart-toolkit'), ['br' => []]),
		'label_block' => true,
	]
);

$repeater->add_control(
	'location_email',
	[
		'label' => esc_html__('Email', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('grozmart@gmail.com', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'location_phone',
	[
		'label' => esc_html__('Phone', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+1 (212) 555-7890', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_location_items',
	[
		'label' => esc_html__('Location Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'location_title' => esc_html__('New York', 'grozomart-toolkit'),
				'location_address' => wp_kses(__('123 Madison Avenue, Suite 1500 <br> New York, United States', 'grozomart-toolkit'), ['br' => []]),
				'location_email' => esc_html__('grozmart@gmail.com', 'grozomart-toolkit'),
				'location_phone' => esc_html__('+1 (212) 555-7890', 'grozomart-toolkit'),
			],
			[
				'location_title' => esc_html__('United Kingdom', 'grozomart-toolkit'),
				'location_address' => wp_kses(__('45 Oxford Street, Suite 3B London <br> W1D 2DZ United Kingdom', 'grozomart-toolkit'), ['br' => []]),
				'location_email' => esc_html__('info@yourcompany.com', 'grozomart-toolkit'),
				'location_phone' => esc_html__('+44 20 7946 0850', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ location_title }}}',
	]
);

$this->end_controls_section();
