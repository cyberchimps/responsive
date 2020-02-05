<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Colors_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Colors_Customizer {

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
			$wp_customize->add_section(
				'responsive_footer_colors',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 15,
				)
			);

			// Background Color.
			$footer_background_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_background', $footer_background_label, 'responsive_footer_colors', 10, '#333333', null );

			// Text Color.
			$footer_text_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_text', $footer_text_label, 'responsive_footer_colors', 20, '#ffffff', null );

			// Links Color.
			$footer_links_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_links', $footer_links_color_label, 'responsive_footer_colors', 30, '#eaeaea', null );

			// Links Hover Color .
			$footer_links_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_links_hover', $footer_links_hover_color_label, 'responsive_footer_colors', 40, '#ffffff', null );

		}


	}

endif;

return new Responsive_Footer_Colors_Customizer();
