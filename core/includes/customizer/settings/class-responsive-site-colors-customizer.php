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

			responsive_color_control( $wp_customize, 'box_background', $box_background_color_label, 'responsive_colors', 20, Responsive\Core\get_responsive_customizer_defaults( 'box_background' ), 'responsive_not_active_site_style_flat' );

			// Alt Background Color for pre prequotes blockquotes etc.
			$alt_background_color_label = __( 'Alternate Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'alt_background', $alt_background_color_label, 'responsive_colors', 21, Responsive\Core\get_responsive_customizer_defaults( 'alt_background' ), null, 'Used for pre, blockquotes, code etc.' );

			// Texts.
			$general_texts_label = esc_html__( 'General Text', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_texts_separator', $general_texts_label, 'responsive_colors', 29 );

			// Body Text Color.
			$body_text_color_label = __( 'Body Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'body_text', $body_text_color_label, 'responsive_colors', 30, Responsive\Core\get_responsive_customizer_defaults( 'body_text' ) );

			// All Headings Color.
			$all_heading_color_label = __( 'All Headings (H1 - H6)', 'responsive' );
			responsive_color_control( $wp_customize, 'all_heading_text', $all_heading_color_label, 'responsive_colors', 35, '#333333' );

			// Heading 1 (H1) Color.
			$h1_text_color_label = __( 'Heading 1 (H1) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h1_text', $h1_text_color_label, 'responsive_colors', 40, Responsive\Core\get_responsive_customizer_defaults( 'h1_text' ) );

			// Heading 2 (H2) Color.
			$h2_text_color_label = __( 'Heading 2 (H2) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h2_text', $h2_text_color_label, 'responsive_colors', 50, Responsive\Core\get_responsive_customizer_defaults( 'h2_text' ) );

			// Heading 3 (H3) Color.
			$h3_text_color_label = __( 'Heading 3 (H3) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h3_text', $h3_text_color_label, 'responsive_colors', 60, Responsive\Core\get_responsive_customizer_defaults( 'h3_text' ) );

			// Heading 4 (H4) Color.
			$h4_text_color_label = __( 'Heading 4 (H4) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h4_text', $h4_text_color_label, 'responsive_colors', 70, Responsive\Core\get_responsive_customizer_defaults( 'h4_text' ) );

			// Heading 5 (H5) Color.
			$h5_text_color_label = __( 'Heading 5 (H5) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h5_text', $h5_text_color_label, 'responsive_colors', 80, Responsive\Core\get_responsive_customizer_defaults( 'h5_text' ) );

			// Heading 6 (H6) Color.
			$h6_text_color_label = __( 'Heading 6 (H6) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h6_text', $h6_text_color_label, 'responsive_colors', 90, Responsive\Core\get_responsive_customizer_defaults( 'h6_text' ) );

			// Meta Text Color.
			$meta_text_color_label = __( 'Meta Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'meta_text', $meta_text_color_label, 'responsive_colors', 100, Responsive\Core\get_responsive_customizer_defaults( 'meta_text' ) );


			// Links.
			$general_links_label = esc_html__( 'Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_links_separator', $general_links_label, 'responsive_colors', 110 );

			// Link Color.
			$link_color_label = __( 'Link Color', 'responsive' );

			responsive_color_control( $wp_customize, 'link', $link_color_label, 'responsive_colors', 110, Responsive\Core\get_responsive_customizer_defaults( 'link' ) );

			// Link Hover Color.
			$link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'link_hover', $link_hover_color_label, 'responsive_colors', 120, Responsive\Core\get_responsive_customizer_defaults( 'link_hover' ) );


			// Buttons.
			$general_buttons_label = esc_html__( 'Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_colors', 130 );

			// Button Color.
			$button_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_colors', 130, Responsive\Core\get_responsive_customizer_defaults( 'button' ) );

			// Button Hover Color.
			$button_hover_color_label = __( 'Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover', $button_hover_color_label, 'responsive_colors', 140, Responsive\Core\get_responsive_customizer_defaults( 'button_hover' ) );

			// Button Text Color.
			$button_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_colors', 150, Responsive\Core\get_responsive_customizer_defaults( 'button_text' ) );

			// Button Hover Text Color.
			$button_hover_text_color_label = __( 'Hover Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_text', $button_hover_text_color_label, 'responsive_colors', 160, Responsive\Core\get_responsive_customizer_defaults( 'button_hover_text' ) );

			// Button Border Color.
			$button_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_border', $button_border_color_label, 'responsive_colors', 170, Responsive\Core\get_responsive_customizer_defaults( 'button_border' ) );

			// Button Hover Border Color.
			$button_hover_border_color_label = __( 'Hover Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_border', $button_hover_border_color_label, 'responsive_colors', 180, Responsive\Core\get_responsive_customizer_defaults( 'button_hover_border' ) );

			// Inputs.
			$general_inputs_label = esc_html__( 'Inputs', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_inputs_separator', $general_inputs_label, 'responsive_colors', 190 );

			// Inputs background Color.
			$inputs_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'inputs_background', $inputs_color_label, 'responsive_colors', 200, Responsive\Core\get_responsive_customizer_defaults( 'inputs_background' ) );

			// Inputs Text Color.
			$inputs_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_text', $inputs_text_color_label, 'responsive_colors', 210, Responsive\Core\get_responsive_customizer_defaults( 'inputs_text' ) );

			// Inputs Border Color.
			$inputs_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_border', $inputs_border_color_label, 'responsive_colors', 220, Responsive\Core\get_responsive_customizer_defaults( 'inputs_border' ) );

			// Labels.
			$label_label = esc_html__( 'Labels', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_labels_separator', $label_label, 'responsive_colors', 230 );

			// Label Color.
			$label_color_label = __( 'Label Color', 'responsive' );

			responsive_color_control( $wp_customize, 'label', $inputs_text_color_label, 'responsive_colors', 240, Responsive\Core\get_responsive_customizer_defaults( 'label' ) );


		}


	}

endif;

return new Responsive_Site_Colors_Customizer();
