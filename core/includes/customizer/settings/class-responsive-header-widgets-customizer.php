<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Widgets_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Widgets_Customizer {

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
				'responsive_header_widget',
				array(
					'title'    => esc_html__( 'Header Widget 1', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10,
					'input_attrs' => array( 'id' => 'header_widgets1'), 
				)
			);

			// Redirect to header widgets button.
			$redirect_to_header_widgets_label = esc_html__( 'Add Header Widget 1', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_header_widgets', $redirect_to_header_widgets_label, 'responsive_header_widget', 70, 'section', 'sidebar-widgets-header-widgets', null );

			/**
			 * Header Widget Separator.
			 */
			$header_widget_separator_label = esc_html__( 'Header Widget Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget_color_separator', $header_widget_separator_label, 'responsive_header_widget', 90, null );

			// Text Color.
			$menu_text_color_label = __( 'Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_widget_text', $menu_text_color_label, 'responsive_header_widget', 100, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ), null );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_background', $menu_background_color_label, 'responsive_header_widget', 110, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ), null );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_border', $menu_border_color_label, 'responsive_header_widget', 120, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ), null );

			// Link Color.
			$menu_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link', $menu_link_color_label, 'responsive_header_widget', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ), null );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link_hover', $menu_link_hover_color_label, 'responsive_header_widget', 140, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ), null );

			/**
			 * Header Widgets.
			 */
			$header_widgets_separator_label = esc_html__( 'Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'header_widgets_typography_group', $header_widgets_separator_label, 'responsive_header_widget', 150, 'header_widgets_typography' );

		}
	}

endif;

return new Responsive_Header_Widgets_Customizer();
