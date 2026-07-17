<?php
/**
 * Admin settings helper
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Responsive
 * @author      Responsive
 * @copyright   Copyright (c) 2020, Responsive
 * @link        https://www.cyberchimps.com
 * @since       Responsive 4.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Admin_Settings' ) ) {

	/**
	 * Responsive Admin Settings
	 */
	class Responsive_Admin_Settings {

		/**
		 * Menu page title
		 *
		 * @since 4.0.3
		 * @var array $menu_page_title
		 */
		public static $menu_page_title = 'Responsive Theme';

		/**
		 * Page title
		 *
		 * @since 4.0.3
		 * @var array $page_title
		 */
		public static $page_title = 'Responsive';

		/**
		 * Plugin slug
		 *
		 * @since 4.0.3
		 * @var array $plugin_slug
		 */
		public static $plugin_slug = 'responsive';

		/**
		 * Default Menu position
		 *
		 * @since 4.0.3
		 * @var array $default_menu_position
		 */
		public static $default_menu_position = 'themes.php';

		/**
		 * Parent Page Slug
		 *
		 * @since 4.0.3
		 * @var array $parent_page_slug
		 */
		public static $parent_page_slug = 'general';

		/**
		 * Current Slug
		 *
		 * @since 4.0.3
		 * @var array $current_slug
		 */
		public static $current_slug = 'general';

		/**
		 * Constructor
		 */
		public function __construct() {

			if ( ! is_admin() ) {
				return;
			}

			add_action( 'after_setup_theme', __CLASS__ . '::init_admin_settings', 99 );
		}

		/**
		 * Admin settings init
		 *
		 * @since 4.0.3
		 */
		public static function init_admin_settings() {
			self::$menu_page_title = apply_filters( 'responsive_menu_page_title', __( 'Responsive', 'responsive' ) . __( ' Options', 'responsive' ) );
			self::$page_title      = apply_filters( 'responsive_page_title', __( 'Responsive', 'responsive' ) );
			self::$plugin_slug     = self::get_theme_page_slug();

			add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles_scripts' );

			add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 99 );
		}

		/**
		 * Theme options page Slug getter including White Label string.
		 *
		 * @since 4.0.3
		 * @return string Theme Options Page Slug.
		 */
		public static function get_theme_page_slug() {
			return apply_filters( 'responsive_theme_page_slug', self::$plugin_slug );
		}

		/**
		 * Enqueues the needed CSS/JS for the builder's admin settings page.
		 *
		 * @since 1.0
		 */
		public static function styles_scripts() {
			wp_enqueue_style( 'responsive-admin-settings', RESPONSIVE_THEME_URI . 'admin/css/responsive-admin-menu-page.css', array(), RESPONSIVE_THEME_VERSION );

			if ( isset( $_GET['page'] ) && 'responsive' === $_GET['page'] ) {

				$rst_path = 'responsivepro/responsivepro.php';
				
				$responsivex_path = 'responsivepro/responsivepro.php';

				$rst_nonce = add_query_arg(
					array(
						'action'        => 'activate',
						'plugin'        => rawurlencode( $rst_path ),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $rst_path ),
					),
					network_admin_url( 'plugins.php' )
				);

				$rbea_path = 'responsive-block-editor-addons/responsive-block-editor-addons.php';

				$rbea_nonce = add_query_arg(
					array(
						'action'        => 'activate',
						'plugin'        => rawurlencode( $rbea_path ),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $rbea_path ),
					),
					network_admin_url( 'plugins.php' )
				);

				$rae_path = 'responsive-addons-for-elementor/responsive-addons-for-elementor.php';

				$rae_nonce = add_query_arg(
					array(
						'action'        => 'activate',
						'plugin'        => rawurlencode( $rae_path ),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $rae_path ),
					),
					network_admin_url( 'plugins.php' )
				);

				wp_register_style( 'responsive-admin-dashboard', RESPONSIVE_THEME_URI . 'admin/css/responsive-admin-dashboard.css', false, RESPONSIVE_THEME_VERSION );
				wp_enqueue_style( 'responsive-admin-dashboard' );
				wp_enqueue_script(
					'responsive-admin-dashboard-jsfile',
					RESPONSIVE_THEME_URI . 'admin/js/dashboard/responsive-admin-dashboard.js',
					array( 'jquery', 'react', 'react-dom', 'wp-components' ),
					RESPONSIVE_THEME_VERSION,
					true
				);

				wp_enqueue_style( 'wp-components' );

				wp_enqueue_script( 'updates' );

				wp_enqueue_style( 'responsive-getting-started-toastify', RESPONSIVE_THEME_URI . 'admin/lib/toastify/responsive-toastify.min.css', false, RESPONSIVE_THEME_VERSION );

				wp_enqueue_script( 'responsive-getting-started-toastify', RESPONSIVE_THEME_URI . 'admin/lib/toastify/responsive-toastify.min.js', array(), RESPONSIVE_THEME_VERSION, true );

				$customizer_return_url = admin_url( 'admin.php?page=responsive' );

				$customizer_url_return = add_query_arg(
					'return',
					rawurlencode( $customizer_return_url ),
					admin_url( 'customize.php' )
				);

				$is_responsivepro_active = is_plugin_active( 'responsivepro/responsivepro.php' );
				$is_rst_active = is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' );

				$rst_templates_path = 'responsive-add-ons/responsive-add-ons.php'; // actual Starter Templates plugin
				$rst_templates_nonce = add_query_arg(
				array(
						'action'        => 'activate',
						'plugin'        => rawurlencode( $rst_templates_path ),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $rst_templates_path ),
					),
					network_admin_url( 'plugins.php' )
				);

				// Fetch the current user plan
				$is_responsivex_active = is_plugin_active( $responsivex_path );
				$plan_details = null;

				if ( $is_responsivex_active && class_exists( 'ResponsivePRO' ) ) {
					$responsivex_settings = new ResponsivePRO();
					$plan_details = $responsivex_settings->get_responsivepro_plan();
				}

				$is_connected = 'no';
				$email        = '';
				$plan         = '';

				if ( $is_responsivepro_active && class_exists( 'ResponsivePRO_App_Auth' ) ) {
					// require_once RESPONSIVE_ADDONS_DIR . 'includes/class-responsive-add-ons-app-auth.php';
					$cc_app_auth = new ResponsivePRO_App_Auth();
					$is_connected = $cc_app_auth->has_auth();
					if ( $is_connected && class_exists( 'ResponsivePRO_Settings' ) ) {
						$user  = ResponsivePRO_Settings::get_instance();
						$email = esc_html( $user->get_email() );
						$plan  = esc_html( ucwords( $user->get_plan() ) );
					}
				}
				$localized_data = array(
					'ajaxurl'               => admin_url( 'admin-ajax.php' ),
					'responsiveVersion'     => RESPONSIVE_THEME_VERSION,
					'responsiveurl'         => RESPONSIVE_THEME_URI,
					'customizerurl'         => esc_url( admin_url( 'customize.php' ) ),
					'customizerurlReturn'   => esc_url( $customizer_url_return ),
					'siteurl'               => site_url(),
					'isRSTActivated'        => $is_responsivepro_active,
					'isRSTemplatesActivated' => $is_rst_active,
					'isResponsiveXActivated'=> $is_responsivex_active,
					'isRBAActivated'        => is_plugin_active( 'responsive-block-editor-addons/responsive-block-editor-addons.php' ),
					'isRAEActivated'        => is_plugin_active( 'responsive-addons-for-elementor/responsive-addons-for-elementor.php' ),
					'rst_status'            => self::responsive_check_plugin_status( $rst_path ),
					'rbea_status'           => self::responsive_check_plugin_status( $rbea_path ),
					'rae_status'            => self::responsive_check_plugin_status( $rae_path ),
					'responsivex_status'	=> self::responsive_check_plugin_status( $responsivex_path ),
					'rst_nonce'             => $rst_nonce,
					'rbea_nonce'            => $rbea_nonce,
					'rae_nonce'             => $rae_nonce,
					'rst_templates_status'  => self::responsive_check_plugin_status( $rst_templates_path ),
					'rst_templates_nonce'   => $rst_templates_nonce,
					'rst_templates_redirect'=> admin_url( 'admin.php?page=responsive_add_ons' ),
					'rst_redirect'          => admin_url( 'admin.php?page=responsive_add_ons' ),
					'rbea_redirect'         => admin_url( 'admin.php?page=responsive_block_editor_addons' ),
					'rae_redirect'          => admin_url( 'admin.php?page=rael_getting_started' ),
					'review_link'           => esc_url( 'https://wordpress.org/support/theme/responsive/reviews/#new-post' ),
					'installing'            => esc_html__( 'Installing ', 'responsive' ),
					'activating'            => esc_html__( 'Activating ', 'responsive' ),
					'verify_network'        => esc_html__( 'Not connect. Verify Network.', 'responsive' ),
					'page_not_found'        => esc_html__( 'Requested page not found. [404]', 'responsive' ),
					'internal_server_error' => esc_html__( 'Internal Server Error [500]', 'responsive' ),
					'json_parse_failed'     => esc_html__( 'Requested JSON parse failed', 'responsive' ),
					'timeout_error'         => esc_html__( 'Time out error', 'responsive' ),
					'ajax_req_aborted'      => esc_html__( 'Ajax request aborted', 'responsive' ),
					'uncaught_error'        => esc_html__( 'Uncaught Error', 'responsive' ),
					'isSiteBuilderEnabled'  => get_option( 'rplus_site_builder_enable' ),
					'isAISuiteEnabled'      => get_option( 'rplus_ai_suite_enable' ),
					'isWooCommerceEnabled'  => get_option( 'rpro_woocommerce_enable' ),
					'isCustomFontsEnabled'  => get_option( 'rplus_custom_fonts_enable' ),
					'isMegamenuEnabled'     => get_option( 'rpo_megamenu_enable' ),
					'whitelabelNonce'       => esc_attr( wp_create_nonce( 'white_label_settings' ) ),
					'whiteLabelSettings'    => get_option( 'rpro_elementor_settings' ),
					'isConnected'           => $is_connected,
					'userEmail'             => $email,
					'userPlan'              => $plan,
					'connectionNonce'       => esc_attr( wp_create_nonce( 'responsive-addons' ) ),
					'lastSync'              => get_transient( 'resp_app_last_sync' ),
					'megamenuNonce'         => esc_attr( wp_create_nonce( 'rpro_toggle_megamenu' ) ),
					'woocommerceNonce'      => esc_attr( wp_create_nonce( 'rpro_toggle_woocommerce' ) ),
					'customFontsNonce'      => esc_attr( wp_create_nonce( 'rplus_toggle_custom_fonts' ) ),
					'siteBuilderNonce'      => esc_attr( wp_create_nonce( 'rplus_toggle_site_builder' ) ),
					'aiSuiteNonce'          => esc_attr( wp_create_nonce( 'rplus_toggle_ai_suite' ) ),
					'plan_details' 			=> $plan_details,
					'proFeatures'           => array(
						array(
							'id' => 'white-label',
							'title' => 'White Label',
							'desc'  => 'White Label the theme name & settings with the Responsive Pro Plugin.',
							'locked' => true,
							'isWhiteLabel' => true,
						),
						array(
							'id' => 'mega-menu',
							'title' => 'Mega Menu',
							'desc'  => 'Adds options such as mega menus, highlight tags, icons, etc.',
							'locked' => true,
						),
						array(
							'id' => 'woocommerce',
							'title' => 'WooCommerce',
							'desc'  => 'Adds enhanced settings in the Woo store customizer.',
							'locked' => true,
						),
						array(
							'id' => 'custom-fonts',
							'title' => 'Custom Fonts',
							'desc'  => 'Upload custom fonts directly, no additional font plugin required.',
							'locked' => true,
						),
						array(
							'id' => 'site-builder',
							'title' => 'Site Builder',
							'desc'  => 'Edit your site\'s header, footer, 404, and archive templates.',
							'locked' => true,
						),
						array(
							'id' => 'ai-suite',
							'title' => 'AI Content Creation',
							'desc'  => 'Generate engaging content, layouts, and more with AI.',
							'locked' => true,
						),
					),
				);

				$localized_data = apply_filters( 'responsive_dashboard_localized_data', $localized_data );

				wp_localize_script(
					'responsive-admin-dashboard-jsfile',
					'localize',
					$localized_data
				);

				add_filter( 'admin_footer_text', '__return_false' );
				remove_filter( 'update_footer', 'core_update_footer' );
			}
		}

		/**
		 * Add main menu
		 *
		 * @since 1.0
		 */
		public static function add_admin_menu() {

			$parent_page    = self::$default_menu_position;
			$page_title     = self::$menu_page_title;
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::menu_callback';

			add_menu_page( __( 'Responsive', 'responsive' ), __( 'Responsive', 'responsive' ), $capability, $page_menu_slug, $page_menu_func, esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/responsive-add-ons-menu-icon.png', 59 );

			add_submenu_page( $page_menu_slug, __( 'Responsive - Dashboard', 'responsive' ), __( 'Dashboard', 'responsive' ), $capability, $page_menu_slug, $page_menu_func );

			add_theme_page( $page_title, $page_title, $capability, $page_menu_slug, $page_menu_func );

			do_action( 'responsive_register_admin_menu', $page_menu_slug );
		}

		/**
		 * Menu callback
		 *
		 * @since 1.0
		 */
		public static function menu_callback() {
			// require_once RESPONSIVE_THEME_DIR . 'admin/templates/get-started.php';
			echo '<div id="responsive-getting-started-page-app"></div>';
		}

		/**
		 * Check if plugin is installed or activated.
		 *
		 * @param $path Path of the plugin.
		 * 
		 * @return string
		 */
		public static function responsive_check_plugin_status( $path ) {

			if ( is_plugin_active( $path ) ) {
				return 'activated';
			}

			// Check if plugin is installed.
			$installed_plugins = get_plugins();

			if ( isset( $installed_plugins[ $path ] ) ) {
				return 'activate';
			} else {
				return 'install';
			}
		}

	}

	new Responsive_Admin_Settings();
}
