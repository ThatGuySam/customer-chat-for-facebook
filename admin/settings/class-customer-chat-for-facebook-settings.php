<?php

/**
 * Controls settings of plugin
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/admin/settings
 */
class Customer_Chat_Settings extends Customer_Chat_Admin {

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
		$this->id    = 'general';
		$this->label = __( 'General', 'woocommerce' );
		$this->Customer_Chat = $Customer_Chat;
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
	 * Creates post settings sections with fields etc.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function settings_post_api_init() {

		// Example usage:
		// register_setting( $option_group, $option_name, $settings_sanitize_callback );
		register_setting(
			$this->Customer_Chat . '_options',
			$this->Customer_Chat . '_options',
			array( $this, 'settings_sanitize' )
		);

		// Example usage:
		// add_settings_section( $id, $title, $callback, $menu_slug );
		add_settings_section(
			$this->Customer_Chat . '-display-options', // section
			apply_filters( $this->Customer_Chat . '-display-section-title', __( '', $this->Customer_Chat ) ),
			array( $this, 'display_options_section' ),
			$this->Customer_Chat
		);

		// Example usage:
		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

    add_settings_field(
			'facebook-page-id',
			apply_filters( $this->Customer_Chat . '-facebook-page-id-label', __( 'Facebook Page ID', $this->Customer_Chat ) ),
			array( $this, 'facebook_page_id' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);

    add_settings_field(
			'facebook-app-id',
			apply_filters( $this->Customer_Chat . '-facebook-app-id-label', __( 'Facebook App ID', $this->Customer_Chat ) ),
			array( $this, 'facebook_app_id' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
		
		add_settings_field(
			'theme_color',
			apply_filters( $this->Customer_Chat . '-theme_color-label', __( 'Color', $this->Customer_Chat ) ),
			array( $this, 'theme_color' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
		
		add_settings_field(
			'logged_in_greeting',
			apply_filters( $this->Customer_Chat . '-logged_in_greeting-label', __( 'Logged in Greeting', $this->Customer_Chat ) ),
			array( $this, 'logged_in_greeting' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
		
		add_settings_field(
			'logged_out_greeting',
			apply_filters( $this->Customer_Chat . '-logged_out_greeting-label', __( 'Logged out Greeting', $this->Customer_Chat ) ),
			array( $this, 'logged_out_greeting' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
		
		add_settings_field(
			'greeting_dialog_display',
			apply_filters( $this->Customer_Chat . '-greeting_dialog_display-label', __( 'Greeting Dialog Display', $this->Customer_Chat ) ),
			array( $this, 'greeting_dialog_display_options_field' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
		
		add_settings_field(
			'greeting_dialog_delay',
			apply_filters( $this->Customer_Chat . '-greeting_dialog_delay-label', __( 'Greeting Dialog Delay', $this->Customer_Chat ) ),
			array( $this, 'greeting_dialog_delay' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
		
		add_settings_field(
			'ref',
			apply_filters( $this->Customer_Chat . '-ref-label', __( 'Reference', $this->Customer_Chat ) ),
			array( $this, 'ref' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);

		add_settings_field(
			'language',
			apply_filters( $this->Customer_Chat . '-language-label', __( 'Language', $this->Customer_Chat ) ),
			array( $this, 'language_options_field' ),
			$this->Customer_Chat,
			$this->Customer_Chat . '-display-options' // section to add to
		);
	}

	/**
	 * Creates a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function display_options_section( $params ) {

		echo '<p>' . $params['title'] . '</p>';

	} // display_options_section()

  /**
   * Facebook Page ID
   *
   * @since 		1.0.0
   * @return 		mixed 			The settings field
   */
  public function facebook_page_id() {

    $options 	= get_option( $this->Customer_Chat . '_options' );
    $option 	= '';

    if ( ! empty( $options['facebook-page-id'] ) ) {
      $option = $options['facebook-page-id'];
    }

    ?><input type="text" id="<?php echo $this->Customer_Chat; ?>_options[facebook-page-id]" name="<?php echo $this->Customer_Chat; ?>_options[facebook-page-id]" value="<?php echo $option; ?>" />
    <p class="description">
      Facebook ID of page to message
      <a href="https://findmyfbid.com/" target="_blank">Get it</a>
    </p> <?php
  } // facebook_page_id()

  /**
   * Facebook App ID
   *
   * @since 		1.0.0
   * @return 		mixed 			The settings field
   */
  public function facebook_app_id() {

    $options 	= get_option( $this->Customer_Chat . '_options' );
    $option 	= '735243603333999';

    if ( ! empty( $options['facebook-app-id'] ) ) {
      $option = $options['facebook-app-id'];
    }

    ?><input type="text" id="<?php echo $this->Customer_Chat; ?>_options[facebook-app-id]" name="<?php echo $this->Customer_Chat; ?>_options[facebook-app-id]" value="<?php echo $option; ?>" />
    <p class="description">
      Facebook App ID to identify this website for Facebook
      <a href="https://developers.facebook.com/apps/" target="_blank">Create a new App</a>
    </p> <?php
  } // facebook_page_id()
	
	
	/**
   * Theme Color
   *
   * @since 		1.0.0
   * @return 		mixed 			The settings field
   */
  public function theme_color() {

    $options 	= get_option( $this->Customer_Chat . '_options' );
    $option 	= '';

    if ( ! empty( $options['theme_color'] ) ) {
      $option = $options['theme_color'];
    }

    ?><input type="color" id="<?php echo $this->Customer_Chat; ?>_options[theme_color]" name="<?php echo $this->Customer_Chat; ?>_options[theme_color]" value="<?php echo $option; ?>" />
    <p class="description">
      The color to use as a theme for the plugin, including the background color of the customer chat plugin icon and the background color of any messages sent by users. Supports any hexadecimal color code with a leading number sign (e.g. #0084FF), except white. We highly recommend you choose a color that has a high contrast to white. <br />
			Default is White/Snow
    </p> <?php
  } // theme_color()
	
	
	/**
	 * Logged in Greeting
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function logged_in_greeting() {

	  $options 	= get_option( $this->Customer_Chat . '_options' );
	  $option 	= '';

	  if ( ! empty( $options['logged_in_greeting'] ) ) {
	    $option = $options['logged_in_greeting'];
	  }

	  ?>
			<textarea
					id="<?php echo $this->Customer_Chat; ?>_options[logged_in_greeting]"
					name="<?php echo $this->Customer_Chat; ?>_options[logged_in_greeting]"
					rows="2"
					cols="50"
					maxlength="80"
				><?php echo $option; ?></textarea>
		  <p class="description">
		    The greeting text that will be displayed if the user is currently logged in to Facebook. <br/>
				Maximum 80 characters.
		  </p>
		<?php
	} // logged_in_greeting()
	
	
	/**
	 * Logged out Greeting
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function logged_out_greeting() {

	  $options 	= get_option( $this->Customer_Chat . '_options' );
	  $option 	= '';

	  if ( ! empty( $options['logged_out_greeting'] ) ) {
	    $option = $options['logged_out_greeting'];
	  }

	  ?>
	    <textarea
	        id="<?php echo $this->Customer_Chat; ?>_options[logged_out_greeting]"
	        name="<?php echo $this->Customer_Chat; ?>_options[logged_out_greeting]"
	        rows="2"
	        cols="50"
	        maxlength="80"
	      ><?php echo $option; ?></textarea>
	    <p class="description">
	      The greeting text that will be displayed if the user is currently not logged in to Facebook. <br/>
	      Maximum 80 characters.
	    </p>
	  <?php
	} // logged_out_greeting()
	
	
	/**
	 * Greeting Dialog Display
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function greeting_dialog_display_options_field() {

		$options 	= get_option( $this->Customer_Chat . '_options' );
		$option 	= 'hide';
		
		$select_options = array(
			'show' => 'Show',
			'hide' => 'Hide',
			'fade' => 'Fade'
		);
		
		// Try this option first if it's empty then the user has probably just upgraded
		if ( ! empty( $options['greeting_dialog_display'] ) ) {
			$option = $options['greeting_dialog_display'];
		} else if ( ! empty( $options['minimized'] ) ) {
			// Possible values
			// 'on'
			// '1'
			// 0
			// Determine if original option was to not minimized
			$is_not_minimized = ($options['minimized'] === 0);
			// Translate to respective select option
			$option = ($is_not_minimized) ? 'hide' : 'show';
		}
		
		?>
		
			<select id="<?php echo $this->Customer_Chat; ?>_options[greeting_dialog_display]" name="<?php echo $this->Customer_Chat; ?>_options[greeting_dialog_display]">
				<?php foreach ($select_options as $key => $select_option): ?>
					<option value="<?php echo $key; ?>" <?php selected($option, $key); ?>><?php echo $select_option; ?></option>
				<?php endforeach; ?>
			</select>
					
			<p class="description">
	      How the messenger dialog will display when the page loads. <a href="https://i.imgur.com/5zknx0Y.png" target="_blank">What's the difference?</a>
	      <br />
	      *Keep in mind that after the user minimizes it, it will stay minimized regardless of this setting.
	    </p>
		<?php
	} // greeting_dialog_display_options_field()
	
	
	/**
   * Greeting Dialog Delay
   *
   * @since 		1.0.0
   * @return 		mixed 			The settings field
   */
  public function greeting_dialog_delay() {

    $options 	= get_option( $this->Customer_Chat . '_options' );
    $option 	= '10';

    if ( ! empty( $options['greeting_dialog_delay'] ) ) {
      $option = $options['greeting_dialog_delay'];
    }

    ?><input type="text" id="<?php echo $this->Customer_Chat; ?>_options[greeting_dialog_delay]" name="<?php echo $this->Customer_Chat; ?>_options[greeting_dialog_delay]" value="<?php echo $option; ?>" />
    <p class="description">
      Only applies if Greeting Dialog Display is set to "Fade"<br />
			Sets the number of seconds of delay before the greeting dialog is shown after the plugin is loaded. <br />
			This can be used to customize when you want the greeting dialog to appear.
    </p> <?php
  } // greeting_dialog_delay()
	
	
	/**
   * Ref
   *
   * @since 		1.0.0
   * @return 		mixed 			The settings field
   */
  public function ref() {

    $options 	= get_option( $this->Customer_Chat . '_options' );
		// Initial option
    $option 	= 'website';

    if ( ! empty( $options['ref'] ) ) {
      $option = $options['ref'];
    }

    ?><input type="text" id="<?php echo $this->Customer_Chat; ?>_options[ref]" name="<?php echo $this->Customer_Chat; ?>_options[ref]" value="<?php echo $option; ?>" />
    <p class="description">
      You may pass an optional ref parameter if you wish to include additional context to be passed back in the webhook event. This can be used for many purposes, such as tracking which page the user started the conversation on, directing the user to specific content or features available within the bot, or tying a Messenger user to a session or account on the website.
    </p> <?php
  } // ref()


	/**
	 * Site language
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function language_options_field() {

		$option 	= get_locale();
		$site_url = get_site_url();

		?><input type="text" id="<?php echo $this->Customer_Chat; ?>_options[wp_language]" name="<?php echo $this->Customer_Chat; ?>_options[wp_language]" value="<?php echo $option; ?>" readonly />
		<p class="description">
			This uses whatever language Wordpress is set to.
			<br />
      <a href="<?php echo $site_url; ?>/wp-admin/options-general.php#default_role">Set Site Language</a>
    </p> <?php
	} // language_options_field()

}
