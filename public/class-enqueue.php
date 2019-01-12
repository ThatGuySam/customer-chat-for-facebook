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
 * This class contain the Enqueue stuff for the frontend
 */
class Ccff_Enqueue extends Ccff_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
		parent::initialize();

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_js_vars' ) );
	}

	/**
	 * Print the PHP var in the HTML of the frontend for access by JavaScript
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public static function enqueue_js_vars() {
		wp_localize_script(
             CCFF_TEXTDOMAIN . '-plugin-script', 'ccff_js_vars', array(
			'alert' => __( 'Hey! You have clicked the button!', CCFF_TEXTDOMAIN ),
		)
		);
	}

}
