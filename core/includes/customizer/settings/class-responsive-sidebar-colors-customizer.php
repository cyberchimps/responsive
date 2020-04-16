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
			$wp_customize->add_section(
				'responsive_sidebar_colors',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive_sidebar',
					'priority' => 20,
				)
			);

			// Heading Color.
			$sidebar_heading_color_label = __( 'Headings Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_headings', $sidebar_heading_color_label, 'responsive_sidebar_colors', 10, get_theme_mod( 'responsive_h4_text_color', '#333333' ) );

			// Background Color.
			$sidebar_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_background', $sidebar_background_color_label, 'responsive_sidebar_colors', 20, get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );

			// Text Color.
			$sidebar_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_text', $sidebar_text_color_label, 'responsive_sidebar_colors', 30, get_theme_mod( 'responsive_body_text_color', '#333333' ) );

			// Link Color.
			$sidebar_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_link', $sidebar_link_color_label, 'responsive_sidebar_colors', 40, get_theme_mod( 'responsive_link_color', '#0066CC' ) );

			// Link Hover Color.
			$sidebar_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sidebar_link_hover', $sidebar_link_hover_color_label, 'responsive_sidebar_colors', 50, get_theme_mod( 'responsive_link_hover_color', '#10659C' ) );

		}


	}

endif;

return new Responsive_Sidebar_Colors_Customizer();
