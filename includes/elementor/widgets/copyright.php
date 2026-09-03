<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Copyright extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-copyright';
	}

	public function get_title()
	{
		return esc_html__('Copyright', 'grozomart-toolkit');
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
		return ['grozomart', 'toolkit', 'webtend', 'section', 'copyright'];
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

		include grozomart_get_elementor_option('copyright-one-option.php');
		include grozomart_get_elementor_option('copyright-two-option.php');
		include grozomart_get_elementor_option('copyright-three-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Copyright Text', '{{WRAPPER}} .copyright-text p', ['layout_one', 'layout_two', 'layout_three']);
		grozomart_elementor_style_options($this, 'Nav Text', '{{WRAPPER}} .footer-bottom-nav li a, {{WRAPPER}}  .footer-bottom-menu ul li a', ['layout_one', 'layout_three']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include grozomart_get_elementor_template('copyright-one.php');
		include grozomart_get_elementor_template('copyright-two.php');
		include grozomart_get_elementor_template('copyright-three.php');
	}
}
