<?php

//About column
$this->start_controls_section(
	'layout_two_about',
	[
		'label' => esc_html__('About Column', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_logo',
	[
		'label' => esc_html__('Logo', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_two_logo_size',
	[
		'label' => esc_html__('Logo Size', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
		'description' => esc_html__('Set Logo Size.', 'grozomart-toolkit'),
		'default' => [
			'width' => '190',
			'height' => '40',
		],
	]
);

$this->add_control(
	'layout_two_about_text',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We are a modern grocery store & supermarket dedicated to providing fresh, high-quality.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_newsletter_placeholder',
	[
		'label' => esc_html__('Newsletter Placeholder', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Email address', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_newsletter_button',
	[
		'label' => esc_html__('Newsletter Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Subscribe', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$app_buttons = new \Elementor\Repeater();

$app_buttons->add_control(
	'app_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$app_buttons->add_control(
	'app_url',
	[
		'label' => esc_html__('Url', 'grozomart-toolkit'),
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
	'layout_two_app_buttons',
	[
		'label' => esc_html__('App Buttons', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $app_buttons->get_controls(),
		'default' => [
			[],
			[],
		],
	]
);

$this->end_controls_section();

//Link columns
$this->start_controls_section(
	'layout_two_link_columns',
	[
		'label' => esc_html__('Link Columns', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$footer_two_links = new \Elementor\Repeater();

$footer_two_links->add_control(
	'link_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Payment Methods', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$footer_two_links->add_control(
	'link_url',
	[
		'label' => esc_html__('Url', 'grozomart-toolkit'),
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
	'layout_two_column_one_title',
	[
		'label' => esc_html__('Column 1 Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('My account', 'grozomart-toolkit'),
		'label_block' => true,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_two_column_one_links',
	[
		'label' => esc_html__('Column 1 Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $footer_two_links->get_controls(),
		'default' => [
			['link_label' => esc_html__('Payment Methods', 'grozomart-toolkit')],
			['link_label' => esc_html__('Accessibility', 'grozomart-toolkit')],
			['link_label' => esc_html__('Shipping & Delivery', 'grozomart-toolkit')],
			['link_label' => esc_html__('Returns & Refund Policy', 'grozomart-toolkit')],
			['link_label' => esc_html__('Cookie Policy', 'grozomart-toolkit')],
			['link_label' => esc_html__('Privacy Policy', 'grozomart-toolkit')],
			['link_label' => esc_html__('SmartGrocers', 'grozomart-toolkit')],
			['link_label' => esc_html__('Terms & Conditions', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ link_label }}}',
	]
);

$this->add_control(
	'layout_two_column_two_title',
	[
		'label' => esc_html__('Column 2 Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop', 'grozomart-toolkit'),
		'label_block' => true,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_two_column_two_links',
	[
		'label' => esc_html__('Column 2 Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $footer_two_links->get_controls(),
		'default' => [
			['link_label' => esc_html__('New Arrivals', 'grozomart-toolkit')],
			['link_label' => esc_html__('Best Sellers', 'grozomart-toolkit')],
			['link_label' => esc_html__('Trending Now', 'grozomart-toolkit')],
			['link_label' => esc_html__('Bakery', 'grozomart-toolkit')],
			['link_label' => esc_html__('Beverages', 'grozomart-toolkit')],
			['link_label' => esc_html__('Cookies & Bars', 'grozomart-toolkit')],
			['link_label' => esc_html__('Snacks', 'grozomart-toolkit')],
			['link_label' => esc_html__('Trending Now', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ link_label }}}',
	]
);

$this->end_controls_section();

//Locations column
$this->start_controls_section(
	'layout_two_locations',
	[
		'label' => esc_html__('Locations Column', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_locations_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Locations', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_location_icon',
	[
		'label' => __('Location Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fa-solid fa-location-dot',
			'library' => 'custom-icon',
		],
	]
);

$this->add_control(
	'layout_two_location_address',
	[
		'label' => esc_html__('Address', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('55 Main Street, 2nd block Malborne, Australia', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_hours_title',
	[
		'label' => esc_html__('Opening Hours Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Opening hours', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_hours_text',
	[
		'label' => esc_html__('Opening Hours', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Monday - Friday: 9:00 - 20:00 <br> Saturday: 9:00 - 15:00', 'grozomart-toolkit'), ['br' => []]),
		'description' => esc_html__('You can use <br> to break the line.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//Bottom bar
$this->start_controls_section(
	'layout_two_bottom',
	[
		'label' => esc_html__('Bottom Bar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_copyright',
	[
		'label' => esc_html__('Copyright Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Copyright@ 2026 <a href="#">GrozoMart</a> All Rights Reserved.', 'grozomart-toolkit'), ['a' => ['href' => [], 'target' => []]]),
		'description' => esc_html__('You can use links here.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_language_label',
	[
		'label' => esc_html__('Language Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('English (US)', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$language_items = new \Elementor\Repeater();

$language_items->add_control(
	'language_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('English (US)', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$language_items->add_control(
	'language_url',
	[
		'label' => esc_html__('Url', 'grozomart-toolkit'),
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
	'layout_two_languages',
	[
		'label' => esc_html__('Languages', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $language_items->get_controls(),
		'default' => [
			['language_label' => esc_html__('English (US)', 'grozomart-toolkit')],
			['language_label' => esc_html__('বাংলা', 'grozomart-toolkit')],
			['language_label' => esc_html__('Español', 'grozomart-toolkit')],
			['language_label' => esc_html__('Français', 'grozomart-toolkit')],
			['language_label' => esc_html__('Deutsch', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ language_label }}}',
	]
);

$this->add_control(
	'layout_two_flag_image',
	[
		'label' => esc_html__('Flag Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->end_controls_section();
