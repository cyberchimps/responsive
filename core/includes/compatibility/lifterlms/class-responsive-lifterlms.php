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
	 * @since 4.3.0
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

			// add_filter( 'llms_get_theme_default_sidebar', array( $this, 'add_sidebar' ) );

			add_filter( 'after_setup_theme', array( $this, 'responsive_llms_setup' ) );


			add_action( 'customize_register', array( $this, 'customize_register' ), 2 );

			add_filter( 'lifterlms_loop_columns', array( $this, 'columns_lifter_lms' ) );
			add_filter( 'llms_get_loop_list_classes', array( $this, 'course_responsive_grid' ), 999 );

			// Remove Content Wrappers
			remove_action( 'lifterlms_before_main_content', 'lifterlms_output_content_wrapper', 10 );
			remove_action( 'lifterlms_after_main_content', 'lifterlms_output_content_wrapper_end', 10 );
			remove_action( 'lifterlms_sidebar', 'lifterlms_get_sidebar' );

			// Add Content Wrappers
			add_action( 'lifterlms_before_main_content', array( $this, 'before_main_content_start' ) );
			add_action( 'lifterlms_after_main_content', array( $this, 'before_main_content_end' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'add_custom_scripts' ) );


			add_filter( 'body_class', array( $this, 'responsive_add_class_llms' ),7 );
			add_filter( 'body_class', array( $this, 'responsive_add_custom_body_classes_llms' ),7 );


			// add_filter( 'llms_get_theme_default_sidebar', array( $this, 'llms_sidebar' ) );
			// add_filter( 'body_class', array( $this, 'add_body_class' ) );


		}
		/**
		 * Register Customizer sections and panel for LifterLMS
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @since 4.3.0
		 */
		public function customize_register( $wp_customize ) {
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-panel.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-columns.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-sidebar.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/lifterlms/customizer/settings/class-responsive-lifterlms-content-customizer.php';
		}


		/**
		 * Declare explicit theme support for LifterLMS course and lesson sidebars
		 *
		 * @since 1.2.0
		 * @return   void
		 */
		public function responsive_llms_setup() {
			add_theme_support( 'lifterlms' );
			add_theme_support( 'lifterlms-quizzes' );
			add_theme_support( 'lifterlms-sidebars' );
		}




		public function columns_lifter_lms ( $grid ) {

			$course_grid = get_option( 'theme_mods_responsive' );
			// error_log(print_r($course_grid['lifterlms_columns'],true));
			return $course_grid;
		}

		public function course_responsive_grid ( $classes ) {

			$llms_grid = get_option( 'theme_mods_responsive' );
			$no_of_cols = $llms_grid['lifterlms_columns'];

			$classes[] ='cols-'.$no_of_cols;
			return $classes;
		}



		/**
		 * Add start of wrapper
		 *
		 * @since 1.2.0
		 * @return void
		 */
		function before_main_content_start() {

			?>

			<div id="content-wrap" class="container clr">

				<div id="primary" class="content-area clr">

					<div id="content" class="site-content clr">
			<?php
		}

		/**
		 * Add end of wrapper
		 *
		 * @since 1.2.0
		 * @return void
		 */
		function before_main_content_end() {
			?>
						</div><!-- #content -->

				</div><!-- #primary -->

			</div><!-- #content-wrap -->

			<?php
		}


				/**
		 * Display LifterLMS Course and Lesson sidebars
		 * on courses and lessons in place of the sidebar returned by
		 * this function
		 *
		 * @since 1.2.0
		 * @param    string $id    default sidebar id (an empty string).
		 * @return   string
		 */
		public function add_sidebar( $id ) {
			$sidebar_id = 'sidebar'; // replace this with theme's sidebar ID.
			return $sidebar_id;
		}





		/**
		 * Add Custom LLMS scripts.
		 *
		 * @since 1.0.0
		 */
		public static function add_custom_scripts() {

			$theme              = wp_get_theme();
			$responsive         = wp_get_theme( 'responsive' );
			$responsive_options = responsive_get_options();
			$suffix             = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_style( 'lifter-style', get_template_directory_uri() . "/core/css/lifterlms/llms{$suffix}.css", false, $responsive['Version'] );

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

			// Site Width class.
			$classes[] = 'responsive-site-' . get_theme_mod( 'lifterlms_width', 'contained' );

			// Site Style class.
			if ( is_page() ) {
				$site_style = get_post_meta( get_the_ID(), 'responsive_page_meta_layout_style', true );
				$site_style = $site_style ? $site_style : get_theme_mod( 'lifterlms_style', 'boxed' );

				$classes[] = 'responsive-site-style-' . $site_style;

			} else {
				$classes[] = 'responsive-site-style-' . get_theme_mod( 'lifterlms_style', 'boxed' );
			}

			return $classes;
		}

		/**
		 * Display LifterLMS Course and Lesson sidebars
		 * on courses and lessons in place of the sidebar returned by
		 * this function
		 *
		 * @since 1.2.10
		 */
		public static function llms_sidebar( $id ) {
			$id = 'sidebar';
			return $id;
		}



	}

endif;
Responsive_LifterLMS::get_instance();
