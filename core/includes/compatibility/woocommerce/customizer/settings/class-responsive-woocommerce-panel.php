<?php
/**
 * Links Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Panel' ) ) :
	/**
	 * Links Customizer Options
	 */
	class Responsive_Woocommerce_Panel {

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

			$wp_customize->add_panel(
				'responsive-woocommerce-shop',
				array(
					'title'       => __( 'Product Catalog Options', 'responsive' ),
					'description' => __( 'Shop Options', 'responsive' ),
					'priority'    => 210,
				)
			);

			$wp_customize->add_panel(
				'responsive-woocommerce-single-product',
				array(
					'title'       => __( 'Product Options', 'responsive' ),
					'description' => __( 'Single Product Options', 'responsive' ),
					'priority'    => 220,
				)
			);

			$wp_customize->add_panel(
				'responsive-woocommerce-cart',
				array(
					'title'       => __( 'Cart Options', 'responsive' ),
					'description' => __( 'Cart Options', 'responsive' ),
					'priority'    => 230,
				)
			);

		}
	}

endif;

return new Responsive_Woocommerce_Panel();
