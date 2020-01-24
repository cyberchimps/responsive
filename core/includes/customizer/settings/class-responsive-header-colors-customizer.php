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
					'priority' => 2,
				)
			);
			// Background Color.
			//
			$header_background_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_background', $header_background_label, 'responsive_header_colors', 1, '#ffffff' );

			$header_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_border', $header_border_color_label, 'responsive_header_colors', 2, '#eaeaea' );

			$header_site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title', $header_site_title_color_label, 'responsive_header_colors', 3, '#333333' );

			$header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title_hover', $header_site_title_hover_color_label, 'responsive_header_colors', 4, '#10659C' );

			$header_text_color_label = __( 'Site Tagline Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_text', $header_text_color_label, 'responsive_header_colors', 5, '#999999' );

			/**
			 * Header Widget Separator.
			 */
			$header_widget_separator_label = esc_html__( 'Header Widget', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget_color_separator', $header_widget_separator_label, 'responsive_header_colors', 6, 'responsive_active_header_widget' );

			// Text Color.
			$menu_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_text', $menu_text_color_label, 'responsive_header_colors', 7, '#333333', 'responsive_active_header_widget' );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_background', $menu_background_color_label, 'responsive_header_colors', 8, '#ffffff', 'responsive_active_header_widget' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_border', $menu_border_color_label, 'responsive_header_colors', 9, '#eaeaea', 'responsive_active_header_widget' );

			// Link Color.
			$menu_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link', $menu_link_color_label, 'responsive_header_colors', 10, '#0066CC', 'responsive_active_header_widget' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link_hover', $menu_link_hover_color_label, 'responsive_header_colors', 11, '#10659C', 'responsive_active_header_widget' );

		}


	}

endif;

return new Responsive_Header_Colors_Customizer();
