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
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_bottom_layout', $bottom_row_desktop_layout, 'responsive_customizer_header_bottom', 15, $bottom_row_desktop_layout_choices, 'fullwidth', null );

			$header_bottom_layout_container_width_label = __( 'Desktop Container Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_bottom_layout_container_width', $header_bottom_layout_container_width_label, 'responsive_customizer_header_bottom', 15, 1140, 'is_header_bottom_layout_contained', 4096, 1, 'postMessage' );

			// Bottom Row Tablet Layout.
			$bottom_row_tablet_layout         = esc_html__( 'Bottom Row Tablet Layout', 'responsive' );
			$bottom_row_tablet_layout_choices = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_bottom_layout', $bottom_row_tablet_layout, 'responsive_customizer_header_bottom', 20, $bottom_row_tablet_layout_choices, 'fullwidth', null );

			$header_bottom_layout_container_width_tablet_label = __( 'Tablet Container Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_bottom_layout_container_width_tablet', $header_bottom_layout_container_width_tablet_label, 'responsive_customizer_header_bottom', 20, 992, 'is_header_tablet_bottom_layout_contained', 992, 1, 'postMessage' );

			// Bottom Row Mobile Layout.
			$bottom_row_mobile_layout         = esc_html__( 'Bottom Row Mobile Layout', 'responsive' );
			$bottom_row_mobile_layout_choices = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_bottom_layout', $bottom_row_mobile_layout, 'responsive_customizer_header_bottom', 25, $bottom_row_mobile_layout_choices, 'fullwidth', null );

			$header_bottom_layout_container_width_mobile_label = __( 'Mobile Container Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_bottom_layout_container_width_mobile', $header_bottom_layout_container_width_mobile_label, 'responsive_customizer_header_bottom', 25, 576, 'is_header_mobile_bottom_layout_contained', 576, 1, 'postMessage' );

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

			$bottom_row_transparent_background_desktop_color_label = __( 'Background Color Desktop (Transparent Header)', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_transparent_background_desktop', $bottom_row_transparent_background_desktop_color_label, 'responsive_customizer_header_bottom', 55, '', 'responsive_is_transparent_header_enabled', 'Background color for Bottom Row when transparent header is active' );

			$bottom_row_transparent_background_tablet_color_label = __( 'Background Color Tablet (Transparent Header)', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_transparent_background_tablet', $bottom_row_transparent_background_tablet_color_label, 'responsive_customizer_header_bottom', 55, '', 'responsive_is_transparent_header_enabled', 'Background color for Bottom Row when transparent header is active' );

			$bottom_row_transparent_background_mobile_color_label = __( 'Background Color Mobile (Transparent Header)', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_transparent_background_mobile', $bottom_row_transparent_background_mobile_color_label, 'responsive_customizer_header_bottom', 55, '', 'responsive_is_transparent_header_enabled', 'Background color for Bottom Row when transparent header is active' );

			// Padding (px).
			$bottom_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'bottom_row', 'responsive_customizer_header_bottom', 60, null, null, null, $bottom_row_padding_label );

			$bottom_row_options_label = esc_html__( 'Border Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'bottom_row_options_separator', $bottom_row_options_label, 'responsive_customizer_header_bottom', 65 );

			$bottom_row_border_top_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$bottom_row_border_top_style_label   = __( 'Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'bottom_row_border_top_style', $bottom_row_border_top_style_label, 'responsive_customizer_header_bottom', 70, $bottom_row_border_top_style_choices, 'none', null, 'postMessage' );

			$bottom_row_border_top_size_label = esc_html__( 'Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_border_top_size', $bottom_row_border_top_size_label, 'responsive_customizer_header_bottom', 75, 1, null, 20, 1, 'postMessage' );

			$bottom_row_border_bottom_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$bottom_row_border_bottom_style_label = __( 'Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'bottom_row_border_bottom_style', $bottom_row_border_bottom_style_label, 'responsive_customizer_header_bottom', 80, $bottom_row_border_bottom_style_choices, 'none', null );

			$bottom_row_border_bottom_size_label = esc_html__( 'Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_border_bottom_size', $bottom_row_border_bottom_size_label, 'responsive_customizer_header_bottom', 85, 1, null, 20, 1, 'postMessage' );

			$bottom_row_border_top_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$bottom_row_border_top_tablet_style_label   = __( 'Tablet Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'bottom_row_border_top_tablet_style', $bottom_row_border_top_tablet_style_label, 'responsive_customizer_header_bottom', 90, $bottom_row_border_top_tablet_style_choices, 'none', null );

			$bottom_row_border_top_tablet_size_label = esc_html__( 'Tablet Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_border_top_tablet_size', $bottom_row_border_top_tablet_size_label, 'responsive_customizer_header_bottom', 95, 1, null, 20, 1, 'postMessage' );

			$bottom_row_border_bottom_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$bottom_row_border_bottom_tablet_style_label = __( 'Tablet Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'bottom_row_border_bottom_tablet_style', $bottom_row_border_bottom_tablet_style_label, 'responsive_customizer_header_bottom', 100, $bottom_row_border_bottom_tablet_style_choices, 'none', null );

			$bottom_row_border_bottom_tablet_size_label = esc_html__( 'Tablet Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_border_bottom_tablet_size', $bottom_row_border_bottom_tablet_size_label, 'responsive_customizer_header_bottom', 105, 1, null, 20, 1, 'postMessage' );
			$bottom_row_border_top_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$bottom_row_border_top_mobile_style_label   = __( 'Mobile Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'bottom_row_border_top_mobile_style', $bottom_row_border_top_mobile_style_label, 'responsive_customizer_header_bottom', 110, $bottom_row_border_top_mobile_style_choices, 'none', null );

			$bottom_row_border_top_mobile_size_label = esc_html__( 'Mobile Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_border_top_mobile_size', $bottom_row_border_top_mobile_size_label, 'responsive_customizer_header_bottom', 115, 1, null, 20, 1, 'postMessage' );

			$bottom_row_border_bottom_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$bottom_row_border_bottom_mobile_style_label = __( 'Mobile Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'bottom_row_border_bottom_mobile_style', $bottom_row_border_bottom_mobile_style_label, 'responsive_customizer_header_bottom', 120, $bottom_row_border_bottom_mobile_style_choices, 'none', null );

			$bottom_row_border_bottom_mobile_size_label = esc_html__( 'Mobile Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'bottom_row_border_bottom_mobile_size', $bottom_row_border_bottom_mobile_size_label, 'responsive_customizer_header_bottom', 125, 1, null, 20, 1, 'postMessage' );

			$bottom_row_border_top_color_label = __( 'Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_border_top', $bottom_row_border_top_color_label, 'responsive_customizer_header_bottom', 130, '#fff', null );

			$bottom_row_border_bottom_color_label = __( 'Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_border_bottom', $bottom_row_border_bottom_color_label, 'responsive_customizer_header_bottom', 135, '#fff', null );

			$bottom_row_border_top_tablet_color_label = __( 'Tablet Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_border_top_tablet', $bottom_row_border_top_tablet_color_label, 'responsive_customizer_header_bottom', 140, '#fff', null );

			$bottom_row_border_bottom_tablet_color_label = __( 'Tablet Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_border_bottom_tablet', $bottom_row_border_bottom_tablet_color_label, 'responsive_customizer_header_bottom', 145, '#fff', null );

			$bottom_row_border_top_mobile_color_label = __( 'Mobile Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_border_top_mobile', $bottom_row_border_top_mobile_color_label, 'responsive_customizer_header_bottom', 150, '#fff', null );

			$bottom_row_border_bottom_mobile_color_label = __( 'Mobile Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'bottom_row_border_bottom_mobile', $bottom_row_border_bottom_mobile_color_label, 'responsive_customizer_header_bottom', 155, '#fff', null );

		}

	}

endif;

return new Responsive_Builder_Bottom_Row();
