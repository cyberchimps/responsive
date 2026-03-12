<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

use function Responsive\Core\get_responsive_customizer_defaults;

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

			$transport = 'postMessage';

			$default_colors = array(
				'responsive_global_color_palette_accent_color'          => '#0066CC',
				'responsive_global_color_palette_link_hover_color'      => '#10659C',
				'responsive_global_color_palette_text_color'            => '#333333',
				'responsive_global_color_palette_headings_color'        => '#333333',
				'responsive_global_color_palette_content_bg_color'      => '#ffffff',
				'responsive_global_color_palette_site_background_color' => '#f0f5fa',
				'responsive_global_color_palette_alt_background_color'  => '#eaeaea',
				'responsive_global_color_palette_subtle_background_color'  => '#10659C'
			);

			foreach ( $default_colors as $setting_id => $default ) {

				$wp_customize->add_setting(
					$setting_id,
					array(
						'type'              => 'theme_mod',
						'default'           => $default,
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => $transport,
					)
				);
			}

			$wp_customize->add_setting(
				'responsive_global_color_palette',
				array(
					'sanitize_callback' => 'responsive_sanitize_builder',
					'default'           => get_responsive_customizer_defaults('default_global_palette'),
					'transport' => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Palette_Control(
					$wp_customize,
					'responsive_color_scheme_control',
					array(
						'label'        => esc_html__( 'Global Palette', 'responsive' ),
						'section'      => 'responsive_colors',
						'settings'     => 'responsive_global_color_palette',
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
