<?php

/**
 *
 * @package   Customer_Chat_for_Facebook
 * @author	  Sam Carlton <sam@sam.lc>
 * @copyright 2018 Sam Carlton Creative
 * @license   GPL 2.0+
 * @link	  https://samcarlton.com
 *
 * Plugin Name:	    Customer Chat for Facebook
 * Plugin URI:		@TODO
 * Description:	    @TODO
 * Version:		    1.1.0
 * Author:			Sam Carlton
 * Author URI:		https://samcarlton.com
 * Text Domain:	    customer-chat-for-facebook
 * License:		    GPL 2.0+
 * License URI:	    http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:	    /languages
 * Requires PHP:	5.6
 * WordPress-Plugin-Boilerplate-Powered: v3.0.0
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

define( 'CCFF_VERSION', '1.1.0' );
define( 'CCFF_TEXTDOMAIN', 'customer-chat-for-facebook' );
define( 'CCFF_NAME', 'Customer Chat for Facebook' );
define( 'CCFF_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'CCFF_PLUGIN_ABSOLUTE', __FILE__ );

/**
 * Load the textdomain of the plugin
 *
 * @return void
 */
function ccff_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), CCFF_TEXTDOMAIN );
	load_textdomain( CCFF_TEXTDOMAIN, trailingslashit( WP_PLUGIN_DIR ) . CCFF_TEXTDOMAIN . '/languages/' . CCFF_TEXTDOMAIN . '-' . $locale . '.mo' );
}

add_action( 'plugins_loaded', 'ccff_load_plugin_textdomain', 1 );
if ( version_compare( PHP_VERSION, '5.6.0', '<' ) ) {
	function ccff_deactivate() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	function ccff_show_deactivation_notice() {
		echo wp_kses_post(
			sprintf(
				'<div class="notice notice-error"><p>%s</p></div>',
				__( '"Plugin Name" requires PHP 5.6 or newer.', CCFF_TEXTDOMAIN )
			)
		);
	}

	add_action( 'admin_init', 'ccff_deactivate' );
	add_action( 'admin_notices', 'ccff_show_deactivation_notice' );

	// Return early to prevent loading the other includes.
	return;
}

require_once( CCFF_PLUGIN_ROOT . 'vendor/autoload.php' );

require_once( CCFF_PLUGIN_ROOT . 'internals/functions.php' );
require_once( CCFF_PLUGIN_ROOT . 'internals/debug.php' );

/**
 * Create a helper function for easy SDK access.
 *
 * @global type $ccff_fs
 * @return object
 */
function ccff_fs() {
	global $ccff_fs;

	if ( !isset( $ccff_fs ) ) {
		require_once( CCFF_PLUGIN_ROOT . 'vendor/freemius/wordpress-sdk/start.php' );
		$ccff_fs = fs_dynamic_init(
			array(
				'id'			 => '',
				'slug'		     => 'customer-chat-for-facebook',
				'public_key'	 => '',
				'is_live'		 => false,
				'is_premium'	 => true,
				'has_addons'	 => false,
				'has_paid_plans' => true,
				'menu'		   => array(
					'slug' => 'customer-chat-for-facebook',
				),
			)
		);


		if ( $ccff_fs->is_premium() ) {
				$ccff_fs->add_filter( 'support_forum_url', 'gt_premium_support_forum_url' );

				function gt_premium_support_forum_url( $wp_org_support_forum_url ) {
					return 'http://your url';
				}
			}
	}

	return $ccff_fs;
}

// Init Freemius.
// ccff_fs();

if ( ! wp_installing() ) {
	add_action( 'plugins_loaded', array( 'Ccff_Initialize', 'get_instance' ) );
}
