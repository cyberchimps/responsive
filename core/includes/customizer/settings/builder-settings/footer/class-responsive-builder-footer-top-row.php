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
				'normal'    => __( 'Left To Right', 'responsive' ),
				'rtl' => __( 'Right To Left', 'responsive' ),
			);
			$footer_top_collapse         = __( 'Row Collapse', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_top_collapse', $footer_top_collapse, 'responsive_customizer_footer_top', 45, $footer_top_collapse_choices, 'column', null );

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

			$footer_top_widget_title_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_top_widget_title_typography_options_separator', $footer_top_widget_title_typography_options_label, 'responsive_customizer_footer_top', 100 );

			$footer_top_widget_content_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_top_widget_content_typography_options_separator', $footer_top_widget_content_typography_options_label, 'responsive_customizer_footer_top', 100 );

		}

	}

endif;

return new Responsive_Builder_Footer_Top_Row();
