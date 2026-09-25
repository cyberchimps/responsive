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
				$general_tab_ids_prefix . 'responsive_single_product_title_area',
				$general_tab_ids_prefix . 'responsive_single_product_layout_elements_separator',
				$general_tab_ids_prefix . 'responsive_single_product_content_width',
				$general_tab_ids_prefix . 'responsive_single_product_elements_separator',
				$general_tab_ids_prefix . 'responsive_single_product_gallery_layout',
				$general_tab_ids_prefix . 'responsive_woocommerce_product_elements_positioning',
				$general_tab_ids_prefix . 'responsive_single_product_show_related_products',
				$general_tab_ids_prefix . 'responsive_single_product_related_products_columns',
				$general_tab_ids_prefix . 'responsive_single_product_floating_bar_separator',
				$general_tab_ids_prefix . 'responsive_single_product_floating_bar',
				$general_tab_ids_prefix . 'responsive_single_product_image_width',
				$general_tab_ids_prefix . 'responsive_single_product_breadcrumbs',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_position',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_style',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_separator',
				$general_tab_ids_prefix . 'responsive_single_product_sidebar_width',
				$general_tab_ids_prefix . 'responsive_single_product_container_layout_separator',
				$general_tab_ids_prefix . 'responsive_single_product_container_layout',
				$general_tab_ids_prefix . 'responsive_single_product_container_style_separator',
				$general_tab_ids_prefix . 'responsive_single_product_container_style',
			);


			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_single_product_site_background_color',
				$design_tab_ids_prefix . 'responsive_single_product_content_background_color',
				$design_tab_ids_prefix . 'responsive_single_product_floating_bar_design_separator',
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
				$design_tab_ids_prefix . 'responsive_single_product_spacing',
				$design_tab_ids_prefix . 'responsive_single_product_outside_container_padding',
				$design_tab_ids_prefix . 'responsive_single_product_inside_container_padding',
			);

		
			responsive_tabs_button_control( $wp_customize, 'woocommerce_single_product_tabs', $tabs_label, 'responsive_woocommerce_single_product_layout', 1, '', 'responsive_woocommerce_single_product_general_tab', 'responsive_woocommerce_single_product_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Product Title Area Section Toggle.
			responsive_section_toggle_control(
				$wp_customize,
				'single_product_title_area',
				__( 'Product Title Area', 'responsive' ),
				'responsive_woocommerce_single_product_layout',
				2,
				'section',
				'responsive_single_product_title_layout',
				true,
				null,
				'refresh',
				'Enable the toggle to customize product title area settings.'
			);

			// Adding WooCommerce Product Title Layout Section.
			$wp_customize->add_section(
				'responsive_single_product_title_layout',
				array(
					'title'    => esc_html__( 'Product Title Area', 'responsive' ),
					'panel'    => 'woocommerce',
					'priority' => 1,
				)
			);

			// Product Title Tabs.
			$single_product_title_area_general_tab_ids = array(
				'customize-control-responsive_single_product_title_layout',
				'customize-control-responsive_single_product_title_elements_positioning',
				'customize-control-responsive_single_product_banner_elements_positioning',
				'customize-control-responsive_single_product_title_meta',
				'customize-control-responsive_single_product_title_meta_separator_text',
				'customize-control-responsive_single_product_title_horizontal_alignment',
			);
			$single_product_title_area_design_tab_ids  = array(
				'customize-control-responsive_single_product_title_inner_elements_spacing',
				'customize-control-responsive_single_product_title_color',
				'customize-control-responsive_single_product_text_color',
				'customize-control-responsive_single_product_title_link_color',
				'customize-control-responsive_single_product_title_link_separator',
				'customize-control-responsive_single_product_title_typography_group',
				'customize-control-responsive_single_product_text_typography_group',
				'customize-control-responsive_single_product_meta_typography_group',
				'customize-control-responsive_single_product_title_typography_separator',
				'customize-control-responsive_single_product_banner_padding_padding',
				'customize-control-responsive_single_product_banner_margin_padding',
			);

			// Product Title Area Tabs.
			responsive_tabs_button_control(
				$wp_customize,
				'single_product_title_area_tabs',
				$tabs_label,
				'responsive_single_product_title_layout',
				1,
				'',
				'responsive_single_product_title_general_tab',
				'responsive_single_product_title_design_tab',
				$single_product_title_area_general_tab_ids,
				$single_product_title_area_design_tab_ids,
				null
			);

			$single_product_title_layout_choices = array(
				'post_title_layout1' => esc_html__( 'Layout 1', 'responsive' ),
				'post_title_layout2' => esc_html__( 'Layout 2', 'responsive' ),
			);

			$single_product_title_layout_label = esc_html__( 'Banner Layout', 'responsive' );

			responsive_imageradio_button_control(
				$wp_customize,
				'single_product_title_layout',
				$single_product_title_layout_label,
				'responsive_single_product_title_layout',
				1,
				$single_product_title_layout_choices,
				'post_title_layout1',
				null,
				'svg',
				'refresh'
			);

			/**
			 * Single Product Title Area Layout 1 Structure.
			 */
			$wp_customize->add_setting(
				'responsive_single_product_title_elements_positioning',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_title_elements_positioning' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_single_product_title_elements_positioning',
					array(
						'label'           => esc_html__( 'Structure', 'responsive' ),
						'section'         => 'responsive_single_product_title_layout',
						'settings'        => 'responsive_single_product_title_elements_positioning',
						'priority'        => 4,
						'choices'         => responsive_single_product_title_elements(),
						'sub_controls'    => array(
							'meta'     => array(
								'responsive_single_product_title_meta_separator_text',
							),
							'taxonomy' => array(
								'responsive_single_product_taxonomy',
								'responsive_single_product_taxonomy_style',
							),
						),
						'taxonomy_choices' => responsive_get_single_product_taxonomies(),
						'active_callback' => 'responsive_single_product_title_layout1_active_callback',
					)
				)
			);

			/**
			 * Single Product Title Area Layout 2 Structure.
			 */
			$wp_customize->add_setting(
				'responsive_single_product_banner_elements_positioning',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_banner_elements_positioning' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_single_product_banner_elements_positioning',
					array(
						'label'           => esc_html__( 'Structure', 'responsive' ),
						'section'         => 'responsive_single_product_title_layout',
						'settings'        => 'responsive_single_product_banner_elements_positioning',
						'priority'        => 5,
						'choices'         => responsive_single_product_banner_elements(),
						'sub_controls'    => array(
							'meta'     => array(
								'responsive_single_product_title_meta_separator_text',
							),
							'taxonomy' => array(
								'responsive_single_product_taxonomy',
								'responsive_single_product_taxonomy_style',
							),
						),
						'taxonomy_choices' => responsive_get_single_product_taxonomies(),
						'active_callback' => 'responsive_single_product_title_layout2_active_callback',
					)
				)
			);

			/**
			 * Single Product Meta Elements.
			 */
			$wp_customize->add_setting(
				'responsive_single_product_title_meta',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_title_meta' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_single_product_title_meta',
					array(
						'label'           => esc_html__( 'Meta Elements', 'responsive' ),
						'section'         => 'responsive_single_product_title_layout',
						'settings'        => 'responsive_single_product_title_meta',
						'priority'        => 6,
						'choices'         => responsive_single_product_meta_choices(),
						'cloneable_choices' => array( 'taxonomy' ),
						'sub_controls'    => array(
							'author'  => array(
								'responsive_single_product_author_prefix_label',
								'responsive_single_product_author_avatar',
								'responsive_single_product_author_avatar_size',
							),
							'date'    => array(
								'responsive_single_product_date_format',
							),
							'updated' => array(
								'responsive_single_product_updated_format',
							),
							'taxonomy' => true,
						),
						'taxonomy_choices' => responsive_get_single_product_taxonomies(),
						'active_callback' => 'responsive_single_product_meta_active_callback',
					)
				)
			);

			// Horizontal Alignment.
			$single_product_title_horizontal_alignment_label   = esc_html__( 'Horizontal Alignment', 'responsive' );
			$single_product_title_horizontal_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_product_title_horizontal_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}

			// Single Product Title Horizontal Alignment.
			responsive_select_button_with_switchers_control(
				$wp_customize,
				'single_product_title_horizontal_alignment',
				$single_product_title_horizontal_alignment_label,
				'responsive_single_product_title_layout',
				7,
				$single_product_title_horizontal_alignment_choices,
				'left',
				null
			);

			// Author Meta Sub-Controls.
			$wp_customize->add_setting(
				'responsive_single_product_author_prefix_label',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_author_prefix_label' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_setting(
				'responsive_single_product_author_avatar',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_author_avatar' ),
					'sanitize_callback' => 'responsive_sanitize_toggle',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_setting(
				'responsive_single_product_author_avatar_size',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_author_avatar_size' ),
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'postMessage',
				)
			);

			// Date Meta Sub-Controls.
			$wp_customize->add_setting(
				'responsive_single_product_date_format',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_date_format' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			// Updated Meta Sub-Controls.
			$wp_customize->add_setting(
				'responsive_single_product_updated_format',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_updated_format' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			// Taxonomy Sub-Controls.
			$wp_customize->add_setting(
				'responsive_single_product_taxonomy',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_taxonomy' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_setting(
				'responsive_single_product_taxonomy_style',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_taxonomy_style' ),
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			// Meta Elements Taxonomies Data.
			$wp_customize->add_setting(
				'responsive_single_product_meta_taxonomies',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'single_product_meta_taxonomies' ),
					'sanitize_callback' => 'responsive_sanitize_json',
					'type'              => 'theme_mod',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_single_product_meta_taxonomies',
				array(
					'section'  => 'responsive_single_product_title_layout',
					'settings' => 'responsive_single_product_meta_taxonomies',
					'type'     => 'hidden',
				)
			);

			// Meta Separator Text.
			$wp_customize->add_setting(
				'responsive_single_product_title_meta_separator_text',
				array(
					'default'           => '•',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				'responsive_single_product_title_meta_separator_text',
				array(
					'section'  => 'responsive_single_product_title_layout',
					'settings' => 'responsive_single_product_title_meta_separator_text',
					'type'     => 'hidden',
				)
			);

			// Inner Elements Spacing.
			$single_product_title_inner_elements_spacing_label = esc_html__( 'Inner Elements Spacing (px)', 'responsive' );
			responsive_drag_number_control(
				$wp_customize,
				'single_product_title_inner_elements_spacing',
				$single_product_title_inner_elements_spacing_label,
				'responsive_single_product_title_layout',
				10,
				Responsive\Core\get_responsive_customizer_defaults( 'single_product_title_inner_elements_spacing' ),
				null,
				100,
				1,
				'postMessage'
			);

			// Title Color.
			$single_product_title_color_label = esc_html__( 'Title Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'single_product_title',
				$single_product_title_color_label,
				'responsive_single_product_title_layout',
				15,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_title_color' )
			);

			// Text Color.
			$single_product_text_color_label = esc_html__( 'Text Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'single_product_text',
				$single_product_text_color_label,
				'responsive_single_product_title_layout',
				16,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_text_color' )
			);

			// Link Color.
			$single_product_link_color_label = esc_html__( 'Link Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'single_product_title_link',
				$single_product_link_color_label,
				'responsive_single_product_title_layout',
				17,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_title_link_color' ),
				null,
				'',
				true,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_title_link_hover_color' ),
				'single_product_title_link_hover'
			);

			// Separator.
			responsive_horizontal_separator_control( $wp_customize, 'single_product_title_link_separator', 1, 'responsive_single_product_title_layout', 18, 1 );

			// Title Font.
			$single_product_title_typography_label = esc_html__( 'Title Font', 'responsive' );
			responsive_typography_group_control(
				$wp_customize,
				'single_product_title_typography_group',
				$single_product_title_typography_label,
				'responsive_single_product_title_layout',
				19,
				'single_product_title_typography',
				true
			);

			// Text Font.
			$single_product_text_typography_label = esc_html__( 'Text Font', 'responsive' );
			responsive_typography_group_control(
				$wp_customize,
				'single_product_text_typography_group',
				$single_product_text_typography_label,
				'responsive_single_product_title_layout',
				20,
				'single_product_text_typography',
				true
			);

			// Meta Font.
			$single_product_meta_typography_label = esc_html__( 'Meta Font', 'responsive' );
			responsive_typography_group_control(
				$wp_customize,
				'single_product_meta_typography_group',
				$single_product_meta_typography_label,
				'responsive_single_product_title_layout',
				21,
				'single_product_meta_typography',
				true
			);

			// Separator.
			responsive_horizontal_separator_control( $wp_customize, 'single_product_title_typography_separator', 1, 'responsive_single_product_title_layout', 22, 1 );

			// Padding.
			responsive_unit_padding_control( $wp_customize, 'single_product_banner_padding', 'responsive_single_product_title_layout', 23, 30, 0, null, esc_html__( 'Padding', 'responsive' ), 'postMessage', 30, 0, 30, 0, 'px' );

			// Margin.
			responsive_unit_padding_control( $wp_customize, 'single_product_banner_margin', 'responsive_single_product_title_layout', 24, '', '', null, esc_html__( 'Margin', 'responsive' ), 'postMessage', '', '', '', '', 'px', 24, null, 24, null, 24, null );

			// Layouts.
			$single_product_layout_elements_label = esc_html__( 'Layouts', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_layout_elements_separator', $single_product_layout_elements_label, 'responsive_woocommerce_single_product_layout', 10 );

			// Main Content Width.
			$single_product_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_product_content_width', $single_product_content_width_label, 'responsive_woocommerce_single_product_layout', 20, 100, null, 100, 1, 'postMessage' );

			// Sidebar Options Heading.
			$single_product_sidebar_heading = esc_html__( 'Sidebar Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_sidebar_separator', $single_product_sidebar_heading, 'responsive_woocommerce_single_product_layout', 65, 'responsive_active_single_product_sidebar_section');

			// Sidebar Position.
			$sidebar_label   = esc_html__( 'Sidebar Position', 'responsive' );
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

			responsive_imageradio_button_control( $wp_customize, 'single_product_sidebar_position', $sidebar_label, 'responsive_woocommerce_single_product_layout', 66, $sidebar_choices, 'global', 'responsive_active_single_product_sidebar_section', 'svg' );

			$single_product_sidebar_style_label  = __( 'Sidebar Style', 'responsive' );
			$single_product_sidebar_style_choice = array(
				'default' => esc_html__( 'Default', 'responsive' ),
				'unboxed' => esc_html__( 'Unboxed', 'responsive' ),
				'boxed'   => esc_html__( 'Boxed', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_product_sidebar_style', $single_product_sidebar_style_label, 'responsive_woocommerce_single_product_layout', 67, $single_product_sidebar_style_choice, Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_sidebar_style' ), 'responsive_active_single_product_sidebar_position', 'postMessage' );

			// Sidebar Width
			$single_product_sidebar_width_label = esc_html__( 'Sidebar Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_product_sidebar_width', $single_product_sidebar_width_label, 'responsive_woocommerce_single_product_layout', 68, 30, 'responsive_active_single_product_sidebar_position', 50, 15, 'postMessage' );
			
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

			// Show Related Products toggle.
			$single_product_show_related_products_label = esc_html__( 'Show Related Products', 'responsive' );
			responsive_toggle_control( $wp_customize, 'single_product_show_related_products', $single_product_show_related_products_label, 'responsive_woocommerce_single_product_layout', 61, 1, null );

			// Related Products Columns button selector.
			$single_product_related_products_columns_label   = esc_html__( 'Related Products Columns', 'responsive' );
			$single_product_related_products_columns_choices = array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
			);
			responsive_select_button_control(
				$wp_customize,
				'single_product_related_products_columns',
				$single_product_related_products_columns_label,
				'responsive_woocommerce_single_product_layout',
				62,
				$single_product_related_products_columns_choices,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_related_products_columns' ),
				'responsive_active_single_product_related_products',
				'refresh'
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

			// Product Image Width.
			$single_product_image_width_label = esc_html__( 'Image Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_product_image_width', $single_product_image_width_label, 'responsive_woocommerce_single_product_layout', 46, 48, null, 70, 20, 'refresh' );

			// Single Product Site Background Color.
			$single_product_site_background_color_label = esc_html__( 'Single Product Background', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'single_product_site_background',
				$single_product_site_background_color_label,
				'responsive_woocommerce_single_product_layout',
				68,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_site_background_color' ),
				null,
				'',
				false,
				null,
				null,
				false,
				null,
				null,
				'color',
				'postMessage'
			);

			// Single Product Content Background Color.
			$single_product_content_background_color_label = esc_html__( 'Content Background', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'single_product_content_background',
				$single_product_content_background_color_label,
				'responsive_woocommerce_single_product_layout',
				69,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_product_content_background_color' ),
				null,
				'',
				false,
				null,
				null,
				false,
				null,
				null,
				'color',
				'postMessage'
			);

			/*
			 * Color settings for floating bar
			 */
			$single_product_floating_bar_design_label = esc_html__( 'Floating Bar', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_floating_bar_design_separator', $single_product_floating_bar_design_label, 'responsive_woocommerce_single_product_layout', 70 );

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

			// Spacing heading.
			$single_product_spacing_label = esc_html__( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_product_spacing', $single_product_spacing_label, 'responsive_woocommerce_single_product_layout', 86 );

			// Outside Container.
			responsive_unit_padding_control( $wp_customize, 'single_product_outside_container', 'responsive_woocommerce_single_product_layout', 87, '', '', null, esc_html__( 'Outside Container', 'responsive' ), 'postMessage', '', '', '', '', 'px' );

			// Inside Container.
			responsive_unit_padding_control( $wp_customize, 'single_product_inside_container', 'responsive_woocommerce_single_product_layout', 88, '', '', null, esc_html__( 'Inside Container', 'responsive' ), 'postMessage', '', '', '', '', 'px' );

		}


	}

endif;

return new Responsive_Woocommerce_Single_Product_Layout_Customizer();
