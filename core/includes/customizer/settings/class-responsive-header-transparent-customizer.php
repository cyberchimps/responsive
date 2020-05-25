<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Transparent_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Transparent_Customizer {

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
			$wp_customize->add_section(
				'responsive_header_transparent',
				array(
					'title'    => esc_html__( 'Transparent Header', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 25,

				)
			);

			/**
			 * Transparent Header Separator.
			 */
			$transparent_header_separator_label = esc_html__( 'Transparent Header Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_separator', $transparent_header_separator_label, 'responsive_header_transparent', 10 );

			// Transperant Header.
			$transparent_header_label = __( 'Enable on Complete Website', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'transparent_header', $transparent_header_label, 'responsive_header_transparent', 20, 0, null );

			// Different Logo For Transparent Header.
			$transparent_header_logo_option_label = __( 'Different Logo For Transparent Header ', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'transparent_header_logo_option', $transparent_header_logo_option_label, 'responsive_header_transparent', 25, 0, 'responsive_is_transparent_header_enabled' );

			$wp_customize->add_setting(
				'responsive_transparent_header_logo',
				array(
					'sanitize_callback' => 'absint',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Cropped_Image_Control(
					$wp_customize,
					'responsive_transparent_header_logo',
					array(
						'label'           => esc_html__( 'Logo For Transparent Header', 'responsive' ),
						'section'         => 'responsive_header_transparent',
						'flex-height'     => true,
						'flex-width'      => true,
						'height'          => 300, // pixels.
						'width'           => 1200, // pixels.
						'priority'        => 28,
						'active_callback' => 'responsive_is_transparent_header_enabled',
					)
				)
			);

			// Site Content Padding.
			$site_content_padding_label = esc_html__( 'Site Content Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'site_content', 'responsive_header_transparent', 30, 120, 0, 'responsive_is_transparent_header_enabled', $site_content_padding_label );

			$disable_archive_transparent_header_label = __( 'Disable on 404, Search & Archives?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_archive_transparent_header', $disable_archive_transparent_header_label, 'responsive_header_transparent', 40, 0, 'responsive_is_transparent_header_enabled' );

			$disable_blog_page_transparent_header_label = __( 'Disable on Blog page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_blog_page_transparent_header', $disable_blog_page_transparent_header_label, 'responsive_header_transparent', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_homepage_transparent_header_label = __( 'Disable on Homepage?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_homepage_transparent_header', $disable_homepage_transparent_header_label, 'responsive_header_transparent', 60, 0, 'responsive_is_transparent_header_enabled' );

			$disable_pages_transparent_header_label = __( 'Disable on Pages?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_pages_transparent_header', $disable_pages_transparent_header_label, 'responsive_header_transparent', 70, 0, 'responsive_is_transparent_header_enabled' );

			$disable_posts_transparent_header_label = __( 'Disable on Single Posts?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_posts_transparent_header', $disable_posts_transparent_header_label, 'responsive_header_transparent', 80, 0, 'responsive_is_transparent_header_enabled' );

			$disable_woo_products_transparent_header_label = __( 'Disable on WooCommerce Pages?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_woo_products_transparent_header', $disable_woo_products_transparent_header_label, 'responsive_header_transparent', 90, 0, 'responsive_is_transparent_header_enabled' );

			/**
			 * Transparent Header Colors Separator.
			 */
			$tranparent_header_color_separator_label = esc_html__( 'Transparent Header Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'tranparent_header_color_separator', $tranparent_header_color_separator_label, 'responsive_header_transparent', 100, 'responsive_is_transparent_header_enabled' );

			$transparent_header_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_border', $transparent_header_border_color_label, 'responsive_header_transparent', 120, Responsive\Core\get_responsive_customizer_defaults( 'header_border' ), 'responsive_is_transparent_header_enabled' );

			$transparent_header_site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_site_title', $transparent_header_site_title_color_label, 'responsive_header_transparent', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ), 'responsive_is_transparent_header_enabled' );

			$transparent_header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_site_title_hover', $transparent_header_site_title_hover_color_label, 'responsive_header_transparent', 140, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ), 'responsive_is_transparent_header_enabled' );

			$transparent_header_text_color_label = __( 'Site Tagline Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_text', $transparent_header_text_color_label, 'responsive_header_transparent', 150, Responsive\Core\get_responsive_customizer_defaults( 'header_text' ), 'responsive_is_transparent_header_enabled' );

			/**
			 * Transparent Header Menu Colors Separator.
			 */
			$tranparent_header_menu_color_separator_label = esc_html__( 'Transparent Header Menu', 'responsive' );
			responsive_separator_control( $wp_customize, 'tranparent_header_menu_color_separator', $tranparent_header_menu_color_separator_label, 'responsive_header_transparent', 160, 'responsive_is_transparent_header_enabled' );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_background', $menu_background_color_label, 'responsive_header_transparent', 160, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), 'responsive_active_vertical_transparent_header' );

			$mobile_menu_background_color_label = __( 'Mobile Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_mobile_menu_background', $mobile_menu_background_color_label, 'responsive_header_transparent', 170, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), 'responsive_is_transparent_header_enabled' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_border', $menu_border_color_label, 'responsive_header_transparent', 180, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ), 'responsive_active_vertical_transparent_header' );

			// Active Menu Color.
			$menu_border_color_label = __( 'Active Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_active_menu_background', $menu_border_color_label, 'responsive_header_transparent', 190, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ), 'responsive_is_transparent_header_enabled' );

			// Link Color.
			$menu_link_color_label = __( 'Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_link', $menu_link_color_label, 'responsive_header_transparent', 200, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ), 'responsive_is_transparent_header_enabled' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_link_hover', $menu_link_hover_color_label, 'responsive_header_transparent', 210, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ), 'responsive_is_transparent_header_enabled' );

			// Sub Menu Background Color.
			$responsive_transparent_header_sub_menu_background_color_label = __( 'Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_background', $responsive_transparent_header_sub_menu_background_color_label, 'responsive_header_transparent', 220, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ), 'responsive_is_transparent_header_enabled' );

			// Sub Menu Link Color.
			$sub_menu_link_color_label = __( 'Sub Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_link', $sub_menu_link_color_label, 'responsive_header_transparent', 230, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ), 'responsive_is_transparent_header_enabled' );

			// Sub Menu Link Hover Color.
			$sub_menu_link_hover_color_label = __( 'Sub Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_link_hover', $sub_menu_link_hover_color_label, 'responsive_header_transparent', 240, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ), 'responsive_is_transparent_header_enabled' );

			// Menu Toggle Background Color.
			$menu_toggle_background_color_label = __( 'Menu Toggle Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_toggle_background', $menu_toggle_background_color_label, 'responsive_header_transparent', 250, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ), 'responsive_is_transparent_header_enabled' );

			// Menu Toggle Color.
			$menu_toggle_color_label = __( 'Menu Toggle Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_toggle', $menu_toggle_color_label, 'responsive_header_transparent', 260, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle' ), 'responsive_is_transparent_header_enabled' );

		}
	}

endif;

return new Responsive_Header_Transparent_Customizer();
