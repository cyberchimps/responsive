<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Single_Blog_Layout_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Single_Blog_Layout_Customizer {

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
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_single_blog_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_single_blog',
					'priority' => 10,
				)
			);

			// Main Content Width.
			$single_blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_content_width', $single_blog_content_width_label, 'responsive_single_blog_layout', 10, 66, null, 100, 1, 'postMessage' );

			// Sidebar.
			$sidebar_label   = esc_html__( 'Sidebar Position', 'responsive' );
			$sidebar_choices = array(
				'right' => esc_html__( 'Right Sidebar', 'responsive' ),
				'left'  => esc_html__( 'Left Sidebar', 'responsive' ),
				'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices = array(
					'right' => esc_html__( 'Left Sidebar', 'responsive' ),
					'left'  => esc_html__( 'Right Sidebar', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'single_blog_sidebar_position', $sidebar_label, 'responsive_single_blog_layout', 20, $sidebar_choices, 'right', null );

		}

	}

endif;

return new Responsive_Single_Blog_Layout_Customizer();
