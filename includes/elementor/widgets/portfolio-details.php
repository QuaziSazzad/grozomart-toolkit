<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Portfolio_Details extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-portfolio-details';
	}

	public function get_title()
	{
		return esc_html__('Portfolio Details', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-product-meta webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'portfolio', 'details'];
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

		include grozomart_get_elementor_option('portfolio-details-one-option.php');
		include grozomart_get_elementor_option('portfolio-details-two-option.php');
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('portfolio-details-one.php');
		include grozomart_get_elementor_template('portfolio-details-two.php');
	}
}
