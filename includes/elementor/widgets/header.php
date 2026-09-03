<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;


class Header extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-header';
	}

	public function get_title()
	{
		return esc_html__('Header', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-header webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'header'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __('Layout', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Select Layout', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => __('Layout One', 'grozomart-toolkit'),
					'layout_two' => __('Layout Two', 'grozomart-toolkit'),
					// 'layout_three' => __('Layout Three', 'grozomart-toolkit'),
					// 'layout_four' => __('Layout Four', 'grozomart-toolkit'),
					// 'layout_five' => __('Layout Five', 'grozomart-toolkit'),
					// 'layout_six' => __('Layout Six', 'grozomart-toolkit'),
					// 'layout_seven' => __('Layout Seven', 'grozomart-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('header-option.php');
		include grozomart_get_elementor_option('header-two-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Top Bar Text', '{{WRAPPER}} .header-top .header-top-wrapper p', ['layout_one']);
		grozomart_elementor_style_options($this, 'Middle Links', '{{WRAPPER}} .middle-list-items .middle-list li a', ['layout_one']);
		grozomart_elementor_style_options($this, 'Contact Link', '{{WRAPPER}} .middle-right .link-text', ['layout_one']);
		grozomart_elementor_style_options($this, 'Nav Menu', '{{WRAPPER}} .main-menu nav#mobile-menu > ul > li > a', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Category Dropdown Button', '{{WRAPPER}} .category-wrapper .category-btn', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Offcanvas Description', '{{WRAPPER}} .offcanvas__content .text', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Offcanvas Social Title', '{{WRAPPER}} .social-icon-list .follow-title', ['layout_one', 'layout_two']);

		grozomart_elementor_style_options($this, 'Promo Text', '{{WRAPPER}} .middle-list-items .middle-list li', ['layout_two']);
		grozomart_elementor_style_options($this, 'Middle Right Links', '{{WRAPPER}} .middle-list-items .middle-right .link-text', ['layout_two']);
		grozomart_elementor_style_options($this, 'Contact Text', '{{WRAPPER}} .header-contacta .content p', ['layout_two']);
		grozomart_elementor_style_options($this, 'Contact Number', '{{WRAPPER}} .header-contacta .content a', ['layout_two']);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'button_hover_bg',
			[
				'label'     => esc_html__('Hover Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_one_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'grozomart-addon'),
			]
		);


		$this->end_controls_section();
	}

	protected function get_menus_list()
	{
		$nav_menus = [];
		$terms     = get_terms('nav_menu');

		foreach ($terms as $term) {
			$nav_menus[$term->name] = $term->name;
		}

		return $nav_menus;
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('header-one.php');
		include grozomart_get_elementor_template('header-two.php');
		// include grozomart_get_elementor_template('header-three.php');
		// include grozomart_get_elementor_template('header-four.php');
		// include grozomart_get_elementor_template('header-five.php');
		// include grozomart_get_elementor_template('header-six.php');
		// include grozomart_get_elementor_template('header-seven.php');
		// include grozomart_get_elementor_template('header-sidebar.php');
	}
}
