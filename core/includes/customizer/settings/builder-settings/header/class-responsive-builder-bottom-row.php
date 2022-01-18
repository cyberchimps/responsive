<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Bottom_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Bottom_Row {

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
				'responsive_customizer_header_bottom',
				array(
					'title'    => esc_html__( 'Bottom Row', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 110,
				)
			);

			// Bottom Row Desktop Layout.
			$bottom_row_desktop_layout         = esc_html__( 'Bottom Row Desktop Layout', 'responsive' );
			$bottom_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Contained', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_bottom_layout', $bottom_row_desktop_layout, 'responsive_customizer_header_bottom', 15, $bottom_row_desktop_layout_choices, 'standard', null );

			// Bottom Row Tablet Layout.
			$bottom_row_tablet_layout         = esc_html__( 'Bottom Row Tablet Layout', 'responsive' );
			$bottom_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_bottom_layout', $bottom_row_tablet_layout, 'responsive_customizer_header_bottom', 20, $bottom_row_tablet_layout_choices, 'standard', null );

			// Bottom Row Mobile Layout.
			$bottom_row_mobile_layout         = esc_html__( 'Bottom Row Mobile Layout', 'responsive' );
			$bottom_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_bottom_layout', $bottom_row_mobile_layout, 'responsive_customizer_header_bottom', 25, $bottom_row_mobile_layout_choices, 'standard', null );

			$bottom_row_min_height_label = esc_html__( 'Min Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_min_height', $bottom_row_min_height_label, 'responsive_customizer_header_bottom', 30, 80, null, 400 );

			$bottom_row_min_height_tablet_label = esc_html__( 'Min Height Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_min_height_tablet', $bottom_row_min_height_tablet_label, 'responsive_customizer_header_bottom', 35, 0, null, 400 );

			$bottom_row_min_height_mobile_label = esc_html__( 'Min Height Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_min_height_mobile', $bottom_row_min_height_mobile_label, 'responsive_customizer_header_bottom', 40, 0, null, 400 );

			$bottom_row_background_label = __( 'Background Desktop', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_background_desktop', $bottom_row_background_label, 'responsive_customizer_header_bottom', 45, '', null );

			$bottom_row_background_tablet_label = __( 'Background Tablet', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_background_tablet', $bottom_row_background_tablet_label, 'responsive_customizer_header_bottom', 50, '', null );

			$bottom_row_background_mobile_label = __( 'Background Mobile', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_background_mobile', $bottom_row_background_mobile_label, 'responsive_customizer_header_bottom', 55, '', null );

			//Padding (px).
			$bottom_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'bottom_row', 'responsive_customizer_header_bottom', 60, null, null, null, $bottom_row_padding_label );
		}

	}

endif;

return new Responsive_Builder_Bottom_Row();
