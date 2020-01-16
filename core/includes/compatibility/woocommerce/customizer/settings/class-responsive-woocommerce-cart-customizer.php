<?php
/**
 * Create WooCommerce Cart section in customizer
 *
 * @package Responsive
 */

if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * WooCommerce Customizer Options
	 *
	 * @package Responsive WordPress theme
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'Responsive_Woocommerce_Cart_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Woocommerce_Cart_Customizer {

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
				$wp_customize->add_section(
					'responsive_woocommerce_cart_section',
					array(
						'title'    => esc_html__( 'Cart', 'responsive' ),
						'panel'    => 'woocommerce',
						'priority' => 9,
					)
				);
				$wp_customize->add_setting(
					'enable_upsells_options',
					array(
						'default'           => 1,
						'sanitize_callback' => 'responsive_sanitize_checkbox',
						'transport'         => 'refresh',
					)
				);
				$wp_customize->add_control(
					'enable_upsells_options',
					array(
						'label'    => __( 'Enable Upsells', 'responsive' ),
						'section'  => 'responsive_woocommerce_cart_section',
						'settings' => 'enable_upsells_options',
						'type'     => 'checkbox',
					)
				);
			}
		}

	endif;

	return new Responsive_Woocommerce_Cart_Customizer();

}
