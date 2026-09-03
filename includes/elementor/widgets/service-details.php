<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Service_details extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-service-details';
	}

	public function get_title()
	{
		return esc_html__('Service Details', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-flow webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'Service Details'];
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
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('service-details-one-option.php');
		include grozomart_get_elementor_option('service-details-two-option.php');
		include grozomart_get_elementor_option('service-details-three-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2,{{WRAPPER}} .section-title h3', ['layout_one', 'layout_two', 'layout_three']);
		grozomart_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Section Description Text', '{{WRAPPER}} .left-content p, {{WRAPPER}} .section-title p,{{WRAPPER}}  .solution-beyond-content p', ['layout_one', 'layout_two', 'layout_three']);

		grozomart_elementor_style_options($this, 'Features Title', '{{WRAPPER}} .it-solution-item h5', ['layout_two']);
		grozomart_elementor_style_options($this, 'Features Text', '{{WRAPPER}} .list-style-two li, {{WRAPPER}} .it-solution-item p,{{WRAPPER}} .list-style-two li', ['layout_one', 'layout_two', 'layout_three']);


		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_two'],
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
		include grozomart_get_elementor_template('service-details-one.php');
		include grozomart_get_elementor_template('service-details-two.php');
		include grozomart_get_elementor_template('service-details-three.php');
	}
}
