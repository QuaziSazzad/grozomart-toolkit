<?php

//Map
$this->start_controls_section(
	'layout_one_map',
	[
		'label' => esc_html__('Map', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_show_map',
	[
		'label' => esc_html__('Show Map', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'grozomart-toolkit'),
		'label_off' => esc_html__('No', 'grozomart-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_map_url',
	[
		'label' => esc_html__('Google Map Embed Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd',
		'description' => esc_html__('Paste only the src URL from the Google Maps embed code.', 'grozomart-toolkit'),
		'condition' => [
			'layout_one_show_map' => 'yes',
		],
	]
);

$this->end_controls_section();

//Content
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

$this->add_control(
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Send Us Message', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Your email address will not be published. Required fields are marked *', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_select_cf7_form',
	[
		'label' => esc_html__('Select Contact Form', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_post('wpcf7_contact_form'),
		'label_block' => true,
		'description' => esc_html__('Select a Contact Form 7 form to display.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();
