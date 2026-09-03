<?php

namespace GrozomartToolkit\TemplateBuilder;

defined('ABSPATH') || exit;

class Template_Frontend
{

	protected static $instance = null;

	protected $is_header;
	protected $header_id;
	protected $is_footer;
	protected $footer_id;
	protected $is_popup;
	protected $popup_id;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Construct functions
	 */
	public function __construct()
	{
		add_action('wp', function () {
			$this->init();

			add_action('grozomart_builder_before_main', [$this, 'header'], 5);

			if ('grozomart_template' !== get_post_type()) {
				add_action('grozomart_builder_after_main', [$this, 'popup'], 5);
			}

			add_action('grozomart_builder_after_main', [$this, 'back_to_top'], 5);

			add_action('grozomart_builder_after_main', [$this, 'footer'], 5);
		});

		add_shortcode('grozomart-tb-block', [$this, 'blocks_shortcode']);
	}

	/**
	 * Get Frontend Template to display
	 *
	 * @return void
	 */
	function init()
	{
		$this->get_settings('footer');
		$this->get_settings('header');
		$this->get_settings('popup');
	}

	function back_to_top()
	{
		$back_to_top = get_post_meta(get_the_ID(), 'grozomart_page_meta', true);
		$back_to_top = isset($back_to_top['back_to_top_page']) ? $back_to_top['back_to_top_page'] : 'default';

		if ('enabled' === $back_to_top) {

?>

			<!-- Scroll Top Button -->
			<button class="scroll-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></button>
			<?php }
	}

	/**
	 * Get frontend Templates
	 *
	 * @param $type
	 *
	 * @return void
	 */
	function get_settings($type)
	{
		$templates = $this->get_template_id($type);
		$template  = ! is_array($templates) ? $templates : $templates[0];

		if ('' !== $template) {
			switch ($type) {
				case 'footer':
					$this->is_footer = true;
					$this->footer_id = $template;
					break;

				case 'header':
					$this->is_header = true;
					$this->header_id = $template;
					break;

				case 'popup':
					$this->is_popup = true;
					$this->popup_id = $template;
					break;
			}
		}
	}

	/**
	 * Get Item ID to display is any
	 *
	 * @param $type
	 *
	 * @return mixed|string
	 */
	public function get_template_id($type)
	{
		$templates = Template_Rule::instance()->get_templates_by_condition();

		foreach ($templates as $item) {
			if ($item['type'] === $type) {
				return $item['id'];
			}
		}

		return '';
	}

	/**
	 * Hook Header template in page
	 *
	 * @return void
	 */
	public function header()
	{
		if ($this->is_header) {
			$this->display('header');
		}
	}

	/**
	 * Hook Footer template in page
	 *
	 * @return void
	 */
	public function footer()
	{
		if ($this->is_footer) {
			$this->display('footer');
		}
	}

	/**
	 * Hook Popup template in page
	 *
	 * @return void
	 */
	public function popup()
	{
		if ($this->is_popup) {
			$this->display('popup');
		}
	}

	/**
	 * Display item
	 *
	 * @param $type
	 *
	 * @return void
	 */
	public function display($type)
	{
		if ($type === 'header') {
			$id = $this->header_id;
			if ($id) {
			?>
				<header class="grozomart-site-header">
					<?php echo self::get_elementor_content($id); ?>
				</header>
			<?php
			}
		}
		if ($type === 'footer') {
			$id = $this->footer_id;
			if ($id) {
			?>
				<footer class="grozomart-site-footer">
					<?php echo self::get_elementor_content($id); ?>
				</footer>
		<?php
			}
		}
		if ($type === 'popup') {
			$id = $this->popup_id;

			if ($id && ! \Elementor\Plugin::$instance->preview->is_preview_mode()) {
				$content = self::get_elementor_content($id);
				self::popup_markup($content, $id);
			}
		}
	}

	/**
	 * Get Elementor content for display
	 *
	 * @param $content_id
	 *
	 * @return string
	 */
	public static function get_elementor_content($content_id)
	{
		$content = '';
		if (\class_exists('\Elementor\Plugin')) {
			$elementor_instance = \Elementor\Plugin::instance();
			$content            = $elementor_instance->frontend->get_builder_content_for_display($content_id, true);
		}

		return $content;
	}

