<?php
/**
 * WooCommerce General Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_General_Customizer' ) ) :

	/**
	 * General section. Container Layout, Container Style and Sidebar Layout feed the
	 * WooCommerce body classes (see responsive_get_woocommerce_context()).
	 */
	class Responsive_Woocommerce_General_Customizer {

		/**
		 * Setup class.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}

		/**
		 * Customizer options
		 *
		 * @param WP_Customize_Manager $wp_customize WordPress customizer options.
		 */
		public function customizer_options( $wp_customize ) {

			$wp_customize->add_section(
				'responsive_woocommerce_general',
				array(
					'title'    => esc_html__( 'General', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 1,
				)
			);

			// Container Layout.
			responsive_imageradio_button_control(
				$wp_customize,
				'woocommerce_container_layout',
				esc_html__( 'Container Layout', 'responsive' ),
				'responsive_woocommerce_general',
				10,
				array(
					'default_container' => esc_html__( 'Default', 'responsive' ),
					'normal'            => esc_html__( 'Normal', 'responsive' ),
					'narrow'            => esc_html__( 'Narrow', 'responsive' ),
					'full-width'        => esc_html__( 'Full Width', 'responsive' ),
				),
				'default_container',
				null,
				'svg',
				'refresh'
			);

			// Container Style.
			$wp_customize->add_setting(
				'responsive_woocommerce_container_style',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control(
				'responsive_woocommerce_container_style',
				array(
					'label'    => esc_html__( 'Container Style', 'responsive' ),
					'section'  => 'responsive_woocommerce_general',
					'type'     => 'select',
					'choices'  => array(
						'default' => esc_html__( 'Default', 'responsive' ),
						'boxed' => esc_html__( 'Boxed', 'responsive' ),
						'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
						'flat' => esc_html__( 'Flat', 'responsive' ),
					),
					'priority' => 20,
				)
			);

			// Sidebar Layout.
			responsive_imageradio_button_control(
				$wp_customize,
				'woocommerce_sidebar_layout',
				esc_html__( 'Sidebar Layout', 'responsive' ),
				'responsive_woocommerce_general',
				30,
				array(
					'global' => esc_html__( 'Default', 'responsive' ),
					'left'   => esc_html__( 'Left', 'responsive' ),
					'right'  => esc_html__( 'Right', 'responsive' ),
					'no'     => esc_html__( 'No Sidebar', 'responsive' ),
				),
				'global',
				null,
				'svg'
			);

			// Sidebar Style.
			responsive_select_button_control(
				$wp_customize,
				'woocommerce_sidebar_style',
				esc_html__( 'Sidebar Style', 'responsive' ),
				'responsive_woocommerce_general',
				40,
				array(
					'default' => esc_html__( 'Default', 'responsive' ),
					'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
					'boxed'   => esc_html__( 'Boxed', 'responsive' ),
				),
				'default',
				null,
				'postMessage'
			);
		}
	}

endif;

return new Responsive_Woocommerce_General_Customizer();
