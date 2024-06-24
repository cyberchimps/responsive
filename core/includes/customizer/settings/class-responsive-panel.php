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
					'priority'    => 7,
				)
			);

			$wp_customize->add_panel(
				'responsive_header',
				array(
					'title'       => __( 'Header', 'responsive' ),
					'description' => __( 'Header Options', 'responsive' ),
					'priority'    => 8,
				)
			);

			$wp_customize->add_section(
				'responsive_breadcrumb',
				array(
					'title'    => __( 'Breadcrumb', 'responsive' ),
					'priority' => 9,
				)
			);

			$tabs_label      = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix  = 'customize-control-';
			$design_tab_ids  = array(
				$tab_ids_prefix . 'responsive_breadcrumb_color',
				$tab_ids_prefix . 'responsive_breadcrumb',
				$tab_ids_prefix . 'breadcrumb_typography-font-family',
				$tab_ids_prefix . 'breadcrumb_typography-font-weight',
				$tab_ids_prefix . 'breadcrumb_typography-font-style',
				$tab_ids_prefix . 'breadcrumb_typography-text-transform',
				$tab_ids_prefix . 'breadcrumb_typography-font-size',
				$tab_ids_prefix . 'breadcrumb_typography-line-height',
				$tab_ids_prefix . 'breadcrumb_typography-letter-spacing',
			);
			$general_tab_ids = array(
				$tab_ids_prefix . 'res_breadcrumb',
				$tab_ids_prefix . 'responsive_breadcrumb_position',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_home_page',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_blog_posts_page',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_search',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_archive',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_single_page',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_single_post',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_singular',
				$tab_ids_prefix . 'responsive_breadcrumb_disable_404_page',
				$tab_ids_prefix . 'responsive_breadcrumb_separator',
				$tab_ids_prefix . 'responsive_content_header_alignment',
				$tab_ids_prefix . 'responsive_content_header_padding',
			);

			responsive_tabs_button_control( $wp_customize, 'breadcrumb_tabs', $tabs_label, 'responsive_breadcrumb', 10, '', 'responsive_breadcrumb_general_tab', 'responsive_breadcrumb_design_tab', $general_tab_ids, $design_tab_ids, null );

			$wp_customize->add_section(
				'responsive_page',
				array(
					'title'    => __( 'Page', 'responsive' ),
					'priority' => 9,
				)
			);

			$wp_customize->add_panel(
				'responsive_blog',
				array(
					'title'       => __( 'Blog / Archive', 'responsive' ),
					'description' => __( 'Blog Options', 'responsive' ),
					'priority'    => 10,
				)
			);

			$wp_customize->add_section(
				'responsive_sidebar',
				array(
					'title'    => __( 'Sidebar', 'responsive' ),
					// 'description' => __( 'Sidebar Options', 'responsive' ),
					'priority' => 10,
				)
			);

			$wp_customize->add_panel(
				'responsive_footer',
				array(
					'title'       => __( 'Footer', 'responsive' ),
					'description' => __( 'Footer Options', 'responsive' ),
					'priority'    => 11,
				)
			);

			$wp_customize->get_section( 'title_tagline' )->priority     = 12;
			$wp_customize->get_section( 'static_front_page' )->priority = 109;
			$wp_customize->get_section( 'custom_css' )->priority        = 300;
		}
	}

endif;

return new Responsive_Panel();
