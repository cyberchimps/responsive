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

	if ( ! class_exists( 'Responsive_LifterLMS_Columns_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_LifterLMS_Columns_Customizer {

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

				$wp_customize->add_section( 'responsive_lifterlms_columns',
				array(
					'title'         => __( 'Columns', 'responsive' ),
					'priority'      => 2,
					'panel'         => 'responsive_lifterlms'
				)
				);

				$wp_customize->add_setting( 'lifterlms_columns' , array(
					'transport'   => 'postMessage',
				) );

				$wp_customize->add_control( new Responsive_Customizer_Range_Control( $wp_customize, 'lifterlms_columns', array(
					'label'	=>  'Cousre Columns',
					'input_attrs'     => array(
						'min'  => 1,
						'max'  => 6,
						'step' => 1,
					),
					'section' => 'responsive_lifterlms_columns',
				) ) );

			}
		}

	endif;

	return new Responsive_LifterLMS_Columns_Customizer();

}
