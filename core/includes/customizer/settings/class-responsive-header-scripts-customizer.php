<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Scripts_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Scripts_Customizer {

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
				'responsive_header_scripts',
				array(
					'title'    => esc_html__( 'Scripts', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 35,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[responsive_inline_js_head]',
				array(
					'sanitize_callback' => 'wp_kses_stripslashes',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_responsive_inline_js_head',
				array(
					'label'    => __( 'Embeds to header.php', 'responsive' ),
					'section'  => 'responsive_header_scripts',
					'settings' => 'responsive_theme_options[responsive_inline_js_head]',
					'type'     => 'textarea',
				)
			);

		}


	}

endif;

return new Responsive_Header_Scripts_Customizer();
