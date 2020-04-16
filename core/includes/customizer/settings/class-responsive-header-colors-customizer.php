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
			$wp_customize->add_section(
				'responsive_header_colors',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 20,
				)
			);
			// Background Color.
			//
			$header_background_label = __( 'Background Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_background', $header_background_label, 'responsive_header_colors', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_background' ) );

			$header_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_border', $header_border_color_label, 'responsive_header_colors', 20, Responsive\Core\get_responsive_customizer_defaults( 'header_border' ) );

			$header_site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title', $header_site_title_color_label, 'responsive_header_colors', 30, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ) );

			$header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title_hover', $header_site_title_hover_color_label, 'responsive_header_colors', 40, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ) );

			$header_text_color_label = __( 'Site Tagline Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_text', $header_text_color_label, 'responsive_header_colors', 50, Responsive\Core\get_responsive_customizer_defaults( 'header_text' ) );

			/**
			 * Header Widget Separator.
			 */
			$header_widget_separator_label = esc_html__( 'Header Widget', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget_color_separator', $header_widget_separator_label, 'responsive_header_colors', 60, 'responsive_active_header_widget' );

			// Text Color.
			$menu_text_color_label = __( 'Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_widget_text', $menu_text_color_label, 'responsive_header_colors', 70, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ), 'responsive_active_header_widget' );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_background', $menu_background_color_label, 'responsive_header_colors', 80, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ), 'responsive_active_header_widget' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_border', $menu_border_color_label, 'responsive_header_colors', 90, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ), 'responsive_active_header_widget' );

			// Link Color.
			$menu_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link', $menu_link_color_label, 'responsive_header_colors', 100, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ), 'responsive_active_header_widget' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link_hover', $menu_link_hover_color_label, 'responsive_header_colors', 110, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ), 'responsive_active_header_widget' );

		}


	}

endif;

return new Responsive_Header_Colors_Customizer();
