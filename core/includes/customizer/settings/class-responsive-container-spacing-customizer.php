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

			$container_spacing_label = esc_html__( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'container_spacing', $container_spacing_label, 'responsive_layout', 60, 'responsive_not_active_site_style_flat', 'This spacing applies to all pages, blogs/archives and single posts' );

			// Outside Container.
			responsive_unit_padding_control( $wp_customize, 'outside_container', 'responsive_layout', 70, 28, 12, 'responsive_not_active_site_style_flat', __( 'Outside Container', 'responsive' ) );

			$container_spacing_label = esc_html__( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_container_spacing', $container_spacing_label, 'responsive_blog_layout', 250 );

			// Outside Container.
			responsive_unit_padding_control( $wp_customize, 'blog_outside_container', 'responsive_blog_layout', 260, '', '', 'responsive_not_active_site_style_flat', __( 'Outside Container', 'responsive' ) );

			// Inside Container.
			responsive_unit_padding_control( $wp_customize, 'blog_inside_container', 'responsive_blog_layout', 270, '', '', 'responsive_not_active_site_style_flat', __( 'Inside Container', 'responsive' ), 'postMessage', '', '', '', '' );

			$container_spacing_label = esc_html__( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_container_spacing', $container_spacing_label, 'responsive_single_blog_layout', 250 );

			// Single Post Outside Container.
			responsive_unit_padding_control( $wp_customize, 'single_blog_outside_container', 'responsive_single_blog_layout', 260, '', '', 'responsive_not_active_site_style_flat', __( 'Outside Container', 'responsive' ), 'postMessage', '', '', '', '', 'px' );

			// Single Post Inside Container.
			responsive_unit_padding_control( $wp_customize, 'single_blog_inside_container', 'responsive_single_blog_layout', 270, '', '', 'responsive_not_active_site_style_flat', __( 'Inside Container', 'responsive' ), 'postMessage', '', '', '', '', 'px' );

			$sidebar_spacing_label = esc_html__( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'sidebar_spacing', $sidebar_spacing_label, 'responsive_sidebar', 70 );

			// Outside Container.
			$outside_container_label = __( 'Outside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'sidebar_outside_container', 'responsive_sidebar', 80, 28, 12, '', $outside_container_label );

			// Inside Container.
			$inside_container_label = __( 'Inside Container (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'sidebar_inside_container', 'responsive_sidebar', 90, 28, 28, '', $inside_container_label );

		}
	}

endif;

return new Responsive_Container_Spacing_Customizer();
