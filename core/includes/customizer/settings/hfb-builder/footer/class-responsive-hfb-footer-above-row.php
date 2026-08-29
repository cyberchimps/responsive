<?php
/**
 * Footer Above Row Customization Options
 * 
 * @package Responsive Theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_HFB_Footer_Above_Row' ) ) {
    /**
     * Footer Above Row Customization Options
     */
    class Responsive_HFB_Footer_Above_Row {

        /**
         * Constructor
         *
         * @since 6.1.0
         */
        public function __construct() {

            add_action( 'customize_register', array( $this, 'customizer_options' ) );

        }

        /**
         * Customizer options
         *
         * @param  object $wp_customize WordPress customization option.
         * @since 6.1.0
         */
        public function customizer_options( $wp_customize ) {
            
            $wp_customize->add_section(
                'responsive_footer_above_row',
                array(
                    'title'         => __( 'Above Footer', 'responsive' ),
                    'panel'         => 'responsive_footer',
                    'priority'      => 40,
                )
            );

            // Above Footer Width.
			$footer_above_row_width_label = esc_html__( 'Width', 'responsive' );
			$footer_above_row_width_choices   = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained'  => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_above_width', $footer_above_row_width_label, 'responsive_footer_above_row', 10, $footer_above_row_width_choices, 'contained', null, 'postMessage', '' );

            // Design.
			$design_separator_label = __( 'Design', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_above_design', $design_separator_label, 'responsive_footer_above_row', 18 );

            // Above Footer Columns.
			$footer_above_row_columns_label = esc_html__( 'Columns', 'responsive' );
			$footer_above_row_columns_choices   = array(
				1 => esc_html__( '1', 'responsive' ),
				2 => esc_html__( '2', 'responsive' ),
				3 => esc_html__( '3', 'responsive' ),
				4 => esc_html__( '4', 'responsive' ),
				5 => esc_html__( '5', 'responsive' ),
				6 => esc_html__( '6', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_above_columns', $footer_above_row_columns_label, 'responsive_footer_above_row', 20, $footer_above_row_columns_choices, '3', null, 'postMessage' );

            responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_2', 1, 'responsive_footer_above_row', 25, 1, );
			
			// Layout.
			$layout_separator_label = __( 'Layout', 'responsive' );
			responsive_builder_row_layout_control( $wp_customize, 'footer_above_layout',$layout_separator_label, 'responsive_footer_above_row', 30, 'equal', array( 'footer' => 'above', 'rspv_event' => 'footer_items' ), null );

			responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_5', 1, 'responsive_footer_above_row', 35, 1, );

            // Inner Elements Layout.
			$inner_elements_layout_label = esc_html__( 'Inner Elements Layout', 'responsive' );
			$inner_elements_layout_choices   = array(
				'stack'  => esc_html__( 'Stack', 'responsive' ),
				'inline' => esc_html__( 'Inline', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_above_inner_elements_layout', $inner_elements_layout_label, 'responsive_footer_above_row', 40, $inner_elements_layout_choices, 'inline', null, 'refresh' );

            // Inner Column Spacing (px).
			$inner_column_spacing_label = __( 'Inner Column Spacing (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'footer_above_inner_column_spacing', $inner_column_spacing_label, 'responsive_footer_above_row', 50, 30, null, 300, 0, 'postMessage', 1 );

            // Height.
			$row_height_label = __( 'Footer Height (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'footer_above_height', $row_height_label, 'responsive_footer_above_row', 60, 30, null, 600, 0, 'postMessage', 1 );

            responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_3', 1, 'responsive_footer_above_row', 65, 1, );

            // Vertical Alignment.
			$vertical_alignment_label = esc_html__( 'Vertical Alignment', 'responsive' );
			$vertical_alignment_choices   = array(
				'flex-start' => esc_html__( 'Top', 'responsive' ),
				'center'     => esc_html__( 'Middle', 'responsive' ),
				'flex-end'   => esc_html__( 'Bottom', 'responsive' ),
			);
			responsive_select_button_with_switchers_control( $wp_customize, 'footer_above_vertical_alignment', $vertical_alignment_label, 'responsive_footer_above_row', 70, $vertical_alignment_choices, 'flex-start', null, 'refresh' );

			// Visibility
			responsive_horizontal_separator_control($wp_customize, 'footer_above_visibility_separator', 1, 'responsive_footer_above_row', 75, 1, );

            // Style.
			$footer_above_row_visiblity_label   = esc_html__( 'Visibility', 'responsive' );
			$footer_above_row_visiblity_choices = array(
				'desktop'   => esc_html__( 'dashicons-desktop', 'responsive' ),
				'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
				'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
			);
			responsive_multi_select_button_control( $wp_customize, 'footer_above_visibility', $footer_above_row_visiblity_label, 'responsive_footer_above_row', 76, $footer_above_row_visiblity_choices, array( 'desktop', 'tablet', 'mobile' ) , null );

            
            // Background Color.
			$footer_above_row_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_above_row_bg', $footer_above_row_color_label, 'responsive_footer_above_row', 80, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_above_row_bg_color' ), null, '' );

            // Border.
			$border_head_label = __( 'Top Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_above_border_head', $border_head_label, 'responsive_footer_above_row', 90 );
            
            // Top Border Size.
            $footer_above_row_top_border_size_label = __( 'Top Border Size (px)', 'responsive' );
            responsive_drag_number_control_with_switchers( $wp_customize, 'footer_above_row_top_border_size', $footer_above_row_top_border_size_label, 'responsive_footer_above_row', 95, 0, null, 300, 0, 'postMessage', 1 );

            // /Top Border Color.
			$footer_above_row_border_color_label = __( 'Top Border Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_above_row_border', $footer_above_row_border_color_label, 'responsive_footer_above_row', 100, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_above_row_border_color' ), null, '' );

			// Top Border Type
			$top_border_type_label = esc_html__( 'Top Border Type', 'responsive' );
			$top_border_type_choices   = array(
				'solid'     => esc_html__( 'Solid', 'responsive' ),
				'dashed'   => esc_html__( 'Dashed', 'responsive' ),
				'dotted'   => esc_html__( 'Dotted', 'responsive' ),
				'double'   => esc_html__( 'Double', 'responsive' ),
			);
			responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_9', 1, 'responsive_footer_above_row', 106, 1, );

			responsive_select_button_with_switchers_control( $wp_customize, 'footer_above_top_border_type', $top_border_type_label, 'responsive_footer_above_row', 107, $top_border_type_choices, 'solid', null, 'refresh' );

            // Bottom Border.
			$bottom_border_head_label = __( 'Bottom Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_above_bottom_border_head', $bottom_border_head_label, 'responsive_footer_above_row', 108 );
            
            // Bottom Border Size.
            $footer_above_row_bottom_border_size_label = __( 'Bottom Border Width (px)', 'responsive' );
            responsive_drag_number_control_with_switchers( $wp_customize, 'footer_above_row_bottom_border_size', $footer_above_row_bottom_border_size_label, 'responsive_footer_above_row', 109, 0, null, 300, 0, 'postMessage', 1 );

			responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_11', 1, 'responsive_footer_above_row', 109, 1 );

            // Bottom Border Color.
			$footer_above_row_bottom_border_color_label = __( 'Bottom Border Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_above_row_bottom_border', $footer_above_row_bottom_border_color_label, 'responsive_footer_above_row', 110, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_above_row_border_color' ), null, '' );

			// Bottom Border Type
			$bottom_border_type_label = esc_html__( 'Bottom Border Type', 'responsive' );
			$bottom_border_type_choices   = array(
				'solid'     => esc_html__( 'Solid', 'responsive' ),
				'dashed'   => esc_html__( 'Dashed', 'responsive' ),
				'dotted'   => esc_html__( 'Dotted', 'responsive' ),
				'double'   => esc_html__( 'Double', 'responsive' ),
			);
			responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_10', 1, 'responsive_footer_above_row', 111, 1, );

			responsive_select_button_with_switchers_control( $wp_customize, 'footer_above_bottom_border_type', $bottom_border_type_label, 'responsive_footer_above_row', 112, $bottom_border_type_choices, 'solid', null, 'refresh' );

			// Column Border
			$column_border_label = __( 'Column Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_above_column_border_head', $column_border_label, 'responsive_footer_above_row', 113 );

			// Column Border Width
			$footer_above_column_border_width_label = __( 'Column Border Width (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'footer_above_column_border_width', $footer_above_column_border_width_label, 'responsive_footer_above_row', 114, 0, null, 300, 0, 'postMessage', 1 );

			responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_12', 1, 'responsive_footer_above_row', 115, 1, );

			// Column Border Color
			$footer_above_column_border_color_label = __( 'Column Border Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_above_column_border', $footer_above_column_border_color_label, 'responsive_footer_above_row', 116, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_above_row_border_color' ), null, '' );

			responsive_horizontal_separator_control($wp_customize, 'footer_above_separator_13', 1, 'responsive_footer_above_row', 117, 1, );

			// Column Border Type
			$column_border_type_label = esc_html__( 'Column Border Type', 'responsive' );
			$column_border_type_choices   = array(
				'solid'     => esc_html__( 'Solid', 'responsive' ),
				'dashed'   => esc_html__( 'Dashed', 'responsive' ),
				'dotted'   => esc_html__( 'Dotted', 'responsive' ),
				'double'   => esc_html__( 'Double', 'responsive' ),
			);
			responsive_select_button_with_switchers_control( $wp_customize, 'footer_above_column_border_type', $column_border_type_label, 'responsive_footer_above_row', 118, $column_border_type_choices, 'solid', null, 'refresh' );
            
			// Spacing.
			$spacing_separator_label = __( 'Row Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_above_spacing_separator', $spacing_separator_label, 'responsive_footer_above_row', 120 );

            // Padding.
			$footer_above_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_above_row_padding', 'responsive_footer_above_row', 130, 20, 0, null, $footer_above_row_padding_label );
            
            // Margin.
			$footer_above_row_margin_label = esc_html__( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_above_row_margin', 'responsive_footer_above_row', 140, 0, 0, null, $footer_above_row_margin_label );

            // Spacing.
			$items_spacing_separator_label = __( 'Row Items Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_above_items_spacing_separator', $items_spacing_separator_label, 'responsive_footer_above_row', 150 );

            // Padding.
			$footer_above_row_items_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_above_row_item_padding', 'responsive_footer_above_row', 160, 0, 0, null, $footer_above_row_items_padding_label );

            $tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_footer_above_row_bg_color',
				$tab_ids_prefix . 'responsive_footer_above_border_head',
				$tab_ids_prefix . 'responsive_footer_above_row_top_border_size',
				$tab_ids_prefix . 'responsive_footer_above_row_border_color',
				$tab_ids_prefix . 'responsive_footer_above_spacing_separator',
				$tab_ids_prefix . 'responsive_footer_above_row_padding_padding',
				$tab_ids_prefix . 'responsive_footer_above_row_margin_padding',
				$tab_ids_prefix . 'responsive_footer_above_items_spacing_separator',
				$tab_ids_prefix . 'responsive_footer_above_row_item_padding_padding',
				$tab_ids_prefix . 'responsive_footer_above_column_border_head',
				$tab_ids_prefix . 'responsive_footer_above_column_border_width',
				$tab_ids_prefix . 'responsive_footer_above_column_border_color',
				$tab_ids_prefix . 'responsive_footer_above_column_border_type',
				$tab_ids_prefix . 'responsive_footer_above_top_border_type',
				$tab_ids_prefix . 'responsive_footer_above_separator_9',
				$tab_ids_prefix . 'responsive_footer_above_bottom_border_head',
				$tab_ids_prefix . 'responsive_footer_above_row_bottom_border_size',
				$tab_ids_prefix . 'responsive_footer_above_row_bottom_border_color',
				$tab_ids_prefix . 'responsive_footer_above_bottom_border_type',
				$tab_ids_prefix . 'responsive_footer_above_separator_10',
				$tab_ids_prefix . 'responsive_footer_above_separator_11',
				$tab_ids_prefix . 'responsive_footer_above_separator_12',
				$tab_ids_prefix . 'responsive_footer_above_separator_13',
			);
            
			$general_tab_ids = array(
                $tab_ids_prefix . 'responsive_footer_above_width',
				$tab_ids_prefix . 'responsive_footer_above_design',
				$tab_ids_prefix . 'responsive_footer_above_columns',
				$tab_ids_prefix . 'responsive_footer_above_inner_elements_layout',
				$tab_ids_prefix . 'responsive_footer_above_inner_column_spacing',
				$tab_ids_prefix . 'responsive_footer_above_height',
				$tab_ids_prefix . 'responsive_footer_above_vertical_alignment',
                $tab_ids_prefix . 'responsive_footer_above_separator_2',
                $tab_ids_prefix . 'responsive_footer_above_separator_3',
                $tab_ids_prefix . 'responsive_footer_above_separator_5',
                $tab_ids_prefix . 'responsive_footer_above_layout',
				$tab_ids_prefix . 'responsive_footer_above_visibility_separator',
				$tab_ids_prefix . 'responsive_footer_above_visibility',
			);
			responsive_tabs_button_control( $wp_customize, 'footer_above_row_tabs', $tabs_label, 'responsive_footer_above_row', 5, '', 'responsive_footer_above_row_general_tab', 'responsive_footer_above_row_design_tab', $general_tab_ids, $design_tab_ids, null );
        }
    }
}

return new Responsive_HFB_Footer_Above_Row();