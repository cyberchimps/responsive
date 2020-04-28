<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Typography_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Typography_Customizer {

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
				'responsive_header_typography',
				array(
					'title'    => esc_html__( 'Typography', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 30,
				)
			);

			/**
			 * Title Heading.
			 */
			$site_title_separator_label = esc_html__( 'Site Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_site_title_separator', $site_title_separator_label, 'responsive_header_typography', 0 );

			/**
			 * Tagline Heading.
			 */
			$site_tagline_separator_label = esc_html__( 'Site Tagline', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_site_tagline_separator', $site_tagline_separator_label, 'responsive_header_typography', 2 );

			/**
			 * Header Widgets.
			 */
			$header_widgets_separator_label = esc_html__( 'Header Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widgets_separator', $header_widgets_separator_label, 'responsive_header_typography', 4 );

		}


	}

endif;

return new Responsive_Header_Typography_Customizer();
