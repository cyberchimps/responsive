<?php
/**
 * Create WooCommerce Cart section in header builder
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
	if ( ! class_exists( 'Responsive_Header_Woo_Cart_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Header_Woo_Cart_Customizer {
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
						'responsive_header_woo_cart',
						array(
							'title'    => esc_html__( 'WooCommerce Cart', 'responsive' ),
							'panel'    => 'responsive_header',
							'priority' => 100,
						)
					);
				// Adding General and Design tabs
				$tabs_label            = esc_html__( 'Tabs', 'responsive' );
				$general_tab_ids_prefix = 'customize-control-';
				$general_tab_ids        = array(
					$general_tab_ids_prefix . 'responsive_cart_icon_separator',
					$general_tab_ids_prefix . 'responsive_cart_icon',
					$general_tab_ids_prefix . 'responsive_cart_style',
					$general_tab_ids_prefix . 'responsive_cart_icon_size',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_separator_1',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_separator_2',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_separator_3',
					$general_tab_ids_prefix . 'responsive_cart_label_separator',
					$general_tab_ids_prefix . 'responsive_woo_cart_label',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_separator_4',
					$general_tab_ids_prefix . 'responsive_cart_label_position',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_separator_5',
					$general_tab_ids_prefix . 'responsive_display_cart_count',
					$general_tab_ids_prefix . 'responsive_hide_cart_total_label',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_separator_5-1',
					$general_tab_ids_prefix . 'responsive_header_woo_cart_click_action',
				);
				$design_tab_ids_prefix = 'customize-control-';
				$design_tab_ids        = array(
					$design_tab_ids_prefix . 'responsive_cart_icon_color_separator',
					$design_tab_ids_prefix . 'responsive_cart_color',
					$design_tab_ids_prefix . 'responsive_cart_count_color',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_6',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_7',
					$design_tab_ids_prefix . 'responsive_cart_border_separator',
					$design_tab_ids_prefix . 'responsive_cart_border_width',
					$design_tab_ids_prefix . 'responsive_border_cart_radius',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_8',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_button_separator',
					$design_tab_ids_prefix . 'responsive_header_cart_button_color',
					$design_tab_ids_prefix . 'responsive_header_cart_button_text_color',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_9',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_10',
					$design_tab_ids_prefix . 'responsive_header_cart_checkout_button_separator',
					$design_tab_ids_prefix . 'responsive_header_cart_checkout_button_color',
					$design_tab_ids_prefix . 'responsive_cart_checkout_button_separator',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_11',
					$design_tab_ids_prefix . 'responsive_header_cart_checkout_button_text_color',
					$design_tab_ids_prefix . 'responsive_cart_spacing_separator',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_padding_padding',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_margin_padding',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_12',
					$design_tab_ids_prefix . 'responsive_header_cart_tray_separator',
					$design_tab_ids_prefix . 'responsive_header_cart_tray_bg_color',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_13',
					$design_tab_ids_prefix . 'responsive_header_cart_tray_separator_color',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_14',
					$design_tab_ids_prefix . 'responsive_header_cart_tray_link_color',
					$design_tab_ids_prefix . 'responsive_header_woo_cart_separator_15',
				);
			
				responsive_tabs_button_control( $wp_customize, 'header_woo_cart_tabs', $tabs_label, 'responsive_header_woo_cart', 1, '', 'responsive_header_woo_cart_general_tab', 'responsive_header_woo_cart_design_tab', $general_tab_ids, $design_tab_ids, null );
				// Cart Label Heading.
				$cart_label_separator = __( 'Cart Label', 'responsive' );
				responsive_separator_control( $wp_customize, 'cart_label_separator', $cart_label_separator, 'responsive_header_woo_cart', 57 );
				$wp_customize->add_setting(
					'responsive_woo_cart_label',
					array(
						'sanitize_callback' => 'wp_check_invalid_utf8',
						'transport'         => 'refresh',
						'default'           => '',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Input_With_Dropdown_Control(
						$wp_customize,
						'responsive_woo_cart_label',
						array(
							'label'       => __( 'Cart Label', 'responsive' ),
							'description' => __( 'The cart label on the header will be displayed by using shortcodes. Type any custom string in it or click on the plus icon above to add your desired shortcode.', 'responsive' ),
							'section'     => 'responsive_header_woo_cart',
							'settings'    => 'responsive_woo_cart_label',
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
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_4', 1, 'responsive_header_woo_cart', 65, 1, );
				$wp_customize->add_setting(
					'responsive_cart_label_position',
					array(
						'default'           => 'left',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'responsive_sanitize_select',
					)
				);
				$wp_customize->add_control(
					new Responsive_Customizer_Select_Button_Control(
						$wp_customize,
						'responsive_cart_label_position',
						array(
							'label'    => __( 'Label Position', 'responsive' ),
							'section'  => 'responsive_header_woo_cart',
							'settings' => 'responsive_cart_label_position',
							'priority' => 70,
							'choices'  => array(
								'left'   => esc_html__( 'icon_label_left', 'responsive' ),
								'bottom' => esc_html__( 'icon_label_bottom', 'responsive' ),
								'right'  => esc_html__( 'icon_label_right', 'responsive' ),
							),
						)
					)
				);
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_5', 2, 'responsive_header_woo_cart', 75, 1, );
				$display_cart_count_label = esc_html__( 'Display Cart Count', 'responsive' );
				responsive_toggle_control( $wp_customize, 'display_cart_count', $display_cart_count_label, 'responsive_header_woo_cart', 80, 0, null );
				$hide_cart_total_label = esc_html__( 'Hide Cart Total Label', 'responsive' );
				responsive_toggle_control( $wp_customize, 'hide_cart_total_label', $hide_cart_total_label, 'responsive_header_woo_cart', 90, 0, null, 'refresh', 'Hide cart total label if cart is empty.' );
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_5-1', 1, 'responsive_header_woo_cart', 95, 1, );
				// Click Action.
				$cart_click_action_label   = esc_html__( 'Cart Click Action', 'responsive' );
				$cart_click_action_choices = array(
					'dropdown' => esc_html__( 'Dropdown', 'responsive' ),
					'slide-in' => esc_html__( 'Slide-In', 'responsive' ),
					'redirect' => esc_html__( 'Cart Page', 'responsive' ),
				);
				responsive_select_button_control( $wp_customize, 'header_woo_cart_click_action', $cart_click_action_label, 'responsive_header_woo_cart', 100, $cart_click_action_choices, 'dropdown', null, 'refresh' );
				// Cart Icon Heading.
				$cart_icon_color_separator = __( 'Cart Icon', 'responsive' );
				responsive_separator_control( $wp_customize, 'cart_icon_color_separator', $cart_icon_color_separator, 'responsive_header_woo_cart', 110 );
				// count Color.
				$count_color_label = __( 'Count Color', 'responsive' );
				responsive_color_control( $wp_customize, 'cart_count', $count_color_label, 'responsive_header_woo_cart', 130, '#000000', null, '', true, '#000000', 'cart_count_hover' );
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_8', 2, 'responsive_header_woo_cart', 165, 1, );
				// Cart Buttons.
				$cart_button_separator = esc_html__( 'Cart Button', 'responsive' );
				responsive_separator_control( $wp_customize, 'header_woo_cart_button_separator', $cart_button_separator, 'responsive_header_woo_cart', 170 );
	
				// Button.
				$cart_button_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_button', $cart_button_label, 'responsive_header_woo_cart', 180, '#10659C', null, '', true, '#0066CC', 'header_cart_button_hover' );
	
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_9', 1, 'responsive_header_woo_cart', 185, 1, );
	
				// Button Text.
				$cart_button_text_label = __( 'Text Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_button_text', $cart_button_text_label, 'responsive_header_woo_cart', 190, '#ffffff', null, '', true, '#ffffff', 'header_cart_button_text_hover' );
	
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_10', 2, 'responsive_header_woo_cart', 195, 1, );
	
				// Checkout Buttons.
				$cart_button_separator = esc_html__( 'Checkout Button', 'responsive' );
				responsive_separator_control( $wp_customize, 'header_cart_checkout_button_separator', $cart_button_separator, 'responsive_header_woo_cart', 200 );
	
				// Button.
				$cart_checkout_button_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_checkout_button', $cart_checkout_button_label, 'responsive_header_woo_cart', 210, '#0066CC', null, '', true, '#10659C', 'header_cart_checkout_button_hover' );
	
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_11', 1, 'responsive_header_woo_cart', 215, 1, );
	
				// Button Text.
				$cart_checkout_button_text_label = __( 'Text Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_checkout_button_text', $cart_checkout_button_text_label, 'responsive_header_woo_cart', 220, '#ffffff', null, '', true, '#FFFFFF', 'header_cart_checkout_button_text_hover' );
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_12', 2, 'responsive_header_woo_cart', 230, 1, );
	
				// Cart Tray.
				$cart_tray_separator = esc_html__( 'Cart Tray', 'responsive' );
				responsive_separator_control( $wp_customize, 'header_cart_tray_separator', $cart_tray_separator, 'responsive_header_woo_cart', 240 );
				// Tray Background.
				$cart_tray_bg_label = __( 'Background Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_tray_bg', $cart_tray_bg_label, 'responsive_header_woo_cart', 250, '#FFFFFF', null, '', true, '#FFFFFF', 'header_cart_tray_bg_hover' );
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_13', 1, 'responsive_header_woo_cart', 255, 1, );
				
				// Tray Separator.
				$cart_tray_separator_label = __( 'Separator Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_tray_separator', $cart_tray_separator_label, 'responsive_header_woo_cart', 260, '#FFFFFF', null, '' );
				
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_14', 1, 'responsive_header_woo_cart', 265, 1, );
				// Link Color.
				$cart_link_color_label = __( 'Link Color', 'responsive' );
				responsive_color_control( $wp_customize, 'header_cart_tray_link', $cart_link_color_label, 'responsive_header_woo_cart', 270, '#333333', null, '', true, '#333333', 'header_cart_tray_link_hover' );
				responsive_horizontal_separator_control($wp_customize, 'header_woo_cart_separator_15', 2, 'responsive_header_woo_cart', 280, 1, );
				// Spacing.
				$spacing_separator_label = __( 'Spacing', 'responsive' );
				responsive_separator_control( $wp_customize, 'cart_spacing_separator', $spacing_separator_label, 'responsive_header_woo_cart', 290 );
				// Padding.
				$footer_above_row_padding_label = __( 'Padding (px)', 'responsive' );
				responsive_padding_control( $wp_customize, 'header_woo_cart_padding', 'responsive_header_woo_cart', 300, 10, 10, null, $footer_above_row_padding_label );
				
				// Margin.
				$footer_above_row_margin_label = esc_html__( 'Margin (px)', 'responsive' );
				responsive_padding_control( $wp_customize, 'header_woo_cart_margin', 'responsive_header_woo_cart', 310, 0, 0, null, $footer_above_row_margin_label );
			}
		}
	endif;
	return new Responsive_Header_Woo_Cart_Customizer();
}