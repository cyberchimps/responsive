<?php
/**
 * All helper functions for woocommerce helper
 *
 *
 * @package Responsive
 */

namespace Responsive\WooCommerce;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp', $n( 'woocommerce_checkout' ) );

}

if ( ! function_exists( 'responsive_woo_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function responsive_woo_woocommerce_template_loop_product_title() {

		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="responsive-loop-product__link">';
		responsive_template_loop_product_title();
		echo '</a>';
	}
}


if ( ! function_exists( 'responsive_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function responsive_template_loop_product_title() {
		echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'responsive_woocommerce_shop_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @since 1.1.0
	 */
	function responsive_woocommerce_shop_elements_positioning() {

		// Default sections.
		$sections = array( 'category', 'title', 'price', 'short_desc', 'ratings', 'add_cart' );

		// Get sections from Customizer.
		$sections = get_theme_mod( 'responsive_woocommerce_shop_elements_positioning', $sections );

		// Turn into array if string.
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for easy modification.
		$sections = apply_filters( 'responsive_woocommerce_shop_elements_positioning', $sections );

		// Return sections.
		return $sections;

	}
}

if ( ! function_exists( 'responsive_woocommerce_product_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @since 1.1.0
	 */
	function responsive_woocommerce_product_elements_positioning() {

		// Default sections.
		$sections = array( 'title', 'price', 'ratings', 'short_desc', 'add_cart', 'meta' );

		// Get sections from Customizer.
		$sections = get_theme_mod( 'responsive_woocommerce_product_elements_positioning', $sections );

		// Turn into array if string.
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for easy modification.
		$sections = apply_filters( 'responsive_woocommerce_product_elements_positioning', $sections );

		// Return sections.
		return $sections;

	}
}
/**
 * Shop page - Short Description
 */
if ( ! function_exists( 'responsive_woo_shop_product_short_description' ) ) {
	/**
	 * Product short description
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_product_short_description() {
		if ( has_excerpt() ) {
			the_excerpt();
		}
	}
}
/**
 * Shop page - Category
 */
if ( ! function_exists( 'responsive_woo_shop_parent_category' ) ) {
	/**
	 * Product Category
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_parent_category() {
		if ( apply_filters( 'responsive_woo_shop_parent_category', true ) ) {

			echo '<p class="responsive_woo_shop_parent_category">';

			global $product;
			$product_categories = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), ';', '', '' ) : $product->get_categories( ';', '', '' );

			$product_categories = htmlspecialchars_decode( wp_strip_all_tags( $product_categories ) );
			if ( $product_categories ) {
				list($parent_cat) = explode( ';', $product_categories );
				echo esc_html( $parent_cat );
			}
			echo '</p>';
		}
	}
}

/**
 * Checkout customization.
 *
 * @return void
 */
function woocommerce_checkout() {

	if ( is_admin() ) {
		return;
	}

		/**
		 * Checkout Page
		 */
		add_action( 'woocommerce_checkout_billing', array( WC()->checkout(), 'checkout_form_shipping' ) );

	// Checkout Page.
	remove_action( 'woocommerce_checkout_shipping', array( WC()->checkout(), 'checkout_form_shipping' ) );
}

if ( ! function_exists( 'check_is_responsive_addons_greater' ) ) {
	/**
	 * Check if Responsive Addons is installed.
	 */
	function check_is_responsive_addons_greater() {
		if ( is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) {
			$raddons_version    = get_plugin_data( WP_PLUGIN_DIR . '/responsive-add-ons/responsive-add-ons.php' )['Version'];
			$is_raddons_greater = false;
			if ( version_compare( $raddons_version, '3.0.0', '>=' ) ) {
				$is_raddons_greater = true;
			}
			return $is_raddons_greater;
		}
		return false;
	}
}
