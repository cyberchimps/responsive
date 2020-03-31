<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Content_Header_Layout_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Content_Header_Layout_Customizer {

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
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$wp_customize->add_section(
				'responsive_content_header_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_content_header',
					'priority' => 10,

				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[breadcrumb]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
					'default'           => 0,
				)
			);
			$wp_customize->add_control(
				'res_breadcrumb',
				array(
					'label'    => __( 'Disable breadcrumb list?', 'responsive' ),
					'section'  => 'responsive_content_header_layout',
					'settings' => 'responsive_theme_options[breadcrumb]',
					'type'     => 'checkbox',
					'priority' => 10,
				)
			);

			// Breadcrumb Position.
			$breadcrumb_position_label   = esc_html__( 'Breadcrumb Position', 'responsive' );
			$breadcrumb_position_choices = array(
				'before' => esc_html__( 'Before Heading', 'responsive' ),
				'after'  => esc_html__( 'After Heading', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'breadcrumb_position', $breadcrumb_position_label, 'responsive_content_header_layout', 20, $breadcrumb_position_choices, 'before', 'responsive_active_breadcrumb' );

			// Content Header Allignment.
			$content_header_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$content_header_alignment_choices = array(
				'center' => esc_html__( 'Center', 'responsive' ),
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
			);

			if ( is_rtl() ) {
				$content_header_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'content_header_alignment', $content_header_alignment_label, 'responsive_content_header_layout', 30, $content_header_alignment_choices, 'center', null, 'postMessage' );

		}
	}

endif;

return new Responsive_Content_Header_Layout_Customizer();
