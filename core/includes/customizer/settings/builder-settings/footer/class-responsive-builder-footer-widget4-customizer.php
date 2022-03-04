<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Widget4_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Footer_Widget4_Customizer {

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
				'responsive_customizer_sidebar-widgets-footer-widget-4',
				array(
					'title'    => esc_html__( 'Widget 4', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 120,
				)
			);

			// Content Align.
			$footer_widget4_align_desktop_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_widget4_align_desktop         = __( 'Content Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_widget4_align_desktop', $footer_widget4_align_desktop, 'responsive_customizer_sidebar-widgets-footer-widget-4', 20, $footer_widget4_align_desktop_choices, 'left', null );

			$footer_widget4_align_tablet_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_widget4_align_tablet         = __( 'Content Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_widget4_align_tablet', $footer_widget4_align_tablet, 'responsive_customizer_sidebar-widgets-footer-widget-4', 25, $footer_widget4_align_tablet_choices, 'left', null );

			$footer_widget4_align_mobile_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_widget4_align_mobile         = __( 'Content Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_widget4_align_mobile', $footer_widget4_align_mobile, 'responsive_customizer_sidebar-widgets-footer-widget-4', 25, $footer_widget4_align_mobile_choices, 'left', null );

			// Content Vertical Align.
			$footer_widget4_vertical_align_desktop_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_widget4_vertical_align_desktop         = __( 'Content Vertical Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_widget4_vertical_align_desktop', $footer_widget4_vertical_align_desktop, 'responsive_customizer_sidebar-widgets-footer-widget-4', 30, $footer_widget4_vertical_align_desktop_choices, 'midle', null );

			$footer_widget4_vertical_align_tablet_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_widget4_vertical_align_tablet         = __( 'Content Vertical Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_widget4_vertical_align_tablet', $footer_widget4_vertical_align_tablet, 'responsive_customizer_sidebar-widgets-footer-widget-4', 35, $footer_widget4_vertical_align_tablet_choices, 'middle', null );

			$footer_widget4_vertical_align_mobile_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_widget4_vertical_align_mobile         = __( 'Content Vertical Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_widget4_vertical_align_mobile', $footer_widget4_vertical_align_mobile, 'responsive_customizer_sidebar-widgets-footer-widget-4', 45, $footer_widget4_vertical_align_mobile_choices, 'middle', null );

		}

	}

endif;

return new Responsive_Footer_Widget4_Customizer();
