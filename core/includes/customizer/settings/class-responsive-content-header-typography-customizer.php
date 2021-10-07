<?php
/**
 * Content Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Content_Header_Typography_Customizer' ) ) :
	/**
	 *  Content Header Customizer Options */
	class Responsive_Content_Header_Typography_Customizer {

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
			 * Content Heading Title.
			 */
			$content_header_separator_label = esc_html__( 'Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'content_header_heading', $content_header_separator_label, 'responsive_content_header_layout', 85 );
			/**
			 * Content Description.
			 */
			$description_separator_label = esc_html__( 'Description', 'responsive' );
			responsive_separator_control( $wp_customize, 'description', $description_separator_label, 'responsive_content_header_layout', 95 );

			/**
			* Content Breadcrumb.
			*/
			$breadcrumb_separator_label = esc_html__( 'Breadcrumb', 'responsive' );
			responsive_separator_control( $wp_customize, 'breadcrumb', $breadcrumb_separator_label, 'responsive_content_header_layout', 105, 'responsive_active_breadcrumb' );

		}


	}

endif;

return new Responsive_Content_Header_Typography_Customizer();
