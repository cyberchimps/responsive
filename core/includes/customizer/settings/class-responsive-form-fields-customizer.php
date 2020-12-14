<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Form_Fields_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Form_Fields_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			/**
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_form_fields',
				array(
					'title'    => __( 'Form Fields', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 10,
				)
			);

			// Inputs Padding (px).
			$inputs_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'inputs', 'responsive_form_fields', 15, 3, 3, null, $inputs_padding_label );

			// Inputs Radius.
			$inputs_radius_label = __( 'Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'inputs_radius', $inputs_radius_label, 'responsive_form_fields', 17, 0 );

			// Inputs Border Width.
			$inputs_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'inputs_border_width', $inputs_border_width_label, 'responsive_form_fields', 19, 1 );

			// Input Fields Typography.
			$inputs_typography_label = esc_html__( 'Form Fields Typography', 'responsive' );
			responsive_separator_control( $wp_customize, 'inputs_typography_separator', $inputs_typography_label, 'responsive_form_fields', 21 );

		}


	}

endif;

return new Responsive_Form_Fields_Customizer();
