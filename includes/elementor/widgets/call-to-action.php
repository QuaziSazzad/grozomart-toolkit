<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Call_To_Action extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-call-to-action';
	}

	public function get_title()
	{
		return esc_html__('Call To Action', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-call-to-action webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'call to action', 'call', 'action', 'button'];
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

		include grozomart_get_elementor_option('call-to-action-one-option.php');
		include grozomart_get_elementor_option('call-to-action-two-option.php');
		include grozomart_get_elementor_option('call-to-action-three-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Title', '{{WRAPPER}} .cta-banner-wrapper .title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Top Text', '{{WRAPPER}} .cta-banner-wrapper .top-text', ['layout_one']);
		grozomart_elementor_style_options($this, 'Description Text', '{{WRAPPER}} .cta-banner-wrapper .text', ['layout_one']);

		grozomart_elementor_style_options($this, 'Cta Line Title', '{{WRAPPER}} .cta-line-wrap-2 .cta-content .title', ['layout_two']);
		grozomart_elementor_style_options($this, 'Cta Line Top Text', '{{WRAPPER}} .cta-line-wrap-2 .cta-content span', ['layout_two']);

		grozomart_elementor_style_options($this, 'Feature Line Title', '{{WRAPPER}} .feature-line-box .title', ['layout_three']);
		grozomart_elementor_style_options($this, 'Feature Line Description', '{{WRAPPER}} .feature-line-box p', ['layout_three']);

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
					'{{WRAPPER}} .theme-btn, a.theme-btn,{{WRAPPER}} a.theme-btn span' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .theme-btn, a.theme-btn' => 'background-color: {{VALUE}};',
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
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} .theme-btn, a.theme-btn',
				'label' => esc_html__(' Typography', 'grozomart-addon'),
			]
		);


		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('call-to-action-one.php');
		include grozomart_get_elementor_template('call-to-action-two.php');
		include grozomart_get_elementor_template('call-to-action-three.php');
	}
}
