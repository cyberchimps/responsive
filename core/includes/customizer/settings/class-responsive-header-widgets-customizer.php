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
					'title'    => esc_html__( 'Header Widgets', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10,

				)
			);

			/**
			 * Header Widget Separator.
			 */
			$header_widget_separator_label = esc_html__( 'Header Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget_separator', $header_widget_separator_label, 'responsive_header_widget', 60 );

			// Header Widget.
			$header_widget_label = esc_html__( 'Enable Header Widgets', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'enable_header_widget', $header_widget_label, 'responsive_header_widget', 70, 1, null, 'postMessage' );

			// Redirect to header widgets button.
			$redirect_to_header_widgets_label = esc_html__( 'Add Header Widgets', 'responsive' );
			responsive_redirect_control( $wp_customize, 'redirect_to_header_widgets', $redirect_to_header_widgets_label, 'responsive_header_widget', 70, 'section', 'sidebar-widgets-header-widgets', 'responsive_active_header_widget' );

			// Header Widget Position.
			$header_widget_position_label   = esc_html__( 'Widgets Position', 'responsive' );
			$header_widget_position_choices = array(
				'top'       => esc_html__( 'Above Header', 'responsive' ),
				'with_logo' => esc_html__( 'In Header', 'responsive' ),
				'bottom'    => esc_html__( 'Below Header', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_widget_position', $header_widget_position_label, 'responsive_header_widget', 70, $header_widget_position_choices, 'top', 'responsive_active_header_widget', 'postMessage' );

			// Header Alignment.
			$header_widget_alignment_label   = esc_html__( 'Widgets Alignment', 'responsive' );
			$header_widget_alignment_choices = array(
				'spread'       => esc_html__( 'Spread', 'responsive' ),
				'left'         => esc_html__( 'Left', 'responsive' ),
				'right'        => esc_html__( 'Right', 'responsive' ),
				'center'       => esc_html__( 'center', 'responsive' ),
				'space-around' => esc_html__( 'Space Around', 'responsive' ),
			);
			if ( is_rtl() ) {
				$header_widget_alignment_choices = array(
					'spread'       => esc_html__( 'Spread', 'responsive' ),
					'left'         => esc_html__( 'Right', 'responsive' ),
					'right'        => esc_html__( 'Left', 'responsive' ),
					'center'       => esc_html__( 'center', 'responsive' ),
					'space-around' => esc_html__( 'Space Around', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'header_widget_alignment', $header_widget_alignment_label, 'responsive_header_widget', 80, $header_widget_alignment_choices, 'spread', 'responsive_active_header_widget', 'postMessage' );

			/**
			 * Header Widget Separator.
			 */
			$header_widget_separator_label = esc_html__( 'Header Widget Colors', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget_color_separator', $header_widget_separator_label, 'responsive_header_widget', 90, 'responsive_active_header_widget' );

			// Text Color.
			$menu_text_color_label = __( 'Text Color', 'responsive' );

			responsive_color_control( $wp_customize, 'header_widget_text', $menu_text_color_label, 'responsive_header_widget', 100, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ), 'responsive_active_header_widget' );

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_background', $menu_background_color_label, 'responsive_header_widget', 110, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ), 'responsive_active_header_widget' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_border', $menu_border_color_label, 'responsive_header_widget', 120, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ), 'responsive_active_header_widget' );

			// Link Color.
			$menu_link_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link', $menu_link_color_label, 'responsive_header_widget', 130, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ), 'responsive_active_header_widget' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_widget_link_hover', $menu_link_hover_color_label, 'responsive_header_widget', 140, Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ), 'responsive_active_header_widget' );


			/**
			 * Header Widgets.
			 */
			$header_widgets_separator_label = esc_html__( 'Header Widgets Typography', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widgets_separator', $header_widgets_separator_label, 'responsive_header_widget', 150 );


		}
	}

endif;

return new Responsive_Header_Widgets_Customizer();
