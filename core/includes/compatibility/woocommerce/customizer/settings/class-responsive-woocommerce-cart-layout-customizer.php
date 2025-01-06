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
					'responsive_woocommerce_cart',
					array(
						'title'    => esc_html__( 'Cart Options', 'responsive' ),
						'panel'    => 'woocommerce',
						'priority' => 130,
					)
				);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_cart_layout_seperator',
				$general_tab_ids_prefix . 'responsive_disable_cart_fragments',
				$general_tab_ids_prefix . 'responsive_cart_content_width',
				$general_tab_ids_prefix . 'responsive_menu_cart_icon',
			);


			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_cart_cart_button_separator',
				$design_tab_ids_prefix . 'responsive_cart_buttons_color',
				$design_tab_ids_prefix . 'responsive_cart_buttons_text_color',
				$design_tab_ids_prefix . 'responsive_cart_buttons_hover_color',
				$design_tab_ids_prefix . 'responsive_cart_buttons_hover_text_color',
				$design_tab_ids_prefix . 'responsive_cart_checkout_button_separator',
				$design_tab_ids_prefix . 'responsive_cart_checkout_button_color',
				$design_tab_ids_prefix . 'responsive_cart_checkout_button_text_color',
				$design_tab_ids_prefix . 'responsive_cart_checkout_button_hover_color',
				$design_tab_ids_prefix . 'responsive_cart_checkout_button_hover_text_color',
				$design_tab_ids_prefix . 'responsive_cart_buttons_separator',
				$design_tab_ids_prefix . 'responsive_cart_checkout_buttons_separator',
				$design_tab_ids_prefix . 'responsive_checkout_buttons_separator',
				$design_tab_ids_prefix . 'responsive_cart_color',
			
			);

		
			responsive_tabs_button_control( $wp_customize, 'woocommerce_cart_tabs', $tabs_label, 'responsive_woocommerce_cart', 1, '', 'responsive_woocommerce_cart_general_tab', 'responsive_woocommerce_cart_design_tab', $general_tab_ids, $design_tab_ids, null );

				// Layout Seperator
				$cart_layout_separator = esc_html__( 'Layout', 'responsive' );
				responsive_separator_control( $wp_customize, 'cart_layout_seperator', $cart_layout_separator, 'responsive_woocommerce_cart', 1 );

				// Main Content Width.
				$shop_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
				responsive_drag_number_control( $wp_customize, 'cart_content_width', $shop_content_width_label, 'responsive_woocommerce_cart', 10, 70, null, 100, 1, 'postMessage' );

				$cart_page_id   = wc_get_page_id( 'cart' );
				$is_cart_block_present = has_block( 'woocommerce/cart', $cart_page_id );
				if( ! $is_cart_block_present ) {
					$enable_crosssells_options_label = esc_html__( 'Enable Cross-sells', 'responsive' );
					responsive_toggle_control( $wp_customize, 'enable_crosssells_options', $enable_crosssells_options_label, 'responsive_woocommerce_cart', 2, 1, null );
				}

				$disable_cart_fragments_label = esc_html__( 'Disable Cart Fragments', 'responsive' );
				responsive_toggle_control( $wp_customize, 'disable_cart_fragments', $disable_cart_fragments_label, 'responsive_woocommerce_cart', 2, 0, null );

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
							'section'     => 'responsive_woocommerce_cart',
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
