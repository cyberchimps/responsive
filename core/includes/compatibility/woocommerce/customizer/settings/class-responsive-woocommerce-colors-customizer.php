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

	if ( ! class_exists( 'Responsive_Woocommerce_Colors_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Woocommerce_Colors_Customizer {

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
					'responsive_woocommerce_colors_section',
					array(
						'title'    => esc_html__( 'Colors', 'responsive' ),
						'panel'    => 'woocommerce',
						'priority' => 296,
					)
				);
				$wp_customize->add_setting(
					'responsive_product_rating_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_product_rating_color',
						array(
							'label'    => esc_html__( 'Product Rating Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_product_rating_color',
							'priority' => 10,
						)
					)
				);

				$wp_customize->add_setting(
					'responsive_shop_product_title_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_shop_product_title_color',
						array(
							'label'    => esc_html__( 'Shop Product Title Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_shop_product_title_color',
							'priority' => 10,
						)
					)
				);
				$wp_customize->add_setting(
					'responsive_shop_product_price_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_shop_product_price_color',
						array(
							'label'    => esc_html__( 'Shop Product Price Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_shop_product_price_color',
							'priority' => 10,
						)
					)
				);
				$wp_customize->add_setting(
					'responsive_shop_product_content_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_shop_product_content_color',
						array(
							'label'    => esc_html__( 'Shop Product Content Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_shop_product_content_color',
							'priority' => 10,
						)
					)
				);

				$wp_customize->add_setting(
					'responsive_product_title_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_product_title_color',
						array(
							'label'    => esc_html__( 'Product Title Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_product_title_color',
							'priority' => 10,
						)
					)
				);
				$wp_customize->add_setting(
					'responsive_product_price_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_product_price_color',
						array(
							'label'    => esc_html__( 'Product Price Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_product_price_color',
							'priority' => 10,
						)
					)
				);
				$wp_customize->add_setting(
					'responsive_product_content_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_product_content_color',
						array(
							'label'    => esc_html__( 'Product Content Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_product_content_color',
							'priority' => 10,
						)
					)
				);
				$wp_customize->add_setting(
					'responsive_product_breadcrumb_color',
					array(
						'type'              => 'theme_mod',
						'sanitize_callback' => 'responsive_sanitize_color',
						'transport'         => 'refresh',
						'default'           => '#585858',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Color_Control(
						$wp_customize,
						'responsive_product_breadcrumb_color',
						array(
							'label'    => esc_html__( 'Product Breadcrumb Color', 'responsive' ),
							'section'  => 'responsive_woocommerce_colors_section',
							'settings' => 'responsive_product_breadcrumb_color',
							'priority' => 10,
						)
					)
				);
			}
		}

	endif;

	return new Responsive_Woocommerce_Colors_Customizer();

}
