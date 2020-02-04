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

	if ( ! class_exists( 'Responsive_Woocommerce_Cart_Layout_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Woocommerce_Cart_Layout_Customizer {

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
					'responsive_woocommerce_cart_layout',
					array(
						'title'    => esc_html__( 'Layouts', 'responsive' ),
						'panel'    => 'responsive-woocommerce-cart',
						'priority' => 10,
					)
				);

				// Main Content Width.
				$shop_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
				responsive_drag_number_control( $wp_customize, 'cart_content_width', $shop_content_width_label, 'responsive_woocommerce_cart_layout', 10, 70, null, 100 );

				$enable_upsells_options_label = esc_html__( 'Enable Upsells', 'responsive' );
				responsive_checkbox_control( $wp_customize, 'enable_upsells_options', $enable_upsells_options_label, 'responsive_woocommerce_cart_layout', 20, 1, null );
			}
		}

	endif;

	return new Responsive_Woocommerce_Cart_Layout_Customizer();

}
