<?php
/**
* Plugin Name: BZR Upsell Popup for WooCommerce
* Plugin URI: https://shopbzr.com/
* Description: Post purchase upsell popup for WooCommerce powered by BZR
* Version: 1.0.3
* Author: Rohail Altaf @ BZR Dev
* Author URI: https://shopbzr.com/
**/


require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/shopbzrdev/upsell-popup-woocommerce/master/plugin.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'bzr-upsell-popup-woocommerce'
);
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  add_action( 'woocommerce_thankyou', 'custom_content_thankyou', 10 );

  function custom_content_thankyou() {
    echo '<script type="text/javascript" src="https://bzr-public-dev.s3.amazonaws.com/upsell-popup-development/index.js"></script>';
    echo '<script type="text/javascript">bzrpopup(location.hostname)</script>';
  }
}