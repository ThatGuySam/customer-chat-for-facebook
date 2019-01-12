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
 * All the WP pointers.
 */
class Ccff_Pointers extends Ccff_base {

	/**
	 * Initialize the Pointers.
	 *
	 * @since 1.1.0
	 */
	public function initialize() {
        parent::initialize();
		new PointerPlus( array( 'prefix' => CCFF_TEXTDOMAIN ) );
		add_filter( CCFF_TEXTDOMAIN . '-pointerplus_list', array( $this, 'custom_initial_pointers' ), 10, 2 );
	}

	/**
	 * Add pointers.
	 * Check on https://github.com/Mte90/pointerplus/blob/master/pointerplus.php for examples
	 *
	 * @param array $pointers The list of pointers.
	 * @param array $prefix   For your pointers.
	 *
	 * @return mixed
	 */
	public function custom_initial_pointers( $pointers, $prefix ) {
		return array_merge( $pointers, array(
			$prefix . '_contextual_tab' => array(
				'selector'   => '#contextual-help-link',
				'title'      => __( 'Boilerplate Help', CCFF_TEXTDOMAIN ),
				'text'       => __( 'A pointer for help tab.<br>Go to Posts, Pages or Users for other pointers.', CCFF_TEXTDOMAIN ),
				'edge'       => 'top',
				'align'      => 'right',
				'icon_class' => 'dashicons-welcome-learn-more',
			),
		) );
	}

}

new Ccff_Pointers();
