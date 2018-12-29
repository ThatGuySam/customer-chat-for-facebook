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
 * This class contain all the snippet or extra that improve the experience on the backend
 */
class Ccff_Admin_Notices extends Ccff_Admin_Base {

	/**
	 * Initialize the snippet
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		/*
		 * Load Wp_Admin_Notice for the notices in the backend
		 *
		 * First parameter the HTML, the second is the css class
		 */
		new WP_Admin_Notice( __( 'Updated Messages', CCFF_TEXTDOMAIN ), 'updated' );
		new WP_Admin_Notice( __( 'Error Messages', CCFF_TEXTDOMAIN ), 'error' );
		/*
		 * Dismissible notice
		 */
		dnh_register_notice( 'my_demo_notice', 'updated', __( 'This is my dismissible notice', CCFF_TEXTDOMAIN ) );
		/*
		 * Review Me notice
		 */
		new WP_Review_Me(
			array(
				'days_after' => 15,
				'type'       => 'plugin',
				'slug'       => CCFF_TEXTDOMAIN,
				'rating'     => 5,
				'message'    => __( 'Review me!', CCFF_TEXTDOMAIN ),
				'link_label' => __( 'Click here to review', CCFF_TEXTDOMAIN ),
			)
		);
		new Yoast_I18n_WordPressOrg_v3(
			array(
				'textdomain'  => CCFF_TEXTDOMAIN,
				'customer_chat_for_facebook' => CCFF_NAME,
				'hook'        => 'admin_notices',
			)
		);
	}

}
