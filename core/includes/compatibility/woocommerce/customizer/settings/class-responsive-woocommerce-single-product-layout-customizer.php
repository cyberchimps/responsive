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
				'responsive_woocommerce_single_product_layout',
				array(
					'title'    => esc_html__( 'Layouts', 'responsive' ),
					'panel'    => 'responsive-woocommerce-single-product',
					'priority' => 10,
				)
			);

			// Layouts.
			$single_product_layout_elements_label = esc_html__( 'Layouts', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_layout_elements_separator', $single_product_layout_elements_label, 'responsive_woocommerce_single_product_layout', 10 );

			// Main Content Width.
			$single_product_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_product_content_width', $single_product_content_width_label, 'responsive_woocommerce_single_product_layout', 20, 100, null, 100, 1, 'postMessage' );

			// Sidebar Position.
			$sidebar_label   = esc_html__( 'Sidebar Position', 'responsive' );
			$sidebar_choices = array(
				'right' => esc_html__( 'Right Sidebar', 'responsive' ),
				'left'  => esc_html__( 'Left Sidebar', 'responsive' ),
				'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices = array(
					'right' => esc_html__( 'Left Sidebar', 'responsive' ),
					'left'  => esc_html__( 'Right Sidebar', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'single_product_sidebar_position', $sidebar_label, 'responsive_woocommerce_single_product_layout', 30, $sidebar_choices, 'no', null );

			// Product Elements.
			$single_product_elements_label = esc_html__( 'Product Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_elements_separator', $single_product_elements_label, 'responsive_woocommerce_single_product_layout', 40 );

			// Gallery Layout.
			$single_product_gallery_layout_label   = esc_html__( 'Gallery Layout', 'responsive' );
			$single_product_gallery_layout_choices = array(
				'vertical'   => __( 'Vertical', 'responsive' ),
				'horizontal' => __( 'Horizontal', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_product_gallery_layout', $single_product_gallery_layout_label, 'responsive_woocommerce_single_product_layout', 50, $single_product_gallery_layout_choices, 'horizontal', null );

			$wp_customize->add_setting(
				'responsive_woocommerce_product_elements_positioning',
				array(
					'default'           => array( 'title', 'ratings', 'price', 'short_desc', 'add_cart', 'meta' ),
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
						'section'  => 'responsive_woocommerce_single_product_layout',
						'settings' => 'responsive_woocommerce_product_elements_positioning',
						'priority' => 60,
						'choices'  => responsive_product_elements(),
					)
				)
			);

		}


	}

endif;

return new Responsive_Woocommerce_Single_Product_Layout_Customizer();
