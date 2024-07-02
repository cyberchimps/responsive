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

			$tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_buttons_radius',
				$tab_ids_prefix . 'responsive_buttons_border_width',
				$tab_ids_prefix . 'responsive_buttons_typography_separator',
				$tab_ids_prefix . 'button_typography-font-family',
				$tab_ids_prefix . 'button_typography-font-weight',
				$tab_ids_prefix . 'button_typography-font-style',
				$tab_ids_prefix . 'button_typography-text-transform',
				$tab_ids_prefix . 'button_typography-font-size',
				$tab_ids_prefix . 'button_typography-line-height',
				$tab_ids_prefix . 'button_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_responsive_general_buttons_separator',
				$tab_ids_prefix . 'responsive_button_color',
				$tab_ids_prefix . 'responsive_button_hover_color',
				$tab_ids_prefix . 'responsive_button_text_color',
				$tab_ids_prefix . 'responsive_button_hover_text_color',
				$tab_ids_prefix . 'responsive_button_border_color',
				$tab_ids_prefix . 'responsive_button_hover_border_color',
				$tab_ids_prefix . 'responsive_button_background_image',
			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_buttons_padding',
			);
			responsive_tabs_button_control( $wp_customize, 'buttons_tabs', $tabs_label, 'responsive_button', 10, '', 'responsive_button_general_tab', 'responsive_button_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Buttons Padding (px).
			$buttons_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'buttons', 'responsive_button', 14, 10, 10, null, $buttons_padding_label );

			// Buttons Radius.
			$buttons_radius_label = __( 'Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'buttons_radius', $buttons_radius_label, 'responsive_button', 16, Responsive\Core\get_responsive_customizer_defaults( 'buttons_radius' ) );

			// Buttons Border Width.
			$buttons_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'buttons_border_width', $buttons_border_width_label, 'responsive_button', 17, 1 );

			// Buttons Typography.
			$buttons_typography_label = esc_html__( 'Buttons Typography', 'responsive' );
			responsive_separator_control( $wp_customize, 'buttons_typography_separator', $buttons_typography_label, 'responsive_button', 19 );

			// Buttons.
			$general_buttons_label = esc_html__( 'Button Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_buttons_separator', $general_buttons_label, 'responsive_button', 130 );

			// Button Color.
			$button_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'button', $button_color_label, 'responsive_button', 130, Responsive\Core\get_responsive_customizer_defaults( 'button' ) );

			// Button Hover Color.
			$button_hover_color_label = __( 'Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover', $button_hover_color_label, 'responsive_button', 140, Responsive\Core\get_responsive_customizer_defaults( 'button_hover' ) );

			// Button Text Color.
			$button_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_text', $button_text_color_label, 'responsive_button', 150, Responsive\Core\get_responsive_customizer_defaults( 'button_text' ) );

			// Button Hover Text Color.
			$button_hover_text_color_label = __( 'Hover Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_text', $button_hover_text_color_label, 'responsive_button', 160, Responsive\Core\get_responsive_customizer_defaults( 'button_hover_text' ) );

			// Button Border Color.
			$button_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_border', $button_border_color_label, 'responsive_button', 170, Responsive\Core\get_responsive_customizer_defaults( 'button_border' ) );

			// Button Hover Border Color.
			$button_hover_border_color_label = __( 'Hover Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'button_hover_border', $button_hover_border_color_label, 'responsive_button', 180, Responsive\Core\get_responsive_customizer_defaults( 'button_hover_border' ) );

		}


	}

endif;

return new Responsive_Buttons_Customizer();
