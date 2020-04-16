<?php
/**
 * Create WooCommerce Checkout section in customizer
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

	if ( ! class_exists( 'Responsive_Woocommerce_Checkout_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Woocommerce_Checkout_Customizer {

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

				// Main Content Width.
				$shop_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
				responsive_drag_number_control( $wp_customize, 'checkout_content_width', $shop_content_width_label, 'woocommerce_checkout', 1, 70, null, 100, 1, 'postMessage' );
			}
		}

	endif;

	return new Responsive_Woocommerce_Checkout_Customizer();

}
