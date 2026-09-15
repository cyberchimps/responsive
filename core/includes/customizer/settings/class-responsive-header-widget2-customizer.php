<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Widget2_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Widget2_Customizer {

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
				'responsive_header_widget2',
				array(
					'title'    => esc_html__( 'Header Widget 2', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10,
					'input_attrs' => array( 'id' => 'header_widgets2' ),
				)
			);

			// Redirect to header widgets button.
			$redirect_to_header_widget2_label = esc_html__( 'Add Header Widget 2', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_header_widget2', $redirect_to_header_widget2_label, 'responsive_header_widget2', 70, 'section', 'sidebar-widgets-header-widgets2', null );
		
			/**
			 * Header Widget Separator.
			 */
			$header_widget2_separator_label = esc_html__( 'Header Widget Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget2_color_separator', $header_widget2_separator_label, 'responsive_header_widget2', 90, null );

			// Text Color.
			$header_widget2_text_color_label = __( 'Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_widget2_text', $header_widget2_text_color_label, 'responsive_header_widget2', 100, Responsive\Core\get_responsive_customizer_defaults( 'header_widget2_text' ), null );

			// Background Color.
			$header_widget2_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget2_background', $header_widget2_background_color_label, 'responsive_header_widget2', 110, Responsive\Core\get_responsive_customizer_defaults( 'header_widget2_background' ), null );

			// Border Color.
			$header_widget2_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget2_border', $header_widget2_border_color_label, 'responsive_header_widget2', 120, Responsive\Core\get_responsive_customizer_defaults( 'header_widget2_border' ), null );

			// Link Color.
			$header_widget2_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget2_link', $header_widget2_link_color_label, 'responsive_header_widget2', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_widget2_link' ), null );

			// Link Hover Color.
			$header_widget2_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget2_link_hover', $header_widget2_link_hover_color_label, 'responsive_header_widget2', 140, Responsive\Core\get_responsive_customizer_defaults( 'header_widget2_link_hover' ), null );

			/**
			 * Header Widgets.
			 */
			$header_widget2_typography_label = esc_html__( 'Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_widgets2_typography_group', $header_widget2_typography_label, 'responsive_header_widget2', 150, 'header_widgets2_typography' );

		}
	}

endif;

return new Responsive_Header_Widget2_Customizer();