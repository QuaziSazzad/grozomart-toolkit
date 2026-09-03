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
	'layout_four_sub_title',
	[
		'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Meet Our Team', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your sub title here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_title',
	[
		'label' => esc_html__('Title', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Experience Technical Team', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'grozomart-toolkit'),
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
	'layout_four_button_text',
	[
		'label' => esc_html__('Button Text', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Become A Member', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type button text here', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_button_url',
	[
		'label' => esc_html__('Button URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',	
			'is_external' => false,
			'nofollow' => false,
		],
		'show_external' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Member Image', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('David R. Watkins', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type member name here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Consultant', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type member designation here', 'grozomart-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'grozomart-toolkit'),
		'placeholder' => esc_html__('Type member description here', 'grozomart-toolkit'),
	]
);

$repeater->add_control(
	'url',
	[
		'label' => esc_html__('Profile URL', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'grozomart-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => true,
			'nofollow' => true,
		],
	]
);

$repeater->add_control(
	'social',
	[
		'label' => esc_html__('Social Links', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
		<a href="#"><i class="fab fa-twitter"></i></a>
		<a href="#"><i class="fab fa-linkedin-in"></i></a>
		<a href="#"><i class="fab fa-instagram"></i></a>',
		'placeholder' => esc_html__('Add social links with HTML', 'grozomart-toolkit'),
	]
);

$this->add_control(
	'layout_four_team_list',
	[
		'label' => esc_html__('Team Members', 'grozomart-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'name' => esc_html__('David R. Watkins', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'description' => esc_html__('As an IT consultant, our mission is to bridge the technology.', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Robert S. Hummel', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Eugene A. Howland', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Paul G. Hundley', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Danny J. Harrison', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Nathan S. Barber', 'grozomart-toolkit'),
				'designation' => esc_html__('IT Consultant', 'grozomart-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'grozomart-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
		],
		'title_field' => '{{{ name }}}',
	]
);


$this->end_controls_section();
