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
 * This class is the base skeleton of the plugin
 */
class Ccff_Admin_Base extends Ccff_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
        if ( is_admin() ) {
            return parent::initialize();
        }

		return false;
	}

}

