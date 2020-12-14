<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Colors_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Colors_Customizer {

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
			 * Title Heading.
			 */
			$header_color_separator_label = esc_html__( 'Header Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_color_separator', $header_color_separator_label, 'responsive_header_layout', 50 );
			// Background Color.
			//
			$header_background_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_background', $header_background_label, 'responsive_header_layout', 60, Responsive\Core\get_responsive_customizer_defaults( 'header_background' ) );

			$header_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_border', $header_border_color_label, 'responsive_header_layout', 70, Responsive\Core\get_responsive_customizer_defaults( 'header_border' ) );

			$header_site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title', $header_site_title_color_label, 'responsive_header_layout', 80, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ) );

			$header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title_hover', $header_site_title_hover_color_label, 'responsive_header_layout', 90, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ) );

			$header_text_color_label = __( 'Site Tagline Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_text', $header_text_color_label, 'responsive_header_layout', 100, Responsive\Core\get_responsive_customizer_defaults( 'header_text' ) );

		}


	}

endif;

return new Responsive_Header_Colors_Customizer();
