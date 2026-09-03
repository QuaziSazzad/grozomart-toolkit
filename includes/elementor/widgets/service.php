<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Service extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-service';
	}

	public function get_title()
	{
		return esc_html__('Services', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-flow webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'section', 'Service'];
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
					'layout_twelve' => __('Layout Twelve', 'grozomart-toolkit'),
					'layout_thirteen' => __('Layout Thirteen', 'grozomart-toolkit'),
					'layout_fourteen' => __('Layout Fourteen', 'grozomart-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include grozomart_get_elementor_option('service-one-option.php');
		include grozomart_get_elementor_option('service-two-option.php');
		include grozomart_get_elementor_option('service-three-option.php');
		include grozomart_get_elementor_option('service-four-option.php');
		include grozomart_get_elementor_option('service-five-option.php');
		include grozomart_get_elementor_option('service-six-option.php');
		include grozomart_get_elementor_option('service-seven-option.php');
		include grozomart_get_elementor_option('service-eight-option.php');
		include grozomart_get_elementor_option('service-nine-option.php');
		include grozomart_get_elementor_option('service-ten-option.php');
		include grozomart_get_elementor_option('service-eleven-option.php');
		include grozomart_get_elementor_option('service-twelve-option.php');
		include grozomart_get_elementor_option('service-thirteen-option.php');
		include grozomart_get_elementor_option('service-fourteen-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2, {{WRAPPER}} .content h4 a, {{WRAPPER}} .sec-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_twelve', 'layout_fourteen']);
		grozomart_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .sub-title', ['layout_one', 'layout_two', 'layout_four', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_twelve', 'layout_fourteen']);
		grozomart_elementor_style_options($this, 'Section Description Text', '{{WRAPPER}} .section-title p, {{WRAPPER}} .services-content-three p, {{WRAPPER}} .why-choose-left-content p', ['layout_one', 'layout_four', 'layout_five', 'layout_nine', 'layout_twelve']);

		grozomart_elementor_style_options($this, 'Service Title', '{{WRAPPER}} .title a,{{WRAPPER}} .service-item .content .title a,{{WRAPPER}} .accordion-item .title, {{WRAPPER}} .content h5 a,{{WRAPPER}} .style-three h4 a,{{WRAPPER}} .top-part h4 a, {{WRAPPER}} .service-item-five h4 a,{{WRAPPER}} .service-two-item h6 a, {{WRAPPER}} .content h4, {{WRAPPER}} .service-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_eleven', 'layout_twelve', 'layout_thirteen', 'layout_fourteen']);

		grozomart_elementor_style_options($this, 'Service Description', '{{WRAPPER}} .feature-item .content p,{{WRAPPER}} .service-item .content p, {{WRAPPER}} .content p, {{WRAPPER}} .style-three p,{{WRAPPER}} .content .bottom-part p,{{WRAPPER}} .service-item-five p,{{WRAPPER}} .service-two-item p, {{WRAPPER}} .service-summary-text', ['layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_eleven', 'layout_twelve', 'layout_thirteen', 'layout_fourteen']);
		grozomart_elementor_style_options($this, 'Service Read More', '{{WRAPPER}} .service-item .content .read-more, {{WRAPPER}} .read-more', ['layout_two', 'layout_four', 'layout_fourteen']);
		grozomart_elementor_style_options($this, 'Service Icon', '{{WRAPPER}} .service-item .content .title a i, {{WRAPPER}} .iconic-box .icon i,{{WRAPPER}} .top-part .icon i,{{WRAPPER}} .icon i', ['layout_two', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_eleven', 'layout_twelve', 'layout_thirteen', 'layout_fourteen']);
		grozomart_elementor_style_options($this, 'Step', '{{WRAPPER}} .step', ['layout_three']);
		grozomart_elementor_style_options($this, 'Read More', '{{WRAPPER}} .read-more', ['layout_five', 'layout_eight']);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_six', 'layout_nine'],
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'grozomart-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
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
				'type'      => \Elementor\Controls_Manager::COLOR,
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
				'type'      => \Elementor\Controls_Manager::COLOR,
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
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
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
		include grozomart_get_elementor_template('service-one.php');
		include grozomart_get_elementor_template('service-two.php');
		include grozomart_get_elementor_template('service-three.php');
		include grozomart_get_elementor_template('service-four.php');
		include grozomart_get_elementor_template('service-five.php');
		include grozomart_get_elementor_template('service-six.php');
		include grozomart_get_elementor_template('service-seven.php');
		include grozomart_get_elementor_template('service-eight.php');
		include grozomart_get_elementor_template('service-nine.php');
		include grozomart_get_elementor_template('service-ten.php');
		include grozomart_get_elementor_template('service-eleven.php');
		include grozomart_get_elementor_template('service-twelve.php');
		include grozomart_get_elementor_template('service-thirteen.php');
		include grozomart_get_elementor_template('service-fourteen.php');
	}
}
