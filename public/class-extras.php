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
 * This class contain all the snippet or extra that improve the experience on the frontend
 */
class Ccff_Extras extends Ccff_Base {

	/**
	 * Initialize the snippet
	 */
	public function initialize() {
		parent::initialize();
		add_filter( 'body_class', array( __CLASS__, 'add_ccff_class' ), 10, 3 );
	}

	/**
	 * Add class in the body on the frontend
	 *
	 * @param array $classes The array with all the classes of the page.
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public static function add_ccff_class( $classes ) {
		$classes[] = CCFF_TEXTDOMAIN;
		return $classes;
	}

}
