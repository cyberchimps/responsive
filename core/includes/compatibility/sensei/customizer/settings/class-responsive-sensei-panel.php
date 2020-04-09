<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Sensei_Panel' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Sensei_Panel {

		/**
		 * Setup class.
		 *
		 * @since 4.3.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 * @since 4.3.0
		 */
		public function customizer_options( $wp_customize ) {

			$wp_customize->add_panel(
				'responsive-sensei-settings',
				array(
					'title'       => __( 'Sensei LMS', 'responsive' ),
					'description' => __( 'Sensei Settings', 'responsive' ),
					'priority'    => 185,
				)
			);
		}
	}

endif;

return new Responsive_Sensei_Panel();
