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
            $tabs_label            = esc_html__('Tabs', 'responsive');
            $design_tab_ids_prefix = 'customize-control-';
            $design_tab_ids        = array(
                $design_tab_ids_prefix . 'responsive_sidebar_typography_group',
                $design_tab_ids_prefix . 'responsive_sidebar_typography_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_headings_color',
                $design_tab_ids_prefix . 'responsive_sidebar_background_color',
                $design_tab_ids_prefix . 'responsive_sidebar_text_color',
                $design_tab_ids_prefix . 'responsive_sidebar_link_color',
                $design_tab_ids_prefix . 'responsive_sidebar_link_hover_color',
                $design_tab_ids_prefix . 'responsive_sidebar_background_image',
                $design_tab_ids_prefix . 'responsive_sidebar_background_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_headings_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_text_separator',
                $design_tab_ids_prefix . 'responsive_sidebar_link_separator',
            );

            $general_tab_ids_prefix = 'customize-control-';
            $general_tab_ids        = array(
                $general_tab_ids_prefix . 'responsive_page_sidebar_toggle',
                $general_tab_ids_prefix . 'responsive_blog_sidebar_toggle',
                $general_tab_ids_prefix . 'responsive_single_blog_sidebar_toggle',
                $general_tab_ids_prefix . 'responsive_blog_sidebar_width',
                $general_tab_ids_prefix . 'responsive_page_sidebar_position',
                $general_tab_ids_prefix . 'responsive_page_sidebar_width',
                $general_tab_ids_prefix . 'responsive_blog_sidebar_position',
                $general_tab_ids_prefix . 'responsive_single_blog_sidebar_position',
                $general_tab_ids_prefix . 'responsive_single_blog_sidebar_width',
                $general_tab_ids_prefix . 'responsive_page_sidebar_controls_separator',
                $general_tab_ids_prefix . 'responsive_blod_sidebar_controls_separator',
            );

            responsive_tabs_button_control($wp_customize, 'sidebar_tabs', $tabs_label, 'responsive_sidebar', 1, '', 'responsive_sidebar_general_tab', 'responsive_sidebar_design_tab', $general_tab_ids, $design_tab_ids, null);

            responsive_horizontal_separator_control($wp_customize, 'sidebar_typography_separator', 1, 'responsive_sidebar', 58, 1, );

            /**
             * Entry Elements.
             */
            $sidebar_typography_label = esc_html__('Sidebar Font', 'responsive');
            responsive_typography_group_control($wp_customize, 'sidebar_typography_group', $sidebar_typography_label, 'responsive_sidebar', 60, 'sidebar_typography');

            // Page Sidebar Toggle
            $page_sidebar_toggle_label = esc_html__('Page Sidebar', 'responsive');
            responsive_toggle_control($wp_customize, 'page_sidebar_toggle', $page_sidebar_toggle_label, 'responsive_sidebar', 15, 1, null);

            // Page Sidebar.
            $sidebar_label   = esc_html__('Sidebar Position', 'responsive');
            $sidebar_choices = array(
                'right' => esc_html__('Right', 'responsive'),
                'left'  => esc_html__('Left', 'responsive'),
                'no'    => esc_html__('No Sidebar', 'responsive'),
            );
            if (is_rtl()) {
                $sidebar_choices = array(
                    'right' => esc_html__('Right', 'responsive'),
                    'left'  => esc_html__('Left', 'responsive'),
                    'no'    => esc_html__('No Sidebar', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'page_sidebar_position', $sidebar_label, 'responsive_sidebar', 20, $sidebar_choices, 'right', 'responsive_active_page_sidebar_toggle');

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'page_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar', 25, 30, null, 50, 20, 'postMessage');

            responsive_horizontal_separator_control($wp_customize, 'page_sidebar_controls_separator', 1, 'responsive_sidebar', 26, 1, );

            // Blog/Archive Sidebar Toggle
            $blog_sidebar_toggle_label = esc_html__('Blog/Archive Sidebar', 'responsive');
            responsive_toggle_control($wp_customize, 'blog_sidebar_toggle', $blog_sidebar_toggle_label, 'responsive_sidebar', 28, 1, null);

            // Blog/Archive Sidebar.
            $sidebar_label   = esc_html__('Sidebar Position', 'responsive');
            $sidebar_choices = array(
                'right' => esc_html__('Right', 'responsive'),
                'left'  => esc_html__('Left', 'responsive'),
                'no'    => esc_html__('No Sidebar', 'responsive'),
            );
            if (is_rtl()) {
                $sidebar_choices = array(
                    'right' => esc_html__('Right', 'responsive'),
                    'left'  => esc_html__('Left', 'responsive'),
                    'no'    => esc_html__('No Sidebar', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'blog_sidebar_position', $sidebar_label, 'responsive_sidebar', 30, $sidebar_choices, Responsive\Core\get_responsive_customizer_defaults('blog_sidebar_position'), 'responsive_active_blog_sidebar_toggle');

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'blog_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar', 35, 30, null, 50, 20, 'postMessage');

            responsive_horizontal_separator_control($wp_customize, 'blod_sidebar_controls_separator', 1, 'responsive_sidebar', 36, 1, );

            // Single Post Sidebar Toggle
            $single_post_sidebar_toggle_label = esc_html__('Single Post Sidebar', 'responsive');
            responsive_toggle_control($wp_customize, 'single_blog_sidebar_toggle', $single_post_sidebar_toggle_label, 'responsive_sidebar', 38, 1, null);

            // Single Post Sidebar.
            $sidebar_label   = esc_html__('Sidebar Position', 'responsive');
            $sidebar_choices = array(
                'right' => esc_html__('Right', 'responsive'),
                'left'  => esc_html__('Left', 'responsive'),
                'no'    => esc_html__('No Sidebar', 'responsive'),
            );
            if (is_rtl()) {
                $sidebar_choices = array(
                    'right' => esc_html__('Right', 'responsive'),
                    'left'  => esc_html__('Left', 'responsive'),
                    'no'    => esc_html__('No Sidebar', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'single_blog_sidebar_position', $sidebar_label, 'responsive_sidebar', 40, $sidebar_choices, 'right', 'responsive_active_single_blog_sidebar_toggle');

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'single_blog_sidebar_width', $page_sidebar_width_label, 'responsive_sidebar', 45, 30, null, 50, 20, 'postMessage');
        }

    }

endif;

return new Responsive_Sidebar_Layout_Customizer();
