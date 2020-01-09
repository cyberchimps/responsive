<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Header_Customizer {

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
				'responsive_header_section',
				array(
					'title'    => esc_html__( 'Header Section', 'responsive' ),
					'panel'    => 'responsive-header-options',
					'priority' => 3,

				)
			);
			$wp_customize->add_setting(
				'header_layout_options',
				array(
					'default'           => 'header-logo-left',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'header_layout_options',
				array(
					'label'    => __( 'Header Layout', 'responsive' ),
					'section'  => 'responsive_header_section',
					'settings' => 'header_layout_options',
					'type'     => 'select',
					'priority' => 0,
					'choices'  => apply_filters(
						'responsive_header_layout_choices',
						array(
							'header-logo-left'   => esc_html__( 'Logo Left', 'responsive' ),
							'header-logo-center' => esc_html__( 'Logo Center', 'responsive' ),
							'header-logo-right'  => esc_html__( 'Logo Right', 'responsive' ),
						)
					),
				)
			);
			$wp_customize->add_setting(
				'menu_position',
				array(
					'default'           => 'in_header',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'menu_position',
				array(
					'label'    => __( 'Header Menu Position', 'responsive' ),
					'section'  => 'responsive_header_section',
					'settings' => 'menu_position',
					'type'     => 'select',
					'choices'  => apply_filters(
						'responsive_menu_position',
						array(
							'above_header' => esc_html__( 'Above Header', 'responsive' ),
							'in_header'    => esc_html__( 'Default', 'responsive' ),
							'below_header' => esc_html__( 'Below Header', 'responsive' ),
						)
					),
					'priority' => 2,
				)
			);
			$wp_customize->add_setting(
				'header_width',
				array(
					'default'           => 'container',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				'header_width',
				array(
					'label'    => __( 'Header Width', 'responsive' ),
					'section'  => 'responsive_header_section',
					'settings' => 'header_width',
					'type'     => 'select',
					'choices'  => apply_filters(
						'responsive_header_width_choices',
						array(
							'container' => esc_html__( 'Container', 'responsive' ),
							'full'      => esc_html__( 'Full', 'responsive' ),
						)
					),
				)
			);

			$wp_customize->add_setting(
				'responsive_header_top_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_left_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_header_bottom_padding',
				array(
					'transport'         => 'refesh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_right_padding',
				array(
					'transport'         => 'refresh',
					'default'           => '0',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_tablet_top_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_tablet_right_padding',
				array(
					'default'           => 20,
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_tablet_bottom_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_tablet_left_padding',
				array(
					'default'           => 20,
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_setting(
				'responsive_header_mobile_top_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_mobile_right_padding',
				array(
					'default'           => 20,
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_mobile_bottom_padding',
				array(
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_setting(
				'responsive_header_mobile_left_padding',
				array(
					'default'           => 20,
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Dimensions_Control(
					$wp_customize,
					'responsive_header_padding',
					array(
						'label'       => esc_html__( 'Header Padding (px)', 'responsive' ),
						'section'     => 'responsive_header_section',
						'settings'    => array(
							'desktop_top'    => 'responsive_header_top_padding',
							'desktop_right'  => 'responsive_header_right_padding',
							'desktop_bottom' => 'responsive_header_bottom_padding',
							'desktop_left'   => 'responsive_header_left_padding',
							'tablet_top'     => 'responsive_header_tablet_top_padding',
							'tablet_right'   => 'responsive_header_tablet_right_padding',
							'tablet_bottom'  => 'responsive_header_tablet_bottom_padding',
							'tablet_left'    => 'responsive_header_tablet_left_padding',
							'mobile_top'     => 'responsive_header_mobile_top_padding',
							'mobile_right'   => 'responsive_header_mobile_right_padding',
							'mobile_bottom'  => 'responsive_header_mobile_bottom_padding',
							'mobile_left'    => 'responsive_header_mobile_left_padding',
						),
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 60,
							'step' => 1,
						),
					)
				)
			);
			// header border Color.
			$wp_customize->add_setting(
				'responsive_header_border_color',
				array(
					'default'           => '',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_background',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_header_border_color',
					array(
						'label'    => __( 'Border Bottom Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_header_border_color',
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_fullwidth_header_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_fullwidth_header_color',
					array(
						'label'    => esc_html__( 'Header Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_fullwidth_header_color',
						'priority' => 10,
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_fullwidth_sitetitle_color',
				array(
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '#333333',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_fullwidth_sitetitle_color',
					array(
						'label'    => esc_html__( 'Site Title Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_fullwidth_sitetitle_color',
						'priority' => 10,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_site_description_color',
				array(
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
					'default'           => '#afafaf',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'responsive_site_description_color',
					array(
						'label'    => esc_html__( 'Site Description Color', 'responsive' ),
						'section'  => 'responsive_header_section',
						'settings' => 'responsive_site_description_color',
						'priority' => 10,
					)
				)
			);

		}
	}

endif;

return new Responsive_Header_Customizer();
