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
					'title'    => esc_html__( 'Single Product', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 2,
				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_single_product_layout_elements_separator',
				$general_tab_ids_prefix . 'responsive_single_product_content_width',
				$general_tab_ids_prefix . 'responsive_single_product_elements_separator',
				$general_tab_ids_prefix . 'responsive_single_product_gallery_layout',
				$general_tab_ids_prefix . 'responsive_woocommerce_product_elements_positioning',
				$general_tab_ids_prefix . 'responsive_single_product_floating_bar_separator',
				$general_tab_ids_prefix . 'responsive_single_product_floating_bar',
				$general_tab_ids_prefix . 'responsive_single_product_image_width',
				$general_tab_ids_prefix . 'responsive_single_product_breadcrumbs',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_position',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_separator',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_width',
			);


			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_floatingb_background_color',
				$design_tab_ids_prefix . 'responsive_floatingb_title_color',
				$design_tab_ids_prefix . 'responsive_floatingb_price_color',
				$design_tab_ids_prefix . 'responsive_floatingb_qty_input_background_color',
				$design_tab_ids_prefix . 'responsive_floatingb_qty_input_font_color',
				$design_tab_ids_prefix . 'responsive_floatingb_qty_input_border_color',
				$design_tab_ids_prefix . 'responsive_floatingb_addtocart_background_color',
				$design_tab_ids_prefix . 'responsive_floatingb_addtocart_bghover_color',
				$design_tab_ids_prefix . 'responsive_floatingb_addtocart_font_color',
				$design_tab_ids_prefix . 'responsive_floatingb_addtocart_fonthover_color',
				$design_tab_ids_prefix . 'responsive_single_product_title_seperator',
				$design_tab_ids_prefix . 'responsive_single_product_title_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_single_product_price_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_single_product_content_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_single_product_page_breadcrumb_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_single_product_title_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_single_product_price_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_single_product_content_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_single_product_page_breadcrumb_shop_typography_group_seperator',
			);

		
			responsive_tabs_button_control( $wp_customize, 'woocommerce_single_product_tabs', $tabs_label, 'responsive_woocommerce_single_product_layout', 1, '', 'responsive_woocommerce_single_product_general_tab', 'responsive_woocommerce_single_product_design_tab', $general_tab_ids, $design_tab_ids, null );


			// Layouts.
			$single_product_layout_elements_label = esc_html__( 'Layouts', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_layout_elements_separator', $single_product_layout_elements_label, 'responsive_woocommerce_single_product_layout', 10 );

			// Main Content Width.
			$single_product_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_product_content_width', $single_product_content_width_label, 'responsive_woocommerce_single_product_layout', 20, 100, null, 100, 1, 'postMessage' );

			// Sidebar Options Heading.
			$single_product_sidebar_heading = esc_html__( 'Sidebar Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_sidebar_separator', $single_product_sidebar_heading, 'responsive_woocommerce_single_product_layout', 65);

			// Sidebar Position.
			$sidebar_label   = esc_html__( 'Sidebar Position', 'responsive' );
			$sidebar_choices = array(
				'left'  => esc_html__( 'Left', 'responsive' ),
				'right' => esc_html__( 'Right', 'responsive' ),
				'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			);

			if ( is_rtl() ) {
				$sidebar_choices = array(
					'left'  => esc_html__( 'Left', 'responsive' ),
					'right' => esc_html__( 'Right', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				);
			}

			responsive_imageradio_button_control( $wp_customize, 'single_product_sidebar_position', $sidebar_label, 'responsive_woocommerce_single_product_layout', 66, $sidebar_choices, 'no', null, 'svg' );

			// Sidebar Width
			$single_product_sidebar_width_label = esc_html__( 'Sidebar Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_product_sidebar_width', $single_product_sidebar_width_label, 'responsive_woocommerce_single_product_layout', 67, 30, null, 50, 15, 'postMessage' );
			
			// Product Elements.
			$single_product_elements_label = esc_html__( 'Product Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_elements_separator', $single_product_elements_label, 'responsive_woocommerce_single_product_layout', 40 );

			// Breadcrumbs toggle for Single Product pages.
			$single_product_breadcrumbs_label = esc_html__( 'Breadcrumbs', 'responsive' );
			responsive_toggle_control($wp_customize, 'single_product_breadcrumbs', $single_product_breadcrumbs_label, 'responsive_woocommerce_single_product_layout', 45, 1, null);

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

			// Floating Bar.
			$single_product_floating_bar_label = esc_html__( 'Floating Bar', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_floating_bar_separator', $single_product_floating_bar_label, 'responsive_woocommerce_single_product_layout', 70 );

			// Setting to enable/disable floating bar.
			$single_product_floating_bar_label          = esc_html__( 'Display Floating Bar', 'responsive' );
			$single_product_floating_bar_desc           = esc_html__( 'The floating bar is to display the add to cart button when you scroll to increase conversions.', 'responsive' );
			$single_product_floating_bar_toggle_choices = array(
				'display' => esc_html__( 'Display', 'responsive' ),
				'hide'    => esc_html__( 'Hide', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_product_floating_bar', $single_product_floating_bar_label, 'responsive_woocommerce_single_product_layout', 70, $single_product_floating_bar_toggle_choices, 'hide', null, 'refresh', $single_product_floating_bar_desc );

			/*
			 * Color settings for floating bar
			 */
			// Background color.
			$floatingb_background_color_label = esc_html__( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_background', $floatingb_background_color_label, 'responsive_woocommerce_single_product_layout', 70, 'rgba(51,51,51,0.9)' );

			// Title color.
			$floatingb_title_color_label = esc_html__( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_title', $floatingb_title_color_label, 'responsive_woocommerce_single_product_layout', 70, '#ffffff' );

			// Price Color.
			$floatingb_price_color_label = esc_html__( 'Price Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_price', $floatingb_price_color_label, 'responsive_woocommerce_single_product_layout', 70, '#ffffff' );

			// Quantity input background color.
			$floatingb_qty_input_background_label = esc_html__( 'Quantity Input: Background', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_qty_input_background', $floatingb_qty_input_background_label, 'responsive_woocommerce_single_product_layout', 70, '#ffffff' );

			// Quantity input font color.
			$floatingb_qty_input_font_label = esc_html__( 'Quantity Input Font: Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_qty_input_font', $floatingb_qty_input_font_label, 'responsive_woocommerce_single_product_layout', 70, '#000000' );

			// Quantity input border color.
			$floatingb_qty_input_border_label = esc_html__( 'Quantity Input Border: Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_qty_input_border', $floatingb_qty_input_border_label, 'responsive_woocommerce_single_product_layout', 70, '#333333' );

			// Add to cart background color.
			$floatingb_addtocart_background_label = esc_html__( 'Add To Cart: Background', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_addtocart_background', $floatingb_addtocart_background_label, 'responsive_woocommerce_single_product_layout', 70, '#0066cc' );

			// Add to cart background hover color.
			$floatingb_addtocart_bghover_label = esc_html__( 'Add To Cart Hover: Background', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_addtocart_bghover', $floatingb_addtocart_bghover_label, 'responsive_woocommerce_single_product_layout', 70, '#10659c' );

			// Add to cart font color.
			$floatingb_addtocart_font_label = esc_html__( 'Add To Cart Font: Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_addtocart_font', $floatingb_addtocart_font_label, 'responsive_woocommerce_single_product_layout', 70, '#ffffff' );

			// Add to cart font hover color.
			$floatingb_addtocart_fonthover_label = esc_html__( 'Add To Cart Font Hover: Color', 'responsive' );
			responsive_color_control( $wp_customize, 'floatingb_addtocart_fonthover', $floatingb_addtocart_fonthover_label, 'responsive_woocommerce_single_product_layout', 70, '#f1f1f1' );

		}


	}

endif;

return new Responsive_Woocommerce_Single_Product_Layout_Customizer();
