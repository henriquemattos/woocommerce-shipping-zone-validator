<?php
/**
 * Correios
 *
 * @package WooCommerce_Shipping_Zone_Validator/Classes
 * @since   1.0.0
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_Shipping_Zone_Validator main class.
 */
class WC_Shipping_Zone_Validator {
	public static function init() {
		// enable the use of shortcodes in text widgets.
		add_filter('widget_text', 'do_shortcode');
		// add the shortcode
		add_shortcode('wcshippingzone', array('WC_Shipping_Zone_Validator', 'wcszv_shortcode'));
		// form action called by the front-end.
		add_action('admin_action_wcszv_validate_postcode', array('WC_Shipping_Zone_Validator', 'wcszv_validate_postcode'));
	}
	public static function wcszv_shortcode($atts) {
		$isValidPostcode = false;
		$showNotice = false;
		if (isset($_POST) && isset($_POST['action']) && $_POST['action'] === 'validate-shipping-zone') {
			if (isset($_POST['postcode']) && !empty($_POST['postcode'])) {
				$postcode = $_POST['postcode'];
				$zones = WC_Shipping_Zones::get_zones();
				$showNotice = true;
				if ($zones) {
					foreach($zones as $zone) {
						if ($zone['zone_locations']) {
							foreach($zone['zone_locations'] as $zone_location) {
								if ($zone_location->type === 'postcode') {
									$code = explode('...', $zone_location->code);
									if ($postcode >= $code[0] && $postcode <= $code[1]) {
										$isValidPostcode = true;
									}
								}
							}
						}
					}
				}
			}
		}
		$file = plugin_dir_path(__DIR__) . 'templates/validate-shipping-zone.php';
		if (file_exists($file)) {
			include_once $file;
		}
	}
	public static function wcszv_validate_postcode() {
		// if (!isset($_POST)) {
		// 	return __('Please enter a valid postcode / ZIP.', 'woocommerce');
		// }
		// if (!class_exists('WC_Shipping_Zones')) {
		// 	if ( function_exists( 'get_plugins' ) ) ;{
		// 		$all_plugins  = get_plugins();
		// 		$is_installed = ! empty( $all_plugins['woocommerce/woocommerce.php'] );
		// 	}
		// }
	}
}