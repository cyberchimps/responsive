<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Mobile_Navigation_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Mobile_Navigation_Customizer {

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
				'responsive_customizer_mobile_navigation',
				array(
					'title'    => esc_html__( 'Mobile Navigation', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 240,
				)
			);

			// Collapse Submenu Items.
			$mobile_navigation_collapse = __( 'Collapse Submenu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_navigation_collapse', $mobile_navigation_collapse, 'responsive_customizer_mobile_navigation', 10, 1, null );

			// Entire parent menu item expands sub menu.
			$mobile_navigation_parent_toggle = __( 'Parent menu item expands sub menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_navigation_parent_toggle', $mobile_navigation_parent_toggle, 'responsive_customizer_mobile_navigation', 15, 0, 'is_menu_collapsible' );

			$mobile_nav_items_spacing_top_bottom_label = esc_html__( 'Item Verticle Spacing(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_navigation_item_top_bottom_spacing', $mobile_nav_items_spacing_top_bottom_label, 'responsive_customizer_mobile_navigation', 20, 10, null, 100 );

			$mobile_navigation_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_navigation', $mobile_navigation_color_label, 'responsive_customizer_mobile_navigation', 25, '#333', null );

			$mobile_navigation_hover_color_label = __( 'Link Hover/Focus Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_navigation_hover', $mobile_navigation_hover_color_label, 'responsive_customizer_mobile_navigation', 30, '#333', null );

			$mobile_navigation_active_color_label = __( 'Active Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_navigation_active', $mobile_navigation_active_color_label, 'responsive_customizer_mobile_navigation', 35, '#333', null );

			$mobile_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_background', $mobile_background_color_label, 'responsive_customizer_mobile_navigation', 40, '#fff', null );

			$mobile_background_hover_color_label = __( 'Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_background_hover', $mobile_background_hover_color_label, 'responsive_customizer_mobile_navigation', 45, '#fff', null );

			$mobile_background_active_color_label = __( 'Active Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_background_active', $mobile_background_active_color_label, 'responsive_customizer_mobile_navigation', 50, '#fff', null );

			$mobile_navigation_divider_size_label = __( 'Mobile Divider Color', 'responsive' );
			responsive_color_control( $wp_customize, 'mobile_navigation_divider', $mobile_navigation_divider_size_label, 'responsive_customizer_mobile_navigation', 55, 'rgba(170, 170, 170, 0.2)', null );

			$mobile_navigation_divider_type_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$mobile_navigation_divider_type_label = __( 'mobile Item Divider Style', 'responsive' );
			responsive_select_control( $wp_customize, 'mobile_navigation_divider_type', $mobile_navigation_divider_type_label, 'responsive_customizer_mobile_navigation', 55, $mobile_navigation_divider_type_choices, 'solid', null );

			$mobile_navigation_divider_size_label = esc_html__( 'mobile Divider Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'mobile_navigation_divider_size', $mobile_navigation_divider_size_label, 'responsive_customizer_mobile_navigation', 60, 1, null, 20 );

			$mobile_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'mobile_typography_options_separator', $mobile_typography_options_label, 'responsive_customizer_mobile_navigation', 65 );

		}

	}

endif;

return new Responsive_Mobile_Navigation_Customizer();
