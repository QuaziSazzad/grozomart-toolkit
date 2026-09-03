<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Sponsors extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-sponsors';
	}

	public function get_title()
	{
		return esc_html__('Sponsors', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-slider-album webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'sponsors', 'slider'];
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
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('sponsors-one-option.php');
		include grozomart_get_elementor_option('sponsors-two-option.php');
		include grozomart_get_elementor_option('sponsors-three-option.php');
		include grozomart_get_elementor_option('sponsors-four-option.php');
		include grozomart_get_elementor_option('sponsors-five-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .sec-title,{{WRAPPER}} .client-logo-wrap h6,{{WRAPPER}} .section-title h4,{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('sponsors-one.php');
		include grozomart_get_elementor_template('sponsors-two.php');
		include grozomart_get_elementor_template('sponsors-three.php');
		include grozomart_get_elementor_template('sponsors-four.php');
		include grozomart_get_elementor_template('sponsors-five.php');
	}
}
