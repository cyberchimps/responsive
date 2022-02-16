<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Navigation_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Footer_Navigation_Customizer {

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
				'responsive_customizer_footer_navigation',
				array(
					'title'    => esc_html__( 'Footer Navigation', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 50,
				)
			);

			// Content Align.
			$footer_navigation_align_desktop_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_navigation_align_desktop         = __( 'Content Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_navigation_align_desktop', $footer_navigation_align_desktop, 'responsive_customizer_footer_navigation', 20, $footer_navigation_align_desktop_choices, 'left', null );

			$footer_navigation_align_tablet_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_navigation_align_tablet         = __( 'Content Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_navigation_align_tablet', $footer_navigation_align_tablet, 'responsive_customizer_footer_navigation', 25, $footer_navigation_align_tablet_choices, 'left', null );

			$footer_navigation_align_mobile_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_navigation_align_mobile         = __( 'Content Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_navigation_align_mobile', $footer_navigation_align_mobile, 'responsive_customizer_footer_navigation', 25, $footer_navigation_align_mobile_choices, 'left', null );

			// Content Vertical Align.
			$footer_navigation_vertical_align_desktop_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_navigation_vertical_align_desktop         = __( 'Content Vertical Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_navigation_vertical_align_desktop', $footer_navigation_vertical_align_desktop, 'responsive_customizer_footer_navigation', 30, $footer_navigation_vertical_align_desktop_choices, 'midle', null );

			$footer_navigation_vertical_align_tablet_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_navigation_vertical_align_tablet         = __( 'Content Vertical Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_navigation_vertical_align_tablet', $footer_navigation_vertical_align_tablet, 'responsive_customizer_footer_navigation', 35, $footer_navigation_vertical_align_tablet_choices, 'middle', null );

			$footer_navigation_vertical_align_mobile_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_navigation_vertical_align_mobile         = __( 'Content Vertical Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_navigation_vertical_align_mobile', $footer_navigation_vertical_align_mobile, 'responsive_customizer_footer_navigation', 45, $footer_navigation_vertical_align_mobile_choices, 'middle', null );

			$footer_stretch_menu = __( 'Footer Stretch Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'footer_stretch_menu', $footer_stretch_menu, 'responsive_customizer_footer_navigation', 46, 0, null );

			// footer nav item spacing.
			$footer_nav_items_spacing_label = esc_html__( 'Item Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_navigation_item_spacing', $footer_nav_items_spacing_label, 'responsive_customizer_footer_navigation', 50, 18, null, 100 );

			$footer_nav_items_spacing_top_bottom_label = esc_html__( 'Item Top Bottom Padding(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_navigation_item_top_bottom_spacing', $footer_nav_items_spacing_top_bottom_label, 'responsive_customizer_footer_navigation', 55, 10, null, 100 );

			$footer_navigation_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_navigation_typography_options_separator', $footer_navigation_typography_options_label, 'responsive_customizer_footer_navigation', 100 );

		}

	}

endif;

return new Responsive_Footer_Navigation_Customizer();
