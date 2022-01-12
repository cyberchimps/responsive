<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Builder_Main_row' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Builder_Main_Row {

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
				'responsive_customizer_header_main',
				array(
					'title'    => esc_html__( 'Main Row', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 110,
				)
			);

			// Main Row Desktop Layout.
			$main_row_desktop_layout         = esc_html__( 'Main Row Desktop Layout', 'responsive' );
			$main_row_desktop_layout_choices = array(
				'standard'  => esc_html__( 'Contained', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_main_layout', $main_row_desktop_layout, 'responsive_customizer_header_main', 15, $main_row_desktop_layout_choices, 'standard', null );

			// Main Row Tablet Layout.
			$main_row_tablet_layout         = esc_html__( 'Main Row Tablet Layout', 'responsive' );
			$main_row_tablet_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_tablet_main_layout', $main_row_tablet_layout, 'responsive_customizer_header_main', 20, $main_row_tablet_layout_choices, 'standard', null );

			// Main Row Mobile Layout.
			$main_row_mobile_layout         = esc_html__( 'Main Row Mobile Layout', 'responsive' );
			$main_row_mobile_layout_choices = array(
				'standard'  => esc_html__( 'Standard', 'responsive' ),
				'fullwidth' => esc_html__( 'Fullwidth', 'responsive' ),
				'contained' => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_mobile_main_layout', $main_row_mobile_layout, 'responsive_customizer_header_main', 25, $main_row_mobile_layout_choices, 'standard', null );

		}

	}

endif;

return new Responsive_Builder_Main_Row();
