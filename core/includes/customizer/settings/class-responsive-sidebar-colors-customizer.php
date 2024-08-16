<?php
/**
 * Sidebar Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Sidebar_Colors_Customizer' ) ) :
	/**
	 * Sidebar Customizer Options */
	class Responsive_Sidebar_Colors_Customizer {

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

			// Background Color.
			$sidebar_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_background', $sidebar_background_color_label, 'responsive_sidebar', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_box_background_color' ) );

			responsive_horizontal_separator_control($wp_customize, 'sidebar_background_separator', 1, 'responsive_sidebar', 12, 1, );

			// Heading Color.
			$sidebar_heading_color_label = __( 'Headings Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_headings', $sidebar_heading_color_label, 'responsive_sidebar', 20, Responsive\Core\get_responsive_customizer_defaults( 'responsive_h4_text_color' ) );

			responsive_horizontal_separator_control($wp_customize, 'sidebar_headings_separator', 1, 'responsive_sidebar', 22, 1, );

			// Text Color.
			$sidebar_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_text', $sidebar_text_color_label, 'responsive_sidebar', 30, Responsive\Core\get_responsive_customizer_defaults( 'responsive_body_text_color' ) );

			responsive_horizontal_separator_control($wp_customize, 'sidebar_text_separator', 1, 'responsive_sidebar', 32, 1, );

			// Link Color.
			$sidebar_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_link', $sidebar_link_color_label, 'responsive_sidebar', 40, Responsive\Core\get_responsive_customizer_defaults( 'responsive_link_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_link_hover_color' ), 'sidebar_link_hover' );

			responsive_horizontal_separator_control($wp_customize, 'sidebar_link_separator', 1, 'responsive_sidebar', 42, 1, );

		}


	}

endif;

return new Responsive_Sidebar_Colors_Customizer();
