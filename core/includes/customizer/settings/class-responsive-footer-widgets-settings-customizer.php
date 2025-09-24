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
                responsive_select_button_with_switchers_control( $wp_customize, 'footer_widget'. $i .'_content_vertical_align', $content_vertical_alignment_label, 'responsive_footer_sidebar-widgets-footer-widget-' . $i, 40, $content_vertical_alignment_choices, 'flex-start', null );

            }
        }
    }
endif;
return new Responsive_Footer_Widgets_Settings_Customizer();