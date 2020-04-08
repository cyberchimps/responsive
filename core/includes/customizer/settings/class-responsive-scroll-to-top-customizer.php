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
				'responsive_scroll_to_top',
				array(
					'label'    => __( 'Enable Scroll To Top', 'responsive' ),
					'section'  => 'responsive_scrolltotop_section',
					'settings' => 'responsive_scroll_to_top',
					'type'     => 'checkbox',
					'priority' => 1,
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
				'responsive_scroll_to_top_on_devices',
				array(
					'label'    => __( 'Display On', 'responsive' ),
					'section'  => 'responsive_scrolltotop_section',
					'settings' => 'responsive_scroll_to_top_on_devices',
					'type'     => 'select',
					'choices'  => array(
						'desktop' => __( 'Desktop', 'responsive' ),
						'mobile'  => __( 'Mobile', 'responsive' ),
						'both'    => __( 'Desktop + Mobile', 'responsive' ),
					),
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
				'responsive_scroll_to_top_icon_position',
				array(
					'label'    => __( 'Position', 'responsive' ),
					'section'  => 'responsive_scrolltotop_section',
					'settings' => 'responsive_scroll_to_top_icon_position',
					'type'     => 'select',
					'choices'  => array(
						'right' => __( 'Right', 'responsive' ),
						'left'  => __( 'Left', 'responsive' ),
					),
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
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_color',
					array(
						'label'    => 'Icon Color',
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top_icon_color',
						'priority' => 10,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_hover_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_hover_color',
					array(
						'label'    => 'Icon Hover Color',
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top_icon_hover_color',
						'priority' => 10,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_background_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_background_color',
					array(
						'label'    => 'Icon Background Color',
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top_icon_background_color',
						'priority' => 10,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_scroll_to_top_icon_background_hover_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_scroll_to_top_icon_background_hover_color',
					array(
						'label'    => 'Icon Background Hover Color',
						'section'  => 'responsive_scrolltotop_section',
						'settings' => 'responsive_scroll_to_top_icon_background_hover_color',
						'priority' => 10,
					)
				)
			);
		}
	}

endif;

return new Responsive_Scroll_To_Top_Customizer();

