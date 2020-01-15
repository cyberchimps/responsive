<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Typography_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Typography_Customizer {

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
			 * Typography.
			 */
			$wp_customize->add_section(
				'responsive_typography',
				array(
					'title'    => __( 'Typography', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 3,
				)
			);

			// Body Typography.
			$body_typography_label = esc_html__( 'Body', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_body_typography', $body_typography_label, 'responsive_typography', 1 );

			// H1 Typography.
			$h1_typography_label = esc_html__( 'Heading 1 (H1)', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_h1_typography', $h1_typography_label, 'responsive_typography', 3 );

			// H2 Typography.
			$h2_typography_label = esc_html__( 'Heading 2 (H2)', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_h2_typography', $h2_typography_label, 'responsive_typography', 5 );

			// H3 Typography.
			$h3_typography_label = esc_html__( 'Heading 3 (H3)', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_h3_typography', $h3_typography_label, 'responsive_typography', 7 );

			// H4 Typography.
			$h4_typography_label = esc_html__( 'Heading 4 (H4)', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_h4_typography', $h4_typography_label, 'responsive_typography', 9 );

			// H5 Typography.
			$h5_typography_label = esc_html__( 'Heading 5 (H5)', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_h5_typography', $h5_typography_label, 'responsive_typography', 11 );

			// H6 Typography.
			$h6_typography_label = esc_html__( 'Heading 6 (H6)', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_h6_typography', $h6_typography_label, 'responsive_typography', 13 );

			// Meta Typography.
			$meta_typography_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_meta_typography', $meta_typography_label, 'responsive_typography', 15 );
		}


	}

endif;

return new Responsive_Site_Typography_Customizer();
