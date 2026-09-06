<?php

/**
 * Plugin Name: Grozomart Toolkit
 * Description: A Helper plugin for all Grozomart WordPress Themes
 * Plugin URI: #
 * Author: Webtend
 * Author URI: http://webtend.net/
 * Version: 1.0.2
 * Text Domain: grozomart-toolkit
 * License: GPL2 or later
 * License URI: http://www.gnu.org/licences/gpl-2.0.html
 */

/**
 * The Main Plugin Class
 */
final class Grozomart_Toolkit
{

	/**
	 * Instance of the class.
	 *
	 * @var Grozomart_Toolkit|null
	 */
	protected static $instance = null;

	/**
	 * Addon Version
	 *
	 * @since 1.0.0
	 * @var string The Plugin version.
	 */
	const version = '1.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the Plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Class Constructor
	 */
	private function __construct()
	{
		$this->define_constants();

		add_action('plugin_loaded', [$this, 'init_plugin']);
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return Grozomart_Toolkit
	 */
	public static function init()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Define the required plugin constants
	 */
	public function define_constants()
	{
		define('GROZOMART_TOOLKIT_VERSION', self::version);
		define('GROZOMART_TOOLKIT_FILE', __FILE__);
		define('GROZOMART_TOOLKIT_PATH', plugin_dir_path(GROZOMART_TOOLKIT_FILE));
		define('GROZOMART_TOOLKIT_URL', plugin_dir_url(GROZOMART_TOOLKIT_FILE));
		define('GROZOMART_TOOLKIT_ASSETS', untrailingslashit(GROZOMART_TOOLKIT_URL . 'assets'));
		define('GROZOMART_TOOLKIT_VENDOR', untrailingslashit(GROZOMART_TOOLKIT_URL . 'assets/vendor'));
		define('GROZOMART_TOOLKIT_INCLUDES', untrailingslashit(GROZOMART_TOOLKIT_PATH . 'includes'));
		define('GROZOMART_TOOLKIT_ELEMENTOR', untrailingslashit(GROZOMART_TOOLKIT_INCLUDES . '/elementor'));
		define('GROZOMART_TOOLKIT_WP_WIDGETS', untrailingslashit(GROZOMART_TOOLKIT_INCLUDES . '/wp-widgets'));
		define('GROZOMART_TOOLKIT_DEMO_PATH', untrailingslashit(GROZOMART_TOOLKIT_INCLUDES . '/demo-config'));
		define('GROZOMART_TOOLKIT_THEME_ASSETS', untrailingslashit(get_template_directory_uri()) . '/assets');
	}

	/**
	 * Load Text-domain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n()
	{
		load_plugin_textdomain('grozomart-toolkit', false, plugin_basename(dirname(__FILE__)) . '/languages');
	}

	/**
	 * Initialize the plugin
	 */
	public function init_plugin()
	{
		if ($this->is_compatible()) {
			$this->include_files();
		}
	}

	/**
	 * Get current theme slug
	 *
	 * @access public
	 * @static
	 *
	 * @return string
	 */
	public static function get_theme_slug()
	{
		return str_replace('-child', '', wp_get_theme()->get('TextDomain'));
	}

	/**
	 * Check Compatible
	 *
	 * @access public
	 * @static
	 *
	 * @return boolean
	 */
	public static function theme_is_compatible()
	{
		$plugin_name = trim(dirname(plugin_basename(__FILE__)));
		$theme_name  = self::get_theme_slug();

		return false !== stripos($plugin_name, $theme_name);
	}

	/**
	 * Check Theme Active OR Not
	 *
	 * @access public
	 * @static
	 *
	 * @return boolean
	 */
	public static function theme_is_active()
	{
		$theme_data = get_option('grozomart_theme_verify', []);
		$active     = true;

		if (is_array($theme_data) && ! empty($theme_data['token'])) {
			$active = true;
		}

		return $active;
	}

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible()
	{
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);

			return false;
		}

		if (! self::theme_is_compatible()) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_theme']);

			return false;
		}

		if (! self::theme_is_active()) {
			return false;
		}

		return true;
	}

	/**
	 * Include required plugin files
	 *
	 * @return void
	 */
	public function include_files()
	{
		include_once GROZOMART_TOOLKIT_INCLUDES . '/library/codestar-framework/codestar-framework.php';
		add_action('after_setup_theme', function () {
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/class-assets.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/class-options.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/class-metaboxes.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/functions.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/post-type/class-portfolio.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/class-maintenance.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/class-admin-menu.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/utility.php';
			include_once GROZOMART_TOOLKIT_INCLUDES . '/helper/class-shop-filter.php';


			if (did_action('elementor/loaded')) {
				include_once GROZOMART_TOOLKIT_ELEMENTOR . '/class-elementor-addon.php';
				include_once GROZOMART_TOOLKIT_INCLUDES . '/template-builder/class-template-builder.php';
			}

			include_once GROZOMART_TOOLKIT_WP_WIDGETS . '/class-widgets-setup.php';
		});

		include_once GROZOMART_TOOLKIT_DEMO_PATH . '/class-demo-config.php';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'grozomart-toolkit'),
			'<strong>' . esc_html__('Grozomart Toolkit', 'grozomart-toolkit') . '</strong>',
			'<strong>' . esc_html__('PHP', 'grozomart-toolkit') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Grozomart theme installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_theme()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			esc_html__('"%1$s" plugin requires Grozomart theme to be installed and activated', 'grozomart-toolkit'),
			'<strong>' . esc_html__('Grozomart Toolkit', 'grozomart-toolkit') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}
}

/**
 * Initializes the main plugin
 *
 * @return Grozomart_Toolkit
 */
function grozomart_toolkit_loading()
{
	return Grozomart_Toolkit::init();
}

grozomart_toolkit_loading();
