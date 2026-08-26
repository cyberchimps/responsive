<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Page_Content_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Page_Content_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Check if Responsive Pro is greater.
		 *
		 * @since 4.9.7
		 */
		public function is_pro_version_greater() {
			$is_pro_version_greater = false;
			if ( ! defined( 'RESPONSIVE_ADDONS_PRO_VERSION' ) ) {
				return false;
			}
			if ( version_compare( RESPONSIVE_ADDONS_PRO_VERSION, '2.6.3', '>' ) ) {
				$is_pro_version_greater = true;
			}
			return $is_pro_version_greater;
		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_border_page_border_radius',
				$design_tab_ids_prefix . 'responsive_page_typography_title_separator',
				$design_tab_ids_prefix . 'responsive_page_title_typography_group_separator',
				$design_tab_ids_prefix . 'responsive_page_site_background_color',
				$design_tab_ids_prefix . 'responsive_page_content_background_color',
				$design_tab_ids_prefix . 'responsive_page_content_background_separator',
				$design_tab_ids_prefix . 'responsive_page_content_before_background_separator',
			);

			$general_tab_ids_prefix = 'customize-control-responsive_page_';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'content_width',
				$general_tab_ids_prefix . 'elements_separator',
				$general_tab_ids_prefix . 'featured_image_separator',
				$general_tab_ids_prefix . 'featured_image_width',
				$general_tab_ids_prefix . 'featured_image_style',
				$general_tab_ids_prefix . 'featured_image_style',
				$general_tab_ids_prefix . 'featured_image_alignment',
				$general_tab_ids_prefix . 'title_separator',
				$general_tab_ids_prefix . 'title_alignment',
				$general_tab_ids_prefix . 'content_separator',
				$general_tab_ids_prefix . 'content_alignment',
				$general_tab_ids_prefix . 'content_width_separator',
				$general_tab_ids_prefix . 'featured_image_width_separator',
				$general_tab_ids_prefix . 'featured_image_style_separator',
				$general_tab_ids_prefix . 'featured_image_alignment_separator',
				$general_tab_ids_prefix . 'title_alignment_separator',
				$general_tab_ids_prefix . 'sidebar_separator',
				$general_tab_ids_prefix . 'sidebar_position',
				$general_tab_ids_prefix . 'sidebar_style',
				$general_tab_ids_prefix . 'sidebar_width',
				$general_tab_ids_prefix . 'container_layout',
				$general_tab_ids_prefix . 'container_style',
				$general_tab_ids_prefix . 'container_layout_separator',
				$general_tab_ids_prefix . 'container_style_separator',
				$general_tab_ids_prefix . 'content_alignment_separator',
				$general_tab_ids_prefix . 'show_comments',
				$general_tab_ids_prefix . 'default_sidebar_before_separator',
                $general_tab_ids_prefix . 'default_sidebar',
				$general_tab_ids_prefix . 'title_area',
				$general_tab_ids_prefix . 'container_spacing',
				$general_tab_ids_prefix . 'outside_container_padding',
				$general_tab_ids_prefix . 'inside_container_padding'

			);
			responsive_tabs_button_control( $wp_customize, 'page_tabs', $tabs_label, 'responsive_page', 5, '', 'responsive_page_content_general_tab', 'responsive_page_content_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Page Title Area
			responsive_section_toggle_control( $wp_customize, 'page_title_area', __( 'Page Title Area', 'responsive' ), 'responsive_page', 8, 'section', 'responsive_page_title_area_layout', true, null, 'refresh', 'Enable the toggle to customize page title title settings.');

			// Page Title Tabs
			$page_title_general_tab_ids = [
				'customize-control-responsive_page_title_layout',
				'customize-control-responsive_page_title_horizontal_alignment',
				'customize-control-responsive_page_title_container_width',
				'customize-control-responsive_page_title_custom_width',
				'customize-control-responsive_page_title_vertical_alignment',
				'customize-control-responsive_page_meta_control_separator',
				'customize-control-responsive_page_single_meta',
				'customize-control-responsive_page_single_meta_separator_text',
				'customize-control-responsive_page_single_meta_separator_text_separator',
				'customize-control-responsive_page_single_elements_positioning',
				'customize-control-responsive_page_featured_image_separator',
				'customize-control-responsive_page_featured_image_width',
				'customize-control-responsive_page_featured_image_width_separator',
				'customize-control-responsive_page_featured_image_style',
				'customize-control-responsive_page_featured_image_style_separator',
				'customize-control-responsive_page_featured_image_alignment',
				'customize-control-responsive_page_featured_image_alignment_separator',
				'customize-control-responsive_page_featured_image_position',
				'customize-control-responsive_page_featured_image_ratio',
				'customize-control-responsive_page_featured_image_predefined_ratio',
				'customize-control-responsive_page_featured_image_custom_width',
				'customize-control-responsive_page_featured_image_custom_height',
				'customize-control-responsive_page_featured_image_size',
			];

			$page_title_design_tab_ids = [
				'customize-control-responsive_page_title_banner_min_height',
				'customize-control-responsive_page_title_banner_background_color',
				'customize-control-responsive_page_title_inner_elements_spacing',
				'customize-control-responsive_page_title_inner_elements_spacing_separator',
				'customize-control-responsive_page_title_area_title_color',
				'customize-control-responsive_page_title_area_text_color',
				'customize-control-responsive_page_title_area_link_color',
				'customize-control-responsive_page_title_area_link_hover_color',
				'customize-control-responsive_page_title_area_link_hover_separator',
				'customize-control-responsive_page_title_area_title_typography_group',
				'customize-control-responsive_page_title_area_text_typography_group',
				'customize-control-responsive_page_title_area_meta_typography_group',
				'customize-control-responsive_page_title_banner_padding_padding',
				'customize-control-responsive_page_title_banner_margin_padding',
				'customize-control-responsive_page_featured_image_overlay_color',
				'customize-control-responsive_page_title_area_meta_typography_group_separator'
			];

			// Single Blog Post Title Tabs
			$tabs_label = esc_html__( 'Tabs', 'responsive' );

			responsive_tabs_button_control( $wp_customize, 'page_title_tabs', $tabs_label, 'responsive_page_title_area_layout', 1, '', 'responsive_page_title_general_tab', 'responsive_page_title_design_tab', $page_title_general_tab_ids, $page_title_design_tab_ids, null );

			$page_title_layout_choices = array(
				'post_title_layout1'    => esc_html__( 'Layout 1', 'responsive' ),
				'post_title_layout2'     => esc_html__( 'Layout 2', 'responsive' ),
			);
			
			$page_title_layout_label   = esc_html__( 'Banner Layout', 'responsive' );

			responsive_imageradio_button_control( $wp_customize, 'page_title_layout', $page_title_layout_label, 'responsive_page_title_area_layout', 1, $page_title_layout_choices, 'post_title_layout1', null, 'svg', 'refresh' );
			
			// Horizontal Alignment.
			$page_title_horizontal_alignment_label   = esc_html__( 'Horizontal Alignment', 'responsive' );
			$page_title_horizontal_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$page_title_horizontal_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}

			// Page Title Horizontal Alignment
			responsive_select_button_with_switchers_control( $wp_customize, 'page_title_horizontal_alignment', $page_title_horizontal_alignment_label, 'responsive_page_title_area_layout', 135, $page_title_horizontal_alignment_choices, 'left', null );

			// Container Width.
			$page_title_container_width_label   = esc_html__( 'Container Width', 'responsive' );
			$page_title_container_width_choices = array(
				'full_width' => esc_html__( 'Full Width', 'responsive' ),
				'custom'     => esc_html__( 'Custom', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'page_title_container_width', $page_title_container_width_label, 'responsive_page_title_area_layout', 2, $page_title_container_width_choices, 'full_width', null, 'refresh' );

			// Custom Width.
			$page_title_custom_width_label = esc_html__( 'Custom Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_title_custom_width', $page_title_custom_width_label, 'responsive_page_title_area_layout', 3, 1316, null, 1920, 768, 'postMessage' );

			// Vertical Alignment.
			$page_title_vertical_alignment_label   = esc_html__( 'Vertical Alignment', 'responsive' );
			$page_title_vertical_alignment_choices = array(
				'flex-start'   => esc_html__( 'Top', 'responsive' ),
				'center' => esc_html__( 'Middle', 'responsive' ),
				'flex-end'  => esc_html__( 'Bottom', 'responsive' ),
			);

			// Banner Min Height
			$page_title_banner_min_height_label = esc_html__( 'Banner Min Height (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'page_title_banner_min_height', $page_title_banner_min_height_label, 'responsive_page_title_area_layout', 4, 0, null, 1000, 0, 'postMessage' );

			// Banner Background Color
			$page_title_banner_background_color_label = __( 'Banner Background Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'page_title_banner_background', $page_title_banner_background_color_label, 'responsive_page_title_area_layout', 4, Responsive\Core\get_responsive_customizer_defaults( 'responsive_page_title_banner_background_color' ) );


			// Page Title Vertical Alignment
			responsive_select_button_control( $wp_customize, 'page_title_vertical_alignment', $page_title_vertical_alignment_label, 'responsive_page_title_area_layout', 135, $page_title_vertical_alignment_choices, 'flex-start', null );

			/**
			* Entry meta.
			*/
			$page_meta_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_meta_control_separator', $page_meta_label, 'responsive_page_title_area_layout', 136 );

			/**
			 * Page Single Meta
			 */
			$wp_customize->add_setting(
				'responsive_page_single_meta',
				array(
					'default'           => array( 'author', 'date', 'categories', 'comments', 'tag' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_page_single_meta',
					array(
						'label'    => esc_html__( 'Meta Elements', 'responsive' ),
						'section'  => 'responsive_page_title_area_layout',
						'settings' => 'responsive_page_single_meta',
						'priority' => 137,
						'choices'  => apply_filters(
							'responsive_page_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date Published', 'responsive' ),
								'updated'    => esc_html__( 'Last Updated', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
							)
						),
					)
				)
			);

			// Meta Separator Text.
			$wp_customize->add_setting(
				'responsive_page_single_meta_separator_text',
				array(
					'default'           => '•',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				'responsive_page_single_meta_separator_text',
				array(
					'section'  => 'responsive_page_title_area_layout',
					'settings' => 'responsive_page_single_meta_separator_text',
					'priority' => 138,
					'type'     => 'hidden',
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'page_single_meta_separator_text_separator', 1, 'responsive_page_title_area_layout', 139, 1 );

			// Inner Elements Spacing
			$page_title_inner_elements_spacing_label = esc_html__( 'Inner Elements Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_title_inner_elements_spacing', $page_title_inner_elements_spacing_label, 'responsive_page_title_area_layout', 5, Responsive\Core\get_responsive_customizer_defaults( 'page_title_inner_elements_spacing' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'page_title_inner_elements_spacing_separator', 1, 'responsive_page_title_area_layout',6, 1 );

			// Page Title Color
			$page_title_color_label = __( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'page_title_area_title', $page_title_color_label, 'responsive_page_title_area_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_title_color' ) );

			// Page Text Color
			$page_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'page_title_area_text', $page_text_color_label, 'responsive_page_title_area_layout', 15, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_text_color' ) );

			// Page Post Link Color
			$page_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'page_title_area_link', $page_link_color_label, 'responsive_page_title_area_layout', 20, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_link_color' ) );

			// Page Post Link Hover Color
			$page_link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'page_title_area_link_hover', $page_link_hover_color_label, 'responsive_page_title_area_layout', 25, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_link_hover_color' ) );

			responsive_horizontal_separator_control( $wp_customize, 'page_title_area_link_hover_separator', 1, 'responsive_page_title_area_layout',30, 1 );

			// Page Title Font
			$page_title_typography_label = __( 'Title Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'page_title_area_title_typography_group', $page_title_typography_label, 'responsive_page_title_area_layout', 35, 'page_title_area_title_typography', true );

			// Page Text Font
			$page_text_typography_label = __( 'Text Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'page_title_area_text_typography_group', $page_text_typography_label, 'responsive_page_title_area_layout', 40, 'page_title_area_text_typography', true );
			
			// Page Meta Font
			$page_meta_typography_label = __( 'Meta Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'page_title_area_meta_typography_group', $page_meta_typography_label, 'responsive_page_title_area_layout', 45, 'page_title_area_meta_typography', true );

			responsive_horizontal_separator_control( $wp_customize, 'page_title_area_meta_typography_group_separator', 1, 'responsive_page_title_area_layout',46, 1 );

			// Padding
			responsive_unit_padding_control( $wp_customize, 'page_title_banner_padding', 'responsive_page_title_area_layout', 50, 30, 30, null, __( 'Padding', 'responsive' ), 'postMessage', 30, 30, 30, 30, 'px' );

			// Margin
			responsive_unit_padding_control( $wp_customize, 'page_title_banner_margin', 'responsive_page_title_area_layout', 55, '', '', null, __( 'Margin', 'responsive' ), 'postMessage', '', '', '', '', 'px', '','','','','','' );


			// Main Content Width.
			$page_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_content_width', $page_content_width_label, 'responsive_page', 10, Responsive\Core\get_responsive_customizer_defaults( 'page_content_width' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'page_content_width_separator', 1, 'responsive_page', 9, 1, );

			/**
			 * Page Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_page_single_elements_positioning',
				array(
					'default'           => array( 'title', 'featured_image' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_page_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Page Elements', 'responsive' ),
						'section'  => 'responsive_page_title_area_layout',
						'settings' => 'responsive_page_single_elements_positioning',
						'priority' => 140,
						'choices'  => responsive_page_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$page_featured_image_label = esc_html__( 'Page Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_featured_image_separator', $page_featured_image_label, 'responsive_page_title_area_layout', 145 );
			
			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Image Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'page_featured_image_alignment', $featured_image_alignment_label, 'responsive_page_title_area_layout', 150, $featured_image_alignment_choices, 'left', null );

			// Image Position.
			$page_featured_image_position_label   = esc_html__( 'Image Position', 'responsive' );
			$page_featured_image_position_choices = array(
				'none'       => esc_html__( 'None', 'responsive' ),
				'outside'      => esc_html__( 'Outside', 'responsive' ),
				'background' => esc_html__( 'Background', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'page_featured_image_position', $page_featured_image_position_label, 'responsive_page_title_area_layout', 152, $page_featured_image_position_choices, 'none', null );

			// Image Ratio.
			$page_featured_image_ratio_label   = esc_html__( 'Image Ratio', 'responsive' );
			$page_featured_image_ratio_choices = array(
				'original'   => esc_html__( 'Original', 'responsive' ),
				'predefined' => esc_html__( 'Predefined', 'responsive' ),
				'custom'     => esc_html__( 'Custom', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'page_featured_image_ratio', $page_featured_image_ratio_label, 'responsive_page_title_area_layout', 153, $page_featured_image_ratio_choices, 'original', null );

			// Predefined Ratio.
			$page_featured_image_predefined_ratio_label   = esc_html__( 'Predefined Ratio', 'responsive' );
			$page_featured_image_predefined_ratio_choices = array(
				'1:1'  => esc_html__( '1:1', 'responsive' ),
				'4:3'  => esc_html__( '4:3', 'responsive' ),
				'16:9' => esc_html__( '16:9', 'responsive' ),
				'2:1'  => esc_html__( '2:1', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'page_featured_image_predefined_ratio', $page_featured_image_predefined_ratio_label, 'responsive_page_title_area_layout', 154, $page_featured_image_predefined_ratio_choices, '1:1', null );

			// Custom Width & Height.
			$page_featured_image_custom_width_label = esc_html__( 'Custom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_featured_image_custom_width', $page_featured_image_custom_width_label, 'responsive_page_title_area_layout', 155, '', null, 4800 );

			$page_featured_image_custom_height_label = esc_html__( 'Custom Height', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_featured_image_custom_height', $page_featured_image_custom_height_label, 'responsive_page_title_area_layout', 156, '', null, 4800 );

			// Image Size Dropdown.
			$page_featured_image_size_label   = esc_html__( 'Image Size', 'responsive' );
			$page_featured_image_size_choices = array(
				'full'                          => esc_html__( 'Full Size', 'responsive' ),
				'thumbnail'                     => esc_html__( 'Thumbnail', 'responsive' ),
				'medium'                        => esc_html__( 'Medium', 'responsive' ),
				'medium_large'                  => esc_html__( 'Medium Large', 'responsive' ),
				'1536x1536'                     => esc_html__( '1536 x 1536', 'responsive' ),
				'2048x2048'                     => esc_html__( '2048x2048', 'responsive' ),
				'woocommerce_thumbnail'         => esc_html__( 'woocommerce_thumbnail', 'responsive' ),
				'woocommerce_single'            => esc_html__( 'woocommerce_single', 'responsive' ),
				'woocommerce_gallery_thumbnail' => esc_html__( 'woocommerce_gallery_thumbnail', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'page_featured_image_size', $page_featured_image_size_label, 'responsive_page_title_area_layout', 157, $page_featured_image_size_choices, 'full', null );

			// Overlay Color.
			$page_featured_image_overlay_color_label = esc_html__( 'Overlay Color', 'responsive' );
			responsive_color_control( $wp_customize, 'page_featured_image_overlay', $page_featured_image_overlay_color_label, 'responsive_page_title_area_layout', 158, Responsive\Core\get_responsive_customizer_defaults( 'responsive_page_featured_image_overlay_color' ) );

			// Content Alignment.
			$page_content_alignment_label   = esc_html__( 'Page Content Alignment', 'responsive' );
			$page_content_alignment_choices = array(
				'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
				'left'    => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center'  => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$page_content_alignment_choices = array(
					'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
					'left'    => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center'  => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'page_content_alignment', $page_content_alignment_label, 'responsive_page', 90, $page_content_alignment_choices, 'left', null );

			responsive_horizontal_separator_control($wp_customize, 'page_content_alignment_separator', 1, 'responsive_page', 91, 1, );

			$container_spacing_label = esc_html__( 'Spacing', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_container_spacing', $container_spacing_label, 'responsive_page', 104 );

			// Border Radius
			$wp_customize->add_setting(
				'blog_border_radius',
				array(
					'default'           => 'default',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$page_border_radius_label = esc_html__( 'Border Radius (px)', 'responsive' );
			responsive_radius_control($wp_customize, 'page_border_radius', 'responsive_page', 94, '', '', null, $page_border_radius_label, 'refresh');

			responsive_unit_padding_control( $wp_customize, 'page_outside_container', 'responsive_page', 105, '', '', null, __( 'Outside Container Padding', 'responsive' ), 'postMessage', '', '', '', '', 'px' );

			responsive_unit_padding_control( $wp_customize, 'page_inside_container', 'responsive_page', 106, '', '', null, __( 'Inside Container Padding', 'responsive' ), 'postMessage', '', '', '', '', 'px' );

			// Show Comments
			$page_show_comments_label = esc_html__( 'Show Comments', 'responsive' );
			responsive_toggle_control( $wp_customize, 'page_show_comments', $page_show_comments_label, 'responsive_page', 100, false, null, 'refresh' );

			// Page Site Background Color.
			$page_site_background_color_label = __( 'Page Background', 'responsive' );
			responsive_color_control( $wp_customize, 'page_site_background', $page_site_background_color_label, 'responsive_page', 102, Responsive\Core\get_responsive_customizer_defaults('responsive_page_site_background_color') );

			// Page Content Background Color.
			$page_content_background_color_label = __( 'Page Content Background', 'responsive' );
			responsive_color_control( $wp_customize, 'page_content_background', $page_content_background_color_label, 'responsive_page', 103, Responsive\Core\get_responsive_customizer_defaults('responsive_page_content_background_color') );

		}

	}

endif;

return new Responsive_Page_Content_Customizer();