<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Testimonial extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-testimonial';
	}

	public function get_title()
	{
		return esc_html__('Testimonial', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-testimonial webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'testimonial', 'feedback', 'slider'];
	}

	public function get_script_depends()
	{
		return ['swiper'];
	}

	public function get_style_depends()
	{
		return ['swiper'];
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

		include grozomart_get_elementor_option('testimonial-one-option.php');
		include grozomart_get_elementor_option('testimonial-two-option.php');
		// include grozomart_get_elementor_option('testimonial-three-option.php');
		// include grozomart_get_elementor_option('testimonial-four-option.php');
		// include grozomart_get_elementor_option('testimonial-five-option.php');
		// include grozomart_get_elementor_option('testimonial-six-option.php');
		// include grozomart_get_elementor_option('testimonial-seven-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .testimonial-wrapper .sec-title', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Name', '{{WRAPPER}} .client-info .name', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Designation', '{{WRAPPER}} .client-info .info-content p', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Testimonial', '{{WRAPPER}} .testimonial-box-items .text', ['layout_one', 'layout_two']);


		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('testimonial-one.php');
		include grozomart_get_elementor_template('testimonial-two.php');
		// include grozomart_get_elementor_template('testimonial-three.php');
		// include grozomart_get_elementor_template('testimonial-four.php');
		// include grozomart_get_elementor_template('testimonial-five.php');
		// include grozomart_get_elementor_template('testimonial-six.php');
		// include grozomart_get_elementor_template('testimonial-seven.php');
	}
}
