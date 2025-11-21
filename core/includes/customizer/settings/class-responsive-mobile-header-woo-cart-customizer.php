<?php
/**
 * Create WooCommerce Cart section in mobile header builder
 *
 * @package Responsive
 */

if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * WooCommerce Customizer Options for Mobile Header
	 *
	 * @package Responsive WordPress theme
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'Responsive_Mobile_Header_Woo_Cart_Customizer' ) ) :
		/**
		 * Mobile Header Woo Cart Customizer Options
		 */
		class Responsive_Mobile_Header_Woo_Cart_Customizer {
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
				// Section.
				$wp_customize->add_section(
					'responsive_mobile_header_woo_cart',
					array(
						'title'    => esc_html__( 'Mobile Woo Cart', 'responsive' ),
						'panel'    => 'responsive_header',
						'priority' => 100,
					)
				);

				// Tabs.
				$tabs_label              = esc_html__( 'Tabs', 'responsive' );
				$general_tab_ids_prefix  = 'customize-control-';
				$general_tab_ids         = array(
					$general_tab_ids_prefix . 'responsive_mobile_cart_icon_separator',
					$general_tab_ids_prefix . 'responsive_mobile_cart_icon',
					$general_tab_ids_prefix . 'responsive_mobile_cart_style',
					$general_tab_ids_prefix . 'responsive_mobile_cart_icon_size',
					$general_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_1',
					$general_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_2',
					$general_tab_ids_prefix . 'responsive_mobile_cart_label_separator',
					$general_tab_ids_prefix . 'responsive_mobile_woo_cart_label',
					$general_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_4',
					$general_tab_ids_prefix . 'responsive_mobile_cart_label_position',
					$general_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_5',
					$general_tab_ids_prefix . 'responsive_mobile_display_cart_count',
					$general_tab_ids_prefix . 'responsive_mobile_hide_cart_total_label',
					$general_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_5-1',
					$general_tab_ids_prefix . 'responsive_mobile_header_woo_cart_click_action',
				);
				$design_tab_ids_prefix   = 'customize-control-';
				$design_tab_ids          = array(
					$design_tab_ids_prefix . 'responsive_mobile_cart_icon_color_separator',
					$design_tab_ids_prefix . 'responsive_mobile_cart_color',
					$design_tab_ids_prefix . 'responsive_mobile_cart_hover_color',
					$design_tab_ids_prefix . 'responsive_mobile_cart_count_color',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_6',
					$design_tab_ids_prefix . 'responsive_mobile_cart_border_separator',
					$design_tab_ids_prefix . 'responsive_mobile_cart_border_width',
					$design_tab_ids_prefix . 'responsive_mobile_border_cart_radius',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_button_separator',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_button_color',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_button_text_color',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_9',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_checkout_button_separator',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_checkout_button_color',
					$design_tab_ids_prefix . 'responsive_mobile_cart_checkout_button_separator',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_11',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_checkout_button_text_color',
					$design_tab_ids_prefix . 'responsive_mobile_cart_spacing_separator',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_padding_padding',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_margin_padding',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_tray_separator',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_tray_bg_color',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_13',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_tray_separator_color',
					$design_tab_ids_prefix . 'responsive_mobile_header_woo_cart_separator_14',
					$design_tab_ids_prefix . 'responsive_mobile_header_cart_tray_link_color',
				);

				responsive_tabs_button_control( $wp_customize, 'mobile_header_woo_cart_tabs', $tabs_label, 'responsive_mobile_header_woo_cart', 1, '', 'responsive_mobile_header_woo_cart_general_tab', 'responsive_mobile_header_woo_cart_design_tab', $general_tab_ids, $design_tab_ids, null );

				// Cart Icon Heading.
				$cart_icon_separator = __( 'Cart Icon', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_cart_icon_separator', $cart_icon_separator, 'responsive_mobile_header_woo_cart', 50 );

				// Cart Icon.
				$cart_icon_label = __( 'Icons', 'responsive' );
				$cart_icon_choices = array(
					'icon-opencart'      => esc_html__( 'OpenCart', 'responsive' ),
					'icon-shopping-cart' => esc_html__( 'Shopping Cart', 'responsive' ),
					'icon-shopping-bag'   => esc_html__( 'Shopping Bag', 'responsive' ),
					'icon-shopping-basket' => esc_html__( 'Shopping Basket', 'responsive' ),
				);
				responsive_icon_radio_button_control( $wp_customize, 'mobile_cart_icon', $cart_icon_label, 'responsive_mobile_header_woo_cart', 51, $cart_icon_choices, 'icon-opencart', null, 'svg' );

				// Cart Style.
				$cart_style_label = __( 'Cart Style', 'responsive' );
				$cart_style_choices = array(
					'fill'    => esc_html__( 'Fill', 'responsive' ),
					'outline' => esc_html__( 'Outline', 'responsive' ),
					'minimal' => esc_html__( 'Minimal', 'responsive' ),
				);
				responsive_select_button_control( $wp_customize, 'mobile_cart_style', $cart_style_label, 'responsive_mobile_header_woo_cart', 52, $cart_style_choices, 'fill', null );

				// Cart Icon Size.
				$cart_icon_size_label = __( 'Icon Size', 'responsive' );
				responsive_drag_number_control( $wp_customize, 'mobile_cart_icon_size', $cart_icon_size_label, 'responsive_mobile_header_woo_cart', 53, 24, null, 100, 0, 'refresh' );

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_1', 1, 'responsive_mobile_header_woo_cart', 54, 1, );
				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_2', 1, 'responsive_mobile_header_woo_cart', 55, 1, );

				// Cart Label Heading.
				$cart_label_separator = __( 'Cart Label', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_cart_label_separator', $cart_label_separator, 'responsive_mobile_header_woo_cart', 57 );

				// Cart label (supports shortcodes).
				$wp_customize->add_setting(
					'responsive_mobile_woo_cart_label',
					array(
						'sanitize_callback' => 'wp_check_invalid_utf8',
						'transport'         => 'refresh',
						'default'           => '',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Input_With_Dropdown_Control(
						$wp_customize,
						'responsive_mobile_woo_cart_label',
						array(
							'label'       => __( 'Cart Label', 'responsive' ),
							'description' => __( 'The cart label on the header will be displayed by using shortcodes. Type any custom string in it or click on the plus icon above to add your desired shortcode.', 'responsive' ),
							'section'     => 'responsive_mobile_header_woo_cart',
							'settings'    => 'responsive_mobile_woo_cart_label',
							'choices'     => array(
								'{cart_currency_name}'         => __( 'Currency Name', 'responsive' ),
								'{cart_total}'                 => __( 'Total Amount', 'responsive' ),
								'{cart_currency_symbol}'       => __( 'Currency Symbol', 'responsive' ),
								'{cart_total_currency_symbol}' => __( 'Total + Currency Symbol', 'responsive' ),
							),
							'priority' => 60,
						)
					)
				);

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_4', 1, 'responsive_mobile_header_woo_cart', 65, 1, );

				// Label position.
				$wp_customize->add_setting(
					'responsive_mobile_cart_label_position',
					array(
						'default'           => 'left',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_select',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Select_Button_Control(
						$wp_customize,
						'responsive_mobile_cart_label_position',
						array(
							'label'    => __( 'Label Position', 'responsive' ),
							'section'  => 'responsive_mobile_header_woo_cart',
							'settings' => 'responsive_mobile_cart_label_position',
							'priority' => 70,
							'choices'  => array(
								'left'   => esc_html__( 'icon_label_left', 'responsive' ),
								'bottom' => esc_html__( 'icon_label_bottom', 'responsive' ),
								'right'  => esc_html__( 'icon_label_right', 'responsive' ),
							),
						)
					)
				);

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_5', 2, 'responsive_mobile_header_woo_cart', 75, 1, );

				// Display cart count.
				$display_cart_count_label = esc_html__( 'Display Cart Count', 'responsive' );
				responsive_toggle_control( $wp_customize, 'mobile_display_cart_count', $display_cart_count_label, 'responsive_mobile_header_woo_cart', 80, 0, null );

				// Hide cart total label when empty.
				$hide_cart_total_label = esc_html__( 'Hide Cart Total Label', 'responsive' );
				responsive_toggle_control( $wp_customize, 'mobile_hide_cart_total_label', $hide_cart_total_label, 'responsive_mobile_header_woo_cart', 90, 0, null, 'refresh', 'Hide cart total label if cart is empty.' );

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_5-1', 1, 'responsive_mobile_header_woo_cart', 95, 1, );

				// Click Action.
				$cart_click_action_label   = esc_html__( 'Cart Click Action', 'responsive' );
				$cart_click_action_choices = array(
					'dropdown' => esc_html__( 'Dropdown', 'responsive' ),
					'slide-in' => esc_html__( 'Slide-In', 'responsive' ),
					'redirect' => esc_html__( 'Cart Page', 'responsive' ),
				);
				responsive_select_button_control( $wp_customize, 'mobile_header_woo_cart_click_action', $cart_click_action_label, 'responsive_mobile_header_woo_cart', 100, $cart_click_action_choices, 'dropdown', null, 'refresh' );

				// Cart Icon.
				$cart_icon_color_separator = __( 'Cart Icon', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_cart_icon_color_separator', $cart_icon_color_separator, 'responsive_mobile_header_woo_cart', 110 );

				// Cart Icon Color.
				$cart_color_label = __( 'Icon Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_cart', $cart_color_label, 'responsive_mobile_header_woo_cart', 120, '#333333', null, '', true, '#333333', 'mobile_cart_hover' );

				// Count color.
				$count_color_label = __( 'Count Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_cart_count', $count_color_label, 'responsive_mobile_header_woo_cart', 130, '#000000', null, '', true, '#000000', 'mobile_cart_count_hover' );

				// Cart Button colors.
				$cart_button_separator = esc_html__( 'Cart Button', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_header_woo_cart_button_separator', $cart_button_separator, 'responsive_mobile_header_woo_cart', 170 );

				$cart_button_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_button', $cart_button_label, 'responsive_mobile_header_woo_cart', 180, '#10659C', null, '', true, '#0066CC', 'mobile_header_cart_button_hover' );

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_9', 1, 'responsive_mobile_header_woo_cart', 185, 1, );

				// Button Text.
				$cart_button_text_label = __( 'Text Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_button_text', $cart_button_text_label, 'responsive_mobile_header_woo_cart', 190, '#ffffff', null, '', true, '#ffffff', 'mobile_header_cart_button_text_hover' );

				// Checkout Button colors.
				$cart_checkout_button_separator = esc_html__( 'Checkout Button', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_header_cart_checkout_button_separator', $cart_checkout_button_separator, 'responsive_mobile_header_woo_cart', 200 );

				$cart_checkout_button_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_checkout_button', $cart_checkout_button_label, 'responsive_mobile_header_woo_cart', 210, '#0066CC', null, '', true, '#10659C', 'mobile_header_cart_checkout_button_hover' );

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_11', 1, 'responsive_mobile_header_woo_cart', 215, 1, );

				$cart_checkout_button_text_label = __( 'Text Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_checkout_button_text', $cart_checkout_button_text_label, 'responsive_mobile_header_woo_cart', 220, '#ffffff', null, '', true, '#FFFFFF', 'mobile_header_cart_checkout_button_text_hover' );

				// Cart Tray.
				$cart_tray_separator = esc_html__( 'Cart Tray', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_header_cart_tray_separator', $cart_tray_separator, 'responsive_mobile_header_woo_cart', 240 );

				$cart_tray_bg_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_tray_bg', $cart_tray_bg_label, 'responsive_mobile_header_woo_cart', 250, '#FFFFFF', null, '', true, '#FFFFFF', 'mobile_header_cart_tray_bg_hover' );

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_13', 1, 'responsive_mobile_header_woo_cart', 255, 1, );

				$cart_tray_separator_label = __( 'Separator Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_tray_separator', $cart_tray_separator_label, 'responsive_mobile_header_woo_cart', 260, '#FFFFFF', null, '' );

				responsive_horizontal_separator_control( $wp_customize, 'mobile_header_woo_cart_separator_14', 1, 'responsive_mobile_header_woo_cart', 265, 1, );

				$cart_link_color_label = __( 'Link Color', 'responsive' );
				responsive_color_control( $wp_customize, 'mobile_header_cart_tray_link', $cart_link_color_label, 'responsive_mobile_header_woo_cart', 270, '#333333', null, '', true, '#333333', 'mobile_header_cart_tray_link_hover' );

				// Spacing.
				$spacing_separator_label = __( 'Spacing', 'responsive' );
				responsive_separator_control( $wp_customize, 'mobile_cart_spacing_separator', $spacing_separator_label, 'responsive_mobile_header_woo_cart', 290 );

				// Padding.
				$padding_label = __( 'Padding (px)', 'responsive' );
				responsive_padding_control( $wp_customize, 'mobile_header_woo_cart_padding', 'responsive_mobile_header_woo_cart', 300, 10, 10, null, $padding_label );

				// Margin.
				$margin_label = esc_html__( 'Margin (px)', 'responsive' );
				responsive_padding_control( $wp_customize, 'mobile_header_woo_cart_margin', 'responsive_mobile_header_woo_cart', 310, 0, 0, null, $margin_label );
			}
		}
	endif;

	return new Responsive_Mobile_Header_Woo_Cart_Customizer();
}


