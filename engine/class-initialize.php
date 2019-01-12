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
 * Customer Chat for Facebook Initializer
 */
class Ccff_Initialize {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * List of class to initialize.
	 *
	 * @var object
	 */
	public $classes = null;

	/**
	 * The Constructor that load the entry classes
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
        $this->is        = new Ccff_Is_Methods();
        $this->classes   = array();
        // $this->classes[] = 'Ccff_PostTypes';
        $this->classes[] = 'Ccff_CMB';
        // $this->classes[] = 'Ccff_Cron';
        // $this->classes[] = 'Ccff_FakePage';
        // $this->classes[] = 'Ccff_Template';
        // $this->classes[] = 'Ccff_Widgets';
        // $this->classes[] = 'Ccff_Rest';
        // $this->classes[] = 'Ccff_Transient';



        if ( $this->is->request( 'admin' ) ) {
            $this->classes[] = 'Ccff_Pointers';
            $this->classes[] = 'Ccff_ContextualHelp';
            $this->classes[] = 'Ccff_Admin_Notices';
			$this->classes[] = 'Ccff_Admin_ImpExp';
			$this->classes[] = 'Ccff_Admin_Settings_Page';
        }

        if ( $this->is->request( 'frontend' ) ) {
            $this->classes[] = 'Ccff_Extras';
        }

        $this->classes = apply_filters( 'ccff_class_instances', $this->classes );

        return $this->load_classes();
    }

    private function load_classes() {
        foreach ( $this->classes as &$class ) {
            $class = apply_filters( strtolower( $class ) . '_instance', $class );
            $temp  = new $class;
            $temp->initialize();
        }
    }

    /**
     * Return an instance of this class.
     *
     * @since 1.1.0
     *
     * @return object A single instance of this class.
     */
    public static function get_instance() {
        // If the single instance hasn't been set, set it now.
        if ( null === self::$instance ) {
            try {
                self::$instance = new self;
            } catch ( Exception $err ) {
                do_action( 'customer_chat_for_facebook_initialize_failed', $err );
                if ( WP_DEBUG ) {
                    throw $err->getMessage();
                }
            }
        }

        return self::$instance;
    }

}
