<?php

namespace GrozomartToolkit\Helper;

use GrozomartTheme\Classes\Grozomart_Helper as Helper;

class Utility
{
	public function __construct()
	{
		$this->set_image_size();
		add_filter('wpcf7_autop_or_not', '__return_false');

		add_action('grozomart_after_breadcrumb', array($this, 'after_breadcrumb'));

		add_action('init', array($this, 'cpt_support_in_elementor'));

		add_action('wp_ajax_subscribe_user', array($this, 'subscribe_user'));
		add_action('wp_ajax_nopriv_subscribe_user', array($this, 'subscribe_user'));
	}
	public function set_image_size()
	{
		add_image_size('grozomart_blog_90X90', 90, 90, true); //in use
		add_image_size('grozomart_blog_410X270', 410, 270, true); //in use
		add_image_size('grozomart_blog_80X64', 80, 64, true); //in use
		add_image_size('grozomart_blog_100X80', 100, 80, true); //in use
	}

	public function after_breadcrumb()
	{
		$breadcrumb_shape      = Helper::get_option('breadcrumb_shape');
		$breadcrumb_image      = Helper::get_option('breadcrumb_image');
		$sliding_text      = Helper::get_option('sliding_text');

		$class = '';
		if (is_single() || is_search() || is_archive()) {
			$class = 'position-three';
		}
?>
		<div class="page-banner-shapes">
			<?php if (!empty($breadcrumb_shape['url'])) : ?>
				<div class="shape <?php echo esc_attr($class); ?>">
					<img src="<?php echo esc_url($breadcrumb_shape['url']); ?>" alt="<?php echo esc_attr($breadcrumb_shape['alt']); ?>">
				</div>
			<?php endif; ?>
			<?php if (!empty($breadcrumb_image['url']) && (!is_single() && !is_search() && !is_archive())) : ?>
				<div class="banner-image " data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
					<img src="<?php echo esc_url($breadcrumb_image['url']); ?>" alt="<?php echo esc_attr($breadcrumb_image['alt']); ?>">
				</div>
			<?php endif; ?>

			<?php if (!empty($sliding_text)) : ?>
				<span class="marquee-wrap">
					<?php foreach ($sliding_text as  $item) : ?>
						<span class="marquee-inner left">
							<span class="marquee-item"><?php echo esc_html($item['text']); ?></span>
						</span>
					<?php endforeach; ?>
				</span>
			<?php endif; ?>
		</div>
<?php
	}

	public function cpt_support_in_elementor()
	{

		//if exists, assign to $cpt_support var
		$get_cpt = get_option('elementor_cpt_support');
		//check if option DOESN'T exist in db
		if (! $get_cpt) {
			$get_cpt = ['page',  'portfolio'];
			update_option('elementor_cpt_support', $get_cpt);
		}

		//if it DOES exist, but footer is NOT defined
		else if (! in_array('page', $get_cpt)) {
			$get_cpt[] = 'page'; //append to array
			update_option('elementor_cpt_support', $get_cpt); //update database
		} else if (! in_array('portfolio', $get_cpt)) {
			$get_cpt[] = 'portfolio'; //append to array
			update_option('elementor_cpt_support', $get_cpt); //update database
		}
	}

	public function subscribe_user()
	{
		// Mailchimp API credentials
		$apiKey = Helper::get_option('api');
		$listId = Helper::get_option('subscribe_list_id');
		$dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
		$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/';

		$email = sanitize_email($_POST['email']);

		// User data
		$userData = [
			'email_address' => $email,
			'status'        => 'subscribed',
		];

		// Initialize cURL
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));

		// Execute cURL
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		// Check the response code
		if ($httpCode == 200) {
			echo esc_html(Helper::get_option('success_message'));
		} else {
			// Decode the JSON response
			$response = json_decode($result, true);

			// Check if the response contains an error and display a human-readable message
			if ($httpCode == 400 && isset($response['title']) && $response['title'] == 'Member Exists') {
				echo esc_html(Helper::get_option('already_subscribed_message'));
			} else {
				echo esc_html(Helper::get_option('error_message')) .  $response['detail'];
			}
		}

		wp_die(); // End AJAX
	}
}

new Utility();
