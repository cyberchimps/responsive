<?php
/**
 * Header Menu Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Menu_Layouts_Customizer' ) ) :
	/**
	 *  Header Menu Customizer Options
	 */
	class Responsive_Header_Menu_Layouts_Customizer {

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
			 * Menu Layouts.
			 */
			$wp_customize->add_section(
				'responsive_header_menu_layout',
				array(
					'title'    => __( 'Main Menu', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 25,
				)
			);

			// Full Width Menu.
			$header_menu_full_width_label = __( 'Full Width Main Navigation', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_menu_full_width', $header_menu_full_width_label, 'responsive_header_menu_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_full_width' ), 'responsive_active_vertical_header' );

			// Disable Mobile Menu.
			$disable_mobile_menu_label = __( 'Enable Mobile Menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_mobile_menu', $disable_mobile_menu_label, 'responsive_header_menu_layout', 10, 1, null );

			// Breakpoint.
			$mobile_menu_breakpoint_label = __( 'Breakpoint', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_menu_breakpoint', $mobile_menu_breakpoint_label, 'responsive_header_menu_layout', 20, 767, 'responsive_disabled_mobile_menu', 4096, 1, 'postMessage' );

			// Mobile Menu Style.
			$mobile_menu_style_label   = __( 'Mobile Menu Style', 'responsive' );
			$mobile_menu_style_choices = array(
				'dropdown'   => esc_html__( 'Dropdown', 'responsive' ),
				'fullscreen' => esc_html__( 'FullScreen', 'responsive' ),
				'sidebar'    => esc_html__( 'Sidebar', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'mobile_menu_style', $mobile_menu_style_label, 'responsive_header_menu_layout', 30, $mobile_menu_style_choices, 'dropdown', 'responsive_disabled_mobile_menu' );

			// Sidebar Menu Alignment.
			$sidebar_menu_alignment_label   = esc_html__( 'Sidebar Menu Alignment', 'responsive' );
			$sidebar_menu_alignment_choices = array(
				'left'  => esc_html__( 'Left', 'responsive' ),
				'right' => esc_html__( 'Right', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'sidebar_menu_alignment', $sidebar_menu_alignment_label, 'responsive_header_menu_layout', 40, $sidebar_menu_alignment_choices, 'left', 'responsive_active_sidebar_menu' );

			$menu_last_item         = __( 'Last Item in Menu', 'responsive' );
			$menu_last_item_choices = array(
				'none'      => __( 'None', 'responsive' ),
				'search'    => __( 'Search Icon', 'responsive' ),
				'button'    => __( 'Button', 'responsive' ),
				'text-html' => __( 'Text / HTML', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'menu_last_item', $menu_last_item, 'responsive_header_menu_layout', 30, $menu_last_item_choices, 'none', null );

			// Last item floating.
			$last_item_floating_label = __( 'Spread Menu and Last Item', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'last_item_floating', $last_item_floating_label, 'responsive_header_menu_layout', 10, 0, null );

			$menu_button_text = __( 'Button Text', 'responsive' );

			responsive_text_control( $wp_customize, 'menu_button_text', $menu_button_text, 'responsive_header_menu_layout', 40, 'Call Now', null );

			$menu_button_url = __( 'Button Link (URL)', 'responsive' );

			responsive_text_control( $wp_customize, 'menu_button', $menu_button_url, 'responsive_header_menu_layout', 40, 'https://cyberchimps.com', null, 'esc_url_raw' );

			$menu_html_text = __( 'Custom Menu Text', 'responsive' );

			responsive_text_control( $wp_customize, 'text_html', $menu_html_text, 'responsive_header_menu_layout', 40, 'Contact Us', null, 'wp_kses_post', 'textarea' );

			/**
			 * Title Heading.
			 */
			$header_menu_color_separator_label = esc_html__( 'Main Menu Color', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_menu_color_separator', $header_menu_color_separator_label, 'responsive_header_menu_layout', 45 );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_menu_background', $menu_background_color_label, 'responsive_header_menu_layout', 50, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), 'responsive_active_vertical_header' );

			$mobile_menu_background_color_label = __( 'Mobile Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_mobile_menu_background', $mobile_menu_background_color_label, 'responsive_header_menu_layout', 60, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), null );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_border', $menu_border_color_label, 'responsive_header_menu_layout', 70, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ), 'responsive_active_vertical_header' );

			// Active Menu Color.
			$menu_border_color_label = __( 'Active Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_active_menu_background', $menu_border_color_label, 'responsive_header_menu_layout', 80, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ), null );

			// Link Color.
			$menu_link_color_label = __( 'Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_link', $menu_link_color_label, 'responsive_header_menu_layout', 90, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) );

			// Active Menu Link Color.
			$menu_active_link_color_label = __( 'Active Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_active_menu_link', $menu_active_link_color_label, 'responsive_header_menu_layout', 100, '' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_link_hover', $menu_link_hover_color_label, 'responsive_header_menu_layout', 110, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) );

			// Sub Menu Background Color.
			$responsive_header_sub_menu_background_color_label = __( 'Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_background', $responsive_header_sub_menu_background_color_label, 'responsive_header_menu_layout', 120, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) );

			// Sub Menu Link Color.
			$sub_menu_link_color_label = __( 'Sub Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_link', $sub_menu_link_color_label, 'responsive_header_menu_layout', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ) );

			// Active Sub Menu Link Color.
			$sub_menu_active_link_color_label = __( 'Active Sub Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_active_link', $sub_menu_active_link_color_label, 'responsive_header_menu_layout', 140, '' );

			// Sub Menu Link Hover Color.
			$sub_menu_link_hover_color_label = __( 'Sub Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_link_hover', $sub_menu_link_hover_color_label, 'responsive_header_menu_layout', 150, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ) );

			// Menu Toggle Background Color.
			$menu_toggle_background_color_label = __( 'Menu Toggle Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_toggle_background', $menu_toggle_background_color_label, 'responsive_header_menu_layout', 160, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ) );

			// Menu Toggle Color.
			$menu_toggle_color_label = __( 'Menu Toggle Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_toggle', $menu_toggle_color_label, 'responsive_header_menu_layout', 170, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle' ) );

			/**
			 * Title Heading.
			 */
			$header_menu_typography_separator_label = esc_html__( 'Main Menu Typography', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_menu_typography_separator', $header_menu_typography_separator_label, 'responsive_header_menu_layout', 180 );

		}

	}

endif;

return new Responsive_Header_Menu_Layouts_Customizer();
