<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Experience extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-experience';
	}

	public function get_title()
	{
		return esc_html__('Experience', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-skill-bar webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'Experience'];
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
				]
			]
		);

		$this->end_controls_section();


		include grozomart_get_elementor_option('experience-one-option.php');

		//General style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Sec Title', '{{WRAPPER}} .sec-title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Section Description', '{{WRAPPER}} .description', ['layout_one']);

		grozomart_elementor_style_options($this, 'Title', '{{WRAPPER}} .content h6', ['layout_one']);
		grozomart_elementor_style_options($this, 'Experience Years', '{{WRAPPER}} .years', ['layout_one']);
		grozomart_elementor_style_options($this, 'Company', '{{WRAPPER}} .company', ['layout_one']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('experience-one.php');
	}
}
