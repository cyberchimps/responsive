<?php
/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Settings Tab
 *
 * @link       https://cyberchimps.com/
 * @since      4.8.8
 *
 * @package responsive
 */

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
$wl_settings = '';
if ( class_exists( 'Responsive_Addons_Pro' ) ) {
	$wl_settings = get_option( 'rpro_elementor_settings' );
	error_log( print_r( $wl_settings, true ) );
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="responsive-theme-setting-list">
				<div class="responsive-theme-setting-item d-flex">
					<span class="responsive-theme-setting-item-icon dashicons dashicons-edit-page"></span>
					<p class="responsive-theme-setting-item-title"><?php esc_html_e( 'White Label', 'responsive' ); ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-9 responsive-theme-setting-border-left">
			<div class="responsive-theme-single-setting-section">
				<p class="responsive-theme-setting-title"><?php esc_html_e( 'Author Details', 'responsive' ); ?></p>
				<div class="mb-2">
					<label for="resp_wl_author_name" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Author Name', 'responsive' ); ?></label>
					<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off" 
					<?php
					if ( '' !== $wl_settings ) {
						?>
						value="<?php echo esc_attr( $wl_settings['plugin_author'] ); ?>"
						<?php
					}
					?>
					placeholder="CyberChimps" id="resp_wl_author_name">
				</div>
			</div>
			<div class="responsive-theme-single-setting-section">
				<div class="mb-2">
					<label for="resp_wl_website_url" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Website URL', 'responsive' ); ?></label>
					<input type="url" pattern="https?://.+" class="form-control responsive-theme-setting-form-control" autocomplete="off" 
					<?php
					if ( '' !== $wl_settings ) {
						?>
						value="<?php echo esc_attr( $wl_settings['plugin_website_uri'] ); ?>"
						<?php
					}
					?>
					placeholder="https://cyberchimps.com" id="resp_wl_website_url">
				</div>
			</div>
			<hr class="responsive-theme-setting-hr">
			<div class="responsive-theme-single-setting-section">
				<p class="responsive-theme-setting-title mt-4"><?php esc_html_e( 'Plugin Details', 'responsive' ); ?></p>
				<div class="mb-2">
					<label for="resp_wl_plugin_name" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Plugin Name', 'responsive' ); ?></label>
					<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off"
					<?php
					if ( '' !== $wl_settings ) {
						?>
						value="<?php echo esc_attr( $wl_settings['plugin_name'] ); ?>"
						<?php
					}
					?>
					placeholder="CyberChimps" id="resp_wl_plugin_name">
				</div>
			</div>
			<div class="responsive-theme-single-setting-section">
				<div class="mb-2">
					<label for="resp_wl_plugin_url" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Plugin URL', 'responsive' ); ?></label>
					<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off"
					<?php
					if ( '' !== $wl_settings ) {
						?>
						value="<?php echo esc_attr( $wl_settings['plugin_uri'] ); ?>"
						<?php
					}
					?>
					placeholder="https://cyberchimps.com/responsivepro" id="resp_wl_plugin_url">
				</div>
			</div>
			<div class="responsive-theme-single-setting-section">
				<div class="mb-2">
					<label for="resp_wl_plugin_desc" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Plugin Description', 'responsive' ); ?></label>
					<?php
					$plugin_desc = '';
					if ( '' !== $wl_settings ) {
						$plugin_desc = $wl_settings['plugin_desc'];
					}
					?>
					<textarea type="text" class="form-control responsive-theme-setting-form-control" placeholder="<?php esc_attr_e( 'Responsive Pro is a Premium Plugin' ); ?>" id="resp_wl_plugin_desc"><?php echo esc_html( $plugin_desc ); ?></textarea>
				</div>
			</div>
			<hr class="responsive-theme-setting-hr">
			<div class="responsive-theme-single-setting-section">
				<p class="responsive-theme-setting-title mt-4"><?php esc_html_e( 'White Label Settings', 'responsive' ); ?></p>
				<div>
					<input type="checkbox" name="resp_wl_hide_settings" id="resp_wl_hide_settings"  />
					<label class="responsive-theme-setting-checkbox-label" for="resp_wl_hide_settings">Hide White Label Settings</label>
				</div>
				<p class="responsive-theme-setting-note"><strong><?php esc_html_e( 'Note', 'responsive' ); ?></strong> : <?php esc_html_e( 'Enable this option to hide White Label settings. Re-activate the Responsive Pro to enable this settings tab again.', 'responsive' ); ?></p>
			</div>
			<div class="responsive-theme-single-setting-section">
				<button id="resp-theme-wl-settings-submit" class="button button-primary responsive-theme-setting-primary-btn" data-nonce="<?php echo esc_attr( wp_create_nonce( 'white_label_settings' ) ); ?>"><?php esc_html_e( 'Save Changes', 'responsive' ); ?></button>
			</div>
		</div>
	</div>
</div>
