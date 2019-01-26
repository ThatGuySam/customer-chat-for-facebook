<?php

/**
 * Customer_Chat_for_Facebook
 *
 * @package   Customer_Chat_for_Facebook
 * @author    Sam Carlton <sam@sam.lc>
 * @copyright 2019 Sam Carlton Creative
 * @license   GPL 2.0+
 * @link      https://samcarlton.com
 */

/**
 * This class contain the Enqueue stuff for the backend
 */
class Ccff_Admin_Settings_Page extends Ccff_Admin_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . CCFF_TEXTDOMAIN . '.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function add_plugin_admin_menu() {
		/*
		 * Add a settings page for this plugin to the Settings menu
		 *
		 * @TODO:
		 *
		 * - Change 'manage_options' to the capability you see fit
		 *   For reference: http://codex.wordpress.org/Roles_and_Capabilities

		 add_options_page( __( 'Page Title', CCFF_TEXTDOMAIN ), CCFF_NAME, 'manage_options', CCFF_TEXTDOMAIN, array( $this, 'display_plugin_admin_page' ) );
		 *
		 */
		/*
		 * Add a settings page for this plugin to the main menu
		 *
		 */
		// add_menu_page( __( 'Customer Chat for Facebook Settings', CCFF_TEXTDOMAIN ), CCFF_NAME, 'manage_options', CCFF_TEXTDOMAIN, array( $this, 'display_plugin_admin_page' ), 'dashicons-hammer', 90 );

		add_options_page( __( 'Customer Chat for Facebook Settings', CCFF_TEXTDOMAIN ), CCFF_NAME, 'manage_options', CCFF_TEXTDOMAIN, array( $this, 'display_plugin_admin_page' ) );
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function display_plugin_admin_page() {
		include_once( CCFF_PLUGIN_ROOT . 'admin/views/admin.php' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since 1.1.0
	 *
	 * @param array $links Array of links.
	 *
	 * @return array
	 */
	public function add_action_links( $links ) {
		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=' . CCFF_TEXTDOMAIN ) . '">' . __( 'Settings', CCFF_TEXTDOMAIN ) . '</a>',
			),
            $links
		);
	}

}
