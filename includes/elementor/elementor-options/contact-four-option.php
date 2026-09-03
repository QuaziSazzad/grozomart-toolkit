<?php

$this->start_controls_section(
	'layout_four_contact_info_section',
	[
		'label' => esc_html__('Contact Info Section', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);


$this->add_control(
	'layout_four_section_title',
	[
		'label' => esc_html__('Contact Info Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('Ready to Transform? Get in Touch', 'grozomart-toolkit'),
	]
);


$this->add_control(
	'layout_four_section_subtitle',
	[
		'label' => esc_html__('Contact Info Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('Get In Touch', 'grozomart-toolkit'),
	]
);


$this->add_control(
	'layout_four_section_desc',
	[
		'label' => esc_html__('Section Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'default' => esc_html__('Each of these titles is designed to be approachable and encourage clients to take the first step in reaching adjustments', 'grozomart-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'contact_item_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('Office Location', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'contact_item_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'default' => esc_html__('101 Fifth Avenue, 12th Floor New York, NY 10003', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'contact_item_icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-map-marker-alt',
			'library' => 'fa-regular',
		],
	]
);

$this->add_control(
	'layout_four_contact_items',
	[
		'label' => esc_html__('Contact Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'contact_item_title' => esc_html__('Office Location', 'grozomart-toolkit'),
				'contact_item_content' => esc_html__('101 Fifth Avenue, 12th Floor New York, NY 10003', 'grozomart-toolkit'),
				'contact_item_icon' => [
					'value' => 'far fa-map-marker-alt',
					'library' => 'fa-regular',
				],
			],
			[
				'contact_item_title' => esc_html__('Email Address', 'grozomart-toolkit'),
				'contact_item_content' => wp_kses(__('<a href="mailto:support@gmail.com">support@gmail.com</a><br><a href="mailto:uintechservice.com">uintechservice.com</a>', 'grozomart-toolkit'), '', ['a', 'br']),
				'contact_item_icon' => [
					'value' => 'far fa-envelope',
					'library' => 'fa-regular',
				],
			],
			[
				'contact_item_title' => esc_html__('Need Any Help', 'grozomart-toolkit'),
				'contact_item_content' => wp_kses(__('<a href="callto:+000(123)45688">+000 (123) 456 88</a><br><a href="callto:+88500099">+885 000 99</a>', 'grozomart-toolkit'), '', ['a', 'br']),
				'contact_item_icon' => [
					'value' => 'far fa-phone-volume',
					'library' => 'fa-regular',
				],
			],
		],
		'title_field' => '{{{ contact_item_title }}}',
	]
);



$this->end_controls_section();



$this->start_controls_section(
	'layout_four_contact_form_section',
	[
		'label' => esc_html__('Contact Form', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);

$this->add_control(
	'layout_four_ct_from_title',
	[
		'label' => esc_html__('Contact Form Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('What can we help you with?', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_ct_from_sub_title',
	[
		'label' => esc_html__('Contact Form Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add Sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Your email address will not be published*', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_select_cf7_form',
	[
		'label' => esc_html__('Select Contact Form 7', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'label_block' => true,
		'options' => grozomart_select_post('wpcf7_contact_form'),
	]
);


$this->end_controls_section();
