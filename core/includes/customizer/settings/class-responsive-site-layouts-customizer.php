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
			responsive_toggle_control( $wp_customize, 'retina_logo', $responsive_retina_logo_label, 'responsive_header_site_logo_title', 8, 0, 'responsive_has_custom_logo_callback','postMessage' );

			$wp_customize->add_setting(
				'responsive_retina_logo_image',
				array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'responsive_retina_logo_image',
					array(
						'label'           => __( 'Upload Retina Logo', 'responsive' ),
						'section'         => 'responsive_header_site_logo_title',
						'priority'        => 9,
						'active_callback' => function() {
							return (bool) get_theme_mod( 'responsive_retina_logo', 0 );
						},
					)
				)
			);

			// Logo Width Controller.
			$logo_width_label = __( 'Logo Width (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'logo_width', $logo_width_label, 'responsive_header_site_logo_title', 9, 0, null, 1200, 20, 'postMessage', 1 );

			// Different Logo For Mobile Device.
			$mobile_logo_option_label = __( 'Different Logo For Mobile Devices?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'mobile_logo_option', $mobile_logo_option_label, 'responsive_header_site_logo_title', 9, 0, 'responsive_has_custom_logo_callback', 'postMessage' );

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
						'section'         => 'responsive_header_site_logo_title',
						'flex-height'     => true,
						'flex-width'      => true,
						'priority'        => 9,
						'active_callback' => null,
					)
				)
			);

			// Enable inline site title and logo.
			$inline_logo_title_label = __( 'Inline Logo & Site Title', 'responsive' );
			responsive_toggle_control( $wp_customize, 'inline_logo_site_title', $inline_logo_title_label, 'responsive_header_site_logo_title', 15, 0, null );

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
						'section'  => 'responsive_header_site_logo_title',
						'settings' => 'responsive_custom_logo_url',
						'priority' => 17,
					)
				)
			);

			// Site Width.
			$responsive_width_label  = __( 'Width', 'responsive' );
			$responsive_width_choice = array(
				'contained'  => esc_html__( 'Contained', 'responsive' ),
				'full-width' => esc_html__( 'Full Width', 'responsive' ),
			);
			responsive_imageradio_button_control( $wp_customize, 'width', $responsive_width_label, 'responsive_layout', 10, $responsive_width_choice, 'contained', null, 'svg', 'postMessage' );

				// responsive_select_control( $wp_customize, 'width', $responsive_width_label, 'responsive_layout', 10, $responsive_width_choice, 'contained', null, 'postMessage' );

			// Container Width.
			$container_width_label = __( 'Container Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'container_width', $container_width_label, 'responsive_layout', 20, 1140, 'responsive_active_site_layout_contained', 1500, 768, 'postMessage' );
			// Header Allignment.
			$responsive_style_label  = __( 'Style', 'responsive' );
			$responsive_style_choice = array(
				'boxed'         => esc_html__( 'Boxed', 'responsive' ),
				'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
				'flat'          => esc_html__( 'Flat', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'style', $responsive_style_label, 'responsive_layout', 30, $responsive_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_style' ), null, 'postMessage' );

			// responsive_select_control( $wp_customize, 'style', $responsive_style_label, 'responsive_layout', 30, $responsive_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_style' ), null, 'postMessage' );

			// Box Padding (px).
			$box_padding_label = __( 'Inside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'box', 'responsive_layout', 80, Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ), 'responsive_not_active_site_style_flat', $box_padding_label );

			// Box Radius.
			$box_radius_label = __( 'Box Radius (px)', 'responsive' );
			responsive_radius_control( $wp_customize, 'box', 'responsive_layout', 50, 8, 8, 'responsive_not_active_site_style_flat', $box_radius_label );

			// responsive_number_control( $wp_customize, 'box_radius', $box_radius_label, 'responsive_layout', 50, 0, 'responsive_not_active_site_style_flat' );

			// Redirect to site title and logo.
			$site_title_and_logo_redirect_label = __( 'Site Title and Logo Settings', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_site_title_and_logo', $site_title_and_logo_redirect_label, 'title_tagline', 60, 'section', 'responsive_header_site_logo_title');

			$site_title_visibility_choices = array(
				'desktop'   => esc_html__( 'dashicons-desktop', 'responsive' ),
				'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
				'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
			);
			// Site Title Visibility control 
			$site_title_visibility_label = __( 'Site Title Visibility', 'responsive' );
			responsive_multi_select_button_control($wp_customize, 'site_title_visibility', $site_title_visibility_label, 'responsive_header_site_logo_title', 14, $site_title_visibility_choices, array('desktop','tablet','mobile'), null, 'refresh');

			$site_tagline_visibility_choices = array(
				'desktop'   => esc_html__( 'dashicons-desktop', 'responsive' ),
				'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
				'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
			);
			// Site Tagline Visibility control
			$site_tagline_visibility_label = __( 'Site Tagline Visibility', 'responsive' );
			responsive_multi_select_button_control($wp_customize, 'site_tagline_visibility', $site_tagline_visibility_label, 'responsive_header_site_logo_title', 16, $site_tagline_visibility_choices, array('desktop','tablet','mobile'), null, 'refresh');
		}


	}

endif;

return new Responsive_Site_Layouts_Customizer();
