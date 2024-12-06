<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Scroll_To_Top_Customizer' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Scroll_To_Top_Customizer {

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
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {
			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_scrolltotop_section',
				array(
					'title'    => esc_html__( 'Scroll To Top', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 203,
				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			
			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_scroll_to_top',
				$general_tab_ids_prefix . 'responsive_scroll_to_top_on_devices',
				$general_tab_ids_prefix . 'responsive_scroll_to_top_icon_position',
				$general_tab_ids_prefix . 'responsive_scroll_to_top_icon_size',
				$general_tab_ids_prefix . 'responsive_scrolltotop_separator_1',
				$general_tab_ids_prefix . 'responsive_scrolltotop_separator_2',
				
			);
			
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_hover_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_background_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_background_hover_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_radius',
				$design_tab_ids_prefix . 'responsive_scrolltotop_separator_3',
				$design_tab_ids_prefix . 'responsive_scrolltotop_separator_4',
			);

			responsive_tabs_button_control( $wp_customize, 'scrolltotop_section_tabs', $tabs_label, 'responsive_scrolltotop_section', 1, '', 'responsive_scrolltotop_section_general_tab', 'responsive_scrolltotop_section_design_tab', $general_tab_ids, $design_tab_ids, null );

			$wp_customize->add_setting(
				'responsive_scroll_to_top_on_devices',
				array(
					'default'           => 'both',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Button_Control(
					$wp_customize,
					'responsive_scroll_to_top_on_devices',
					array(
						'label'    => __( 'Display On', 'responsive' ),
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top_on_devices',
						'choices'  => array(
							'desktop' => __( 'Desktop', 'responsive' ),
							'mobile'  => __( 'Mobile', 'responsive' ),
							'both'    => __( 'Desktop + Mobile', 'responsive' ),
						),
						'priority' => 10,
					)
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'scrolltotop_separator_1', 1, 'responsive_scrolltotop_section', 15, 1, );

			// Position.
			$stt_position_label   = esc_html__( 'Position', 'responsive' );
			$stt_position_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$stt_position_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'scroll_to_top_icon_position', $stt_position_label, 'responsive_scrolltotop_section', 20, $stt_position_choices, 'right', null, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'scrolltotop_separator_2', 1, 'responsive_scrolltotop_section', 25, 1, );

			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_size',
				array(
					'transport'         => 'postMessage',
					'default'           => 50,
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_size',
					array(
						'label'       => __( 'Icon Size (px)', 'responsive' ),
						'section'     => 'responsive_scrolltotop_section',
						'settings'    => 'responsive_scroll_to_top_icon_size',
						'priority'    => 30,
						'input_attrs' => array(
							'min'  => 50,
							'max'  => 100,
							'step' => 1,
						),
					)
				)
			);
			// Radius.
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_radius',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'postMessage',
					'default'           => 50,
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_radius',
					array(
						'label'       => esc_html__( 'Border Radius (%)', 'responsive' ),
						'section'     => 'responsive_scrolltotop_section',
						'settings'    => 'responsive_scroll_to_top_icon_radius',
						'priority'    => 60,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 50,
							'step' => 1,
						),
					)
				)
			);

			// Icon Color.
			$footer_background_label = __( 'Icons Color', 'responsive' );
			responsive_color_control( $wp_customize, 'scroll_to_top_icon', $footer_background_label, 'responsive_scrolltotop_section', 40, Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon_hover' ), 'scroll_to_top_icon_hover' );

			responsive_horizontal_separator_control($wp_customize, 'scrolltotop_separator_3', 1, 'responsive_scrolltotop_section', 45, 1, );

			// Icon Background Color.
			$footer_background_label = __( 'Icons Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'scroll_to_top_icon_background', $footer_background_label, 'responsive_scrolltotop_section', 50, Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon_background' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon_background_hover' ), 'scroll_to_top_icon_background_hover' );

			responsive_horizontal_separator_control($wp_customize, 'scrolltotop_separator_4', 1, 'responsive_scrolltotop_section', 55, 1, );
		}
	}

endif;

return new Responsive_Scroll_To_Top_Customizer();

