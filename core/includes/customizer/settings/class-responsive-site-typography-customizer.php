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
					'priority' => 30,
				)
			);

			// Body Typography.
			$body_typography_label = esc_html__( 'Body', 'responsive' );
			responsive_separator_control( $wp_customize, 'body_typography_separator', $body_typography_label, 'responsive_typography', 1 );

			// Main Content Width.
			$paragraph_margin_label = esc_html__( 'Paragraph Margin Bottom', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'paragraph_margin_bottom', $paragraph_margin_label, 'responsive_typography', 3, '', null, 5, 1, 'postMessage', 0.1 );

			// ALL heading Typography.
			$all_heading_typography_label = esc_html__( 'All Headings (H1 - H6)', 'responsive' );
			responsive_separator_control( $wp_customize, 'all_heading_typography_separator', $all_heading_typography_label, 'responsive_typography', 4 );

			// H1 Typography.
			$h1_typography_label = esc_html__( 'Heading 1 (H1)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h1_typography_separator', $h1_typography_label, 'responsive_typography', 6 );

			// H2 Typography.
			$h2_typography_label = esc_html__( 'Heading 2 (H2)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h2_typography_separator', $h2_typography_label, 'responsive_typography', 8 );

			// H3 Typography.
			$h3_typography_label = esc_html__( 'Heading 3 (H3)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h3_typography_separator', $h3_typography_label, 'responsive_typography', 10 );

			// H4 Typography.
			$h4_typography_label = esc_html__( 'Heading 4 (H4)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h4_typography_separator', $h4_typography_label, 'responsive_typography', 12 );

			// H5 Typography.
			$h5_typography_label = esc_html__( 'Heading 5 (H5)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h5_typography_separator', $h5_typography_label, 'responsive_typography', 14 );

			// H6 Typography.
			$h6_typography_label = esc_html__( 'Heading 6 (H6)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h6_typography_separator', $h6_typography_label, 'responsive_typography', 16 );

			// Meta Typography.
			$meta_typography_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'meta_typography_separator', $meta_typography_label, 'responsive_typography', 18 );

		}


	}

endif;

return new Responsive_Site_Typography_Customizer();
