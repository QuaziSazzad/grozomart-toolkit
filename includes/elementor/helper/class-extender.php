<?php

namespace GrozomartToolkit\ElementorAddon\Helper;

use GrozomartTheme\Classes\Grozomart_Helper;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

defined('ABSPATH') || exit;

class Grozomart_Elementor_Extender
{

	protected static $instance = null;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		add_action('init', [$this, 'update_initial_elementor_kit']);
		add_action('init', [$this, 'update_elementor_kit']);
		add_filter('elementor/fonts/groups', [$this, 'add_theme_font_group']);
		add_filter('elementor/fonts/additional_fonts', [$this, 'add_theme_font']);
		add_filter('update_post_metadata', [$this, 'update_options_from_elementor'], 20, 5);
		add_action('elementor/element/kit/section_global_colors/after_section_end', [$this, 'add_global_control_option']);
		add_action('elementor/element/container/section_layout/after_section_end', [$this, 'register_sticky_controls']);
		add_action('elementor/frontend/container/before_render', [$this, 'render_sticky_html'],);
		add_action('elementor/element/nested-tabs/icon_section_style/after_section_end', [$this, 'register_tab_icon_control']);
		add_action('elementor/element/nested-accordion/section_content_style/after_section_end', [$this, 'register_acc_item_control']);
	}

	public function update_initial_elementor_kit()
	{
		add_option('grozomart_update_initial_kit', 'yes');

		if ('yes' === get_option('grozomart_update_initial_kit')) {
			$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit();

			if (! $kit->get_id()) {
				return;
			}

			$setting_to_update = [
				'container_padding'     => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'space_between_widgets' => [
					'column' => '0',
					'row'    => '0'
				],
				'active_breakpoints'    => [
					'viewport_mobile',
					'viewport_tablet',
					'viewport_tablet_extra',
					'viewport_laptop'
				],
				'system_colors'         => $this->formatted_global_color(),
				'system_typography'     => [
					0 => [
						'_id'                    => 'primary',
						'title'                  => 'Primary',
						'typography_typography'  => '',
						'typography_font_family' => '',
						'typography_font_weight' => '',
					],
					1 => [
						'_id'                    => 'secondary',
						'title'                  => 'Secondary',
						'typography_typography'  => '',
						'typography_font_family' => '',
						'typography_font_weight' => '',
					],
					2 => [
						'_id'                    => 'text',
						'title'                  => 'Text',
						'typography_typography'  => '',
						'typography_font_family' => '',
						'typography_font_weight' => '',
					],
					3 => [
						'_id'                    => 'accent',
						'title'                  => 'Accent',
						'typography_typography'  => '',
						'typography_font_family' => '',
						'typography_font_weight' => '',
					],
				],
				'global_image_lightbox' => '',
			];
			$updated_container = $this->get_updated_container();

			$kit->update_settings(array_merge($updated_container, $setting_to_update));

			\Elementor\Plugin::instance()->files_manager->clear_cache();

			update_option('grozomart_update_initial_kit', 'no');
		}
	}

	public function update_elementor_kit()
	{
		if (get_option('grozomart_update_elementor_kit') === 'yes') {
			$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit();

			if (! $kit->get_id()) {
				return;
			}

			$setting_to_update = [
				'system_colors' => $this->formatted_global_color(),
			];
			$updated_container = $this->get_updated_container();

			$kit->update_settings(array_merge($updated_container, $setting_to_update));

			\Elementor\Plugin::instance()->files_manager->clear_cache();

			update_option('grozomart_update_elementor_kit', 'no');
		}
	}

	public function add_theme_font_group($font_groups)
	{
		$font_groups['grozomart_theme_fonts'] = __('Grozomart Fonts', 'grozomart-toolkit');

		return $font_groups;
	}

	public function add_theme_font($fonts)
	{
		$global_fonts = Grozomart_Helper::get_global_fonts();

		$fonts[$global_fonts['_primary']['font-family']]   = 'grozomart_theme_fonts';
		$fonts[$global_fonts['_secondary']['font-family']] = 'grozomart_theme_fonts';

		return $fonts;
	}

	public function update_options_from_elementor($check, $object_id, $meta_key, $value, $prev_value)
	{
		$kit_id        = get_option('elementor_active_kit');
		$keys_to_check = ['desktop', 'laptop', 'tablet_extra', 'tablet', 'mobile'];

		if ($object_id == $kit_id && $meta_key == '_elementor_page_settings') {
			$options           = get_option('grozomart_options');
			$updated_colors    = $value['system_colors'];
			$to_update         = [];
			$updated_container = [];

			foreach ($updated_colors as $color) {
				$to_update[$color['_id'] . '_color'] = $color['color'];
			}

			foreach ($keys_to_check as $key) {
				$generate_key = ($key === 'desktop') ? 'container_width' : 'container_width_' . $key;
				if (! empty($value[$generate_key]['size'])) {
					$updated_container[$key] = [
						'width' => (int) $value[$generate_key]['size'],
					];
				}
			}

			$to_update['container_max_width'] = $updated_container;

			$updated_options = array_merge($options, $to_update);
			update_option('grozomart_options', $updated_options);
		}

		return $check;
	}

	public function formatted_global_color()
	{
		$global_colors = Grozomart_Helper::get_global_colors();
		$new_array     = [];

		foreach ($global_colors as $key => $value) {
			$new_element = [
				'_id'   => strtolower(substr($key, 1)),
				'title' => $value['title'],
				'color' => $value['value'],
			];

			$new_array[] = $new_element;
		}

		return $new_array;
	}

	public function get_updated_container()
	{
		$container_width   = Grozomart_Helper::get_container_max_width();
		$updated_container = [];

		foreach ($container_width as $key => $value) {
			$generate_key = ($key === 'desktop') ? 'container_width' : 'container_width_' . $key;

			$updated_container[$generate_key] = ['size' => $value];
		}

		return $updated_container;
	}

	public function add_global_control_option($element)
	{
		$element->start_injection(
			[
				'of' => 'custom_colors',
				'at' => 'after',
			]
		);

		$element->add_control(
			'grozomart_global_color_note',
			[
				'type'    => Controls_Manager::NOTICE,
				'content' => esc_html__('Please reload editor panel after updating global colors.', 'grozomart-toolkit')
			]
		);

		$element->end_injection();
	}

	public function register_sticky_controls($element)
	{
		$element->start_controls_section(
			'section_sticky_controls',
			[
				'label' => esc_html__('Grozomart Sticky', 'grozomart-toolkit'),
				'tab'   => Controls_Manager::TAB_ADVANCED,
			]
		);

		$element->add_control(
			'section_sticky_on',
			[
				'label'        => esc_html__('Enable Sticky', 'grozomart-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'description'  => esc_html__('Make the section stick to the top when scrolling. This settings will not work with inner container', 'grozomart-toolkit'),
			]
		);

		$element->add_responsive_control(
			'section_sticky_offset',
			[
				'label'     => esc_html__('Offset', 'grozomart-toolkit'),
				'type'      => Controls_Manager::SLIDER,
				'condition' => [
					'section_sticky_on' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}}.tekprof-sticky-section.tekprof-sticky-active' => 'top: {{SIZE}}px;',
				],
			]
		);

		$element->add_control(
			'section_sticky_bg',
			[
				'label'     => esc_html__('Active Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.tekprof-sticky-section.tekprof-sticky-active' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'section_sticky_on' => 'yes',
				],
			]
		);

		$element->add_responsive_control(
			'section_sticky_padding',
			[
				'label'      => esc_html__('Active Padding', 'grozomart-toolkit'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'custom'],
				'selectors'  => [
					'{{WRAPPER}}.tekprof-sticky-section.tekprof-sticky-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'section_sticky_on' => 'yes',
				],
			]
		);

		$element->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'section_sticky_border',
				'label'    => esc_html__('Border', 'replace-text-domain'),
				'selector' => '{{WRAPPER}}.tekprof-sticky-section.tekprof-sticky-active',
			]
		);

		$element->add_responsive_control(
			'section_sticky_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'grozomart-toolkit'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'custom'],
				'selectors'  => [
					'{{WRAPPER}}.tekprof-sticky-section.tekprof-sticky-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'section_sticky_on' => 'yes',
				],
			]
		);

		$element->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'label'     => esc_html__('Active Box Shadow', 'grozomart-toolkit'),
				'name'      => 'section_sticky_shadow',
				'selector'  => '{{WRAPPER}}.tekprof-sticky-section.tekprof-sticky-active',
				'condition' => [
					'section_sticky_on' => 'yes',
				],
			]
		);

		$element->end_controls_section();
	}

	public function render_sticky_html($element)
	{
		$settings = $element->get_settings_for_display();

		if (! empty($settings['section_sticky_on']) == 'yes') {
			$element->add_render_attribute('_wrapper', 'class', 'tekprof-sticky-section');
		}
	}

	public function register_tab_icon_control($element)
	{
		$element->start_injection(
			[
				'of' => 'icon_spacing',
				'at' => 'after',
			]
		);

		$element->add_responsive_control(
			'grozomart_icon_area_size',
			[
				'label'      => esc_html__('Area Size', 'grozomart-toolkit'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', 'custom'],
				'selectors'  => [
					'{{WRAPPER}} .e-n-tab-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$element->add_responsive_control(
			'grozomart_icon_rotate',
			[
				'label'     => esc_html__('Icon Rotate', 'grozomart-toolkit'),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .e-n-tab-icon i, {{WRAPPER}} .e-n-tab-icon svg' => 'transform: rotate({{SIZE}}deg);',
				],
			]
		);

		$element->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'grozomart_icon_border',
				'label'    => esc_html__('Border', 'grozomart-toolkit'),
				'selector' => '{{WRAPPER}} .e-n-tab-icon',
			]
		);

		$element->add_responsive_control(
			'grozomart_icon_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'grozomart-toolkit'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'custom'],
				'selectors'  => [
					'{{WRAPPER}} .e-n-tab-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$element->end_injection();

		$element->start_injection(
			[
				'of' => 'icon_color',
				'at' => 'after',
			]
		);

		$element->add_control(
			'grozomart_icon_bg',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .e-n-tab-icon' => 'background-color: {{VALUE}}',
				],
			]
		);

		$element->end_injection();

		$element->start_injection(
			[
				'of' => 'icon_color_hover',
				'at' => 'after',
			]
		);

		$element->add_control(
			'grozomart_icon_hover_bg',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} [data-touch-mode="false"] .e-n-tab-title[aria-selected="false"]:hover .e-n-tab-icon' => 'background-color: {{VALUE}}',
				],
			]
		);

		$element->add_control(
			'grozomart_icon_hover_border',
			[
				'label'     => esc_html__('Border Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} [data-touch-mode="false"] .e-n-tab-title[aria-selected="false"]:hover .e-n-tab-icon' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'grozomart_icon_border_border!' => ''
				]
			]
		);

		$element->end_injection();

		$element->start_injection(
			[
				'of' => 'icon_color_active',
				'at' => 'after',
			]
		);

		$element->add_control(
			'grozomart_icon_active_bg',
			[
				'label'     => esc_html__('Background Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .e-n-tab-title[aria-selected=true] .e-n-tab-icon' => 'background-color: {{VALUE}}',
				],
			]
		);

		$element->add_control(
			'grozomart_icon_active_border',
			[
				'label'     => esc_html__('Border Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .e-n-tab-title[aria-selected=true] .e-n-tab-icon' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'grozomart_icon_border_border!' => ''
				]
			]
		);

		$element->end_injection();
	}

	public function register_acc_item_control($element)
	{
		$element->start_controls_section(
			'grozomart_acc_item_style_section',
			[
				'label' => esc_html__('Accordion Item', 'grozomart-toolkit'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$element->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'grozomart_acc_item_border',
				'label'    => esc_html__('Border', 'grozomart-toolkit'),
				'selector' => '{{WRAPPER}} .e-n-accordion-item',
			]
		);

		$element->add_responsive_control(
			'grozomart_acc_item_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'grozomart-toolkit'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'custom'],
				'selectors'  => [
					'{{WRAPPER}} .e-n-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$element->start_controls_tabs('grozomart_acc_item_tabs');

		$element->start_controls_tab(
			'grozomart_acc_item_normal_tab',
			[
				'label' => esc_html__('Normal', 'grozomart-toolkit'),
			]
		);

		$element->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'grozomart_acc_item_bg',
				'types'    => ['classic', 'gradient'],
				'exclude'  => ['image'],
				'selector' => '{{WRAPPER}} .e-n-accordion-item',
			]
		);

		$element->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'grozomart_acc_item_shadow',
				'selector' => '{{WRAPPER}} .e-n-accordion-item',
			]
		);

		$element->end_controls_tab();

		$element->start_controls_tab(
			'grozomart_acc_item_hover_tab',
			[
				'label' => esc_html__('Hover', 'grozomart-toolkit'),
			]
		);

		$element->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'grozomart_acc_item_hover_bg',
				'types'    => ['classic', 'gradient'],
				'exclude'  => ['image'],
				'selector' => '{{WRAPPER}} .e-n-accordion-item:not([open]):hover',
			]
		);

		$element->add_control(
			'grozomart_acc_item_hover_border',
			[
				'label'     => esc_html__('Border Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .e-n-accordion-item:not([open]):hover' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'grozomart_acc_item_border_border!' => ''
				]
			]
		);

		$element->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'grozomart_acc_item_hover_shadow',
				'selector' => '{{WRAPPER}} .e-n-accordion-item:not([open]):hover',
			]
		);

		$element->end_controls_tab();

		$element->start_controls_tab(
			'grozomart_acc_item_active_tab',
			[
				'label' => esc_html__('Active', 'grozomart-toolkit'),
			]
		);

		$element->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'grozomart_acc_item_active_bg',
				'types'    => ['classic', 'gradient'],
				'exclude'  => ['image'],
				'selector' => '{{WRAPPER}} .e-n-accordion-item[open]',
			]
		);

		$element->add_control(
			'grozomart_acc_item_active_border',
			[
				'label'     => esc_html__('Border Color', 'grozomart-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .e-n-accordion-item[open]' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'grozomart_acc_item_border_border!' => ''
				]
			]
		);

		$element->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'grozomart_acc_item_active_shadow',
				'selector' => '{{WRAPPER}} .e-n-accordion-item[open]',
			]
		);

		$element->end_controls_tab();

		$element->end_controls_tabs();

		$element->end_controls_section();
	}
}

Grozomart_Elementor_Extender::instance();
