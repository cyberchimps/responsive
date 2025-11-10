<?php 
/**
 * Header Off Canvas Customization Options
 * 
 * @package Responsive Theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_HFB_Mobile_Header_Off_Canvas' ) ) {
    /**
     * Header Off Canvas Customization Options 
     */
    class Responsive_HFB_Mobile_Header_Off_Canvas {

        /**
         * Constructor 
         * 
         * @since 6.2.9
         */
        public function __construct() {
            
            add_action('customize_register', array( $this, 'customizer_options' ) );
        
        }

        /**
         * Customizer Options
         * 
         * @param object $wp_customize Wordpress customization option
         * @since 6.2.9
         */
        public function customizer_options( $wp_customize ) {

            $wp_customize->add_section(
                'responsive_header_mobile_off_canvas',
                array(
                    'title'        => __( 'Mobile Off Canvas', 'responsive' ),
                    'panel'         => 'responsive_header',
                    'priority'      => 70,
                )
            );

            // Header Type : Flyout, Full-Screen, Dropdown
            $header_off_canvas_header_type_label = __('Header Type', 'responsive' );
            $header_off_canvas_header_type_choices = array(
                'dropdown'      => esc_html__( 'Dropdown', 'responsive' ),
                'fullscreen'   => esc_html__( 'Full-Screen', 'responsive' ),
                'sidebar'        => esc_html__( 'Flyout', 'responsive' ),
            );

            responsive_select_button_control( $wp_customize, 'mobile_menu_style', $header_off_canvas_header_type_label, 'responsive_header_mobile_off_canvas', 10, $header_off_canvas_header_type_choices, 'dropdown', null );

            // Horizontal Separator
            responsive_horizontal_separator_control( $wp_customize, 'header_mobile_off_canvas_header_type_horizontal_separator', 1, 'responsive_header_mobile_off_canvas', 11, 1, );

            // Move Body - Should appear only when Dropdown is selected above
            $header_off_canvas_move_body_label = __( 'Move Body', 'responsive' );
            responsive_toggle_control( $wp_customize, 'header_mobile_off_canvas_move_body', $header_off_canvas_move_body_label, 'responsive_header_mobile_off_canvas', 12, 0, null,'refresh', 'Note: Enable to shift the body content when the off canvas menu opens. This is not applicable on Transparent and Sticky Headers!');

            // Horizontal Separator
            responsive_horizontal_separator_control( $wp_customize, 'header_mobile_off_canvas_move_body_horizontal_separator', 1, 'responsive_header_mobile_off_canvas', 13, 1, );

            // Dropdown Target
            $header_off_canvas_dropdown_target_label = __('Dropdown Target', 'responsive'); 
            $header_off_canvas_dropdown_target_choices = array(
                'icon'    => esc_html__( 'Icon Text', 'responsive' ),
                'link'      => esc_html__( 'Link', 'responsive' ),
            );
            responsive_select_button_control( $wp_customize, 'header_mobile_off_canvas_dropdown_target', $header_off_canvas_dropdown_target_label, 'responsive_header_mobile_off_canvas', 15, $header_off_canvas_dropdown_target_choices, 'icon', null, 'postMessage' );

            // Horizontal Separator
            responsive_horizontal_separator_control( $wp_customize, 'header_mobile_off_canvas_dropdown_target_horizontal_separator', 1, 'responsive_header_mobile_off_canvas', 16, 1, );

            // Content Alignment 
            $header_off_canvas_content_alignment_label = __('Content Alignment', 'responsive' );
            $header_off_canvas_content_alignment_choices = array(
                'left'      => esc_html__( 'Left', 'responsive' ),
                'center'    => esc_html__( 'Center', 'responsive' ),
                'right'     => esc_html__( 'Right', 'responsive' ),
            );
            responsive_select_button_control( $wp_customize, 'header_mobile_off_canvas_content_alignment', $header_off_canvas_content_alignment_label, 'responsive_header_mobile_off_canvas', 20, $header_off_canvas_content_alignment_choices, 'left', null, 'refresh' );

            // Background Color - Design Tab 
            $mobile_menu_background_color_label = __( 'Mobile Menu Background Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_mobile_menu_background', $mobile_menu_background_color_label, 'responsive_header_mobile_off_canvas', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ) );
            
            // Inner Element Spacing - Design Tab
            responsive_drag_number_control( $wp_customize, 'header_mobile_off_canvas_inner_element_spacing', __( 'Inner Element Spacing', 'responsive' ), 'responsive_header_mobile_off_canvas', 15, 255, null, 500, 1, 'postMessage' );

            $tabs_label = esc_html__('Tabs', 'responsive' );
            $tab_ids_prefix = 'customize-control-';
            $design_tab_ids = array(
                $tab_ids_prefix . 'responsive_header_mobile_menu_background_color',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_inner_element_spacing',
            ); 
            $general_tab_ids = array(
                $tab_ids_prefix . 'responsive_mobile_menu_style',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_dropdown_target',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_content_alignment',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_move_body',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_header_type_horizontal_separator',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_move_body_horizontal_separator',
                $tab_ids_prefix . 'responsive_header_mobile_off_canvas_dropdown_target_horizontal_separator'
            );
            responsive_tabs_button_control( $wp_customize, 'header_mobile_off_canvas_tabs', $tabs_label, 'responsive_header_mobile_off_canvas', 5, '', 'responsive_header_mobile_off_canvas_general_tab', 'responsive_header_mobile_off_canvas_design_tab', $general_tab_ids, $design_tab_ids, null);
            
        }
        

    }
}

return new Responsive_HFB_Mobile_Header_Off_Canvas();