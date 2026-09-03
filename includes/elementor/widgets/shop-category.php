<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Shop_Category extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-shop-category';
	}

	public function get_title()
	{
		return esc_html__('Shop Category', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-slider-3d webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'shop', 'category', 'slider'];
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
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('shop-category-one-option.php');
		include grozomart_get_elementor_option('shop-category-two-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Category Title', '{{WRAPPER}} .shop-category-items .title', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Product Count Text', '{{WRAPPER}} .shop-category-items .textss', ['layout_two']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('shop-category-one.php');
		include grozomart_get_elementor_template('shop-category-two.php');
	}
}
