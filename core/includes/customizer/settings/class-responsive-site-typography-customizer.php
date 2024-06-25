<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Typography_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Typography_Customizer {

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
			 * Typography.
			 */
			$wp_customize->add_section(
				'responsive_typography',
				array(
					'title'    => __( 'Typography', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 30,
				)
			);

			$tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_responsive_general_texts_separator',
				$tab_ids_prefix . 'responsive_body_text_color',
				$tab_ids_prefix . 'responsive_all_heading_text_color',
				$tab_ids_prefix . 'responsive_h1_text_color',
				$tab_ids_prefix . 'responsive_h2_text_color',
				$tab_ids_prefix . 'responsive_h3_text_color',
				$tab_ids_prefix . 'responsive_h4_text_color',
				$tab_ids_prefix . 'responsive_h5_text_color',
				$tab_ids_prefix . 'responsive_h6_text_color',
				$tab_ids_prefix . 'responsive_meta_text_color',
			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_body_typography_separator',
				$tab_ids_prefix . 'body_typography-font-family',
				$tab_ids_prefix . 'body_typography-font-weight',
				$tab_ids_prefix . 'body_typography-font-style',
				$tab_ids_prefix . 'body_typography-text-transform',
				$tab_ids_prefix . 'body_typography-font-size',
				$tab_ids_prefix . 'body_typography-line-height',
				$tab_ids_prefix . 'body_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_paragraph_margin_bottom',
				$tab_ids_prefix . 'responsive_all_heading_typography_separator',
				$tab_ids_prefix . 'headings_typography-font-family',
				$tab_ids_prefix . 'headings_typography-font-weight',
				$tab_ids_prefix . 'headings_typography-text-transform',
				$tab_ids_prefix . 'headings_typography-line-height',
				$tab_ids_prefix . 'headings_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_h1_typography_separator',
				$tab_ids_prefix . 'heading_h1_typography-font-family',
				$tab_ids_prefix . 'heading_h1_typography-font-weight',
				$tab_ids_prefix . 'heading_h1_typography-font-style',
				$tab_ids_prefix . 'heading_h1_typography-text-transform',
				$tab_ids_prefix . 'heading_h1_typography-font-size',
				$tab_ids_prefix . 'heading_h1_typography-line-height',
				$tab_ids_prefix . 'heading_h1_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_h2_typography_separator',
				$tab_ids_prefix . 'heading_h2_typography-font-family',
				$tab_ids_prefix . 'heading_h2_typography-font-weight',
				$tab_ids_prefix . 'heading_h2_typography-font-style',
				$tab_ids_prefix . 'heading_h2_typography-text-transform',
				$tab_ids_prefix . 'heading_h2_typography-font-size',
				$tab_ids_prefix . 'heading_h2_typography-line-height',
				$tab_ids_prefix . 'heading_h2_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_h3_typography_separator',
				$tab_ids_prefix . 'heading_h3_typography-font-weight',
				$tab_ids_prefix . 'heading_h3_typography-font-family',
				$tab_ids_prefix . 'heading_h3_typography-font-style',
				$tab_ids_prefix . 'heading_h3_typography-text-transform',
				$tab_ids_prefix . 'heading_h3_typography-font-size',
				$tab_ids_prefix . 'heading_h3_typography-line-height',
				$tab_ids_prefix . 'heading_h3_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_h4_typography_separator',
				$tab_ids_prefix . 'heading_h4_typography-font-family',
				$tab_ids_prefix . 'heading_h4_typography-font-weight',
				$tab_ids_prefix . 'heading_h4_typography-font-style',
				$tab_ids_prefix . 'heading_h4_typography-text-transform',
				$tab_ids_prefix . 'heading_h4_typography-font-size',
				$tab_ids_prefix . 'heading_h4_typography-line-height',
				$tab_ids_prefix . 'heading_h4_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_h5_typography_separator',
				$tab_ids_prefix . 'heading_h5_typography-font-family',
				$tab_ids_prefix . 'heading_h5_typography-font-weight',
				$tab_ids_prefix . 'heading_h5_typography-font-style',
				$tab_ids_prefix . 'heading_h5_typography-text-transform',
				$tab_ids_prefix . 'heading_h5_typography-font-size',
				$tab_ids_prefix . 'heading_h5_typography-line-height',
				$tab_ids_prefix . 'heading_h5_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_h6_typography_separator',
				$tab_ids_prefix . 'heading_h6_typography-font-family',
				$tab_ids_prefix . 'heading_h6_typography-font-weight',
				$tab_ids_prefix . 'heading_h6_typography-font-style',
				$tab_ids_prefix . 'heading_h6_typography-text-transform',
				$tab_ids_prefix . 'heading_h6_typography-font-size',
				$tab_ids_prefix . 'heading_h6_typography-line-height',
				$tab_ids_prefix . 'heading_h6_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_meta_typography_separator',
				$tab_ids_prefix . 'meta_typography-font-family',
				$tab_ids_prefix . 'meta_typography-font-weight',
				$tab_ids_prefix . 'meta_typography-font-style',
				$tab_ids_prefix . 'meta_typography-text-transform',
				$tab_ids_prefix . 'meta_typography-font-size',
				$tab_ids_prefix . 'meta_typography-line-height',
				$tab_ids_prefix . 'meta_typography-letter-spacing',
			);

			responsive_tabs_button_control( $wp_customize, 'global_typography_tabs', $tabs_label, 'responsive_typography', 0, '', 'responsive_typography_general_tab', 'responsive_typography_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Body Typography.
			$body_typography_label = esc_html__( 'Body', 'responsive' );
			responsive_separator_control( $wp_customize, 'body_typography_separator', $body_typography_label, 'responsive_typography', 1 );

			// Main Content Width.
			$paragraph_margin_label = esc_html__( 'Paragraph Margin Bottom', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'paragraph_margin_bottom', $paragraph_margin_label, 'responsive_typography', 3, '', null, 5, 1, 'postMessage', 0.1 );

			// ALL heading Typography.
			$all_heading_typography_label = esc_html__( 'All Headings (H1 - H6)', 'responsive' );
			responsive_separator_control( $wp_customize, 'all_heading_typography_separator', $all_heading_typography_label, 'responsive_typography', 4 );

			// H1 Typography.
			$h1_typography_label = esc_html__( 'Heading 1 (H1)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h1_typography_separator', $h1_typography_label, 'responsive_typography', 6 );

			// H2 Typography.
			$h2_typography_label = esc_html__( 'Heading 2 (H2)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h2_typography_separator', $h2_typography_label, 'responsive_typography', 8 );

			// H3 Typography.
			$h3_typography_label = esc_html__( 'Heading 3 (H3)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h3_typography_separator', $h3_typography_label, 'responsive_typography', 10 );

			// H4 Typography.
			$h4_typography_label = esc_html__( 'Heading 4 (H4)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h4_typography_separator', $h4_typography_label, 'responsive_typography', 12 );

			// H5 Typography.
			$h5_typography_label = esc_html__( 'Heading 5 (H5)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h5_typography_separator', $h5_typography_label, 'responsive_typography', 14 );

			// H6 Typography.
			$h6_typography_label = esc_html__( 'Heading 6 (H6)', 'responsive' );
			responsive_separator_control( $wp_customize, 'h6_typography_separator', $h6_typography_label, 'responsive_typography', 16 );

			// Meta Typography.
			$meta_typography_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'meta_typography_separator', $meta_typography_label, 'responsive_typography', 18 );

			// Texts.
			$general_texts_label = esc_html__( 'General Text', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_texts_separator', $general_texts_label, 'responsive_typography', 29 );

			// Body Text Color.
			$body_text_color_label = __( 'Body Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'body_text', $body_text_color_label, 'responsive_typography', 30, Responsive\Core\get_responsive_customizer_defaults( 'body_text' ) );

			// All Headings Color.
			$all_heading_color_label = __( 'All Headings (H1 - H6)', 'responsive' );
			responsive_color_control( $wp_customize, 'all_heading_text', $all_heading_color_label, 'responsive_typography', 35, '#333333' );

			// Heading 1 (H1) Color.
			$h1_text_color_label = __( 'Heading 1 (H1) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h1_text', $h1_text_color_label, 'responsive_typography', 40, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h1_text' ) ) );

			// Heading 2 (H2) Color.
			$h2_text_color_label = __( 'Heading 2 (H2) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h2_text', $h2_text_color_label, 'responsive_typography', 50, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h2_text' ) ) );

			// Heading 3 (H3) Color.
			$h3_text_color_label = __( 'Heading 3 (H3) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h3_text', $h3_text_color_label, 'responsive_typography', 60, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h3_text' ) ) );

			// Heading 4 (H4) Color.
			$h4_text_color_label = __( 'Heading 4 (H4) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h4_text', $h4_text_color_label, 'responsive_typography', 70, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h4_text' ) ) );

			// Heading 5 (H5) Color.
			$h5_text_color_label = __( 'Heading 5 (H5) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h5_text', $h5_text_color_label, 'responsive_typography', 80, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h5_text' ) ) );

			// Heading 6 (H6) Color.
			$h6_text_color_label = __( 'Heading 6 (H6) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h6_text', $h6_text_color_label, 'responsive_typography', 90, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h6_text' ) ) );

			// Meta Text Color.
			$meta_text_color_label = __( 'Meta Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'meta_text', $meta_text_color_label, 'responsive_typography', 100, Responsive\Core\get_responsive_customizer_defaults( 'meta_text' ) );

		}


	}

endif;

return new Responsive_Site_Typography_Customizer();
