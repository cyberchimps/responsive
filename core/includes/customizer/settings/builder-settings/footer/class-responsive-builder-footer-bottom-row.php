<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Footer_Bottom_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Footer_Bottom_Row {

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
				'responsive_customizer_footer_bottom',
				array(
					'title'    => esc_html__( 'Bottom Row', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 110,
				)
			);

			$footer_bottom_columns = esc_html__( 'Number of Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_columns', $footer_bottom_columns, 'responsive_customizer_footer_bottom', 10, 1, null, 5, 1, 'refresh' );

			// Bottom Row Desktop contain.
			$bottom_row_desktop_contain         = esc_html__( 'Desktop Container Width', 'responsive' );
			$bottom_row_desktop_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_bottom_contain', $bottom_row_desktop_contain, 'responsive_customizer_footer_bottom', 15, $bottom_row_desktop_contain_choices, 'standard', null );

			// Bottom Row Tablet contain.
			$bottom_row_tablet_contain         = esc_html__( 'Tablet Container Width', 'responsive' );
			$bottom_row_tablet_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_tablet_bottom_contain', $bottom_row_tablet_contain, 'responsive_customizer_footer_bottom', 20, $bottom_row_tablet_contain_choices, 'standard', null );

			// Bottom Row Mobile contain.
			$bottom_row_mobile_contain         = esc_html__( 'Mobile Container Width', 'responsive' );
			$bottom_row_mobile_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_mobile_bottom_contain', $bottom_row_mobile_contain, 'responsive_customizer_footer_bottom', 25, $bottom_row_mobile_contain_choices, 'standard', null );

			// Footer Bottom Link Style.
			$footer_bottom_link_style_choices = array(
				'normal' => __( 'Underlined', 'responsive' ),
				'plain'  => __( 'No Underline', 'responsive' ),
			);
			$footer_bottom_link_style         = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_bottom_link_style', $footer_bottom_link_style, 'responsive_customizer_footer_bottom', 30, $footer_bottom_link_style_choices, 'plain', null );

			// Footer Row Direction.
			$footer_bottom_direction_desktop_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_bottom_direction_desktop         = __( 'Row Direction Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_bottom_direction_desktop', $footer_bottom_direction_desktop, 'responsive_customizer_footer_bottom', 35, $footer_bottom_direction_desktop_choices, 'row', null );

			$footer_bottom_direction_tablet_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_bottom_direction_tablet         = __( 'Row Direction Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_bottom_direction_tablet', $footer_bottom_direction_tablet, 'responsive_customizer_footer_bottom', 40, $footer_bottom_direction_tablet_choices, '', null );

			$footer_bottom_direction_mobile_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_bottom_direction_mobile         = __( 'Row Direction Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_bottom_direction_mobile', $footer_bottom_direction_mobile, 'responsive_customizer_footer_bottom', 45, $footer_bottom_direction_mobile_choices, 'column', null );

			$footer_bottom_collapse_choices = array(
				'normal'    => __( 'Left To Right', 'responsive' ),
				'rtl' => __( 'Right To Left', 'responsive' ),
			);
			$footer_bottom_collapse         = __( 'Row Collapse', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_bottom_collapse', $footer_bottom_collapse, 'responsive_customizer_footer_bottom', 45, $footer_bottom_collapse_choices, 'column', null );

			$footer_bottom_row_top_spacing_label = esc_html__( 'Top Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_top_spacing', $footer_bottom_row_top_spacing_label, 'responsive_customizer_footer_bottom', 60, 30, null, 200 );

			$footer_bottom_row_top_spacing_tablet_label = esc_html__( 'Top Spacing Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_top_spacing_tablet', $footer_bottom_row_top_spacing_tablet_label, 'responsive_customizer_footer_bottom', 60, 0, null, 200 );

			$footer_bottom_row_top_spacing_mobile_label = esc_html__( 'Top Spacing Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_top_spacing_mobile', $footer_bottom_row_top_spacing_mobile_label, 'responsive_customizer_footer_bottom', 60, 0, null, 200 );

			$footer_bottom_row_bottom_spacing_label = esc_html__( 'Bottom Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_bottom_spacing', $footer_bottom_row_bottom_spacing_label, 'responsive_customizer_footer_bottom', 65, 30, null, 200 );

			$footer_bottom_row_bottom_spacing_tablet_label = esc_html__( 'Bottom Spacing Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_bottom_spacing_tablet', $footer_bottom_row_bottom_spacing_tablet_label, 'responsive_customizer_footer_bottom', 65, 0, null, 200 );

			$footer_bottom_row_bottom_spacing_mobile_label = esc_html__( 'Bottom Spacing Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_bottom_spacing_mobile', $footer_bottom_row_bottom_spacing_mobile_label, 'responsive_customizer_footer_bottom', 65, 0, null, 200 );

			$footer_bottom_row_min_height_label = esc_html__( 'Min Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_min_height', $footer_bottom_row_min_height_label, 'responsive_customizer_footer_bottom', 70, 0, null, 400 );

			$footer_bottom_row_min_height_tablet_label = esc_html__( 'Min Height Tablet(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_min_height_tablet', $footer_bottom_row_min_height_tablet_label, 'responsive_customizer_footer_bottom', 70, 0, null, 400 );

			$footer_bottom_row_min_height_mobile_label = esc_html__( 'Min Height Mobile(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_bottom_row_min_height_mobile', $footer_bottom_row_min_height_mobile_label, 'responsive_customizer_footer_bottom', 70, 0, null, 400 );

			$footer_bottom_link_style_choices = array(
				'normal' => __( 'Underline', 'responsive' ),
				'noline' => __( 'No Underline', 'responsive' ),
			);
			$footer_bottom_link_style         = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_bottom_link_style', $footer_bottom_link_style, 'responsive_customizer_footer_bottom', 80, $footer_bottom_link_style_choices, 'normal', null );

			$footer_bottom_row_link_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_bottom_row_link', $footer_bottom_row_link_label, 'responsive_customizer_footer_bottom', 80, '', null );
			
			$footer_bottom_row_link_hover_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_bottom_row_link_hover', $footer_bottom_row_link_hover_label, 'responsive_customizer_footer_bottom', 80, '', null );

			$footer_bottom_row_background_label = __( 'Background Desktop', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_bottom_row_background_desktop', $footer_bottom_row_background_label, 'responsive_customizer_footer_bottom', 90, '', null );

			$footer_bottom_row_background_tablet_label = __( 'Background Tablet', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_bottom_row_background_tablet', $footer_bottom_row_background_tablet_label, 'responsive_customizer_footer_bottom', 90, '', null );

			$footer_bottom_row_background_mobile_label = __( 'Background Mobile', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_bottom_row_background_mobile', $footer_bottom_row_background_mobile_label, 'responsive_customizer_footer_bottom', 90, '', null );

			$footer_bottom_widget_title_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_bottom_widget_title_typography_options_separator', $footer_bottom_widget_title_typography_options_label, 'responsive_customizer_footer_bottom', 100 );

			$footer_bottom_widget_content_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_bottom_widget_content_typography_options_separator', $footer_bottom_widget_content_typography_options_label, 'responsive_customizer_footer_bottom', 100 );

		}

	}

endif;

return new Responsive_Builder_Footer_Bottom_Row();
