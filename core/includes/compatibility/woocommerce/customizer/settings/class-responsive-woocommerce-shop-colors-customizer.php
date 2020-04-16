<?php
/**
 * WooCommerce Shop Page Colors Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Shop_Colors_Customizer' ) ) :
	/** Colors Customizer Options */
	class Responsive_Woocommerce_Shop_Colors_Customizer {

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
				'responsive_woocommerce_shop_colors',
				array(
					'title'    => esc_html__( 'Colors', 'responsive' ),
					'panel'    => 'responsive-woocommerce-shop',
					'priority' => 20,
				)
			);

			// Rating Color.
			$product_rating_color_label = __( 'Rating Color', 'responsive' );
			responsive_color_control( $wp_customize, 'shop_product_rating', $product_rating_color_label, 'responsive_woocommerce_shop_colors', 10, '#0066CC' );

			// Price Color.
			$shop_product_price_label = __( 'Price Color', 'responsive' );
				responsive_color_control( $wp_customize, 'shop_product_price', $shop_product_price_label, 'responsive_woocommerce_shop_colors', 20, Responsive\Core\get_responsive_customizer_defaults( 'shop_product_price' ) );

			// Buttons.
			$shop_button_separator = esc_html__( 'Add To Cart Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_button_separator', $shop_button_separator, 'responsive_woocommerce_shop_colors', 30 );

			// Button.
			$add_to_cart_button_label = __( 'Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'add_to_cart_button', $add_to_cart_button_label, 'responsive_woocommerce_shop_colors', 40, Responsive\Core\get_responsive_customizer_defaults('add_to_cart_button') );

			// Button Text.
			$add_to_cart_button_text_label = __( 'Button Text', 'responsive' );
			responsive_color_control( $wp_customize, 'add_to_cart_button_text', $add_to_cart_button_text_label, 'responsive_woocommerce_shop_colors', 50, '#ffffff' );

			// Button Hover.
			$add_to_cart_button_hover_label = __( 'Button Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'add_to_cart_button_hover', $add_to_cart_button_hover_label, 'responsive_woocommerce_shop_colors', 60, '#10659C' );

			// Button Hover Text.
			$add_to_cart_button_hover_text_label = __( 'Button Hover Text', 'responsive' );
			responsive_color_control( $wp_customize, 'add_to_cart_button_hover_text', $add_to_cart_button_hover_text_label, 'responsive_woocommerce_shop_colors', 70, '#ffffff' );

		}
	}

endif;

return new Responsive_Woocommerce_Shop_Colors_Customizer();
