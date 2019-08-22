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
					'priority' => 202,
				)
			);
			$wp_customize->add_setting(
				'header_layout_options',
				array(
					'type'    => 'option',
					'default' => 'default',
				)
			);
			$wp_customize->add_control(
				'header_layout_options',
				array(
					'label'    => __( 'Header Layout', 'responsive' ),
					'section'  => 'responsive_header_section',
					'settings' => 'header_layout_options',
					'type'     => 'select',
					'choices'  => apply_filters(
						'responsive_header_layout_choices',
						array(
							'default'              => esc_html__( 'Default', 'responsive' ),
							'header-main-layout-1' => esc_html__( 'Logo Left', 'responsive' ),
							'header-main-layout-2' => esc_html__( 'Logo Center', 'responsive' ),
							'header-main-layout-3' => esc_html__( 'Logo Right', 'responsive' ),
						)
					),
				)
			);
		}


	}

endif;

return new Responsive_Header_Customizer();
