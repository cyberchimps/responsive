<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Primary_Navigation_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Primary_Navigation_Customizer {

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
				'responsive_customizer_primary_navigation',
				array(
					'title'    => esc_html__( 'Primary Navigation', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 120,
				)
			);

			$stretch_primary_navigation_label = __( 'Stretch Primary Menu?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'stretch_primary_navigation', $stretch_primary_navigation_label, 'responsive_customizer_primary_navigation', 10, 0, null );

			$primary_navigation_fill_stretch_label = __( 'Fill and Center Primary Menu Items?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'primary_navigation_fill_stretch', $primary_navigation_fill_stretch_label, 'responsive_customizer_primary_navigation', 15, 0, 'is_stretch_primary_navigation' );

			$header_primary_navigation_style_choices = array(
				'standard'             => __( 'Standard', 'responsive' ),
				'fullheight'           => __( 'Full height', 'responsive' ),
				'underline'            => __( 'Underline', 'responsive' ),
				'underline-fullheight' => __( 'Underline - Full height', 'responsive' ),
			);
			$header_primary_navigation_style_label   = __( 'Primary Navigation Style', 'responsive' );
			responsive_select_control( $wp_customize, 'primary_navigation_style', $header_primary_navigation_style_label, 'responsive_customizer_primary_navigation', 20, $header_primary_navigation_style_choices, 'standard', null );

			// Primary nav item spacing.
			$primary_nav_items_spacing_label = esc_html__( 'Item Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'primary_navigation_item_spacing', $primary_nav_items_spacing_label, 'responsive_customizer_primary_navigation', 25, 18, null, 100 );

			$primary_nav_items_spacing_top_bottom_label = esc_html__( 'Item Verticle Spacing(px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'primary_navigation_item_top_bottom_spacing', $primary_nav_items_spacing_top_bottom_label, 'responsive_customizer_primary_navigation', 30, 10, null, 100 );

			$primary_navigation_color_label = __( 'Item Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_navigation', $primary_navigation_color_label, 'responsive_customizer_primary_navigation', 30, '#333', null );

			$primary_navigation_hover_color_label = __( 'Item Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_navigation_hover', $primary_navigation_hover_color_label, 'responsive_customizer_primary_navigation', 30, '#333', null );

			$primary_navigation_active_color_label = __( 'Active Item Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_navigation_active', $primary_navigation_active_color_label, 'responsive_customizer_primary_navigation', 30, '#333', null );

			$primary_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_background', $primary_background_color_label, 'responsive_customizer_primary_navigation', 30, '#fff', null );

			$primary_background_hover_color_label = __( 'Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_background_hover', $primary_background_hover_color_label, 'responsive_customizer_primary_navigation', 30, '#fff', null );

			$primary_background_active_color_label = __( 'Active Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_background_active', $primary_background_active_color_label, 'responsive_customizer_primary_navigation', 30, '#fff', null );

			/**
			 * Dropdown Options.
			 */
			$primary_dropdown_options_label = esc_html__( 'Dropdown Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'primary_dropdown_options_separator', $primary_dropdown_options_label, 'responsive_customizer_primary_navigation', 35 );

			$dropdown_navigation_reveal_choices = array(
				'none'      => __( 'None', 'responsive' ),
				'fade'      => __( 'Fade', 'responsive' ),
				'fade-up'   => __( 'Fade Up', 'responsive' ),
				'fade-down' => __( 'Fade Down', 'responsive' ),
			);
			$dropdown_navigation_reveal_label   = __( 'Dropdown Reveal', 'responsive' );
			responsive_select_control( $wp_customize, 'primary_dropdown_navigation_reveal', $dropdown_navigation_reveal_label, 'responsive_customizer_primary_navigation', 40, $dropdown_navigation_reveal_choices, 'none', null );

			$primary_nav_dropdown_width_label = esc_html__( 'Dropdown Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'primary_nav_dropdown_width', $primary_nav_dropdown_width_label, 'responsive_customizer_primary_navigation', 45, 200, null, 600 );

			$primary_nav_dropdown_vertical_spacing_label = esc_html__( 'Dropdown Verticle Spacing', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'primary_nav_dropdown_vertical_spacing', $primary_nav_dropdown_vertical_spacing_label, 'responsive_customizer_primary_navigation', 50, 8, null, 200 );

			$dropdown_navigation_divider_type_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);

			$dropdown_navigation_divider_type_label = __( 'Dropdown Item Divider Style', 'responsive' );
			responsive_select_control( $wp_customize, 'primary_dropdown_navigation_divider_type', $dropdown_navigation_divider_type_label, 'responsive_customizer_primary_navigation', 50, $dropdown_navigation_divider_type_choices, 'solid', null );

			$dropdown_navigation_divider_size_label = esc_html__( 'Dropdown Divider Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'primary_dropdown_navigation_divider_size', $dropdown_navigation_divider_size_label, 'responsive_customizer_primary_navigation', 50, 1, null, 20 );

			// Dropdown Color.
			$primary_dropdown_navigation_color_label = __( 'Dropdown Item Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_navigation', $primary_dropdown_navigation_color_label, 'responsive_customizer_primary_navigation', 55, '#333', null );

			$primary_dropdown_navigation_hover_color_label = __( 'Dropdown Item Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_navigation_hover', $primary_dropdown_navigation_hover_color_label, 'responsive_customizer_primary_navigation', 60, '#333', null );

			$primary_dropdown_navigation_active_color_label = __( 'Dropdown Active Item Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_navigation_active', $primary_dropdown_navigation_active_color_label, 'responsive_customizer_primary_navigation', 65, '#333', null );

			$primary_dropdown_background_color_label = __( 'Dropdown background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_background', $primary_dropdown_background_color_label, 'responsive_customizer_primary_navigation', 70, '#fff', null );

			$primary_dropdown_background_hover_color_label = __( 'Dropdown background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_background_hover', $primary_dropdown_background_hover_color_label, 'responsive_customizer_primary_navigation', 75, '#fff', null );

			$primary_dropdown_background_active_color_label = __( 'Dropdown Active background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_background_active', $primary_dropdown_background_active_color_label, 'responsive_customizer_primary_navigation', 80, '#fff', null );

			$dropdown_navigation_divider_size_label = __( 'Dropdown Divider Color', 'responsive' );
			responsive_color_control( $wp_customize, 'primary_dropdown_navigation_divider', $dropdown_navigation_divider_size_label, 'responsive_customizer_primary_navigation', 95, 'rgba(170, 170, 170, 0.2)', null );

			$primary_typography_options_label = esc_html__( 'Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'primary_typography_options_separator', $primary_typography_options_label, 'responsive_customizer_primary_navigation', 95 );

			/**
			 * Dropdown Typography Options.
			 */
			$primary_dropdown_options_label = esc_html__( 'Dropdown Typography Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'primary_dropdown_typography_options_separator', $primary_dropdown_options_label, 'responsive_customizer_primary_navigation', 105 );

		}

	}

endif;

return new Responsive_Primary_Navigation_Customizer();
