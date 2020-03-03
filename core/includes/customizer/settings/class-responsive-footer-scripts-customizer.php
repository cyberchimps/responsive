<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Scripts_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Scripts_Customizer {

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
				'responsive_footer_scripts',
				array(
					'title'    => esc_html__( 'Scripts', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 40,

				)
			);

			// Footer Script.
			$wp_customize->add_setting(
				'responsive_theme_options[responsive_inline_js_footer]',
				array(
					'sanitize_callback' => 'wp_kses_stripslashes',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_responsive_inline_js_footer',
				array(
					'label'    => __( 'Embeds to footer.php', 'responsive' ),
					'section'  => 'responsive_footer_scripts',
					'settings' => 'responsive_theme_options[responsive_inline_js_footer]',
					'type'     => 'textarea',
				)
			);

		}
	}

endif;

return new Responsive_Footer_Scripts_Customizer();
