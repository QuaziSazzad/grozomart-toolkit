<?php

//content
$this->start_controls_section(
	'layout_one_content',
	[
		'label' => esc_html__('Logo', 'grozomart-toolkit'),
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

$this->end_controls_section();

//Navigation
$this->start_controls_section(
	'layout_one_nav',
	[
		'label' => esc_html__('Navigation', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_nav_menu',
	[
		'label'   => esc_html__('Select Menu', 'grozomart-toolkit'),
		'type'    => \Elementor\Controls_Manager::SELECT,
		'options' => $this->get_menus_list(),
	]
);

$this->end_controls_section();

//Top bar
$this->start_controls_section(
	'layout_one_top_bar',
	[
		'label' => esc_html__('Top Bar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_top_bar_text_one',
	[
		'label' => esc_html__('Text 1', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<b>FREE</b> delivery & 40% Discount for buy minimum <b>$1000!</b> or first <b>3 order!</b> Hurry up and place your orders.', 'grozomart-toolkit'), ['b' => []]),
	]
);

$this->add_control(
	'layout_one_top_bar_text_two',
	[
		'label' => esc_html__('Text 2', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('We deliver to you every day from <b>7:00 to 23:00</b>', 'grozomart-toolkit'), ['b' => []]),
	]
);

$this->end_controls_section();

//Middle bar (account/wishlist links, language, currency, contact)
$this->start_controls_section(
	'layout_one_middle_bar',
	[
		'label' => esc_html__('Middle Bar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$middle_links = new \Elementor\Repeater();

$middle_links->add_control(
	'link_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('My Account', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$middle_links->add_control(
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
	'layout_one_middle_links',
	[
		'label' => esc_html__('Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $middle_links->get_controls(),
		'default' => [
			['link_label' => esc_html__('My Account', 'grozomart-toolkit'), 'link_url' => ['url' => wc_get_page_permalink('myaccount')]],
			['link_label' => esc_html__('Wishlist', 'grozomart-toolkit')],
			['link_label' => esc_html__('FAQs', 'grozomart-toolkit')],
			['link_label' => esc_html__('Order Tracking', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ link_label }}}',
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
	'layout_one_languages',
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
	'layout_one_currencies',
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

$this->add_control(
	'layout_one_contact_label',
	[
		'label' => esc_html__('Contact Link Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Contact', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_contact_url',
	[
		'label' => esc_html__('Contact Link Url', 'grozomart-toolkit'),
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

$this->end_controls_section();

//Category dropdown
$this->start_controls_section(
	'layout_one_category',
	[
		'label' => esc_html__('Category Dropdown', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_category_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('All Categories', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_categories',
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
	'layout_one_category_limit',
	[
		'label' => esc_html__('Limit', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 4,
		'min' => 1,
	]
);

$this->end_controls_section();

//Header right dropdowns (Hot Products / On Sale)
$this->start_controls_section(
	'layout_one_header_right',
	[
		'label' => esc_html__('Header Right Dropdowns', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$header_right_dropdowns = new \Elementor\Repeater();

$header_right_dropdowns->add_control(
	'dropdown_label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Hot Products', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$header_right_dropdowns->add_control(
	'dropdown_badge',
	[
		'label' => esc_html__('Badge Text (optional)', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'description' => esc_html__('e.g. -35%. Leave empty to hide.', 'grozomart-toolkit'),
	]
);

$header_right_dropdowns->add_control(
	'dropdown_categories',
	[
		'label' => esc_html__('Categories', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_category('product_cat'),
		'multiple' => true,
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_header_right_dropdowns',
	[
		'label' => esc_html__('Dropdowns', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $header_right_dropdowns->get_controls(),
		'default' => [
			['dropdown_label' => esc_html__('Hot Products', 'grozomart-toolkit')],
			['dropdown_label' => esc_html__('On Sale', 'grozomart-toolkit'), 'dropdown_badge' => esc_html__('-35%', 'grozomart-toolkit')],
		],
		'title_field' => '{{{ dropdown_label }}}',
	]
);

$this->end_controls_section();

//Offcanvas
$this->start_controls_section(
	'layout_one_offcanvas',
	[
		'label' => esc_html__('Offcanvas Sidebar', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_offcanvas_text',
	[
		'label' => esc_html__('Description Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Developing personalized charity journeys to increase donor satisfaction strengthen community trust and expand our humanitarian by global philanthropic.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_social_title',
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
	'layout_one_social_icons',
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
