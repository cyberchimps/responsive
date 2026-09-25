<?php
/**
 * WooCommerce - Customizer Selective Refresh Partials.
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Native_Cart_Popup_Partials' ) ) {

	/**
	 * Responsive_Woocommerce_Native_Cart_Popup_Partials initial setup.
	 *
	 * @since 6.5.0
	 */
	class Responsive_Woocommerce_Native_Cart_Popup_Partials {

		/**
		 * Render the "Load More" text for selective refresh partial.
		 *
		 * @since 6.5.0
		 *
		 * @return string The "Load More" button text.
		 */
		public function render_shop_load_more() {
			return get_theme_mod( 'shop-load-more-text', 'Load More' );
		}
	}
}
