<?php

//content
$this->start_controls_section(
	'layout_four_content',
	[
		'label' => esc_html__('Content', 'grozomart-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);


$this->add_control(
	'layout_four_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => false,
		'options'     => [
			'h1' => [
				'title' => esc_html__('H1', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'grozomart-toolkit'),
				'icon'  => 'eicon-editor-h6',
			],
		],
		'default'     => 'h2',
		'toggle'      => false,
	]
);

$this->add_control(
	'layout_four_sub_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Default Title', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_monthly_heading',
	[
		'label' => esc_html__('Monthly Price Heading', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Monthly Price Heading', 'grozomart-toolkit'),
		'default' => esc_html__('Monthly', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_yearly_heading',
	[
		'label' => esc_html__('Yearly Price Heading', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Yearly Price Heading', 'grozomart-toolkit'),
		'default' => esc_html__('Yearly', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_discount_text',
	[
		'label' => esc_html__('Discount Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Discount Text', 'grozomart-toolkit'),
		'default' => esc_html__('Save 25%', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_monthly_list = new \Elementor\Repeater();

$layout_four_pricing_monthly_list->add_control(
	'plan_title',
	[
		'label' => esc_html__('Plan Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'default' => esc_html__('Regular', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_monthly_list->add_control(
	'badge',
	[
		'label' => esc_html__('Badge', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'default' => '',
		'label_block' => true,
	]
);

$layout_four_pricing_monthly_list->add_control(
	'price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('$15', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_monthly_list->add_control(
	'duration',
	[
		'label' => esc_html__('Duration', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('/monthly', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_monthly_list->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'default' => esc_html__('Default Text', 'grozomart-toolkit'),
	]
);


$layout_four_pricing_monthly_list->add_control(
	'service_list',
	[
		'label' => esc_html__('Service List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'label_block' => true,
		'default' => wp_kses('<li>Up to 5-7 pages design</li>
		<li>1 GB storage per site</li>
		<li class="hide">Standard theme customization</li>
		<li class="hide">Social media integration</li>
		<li class="hide">Basic SEO setup</li>
		<li class="hide">1 round of revisions</li>', grozomart_get_allowed_html_tags())
	]
);

$layout_four_pricing_monthly_list->add_control(
	'button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$layout_four_pricing_monthly_list->add_control(
	'button_url',
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
		'show_label' => true,
	]
);


$this->add_control(
	'layout_four_pricing_monthly_list',
	[
		'label' => esc_html__('Monthly List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_four_pricing_monthly_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ plan_title }}}',
	]
);

$this->add_control(
	'pricing_layout_four_divider',
	[
		'type' => \Elementor\Controls_Manager::DIVIDER,
	]
);

$layout_four_pricing_yearly_list = new \Elementor\Repeater();

$layout_four_pricing_yearly_list->add_control(
	'plan_title',
	[
		'label' => esc_html__('Plan Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'default' => esc_html__('Regular', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_yearly_list->add_control(
	'badge',
	[
		'label' => esc_html__('Badge', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'default' => esc_html__('popular', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_yearly_list->add_control(
	'price',
	[
		'label' => esc_html__('Price', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('$15', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_yearly_list->add_control(
	'duration',
	[
		'label' => esc_html__('Duration', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'default' => esc_html__('/yearly', 'grozomart-toolkit'),
	]
);

$layout_four_pricing_yearly_list->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'default' => esc_html__('Default Text', 'grozomart-toolkit'),
	]
);


$layout_four_pricing_yearly_list->add_control(
	'service_list',
	[
		'label' => esc_html__('Service List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'label_block' => true,
		'default' => wp_kses('<li>Up to 5-7 pages design</li>
		<li>1 GB storage per site</li>
		<li class="hide">Standard theme customization</li>
		<li class="hide">Social media integration</li>
		<li class="hide">Basic SEO setup</li>
		<li class="hide">1 round of revisions</li>', grozomart_get_allowed_html_tags())
	]
);

$layout_four_pricing_yearly_list->add_control(
	'button_label',
	[
		'label' => esc_html__('Button Label', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$layout_four_pricing_yearly_list->add_control(
	'button_url',
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
		'show_label' => true,
	]
);


$this->add_control(
	'layout_four_pricing_yearly_list',
	[
		'label' => esc_html__('Yearly List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_four_pricing_yearly_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ plan_title }}}',
	]
);


$this->add_control(
	'layout_four_bg_image',
	[
		'label' => esc_html__('Background Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
