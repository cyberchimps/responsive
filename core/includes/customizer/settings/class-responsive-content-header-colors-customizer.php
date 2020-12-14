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

			$content_header_color_label = esc_html__( 'Content Header Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'content_header_color', $content_header_color_label, 'responsive_content_header_layout', 40 );

			// Title Color.
			$content_header_heading_color_label = __( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'content_header_heading', $content_header_heading_color_label, 'responsive_content_header_layout', 50, Responsive\Core\get_responsive_customizer_defaults( 'content_header_heading' ), null, 'This will apply to Blog Page Title which can be enabled from Blog/Archive > Blog/Archive > Enable Blog Page Title' );

			// Header Description.
			$content_header_description_color_label = __( 'Description Color', 'responsive' );
			responsive_color_control( $wp_customize, 'content_header_description', $content_header_description_color_label, 'responsive_content_header_layout', 60, Responsive\Core\get_responsive_customizer_defaults( 'content_header_description' ), null, 'This feature is for author info of particular post. You can see this when you view all posts by an author.' );

			// Breadcrumb Color.
			$breadcrumb_color_label = __( 'Breadcrumb Color', 'responsive' );
			responsive_color_control( $wp_customize, 'breadcrumb', $breadcrumb_color_label, 'responsive_content_header_layout', 70, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb' ), 'responsive_active_breadcrumb' );


		}


	}

endif;

return new Responsive_Content_Header_Colors_Customizer();
