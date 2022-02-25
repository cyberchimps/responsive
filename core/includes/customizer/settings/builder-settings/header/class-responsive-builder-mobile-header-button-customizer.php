<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Mobile_Header_Button_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Mobile_Header_Button_Customizer {

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
				'responsive_customizer_mobile_button',
				array(
					'title'    => esc_html__( 'Mobile Header Button', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 190,
				)
			);

			// Mobile Button Label.
			$mobile_button_label = __( 'Mobile Button Label', 'responsive' );
			responsive_text_control( $wp_customize, 'mobile_button_label', $mobile_button_label, 'responsive_customizer_mobile_button', 10, 'Button', null, 'sanitize_text_field', 'text' );

			// Mobile Header Button Link.
			$mobile_button_link = __( 'Mobile Button URL', 'responsive' );
			responsive_text_control( $wp_customize, 'mobile_button_link', $mobile_button_link, 'responsive_customizer_mobile_button', 10, '', null, 'sanitize_text_field', 'text' );

			// Mobile Header Button Target.
			$mobile_button_target = __( 'Mobile Open in New Tab', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_button_target', $mobile_button_target, 'responsive_customizer_mobile_button', 15, 0, null );

			// Mobile Header Button nofollow.
			$mobile_button_nofollow = __( 'Mobile Set link to nofollow', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_button_nofollow', $mobile_button_nofollow, 'responsive_customizer_mobile_button', 20, 0, null );

			// Mobile Header Button sponsored.
			$mobile_button_sponsored = __( 'Mobile Set link attribute Sponsored', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_button_sponsored', $mobile_button_sponsored, 'responsive_customizer_mobile_button', 25, 0, null );

			// Mobile Header Button download.
			$mobile_button_download = __( 'Mobile Set link to download', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_button_download', $mobile_button_download, 'responsive_customizer_mobile_button', 30, 0, null );

			// Mobile Header Button size.
			$mobile_button_size_choices = array(
				'small'  => __( 'Small', 'responsive' ),
				'medium' => __( 'Medium', 'responsive' ),
				'large'  => __( 'Large', 'responsive' ),
			);
			$mobile_button_size         = __( 'Mobile Header Button Size', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_button_size', $mobile_button_size, 'responsive_customizer_mobile_button', 35, $mobile_button_size_choices, 'medium', null );

			// Mobile Header Button Style.
			$mobile_button_style_choices = array(
				'filled'  => __( 'Filled', 'responsive' ),
				'outline' => __( 'Outline', 'responsive' ),
			);
			$mobile_button_style         = __( 'Mobile Header Button Style.', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_button_style', $mobile_button_style, 'responsive_customizer_mobile_button', 40, $mobile_button_style_choices, 'medium', null );

			// Mobile Header Button visibility.
			$mobile_button_visibility_choices = array(
				'everyone'  => __( 'Everyone', 'responsive' ),
				'loggedin'  => __( 'Logged In Only', 'responsive' ),
				'loggedout' => __( 'Logged Out Only', 'responsive' ),
			);
			$mobile_button_visibility         = __( 'Mobile Header Button Visibility', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_button_visibility', $mobile_button_visibility, 'responsive_customizer_mobile_button', 45, $mobile_button_visibility_choices, 'everyone', null );

			$mobile_button_border_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$mobile_button_border_style_label = __( 'Button Border Style', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_button_border_style', $mobile_button_border_style_label, 'responsive_customizer_mobile_button', 55, $mobile_button_border_style_choices, 'solid', null );

			$mobile_button_border_size_label = esc_html__( 'Button Border Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_button_border_size', $mobile_button_border_size_label, 'responsive_customizer_mobile_button', 60, 1, null, 20, 1, 'postMessage' );

			$mobile_button_border_radius_label = esc_html__( 'Button Border Radius', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_button_border_radius', $mobile_button_border_radius_label, 'responsive_customizer_mobile_button', 65, 0, null, 120, 1, 'postMessage' );

			$mobile_button_color_label = __( 'Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_button', $mobile_button_color_label, 'responsive_customizer_mobile_button', 70, '#fff', null );

			$mobile_button_color_hover_label = __( 'Button Focus Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_button_hover', $mobile_button_color_hover_label, 'responsive_customizer_mobile_button', 75, '#fff', null );

			$mobile_button_background_color_label = __( 'Button Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_button_background', $mobile_button_background_color_label, 'responsive_customizer_mobile_button', 80, '#0066cc', null );

			$mobile_button_background_color_hover_label = __( 'Button Background Focus Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_button_background_hover', $mobile_button_background_color_hover_label, 'responsive_customizer_mobile_button', 85, '#0066cc', null );

			$mobile_button_border_color_label = __( 'Button Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_button_border', $mobile_button_border_color_label, 'responsive_customizer_mobile_button', 90, '#0066cc', null );

			$mobile_button_border_color_hover_label = __( 'Button Border Focus Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_button_border_hover', $mobile_button_border_color_hover_label, 'responsive_customizer_mobile_button', 95, '#0066cc', null );

			$mobile_button_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'mobile_button_typography_options_separator', $mobile_button_typography_options_label, 'responsive_customizer_mobile_button', 100 );

		}

	}

endif;

return new Responsive_Mobile_Header_Button_Customizer();
