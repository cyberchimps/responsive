<?php
/**
 * WooCommerce Quick View, Infinite Scroll Pagination & Native Cart Popup - Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Woocommerce_Native_Cart_Popup_Customizer' ) ) :

	/**
	 * Quick View / Infinite Scroll / Native Cart Popup Customizer Options
	 */
	class Responsive_Woocommerce_Native_Cart_Popup_Customizer {

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

			require_once __DIR__ . '/../partials/class-responsive-woocommerce-native-cart-popup-partials.php';

			/*
			------------------------------------------------------------------
			// Shop Pagination
			-------------------------------------------------------------------
			*/
			$wp_customize->add_setting(
				'shop_pagination',
				array(
					'default'           => 'default',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
					$wp_customize,
					'shop_pagination',
					array(
						'label'    => __( 'Shop Pagination', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop',
						'settings' => 'shop_pagination',
						'priority' => 51,
						'choices'  => array(
							'default'  => esc_html__( 'Default', 'responsive' ),
							'infinite' => esc_html__( 'Infinite', 'responsive' ),
						),
					)
				)
			);

			/*
			------------------------------------------------------------------
			// Quick View
			-------------------------------------------------------------------
			*/
			$wp_customize->add_setting(
				'shop_pagination_quick_view',
				array(
					'default'           => 'disabled',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
					$wp_customize,
					'shop_pagination_quick_view',
					array(
						'label'    => __( 'Shop Quick View', 'responsive' ),
						'section'  => 'responsive_woocommerce_shop',
						'settings' => 'shop_pagination_quick_view',
						'priority' => 54,
						'choices'  => array(
							'disabled'       => esc_html__( 'Disabled', 'responsive' ),
							'on-image'       => esc_html__( 'On Image', 'responsive' ),
							'on-image-click' => esc_html__( 'On Image Click', 'responsive' ),
							'after-summary'  => esc_html__( 'After Summary', 'responsive' ),
						),
					)
				)
			);

			$wp_customize->add_setting(
				'shop-infinite-scroll-event',
				array(
					'default'           => 'scroll',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Control(
					$wp_customize,
					'shop-infinite-scroll-event',
					array(
						'active_callback' => 'responsive_addons_pagination_trigger',
						'label'           => __( 'Event to Trigger Infinite Loading', 'responsive' ),
						'section'         => 'responsive_woocommerce_shop',
						'settings'        => 'shop-infinite-scroll-event',
						'priority'        => 52,
						'choices'         => array(
							'scroll' => __( 'Scroll', 'responsive' ),
							'click'  => __( 'Click', 'responsive' ),
						),
					)
				)
			);

			$wp_customize->add_setting(
				'shop-load-more-text',
				array(
					'default'           => 'Load More',
					'transport'         => 'refresh',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				'shop-load-more-text',
				array(
					'active_callback' => 'responsive_addons_load_more_callback',
					'label'           => __( 'Load More Text', 'responsive' ),
					'section'         => 'responsive_woocommerce_shop',
					'settings'        => 'shop-load-more-text',
					'type'            => 'text',
					'priority'        => 53,
					'partial'         => array(
						'selector'            => '.responsive-shop-pagination-infinite .responsive-load-more',
						'container_inclusive' => false,
						'render_callback'     => array( 'Responsive_Woocommerce_Native_Cart_Popup_Partials', 'render_shop_load_more' ),
					),
				)
			);

			/*
			------------------------------------------------------------------
			// Native Cart Popup
			-------------------------------------------------------------------
			*/
			$native_cart_popup_separator = esc_html__( 'Native Cart Popup', 'responsive' );
			responsive_separator_control( $wp_customize, 'native_cart_popup_separator', $native_cart_popup_separator, 'responsive_woocommerce_shop', 150 );

			// Enable Popup.
			$enable_popup = esc_html__( 'Enable Popup', 'responsive' );
			responsive_toggle_control( $wp_customize, 'enable_native_cart_popup', $enable_popup, 'responsive_woocommerce_shop', 150, 0, null, 'refresh' );

			// Display Popup in customizer.
			$display_popup = esc_html__( 'Preview Popup In Customizer', 'responsive' );
			$desc          = 'This checkbox is just to allow you to display the popup in the customizer preview.';
			responsive_toggle_control( $wp_customize, 'native_cart_popup_display', $display_popup, 'responsive_woocommerce_shop', 150, 0, 'enable_native_cart_popup_check', 'postMessage', $desc );

			// Positioning of popup elements.
			$elements = apply_filters(
				'responsive_popup_elements',
				array(
					'title'       => esc_html__( 'Title', 'responsive' ),
					'content'     => esc_html__( 'Content', 'responsive' ),
					'buttons'     => esc_html__( 'Buttons', 'responsive' ),
					'bottom_text' => esc_html__( 'Bottom Text', 'responsive' ),
				)
			);

			$wp_customize->add_setting(
				'responsive_popup_elements_positioning',
				array(
					'default'           => array( 'title', 'content', 'buttons', 'bottom_text' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_popup_elements_positioning',
					array(
						'label'           => esc_html__( 'Elements Positioning', 'responsive' ),
						'section'         => 'responsive_woocommerce_shop',
						'settings'        => 'responsive_popup_elements_positioning',
						'priority'        => 150,
						'choices'         => $elements,
						'active_callback' => 'enable_native_cart_popup_check',
					)
				)
			);

			// Popup Title Text.
			$popup_title_text = __( 'Title Text', 'responsive' );
			responsive_text_control( $wp_customize, 'popup_title_text', $popup_title_text, 'responsive_woocommerce_shop', 150, 'Item added to your cart', 'enable_native_cart_popup_check', 'sanitize_text_field', 'text', 'postMessage' );

			// Popup Content.
			$default_content = esc_html__( '[responsive_woo_cart_items] items in the cart ([responsive_woo_total_cart])', 'responsive' );
			$popup_content    = __( 'Content', 'responsive' );
			responsive_text_control( $wp_customize, 'popup_content', $popup_content, 'responsive_woocommerce_shop', 150, $default_content, 'enable_native_cart_popup_check', 'sanitize_text_field', 'textarea', 'postMessage' );

			// Continue Button Text.
			$popup_continue_btn_text = __( 'Continue Button Text', 'responsive' );
			responsive_text_control( $wp_customize, 'popup_continue_btn_text', $popup_continue_btn_text, 'responsive_woocommerce_shop', 150, 'Continue Shopping', 'enable_native_cart_popup_check', 'sanitize_text_field', 'text', 'postMessage' );

			// Go cart Button Text.
			$popup_cart_btn_text = __( 'Go Cart Button Text', 'responsive' );
			responsive_text_control( $wp_customize, 'popup_cart_btn_text', $popup_cart_btn_text, 'responsive_woocommerce_shop', 150, 'Go To The Cart', 'enable_native_cart_popup_check', 'sanitize_text_field', 'text', 'postMessage' );

			// Bottom Text.
			$default_bottom_text = esc_html__( '[responsive_woo_free_shipping_left]', 'responsive' );
			$popup_bottom_text    = __( 'Bottom Text', 'responsive' );
			responsive_text_control( $wp_customize, 'popup_bottom_text', $popup_bottom_text, 'responsive_woocommerce_shop', 150, $default_bottom_text, 'enable_native_cart_popup_check', 'sanitize_text_field', 'text', 'postMessage' );

			// Styling - Layout.
			$native_cart_popup_styling_separator = esc_html__( 'Native Cart Popup Styling', 'responsive' );
			responsive_separator_control( $wp_customize, 'native_cart_popup_styling_separator', $native_cart_popup_styling_separator, 'responsive_woocommerce_shop', 160, 'enable_native_cart_popup_check' );

			// Popup Width.
			$popup_width = esc_html__( 'Popup Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'popup_width', $popup_width, 'responsive_woocommerce_shop', 160, 600, 'enable_native_cart_popup_check', 5000, 20, 'postMessage' );

			$popup_width_tablet = esc_html__( 'Popup Tablet Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'popup_width_tablet', $popup_width_tablet, 'responsive_woocommerce_shop', 160, 600, 'enable_native_cart_popup_check', 5000, 20, 'postMessage' );

			$popup_width_mobile = esc_html__( 'Popup Mobile Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'popup_width_mobile', $popup_width_mobile, 'responsive_woocommerce_shop', 160, 600, 'enable_native_cart_popup_check', 5000, 20, 'postMessage' );

			// Popup Height.
			$popup_height = esc_html__( 'Popup Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'popup_height', $popup_height, 'responsive_woocommerce_shop', 160, 600, 'enable_native_cart_popup_check', 5000, 20, 'postMessage' );

			$popup_height_tablet = esc_html__( 'Popup Tablet Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'popup_height_tablet', $popup_height_tablet, 'responsive_woocommerce_shop', 160, 350, 'enable_native_cart_popup_check', 5000, 20, 'postMessage' );

			$popup_height_mobile = esc_html__( 'Popup Mobile Height (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'popup_height_mobile', $popup_height_mobile, 'responsive_woocommerce_shop', 160, 450, 'enable_native_cart_popup_check', 5000, 20, 'postMessage' );

			// Popup Padding.
			$popup_padding = esc_html__( 'Popup Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'popup', 'responsive_woocommerce_shop', 160, 50, 25, 'enable_native_cart_popup_check', $popup_padding );

			// Popup radius.
			$popup_radius = esc_html__( 'Popup Border Radius (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'popup_radius', 'responsive_woocommerce_shop', 160, 600, 600, 'enable_native_cart_popup_check', $popup_radius );

			// Styling - Colors.
			$native_cart_popup_styling_color_separator = esc_html__( 'Native Cart Popup', 'responsive' );
			responsive_separator_control( $wp_customize, 'native_cart_popup_styling_color_separator', $native_cart_popup_styling_color_separator, 'responsive_woocommerce_shop', 165, 'enable_native_cart_popup_check' );

			$popup_bg = __( 'Popup Background', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_bg', $popup_bg, 'responsive_woocommerce_shop', 165, '#ffffff', 'enable_native_cart_popup_check' );

			$popup_overlay = __( 'Popup Overlay color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_overlay', $popup_overlay, 'responsive_woocommerce_shop', 165, 'rgba(0,0,0,0.7)', 'enable_native_cart_popup_check' );

			$popup_checkmark_bg = __( 'Check Mark Background', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_checkmark_bg', $popup_checkmark_bg, 'responsive_woocommerce_shop', 165, '#5bc142', 'enable_native_cart_popup_check' );

			$popup_checkmark = __( 'Check Mark Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_checkmark', $popup_checkmark, 'responsive_woocommerce_shop', 165, '#ffffff', 'enable_native_cart_popup_check' );

			$popup_title_color = __( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_title', $popup_title_color, 'responsive_woocommerce_shop', 165, '#333333', 'enable_native_cart_popup_check' );

			$popup_content_color = __( 'Content Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_content', $popup_content_color, 'responsive_woocommerce_shop', 165, '#777777', 'enable_native_cart_popup_check' );

			$popup_continue_btn_bg = __( 'Continue Button Background', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_continue_btn_bg', $popup_continue_btn_bg, 'responsive_woocommerce_shop', 165, '#0066CC', 'enable_native_cart_popup_check' );

			$popup_continue_btn_color = __( 'Continue Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_continue_btn', $popup_continue_btn_color, 'responsive_woocommerce_shop', 165, '#ffffff', 'enable_native_cart_popup_check' );

			$popup_continue_btn_border = __( 'Continue Button Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_continue_btn_border', $popup_continue_btn_border, 'responsive_woocommerce_shop', 165, '#10659C', 'enable_native_cart_popup_check' );

			$popup_continue_btn_hover_bg = __( 'Continue Button Background: Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_continue_btn_hover_bg', $popup_continue_btn_hover_bg, 'responsive_woocommerce_shop', 165, '#10659C', 'enable_native_cart_popup_check' );

			$popup_continue_btn_hover = __( 'Continue Button Color: Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_continue_btn_hover', $popup_continue_btn_hover, 'responsive_woocommerce_shop', 165, '#ffffff', 'enable_native_cart_popup_check' );

			$popup_continue_btn_hover_border = __( 'Continue Button Border Color: Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_continue_btn_hover_border', $popup_continue_btn_hover_border, 'responsive_woocommerce_shop', 165, '#10659C', 'enable_native_cart_popup_check' );

			$popup_cart_btn_bg = __( 'Cart Button Background', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_cart_btn_bg', $popup_cart_btn_bg, 'responsive_woocommerce_shop', 165, '#0066CC', 'enable_native_cart_popup_check' );

			$popup_cart_btn = __( 'Cart Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_cart_btn', $popup_cart_btn, 'responsive_woocommerce_shop', 165, '#ffffff', 'enable_native_cart_popup_check' );

			$popup_cart_btn_border = __( 'Cart Button Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_cart_btn_border', $popup_cart_btn_border, 'responsive_woocommerce_shop', 165, '#10659C', 'enable_native_cart_popup_check' );

			$popup_cart_btn_hover_bg = __( 'Cart Button Background: Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_cart_btn_hover_bg', $popup_cart_btn_hover_bg, 'responsive_woocommerce_shop', 165, '#10659C', 'enable_native_cart_popup_check' );

			$popup_cart_btn_hover = __( 'Cart Button Color: Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_cart_btn_hover', $popup_cart_btn_hover, 'responsive_woocommerce_shop', 165, '#ffffff', 'enable_native_cart_popup_check' );

			$popup_cart_btn_hover_border = __( 'Cart Button Border Color: Hover', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_cart_btn_hover_border', $popup_cart_btn_hover_border, 'responsive_woocommerce_shop', 165, '#10659C', 'enable_native_cart_popup_check' );

			$popup_text_color = __( 'Bottom Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'popup_text', $popup_text_color, 'responsive_woocommerce_shop', 165, '#777777', 'enable_native_cart_popup_check' );
		}
	}

endif;

return new Responsive_Woocommerce_Native_Cart_Popup_Customizer();
