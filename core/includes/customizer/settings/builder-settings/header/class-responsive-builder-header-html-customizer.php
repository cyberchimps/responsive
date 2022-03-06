<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_HTML_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Header_HTML_Customizer {

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
			 * Header Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_header_html',
				array(
					'title'    => esc_html__( 'Header HTML & Text', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 220,
				)
			);

			// HTML content.
			$header_html_content = __( 'HTML content', 'responsive' );
			responsive_editor_control( $wp_customize, 'header_html_content', $header_html_content, 'responsive_customizer_header_html', 10, '<p>Enter HTML here!</p>', null, 'wp_kses_post', 'postMessage' );

			$wpautop = __( 'Automatically Add Paragraphs', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_html_wpautop', $wpautop, 'responsive_customizer_header_html', 15, 1 );

			$header_html_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_html_typography_options_separator', $header_html_typography_options_label, 'responsive_customizer_header_html', 100 );

		}

	}

endif;

return new Responsive_Header_HTML_Customizer();
