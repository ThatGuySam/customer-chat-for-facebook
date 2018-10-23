<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Customer_Chat
 * @subpackage Customer_Chat/admin/partials
 */
?>

<?php
	//flush rewrite rules when we load this page!
	flush_rewrite_rules();
	
	$site_url = get_site_url();
?>

<div class="wrap">
	<?php
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';
		$this->Customer_Chat_render_tabs();
	?>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="postbox-container-2" class="postbox-container">
				<?php
				switch ($tab) {
					case 'faq': ?>
						<h3><?php echo __( "Q: Why isn't it using the Greeting Dialog Display I set?", $this->Customer_Chat ); ?></h3>
						<span>
							<?php echo __( "A: If the user at anytime closes the welcome message the plugin remembers that and keeps it closed for the user from then on.
              You can preview it by opening the site in a incognito window.", $this->Customer_Chat ); ?>
            </span>
						
						<h3><?php echo __( "Q: Why isn't the chat appearing?", $this->Customer_Chat ); ?></h3>
						<span>
							<?php echo __( "A: Make sure the url that is whitelisted is exactly like the url you are looking at. <br/>
								If it has https or www then the whitelisting should be exactly the same. <br/>
								For example: If you have https://google.com in your whitelist, http://google.com and https://www.google.com will still both be blocked. <br /><br />
								This is what Wordpress says your url is: $site_url", $this->Customer_Chat ); ?>
            </span>
						
						<h3><?php echo __( "Q: Why isn't the chat appearing even though I've whitelisted my exact url?", $this->Customer_Chat ); ?></h3>
						<span>
							<?php echo __( 'A: Sometimes other plugins and themes that use the Facebook SDK will overwrite any Facebook related plugins to that were setup before it. <br/>
								If the SDK that the "winning" plugin uses doesn\'t support Customer Chat then it will lock out this plugin. <br/>
								It\'s an ongoing issue and you just have to mix and match until you get a plugin that plays well with others. <br/>
								Try picking a plugin that is updated frequently or recently. That usually means the developer does a lot of work on it to make sure things like that don\'t happen. <br/>
								As another option you can go ahead delete this plugin(it won\'t hurt my feelings) and add the code manually using <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin/#steps" target="_blank"><strong>Facebook\'s Documentation</strong></a> and <a href="/wp-admin/plugin-install.php?tab=plugin-information&plugin=custom-css-js&TB_iframe=true&width=772&height=669" target="_blank"><strong>this plugin</strong></a>.', $this->Customer_Chat ); ?>
            </span>
						
						<h3><?php echo __( "Q: Why isn't chat showing up in my language?", $this->Customer_Chat ); ?></h3>
						<span>
							<?php echo __( "A: It’s about the order in which things load. 
								Most facebook plugins use the same SDK <br />

								https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js <br />

								However, when you load the SDK you have the option to match the language of the site, not just english, like so: <br />

								https://connect.facebook.net/hr/sdk/xfbml.customerchat.js <br />

								Unfortunately some plugin authors forget to honor the site language.  <br />

								Now both SDKs get loaded but only one is needed so whichever is loaded last is what gets used, sometimes that is a plugin that only uses the english SDK(en_US)", $this->Customer_Chat ); ?>
            </span>
						
						<h3><?php echo __( "Q: Why didn't that fix my issue?", $this->Customer_Chat ); ?></h3>
						<span>
							<?php echo __( 'A: Try taking a look at <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin" target="_blank"><strong>Facebook\'s Official documentation</strong></a>.', $this->Customer_Chat ); ?>
            </span>
						
						<h3><?php echo __( "Q: Have more issues?", $this->Customer_Chat ); ?></h3>
						<span>
							<?php echo __( 'A: <a href="https://m.me/samcarltoncreative/" target="_blank"><strong>Contact me</strong></a>.', $this->Customer_Chat ); ?>
						</span>
					<?php
						break;
					// If no tab or general
					default: ?>
						<div id="setup" class="meta-box-sortables ui-sortable">
							<div id="itsec_sss" class="postbox ">
								<h3 class="hndle"><span><?php echo __( 'Setup', $this->Customer_Chat ); ?></span></h3>
								<div class="inside">
									<p><?php echo __( 'Be sure that you go through the plugin setup to make sure everything is working as intended.', $this->Customer_Chat ); ?></p>
									<a href="https://www.youtube.com/watch?v=iwofbP1EnrE" target="_blank"><strong><?php echo __( '2 minute Setup Video', $this->Customer_Chat ); ?></strong></a>
								</div>
							</div>
						</div>
						<form method="post" action="options.php">
							<div id="normal-sortables" class="meta-box-sortables ui-sortable">
								<div id="itsec_get_started" class="postbox ">
									<h3 class="hndle"><span><?php echo __( 'Settings', $this->Customer_Chat ); ?></span></h3>
									<div class="inside">
										<?php
											settings_fields( $this->get_plugin() . '_options' );

											do_settings_sections( $this->get_plugin() );

											submit_button( __( 'Save Settings', $this->Customer_Chat ) );
										?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</form>
					<?php
						break;
				} ?>
			</div>
		</div>
	</div>
</div>
