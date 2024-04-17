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

				wp_enqueue_script( 'responsive-getting-started-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );

				wp_enqueue_script( 'responsive-getting-started-toastify', 'https://cdn.jsdelivr.net/npm/toastify-js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );

				wp_enqueue_style( 'responsive-admin-getting-started', RESPONSIVE_THEME_URI . 'admin/css/responsive-getting-started-page.css', array(), RESPONSIVE_THEME_VERSION );

				wp_enqueue_script(
					'responsive-getting-started-jsfile',
					RESPONSIVE_THEME_URI . 'admin/js/responsive-getting-started.js',
					array( 'jquery' ),
					RESPONSIVE_THEME_VERSION,
					true
				);

				wp_localize_script(
					'responsive-getting-started-jsfile',
					'localize',
					array(
						'ajaxurl'               => admin_url( 'admin-ajax.php' ),
						'responsiveurl'         => RESPONSIVE_THEME_URI,
						'siteurl'               => site_url(),
						'isRSTActivated'        => is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ),
						'isRBAActivated'        => is_plugin_active( 'responsive-block-editor-addons/responsive-block-editor-addons.php' ),
						'isRAEActivated'        => is_plugin_active( 'responsive-addons-for-elementor/responsive-addons-for-elementor.php' ),
						'installing'            => esc_html__( 'Installing ', 'responsive' ),
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
			require_once RESPONSIVE_THEME_DIR . 'admin/templates/get-started.php';
		}

	}

	new Responsive_Admin_Settings();
}
