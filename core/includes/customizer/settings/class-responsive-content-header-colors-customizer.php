<?php
/**
 * Content Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Content_Header_Colors_Customizer' ) ) :
	/**
	 * Content Header Customizer Options */
	class Responsive_Content_Header_Colors_Customizer {

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
				'responsive_content_header_colors',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive_content_header',
					'priority' => 20,
				)
			);

			// Title Color.
			$content_header_heading_color_label = __( 'Title Color', 'responsive' );

			responsive_color_control( $wp_customize, 'content_header_heading', $content_header_heading_color_label, 'responsive_content_header_colors', 10, Responsive\Core\get_responsive_customizer_defaults( 'content_header_heading' ) );

			// Header Description.
			$content_header_description_color_label = __( 'Description Color', 'responsive' );
			responsive_color_control( $wp_customize, 'content_header_description', $content_header_description_color_label, 'responsive_content_header_colors', 20, Responsive\Core\get_responsive_customizer_defaults( 'content_header_description' ) );

			// Breadcrumb Color.
			$breadcrumb_color_label = __( 'Breadcrumb Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb', $breadcrumb_color_label, 'responsive_content_header_colors', 30, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb' ), 'responsive_active_breadcrumb' );


		}


	}

endif;

return new Responsive_Content_Header_Colors_Customizer();
