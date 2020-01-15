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
				'responsive_header_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 1,

				)
			);
			/**
			 * Header Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_header_elements',
				array(
					'default'           => array( 'site-branding', 'main-navigation' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_header_elements',
					array(
						'label'    => esc_html__( 'Header Elements', 'responsive' ),
						'section'  => 'responsive_header_layout',
						'settings' => 'responsive_header_elements',
						'priority' => 0,
						'choices'  => responsive_header_elements(),
					)
				)
			);

			// Header Layout.
			$wp_customize->add_setting(
				'responsive_header_layout',
				array(
					'default'           => 'horizontal',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_header_layout',
				array(
					'label'    => __( 'Header Layout', 'responsive' ),
					'section'  => 'responsive_header_layout',
					'settings' => 'responsive_header_layout',
					'type'     => 'select',
					'priority' => 1,
					'choices'  => apply_filters(
						'responsive_header_layout_choices',
						array(
							'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
							'vertical'   => esc_html__( 'Vertical', 'responsive' ),
						)
					),
				)
			);

			// Header Allignment.
			$wp_customize->add_setting(
				'responsive_header_alignment',
				array(
					'default'           => 'center',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_header_alignment',
				array(
					'label'           => __( 'Header Alignment', 'responsive' ),
					'section'         => 'responsive_header_layout',
					'settings'        => 'responsive_header_alignment',
					'type'            => 'select',
					'priority'        => 2,
					'active_callback' => 'responsive_active_vertical_header',
					'choices'         => apply_filters(
						'responsive_header_layout_choices',
						array(
							'center' => esc_html__( 'Center', 'responsive' ),
							'left'   => esc_html__( 'Left', 'responsive' ),
							'right'  => esc_html__( 'Right', 'responsive' ),
						)
					),
				)
			);

			// Padding.
			responsive_padding_control( $wp_customize, 'header', 'responsive_header_layout', 3, 28, 0 );

		}
	}

endif;

return new Responsive_Header_Customizer();
