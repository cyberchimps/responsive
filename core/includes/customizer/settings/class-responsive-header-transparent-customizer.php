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
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$wp_customize->add_section(
				'responsive_header_transparent',
				array(
					'title'    => esc_html__( 'Transparent Header', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 30,

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
			responsive_checkbox_control( $wp_customize, 'transparent_header_logo_option', $transparent_header_logo_option_label, 'responsive_header_transparent', 25, 0, null );

			// Enable Header Bottom Border.
			$enable_transparent_header_bottom_border_label = __( 'Enable Transparent Header Bottom Border', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'enable_transparent_header_bottom_border', $enable_transparent_header_bottom_border_label, 'responsive_header_transparent', 26, 1, null );

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
						'flex_height'     => true,
						'flex_width'      => true,
						'height'          => 100, // pixels.
						'width'           => 300, // pixels.
						'priority'        => 28,
						'active_callback' => null,
					)
				)
			);

			// Transparent Header Height.
			$transparent_header_height_label = __( 'Transparent Header Height', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'transparent_header_height', $transparent_header_height_label, 'responsive_header_transparent', 29, 0, null, 300, 0, 'postMessage', 1 );

			// Site Content Padding.
			$site_content_padding_label = esc_html__( 'Site Content Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'site_content', 'responsive_header_transparent', 30, 120, 0, null, $site_content_padding_label );

			$bottom_border_label = __( 'Bottom Border Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'transparent_bottom_border', $bottom_border_label, 'responsive_header_transparent', 35, 0, 'responsive_enable_transparent_header_bottom_border_check', 300, 0, 'postMessage', 1 );

			$disable_archive_transparent_header_label = __( 'Disable on 404, Search & Archives?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_archive_transparent_header', $disable_archive_transparent_header_label, 'responsive_header_transparent', 40, 0, null );

			$disable_blog_page_transparent_header_label = __( 'Disable on Blog page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_blog_page_transparent_header', $disable_blog_page_transparent_header_label, 'responsive_header_transparent', 50, 0, null );

			$disable_homepage_transparent_header_label = __( 'Disable on Homepage?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_homepage_transparent_header', $disable_homepage_transparent_header_label, 'responsive_header_transparent', 60, 0, null );

			$disable_pages_transparent_header_label = __( 'Disable on Pages?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_pages_transparent_header', $disable_pages_transparent_header_label, 'responsive_header_transparent', 70, 0, null );

			$disable_posts_transparent_header_label = __( 'Disable on Single Posts?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_posts_transparent_header', $disable_posts_transparent_header_label, 'responsive_header_transparent', 80, 0, null );

			$disable_woo_products_transparent_header_label = __( 'Disable on WooCommerce Pages?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_woo_products_transparent_header', $disable_woo_products_transparent_header_label, 'responsive_header_transparent', 90, 0, null );

			/**
			 * Transparent Header Colors Separator.
			 */
			$tranparent_header_color_separator_label = esc_html__( 'Transparent Header Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'tranparent_header_color_separator', $tranparent_header_color_separator_label, 'responsive_header_transparent', 100, null );

			$transparent_header_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_border', $transparent_header_border_color_label, 'responsive_header_transparent', 120, Responsive\Core\get_responsive_customizer_defaults( 'header_border' ), null );

			$transparent_header_site_title_color_label = __( 'Site Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_site_title', $transparent_header_site_title_color_label, 'responsive_header_transparent', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ), null );

			$transparent_header_site_title_hover_color_label = __( 'Site Title Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_site_title_hover', $transparent_header_site_title_hover_color_label, 'responsive_header_transparent', 140, Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ), null );

			$transparent_header_text_color_label = __( 'Site Tagline Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_text', $transparent_header_text_color_label, 'responsive_header_transparent', 150, Responsive\Core\get_responsive_customizer_defaults( 'header_text' ), null );

			/**
			 * Transparent Header Menu Colors Separator.
			 */
			$tranparent_header_menu_color_separator_label = esc_html__( 'Transparent Header Menu', 'responsive' );
			responsive_separator_control( $wp_customize, 'tranparent_header_menu_color_separator', $tranparent_header_menu_color_separator_label, 'responsive_header_transparent', 160, null );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_background', $menu_background_color_label, 'responsive_header_transparent', 160, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), 'responsive_active_vertical_transparent_header' );

			$mobile_menu_background_color_label = __( 'Mobile Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_mobile_menu_background', $mobile_menu_background_color_label, 'responsive_header_transparent', 170, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), null );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_border', $menu_border_color_label, 'responsive_header_transparent', 180, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ), 'responsive_active_vertical_transparent_header' );

			// Active Menu Color.
			$menu_border_color_label = __( 'Active Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_active_menu_background', $menu_border_color_label, 'responsive_header_transparent', 190, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ), null );

			// Hover Menu Background Color.
			$hover_menu_background_color_label = __( 'Hover Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_hover_menu_background', $hover_menu_background_color_label, 'responsive_header_transparent', 192, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ), null );

			// Link Color.
			$menu_link_color_label = __( 'Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_link', $menu_link_color_label, 'responsive_header_transparent', 200, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ), null );

			// Active Menu Link Color.
			$menu_active_link_color_label = __( 'Active Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_active_menu_link', $menu_active_link_color_label, 'responsive_header_transparent', 205, '' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_link_hover', $menu_link_hover_color_label, 'responsive_header_transparent', 210, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ), null );

			// Sub Menu Background Color.
			$responsive_transparent_header_sub_menu_background_color_label = __( 'Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_background', $responsive_transparent_header_sub_menu_background_color_label, 'responsive_header_transparent', 220, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ), null );

			// Active Menu Color.
			$responsive_transparent_header_active_sub_menu_background_color_label = __( 'Active Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_active_sub_menu_background', $responsive_transparent_header_active_sub_menu_background_color_label, 'responsive_header_transparent', 221, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ), null );

			// Hover Menu Background Color.
			$responsive_transparent_header_hover_sub_menu_background_color_label = __( 'Hover Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_hover_sub_menu_background', $responsive_transparent_header_hover_sub_menu_background_color_label, 'responsive_header_transparent', 222, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ), null );

			// Sub Menu Link Color.
			$sub_menu_link_color_label = __( 'Sub Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_link', $sub_menu_link_color_label, 'responsive_header_transparent', 230, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ), null );

			// Active Sub Menu Link Color.
			$sub_menu_active_link_color_label = __( 'Active Sub Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_active_link', $sub_menu_active_link_color_label, 'responsive_header_transparent', 235, '' );

			// Sub Menu Link Hover Color.
			$sub_menu_link_hover_color_label = __( 'Sub Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_sub_menu_link_hover', $sub_menu_link_hover_color_label, 'responsive_header_transparent', 240, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ), null );

			// Menu Toggle Background Color.
			$menu_toggle_background_color_label = __( 'Menu Toggle Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_toggle_background', $menu_toggle_background_color_label, 'responsive_header_transparent', 250, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ), null );

			// Menu Toggle Color.
			$menu_toggle_color_label = __( 'Menu Toggle Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_menu_toggle', $menu_toggle_color_label, 'responsive_header_transparent', 260, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle' ), null );

			/**
			 * Header Widget Separator.
			 */
			$transparent_header_widget_separator_label = esc_html__( 'Header Widget', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_widget_color_separator', $transparent_header_widget_separator_label, 'responsive_header_transparent', 270, 'responsive_is_transparent_header_enabled' );

			// Text Color.
			$menu_text_color_label = __( 'Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'transparent_header_widget_text', $menu_text_color_label, 'responsive_header_transparent', 280, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ), 'responsive_is_transparent_header_enabled' );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_background', $menu_background_color_label, 'responsive_header_transparent', 290, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ), 'responsive_is_transparent_header_enabled' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_border', $menu_border_color_label, 'responsive_header_transparent', 300, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ), 'responsive_is_transparent_header_enabled' );

			// Link Color.
			$menu_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_link', $menu_link_color_label, 'responsive_header_transparent', 310, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ), 'responsive_is_transparent_header_enabled' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_link_hover', $menu_link_hover_color_label, 'responsive_header_transparent', 320, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ), 'responsive_is_transparent_header_enabled' );

		}
	}

endif;

return new Responsive_Header_Transparent_Customizer();
