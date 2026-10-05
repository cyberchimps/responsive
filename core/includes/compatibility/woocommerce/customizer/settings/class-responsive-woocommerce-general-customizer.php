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
	 * General section. UI only, not linked to any front end output yet.
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
					'contained'  => esc_html__( 'Normal', 'responsive' ),
					'narrow'     => esc_html__( 'Narrow', 'responsive' ),
					'full-width' => esc_html__( 'Full Width', 'responsive' ),
				),
				'contained',
				null,
				'svg',
				'refresh'
			);

			// Container Style.
			responsive_select_button_control(
				$wp_customize,
				'woocommerce_container_style',
				esc_html__( 'Container Style', 'responsive' ),
				'responsive_woocommerce_general',
				20,
				array(
					'boxed'         => esc_html__( 'Boxed', 'responsive' ),
					'content-boxed' => esc_html__( 'Content Boxed', 'responsive' ),
					'flat'          => esc_html__( 'Flat', 'responsive' ),
				),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_style' ),
				null,
				'refresh'
			);

			// Sidebar Layout.
			responsive_imageradio_button_control(
				$wp_customize,
				'woocommerce_sidebar_layout',
				esc_html__( 'Sidebar Layout', 'responsive' ),
				'responsive_woocommerce_general',
				30,
				array(
					'left'  => esc_html__( 'Left', 'responsive' ),
					'right' => esc_html__( 'Right', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				),
				'no',
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
					'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
					'boxed'   => esc_html__( 'Boxed', 'responsive' ),
				),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_sidebar_style' ),
				null,
				'postMessage'
			);
		}
	}

endif;

return new Responsive_Woocommerce_General_Customizer();
