<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If plugin - 'Lifter LMS' not exist then return.
if ( ! class_exists( 'LifterLMS' ) ) {
	return;
}

if ( ! class_exists( 'Responsive_LifterLMS_Panel' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_LifterLMS_Panel {

		/**
		 * Setup class.
		 *
		 * @since 4.8.2
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 4.8.2
		 */
		public function customizer_options( $wp_customize ) {

			$wp_customize->add_panel( 'responsive_lifterlms',
			array(
				'title'            => __( 'LifterLMS', 'responsive' ),
				'description'      => __( 'Course Modifications like course colums,layout preferences can be done here', 'responsive' ),
				'priority'    => 10,
			)
			);
		}
	}

endif;

return new Responsive_LifterLMS_Panel();
