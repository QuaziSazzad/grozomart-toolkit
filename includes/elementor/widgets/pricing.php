<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Pricing extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-pricing';
	}

	public function get_title()
	{
		return esc_html__('Pricing', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-product-description webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'pricing'];
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

		include grozomart_get_elementor_option('pricing-one-option.php');
		include grozomart_get_elementor_option('pricing-two-option.php');
		include grozomart_get_elementor_option('pricing-three-option.php');
		include grozomart_get_elementor_option('pricing-four-option.php');
		include grozomart_get_elementor_option('pricing-five-option.php');
		include grozomart_get_elementor_option('pricing-six-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		grozomart_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .subtitle', ['layout_one', 'layout_two', 'layout_four', 'layout_five', 'layout_six']);

		grozomart_elementor_style_options($this, 'Pricing Title', '{{WRAPPER}} .pricing-item .title,{{WRAPPER}} .pricing-two-item .title', ['layout_one', 'layout_two', 'layout_four', 'layout_five', 'layout_six']);
		grozomart_elementor_style_options($this, 'Pricing Description', '{{WRAPPER}} .pricing-item .text,{{WRAPPER}} .pricing-two-item .text', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		grozomart_elementor_style_options($this, 'Price', '{{WRAPPER}} .pricing-item .price,{{WRAPPER}} .pricing-two-item .price', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		grozomart_elementor_style_options($this, 'Duration', '{{WRAPPER}} .pricing-item .price .after-text,{{WRAPPER}} .pricing-item.style-four .title-price .price .next,{{WRAPPER}} .pricing-two-item .price .after-text', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);

		grozomart_elementor_style_options($this, 'Badge Color', '{{WRAPPER}} .pricing-item .badge,{{WRAPPER}} .pricing-two-item .badge', ['layout_one', 'layout_four', 'layout_five']);
		grozomart_elementor_style_options($this, 'Badge Background Color', '{{WRAPPER}} .pricing-item .badge,{{WRAPPER}} .pricing-two-item .badge', ['layout_one', 'layout_four', 'layout_five'], 'background-color');

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('pricing-one.php');
		include grozomart_get_elementor_template('pricing-two.php');
		include grozomart_get_elementor_template('pricing-three.php');
		include grozomart_get_elementor_template('pricing-four.php');
		include grozomart_get_elementor_template('pricing-five.php');
		include grozomart_get_elementor_template('pricing-six.php');
	}
}
