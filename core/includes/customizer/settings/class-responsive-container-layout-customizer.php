<?php
/**
 * Container Layout Customizer Options
 *
 * Adds a "Container Layout" (Default / Normal / Full Width) override to the
 * Page, Blog / Archive, and Single Post customizer sections. "Default"
 * inherits the site-wide Layout > Container Layout setting
 * (responsive_width, registered in class-responsive-site-layouts-customizer.php).
 * The actual class swap on the front end happens in
 * responsive_add_container_layout_body_classes() in core/includes/functions.php.
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Container_Layout_Customizer' ) ) :
	/**
	 * Container Layout Customizer Options
	 */
	class Responsive_Container_Layout_Customizer {

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
		 */
		public function customizer_options( $wp_customize ) {

			$container_layout_choices = array(
				'default'    => esc_html__( 'Default', 'responsive' ),
				'normal'     => esc_html__( 'Normal', 'responsive' ),
				'full-width' => esc_html__( 'Full Width', 'responsive' ),
			);

			// Page Container Layout.
			$page_container_layout_heading_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_container_layout_separator', $page_container_layout_heading_label, 'responsive_page', 27 );

			$page_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_imageradio_button_control( $wp_customize, 'page_container_layout', $page_container_layout_label, 'responsive_page', 28, $container_layout_choices, 'default', null, 'svg', 'postMessage' );

			// Blog/Archive Container Layout.
			$blog_container_layout_heading_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_container_layout_separator', $blog_container_layout_heading_label, 'responsive_blog_layout', 36 );

			$blog_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_imageradio_button_control( $wp_customize, 'blog_container_layout', $blog_container_layout_label, 'responsive_blog_layout', 37, $container_layout_choices, 'default', null, 'svg', 'postMessage' );

			// Single Post Container Layout.
			$single_blog_container_layout_heading_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_container_layout_separator', $single_blog_container_layout_heading_label, 'responsive_single_blog_layout', 46 );

			$single_blog_container_layout_label = esc_html__( 'Container Layout', 'responsive' );
			responsive_imageradio_button_control( $wp_customize, 'single_blog_container_layout', $single_blog_container_layout_label, 'responsive_single_blog_layout', 47, $container_layout_choices, 'default', null, 'svg', 'postMessage' );

		}
	}

endif;

return new Responsive_Container_Layout_Customizer();