<?php

//Newsletter
$this->start_controls_section(
	'layout_one_newsletter',
	[
		'label' => esc_html__('Newsletter', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_newsletter_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Subscribe Our Newsletter', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_newsletter_text',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Subscribe to our newsletter and stay connected with the latest updates, exclusive offers, & fresh arrivals our Grocery Store & Supermarket.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_newsletter_placeholder',
	[
		'label' => esc_html__('Input Placeholder', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Email address', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_newsletter_button',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Subscribe', 'grozomart-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_one_newsletter_consent',
	[
		'label' => esc_html__('Consent Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('I agree to our Terms & Conditions and Privacy & Cookies Policy.', 'grozomart-toolkit'), ['a' => ['href' => [], 'target' => []]]),
		'description' => esc_html__('You can use links here.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//Help
$this->start_controls_section(
	'layout_one_help',
	[
		'label' => esc_html__('Help Box', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_help_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Contact us anytime via our 24/7 helpline', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_help_text',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Need assistance anytime? We’re now available 24/7', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_help_icon',
	[
		'label' => esc_html__('Icon Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_one_help_label',
	[
		'label' => esc_html__('Icon Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need help', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_help_number',
	[
		'label' => esc_html__('Phone Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+1 (012) 300-808', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_help_number_url',
	[
		'label' => esc_html__('Phone Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('tel:+1012300808', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();

//About column
$this->start_controls_section(
	'layout_one_about',
	[
		'label' => esc_html__('About Column', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_logo',
	[
		'label' => esc_html__('Logo', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_logo_size',
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
	'layout_one_about_text',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We are a modern grocery store dedicated to providing fresh, high-quality.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_address',
	[
		'label' => esc_html__('Address', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('101 Business Park Drive, Houston, TX 77002, USA', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_email',
	[
		'label' => esc_html__('Email', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('grozmart@gmail.com', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();

//Link columns
$this->start_controls_section(
	'layout_one_link_columns',
	[
		'label' => esc_html__('Link Columns', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$footer_links = new \Elementor\Repeater();

$footer_links->add_control(
	'link_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('New Arrivals', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$footer_links->add_control(
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
	'layout_one_column_one_title',
	[
		'label' => esc_html__('Column 1 Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Shop', 'grozomart-toolkit'),
		'label_block' => true,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_column_one_links',
	[
		'label' => esc_html__('Column 1 Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $footer_links->get_controls(),
		'default' => [
			['link_label' => esc_html__('New Arrivals', 'grozomart-toolkit')],
			['link_label' => esc_html__('Best Sellers', 'grozomart-toolkit')],
			['link_label' => esc_html__('Trending Now', 'grozomart-toolkit')],
			['link_label' => esc_html__('Bakery', 'grozomart-toolkit')],
			['link_label' => esc_html__('Beverages', 'grozomart-toolkit')],
			['link_label' => esc_html__('Cookies & Bars', 'grozomart-toolkit')],
			['link_label' => esc_html__('Snacks', 'grozomart-toolkit')],
			['link_label' => esc_html__('Vegetables', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ link_label }}}',
	]
);

$this->add_control(
	'layout_one_column_two_title',
	[
		'label' => esc_html__('Column 2 Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Top Brands', 'grozomart-toolkit'),
		'label_block' => true,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_column_two_links',
	[
		'label' => esc_html__('Column 2 Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $footer_links->get_controls(),
		'default' => [
			['link_label' => esc_html__('FreshMart', 'grozomart-toolkit')],
			['link_label' => esc_html__('DailyBasket', 'grozomart-toolkit')],
			['link_label' => esc_html__('GreenGrocer', 'grozomart-toolkit')],
			['link_label' => esc_html__('UrbanHarvest', 'grozomart-toolkit')],
			['link_label' => esc_html__('QuickMart', 'grozomart-toolkit')],
			['link_label' => esc_html__('PureBasket', 'grozomart-toolkit')],
			['link_label' => esc_html__('SmartGrocers', 'grozomart-toolkit')],
			['link_label' => esc_html__('EasyCart', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ link_label }}}',
	]
);

$this->add_control(
	'layout_one_column_three_title',
	[
		'label' => esc_html__('Column 3 Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Legal', 'grozomart-toolkit'),
		'label_block' => true,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_column_three_links',
	[
		'label' => esc_html__('Column 3 Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $footer_links->get_controls(),
		'default' => [
			['link_label' => esc_html__('Payment Methods', 'grozomart-toolkit')],
			['link_label' => esc_html__('Accessibility', 'grozomart-toolkit')],
			['link_label' => esc_html__('Shipping & Delivery', 'grozomart-toolkit')],
			['link_label' => esc_html__('Returns & Refund Policy', 'grozomart-toolkit')],
			['link_label' => esc_html__('Cookie Policy', 'grozomart-toolkit')],
			['link_label' => esc_html__('Privacy Policy', 'grozomart-toolkit')],
			['link_label' => esc_html__('Terms & Conditions', 'grozomart-toolkit')],
			['link_label' => esc_html__('FAQs', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ link_label }}}',
	]
);

$this->end_controls_section();

//App column
$this->start_controls_section(
	'layout_one_app',
	[
		'label' => esc_html__('Download App', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_app_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Download app', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$app_buttons = new \Elementor\Repeater();

$app_buttons->add_control(
	'app_image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
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
	'layout_one_app_buttons',
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

//Bottom bar
$this->start_controls_section(
	'layout_one_bottom',
	[
		'label' => esc_html__('Bottom Bar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_copyright',
	[
		'label' => esc_html__('Copyright Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('Copyright@ 2026 <a href="#">GrozoMart</a> All Rights Reserved.', 'grozomart-toolkit'), ['a' => ['href' => [], 'target' => []]]),
		'description' => esc_html__('You can use links here.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_payment_image',
	[
		'label' => esc_html__('Payment Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->end_controls_section();
