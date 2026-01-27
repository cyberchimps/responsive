<?php
/**
 * General Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_General_Customizer' ) ) :
	/**
	 * General Customizer Options
	 */
	class Responsive_General_Customizer {

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
				'responsive_general',
				array(
					'title'    => esc_html__( 'General', 'responsive' ),
					'priority' => 100,
					//'panel'    => 'responsive_options', // 👈 REQUIRED
				)
			);

			
			// Breadcrumbs section start
			$wp_customize->add_setting(
				'responsive_theme_options[breadcrumb]',
				array(
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'type'              => 'option',
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'res_breadcrumb' ),
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'res_breadcrumb',
					array(
						'label'    => __( 'Enable Breadcrumbs', 'responsive' ),
						'section'  => 'responsive_general',
						'settings' => 'responsive_theme_options[breadcrumb]',
						'priority' => 10,
					)
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'breadcrumb_enable_separator', 2, 'responsive_general',15, 1, 'responsive_active_breadcrumb' );

			

			
		}
	}

endif;

/**
 * Active callback to show controls only when local fonts are enabled.
 *
 * @return bool
 */
// function responsive_active_local_fonts_enabled() {
// 	return ( 1 === (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ) );
// }

return new Responsive_General_Customizer();


