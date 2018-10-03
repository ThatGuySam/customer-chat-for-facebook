<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/admin
 * @author     Your Name <email@example.com>
 */
class Customer_Chat_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Customer_Chat    The ID of this plugin.
	 */
	private $Customer_Chat;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Customer_Chat       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Customer_Chat, $version ) {

		$this->Customer_Chat = $Customer_Chat;
		$this->version = $version;

		$this->plugin_settings_tabs['general'] = 'General';
		$this->plugin_settings_tabs['faq'] = 'FAQs';


	}

	/**
	 * Register the Settings page.
	 *
	 * @since    1.0.0
	 */
	public function Customer_Chat_admin_menu() {
		 add_options_page( __('Customer Chat for Facebook', $this->Customer_Chat), __('Customer Chat for Facebook', $this->Customer_Chat), 'manage_options', $this->Customer_Chat, array($this, 'display_plugin_admin_page'));
	}

	/**
	 * Settings - Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function settings_sanitize( $input ) {
		// Initialize the new array that will hold the sanitize values
		$new_input = array();
		if(isset($input)) {
			// Loop through the input and sanitize each of the values
			foreach ( $input as $key => $val ) {
				$new_input[ $key ] = sanitize_text_field( $val );
			}
		}
		return $new_input;
	} // sanitize()

	/**
	 * Renders Settings Tabs
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	function Customer_Chat_render_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->Customer_Chat . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
		}
		echo '</h2>';
	}

	/**
	 * Plugin Settings Link on plugin page
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	function add_settings_link( $links ) {
		$mylinks = array(
			'<a href="' . admin_url( 'options-general.php?page=customer-chat-for-facebook' ) . '">Settings</a>',
		);
		return array_merge( $links, $mylinks );
	}

	/**
	 * Callback function for the admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/customer-chat-for-facebook-admin-display.php';
	}

	/**
	 * Setup Notice
	 *
	 * @since    1.0.0
	 */
	public function setup_notice() {

			$options 	= get_option( $this->Customer_Chat . '_options' );

      // If the Facebook Page ID is not set and we are not on the settings page
			if ( empty( $options['facebook-page-id'] ) && $_GET['page'] !== $this->Customer_Chat ) {
				$site_url = get_site_url();
				echo $this->Customer_Chat;
		    ?>
				    <div class="notice notice-error">
				        <p>Customer Chat for Facebook needs to be setup. <a href="<?php echo $site_url; ?>/wp-admin/options-general.php?page=customer-chat-for-facebook">Setup</a></p>
				    </div>
		    <?php
			}
	}

	/**
	 * Returns plugin for settings page
	 *
	 * @since    	1.0.0
	 * @return 		string    $Customer_Chat       The name of this plugin
	 */
	public function get_plugin() {
		return $this->Customer_Chat;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Customer_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Customer_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Customer_Chat, plugin_dir_url( __FILE__ ) . 'css/customer-chat-for-facebook-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Customer_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Customer_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Customer_Chat, plugin_dir_url( __FILE__ ) . 'js/customer-chat-for-facebook-admin.js', array( 'jquery' ), $this->version, false );

	}

}
