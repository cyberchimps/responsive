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
			$bottom_row_desktop_contain         = esc_html__( 'Bottom Row Desktop Contain', 'responsive' );
			$bottom_row_desktop_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_bottom_contain', $bottom_row_desktop_contain, 'responsive_customizer_footer_bottom', 15, $bottom_row_desktop_contain_choices, 'standard', null );

			// Bottom Row Tablet contain.
			$bottom_row_tablet_contain         = esc_html__( 'Bottom Row Tablet Contain', 'responsive' );
			$bottom_row_tablet_contain_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_tablet_bottom_contain', $bottom_row_tablet_contain, 'responsive_customizer_footer_bottom', 20, $bottom_row_tablet_contain_choices, 'standard', null );

			// Bottom Row Mobile contain.
			$bottom_row_mobile_contain         = esc_html__( 'Bottom Row Mobile Contain', 'responsive' );
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

		}

	}

endif;

return new Responsive_Builder_Footer_Bottom_Row();
