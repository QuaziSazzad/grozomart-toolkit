<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Full_Footer extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-full-footer';
	}

	public function get_title()
	{
		return esc_html__('Full Footer', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-footer webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'footer', 'newsletter', 'copyright'];
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
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('full-footer-one-option.php');
		include grozomart_get_elementor_option('full-footer-two-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Newsletter Title', '{{WRAPPER}} .newsletter-content .title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Newsletter Text', '{{WRAPPER}} .newsletter-content .text', ['layout_one']);
		grozomart_elementor_style_options($this, 'Help Title', '{{WRAPPER}} .content-two .title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Help Number', '{{WRAPPER}} .call-info .number', ['layout_one']);
		grozomart_elementor_style_options($this, 'Widget Title', '{{WRAPPER}} .footer-widget-items .widget-head .title', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Widget Links', '{{WRAPPER}} .footer-widget-items .list-area li a', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Copyright Text', '{{WRAPPER}} .footer-bottom-wrapper p', ['layout_one', 'layout_two']);

		grozomart_elementor_style_options($this, 'About Text', '{{WRAPPER}} .footer-widget-items .footer-content .text-1', ['layout_two']);
		grozomart_elementor_style_options($this, 'Location Text', '{{WRAPPER}} .footer-widget-items .footer-content .location', ['layout_two']);
		grozomart_elementor_style_options($this, 'Opening Hours Title', '{{WRAPPER}} .footer-widget-items .footer-content .title-2', ['layout_two']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('full-footer-one.php');
		include grozomart_get_elementor_template('full-footer-two.php');
	}
}
