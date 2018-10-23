<?php

/**
 * Shortcode for chat button
 *
 * @link       http://example.com
 * @since      1.0.3.3
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/public/partials
 */



class CCFBButtonShortcode {
	static $add_script;
	static function init() {
        add_shortcode('ccfb_toggle', array(__CLASS__, 'handle_shortcode'));
        // add_action('init', array(__CLASS__, 'register_script'));
		// add_action('wp_footer', array(__CLASS__, 'print_script'));
		add_action('wp_footer', array(__CLASS__, 'footer_script') );
	}
	static function handle_shortcode($atts, $content = null) {
        self::$add_script = true;

        // Default attribute values
        $defaults = array(
            'class' => "",
            'text' => ''
        );

        // Load in attributes
        $attributes = shortcode_atts($defaults, $atts, 'ccfb_toggle');

        $className = $attributes['class'];
        $text = $attributes['text'];


        $content = $content ?: 'Chat Now';
    
		ob_start();
            ?>
                <button type="button" class="ccfb-button <?php echo $className; ?>" onclick="ccfbToggleChat()"><?php echo $text; ?><?php echo $content; ?></button>
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
CCFBButtonShortcode::init();