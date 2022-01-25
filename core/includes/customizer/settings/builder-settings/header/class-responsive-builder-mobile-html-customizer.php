<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Mobile_HTML_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Mobile_HTML_Customizer {

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
				'responsive_customizer_mobile_html',
				array(
					'title'    => esc_html__( 'Mobile HTML & Text', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 230,
				)
			);

			// Mobile HTML content.
			$mobile_html_content = __( 'Mobile HTML content', 'responsive' );
			responsive_text_control( $wp_customize, 'mobile_html_content', $mobile_html_content, 'responsive_customizer_mobile_html', 10, '<p>Enter HTML here!</p>', null, 'sanitize_text_field', 'textarea' );

			$mobile_wpautop = __( 'Automatically Add Paragraphs (Mobile)', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_html_wpautop', $mobile_wpautop, 'responsive_customizer_mobile_html', 15, 1 );

			$mobile_header_html_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'mobile_header_html_typography_options_separator', $mobile_header_html_typography_options_label, 'responsive_customizer_mobile_html', 100 );

		}

	}

endif;

return new Responsive_Mobile_HTML_Customizer();
