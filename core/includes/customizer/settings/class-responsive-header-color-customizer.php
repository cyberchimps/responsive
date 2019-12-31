<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Color_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Color_Customizer {

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
				'responsive_header_color_section',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive-header-options',
					'priority' => 202,
				)
			);
			// Background Color.
			$wp_customize->add_setting(
				'responsive_header_background_color',
				array(
					'default'           => '#ffffff',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_header_background_color',
					array(
						'label'    => __( 'Header Background Color', 'responsive' ),
						'section'  => 'responsive_header_color_section',
						'settings' => 'responsive_header_background_color',
					)
				)
			);

			// Text Color.
			$wp_customize->add_setting(
				'responsive_header_text_color',
				array(
					'default'           => '#333333',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_header_text_color',
					array(
						'label'    => __( 'Header Text Color', 'responsive' ),
						'section'  => 'responsive_header_color_section',
						'settings' => 'responsive_header_text_color',
					)
				)
			);
		}


	}

endif;

return new Responsive_Header_Color_Customizer();
