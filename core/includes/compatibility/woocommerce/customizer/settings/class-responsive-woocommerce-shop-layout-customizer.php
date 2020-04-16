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
				'responsive_woocommerce_shop_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive-woocommerce-shop',
					'priority' => 10,
				)
			);

			// Layouts.
			$shop_layout_elements_label = esc_html__( 'Layouts', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_layout_elements_separator', $shop_layout_elements_label, 'responsive_woocommerce_shop_layout', 10 );

			// Main Content Width.
			$shop_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'shop_content_width', $shop_content_width_label, 'responsive_woocommerce_shop_layout', 20, 100, null, 100, 1, 'postMessage' );

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
			responsive_select_control( $wp_customize, 'shop_sidebar_position', $sidebar_label, 'responsive_woocommerce_shop_layout', 30, $sidebar_choices, 'no', null );

			// Shop Elements.
			$shop_elements_label = esc_html__( 'Shop Product', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_elements_separator', $shop_elements_label, 'responsive_woocommerce_shop_layout', 40 );

			// Catalog View.
			$woocommerce_catalog_view_label   = esc_html__( 'Catalog View', 'responsive' );
			$woocommerce_catalog_view_choices = array(
				'grid' => esc_html__( 'Grid View', 'responsive' ),
				'list' => esc_html__( 'List View', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'woocommerce_catalog_view', $woocommerce_catalog_view_label, 'responsive_woocommerce_shop_layout', 50, $woocommerce_catalog_view_choices, 'grid', null );

			// Product content Aligmnment.
			$product_content_aligmnment_label   = esc_html__( 'Content Aligmnment', 'responsive' );
			$product_content_aligmnment_choices = array(
				'center' => esc_html__( 'Center', 'responsive' ),
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
			);
			if ( is_rtl() ) {
				$product_content_aligmnment_choices = array(
					'right'  => esc_html__( 'Left', 'responsive' ),
					'left'   => esc_html__( 'Right', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'product_content_aligmnment', $product_content_aligmnment_label, 'responsive_woocommerce_shop_layout', 60, $product_content_aligmnment_choices, 'center', null );

			// Shop Elements.
			$wp_customize->add_setting(
				'responsive_woocommerce_shop_elements_positioning',
				array(
					'default'           => array( 'title', 'category', 'price', 'short_desc', 'ratings', 'add_cart' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_woocommerce_shop_elements_positioning',
					array(
						'label'    => esc_html__( 'Shop Elements', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop_layout',
						'settings' => 'responsive_woocommerce_shop_elements_positioning',
						'priority' => 70,
						'choices'  => responsive_shoppage_elements(),
					)
				)
			);
			// Sale Notification.
			$product_sale_notification_label   = esc_html__( 'Sale Notification', 'responsive' );
			$product_sale_notification_choices = array(
				'none'            => __( 'None', 'responsive' ),
				'default'         => __( 'Default', 'responsive' ),
				'sale-percentage' => __( 'Custom String', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'product_sale_notification', $product_sale_notification_label, 'responsive_woocommerce_shop_layout', 80, $product_sale_notification_choices, 'default', null );

			// Sale % Value.
			$sale_percent_value_label = esc_html__( 'Sale % Value', 'responsive' );
			responsive_text_control( $wp_customize, 'sale_percent_value', $sale_percent_value_label, 'responsive_woocommerce_shop_layout', 90, '-[value]%', 'responsive_check_product_price_custom_string' );

			// Sale Notification.
			$product_sale_style_label   = esc_html__( 'Sale Bubble Style', 'responsive' );
			$product_sale_style_choices = array(
				'circle'         => __( 'Circle', 'responsive' ),
				'circle-outline' => __( 'Circle Outline', 'responsive' ),
				'square'         => __( 'Square', 'responsive' ),
				'square-outline' => __( 'Square Outline', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'product_sale_style', $product_sale_style_label, 'responsive_woocommerce_shop_layout', 100, $product_sale_style_choices, 'circle', null );

		}
	}

endif;

return new Responsive_Woocommerce_Shop_Layout_Customizer();
