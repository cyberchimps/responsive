<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Sidebar_Customizer' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Sidebar_Customizer {

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
		 * @param  object $wp_customize WordPress customization option.
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {
			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_sidebar_section',
				array(
					'title'    => esc_html__( 'Sidebar', 'responsive' ),
					'panel'    => 'responsive-appearance-options',
					'priority' => 203,
				)
			);

			// Sidebar Width.
			$wp_customize->add_setting(
				'responsive_sidebar_width',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'refresh',
					'default'           => 30,
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_sidebar_width',
					array(
						'label'       => esc_html__( 'Sidebar Width (%)', 'responsive' ),
						'section'     => 'responsive_sidebar_section',
						'settings'    => 'responsive_sidebar_width',
						'priority'    => 9,
						'input_attrs' => array(
							'min'  => 25,
							'max'  => 75,
							'step' => 1,
						),
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_sidebar_background_color',
				array(
					'type'              => 'theme_mod',
					'default'           => '',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_sidebar_background_color',
					array(
						'label'    => 'Sidebar Background Color',
						'section'  => 'responsive_sidebar_section',
						'settings' => 'responsive_sidebar_background_color',
						'priority' => 10,
					)
				)
			);
			/**
			 * Sidebar Padding.
			 */
			$wp_customize->add_setting(
				'responsive_sidebar_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_sidebar_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_tablet_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_tablet_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_sidebar_tablet_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_tablet_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_mobile_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_mobile_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_sidebar_mobile_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_mobile_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '20',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_sidebar_padding',
					array(
						'label'       => esc_html__( 'Padding (px)', 'responsive' ),
						'section'     => 'responsive_sidebar_section',
						'settings'    => array(
							'desktop_top'    => 'responsive_sidebar_top_padding',
							'desktop_right'  => 'responsive_sidebar_right_padding',
							'desktop_bottom' => 'responsive_sidebar_bottom_padding',
							'desktop_left'   => 'responsive_sidebar_left_padding',
							'tablet_top'     => 'responsive_sidebar_tablet_top_padding',
							'tablet_right'   => 'responsive_sidebar_tablet_right_padding',
							'tablet_bottom'  => 'responsive_sidebar_tablet_bottom_padding',
							'tablet_left'    => 'responsive_sidebar_tablet_left_padding',
							'mobile_top'     => 'responsive_sidebar_mobile_top_padding',
							'mobile_right'   => 'responsive_sidebar_mobile_right_padding',
							'mobile_bottom'  => 'responsive_sidebar_mobile_bottom_padding',
							'mobile_left'    => 'responsive_sidebar_mobile_left_padding',
						),
						'priority'    => 11,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 60,
							'step' => 1,
						),
					)
				)
			);

			// Radius.
			$wp_customize->add_setting(
				'responsive_sidebar_radius',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'refresh',
					'default'           => '4',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_sidebar_radius',
					array(
						'label'       => esc_html__( 'Sidebar Radius', 'responsive' ),
						'section'     => 'responsive_sidebar_section',
						'settings'    => 'responsive_sidebar_radius',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_heading_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_sidebar_heading_color',
					array(
						'label'    => 'Sidebar Heading Color',
						'section'  => 'responsive_sidebar_section',
						'settings' => 'responsive_sidebar_heading_color',
						'priority' => 10,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_sidebar_text_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_sidebar_text_color',
					array(
						'label'    => 'Sidebar Text Color',
						'section'  => 'responsive_sidebar_section',
						'settings' => 'responsive_sidebar_text_color',
						'priority' => 10,
					)
				)
			);
		}
	}

endif;

return new Responsive_Sidebar_Customizer();
