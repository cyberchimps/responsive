<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Form_Fields_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Form_Fields_Customizer {

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
				'responsive_form_fields',
				array(
					'title'    => __( 'Form Fields', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 10,
				)
			);

			$tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_inputs_radius',
				$tab_ids_prefix . 'responsive_inputs_border_width',
				$tab_ids_prefix . 'responsive_inputs_typography_separator',
				$tab_ids_prefix . 'input_typography-font-family',
				$tab_ids_prefix . 'input_typography-font-weight',
				$tab_ids_prefix . 'input_typography-font-style',
				$tab_ids_prefix . 'input_typography-text-transform',
				$tab_ids_prefix . 'input_typography-font-size',
				$tab_ids_prefix . 'input_typography-line-height',
				$tab_ids_prefix . 'input_typography-letter-spacing',
				$tab_ids_prefix . 'responsive_responsive_general_inputs_separator',
				$tab_ids_prefix . 'responsive_inputs_background_color',
				$tab_ids_prefix . 'responsive_inputs_text_color',
				$tab_ids_prefix . 'responsive_inputs_border_color',
				$tab_ids_prefix . 'responsive_responsive_general_labels_separator',
				$tab_ids_prefix . 'responsive_label_color',
				$tab_ids_prefix . 'responsive_inputs_background_image',

			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_inputs_padding',
			);
			responsive_tabs_button_control( $wp_customize, 'form_fields_tabs', $tabs_label, 'responsive_form_fields', 10, '', 'responsive_form_fields_general_tab', 'responsive_form_fields_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Inputs Padding (px).
			$inputs_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'inputs', 'responsive_form_fields', 15, 3, 3, null, $inputs_padding_label );

			// Inputs Radius.
			$inputs_radius_label = __( 'Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'inputs_radius', $inputs_radius_label, 'responsive_form_fields', 17, 0 );

			// Inputs Border Width.
			$inputs_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'inputs_border_width', $inputs_border_width_label, 'responsive_form_fields', 19, 1 );

			// Input Fields Typography.
			$inputs_typography_label = esc_html__( 'Form Fields Typography', 'responsive' );
			responsive_separator_control( $wp_customize, 'inputs_typography_separator', $inputs_typography_label, 'responsive_form_fields', 21 );

			// Inputs.
			$general_inputs_label = esc_html__( 'Inputs', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_inputs_separator', $general_inputs_label, 'responsive_form_fields', 190 );

			// Inputs background Color.
			$inputs_color_label = __( 'Color', 'responsive' );

			responsive_color_control( $wp_customize, 'inputs_background', $inputs_color_label, 'responsive_form_fields', 200, Responsive\Core\get_responsive_customizer_defaults( 'inputs_background' ) );

			// Inputs Text Color.
			$inputs_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_text', $inputs_text_color_label, 'responsive_form_fields', 210, Responsive\Core\get_responsive_customizer_defaults( 'inputs_text' ) );

			// Inputs Border Color.
			$inputs_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'inputs_border', $inputs_border_color_label, 'responsive_form_fields', 220, Responsive\Core\get_responsive_customizer_defaults( 'inputs_border' ) );

			// Labels.
			$label_label = esc_html__( 'Labels', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_general_labels_separator', $label_label, 'responsive_form_fields', 230 );

			// Label Color.
			$label_color_label = __( 'Label Color', 'responsive' );

			responsive_color_control( $wp_customize, 'label', $inputs_text_color_label, 'responsive_form_fields', 240, Responsive\Core\get_responsive_customizer_defaults( 'label' ) );

		}


	}

endif;

return new Responsive_Form_Fields_Customizer();
