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
						<h3>Q: Why isn't minimize working?</h3>
						<span>
              A: If the user at anytime closes the welcome message the plugin remembers that and keeps it closed for the user from then on.
              You can preview it by opening the site in a incognito window.
            </span>
						<h3>Q: Have some issues about plugin?</h3>
						<span>A: Contact me on <a href="http://samcarlton.com/customer-chat-for-facebook" target="_blank"><strong>my website</strong></a>.</span>
					<?php
						break;
					// If no tab or general
					default: ?>
						<div id="setup" class="meta-box-sortables ui-sortable">
							<div id="itsec_sss" class="postbox ">
								<h3 class="hndle"><span>Setup</span></h3>
								<div class="inside">
									<p>Be sure that you go through the plugin setup to make sure everything is working as intended</p>
									<a href="https://github.com/ThatGuySam/customer-chat-for-facebook#setup--installation" target="_blank"><strong>Plugin Setup Intructions</strong></a>
								</div>
							</div>
						</div>
						<form method="post" action="options.php">
							<div id="normal-sortables" class="meta-box-sortables ui-sortable">
								<div id="itsec_get_started" class="postbox ">
									<h3 class="hndle"><span>Settings</span></h3>
									<div class="inside">
										<?php
											settings_fields( $this->get_plugin() . '_options' );

											do_settings_sections( $this->get_plugin() );

											submit_button( 'Save Settings' );
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
