<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_rows' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Rows {

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
				'responsive_customizer_builder_rows',
				array(
					'title'    => esc_html__( 'Builder Rows', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 110,
				)
			);
			/**
			 * Top Row Layout
			 */
			$top_row_separator_label = esc_html__( 'Top Row', 'responsive' );
			responsive_separator_control( $wp_customize, 'top_row_separator', $top_row_separator_label, 'responsive_customizer_builder_rows', 10 );

			// Top Row Desktop Layout.
			$top_row_desktop_layout         = esc_html__( 'Top Row Desktop Layout', 'responsive' );
			$top_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_top_layout', $top_row_desktop_layout, 'responsive_customizer_builder_rows', 15, $top_row_desktop_layout_choices, 'standard', null );

			// Top Row Tablet Layout.
			$top_row_tablet_layout         = esc_html__( 'Top Row Tablet Layout', 'responsive' );
			$top_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_top_layout', $top_row_tablet_layout, 'responsive_customizer_builder_rows', 20, $top_row_tablet_layout_choices, 'standard', null );

			// Top Row Mobile Layout.
			$top_row_mobile_layout         = esc_html__( 'Top Row Mobile Layout', 'responsive' );
			$top_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_top_layout', $top_row_mobile_layout, 'responsive_customizer_builder_rows', 25, $top_row_mobile_layout_choices, 'standard', null );

			/**
			 * Main Row Layout.
			 */
			$top_row_separator_label = esc_html__( 'Main Row', 'responsive' );
			responsive_separator_control( $wp_customize, 'main_row_separator', $top_row_separator_label, 'responsive_customizer_builder_rows', 30 );

			// Main Row Desktop Layout.
			$main_row_desktop_layout         = esc_html__( 'Main Row Desktop Layout', 'responsive' );
			$main_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_main_layout', $main_row_desktop_layout, 'responsive_customizer_builder_rows', 35, $main_row_desktop_layout_choices, 'standard', null );

			// Main Row Tablet Layout.
			$main_row_tablet_layout         = esc_html__( 'Main Row Tablet Layout', 'responsive' );
			$main_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_main_layout', $main_row_tablet_layout, 'responsive_customizer_builder_rows', 40, $main_row_tablet_layout_choices, 'standard', null );

			// Main Row Mobile Layout.
			$main_row_mobile_layout         = esc_html__( 'Main Row Mobile Layout', 'responsive' );
			$main_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_main_layout', $main_row_mobile_layout, 'responsive_customizer_builder_rows', 45, $main_row_mobile_layout_choices, 'standard', null );

			/**
			 * Bottom Row Layout.
			 */
			$bottom_row_separator_label = esc_html__( 'Bottom Row', 'responsive' );
			responsive_separator_control( $wp_customize, 'bottom_row_separator', $bottom_row_separator_label, 'responsive_customizer_builder_rows', 50 );

			// Bottom Row Desktop Layout.
			$bottom_row_desktop_layout         = esc_html__( 'Bottom Row Desktop Layout', 'responsive' );
			$bottom_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_bottom_layout', $bottom_row_desktop_layout, 'responsive_customizer_builder_rows', 55, $bottom_row_desktop_layout_choices, 'standard', null );

			// Bottom Row Tablet Layout.
			$bottom_row_tablet_layout         = esc_html__( 'Bottom Row Tablet Layout', 'responsive' );
			$bottom_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_bottom_layout', $bottom_row_tablet_layout, 'responsive_customizer_builder_rows', 60, $bottom_row_tablet_layout_choices, 'standard', null );

			// Bottom Row Mobile Layout.
			$bottom_row_mobile_layout         = esc_html__( 'Bottom Row Mobile Layout', 'responsive' );
			$bottom_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_bottom_layout', $bottom_row_mobile_layout, 'responsive_customizer_builder_rows', 65, $bottom_row_mobile_layout_choices, 'standard', null );

		}

	}

endif;

return new Responsive_Builder_Rows();
