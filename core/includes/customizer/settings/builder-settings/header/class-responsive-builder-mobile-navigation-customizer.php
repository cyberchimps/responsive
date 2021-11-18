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
					'priority' => 160,
				)
			);

			$stretch_mobile_navigation_label = __( 'Stretch Mobile Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_mobile_navigation', $stretch_mobile_navigation_label, 'responsive_customizer_mobile_navigation', 10, 0, null );

			// Mobile Menu Layout.
			$header_popup_layout_choices = array(
				'sidepanel' => __( 'Sidepanel', 'responsive' ),
				'fullwidth' => __( 'Fullwidth', 'responsive' ),
			);
			$header_popup_layout         = __( 'Menu Drawer Layout', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_layout', $header_popup_layout, 'responsive_customizer_mobile_navigation', 10, $header_popup_layout_choices, 'sidepanel', null );

			// Sidepanel Popup Side.
			$header_popup_side_choices = array(
				'right' => __( 'Right', 'responsive' ),
				'left'  => __( 'Left', 'responsive' ),
			);
			$header_popup_side         = __( 'Sidepanel Popup Side', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_side', $header_popup_side, 'responsive_customizer_mobile_navigation', 15, $header_popup_side_choices, 'right', 'is_sidepanel_active' );

			// Fullwidth Menu Layout Animation.
			$header_popup_animation_choices = array(
				'fade'  => __( 'Fade', 'responsive' ),
				'scale' => __( 'Scale', 'responsive' ),
				'slice' => __( 'Slice', 'responsive' ),
			);
			$header_popup_animation         = __( 'Fullwidth Menu Animation', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_animation', $header_popup_animation, 'responsive_customizer_mobile_navigation', 20, $header_popup_animation_choices, 'fade', 'is_fullwidth_active' );

			// Menu Content Alignment.
			$header_popup_content_align_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),

			);
			$header_popup_content_align = __( 'Menu Content Alignment', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_content_align', $header_popup_content_align, 'responsive_customizer_mobile_navigation', 25, $header_popup_content_align_choices, 'left', null );

			// Menu Content Vertical Alignment.
			$header_popup_vertical_align_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),

			);
			$header_popup_vertical_align = __( 'Menu Content Vertical Alignment', 'responsive' );
			responsive_select_control( $wp_customize, 'header_popup_vertical_align', $header_popup_vertical_align, 'responsive_customizer_mobile_navigation', 30, $header_popup_vertical_align_choices, 'top', null );

			// Collapse Submenu Items.
			$mobile_navigation_collapse = __( 'Collapse Submenu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_navigation_collapse', $mobile_navigation_collapse, 'responsive_customizer_mobile_navigation', 35, 1, null );

			// Entire parent menu item expands sub menu.
			$mobile_navigation_parent_toggle = __( 'Parent menu item expands sub menu', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'mobile_navigation_parent_toggle', $mobile_navigation_parent_toggle, 'responsive_customizer_mobile_navigation', 40, 0, 'is_menu_collapsible' );

		}

	}

endif;

return new Responsive_Mobile_Navigation_Customizer();
