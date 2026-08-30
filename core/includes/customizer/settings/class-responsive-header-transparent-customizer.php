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
					'priority' => 35,

				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_transparent_header',
				$general_tab_ids_prefix . 'responsive_transparent_header_logo_option',
				$general_tab_ids_prefix . 'responsive_enable_transparent_header_bottom_border',
				$general_tab_ids_prefix . 'responsive_transparent_header_logo',
				$general_tab_ids_prefix . 'responsive_transparent_header_logo_width',
				$general_tab_ids_prefix . 'responsive_transparent_header_retina_logo_option',
				$general_tab_ids_prefix . 'responsive_transparent_header_retina_logo',
				$general_tab_ids_prefix . 'responsive_transparent_bottom_border',
				$general_tab_ids_prefix . 'responsive_disable_archive_transparent_header',
				$general_tab_ids_prefix . 'responsive_disable_blog_page_transparent_header',
				$general_tab_ids_prefix . 'responsive_disable_homepage_transparent_header',
				$general_tab_ids_prefix . 'responsive_disable_pages_transparent_header',
				$general_tab_ids_prefix . 'responsive_disable_posts_transparent_header',
				$general_tab_ids_prefix . 'responsive_disable_woo_products_transparent_header',
				
			);

			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_site_content_padding',
				$design_tab_ids_prefix . 'responsive_tranparent_header_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_above_header_bg_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_primary_header_bg_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_below_header_bg_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_border_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_site_title_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_site_title_hover_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_text_color',
				$design_tab_ids_prefix . 'responsive_tranparent_header_menu_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_mobile_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_menu_border_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_active_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_hover_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_menu_link_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_active_menu_link_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_menu_link_hover_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_sub_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_active_sub_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_hover_sub_menu_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_sub_menu_link_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_sub_menu_active_link_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_sub_menu_link_hover_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_menu_toggle_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_menu_toggle_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_text_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_background_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_background_image',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_border_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_link_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_widget_link_hover_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_button_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_button_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_button_bg_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_button_border_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_social_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_social_item_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_social_item_bg_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_search_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_search_icon_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_search_bg_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_html_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_html_link_color',
				$design_tab_ids_prefix . 'responsive_transparent_header_woo_cart_color_separator',
				$design_tab_ids_prefix . 'responsive_transparent_header_cart_count_color',
			);

			responsive_tabs_button_control( $wp_customize, 'header_transparent_tabs', $tabs_label, 'responsive_header_transparent', 1, '', 'responsive_header_transparent_general_tab', 'responsive_header_transparent_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Transperant Header.
			$transparent_header_label = __( 'Enable on Complete Website', 'responsive' );
			responsive_toggle_control( $wp_customize, 'transparent_header', $transparent_header_label, 'responsive_header_transparent', 20, 0, null );

			// Different Logo For Transparent Header.
			$transparent_header_logo_option_label = __( 'Different Logo For Transparent Header ', 'responsive' );
			responsive_toggle_control( $wp_customize, 'transparent_header_logo_option', $transparent_header_logo_option_label, 'responsive_header_transparent', 25, 0, 'responsive_is_transparent_header_enabled' );

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
						'priority'        => 26,
						'active_callback' => 'responsive_different_logo_transparent_header',
					)
				)
			);

			// Transparent Header Logo Width Controller.
			$transparent_header_logo_width_label = __( 'Logo Width (px)', 'responsive' );
			responsive_drag_number_control_with_switchers(
				$wp_customize,
				'transparent_header_logo_width',
				$transparent_header_logo_width_label,
				'responsive_header_transparent',
				27,
				0,
				'responsive_different_logo_transparent_header',
				1200,
				20,
				'postMessage',
				1
			);

			// Different Logo For Retina Devices.
			$transparent_header_retina_logo_option_label = __( 'Different Logo for retina devices?', 'responsive' );
			responsive_toggle_control(
				$wp_customize,
				'transparent_header_retina_logo_option',
				$transparent_header_retina_logo_option_label,
				'responsive_header_transparent',
				28,
				0,
				function() {
					return (bool) ( get_theme_mod( 'responsive_transparent_header_logo_option', 0 ) && responsive_is_transparent_header() );
				}
			);

			$wp_customize->add_setting(
				'responsive_transparent_header_retina_logo',
				array(
					'sanitize_callback' => 'esc_url_raw',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'responsive_transparent_header_retina_logo',
					array(
						'label'           => esc_html__( 'Retina Logo For Transparent Header', 'responsive' ),
						'section'         => 'responsive_header_transparent',
						'priority'        => 29,
						'active_callback' => function() {
							return (bool) ( get_theme_mod( 'responsive_transparent_header_logo_option', 0 ) && get_theme_mod( 'responsive_transparent_header_retina_logo_option', 0 ) && responsive_is_transparent_header() );
						},
					)
				)
			);

			// Enable Header Bottom Border.
			$enable_transparent_header_bottom_border_label = __( 'Enable Transparent Header Bottom Border', 'responsive' );
			responsive_toggle_control( $wp_customize, 'enable_transparent_header_bottom_border', $enable_transparent_header_bottom_border_label, 'responsive_header_transparent', 30, 0, 'responsive_is_transparent_header_enabled' );

			// Transparent Header Height.
			// $transparent_header_height_label = __( 'Transparent Header Height', 'responsive' );
			// responsive_drag_number_control( $wp_customize, 'transparent_header_height', $transparent_header_height_label, 'responsive_header_transparent', 29, 0, null, 300, 0, 'postMessage', 1 );

			// Site Content Padding.
			$site_content_padding_label = esc_html__( 'Site Content Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'site_content', 'responsive_header_transparent', 30, 120, 0, null, $site_content_padding_label );

			$bottom_border_label = __( 'Bottom Border Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'transparent_bottom_border', $bottom_border_label, 'responsive_header_transparent', 35, 0, 'responsive_enable_transparent_header_bottom_border_check', 300, 0, 'postMessage', 1 );

			$disable_archive_transparent_header_label = __( 'Disable on 404, Search & Archives?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_archive_transparent_header', $disable_archive_transparent_header_label, 'responsive_header_transparent', 40, 0, 'responsive_is_transparent_header_enabled' );

			$disable_blog_page_transparent_header_label = __( 'Disable on Blog page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_blog_page_transparent_header', $disable_blog_page_transparent_header_label, 'responsive_header_transparent', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_homepage_transparent_header_label = __( 'Disable on Homepage?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_homepage_transparent_header', $disable_homepage_transparent_header_label, 'responsive_header_transparent', 60, 0, 'responsive_is_transparent_header_enabled' );

			$disable_pages_transparent_header_label = __( 'Disable on Pages?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_pages_transparent_header', $disable_pages_transparent_header_label, 'responsive_header_transparent', 70, 0, 'responsive_is_transparent_header_enabled' );

			$disable_posts_transparent_header_label = __( 'Disable on Single Posts?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_posts_transparent_header', $disable_posts_transparent_header_label, 'responsive_header_transparent', 80, 0, 'responsive_is_transparent_header_enabled' );

			$disable_woo_products_transparent_header_label = __( 'Disable on WooCommerce Pages?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_woo_products_transparent_header', $disable_woo_products_transparent_header_label, 'responsive_header_transparent', 90, 0, 'responsive_is_transparent_header_enabled' );

			/**
			 * Transparent Header Colors Separator.
			 */
			$tranparent_header_color_separator_label = esc_html__( 'Transparent Header Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'tranparent_header_color_separator', $tranparent_header_color_separator_label, 'responsive_header_transparent', 100, null );

			$transparent_header_above_header_bg_color_label = __( 'Above Header Background', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'transparent_header_above_header_bg', $transparent_header_above_header_bg_color_label, 'responsive_header_transparent', 105, '', null, '', 'postMessage', true );

			$transparent_header_primary_header_bg_color_label = __( 'Primary Header Background', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'transparent_header_primary_header_bg', $transparent_header_primary_header_bg_color_label, 'responsive_header_transparent', 110, '', null, '', 'postMessage', true );

			$transparent_header_below_header_bg_color_label = __( 'Below Header Background', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'transparent_header_below_header_bg', $transparent_header_below_header_bg_color_label, 'responsive_header_transparent', 115, '', null, '', 'postMessage', true );

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
			responsive_color_control( $wp_customize, 'transparent_header_menu_background', $menu_background_color_label, 'responsive_header_transparent', 160, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) );

			$mobile_menu_background_color_label = __( 'Mobile Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_mobile_menu_background', $mobile_menu_background_color_label, 'responsive_header_transparent', 170, Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ), null );

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
			responsive_separator_control( $wp_customize, 'transparent_header_widget_color_separator', $transparent_header_widget_separator_label, 'responsive_header_transparent', 270, null );

			// Text Color.
			$menu_text_color_label = __( 'Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'transparent_header_widget_text', $menu_text_color_label, 'responsive_header_transparent', 280, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ), null );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_background', $menu_background_color_label, 'responsive_header_transparent', 290, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ), null );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_border', $menu_border_color_label, 'responsive_header_transparent', 300, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ), null );

			// Link Color.
			$menu_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_link', $menu_link_color_label, 'responsive_header_transparent', 310, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ), null );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_widget_link_hover', $menu_link_hover_color_label, 'responsive_header_transparent', 320, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ), null );

			/**
			 * Header Button Separator.
			 */
			$transparent_header_button_separator_label = esc_html__( 'Button Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_button_color_separator', $transparent_header_button_separator_label, 'responsive_header_transparent', 330, null );

			// Text Color.
			$button_text_color_label = __( 'Text', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_button', $button_text_color_label, 'responsive_header_transparent', 340, '', null, '', true, '', 'transparent_header_button_hover' );

			// Background Color.
			$button_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_button_bg', $button_background_color_label, 'responsive_header_transparent', 350, '', null, '', true, '', 'transparent_header_button_bg_hover' );

			// Border Color.
			$button_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_button_border', $button_border_color_label, 'responsive_header_transparent', 360, '', null, '', true, '', 'transparent_header_button_border_hover' );

			/**
			 * Header Social Separator.
			 */
			$transparent_header_social_separator_label = esc_html__( 'Social Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_social_color_separator', $transparent_header_social_separator_label, 'responsive_header_transparent', 370, null );

			// Icon Color.
			$social_icon_color_label = __( 'Icon Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_social_item', $social_icon_color_label, 'responsive_header_transparent', 380, '', null, '', true, '', 'transparent_header_social_item_hover' );

			// Background Color.
			$social_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_social_item_bg', $social_background_color_label, 'responsive_header_transparent', 390, '', null, '', true, '', 'transparent_header_social_item_bg_hover' );

			/**
			 * Header Search Separator.
			 */
			$transparent_header_search_separator_label = esc_html__( 'Search Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_search_color_separator', $transparent_header_search_separator_label, 'responsive_header_transparent', 395, null );

			// Search Color.
			$search_color_label = __( 'Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_search_icon', $search_color_label, 'responsive_header_transparent', 400, '', null, '', true, '', 'transparent_header_search_icon_hover' );

			// Search Background Color.
			$search_bg_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_search_bg', $search_bg_color_label, 'responsive_header_transparent', 405, '', null, '', true, '', 'transparent_header_search_bg_hover' );

			/**
			 * Header HTML Separator.
			 */
			$transparent_header_html_separator_label = esc_html__( 'HTML Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_html_color_separator', $transparent_header_html_separator_label, 'responsive_header_transparent', 410, null );

			// HTML Link Color.
			$html_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_html_link', $html_link_color_label, 'responsive_header_transparent', 415, '', null, '', true, '', 'transparent_header_html_link_hover' );

			/**
			 * Header WooCommerce Cart Separator.
			 */
			$transparent_header_woo_cart_separator_label = esc_html__( 'WooCommerce Cart Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_woo_cart_color_separator', $transparent_header_woo_cart_separator_label, 'responsive_header_transparent', 420, null );

			// WooCommerce Cart Count Color.
			$cart_count_color_label = __( 'Count Color', 'responsive' );
			responsive_color_control( $wp_customize, 'transparent_header_cart_count', $cart_count_color_label, 'responsive_header_transparent', 425, '', null, '', true, '', 'transparent_header_cart_count_hover' );

		}
	}

endif;

return new Responsive_Header_Transparent_Customizer();
