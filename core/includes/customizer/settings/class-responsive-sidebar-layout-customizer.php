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
            responsive_horizontal_separator_control($wp_customize, 'sidebar_typography_separator', 1, 'responsive_sidebar', 58, 1, );

            /**
             * Entry Elements.
             */
            $sidebar_typography_label = esc_html__('Sidebar Font', 'responsive');
            responsive_typography_group_control($wp_customize, 'sidebar_typography_group', $sidebar_typography_label, 'responsive_sidebar', 60, 'sidebar_typography');

            // Page Sidebar Sub-Heading
            $page_sidebar_heading_label = esc_html__('Sidebar', 'responsive');
            responsive_separator_control($wp_customize, 'page_sidebar_separator', $page_sidebar_heading_label, 'responsive_page', 15);

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
            responsive_imageradio_button_control($wp_customize, 'page_sidebar_position', $sidebar_label, 'responsive_page', 20, $sidebar_choices, 'right', null, 'svg');

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'page_sidebar_width', $page_sidebar_width_label, 'responsive_page', 25, 30, null, 50, 20, 'postMessage');

            $blog_sidebar_heading_label = esc_html__( 'Blog/Archive Sidebar', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_sidebar_separator', $blog_sidebar_heading_label, 'responsive_blog_layout', 25 );

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
            responsive_imageradio_button_control($wp_customize, 'blog_sidebar_position', $sidebar_label, 'responsive_blog_layout', 30, $sidebar_choices, Responsive\Core\get_responsive_customizer_defaults('blog_sidebar_position'), null, 'svg');

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'blog_sidebar_width', $page_sidebar_width_label, 'responsive_blog_layout', 35, 30, null, 50, 20, 'postMessage');

            $single_blog_featured_image_label = esc_html__( 'Sidebar', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_sidebar_separator', $single_blog_featured_image_label, 'responsive_single_blog_layout', 38 );

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
            responsive_imageradio_button_control($wp_customize, 'single_blog_sidebar_position', $sidebar_label, 'responsive_single_blog_layout', 40, $sidebar_choices, 'right', null, 'svg');

            $page_sidebar_width_label = esc_html__('Sidebar Width (%)', 'responsive');
            responsive_drag_number_control($wp_customize, 'single_blog_sidebar_width', $page_sidebar_width_label, 'responsive_single_blog_layout', 45, 30, 'responsive_active_single_blog_sidebar_position', 50, 20, 'postMessage');
        }

    }

endif;

return new Responsive_Sidebar_Layout_Customizer();
