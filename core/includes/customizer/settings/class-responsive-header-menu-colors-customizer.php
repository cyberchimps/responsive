<?php
/**
 * Header Menu Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Menu_Colors_Customizer' ) ) :
	/**
	 *  Header Menu Customizer Options
	 */
	class Responsive_Header_Menu_Colors_Customizer {

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
				'responsive_header_menu_colors',
				array(
					'title'    => __( 'Colors', 'responsive' ),
					'panel'    => 'responsive_header_menu',
					'priority' => 10,
				)
			);

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_menu_background', $menu_background_color_label, 'responsive_header_menu_colors', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ), 'responsive_active_vertical_header' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_border', $menu_border_color_label, 'responsive_header_menu_colors', 20, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ), 'responsive_active_vertical_header' );

			// Active Menu Color.
			$menu_border_color_label = __( 'Active Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_active_menu_background', $menu_border_color_label, 'responsive_header_menu_colors', 30, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ), null );

			// Link Color.
			$menu_link_color_label = __( 'Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_link', $menu_link_color_label, 'responsive_header_menu_colors', 40, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_link_hover', $menu_link_hover_color_label, 'responsive_header_menu_colors', 50, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) );

			// Sub Menu Background Color.
			$responsive_header_sub_menu_background_color_label = __( 'Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_background', $responsive_header_sub_menu_background_color_label, 'responsive_header_menu_colors', 60, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) );

			// Sub Menu Link Color.
			$sub_menu_link_color_label = __( 'Sub Menu Item Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_link', $sub_menu_link_color_label, 'responsive_header_menu_colors', 70, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ) );

			// Sub Menu Link Hover Color.
			$sub_menu_link_hover_color_label = __( 'Sub Menu Item Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_link_hover', $sub_menu_link_hover_color_label, 'responsive_header_menu_colors', 80, Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ) );

			// Menu Toggle Background Color.
			$menu_toggle_background_color_label = __( 'Menu Toggle Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_toggle_background', $menu_toggle_background_color_label, 'responsive_header_menu_colors', 90, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ) );

			// Menu Toggle Color.
			$menu_toggle_color_label = __( 'Menu Toggle Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_toggle', $menu_toggle_color_label, 'responsive_header_menu_colors', 100, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle' ) );

		}


	}

endif;

return new Responsive_Header_Menu_Colors_Customizer();
