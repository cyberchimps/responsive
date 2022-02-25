<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Top_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Top_Row {

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
				'responsive_customizer_header_top',
				array(
					'title'    => esc_html__( 'Top Row', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 110,
				)
			);

			// Top Row Desktop Layout.
			$top_row_desktop_layout         = esc_html__( 'Top Row Desktop Layout', 'responsive' );
			$top_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Contained', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_top_layout', $top_row_desktop_layout, 'responsive_customizer_header_top', 15, $top_row_desktop_layout_choices, 'standard', null );

			// Top Row Tablet Layout.
			$top_row_tablet_layout         = esc_html__( 'Top Row Tablet Layout', 'responsive' );
			$top_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_top_layout', $top_row_tablet_layout, 'responsive_customizer_header_top', 20, $top_row_tablet_layout_choices, 'standard', null );

			// Top Row Mobile Layout.
			$top_row_mobile_layout         = esc_html__( 'Top Row Mobile Layout', 'responsive' );
			$top_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_top_layout', $top_row_mobile_layout, 'responsive_customizer_header_top', 25, $top_row_mobile_layout_choices, 'standard', null );

			$top_row_min_height_label = esc_html__( 'Min Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_min_height', $top_row_min_height_label, 'responsive_customizer_header_top', 30, 80, null, 400 );

			$top_row_min_height_tablet_label = esc_html__( 'Min Height Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_min_height_tablet', $top_row_min_height_tablet_label, 'responsive_customizer_header_top', 35, 0, null, 400 );

			$top_row_min_height_mobile_label = esc_html__( 'Min Height Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_min_height_mobile', $top_row_min_height_mobile_label, 'responsive_customizer_header_top', 40, 0, null, 400 );

			$top_row_background_label = __( 'Background Desktop', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_background_desktop', $top_row_background_label, 'responsive_customizer_header_top', 45, '', null );

			$top_row_background_tablet_label = __( 'Background Tablet', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_background_tablet', $top_row_background_tablet_label, 'responsive_customizer_header_top', 50, '', null );

			$top_row_background_mobile_label = __( 'Background Mobile', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_background_mobile', $top_row_background_mobile_label, 'responsive_customizer_header_top', 55, '', null );

			//Padding (px).
			$top_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'top_row', 'responsive_customizer_header_top', 60, null, null, null, $top_row_padding_label );
		}

	}

endif;

return new Responsive_Builder_Top_Row();
