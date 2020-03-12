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
	if ( 'appearance_page_responsive' !== $hook ) {
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
 * Enqueue admin styles.
 */
function responsive_admin_styles( $hook ) {
	if ( 'appearance_page_responsive' !== $hook ) {
		return;
	}
	wp_register_style( 'responsive-admin-css', get_template_directory_uri() . '/admin/css/admin.css', false, RESPONSIVE_THEME_VERSION );
	if ( ! is_customize_preview() ) {
		echo '<style class="responsive-menu-appearance-style">
		#menu-appearance a[href^="themes.php?page=responsive-add-ons"]:before{
			content: "\21B3";
			margin-right: 0.5em;
			opacity: 0.5;
		}
		</style>';
	}
}
add_action( 'admin_enqueue_scripts', 'responsive_admin_styles' );
