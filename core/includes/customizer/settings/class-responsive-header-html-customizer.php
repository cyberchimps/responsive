<?php
/**
 * Header Social Icons
 *
 * @package Responsive
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Responsive_Header_Html_Customizer' ) ) :
	/**
	 * Header Social Icons Customizer Options
	 */
	class Responsive_Header_Html_Customizer {
		/**
		 * Constructor
		 *
		 * @since 1.0.5
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
				'responsive_header_html',
				array(
					'title'    => __( 'Header HTML', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10, 
				)
			);
            $tabs_label      = esc_html__( 'Tabs', 'responsive' );
            $tab_ids_prefix  = 'customize-control-';
            $general_tab_ids        = array(
				$tab_ids_prefix . 'responsive_header_html_content',
				$tab_ids_prefix . 'responsive_header_html_content_separator',
				$tab_ids_prefix . 'responsive_header_html_auto_add_paragraph',
			);
			$design_tab_ids        = array(
				$tab_ids_prefix . 'responsive_header_html_link_style',
				$tab_ids_prefix . 'responsive_header_html_link_style_separator',
				$tab_ids_prefix . 'responsive_header_html_link_color',
				$tab_ids_prefix . 'responsive_header_html_link_colors_separator',
				$tab_ids_prefix . 'responsive_header_html_margin_padding',
			);
			responsive_tabs_button_control( $wp_customize, 'header_html_tabs', $tabs_label, 'responsive_header_html', 10, '', 'responsive_header_html_general_tab', 'responsive_header_html_design_tab', $general_tab_ids, $design_tab_ids, null );
		
			$wp_customize->add_setting(
				'responsive_header_html_content',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'refresh',
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'header_html_content' ),
				)
			);
			
			$wp_customize->add_control(
				new Responsive_Customizer_Html_Control(
					$wp_customize,
					'responsive_header_html_content',
					array(
						'label' => __('HTML Editor', 'responsive'),
						'section' => 'responsive_header_html',
						'priority'    => 10,
					)
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'header_html_content_separator', 1, 'responsive_header_html', 10, 1 );

			responsive_toggle_control( $wp_customize, 'header_html_auto_add_paragraph', esc_html__( 'Automatically add paragraphs', 'responsive' ), 'responsive_header_html', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_html_auto_add_paragraph' ), null );

			$header_html_link_style_choices = array(
				'underline' => esc_html__( 'Underline', 'responsive' ),
				'none'      => esc_html__( 'No Underline', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'header_html_link_style', esc_html__( 'Link Style', 'responsive' ), 'responsive_header_html', 10, $header_html_link_style_choices, Responsive\Core\get_responsive_customizer_defaults( 'header_html_link_style' ), null, 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'header_html_link_style_separator', 1, 'responsive_header_html', 10, 1 );

			responsive_color_control( $wp_customize, 'header_html_link', __( 'Link Colors', 'responsive' ), 'responsive_header_html', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_html_link_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'header_html_link_color_hover' ), 'header_html_link_hover' );

			responsive_horizontal_separator_control( $wp_customize, 'header_html_link_colors_separator', 1, 'responsive_header_html', 10, 1 );

			responsive_padding_control( $wp_customize, 'header_html_margin', 'responsive_header_html', 10, Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ), Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ), null, __( 'Margin (px)', 'responsive' ) );

		}
	}
endif;
return new Responsive_Header_Html_Customizer();