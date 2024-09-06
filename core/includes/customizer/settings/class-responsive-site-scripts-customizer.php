<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Scripts_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Scripts_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 5.1.2
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
			 * Scripts.
			 */
			$wp_customize->add_section(
				'responsive_scripts',
				array(
					'title'    => __( 'Embed Scripts', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 100,
				)
			);
            
              // Header Script.
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
					'section'  => 'responsive_scripts',
                    'priority' => 110,
					'settings' => 'responsive_theme_options[responsive_inline_js_head]',
					'type'     => 'textarea',
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
					'section'  => 'responsive_scripts',
					'settings' => 'responsive_theme_options[responsive_inline_js_footer]',
                    'priority' => 120,
					'type'     => 'textarea',
				)
			);
			
		}
	}

endif;

return new Responsive_Site_Scripts_Customizer();
