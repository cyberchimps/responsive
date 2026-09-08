<?php
/**
 * Content Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Content_Header_Colors_Customizer' ) ) :
	/**
	 * Content Header Customizer Options */
	class Responsive_Content_Header_Colors_Customizer {

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

			$content_header_color_label = esc_html__( 'Content Header Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'content_header_color', $content_header_color_label, 'responsive_content_header_layout', 40 );

			// Title Color.
			$content_header_heading_color_label = __( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'content_header_heading', $content_header_heading_color_label, 'responsive_content_header_layout', 50, Responsive\Core\get_responsive_customizer_defaults( 'content_header_heading' ), null, null );

			// Header Description.
			$content_header_description_color_label = __( 'Description Color', 'responsive' );
			responsive_color_control( $wp_customize, 'content_header_description', $content_header_description_color_label, 'responsive_content_header_layout', 60, Responsive\Core\get_responsive_customizer_defaults( 'content_header_description' ), null, null );

			// Breadcrumb Text Color.
			$breadcrumb_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb', $breadcrumb_color_label, 'responsive_breadcrumb', 70, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb' ), null, '', false, null, null, false, null, null, 'color', 'refresh' );

			// Breadcrumb Link Color
			$breadcrumb_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb_link', $breadcrumb_link_color_label, 'responsive_breadcrumb', 72, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb_link' ), null, '', false, null, null, false, null, null, 'color', 'refresh' );

			// Breadcrumb Link Hover Color
			$breadcrumb_link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb_link_hover', $breadcrumb_link_hover_color_label, 'responsive_breadcrumb', 73, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb_link_hover' ), null, '', false, null, null, false, null, null, 'color', 'refresh' );

			// Breadcrumb Background Color
			$breadcrumb_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb_background', $breadcrumb_background_color_label, 'responsive_breadcrumb', 74, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb_background' ), null, '', false, null, null, false, null, null, 'color', 'refresh' );

			// Breadcrumb Separator Color
			$breadcrumb_separator_color_label = __( 'Separator Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb_separator', $breadcrumb_separator_color_label, 'responsive_breadcrumb', 75, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb_separator_color' ), 'responsive_active_breadcrumb_separator', '', false, null, null, false, null, null, 'color', 'refresh' );

			// Breadcrumb Background Separator
			responsive_horizontal_separator_control($wp_customize, 'breadcrumb_background_separator', 1, 'responsive_breadcrumb', 76, 1, );			
		}


	}

endif;

return new Responsive_Content_Header_Colors_Customizer();
