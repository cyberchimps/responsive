<?php
/**
 * Mobile Header Primary Row Customization Options
 * 
 * @package Responsive Theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( !class_exists( 'Responsive_HFB_Mobile_Header_Primary_Row' ) ) {
    /**
     * Mobile Header Primary Row Customization Options
     */
    class Responsive_HFB_Mobile_Header_Primary_Row {
        
        /**
         * Constructor
         * @since 6.2.9
         */
        public function __construct() {

            add_action( 'customize_register', array( $this, 'customizer_options' ) );

        }

        /**
         * Customizer Options
         * 
         * @param object $wp_customize Wordpress customization option
         * @since 6.2.9
         */
        public function customizer_options( $wp_customize ) {

            $wp_customize->add_section(
                'responsive_mobile_header_primary_row',
                array(
                    'title'        => __( 'Mobile Primary Header', 'responsive' ),
                    'panel'        => 'responsive_header',
                    'priority'     => 40,
                )
            );

            // Height
            $mobile_header_primary_row_height_label = __( 'Height (px)', 'responsive' );
            responsive_drag_number_control( $wp_customize, 'mobile_header_primary_row_height', $mobile_header_primary_row_height_label, 'responsive_mobile_header_primary_row', 10, 0, null, 300, 0, 'postMessage', 1 );

            responsive_horizontal_separator_control($wp_customize, 'mobile_header_primary_row_visibility_separator', 1, 'responsive_mobile_header_primary_row', 15, 1, );

            // Style.
            $mobile_header_primary_row_visiblity_label   = esc_html__( 'Visibility', 'responsive' );
            $mobile_header_primary_row_visiblity_choices = array(
                'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
                'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
            );
            responsive_multi_select_button_control( $wp_customize, 'mobile_header_primary_row_visibility', $mobile_header_primary_row_visiblity_label, 'responsive_mobile_header_primary_row', 20, $mobile_header_primary_row_visiblity_choices, array( 'desktop', 'tablet', 'mobile' ) , null );

            // Background Color.
            $mobile_header_primary_row_color_label = __( 'Background Color', 'responsive' );
            responsive_color_control( $wp_customize, 'mobile_header_primary_row_bg', $mobile_header_primary_row_color_label, 'responsive_mobile_header_primary_row', 30, Responsive\Core\get_responsive_customizer_defaults( 'responsive_mobile_header_primary_row_bg_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_mobile_header_primary_row_bg_hover_color' ), 'mobile_header_primary_row_bg_hover' );

            // Bottom Border Color.
            $mobile_header_primary_row_bottom_border_color_label = __( 'Bottom Border Color', 'responsive' );
            responsive_color_control( $wp_customize, 'mobile_header_primary_row_bottom_border', $mobile_header_primary_row_bottom_border_color_label, 'responsive_mobile_header_primary_row', 40, Responsive\Core\get_responsive_customizer_defaults( 'responsive_mobile_header_primary_row_bottom_border_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_mobile_header_primary_row_bottom_border_hover_color' ), 'mobile_header_primary_row_bottom_border_hover' );

            responsive_horizontal_separator_control($wp_customize, 'mobile_header_primary_row_bottom_border_size_separator', 1, 'responsive_mobile_header_primary_row', 50, 1, );

            // Bottom Border Size.
            $mobile_header_primary_row_bottom_border_size_label = __( 'Bottom Border Size (px)', 'responsive' );
            responsive_drag_number_control( $wp_customize, 'mobile_header_primary_row_bottom_border_size', $mobile_header_primary_row_bottom_border_size_label, 'responsive_mobile_header_primary_row', 60, 0, null, 300, 0, 'postMessage', 1 );

            // Spacing.
            $mobile_header_primary_row_spacing_separator_label = __( 'Spacing', 'responsive' );
            responsive_separator_control( $wp_customize, 'mobile_header_primary_row_spacing_separator', $mobile_header_primary_row_spacing_separator_label, 'responsive_mobile_header_primary_row', 70 );

            // Padding.
            $mobile_header_primary_row_padding_label = __( 'Padding (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'mobile_header_primary_row_padding', 'responsive_mobile_header_primary_row', 80, 0, 0, null, $mobile_header_primary_row_padding_label );

            // Margin.
            $mobile_header_primary_row_margin_label = esc_html__( 'Margin (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'mobile_header_primary_row_margin', 'responsive_mobile_header_primary_row', 90, 0, 0, null, $mobile_header_primary_row_margin_label );

            $tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_bg_color',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_bottom_border_color',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_bottom_border_size',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_padding_padding',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_margin_padding',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_bottom_border_size_separator',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_spacing_separator',
			);

			$general_tab_ids = array(
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_height',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_visibility',
				$tab_ids_prefix . 'responsive_mobile_header_primary_row_visibility_separator',
			);
			responsive_tabs_button_control( $wp_customize, 'mobile_header_primary_row_tabs', $tabs_label, 'responsive_mobile_header_primary_row', 5, '', 'responsive_mobile_header_primary_row_general_tab', 'responsive_mobile_header_primary_row_design_tab', $general_tab_ids, $design_tab_ids, null );
        }
    } 
}

return new Responsive_HFB_Mobile_Header_Primary_Row();