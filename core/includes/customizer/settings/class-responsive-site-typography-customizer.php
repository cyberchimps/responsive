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
				$tab_ids_prefix . 'responsive_body_text_separator',
				$tab_ids_prefix . 'responsive_all_heading_text_separator',
				$tab_ids_prefix . 'responsive_h1_text_separator',
				$tab_ids_prefix . 'responsive_h2_text_separator',
				$tab_ids_prefix . 'responsive_h3_text_separator',
				$tab_ids_prefix . 'responsive_h4_text_separator',
				$tab_ids_prefix . 'responsive_h5_text_separator',
				$tab_ids_prefix . 'responsive_h6_text_separator',
			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_body_typography_group',
				$tab_ids_prefix . 'responsive_body_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_fonts_typography_separator',
				$tab_ids_prefix . 'responsive_headings_typography_group',
				$tab_ids_prefix . 'responsive_headings_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_h1_typography_group',
				$tab_ids_prefix . 'responsive_heading_h1_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_h2_typography_group',
				$tab_ids_prefix . 'responsive_heading_h2_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_h3_typography_group',
				$tab_ids_prefix . 'responsive_heading_h3_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_h4_typography_group',
				$tab_ids_prefix . 'responsive_heading_h4_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_h5_typography_group',
				$tab_ids_prefix . 'responsive_heading_h5_typography_group_separator',
				$tab_ids_prefix . 'responsive_heading_h6_typography_group',
				$tab_ids_prefix . 'responsive_heading_h6_typography_group_separator',
				$tab_ids_prefix . 'responsive_meta_typography_group',
				$tab_ids_prefix . 'responsive_meta_typography_group_separator',
			);

			responsive_tabs_button_control( $wp_customize, 'global_typography_tabs', $tabs_label, 'responsive_typography', 0, '', 'responsive_typography_general_tab', 'responsive_typography_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Body Typography.
			$body_typography_label = esc_html__( 'Body Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'body_typography_group', $body_typography_label, 'responsive_typography', 1, 'body_typography' );

			// Main Content Width.
			$paragraph_margin_label = esc_html__( 'Paragraph Margin Bottom', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'paragraph_margin_bottom', $paragraph_margin_label, 'responsive_typography', 3, '', null, 5, 1, 'postMessage', 0.1 );

			responsive_horizontal_separator_control($wp_customize, 'body_typography_group_separator', 2, 'responsive_typography', 3, 1, );

			// Heading Fonts heading.
			$heading_fonts_typography_label = esc_html__( 'Heading Font', 'responsive' );
			responsive_separator_control( $wp_customize, 'heading_fonts_typography_separator', $heading_fonts_typography_label, 'responsive_typography', 3 );
			
			// ALL heading Typography.
			$all_heading_typography_label = esc_html__( 'All Headings Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'headings_typography_group', $all_heading_typography_label, 'responsive_typography', 4, 'headings_typography' );

			responsive_horizontal_separator_control($wp_customize, 'headings_typography_group_separator', 1, 'responsive_typography', 5, 1, );

			// Body Typography.
			$h1_typography_label = esc_html__( 'H1 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h1_typography_group', $h1_typography_label, 'responsive_typography', 6, 'heading_h1_typography' );

			responsive_horizontal_separator_control($wp_customize, 'heading_h1_typography_group_separator', 1, 'responsive_typography', 7, 1, );

			// H2 Typography.
			$h2_typography_label = esc_html__( 'H2 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h2_typography_group', $h2_typography_label, 'responsive_typography', 8, 'heading_h2_typography' );

			responsive_horizontal_separator_control($wp_customize, 'heading_h2_typography_group_separator', 1, 'responsive_typography', 9, 1, );

			// H3 Typography.
			$h3_typography_label = esc_html__( 'H3 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h3_typography_group', $h3_typography_label, 'responsive_typography', 10, 'heading_h3_typography' );

			responsive_horizontal_separator_control($wp_customize, 'heading_h3_typography_group_separator', 1, 'responsive_typography', 11, 1, );
	
			// H4 Typography.
			$h4_typography_label = esc_html__( 'H4 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h4_typography_group', $h4_typography_label, 'responsive_typography', 12, 'heading_h4_typography' );

			responsive_horizontal_separator_control($wp_customize, 'heading_h4_typography_group_separator', 1, 'responsive_typography', 13, 1, );

			// H5 Typography.
			$h5_typography_label = esc_html__( 'H5 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h5_typography_group', $h5_typography_label, 'responsive_typography', 14, 'heading_h5_typography' );

			responsive_horizontal_separator_control($wp_customize, 'heading_h5_typography_group_separator', 1, 'responsive_typography', 15, 1, );

			// H6 Typography.
			$h6_typography_label = esc_html__( 'H6 Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'heading_h6_typography_group', $h6_typography_label, 'responsive_typography', 16, 'heading_h6_typography' );

			responsive_horizontal_separator_control($wp_customize, 'heading_h6_typography_group_separator', 1, 'responsive_typography', 17, 1, );

			// Meta Typography.
			$meta_typography_label = esc_html__( 'Meta Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'meta_typography_group', $meta_typography_label, 'responsive_typography', 18, 'meta_typography' );
			
			// Body Text Color.
			$body_text_color_label = __( 'Body Text Color', 'responsive' );
			
			responsive_color_control( $wp_customize, 'body_text', $body_text_color_label, 'responsive_typography', 30, Responsive\Core\get_responsive_customizer_defaults( 'body_text' ) );
			
			responsive_horizontal_separator_control( $wp_customize, 'body_text_separator', 2, 'responsive_typography',31, 1 );

			// Texts.
			$general_texts_label = esc_html__( 'Heading Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_texts_separator', $general_texts_label, 'responsive_typography', 32 );

			// All Headings Color.
			$all_heading_color_label = __( 'All Headings (H1 - H6)', 'responsive' );
			responsive_color_control( $wp_customize, 'all_heading_text', $all_heading_color_label, 'responsive_typography', 35, '#333333' );

			responsive_horizontal_separator_control( $wp_customize, 'all_heading_text_separator', 1, 'responsive_typography',36, 1 );

			// Heading 1 (H1) Color.
			$h1_text_color_label = __( 'H1 Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h1_text', $h1_text_color_label, 'responsive_typography', 40, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h1_text' ) ) );

			responsive_horizontal_separator_control( $wp_customize, 'h1_text_separator', 1, 'responsive_typography',41, 1 );
			
			// Heading 2 (H2) Color.
			$h2_text_color_label = __( 'H2 Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h2_text', $h2_text_color_label, 'responsive_typography', 50, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h2_text' ) ) );

			responsive_horizontal_separator_control( $wp_customize, 'h2_text_separator', 1, 'responsive_typography',51, 1 );
			
			// Heading 3 (H3) Color.
			$h3_text_color_label = __( 'H3 Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h3_text', $h3_text_color_label, 'responsive_typography', 60, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h3_text' ) ) );

			responsive_horizontal_separator_control( $wp_customize, 'h3_text_separator', 1, 'responsive_typography',61, 1 );

			// Heading 4 (H4) Color.
			$h4_text_color_label = __( 'H4 Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h4_text', $h4_text_color_label, 'responsive_typography', 70, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h4_text' ) ) );

			responsive_horizontal_separator_control( $wp_customize, 'h4_text_separator', 1, 'responsive_typography',71, 1 );

			// Heading 5 (H5) Color.
			$h5_text_color_label = __( 'H5 Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h5_text', $h5_text_color_label, 'responsive_typography', 80, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h5_text' ) ) );

			responsive_horizontal_separator_control( $wp_customize, 'h5_text_separator', 1, 'responsive_typography',81, 1 );

			// Heading 6 (H6) Color.
			$h6_text_color_label = __( 'H6 Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h6_text', $h6_text_color_label, 'responsive_typography', 90, get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( 'h6_text' ) ) );

			responsive_horizontal_separator_control( $wp_customize, 'h6_text_separator', 2, 'responsive_typography',91, 1 );

			// Meta Text Color.
			$meta_text_color_label = __( 'Meta Font Color', 'responsive' );
			responsive_color_control( $wp_customize, 'meta_text', $meta_text_color_label, 'responsive_typography', 100, Responsive\Core\get_responsive_customizer_defaults( 'meta_text' ) );

		}


	}

endif;

return new Responsive_Site_Typography_Customizer();
