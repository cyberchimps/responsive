<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Layouts_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Layouts_Customizer {

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
				'responsive_layout',
				array(
					'title'    => __( 'Layout', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 10,
				)
			);

			$responsive_hide_title_label = __( 'Hide Site Title', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'hide_title', $responsive_hide_title_label, 'title_tagline', 10, 0, null );

			$responsive_hide_tagline_label = __( 'Hide Tagline', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'hide_tagline', $responsive_hide_tagline_label, 'title_tagline', 11, 0, null );

			// Add Custom Logo URL.
			$wp_customize->add_setting(
				'responsive_custom_logo_url',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'theme_mod',
					'default'           => home_url( '/' ),
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'responsive_custom_logo_url',
					array(
						'label'    => __( 'Site Title/Logo URL', 'responsive' ),
						'section'  => 'title_tagline',
						'settings' => 'responsive_custom_logo_url',
						'priority' => 12,
					)
				)
			);

			// Site Width.
			$responsive_width_label  = __( 'Width', 'responsive' );
			$responsive_width_choice = array(
				'contained'  => esc_html__( 'Contained', 'responsive' ),
				'full-width' => esc_html__( 'Full Width', 'responsive' ),
			);
				responsive_select_control( $wp_customize, 'width', $responsive_width_label, 'responsive_layout', 10, $responsive_width_choice, 'contained', null, 'postMessage' );

			// Container Width.
			$container_width_label = __( 'Container Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'container_width', $container_width_label, 'responsive_layout', 20, 1140, 'responsive_active_site_layout_contained', 4096, 1, 'postMessage' );

			// Header Allignment.
			$responsive_style_label  = __( 'Style', 'responsive' );
			$responsive_style_choice = array(
				'boxed'         => esc_html__( 'Boxed', 'responsive' ),
				'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
				'flat'          => esc_html__( 'Flat', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'style', $responsive_style_label, 'responsive_layout', 30, $responsive_style_choice, 'boxed', null, 'postMessage' );

			// Box Padding (px).
			$box_padding_label = __( 'Box Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'box', 'responsive_layout', 40, Responsive\Core\get_responsive_customizer_defaults( 'box_padding' )    , Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), 'responsive_not_active_site_style_flat', $box_padding_label );

			// Box Radius.
			$box_radius_label = __( 'Box Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'box_radius', $box_radius_label, 'responsive_layout', 50, 0, 'responsive_not_active_site_style_flat' );

			// Buttons Layout.
			$buttons_layout_label = esc_html__( 'Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_layout_button_separator', $buttons_layout_label, 'responsive_layout', 60 );

			// Buttons Padding (px).
			$buttons_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'buttons', 'responsive_layout', 70, 10, 10, null, $buttons_padding_label );

			// Buttons Radius.
			$buttons_radius_label = __( 'Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'buttons_radius', $buttons_radius_label, 'responsive_layout', 80, 0 );

			// Buttons Border Width.
			$buttons_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'buttons_border_width', $buttons_border_width_label, 'responsive_layout', 90, 0 );

			// Inputs Layout.
			$inputs_layout_label = esc_html__( 'Form Inputs', 'responsive' );
			responsive_separator_control( $wp_customize, 'responsive_layout_input_separator', $inputs_layout_label, 'responsive_layout', 100 );

			// Inputs Padding (px).
			$inputs_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'inputs', 'responsive_layout', 110, 3, 3, null, $inputs_padding_label );

			// Inputs Radius.
			$inputs_radius_label = __( 'Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'inputs_radius', $inputs_radius_label, 'responsive_layout', 120, 0 );

			// Inputs Border Width.
			$inputs_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'inputs_border_width', $inputs_border_width_label, 'responsive_layout', 120, 1 );

		}


	}

endif;

return new Responsive_Site_Layouts_Customizer();
