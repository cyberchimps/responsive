<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Search_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Header_Search_Customizer {

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
				'responsive_customizer_header_search',
				array(
					'title'    => esc_html__( 'Primary Navigation', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 200,
				)
			);



			// Header search Style.
			$header_search_style_choices = array(
				'default'  => __( 'Default', 'responsive' ),
				'bordered' => __( 'Outline', 'responsive' ),
			);
			$header_search_style         = __( 'Search Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_search_style', $header_search_style, 'responsive_customizer_header_search', 15, $header_search_style_choices, 'default', null );

			// Header Search Label.
			$header_search_label = __( 'Header Search Label', 'responsive' );
			responsive_text_control( $wp_customize, 'header_search_label', $header_search_label, 'responsive_customizer_header_search', 20, '', null, 'sanitize_text_field', 'text' );

			$header_search_label_visiblity_desktop = __( 'Header Search Label Visibility Desktop', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_search_label_visiblity_desktop', $header_search_label_visiblity_desktop, 'responsive_customizer_header_search', 25, 1 );

			$header_search_label_visiblity_tablet = __( 'Header Search Label Visibility Tablet', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_search_label_visiblity_tablet', $header_search_label_visiblity_tablet, 'responsive_customizer_header_search', 30, 0 );

			$header_search_label_visiblity_mobile = __( 'Header Search Label Visibility Mobile', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_search_label_visiblity_mobile', $header_search_label_visiblity_mobile, 'responsive_customizer_header_search', 35, 0 );

			// Header search Icon.
			$header_search_icon_choices = array(
				'search'  => __( 'Icon 1', 'responsive' ),
				'search2' => __( 'Icon 2', 'responsive' ),
			);
			$header_search_icon         = __( 'Search Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_search_icon', $header_search_icon, 'responsive_customizer_header_search', 40, $header_search_icon_choices, 'search', null );

			$header_search_woo = __( 'Enable WooCommerce Search', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_html_header_search_woo', $header_search_woo, 'responsive_customizer_header_search', 45, 0 );

		}

	}

endif;

return new Responsive_Header_Search_Customizer();
