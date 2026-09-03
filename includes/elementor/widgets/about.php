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

class About extends Widget_Base
{
	public function get_name()
	{
		return 'grozomart-about';
	}

	public function get_title()
	{
		return esc_html__('about', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-info-box webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'About'];
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
					'layout_seven' => __('Layout Seven', 'grozomart-toolkit'),
					'layout_eight' => __('Layout Eight', 'grozomart-toolkit'),
					'layout_nine' => __('Layout Nine', 'grozomart-toolkit'),
					'layout_ten' => __('Layout Ten', 'grozomart-toolkit'),
					'layout_eleven' => __('Layout Eleven', 'grozomart-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('about-one-option.php');
		include grozomart_get_elementor_option('about-two-option.php');
		include grozomart_get_elementor_option('about-three-option.php');
		include grozomart_get_elementor_option('about-four-option.php');
		include grozomart_get_elementor_option('about-five-option.php');
		include grozomart_get_elementor_option('about-six-option.php');
		include grozomart_get_elementor_option('about-seven-option.php');
		include grozomart_get_elementor_option('about-eight-option.php');
		include grozomart_get_elementor_option('about-nine-option.php');
		include grozomart_get_elementor_option('about-ten-option.php');
		include grozomart_get_elementor_option('about-eleven-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2, {{WRAPPER}} .sec-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_eleven']);
		grozomart_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .subtitle, {{WRAPPER}} .sub-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_eleven']);
		grozomart_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .summary-text,{{WRAPPER}} .about-content p,{{WRAPPER}} .team-page-left-content p', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_eight', 'layout_ten', 'layout_eleven']);

		grozomart_elementor_style_options($this, 'Content', '{{WRAPPER}} .about-page-about-left-content p', ['layout_nine']);

		grozomart_elementor_style_options($this, 'Check List', '{{WRAPPER}} .list-style-one li, {{WRAPPER}} .list-style-five li', ['layout_two', 'layout_eleven']);

		grozomart_elementor_style_options($this, 'Content Title', '{{WRAPPER}} .ai-content h3', ['layout_six']);
		grozomart_elementor_style_options($this, 'Content Sub Title', '{{WRAPPER}} .ai-content .subtitle', ['layout_six']);
		grozomart_elementor_style_options($this, 'Content Description', '{{WRAPPER}} .ai-content p', ['layout_six']);

		grozomart_elementor_style_options($this, 'Features Title', '{{WRAPPER}} .feature-item-two h5 a,{{WRAPPER}} .service-item-two h5 a, {{WRAPPER}} .about-featured-item h5 a, {{WRAPPER}} .service-item h4 a', ['layout_one', 'layout_three', 'layout_four', 'layout_seven']);
		grozomart_elementor_style_options($this, 'Features Description', '{{WRAPPER}} .feature-item-two p,{{WRAPPER}} .about-two-content p', ['layout_one', 'layout_seven']);
		grozomart_elementor_style_options($this, 'Features Icon', '{{WRAPPER}} .feature-item-two .icon i, {{WRAPPER}} .service-item-two .icon i,{{WRAPPER}} .about-featured-item .icon i, {{WRAPPER}} .service-item .icon i', ['layout_one', 'layout_three', 'layout_four', 'layout_seven']);
		grozomart_elementor_style_options($this, 'Read More', '{{WRAPPER}} .read-more', ['layout_seven']);

		grozomart_elementor_style_options($this, 'Video Title', '{{WRAPPER}} .video-wrap span', ['layout_three']);
		grozomart_elementor_style_options($this, 'Video Description', '{{WRAPPER}} .video-wrap h5', ['layout_three']);

		grozomart_elementor_style_options($this, 'Client Title', '{{WRAPPER}} .trusted-clients-wrap h6', ['layout_four']);
		grozomart_elementor_style_options($this, 'Caption Text', '{{WRAPPER}} .about-three-left-image .clients-satisfied h4, {{WRAPPER}} .years-experience h4, {{WRAPPER}} .team-member h4', ['layout_four']);

		grozomart_elementor_style_options($this, 'Progress Title', '{{WRAPPER}} .circle-progress-item h4,{{WRAPPER}} .circle-progress-item-two h4', ['layout_five', 'layout_ten']);
		grozomart_elementor_style_options($this, 'Progress Number', '{{WRAPPER}} .circle-progress .counting', ['layout_five']);

		grozomart_elementor_style_options($this, 'Proven Expertise Title', '{{WRAPPER}} .proven-area h4', ['layout_five']);
		grozomart_elementor_style_options($this, 'Proven Description', '{{WRAPPER}} .proven-area p', ['layout_five']);


		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_two', 'layout_six', 'layout_eight', 'layout_eleven'],
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn, a.theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'button_hover_bg',
			[
				'label'     => esc_html__('Hover Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'grozomart-addon'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include grozomart_get_elementor_template('about-one.php');
		include grozomart_get_elementor_template('about-two.php');
		include grozomart_get_elementor_template('about-three.php');
		include grozomart_get_elementor_template('about-four.php');
		include grozomart_get_elementor_template('about-five.php');
		include grozomart_get_elementor_template('about-six.php');
		include grozomart_get_elementor_template('about-seven.php');
		include grozomart_get_elementor_template('about-eight.php');
		include grozomart_get_elementor_template('about-nine.php');
		include grozomart_get_elementor_template('about-ten.php');
		include grozomart_get_elementor_template('about-eleven.php');
	}
}
