<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/public
 * @author     Your Name <email@example.com>
 */
class Customer_Chat_Public {

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
	 * @param      string    $Customer_Chat       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Customer_Chat, $version ) {

		$this->Customer_Chat = $Customer_Chat;
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
		 * defined in Customer_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Customer_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Customer_Chat, plugin_dir_url( __FILE__ ) . 'css/customer-chat-for-facebook-public.css', array(), $this->version, 'all' );

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
		 * defined in Customer_Chat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Customer_Chat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Customer_Chat, plugin_dir_url( __FILE__ ) . 'js/customer-chat-for-facebook-public.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Add Facebook SDK code before body
	 *
	 * @since    1.0.0
	 */
	public function before_body_scripts() {

			$options = get_option( $this->Customer_Chat . '_options' );
			$is_minimized = (isset($options['minimized']) && $options['minimized']);

			$facebook_page_id = $options['facebook-page-id'];
			$facebook_app_id = $options['facebook-app-id'];
			
			$theme_color = &$options['theme_color'];
			$logged_in_greeting = &$options['logged_in_greeting'] ?: null;
			$logged_out_greeting = &$options['logged_out_greeting'] ?: null;
			$greeting_dialog_display = &$options['greeting_dialog_display'] ?: 'hide';
			$greeting_dialog_delay = &$options['greeting_dialog_delay'] ?: null;
			$ref = $options['ref'] ?: 'website';

			$locale = get_locale() ?: 'en_US';

			$attributes = array(
				'page_id' => filter_var($facebook_page_id, FILTER_VALIDATE_INT),
				'greeting_dialog_display' => filter_var($greeting_dialog_display, FILTER_SANITIZE_ENCODED),
				'ref' => filter_var($ref, FILTER_SANITIZE_ENCODED),
			);
			
			// Optional attributes
			if (!empty($theme_color)) $attributes['theme_color'] = $theme_color;
			if (!empty($logged_in_greeting)) $attributes['logged_in_greeting'] = $logged_in_greeting;
			if (!empty($logged_out_greeting)) $attributes['logged_out_greeting'] = $logged_out_greeting;
			if (!empty($greeting_dialog_delay)) $attributes['greeting_dialog_delay'] = $greeting_dialog_delay;
			
		 ?>
			 <script>
				 window.fbAsyncInit = function() {
					 FB.init({
						 appId            : '<?php echo $facebook_app_id; ?>',
						 autoLogAppEvents : true,
						 xfbml            : true,
						 version          : 'v3.1'
					 });
				 };

				 (function(d, s, id){
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) {return;}
						js = d.createElement(s); js.id = id;
						js.src = "https://connect.facebook.net/<?php echo $locale; ?>/sdk/xfbml.customerchat.js";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>

				<div class="fb-customerchat"
					<?php foreach ($attributes as $name => $value): ?>
						<?php echo $name; ?>="<?php echo $value; ?>"
					<?php endforeach; ?>>
				</div>
 			<?php

	}

}
