<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Footer_Top_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Footer_Top_Row {

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
				'responsive_customizer_footer_top',
				array(
					'title'    => esc_html__( 'Top Row', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 110,
				)
			);

			$footer_top_columns = esc_html__( 'Number of Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_columns', $footer_top_columns, 'responsive_customizer_footer_top', 10, 1, null, 5, 1, 'refresh' );

			// Top Row Desktop contain.
			$top_row_desktop_contain         = esc_html__( 'Desktop Container Width', 'responsive' );
			$top_row_desktop_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_top_contain', $top_row_desktop_contain, 'responsive_customizer_footer_top', 15, $top_row_desktop_contain_choices, 'standard', null );

			// Top Row Tablet contain.
			$top_row_tablet_contain         = esc_html__( 'Tablet Container Width', 'responsive' );
			$top_row_tablet_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_tablet_top_contain', $top_row_tablet_contain, 'responsive_customizer_footer_top', 20, $top_row_tablet_contain_choices, 'standard', null );

			// Top Row Mobile contain.
			$top_row_mobile_contain         = esc_html__( 'Mobile Container Width', 'responsive' );
			$top_row_mobile_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_mobile_top_contain', $top_row_mobile_contain, 'responsive_customizer_footer_top', 25, $top_row_mobile_contain_choices, 'standard', null );

			// Footer Top Link Style.
			$footer_top_link_style_choices = array(
				'normal' => __( 'Underlined', 'responsive' ),
				'plain'  => __( 'No Underline', 'responsive' ),
			);
			$footer_top_link_style         = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_link_style', $footer_top_link_style, 'responsive_customizer_footer_top', 30, $footer_top_link_style_choices, 'plain', null );

			// Footer Row Direction.
			$footer_top_direction_desktop_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_top_direction_desktop         = __( 'Row Direction Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_direction_desktop', $footer_top_direction_desktop, 'responsive_customizer_footer_top', 35, $footer_top_direction_desktop_choices, 'row', null );

			$footer_top_direction_tablet_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_top_direction_tablet         = __( 'Row Direction Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_direction_tablet', $footer_top_direction_tablet, 'responsive_customizer_footer_top', 40, $footer_top_direction_tablet_choices, '', null );

			$footer_top_direction_mobile_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_top_direction_mobile         = __( 'Row Direction Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_direction_mobile', $footer_top_direction_mobile, 'responsive_customizer_footer_top', 45, $footer_top_direction_mobile_choices, 'column', null );

			$footer_top_collapse_choices = array(
				'normal' => __( 'Left To Right', 'responsive' ),
				'rtl'    => __( 'Right To Left', 'responsive' ),
			);
			$footer_top_collapse         = __( 'Row Collapse', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_collapse', $footer_top_collapse, 'responsive_customizer_footer_top', 45, $footer_top_collapse_choices, 'column', null );

			$footer_top_row_column_spacing_label = esc_html__( 'Column Spacing Desktop (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_column_spacing', $footer_top_row_column_spacing_label, 'responsive_customizer_footer_top', 50, 30, null, 200 );

			$footer_top_row_column_spacing_tablet_label = esc_html__( 'Column Spacing Tablet (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_column_spacing_tablet', $footer_top_row_column_spacing_tablet_label, 'responsive_customizer_footer_top', 50, '', null, 200 );

			$footer_top_row_column_spacing_mobile_label = esc_html__( 'Column Spacing Mobile (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_column_spacing_mobile', $footer_top_row_column_spacing_mobile_label, 'responsive_customizer_footer_top', 50, '', null, 200 );

			$footer_top_row_top_spacing_label = esc_html__( 'Top Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_top_spacing', $footer_top_row_top_spacing_label, 'responsive_customizer_footer_top', 60, 30, null, 200 );

			$footer_top_row_top_spacing_tablet_label = esc_html__( 'Top Spacing Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_top_spacing_tablet', $footer_top_row_top_spacing_tablet_label, 'responsive_customizer_footer_top', 60, 0, null, 200 );

			$footer_top_row_top_spacing_mobile_label = esc_html__( 'Top Spacing Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_top_spacing_mobile', $footer_top_row_top_spacing_mobile_label, 'responsive_customizer_footer_top', 60, 0, null, 200 );

			$footer_top_row_bottom_spacing_label = esc_html__( 'Bottom Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_bottom_spacing', $footer_top_row_bottom_spacing_label, 'responsive_customizer_footer_top', 65, 30, null, 200 );

			$footer_top_row_bottom_spacing_tablet_label = esc_html__( 'Bottom Spacing Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_bottom_spacing_tablet', $footer_top_row_bottom_spacing_tablet_label, 'responsive_customizer_footer_top', 65, 0, null, 200 );

			$footer_top_row_bottom_spacing_mobile_label = esc_html__( 'Bottom Spacing Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_bottom_spacing_mobile', $footer_top_row_bottom_spacing_mobile_label, 'responsive_customizer_footer_top', 65, 0, null, 200 );

			$footer_top_row_min_height_label = esc_html__( 'Min Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_min_height', $footer_top_row_min_height_label, 'responsive_customizer_footer_top', 70, 0, null, 400 );

			$footer_top_row_min_height_tablet_label = esc_html__( 'Min Height Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_min_height_tablet', $footer_top_row_min_height_tablet_label, 'responsive_customizer_footer_top', 70, 0, null, 400 );

			$footer_top_row_min_height_mobile_label = esc_html__( 'Min Height Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_min_height_mobile', $footer_top_row_min_height_mobile_label, 'responsive_customizer_footer_top', 70, 0, null, 400 );

			$footer_top_link_style_choices = array(
				'normal' => __( 'Underline', 'responsive' ),
				'noline' => __( 'No Underline', 'responsive' ),
			);
			$footer_top_link_style         = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_link_style', $footer_top_link_style, 'responsive_customizer_footer_top', 80, $footer_top_link_style_choices, 'normal', null );

			$footer_top_row_link_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_link', $footer_top_row_link_label, 'responsive_customizer_footer_top', 80, '', null );

			$footer_top_row_link_hover_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_link_hover', $footer_top_row_link_hover_label, 'responsive_customizer_footer_top', 80, '', null );

			$footer_top_row_background_label = __( 'Background Desktop', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_background_desktop', $footer_top_row_background_label, 'responsive_customizer_footer_top', 90, '', null );

			$footer_top_row_background_tablet_label = __( 'Background Tablet', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_background_tablet', $footer_top_row_background_tablet_label, 'responsive_customizer_footer_top', 90, '', null );

			$footer_top_row_background_mobile_label = __( 'Background Mobile', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_background_mobile', $footer_top_row_background_mobile_label, 'responsive_customizer_footer_top', 90, '', null );

			$footer_top_widget_title_typography_options_label = esc_html__( 'Widgets Title Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_top_widget_title_typography_options_separator', $footer_top_widget_title_typography_options_label, 'responsive_customizer_footer_top', 100 );

			$footer_top_widget_content_typography_options_label = esc_html__( 'Widgets Content Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_top_widget_content_typography_options_separator', $footer_top_widget_content_typography_options_label, 'responsive_customizer_footer_top', 120 );

			$footer_top_row_options_label = esc_html__( 'Border Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_top_row_options_separator', $footer_top_row_options_label, 'responsive_customizer_footer_top', 135 );

			$footer_top_row_border_column_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_top_row_border_column_style_label   = __( 'Border Column Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_column_style', $footer_top_row_border_column_style_label, 'responsive_customizer_footer_top', 140, $footer_top_row_border_column_style_choices, 'none', null );

			$footer_top_row_border_column_size_label = esc_html__( 'Border Column Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_column_size', $footer_top_row_border_column_size_label, 'responsive_customizer_footer_top', 145, 0, null, 20, 1, 'postMessage' );

			$footer_top_row_border_column_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_top_row_border_column_tablet_style_label   = __( 'Tablet Border column Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_column_tablet_style', $footer_top_row_border_column_tablet_style_label, 'responsive_customizer_footer_top', 150, $footer_top_row_border_column_tablet_style_choices, 'none', null );

			$footer_top_row_border_column_tablet_size_label = esc_html__( 'Tablet Border column Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_column_tablet_size', $footer_top_row_border_column_tablet_size_label, 'responsive_customizer_footer_top', 155, 0, null, 20, 1, 'postMessage' );

			$footer_top_row_border_column_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_top_row_border_column_mobile_style_label   = __( 'Mobile Border column Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_column_mobile_style', $footer_top_row_border_column_mobile_style_label, 'responsive_customizer_footer_top', 160, $footer_top_row_border_column_mobile_style_choices, 'none', null );

			$footer_top_row_border_column_mobile_size_label = esc_html__( 'Mobile Border column Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_column_mobile_size', $footer_top_row_border_column_mobile_size_label, 'responsive_customizer_footer_top', 165, 0, null, 20, 1, 'postMessage' );

			$footer_top_row_border_top_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_top_row_border_top_style_label   = __( 'Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_top_style', $footer_top_row_border_top_style_label, 'responsive_customizer_footer_top', 170, $footer_top_row_border_top_style_choices, 'none', null );

			$footer_top_row_border_top_size_label = esc_html__( 'Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_top_size', $footer_top_row_border_top_size_label, 'responsive_customizer_footer_top', 175, 1, null, 20, 1, 'postMessage' );

			$footer_top_row_border_bottom_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$footer_top_row_border_bottom_style_label = __( 'Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_bottom_style', $footer_top_row_border_bottom_style_label, 'responsive_customizer_footer_top', 180, $footer_top_row_border_bottom_style_choices, 'none', null );

			$footer_top_row_border_bottom_size_label = esc_html__( 'Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_bottom_size', $footer_top_row_border_bottom_size_label, 'responsive_customizer_footer_top', 185, 1, null, 20, 1, 'postMessage' );

			$footer_top_row_border_top_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_top_row_border_top_tablet_style_label   = __( 'Tablet Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_top_tablet_style', $footer_top_row_border_top_tablet_style_label, 'responsive_customizer_footer_top', 190, $footer_top_row_border_top_tablet_style_choices, 'none', null );

			$footer_top_row_border_top_tablet_size_label = esc_html__( 'Tablet Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_top_tablet_size', $footer_top_row_border_top_tablet_size_label, 'responsive_customizer_footer_top', 195, 1, null, 20, 1, 'postMessage' );

			$footer_top_row_border_bottom_tablet_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$footer_top_row_border_bottom_tablet_style_label = __( 'Tablet Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_bottom_tablet_style', $footer_top_row_border_bottom_tablet_style_label, 'responsive_customizer_footer_top', 200, $footer_top_row_border_bottom_tablet_style_choices, 'none', null );

			$footer_top_row_border_bottom_tablet_size_label = esc_html__( 'Tablet Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_bottom_tablet_size', $footer_top_row_border_bottom_tablet_size_label, 'responsive_customizer_footer_top', 205, 1, null, 20, 1, 'postMessage' );
			$footer_top_row_border_top_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_top_row_border_top_mobile_style_label   = __( 'Mobile Border Top Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_top_mobile_style', $footer_top_row_border_top_mobile_style_label, 'responsive_customizer_footer_top', 210, $footer_top_row_border_top_mobile_style_choices, 'none', null );

			$footer_top_row_border_top_mobile_size_label = esc_html__( 'Mobile Border Top Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_top_mobile_size', $footer_top_row_border_top_mobile_size_label, 'responsive_customizer_footer_top', 215, 1, null, 20, 1, 'postMessage' );

			$footer_top_row_border_bottom_mobile_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$footer_top_row_border_bottom_mobile_style_label = __( 'Mobile Border Bottom Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_row_border_bottom_mobile_style', $footer_top_row_border_bottom_mobile_style_label, 'responsive_customizer_footer_top', 220, $footer_top_row_border_bottom_mobile_style_choices, 'none', null );

			$footer_top_row_border_bottom_mobile_size_label = esc_html__( 'Mobile Border Bottom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_top_row_border_bottom_mobile_size', $footer_top_row_border_bottom_mobile_size_label, 'responsive_customizer_footer_top', 225, 1, null, 20, 1, 'postMessage' );

			$footer_top_row_border_column_color_label = __( 'Border column Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_column', $footer_top_row_border_column_color_label, 'responsive_customizer_footer_top', 230, '', null );

			$footer_top_row_border_column_tablet_color_label = __( 'Tablet Border column Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_column_tablet', $footer_top_row_border_column_tablet_color_label, 'responsive_customizer_footer_top', 230, '', null );

			$footer_top_row_border_column_mobile_color_label = __( 'Mobile Border column Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_column_mobile', $footer_top_row_border_column_mobile_color_label, 'responsive_customizer_footer_top', 230, '', null );

			$footer_top_row_border_top_color_label = __( 'Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_top', $footer_top_row_border_top_color_label, 'responsive_customizer_footer_top', 230, '#fff', null );

			$footer_top_row_border_bottom_color_label = __( 'Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_bottom', $footer_top_row_border_bottom_color_label, 'responsive_customizer_footer_top', 235, '#fff', null );

			$footer_top_row_border_top_tablet_color_label = __( 'Tablet Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_top_tablet', $footer_top_row_border_top_tablet_color_label, 'responsive_customizer_footer_top', 240, '#fff', null );

			$footer_top_row_border_bottom_tablet_color_label = __( 'Tablet Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_bottom_tablet', $footer_top_row_border_bottom_tablet_color_label, 'responsive_customizer_footer_top', 245, '#fff', null );

			$footer_top_row_border_top_mobile_color_label = __( 'Mobile Border Top Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_top_mobile', $footer_top_row_border_top_mobile_color_label, 'responsive_customizer_footer_top', 250, '#fff', null );

			$footer_top_row_border_bottom_mobile_color_label = __( 'Mobile Border Bottom Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_top_row_border_bottom_mobile', $footer_top_row_border_bottom_mobile_color_label, 'responsive_customizer_footer_top', 255, '#fff', null );

		}

	}

endif;

return new Responsive_Builder_Footer_Top_Row();
