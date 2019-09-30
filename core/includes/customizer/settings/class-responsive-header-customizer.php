<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Header_Customizer {

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
			$wp_customize->add_section(
				'responsive_header_section',
				array(
					'title'    => esc_html__( 'Header Section', 'responsive' ),
					'panel'    => 'responsive-header-options',
					'priority' => 202,

				)
			);
			$wp_customize->add_setting(
				'header_layout_options',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'header_layout_options',
				array(
					'label'    => __( 'Header Layout', 'responsive' ),
					'section'  => 'responsive_header_section',
					'settings' => 'header_layout_options',
					'type'     => 'select',
					'choices'  => apply_filters(
						'responsive_header_layout_choices',
						array(
							'default'            => esc_html__( 'Default', 'responsive' ),
							'header-logo-left'   => esc_html__( 'Logo Left', 'responsive' ),
							'header-logo-center' => esc_html__( 'Logo Center', 'responsive' ),
							'header-logo-right'  => esc_html__( 'Logo Right', 'responsive' ),
						)
					),
				)
			);
			// header border Color.
			$wp_customize->add_setting(
				'responsive_header_border_color',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_header_border_color',
					array(
						'label'    => __( 'Border Bottom Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_header_border_color',
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_fullwidth_header_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '#585858',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_fullwidth_header_color',
					array(
						'label'    => esc_html__( 'Header Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_fullwidth_header_color',
						'priority' => 10,
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_fullwidth_sitetitle_color',
				array(
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '#ffffff',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_fullwidth_sitetitle_color',
					array(
						'label'    => esc_html__( 'Site Title Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_fullwidth_sitetitle_color',
						'priority' => 10,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_site_description_color',
				array(
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_site_description_color',
					array(
						'label'    => esc_html__( 'Site Description Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_site_description_color',
						'priority' => 10,
					)
				)
			);

		}
	}

endif;

return new Responsive_Header_Customizer();
