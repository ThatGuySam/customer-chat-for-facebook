<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Facebook_Customer_Chat
 * @subpackage Facebook_Customer_Chat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Facebook_Customer_Chat
 * @subpackage Facebook_Customer_Chat/public
 * @author     Your Name <email@example.com>
 */
class Facebook_Customer_Chat_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Facebook_Customer_Chat    The ID of this plugin.
	 */
	private $Facebook_Customer_Chat;

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
	 * @param      string    $Facebook_Customer_Chat       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Facebook_Customer_Chat, $version ) {

		$this->Facebook_Customer_Chat = $Facebook_Customer_Chat;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Facebook_Customer_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Facebook_Customer_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Facebook_Customer_Chat, plugin_dir_url( __FILE__ ) . 'css/facebook-customer-chat-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Facebook_Customer_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Facebook_Customer_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Facebook_Customer_Chat, plugin_dir_url( __FILE__ ) . 'js/facebook-customer-chat-public.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Add Facebook SDK code before body
	 *
	 * @since    1.0.0
	 */
	public function before_body_scripts() {

		$options = get_option( $this->Facebook_Customer_Chat . '_options' );

		$facebook_page_id = $options['facebook-page-id'];
		$facebook_app_id = $options['facebook-app-id'];
		$minimized = ($options['minimized']) ? 'true' : 'false';

		 ?>
			 <script>
				 window.fbAsyncInit = function() {
					 FB.init({
						 appId            : '<?php echo $facebook_app_id; ?>',
						 autoLogAppEvents : true,
						 xfbml            : true,
						 version          : 'v2.11'
					 });
				 };

				 (function(d, s, id){
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) {return;}
						js = d.createElement(s); js.id = id;
						js.src = "https://connect.facebook.net/en_US/sdk.js";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<?php var_dump(get_option( $this->Facebook_Customer_Chat . '_options' )); ?>

				<div class="fb-customerchat"
					page_id="<?php echo $facebook_page_id; ?>"
					ref="website"
					minimized="<?php echo $minimized; ?>">
				</div>
 			<?php

	}

}
