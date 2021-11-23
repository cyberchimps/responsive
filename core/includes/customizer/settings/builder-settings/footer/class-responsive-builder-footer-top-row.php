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
			$top_row_desktop_contain         = esc_html__( 'Top Row Desktop Contain', 'responsive' );
			$top_row_desktop_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_top_contain', $top_row_desktop_contain, 'responsive_customizer_footer_top', 15, $top_row_desktop_contain_choices, 'standard', null );

			// Top Row Tablet contain.
			$top_row_tablet_contain         = esc_html__( 'Top Row Tablet Contain', 'responsive' );
			$top_row_tablet_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_tablet_top_contain', $top_row_tablet_contain, 'responsive_customizer_footer_top', 20, $top_row_tablet_contain_choices, 'standard', null );

			// Top Row Mobile contain.
			$top_row_mobile_contain         = esc_html__( 'Top Row Mobile Contain', 'responsive' );
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

		}

	}

endif;

return new Responsive_Builder_Footer_Top_Row();
