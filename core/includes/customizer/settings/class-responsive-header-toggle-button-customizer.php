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
            $toggle_button_icon_label = __( 'Icons', 'responsive' );
            $toggle_button_icon_choices = array(
                'hamburger' => esc_html__( 'Hamburger', 'responsive' ),
                'hamburger_solid' => esc_html__( 'Hamburger Solid', 'responsive' ),
                'kebab' => esc_html__( 'Kebab', 'responsive' )
            ); 
            responsive_icon_radio_button_control( $wp_customize, 'header_toggle_button_icon', $toggle_button_icon_label, 'responsive_header_toggle_button', 10, $toggle_button_icon_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon' ), null, 'svg' );

            // Toggle Button Style - General Tab
            $toggle_button_style_choices = array(
				'fill'  => esc_html__( 'Fill', 'responsive' ),
				'outline' => esc_html__( 'Outline', 'responsive' ),
                'minimal' => esc_html__( 'Minimal', 'responsive' ),
			);

            $wp_customize->add_control(
                new Responsive_Customizer_Select_Button_Control(
                    $wp_customize,
                    'responsive_header_toggle_button_style' ,
                    array(
                        'label'           => __( 'Toggle Button Style', 'responsive' ),
                        'description'     => '',
                        'section'         => 'responsive_header_toggle_button',
                        'settings'        => 'responsive_mobile_menu_toggle_style',
                        'priority'        => 15,
                        'active_callback' => null,
                        'choices'         => apply_filters( 'responsive_toggle_button_style' . '_choices', $toggle_button_style_choices ),
                    )
                )
            );
            // Horizontal Separator - General Tab
            responsive_horizontal_separator_control( $wp_customize, 'header_toggle_button_style_separator', 1, 'responsive_header_toggle_button', 20, 1);

            // Menu Label - General Tab
            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize, 
                    'responsive_hamburger_menu_label_text_toggle_button',
                    array(
                        'active_callback' => null,
                        'label'           => __( 'Mobile Menu Label', 'responsive' ),
                        'priority'        => 25,
                        'section'         => 'responsive_header_toggle_button',
                        'settings'        => 'responsive_hamburger_menu_label_text', 
                        'type'            => 'text', 
                        'transport'       => 'refresh'
                    )
                )
                    );

            // Design Tabs
            // Icon Color - Design Tab
            $header_toggle_button_icon_color_label = __( 'Icon Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_toggle_button_icon', $header_toggle_button_icon_color_label, 'responsive_header_toggle_button', 10, Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon_color' ), null, '', false, null, null, false, null, null, 'color' );
            
            // Border Width - Design Tab
            $mobile_header_toggle_button_border_width_label = __( 'Border Width (px)', 'responsive' );
			responsive_borderwidth_control( $wp_customize, 'mobile_menu_toggle_border_width', 'responsive_header_toggle_button', 11, Responsive\Core\get_responsive_customizer_defaults( 'mobile_menu_toggle_border_width' ) ,  Responsive\Core\get_responsive_customizer_defaults( 'mobile_menu_toggle_border_width' ), null, $mobile_header_toggle_button_border_width_label,'postMessage' );

            // Border Color - Design Tab
            $header_toggle_button_border_color_label = __( 'Border Color', 'responsive' );
            responsive_color_control( $wp_customize, 'mobile_menu_toggle_border', $header_toggle_button_border_color_label, 'responsive_header_toggle_button', 12, Responsive\Core\get_responsive_customizer_defaults( 'mobile_menu_toggle_border_color' ) );

            // Background Color - Design Tab
            $header_toggle_button_background_color_label = __( 'Background Color', 'responsive' );
            responsive_color_control( $wp_customize, 'header_menu_toggle_background', $header_toggle_button_background_color_label, 'responsive_header_toggle_button', 15, Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ) );

            // Horizontal Separator - Design Tab
            responsive_horizontal_separator_control( $wp_customize, 'header_toggle_button_background_color_separator', 1, 'responsive_header_toggle_button', 20, 1);
            
            // Icon Size - Design Tab
            responsive_drag_number_control( $wp_customize, 'header_toggle_button_icon_size', __( 'Icon Size', 'responsive'), 'responsive_header_toggle_button', 22, 25, null, 100, 0, 'refresh');

            // Border Radius - Design Tab
            $header_toggle_button_border_radius_label = __( 'Border Radius (px)', 'responsive' );
            responsive_padding_control( $wp_customize, 'header_toggle_button_border_radius', 'responsive_header_toggle_button', 30, 0, 0, null, $header_toggle_button_border_radius_label );
            
            // Font Size - Design Tab
            $header_toggle_button_font_size_label = __( 'Font Size (px)', 'responsive' );
            $wp_customize->add_control(
                new Responsive_Customizer_Range_Control(
                    $wp_customize, 
                    'responsive_hamburger_menu_label_font_size_toggle_button',
                    array(
                        'label'     => $header_toggle_button_font_size_label,
                        'section'   => 'responsive_header_toggle_button',
                        'settings'  => 'responsive_hamburger_menu_label_font_size', 
                        'priority'  => 40, 
                        'active_callback' => null, 
                        'input_attrs'     => array(
                            'min' => 0, 
                            'max' => 200, 
                            'step' => 1
                        )
                    )
                )
                        );

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
                $tab_ids_prefix . 'responsive_header_menu_toggle_background_color',
                $tab_ids_prefix . 'responsive_header_toggle_button_background_color_separator',
                $tab_ids_prefix . 'responsive_header_toggle_button_border_radius_padding',
                $tab_ids_prefix . 'responsive_hamburger_menu_label_font_size_toggle_button',
                $tab_ids_prefix . 'responsive_header_toggle_button_spacing_separator',
                $tab_ids_prefix . 'responsive_header_toggle_button_margin_padding',
                $tab_ids_prefix . 'responsive_header_toggle_button_icon_size',
                $tab_ids_prefix . 'responsive_mobile_menu_toggle_border_color',
                $tab_ids_prefix . 'responsive_mobile_menu_toggle_border_width_border',
            ); 

            $general_tab_ids = array(
                $tab_ids_prefix . 'responsive_header_toggle_button_style',
                $tab_ids_prefix . 'responsive_header_toggle_button_style_separator',
                $tab_ids_prefix . 'responsive_hamburger_menu_label_text_toggle_button',
                $tab_ids_prefix . 'responsive_header_toggle_button_icon'
            );

            responsive_tabs_button_control( $wp_customize, 'header_toggle_button_tabs', $tabs_label, 'responsive_header_toggle_button', 5, '', 'responsive_header_toggle_button_general_tab', 'responsive_header_toggle_button_design_tab', $general_tab_ids, $design_tab_ids, null);


        }

    }
}

return new Responsive_Header_Toggle_Button_Customizer();