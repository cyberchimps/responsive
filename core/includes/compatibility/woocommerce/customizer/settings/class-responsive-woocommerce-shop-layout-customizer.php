<?php
/**
 * WooCommerce Shop Page Layout Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Shop_Layout_Customizer' ) ) :
	/** Layout Customizer Options */
	class Responsive_Woocommerce_Shop_Layout_Customizer {

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

			$wp_customize->add_section(
				'responsive_woocommerce_shop_page_section',
				array(
					'title'    => esc_html__( 'Shop', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 295,
				)
			);

			$wp_customize->add_setting(
				'responsive_woocommerce_shop_elements_positioning',
				array(
					'default'           => array( 'title', 'category', 'price', 'ratings', 'add_cart' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_woocommerce_shop_elements_positioning',
					array(
						'label'    => esc_html__( 'Shop Products Structure', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop_page_section',
						'settings' => 'responsive_woocommerce_shop_elements_positioning',
						'priority' => 10,
						'choices'  => responsive_shoppage_elements(),
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_woocommerce_catalog_view',
				array(
					'default'           => 'grid',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'responsive_woocommerce_catalog_view',
				array(
					'label'    => __( 'Shop Products Catalog View', 'responsive' ),
					'section'  => 'responsive_woocommerce_shop_page_section',
					'settings' => 'responsive_woocommerce_catalog_view',
					'type'     => 'select',
					'choices'  => array(
						'grid' => esc_html__( 'Grid View', 'responsive' ),
						'list' => esc_html__( 'List View', 'responsive' ),
					),
				)
			);

			$wp_customize->add_setting(
				'shop_pagination',
				array(
					'default'           => 'default',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				'shop_pagination',
				array(
					'label'    => __( 'Shop Pagination', 'responsive' ),
					'section'  => 'responsive_woocommerce_shop_page_section',
					'settings' => 'shop_pagination',
					'type'     => 'select',
					'choices'  => array(
						'default'  => esc_html__( 'Default', 'responsive' ),
						'infinite' => esc_html__( 'Infinite', 'responsive' ),
					),
				)
			);

			$wp_customize->add_setting(
				'responsive_container_background_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
				)
			);

		}
	}

endif;

return new Responsive_Woocommerce_Shop_Layout_Customizer();
