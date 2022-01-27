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
					'title'    => esc_html__( 'Search', 'responsive' ),
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
			responsive_text_control( $wp_customize, 'header_search_label', $header_search_label, 'responsive_customizer_header_search', 20, 'Search', null, 'sanitize_text_field', 'text' );

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
			$header_search_icon         = __( 'Search Icon', 'responsive' );
			responsive_select_control( $wp_customize, 'header_search_icon', $header_search_icon, 'responsive_customizer_header_search', 40, $header_search_icon_choices, 'search', null );

			// Header Search Color.
			$header_search_color_label = __( 'Search Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_search', $header_search_color_label, 'responsive_customizer_header_search', 50, '#333', null );

			$header_search_hover_color_label = __( 'Search Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_search_hover', $header_search_hover_color_label, 'responsive_customizer_header_search', 50, '#333', null );

			if ( class_exists( 'woocommerce' ) ) {
				$header_search_woo = __( 'Products Search only?', 'responsive' );
				responsive_checkbox_control( $wp_customize, 'header_search_woo', $header_search_woo, 'responsive_customizer_header_search', 45, 0 );
			}

			// Padding (px).
			$search_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'search', 'responsive_customizer_header_search', 50, null, null, null, $search_padding_label );

			$header_search_border_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$header_search_border_style_label = __( 'Border Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_search_border_style', $header_search_border_style_label, 'responsive_customizer_header_search', 55, $header_search_border_style_choices, 'solid', 'is_header_search_style_bordered' );

			$header_search_border_size_label = esc_html__( 'Border Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_search_border_size', $header_search_border_size_label, 'responsive_customizer_header_search', 60, 1, 'is_header_search_style_bordered', 20, 1, 'postMessage' );

			$header_search_border_radius_label = esc_html__( 'Border Radius', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_search_border_radius', $header_search_border_radius_label, 'responsive_customizer_header_search', 65, 0, 'is_header_search_style_bordered', 120, 1, 'postMessage' );

			$header_search_icon_size_desktop_label = esc_html__( 'Icon Size Desktop', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_search_icon_size_desktop', $header_search_icon_size_desktop_label, 'responsive_customizer_header_search', 70, 18, null, 200, 1, 'postMessage' );

			$header_search_icon_size_tablet_label = esc_html__( 'Icon Size Tablet', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_search_icon_size_tablet', $header_search_icon_size_tablet_label, 'responsive_customizer_header_search', 75, '', null, 200, 1, 'postMessage' );

			$header_search_icon_size_mobile_label = esc_html__( 'Icon Size Mobile', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_search_icon_size_mobile', $header_search_icon_size_mobile_label, 'responsive_customizer_header_search', 80, '', null, 200, 1, 'postMessage' );

		}

	}

endif;

return new Responsive_Header_Search_Customizer();
