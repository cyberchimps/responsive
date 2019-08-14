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

	if ( ! class_exists( 'Responsive_Woocommerce_General_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Woocommerce_General_Customizer {

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
					'responsive_woocommerce_general_section',
					array(
						'title'    => esc_html__( 'General', 'responsive' ),
						'panel'    => 'woocommerce',
						'priority' => 9,
					)
				);
				$wp_customize->add_setting(
					'responsive_product_sale_notification',
					array(
						'sanitize_callback' => 'responsive_sanitize_select',
						'transport'         => 'refresh',
						'default'           => 'default',
					)
				);
				$wp_customize->add_control(
					'responsive_product_sale_notification',
					array(
						'label'    => __( 'Sale Notification', 'responsive' ),
						'section'  => 'responsive_woocommerce_general_section',
						'settings' => 'responsive_product_sale_notification',
						'type'     => 'select',
						'choices'  => array(
							'none'            => __( 'None', 'responsive' ),
							'default'         => __( 'Default', 'responsive' ),
							'sale-percentage' => __( 'Custom String', 'responsive' ),
						),
					)
				);
				$wp_customize->add_setting(
					'responsive_sale_percent_value',
					array(
						'sanitize_callback' => 'wp_filter_nohtml_kses',
						'transport'         => 'refresh',
						'default'           => '-[value]%',
					)
				);
				$wp_customize->add_control(
					'responsive_sale_percent_value',
					array(
						'label'           => __( 'Sale % Value', 'responsive' ),
						'section'         => 'responsive_woocommerce_general_section',
						'settings'        => 'responsive_sale_percent_value',
						'type'            => 'text',
						'active_callback' => 'responsive_check_product_price_custom_string',
					)
				);
				$wp_customize->add_setting(
					'responsive_product_sale_style',
					array(
						'transport'         => 'refresh',
						'default'           => 'circle',
						'sanitize_callback' => 'responsive_sanitize_select',
					)
				);
				$wp_customize->add_control(
					'responsive_product_sale_style',
					array(
						'label'    => __( 'Sale Bubble Style', 'responsive' ),
						'section'  => 'responsive_woocommerce_general_section',
						'settings' => 'responsive_product_sale_style',
						'type'     => 'select',
						'choices'  => array(
							'circle'         => __( 'Circle', 'responsive' ),
							'circle-outline' => __( 'Circle Outline', 'responsive' ),
							'square'         => __( 'Square', 'responsive' ),
							'square-outline' => __( 'Square Outline', 'responsive' ),
						),
					)
				);
			}
		}

	endif;

	return new Responsive_Woocommerce_General_Customizer();

}
