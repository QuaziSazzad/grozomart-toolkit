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

$this->add_control(
	'layout_one_select_cf7_form',
	[
		'label' => esc_html__('Select your contact form 7', 'grozomart-addon'),
		'label_block' => true,
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => grozomart_select_post('wpcf7_contact_form'),
	]
);

// Form Section
$this->add_control(
	'layout_one_form_title',
	[
		'label' => esc_html__('Form Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get In Touch With Us', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

// Info Section
$this->add_control(
	'layout_one_info_subtitle',
	[
		'label' => esc_html__('Info Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need Consultations ?', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_info_title',
	[
		'label' => esc_html__('Info Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Have A Project? We Would Love To Hear From You.', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

// Contact Info Items
$this->add_control(
	'layout_one_contact_info_heading',
	[
		'label' => esc_html__('Contact Information', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

// Location
$this->add_control(
	'layout_one_location_label',
	[
		'label' => esc_html__('Location Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Location', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_location_text',
	[
		'label' => esc_html__('Location Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('55 Main Street, New York', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

// Email
$this->add_control(
	'layout_one_email_label',
	[
		'label' => esc_html__('Email Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Email Us', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_email_text',
	[
		'label' => esc_html__('Email Address', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('support@gmail.com', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

// Phone
$this->add_control(
	'layout_one_phone_label',
	[
		'label' => esc_html__('Phone Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Hotline', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_phone_text',
	[
		'label' => esc_html__('Phone Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+000 (123) 456 88', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

// Form Settings
$this->add_control(
	'layout_one_form_settings',
	[
		'label' => esc_html__('Form Settings', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('send message', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

// Background Settings
$this->add_control(
	'layout_one_background_settings',
	[
		'label' => esc_html__('Background Settings', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_background_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);



$this->end_controls_section();
