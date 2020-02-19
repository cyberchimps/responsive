<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Colors_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Colors_Customizer {

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
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_colors',
				array(
					'title'    => __( 'Colors', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 20,
				)
			);

			$wp_customize->remove_section( 'header_image' );
			$wp_customize->get_control( 'background_color' )->section  = 'responsive_colors';
			$wp_customize->get_setting( 'background_color' )->default  = 'eaeaea';
			$wp_customize->get_control( 'background_color' )->priority = 11;
			$wp_customize->get_control( 'background_image' )->section  = 'responsive_colors';
			$wp_customize->get_control( 'background_image' )->priority = 20;
			$wp_customize->remove_section( 'background_image' );

			// Backgrounds.
			$site_background_label = esc_html__( 'Backgrounds', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_site_background_separator', $site_background_label, 'responsive_colors', 10 );

			// Box Background Color.
			$box_background_color_label = __( 'Box Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'box_background', $box_background_color_label, 'responsive_colors', 20, '#ffffff', 'responsive_not_active_site_style_flat' );

			// Alt Background Color for pre prequotes blockquotes etc.
			$alt_background_color_label = __( 'Alternate Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'alt_background', $alt_background_color_label, 'responsive_colors', 21, '#eaeaea', null, 'Used for pre, blockquotes, code etc.' );

			// Texts.
			$general_texts_label = esc_html__( 'General Text', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_texts_separator', $general_texts_label, 'responsive_colors', 29 );

			// Body Text Color.
			$body_text_color_label = __( 'Body Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'body_text', $body_text_color_label, 'responsive_colors', 30, '#333333' );

			// Heading 1 (H1) Color.
			$h1_text_color_label = __( 'Heading 1 (H1) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h1_text', $h1_text_color_label, 'responsive_colors', 40, '#333333' );

			// Heading 2 (H2) Color.
			$h2_text_color_label = __( 'Heading 2 (H2) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h2_text', $h2_text_color_label, 'responsive_colors', 50, '#333333' );

			// Heading 3 (H3) Color.
			$h3_text_color_label = __( 'Heading 3 (H3) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h3_text', $h3_text_color_label, 'responsive_colors', 60, '#333333' );

			// Heading 4 (H4) Color.
			$h4_text_color_label = __( 'Heading 4 (H4) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h4_text', $h4_text_color_label, 'responsive_colors', 70, '#333333' );

			// Heading 5 (H5) Color.
			$h5_text_color_label = __( 'Heading 5 (H5) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h5_text', $h5_text_color_label, 'responsive_colors', 80, '#333333' );

			// Heading 6 (H6) Color.
			$h6_text_color_label = __( 'Heading 6 (H6) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h6_text', $h6_text_color_label, 'responsive_colors', 90, '#333333' );

			// Meta Text Color.
			$meta_text_color_label = __( 'Meta Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'meta_text', $meta_text_color_label, 'responsive_colors', 100, '#999999' );

			// Links.
			$general_links_label = esc_html__( 'Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_links_separator', $general_links_label, 'responsive_colors', 110 );

			// Link Color.
			$link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'link', $link_color_label, 'responsive_colors', 110, '#0066CC' );

			// Link Hover Color.
			$link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'link_hover', $link_hover_color_label, 'responsive_colors', 120, '#10659C' );

			// Buttons.
			$general_buttons_label = esc_html__( 'Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_colors', 130 );

			// Button Color.
			$button_color_label = __( 'Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_colors', 130, '#0066CC' );

			// Button Hover Color.
			$button_hover_color_label = __( 'Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover', $button_hover_color_label, 'responsive_colors', 140, '#10659C' );

			// Button Text Color.
			$button_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_colors', 150, '#FFFFFF' );

			// Button Hover Text Color.
			$button_hover_text_color_label = __( 'Hover Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_text', $button_hover_text_color_label, 'responsive_colors', 160, '#FFFFFF' );

			// Button Border Color.
			$button_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_border', $button_border_color_label, 'responsive_colors', 170, '#10659C' );

			// Button Hover Border Color.
			$button_hover_border_color_label = __( 'Hover Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_border', $button_hover_border_color_label, 'responsive_colors', 180, '#0066CC' );

			// Inputs.
			$general_inputs_label = esc_html__( 'Inputs', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_inputs_separator', $general_inputs_label, 'responsive_colors', 190 );

			// Inputs background Color.
			$inputs_color_label = __( 'Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_background', $inputs_color_label, 'responsive_colors', 200, '#ffffff' );

			// Inputs Text Color.
			$inputs_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_text', $inputs_text_color_label, 'responsive_colors', 210, '#333333' );

			// Inputs Border Color.
			$inputs_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_border', $inputs_border_color_label, 'responsive_colors', 220, '#cccccc' );

			// Labels.
			$label_label = esc_html__( 'Labels', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_labels_separator', $label_label, 'responsive_colors', 230 );

			// Label Color.
			$label_color_label = __( 'Label Color', 'responsive' );
			responsive_color_control( $wp_customize, 'label', $inputs_text_color_label, 'responsive_colors', 240, '#333333' );

		}


	}

endif;

return new Responsive_Site_Colors_Customizer();
