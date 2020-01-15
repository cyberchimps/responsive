<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_colors_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_colors_Customizer {

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
					'priority' => 2,
				)
			);

			// Background Color.
			$background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'background', $background_color_label, 'responsive_colors', 1, '#eaeaea' );

			// Box Background Color.
			$box_background_color_label = __( 'Box Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'box_background', $box_background_color_label, 'responsive_colors', 2, '#ffffff', 'responsive_not_active_site_style_flat' );

			// Body Text Color.
			$body_text_color_label = __( 'Body Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'body_text', $body_text_color_label, 'responsive_colors', 3, '#333333' );

			// Heading 1 (H1) Color.
			$h1_text_color_label = __( 'Heading 1 (H1) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h1_text', $h1_text_color_label, 'responsive_colors', 3, '#333333' );

			// Heading 2 (H2) Color.
			$h2_text_color_label = __( 'Heading 2 (H2) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h2_text', $h2_text_color_label, 'responsive_colors', 3, '#333333' );

			// Heading 3 (H3) Color.
			$h3_text_color_label = __( 'Heading 3 (H3) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h3_text', $h3_text_color_label, 'responsive_colors', 3, '#333333' );

			// Heading 4 (H4) Color.
			$h4_text_color_label = __( 'Heading 4 (H4) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h4_text', $h4_text_color_label, 'responsive_colors', 3, '#333333' );

			// Heading 5 (H5) Color.
			$h5_text_color_label = __( 'Heading 5 (H5) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h5_text', $h5_text_color_label, 'responsive_colors', 3, '#333333' );

			// Heading 6 (H6) Color.
			$h6_text_color_label = __( 'Heading 6 (H6) Color', 'responsive' );
			responsive_color_control( $wp_customize, 'h6_text', $h6_text_color_label, 'responsive_colors', 3, '#333333' );

			// Meta Text Color.
			$meta_text_color_label = __( 'Meta Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'meta_text', $meta_text_color_label, 'responsive_colors', 4, '#999999' );

			// Link Color.
			$link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'link', $link_color_label, 'responsive_colors', 5, '#0066CC' );

			// Link Hover Color.
			$link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'link_hover', $link_hover_color_label, 'responsive_colors', 6, '#10659C' );

			// Button Color.
			$button_color_label = __( 'Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_colors', 7, '#0066CC' );

			// Button Hover Color.
			$button_hover_color_label = __( 'Button Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover', $button_hover_color_label, 'responsive_colors', 8, '#10659C' );

			// Button Text Color.
			$button_text_color_label = __( 'Button Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_colors', 9, '#FFFFFF' );

			// Button Hover Text Color.
			$button_hover_text_color_label = __( 'Button Hover Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_text', $button_hover_text_color_label, 'responsive_colors', 10, '#FFFFFF' );

		}


	}

endif;

return new Responsive_Site_colors_Customizer();
