<?php
/**
 * Plugin Name: EU Cookies Bar
 * Plugin URI: https://villatheme.com/extensions/eu-cookies-bar
 * Description: Simple cookie bar to make your website GDPR(General Data Protection Regulation) compliant(EU Cookie Law) and more.
 * Version: 1.0.3.7
 * Author: VillaTheme
 * Author URI: http://villatheme.com
 * Copyright 2018 VillaTheme.com. All rights reserved.
 * Requires at least: 4.4
 * Tested up to: 5.5
**/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'EU_COOKIES_BAR_VERSION', '1.0.3.7' );
/**
 * Detect plugin. For use on Front End only.
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$init_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "eu-cookies-bar" . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "define.php";
require_once $init_file;

/**
 * Class EU_COOKIES_BAR
 */
class EU_COOKIES_BAR {
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'install' ) );
	}

	/**
	 * When active plugin Function will be call
	 */
	public function install() {
		global $wp_version;
		if ( version_compare( $wp_version, "4.4", "<" ) ) {
			deactivate_plugins( basename( __FILE__ ) ); // Deactivate our plugin
			wp_die( "This plugin requires WordPress version 4.4 or higher." );
		}
	}
}

new EU_COOKIES_BAR();