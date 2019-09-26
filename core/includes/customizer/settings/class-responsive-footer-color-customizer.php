<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Color_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Color_Customizer {

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
				'responsive_footer_color_section',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive-footer-options',
					'priority' => 202,
				)
			);
			// Background Color.
			$wp_customize->add_setting(
				'responsive_footer_background_color',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_footer_background_color',
					array(
						'label'    => __( 'Footer Background Color', 'responsive' ),
						'section'  => 'responsive_footer_color_section',
						'settings' => 'responsive_footer_background_color',
					)
				)
			);

			// Text Color.
			$wp_customize->add_setting(
				'responsive_footer_text_color',
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
					'responsive_footer_text_color',
					array(
						'label'    => __( 'Footer Text Color', 'responsive' ),
						'section'  => 'responsive_footer_color_section',
						'settings' => 'responsive_footer_text_color',
					)
				)
			);
		}


	}

endif;

return new Responsive_Footer_Color_Customizer();
