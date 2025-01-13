<?php
/**
 * WooCommerce Cart Page Colors Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Cart_Colors_Customizer' ) ) :
	/** Colors Customizer Options */
	class Responsive_Woocommerce_Cart_Colors_Customizer {

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

			// Cart Buttons.
			$cart_button_separator = esc_html__( 'Cart Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'cart_cart_button_separator', $cart_button_separator, 'responsive_woocommerce_cart', 10 );

			// Button.
			$cart_buttons_label = __( 'Button', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_buttons', $cart_buttons_label, 'responsive_woocommerce_cart', 20, '#10659C', null, '', true, '#0066CC', 'cart_buttons_hover' );

			responsive_horizontal_separator_control($wp_customize, 'cart_buttons_separator', 1, 'responsive_woocommerce_cart', 25, 1, );

			// Button Text.
			$cart_buttons_text_label = __( 'Button Text', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_buttons_text', $cart_buttons_text_label, 'responsive_woocommerce_cart', 30, '#ffffff', null, '', true, '#ffffff', 'cart_buttons_hover_text' );

			responsive_horizontal_separator_control($wp_customize, 'cart_checkout_buttons_separator', 2, 'responsive_woocommerce_cart', 55, 1, );

			// Checkout Buttons.
			$cart_button_separator = esc_html__( 'Checkout Button', 'responsive' );
			responsive_separator_control( $wp_customize, 'cart_checkout_button_separator', $cart_button_separator, 'responsive_woocommerce_cart', 60 );

			// Button.
			$cart_checkout_button_label = __( 'Button', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_checkout_button', $cart_checkout_button_label, 'responsive_woocommerce_cart', 70, '#0066CC', null, '', true, '#10659C', 'cart_checkout_button_hover' );

			responsive_horizontal_separator_control($wp_customize, 'checkout_buttons_separator', 1, 'responsive_woocommerce_cart', 75, 1, );

			// Button Text.
			$cart_checkout_button_text_label = __( 'Button Text', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_checkout_button_text', $cart_checkout_button_text_label, 'responsive_woocommerce_cart', 80, '#ffffff', null, '', true, '#ffffff', 'cart_checkout_button_hover_text' );

		}
	}

endif;

return new Responsive_Woocommerce_Cart_Colors_Customizer();
