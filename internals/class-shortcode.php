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
class Ccff_Shortcode extends Ccff_Base {

	static $add_script;

	/**
	 * Initialize the snippet
	 */
	public function initialize() {
		parent::initialize();
		add_shortcode( 'ccfb_toggle', array( $this, 'handle_shortcode' ) );
		add_action(	'wp_footer'	, array( $this, 'footer_script' ) );
	}

	/**
	 * Shortcode example
	 *
	 * @param array $atts Parameters.
	 *
	 * @since 1.1.0
	 *
	 * @return string
	 */
	public static function handle_shortcode( $passedAttributes ) {
		self::$add_script = true;

		$attributes = shortcode_atts(
			array(
				'class' => '',
				'text' => '',
			),
			$passedAttributes,
			$content = null
		);

		$className = $attributes['class'];
		$text = $attributes['text'];

		$content = $content ?: 'Chat Now';

		ob_start();
			?>
				<button type="button" class="ccff-button <?php echo $className; ?>" onclick="ccfbToggleChat()"><?php echo $text; ?><?php echo $content; ?></button>
			<?php
		$output = ob_get_clean();

		return $output;
	}

	static function footer_script() {
		if ( ! self::$add_script )
			return;
		?>
			<script type="text/javascript">
                // Initial value is off
                var ccfbChatOpen = false;
				window.ccfbToggleChat = function () {
                    // console.log('ccfbChatOpen', ccfbChatOpen)
                    // Load in the corresponding dialog method into our toggle function
                    var toggle = ccfbChatOpen ? FB.CustomerChat.hideDialog : FB.CustomerChat.showDialog;
                    // Run what function gets loaded in
                    toggle();
                    // Reverse ccfbChatOpen value
                    ccfbChatOpen = !ccfbChatOpen;
                }
			</script>
		<?php
	}

}
