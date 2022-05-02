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
	 * Header header Builder Customizer Options */
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

			$header_html_link_style_choices = array(
				'normal' => __( 'Underline', 'responsive' ),
				'noline' => __( 'No Underline', 'responsive' ),
			);

			$header_html_link_style = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_html_link_style', $header_html_link_style, 'responsive_customizer_header_html', 20, $header_html_link_style_choices, 'normal', null );

			$header_html_text_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_html_text', $header_html_text_label, 'responsive_customizer_header_html', 25, '', null );

			$header_html_row_link_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_html_link', $header_html_row_link_label, 'responsive_customizer_header_html', 30, '', null );

			$header_html_row_link_hover_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_html_link_hover', $header_html_row_link_hover_label, 'responsive_customizer_header_html', 35, '', null );

			$header_html_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_html_typography_options_separator', $header_html_typography_options_label, 'responsive_customizer_header_html', 100 );

			$hedader_html_margin_top_label = esc_html__( 'Margin Top (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_html_margin_top', $hedader_html_margin_top_label, 'responsive_customizer_header_html', 140, null, null, 100, 1, 'postMessage' );

			$hedader_html_margin_right_label = esc_html__( 'Margin Right (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_html_margin_right', $hedader_html_margin_right_label, 'responsive_customizer_header_html', 145, null, null, 100, 1, 'postMessage' );

			$hedader_html_margin_bottom_label = esc_html__( 'Margin Bottom (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_html_margin_bottom', $hedader_html_margin_bottom_label, 'responsive_customizer_header_html', 150, null, null, 100, 1, 'postMessage' );

			$hedader_html_margin_left_label = esc_html__( 'Margin left (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_html_margin_left', $hedader_html_margin_left_label, 'responsive_customizer_header_html', 155, null, null, 100, 1, 'postMessage' );

		}

	}

endif;

return new Responsive_Header_HTML_Customizer();
