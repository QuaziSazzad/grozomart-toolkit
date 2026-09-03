<?php

//Left Banner (Best Day, with countdown)
$this->start_controls_section(
	'layout_two_left_content',
	[
		'label' => esc_html__('Left Banner (Countdown)', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_left_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Best Deal Of The Day', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_left_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => __('Premium cherry chocolates <br> that are both healthy.', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_left_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('100% natural, organic, and healthy choice', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_left_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_left_button_url',
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

$this->add_control(
	'layout_two_left_countdown_date',
	[
		'label' => esc_html__('Countdown End Date', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::DATE_TIME,
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_left_countdown_text',
	[
		'label' => esc_html__('Countdown Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('End of the offer', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_left_light_image',
	[
		'label' => esc_html__('Light Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_two_left_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();

//Middle Banners (two stacked shop-banner-items)
$this->start_controls_section(
	'layout_two_middle_content',
	[
		'label' => esc_html__('Middle Banners', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_middle_top_sub_title',
	[
		'label' => esc_html__('Top Item: Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Best Deal Of The Day', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_top_title',
	[
		'label' => esc_html__('Top Item: Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => __('Fresh Delicious Nuts <br> healthy & tasty', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_top_description',
	[
		'label' => esc_html__('Top Item: Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_top_button_label',
	[
		'label' => esc_html__('Top Item: Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_top_button_url',
	[
		'label' => esc_html__('Top Item: Button Url', 'grozomart-toolkit'),
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

$this->add_control(
	'layout_two_middle_top_image',
	[
		'label' => esc_html__('Top Item: Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_two_middle_top_light_image',
	[
		'label' => esc_html__('Top Item: Light Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'divider_middle',
	[
		'type' => \Elementor\Controls_Manager::DIVIDER,
	]
);

$this->add_control(
	'layout_two_middle_bottom_sub_title',
	[
		'label' => esc_html__('Bottom Item: Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Best Deal Of The Day', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_bottom_title',
	[
		'label' => esc_html__('Bottom Item: Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => __('Authentic Pure Cow <br> Milk from Farm', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_bottom_description',
	[
		'label' => esc_html__('Bottom Item: Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('100% Organic & healthy', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_bottom_button_label',
	[
		'label' => esc_html__('Bottom Item: Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_middle_bottom_button_url',
	[
		'label' => esc_html__('Bottom Item: Button Url', 'grozomart-toolkit'),
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

$this->add_control(
	'layout_two_middle_bottom_image',
	[
		'label' => esc_html__('Bottom Item: Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();

//Right Banner (Best Day, with countdown)
$this->start_controls_section(
	'layout_two_right_content',
	[
		'label' => esc_html__('Right Banner (Countdown)', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_right_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Best Deal Of The Day', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_right_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => __('Healthy cherry chocolates <br> with rich, sweet flavor', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_right_description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('100% natural, organic, and healthy choice', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_right_button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop Now', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_right_button_url',
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

$this->add_control(
	'layout_two_right_countdown_date',
	[
		'label' => esc_html__('Countdown End Date', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::DATE_TIME,
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_right_countdown_text',
	[
		'label' => esc_html__('Countdown Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('End of the offer', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_right_light_image',
	[
		'label' => esc_html__('Light Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_two_right_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
