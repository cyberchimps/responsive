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
$wl_settings    = '';
$license_status = '';
if ( class_exists( 'Responsive_Addons_Pro' ) ) {
	global $wcam_lib_responsive_pro;
	$wl_settings    = get_option( 'rpro_elementor_settings' );
	$license_status = get_option( $wcam_lib_responsive_pro->wc_am_activated_key );
	if ( 'Deactivated' !== $license_status || '' !== $license_status ) {
		$license_key_server_status = $wcam_lib_responsive_pro->license_key_status();
		if ( empty( $license_key_server_status['data']['activated'] ) ) {
			update_option( $wcam_lib_responsive_pro->wc_am_activated_key, 'Deactivated' );
			$license_status = 'Deactivated';
		}
	}
}
$is_rst_active = class_exists( 'Responsive_Add_Ons' ) ? true : false;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<div class="responsive-theme-setting-list">
				<?php
				do_action( 'responsive_theme_setting_item' );

				if ( empty( $wl_settings ) || ( ! empty( $wl_settings ) && 'off' === $wl_settings['hide_wl_settings'] ) ) {
					?>
				<div tabindex="1" class="responsive-theme-setting-item d-flex" 
					<?php
					if ( 'activated' === $state && 'Activated' === $license_status ) {
						?>
					id="responsive-theme-setting-wl-tab" role="button"
						<?php
					}
					?>
				>
				<span class="responsive-theme-setting-item-icon dashicons dashicons-edit-page"></span>
				<p class="responsive-theme-setting-item-title"><?php esc_html_e( 'White Label', 'responsive' ); ?></p>
				</div>
					<?php
				}
				?>
				<div tabindex="0" class="responsive-theme-setting-item d-flex" 
				<?php
				if ( 'activated' === $state || 'installed' === $state ) {
					?>
					id="responsive-theme-setting-activation-key-tab" role="button"
					<?php
				}
				?>
				>
					<span class="responsive-theme-setting-item-icon dashicons dashicons-shield-alt <?php if(!$is_rst_active) echo 'responsive-theme-setting-active-tab' ?>"></span>
					<p class="responsive-theme-setting-item-title <?php if(!$is_rst_active) echo 'responsive-theme-setting-active-tab' ?>"><?php esc_html_e( 'Activate Key', 'responsive' ); ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-10 responsive-theme-setting-border-left">
		<?php
		if ( 'activated' === $state ) {
			$disabled               = '';
			$activated_form         = '';
			$api_placeholder        = __( 'Enter your API Key here', 'responsive' );
			$product_id_placeholder = __( 'Enter your Product ID here', 'responsive' );
			if ( 'Deactivated' !== $license_status && '' !== $license_status ) {
				$disabled               = 'disabled';
				$activated_form         = 'responsive-theme-setting-form-control-activated';
				$api_placeholder        = __( 'API Key Active!', 'responsive' );
				$product_id_placeholder = __( 'Product ID Accepted!', 'responsive' );
			}
			?>
			<div id="responsive-theme-setting-activation-key-section">
				<div class="responsive-theme-single-setting-section">
					<p class="fw-semibold responsive-theme-setting-activation-key-title"><?php esc_html_e( 'API Key Activation', 'responsive' ); ?></p>
					<div class="responsive-theme-setting-activation-form">
						<div class="mb-4">
							<input type="text" id="resp_pro_activation_key_api_key" class="form-control responsive-theme-setting-form-control <?php echo esc_attr( $activated_form ); ?>" autocomplete="off" placeholder="<?php echo esc_attr( $api_placeholder ); ?>" <?php echo esc_attr( $disabled ); ?>>
							<div class="mt-2"><span id="resp_pro_activation_key_api_key_msg"></span></div>
						</div>
						<div class="mb-4">
							<input type="text" id="resp_pro_activation_key_product_id" class="form-control responsive-theme-setting-form-control <?php echo esc_attr( $activated_form ); ?>" autocomplete="off" placeholder="<?php echo esc_attr( $product_id_placeholder ); ?>" <?php echo esc_attr( $disabled ); ?>>
							<div class="mt-2"><span id="resp_pro_activation_key_product_id_msg"></span></div>
						</div>
						<?php
						if ( 'Deactivated' === $license_status ) {
							?>
							<button id="resp_pro_activation_key_activate_api_key_submit" class="fw-normal button button-secondary responsive-theme-setting-secondary-btn" data-nonce="<?php echo esc_attr( wp_create_nonce( 'activate_rpro_license' ) ); ?>"><?php esc_html_e( 'Activate', 'responsive' ); ?></button>
							<?php
						} else {
							?>
							<button id="resp_pro_activation_key_deactivate_api_key_submit" class="fw-normal button button-secondary responsive-theme-setting-secondary-btn" data-nonce="<?php echo esc_attr( wp_create_nonce( 'deactivate_rpro_license' ) ); ?>"><?php esc_html_e( 'Deactivate Key', 'responsive' ); ?></button>
							<?php
						}
						?>
						<div class="mt-4">
							<a class="fw-semibold responsive-theme-setting-get-assistance" href="<?php echo esc_url( 'https://cyberchimps.com/my-account/api-keys/' ); ?>" target="_blank"><?php esc_html_e( 'Need Assistance?', 'responsive' ); ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php
			if ( 'Activated' === $license_status ) {
				if ( empty( $wl_settings ) || ( ! empty( $wl_settings ) && 'off' === $wl_settings['hide_wl_settings'] ) ) {
					?>
				<div id="responsive-theme-setting-wl-section">
					<div class="responsive-theme-single-setting-section">
						<p class="responsive-theme-setting-title"><?php esc_html_e( 'Author Details', 'responsive' ); ?></p>
						<div class="mb-2">
							<label for="resp_wl_author_name" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Author Name', 'responsive' ); ?></label>
							<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off" 
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_attr( $wl_settings['plugin_author'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_author_name">
						</div>
					</div>
					<div class="responsive-theme-single-setting-section">
						<div class="mb-2">
							<label for="resp_wl_website_url" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Website URL', 'responsive' ); ?></label>
							<input type="url" pattern="https?://.+" class="form-control responsive-theme-setting-form-control" autocomplete="off" 
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_attr( $wl_settings['plugin_website_uri'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_website_url">
						</div>
					</div>
					<hr class="responsive-theme-setting-hr">
					<div class="responsive-theme-single-setting-section">
						<p class="responsive-theme-setting-title mt-4"><?php esc_html_e( 'Responsive Theme Branding', 'responsive' ); ?></p>
						<div class="mb-2">
							<label for="resp_wl_theme_name" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Theme Name', 'responsive' ); ?></label>
							<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off"
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_attr( $wl_settings['theme_name'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_theme_name">
						</div>
					</div>
					<div class="responsive-theme-single-setting-section">
						<div class="mb-2">
							<label for="resp_wl_theme_desc" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Theme Description', 'responsive' ); ?></label>
							<?php
							$theme_desc = '';
							if ( ! empty( $wl_settings ) ) {
								$theme_desc = $wl_settings['theme_desc'];
							}
							?>
							<textarea type="text" class="form-control responsive-theme-setting-form-control" id="resp_wl_theme_desc"><?php echo esc_html( $theme_desc ); ?></textarea>
						</div>
					</div>
					<div class="responsive-theme-single-setting-section">
						<div class="mb-2">
							<label for="resp_wl_theme_screenshot_url" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Theme Screenshot URL', 'responsive' ); ?></label>
							<input type="url" pattern="https?://.+" class="form-control responsive-theme-setting-form-control" autocomplete="off" 
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_url( $wl_settings['theme_screenshot_url'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_theme_screenshot_url">
						</div>
						<p class="mt-2 responsive-theme-setting-form-control-hint"><?php esc_html_e( 'The recommended image size is 1200px wide and 900px tall.', 'responsive' ); ?></p>
					</div>
					<div class="responsive-theme-single-setting-section">
						<div class="mb-2">
							<label for="resp_wl_theme_icon_url" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Theme Icon URL', 'responsive' ); ?></label>
							<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off"
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_attr( $wl_settings['theme_icon_url'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_theme_icon_url">
						</div>
						<p class="mt-2 responsive-theme-setting-form-control-hint"><?php esc_html_e( 'The recommended icon should have some background to get adjust properly .', 'responsive' ); ?></p>
					</div>
					<hr class="responsive-theme-setting-hr">
					<div class="responsive-theme-single-setting-section">
						<p class="responsive-theme-setting-title mt-4"><?php esc_html_e( 'Responsive Pro Branding', 'responsive' ); ?></p>
						<div class="mb-2">
							<label for="resp_wl_plugin_name" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Plugin Name', 'responsive' ); ?></label>
							<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off"
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_attr( $wl_settings['plugin_name'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_plugin_name">
						</div>
					</div>
					<div class="responsive-theme-single-setting-section">
						<div class="mb-2">
							<label for="resp_wl_plugin_url" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Plugin URL', 'responsive' ); ?></label>
							<input type="text" class="form-control responsive-theme-setting-form-control" autocomplete="off"
							<?php
							if ( ! empty( $wl_settings ) ) {
								?>
								value="<?php echo esc_attr( $wl_settings['plugin_uri'] ); ?>"
								<?php
							}
							?>
							id="resp_wl_plugin_url">
						</div>
					</div>
					<div class="responsive-theme-single-setting-section">
						<div class="mb-2">
							<label for="resp_wl_plugin_desc" class="responsive-theme-setting-input-label"><?php esc_html_e( 'Plugin Description', 'responsive' ); ?></label>
							<?php
							$plugin_desc = '';
							if ( ! empty( $wl_settings ) ) {
								$plugin_desc = $wl_settings['plugin_desc'];
							}
							?>
							<textarea type="text" class="form-control responsive-theme-setting-form-control" id="resp_wl_plugin_desc"><?php echo esc_html( $plugin_desc ); ?></textarea>
						</div>
					</div>
					<hr class="responsive-theme-setting-hr">
					<div class="responsive-theme-single-setting-section">
						<p class="responsive-theme-setting-title mt-4"><?php esc_html_e( 'White Label Settings', 'responsive' ); ?></p>
						<div>
							<input type="checkbox" name="resp_wl_hide_settings" id="resp_wl_hide_settings"  />
							<label class="responsive-theme-setting-checkbox-label" for="resp_wl_hide_settings"><?php esc_html_e( 'Hide White Label Settings', 'responsive' ); ?></label>
						</div>
						<p class="responsive-theme-setting-note"><strong><?php esc_html_e( 'Note', 'responsive' ); ?></strong> : <?php esc_html_e( 'Enable this option to hide White Label settings. Re-activate the Responsive Pro to enable this settings tab again.', 'responsive' ); ?></p>
					</div>
					<div class="responsive-theme-single-setting-section">
						<button id="resp-theme-wl-settings-submit" class="button button-primary responsive-theme-setting-primary-btn" data-nonce="<?php echo esc_attr( wp_create_nonce( 'white_label_settings' ) ); ?>"><?php esc_html_e( 'Save Changes', 'responsive' ); ?></button>
					</div>
				</div>
					<?php
				}
			}
		}

		do_action( 'responsive_add_ons_app_connection_setting' );
		?>
		</div>
	</div>
</div>
