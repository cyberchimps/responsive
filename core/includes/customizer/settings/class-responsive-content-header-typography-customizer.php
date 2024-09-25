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
			$content_header_separator_label = esc_html__( 'Title Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'content_header_heading_typography_group', $content_header_separator_label, 'responsive_content_header_layout', 85, 'content_header_heading_typography' );
			/**
			 * Content Description.
			 */
			$description_separator_label = esc_html__( 'Description Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'content_header_description_typography_group', $description_separator_label, 'responsive_content_header_layout', 95, 'content_header_description_typography' );

			/**
			* Content Breadcrumb.
			*/
			$breadcrumb_separator_label = esc_html__( 'Breadcrumb Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'breadcrumb_typography_group', $breadcrumb_separator_label, 'responsive_breadcrumb', 105, 'breadcrumb_typography' );

			responsive_horizontal_separator_control($wp_customize, 'content_header_heading_typography_group_separator', 2, 'responsive_content_header_layout', 83, 1, );
			responsive_horizontal_separator_control($wp_customize, 'content_header_description_typography_group_separator', 1, 'responsive_content_header_layout', 93, 1, );

		}


	}

endif;

return new Responsive_Content_Header_Typography_Customizer();
