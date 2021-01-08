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

			$responsive_retina_logo_label = __( 'Enable Retina Logo ?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'retina_logo', $responsive_retina_logo_label, 'title_tagline', 9, 0, null );

			// Different Logo For Mobile Device.
			$mobile_logo_option_label = __( 'Different Logo For Mobile Devices?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_logo_option', $mobile_logo_option_label, 'title_tagline', 10, 0, null );

			$wp_customize->add_setting(
				'responsive_mobile_logo',
				array(
					'sanitize_callback' => 'absint',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Cropped_Image_Control(
					$wp_customize,
					'responsive_mobile_logo',
					array(
						'label'           => esc_html__( 'Logo For Mobile Device', 'responsive' ),
						'section'         => 'title_tagline',
						'flex-height'     => true,
						'flex-width'      => true,
						'height'          => 100, // pixels.
						'width'           => 300, // pixels.
						'priority'        => 11,
						'active_callback' => null,
					)
				)
			);

			$responsive_hide_title_label = __( 'Hide Site Title', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'hide_title', $responsive_hide_title_label, 'title_tagline', 14, 0, null );

			$responsive_hide_tagline_label = __( 'Hide Tagline', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'hide_tagline', $responsive_hide_tagline_label, 'title_tagline', 15, 1, null );

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
						'priority' => 16,
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
			responsive_select_control( $wp_customize, 'style', $responsive_style_label, 'responsive_layout', 30, $responsive_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_style' ), null, 'postMessage' );

			// Box Padding (px).
			$box_padding_label = __( 'Inside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'box', 'responsive_layout', 80, Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), 'responsive_not_active_site_style_flat', $box_padding_label );

			// Box Radius.
			$box_radius_label = __( 'Box Radius (px)', 'responsive' );
			responsive_number_control( $wp_customize, 'box_radius', $box_radius_label, 'responsive_layout', 50, 0, 'responsive_not_active_site_style_flat' );

		}


	}

endif;

return new Responsive_Site_Layouts_Customizer();
