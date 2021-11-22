<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Footer_Middle_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Footer_Middle_Row {

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
				'responsive_customizer_footer_middle',
				array(
					'title'    => esc_html__( 'Middle Row', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 110,
				)
			);

			$footer_middle_columns = esc_html__( 'Number of Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_middle_columns', $footer_middle_columns, 'responsive_customizer_footer_middle', 10, 1, null, 5, 1, 'refresh' );

			// Middle Row Desktop contain.
			$middle_row_desktop_contain         = esc_html__( 'Middle Row Desktop Contain', 'responsive' );
			$middle_row_desktop_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_middle_contain', $middle_row_desktop_contain, 'responsive_customizer_footer_middle', 15, $middle_row_desktop_contain_choices, 'standard', null );

			// Middle Row Tablet contain.
			$middle_row_tablet_contain         = esc_html__( 'Middle Row Tablet Contain', 'responsive' );
			$middle_row_tablet_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_tablet_middle_contain', $middle_row_tablet_contain, 'responsive_customizer_footer_middle', 20, $middle_row_tablet_contain_choices, 'standard', null );

			// Middle Row Mobile contain.
			$middle_row_mobile_contain         = esc_html__( 'Middle Row Mobile Contain', 'responsive' );
			$middle_row_mobile_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_mobile_middle_contain', $middle_row_mobile_contain, 'responsive_customizer_footer_middle', 25, $middle_row_mobile_contain_choices, 'standard', null );

			// Footer Middle Link Style.
			$footer_middle_link_style_choices = array(
				'normal' => __( 'Underlined', 'responsive' ),
				'plain'  => __( 'No Underline', 'responsive' ),
			);
			$footer_middle_link_style         = __( 'Link Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_middle_link_style', $footer_middle_link_style, 'responsive_customizer_footer_middle', 30, $footer_middle_link_style_choices, 'plain', null );

			// Footer Row Direction.
			$footer_middle_direction_desktop_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_middle_direction_desktop         = __( 'Row Direction Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_middle_direction_desktop', $footer_middle_direction_desktop, 'responsive_customizer_footer_middle', 35, $footer_middle_direction_desktop_choices, 'row', null );

			$footer_middle_direction_tablet_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_middle_direction_tablet         = __( 'Row Direction Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_middle_direction_tablet', $footer_middle_direction_tablet, 'responsive_customizer_footer_middle', 40, $footer_middle_direction_tablet_choices, '', null );

			$footer_middle_direction_mobile_choices = array(
				'row'    => __( 'Row', 'responsive' ),
				'column' => __( 'Column', 'responsive' ),
			);
			$footer_middle_direction_mobile         = __( 'Row Direction Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_middle_direction_mobile', $footer_middle_direction_mobile, 'responsive_customizer_footer_middle', 45, $footer_middle_direction_mobile_choices, 'column', null );

			$footer_middle_collapse_choices = array(
				'normal'    => __( 'Left To Right', 'responsive' ),
				'rtl' => __( 'Right To Left', 'responsive' ),
			);
			$footer_middle_collapse         = __( 'Row Collapse', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_middle_collapse', $footer_middle_collapse, 'responsive_customizer_footer_middle', 45, $footer_middle_collapse_choices, 'column', null );

		}

	}

endif;

return new Responsive_Builder_Footer_Middle_Row();
