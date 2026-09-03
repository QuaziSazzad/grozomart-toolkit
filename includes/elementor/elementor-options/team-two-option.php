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

$this->add_control(
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
		'default' => esc_html__('Experience Technical Team', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_two_title_tag',
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
	'layout_two_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add sub title', 'grozomart-toolkit'),
		'default' => esc_html__('Meet Our Team', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_two_team_list = new \Elementor\Repeater();

$layout_two_team_list->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
		'default' => esc_html__('Raymond R. Jacobs', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_two_team_list->add_control(
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

$layout_two_team_list->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Designation', 'grozomart-toolkit'),
		'default' => esc_html__('Ceo & Founder', 'grozomart-toolkit'),
		'label_block' => true
	]
);

$layout_two_team_list->add_control(
	'social',
	[
		'label' => esc_html__('Social Profile', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'rows' => '2',
		'placeholder' => esc_html__('Add Social Profile', 'grozomart-toolkit'),
		'default' => wp_kses(__('<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
			<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
			<a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
			<a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>', 'grozomart-toolkit'), grozomart_get_allowed_html_tags()),
		'label_block' => true
	]
);

$layout_two_team_list->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_two_team_list',
	[
		'label' => esc_html__('Team List', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_two_team_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ name }}}',
		'default' => [
			[
				'name' => esc_html__('David R. Watkins', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'grozomart-toolkit'), grozomart_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
			[
				'name' => esc_html__('James K. Andrews', 'grozomart-toolkit'),
				'designation' => esc_html__('UI Designer', 'grozomart-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'grozomart-toolkit'), grozomart_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
			[
				'name' => esc_html__('Kenneth B. Hebert', 'grozomart-toolkit'),
				'designation' => esc_html__('HR Support', 'grozomart-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'grozomart-toolkit'), grozomart_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
			[
				'name' => esc_html__('Alexander M. Burris', 'grozomart-toolkit'),
				'designation' => esc_html__('Product Designer', 'grozomart-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'grozomart-toolkit'), grozomart_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
		],
	]
);


$this->end_controls_section();
