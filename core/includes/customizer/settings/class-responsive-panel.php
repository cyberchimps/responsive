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
				$tab_ids_prefix . 'responsive_breadcrumb_typography_separator',
				$tab_ids_prefix . 'responsive_breadcrumb_typography_group',
			);
			$general_tab_ids = array(
				$tab_ids_prefix . 'res_breadcrumb',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_separator',				
				$tab_ids_prefix . 'responsive_breadcrumb_position',
				$tab_ids_prefix . 'responsive_breadcrumb_position_separator',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_home_page',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_blog_posts_page',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_search',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_archive',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_single_page',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_single_post',
				$tab_ids_prefix . 'responsive_breadcrumb_enable_404_page',
				$tab_ids_prefix . 'responsive_breadcrumb_separator',
				$tab_ids_prefix . 'responsive_breadcrumb_separator_separator',
				$tab_ids_prefix . 'responsive_content_header_alignment',
				$tab_ids_prefix . 'responsive_content_header_alignment_separator',
				$tab_ids_prefix . 'responsive_content_header_padding',
				$tab_ids_prefix . 'responsive_breadcrumb_display_settings_separator',
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
			$wp_customize->get_control( 'custom_logo' )->section        = 'responsive_header_site_logo_title';
			$wp_customize->get_control( 'blogname' )->section           = 'responsive_header_site_logo_title';
			$wp_customize->get_control( 'blogdescription' )->section    = 'responsive_header_site_logo_title';

			$tabs_label      = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix  = 'customize-control-';
			$logo_design_tab_ids  = array(
				$tab_ids_prefix . 'responsive_header_title_colors_separator',
				$tab_ids_prefix . 'responsive_header_site_title_color',
				$tab_ids_prefix . 'responsive_header_site_title',
				$tab_ids_prefix . 'responsive_header_site_title_hover',
				$tab_ids_prefix . 'responsive_header_site_title_hover_color',
				$tab_ids_prefix . 'responsive_header_site_title_separator',
				$tab_ids_prefix . 'responsive_header_site_title_typography_group',
				$tab_ids_prefix . 'responsive_header_site_title_typo_separator',
				$tab_ids_prefix . 'responsive_header_site_tagline_typo_separator',
				$tab_ids_prefix . 'responsive_header_tagline_colors_separator',
				$tab_ids_prefix . 'responsive_header_text',
				$tab_ids_prefix . 'responsive_header_text_color',
				$tab_ids_prefix . 'responsive_header_site_tagline_separator',
				$tab_ids_prefix . 'responsive_header_site_tagline_typography_group',
			);
			$logo_general_tab_ids = array(
				$tab_ids_prefix . 'custom_logo',
				$tab_ids_prefix . 'blogname',
				$tab_ids_prefix . 'blogdescription',
				$tab_ids_prefix . 'responsive_retina_logo',
				$tab_ids_prefix . 'responsive_logo_width',
				$tab_ids_prefix . 'responsive_mobile_logo_option',
				$tab_ids_prefix . 'responsive_mobile_logo',
				$tab_ids_prefix . 'responsive_hide_title',
				$tab_ids_prefix . 'responsive_hide_tagline',
				$tab_ids_prefix . 'responsive_custom_logo_url',
			);
			
			if( ! get_theme_mod( 'custom_logo' ) ) {
				$key = array_search($tab_ids_prefix . 'responsive_logo_width', $logo_general_tab_ids);
				if ($key !== false) {
					unset($logo_general_tab_ids[$key]);
				}
			}
			$logo_general_tab_ids = array_values($logo_general_tab_ids);

			responsive_tabs_button_control( $wp_customize, 'logo_tabs', $tabs_label, 'responsive_header_site_logo_title', 1, '', 'responsive_logo_general_tab', 'responsive_logo_design_tab', $logo_general_tab_ids, $logo_design_tab_ids, null );
		}
	}

endif;

return new Responsive_Panel();
