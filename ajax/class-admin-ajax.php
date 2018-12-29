<?php

/**
 * Plugin_name
 *
 * @package   Plugin_name
 * @author    Sam Carlton <sam@sam.lc>
 * @copyright 2018 Sam Carlton Creative
 * @license   GPL 2.0+
 * @link      https://samcarlton.com
 */

/**
 * AJAX in the admin
 */
class Ccff_Ajax_Admin extends Ccff_Admin_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'customer_chat_for_facebook_ccff_ajax_admin_initialize', true ) ) {
			return;
		}

		// For logged user
		add_action( 'wp_ajax_your_admin_method', array( $this, 'your_admin_method' ) );
	}

	/**
	 * The method to run on ajax
	 *
	 * @return void
	 */
	public function your_admin_method() {
		$return = array(
			'message' => 'Saved',
			'ID'      => 2,
		);

		wp_send_json_success( $return );
		// wp_send_json_error( $return );
	}

}

