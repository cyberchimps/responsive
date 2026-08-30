<?php
/**
 * Footer Primary Row Customization Options
 * 
 * @package Responsive Theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_HFB_Footer_Primary_Row' ) ) {
    /**
     * Footer Primary Row Customization Options
     */
    class Responsive_HFB_Footer_Primary_Row {

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
                'responsive_footer_primary_row',
                array(
                    'title'         => __( 'Primary Footer', 'responsive' ),
                    'panel'         => 'responsive_footer',
                    'priority'      => 40,
                )
            );

            // Primary Footer Width.
			$footer_primary_row_width_label = esc_html__( 'Width', 'responsive' );
			$footer_primary_row_width_choices   = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained'  => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_primary_width', $footer_primary_row_width_label, 'responsive_footer_primary_row', 10, $footer_primary_row_width_choices, 'contained', null, 'postMessage' );

            // Design.
			$design_separator_label = __( 'Design', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_design', $design_separator_label, 'responsive_footer_primary_row', 18 );

            // Primary Footer Columns.
			$footer_primary_row_columns_label = esc_html__( 'Columns', 'responsive' );
			$footer_primary_row_columns_choices   = array(
				1 => esc_html__( '1', 'responsive' ),
				2 => esc_html__( '2', 'responsive' ),
				3 => esc_html__( '3', 'responsive' ),
				4 => esc_html__( '4', 'responsive' ),
				5 => esc_html__( '5', 'responsive' ),
				6 => esc_html__( '6', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_primary_columns', $footer_primary_row_columns_label, 'responsive_footer_primary_row', 20, $footer_primary_row_columns_choices, '2', null, 'postMessage' );

            responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_2', 1, 'responsive_footer_primary_row', 25, 1, );

			// Layout.
			$layout_separator_label = __( 'Layout', 'responsive' );
			responsive_builder_row_layout_control( $wp_customize, 'footer_primary_layout',$layout_separator_label, 'responsive_footer_primary_row', 30, 'left-heavy', array( 'footer' => 'primary', 'rspv_event' => 'footer_items' ), null );

			responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_5', 1, 'responsive_footer_primary_row', 35, 1, );

            // Inner Elements Layout.
			$inner_elements_layout_label = esc_html__( 'Inner Elements Layout', 'responsive' );
			$inner_elements_layout_choices   = array(
				'stack'  => esc_html__( 'Stack', 'responsive' ),
				'inline' => esc_html__( 'Inline', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_primary_inner_elements_layout', $inner_elements_layout_label, 'responsive_footer_primary_row', 40, $inner_elements_layout_choices, 'inline', null, 'refresh' );

            // Inner Column Spacing (px).
			$inner_column_spacing_label = __( 'Inner Column Spacing (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'footer_primary_inner_column_spacing', $inner_column_spacing_label, 'responsive_footer_primary_row', 50, 30, null, 300, 0, 'postMessage', 1 );

            // Height.
			$row_height_label = __( 'Footer Height (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'footer_primary_height', $row_height_label, 'responsive_footer_primary_row', 60, 30, null, 600, 0, 'postMessage', 1 );

            responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_3', 1, 'responsive_footer_primary_row', 65, 1, );

            // Vertical Alignment.
			$vertical_alignment_label = esc_html__( 'Vertical Alignment', 'responsive' );
			$vertical_alignment_choices   = array(
				'flex-start' => esc_html__( 'Top', 'responsive' ),
				'center'     => esc_html__( 'Middle', 'responsive' ),
				'flex-end'   => esc_html__( 'Bottom', 'responsive' ),
			);
			responsive_select_button_with_switchers_control( $wp_customize, 'footer_primary_vertical_alignment', $vertical_alignment_label, 'responsive_footer_primary_row', 70, $vertical_alignment_choices, 'center', null, 'refresh' );

			// Visibility
			responsive_horizontal_separator_control($wp_customize, 'footer_primary_visibility_separator', 1, 'responsive_footer_primary_row', 75, 1, );

            // Style.
			$footer_primary_row_visiblity_label   = esc_html__( 'Visibility', 'responsive' );
			$footer_primary_row_visiblity_choices = array(
				'desktop'   => esc_html__( 'dashicons-desktop', 'responsive' ),
				'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
				'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
			);
			responsive_multi_select_button_control( $wp_customize, 'footer_primary_visibility', $footer_primary_row_visiblity_label, 'responsive_footer_primary_row', 76, $footer_primary_row_visiblity_choices, array( 'desktop', 'tablet', 'mobile' ) , null );

            
            // Background Color.
			$footer_primary_row_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_primary_row_bg', $footer_primary_row_color_label, 'responsive_footer_primary_row', 80, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_bg_color' ), null, '' );

            // Top Border.
			$border_head_label = __( 'Top Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_border_head', $border_head_label, 'responsive_footer_primary_row', 90 );

            // Top Border Size.
            $footer_primary_row_top_border_size_label = __( 'Top Border Size (px)', 'responsive' );
            responsive_drag_number_control_with_switchers( $wp_customize, 'footer_primary_row_top_border_size', $footer_primary_row_top_border_size_label, 'responsive_footer_primary_row', 100, 1, null, 300, 0, 'postMessage', 1 );

            // Top Border Color.
			$footer_primary_row_border_color_label = __( 'Top Border Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_primary_row_border', $footer_primary_row_border_color_label, 'responsive_footer_primary_row', 105, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_border_color' ), null, '' );

			// Top Border Type
			$top_border_type_label = esc_html__( 'Top Border Type', 'responsive' );
			$top_border_type_choices   = array(
				'solid'     => esc_html__( 'Solid', 'responsive' ),
				'dashed'   => esc_html__( 'Dashed', 'responsive' ),
				'dotted'   => esc_html__( 'Dotted', 'responsive' ),
				'double'   => esc_html__( 'Double', 'responsive' ),
			);
			responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_9', 1, 'responsive_footer_primary_row', 106, 1, );

			responsive_select_button_with_switchers_control( $wp_customize, 'footer_primary_top_border_type', $top_border_type_label, 'responsive_footer_primary_row', 107, $top_border_type_choices, 'solid', null, 'refresh' );

            // Bottom Border.
			$bottom_border_head_label = __( 'Bottom Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_bottom_border_head', $bottom_border_head_label, 'responsive_footer_primary_row', 108 );
            
            // Bottom Border Size.
            $footer_primary_row_bottom_border_size_label = __( 'Bottom Border Width (px)', 'responsive' );
            responsive_drag_number_control_with_switchers( $wp_customize, 'footer_primary_row_bottom_border_size', $footer_primary_row_bottom_border_size_label, 'responsive_footer_primary_row', 109, 0, null, 300, 0, 'postMessage', 1 );

			responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_11', 1, 'responsive_footer_primary_row', 109, 1 );

            // Bottom Border Color.
			$footer_primary_row_bottom_border_color_label = __( 'Bottom Border Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_primary_row_bottom_border', $footer_primary_row_bottom_border_color_label, 'responsive_footer_primary_row', 110, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_border_color' ), null, '' );

			// Bottom Border Type
			$bottom_border_type_label = esc_html__( 'Bottom Border Type', 'responsive' );
			$bottom_border_type_choices   = array(
				'solid'     => esc_html__( 'Solid', 'responsive' ),
				'dashed'   => esc_html__( 'Dashed', 'responsive' ),
				'dotted'   => esc_html__( 'Dotted', 'responsive' ),
				'double'   => esc_html__( 'Double', 'responsive' ),
			);
			responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_10', 1, 'responsive_footer_primary_row', 111, 1, );

			responsive_select_button_with_switchers_control( $wp_customize, 'footer_primary_bottom_border_type', $bottom_border_type_label, 'responsive_footer_primary_row', 112, $bottom_border_type_choices, 'solid', null, 'refresh' );

			// Column Border
			$column_border_label = __( 'Column Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_column_border_head', $column_border_label, 'responsive_footer_primary_row', 113 );

			// Column Border Width
			$footer_primary_column_border_width_label = __( 'Column Border Width (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'footer_primary_column_border_width', $footer_primary_column_border_width_label, 'responsive_footer_primary_row', 114, 0, null, 300, 0, 'postMessage', 1 );

			responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_12', 1, 'responsive_footer_primary_row', 115, 1, );

			// Column Border Color
			$footer_primary_column_border_color_label = __( 'Column Border Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_primary_column_border', $footer_primary_column_border_color_label, 'responsive_footer_primary_row', 116, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_border_color' ), null, '' );

			responsive_horizontal_separator_control($wp_customize, 'footer_primary_separator_13', 1, 'responsive_footer_primary_row', 117, 1, );

			// Column Border Type
			$column_border_type_label = esc_html__( 'Column Border Type', 'responsive' );
			$column_border_type_choices   = array(
				'solid'     => esc_html__( 'Solid', 'responsive' ),
				'dashed'   => esc_html__( 'Dashed', 'responsive' ),
				'dotted'   => esc_html__( 'Dotted', 'responsive' ),
				'double'   => esc_html__( 'Double', 'responsive' ),
			);
			responsive_select_button_with_switchers_control( $wp_customize, 'footer_primary_column_border_type', $column_border_type_label, 'responsive_footer_primary_row', 118, $column_border_type_choices, 'solid', null, 'refresh' );

            // Spacing.
			$spacing_separator_label = __( 'Row Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_spacing_separator', $spacing_separator_label, 'responsive_footer_primary_row', 120 );

            // Padding.
			$footer_primary_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_primary_row_padding', 'responsive_footer_primary_row', 130, 20, 0, null, $footer_primary_row_padding_label );
            
            // Margin.
			$footer_primary_row_margin_label = esc_html__( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_primary_row_margin', 'responsive_footer_primary_row', 140, 0, 0, null, $footer_primary_row_margin_label );

			// Spacing.
			$items_spacing_separator_label = __( 'Row Items Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_items_spacing_separator', $items_spacing_separator_label, 'responsive_footer_primary_row', 150 );

			// Padding.
			$footer_primary_row_items_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_primary_row_item_padding', 'responsive_footer_primary_row', 160, 0, 0, null, $footer_primary_row_items_padding_label );

			// Widgets
			$widget_separator_label = __( 'Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_primary_items_widgets_separator', $widget_separator_label, 'responsive_footer_primary_row', 165 );

			// Widget Heading Font
			$widget_title_font_label = __( 'Heading Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'footer_primary_row_widget_heading_typography_group', $widget_title_font_label, 'responsive_footer_primary_row', 170, 'footer_primary_row_widget_heading_typography', true );

			// Widget Heading Color
			$footer_primary_row_widget_heading_color_label = __( 'Heading Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_primary_row_widget_heading', $footer_primary_row_widget_heading_color_label, 'responsive_footer_primary_row', 175, 'footer-text-color', null, '', 'refresh' );

			// Widget Content Font
			$widget_content_font_label = __( 'Content Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'footer_primary_row_widget_content_typography_group', $widget_content_font_label, 'responsive_footer_primary_row', 180, 'footer_primary_row_widget_content_typography', true );

			// Widget Content Color
			$widget_content_color_label  = __('Content Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'footer_primary_row_widget_content', $widget_content_color_label, 'responsive_footer_primary_row', 185, 'footer-text-color', null, '', 'refresh' );

			responsive_horizontal_separator_control($wp_customize, 'footer_primary_row_separator_widgets_1', 1, 'responsive_footer_primary_row', 186, 1, );

            // Link Style
			$footer_primary_row_link_style_label   = esc_html__( 'Link Style', 'responsive' );
			$footer_primary_row_link_style_choices = array(
				'standard'           => esc_html__( 'Standard (underline)', 'responsive' ),
				'color-underline'    => esc_html__( 'Highlight Underline', 'responsive' ),
				'no-underline'       => esc_html__( 'No Underline', 'responsive' ),
				'hover-background'   => esc_html__( 'Background on hover', 'responsive' ),
				'offset-background' => esc_html__( 'Offset Background', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_primary_link_style', $footer_primary_row_link_style_label, 'responsive_footer_primary_row', 187, $footer_primary_row_link_style_choices, Responsive\Core\get_responsive_customizer_defaults( 'footer_primary_link_style' ), null, 'refresh' );

			// Link Hover Background Color
			$footer_primary_row_link_hover_bg_label = esc_html__( 'Hover Background Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'footer_primary_link_hover_bg',
				$footer_primary_row_link_hover_bg_label,
				'responsive_footer_primary_row',
				188,
				Responsive\Core\get_responsive_customizer_defaults( 'footer_primary_link_hover_bg' ),
				'responsive_footer_primary_row_link_style_is_hover_background',
				'',
				false,
				null,
				null,
				false,
				null,
				null,
				'refresh'
			);

            $tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_footer_primary_row_bg_color',
				$tab_ids_prefix . 'responsive_footer_primary_border_head',
				$tab_ids_prefix . 'responsive_footer_primary_row_top_border_size',
				$tab_ids_prefix . 'responsive_footer_primary_row_border_color',
				$tab_ids_prefix . 'responsive_footer_primary_spacing_separator',
				$tab_ids_prefix . 'responsive_footer_primary_row_padding_padding',
				$tab_ids_prefix . 'responsive_footer_primary_row_margin_padding',
				$tab_ids_prefix . 'responsive_footer_primary_items_spacing_separator',
				$tab_ids_prefix . 'responsive_footer_primary_row_item_padding_padding',
				$tab_ids_prefix . 'responsive_footer_primary_column_border_head',
				$tab_ids_prefix . 'responsive_footer_primary_column_border_width',
				$tab_ids_prefix . 'responsive_footer_primary_column_border_color',
				$tab_ids_prefix . 'responsive_footer_primary_column_border_type',
				$tab_ids_prefix . 'responsive_footer_primary_top_border_type',
				$tab_ids_prefix . 'responsive_footer_primary_separator_9',
				$tab_ids_prefix . 'responsive_footer_primary_bottom_border_head',
				$tab_ids_prefix . 'responsive_footer_primary_row_bottom_border_size',
				$tab_ids_prefix . 'responsive_footer_primary_row_bottom_border_color',
				$tab_ids_prefix . 'responsive_footer_primary_bottom_border_type',
				$tab_ids_prefix . 'responsive_footer_primary_separator_10',
				$tab_ids_prefix . 'responsive_footer_primary_separator_11',
				$tab_ids_prefix . 'responsive_footer_primary_separator_12',
				$tab_ids_prefix . 'responsive_footer_primary_separator_13',
				$tab_ids_prefix . 'responsive_footer_primary_items_widgets_separator',
				$tab_ids_prefix . 'responsive_footer_primary_row_widget_heading_typography_group',
				$tab_ids_prefix . 'responsive_footer_primary_row_widget_heading_color',
				$tab_ids_prefix . 'responsive_footer_primary_row_widget_content_color',
				$tab_ids_prefix . 'responsive_footer_primary_row_widget_content_typography_group',
				$tab_ids_prefix . 'responsive_footer_primary_row_separator_widgets_1',
				$tab_ids_prefix . 'responsive_footer_primary_link_style',
				$tab_ids_prefix . 'responsive_footer_primary_link_hover_bg_color'

			);
            
			$general_tab_ids = array(
                $tab_ids_prefix . 'responsive_footer_primary_width',
				$tab_ids_prefix . 'responsive_footer_primary_design',
				$tab_ids_prefix . 'responsive_footer_primary_columns',
				$tab_ids_prefix . 'responsive_footer_primary_inner_elements_layout',
				$tab_ids_prefix . 'responsive_footer_primary_inner_column_spacing',
				$tab_ids_prefix . 'responsive_footer_primary_height',
				$tab_ids_prefix . 'responsive_footer_primary_vertical_alignment',
                $tab_ids_prefix . 'responsive_footer_primary_separator_2',
                $tab_ids_prefix . 'responsive_footer_primary_separator_3',
                $tab_ids_prefix . 'responsive_footer_primary_separator_5',
                $tab_ids_prefix . 'responsive_footer_primary_layout',
				$tab_ids_prefix . 'responsive_footer_primary_visibility_separator',
				$tab_ids_prefix . 'responsive_footer_primary_visibility',
			);
			responsive_tabs_button_control( $wp_customize, 'footer_primary_row_tabs', $tabs_label, 'responsive_footer_primary_row', 5, '', 'responsive_footer_primary_row_general_tab', 'responsive_footer_primary_row_design_tab', $general_tab_ids, $design_tab_ids, null );
        }
    }
}

return new Responsive_HFB_Footer_Primary_Row();