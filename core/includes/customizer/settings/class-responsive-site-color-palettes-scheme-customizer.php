<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Color_Palettes_Scheme_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Color_Palettes_Scheme_Customizer {

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

			/**
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_color_palettes_scheme',
				array(
					'title'    => __( 'Color Palettes Scheme', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 15,
				)
			);

			$wp_customize->add_setting(
				'responsive_color_scheme',
				array(
					'sanitize_callback' => 'sanitize_radio',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Palette_Control(
					$wp_customize,
					'responsive_color_scheme_control',
					array(
						'label'        => esc_html__( 'Color Palettes Scheme', 'responsive' ),
						'section'      => 'responsive_color_palettes_scheme',
						'settings'     => 'responsive_color_scheme',
						'choices'      => responsive_get_color_schemes_as_choices(),
						'palette_type' => 'color-scheme',
						'priority'     => 1,
					)
				)
			);

		}


	}

endif;

return new Responsive_Site_Color_Palettes_Scheme_Customizer();
