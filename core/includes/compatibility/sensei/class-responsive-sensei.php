<?php
/**
 * Sensei Compatibility File.
 *
 * @package Responsive
 */

// If plugin - 'Sensei' not exist then return.
if ( ! class_exists( 'Sensei_Main' ) ) {
	return;
}

/**
 * Responsive Sensei Compatibility
 */
if ( ! class_exists( 'Responsive_Sensei' ) ) :

	/**
	 * Responsive Sensei Compatibility
	 *
	 * @since 4.3.0
	 */
	class Responsive_Sensei {



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

			add_action( 'customize_register', array( $this, 'customize_register' ), 2 );
		}
		/**
		 * Register Customizer sections and panel for Sensei
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @since 4.3.0
		 */
		public function customize_register( $wp_customize ) {
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/sensei/customizer/settings/class-responsive-sensei-panel.php';
			require RESPONSIVE_THEME_DIR . 'core/includes/compatibility/sensei/customizer/settings/class-responsive-sensei-content-customizer.php';
		}

	}

endif;
Responsive_Sensei::get_instance();
