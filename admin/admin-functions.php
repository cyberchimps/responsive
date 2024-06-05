<?php
/**
 * Admin Functions.
 *
 * @package responsive
 */

/**
 * Enqueue admin scipts.
 *
 * @param string $hook Hook.
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
 * Responsive_enqueue_notices_handler.
 */
function responsive_enqueue_notices_handler() {
	wp_register_script( 'responsive-plugin-notices-handler', trailingslashit( get_template_directory_uri() ) . '/admin/js/notices.js', array( 'jquery' ), true, RESPONSIVE_THEME_VERSION );
	wp_localize_script(
		'responsive-plugin-notices-handler',
		'dismissNotices',
		array(
			'_notice_nonce' => wp_create_nonce( 'responsive-plugin-notices-handler' ),
			'ajaxurl'       => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_enqueue_script( 'responsive-plugin-notices-handler' );
}

add_action( 'admin_enqueue_scripts', 'responsive_enqueue_notices_handler', 99 );


/**
 * Include Welcome page right starter sites content
 *
 * @since 4.0.3
 */
function responsive_welcome_banner_notice() {
	if ( isset( $_GET['page'] ) && 'responsive' === $_GET['page'] ) {
		return;
	}
	if ( '1' !== get_option( 'responsive-readysite-promotion' ) ) {
		?>

	<?php echo Responsive_Plugin_Install_Helper::instance()->get_rateus_content( 'responsive-add-ons' ); //phpcs:ignore ?>
	<div class="postbox responsive-sites-active" id="responsive-sites-active">
		<div class="responsive-banner-outer-container">
			<div class="responisve-addons-banner-header">
				<div class="responsive-notice-image">
					<img class="responsive-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'admin/images/cyberchimps-logo-thumbnail.png' ); ?>">
				</div>
				<div class="responsive-notice-content">
					<h2 class="handle">
						<span><?php echo esc_html( apply_filters( 'responsive_sites_menu_page_title', __( 'Thank You for Installing Responsive Theme!', 'responsive' ) ) ); ?></span>
					</h2>
				</div>
			</div>
			<div class="responsive-addons-banner-content">
				<p>
					<?php esc_html_e( 'Import 250+ fully functional and ready to use business websites with the free Responsive Addons Plugin. Explore features like the mega menu, white label, advance WooCommerce settings and many more.', 'responsive' ); ?>
					<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
				</p>
			</div>
		</div>
		<div class="responsive-banner-image-container">
			<img class="responsive-banner-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'admin/images/resp-plus-starter-template.png' ); ?>">
		</div>			
			
			<button type="button" class="notice-dismiss"></button>
		</div>
	<?php echo Responsive_Plugin_Install_Helper::instance()->get_rateus_end_content( 'responsive-add-ons' ); //phpcs:ignore
	}
}

add_action( 'admin_notices', 'responsive_welcome_banner_notice', 10 );

add_action( 'wp_ajax_responsive_delete_transient_action', 'responsive_delete_transient_action' );

/**
 * Responsive Delete Transient Action
 *
 * @since 4.0.3
 */
function responsive_delete_transient_action() {
	$nonce = ( isset( $_POST['nonce'] ) ) ? sanitize_key( $_POST['nonce'] ) : '';

	if ( false === wp_verify_nonce( $nonce, 'responsive-plugin-notices-handler' ) ) {
		return;
	}
	update_option( 'responsive-readysite-promotion', 1 );

}

/**
 * Responsive Upgrade Pro React
 *
 * @since 4.0.3
 */
function responsive_upgrade_pro_react() {
	?>

	<div class="notice notice-error">
		<p>Please update to the latest version of <strong>Responsive Pro ( V2.4.2 or higher )</strong> to be compatible with the latest <strong>Responsive</strong> theme. To upgrade to latest version of <strong>Responsive Pro Plugin</strong> follow <a href="<?php echo esc_url( 'https://cyberchimps.com/docs-category/faq/' ); ?>">Documentation</a>.</p>
	</div>
	<?php
}

if ( class_exists( 'responsive_addons_pro' ) ) {
	$plugin_path            = WP_PLUGIN_DIR . '/responsive-addons-pro/responsive-addons-pro.php';
	$plugin_info            = get_plugin_data( $plugin_path );
	$responsive_pro_version = $plugin_info['Version'];
	$compare                = version_compare( $responsive_pro_version, '2.4.2' );
	if ( -1 === $compare ) {
		add_action( 'admin_notices', 'responsive_upgrade_pro_react', 20 );
	}
}
