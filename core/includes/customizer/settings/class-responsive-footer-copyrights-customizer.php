<?php
/**
 *
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Copyrights_Customizer' ) ) :
	/** Footer Customizer Options */
	class Responsive_Footer_Copyrights_Customizer {

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
		 * @param  object $wp_customize    arguments.
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {
			/*
			------------------------------------------------------------------
				// Copyright Text
			-------------------------------------------------------------------
			*/

			$wp_customize->add_section(
				'footer_section',
				array(
					'title'    => __( 'Footer Settings', 'responsive' ),
					'panel'    => 'responsive-footer-options',
					'priority' => 30,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[copyright_textbox]',
				array(
					'default'           => __( 'Default copyright text', 'responsive' ),
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'type'              => 'option',
				)
			);

			$wp_customize->add_control(
				'res_copyright_textbox',
				array(
					'label'    => __( 'Copyright text', 'responsive' ),
					'section'  => 'footer_section',
					'settings' => 'responsive_theme_options[copyright_textbox]',
					'type'     => 'text',
					'priority' => 1,
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[poweredby_link]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_poweredby_link',
				array(
					'label'    => __( 'Display Powered By WordPress Link', 'responsive' ),
					'section'  => 'footer_section',
					'settings' => 'responsive_theme_options[poweredby_link]',
					'type'     => 'checkbox',
					'priority' => 2,
				)
			);
		}
	}

endif;

return new Responsive_Footer_Copyrights_Customizer();
