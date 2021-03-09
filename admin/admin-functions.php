<?php
/**
 * Admin Functions.
 *
 * @package responsive
 */

/**
 * Enqueue admin scipts.
 */
function responsive_admin_scripts( $hook ) {
	if ( 'post-new.php' === $hook || 'post.php' === $hook ) {
		return;
	}
	wp_enqueue_script( 'responsive-admin-js', get_template_directory_uri() . '/admin/js/plugin-install.js', array( 'jquery' ), true, RESPONSIVE_THEME_VERSION );
	wp_enqueue_script( 'updates' );
	wp_localize_script(
		'responsive-admin-js',
		'responsiveAboutPluginInstall',
		array(
			'activating'            => esc_html__( 'Activating ', 'responsive' ),
			'verify_network'        => esc_html__( 'Not connect. Verify Network.', 'responsive' ),
			'page_not_found'        => esc_html__( 'Requested page not found. [404]', 'responsive' ),
			'internal_server_error' => esc_html__( 'Internal Server Error [500]', 'responsive' ),
			'json_parse_failed'     => esc_html__( 'Requested JSON parse failed', 'responsive' ),
			'timeout_error'         => esc_html__( 'Time out error', 'responsive' ),
			'ajax_req_aborted'      => esc_html__( 'Ajax request aborted', 'responsive' ),
			'uncaught_error'        => esc_html__( 'Uncaught Error', 'responsive' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'responsive_admin_scripts' );

/**
 * Include Welcome page right starter sites content
 *
 * @since 4.0.3
 */
function responsive_welcome_banner_notice() {
	?>

	<?php echo Responsive_Plugin_Install_Helper::instance()->get_deactivate_content( 'responsive-add-ons' ); //phpcs:ignore ?>
	<div class="postbox responsive-sites-active">
		<div class="responsive-notice-image">
			<img class="responsive-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'images/responsive-thumbnail.jpg' ); ?>">
		</div>
		<div class="responsive-notice-content">
			<h2 class="handle">
				<span><?php echo esc_html( apply_filters( 'responsive_sites_menu_page_title', __( 'Thank You for installing Responsive', 'responsive' ) ) ); ?></span>
			</h2>
				<p>
					You can get a fully functional ready site with Responsive. Browse 90+ <a href="https://cyberchimps.com/wordpress-themes/?utm_source=wordpress-install-notice&utm_medium=button&utm_campaign=ready-site-templates" target="_blank" rel="noopener">ready site templates</a> Install the Ready Site Importer plugin to get started.
					<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
				</p>
			</div>
		</div>
	<?php echo Responsive_Plugin_Install_Helper::instance()->get_deactivate_end_content( 'responsive-add-ons' ); //phpcs:ignore 
}

add_action( 'admin_notices', 'responsive_welcome_banner_notice' );
