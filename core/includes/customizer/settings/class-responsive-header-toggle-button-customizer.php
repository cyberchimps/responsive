<?php
/**
 * Header Off Canvas Menu Customizer Options
 * 
 * @package Responsive Wordpress theme
 */
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_Header_Toggle_Button_Customizer' ) ) {
    /**
     * Header Toggle Button Customization Options
     */
    class Responsive_Header_Toggle_Button_Customizer {

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
                'responsive_header_toggle_button',
                array(
                    'title'       => __( 'Toggle Button', 'responsive' ),
                    'panel'         => 'responsive_header',
                    'priority'      => 25
                )
            );

            // Toggle Button Icon - General Tab 
            $toggle_button_icon_label = __( 'Icons', 'reponsive' );
            $toggle_button_icon_choices = array(
                'hamburger' => esc_html__( 'Hamburger', 'responsive' ),
                'hamburger_solid' => esc_html__( 'Hamburger Solid', 'responsive' ),
                'kebab' => esc_html__( 'Kebab', 'responsive' )
            ); 
            responsive_icon_radio_button_control( $wp_customize, 'header_toggle_button_icon', $toggle_button_icon_label, 'responsive_header_toggle_button', 10, $toggle_button_icon_choices, 'hamburger', null, 'svg' );

            // Toggle Button Style - General Tab
            $toggle_button_style_choices = array(
				'fill'  => esc_html__( 'Fill', 'responsive' ),
				'outline' => esc_html__( 'Outline', 'responsive' ),
                'minimal' => esc_html__( 'Minimal', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'header_toggle_button_style', __( 'Toggle Button Style', 'responsive' ), 'responsive_header_toggle_button', 15, $toggle_button_style_choices, 'fill', null );

            // Horizontal Separator - General Tab
            responsive_horizontal_separator_control( $wp_customize, 'header_toggle_button_style_separator', 1, 'responsive_header_toggle_button', 20, 1);

            // Menu Label - General Tab
            $wp_customize->add_setting(
				'responsive_header_toggle_button_menu_label',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_menu_label' ),
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				'responsive_header_toggle_button_menu_label',
				array(
					'label'    => __( 'Menu Label', 'responsive' ),
					'section'  => 'responsive_header_toggle_button',
					'settings' => 'responsive_header_toggle_button_menu_label',
					'type'     => 'text',
					'priority' => 25,
				)
			);

            // Design Tabs
            // Icon Color - Design Tab
            $header_toggle_button_icon_color_label = __( 'Icon Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_toggle_button_icon', $header_toggle_button_icon_color_label, 'responsive_header_toggle_button', 10, '#FFFFFF', );

            // Background Color - Design Tab
            $header_toggle_button_background_color_label = __( 'Background Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_toggle_button_background', $header_toggle_button_background_color_label, 'responsive_header_toggle_button', 15, '#2271B1', );

            // Horizontal Separator - Design Tab
            responsive_horizontal_separator_control( $wp_customize, 'header_toggle_button_background_color_separator', 1, 'responsive_header_toggle_button', 20, 1);
            
            // Border Radius - Design Tab
            $header_toggle_button_border_radius_label = __( 'Border Radius (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'header_toggle_button_border_radius', 'responsive_header_toggle_button', 30, 0, 0, null, $header_toggle_button_border_radius_label );
            
            // Font Size - Design Tab
            $header_toggle_button_font_size_label = __( 'Font Size (px)', 'responsive' );
            responsive_drag_number_control( $wp_customize, 'header_toggle_button_font_size', $header_toggle_button_font_size_label, 'responsive_header_toggle_button', 40, 14, null, 200, 1, 'postMessage' );

            // Spacing Separator - Design
            $off_canvas_menu_spacing_separator_label = __( 'Spacing', 'responsive' );
            responsive_separator_control( $wp_customize, 'header_toggle_button_spacing_separator', $off_canvas_menu_spacing_separator_label, 'responsive_header_toggle_button', 60);

            // Margin Label - Design Tab
            $off_canvas_menu_margin_label = __( 'Margin (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'header_toggle_button_margin', 'responsive_header_toggle_button', 70, 0, 0, null, $off_canvas_menu_margin_label );



            $tabs_label = esc_html__('Tabs', 'responsive' );
            $tab_ids_prefix = 'customize-control-';
            $design_tab_ids = array(
                $tab_ids_prefix . 'responsive_header_toggle_button_icon_color',
                $tab_ids_prefix . 'responsive_header_toggle_button_background_color',
                $tab_ids_prefix . 'responsive_header_toggle_button_background_color_separator',
                $tab_ids_prefix . 'responsive_header_toggle_button_border_radius_padding',
                $tab_ids_prefix . 'responsive_header_toggle_button_font_size',
                $tab_ids_prefix . 'responsive_header_toggle_button_spacing_separator',
                $tab_ids_prefix . 'responsive_header_toggle_button_margin_padding',

            ); 
            $general_tab_ids = array(
                $tab_ids_prefix . 'responsive_header_toggle_button_style',
                $tab_ids_prefix . 'responsive_header_toggle_button_style_separator',
                $tab_ids_prefix . 'responsive_header_toggle_button_menu_label',
                $tab_ids_prefix . 'responsive_header_toggle_button_icon'

                 
            );

            responsive_tabs_button_control( $wp_customize, 'header_toggle_button_tabs', $tabs_label, 'responsive_header_toggle_button', 5, '', 'responsive_header_toggle_button_general_tab', 'responsive_header_toggle_button_design_tab', $general_tab_ids, $design_tab_ids, null);


        }

    }
}

return new Responsive_Header_Toggle_Button_Customizer();