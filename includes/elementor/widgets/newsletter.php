<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Newsletter extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-newsletter';
	}

	public function get_title()
	{
		return esc_html__('Newsletter', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-mailchimp webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'newsletter'];
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
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('newsletter-one-option.php');
		include grozomart_get_elementor_option('newsletter-two-option.php');
		include grozomart_get_elementor_option('newsletter-three-option.php');
		include grozomart_get_elementor_option('newsletter-four-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .sec-title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .subtitle', ['layout_one']);
		grozomart_elementor_style_options($this, 'Input Label', '{{WRAPPER}} .section-title p', ['layout_one']);

		grozomart_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .footer-newsletter p', ['layout_two']);


		grozomart_elementor_style_options($this, 'Caption Text One', '{{WRAPPER}} .cta-two-image-part .shape.five', ['layout_one']);
		grozomart_elementor_style_options($this, 'Caption Text One Bg', '{{WRAPPER}} .cta-two-image-part .shape.five', ['layout_one'], 'background-color');
		grozomart_elementor_style_options($this, 'Caption Text Two', '{{WRAPPER}} .cta-two-image-part .shape.six', ['layout_one']);
		grozomart_elementor_style_options($this, 'Caption Text Two Bg', '{{WRAPPER}} .cta-two-image-part .shape.six', ['layout_one'], 'background-color');

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include grozomart_get_elementor_template('newsletter-one.php');
		include grozomart_get_elementor_template('newsletter-two.php');
		include grozomart_get_elementor_template('newsletter-three.php');
		include grozomart_get_elementor_template('newsletter-four.php');
	}
}
