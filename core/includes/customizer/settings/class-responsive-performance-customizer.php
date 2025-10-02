<?php
/**
 * Performance Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Performance_Customizer' ) ) :
	/**
	 * Performance Customizer Options
	 */
	class Responsive_Performance_Customizer {

		/**
		 * Setup class.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$wp_customize->add_section(
				'responsive_performance',
				array(
					'title'    => esc_html__( 'Performance', 'responsive' ),
					'priority' => 40,
				)
			);

			// Toggle: Load Google Fonts Locally.
			responsive_toggle_control(
				$wp_customize,
				'load_google_fonts_locally',
				esc_html__( 'Load Google Fonts Locally', 'responsive' ),
				'responsive_performance',
				10,
				0,
				null
			);

			// Toggle: Preload Local Fonts (visible only if local fonts are enabled).
			responsive_toggle_control(
				$wp_customize,
				'preload_local_fonts',
				esc_html__( 'Preload Local Fonts', 'responsive' ),
				'responsive_performance',
				20,
				0,
				'responsive_active_local_fonts_enabled'
			);

			// Info + Button: Flush Local Fonts Cache.
			// Description text above the button.
			$wp_customize->add_setting(
				'responsive_flush_local_fonts_desc',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);

			// Replace redirect with custom React button control.
			$wp_customize->add_setting(
				'responsive_flush_local_fonts_button',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => '',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Flush_Fonts_Control(
					$wp_customize,
					'responsive_flush_local_fonts_button',
					array(
						'label'           => esc_html__( 'Flush Local Fonts Cache', 'responsive' ),
						'description'     => esc_html__( 'Deletes cached local font files. They will be regenerated as needed.', 'responsive' ),
						'section'         => 'responsive_performance',
						'priority'        => 40,
						'active_callback' => 'responsive_active_local_fonts_enabled',
						'button_text'     => esc_html__( 'Flush Cache', 'responsive' ),
					)
				)
			);
		}
	}

endif;

/**
 * Active callback to show controls only when local fonts are enabled.
 *
 * @return bool
 */
function responsive_active_local_fonts_enabled() {
	return ( 1 === (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ) );
}

return new Responsive_Performance_Customizer();


