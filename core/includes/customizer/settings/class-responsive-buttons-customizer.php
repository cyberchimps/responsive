<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Buttons_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Buttons_Customizer {

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
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_button',
				array(
					'title'    => __( 'Buttons', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 10,
				)
			);
			// Buttons Typography.
			$buttons_typography_label = esc_html__( 'Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'button_typography_group', $buttons_typography_label, 'responsive_button', 14, 'button_typography' );

			// Buttons
			$general_buttons_label = esc_html__( 'Button Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_button', 16 );

			// Button Text Color.
			$button_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_button', 20, Responsive\Core\get_responsive_customizer_defaults( 'button_text' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'button_hover_text' ), 'button_hover_text' );

			// Button Color.
			$button_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_button', 22, Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'button_hover' ), 'button_hover' );

			// Button Border Color.
			$button_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_border', $button_border_color_label, 'responsive_button', 198, Responsive\Core\get_responsive_customizer_defaults( 'button_border' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'button_hover_border' ), 'button_hover_border' );

			// Buttons Border Width.
			$buttons_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_borderwidth_control( $wp_customize, 'buttons_border_width', 'responsive_button', 200, 0, 0, null, $buttons_border_width_label, 'postMessage' );

			// Buttons Radius.
			$buttons_radius_label = __( 'Radius (px)', 'responsive' );
			responsive_radius_control( $wp_customize, 'buttons_radius', 'responsive_button', 210, 0, 0, null, $buttons_radius_label );

			// Buttons Padding (px).
			$buttons_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'buttons', 'responsive_button', 240, 10, 10, null, $buttons_padding_label );

		}


	}

endif;

return new Responsive_Buttons_Customizer();
