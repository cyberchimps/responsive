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
					'title'    => __( 'Layout', 'responsive' ),
					'panel'    => 'responsive_header_menu',
					'priority' => 10,
				)
			);

			// Full Width Menu.
			$header_menu_full_width_label = __( 'Full Width Main Navigation', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_menu_full_width', $header_menu_full_width_label, 'responsive_header_menu_layout', 10, 0, 'responsive_active_vertical_header' );

			// Disable Mobile Menu.
			$disable_mobile_menu_label = __( 'Enable Mobile Menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_mobile_menu', $disable_mobile_menu_label, 'responsive_header_menu_layout', 10, 1, null );

			// Breakpoint.
			$mobile_menu_breakpoint_label = __( 'Breakpoint', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_menu_breakpoint', $mobile_menu_breakpoint_label, 'responsive_header_menu_layout', 20, 992, 'responsive_disabled_mobile_menu', 4096, 1, 'postMessage' );

			// Mobile Menu Style.
			$mobile_menu_style_label   = __( 'Style', 'responsive' );
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

		}

	}

endif;

return new Responsive_Header_Menu_Layouts_Customizer();
