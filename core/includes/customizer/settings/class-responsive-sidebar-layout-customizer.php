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
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_sidebar_typography_separator',
				$design_tab_ids_prefix . 'sidebar_typography-font-family',
				$design_tab_ids_prefix . 'sidebar_typography-font-weight',
				$design_tab_ids_prefix . 'sidebar_typography-font-style',
				$design_tab_ids_prefix . 'sidebar_typography-text-transform',
				$design_tab_ids_prefix . 'sidebar_typography-font-size',
				$design_tab_ids_prefix . 'sidebar_typography-line-height',
				$design_tab_ids_prefix . 'sidebar_typography-letter-spacing',
				$design_tab_ids_prefix . 'responsive_sidebar_headings_color',
				$design_tab_ids_prefix . 'responsive_sidebar_background_color',
				$design_tab_ids_prefix . 'responsive_sidebar_text_color',
				$design_tab_ids_prefix . 'responsive_sidebar_link_color',
				$design_tab_ids_prefix . 'responsive_sidebar_link_hover_color',
				$design_tab_ids_prefix . 'responsive_sidebar_background_image',
			);

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_blog_sidebar_width',
				$general_tab_ids_prefix . 'responsive_page_sidebar_position',
				$general_tab_ids_prefix . 'responsive_page_sidebar_width',
				$general_tab_ids_prefix . 'responsive_blog_sidebar_position',
				$general_tab_ids_prefix . 'responsive_single_blog_sidebar_position',
				$general_tab_ids_prefix . 'responsive_single_blog_sidebar_width',
			);

			responsive_tabs_button_control( $wp_customize, 'sidebar_tabs', $tabs_label, 'responsive_sidebar', 1, '', 'responsive_sidebar_general_tab', 'responsive_sidebar_design_tab', $general_tab_ids, $design_tab_ids, null );

			/**
			 * Entry Elements.
			 */
			$sidebar_typography_label = esc_html__( 'Typography', 'responsive' );
			responsive_separator_control( $wp_customize, 'sidebar_typography_separator', $sidebar_typography_label, 'responsive_sidebar', 60 );

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
			responsive_select_button_control( $wp_customize, 'page_sidebar_position', $sidebar_label, 'responsive_sidebar', 20, $sidebar_choices, 'right', null );

			$page_sidebar_width_label = esc_html__( 'Page Sidebar Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar', 25, 30, 'responsive_not_active_page_sidebar', 50, 20, 'postMessage' );

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
			responsive_select_button_control( $wp_customize, 'blog_sidebar_position', $sidebar_label, 'responsive_sidebar', 30, $sidebar_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_sidebar_position' ), null );

			$page_sidebar_width_label = esc_html__( 'Blog / Archive Sidebar Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar', 35, 30, 'responsive_not_active_blog_archive_sidebar', 50, 20, 'postMessage' );

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
			responsive_select_button_control( $wp_customize, 'single_blog_sidebar_position', $sidebar_label, 'responsive_sidebar', 40, $sidebar_choices, 'right', null );

			$page_sidebar_width_label = esc_html__( 'Single Post Sidebar Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar', 45, 30, 'responsive_not_active_single_post_sidebar', 50, 20, 'postMessage' );
		}

	}

endif;

return new Responsive_Sidebar_Layout_Customizer();
