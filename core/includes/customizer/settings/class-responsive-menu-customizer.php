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
			 * Menu COLORS
			 */
			// Menu Colors.
			$wp_customize->add_section(
				'responsive_menu',
				array(
					'title'    => __( 'Menu', 'responsive' ),
					'panel'    => 'responsive-header-options',
					'priority' => 40,
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
					'priority' => 1,
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
						'priority' => 2,
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
						'priority' => 3,
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
		}


	}

endif;

return new Responsive_Menu_Customizer();
