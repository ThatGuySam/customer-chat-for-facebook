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
 * This class contain all the snippet or extra that improve the experience on the frontend
 */
class Ccff_Shortcode extends Ccff_Base {

	/**
	 * Initialize the snippet
	 */
	public function initialize() {
		parent::initialize();
        add_shortcode( 'foobar', array( $this, 'foobar_func' ) );
	}

	/**
	 * Shortcode example
	 *
	 * @param array $atts Parameters.
	 *
	 * @since 1.1.0
	 *
	 * @return string
	 */
	public static function foobar_func( $atts ) {
		shortcode_atts(
			array(
				'foo' => 'something',
				'bar' => 'something else',
			), $atts
		);

		return '<span class="foo">foo = ' . $atts[ 'foo' ] . '</span>' .
			'<span class="bar">foo = ' . $atts[ 'bar' ] . '</span>';
	}

}
