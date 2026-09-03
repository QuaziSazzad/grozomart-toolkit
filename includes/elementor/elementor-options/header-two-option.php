<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Logo', 'grozomart-toolkit'),
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

$this->end_controls_section();

//Navigation
$this->start_controls_section(
	'layout_two_nav',
	[
		'label' => esc_html__('Navigation', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_nav_menu',
	[
		'label'   => esc_html__('Select Menu', 'grozomart-toolkit'),
		'type'    => \Elementor\Controls_Manager::SELECT,
		'options' => $this->get_menus_list(),
	]
);

$this->end_controls_section();

//Top bar
$this->start_controls_section(
	'layout_two_top_bar',
	[
		'label' => esc_html__('Top Bar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_promo_text',
	[
		'label' => esc_html__('Promo Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Buy one get one free on', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_promo_link_label',
	[
		'label' => esc_html__('Promo Link Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('first order', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_promo_link_url',
	[
		'label' => esc_html__('Promo Link Url', 'grozomart-toolkit'),
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
	'layout_two_track_text',
	[
		'label' => esc_html__('Track Order Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Track Your Order', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();

//Middle bar
$this->start_controls_section(
	'layout_two_middle_bar',
	[
		'label' => esc_html__('Middle Bar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_order_tracking_label',
	[
		'label' => esc_html__('Order Tracking Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Order Tracking', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_order_tracking_url',
	[
		'label' => esc_html__('Order Tracking Url', 'grozomart-toolkit'),
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
	'layout_two_about_label',
	[
		'label' => esc_html__('About Link Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('About Us', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_about_url',
	[
		'label' => esc_html__('About Link Url', 'grozomart-toolkit'),
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

$language_options = new \Elementor\Repeater();

$language_options->add_control(
	'option_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('English', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_languages',
	[
		'label' => esc_html__('Language Options', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $language_options->get_controls(),
		'default' => [
			['option_label' => esc_html__('English', 'grozomart-toolkit')],
			['option_label' => esc_html__('Hindi', 'grozomart-toolkit')],
			['option_label' => esc_html__('Bangla', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ option_label }}}',
	]
);

$currency_options = new \Elementor\Repeater();

$currency_options->add_control(
	'option_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('USD', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_currencies',
	[
		'label' => esc_html__('Currency Options', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $currency_options->get_controls(),
		'default' => [
			['option_label' => esc_html__('USD', 'grozomart-toolkit')],
			['option_label' => esc_html__('EUR', 'grozomart-toolkit')],
			['option_label' => esc_html__('GBP', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ option_label }}}',
	]
);

$this->end_controls_section();

//Category dropdown
$this->start_controls_section(
	'layout_two_category',
	[
		'label' => esc_html__('Category Dropdown', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_category_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('All categories', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_categories',
	[
		'label' => esc_html__('Categories', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_category('product_cat'),
		'multiple' => true,
		'label_block' => true,
		'description' => esc_html__('Leave empty to list all product categories.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_category_limit',
	[
		'label' => esc_html__('Limit', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 4,
		'min' => 1,
	]
);

$this->end_controls_section();

//Header contact
$this->start_controls_section(
	'layout_two_header_contact',
	[
		'label' => esc_html__('Header Contact', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_contact_icon',
	[
		'label' => __('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fa-sharp fa-solid fa-phone-volume',
			'library' => 'custom-icon',
		],
	]
);

$this->add_control(
	'layout_two_contact_text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need any Help! call Us today', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_contact_number',
	[
		'label' => esc_html__('Phone Number', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+(2) 871 382 023', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_contact_url',
	[
		'label' => esc_html__('Phone Url', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('tel:+2871382023', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->end_controls_section();

//Offcanvas
$this->start_controls_section(
	'layout_two_offcanvas',
	[
		'label' => esc_html__('Offcanvas Sidebar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_offcanvas_text',
	[
		'label' => esc_html__('Description Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Developing personalized charity journeys to increase donor satisfaction strengthen community trust and expand our humanitarian by global philanthropic.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_social_title',
	[
		'label' => esc_html__('Social Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Follow us:', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$social_icons = new \Elementor\Repeater();

$social_icons->add_control(
	'social_icon',
	[
		'label' => esc_html__('Select Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fab fa-facebook-f',
			'library' => 'brand',
		],
		'label_block' => true,
	]
);

$social_icons->add_control(
	'social_url',
	[
		'label' => esc_html__('Add Url', 'grozomart-toolkit'),
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
	'layout_two_social_icons',
	[
		'label' => esc_html__('Social Icons', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $social_icons->get_controls(),
		'prevent_empty' => false,
		'default' => [
			['social_icon' => ['value' => 'fab fa-facebook-f', 'library' => 'brand']],
			['social_icon' => ['value' => 'fab fa-twitter', 'library' => 'brand']],
			['social_icon' => ['value' => 'fab fa-vimeo-v', 'library' => 'brand']],
			['social_icon' => ['value' => 'fab fa-pinterest-p', 'library' => 'brand']],
		],
	]
);

$this->end_controls_section();
