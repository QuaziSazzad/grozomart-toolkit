<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Widget_Base;

class Features extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-features';
	}

	public function get_title()
	{
		return esc_html__('Features', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-post-navigation webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'features'];
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

		include grozomart_get_elementor_option('features-one-option.php');
		include grozomart_get_elementor_option('features-two-option.php');
		include grozomart_get_elementor_option('features-three-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Feature Text', '{{WRAPPER}} .feature-support-list li', ['layout_one']);
		grozomart_elementor_style_options($this, 'Feature Title', '{{WRAPPER}} .feature-items .content .title', ['layout_two']);
		grozomart_elementor_style_options($this, 'Feature Description', '{{WRAPPER}} .feature-items .content p', ['layout_two']);

		grozomart_elementor_style_options($this, 'Shoping Feature Title', '{{WRAPPER}} .shoping-feature-box-2 .content .title', ['layout_three']);
		grozomart_elementor_style_options($this, 'Shoping Feature Description', '{{WRAPPER}} .shoping-feature-box-2 .content p', ['layout_three']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('features-one.php');
		include grozomart_get_elementor_template('features-two.php');
		include grozomart_get_elementor_template('features-three.php');
	}
}
