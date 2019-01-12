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

$ccff_debug = new WPBP_Debug( __( 'Plugin Name', CCFF_TEXTDOMAIN ) );

function ccff_log( $text ) {
	global $ccff_debug;
	$ccff_debug->log( $text );
}

