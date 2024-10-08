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
				$general_tab_ids_prefix . 'responsive_scroll_to_top_icon_radius',
				
			);
			
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_hover_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_background_color',
				$design_tab_ids_prefix . 'responsive_scroll_to_top_icon_background_hover_color',
			);

			responsive_tabs_button_control( $wp_customize, 'scrolltotop_section_tabs', $tabs_label, 'responsive_scrolltotop_section', 1, '', 'responsive_scrolltotop_section_general_tab', 'responsive_scrolltotop_section_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Enable Scroll to top.
			$wp_customize->add_setting(
				'responsive_scroll_to_top',
				array(
					'default'           => 0,
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_checkbox_validate',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'responsive_scroll_to_top',
					array(
						'label'    => __( 'Enable Scroll To Top', 'responsive' ),
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top',
						'priority' => 1,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_on_devices',
				array(
					'default'           => 'both',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
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
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_position',
				array(
					'default'           => 'right',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_position',
					array(
						'label'    => __( 'Position', 'responsive' ),
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top_icon_position',
						'choices'  => array(
							'right' => __( 'Right', 'responsive' ),
							'left'  => __( 'Left', 'responsive' ),
						),
					)
				)
			);
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
						'priority'    => 10,
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
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 50,
							'step' => 1,
						),
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_color',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon' ),
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_color',
					array(
						'label'            => __( 'Icon Color', 'responsive' ),
						'section'          => 'responsive_scrolltotop_section',
						'settings'         => 'responsive_scroll_to_top_icon_color',
						'priority'         => 10,
						'is_hover_required'=> false,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_hover_color',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon_hover' ),
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_hover_color',
					array(
						'label'            => __( 'Icon Hover Color', 'responsive' ),
						'section'          => 'responsive_scrolltotop_section',
						'settings'         => 'responsive_scroll_to_top_icon_hover_color',
						'priority'         => 15,
						'is_hover_required'=> false,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_background_color',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon_background' ),
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_background_color',
					array(
						'label'            => __( 'Icon Background Color', 'responsive' ),
						'section'          => 'responsive_scrolltotop_section',
						'settings'         => 'responsive_scroll_to_top_icon_background_color',
						'priority'         => 20,
						'is_hover_required'=> false,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_background_hover_color',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'scroll_to_top_icon_background_hover' ),
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_background_hover_color',
					array(
						'label'            => __( 'Icon Background Hover Color', 'responsive' ),
						'section'          => 'responsive_scrolltotop_section',
						'settings'         => 'responsive_scroll_to_top_icon_background_hover_color',
						'priority'         => 25,
						'is_hover_required'=> false,
					)
				)
			);
		}
	}

endif;

return new Responsive_Scroll_To_Top_Customizer();

