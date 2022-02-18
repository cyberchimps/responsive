<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Trigger_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Header_Trigger_Customizer {

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
				'responsive_customizer_mobile_trigger',
				array(
					'title'    => esc_html__( 'Trigger', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 180,
				)
			);

			// Mobile Menu Trigger Style.
			$mobile_trigger_style_choices = array(
				'default'  => __( 'Default', 'responsive' ),
				'bordered' => __( 'Outline', 'responsive' ),
			);
			$mobile_trigger_style         = __( 'Trigger Style', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_trigger_style', $mobile_trigger_style, 'responsive_customizer_mobile_trigger', 10, $mobile_trigger_style_choices, 'everyone', null );

			// Mobile Menu Trigger Icon.
			$mobile_trigger_icon_choices = array(
				'menu'  => __( 'Icon 1', 'responsive' ),
				'menu2' => __( 'Icon 2', 'responsive' ),
				'menu3' => __( 'Icon 3', 'responsive' ),
			);
			$mobile_trigger_icon         = __( 'Trigger Icon', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_trigger_icon', $mobile_trigger_icon, 'responsive_customizer_mobile_trigger', 15, $mobile_trigger_icon_choices, 'menu', null );

			// Hamburger Menu Label.
			$trigger_label = __( 'Trigger Label', 'responsive' );
			responsive_text_control( $wp_customize, 'mobile_trigger_label', $trigger_label, 'responsive_customizer_mobile_trigger', 20, '', null, 'sanitize_text_field', 'text', 'postMessage' );

			$mobile_trigger_icon_size_label = esc_html__( 'Icon Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_trigger_icon_size', $mobile_trigger_icon_size_label, 'responsive_customizer_mobile_trigger', 25, 20, null, 100, 1, 'postMessage' );

			// Trigger Colors.
			$trigger_color_label = __( 'Trigger Color', 'responsive' );
			responsive_color_control( $wp_customize, 'trigger', $trigger_color_label, 'responsive_customizer_mobile_trigger', 30, '#333', null );

			$trigger_hover_color_label = __( 'Trigger Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'trigger_hover', $trigger_hover_color_label, 'responsive_customizer_mobile_trigger', 30, '#333', null );

			$trigger_navigation_color_label = __( 'Navigation Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'trigger_navigation', $trigger_navigation_color_label, 'responsive_customizer_mobile_trigger', 30, '', null );

			$trigger_navigation_hover_color_label = __( 'Navigation Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'trigger_navigation_hover', $trigger_navigation_hover_color_label, 'responsive_customizer_mobile_trigger', 30, '', null );
		}

	}

endif;

return new Responsive_Header_Trigger_Customizer();
