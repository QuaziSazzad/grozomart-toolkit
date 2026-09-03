<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Contact_Info extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-contact-info';
	}

	public function get_title()
	{
		return esc_html__('Contact Info', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-person webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'contact', 'info', 'location'];
	}

	protected function register_controls()
	{

		include grozomart_get_elementor_option('contact-info-one-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Title', '{{WRAPPER}} .get-touch-contact-wrapper .content h2', ['layout_one']);
		grozomart_elementor_style_options($this, 'Description', '{{WRAPPER}} .get-touch-contact-wrapper .content p', ['layout_one']);
		grozomart_elementor_style_options($this, 'Location Title', '{{WRAPPER}} .content-2 h2', ['layout_one']);
		grozomart_elementor_style_options($this, 'Location Address', '{{WRAPPER}} .content-2 p', ['layout_one']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('contact-info-one.php');
	}
}
