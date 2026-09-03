<?php

namespace GrozomartToolkit\ElementorAddon\Traits;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;

defined('ABSPATH') || exit;

trait Carousel_Helper
{

	/**
	 * Register Carousel Options
	 *
	 * @param  array  $args
	 *
	 * @return void
	 */
	protected function register_carousel_options($args = [])
	{
		$default_args = [
			'condition'        => [],
			'layout_condition' => false,
		];

		$args = wp_parse_args($args, $default_args);

		if ($args['layout_condition']) {
			$args['condition']['layout'] = 'carousel';
		}

		$slides_per_view = range(1, 8);
		$slides_per_view = array_combine($slides_per_view, $slides_per_view);

		$this->start_controls_section(
			'section_carousel_options',
			[
				'label'     => esc_html__('Carousel Options', 'grozomart-toolkit'),
				'condition' => $args['condition'],
			]
		);

		$this->add_control(
			'carousel_direction',
			[
				'label'              => esc_html__('Carousel Direction', 'grozomart-toolkit'),
				'type'               => Controls_Manager::SELECT,
				'default'            => 'horizontal',
				'options'            => [
					'horizontal' => esc_html__('Horizontal', 'grozomart-toolkit'),
					'vertical'   => esc_html__('Vertical', 'grozomart-toolkit'),
				],
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'slides_per_view',
			[
				'type'                 => Controls_Manager::SELECT,
				'options'              => $slides_per_view,
				'label'                => esc_html__('Slides Per View', 'grozomart-toolkit'),
				'widescreen_default'   => ($args['per_view_default']['per_view_desk'] ?? 1),
				'default'              => ($args['per_view_default']['per_view_desk'] ?? 1),
				'laptop_default'       => ($args['per_view_default']['per_view_desk'] ?? 1),
				'tablet_extra_default' => ($args['per_view_default']['per_view_desk'] ?? 1),
				'tablet_default'       => ($args['per_view_default']['per_view_tab'] ?? 1),
				'mobile_extra_default' => ($args['per_view_default']['per_view_tab'] ?? 1),
				'mobile_default'       => ($args['per_view_default']['per_view_mobile'] ?? 1),
				'frontend_available'   => true,
			]
		);

		$this->add_responsive_control(
			'slides_to_scroll',
			[
				'type'                 => Controls_Manager::SELECT,
				'label'                => esc_html__('Slides to Scroll', 'grozomart-toolkit'),
				'description'          => esc_html__('Set how many slides are scrolled per swipe.', 'grozomart-toolkit'),
				'options'              => $slides_per_view,
				'widescreen_default'   => 1,
				'default'              => 1,
				'laptop_default'       => 1,
				'tablet_extra_default' => 1,
				'tablet_default'       => 1,
				'mobile_extra_default' => 1,
				'mobile_default'       => 1,
				'frontend_available'   => true,
			]
		);

		$this->add_control(
			'loop',
			[
				'label'              => esc_html__('Infinite Loop?', 'grozomart-toolkit'),
				'type'               => Controls_Manager::SWITCHER,
				'default'            => 'yes',
				'frontend_available' => true,
				'separator'          => 'before',
			]
		);

		$this->add_control(
			'speed',
			[
				'label'              => esc_html__('Animation Speed', 'grozomart-toolkit'),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 500,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'              => esc_html__('Autoplay?', 'grozomart-toolkit'),
				'type'               => Controls_Manager::SWITCHER,
				'default'            => '',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label'              => esc_html__('Autoplay Speed', 'grozomart-toolkit'),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 5000,
				'condition'          => [
					'autoplay' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label'              => esc_html__('Pause on Hover?', 'grozomart-toolkit'),
				'type'               => Controls_Manager::SWITCHER,
				'default'            => '',
				'condition'          => [
					'autoplay' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'show_dots',
			[
				'type'               => Controls_Manager::SWITCHER,
				'label'              => esc_html__('Dots?', 'grozomart-toolkit'),
				'default'            => '',
				'label_off'          => esc_html__('Hide', 'grozomart-toolkit'),
				'label_on'           => esc_html__('Show', 'grozomart-toolkit'),
				'frontend_available' => true,
				'separator'          => 'before',
			]
		);

		$this->add_control(
			'show_arrows',
			[
				'type'               => Controls_Manager::SWITCHER,
				'label'              => esc_html__('Arrows?', 'grozomart-toolkit'),
				'default'            => '',
				'label_off'          => esc_html__('Hide', 'grozomart-toolkit'),
				'label_on'           => esc_html__('Show', 'grozomart-toolkit'),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'arrow_type',
			[
				'label'       => esc_html__('Arrow Type', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					'icons'      => esc_html__('Icons', 'grozomart-toolkit'),
					'text'       => esc_html__('Text', 'grozomart-toolkit'),
					'text_icons' => esc_html__('Text Icon', 'grozomart-toolkit'),
					'unique_ids' => esc_html__('With Unique ID', 'grozomart-toolkit'),
				],
				'default'     => 'icons',
				'condition'   => [
					'show_arrows' => 'yes',
				],
			]
		);

		$this->add_control(
			'prev_arrow_id',
			[
				'label'              => esc_html__('Prev Arrow ID', 'grozomart-toolkit'),
				'type'               => Controls_Manager::TEXT,
				'label_block'        => false,
				'placeholder'        => esc_html__('Enter Prev Arrow ID', 'grozomart-toolkit'),
				'condition'          => [
					'show_arrows' => 'yes',
					'arrow_type'  => 'unique_ids',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'next_arrow_id',
			[
				'label'              => esc_html__('Next Arrow ID', 'grozomart-toolkit'),
				'type'               => Controls_Manager::TEXT,
				'label_block'        => false,
				'placeholder'        => esc_html__('Enter Next Arrow ID', 'grozomart-toolkit'),
				'frontend_available' => true,
				'condition'          => [
					'show_arrows' => 'yes',
					'arrow_type'  => 'unique_ids',
				],
			]
		);

		$this->add_control(
			'important_note',
			[
				'label'     => esc_html__('Important Note', 'grozomart-toolkit'),
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => esc_html__('Use those IDs as CSS IDs for any element of the page. Please make sure the IDs are unique and only use which elements you want to behave as arrow buttons. This field allows A-Z, a-z, 0-9 & underscore chars without spaces.', 'grozomart-toolkit'),
				'condition' => [
					'show_arrows' => 'yes',
					'arrow_type'  => 'unique_ids',
				],
			]
		);

		$this->add_control(
			'arrow_prev_icon',
			[
				'label'       => esc_html__('Previous Icon', 'grozomart-toolkit'),
				'label_block' => false,
				'type'        => Controls_Manager::ICONS,
				'skin'        => 'inline',
				'default'     => [
					'value'   => 'fas fa-angle-left',
					'library' => 'fa-solid',
				],
				'condition'   => [
					'arrow_type'  => ['icons', 'text_icons'],
					'show_arrows' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_prev_text',
			[
				'label'       => esc_html__('Previous Text', 'grozomart-toolkit'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__('Prev', 'grozomart-toolkit'),
				'condition'   => [
					'arrow_type'  => ['text', 'text_icons'],
					'show_arrows' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_next_icon',
			[
				'label'       => esc_html__('Next Icon', 'grozomart-toolkit'),
				'label_block' => false,
				'type'        => Controls_Manager::ICONS,
				'skin'        => 'inline',
				'default'     => [
					'value'   => 'fas fa-angle-right',
					'library' => 'fa-solid',
				],
				'condition'   => [
					'arrow_type'  => ['icons', 'text_icons'],
					'show_arrows' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow_next_text',
			[
				'label'       => esc_html__('Next Text', 'grozomart-toolkit'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__('Next', 'grozomart-toolkit'),
				'condition'   => [
					'arrow_type'  => ['text', 'text_icons'],
					'show_arrows' => 'yes',
				],
			]
		);

		$this->add_control(
			'center_mode',
			[
				'label'              => esc_html__('Center Mode?', 'grozomart-toolkit'),
				'type'               => Controls_Manager::SWITCHER,
				'default'            => '',
				'frontend_available' => true,
				'separator'          => 'before',
				'condition'          => [
					'carousel_direction' => 'horizontal',
				],
			]
		);

		$this->add_responsive_control(
			'center_padding',
			[
				'label'                => esc_html__('Center Padding', 'grozomart-toolkit'),
				'type'                 => Controls_Manager::SLIDER,
				'size_units'           => ['px', '%'],
				'range'                => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'              => [
					'unit' => 'px',
					'size' => 0,
				],
				'widescreen_default'   => [
					'unit' => 'px',
					'size' => 0,
				],
				'laptop_default'       => [
					'unit' => 'px',
					'size' => 0,
				],
				'tablet_extra_default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'tablet_default'       => [
					'unit' => 'px',
					'size' => 0,
				],
				'mobile_extra_default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'mobile_default'       => [
					'unit' => 'px',
					'size' => 0,
				],
				'condition'            => [
					'carousel_direction' => 'horizontal',
					'center_mode'        => 'yes',
				],
				'frontend_available'   => true,
			]
		);

		$this->add_responsive_control(
			'slider_space',
			[
				'label'      => esc_html__('Space Between', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-active' => '--grid-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register Arrows Options
	 *
	 * @param  array  $args
	 *
	 * @return void
	 */
	protected function register_arrows_options($args = [])
	{
		$default_args = [
			'condition'        => [],
			'layout_condition' => false,
		];

		$args = wp_parse_args($args, $default_args);

		if ($args['layout_condition']) {
			$args['condition']['layout'] = 'carousel';
		}

		$this->start_controls_section(
			'section_navigation_arrow_style',
			[
				'label'     => esc_html__('Navigation: Arrow', 'grozomart-toolkit'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => $args['condition'],
			]
		);

		$this->add_control(
			'arrow_position_toggle',
			[
				'label'        => esc_html__('Position', 'grozomart-toolkit'),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__('None', 'grozomart-toolkit'),
				'label_on'     => esc_html__('Custom', 'grozomart-toolkit'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->start_popover();

		$this->add_control(
			'arrow_position',
			[
				'label'       => esc_html__('Position', 'grozomart-toolkit'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'position-default' => [
						'title' => esc_html__('Normal', 'grozomart-toolkit'),
						'icon'  => 'eicon-justify-space-between-h',
					],
					'same-position-h'  => [
						'title' => esc_html__('Sync Horizontal', 'grozomart-toolkit'),
						'icon'  => 'eicon-align-stretch-h',
					],
					'same-position-v'  => [
						'title' => esc_html__('Sync Vertical', 'grozomart-toolkit'),
						'icon'  => 'eicon-align-stretch-v',
					],
				],
				'default'     => 'position-default',
				'condition'   => [
					'arrow_position_toggle' => 'yes',
				],
				'toggle'      => false,
			]
		);

		$this->add_responsive_control(
			'arrow_position_x',
			[
				'label'      => esc_html__('Horizontal', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows' => '--arrow-h-p: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'arrow_position_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'arrow_position_y',
			[
				'label'      => esc_html__('Vertical', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows' => '--arrow-v-p: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'arrow_position_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'arrow_spacing',
			[
				'label'      => esc_html__('Space Between (px)', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition'  => [
					'arrow_position_toggle' => 'yes',
					'arrow_position!'       => 'position-default',
				],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows' => '--arrow-space: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'arrow_transform_x',
			[
				'label'      => esc_html__('Transform X', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows' => '--transform-x: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'arrow_position_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'arrow_transform_y',
			[
				'label'      => esc_html__('Transform Y', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],

				'range'     => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'   => [
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-arrows' => '--transform-y: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'arrow_position_toggle' => 'yes',
				],
			]
		);

		$this->end_popover();

		$this->add_responsive_control(
			'arrow_width',
			[
				'label'      => esc_html__('Width', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 400,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'arrow_height',
			[
				'label'      => esc_html__('Height', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 400,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'arrow_typography',
				'label'     => esc_html__('Typography', 'grozomart-toolkit'),
				'selector'  => '{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow',
				'condition' => [
					'arrow_type' => ['text', 'text_icons']
				]
			]
		);

		$this->add_control(
			'icon_style_toggle',
			[
				'label'        => esc_html__('Icon', 'grozomart-toolkit'),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__('None', 'grozomart-toolkit'),
				'label_on'     => esc_html__('Custom', 'grozomart-toolkit'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->start_popover();

		$this->add_responsive_control(
			'arrow_icon_size',
			[
				'label'      => esc_html__('Icon Size (px)', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 2,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows i, {{WRAPPER}} .grozomart-carousel-arrows svg' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'icon_style_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'prev_icon_rotate',
			[
				'label'     => esc_html__('Rotate(Prev)', 'grozomart-toolkit'),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .grozomart-prev-arrow i, {{WRAPPER}} .grozomart-prev-arrow svg' => 'transform: rotate({{SIZE}}deg);',
				],
				'condition' => [
					'icon_style_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'next_icon_rotate',
			[
				'label'     => esc_html__('Rotate(Next)', 'grozomart-toolkit'),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .grozomart-next-arrow i, {{WRAPPER}} .grozomart-next-arrow svg' => 'transform: rotate({{SIZE}}deg);',
				],
				'condition' => [
					'icon_style_toggle' => 'yes',
				],
			]
		);

		$this->add_control(
			'icon_weight',
			[
				'label'       => esc_html__('Weight(FontAwesome)', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					''    => esc_html__('Default', 'grozomart-toolkit'),
					'300' => esc_html__('Light', 'grozomart-toolkit'),
					'400' => esc_html__('Regular', 'grozomart-toolkit'),
					'900' => esc_html__('Solid', 'grozomart-toolkit'),
				],
				'selectors'   => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow i' => 'font-weight: {{VALUE}};',
				],
				'condition'   => [
					'icon_style_toggle' => 'yes',
				],
			]
		);

		$this->end_popover();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'arrow_border',
				'selector' => '{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow',
			]
		);

		$this->add_responsive_control(
			'arrow_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'grozomart-toolkit'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'custom'],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
				],
			]
		);

		$this->start_controls_tabs('tabs_arrow',);

		$this->start_controls_tab(
			'tab_arrow_normal',
			[
				'label' => esc_html__('Normal', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'arrow_color',
			[
				'label'     => esc_html__('Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_bg_color',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_arrow_hover',
			[
				'label' => esc_html__('Hover', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'arrow_hover_color',
			[
				'label'     => esc_html__('Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_hover_bg_color',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_hover_border_color',
			[
				'label'     => esc_html__('Border Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'arrow_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-arrows .slick-arrow:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function register_dots_options($args = [])
	{
		$default_args = [
			'condition'        => [],
			'layout_condition' => false,
		];

		$args = wp_parse_args($args, $default_args);

		if ($args['layout_condition']) {
			$args['condition']['layout'] = 'carousel';
		}

		$this->start_controls_section(
			'section_navigation_dots_style',
			[
				'label'     => esc_html__('Navigation: Dots', 'grozomart-toolkit'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => $args['condition'],
			]
		);

		$this->add_control(
			'dots_position_toggle',
			[
				'label'        => esc_html__('Position', 'grozomart-toolkit'),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => esc_html__('None', 'grozomart-toolkit'),
				'label_on'     => esc_html__('Custom', 'grozomart-toolkit'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->start_popover();

		$this->add_control(
			'dots_position',
			[
				'label'       => esc_html__('Position', 'grozomart-toolkit'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'sync-horizontal' => [
						'title' => esc_html__('Sync Horizontal', 'grozomart-toolkit'),
						'icon'  => 'eicon-align-stretch-h',
					],
					'sync-vertical'   => [
						'title' => esc_html__('Sync Vertical', 'grozomart-toolkit'),
						'icon'  => 'eicon-align-stretch-v',
					],
				],
				'default'     => 'sync-horizontal',
				'condition'   => [
					'dots_position_toggle' => 'yes',
				],
				'toggle'      => false,
			]
		);

		$this->add_responsive_control(
			'dots_position_x',
			[
				'label'      => esc_html__('Horizontal', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots' => '--dots-h-p: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'dots_position_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'dots_position_y',
			[
				'label'      => esc_html__('Vertical', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots' => '--dots-v-p: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'dots_position_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'dots_spacing',
			[
				'label'      => esc_html__('Space Between (px)', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition'  => [
					'dots_position_toggle' => 'yes',
				],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots .slick-dots' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'dots_transform_x',
			[
				'label'      => esc_html__('Transform X', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots' => '--transform-x: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'dots_position_toggle' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'dots_transform_y',
			[
				'label'      => esc_html__('Transform Y', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => -2000,
						'max' => 2000,
					],
					'%'  => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots' => '--transform-y: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'dots_position_toggle' => 'yes',
				],
			]
		);

		$this->end_popover();

		$this->add_responsive_control(
			'dots_nav_width',
			[
				'label'      => esc_html__('Width (px)', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots li' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'dots_nav_height',
			[
				'label'      => esc_html__('Height (px)', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots li' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'dots_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'grozomart-toolkit'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'custom'],
				'selectors'  => [
					'{{WRAPPER}} .grozomart-carousel-dots li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('tabs_dots');

		$this->start_controls_tab(
			'tab_dots_normal',
			[
				'label' => esc_html__('Normal', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'dots_nav_color',
			[
				'label'     => esc_html__('Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-dots .slick-dots li' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dots_hover',
			[
				'label' => esc_html__('Hover/Active', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'dots_nav_hover_color',
			[
				'label'     => esc_html__('Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grozomart-carousel-dots .slick-dots li:hover, {{WRAPPER}} .grozomart-carousel-dots .slick-dots li.slick-active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Render Carousel Navigation
	 *
	 * @return void
	 */
	protected function render_carousel_navigation()
	{
		$settings = $this->get_settings_for_display();

		if ('yes' === $settings['show_arrows'] && 'unique_ids' != $settings['arrow_type']): ?>
			<div class="grozomart-carousel-arrows <?php echo esc_attr($settings['arrow_position']) ?>">
				<div class="grozomart-prev-arrow" role="button">
					<?php
					if ($settings['arrow_prev_icon'] && ('icons' != $settings['arrow_type'] || 'text_icons' != $settings['arrow_type'])) {
						Icons_Manager::render_icon($settings['arrow_prev_icon']);
					}

					if ($settings['arrow_prev_text'] && ('text' != $settings['arrow_type'] || 'text_icons' != $settings['arrow_type'])) {
						echo esc_html($settings['arrow_prev_text']);
					}
					?>
				</div>
				<div class="grozomart-next-arrow" role="button">
					<?php
					if ($settings['arrow_next_text'] && ('text' != $settings['arrow_type'] || 'text_icons' != $settings['arrow_type'])) {
						echo esc_html($settings['arrow_next_text']);
					}

					if ($settings['arrow_next_icon'] && ('icons' != $settings['arrow_type'] || 'text_icons' != $settings['arrow_type'])) {
						Icons_Manager::render_icon($settings['arrow_next_icon']);
					}
					?>
				</div>
			</div>
		<?php endif;
		if ('yes' === $settings['show_dots']): ?>
			<div class="grozomart-carousel-dots <?php echo esc_attr($settings['dots_position']) ?>"></div>
<?php endif;
	}
}
