<?php
/**
 * LifterLMS Compatibility File.
 *
 * @package Responsive
 */

// If plugin - 'LifterLMS' not exist then return.
if ( ! class_exists( 'LifterLMS' ) ) {
	return;
}

/**
 * Responsive LifterLMS Compatibility
 */
if ( ! class_exists( 'Responsive_LifterLMS' ) ) :

	/**
	 * Responsive LifterLMS Compatibility
	 *
	 * @since 4.8.2
	 */
	class Responsive_LifterLMS {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_filter( 'after_setup_theme', array( $this, 'responsive_llms_setup' ) );

			add_action( 'customize_register', array( $this, 'customize_register' ), 2 );

			add_filter( 'lifterlms_loop_columns', array( $this, 'columns_lifter_lms' ) );
			add_filter( 'llms_get_loop_list_classes', array( $this, 'course_responsive_grid' ), 999 );

			// Add Content Wrappers
			add_action( 'lifterlms_before_main_content', array( $this, 'before_main_content_start' ) );
			add_action( 'lifterlms_after_main_content', array( $this, 'before_main_content_end' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'add_custom_scripts' ) );

			add_filter( 'body_class', array( $this, 'responsive_add_class_llms' ),7 );
			add_filter( 'body_class', array( $this, 'responsive_add_custom_body_classes_llms' ),7 );

			// Lifter Notice
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'lifter_enqueue_notices_handler' ), 999 );
			add_action( 'customize_controls_print_scripts', array( $this, 'lifter_print_templates' ), 1 );

		}

		/**
		 * Register Customizer sections and panel for LifterLMS
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @since 4.8.2
		 */
		public function customize_register( $wp_customize ) {
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-panel.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-content-customizer.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-sidebar.php';
		}

		/**
		 * Declare explicit theme support for LifterLMS course and lesson sidebars
		 *
		 * @since 4.8.2
		 * @return   void
		 */
		public function responsive_llms_setup() {
			add_theme_support( 'lifterlms' );
			add_theme_support( 'lifterlms-quizzes' );
			add_theme_support( 'lifterlms-sidebars' );
		}

		/**
		 * Classes for Number of columns
		 *
		 * @since 4.8.2
		 * @return   void
		 */

		public function columns_lifter_lms ( $grid ) {

			$course_grid = get_option( 'theme_mods_responsive' );
			return $course_grid;
		}

		public function course_responsive_grid ( $classes ) {

			$llms_grid = get_option( 'theme_mods_responsive' );

			$no_of_cols = get_theme_mod ( 'lifterlms_columns' ) ;

			$classes[] ='cols-'.$no_of_cols;
			return $classes;
		}

		/**
		 * Add start of wrapper
		 *
		 * @since 4.8.2
		 * @return void
		 */
		function before_main_content_start() {

			?>

			<div id="content-wrap" class="container clr">

				<div id="primary" class="content-area clr">

					<div id="inner-content" class="site-content clr">
			<?php
		}

		/**
		 * Add end of wrapper
		 *
		 * @since 4.8.2
		 * @return void
		 */
		function before_main_content_end() {
				?>

				</div><!-- #primary -->

				<aside id="secondary" class="main-sidebar widget-area <?php echo esc_attr( implode( ' ', responsive_get_sidebar_classes() ) ); ?>" role="complementary" <?php responsive_schema_markup( 'sidebar' ); ?>>

				<?php

				Responsive\responsive_widgets(); // above widgets hook.
				if ( ! dynamic_sidebar( 'main-sidebar' ) ) :
				endif; // End of main-sidebar.
					Responsive\responsive_widgets_end(); // after widgets hook.
				?>

				</aside>

			</div><!-- #content-wrap -->

			<?php
		}

		/**
		 * Add Custom LLMS scripts.
		 *
		 * @since 4.8.2
		 */
		public static function add_custom_scripts() {

			$theme              = wp_get_theme();
			$responsive         = wp_get_theme( 'responsive' );
			$responsive_options = responsive_get_options();
			$suffix             = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_style( 'lifter-main-style', get_template_directory_uri() . "/core/css/lifterlms/lifter_style{$suffix}.css", false, $responsive['Version'] );
		}

		/**
		 * Funtion to add CSS class to body
		 *
		 * @param array $classes html classes.
		 */
		function responsive_add_class_llms( $classes ) {

			// Get Responsive theme option.
			global $responsive_options;
			if ( 1 == $responsive_options['front_page'] && is_front_page() ) {
				$classes[] = 'front-page';
			}

			return $classes;
		}

		/**
		 * [responsive_add_custom_body_classes Funtion to add CSS class to body].
		 *
		 * @param [type] $classes [description].
		 */
		function responsive_add_custom_body_classes_llms( $classes ) {

			// Adds element order class.
			$elements = get_theme_mod(
				'responsive_header_elements',
				array(
					'site-branding',
					'main-navigation',
				)
			);

			$classes[] = 'site-header-' . implode( '-', $elements );

			if ( is_post_type_archive( 'course' )  ){

				// Site Width class.
				$classes[] = 'responsive-site-llms-' . get_theme_mod( 'lifterlms_width', 'contained' );

				// Site Style class.
				if ( is_page() ) {
					$site_style = get_post_meta( get_the_ID(), 'responsive_page_meta_layout_style', true );
					$site_style = $site_style ? $site_style : get_theme_mod( 'lifterlms_style', 'boxed' );

					$classes[] = 'responsive-site-style-llms-' . $site_style;

				} else {
					$classes[] = 'responsive-site-style-llms-' . get_theme_mod( 'lifterlms_style', 'boxed' );
				}

				//sidebar classes

				$classes[] = 'responsive-llms-sidebar-' . get_theme_mod( 'lifter_page_sidebar_position', 'right' );

			}

			return $classes;
		}

		/**
		 * Enqueue the controls script.
		 */
		public function lifter_enqueue_notices_handler() {

			$responsive         = wp_get_theme( 'responsive' );
			$responsive_options = responsive_get_options();
			$suffix             = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_style( 'lifter-main-notice-style', get_template_directory_uri() . "/core/css/lifterlms/lifter_notice{$suffix}.css", false, $responsive['Version'] );

			wp_register_script( 'responsive-customizer-lms-notices-handler', trailingslashit( get_template_directory_uri() ) . 'core/includes/customizer/assets/min/js/lms-customizer-notices-handler.js', array( 'customize-controls' ), RESPONSIVE_THEME_VERSION );

			wp_enqueue_script( 'responsive-customizer-lms-notices-handler' );
		}

		/**
		 * Notice template.
		 */

		public function lifter_print_templates() {
			?>
			<script type="text/html" id="tmpl-lifter-custom-message">
				<div class="lifter-lms-notice">
				<p class="lifter-custom-message"><span class="lms-note">Note: </span><?php esc_html_e( 'The above settings apply to the default LifterLMS Course Catalog archive page.' ) ?></p>
				</div>

			</script>
			<?php
		}

	}

endif;
Responsive_LifterLMS::get_instance();
