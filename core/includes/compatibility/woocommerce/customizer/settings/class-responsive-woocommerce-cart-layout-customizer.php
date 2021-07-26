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
				responsive_drag_number_control( $wp_customize, 'cart_content_width', $shop_content_width_label, 'responsive_woocommerce_cart_layout', 10, 70, null, 100, 1, 'postMessage' );

				$enable_crosssells_options_label = esc_html__( 'Enable Cross-sells', 'responsive' );
				responsive_checkbox_control( $wp_customize, 'enable_crosssells_options', $enable_crosssells_options_label, 'responsive_woocommerce_cart_layout', 2, 1, null );

				$disable_cart_fragments_label = esc_html__( 'Disable Cart Fragments', 'responsive' );
				responsive_checkbox_control( $wp_customize, 'disable_cart_fragments', $disable_cart_fragments_label, 'responsive_woocommerce_cart_layout', 2, 0, null );

				$wp_customize->add_setting(
					'responsive_menu_cart_icon',
					array(
						'sanitize_callback' => 'responsive_sanitize_select',
						'transport'         => 'refresh',
						'default'           => 'disabled',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Select_Control(
						$wp_customize,
						'responsive_menu_cart_icon',
						array(
							'label'       => __( 'Cart Icon Visibility', 'responsive' ),
							'description' => __( 'Cart Icon Will be displayed only when Header Menu is set', 'responsive' ),
							'section'     => 'responsive_woocommerce_cart_layout',
							'settings'    => 'responsive_menu_cart_icon',
							'choices'     => array(
								'icon-opencart' => __( 'Display On All Devices', 'responsive' ),
								'disabled'      => __( 'Disabled On All Devices', 'responsive' ),
							),
						)
					)
				);
			}
		}

	endif;

	return new Responsive_Woocommerce_Cart_Layout_Customizer();

}
