<?php

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
	'layout_one_product',
	[
		'label' => esc_html__('Product', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => grozomart_select_post('product'),
		'label_block' => true,
		'description' => esc_html__('Leave empty to show the product currently being viewed — required when this widget is used inside a Single Product template.', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_show_breadcrumb',
	[
		'label' => esc_html__('Show Breadcrumb', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_show_gallery',
	[
		'label' => esc_html__('Show Gallery Thumbnails', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_show_meta',
	[
		'label' => esc_html__('Show SKU / Category / Tags', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->end_controls_section();

//Guarantee list
$this->start_controls_section(
	'layout_one_checklist',
	[
		'label' => esc_html__('Payment & Warranty List', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'label',
	[
		'label' => esc_html__('Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Payment :', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Multiple payment options available, including cash on delivery, card payment, Google Pay, and online card with a 5% discount', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_checklist_items',
	[
		'label' => esc_html__('Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'label' => esc_html__('Payment :', 'grozomart-toolkit'),
				'text' => esc_html__('Multiple payment options available, including cash on delivery, card payment, Google Pay, and online card with a 5% discount', 'grozomart-toolkit'),
			],
			[
				'label' => esc_html__('Warranty :', 'grozomart-toolkit'),
				'text' => esc_html__('This product is non-returnable if it meets quality standards, as per consumer protection guidelines.', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ label }}}',
	]
);

$this->end_controls_section();

//Tabs
$this->start_controls_section(
	'layout_one_tabs',
	[
		'label' => esc_html__('Product Tabs', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_show_tabs',
	[
		'label' => esc_html__('Show Tabs Section', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_one_description_label',
	[
		'label' => esc_html__('Description Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Descriptions', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_description_heading',
	[
		'label' => esc_html__('Description Heading', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'description' => esc_html__('Leave empty to use the product name.', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_description_text',
	[
		'label' => esc_html__('Description Content', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::WYSIWYG,
		'description' => esc_html__('Leave empty to use the product description. Products edited with Elementor store their whole page layout as content, so set the text here for those.', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$layout_one_dec_list = new \Elementor\Repeater();

$layout_one_dec_list->add_control(
	'text',
	[
		'label' => esc_html__('Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('Premium Quality Nut Selection', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_one_description_list',
	[
		'label' => esc_html__('Feature List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_dec_list->get_controls(),
		'title_field' => '{{{ text }}}',
		'description' => esc_html__('Rendered as the two-column dotted list below the description.', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_additional_label',
	[
		'label' => esc_html__('Additional Info Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Additional Information', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_reviews_label',
	[
		'label' => esc_html__('Reviews Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Reviews', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_related_label',
	[
		'label' => esc_html__('Related Tab Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Related Products', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_related_title',
	[
		'label' => esc_html__('Related Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Best Sellers', 'grozomart-toolkit'),
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_related_limit',
	[
		'label' => esc_html__('Related Products Limit', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 5,
		'min' => 1,
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->add_control(
	'layout_one_related_link',
	[
		'label' => esc_html__('View All Link', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'condition' => ['layout_one_show_tabs' => 'yes'],
	]
);

$this->end_controls_section();
