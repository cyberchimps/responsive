<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Panel' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Panel {

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
		 * @param  object $wp_customize WordPress customization option.
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {

			// Layout Panel.
			$wp_customize->add_panel(
				'responsive-layout-options',
				array(
					'title'       => __( 'Layout', 'responsive' ),
					'description' => 'Layout Options', // Include html tags such as <p>.
					'priority'    => 21, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->add_panel(
				'responsive-appearance-options',
				array(
					'title'       => __( 'Appearance', 'responsive' ),
					'description' => 'appearance Options', // Include html tags such as <p>.
					'priority'    => 10, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->add_panel(
				'responsive-page-options',
				array(
					'title'       => __( 'Page', 'responsive' ),
					'description' => 'page Options', // Include html tags such as <p>.
					'priority'    => 13, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->add_panel(
				'responsive-blog-options',
				array(
					'title'       => __( 'Blog', 'responsive' ),
					'description' => 'blog Options', // Include html tags such as <p>.
					'priority'    => 12, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->add_panel(
				'responsive-header-options',
				array(
					'title'       => __( 'Header', 'responsive' ),
					'description' => 'header Options', // Include html tags such as <p>.
					'priority'    => 11, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->add_panel(
				'responsive-footer-options',
				array(
					'title'       => __( 'Footer', 'responsive' ),
					'description' => 'footer Options', // Include html tags such as <p>.
					'priority'    => 14, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->get_section( 'colors' )->panel = 'responsive-appearance-options'; // Add to Colors Panel.
			$wp_customize->get_section( 'colors' )->title = __( 'Background Color', 'responsive' );

			$wp_customize->get_section( 'background_image' )->panel = 'responsive-appearance-options';
		}
	}

endif;

return new Responsive_Panel();
