<?php
/**
 * Footer Below Row Customization Options
 * 
 * @package Responsive Theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_HFB_Footer_Below_Row' ) ) {
    /**
     * Footer Below Row Customization Options
     */
    class Responsive_HFB_Footer_Below_Row {

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
                'responsive_footer_below_row',
                array(
                    'title'         => __( 'Below Footer', 'responsive' ),
                    'panel'         => 'responsive_footer',
                    'priority'      => 40,
                )
            );

            // Below Footer Width.
			$footer_below_row_width_label = esc_html__( 'Width', 'responsive' );
			$footer_below_row_width_choices   = array(
				'fullwidth' => esc_html__( 'Full Width', 'responsive' ),
				'contained'  => esc_html__( 'Contained', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_below_width', $footer_below_row_width_label, 'responsive_footer_below_row', 10, $footer_below_row_width_choices, 'contained', null, 'postMessage' );

            responsive_horizontal_separator_control($wp_customize, 'footer_below_separator_1', 2, 'responsive_footer_below_row', 15, 1, );

            // Design.
			$design_separator_label = __( 'Design', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_below_design', $design_separator_label, 'responsive_footer_below_row', 18 );

            // Below Footer Columns.
			$footer_below_row_columns_label = esc_html__( 'Columns', 'responsive' );
			$footer_below_row_columns_choices   = array(
				1 => esc_html__( '1', 'responsive' ),
				2 => esc_html__( '2', 'responsive' ),
				3 => esc_html__( '3', 'responsive' ),
				4 => esc_html__( '4', 'responsive' ),
				5 => esc_html__( '5', 'responsive' ),
				6 => esc_html__( '6', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_below_columns', $footer_below_row_columns_label, 'responsive_footer_below_row', 20, $footer_below_row_columns_choices, '1', null, 'postMessage' );

            responsive_horizontal_separator_control($wp_customize, 'footer_below_separator_2', 1, 'responsive_footer_below_row', 25, 1, );

			// Layout.
			$layout_separator_label = __( 'Layout', 'responsive' );
			responsive_builder_row_layout_control( $wp_customize, 'footer_below_layout',$layout_separator_label, 'responsive_footer_below_row', 30, 'full', array( 'footer' => 'below', 'rspv_event' => 'footer_items' ), null );

			responsive_horizontal_separator_control($wp_customize, 'footer_below_separator_5', 1, 'responsive_footer_below_row', 35, 1, );

            // Inner Elements Layout.
			$inner_elements_layout_label = esc_html__( 'Inner Elements Layout', 'responsive' );
			$inner_elements_layout_choices   = array(
				'stack'  => esc_html__( 'Stack', 'responsive' ),
				'inline' => esc_html__( 'Inline', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_below_inner_elements_layout', $inner_elements_layout_label, 'responsive_footer_below_row', 40, $inner_elements_layout_choices, 'inline', null, 'postMessage' );

            // Inner Column Spacing (px).
			$inner_column_spacing_label = __( 'Inner Column Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_below_inner_column_spacing', $inner_column_spacing_label, 'responsive_footer_below_row', 50, 30, null, 300, 0, 'postMessage', 1 );

            // Height.
			$row_height_label = __( 'Footer Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_below_height', $row_height_label, 'responsive_footer_below_row', 60, 30, null, 600, 0, 'postMessage', 1 );

            responsive_horizontal_separator_control($wp_customize, 'footer_below_separator_3', 1, 'responsive_footer_below_row', 65, 1, );

            // Vertical Alignment.
			$vertical_alignment_label = esc_html__( 'Vertical Alignment', 'responsive' );
			$vertical_alignment_choices   = array(
				'flex-start' => esc_html__( 'Top', 'responsive' ),
				'center'     => esc_html__( 'Middle', 'responsive' ),
				'flex-end'   => esc_html__( 'Bottom', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'footer_below_vertical_alignment', $vertical_alignment_label, 'responsive_footer_below_row', 70, $vertical_alignment_choices, 'flex-start', null, 'postMessage' );

            
            // Background Color.
			$footer_below_row_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_below_row_bg', $footer_below_row_color_label, 'responsive_footer_below_row', 80, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_below_row_bg_color' ), null, '' );
            
            responsive_horizontal_separator_control($wp_customize, 'footer_below_separator_4', 2, 'responsive_footer_below_row', 85, 1, );

            // Border.
			$border_head_label = __( 'Border', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_below_border_head', $border_head_label, 'responsive_footer_below_row', 90 );
            
            // Top Border Size.
            $footer_below_row_top_border_size_label = __( 'Top Border Size (px)', 'responsive' );
            responsive_drag_number_control( $wp_customize, 'footer_below_row_top_border_size', $footer_below_row_top_border_size_label, 'responsive_footer_below_row', 100, 0, null, 300, 0, 'postMessage', 1 );

            // Border Color.
			$footer_below_row_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_below_row_border', $footer_below_row_border_color_label, 'responsive_footer_below_row', 110, Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_below_row_border_color' ), null, '' );

            // Spacing.
			$spacing_separator_label = __( 'Row Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_below_spacing_separator', $spacing_separator_label, 'responsive_footer_below_row', 120 );

            // Padding.
			$footer_below_row_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_below_row_padding', 'responsive_footer_below_row', 130, 20, 0, null, $footer_below_row_padding_label );
            
            // Margin.
			$footer_below_row_margin_label = esc_html__( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_below_row_margin', 'responsive_footer_below_row', 140, 0, 0, null, $footer_below_row_margin_label );

			// Spacing.
			$items_spacing_separator_label = __( 'Row Items Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_below_items_spacing_separator', $items_spacing_separator_label, 'responsive_footer_below_row', 150 );

			// Padding.
			$footer_below_row_items_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_below_row_item_padding', 'responsive_footer_below_row', 160, 0, 0, null, $footer_below_row_items_padding_label );

            $tabs_label     = esc_html__( 'Tabs', 'responsive' );
			$tab_ids_prefix = 'customize-control-';
			$design_tab_ids = array(
				$tab_ids_prefix . 'responsive_footer_below_row_bg_color',
				$tab_ids_prefix . 'responsive_footer_below_border_head',
				$tab_ids_prefix . 'responsive_footer_below_row_top_border_size',
				$tab_ids_prefix . 'responsive_footer_below_row_border_color',
				$tab_ids_prefix . 'responsive_footer_below_spacing_separator',
				$tab_ids_prefix . 'responsive_footer_below_row_padding_padding',
				$tab_ids_prefix . 'responsive_footer_below_row_margin_padding',
				$tab_ids_prefix . 'responsive_footer_below_separator_4',
				$tab_ids_prefix . 'responsive_footer_below_items_spacing_separator',
				$tab_ids_prefix . 'responsive_footer_below_row_item_padding_padding',
			);
            
			$general_tab_ids = array(
                $tab_ids_prefix . 'responsive_footer_below_width',
				$tab_ids_prefix . 'responsive_footer_below_design',
				$tab_ids_prefix . 'responsive_footer_below_columns',
				$tab_ids_prefix . 'responsive_footer_below_inner_elements_layout',
				$tab_ids_prefix . 'responsive_footer_below_inner_column_spacing',
				$tab_ids_prefix . 'responsive_footer_below_height',
				$tab_ids_prefix . 'responsive_footer_below_vertical_alignment',
                $tab_ids_prefix . 'responsive_footer_below_separator_1',
                $tab_ids_prefix . 'responsive_footer_below_separator_2',
                $tab_ids_prefix . 'responsive_footer_below_separator_3',
                $tab_ids_prefix . 'responsive_footer_below_separator_5',
                $tab_ids_prefix . 'responsive_footer_below_layout',
			);
			responsive_tabs_button_control( $wp_customize, 'footer_below_row_tabs', $tabs_label, 'responsive_footer_below_row', 5, '', 'responsive_footer_below_row_general_tab', 'responsive_footer_below_row_design_tab', $general_tab_ids, $design_tab_ids, null );
        }
    }
}

return new Responsive_HFB_Footer_Below_Row();