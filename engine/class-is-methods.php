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
 * Plugin Name Is Methods
 */
class Ccff_Is_Methods {

	/**
	 * What type of request is this?
	 *
	 * @since 1.1.0
	 *
	 * @param  string $type admin, ajax, cron, cli or frontend.
	 * @return bool
	 */
	public function request( $type ) {
		switch ( $type ) {
			case 'admin':
				return $this->is_admin();
			case 'ajax':
				return $this->is_ajax();
			case 'cron':
				return $this->is_cron();
			case 'frontend':
				return $this->is_frontend();
			case 'cli':
				return $this->is_cli();
		}
	}

	/**
	 * Is admin
	 *
	 * @return boolean
	 */
	public function is_admin() {
		return is_user_logged_in() && is_admin();
	}

	/**
	 * Is ajax
	 *
	 * @return boolean
	 */
	public function is_ajax() {
		return ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) || defined( 'DOING_AJAX' );
	}

	/**
	 * Is cron
	 *
	 * @return boolean
	 */
	public function is_cron() {
		return defined( 'DOING_CRON' );
	}

	/**
	 * Is frontend
	 *
	 * @return boolean
	 */
	public function is_frontend() {
		return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' ) && ! defined( 'REST_REQUEST' );
	}

	/**
	 * Is cli
	 *
	 * @return boolean
	 */
	public function is_cli() {
		return defined( 'WP_CLI' ) && WP_CLI;
	}

}
