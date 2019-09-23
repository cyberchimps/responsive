<?php
/**
 * Admin Functions.
 *
 * @package responsive
 */

/**
 * Adding the theme menu page
 */
function responsive_admin_page() {
	add_theme_page(
		'Responsive Options',
		'Responsive Options',
		'administrator',
		'responsive-options',
		'responsive_options'
	);
}

add_action( 'admin_menu', 'responsive_admin_page', 99 );

/**
 * Admin page design
 */
function responsive_options() {
	if ( ! class_exists( 'Responsive_Plugin_Install_Helper' ) ) {
		require_once get_template_directory() . '/admin/class-responsive-plugin-install-helper.php';
	}
	wp_enqueue_style( 'responsive-admin-css' );
	$responsive_general            = get_option( 'responsive_options' );
	$responsive_recommended_addons = get_option( 'recommended_addons' );
	$responsive_useful_plugins     = get_option( 'useful_plugins' );

	$responsive_recommended_addons_screen = ( isset( $_GET['action'] ) && 'recommended_addons' === $_GET['action'] ) ? true : false; //phpcs:ignore

	$responsive_useful_plugins_screen = ( isset( $_GET['action'] ) && 'useful_plugins' === $_GET['action'] ) ? true : false; //phpcs:ignore ?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Responsive Options', 'responsive' ); ?></h1>
		<h2 class="nav-tab-wrapper">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=responsive-options' ) ); ?>" class="nav-tab<?php if ( ! isset( $_GET['action'] ) || isset( $_GET['action'] ) && 'recommended_addons' != $_GET['action'] && 'useful_plugins' != $_GET['action'] ) echo ' nav-tab-active';//phpcs:ignore ?>">
				<?php esc_html_e( 'Get Started', 'responsive' ); ?>
			</a>
			<a href="<?php echo esc_url( add_query_arg( array( 'action' => 'recommended_addons' ), admin_url( 'themes.php?page=responsive-options' ) ) ); ?>" class="nav-tab<?php if ( $responsive_recommended_addons_screen ) echo ' nav-tab-active';//phpcs:ignore ?>"><?php esc_html_e( 'Recommended Actions', 'responsive' ); ?></a>
			<a href="<?php echo esc_url( add_query_arg( array( 'action' => 'useful_plugins' ), admin_url( 'themes.php?page=responsive-options' ) ) ); ?>" class="nav-tab<?php if ( $responsive_useful_plugins_screen ) echo ' nav-tab-active';//phpcs:ignore ?>"><?php esc_html_e( 'Useful plugins', 'responsive' ); ?></a>
		</h2>
			<?php
			if ( $responsive_recommended_addons_screen ) {
				settings_fields( 'recommended_addons' );
				do_settings_sections( 'responsive-recommended-addons' );
				require_once 'templates/recommended-addons.php';
			} elseif ( $responsive_useful_plugins_screen ) {
				settings_fields( 'useful_plugins' );
				do_settings_sections( 'responsive-useful-plugins' );
				require_once 'templates/useful-plugins.php';
			} else {
				settings_fields( 'responsive_options' );
				do_settings_sections( 'responsive-options' );
				require_once 'templates/responsive-options.php';
			}
			?>
	</div>

	<?php
}

/**
 * Enqueue admin styles.
 */
function responsive_admin_styles() {
	wp_register_style( 'responsive-admin-css', get_template_directory_uri() . '/admin/css/admin.css', false, '1.0.0' );
	wp_enqueue_script( 'responsive-admin-js', get_template_directory_uri() . '/admin/js/plugin-install.js', array( 'jquery' ), true, '1.0.0' );
	wp_enqueue_script( 'updates' );
	wp_localize_script(
		'responsive-admin-js',
		'responsiveAboutPluginInstall',
		array(
			'activating' => esc_html__( 'Activating ', 'responsive' ),
		)
	);
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
/**
 * Call plugin api
 *
 * @param string $slug plugin slug.
 *
 * @return array|mixed|object
 */
function responsive_call_plugin_api( $slug ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

	$call_api = get_transient( 'responsive_about_plugin_info_' . $slug );

	if ( false === $call_api ) {
		$call_api = plugins_api(
			'plugin_information',
			array(
				'slug'   => $slug,
				'fields' => array(
					'downloaded'        => false,
					'rating'            => false,
					'description'       => false,
					'short_description' => true,
					'donate_link'       => false,
					'tags'              => false,
					'sections'          => true,
					'homepage'          => true,
					'added'             => false,
					'last_updated'      => false,
					'compatibility'     => false,
					'tested'            => false,
					'requires'          => false,
					'downloadlink'      => false,
					'icons'             => true,
					'banners'           => true,
				),
			)
		);
		set_transient( 'responsive_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
	}

	return $call_api;
}
