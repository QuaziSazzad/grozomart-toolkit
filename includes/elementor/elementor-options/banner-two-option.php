<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'slide_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Best Deal For Snack <b>(50% discount)</b>', 'grozomart-toolkit'), ['b' => []]),
	]
);

$repeater->add_control(
	'slide_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Daily Grocery Order & <br> Get Express <span>Delivery</span>', 'grozomart-toolkit'), ['span' => [], 'br' => []]),
	]
);

$repeater->add_control(
	'slide_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Perfect for quick bites, family moments, or on-the-go enjoyment, our snacks combine', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'slide_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Explore Shop', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_button_url',
	[
		'label' => esc_html__('Button Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'grozomart-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$repeater->add_control(
	'slide_price_text',
	[
		'label' => esc_html__('Price Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Starting at', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$60.99', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'slide_offer_image',
	[
		'label' => esc_html__('Offer Shape Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_two_slides',
	[
		'label' => esc_html__('Slides', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'slide_sub_title' => wp_kses(__('Best Deal For Snack <b>(50% discount)</b>', 'grozomart-toolkit'), ['b' => []]),
				'slide_title' => wp_kses(__('Daily Grocery Order & <br> Get Express <span>Delivery</span>', 'grozomart-toolkit'), ['span' => [], 'br' => []]),
				'slide_description' => esc_html__('Perfect for quick bites, family moments, or on-the-go enjoyment, our snacks combine', 'grozomart-toolkit'),
				'slide_button_label' => esc_html__('Explore Shop', 'grozomart-toolkit'),
				'slide_price_text' => esc_html__('Starting at', 'grozomart-toolkit'),
				'slide_price' => esc_html__('$60.99', 'grozomart-toolkit'),
			],
			[
				'slide_sub_title' => wp_kses(__('Best Deal For Snack <b>(50% discount)</b>', 'grozomart-toolkit'), ['b' => []]),
				'slide_title' => wp_kses(__('Daily Grocery Order & <br> Get Express <span>Delivery</span>', 'grozomart-toolkit'), ['span' => [], 'br' => []]),
				'slide_description' => esc_html__('Perfect for quick bites, family moments, or on-the-go enjoyment, our snacks combine', 'grozomart-toolkit'),
				'slide_button_label' => esc_html__('Explore Shop', 'grozomart-toolkit'),
				'slide_price_text' => esc_html__('Starting at', 'grozomart-toolkit'),
				'slide_price' => esc_html__('$60.99', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ slide_price }}}',
	]
);

$this->end_controls_section();

$this->start_controls_section(
	'section_image_two',
	[
		'label' => esc_html__('Images', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_bottom_image',
	[
		'label' => esc_html__('Bottom Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_two_scroll_down_image',
	[
		'label' => esc_html__('Scroll Down Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->end_controls_section();
