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

			$wp_customize->add_panel(
				'responsive_site',
				array(
					'title'       => __( 'Global Settings', 'responsive' ),
					'description' => __( 'Global Settings', 'responsive' ),
					'priority'    => 110,
				)
			);

			$wp_customize->add_panel(
				'responsive_header',
				array(
					'title'       => __( 'Header', 'responsive' ),
					'description' => __( 'Header Options', 'responsive' ),
					'priority'    => 120,
				)
			);

			$wp_customize->add_panel(
				'responsive_page',
				array(
					'title'       => __( 'Page', 'responsive' ),
					'description' => __( 'Page Options', 'responsive' ),
					'priority'    => 130,
				)
			);

			$wp_customize->add_panel(
				'responsive_blog',
				array(
					'title'       => __( 'Blog / Archive', 'responsive' ),
					'description' => __( 'Blog Options', 'responsive' ),
					'priority'    => 140,
				)
			);

			$wp_customize->add_panel(
				'responsive_sidebar',
				array(
					'title'       => __( 'Sidebar', 'responsive' ),
					'description' => __( 'Sidebar Options', 'responsive' ),
					'priority'    => 150,
				)
			);

			$wp_customize->add_panel(
				'responsive_footer',
				array(
					'title'       => __( 'Footer', 'responsive' ),
					'description' => __( 'Footer Options', 'responsive' ),
					'priority'    => 160,
				)
			);

			$wp_customize->get_section( 'title_tagline' )->priority     = 10;
			$wp_customize->get_section( 'static_front_page' )->priority = 109;
			$wp_customize->get_section( 'custom_css' )->priority        = 300;
		}
	}

endif;

return new Responsive_Panel();
