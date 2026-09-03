<?php

//content
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
	'section_title',
	[
		'label' => esc_html__('Section Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Experience Technical Team', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_title_tag',
	[
		'label' => esc_html__('Title HTML Tag', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'h2',
		'options' => [
			'h1' => esc_html__('H1', 'grozomart-toolkit'),
			'h2' => esc_html__('H2', 'grozomart-toolkit'),
			'h3' => esc_html__('H3', 'grozomart-toolkit'),
			'h4' => esc_html__('H4', 'grozomart-toolkit'),
			'h5' => esc_html__('H5', 'grozomart-toolkit'),
			'h6' => esc_html__('H6', 'grozomart-toolkit'),
		],
	]
);

$this->add_control(
	'section_subtitle',
	[
		'label' => esc_html__('Section Subtitle', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Meet Our Team', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'member_image',
	[
		'label' => esc_html__('Member Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'member_name',
	[
		'label' => esc_html__('Member Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('David R. Watkins', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'url',
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

$repeater->add_control(
	'member_designation',
	[
		'label' => esc_html__('Designation', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Consultant', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'social_items',
	[
		'label' => esc_html__('Social Items', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'default' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>', 'grozomart-toolkit'), array('a' => array('href' => array(), 'target' => array(), 'rel' => array()), 'i' => array('class' => array()))),
		'label_block' => true,
	]
);


$this->add_control(
	'team_members',
	[
		'label' => esc_html__('Team Members', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'member_name' => esc_html__('David R. Watkins', 'grozomart-toolkit'),
				'member_designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
			],
			[
				'member_name' => esc_html__('James K. Andrews', 'grozomart-toolkit'),
				'member_designation' => esc_html__('UI Designer', 'grozomart-toolkit'),
			],
			[
				'member_name' => esc_html__('Kenneth B. Hebert', 'grozomart-toolkit'),
				'member_designation' => esc_html__('HR Support', 'grozomart-toolkit'),
			],
			[
				'member_name' => esc_html__('Alexander M. Burris', 'grozomart-toolkit'),
				'member_designation' => esc_html__('Product Designer', 'grozomart-toolkit'),
			],
		],
		'title_field' => '{{{ member_name }}}',
	]
);


$this->end_controls_section();
