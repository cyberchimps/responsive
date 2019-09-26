<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Customizer {

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
				'responsive_footer_section',
				array(
					'title'    => esc_html__( 'Footer Layout', 'responsive' ),
					'panel'    => 'responsive-footer-options',
					'priority' => 202,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[site_footer_option]',
				array(
					'sanitize_callback' => 'responsive_validate_site_footer_layout',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'site_footer_option',
				array(
					'label'    => __( 'Choose Footer Widgets Layout', 'responsive' ),
					'section'  => 'responsive_footer_section',
					'settings' => 'responsive_theme_options[site_footer_option]',
					'type'     => 'select',
					'choices'  => array(
						'footer-3-col' => __( 'Default (3 column)', 'responsive' ),
						'footer-2-col' => __( '2 Column Layout', 'responsive' ),
					),
				)
			);

			/**
			 * Container Padding.
			 */
			$wp_customize->add_setting(
				'responsive_footer_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_footer_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_tablet_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_tablet_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_footer_tablet_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_tablet_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_mobile_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_mobile_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_footer_mobile_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_footer_mobile_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_footer_padding',
					array(
						'label'       => esc_html__( 'Footer Spacing (px)', 'responsive' ),
						'section'     => 'responsive_footer_section',
						'settings'    => array(
							'desktop_top'    => 'responsive_footer_top_padding',
							'desktop_right'  => 'responsive_footer_right_padding',
							'desktop_bottom' => 'responsive_footer_bottom_padding',
							'desktop_left'   => 'responsive_footer_left_padding',
							'tablet_top'     => 'responsive_footer_tablet_top_padding',
							'tablet_right'   => 'responsive_footer_tablet_right_padding',
							'tablet_bottom'  => 'responsive_footer_tablet_bottom_padding',
							'tablet_left'    => 'responsive_footer_tablet_left_padding',
							'mobile_top'     => 'responsive_footer_mobile_top_padding',
							'mobile_right'   => 'responsive_footer_mobile_right_padding',
							'mobile_bottom'  => 'responsive_footer_mobile_bottom_padding',
							'mobile_left'    => 'responsive_footer_mobile_left_padding',
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

return new Responsive_Footer_Customizer();