	/**
	 * Popup Markup
	 *
	 * @param $content
	 * @param $id
	 * @param $editing
	 *
	 * @return void
	 */
	public static function popup_markup($content, $id, $editing = false)
	{
		$meta            = get_post_meta($id, 'grozomart_tb_settings', true);
		$wrapper_style   = '';
		$container_style = '';
		$overly_color    = '';
		$close_style     = '';
		$delay           = '';

		if ($editing) {
			$wrapper_class = 'grozomart-popup-wrapper show-popup editing';
		} else {
			$wrapper_class = 'grozomart-popup-wrapper';
		}

		if (is_array($meta)) {
			if ('custom' === $meta['popup_width'] && ! empty($meta['set_popup_width'])) {
				$container_style .= 'width: ' . $meta['set_popup_width']['width'] . 'px;';
			} elseif ('full' === $meta['popup_width']) {
				$container_style .= 'width: 100%;';
			}

			if (! empty($meta['popup_bg_color'])) {
				$container_style .= 'background-color: ' . $meta['popup_bg_color'] . ';';
			}

			if ('custom' === $meta['popup_height'] && ! empty($meta['set_popup_height'])) {
				$container_style .= ' max-height: ' . $meta['set_popup_height']['height'] . 'px;';
			} elseif ('full' === $meta['popup_height']) {
				$container_style .= ' max-height: 100%;';
			}

			if ('center-center' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: center; justify-content: center;';
			} elseif ('center-left' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: center; justify-content: flex-start;';
			} elseif ('center-right' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: center; justify-content: flex-end;';
			} elseif ('bottom-center' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: flex-end; justify-content: center;';
			} elseif ('top-center' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: flex-start; justify-content: center;';
			} elseif ('bottom-left' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: flex-end; justify-content: flex-start;';
			} elseif ('bottom-right' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: flex-end; justify-content: flex-end;';
			} elseif ('top-right' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: flex-start; justify-content: flex-end;';
			} elseif ('top-left' === $meta['popup_position']) {
				$wrapper_style .= 'align-items: flex-start; justify-content: flex-start;';
			}

			if (! empty($meta['popup_overly_color'])) {
				$overly_color .= 'background: ' . $meta['popup_overly_color'] . ';';
			}

			if (! empty($meta['popup_close_color'])) {
				$close_style .= 'color: ' . $meta['popup_close_color'] . ';';
			}

			if (! empty($meta['popup_close_bg'])) {
				$close_style .= ' background: ' . $meta['popup_close_bg'] . ';';
			}

			if (! empty($meta['popup_close_size']['width'])) {
				$close_style .= ' width: ' . $meta['popup_close_size']['width'] . 'px;';
			}

			if (! empty($meta['popup_close_size']['height'])) {
				$close_style .= ' height: ' . $meta['popup_close_size']['height'] . 'px;';
			}

			if (! empty($meta['popup_close_radius'])) {
				$close_style .= ' border-radius: ' . $meta['popup_close_radius'] . 'px;';
			}

			$delay = $meta['popup_delay'];
		}
		?>
		<div class="<?php echo esc_attr($wrapper_class) ?>" style="<?php echo esc_attr($wrapper_style) ?>" data-delay="<?php echo esc_attr($delay) ?>">
			<div class="popup-overly" style="<?php echo esc_attr($overly_color) ?>"></div>
			<div class="popup-container" style="<?php echo esc_attr($container_style) ?>">
				<div class="popup-close" style="<?php echo esc_attr($close_style) ?>"><i class="fal fa-times"></i></div>
				<?php echo $content; ?>
			</div>
		</div>
<?php
	}

	public function blocks_shortcode($atts)
	{
		$attr = shortcode_atts(
			[
				'id' => false,
			],
			$atts
		);

		if ($attr['id']) {
			return self::get_elementor_content($attr['id']);
		}
	}
}

Template_Frontend::instance();
