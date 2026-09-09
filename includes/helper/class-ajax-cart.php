<?php

namespace GrozomartToolkit\Helper;

defined('ABSPATH') || exit;

/**
 * AJAX add to cart for the toolkit's product widgets.
 *
 * WooCommerce already ships AJAX add to cart: its `wc-add-to-cart` script
 * binds to any button carrying `ajax_add_to_cart`, and our widget templates
 * already add that class via `$product->supports('ajax_add_to_cart')`.
 *
 * Storzen puts that behind its Pro "Cart" module. While the module is off it
 * actively suppresses AJAX site-wide — filtering `woocommerce_product_supports`
 * to report no support, stripping the class out of loop button markup, and
 * enqueueing force-standard-cart.js to force a full page reload. The result is
 * that our cards fall back to `?add-to-cart=ID` navigations.
 *
 * This class undoes that suppression so WooCommerce's own AJAX works again.
 * It deliberately does NOT reimplement add-to-cart: WooCommerce's handler
 * already deals with nonces, stock, cart fragments and the "View cart"
 * message. Storzen's own AJAX path is left untouched, so if the Pro module is
 * ever enabled this steps aside and lets Storzen drive.
 */
class Grozomart_Ajax_Cart
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
		/**
		 * Storzen registers its suppression on `init` at priority 5, so this
		 * has to run after that to be able to remove it.
		 */
		add_action('init', [$this, 'restore_ajax_add_to_cart'], 20);
	}

	/**
	 * Whether Storzen is currently suppressing WooCommerce's AJAX cart.
	 *
	 * When its own AJAX cart is on (Pro), Storzen handles this itself and
	 * nothing here should interfere.
	 */
	protected function storzen_is_suppressing()
	{
		if (!function_exists('storzen_get_cart_option')) {
			return false;
		}

		return 1 != storzen_get_cart_option('ajax_cart', false);
	}

	public function restore_ajax_add_to_cart()
	{
		if (!class_exists('WooCommerce') || !$this->storzen_is_suppressing()) {
			return;
		}

		// Reports every product as not supporting ajax_add_to_cart, which is
		// what makes our templates omit the class.
		remove_filter('woocommerce_product_supports', 'storzen_disable_ajax_support', 10);

		// Strips the class from WooCommerce's own loop button markup.
		remove_filter('woocommerce_loop_add_to_cart_args', 'storzen_disable_wc_ajax_args', 10);
		remove_filter('woocommerce_loop_add_to_cart_link', 'storzen_remove_ajax_add_to_cart_class', 10);

		// Forces a full page reload even where the class survived.
		remove_action('wp_enqueue_scripts', 'storzen_enqueue_force_standard_cart', 999);
		add_action('wp_enqueue_scripts', [$this, 'dequeue_force_standard_cart'], 1000);

		/**
		 * WooCommerce only enqueues wc-add-to-cart when its own AJAX option is
		 * on, and that option is separate from Storzen's. Make sure the script
		 * is present, since it is what actually performs the request.
		 */
		add_action('wp_enqueue_scripts', [$this, 'enqueue_add_to_cart_script'], 20);
	}

	/**
	 * Belt and braces: if the script was already enqueued before the removal
	 * above took effect, drop it so it can't override the AJAX handler.
	 */
	public function dequeue_force_standard_cart()
	{
		if (wp_script_is('storzen-force-standard-cart', 'enqueued')) {
			wp_dequeue_script('storzen-force-standard-cart');
		}
	}

	public function enqueue_add_to_cart_script()
	{
		if (!wp_script_is('wc-add-to-cart', 'enqueued')) {
			wp_enqueue_script('wc-add-to-cart');
		}
	}
}

Grozomart_Ajax_Cart::instance();
