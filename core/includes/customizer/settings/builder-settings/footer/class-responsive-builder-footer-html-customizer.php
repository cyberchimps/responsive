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
			responsive_text_control( $wp_customize, 'footer_html_content', $footer_html_content, 'responsive_customizer_footer_html', 10, '{copyright} {year} {site-title} {theme-credit}', null, 'sanitize_text_field', 'textarea' );

			// Footer HTML Link Style.
			$footer_html_link_style_choices = array(
				'normal' => __( 'Underlined', 'responsive' ),
				'plain'  => __( 'No Underline', 'responsive' ),
			);
			$footer_html_link_style         = __( 'Footer HTML Link Style.', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_html_link_style', $footer_html_link_style, 'responsive_customizer_footer_html', 15, $footer_html_link_style_choices, 'normal', null );

		}

	}

endif;

return new Responsive_Footer_HTML_Customizer();
