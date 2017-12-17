<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'ccfb_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */
 
$plugin_path = plugin_dir_path( dirname( __FILE__ ) ) . 'submodules/CMB2/init.php';

if ( file_exists( $plugin_path ) ) {
	require_once $plugin_path;
}

/**
 * CMB2 Controls settings of plugin
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/admin/cmb2-settings
 */
class Customer_Chat_CMB2_Settings extends Customer_Chat_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Customer_Chat    The ID of this plugin.
	 */
	private $Customer_Chat;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $Customer_Chat       The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $Customer_Chat ) {
		$this->Customer_Chat = $Customer_Chat;
		$this->id							= $this->Customer_Chat . '_options';
		$this->option_key			= $this->Customer_Chat . '_options';
		$this->label = __( 'Customer Chat for Facebook', 'woocommerce' );
	}

	/**
	 * Creates our settings sections with fields etc.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function settings_api_init() {
		$this->settings_post_api_init();
	}
	
	/**
	 * Creates our settings sections with fields etc.
	 *
	 * @since    1.0.4
	 * @access   public
	 */
	public function get_old_option($option_name) {
		$options 	= get_option( $this->Customer_Chat . '_options' );
		$option = $options[$option_name];
	}
	
	/**
	 * A helper function to get an option from a CMB2 options array
	 *
	 * @since  1.0.4
	 * @param  string $option_key Option key
	 * @param  string $field_id   Option array field key
	 * @param  mixed  $default    Optional default fallback value
	 * @return array               Options array or specific field
	 */
	public function  cmb2_get_option( $field_id = '', $default = false ) {
		return CMB2_Options::get( $this->option_key )->get( $field_id, $default );
	}

	/**
	 * Creates post settings sections with fields etc.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function settings_post_api_init() {
      
      $is_showing_on_all_pages = $this->cmb2_get_option('show-on-all-pages', 'true');// isset($options['show-on-all-pages']) ? $options['show-on-all-pages'] : false;
      
      var_dump($is_showing_on_all_pages);
      // die();
      
      if ($is_showing_on_all_pages !== 'true') {
        $cmb_single_options = new_cmb2_box( array(
  				'id'           => $this->Customer_Chat . '_page_options',
  				'title'        => esc_html__( 'Customer Chat for Facebook', 'cmb2' ),
  				'object_types' => array( 
            'page', 
            'post'
          ),
          'context' => 'side',
          'priority' => 'low',
        ) );
        
        /**
  			 * Show on page
  			 */
        $cmb_single_options->add_field( array(
  				'name'    => esc_html__( 'Is showing', 'cmb2' ),
  				'desc'    => '
    				Determines if the chat should be shown. 
  				',
  				'id'      => $this->Customer_Chat . '_show',
  				'type'    => 'checkbox',
  				'default' => false,
  			) );
        
      }
			
			/**
			 * Registers options page menu item and form.
			 */
			$cmb_options = new_cmb2_box( array(
				'id'           => $this->option_key,
				'title'        => esc_html__( 'Customer Chat for Facebook', 'cmb2' ),
				'object_types' => array( 'options-page' ),

				/*
				 * The following parameters are specific to the options-page box
				 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
				 */

				'option_key'      => $this->option_key, // The option key and admin menu page slug.
				'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
				// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
				'parent_slug'     => 'options-general.php', // Make options page a submenu item of the themes menu.
				// 'capability'      => 'manage_options', // Cap required to view options-page.
				// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
				// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
				// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
				// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
				// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
				// 'message_cb'      => 'ccfb_options_page_message_callback',
			) );
			
			/**
			 * About message
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'About', 'cmb2' ),
				'desc'    => '
					<div class="inside">
						<p>Be sure that you go through the plugin setup to make sure everything is working as intended.</p>
						<a href="https://www.youtube.com/watch?v=iwofbP1EnrE" target="_blank"><strong>2 minute Setup Video</strong></a>
						<br />
						<a href="https://samcarlton.com/customer-chat-for-facebook" target="_blank"><strong>Support</strong></a>
					</div>
				',
				'id'      => 'intro',
				'type'    => 'text',
				'attributes'  => array(
					'disabled'    => 'disabled',
					'class'				=> 'hidden'
				),
			) );
			
			/**
			 * Facebook Page ID
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Facebook Page ID', 'cmb2' ),
				'desc'    => '
	      	Facebook ID of page to message
	      	<a href="https://findmyfbid.com/" target="_blank">Get it</a>
				',
				'id'      => 'facebook-page-id',
				'type'    => 'text',
				'default' => '',
			) );
      
      /**
			 * Facebook App ID
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Facebook App ID', 'cmb2' ),
				'desc'    => '
					Facebook App ID to identify this website for Facebook
					<a href="https://developers.facebook.com/apps/" target="_blank">Create a new App</a>
				',
				'id'      => 'facebook-app-id',
				'type'    => 'text',
				'default' => '735243603333999',
			) );
      
      /**
			 * Referral
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Referral', 'cmb2' ),
				'desc'    => '
					Optional. Custom string passed to your webhook in messaging_postbacks and messaging_referrals events.
					<a href="https://developers.facebook.com/docs/messenger-platform/reference/webhook-events/messaging_referrals" target="_blank">More info</a>
				',
				'id'      => 'ref',
				'type'    => 'text',
				'default' => 'website',
			) );
			
			/**
			 * Minimized
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Is Minimized', 'cmb2' ),
				'desc'    => '
  				Messenger shows a welcome message. <a href="https://i.imgur.com/5zknx0Y.png" target="_blank">What is the difference?</a>
					<br />
					*Keep in mind that after the user minimizes it, it will stay minimized regardless of this setting.
				',
				'id'      => 'minimized',
				'type'    => 'checkbox',
				'default' => false,
			) );
      
      /**
			 * Show on all pages
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Is showing on all pages', 'cmb2' ),
				'desc'    => '
  				Determines if the chat should be shown on all pages. 
					<br />
					When checked: A new option will appear on each page to add the chat and will be off by default. 
				',
				'id'      => 'show-on-all-pages',
        'type'    => 'select',
        'show_option_none' => false,
        'default'          => 'true',
        'options'          => array(
          'true' => __( 'Yes', 'cmb2' ),
          'false'   => __( 'No', 'cmb2' ),
        ),
			) );
			
			
			/**
			 * Language
			 */
			$cmb_options->add_field( array(
				'name'    => esc_html__( 'Language', 'cmb2' ),
				'desc'    => '
          <input type="text" class="regular-text" name="language" id="facebook-page-id" value="'.get_locale().'" readonly>
          <br />
					This uses whatever language Wordpress is set to.
					<br />
					<a href="'.get_site_url().'/wp-admin/options-general.php#default_role">Set Site Language</a>
				',
				'id'      => 'language',
				'type'    => 'text',
				'default'	=> get_locale(),
				'attributes'  => array(
          'readonly'    => 'readonly',
          'class'    => 'hidden',
				),
			) );
	}

}
