<?php

//Content
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

$this->add_control(
	'layout_two_product',
	[
		'label' => esc_html__('Product', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_post('product'),
		'label_block' => true,
		'description' => esc_html__('Leave empty to show the product currently being viewed — required when this widget is used inside a Single Product template.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_show_breadcrumb',
	[
		'label' => esc_html__('Show Breadcrumb', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_gallery',
	[
		'label' => esc_html__('Show Gallery Thumbnails', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_wishlist_row',
	[
		'label' => esc_html__('Show Wishlist / Compare Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_show_meta',
	[
		'label' => esc_html__('Show Brand / Category / Tags / Share', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_brand',
	[
		'label' => esc_html__('Brand', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'description' => esc_html__('Shown in the Brand row. Leave empty to hide that row.', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_meta' => 'yes'],
	]
);

$this->end_controls_section();

//Feature icons
$this->start_controls_section(
	'layout_two_icons',
	[
		'label' => esc_html__('Feature Icons', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$layout_two_icon = new \Elementor\Repeater();

$layout_two_icon->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-leaves',
			'library' => 'flaticon',
		],
	]
);

$layout_two_icon->add_control(
	'text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('100% Natural', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_icon_items',
	[
		'label' => esc_html__('Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_two_icon->get_controls(),
		'title_field' => '{{{ text }}}',
		'default' => [
			['icon' => ['value' => 'flaticon-leaves', 'library' => 'flaticon'], 'text' => esc_html__('100% Natural', 'grozomart-toolkit')],
			['icon' => ['value' => 'flaticon-no-chemical', 'library' => 'flaticon'], 'text' => esc_html__('Chemical-free', 'grozomart-toolkit')],
			['icon' => ['value' => 'flaticon-credit-card', 'library' => 'flaticon'], 'text' => esc_html__('Secure Payment', 'grozomart-toolkit')],
			['icon' => ['value' => 'flaticon-customer-support', 'library' => 'flaticon'], 'text' => esc_html__('24/7 Support', 'grozomart-toolkit')],
		],
		'description' => esc_html__('Rendered as two columns; the list is split in half.', 'grozomart-toolkit'),
	]
);

$this->end_controls_section();

//Tabs
$this->start_controls_section(
	'layout_two_tabs',
	[
		'label' => esc_html__('Product Tabs', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_show_tabs',
	[
		'label' => esc_html__('Show Tabs Section', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_two_description_label',
	[
		'label' => esc_html__('Description Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Descriptions', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_description_heading',
	[
		'label' => esc_html__('Description Heading', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'description' => esc_html__('Leave empty to use the product name.', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_description_text',
	[
		'label' => esc_html__('Description Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::WYSIWYG,
		'description' => esc_html__('Leave empty to use the product description. Products edited with Elementor store their whole page layout as content, so set the text here for those.', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$layout_two_dec_list = new \Elementor\Repeater();

$layout_two_dec_list->add_control(
	'text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('Premium Quality Nut Selection', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_description_list',
	[
		'label' => esc_html__('Feature List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_two_dec_list->get_controls(),
		'title_field' => '{{{ text }}}',
		'description' => esc_html__('Rendered as the two-column dotted list below the description.', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_additional_label',
	[
		'label' => esc_html__('Additional Info Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Additional Information', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_reviews_label',
	[
		'label' => esc_html__('Reviews Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Reviews', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_related_label',
	[
		'label' => esc_html__('Related Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Related Products', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_related_title',
	[
		'label' => esc_html__('Related Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Best Sellers', 'grozomart-toolkit'),
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_related_limit',
	[
		'label' => esc_html__('Related Products Limit', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 5,
		'min' => 1,
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_two_related_link',
	[
		'label' => esc_html__('View All Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'condition' => ['layout_two_show_tabs' => 'yes'],
	]
);

$this->end_controls_section();
