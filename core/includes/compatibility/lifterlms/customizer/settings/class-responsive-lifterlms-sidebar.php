<?php
/**
 * Create LifterLMS Content section in customizer
 *
 * @package Responsive
 */

if ( class_exists( 'LifterLMS' ) ) {
	/**
	 * LifterLMS Customizer Options
	 *
	 * @package Responsive WordPress theme
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'Responsive_LifterLMS_Sidebar_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_LifterLMS_Sidebar_Customizer {

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
			 * @since 4.8.2
			 */
			public function customizer_options( $wp_customize ) {

				// Text Options Section Inside Theme
				$wp_customize->add_section( 'responsive_lifterlms_sidebar',
				array(
					'title'         => __( 'Sidebar', 'responsive' ),
					'priority'      => 3,
					'panel'         => 'responsive_lifterlms'
				)
				);

				//Sidebar 1
				$wp_customize->add_setting( 'lifter_page_sidebar_position' , array(
					'default'     => 'right',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'   => 'refresh',
				) );

				$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifter_page_sidebar_position', array(
					'label'	=>  'Course Archive Sidebar Position',
					'choices' 	=> array(
					'right'         => esc_html__( 'Right Sidebar', 'responsive' ),
					'left' => esc_html__( 'Left Sidebar', 'responsive' ),
					'no'          => esc_html__( 'No Sidebar', 'responsive' ),
					),
					'section' => 'responsive_lifterlms_sidebar',
				) ) );
			}
		}

	endif;

	return new Responsive_LifterLMS_Sidebar_Customizer();

}
