<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Button_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Header_Button_Customizer {

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
				'responsive_customizer_header_button',
				array(
					'title'    => esc_html__( 'Header Button', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 160,
				)
			);

			// Button Label.
			$header_button_label = __( 'Button Label', 'responsive' );
			responsive_text_control( $wp_customize, 'header_button_label', $header_button_label, 'responsive_customizer_header_button', 10, 'Button', null, 'sanitize_text_field', 'text' );

			// Header Button Link.
			$header_button_link = __( 'Button URL', 'responsive' );
			responsive_text_control( $wp_customize, 'header_button_link', $header_button_link, 'responsive_customizer_header_button', 15, '', null, 'sanitize_text_field', 'text' );

			// Header Button Target.
			$header_button_target = __( 'Open in New Tab', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_target', $header_button_target, 'responsive_customizer_header_button', 20, 0, null );

			// Header Button nofollow.
			$header_button_nofollow = __( 'Set link to nofollow', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_nofollow', $header_button_nofollow, 'responsive_customizer_header_button', 25, 0, null );

			// Header Button sponsored.
			$header_button_sponsored = __( 'Set link attribute Sponsored', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_sponsored', $header_button_sponsored, 'responsive_customizer_header_button', 30, 0, null );

			// Header Button download.
			$header_button_download = __( 'Set link to download', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_button_download', $header_button_download, 'responsive_customizer_header_button', 35, 0, null );

			// Header Button size.
			$header_button_size_choices = array(
				'small'  => __( 'Small', 'responsive' ),
				'medium' => __( 'Medium', 'responsive' ),
				'large'  => __( 'large', 'responsive' ),
			);
			$header_button_size         = __( 'Header Button Size', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_size', $header_button_size, 'responsive_customizer_header_button', 40, $header_button_size_choices, 'medium', null );

			// Header Button Style.
			$header_button_style_choices = array(
				'filled'  => __( 'Filled', 'responsive' ),
				'outline' => __( 'Outline', 'responsive' ),
			);
			$header_button_style         = __( 'Header Button Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_style', $header_button_style, 'responsive_customizer_header_button', 45, $header_button_style_choices, 'medium', null );

			// Header Button visibility.
			$header_button_visibility_choices = array(
				'everyone'  => __( 'Everyone', 'responsive' ),
				'loggedin'  => __( 'Logged In Only', 'responsive' ),
				'loggedout' => __( 'Logged Out Only', 'responsive' ),
			);
			$header_button_visibility         = __( 'Header Button Visibility', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_visibility', $header_button_visibility, 'responsive_customizer_header_button', 50, $header_button_visibility_choices, 'everyone', null );

			$header_button_border_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$header_button_border_style_label = __( 'Button Border Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_button_border_style', $header_button_border_style_label, 'responsive_customizer_header_button', 55, $header_button_border_style_choices, 'solid', null );

			$header_button_border_size_label = esc_html__( 'Button Border Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_button_border_size', $header_button_border_size_label, 'responsive_customizer_header_button', 60, 1, null, 20, 1, 'postMessage' );

			$header_button_border_radius_label = esc_html__( 'Button Border Radius', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_button_border_radius', $header_button_border_radius_label, 'responsive_customizer_header_button', 65, 0, null, 120, 1, 'postMessage' );

			$header_button_color_label = __( 'Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_button', $header_button_color_label, 'responsive_customizer_header_button', 70, '#fff', null );

			$header_button_color_hover_label = __( 'Button Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_button_hover', $header_button_color_hover_label, 'responsive_customizer_header_button', 75, '#fff', null );

			$header_button_background_color_label = __( 'Button Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_button_background', $header_button_background_color_label, 'responsive_customizer_header_button', 80, '#0066cc', null );

			$header_button_background_color_hover_label = __( 'Button Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_button_background_hover', $header_button_background_color_hover_label, 'responsive_customizer_header_button', 85, '#0066cc', null );

			$header_button_border_color_label = __( 'Button Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_button_border', $header_button_border_color_label, 'responsive_customizer_header_button', 90, '#0066cc', null );

			$header_button_border_color_hover_label = __( 'Button Border Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_button_border_hover', $header_button_border_color_hover_label, 'responsive_customizer_header_button', 95, '#0066cc', null );

			$header_button_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_button_typography_options_separator', $header_button_typography_options_label, 'responsive_customizer_header_button', 100 );

		}

	}

endif;

return new Responsive_Header_Button_Customizer();
