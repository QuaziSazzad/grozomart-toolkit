<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Shop_Banner extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-shop-banner';
	}

	public function get_title()
	{
		return esc_html__('Shop Banner', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-banner webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'shop', 'banner'];
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

		include grozomart_get_elementor_option('shop-banner-one-option.php');
		include grozomart_get_elementor_option('shop-banner-two-option.php');
		include grozomart_get_elementor_option('shop-banner-three-option.php');
		include grozomart_get_elementor_option('shop-banner-four-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Title', '{{WRAPPER}} .shop-banner-items .content .title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Sub Title', '{{WRAPPER}} .shop-banner-items .content span', ['layout_one']);
		grozomart_elementor_style_options($this, 'Description Text', '{{WRAPPER}} .shop-banner-items .content p', ['layout_one']);

		grozomart_elementor_style_options($this, 'Best Day Title', '{{WRAPPER}} .best-day-banner .content h2', ['layout_two']);
		grozomart_elementor_style_options($this, 'Best Day Sub Title', '{{WRAPPER}} .best-day-banner .content .subs', ['layout_two']);
		grozomart_elementor_style_options($this, 'Best Day Description', '{{WRAPPER}} .best-day-banner .content .text', ['layout_two']);

		grozomart_elementor_style_options($this, 'Banner Title', '{{WRAPPER}} .banner-left-box-2 .content .title, {{WRAPPER}} .banner-right-box-2 .content .title', ['layout_three']);
		grozomart_elementor_style_options($this, 'Banner Title 2', '{{WRAPPER}} .banner-left-box-2 .content .title-2, {{WRAPPER}} .banner-right-box-2 .content .title-2', ['layout_three']);

		grozomart_elementor_style_options($this, 'Banner Title', '{{WRAPPER}} .shop-banner-twos .content .title', ['layout_four']);
		grozomart_elementor_style_options($this, 'Banner Price Text', '{{WRAPPER}} .shop-banner-twos .content p', ['layout_four']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('shop-banner-one.php');
		include grozomart_get_elementor_template('shop-banner-two.php');
		include grozomart_get_elementor_template('shop-banner-three.php');
		include grozomart_get_elementor_template('shop-banner-four.php');
	}
}
