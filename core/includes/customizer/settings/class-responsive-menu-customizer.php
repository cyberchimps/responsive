<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Menu_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Menu_Customizer {

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
			/**
			 * Header Menu Padding.
			 */
			$wp_customize->add_setting(
				'responsive_header_menu_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_header_menu_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_top_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
					'default'           => '0',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_bottom_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_header_menu_mobile_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_mobile_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_mobile_bottom_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_mobile_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_header_menu_padding',
					array(
						'label'       => esc_html__( 'Header Menu Padding (px)', 'responsive' ),
						'section'     => 'responsive_menu',
						'settings'    => array(
							'desktop_top'    => 'responsive_header_menu_top_padding',
							'desktop_right'  => 'responsive_header_menu_right_padding',
							'desktop_bottom' => 'responsive_header_menu_bottom_padding',
							'desktop_left'   => 'responsive_header_menu_left_padding',
							'tablet_top'     => 'responsive_header_menu_tablet_top_padding',
							'tablet_right'   => 'responsive_header_menu_tablet_right_padding',
							'tablet_bottom'  => 'responsive_header_menu_tablet_bottom_padding',
							'tablet_left'    => 'responsive_header_menu_tablet_left_padding',
							'mobile_top'     => 'responsive_header_menu_mobile_top_padding',
							'mobile_right'   => 'responsive_header_menu_mobile_right_padding',
							'mobile_bottom'  => 'responsive_header_menu_mobile_bottom_padding',
							'mobile_left'    => 'responsive_header_menu_mobile_left_padding',
						),
						'priority'    => 1,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 60,
							'step' => 1,
						),
					)
				)
			);

			/**
			 * Header Menu Padding.
			 */
			$wp_customize->add_setting(
				'responsive_header_menu_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_header_menu_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_top_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_right_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_bottom_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_tablet_left_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_header_menu_mobile_top_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_mobile_right_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_mobile_bottom_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_menu_mobile_left_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_header_menu_padding',
					array(
						'label'       => esc_html__( 'Header Menu Padding (px)', 'responsive' ),
						'section'     => 'responsive_menu',
						'settings'    => array(
							'desktop_top'    => 'responsive_header_menu_top_padding',
							'desktop_right'  => 'responsive_header_menu_right_padding',
							'desktop_bottom' => 'responsive_header_menu_bottom_padding',
							'desktop_left'   => 'responsive_header_menu_left_padding',
							'tablet_top'     => 'responsive_header_menu_tablet_top_padding',
							'tablet_right'   => 'responsive_header_menu_tablet_right_padding',
							'tablet_bottom'  => 'responsive_header_menu_tablet_bottom_padding',
							'tablet_left'    => 'responsive_header_menu_tablet_left_padding',
							'mobile_top'     => 'responsive_header_menu_mobile_top_padding',
							'mobile_right'   => 'responsive_header_menu_mobile_right_padding',
							'mobile_bottom'  => 'responsive_header_menu_mobile_bottom_padding',
							'mobile_left'    => 'responsive_header_menu_mobile_left_padding',
						),
						'priority'    => 1,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 60,
							'step' => 1,
						),
					)
				)
			);

			/**
			 * Main Menu Left Light Padding.
			 */
			$wp_customize->add_setting(
				'responsive_menu_left_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0.9',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_menu_left_right_padding',
					array(
						'label'       => __( 'Padding Between Menus (em)', 'responsive' ),
						'section'     => 'responsive_menu',
						'settings'    => 'responsive_menu_left_right_padding',
						'priority'    => 2,
						'input_attrs' => array(
							'min'  => 0.1,
							'max'  => 5,
							'step' => 0.1,
						),
					)
				)
			);

			/**
			 * COLORS Heading.
			 */
			$wp_customize->add_setting(
				'responsive_main_menu_colors',
				array(
					'sanitize_callback' => 'wp_kses',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Heading_Control(
					$wp_customize,
					'responsive_main_menu_colors',
					array(
						'label'    => esc_html__( 'Colors', 'responsive' ),
						'section'  => 'responsive_menu',
						'priority' => 2,
					)
				)
			);

			/**
			 * Menu COLORS.
			 */
			// Menu Colors.
			$wp_customize->add_section(
				'responsive_menu',
				array(
					'title'    => __( 'Menu', 'responsive' ),
					'panel'    => 'responsive-header-options',
					'priority' => 3,
				)
			);

			// Menu gradients.
			$wp_customize->add_setting(
				'responsive_menu_gradients_checkbox',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_checkbox_validate',
				)
			);
			$wp_customize->add_control(
				'menu_gradients_checkbox',
				array(
					'label'    => __( 'Enable Menu Background gradient', 'responsive' ),
					'section'  => 'responsive_menu',
					'settings' => 'responsive_menu_gradients_checkbox',
					'type'     => 'checkbox',
					'priority' => 4,
				)
			);

			// Menu Background Color.
			$wp_customize->add_setting(
				'responsive_menu_background_colorpicker',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'menu_background_colorpicker',
					array(
						'label'    => __( 'Menu Background Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_background_colorpicker',
						'priority' => 5,
					)
				)
			);

			// Menu Background Color 2.
			$wp_customize->add_setting(
				'responsive_menu_background_colorpicker_2',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_background_colorpicker_2',
					array(
						'label'    => __( 'Menu Background Color 2', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_background_colorpicker_2',
						'priority' => 6,
					)
				)
			);

			// Menu Text Color.
			$wp_customize->add_setting(
				'responsive_menu_text_colorpicker',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_text_colorpicker',
					array(
						'label'    => __( 'Menu Text Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_text_colorpicker',
					)
				)
			);

			// Menu Text Hover Color.
			$wp_customize->add_setting(
				'responsive_menu_text_hover_colorpicker',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_text_hover_colorpicker',
					array(
						'label'    => __( 'Menu Hover Text Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_text_hover_colorpicker',
					)
				)
			);

			// Menu Item Color.
			$wp_customize->add_setting(
				'responsive_menu_active_colorpicker',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_active_colorpicker',
					array(
						'label'    => __( 'Active Menu Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_active_colorpicker',
					)
				)
			);
			// Active Menu Text Color.
			$wp_customize->add_setting(
				'responsive_menu_active_text_colorpicker',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_active_text_colorpicker',
					array(
						'label'    => __( 'Active Menu Text Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_active_text_colorpicker',
					)
				)
			);
			// Menu Hover Color.
			$wp_customize->add_setting(
				'responsive_menu_item_hover_colorpicker',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_item_hover_colorpicker',
					array(
						'label'    => __( 'Menu Hover Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_item_hover_colorpicker',
					)
				)
			);
			// Menu Hover Color.
			$wp_customize->add_setting(
				'responsive_menu_border_color',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_menu_border_color',
					array(
						'label'    => __( 'Menu border Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_border_color',
					)
				)
			);

			// Mobile Menu Style.

			/**
			 * Heading Styling
			 */
			$wp_customize->add_setting(
				'responsive_mobile_menu_title',
				array(
					'sanitize_callback' => 'wp_kses',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Heading_Control(
					$wp_customize,
					'responsive_mobile_menu_title',
					array(
						'label'    => esc_html__( 'Mobile Menu', 'responsive' ),
						'section'  => 'responsive_menu',
						'priority' => 10,
					)
				)
			);

			$wp_customize->add_setting(
				'mobile_menu_style',
				array(
					'default'           => 'dropdown',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'mobile_menu_style',
				array(
					'label'    => __( 'Menu Style Layout', 'responsive' ),
					'section'  => 'responsive_menu',
					'settings' => 'mobile_menu_style',
					'type'     => 'select',
					'choices'  => apply_filters(
						'responsive_mobile_menu_style_choices',
						array(
							'dropdown'   => esc_html__( 'Dropdown', 'responsive' ),
							'fullscreen' => esc_html__( 'FullScreen', 'responsive' ),
							'sidebar'    => esc_html__( 'Sidebar', 'responsive' ),
						)
					),
					'priority' => 12,
				)
			);

			$wp_customize->add_setting(
				'mobile_menu_style_sidebar_position',
				array(
					'default'           => 'left',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'mobile_menu_style_sidebar_position',
				array(
					'label'           => __( 'Sidebar Menu Position', 'responsive' ),
					'section'         => 'responsive_menu',
					'settings'        => 'mobile_menu_style_sidebar_position',
					'type'            => 'select',
					'choices'         => apply_filters(
						'mobile_menu_style_sidebar_position_choices',
						array(
							'left'  => esc_html__( 'Left', 'responsive' ),
							'right' => esc_html__( 'Right', 'responsive' ),
						)
					),
					'priority'        => 13,
					'active_callback' => 'responsive_check_sidebar_menu_type',
				)
			);

			/**
			 * Main Container Width
			 */
			$wp_customize->add_setting(
				'responsive_mobile_header_breakpoint',
				array(
					'transport'         => 'refresh',
					'default'           => '768',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_mobile_header_breakpoint',
					array(
						'label'       => __( 'Menu Breakpoint(px)', 'responsive' ),
						'section'     => 'responsive_menu',
						'settings'    => 'responsive_mobile_header_breakpoint',
						'priority'    => 14,
						'input_attrs' => array(
							'min'  => 480,
							'max'  => 4096,
							'step' => 1,
						),
					)
				)
			);

			// Toggle button Color.
			$wp_customize->add_setting(
				'responsive_menu_toggle_button_color',
				array(
					'default'           => '#555555',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_menu_toggle_button_color',
					array(
						'label'    => __( 'Toggle Button Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_menu_toggle_button_color',
						'priority' => 14,
					)
				)
			);

			// Mobile Menu Border Color.
			$wp_customize->add_setting(
				'responsive_mobile_menu_border_color',
				array(
					'default'           => '#f5f5f5',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_mobile_menu_border_color',
					array(
						'label'    => __( 'Border Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_mobile_menu_border_color',
						'priority' => 14,
					)
				)
			);

			// End - Mobile Menu.
			// Sub menu.
			$wp_customize->add_setting(
				'responsive_sub_menu_title',
				array(
					'sanitize_callback' => 'wp_kses',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Heading_Control(
					$wp_customize,
					'responsive_sub_menu_title',
					array(
						'label'    => esc_html__( 'Sub Menu', 'responsive' ),
						'section'  => 'responsive_menu',
						'priority' => 15,
					)
				)
			);
			/**
			 * Sub menu border.
			 */
			$wp_customize->add_setting(
				'responsive_submenu_top_border',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_submenu_right_border',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_submenu_bottom_border',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_submenu_left_border',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_submenu_border',
					array(
						'label'       => esc_html__( 'Container Border (px)', 'responsive' ),
						'section'     => 'responsive_menu',
						'settings'    => array(
							'desktop_top'    => 'responsive_submenu_top_border',
							'desktop_right'  => 'responsive_submenu_right_border',
							'desktop_bottom' => 'responsive_submenu_bottom_border',
							'desktop_left'   => 'responsive_submenu_left_border',
						),
						'priority'    => 16,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 60,
							'step' => 1,
						),
					)
				)
			);
			// Submenu border Color.
			$wp_customize->add_setting(
				'responsive_submenu_border_color',
				array(
					'default'           => '#e5e5e5',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_submenu_border_color',
					array(
						'label'    => __( 'Submenu border Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_submenu_border_color',
						'priority' => 17,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_submenu_divider',
				array(
					'default'           => '1',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_checkbox_validate',
				)
			);
			$wp_customize->add_control(
				'responsive_submenu_divider',
				array(
					'label'    => __( 'Submenu Divider', 'responsive' ),
					'section'  => 'responsive_menu',
					'settings' => 'responsive_submenu_divider',
					'type'     => 'checkbox',
					'priority' => 18,
				)
			);
			$wp_customize->add_setting(
				'responsive_submenu_divider_color',
				array(
					'active_callback'   => 'responsive_check_submenu_divider',
					'default'           => '#e5e5e5',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_submenu_divider_color',
					array(
						'label'    => __( 'Submenu Divider Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_submenu_divider_color',
						'priority' => 17,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_submenu_color',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_submenu_color',
					array(
						'label'    => __( 'Submenu Color', 'responsive' ),
						'section'  => 'responsive_menu',
						'settings' => 'responsive_submenu_color',
						'priority' => 19,
					)
				)
			);
		}


	}

endif;

return new Responsive_Menu_Customizer();
