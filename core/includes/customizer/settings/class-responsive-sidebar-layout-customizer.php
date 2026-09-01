<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! class_exists('Responsive_Sidebar_Layout_Customizer')) :
    /**
     * Theme Options Customizer Options
     */
    class Responsive_Sidebar_Layout_Customizer
    {
        /**
         * Setup class.
         *
         * @since 1.0
         */
        public function __construct()
        {

            add_action('customize_register', array( $this, 'customizer_options' ));

        }

        /**
         * Customizer options
         *
         * @since 0.2
         *
         * @param  object $wp_customize WordPress customization option.
         */
        public function customizer_options($wp_customize)
        {
            $general_tab_ids_prefix = 'customize-control-';
            $general_tab_ids = array(
                $general_tab_ids_prefix . 'responsive_sidebar_separator', 
                $general_tab_ids_prefix . 'responsive_default_sidebar_position',
                $general_tab_ids_prefix . 'responsive_default_sidebar_position_separator',
                $general_tab_ids_prefix . 'responsive_sidebar_style',
                $general_tab_ids_prefix . 'responsive_sidebar_style_separator',
                $general_tab_ids_prefix . 'responsive_default_sidebar_width',
                $general_tab_ids_prefix . 'responsive_default_sidebar_width_separator',
                $general_tab_ids_prefix . 'responsive_sidebar_sticky'
            ); 

            $design_tab_ids_prefix = 'customize-control-'; 
            $design_tab_ids = array(
                $design_tab_ids_prefix . 'responsive_sidebar_background_color', 
                $design_tab_ids_prefix . 'responsive_sidebar_headings_color', 
                $design_tab_ids_prefix . 'responsive_sidebar_text_color',
                $design_tab_ids_prefix . 'responsive_sidebar_link_color',
                $design_tab_ids_prefix . 'responsive_sidebar_background_image', 
                $design_tab_ids_prefix . 'responsive_sidebar_typography_group',
                $design_tab_ids_prefix . 'responsive_sidebar_background_separator', 
                $design_tab_ids_prefix . 'responsive_sidebar_headings_separator', 
                $design_tab_ids_prefix . 'responsive_sidebar_text_separator', 
                $design_tab_ids_prefix . 'responsive_sidebar_link_separator', 
                $design_tab_ids_prefix . 'responsive_sidebar_typography_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_link_style_before_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_link_style',
                $design_tab_ids_prefix . 'responsive_sidebar_link_hover_bg_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_link_hover_bg_color',
                $design_tab_ids_prefix . 'responsive_sidebar_link_style_after_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_spacing',
                $design_tab_ids_prefix . 'responsive_sidebar_outside_container_padding', 
                $design_tab_ids_prefix . 'responsive_sidebar_inside_container_padding',
                $design_tab_ids_prefix . 'responsive_widget_bottom_spacing',
                $design_tab_ids_prefix . 'responsive_sidebar_border_divider_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_border_divider_style',
                $design_tab_ids_prefix . 'responsive_sidebar_border_divider_width',
                $design_tab_ids_prefix . 'responsive_sidebar_border_divider_color'
            ); 

            $tabs_label            = esc_html__( 'Tabs', 'responsive' );
            responsive_tabs_button_control( $wp_customize, 'sidebar_tabs', $tabs_label, 'responsive_sidebar', 1, '', 'responsive_sidebar_general_tab', 'responsive_sidebar_design_tab', $general_tab_ids, $design_tab_ids, null );

			$shop_sidebar_heading = esc_html__( 'Global Sidebar', 'responsive' );
			responsive_separator_control( $wp_customize, 'sidebar_separator', $shop_sidebar_heading, 'responsive_sidebar', 5);

            $default_sidebar_label   = esc_html__( 'Sidebar Position', 'responsive' );
            $default_sidebar_choices = array(
                'left'  => esc_html__( 'Left', 'responsive' ),
                'right' => esc_html__( 'Right', 'responsive' ),
                'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			);

            if ( is_rtl() ) {
				$default_sidebar_choices = array(
                    'left'  => esc_html__( 'Left', 'responsive' ),
					'right' => esc_html__( 'Right', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				);
			}
            
            responsive_imageradio_button_control( $wp_customize, 'default_sidebar_position', $default_sidebar_label, 'responsive_sidebar', 10, $default_sidebar_choices, 'no', null, 'svg');

            responsive_horizontal_separator_control( $wp_customize, 'default_sidebar_position_separator', 1, 'responsive_sidebar', 12, 1 );

            $sidebar_style_label  = __( 'Sidebar Style', 'responsive' );
            $sidebar_style_choice = array(
                'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
                'boxed'   => esc_html__( 'Boxed', 'responsive' ),
            );
            responsive_select_button_control( $wp_customize, 'sidebar_style', $sidebar_style_label, 'responsive_sidebar', 15, $sidebar_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_style' ), null, 'postMessage' );

            responsive_horizontal_separator_control( $wp_customize, 'sidebar_style_separator', 1, 'responsive_sidebar', 20, 1 );

            $default_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control( $wp_customize, 'default_sidebar_width',$default_sidebar_width_label, 'responsive_sidebar', 45, 30, null , 50, 15,'postMessage');

            responsive_horizontal_separator_control( $wp_customize, 'default_sidebar_width_separator', 1, 'responsive_sidebar', 46, 1 );

            responsive_toggle_control(
                $wp_customize,
                'sidebar_sticky',
                esc_html__( 'Sticky Sidebar', 'responsive' ),
                'responsive_sidebar',
                48,
                Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_sticky' ),
                null,
                'postMessage'
            );


            responsive_horizontal_separator_control($wp_customize, 'sidebar_typography_separator', 1, 'responsive_sidebar', 58, 1, );

            /**
             * Entry Elements.
             */
            $sidebar_typography_label = esc_html__('Sidebar Font', 'responsive');
            responsive_typography_group_control($wp_customize, 'sidebar_typography_group', $sidebar_typography_label, 'responsive_sidebar', 60, 'sidebar_typography');

            responsive_horizontal_separator_control($wp_customize, 'sidebar_link_style_before_separator', 1, 'responsive_sidebar', 61, 1);

            $sidebar_link_style_label   = __( 'Sidebar Link Style', 'responsive' );
            $sidebar_link_style_choices = array(
                'standard'           => esc_html__( 'Standard (underline)', 'responsive' ),
                'color-underline'    => esc_html__( 'Highlight Underline', 'responsive' ),
                'no-underline'       => esc_html__( 'No Underline', 'responsive' ),
                'hover-background'   => esc_html__( 'Background on hover', 'responsive' ),
                'offset-background'  => esc_html__( 'Offset Background', 'responsive' ),
            );
            responsive_select_control(
                $wp_customize,
                'sidebar_link_style',
                $sidebar_link_style_label,
                'responsive_sidebar',
                62,
                $sidebar_link_style_choices,
                Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_link_style' ),
                null,
                'refresh'
            );

            // Separator for Sidebar Link Hover Background Color (only active when sidebar_link_style === 'hover-background')
            responsive_horizontal_separator_control( $wp_customize, 'sidebar_link_hover_bg_separator', 1, 'responsive_sidebar', 62.5, 1, 'responsive_sidebar_link_style_is_hover_background' );

            // Sidebar Link Hover Background Color
            $sidebar_link_hover_bg_label = esc_html__( 'Hover Background Color', 'responsive' );
            responsive_color_control(
                $wp_customize,
                'sidebar_link_hover_bg',
                $sidebar_link_hover_bg_label,
                'responsive_sidebar',
                63,
                Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_link_hover_bg_color' ),
                'responsive_sidebar_link_style_is_hover_background',
                '',
                false,
                null,
                null,
                false,
                null,
                null,
                'color',
                'refresh'
            );

            responsive_horizontal_separator_control($wp_customize, 'sidebar_link_style_after_separator', 1, 'responsive_sidebar', 64, 1);

            responsive_drag_number_control_with_switchers(
                $wp_customize,
                'widget_bottom_spacing',
                esc_html__('Widget Bottom Spacing', 'responsive'),
                'responsive_sidebar',
                65,
                30,
                null,
                200,
                0,
                'postMessage',
                1,
                '',
                '',
                array( 'desktop', 'tablet', 'mobile' ),
                array( 'px', 'em', 'rem' )
            );

            responsive_horizontal_separator_control(
                $wp_customize,
                'sidebar_border_divider_separator',
                1,
                'responsive_sidebar',
                65.5,
                1,
                null
            );

            $border_divider_styles = array(
                'none'   => esc_html__( 'None', 'responsive' ),
                'solid'  => esc_html__( 'Solid', 'responsive' ),
                'dashed' => esc_html__( 'Dashed', 'responsive' ),
                'dotted' => esc_html__( 'Dotted', 'responsive' ),
                'double' => esc_html__( 'Double', 'responsive' ),
            );
            responsive_select_button_control(
                $wp_customize,
                'sidebar_border_divider_style',
                __( 'Divider Style', 'responsive' ),
                'responsive_sidebar',
                66,
                $border_divider_styles,
                Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_border_divider_style' ),
                null,
                'postMessage'
            );

            responsive_drag_number_control_with_switchers(
                $wp_customize,
                'sidebar_border_divider_width',
                esc_html__( 'Divider Width', 'responsive' ),
                'responsive_sidebar',
                67,
                0,
                null,
                20,
                0,
                'postMessage',
                1,
                '',
                '',
                array( 'desktop', 'tablet', 'mobile' ),
                array( 'px', 'em', 'rem' )
            );

            responsive_color_control(
                $wp_customize,
                'sidebar_border_divider',
                __( 'Divider Color', 'responsive' ),
                'responsive_sidebar',
                68,
                Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_border_divider_color' ),
                null
            );

            // Page Sidebar Sub-Heading
            $page_sidebar_heading_label = esc_html__('Sidebar', 'responsive');
            responsive_separator_control($wp_customize, 'page_sidebar_separator', $page_sidebar_heading_label, 'responsive_page', 20, 'responsive_active_page_sidebar_section');

            // Page Sidebar.
            $sidebar_label   = esc_html__('Sidebar Position', 'responsive');
            $sidebar_choices = array(
                'global' => esc_html__( 'Global', 'responsive'),
                'no'    => esc_html__('No Sidebar', 'responsive'),
                'left'  => esc_html__('Left', 'responsive'),
                'right' => esc_html__('Right', 'responsive'),
            );
            if (is_rtl()) {
                $sidebar_choices = array(
                    'global' => esc_html__( 'Global', 'responsive' ),
                    'no'    => esc_html__('No Sidebar', 'responsive'),
                    'right'  => esc_html__('Left', 'responsive'),
                    'left' => esc_html__('Right', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'page_sidebar_position', $sidebar_label, 'responsive_page', 22, $sidebar_choices, 'global', 'responsive_active_page_sidebar_section', 'svg');

            $page_sidebar_style_label  = __( 'Sidebar Style', 'responsive' );
            $page_sidebar_style_choice = array(
                'default' => esc_html__( 'Default', 'responsive' ),
                'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
                'boxed'   => esc_html__( 'Boxed', 'responsive' ),
            );
            responsive_select_button_control( $wp_customize, 'page_sidebar_style', $page_sidebar_style_label, 'responsive_page', 22, $page_sidebar_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_page_sidebar_style' ), 'responsive_active_page_sidebar_position', 'postMessage' );
   
            responsive_horizontal_separator_control($wp_customize, 'page_default_sidebar_before_separator', 1, 'responsive_page', 23, 1, );

            // Page Default Sidebar
            $wp_customize->add_setting(
                'responsive_page_default_sidebar',
                array(
                    'default'           => 'main-sidebar',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'responsive_page_default_sidebar',
                array(
                    'label'           => __( 'Page Default Sidebar', 'responsive' ),
                    'section'         => 'responsive_page',
                    'type'            => 'select',
                    'choices'         => array(
                        'main-sidebar' => __( 'Main Sidebar', 'responsive' ),
                        'responsive-custom-sidebar-1'    => __( 'Sidebar 1', 'responsive' ),
                        'responsive-custom-sidebar-2'    => __( 'Sidebar 2', 'responsive' ),
                    ),
                    'priority'        => 24,
                    'active_callback' => 'responsive_active_page_sidebar_section',
                )
            );
            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'page_sidebar_width', $page_sidebar_width_label, 'responsive_page', 24, 30, 'responsive_active_page_sidebar_position', 50, 20, 'postMessage');

            $blog_sidebar_heading_label = esc_html__( 'Blog/Archive Sidebar', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_sidebar_separator', $blog_sidebar_heading_label, 'responsive_blog_layout', 26, 'responsive_active_blog_sidebar_section' );

            // Blog/Archive Sidebar.
            $sidebar_label   = esc_html__('Sidebar Position', 'responsive');
            $sidebar_choices = array(
                'global' => esc_html__( 'Global', 'responsive' ), 
                'no'    => esc_html__('No Sidebar', 'responsive'),
                'left'  => esc_html__('Left', 'responsive'),
                'right' => esc_html__('Right', 'responsive'),
            );
            if (is_rtl()) {
                $sidebar_choices = array(
                    'global' => esc_html__( 'Global', 'responsive' ),
                    'no'    => esc_html__('No Sidebar', 'responsive'),
                    'right'  => esc_html__('Left', 'responsive'),
                    'left' => esc_html__('Right', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'blog_sidebar_position', $sidebar_label, 'responsive_blog_layout', 30, $sidebar_choices, 'global', 'responsive_active_blog_sidebar_section', 'svg');

            $blog_sidebar_style_label  = __( 'Sidebar Style', 'responsive' );
            $blog_sidebar_style_choice = array(
                'default' => esc_html__( 'Default', 'responsive' ),
                'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
                'boxed'   => esc_html__( 'Boxed', 'responsive' ),
            );
            responsive_select_button_control( $wp_customize, 'blog_sidebar_style', $blog_sidebar_style_label, 'responsive_blog_layout', 32, $blog_sidebar_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_blog_sidebar_style' ), 'responsive_active_blog_sidebar_position', 'postMessage' );

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'blog_sidebar_width', $page_sidebar_width_label, 'responsive_blog_layout', 35, 30, 'responsive_active_blog_sidebar_position', 50, 20, 'postMessage');

            $single_blog_featured_image_label = esc_html__( 'Sidebar', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_sidebar_separator', $single_blog_featured_image_label, 'responsive_single_blog_layout', 38, 'responsive_active_single_blog_sidebar_section' );

            // Single Post Sidebar.
            $sidebar_label   = esc_html__('Sidebar Position', 'responsive');
            $sidebar_choices = array(
                'global' => esc_html__( 'Global', 'responsive' ),
                'no'    => esc_html__('No Sidebar', 'responsive'),
                'left'  => esc_html__('Left', 'responsive'),
                'right' => esc_html__('Right', 'responsive'),
            );
            if (is_rtl()) {
                $sidebar_choices = array(
                    'global' => esc_html__( 'Global', 'responsive'),
                    'no'    => esc_html__('No Sidebar', 'responsive'),
                    'right'  => esc_html__('Left', 'responsive'),
                    'left' => esc_html__('Right', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'single_blog_sidebar_position', $sidebar_label, 'responsive_single_blog_layout', 40, $sidebar_choices, 'global', 'responsive_active_single_blog_sidebar_section', 'svg');

            $single_blog_sidebar_style_label  = __( 'Sidebar Style', 'responsive' );
            $single_blog_sidebar_style_choice = array(
                'default' => esc_html__( 'Default', 'responsive' ),
                'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
                'boxed'   => esc_html__( 'Boxed', 'responsive' ),
            );
            responsive_select_button_control( $wp_customize, 'single_blog_sidebar_style', $single_blog_sidebar_style_label, 'responsive_single_blog_layout', 42, $single_blog_sidebar_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_blog_sidebar_style' ), 'responsive_active_single_blog_sidebar_position', 'postMessage' );

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'single_blog_sidebar_width', $page_sidebar_width_label, 'responsive_single_blog_layout', 45, 30, 'responsive_active_single_blog_sidebar_position', 50, 20, 'postMessage');
            responsive_horizontal_separator_control( $wp_customize, 'single_blog_sidebar_width_separator', 1, 'responsive_single_blog_layout', 46, 1, 'responsive_active_single_blog_sidebar_position' );
        }

    }

endif;

return new Responsive_Sidebar_Layout_Customizer();