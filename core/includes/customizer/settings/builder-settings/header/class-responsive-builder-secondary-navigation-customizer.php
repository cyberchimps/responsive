<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Secondary_Navigation_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Secondary_Navigation_Customizer {

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
				'responsive_customizer_secondary_navigation',
				array(
					'title'    => esc_html__( 'Secondary Navigation', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 120,
				)
			);

			$stretch_secondary_navigation_label = __( 'Stretch Secondary Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_secondary_navigation', $stretch_secondary_navigation_label, 'responsive_customizer_secondary_navigation', 10, 0, null );

			$secondary_navigation_fill_stretch_label = __( 'Fill and Center Secondary Menu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'secondary_navigation_fill_stretch', $secondary_navigation_fill_stretch_label, 'responsive_customizer_secondary_navigation', 15, 0, null );

			$header_secondary_navigation_style_choices = array(
				'standard'             => __( 'Standard', 'responsive' ),
				'fullheight'           => __( 'Full height', 'responsive' ),
				'underline'            => __( 'Underline', 'responsive' ),
				'underline-fullheight' => __( 'Underline - Full height', 'responsive' ),
			);
			$header_secondary_navigation_style_label   = __( 'Secondary Navigation Style', 'responsive' );
			responsive_select_control( $wp_customize, 'secondary_navigation_style', $header_secondary_navigation_style_label, 'responsive_customizer_secondary_navigation', 20, $header_secondary_navigation_style_choices, 'standard', null );

			// Seconsary nav item spacing.
			$secondary_nav_items_spacing_label = esc_html__( 'Item Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'secondary_navigation_item_spacing', $secondary_nav_items_spacing_label, 'responsive_customizer_secondary_navigation', 25, 18, null, 100 );

			$secondary_nav_items_spacing_top_bottom_label = esc_html__( 'Item Top Bottom Padding(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'secondary_navigation_item_top_bottom_spacing', $secondary_nav_items_spacing_top_bottom_label, 'responsive_customizer_secondary_navigation', 30, 10, null, 100 );

			/**
			 * Dropdown Options.
			 */
			$dropdown_options_label = esc_html__( 'Dropdown Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'dropdown_options_separator', $dropdown_options_label, 'responsive_customizer_primary_navigation', 35 );

			$dropdown_navigation_reveal_choices = array(
				'none'      => __( 'None', 'responsive' ),
				'fade'      => __( 'Fade', 'responsive' ),
				'fade-up'   => __( 'Fade Up', 'responsive' ),
				'fade-down' => __( 'Fade Down', 'responsive' ),
			);
			$dropdown_navigation_reveal_label   = __( 'Dropdown Reveal', 'responsive' );
			responsive_select_control( $wp_customize, 'secondary_dropdown_navigation_reveal', $dropdown_navigation_reveal_label, 'responsive_customizer_secondary_navigation', 40, $dropdown_navigation_reveal_choices, 'none', null );

		}

	}

endif;

return new Responsive_Secondary_Navigation_Customizer();
