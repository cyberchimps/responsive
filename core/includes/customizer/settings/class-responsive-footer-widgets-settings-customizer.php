<?php
/**
 * All Footer Widgets Customizer Options
 *
 * @package Responsive
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Responsive_Footer_Widgets_Settings_Customizer' ) ) :
	/**
	 * All Footer Widgets Customizer Options
	 */
	class Responsive_Footer_Widgets_Settings_Customizer {
		/**
		 * Constructor
		 *
		 * @since 6.2.6
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}
        /**
		 * Customizer options
		 *
		 * @since 6.2.6
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

            for( $i=1; $i<=6;$i++ ) {

                $wp_customize->add_section(
                    'responsive_footer_sidebar-widgets-footer-widget-' . $i,
                    array(
                        'title'    => __( 'Footer Widget ' . $i, 'responsive' ),
                        'panel'    => 'responsive_footer',
                        'priority' => 20 + $i, 
                    )
                );

                // Content Alignment.
                $content_alignment_label   = esc_html__( 'Content Align', 'responsive' );
                $content_alignment_choices = array(
                    'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
                    'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
                    'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
                );
                if ( is_rtl() ) {
                    $content_alignment_choices = array(
                        'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
                        'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
                        'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
                    );
                }
                responsive_select_button_with_switchers_control( $wp_customize, 'footer_widget'. $i .'_content_align', $content_alignment_label, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 20, $content_alignment_choices, 'left', null );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_align_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 30, 1 );

                // Content Vertical Alignment.
                $content_vertical_alignment_label   = esc_html__( 'Content Vertical Align', 'responsive' );
                $content_vertical_alignment_choices = array(
                    'flex-start' => esc_html__( 'icon_vertical_top', 'responsive' ),
                    'center'     => esc_html__( 'icon_vertical_center', 'responsive' ),
                    'flex-end'   => esc_html__( 'icon_vertical_bottom', 'responsive' ),
                );
                responsive_select_button_with_switchers_control( $wp_customize, 'footer_widget'. $i .'_content_vertical_align', $content_vertical_alignment_label, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 40, $content_vertical_alignment_choices, 'flex-start', null, 'refresh', "Vertical alignment doesn’t apply if the footer row inner elements layout is Stack." );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_tc_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 45, 1 );

                // Heading Color.
                $heading_color_label = __( 'Heading Color', 'responsive' );
                responsive_color_control_with_device_switchers( $wp_customize, 'footer_widget'. $i .'_title', $heading_color_label, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 50, Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_title_color' ), null, '' );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_cc_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 55, 1 );

                // Content Color.
                $content_color_label = __( 'Content Color', 'responsive' );
                responsive_color_control_with_device_switchers( $wp_customize, 'footer_widget'. $i .'_content', $content_color_label, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 60, Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_content_color' ), null, '' );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_lc_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 65, 1 );

                // Links Color.
                $link_color_label = __( 'Link Color', 'responsive' );
                responsive_color_control_with_device_switchers_and_hover( $wp_customize, 'footer_widget'. $i .'_link', $link_color_label, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 70, Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_link_color' ), Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_link_hover_color' ), null, '', 'postMessage' );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_tf_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 75, 1 );

                // Title Font
                $widget_title_typography = __( 'Title Font', 'responsive' );
                responsive_typography_group_control( $wp_customize, 'footer_widget'. $i .'_title_typography_group', $widget_title_typography, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 80, 'footer_widget'. $i .'_title_typography' );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_cf_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 85, 1 );

                // Content Font
                $widget_content_typography = __( 'Content Font', 'responsive' );
                responsive_typography_group_control( $wp_customize, 'footer_widget'. $i .'_content_typography_group', $widget_content_typography, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 90, 'footer_widget'. $i .'_content_typography' );

                responsive_horizontal_separator_control($wp_customize, 'footer_widget'.$i.'_margin_separator', 1, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 95, 1 );

                // Margin.
                $margin_label = esc_html__( 'Margin (px)', 'responsive' );
                responsive_padding_control( $wp_customize, 'footer_widget'. $i .'_margin', 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 100, 0, 0, null, $margin_label );
            }
        }
    }
endif;
return new Responsive_Footer_Widgets_Settings_Customizer();