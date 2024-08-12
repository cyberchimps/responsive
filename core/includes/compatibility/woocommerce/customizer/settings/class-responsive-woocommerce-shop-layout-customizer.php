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
				'responsive_woocommerce_shop',
				array(
					'title'    => esc_html__( 'Product Catalog Options', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 100,
				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_shop_layout_elements_separator',
				$general_tab_ids_prefix . 'responsive_shop_content_width',
				$general_tab_ids_prefix . 'responsive_product_card_spacing',
				$general_tab_ids_prefix . 'responsive_product_card_outside_container_padding',
				$general_tab_ids_prefix . 'responsive_product_card_inside_container_padding',
				$general_tab_ids_prefix . 'responsive_shop_elements_separator',
				$general_tab_ids_prefix . 'responsive_woocommerce_catalog_view',
				$general_tab_ids_prefix . 'responsive_product_content_aligmnment',
				$general_tab_ids_prefix . 'responsive_woocommerce_shop_elements_positioning',
				$general_tab_ids_prefix . 'responsive_product_sale_notification',
				$general_tab_ids_prefix . 'responsive_product_sale_style',
				$general_tab_ids_prefix . 'responsive_off_canvas_filter_separator',
				$general_tab_ids_prefix . 'responsive_enable_off_canvas_filter',
				$general_tab_ids_prefix . 'responsive_enable_off_canvas_close_btn',
				$general_tab_ids_prefix . 'responsive_off_canvas_close_button_color',
				$general_tab_ids_prefix . 'breadcrumbs_options',
				$general_tab_ids_prefix . 'toolbar_options',
				$general_tab_ids_prefix . 'responsive_native_cart_popup_separator',
				$general_tab_ids_prefix . 'responsive_enable_native_cart_popup',
				$general_tab_ids_prefix . 'responsive_native_cart_popup_display',
				$general_tab_ids_prefix . 'responsive_popup_elements_positioning',
				$general_tab_ids_prefix . 'responsive_popup_title_text',
				$general_tab_ids_prefix . 'responsive_popup_content',
				$general_tab_ids_prefix . 'responsive_popup_continue_btn_text',
				$general_tab_ids_prefix . 'responsive_popup_cart_btn_text',
				$general_tab_ids_prefix . 'responsive_popup_bottom_text',
				$general_tab_ids_prefix . 'responsive_native_cart_popup_styling_separator',
				$general_tab_ids_prefix . 'responsive_popup_width',
				$general_tab_ids_prefix . 'responsive_popup_width_tablet',
				$general_tab_ids_prefix . 'responsive_popup_width_mobile',
				$general_tab_ids_prefix . 'responsive_popup_height',
				$general_tab_ids_prefix . 'responsive_popup_height_tablet',
				$general_tab_ids_prefix . 'responsive_popup_height_mobile',
				$general_tab_ids_prefix . 'responsive_popup_padding',
				$general_tab_ids_prefix . 'responsive_popup_radius_padding',
				$general_tab_ids_prefix . 'content_alignment_options',
				$general_tab_ids_prefix . 'shop_pagination',
				$general_tab_ids_prefix . 'shop_pagination_style',
				$general_tab_ids_prefix . 'shop_pagination_quick_view',
			);


			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_shop_product_rating_color',
				$design_tab_ids_prefix . 'responsive_shop_product_price_color',
				$design_tab_ids_prefix . 'responsive_shop_button_separator',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_color',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_text_color',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_hover_color',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_hover_text_color',
				$design_tab_ids_prefix . 'responsive_shop_product_sorting_separator',
				$design_tab_ids_prefix . 'responsive_sorting_option_text_color',
				$design_tab_ids_prefix . 'responsive_sorting_option_background_color',
				$design_tab_ids_prefix . 'responsive_off_canvas_close_button_color',
				$design_tab_ids_prefix . 'responsive_native_cart_popup_styling_color_separator',
				$design_tab_ids_prefix . 'responsive_popup_bg_color',
				$design_tab_ids_prefix . 'responsive_popup_overlay_color',
				$design_tab_ids_prefix . 'responsive_popup_checkmark_bg_color',
				$design_tab_ids_prefix . 'responsive_popup_checkmark_color',
				$design_tab_ids_prefix . 'responsive_popup_title_color',
				$design_tab_ids_prefix . 'responsive_popup_content_color',
				$design_tab_ids_prefix . 'responsive_popup_continue_btn_bg_color',
				$design_tab_ids_prefix . 'responsive_popup_continue_btn_border_color',
				$design_tab_ids_prefix . 'responsive_popup_continue_btn_hover_bg_color',
				$design_tab_ids_prefix . 'responsive_popup_continue_btn_hover_color',
				$design_tab_ids_prefix . 'responsive_popup_continue_btn_hover_border_color',
				$design_tab_ids_prefix . 'responsive_popup_cart_btn_bg_color',
				$design_tab_ids_prefix . 'responsive_popup_cart_btn_color',
				$design_tab_ids_prefix . 'responsive_popup_cart_btn_border_color',
				$design_tab_ids_prefix . 'responsive_popup_cart_btn_hover_bg_color',
				$design_tab_ids_prefix . 'responsive_popup_cart_btn_hover_color',
				$design_tab_ids_prefix . 'responsive_popup_cart_btn_hover_border_color',
				$design_tab_ids_prefix . 'responsive_popup_text_color',
				$design_tab_ids_prefix . 'responsive_popup_continue_btn_color',
				$design_tab_ids_prefix . 'box_shadow_options',
				$design_tab_ids_prefix . 'box_shadow_hover_options',
				$design_tab_ids_prefix . 'product_image_hover_style_options',
				$design_tab_ids_prefix . 'responsive_shop_page_title_seperator',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-font-family',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-font-weight',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-font-style',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-text-transform',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-font-size',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-line-height',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-letter-spacing',
				$design_tab_ids_prefix . 'shop_page_title_shop_typography-color',
				$design_tab_ids_prefix . 'responsive_product_title_seperator',
				$design_tab_ids_prefix . 'product_title_shop_typography-font-family',
				$design_tab_ids_prefix . 'product_title_shop_typography-font-weight',
				$design_tab_ids_prefix . 'product_title_shop_typography-font-style',
				$design_tab_ids_prefix . 'product_title_shop_typography-text-transform',
				$design_tab_ids_prefix . 'product_title_shop_typography-font-size',
				$design_tab_ids_prefix . 'product_title_shop_typography-line-height',
				$design_tab_ids_prefix . 'product_title_shop_typography-letter-spacing',
				$design_tab_ids_prefix . 'product_title_shop_typography-color',
				$design_tab_ids_prefix . 'responsive_product_price_seperator',
				$design_tab_ids_prefix . 'product_price_shop_typography-font-family',
				$design_tab_ids_prefix . 'product_price_shop_typography-font-weight',
				$design_tab_ids_prefix . 'product_price_shop_typography-font-style',
				$design_tab_ids_prefix . 'product_price_shop_typography-text-transform',
				$design_tab_ids_prefix . 'product_price_shop_typography-font-size',
				$design_tab_ids_prefix . 'product_price_shop_typography-line-height',
				$design_tab_ids_prefix . 'product_price_shop_typography-letter-spacing',
				$design_tab_ids_prefix . 'product_price_shop_typography-color',
				$design_tab_ids_prefix . 'responsive_product_content_seperator',
				$design_tab_ids_prefix . 'product_content_shop_typography-font-family',
				$design_tab_ids_prefix . 'product_content_shop_typography-font-weight',
				$design_tab_ids_prefix . 'product_content_shop_typography-font-style',
				$design_tab_ids_prefix . 'product_content_shop_typography-text-transform',
				$design_tab_ids_prefix . 'product_content_shop_typography-font-size',
				$design_tab_ids_prefix . 'product_content_shop_typography-line-height',
				$design_tab_ids_prefix . 'product_content_shop_typography-letter-spacing',
				$design_tab_ids_prefix . 'product_content_shop_typography-color',
			);

		
			responsive_tabs_button_control( $wp_customize, 'woocommerce_shop_tabs', $tabs_label, 'responsive_woocommerce_shop', 1, '', 'responsive_woocommerce_shop_general_tab', 'responsive_woocommerce_shop_design_tab', $general_tab_ids, $design_tab_ids, null );


			// Layouts.
			$shop_layout_elements_label = esc_html__( 'Layouts', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_layout_elements_separator', $shop_layout_elements_label, 'responsive_woocommerce_shop', 10 );

			// Main Content Width.
			$shop_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'shop_content_width', $shop_content_width_label, 'responsive_woocommerce_shop', 20, Responsive\Core\get_responsive_customizer_defaults( 'shop_content_width' ), null, 100, 1, 'postMessage' );

			// Sidebar Position.
			$sidebar_label   = esc_html__( 'Woocommerce Sidebar Position', 'responsive' );
			$sidebar_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
			);
			if ( is_rtl() ) {
				$sidebar_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'right' => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'no'    => esc_html__( 'dashicons-hidden', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'shop_sidebar_position', $sidebar_label, 'responsive_sidebar_layout', 50, $sidebar_choices, 'no', null );

			$container_spacing_label = esc_html__( 'Product Card Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'product_card_spacing', $container_spacing_label, 'responsive_woocommerce_shop', 30 );

			$outside_container_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'product_card_outside_container', 'responsive_woocommerce_shop', 33, 15, 15, '', $outside_container_label );

			// Inside Container.
			$inside_container_label = __( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'product_card_inside_container', 'responsive_woocommerce_shop', 36, 15, 15, '', $inside_container_label );

			// Shop Elements.
			$shop_elements_label = esc_html__( 'Shop Product', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_elements_separator', $shop_elements_label, 'responsive_woocommerce_shop', 40 );

			// Catalog View.
			$woocommerce_catalog_view_label   = esc_html__( 'Catalog View', 'responsive' );
			$woocommerce_catalog_view_choices = array(
				'grid' => esc_html__( 'Grid View', 'responsive' ),
				'list' => esc_html__( 'List View', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'woocommerce_catalog_view', $woocommerce_catalog_view_label, 'responsive_woocommerce_shop', 50, $woocommerce_catalog_view_choices, 'grid', null );

			// Product content Aligmnment.
			$product_content_aligmnment_label   = esc_html__( 'Content Aligmnment', 'responsive' );
			$product_content_aligmnment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$product_content_aligmnment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'product_content_aligmnment', $product_content_aligmnment_label, 'responsive_woocommerce_shop', 60, $product_content_aligmnment_choices, 'center', null );

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
						'section'  => 'responsive_woocommerce_shop',
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
			responsive_select_control( $wp_customize, 'product_sale_notification', $product_sale_notification_label, 'responsive_woocommerce_shop', 80, $product_sale_notification_choices, 'default', null );

			// Sale % Value.
			$sale_percent_value_label = esc_html__( 'Sale % Value', 'responsive' );
			responsive_text_control( $wp_customize, 'sale_percent_value', $sale_percent_value_label, 'responsive_woocommerce_shop', 90, '-[value]%', 'responsive_check_product_price_custom_string' );

			// Sale Notification.
			$product_sale_style_label   = esc_html__( 'Sale Bubble Style', 'responsive' );
			$product_sale_style_choices = array(
				'circle'         => __( 'Circle', 'responsive' ),
				'circle-outline' => __( 'Circle Outline', 'responsive' ),
				'square'         => __( 'Square', 'responsive' ),
				'square-outline' => __( 'Square Outline', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'product_sale_style', $product_sale_style_label, 'responsive_woocommerce_shop', 100, $product_sale_style_choices, 'circle', null );

			// Off Canvas Layout.
			$off_canvas_filter_label = esc_html__( 'Off Canvas Filter', 'responsive' );
			responsive_separator_control( $wp_customize, 'off_canvas_filter_separator', $off_canvas_filter_label, 'responsive_woocommerce_shop', 110 );

			$enable_off_canvas_filter = __( 'Enable Off Canvas Filter', 'responsive' );
			responsive_toggle_control( $wp_customize, 'enable_off_canvas_filter', $enable_off_canvas_filter, 'responsive_woocommerce_shop', 115, 0, null, 'refresh' );

			$hamburger_off_canvas_btn_label = __( 'Off Canvas Filter Button Text', 'responsive' );
			responsive_text_control( $wp_customize, 'hamburger_off_canvas_btn_label_text', $hamburger_off_canvas_btn_label, 'responsive_woocommerce_shop', 120, 'Filter', 'enable_off_canvas_filter_check', 'sanitize_text_field', 'text', 'postMessage' );

			$enable_off_canvas_close_btn = __( 'Enable Off Canvas Close Button', 'responsive' );
			responsive_toggle_control( $wp_customize, 'enable_off_canvas_close_btn', $enable_off_canvas_close_btn, 'responsive_woocommerce_shop', 125, 0, null, 'refresh' );

			$close_button_color = __( 'Close Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_close_button', $close_button_color, 'responsive_woocommerce_shop', 130, '#CCCCCC', 'enable_enable_off_canvas_close_btn' );

			$close_button_hover_color = __( 'Close Button Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_close_button_hover', $close_button_hover_color, 'responsive_woocommerce_shop', 135, '#777777', 'enable_enable_off_canvas_close_btn' );

			$filter_button_color = __( 'Filter Button Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_filter_button', $filter_button_color, 'responsive_woocommerce_shop', 140, 'transparent', 'enable_off_canvas_filter_check' );

			$filter_text_color = __( 'Filter Button Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_filter_button_text', $filter_text_color, 'responsive_woocommerce_shop', 140, '#808080', 'enable_off_canvas_filter_check' );

			$filter_button_border_color = __( 'Filter Button Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_filter_button_border', $filter_button_border_color, 'responsive_woocommerce_shop', 140, '#808080', 'enable_off_canvas_filter_check' );

			$filter_button_color_hover = __( 'Filter Button Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_filter_button_hover', $filter_button_color_hover, 'responsive_woocommerce_shop', 140, 'transparent', 'enable_off_canvas_filter_check' );

			$filter_text_color_hover = __( 'Filter Button Text Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_filter_button_text_hover', $filter_text_color_hover, 'responsive_woocommerce_shop', 140, '#10659c', 'enable_off_canvas_filter_check' );

			$filter_button_border_color_hover = __( 'Filter Button Border Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'off_canvas_filter_button_border_hover', $filter_button_border_color_hover, 'responsive_woocommerce_shop', 140, '#10659c', 'enable_off_canvas_filter_check' );

		}
	}

endif;

return new Responsive_Woocommerce_Shop_Layout_Customizer();
