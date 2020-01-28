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
					'priority' => 4,
				)
			);
			// Full Width Menu.
			$wp_customize->add_setting(
				'responsive_header_menu_full_width',
				array(
					'default'           => 0,
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_checkbox_validate',
				)
			);
			$wp_customize->add_control(
				'responsive_header_menu_full_width',
				array(
					'label'           => __( 'Full Width Main Navigation', 'responsive' ),
					'section'         => 'responsive_header_menu_layout',
					'settings'        => 'responsive_header_menu_full_width',
					'type'            => 'checkbox',
					'priority'        => 0,
					'active_callback' => 'responsive_active_vertical_header',
				)
			);

			// Disable Mobile Menu.
			$disable_mobile_menu_label = __( 'Enable Mobile Menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_mobile_menu', $disable_mobile_menu_label, 'responsive_header_menu_layout', 1, 1, null );

			// Breakpoint.
			$mobile_menu_breakpoint_label = __( 'Breakpoint', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_menu_breakpoint', $mobile_menu_breakpoint_label, 'responsive_header_menu_layout', 1, 992, 'responsive_disabled_mobile_menu' );

			// Mobile Menu Style.
			$mobile_menu_style_label   = __( 'Style', 'responsive' );
			$mobile_menu_style_choices = array(
				'dropdown'   => esc_html__( 'Dropdown', 'responsive' ),
				'fullscreen' => esc_html__( 'FullScreen', 'responsive' ),
				'sidebar'    => esc_html__( 'Sidebar', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'mobile_menu_style', $mobile_menu_style_label, 'responsive_header_menu_layout', 2, $mobile_menu_style_choices, 'dropdown', 'responsive_disabled_mobile_menu' );
		}

	}

endif;

return new Responsive_Header_Menu_Layouts_Customizer();
