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

			$wp_customize->add_section(
				'responsive_woocommerce_cart_colors',
				array(
					'title'    => esc_html__( 'Colors & Backgrounds', 'responsive' ),
					'panel'    => 'responsive-woocommerce-cart',
					'priority' => 20,
				)
			);

			// Cart Buttons.
			$cart_button_separator = esc_html__( 'Cart Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'cart_cart_button_separator', $cart_button_separator, 'responsive_woocommerce_cart_colors', 10 );

			// Button.
			$cart_buttons_label = __( 'Button', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_buttons', $cart_buttons_label, 'responsive_woocommerce_cart_colors', 20, '#10659C' );

			// Button Text.
			$cart_buttons_text_label = __( 'Button Text', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_buttons_text', $cart_buttons_text_label, 'responsive_woocommerce_cart_colors', 30, '#ffffff' );

			// Button Hover.
			$cart_buttons_hover_label = __( 'Button Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_buttons_hover', $cart_buttons_hover_label, 'responsive_woocommerce_cart_colors', 40, '#0066CC' );

			// Button Hover Text.
			$cart_buttons_hover_text_label = __( 'Button Hover Text', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_buttons_hover_text', $cart_buttons_hover_text_label, 'responsive_woocommerce_cart_colors', 50, '#ffffff' );

			// Checkout Buttons.
			$cart_button_separator = esc_html__( 'Checkout Button', 'responsive' );
			responsive_separator_control( $wp_customize, 'cart_checkout_button_separator', $cart_button_separator, 'responsive_woocommerce_cart_colors', 60 );

			// Button.
			$cart_checkout_button_label = __( 'Button', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_checkout_button', $cart_checkout_button_label, 'responsive_woocommerce_cart_colors', 70, '#0066CC' );

			// Button Text.
			$cart_checkout_button_text_label = __( 'Button Text', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_checkout_button_text', $cart_checkout_button_text_label, 'responsive_woocommerce_cart_colors', 80, '#ffffff' );

			// Button Hover.
			$cart_checkout_button_hover_label = __( 'Button Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_checkout_button_hover', $cart_checkout_button_hover_label, 'responsive_woocommerce_cart_colors', 90, '#10659C' );

			// Button Hover Text.
			$cart_checkout_button_hover_text_label = __( 'Button Hover Text', 'responsive' );
			responsive_color_control( $wp_customize, 'cart_checkout_button_hover_text', $cart_checkout_button_hover_text_label, 'responsive_woocommerce_cart_colors', 100, '#ffffff' );

		}
	}

endif;

return new Responsive_Woocommerce_Cart_Colors_Customizer();
