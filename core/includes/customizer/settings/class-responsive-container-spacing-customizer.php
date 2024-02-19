<?php
/**
 * Blog Customizer Options
 *
 * @package Responsive Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Container_Spacing_Customizer' ) ) :
	/**
	 * Blog Customizer Options
	 */
	class Responsive_Container_Spacing_Customizer {

		/**
		 * Constructor
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

			$container_spacing_label = esc_html__( 'SPACING', 'responsive' );
			responsive_separator_control( $wp_customize, 'container_spacing', $container_spacing_label, 'responsive_layout', 60 );

			// Outside Container.
			$outside_container_label = __( 'Outside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'outside_container', 'responsive_layout', 70, 0, 15, 'responsive_not_active_site_style_flat', $outside_container_label );

			$container_spacing_label = esc_html__( 'SPACING', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_container_spacing', $container_spacing_label, 'responsive_blog_layout', 230 );

			// Outside Container.
			$outside_container_label = __( 'Outside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'blog_outside_container', 'responsive_blog_layout', 240, 15, 15, 'responsive_not_active_site_style_flat', $outside_container_label );

			// Inside Container.
			$outside_container_label = __( 'Inside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'blog_inside_container', 'responsive_blog_layout', 250, 15, 15, 'responsive_not_active_site_style_flat', $outside_container_label );

			$container_spacing_label = esc_html__( 'SPACING', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_container_spacing', $container_spacing_label, 'responsive_single_blog_layout', 160 );

			// Outside Container.
			$outside_container_label = __( 'Outside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'single_blog_outside_container', 'responsive_single_blog_layout', 170, 15, 15, 'responsive_not_active_site_style_flat', $outside_container_label );

			// Inside Container.
			$outside_container_label = __( 'Inside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'single_blog_inside_container', 'responsive_single_blog_layout', 180, 15, 15, 'responsive_not_active_site_style_flat', $outside_container_label );

			$sidebar_spacing_label = esc_html__( 'SPACING', 'responsive' );
			responsive_separator_control( $wp_customize, 'sidebar_spacing', $sidebar_spacing_label, 'responsive_sidebar_layout', 70 );

			// Outside Container.
			$outside_container_label = __( 'Outside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'sidebar_outside_container', 'responsive_sidebar_layout', 80, 0, 15, '', $outside_container_label );

			// Inside Container.
			$outside_container_label = __( 'Inside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'sidebar_inside_container', 'responsive_sidebar_layout', 90, 28, 28, '', $outside_container_label );

		}
	}

endif;

return new Responsive_Container_Spacing_Customizer();
