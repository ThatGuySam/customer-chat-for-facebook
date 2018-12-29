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
 * This class contain the Widget stuff
 */
class Ccff_Cron extends Ccff_Base {

	/**
	 * Initialize the class
	 */
	public function initialize() {
		/*
		 * Load CronPlus
		 */
		$args = array(
			'recurrence'       => 'hourly',
			'schedule'         => 'schedule',
			'name'             => 'cronplusexample',
			'cb'               => array( $this, 'cronplus_example' ),
			'plugin_root_file' => 'customer-chat-for-facebook.php',
		);

		$cronplus = new CronPlus( $args );
        // Schedule the event
		$cronplus->schedule_event();
        // Remove the event by the schedule
        $cronplus->clear_schedule_by_hook();
        // Jump the scheduled event
        $cronplus->unschedule_specific_event();
	}

	/**
	 * Cron example
	 *
	 * @param integer $id The ID.
	 *
	 * @return void
	 */
	public function cronplus_example( $id ) {
		echo esc_html( $id );
	}

}

