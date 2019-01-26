<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Customer_Chat_for_Facebook
 * @author    Sam Carlton <sam@sam.lc>
 * @copyright 2019 Sam Carlton Creative
 * @license   GPL 2.0+
 * @link      https://samcarlton.com
 */
?>

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <div id="tabs" class="settings-tab">
		<div class="right-column-settings-page metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span><?php _e( 'Setup', CCFF_TEXTDOMAIN ); ?></span></h3>
				<div class="inside">
					<p>Be sure that you go through the plugin setup to make sure everything is working as intended.</p>
					<a href="https://www.youtube.com/watch?v=_8skhKEYOBs" class="button-secondary" target="_blank"><strong><?php _e( 'Simple Setup Video' ); ?></strong></a>
					<a href="https://samcarlton.com/customer-chat-for-facebook-faq" class="button-secondary" target="_blank"><?php _e( 'FAQ' ); ?></a>
				</div>
			</div>
		</div>
		<div class="right-column-settings-page metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span><?php _e( 'Settings', CCFF_TEXTDOMAIN ); ?></span></h3>
				<div class="inside">
					<?php
						require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
					?>
				</div>
			</div>
		</div>
		<!-- <div id="tabs-3" class="metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span><?php _e( 'Export Settings', CCFF_TEXTDOMAIN ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Export the plugin\'s settings for this site as a .json file. This will allows you to easily import the configuration to another installation.', CCFF_TEXTDOMAIN ); ?></p>
					<form method="post">
						<p><input type="hidden" name="ccff_action" value="export_settings" /></p>
						<p>
							<?php wp_nonce_field( 'ccff_export_nonce', 'ccff_export_nonce' ); ?>
							<?php submit_button( __( 'Export' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span><?php _e( 'Import Settings', CCFF_TEXTDOMAIN ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Import the plugin\'s settings from a .json file. This file can be retrieved by exporting the settings from another installation.', CCFF_TEXTDOMAIN ); ?></p>
					<form method="post" enctype="multipart/form-data">
						<p>
							<input type="file" name="ccff_import_file"/>
						</p>
						<p>
							<input type="hidden" name="ccff_action" value="import_settings" />
							<?php wp_nonce_field( 'ccff_import_nonce', 'ccff_import_nonce' ); ?>
							<?php submit_button( __( 'Import' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div>
			</div>
		</div> -->
		<?php
		?>
    </div>
</div>
