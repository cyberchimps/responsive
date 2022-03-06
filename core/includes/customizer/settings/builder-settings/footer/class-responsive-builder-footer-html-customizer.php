<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_HTML_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Footer_HTML_Customizer {

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
				'responsive_customizer_footer_html',
				array(
					'title'    => esc_html__( 'Footer HTML & Text', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 50,
				)
			);

			// HTML content.
			$footer_html_content = __( 'HTML & Text', 'responsive' );
			responsive_editor_control( $wp_customize, 'footer_html_content', $footer_html_content, 'responsive_customizer_footer_html', 10, '{copyright} {year} {site-title} {theme-credit}', null, 'wp_kses_post', 'postMessage' );

			// Footer HTML Link Style.
			$footer_html_link_style_choices = array(
				'normal' => __( 'Underlined', 'responsive' ),
				'plain'  => __( 'No Underline', 'responsive' ),
			);
			$footer_html_link_style         = __( 'HTML Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_link_style', $footer_html_link_style, 'responsive_customizer_footer_html', 15, $footer_html_link_style_choices, 'normal', null );

			$footer_html_text_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_html_text', $footer_html_text_label, 'responsive_customizer_footer_html', 15, '', null );

			$footer_html_link_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_html_link', $footer_html_link_label, 'responsive_customizer_footer_html', 15, '', null );

			$footer_html_link_hover_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_html_link_hover', $footer_html_link_hover_label, 'responsive_customizer_footer_html', 15, '', null );

			// Content Align.
			$footer_html_align_desktop_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_html_align_desktop         = __( 'Content Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_align_desktop', $footer_html_align_desktop, 'responsive_customizer_footer_html', 20, $footer_html_align_desktop_choices, 'left', null );

			$footer_html_align_tablet_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_html_align_tablet         = __( 'Content Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_align_tablet', $footer_html_align_tablet, 'responsive_customizer_footer_html', 25, $footer_html_align_tablet_choices, 'left', null );

			$footer_html_align_mobile_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_html_align_mobile         = __( 'Content Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_align_mobile', $footer_html_align_mobile, 'responsive_customizer_footer_html', 25, $footer_html_align_mobile_choices, 'left', null );

			// Content Vertical Align.
			$footer_html_vertical_align_desktop_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_html_vertical_align_desktop         = __( 'Content Vertical Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_vertical_align_desktop', $footer_html_vertical_align_desktop, 'responsive_customizer_footer_html', 30, $footer_html_vertical_align_desktop_choices, 'middle', null );

			$footer_html_vertical_align_tablet_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_html_vertical_align_tablet         = __( 'Content Vertical Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_vertical_align_tablet', $footer_html_vertical_align_tablet, 'responsive_customizer_footer_html', 35, $footer_html_vertical_align_tablet_choices, 'middle', null );

			$footer_html_vertical_align_mobile_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_html_vertical_align_mobile         = __( 'Content Vertical Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_vertical_align_mobile', $footer_html_vertical_align_mobile, 'responsive_customizer_footer_html', 45, $footer_html_vertical_align_mobile_choices, 'middle', null );

			// Margin (px).
			$footer_html_margin_label = __( 'Margin (px)', 'responsive' );
			responsive_margin_control( $wp_customize, 'footer_html', 'responsive_customizer_footer_html', 50, 13, null, null, $footer_html_margin_label );

			$footer_html_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_html_typography_options_separator', $footer_html_typography_options_label, 'responsive_customizer_footer_html', 100 );

		}

	}

endif;

return new Responsive_Footer_HTML_Customizer();
