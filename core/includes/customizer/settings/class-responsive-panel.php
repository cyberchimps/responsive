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
					'title'       => __( 'Theme Options', 'responsive' ),
					'description' => 'header Options',
					'priority'    => 110,
				)
			);

			$wp_customize->add_panel(
				'responsive_header',
				array(
					'title'       => __( 'Header', 'responsive' ),
					'description' => 'header Options',
					'priority'    => 120,
				)
			);

			$wp_customize->add_panel(
				'responsive_header_menu',
				array(
					'title'       => __( 'Main Menu', 'responsive' ),
					'description' => 'Header Menu Options',
					'priority'    => 130,
				)
			);

			$wp_customize->add_panel(
				'responsive_sidebar',
				array(
					'title'       => __( 'Sidebar', 'responsive' ),
					'description' => 'Sidebar Options',
					'priority'    => 131,
				)
			);

			$wp_customize->add_panel(
				'responsive_footer',
				array(
					'title'       => __( 'Footer', 'responsive' ),
					'description' => 'footer Options',
					'priority'    => 140,
				)
			);

			$wp_customize->add_panel(
				'responsive_content_header',
				array(
					'title'       => __( 'Content Header', 'responsive' ),
					'description' => 'Content Header',
					'priority'    => 150,
				)
			);

			$wp_customize->add_panel(
				'responsive_blog',
				array(
					'title'       => __( 'Blog / Archive', 'responsive' ),
					'description' => 'Blog Options',
					'priority'    => 160,
				)
			);

			$wp_customize->add_panel(
				'responsive_single_blog',
				array(
					'title'       => __( 'Blog Post', 'responsive' ),
					'description' => 'Single Blog Post',
					'priority'    => 170,
				)
			);

			$wp_customize->add_panel(
				'responsive_page',
				array(
					'title'       => __( 'Page', 'responsive' ),
					'description' => 'page Options',
					'priority'    => 180,
				)
			);

			$wp_customize->get_section( 'title_tagline' )->priority     = 10;
			$wp_customize->get_section( 'static_front_page' )->priority = 109;
			$wp_customize->get_section( 'custom_css' )->priority        = 300;
		}
	}

endif;

return new Responsive_Panel();
