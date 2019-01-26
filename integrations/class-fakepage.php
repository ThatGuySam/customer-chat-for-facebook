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
 * This class contain the Fake Page
 */
class Ccff_FakePage extends Ccff_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
        parent::initialize();
        new Fake_Page(
            array(
            'slug' => 'fake_slug',
            'post_title' => 'Fake Page Title',
            'post_content' => 'This is the fake page content'
            )
        );
    }

}
