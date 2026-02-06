<?php
/**
 * Plugin Name: WPBits Addons For Elementor
 * Plugin URI: https://wpbits.net/
 * Description: Addons for Elementor Page Builder
 * Version: 1.8.1
 * Author: WPBits
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: wpbits-addons-for-elementor
 * Domain Path: /i18n/languages/
 *
 * @package WPBITS_AFE
  */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WPBITS_AFE_PLUGIN_FILE' ) ) {
	define( 'WPBITS_AFE_PLUGIN_FILE', __FILE__ );
	define( 'WPBITS_AFE_PLUGIN_NAME', "WPBits Addons For Elementor" );
}

// Include the main WPBITS_AFE class.
if ( ! class_exists( 'WPBITS_AFE', false ) ) {
	include_once('class-wpbits.php');
	
	/**
	 * Returns the main instance of WPBITS_AFE.
	 *
	 * @since 1.0
	 * @return WPBITS_AFE
	 */
	function WPBITS_AFE() {  
		return WPBITS_AFE::instance();
	}

	// Global for backwards compatibility.
	$GLOBALS['WPBITS_AFE'] = WPBITS_AFE(); 
}