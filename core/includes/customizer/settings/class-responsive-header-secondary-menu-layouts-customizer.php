<?php
/**
 * Header Menu Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Secondary_Menu_Layouts_Customizer' ) ) :
	/**
	 *  Header Menu Customizer Options
	 */
	class Responsive_Header_Secondary_Menu_Layouts_Customizer {

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

			 $tabs_label            = esc_html__( 'Tabs', 'responsive' );
			 $design_tab_ids_prefix = 'customize-control-';
			 $design_tab_ids        = array(
				 $design_tab_ids_prefix . 'responsive_secondary_menu_item_hover_style',
				 $design_tab_ids_prefix . 'responsive_secondary_menu_top_offset',
				 $design_tab_ids_prefix . 'responsive_submenu_animation_style',
				 $design_tab_ids_prefix . 'responsive_spacing_separator',
				 $design_tab_ids_prefix . 'responsive_secondary-menu-padding_padding',
				 $design_tab_ids_prefix . 'responsive_secondary-menu-margin_padding',
				 $design_tab_ids_prefix . 'responsive_header_secondary_menu_typography_group',
				 $design_tab_ids_prefix . 'responsive_header_secondary_menu_color_separator',
				 $design_tab_ids_prefix . 'responsive_header_secondary_menu_background_color',
				 $design_tab_ids_prefix . 'responsive_header_secondary_menu_link_color',
			 );
			
			 
			 $general_tab_ids_prefix = 'customize-control-';
			 $general_tab_ids        = array(
				 $general_tab_ids_prefix . 'responsive_redirect_to_secondary_menu_set_location',
				 $general_tab_ids_prefix . 'responsive_secondary_sub_menu_width',
				 $general_tab_ids_prefix . 'responsive_secondary_sub_menu_divider',
				 $general_tab_ids_prefix . 'responsive_visibility_separator',
				 $general_tab_ids_prefix . 'responsive_secondary_menu_desktop_visibility',
				 $general_tab_ids_prefix . 'responsive_secondary_menu_tablet_visibility',
				//  $general_tab_ids_prefix . 'responsive_secondary_menu_mobile_visibility',
			 );
 
			responsive_tabs_button_control( $wp_customize, 'secondary_menu_tabs', $tabs_label, 'responsive_header_secondary_menu_layout', 1, '', 'responsive_secondadry_menu_general_tab', 'responsive_secondary_menu_design_tab', $general_tab_ids, $design_tab_ids, null );
 

			$wp_customize->add_section(
				'responsive_header_secondary_menu_layout',
				array(
					'title'    => __( 'Secondary Menu', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 27, 
				)
			);
			
			// Redirect to Secondary Menu set location.
			$configure_secondary_menu_redirect_label = __( 'Configure Secondary Menu', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_secondary_menu_set_location', $configure_secondary_menu_redirect_label, 'responsive_header_secondary_menu_layout', 40, 'control', 'nav_menu_locations[secondary-menu]');
			
			$secondary_sub_menu_width_label = esc_html__( 'Sub Menu Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'secondary_sub_menu_width', $secondary_sub_menu_width_label, 'responsive_header_secondary_menu_layout', 50, 30, 'responsive_disabled_secondary_menu', 100, 0, 'refresh' );

			// Enable Item Divider
			$secondary_sub_menu_divider_label = __( 'Item Divider', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'secondary_sub_menu_divider', $secondary_sub_menu_divider_label, 'responsive_header_secondary_menu_layout',60, 0, 'responsive_disabled_main_menu' );

			// Menu Item Hover Style.
			$secondary_menu_item_hover_style_label   = __( 'Menu Hover style', 'responsive' );
			$secondary_menu_item_hover_style_choices = array(
				'none'      => esc_html__( 'None', 'responsive' ),
				'zoom'      => esc_html__( 'Zoom In', 'responsive' ),
				'underline' => esc_html__( 'Underline', 'responsive' ),
				'overline'  => esc_html__( 'Overline', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'secondary_menu_item_hover_style', $secondary_menu_item_hover_style_label, 'responsive_header_secondary_menu_layout', 100, $secondary_menu_item_hover_style_choices, 'none', 'responsive_disabled_secondary_menu' );

			// Sub-menu Container Top Offset.
			$secondary_menu_top_offset_label = esc_html__( 'Top Offset', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'secondary_menu_top_offset', $secondary_menu_top_offset_label, 'responsive_header_secondary_menu_layout', 105, 0, 'responsive_disabled_secondary_menu', 200, 0, 'refresh' );

			// Colors
			
			$header_secondary_menu_color_separator_label = __( 'Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_secondary_menu_color_separator', $header_secondary_menu_color_separator_label, 'responsive_header_secondary_menu_layout', 120, 'responsive_disabled_secondary_menu' );
			
			// Background Color.
			$secondary_menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_secondary_menu_background', $secondary_menu_background_color_label, 'responsive_header_secondary_menu_layout', 125, Responsive\Core\get_responsive_customizer_defaults( 'header_secondary_menu_background' ), 'responsive_disabled_secondary_menu' );
			
			
			// Link Color.
			$secondary_menu_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_secondary_menu_link', $secondary_menu_link_color_label, 'responsive_header_secondary_menu_layout', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_secondary_menu_link' ), 'responsive_disabled_secondary_menu' );
			
			// Menu Item Hover Style.
			$submenu_animation_style_label   = __( 'Submenu Animation', 'responsive' );
			$submenu_animation_choices = array(
				'none'      => esc_html__( 'None', 'responsive' ),
				'slide-up'      => esc_html__( 'Slide Up', 'responsive' ),
				'fade'  => esc_html__( 'Fade', 'responsive' ),
				'slide-down' => esc_html__( 'Slide Down', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'submenu_animation_style', $submenu_animation_style_label, 'responsive_header_secondary_menu_layout', 110, $submenu_animation_choices, 'none', 'responsive_disabled_secondary_menu' );
			
			// Typography
			$typography_separator_label = __( 'Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_secondary_menu_typography_group', $typography_separator_label, 'responsive_header_secondary_menu_layout', 155, 'header_secondary_menu_typography' );
			
			// Menu spacing.
			$spacing_separator_label = __( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'spacing_separator', $spacing_separator_label, 'responsive_header_secondary_menu_layout', 170 );
			
			$menu_spacing_label = esc_html__( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'secondary-menu-padding', 'responsive_header_secondary_menu_layout', 175, Responsive\Core\get_responsive_customizer_defaults( 'secondary_menu_padding' ), Responsive\Core\get_responsive_customizer_defaults( 'secondary_menu_padding' ), 'responsive_disabled_mobile_menu', $menu_spacing_label, 'refresh' );

			// Menu margin
			$margin_spacing_label = esc_html__( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'secondary-menu-margin', 'responsive_header_secondary_menu_layout', 180, Responsive\Core\get_responsive_customizer_defaults( 'secondary_menu_margin' ), Responsive\Core\get_responsive_customizer_defaults( 'secondary_menu_margin' ), 'responsive_disabled_mobile_menu', $margin_spacing_label, 'refresh' );

			// Visibiliy controls
			
			// Visibility seperator.
			$visibility_separator_label = __( 'Visibility', 'responsive' );
			responsive_separator_control( $wp_customize, 'visibility_separator', $visibility_separator_label, 'responsive_header_secondary_menu_layout', 65 );
			
			// Hide on Desktop.
			$secondary_menu_desktop_visibility = __( 'Hide on Desktop', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'secondary_menu_desktop_visibility', $secondary_menu_desktop_visibility, 'responsive_header_secondary_menu_layout', 70, 0, null );

			// Hide on Tablet.
			$secondary_menu_tablet_visibility = __( 'Hide on Tablet', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'secondary_menu_tablet_visibility', $secondary_menu_tablet_visibility, 'responsive_header_secondary_menu_layout', 80, 0, null );

			// Hide on Mobile.
			// $secondary_menu_mobile_visibility = __( 'Hide on Mobile', 'responsive' );
			// responsive_checkbox_control( $wp_customize, 'secondary_menu_mobile_visibility', $secondary_menu_mobile_visibility, 'responsive_header_secondary_menu_layout', 90, 0, null );

		}

	}

endif;

// return null;
return new Responsive_Header_Secondary_Menu_Layouts_Customizer();
