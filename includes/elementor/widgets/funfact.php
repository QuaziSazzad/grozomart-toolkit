<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class FunFact extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-funfact';
	}

	public function get_title()
	{
		return esc_html__('Funfact', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-counter webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'fun fact'];
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
					'layout_three' => __('Layout Three', 'grozomart-toolkit'),
					'layout_four' => __('Layout Four', 'grozomart-toolkit'),
					'layout_five' => __('Layout Five', 'grozomart-toolkit'),
					'layout_six' => __('Layout Six', 'grozomart-toolkit'),
				]
			]
		);

		$this->end_controls_section();


		include grozomart_get_elementor_option('funfact-one-option.php');
		include grozomart_get_elementor_option('funfact-two-option.php');
		include grozomart_get_elementor_option('funfact-three-option.php');
		include grozomart_get_elementor_option('funfact-four-option.php');
		include grozomart_get_elementor_option('funfact-five-option.php');
		include grozomart_get_elementor_option('funfact-six-option.php');

		//General style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2,{{WRAPPER}} section-title h3', ['layout_one', 'layout_three', 'layout_four', 'layout_six']);
		grozomart_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_six']);
		grozomart_elementor_style_options($this, 'Section Description Text', '{{WRAPPER}} .section-title p, {{WRAPPER}} .statistics-two-content p, {{WRAPPER}} .achievement-content p', ['layout_one', 'layout_four', 'layout_six']);

		grozomart_elementor_style_options($this, 'Funfact Title', '{{WRAPPER}} .counter-item .counter-title,{{WRAPPER}} .counter-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		grozomart_elementor_style_options($this, 'Count Number', '{{WRAPPER}} .counter-item .counter-text-wrap, {{WRAPPER}} .count-text,{{WRAPPER}} .after', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);

		grozomart_elementor_style_options($this, 'Icon', '{{WRAPPER}} .counter-item-three>i', ['layout_four']);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_one'],
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'grozomart-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn, a.theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'grozomart-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
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
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'grozomart-addon'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('funfact-one.php');
		include grozomart_get_elementor_template('funfact-two.php');
		include grozomart_get_elementor_template('funfact-three.php');
		include grozomart_get_elementor_template('funfact-four.php');
		include grozomart_get_elementor_template('funfact-five.php');
		include grozomart_get_elementor_template('funfact-six.php');
	}
}
