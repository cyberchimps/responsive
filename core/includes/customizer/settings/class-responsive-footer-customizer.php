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
					'title'    => esc_html__( 'Footer', 'responsive' ),
					'panel'    => 'responsive-layout-options',
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
		}


	}

endif;

return new Responsive_Footer_Customizer();
