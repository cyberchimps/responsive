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
			add_action( 'customize_register', array( $this, 'move_wc_catalog_controls' ), 50 );

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
					'title'    => esc_html__( 'Product Catalog', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 5,
				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_shop_title_area',
				$general_tab_ids_prefix . 'responsive_shop_layout_elements_separator',
				$general_tab_ids_prefix . 'responsive_shop_content_width',
				$general_tab_ids_prefix . 'responsive_product_card_spacing',
				$general_tab_ids_prefix . 'responsive_product_card_outside_container_padding',
				$general_tab_ids_prefix . 'responsive_product_card_inside_container_padding',
				$general_tab_ids_prefix . 'responsive_shop_elements_separator',
				$general_tab_ids_prefix . 'responsive_woocommerce_catalog_view',
				$general_tab_ids_prefix . 'responsive_product_content_aligmnment',
				$general_tab_ids_prefix . 'responsive_woocommerce_shop_elements_positioning',
				$general_tab_ids_prefix . 'responsive_product_review_count',
				$general_tab_ids_prefix . 'responsive_shop_add_to_cart_action',
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
				
				$general_tab_ids_prefix . 'content_alignment_options',
				$general_tab_ids_prefix . 'shop_pagination',
				$general_tab_ids_prefix . 'shop_pagination_style',
				$general_tab_ids_prefix . 'shop_pagination_quick_view',
				$general_tab_ids_prefix . 'responsive_shop_sidebar_separator', 
				$general_tab_ids_prefix . 'responsive_shop_sidebar_position',
				$general_tab_ids_prefix . 'responsive_shop_sidebar_style',
				$general_tab_ids_prefix . 'responsive_shop_sidebar_width',
				$general_tab_ids_prefix . 'responsive_shop_display_options_separator',
				$general_tab_ids_prefix . 'woocommerce_shop_page_display',
				$general_tab_ids_prefix . 'woocommerce_category_archive_display',
				$general_tab_ids_prefix . 'woocommerce_default_catalog_orderby',
				$general_tab_ids_prefix . 'woocommerce_catalog_columns',
				$general_tab_ids_prefix . 'responsive_shop_products_per_page',
				$general_tab_ids_prefix . 'responsive_show_archive_results_count',
				$general_tab_ids_prefix . 'responsive_show_archive_sorting_dropdown',
				$general_tab_ids_prefix . 'responsive_product_image_hover_switch',
				$general_tab_ids_prefix . 'responsive_product_button_action_style',
				$general_tab_ids_prefix . 'responsive_product_button_style',
				$general_tab_ids_prefix . 'responsive_product_align_button_bottom',
				$general_tab_ids_prefix . 'responsive_product_mobile_columns',
				$general_tab_ids_prefix . 'responsive_product_catalog_container_layout_separator',
				$general_tab_ids_prefix . 'responsive_product_catalog_container_layout',
				$general_tab_ids_prefix . 'responsive_product_catalog_container_style_separator',
				$general_tab_ids_prefix . 'responsive_product_catalog_container_style',
			);
			
			$enable_native_popup_flag = get_theme_mod('enable_native_cart_popup');
			
			$native_general_pop_up_options = array(
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
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_typography_group',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_border_width_border',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_border_style',
				$design_tab_ids_prefix . 'responsive_add_to_cart_button_border_color',
				$design_tab_ids_prefix . 'responsive_border_add_to_cart_button_radius',
				$design_tab_ids_prefix . 'responsive_shop_product_sorting_separator',
				$design_tab_ids_prefix . 'responsive_sorting_option_text_color',
				$design_tab_ids_prefix . 'responsive_sorting_option_background_color',
				$design_tab_ids_prefix . 'responsive_off_canvas_close_button_color',
				$design_tab_ids_prefix . 'box_shadow_options',
				$design_tab_ids_prefix . 'box_shadow_hover_options',
				$design_tab_ids_prefix . 'product_image_hover_style_options',
				$design_tab_ids_prefix . 'responsive_shop_page_title_seperator',
				$design_tab_ids_prefix . 'responsive_shop_page_title_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_product_title_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_product_price_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_product_content_shop_typography_group',
				$design_tab_ids_prefix . 'responsive_shop_page_title_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_product_title_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_product_price_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_product_content_shop_typography_group_seperator',
				$design_tab_ids_prefix . 'responsive_shop_product_background_color', 
				$design_tab_ids_prefix . 'responsive_border_shop_product',
			);
			
			$native_design_pop_up_options = array(
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
			);
			
			if ( $enable_native_popup_flag === true || $enable_native_popup_flag === '1' || $enable_native_popup_flag === 1 ) {
				$general_tab_ids = array_merge( $general_tab_ids, $native_general_pop_up_options );
				$design_tab_ids = array_merge($design_tab_ids, $native_design_pop_up_options);
			}
			
			responsive_tabs_button_control( $wp_customize, 'woocommerce_shop_tabs', $tabs_label, 'responsive_woocommerce_shop', 1, '', 'responsive_woocommerce_shop_general_tab', 'responsive_woocommerce_shop_design_tab', $general_tab_ids, $design_tab_ids, null );
			
			// product background color
			$product_background_color_label =  esc_html__( 'Product Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'shop_product_background', $product_background_color_label, 'responsive_woocommerce_shop', 30,'#ffffff');
			
			// product border radius
			$product_border_radius_label = esc_html__( 'Border Radius (px)', 'responsive' );
			responsive_radius_control($wp_customize, 'shop_product', 'responsive_woocommerce_shop', 30, 8, 8, null, $product_border_radius_label, 'postMessage',);

			// Products Title Area Section Toggle.
			responsive_section_toggle_control(
				$wp_customize,
				'shop_title_area',
				__( 'Products Title Area', 'responsive' ),
				'responsive_woocommerce_shop',
				2,
				'section',
				'responsive_shop_title_layout',
				true,
				null,
				'refresh',
				'Enable the toggle to customize products title area settings.'
			);

			// Adding WooCommerce Products Title Layout Section.
			$wp_customize->add_section(
				'responsive_shop_title_layout',
				array(
					'title'    => esc_html__( 'Products Title Area', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 1,
				)
			);

			// Products Title Tabs.
			$shop_title_area_general_tab_ids = array(
				'customize-control-responsive_shop_title_layout',
				'customize-control-responsive_shop_title_elements_positioning',
				'customize-control-responsive_shop_archive_title',
				'customize-control-responsive_shop_archive_description',
				'customize-control-responsive_shop_title_horizontal_alignment',
			);

			$shop_title_area_design_tab_ids = array(
				'customize-control-responsive_shop_title_inner_elements_spacing',
			);

			// Products Title Area Tabs.
			responsive_tabs_button_control(
				$wp_customize,
				'shop_title_area_tabs',
				$tabs_label,
				'responsive_shop_title_layout',
				1,
				'',
				'responsive_shop_title_general_tab',
				'responsive_shop_title_design_tab',
				$shop_title_area_general_tab_ids,
				$shop_title_area_design_tab_ids,
				null
			);

			$shop_title_layout_choices = array(
				'post_title_layout1' => esc_html__( 'Layout 1', 'responsive' ),
				'post_title_layout2' => esc_html__( 'Layout 2', 'responsive' ),
			);

			$shop_title_layout_label = esc_html__( 'Banner Layout', 'responsive' );

			responsive_imageradio_button_control(
				$wp_customize,
				'shop_title_layout',
				$shop_title_layout_label,
				'responsive_shop_title_layout',
				1,
				$shop_title_layout_choices,
				'post_title_layout1',
				null,
				'svg',
				'refresh'
			);

			// Structure (Sortable control).
			$wp_customize->add_setting(
				'responsive_shop_title_elements_positioning',
				array(
					'default'           => array( 'title', 'description', 'breadcrumb' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_shop_title_elements_positioning',
					array(
						'label'    => esc_html__( 'Structure', 'responsive' ),
						'section'  => 'responsive_shop_title_layout',
						'settings' => 'responsive_shop_title_elements_positioning',
						'priority' => 2,
						'choices'  => array(
							'title'       => esc_html__( 'Title', 'responsive' ),
							'description' => esc_html__( 'Description', 'responsive' ),
							'breadcrumb'  => esc_html__( 'Breadcrumb', 'responsive' ),
						),
					)
				)
			);

			// Archive Title.
			$wp_customize->add_setting(
				'responsive_shop_archive_title',
				array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'responsive_shop_archive_title',
				array(
					'label'    => esc_html__( 'Archive Title', 'responsive' ),
					'section'  => 'responsive_shop_title_layout',
					'settings' => 'responsive_shop_archive_title',
					'type'     => 'text',
					'priority' => 3,
				)
			);

			// Archive Description.
			$wp_customize->add_setting(
				'responsive_shop_archive_description',
				array(
					'default'           => '',
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'responsive_shop_archive_description',
				array(
					'label'    => esc_html__( 'Archive Description', 'responsive' ),
					'section'  => 'responsive_shop_title_layout',
					'settings' => 'responsive_shop_archive_description',
					'type'     => 'textarea',
					'priority' => 4,
				)
			);

			// Horizontal Alignment.
			$shop_title_horizontal_alignment_label   = esc_html__( 'Horizontal Alignment', 'responsive' );
			$shop_title_horizontal_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$shop_title_horizontal_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}

			// Shop Title Horizontal Alignment.
			responsive_select_button_with_switchers_control(
				$wp_customize,
				'shop_title_horizontal_alignment',
				$shop_title_horizontal_alignment_label,
				'responsive_shop_title_layout',
				5,
				$shop_title_horizontal_alignment_choices,
				'center',
				null
			);

			// Inner Elements Spacing.
			$shop_title_inner_elements_spacing_label = esc_html__( 'Inner Elements Spacing (px)', 'responsive' );
			responsive_drag_number_control(
				$wp_customize,
				'shop_title_inner_elements_spacing',
				$shop_title_inner_elements_spacing_label,
				'responsive_shop_title_layout',
				10,
				Responsive\Core\get_responsive_customizer_defaults( 'shop_title_inner_elements_spacing' ),
				null,
				100,
				1,
				'postMessage'
			);

			// Layouts.
			$shop_layout_elements_label = esc_html__( 'Layouts', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_layout_elements_separator', $shop_layout_elements_label, 'responsive_woocommerce_shop', 10 );

			// Main Content Width.
			$shop_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'shop_content_width', $shop_content_width_label, 'responsive_woocommerce_shop', 20, Responsive\Core\get_responsive_customizer_defaults( 'shop_content_width' ), null, 100, 1, 'postMessage' );

			// Sidebar Layout heading.
			$shop_sidebar_heading = esc_html__( 'Sidebar Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_sidebar_separator', $shop_sidebar_heading, 'responsive_woocommerce_shop', 37, 'responsive_active_shop_sidebar_section');

			// Sidebar Position.
			$sidebar_label   = esc_html__( 'WooCommerce Sidebar Position', 'responsive' );
			$sidebar_choices = array(
				'global' => esc_html__( 'Global', 'responsive' ),
				'left'  => esc_html__( 'Left', 'responsive' ),
				'right' => esc_html__( 'Right', 'responsive' ),
				'no'    => esc_html__( 'No Sidebar', 'responsive' ),
			);

			if ( is_rtl() ) {
				$sidebar_choices = array(
					'global' => esc_html__( 'Global', 'responsive' ),
					'left'  => esc_html__( 'Left', 'responsive' ),
					'right' => esc_html__( 'Right', 'responsive' ),
					'no'    => esc_html__( 'No Sidebar', 'responsive' ),
				);
			}

			responsive_imageradio_button_control( $wp_customize, 'shop_sidebar_position', $sidebar_label, 'responsive_woocommerce_shop', 38, $sidebar_choices, 'global', 'responsive_active_shop_sidebar_section', 'svg');

			$shop_sidebar_style_label  = __( 'Sidebar Style', 'responsive' );
			$shop_sidebar_style_choice = array(
				'default' => esc_html__( 'Default', 'responsive' ),
				'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
				'boxed'   => esc_html__( 'Boxed', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'shop_sidebar_style', $shop_sidebar_style_label, 'responsive_woocommerce_shop', 39, $shop_sidebar_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_shop_sidebar_style' ), 'responsive_active_shop_sidebar_position', 'postMessage' );

			$container_spacing_label = esc_html__( 'Product Card Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'product_card_spacing', $container_spacing_label, 'responsive_woocommerce_shop', 30 );

			$sidebar_width_label = esc_html__( 'Sidebar Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'shop_sidebar_width', $sidebar_width_label, 'responsive_woocommerce_shop' , 40, 30, 'responsive_active_shop_sidebar_position', 50, 15, 'postMessage' );

			// Shop Display Options heading.
			$shop_display_options_heading = esc_html__( 'Shop Display Options', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_display_options_separator', $shop_display_options_heading, 'responsive_woocommerce_shop', 41 );

			// Products per page.
			$default_products_per_page = absint( get_option( 'woocommerce_catalog_columns', 4 ) ) * absint( get_option( 'woocommerce_catalog_rows', 4 ) );
			if ( ! $default_products_per_page ) {
				$default_products_per_page = 16;
			}
			$wp_customize->add_setting(
				'responsive_shop_products_per_page',
				array(
					'default'           => $default_products_per_page,
					'sanitize_callback' => 'absint',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_shop_products_per_page',
				array(
					'label'       => esc_html__( 'Products per page', 'responsive' ),
					'description' => esc_html__( 'How many products should be shown per page?', 'responsive' ),
					'section'     => 'responsive_woocommerce_shop',
					'priority'    => 46,
					'type'        => 'number',
					'input_attrs' => array(
						'min'  => 1,
						'step' => 1,
					),
				)
			);

			// Archive Results Count.
			$show_archive_results_count_label = esc_html__( 'Show Archive Results Count?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'show_archive_results_count', $show_archive_results_count_label, 'responsive_woocommerce_shop', 47, Responsive\Core\get_responsive_customizer_defaults( 'responsive_show_archive_results_count' ), null, 'refresh' );

			// Archive Sorting Dropdown.
			$show_archive_sorting_dropdown_label = esc_html__( 'Show Archive Sorting Dropdown?', 'responsive' );
			responsive_toggle_control( $wp_customize, 'show_archive_sorting_dropdown', $show_archive_sorting_dropdown_label, 'responsive_woocommerce_shop', 48, Responsive\Core\get_responsive_customizer_defaults( 'responsive_show_archive_sorting_dropdown' ), null, 'refresh' );

			// Product Image Hover Switch.
			$product_image_hover_switch_label   = esc_html__( 'Product Image Hover Switch', 'responsive' );
			$product_image_hover_switch_choices = array(
				'none'  => esc_html__( 'None', 'responsive' ),
				'fade'  => esc_html__( 'Fade', 'responsive' ),
				'slide' => esc_html__( 'Slide', 'responsive' ),
				'zoom'  => esc_html__( 'Zoom', 'responsive' ),
				'flip'  => esc_html__( 'Flip', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'product_image_hover_switch', $product_image_hover_switch_label, 'responsive_woocommerce_shop', 49, $product_image_hover_switch_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_image_hover_switch' ), null, 'refresh' );

			// Button Action Style.
			$product_button_action_style_label   = esc_html__( 'Button Action Style', 'responsive' );
			$product_button_action_style_choices = array(
				'always'          => esc_html__( 'Always Visible', 'responsive' ),
				'bottom_slide_up' => esc_html__( 'Bottom Slide Up', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'product_button_action_style', $product_button_action_style_label, 'responsive_woocommerce_shop', 49.5, $product_button_action_style_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_action_style' ), null, 'refresh' );

			// Button Style.
			$product_button_style_label   = esc_html__( 'Button Style', 'responsive' );
			$product_button_style_choices = array(
				'button'          => esc_html__( 'Button', 'responsive' ),
				'text_with_arrow' => esc_html__( 'Text with Arrow', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'product_button_style', $product_button_style_label, 'responsive_woocommerce_shop', 49.8, $product_button_style_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_button_style' ), null, 'refresh' );

			// Align Button at Bottom.
			responsive_toggle_control( $wp_customize, 'product_align_button_bottom', esc_html__( 'Align Button at Bottom', 'responsive' ), 'responsive_woocommerce_shop', 49.9, Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_align_button_bottom' ), null, 'refresh' );

			// Mobile Columns Layout.
			$product_mobile_columns_label   = esc_html__( 'Mobile Columns Layout', 'responsive' );
			$product_mobile_columns_choices = array(
				'1' => esc_html__( 'One Column', 'responsive' ),
				'2' => esc_html__( 'Two Column', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'product_mobile_columns', $product_mobile_columns_label, 'responsive_woocommerce_shop', 49.95, $product_mobile_columns_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_product_mobile_columns' ), null, 'refresh' );

			$outside_container_label = __( 'Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'product_card_outside_container', 'responsive_woocommerce_shop', 33, 15, 15, '', $outside_container_label );

			// Inside Container.
			$inside_container_label = __( 'Margin (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'product_card_inside_container', 'responsive_woocommerce_shop', 36, 10, 10, '', $inside_container_label, 'postMessage', 10, 0, 10, 0 );

			// Shop Elements.
			$shop_elements_label = esc_html__( 'Shop Product', 'responsive' );
			responsive_separator_control( $wp_customize, 'shop_elements_separator', $shop_elements_label, 'responsive_woocommerce_shop', 50 );

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
			// Review Count.
			$product_review_count_label   = esc_html__( 'Review Count', 'responsive' );
			$product_review_count_choices = array(
				'default'    => __( 'Default', 'responsive' ),
				'count-text' => __( 'Count + Text', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'product_review_count', $product_review_count_label, 'responsive_woocommerce_shop', 78, $product_review_count_choices, 'default', 'responsive_check_shop_ratings_visible' );

			// Add To Cart Action.
			$shop_add_to_cart_action_label   = esc_html__( 'Add To Cart Action', 'responsive' );
			$shop_add_to_cart_action_choices = array(
				'default'       => __( 'Default', 'responsive' ),
				'slide_in_cart' => __( 'Slide in cart', 'responsive' ),
			);
			$shop_add_to_cart_action_desc    = __( 'Please publish the changes and see result on the frontend. [Slide in cart requires Cart added inside Header Builder]', 'responsive' );
			responsive_select_control( $wp_customize, 'shop_add_to_cart_action', $shop_add_to_cart_action_label, 'responsive_woocommerce_shop', 79, $shop_add_to_cart_action_choices, 'default', 'responsive_check_shop_add_to_cart_visible', 'refresh', $shop_add_to_cart_action_desc );

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

		/**
		 * Move controls from woocommerce_product_catalog to responsive_woocommerce_shop and remove that section.
		 *
		 * @param WP_Customize_Manager $wp_customize WordPress customization option.
		 */
		public function move_wc_catalog_controls( $wp_customize ) {
			$wc_catalog_controls = array(
				'woocommerce_shop_page_display'        => 42,
				'woocommerce_category_archive_display' => 43,
				'woocommerce_default_catalog_orderby'  => 44,
				'woocommerce_catalog_columns'          => 45,
			);

			foreach ( $wc_catalog_controls as $control_id => $priority ) {
				$control = $wp_customize->get_control( $control_id );
				if ( $control ) {
					$control->section  = 'responsive_woocommerce_shop';
					$control->priority = $priority;
				}
			}

			// Remove rows per page control from Customizer UI while keeping the option/theme_mod intact.
			$wp_customize->remove_control( 'woocommerce_catalog_rows' );

			if ( method_exists( $wp_customize, 'controls' ) ) {
				foreach ( $wp_customize->controls() as $control ) {
					if ( 'woocommerce_product_catalog' === $control->section ) {
						if ( 'woocommerce_catalog_rows' === $control->id ) {
							continue;
						}
						$control->section  = 'responsive_woocommerce_shop';
						$control->priority = 46;
					}
				}
			}

			$wp_customize->remove_section( 'woocommerce_product_catalog' );
		}
	}

endif;

return new Responsive_Woocommerce_Shop_Layout_Customizer();
