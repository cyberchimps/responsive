<?php
/**
 * Create WooCommerce General section in customizer
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

	if ( ! class_exists( 'Responsive_Woocommerce_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Woocommerce_Customizer {

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
					'responsive_woocommerce_section',
					array(
						'title'    => esc_html__( 'WooCommerce', 'responsive' ),
						'panel'    => 'responsive-layout-options',
						'priority' => 295,
					)
				);

			}
		}

	endif;

	return new Responsive_Woocommerce_Customizer();

}
