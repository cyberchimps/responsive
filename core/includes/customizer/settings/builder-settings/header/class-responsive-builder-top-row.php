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
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_top_layout', $top_row_desktop_layout, 'responsive_customizer_header_top', 15, $top_row_desktop_layout_choices, 'fullwidth', null );

			// Top Row Tablet Layout.
			$top_row_tablet_layout         = esc_html__( 'Top Row Tablet Layout', 'responsive' );
			$top_row_tablet_layout_choices = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_top_layout', $top_row_tablet_layout, 'responsive_customizer_header_top', 20, $top_row_tablet_layout_choices, 'fullwidth', null );

			// Top Row Mobile Layout.
			$top_row_mobile_layout         = esc_html__( 'Top Row Mobile Layout', 'responsive' );
			$top_row_mobile_layout_choices = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_top_layout', $top_row_mobile_layout, 'responsive_customizer_header_top', 25, $top_row_mobile_layout_choices, 'fullwidth', null );

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

			$top_row_transparent_background_desktop_color_label = __( 'Background Color Desktop (Transparent Header)', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_transparent_background_desktop', $top_row_transparent_background_desktop_color_label, 'responsive_customizer_header_top', 55, '', 'responsive_is_transparent_header_enabled', 'Background color for Top Row when transparent header is active' );

			$top_row_transparent_background_tablet_color_label = __( 'Background Color Tablet (Transparent Header)', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_transparent_background_tablet', $top_row_transparent_background_tablet_color_label, 'responsive_customizer_header_top', 55, '', 'responsive_is_transparent_header_enabled', 'Background color for Top Row when transparent header is active' );

			$top_row_transparent_background_mobile_color_label = __( 'Background Color Mobile (Transparent Header)', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_transparent_background_mobile', $top_row_transparent_background_mobile_color_label, 'responsive_customizer_header_top', 55, '', 'responsive_is_transparent_header_enabled', 'Background color for Top Row when transparent header is active' );

			// Padding (px).
			$top_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'top_row', 'responsive_customizer_header_top', 60, null, null, null, $top_row_padding_label );

			$top_row_options_label = esc_html__( 'Border Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'top_row_options_separator', $top_row_options_label, 'responsive_customizer_header_top', 65 );

			$top_row_border_top_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$top_row_border_top_style_label   = __( 'Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'top_row_border_top_style', $top_row_border_top_style_label, 'responsive_customizer_header_top', 70, $top_row_border_top_style_choices, 'none', null );

			$top_row_border_top_size_label = esc_html__( 'Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_border_top_size', $top_row_border_top_size_label, 'responsive_customizer_header_top', 75, 1, null, 20, 1, 'postMessage' );

			$top_row_border_bottom_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$top_row_border_bottom_style_label = __( 'Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'top_row_border_bottom_style', $top_row_border_bottom_style_label, 'responsive_customizer_header_top', 80, $top_row_border_bottom_style_choices, 'none', null );

			$top_row_border_bottom_size_label = esc_html__( 'Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_border_bottom_size', $top_row_border_bottom_size_label, 'responsive_customizer_header_top', 85, 1, null, 20, 1, 'postMessage' );

			$top_row_border_top_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$top_row_border_top_tablet_style_label   = __( 'Tablet Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'top_row_border_top_tablet_style', $top_row_border_top_tablet_style_label, 'responsive_customizer_header_top', 90, $top_row_border_top_tablet_style_choices, 'none', null );

			$top_row_border_top_tablet_size_label = esc_html__( 'Tablet Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_border_top_tablet_size', $top_row_border_top_tablet_size_label, 'responsive_customizer_header_top', 95, 1, null, 20, 1, 'postMessage' );

			$top_row_border_bottom_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$top_row_border_bottom_tablet_style_label = __( 'Tablet Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'top_row_border_bottom_tablet_style', $top_row_border_bottom_tablet_style_label, 'responsive_customizer_header_top', 100, $top_row_border_bottom_tablet_style_choices, 'none', null );

			$top_row_border_bottom_tablet_size_label = esc_html__( 'Tablet Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_border_bottom_tablet_size', $top_row_border_bottom_tablet_size_label, 'responsive_customizer_header_top', 105, 1, null, 20, 1, 'postMessage' );
			$top_row_border_top_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$top_row_border_top_mobile_style_label   = __( 'Mobile Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'top_row_border_top_mobile_style', $top_row_border_top_mobile_style_label, 'responsive_customizer_header_top', 110, $top_row_border_top_mobile_style_choices, 'none', null );

			$top_row_border_top_mobile_size_label = esc_html__( 'Mobile Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_border_top_mobile_size', $top_row_border_top_mobile_size_label, 'responsive_customizer_header_top', 115, 1, null, 20, 1, 'postMessage' );

			$top_row_border_bottom_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$top_row_border_bottom_mobile_style_label = __( 'Mobile Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'top_row_border_bottom_mobile_style', $top_row_border_bottom_mobile_style_label, 'responsive_customizer_header_top', 120, $top_row_border_bottom_mobile_style_choices, 'none', null );

			$top_row_border_bottom_mobile_size_label = esc_html__( 'Mobile Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'top_row_border_bottom_mobile_size', $top_row_border_bottom_mobile_size_label, 'responsive_customizer_header_top', 125, 1, null, 20, 1, 'postMessage' );

			$top_row_border_top_color_label = __( 'Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_border_top', $top_row_border_top_color_label, 'responsive_customizer_header_top', 130, '#fff', null );

			$top_row_border_bottom_color_label = __( 'Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_border_bottom', $top_row_border_bottom_color_label, 'responsive_customizer_header_top', 135, '#fff', null );

			$top_row_border_top_tablet_color_label = __( 'Tablet Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_border_top_tablet', $top_row_border_top_tablet_color_label, 'responsive_customizer_header_top', 140, '#fff', null );

			$top_row_border_bottom_tablet_color_label = __( 'Tablet Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_border_bottom_tablet', $top_row_border_bottom_tablet_color_label, 'responsive_customizer_header_top', 145, '#fff', null );

			$top_row_border_top_mobile_color_label = __( 'Mobile Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_border_top_mobile', $top_row_border_top_mobile_color_label, 'responsive_customizer_header_top', 150, '#fff', null );

			$top_row_border_bottom_mobile_color_label = __( 'Mobile Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'top_row_border_bottom_mobile', $top_row_border_bottom_mobile_color_label, 'responsive_customizer_header_top', 155, '#fff', null );

		}

	}

endif;

return new Responsive_Builder_Top_Row();
