<?php
/**
 * Plugin Name: WooCommerce Shipping Zone Validator
 * Plugin URI:  https://github.com/henriquemattos/woocommerce-shipping-zone-validator
 * Description: Makes a postcode input available for the clients to validate their ZIP against the Shipping Zones.
 * Version:     1.0.0
 * Author:      Visual Works
 * Author URI:  https://www.visualworks.com.br
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wc-shipping-zone-validator
 * Domain Path: /languages/
 *
 * @package WooCommerce_Shipping_Zone_Validator
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'WC_SHIPPING_ZONE_VALIDATOR_PLUGIN_FILE' ) ) {
	define( 'WC_SHIPPING_ZONE_VALIDATOR_PLUGIN_FILE', __FILE__ );
}

define( 'WC_SHIPPING_ZONE_VALIDATOR_VERSION', '1.0.0' );

// Include the main WooCommerce class.
if ( ! class_exists( 'WC_Shipping_Zone_Validator' ) ) {
    include_once dirname( __FILE__ ) . '/includes/class-wc-shipping-zone-validator.php';
    add_action( 'plugins_loaded', array( 'WC_Shipping_Zone_Validator', 'init' ) );
}