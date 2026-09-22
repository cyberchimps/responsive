<?php
/**
 * WooCommerce Distraction Free Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'responsive_distraction_free_woocommerce' ) ) {
	/**
	 * Active callback: is Distraction Free WooCommerce enabled.
	 *
	 * @return bool
	 */
	function responsive_distraction_free_woocommerce() {
		return ( 1 === get_theme_mod( 'responsive_distraction_free_woocommerce', 0 ) );
	}
}

if ( ! class_exists( 'Responsive_Woocommerce_Distraction_Free_Customizer' ) ) :

	/**
	 * WooCommerce Header & Footer (Distraction Free) Customizer Options
	 */
	class Responsive_Woocommerce_Distraction_Free_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 6.5.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}

		/**
		 * Customizer options
		 *
		 * @param object $wp_customize WordPress customizer options.
		 */
		public function customizer_options( $wp_customize ) {

			$wp_customize->add_section(
				'responsive_woocommerce_distraction_free',
				array(
					'title'    => esc_html__( 'Distraction Free', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 6,
				)
			);

			// Distraction free.
			$distraction_free_woocommerce = __( 'Enable Distraction free WooCommerce', 'responsive' );
			responsive_toggle_control( $wp_customize, 'distraction_free_woocommerce', $distraction_free_woocommerce, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_active_site_layout_contained' );

			// Disable header footer on shop page.
			$disable_shop_header_footer = __( 'Disable Header & Footer on Shop Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_shop_header_footer', $disable_shop_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );

			// Disable header footer on single product page.
			$disable_single_product_header_footer = __( 'Disable Header & Footer on Single Product Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_single_product_header_footer', $disable_single_product_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );

			// Disable header footer on cart page.
			$disable_cart_header_footer = __( 'Disable Header & Footer on Cart Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_cart_header_footer', $disable_cart_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );

			// Disable header footer on checkout page.
			$disable_checkout_header_footer = __( 'Disable Header & Footer on Checkout Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_checkout_header_footer', $disable_checkout_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );

			// Disable header footer on account page.
			$disable_account_header_footer = __( 'Disable Header & Footer on Account Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_account_header_footer', $disable_account_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );

			// Disable header footer on product_category page.
			$disable_product_category_header_footer = __( 'Disable Header & Footer on Product Category Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_product_category_header_footer', $disable_product_category_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );

			// Disable header footer on product_tag page.
			$disable_product_tag_header_footer = __( 'Disable Header & Footer on Product Tag Page?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'disable_product_tag_header_footer', $disable_product_tag_header_footer, 'responsive_woocommerce_distraction_free', 10, 0, 'responsive_distraction_free_woocommerce' );
		}
	}

endif;

return new Responsive_Woocommerce_Distraction_Free_Customizer();
