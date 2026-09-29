<?php
/**
 * WooCommerce Shop Page Colors Customizer Options
 *
 * @package Responsive WordPress theme
 */

use function Responsive\Core\get_responsive_customizer_defaults;

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


			// Rating Color.
			$product_rating_color_label = __( 'Rating Color', 'responsive' );
			responsive_color_control( $wp_customize, 'shop_product_rating', $product_rating_color_label, 'responsive_woocommerce_shop', 10, get_responsive_customizer_defaults( 'responsive_shop_product_rating_color' ) );

			// Price Color.
			$shop_product_price_label = __( 'Price Color', 'responsive' );
			responsive_color_control( $wp_customize, 'shop_product_price', $shop_product_price_label, 'responsive_woocommerce_shop', 20, Responsive\Core\get_responsive_customizer_defaults( 'shop_product_price' ) );

			// Buttons.
			$shop_button_separator = esc_html__( 'Add To Cart Buttons', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_button_separator', $shop_button_separator, 'responsive_woocommerce_shop', 30 );

			// Button Color (Normal + Hover).
			$add_to_cart_button_label = __( 'Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'add_to_cart_button', $add_to_cart_button_label, 'responsive_woocommerce_shop', 40, Responsive\Core\get_responsive_customizer_defaults( 'add_to_cart_button' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_add_to_cart_button_hover_color' ), 'add_to_cart_button_hover' );

			// Button Text (Normal + Hover).
			$add_to_cart_button_text_label = __( 'Button Text', 'responsive' );
			responsive_color_control( $wp_customize, 'add_to_cart_button_text', $add_to_cart_button_text_label, 'responsive_woocommerce_shop', 50, get_responsive_customizer_defaults( 'responsive_add_to_cart_button_text_color' ), null, '', true, get_responsive_customizer_defaults( 'responsive_add_to_cart_button_hover_text_color' ), 'add_to_cart_button_hover_text' );

			// Button Font.
			$add_to_cart_button_typography_label = esc_html__( 'Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'add_to_cart_button_typography_group', $add_to_cart_button_typography_label, 'responsive_woocommerce_shop', 74, 'add_to_cart_button_typography' );

			// Button Border Width.
			$add_to_cart_button_border_width_label = esc_html__( 'Border Width', 'responsive' );
			responsive_unit_borderwidth_control( $wp_customize, 'add_to_cart_button_border_width', 'responsive_woocommerce_shop', 74.2, 0, 0, null, $add_to_cart_button_border_width_label, 'postMessage', array( 'px', 'em' ) );

			// Button Border Style.
			$add_to_cart_button_border_styles = array(
				'solid'  => esc_html__( 'Solid', 'responsive' ),
				'dashed' => esc_html__( 'Dashed', 'responsive' ),
				'dotted' => esc_html__( 'Dotted', 'responsive' ),
				'double' => esc_html__( 'Double', 'responsive' ),
			);
			responsive_select_button_control(
				$wp_customize,
				'add_to_cart_button_border_style',
				esc_html__( 'Border Style', 'responsive' ),
				'responsive_woocommerce_shop',
				74.4,
				$add_to_cart_button_border_styles,
				'solid',
				null,
				'postMessage'
			);

			// Button Border Color.
			$add_to_cart_button_border_color_label = esc_html__( 'Border Color', 'responsive' );
			responsive_color_control_with_device_switchers_and_hover( $wp_customize, 'add_to_cart_button_border', $add_to_cart_button_border_color_label, 'responsive_woocommerce_shop', 74.6, '', '', null, '', 'postMessage' );

			// Button Border Radius.
			$add_to_cart_button_radius_label = esc_html__( 'Border Radius', 'responsive' );
			responsive_unit_radius_control( $wp_customize, 'add_to_cart_button_radius', 'responsive_woocommerce_shop', 74.8, 0, 0, null, $add_to_cart_button_radius_label, 'postMessage', array( 'px', 'em', 'rem' ) );

			// Button Shadow Separator.
			responsive_horizontal_separator_control( $wp_customize, 'add_to_cart_button_shadow_separator', 1, 'responsive_woocommerce_shop', 74.82, 1 );

			// Button Shadow.
			responsive_shadow_control(
				$wp_customize,
				'add_to_cart_button_shadow',
				__( 'Button Shadow', 'responsive' ),
				'responsive_woocommerce_shop',
				74.84,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_shadow_x' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_shadow_y' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_shadow_blur' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_shadow_spread' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_shadow_inset' ),
				null,
				'postMessage'
			);

			// Button Shadow Color.
			responsive_color_control(
				$wp_customize,
				'add_to_cart_button_shadow',
				__( 'Button Shadow Color', 'responsive' ),
				'responsive_woocommerce_shop',
				74.86,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_shadow_color' ),
				null,
				'',
				false,
				null,
				null,
				false,
				null,
				null,
				'color',
				'postMessage'
			);

			// Button Hover Shadow Separator.
			responsive_horizontal_separator_control( $wp_customize, 'add_to_cart_button_hover_shadow_separator', 1, 'responsive_woocommerce_shop', 74.88, 1 );

			// Button Hover Shadow.
			responsive_shadow_control(
				$wp_customize,
				'add_to_cart_button_hover_shadow',
				__( 'Button Hover Shadow', 'responsive' ),
				'responsive_woocommerce_shop',
				74.90,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_hover_shadow_x' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_hover_shadow_y' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_hover_shadow_blur' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_hover_shadow_spread' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_hover_shadow_inset' ),
				null,
				'postMessage'
			);

			// Button Hover Shadow Color.
			responsive_color_control(
				$wp_customize,
				'add_to_cart_button_hover_shadow',
				__( 'Button Hover Shadow Color', 'responsive' ),
				'responsive_woocommerce_shop',
				74.92,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_button_hover_shadow_color' ),
				null,
				'',
				false,
				null,
				null,
				false,
				null,
				null,
				'color',
				'postMessage'
			);

			// Product Sorting.
			$shop_product_sorting_separator = esc_html__( 'Product Sorting', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_product_sorting_separator', $shop_product_sorting_separator, 'responsive_woocommerce_shop', 75 );

			$sorting_option_text_label = __( 'Sorting Options text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sorting_option_text', $sorting_option_text_label, 'responsive_woocommerce_shop', 75, '#333333' );

			$sorting_option_background_label = __( 'Sorting Options background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'sorting_option_background', $sorting_option_background_label, 'responsive_woocommerce_shop', 75, '#ffffff' );

		}
	}

endif;

return new Responsive_Woocommerce_Shop_Colors_Customizer();
