<?php
/**
 * WooCommerce Shop Pagination Style & Checkout Width Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Shop_Pagination_Style_Customizer' ) ) :

	/**
	 * Shop pagination shape (square/circle) and the checkout form width.
	 */
	class Responsive_Woocommerce_Shop_Pagination_Style_Customizer {

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

			/*
			------------------------------------------------------------------
			// Shop Pagination Style
			-------------------------------------------------------------------
			*/
			$wp_customize->add_setting(
				'shop_pagination_style',
				array(
					'default'           => 'square',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
					$wp_customize,
					'shop_pagination_style',
					array(
						'active_callback' => 'responsive_addons_pagination_callbacks',
						'label'           => __( 'Shop Pagination Style', 'responsive' ),
						'section'         => 'responsive_woocommerce_shop',
						'settings'        => 'shop_pagination_style',
						'priority'        => 52,
						'choices'         => array(
							'square' => __( 'Square', 'responsive' ),
							'circle' => __( 'Circle', 'responsive' ),
						),
					)
				)
			);

			/*
			------------------------------------------------------------------
			// Checkout Width
			-------------------------------------------------------------------
			*/
			$wp_customize->add_setting(
				'responsive_checkout_width',
				array(
					'transport'         => 'refresh',
					'default'           => '960',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_checkout_width',
					array(
						'label'       => __( 'Checkout Form Width (px)', 'responsive' ),
						'section'     => 'woocommerce_checkout',
						'settings'    => 'responsive_checkout_width',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 4096,
							'step' => 1,
						),
					)
				)
			);
		}
	}

endif;

return new Responsive_Woocommerce_Shop_Pagination_Style_Customizer();
