<?php
/**
 * Create Sensei Content section in customizer
 *
 * @package Responsive
 */

if ( class_exists( 'LifterLMS' ) ) {
	/**
	 * Sensei Customizer Options
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

				// Text Options Section Inside Theme
				$wp_customize->add_section( 'responsive_lifterlms_columns',
				array(
					'title'         => __( 'Columns', 'responsive' ),
					'priority'      => 2,
					'panel'         => 'responsive_lifterlms'
				)
				);

				// // Setting for Copyright text.
				// $wp_customize->add_setting( 'responsive_dosth_copyright_text',
				// array(
				// 	'default'           => __( 'All rights reserved ', 'responsive' ),
				// 	'sanitize_callback' => 'sanitize_text_field',
				// 	'transport'         => 'refresh',
				// )
				// );

				// // Control for Copyright text
				// $wp_customize->add_control( 'responsive_dosth_copyright_text',
				// array(
				// 	'type'        => 'text',
				// 	'priority'    => 10,
				// 	'section'     => 'responsive_lifterlms_columns',
				// 	'label'       => 'Copyright text',
				// 	'description' => 'Text put here will be outputted in the footer',
				// )
				// );



				$wp_customize->add_setting( 'lifterlms_columns' , array(
					'default'     => 3,
					'transport'   => 'postMessage',
				) );

				$wp_customize->add_control( new Responsive_Customizer_Range_Control( $wp_customize, 'lifterlms_columns', array(
					'label'	=>  'Cousre Columns',
					'input_attrs'     => array(
						'min'  => 1,
						'max'  => 4,
						'step' => 1,
					),
					'section' => 'responsive_lifterlms_columns',
				) ) );

				// $wp_customize->selective_refresh->add_partial( 'lifterlms_columns', array(
				// 	'selector'            => '#primary',
				// 	'container_inclusive' => true,
				// 	'render_callback'     => 'before_main_content_start',
				// 	'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
				// ) );



			}
		}

	endif;

	return new Responsive_LifterLMS_Columns_Customizer();

}
