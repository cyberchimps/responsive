<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Header_Popup_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Header_Popup_Customizer {

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
			 * Header Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_header_popup',
				array(
					'title'    => esc_html__( 'Off Canvas', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 160,
				)
			);

			// Breakpoint.
			$mobile_menu_breakpoint_label = __( 'Breakpoint', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_menu_breakpoint', $mobile_menu_breakpoint_label, 'responsive_customizer_header_popup', 10, 767, null, 4096, 1, 'postMessage' );

			$stretch_mobile_navigation_label = __( 'Stretch Mobile Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_mobile_navigation', $stretch_mobile_navigation_label, 'responsive_customizer_header_popup', 10, 0, null );

			// Mobile Menu Layout.
			$header_popup_layout_choices = array(
				'sidepanel' => __( 'Sidepanel', 'responsive' ),
				'fullwidth' => __( 'Fullwidth', 'responsive' ),
			);
			$header_popup_layout         = __( 'Drawer Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_layout', $header_popup_layout, 'responsive_customizer_header_popup', 10, $header_popup_layout_choices, 'sidepanel', null );

			// Sidepanel Popup Side.
			$header_popup_side_choices = array(
				'right' => __( 'Right', 'responsive' ),
				'left'  => __( 'Left', 'responsive' ),
			);
			$header_popup_side         = __( 'Sidepanel Popup Side', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_side', $header_popup_side, 'responsive_customizer_header_popup', 15, $header_popup_side_choices, 'right', 'is_sidepanel_active' );

			// Fullwidth Menu Layout Animation.
			$header_popup_animation_choices = array(
				'fade'  => __( 'Fade', 'responsive' ),
				'scale' => __( 'Scale', 'responsive' ),
				'slice' => __( 'Slice', 'responsive' ),
			);
			$header_popup_animation         = __( 'Fullwidth Animation', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_animation', $header_popup_animation, 'responsive_customizer_header_popup', 20, $header_popup_animation_choices, 'fade', 'is_fullwidth_active' );

			// Menu Content Alignment.
			$header_popup_content_align_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),

			);
			$header_popup_content_align = __( 'Content Alignment', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_content_align', $header_popup_content_align, 'responsive_customizer_header_popup', 25, $header_popup_content_align_choices, 'left', null );

			// Menu Content Vertical Alignment.
			$header_popup_vertical_align_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),

			);
			$header_popup_vertical_align = __( 'Content Vertical Alignment', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_vertical_align', $header_popup_vertical_align, 'responsive_customizer_header_popup', 30, $header_popup_vertical_align_choices, 'top', null );

			// Collapse Submenu Items.
			$mobile_navigation_collapse = __( 'Collapse Submenu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_navigation_collapse', $mobile_navigation_collapse, 'responsive_customizer_header_popup', 35, 1, null );

			// Entire parent menu item expands sub menu.
			$mobile_navigation_parent_toggle = __( 'Parent menu item expands sub menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_navigation_parent_toggle', $mobile_navigation_parent_toggle, 'responsive_customizer_header_popup', 40, 0, 'is_menu_collapsible' );

			$header_popup_close_icon_size_label = esc_html__( 'Close Icon Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_popup_close_icon_size', $header_popup_close_icon_size_label, 'responsive_customizer_header_popup', 45, 24, null, 100, 1, 'postMessage' );

			$header_popup_background_desktop_label = __( 'Drawer Desktop Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_background_desktop', $header_popup_background_desktop_label, 'responsive_customizer_header_popup', 50, '#fff', null );

			$header_popup_background_tablet_label = __( 'Drawer Tablet Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_background_tablet', $header_popup_background_tablet_label, 'responsive_customizer_header_popup', 55, '', null );

			$header_popup_background_mobile_label = __( 'Drawer Mobile Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_background_mobile', $header_popup_background_mobile_label, 'responsive_customizer_header_popup', 60, '', null );

			$header_popup_close_label = __( 'Close Toggle Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_close', $header_popup_close_label, 'responsive_customizer_header_popup', 65, '#333', null );

			$header_popup_close_hover_label = __( 'Close Toggle Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_close_hover', $header_popup_close_hover_label, 'responsive_customizer_header_popup', 70, '#333', null );

			$header_popup_close_background_label = __( 'Close Toggle Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_close_background', $header_popup_close_background_label, 'responsive_customizer_header_popup', 75, '#fff', null );

			$header_popup_close_background_hover_label = __( 'Close Toggle Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_popup_close_background_hover', $header_popup_close_background_hover_label, 'responsive_customizer_header_popup', 80, '#fff', null );

			// Padding (px).
			$header_popup_close_padding_label = __( 'Spacing (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'header_popup_close', 'responsive_customizer_header_popup', 85, 7, 2, null, $header_popup_close_padding_label );
		}

	}

endif;

return new Responsive_Builder_Header_Popup_Customizer();
