<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Copyright_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Copyright_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$wp_customize->add_section(
				'responsive_footer_copyright',
				array(
					'title'    => esc_html__( 'Copyright', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 20,

				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_footer_copyright_text_color',
				$design_tab_ids_prefix . 'responsive_footer_copyright_links_color',
				$design_tab_ids_prefix . 'responsive_footer_copyright_padding',
				$design_tab_ids_prefix . 'responsive_footer_copyright_separator_2',
				$design_tab_ids_prefix . 'responsive_footer_copyright_separator_4',
			);

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'footer_copyright',
				$general_tab_ids_prefix . 'responsive_copyright',
                $general_tab_ids_prefix . 'responsive_copyright_tablet',
				$general_tab_ids_prefix . 'responsive_copyright_mobile',
				$general_tab_ids_prefix . 'responsive_footer_copyright_alignment',
				$general_tab_ids_prefix . 'responsive_footer_copyright_separator_1',
			);

			responsive_tabs_button_control( $wp_customize, 'footer_copyright_tabs', $tabs_label, 'responsive_footer_copyright', 1, '', 'responsive_footer_copyright_general_tab', 'responsive_footer_copyright_design_tab', $general_tab_ids, $design_tab_ids, null );

           /*
			------------------------------------------------------------------
			// Copyright Text
			-------------------------------------------------------------------
			*/
			
			// 1st EDITOR
			$wp_customize->add_setting(
				'footer_copyright',
				array(
					'type' => 'option',
					'sanitize_callback' => 'wp_kses_post',
					'transport'   => 'refresh',
				)
			);
			
			$wp_customize->add_control(
				new Responsive_Customizer_Tinymce_Control(
					$wp_customize,
					'footer_copyright',
					array(
						'label' => __('Copyright Text', 'responsive'),
						'section' => 'responsive_footer_copyright',
						'priority'    => 10,
					)
				)
			);

			// Hide Copyright.
			$copyright_visibility_label = __( 'Hide Copyright on Desktop', 'responsive' );
			responsive_toggle_control( $wp_customize, 'copyright', $copyright_visibility_label, 'responsive_footer_copyright', 20, 0, null );

			// Hide on Tablet.
			$copyright_visibility_tablet_label = __( 'Hide Copyright on Tablet', 'responsive' );
			responsive_toggle_control( $wp_customize, 'copyright_tablet', $copyright_visibility_tablet_label, 'responsive_footer_copyright', 30, 0, null );

			// Hide on Mobile.
			$copyright_visibility_mobile_label = __( 'Hide Copyright on Mobile', 'responsive' );
			responsive_toggle_control( $wp_customize, 'copyright_mobile', $copyright_visibility_mobile_label, 'responsive_footer_copyright', 40, 0, null );

            responsive_horizontal_separator_control($wp_customize, 'footer_copyright_separator_1', 1, 'responsive_footer_copyright', 45, 1, );

            // Copyright Alignment.
			$copyright_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$copyright_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$copyright_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'footer_copyright_alignment', $copyright_alignment_label, 'responsive_footer_copyright', 50, $copyright_alignment_choices, 'left', null );

			/*
			------------------------------------------------------------------
				Design Controls
			-------------------------------------------------------------------
			*/

			// Text Color.
			$footer_background_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_copyright_text', $footer_background_label, 'responsive_footer_copyright', 60, Responsive\Core\get_responsive_customizer_defaults( 'footer_copyright_text' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'footer_copyright_text_hover' ), 'footer_copyright_text_hover' );

            responsive_horizontal_separator_control($wp_customize, 'footer_copyright_separator_2', 1, 'responsive_footer_copyright', 65, 1, );

			// Links Color.
			$footer_background_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_copyright_links', $footer_background_label, 'responsive_footer_copyright', 70, Responsive\Core\get_responsive_customizer_defaults( 'footer_copyright_links' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'footer_copyright_links_hover' ), 'footer_copyright_links_hover' );
            
            // Typography
			$footer_copyright_typography_label = __( 'Copyright Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'footer_copyright_typography_group', $footer_copyright_typography_label, 'responsive_typography_footer', 80, 'footer_copyright_typography' );

            responsive_horizontal_separator_control($wp_customize, 'footer_copyright_separator_4', 2, 'responsive_footer_copyright', 85, 1, );

            // Padding.
			$footer_copyright_padding_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'footer_copyright', 'responsive_footer_copyright', 100, 15, 15, null, $footer_copyright_padding_label );

		}
	}

endif;

return new Responsive_Footer_Copyright_Customizer();
