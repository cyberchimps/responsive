<?php
/**
 * Header Off Canvas Menu Customizer Options
 * 
 * @package Responsive Wordpress theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_Header_Off_Canvas_Menu_Layouts_Customizer' ) ) {
    /**
     * Header Off Canvas Menu Customization Options 
     */
    class Responsive_Header_Off_Canvas_Menu_Layouts_Customizer {

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

            /**
             * Menu Layouts
             */
            $wp_customize->add_section(
                'responsive_header_off_canvas_menu_layout',
                array(
                    'title'       => __( 'Off Canvas Menu', 'responsive' ),
                    'panel'         => 'responsive_header',
                    'priority'      => 25
                )
            );

            // Redirection button to configure off canvas menu - General Tab
            $configure_off_canvas_menu_redirect_label = __( 'Configure Off Canvas Menu', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_off_canvas_menu_set_location', $configure_off_canvas_menu_redirect_label, 'responsive_header_off_canvas_menu_layout', 10, 'control', 'nav_menu_locations[off-canvas-menu]');

            // Horizontal Separator - General Tab
            responsive_horizontal_separator_control( $wp_customize, 'header_off_canvas_menu_layout_separator',  1, 'responsive_header_off_canvas_menu_layout', 15, 1);

            // Items Divider - A horizontal line appearing after each menu item in the off canvas - General Tab
            $off_canvas_menu_items_divider_label = __( 'Items Divider', 'responsive' );
            responsive_toggle_control( $wp_customize, 'header_off_canvas_menu_items_divider', $off_canvas_menu_items_divider_label, 'responsive_header_off_canvas_menu_layout', 20, 1, null, 'refresh' );

            // Horizontal Separator - General Tab
            responsive_horizontal_separator_control( $wp_customize, 'header_off_canvas_menu_items_divider_separator', 1, 'responsive_header_off_canvas_menu_layout', 25, 1);

            // Visibility - General Tab
            $off_canvas_visibility_label = __( 'Visibility', 'responsive' );
            $off_canvas_visibility_choices = array(
                'desktop'   => esc_html__( 'dashicons-desktop', 'responsive' ),
                'tablet'    => esc_html__( 'dashicons-tablet', 'responsive' ),
                'mobile'    => esc_html__( 'dashicons-smartphone', 'responsive' ),
            );
			responsive_multi_select_button_control($wp_customize, 'header_off_canvas_menu_visibility', $off_canvas_visibility_label, 'responsive_header_off_canvas_menu_layout', 30, $off_canvas_visibility_choices, array('desktop','tablet','mobile'), null, 'refresh');

            // Design Tabs
            // Menu Color Separator
            $off_canvas_menu_color_separator_label = __( 'Menu Color', 'responsive' );
            responsive_separator_control( $wp_customize, 'header_off_canvas_menu_color_separator', $off_canvas_menu_color_separator_label, 'responsive_header_off_canvas_menu_layout', 10);

            // Link Default Color - Design Tab
            $off_canvas_menu_link_default_color_label = __( 'Link Default Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_link_default', $off_canvas_menu_link_default_color_label, 'responsive_header_off_canvas_menu_layout', 15, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) );

            // Link Hover - Design Tab
            $off_canvas_menu_link_hover_label = __( 'Link Hover', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_link_hover', $off_canvas_menu_link_hover_label, 'responsive_header_off_canvas_menu_layout', 20, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) );

            // Link Active - Design Tab
            $off_canvas_menu_link_active_label = __( 'Link Active', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_link_active', $off_canvas_menu_link_active_label, 'responsive_header_off_canvas_menu_layout', 25, '#000000', );

            // Background Default - Design Tab
            $off_canvas_menu_bg_default_label = __( 'Background Default', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_bg_default', $off_canvas_menu_bg_default_label, 'responsive_header_off_canvas_menu_layout', 30, Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ) );

            // Background Hover - Design Tab
            $off_canvas_menu_bg_hover_label = __( 'Background Hover', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_bg_hover', $off_canvas_menu_bg_hover_label, 'responsive_header_off_canvas_menu_layout', 35, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) );

            // Background Active - Design Tab
            $off_canvas_bg_active_label = __( 'Background Active', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_bg_active', $off_canvas_bg_active_label, 'responsive_header_off_canvas_menu_layout', 40, Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) );

            // Font Separator - Design
            $off_canvas_menu_font_separator_label = __( 'Font', 'responsive' );
            responsive_separator_control( $wp_customize, 'header_off_canvas_menu_font_separator', $off_canvas_menu_font_separator_label, 'responsive_header_off_canvas_menu_layout', 50);

            // Menu Font Typography - Design
			$off_canvas_menu_typography_label = esc_html__( 'Menu Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_off_canvas_menu_typography_group', $off_canvas_menu_typography_label, 'responsive_header_off_canvas_menu_layout', 55, 'header_off_canvas_menu_typography', true );

            // Spacing Separator - Design
            $off_canvas_menu_spacing_separator_label = __( 'Spacing', 'responsive' );
            responsive_separator_control( $wp_customize, 'header_off_canvas_menu_spacing_separator', $off_canvas_menu_spacing_separator_label, 'responsive_header_off_canvas_menu_layout', 60);

            // Menu Spacing (Padding) - Design Tab
            $off_canvas_menu_spacing_label = __( 'Menu Spacing (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'header_off_canvas_menu_spacing', 'responsive_header_off_canvas_menu_layout', 65, 10, 18, null, $off_canvas_menu_spacing_label );

            // Margin Label - Design Tab
            $off_canvas_menu_margin_label = __( 'Margin (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'header_off_canvas_menu_margin', 'responsive_header_off_canvas_menu_layout', 70, 0, 0, null, $off_canvas_menu_margin_label );


            // Item Divider Separator - Design
            $off_canvas_menu_item_divider_separator_label = __( 'Item Divider', 'responsive' );
            responsive_separator_control( $wp_customize, 'header_off_canvas_menu_item_divider_separator', $off_canvas_menu_item_divider_separator_label, 'responsive_header_off_canvas_menu_layout', 75);

            // Item Divider Size - Design Tab
            $off_canvas_menu_item_divider_size_label = __( 'Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_off_canvas_menu_item_divider_size', $off_canvas_menu_item_divider_size_label, 'responsive_header_off_canvas_menu_layout', 80, 1, null, 5 );

            // Item Divider Color - Design Tab
            $off_canvas_menu_item_divider_color_label = __( 'Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_off_canvas_menu_item_divider_color', $off_canvas_menu_item_divider_color_label, 'responsive_header_off_canvas_menu_layout', 85, Responsive\Core\get_responsive_customizer_defaults( 'header_off_canvas_menu_item_divider_color' ) );


            $tabs_label = esc_html__('Tabs', 'responsive' );
            $tab_ids_prefix = 'customize-control-';
            $design_tab_ids = array(
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_color_separator',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_link_default_color',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_link_hover_color',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_link_active_color',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_bg_default_color',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_bg_active_color',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_bg_hover_color',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_font_separator',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_typography_group',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_spacing_separator',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_spacing_padding',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_margin_padding',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_item_divider_separator',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_item_divider_size',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_item_divider_color_color',
            ); 
            $general_tab_ids = array(
                $tab_ids_prefix . 'responsive_redirect_to_off_canvas_menu_set_location',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_layout_separator',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_items_divider',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_items_divider_separator',
                $tab_ids_prefix . 'responsive_header_off_canvas_menu_visibility'    
            );

            responsive_tabs_button_control( $wp_customize, 'header_off_canvas_menu_layout_tabs', $tabs_label, 'responsive_header_off_canvas_menu_layout', 5, '', 'responsive_header_off_canvas_menu_layout_general_tab', 'responsive_header_off_canvas_menu_layout_design_tab', $general_tab_ids, $design_tab_ids, null);
            


        }

    }
}

return new Responsive_Header_Off_Canvas_Menu_Layouts_Customizer();