<?php
/**
 * Layout Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Layout_Customizer' ) ) :
	/** Layout Customizer Options */
	class Responsive_Layout_Customizer {

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
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_layout_section',
				array(
					'title'    => esc_html__( 'Container', 'responsive' ),
					'panel'    => 'responsive-appearance-options',
					'priority' => 200,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[site_layout_option]',
				array(
					'sanitize_callback' => 'responsive_validate_site_layout',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'site_layout_option',
				array(
					'label'    => __( 'Choose Site Layout', 'responsive' ),
					'section'  => 'responsive_layout_section',
					'settings' => 'responsive_theme_options[site_layout_option]',
					'type'     => 'select',
					'choices'  => array(
						'default-layout'    => __( 'Default', 'responsive' ),
						'full-width-layout' => __( 'Full Width Boxed Layout', 'responsive' ),
						'full-width-no-box' => __( 'Full Width Without Boxes', 'responsive' ),
					),
				)
			);
			/**
			 * Main Container Width
			 */
			$wp_customize->add_setting(
				'responsive_main_container_width',
				array(
					'transport'         => 'refresh',
					'default'           => '960',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_main_container_width',
					array(
						'label'       => __( 'Container Width (px)', 'responsive' ),
						'section'     => 'responsive_layout_section',
						'settings'    => 'responsive_main_container_width',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 4096,
							'step' => 1,
						),
					)
				)
			);

			$wp_customize->add_setting(
				'res_hide_site_title',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',

				)
			);
			$wp_customize->add_control(
				'res_hide_site_title',
				array(
					'label'   => esc_html__( 'Hide Site Title', 'responsive' ),
					'section' => 'title_tagline',
					'type'    => 'checkbox',

				)
			);
			$wp_customize->add_setting(
				'res_hide_tagline',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'default'           => false,
				)
			);
			$wp_customize->add_control(
				'res_hide_tagline',
				array(
					'label'   => esc_html__( 'Hide Tagline', 'responsive' ),
					'section' => 'title_tagline',
					'type'    => 'checkbox',

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
						'label'           => esc_html__( 'Header Color', 'responsive' ),
						'section'         => 'responsive_layout_section',
						'settings'        => 'responsive_fullwidth_header_color',
						'priority'        => 10,
						'active_callback' => 'responsive_check_layout_type',
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_fullwidth_sitetitle_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '#ffffff',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_fullwidth_sitetitle_color',
					array(
						'label'           => esc_html__( 'Site Title Color', 'responsive' ),
						'section'         => 'responsive_layout_section',
						'settings'        => 'responsive_fullwidth_sitetitle_color',
						'priority'        => 10,
						'active_callback' => 'responsive_check_layout_type',
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_container_background_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_container_background_color',
					array(
						'label'    => 'Container Background Color',
						'section'  => 'responsive_layout_section',
						'settings' => 'responsive_container_background_color',
						'priority' => 10,
					)
				)
			);
			/**
			 * Container Padding.
			 */
			$wp_customize->add_setting(
				'responsive_container_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_container_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_container_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_container_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_container_padding',
					array(
						'label'       => esc_html__( 'Container Padding (px)', 'responsive' ),
						'section'     => 'responsive_layout_section',
						'settings'    => array(
							'desktop_top'    => 'responsive_container_top_padding',
							'desktop_right'  => 'responsive_container_right_padding',
							'desktop_bottom' => 'responsive_container_bottom_padding',
							'desktop_left'   => 'responsive_container_left_padding',
						),
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 60,
							'step' => 1,
						),
					)
				)
			);
		}

	}

endif;

return new Responsive_Layout_Customizer();
