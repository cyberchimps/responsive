<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Menu_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Menu_Customizer {

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
				'responsive_footer_menu',
				array(
					'title'    => esc_html__( 'Menu', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 30,

				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_footer_menu_background_color',
				$design_tab_ids_prefix . 'responsive_footer_menu_padding',
				$design_tab_ids_prefix . 'responsive_footer_menu_separator_2',
			);

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_redirect_to_footer_menu_set_location',
				$general_tab_ids_prefix . 'responsive_footer_widgets_separator',
                $general_tab_ids_prefix . 'responsive_footer_widget_desktop_visibility',
				$general_tab_ids_prefix . 'responsive_footer_widget_tablet_visibility',
				$general_tab_ids_prefix . 'responsive_footer_widget_mobile_visibility',
			);

			responsive_tabs_button_control( $wp_customize, 'footer_menu_tabs', $tabs_label, 'responsive_footer_menu', 1, '', 'responsive_footer_menu_general_tab', 'responsive_footer_menu_design_tab', $general_tab_ids, $design_tab_ids, null );

            // Redirect to Footer Menu set location.
			$configure_footer_menu_redirect_label = __( 'Configure Footer Menu', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_footer_menu_set_location', $configure_footer_menu_redirect_label, 'responsive_footer_menu', 10, 'control', 'nav_menu_locations[footer-menu]');

			/**
			 * Footer Widget Separator.
			 */
			$footer_widgets_separator_label = esc_html__( 'Footer Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_widgets_separator', $footer_widgets_separator_label, 'responsive_footer_menu', 20 );

			// // Hide on Desktop.
			$footer_widget_desktop_visibility = __( 'Hide on Desktop', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_widget_desktop_visibility', $footer_widget_desktop_visibility, 'responsive_footer_menu', 30, 0, null );

			// Hide on Tablet.
			$footer_widget_tablet_visibility = __( 'Hide on Tablet', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_widget_tablet_visibility', $footer_widget_tablet_visibility, 'responsive_footer_menu', 40, 0, null );

			// Hide on Mobile.
			$footer_widget_mobile_visibility = __( 'Hide on Mobile', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_widget_mobile_visibility', $footer_widget_mobile_visibility, 'responsive_footer_menu', 50, 0, null );
			
			/*
			------------------------------------------------------------------
				Design Controls
			-------------------------------------------------------------------
			*/

			// Background Color.
			$footer_background_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_menu_background', $footer_background_label, 'responsive_footer_menu', 60, Responsive\Core\get_responsive_customizer_defaults( 'footer_menu_background' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'footer_menu_background_hover' ), 'footer_menu_background_hover' );

            responsive_horizontal_separator_control($wp_customize, 'footer_menu_separator_2', 1, 'responsive_footer_menu', 65, 1, );

            // Padding.
			$footer_menu_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_menu', 'responsive_footer_menu', 70, 15, 15, null, $footer_menu_padding_label );

		}
	}

endif;

return new Responsive_Footer_Menu_Customizer();
