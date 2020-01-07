<?php
/**
 * WooCommerce single product Layout Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Single_Product_Layout_Customizer' ) ) :
	/** Layout Customizer Options */
	class Responsive_Woocommerce_Single_Product_Layout_Customizer {

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
				'responsive_woocommerce_single_product_section',
				array(
					'title'    => esc_html__( 'Single Product', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 290,
				)
			);
			$wp_customize->add_setting(
				'responsive_single_product_gallery_layout',
				array(
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
					'default'           => 'horizontal',
				)
			);
			$wp_customize->add_control(
				'responsive_single_product_gallery_layout',
				array(
					'label'    => __( 'Gallery Layout', 'responsive' ),
					'section'  => 'responsive_woocommerce_single_product_section',
					'settings' => 'responsive_single_product_gallery_layout',
					'type'     => 'select',
					'choices'  => array(
						'vertical'   => __( 'Vertical', 'responsive' ),
						'horizontal' => __( 'Horizontal', 'responsive' ),
					),
				)
			);
			$wp_customize->add_setting(
				'responsive_woocommerce_product_elements_positioning',
				array(
					'default'           => array( 'title', 'ratings', 'price', 'add_cart', 'meta' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_woocommerce_product_elements_positioning',
					array(
						'label'    => esc_html__( 'Single Product Structure', 'responsive' ),
						'section'  => 'responsive_woocommerce_single_product_section',
						'settings' => 'responsive_woocommerce_product_elements_positioning',
						'priority' => 10,
						'choices'  => responsive_product_elements(),
					)
				)
			);

		}


	}

endif;

return new Responsive_Woocommerce_Single_Product_Layout_Customizer();
