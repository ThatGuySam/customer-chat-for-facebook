<?php

/**
 * Plugin_name
 *
 * @package   Plugin_name
 * @author    Sam Carlton <sam@sam.lc>
 * @copyright 2019 Sam Carlton Creative
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
		// new WP_Admin_Notice( __( 'Updated Messages', CCFF_TEXTDOMAIN ), 'updated' );
		// new WP_Admin_Notice( __( 'Error Messages', CCFF_TEXTDOMAIN ), 'error' );
		/*
		 * Dismissible notice
		 */

		// Setup notice
		$page_id_empty = empty($this->settings['facebook-page-id']);
		$is_not_on_settings_page = ($_GET['page'] !== CCFF_TEXTDOMAIN);
		if ($page_id_empty && $is_not_on_settings_page) {
			dnh_register_notice( 'setup_notice', 'updated', __( 'Customer Chat for Facebook is active <a href="' . admin_url( 'options-general.php?page=' . CCFF_TEXTDOMAIN ) . '">' . __( 'Finish Setup', CCFF_TEXTDOMAIN ) . '</a>', CCFF_TEXTDOMAIN ) );
		}
		/*
		 * Review Me notice
		 */
		// new WP_Review_Me(
		// 	array(
		// 		'days_after' => 15,
		// 		'type'       => 'plugin',
		// 		'slug'       => CCFF_TEXTDOMAIN,
		// 		'rating'     => 5,
		// 		'message'    => __( 'Review me!', CCFF_TEXTDOMAIN ),
		// 		'link_label' => __( 'Click here to review', CCFF_TEXTDOMAIN ),
		// 	)
		// );
		new Yoast_I18n_WordPressOrg_v3(
			array(
				'textdomain'  => CCFF_TEXTDOMAIN,
				'customer_chat_for_facebook' => CCFF_NAME,
				'hook'        => 'admin_notices',
			)
		);
	}

}
