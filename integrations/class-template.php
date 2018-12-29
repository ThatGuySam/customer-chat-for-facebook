<?php

/**
 * Customer_Chat_for_Facebook
 *
 * @package   Customer_Chat_for_Facebook
 * @author    Sam Carlton <sam@sam.lc>
 * @copyright 2018 Sam Carlton Creative
 * @license   GPL 2.0+
 * @link      https://samcarlton.com
 */

/**
 * This class contain the Templating stuff for the frontend
 */
class Ccff_Template extends Ccff_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
        parent::initialize();
		// Override the template hierarchy for load /templates/content-demo.php
		add_filter( 'template_include', array( __CLASS__, 'load_content_demo' ) );
	}

	/**
	 * Example for override the template system on the frontend
	 *
	 * @param string $original_template The original templace HTML.
	 *
	 * @since 1.1.0
	 *
	 * @return string
	 */
	public static function load_content_demo( $original_template ) {
		if ( is_singular( 'demo' ) && in_the_loop() ) {
			return wpbp_get_template_part( CCFF_TEXTDOMAIN, 'content', 'demo', false );
		}

		return $original_template;
	}

}
