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
 * AJAX in the public
 */
class Ccff_Ajax extends Ccff_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'customer_chat_for_facebook_ccff_ajax_initialize', true ) ) {
			return;
		}

		// For not logged user
		add_action( 'wp_ajax_nopriv_your_method', array( $this, 'your_method' ) );
	}

	/**
	 * The method to run on ajax
	 *
	 * @return void
	 */
	public function your_method() {
		$return = array(
			'message' => 'Saved',
			'ID'      => 1,
		);

		wp_send_json_success( $return );
		// wp_send_json_error( $return );
	}

}

