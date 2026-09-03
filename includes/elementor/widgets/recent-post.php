<?php

namespace GrozomartToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Widget_Base;


class Recent_Post extends Widget_Base
{

	public function get_name()
	{
		return 'tekprof-recent-post';
	}

	public function get_title()
	{
		return esc_html__('Recent Post', 'grozomart-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-posts-grid webtend-logo';
	}

	public function get_categories()
	{
		return ['grozomart_elements'];
	}

	public function get_keywords()
	{
		return ['grozomart', 'toolkit', 'webtend', 'recent', 'blog', 'post'];
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
					// 'layout_three' => __('Layout Three', 'grozomart-toolkit'),
					// 'layout_four' => __('Layout Four', 'grozomart-toolkit'),
					// 'layout_five' => __('Layout Five', 'grozomart-toolkit'),
					// 'layout_six' => __('Layout Six', 'grozomart-toolkit'),
				]
			]
		);

		$this->add_control(
			'post_type',
			[
				'label'       => esc_html__('Post Type', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					'cpt'   => esc_html__('Blog Type', 'grozomart-toolkit'),
					'elementor-field'   => esc_html__('With Elementor', 'grozomart-toolkit'),
				],
				'default'     => 'cpt',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'layout_header_section',
			[
				'label' => __('Header Section', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => 'layout_one'
				]
			]
		);

		$this->add_control(
			'layout_one_title',
			[
				'label' => esc_html__('Title', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add title', 'grozomart-toolkit'),
				'default' => esc_html__('Read Articles News & Blog', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'layout_one_title_tag',
			[
				'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
				'type'        => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'h1' => [
						'title' => esc_html__('H1', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h1',
					],
					'h2' => [
						'title' => esc_html__('H2', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h2',
					],
					'h3' => [
						'title' => esc_html__('H3', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h3',
					],
					'h4' => [
						'title' => esc_html__('H4', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h4',
					],
					'h5' => [
						'title' => esc_html__('H5', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h5',
					],
					'h6' => [
						'title' => esc_html__('H6', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h6',
					],
				],
				'default'     => 'h2',
				'toggle'      => false,
			]
		);

		$this->add_control(
			'layout_one_sub_title',
			[
				'label' => esc_html__('Sub Title', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub title', 'grozomart-toolkit'),
				'default' => esc_html__('Default Sub Title', 'grozomart-toolkit'),
			]
		);


		$this->add_control(
			'layout_one_summary_text',
			[
				'label' => esc_html__('Summary Text', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Summary Text', 'grozomart-toolkit'),
				'default' => esc_html__('Default Summary Text', 'grozomart-toolkit'),
				'condition' => [
					'layout_type' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'layout_one_button_label',
			[
				'label' => esc_html__('Button Label', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('View All', 'grozomart-toolkit'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'layout_one_button_url',
			[
				'label' => esc_html__('Button Url', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('#', 'grozomart-toolkit'),
				'show_external' => false,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'remove_top_space',
			[
				'label'        => esc_html__('Remove Top Space', 'grozomart-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'grozomart-toolkit'),
				'label_off'    => esc_html__('No', 'grozomart-toolkit'),
				'default'      => 'yes',
				'return_value' => 'yes',
				'separator'    => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'widget_content',
			[
				'label' => esc_html__('General', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__('Title Tag', 'grozomart-toolkit'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'h2' => [
						'title' => esc_html__('H2', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h2',
					],
					'h3' => [
						'title' => esc_html__('H3', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h3',
					],
					'h4' => [
						'title' => esc_html__('H4', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h4',
					],
					'h5' => [
						'title' => esc_html__('H5', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h5',
					],
					'h6' => [
						'title' => esc_html__('H6', 'grozomart-toolkit'),
						'icon'  => 'eicon-editor-h6',
					],
				],
				'default'     => 'h4',
				'toggle'      => false,
			]
		);

		$this->add_control(
			'title_word',
			[
				'label'   => esc_html__('Title Length', 'grozomart-toolkit'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label'        => esc_html__('Show Excerpt?', 'grozomart-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'grozomart-toolkit'),
				'label_off'    => esc_html__('No', 'grozomart-toolkit'),
				'default'      => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label'     => esc_html__('Excerpt Word', 'grozomart-toolkit'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 12,
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_read_more',
			[
				'label'        => esc_html__('Show Read More', 'grozomart-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => esc_html__('Yes', 'grozomart-toolkit'),
				'label_off'    => esc_html__('No', 'grozomart-toolkit'),
				'return_value' => 'yes',
				'separator'    => 'before',
			]
		);

		$this->add_control(
			'read_more_text',
			[
				'label'     => esc_html__('Read More Text', 'grozomart-toolkit'),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__('Read More', 'grozomart-toolkit'),
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_thumbnail',
			[
				'label'        => esc_html__('Show Thumbnail?', 'grozomart-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'grozomart-toolkit'),
				'label_off'    => esc_html__('No', 'grozomart-toolkit'),
				'default'      => 'yes',
				'return_value' => 'yes',
				'separator'    => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'post_thumbnail',
				'default'   => 'large',
				'exclude'   => [
					'custom',
				],
				'condition' => [
					'show_thumbnail' => 'yes',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'left_post_content',
			[
				'label' => esc_html__('Left Post', 'grozomart-toolkit'),
				'condition' => [
					'layout_type' => 'layout_five'
				]
			]
		);

		$this->add_control(
			'select_left_post',
			[
				'label'       => esc_html__('Select Left Posts', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => grozomart_select_post(),
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_post_custom_title',
			[
				'label'   => esc_html__('Custom Title', 'grozomart-toolkit'),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Default Title', 'grozomart-toolkit'),
				'description' => esc_html__('Keep empty if you want to use default', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'left_post_custom_summary_text',
			[
				'label'   => esc_html__('Custom Summary Text', 'grozomart-toolkit'),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Default Text', 'grozomart-toolkit'),
				'description' => esc_html__('Keep empty if you want to use default', 'grozomart-toolkit'),
			]
		);

		$this->add_control(
			'left_post_custom_image',
			[
				'label' => esc_html__('Custom Image', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'query_content',
			[
				'label' => esc_html__('Query', 'grozomart-toolkit'),
				'condition' => [
					'post_type' => 'cpt'
				]
			]
		);

		$this->add_control(
			'post_from',
			[
				'label'   => esc_html__('Post From', 'grozomart-toolkit'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'all'           => esc_html__('All Posts', 'grozomart-toolkit'),
					'categories'    => esc_html__('Categories', 'grozomart-toolkit'),
					'specific-post' => esc_html__('Specific Posts', 'grozomart-toolkit'),
				],
				'default' => 'all',
			]
		);

		$this->add_control(
			'post_ids',
			[
				'label'       => esc_html__('Select Posts', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => grozomart_select_post(),
				'multiple'    => true,
				'label_block' => true,
				'condition'   => [
					'post_from' => 'specific-post',
				],
			]
		);

		$this->add_control(
			'cat_slugs',
			[
				'label'       => esc_html__('Select Categories', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => grozomart_select_category(),
				'multiple'    => true,
				'label_block' => true,
				'condition'   => [
					'post_from' => 'categories',
				],
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label'   => esc_html__('Limit Item', 'grozomart-toolkit'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__('Order By', 'grozomart-toolkit'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'ID'     => esc_html__('ID', 'grozomart-toolkit'),
					'author' => esc_html__('Author', 'grozomart-toolkit'),
					'title'  => esc_html__('Title', 'grozomart-toolkit'),
					'date'   => esc_html__('Date', 'grozomart-toolkit'),
					'rand'   => esc_html__('Random', 'grozomart-toolkit'),
				],
				'default' => 'date',
			]
		);

		$this->add_control(
			'sort_order',
			[
				'label'   => esc_html__('Sort Order', 'grozomart-toolkit'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'ASC'  => esc_html__('Ascending', 'grozomart-toolkit'),
					'DESC' => esc_html__('Descending', 'grozomart-toolkit'),
				],
				'default' => 'DESC',
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label'        => esc_html__('Show Pagination', 'grozomart-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => esc_html__('Yes', 'grozomart-toolkit'),
				'label_off'    => esc_html__('No', 'grozomart-toolkit'),
				'return_value' => 'yes',
				'condition'    => [
					'layout_type' => ['layout_two', 'layout_six'],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'custom_elementor_post_list',
			[
				'label' => esc_html__('Post With Elementor ', 'grozomart-toolkit'),
				'condition' => [
					'post_type' => 'elementor-field'
				]
			]
		);

		$layout_one_post_list = new \Elementor\Repeater();

		$layout_one_post_list->add_control(
			'select_post',
			[
				'label'       => esc_html__('Select Post', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => grozomart_select_post('post'),
				'label_block' => true,
			]
		);

		$layout_one_post_list->add_control(
			'title',
			[
				'label' => esc_html__('Custom Title', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
				'default' => esc_html__('Website Development', 'grozomart-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'grozomart-toolkit'),
				'label_block' => true
			]
		);

		$layout_one_post_list->add_control(
			'summary_text',
			[
				'label' => esc_html__('Summary Text', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Summary Text', 'grozomart-toolkit'),
				'default' => esc_html__('Default Summary Text', 'grozomart-toolkit'),
				'description' => esc_html__('Keep empty to use default Summary', 'grozomart-toolkit'),
				'label_block' => true
			]
		);


		$layout_one_post_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_one_post_list',
			[
				'label' => esc_html__('Post List', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_one_post_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_three'],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_four_post_list = new \Elementor\Repeater();

		$layout_four_post_list->add_control(
			'select_post',
			[
				'label'       => esc_html__('Select Post', 'grozomart-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => grozomart_select_post('post'),
				'label_block' => true,
			]
		);

		$layout_four_post_list->add_control(
			'title',
			[
				'label' => esc_html__('Custom Title', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Title', 'grozomart-toolkit'),
				'default' => esc_html__('Website Development', 'grozomart-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'grozomart-toolkit'),
				'label_block' => true
			]
		);


		$layout_four_post_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_four_post_list',
			[
				'label' => esc_html__('Post List', 'grozomart-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_four_post_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_four', 'layout_five', 'layout_six'],
				],
				'title_field' => '{{{ title }}}',
			]
		);


		$this->end_controls_section();

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'grozomart-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		grozomart_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title-area .section-title', ['layout_one']);
		grozomart_elementor_style_options($this, 'Post Title', '{{WRAPPER}} .news-box-items .title a', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Meta', '{{WRAPPER}} .news-box-items .content ul li', ['layout_one', 'layout_two']);
		grozomart_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .news-box-items .content p', ['layout_one', 'layout_two']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include grozomart_get_elementor_template('recent-post-one.php');
		include grozomart_get_elementor_template('recent-post-two.php');
		// include grozomart_get_elementor_template('recent-post-three.php');
		// include grozomart_get_elementor_template('recent-post-four.php');
		// include grozomart_get_elementor_template('recent-post-five.php');
		// include grozomart_get_elementor_template('recent-post-six.php');
	}
}
