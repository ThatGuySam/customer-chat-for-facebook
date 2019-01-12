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
 * This class contain all the snippet or extra that improve the experience on the frontend
 */
class Ccff_Extras extends Ccff_Base {

	/**
	 * Initialize the snippet
	 */
	public function initialize() {
		parent::initialize();
		add_filter( 'body_class', array( __CLASS__, 'add_ccff_class' ), 10, 3 );

		add_action( 'wp_footer', array( $this, 'add_fb_html' ) );
	}

	/**
	 * Add class in the body on the frontend
	 *
	 * @param array $classes The array with all the classes of the page.
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public static function add_ccff_class( $classes ) {
		$classes[] = CCFF_TEXTDOMAIN;
		return $classes;
	}

	/**
	 * Add html for the customer chat plugin
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public static function add_fb_html() {
		$facebook_page_id = $this->settings['facebook-page-id'];
		$facebook_app_id = $this->settings['facebook-app-id'];
		$locale = get_locale() ?: 'en_US';

		$attributes = array(
			'page_id' => filter_var($facebook_page_id, FILTER_VALIDATE_INT),
			'ref' => filter_var($this->settings['ref'], FILTER_SANITIZE_ENCODED),
			'theme_color' => &$this->settings['theme_color'],
			'logged_in_greeting' => filter_var($this->settings['logged_in_greeting'], FILTER_SANITIZE_ENCODED),
			'logged_out_greeting' => filter_var($this->settings['$logged_out_greeting'], FILTER_SANITIZE_ENCODED),
			'greeting_dialog_display' => filter_var($this->settings['greeting_dialog_display'], FILTER_SANITIZE_ENCODED),
			'greeting_dialog_delay' => filter_var($this->settings['greeting_dialog_delay'], FILTER_SANITIZE_ENCODED),
		);

		?>
			<script>
				window.fbAsyncInit = function() {
					FB.init({
						appId            : '<?php echo $facebook_app_id; ?>',
						autoLogAppEvents : true,
						xfbml            : true,
						version          : 'v3.2'
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
				<?php foreach ($attributes as $name => $value) {
					if ($value && !empty($value)) echo "$name=\"$value\" ";
				} ?>
			>
			</div>
		<?php
	}
}
