<div id="tabs-1" class="wrap">
	<?php

			// Get options from old version
			// Ex: Array ( [facebook-page-id] => 139756292753616 [facebook-app-id] => 735243603333999 [theme_color] => #000000 [logged_in_greeting] => Logged in Greeting [logged_out_greeting] => Logged out Greeting [greeting_dialog_display] => fade [greeting_dialog_delay] => 7 [ref] => websi [wp_language] => en_US )
			$old_options = [];
			$have_old_options_been_transferred = get_option( CCFF_TEXTDOMAIN . '_have_old_options_been_transferred' );

			if (empty($have_old_options_been_transferred) || !$have_old_options_been_transferred) {
				$old_options = get_option( 'customer-chat-for-facebook_options' );

				// Update new options with the old ones
				update_option( CCFF_TEXTDOMAIN . '-settings', $old_options );
				// Update that options have been transferred
				update_option( CCFF_TEXTDOMAIN . '_have_old_options_been_transferred', true );
			}

			// Metabox
			$cmb = new_cmb2_box( array(
				'id' => CCFF_TEXTDOMAIN . '_options',
				'hookup' => false,
				'show_on' => array( 'key' => 'options-page', 'value' => array( CCFF_TEXTDOMAIN ), ),
				'show_names' => true,
			) );

			// Facebook Page ID
			$cmb->add_field( array(
				'name' => __( 'Facebook Page ID', CCFF_TEXTDOMAIN ),
				'desc' => __( 'Facebook ID of page to message', CCFF_TEXTDOMAIN ),
				'id' => 'facebook-page-id',
				'type' => 'text',
				'attributes' => array(
					'placeholder' => '123456789098765'
				),
				'after' => '<p><a href="https://findmyfbid.com/" target="_blank">Get Facebook Page ID</a></p>',
			) );

			// Facebook App ID
			$cmb->add_field( array(
				'name' => __( 'Facebook App ID', CCFF_TEXTDOMAIN ),
				'desc' => __( 'Facebook App ID to identify this website for Facebook', CCFF_TEXTDOMAIN ),
				'id' => 'facebook-app-id',
				'type' => 'text',
				'default' => '735243603333999',
				'after' => '<p><a href="https://developers.facebook.com/apps/" target="_blank">Create a new App ID</a></p>',
			) );

			// Color
			$cmb->add_field( array(
				'name' => __( 'Color', CCFF_TEXTDOMAIN ),
				'desc' => __( 'The color to use as a theme for the plugin, including the background color of the customer chat plugin icon and the background color of any messages sent by users.', CCFF_TEXTDOMAIN ),
				'id' => 'theme_color',
				'type' => 'colorpicker',
				'default' => '#ffffff',
			) );

			// Logged in Greeting
			$cmb->add_field( array(
				'name' => __( 'Logged in Greeting', CCFF_TEXTDOMAIN ),
				'desc' => __( 'The greeting text that will be displayed if the user is currently logged in to Facebook.
				Maximum 80 characters.', CCFF_TEXTDOMAIN ),
				'id' => 'logged_in_greeting',
				'type' => 'textarea_small',
				'attributes' => array(
					'rows' => '2',
					'cols' => '50',
					'maxlength' => '80'
				),
			) );

			// Logged out Greeting
			$cmb->add_field( array(
				'name' => __( 'Logged out Greeting', CCFF_TEXTDOMAIN ),
				'desc' => __( 'The greeting text that will be displayed if the user is currently not logged in to Facebook.
				Maximum 80 characters.', CCFF_TEXTDOMAIN ),
				'id' => 'logged_out_greeting',
				'type' => 'textarea_small',
				'attributes' => array(
					'rows' => '2',
					'cols' => '50',
					'maxlength' => '80'
				),
			) );

			// Greeting Dialog Display
			$cmb->add_field( array(
				'name' => __( 'Greeting Dialog Display', CCFF_TEXTDOMAIN ),
				'desc' => __( 'How the messenger dialog will display when the page loads. *Keep in mind that after the user minimizes it, it will stay minimized regardless of this setting.', CCFF_TEXTDOMAIN ),
				'id' => 'greeting_dialog_display',
				'type' => 'select',
				'show_option_none' => false,
				'default' => 'hide',
				'options' => array(
					'show' => __( 'Show', CCFF_TEXTDOMAIN ),
					'hide' => __( 'Hide', CCFF_TEXTDOMAIN ),
					'fade' => __( 'Fade', CCFF_TEXTDOMAIN ),
				),
				'after' => '<p><a href="https://i.imgur.com/5zknx0Y.png" target="_blank">What\'s the difference?</a></p>'
			) );

			// Greeting Dialog Delay
			$cmb->add_field( array(
				'name' => __( 'Greeting Dialog Delay', CCFF_TEXTDOMAIN ),
				'desc' => __( 'Sets the number of seconds of delay before the greeting dialog is shown after the plugin is loaded.', CCFF_TEXTDOMAIN ),
				'id' => 'greeting_dialog_delay',
				'type' => 'text',
				'attributes' => array(
					'pattern' => '\d*',
					'placeholder' => '3'
				),
				'after' => '<p class="cmb2-metabox-description">This can be used to customize when you want the greeting dialog to appear.</p>'
			) );

			// Reference
			$cmb->add_field( array(
				'name' => __( 'Reference', CCFF_TEXTDOMAIN ),
				'desc' => __( 'You may pass an optional ref parameter if you wish to include additional context to be passed back in the webhook event. ', CCFF_TEXTDOMAIN ),
				'id' => 'ref',
				'type' => 'text',
				'default' => parse_url(site_url(), PHP_URL_HOST),
				'after' => '<p class="cmb2-metabox-description">This can be used for many purposes, such as tracking which page the user started the conversation on, <br>directing the user to specific content or features available within the bot, or tying a Messenger user to a session or account on the website.</p>'
			) );

			// Language
			$cmb->add_field( array(
				'name' => __( 'Language', CCFF_TEXTDOMAIN ),
				'desc' => __( 'This uses whatever language Wordpress is set to. ', CCFF_TEXTDOMAIN ),
				'id' => 'wp_language',
				'type' => 'text',
				'default' => get_locale(),
				'attributes' => array(
					'readonly' => 'readonly',
				),
				'after' => '<p><a href="/wp-admin/options-general.php#default_role">Set <strong>Site Language</strong></a></p>',
			) );


			cmb2_metabox_form( CCFF_TEXTDOMAIN . '_options', CCFF_TEXTDOMAIN . '-settings' );
	?>

	<!-- @TODO: Provide other markup for your options page here. -->
</div>
