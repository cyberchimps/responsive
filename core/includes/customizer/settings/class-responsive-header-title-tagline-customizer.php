<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Title_Tagline_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Title_Tagline_Customizer {

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
			 * Section for title.
			 */
			$wp_customize->add_section(
				'responsive_header_site_logo_title',
				array(
					'title'    => esc_html__( 'Logo', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10,

				)
			);

			/**
			 * Site title colors.
			 */
			$site_title_color_separator_label = esc_html__( 'Site Title Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_title_colors_separator', $site_title_color_separator_label, 'responsive_header_site_logo_title', 10 );

			$header_site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title', $header_site_title_color_label, 'responsive_header_site_logo_title', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ) );

			$header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_site_title_hover', $header_site_title_hover_color_label, 'responsive_header_site_logo_title', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ) );

			responsive_horizontal_separator_control($wp_customize, 'header_site_title_typo_separator', 2, 'responsive_header_site_logo_title', 13, 1, );

			/**
			 * Site Title Heading.
			 */
			$site_title_separator_label = esc_html__( 'Site Title Typography', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_site_title_typography_group', $site_title_separator_label, 'responsive_header_site_logo_title', 14, 'header_site_title_typography' );

			/**
			 * Site tagline colors.
			 */
			$site_tagline_color_separator_label = esc_html__( 'Site Tagline Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_tagline_colors_separator', $site_tagline_color_separator_label, 'responsive_header_site_logo_title', 10 );

			$header_text_color_label = __( 'Site Tagline Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_text', $header_text_color_label, 'responsive_header_site_logo_title', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_text' ) );

			responsive_horizontal_separator_control($wp_customize, 'header_site_tagline_typo_separator', 1, 'responsive_header_site_logo_title', 14, 1, );

			/**
			 * Site Tagline Heading.
			 */
			$site_tagline_separator_label = esc_html__( 'Site Tagline Typography', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_site_tagline_typography_group', $site_tagline_separator_label, 'responsive_header_site_logo_title', 15, 'header_site_tagline_typography' );

		}
	}

endif;

return new Responsive_Header_Title_Tagline_Customizer();
