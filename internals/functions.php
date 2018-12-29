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
 * Get the settings of the plugin in a filterable way
 *
 * @return array
 */
function ccff_get_settings() {
	return apply_filters( 'ccff_get_settings', get_option( CCFF_TEXTDOMAIN . '-settings' ) );
}
