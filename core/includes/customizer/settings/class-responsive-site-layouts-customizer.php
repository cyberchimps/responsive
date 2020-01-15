<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Layouts_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Layouts_Customizer {

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
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_layout',
				array(
					'title'    => __( 'Layout', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 1,
				)
			);

			// Site Width.
			$wp_customize->add_setting(
				'responsive_width',
				array(
					'default'           => 'contained',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_width',
				array(
					'label'    => __( 'Width', 'responsive' ),
					'section'  => 'responsive_layout',
					'settings' => 'responsive_width',
					'type'     => 'select',
					'priority' => 1,
					'choices'  => apply_filters(
						'responsive_width_choices',
						array(
							'contained'  => esc_html__( 'Contained', 'responsive' ),
							'full-width' => esc_html__( 'Full Width', 'responsive' ),
						)
					),
				)
			);

			// Container Width.
			$container_width_label = __( 'Container Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'container_width', $container_width_label, 'responsive_layout', 2, 1140, 'responsive_active_site_layout_contained' );

			// Header Allignment.
			$wp_customize->add_setting(
				'responsive_style',
				array(
					'default'           => 'boxed',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_style',
				array(
					'label'    => __( 'Style', 'responsive' ),
					'section'  => 'responsive_layout',
					'settings' => 'responsive_style',
					'type'     => 'select',
					'priority' => 2,
					'choices'  => apply_filters(
						'responsive_style_choices',
						array(
							'boxed'         => esc_html__( 'Boxed', 'responsive' ),
							'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
							'flat'          => esc_html__( 'Flat', 'responsive' ),
						)
					),
				)
			);
		}


	}

endif;

return new Responsive_Site_Layouts_Customizer();
