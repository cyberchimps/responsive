<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Main_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Main_Row {

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
				'responsive_customizer_header_main',
				array(
					'title'    => esc_html__( 'Main Row', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 110,
				)
			);

			// Main Row Desktop Layout.
			$main_row_desktop_layout         = esc_html__( 'Main Row Desktop Layout', 'responsive' );
			$main_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Contained', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_main_layout', $main_row_desktop_layout, 'responsive_customizer_header_main', 15, $main_row_desktop_layout_choices, 'standard', null );

			// Main Row Tablet Layout.
			$main_row_tablet_layout         = esc_html__( 'Main Row Tablet Layout', 'responsive' );
			$main_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_main_layout', $main_row_tablet_layout, 'responsive_customizer_header_main', 20, $main_row_tablet_layout_choices, 'standard', null );

			// Main Row Mobile Layout.
			$main_row_mobile_layout         = esc_html__( 'Main Row Mobile Layout', 'responsive' );
			$main_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_main_layout', $main_row_mobile_layout, 'responsive_customizer_header_main', 25, $main_row_mobile_layout_choices, 'standard', null );

			$main_row_min_height_label = esc_html__( 'Min Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'main_row_min_height', $main_row_min_height_label, 'responsive_customizer_header_main', 30, 80, null, 400 );

			$main_row_min_height_tablet_label = esc_html__( 'Min Height Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'main_row_min_height_tablet', $main_row_min_height_tablet_label, 'responsive_customizer_header_main', 35, 0, null, 400 );

			$main_row_min_height_mobile_label = esc_html__( 'Min Height Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'main_row_min_height_mobile', $main_row_min_height_mobile_label, 'responsive_customizer_header_main', 40, 0, null, 400 );

			$main_row_background_label = __( 'Background Desktop', 'responsive' );
			responsive_color_control( $wp_customize, 'main_row_background_desktop', $main_row_background_label, 'responsive_customizer_header_main', 45, '', null );

			$main_row_background_tablet_label = __( 'Background Tablet', 'responsive' );
			responsive_color_control( $wp_customize, 'main_row_background_tablet', $main_row_background_tablet_label, 'responsive_customizer_header_main', 50, '', null );

			$main_row_background_mobile_label = __( 'Background Mobile', 'responsive' );
			responsive_color_control( $wp_customize, 'main_row_background_mobile', $main_row_background_mobile_label, 'responsive_customizer_header_main', 55, '', null );

			//Padding (px).
			$main_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'main_row', 'responsive_customizer_header_main', 60, null, null, null, $main_row_padding_label );
		}

	}

endif;

return new Responsive_Builder_Main_Row();
