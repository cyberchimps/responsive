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
	 * Header mobile Builder Customizer Options */
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
			responsive_editor_control( $wp_customize, 'mobile_html_content', $mobile_html_content, 'responsive_customizer_mobile_html', 10, '<p>Enter HTML here!</p>', null, 'wp_kses_post', 'postMessage' );

			$mobile_wpautop = __( 'Automatically Add Paragraphs (Mobile)', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_html_wpautop', $mobile_wpautop, 'responsive_customizer_mobile_html', 15, 1 );

			$mobile_header_html_link_style_choices = array(
				'normal' => __( 'Underline', 'responsive' ),
				'noline' => __( 'No Underline', 'responsive' ),
			);
			$mobile_header_html_link_style         = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_header_html_link_style', $mobile_header_html_link_style, 'responsive_customizer_mobile_html', 20, $mobile_header_html_link_style_choices, 'normal', null );

			$mobile_html_text_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_html_text', $mobile_html_text_label, 'responsive_customizer_mobile_html', 25, '', null );

			$mobile_header_html_row_link_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_header_html_link', $mobile_header_html_row_link_label, 'responsive_customizer_mobile_html', 30, '', null );
			
			$mobile_header_html_row_link_hover_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_header_html_link_hover', $mobile_header_html_row_link_hover_label, 'responsive_customizer_mobile_html', 25, '', null );

			$mobile_header_html_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'mobile_header_html_typography_options_separator', $mobile_header_html_typography_options_label, 'responsive_customizer_mobile_html', 100 );

			$mobile_hedader_html_margin_top_label = esc_html__( 'Margin Top (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_header_html_margin_top', $mobile_hedader_html_margin_top_label, 'responsive_customizer_mobile_html', 140, null, null, 100, 1, 'postMessage' );

			$mobile_hedader_html_margin_right_label = esc_html__( 'Margin Right (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_header_html_margin_right', $mobile_hedader_html_margin_right_label, 'responsive_customizer_mobile_html', 145, null, null, 100, 1, 'postMessage' );

			$mobile_hedader_html_margin_bottom_label = esc_html__( 'Margin Bottom (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_header_html_margin_bottom', $mobile_hedader_html_margin_bottom_label, 'responsive_customizer_mobile_html', 150, null, null, 100, 1, 'postMessage' );

			$mobile_hedader_html_margin_left_label = esc_html__( 'Margin left (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_header_html_margin_left', $mobile_hedader_html_margin_left_label, 'responsive_customizer_mobile_html', 155, null, null, 100, 1, 'postMessage' );

		}

	}

endif;

return new Responsive_Mobile_HTML_Customizer();
