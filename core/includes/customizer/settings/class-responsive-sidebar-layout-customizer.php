<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Sidebar_Layout_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Sidebar_Layout_Customizer {

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
				'responsive_sidebar_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_sidebar',
					'priority' => 10,
				)
			);
			// Sidebar.
			$sidebar_label   = esc_html__( 'Page Sidebar Position', 'responsive' );
			$sidebar_choices = array(
				'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'page_sidebar_position', $sidebar_label, 'responsive_sidebar_layout', 20, $sidebar_choices, 'right', null );

			$page_sidebar_width_label = esc_html__( 'Page Sidebar Width (%)', 'responsive');
			responsive_drag_number_control( $wp_customize, 'page_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar_layout', 25, 30, 'responsive_not_active_page_sidebar', 50, 20, 'postMessage' );

			// Sidebar.
			$sidebar_label   = esc_html__( 'Blog / Archive Sidebar Position', 'responsive' );
			$sidebar_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_sidebar_position', $sidebar_label, 'responsive_sidebar_layout', 30, $sidebar_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_sidebar_position' ), null );

			$page_sidebar_width_label = esc_html__( 'Blog / Archive Sidebar Width (%)', 'responsive');
			responsive_drag_number_control( $wp_customize, 'blog_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar_layout', 35, 30, 'responsive_not_active_blog_archive_sidebar', 50, 20, 'postMessage' );

			// Sidebar.
			$sidebar_label   = esc_html__( 'Single Post Sidebar Position', 'responsive' );
			$sidebar_choices = array(
				'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'single_blog_sidebar_position', $sidebar_label, 'responsive_sidebar_layout', 40, $sidebar_choices, 'right', null );

			$page_sidebar_width_label = esc_html__( 'Single Post Sidebar Width (%)', 'responsive');
			responsive_drag_number_control( $wp_customize, 'single_blog_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar_layout', 45, 30, 'responsive_not_active_single_post_sidebar', 50, 20, 'postMessage' );
		}

	}

endif;

return new Responsive_Sidebar_Layout_Customizer();
