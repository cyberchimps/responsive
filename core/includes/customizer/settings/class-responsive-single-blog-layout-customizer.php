<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Single_Blog_Layout_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Single_Blog_Layout_Customizer {

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
			$main_tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$main_design_tab_ids_prefix = 'customize-control-';
			$main_design_tab_ids        = array(
				$main_design_tab_ids_prefix . 'responsive_single_blog_breadcrumb_color',
				$main_design_tab_ids_prefix . 'responsive_single_blog_breadcrumb_color',
				$main_design_tab_ids_prefix . 'responsive_single_blog_breadcrumb_typography_group',
				$main_design_tab_ids_prefix . 'responsive_single_blog_site_background_color',
				$main_design_tab_ids_prefix . 'responsive_single_blog_content_background_color',
				$main_design_tab_ids_prefix . 'responsive_single_blog_category_typography_group',
				$main_design_tab_ids_prefix . 'responsive_single_blog_breadcrumb_typography_group_separator',
				$main_design_tab_ids_prefix . 'responsive_single_post_boxed_separator',
				$main_design_tab_ids_prefix . 'responsive_border_single_post_boxed_radius',
				$main_design_tab_ids_prefix . 'responsive_single_post_boxed_shadow',
				$main_design_tab_ids_prefix . 'responsive_single_post_boxed_shadow_color',
			);

			$main_general_tab_ids_prefix = 'customize-control-responsive_single_blog_';
			$main_general_tab_ids        = array(
				$main_general_tab_ids_prefix . 'post_title',
				$main_general_tab_ids_prefix . 'container_layout_separator',
				$main_general_tab_ids_prefix . 'container_layout',
				$main_general_tab_ids_prefix . 'container_style_separator',
				$main_general_tab_ids_prefix . 'container_style',
				$main_general_tab_ids_prefix . 'content_width',
				$main_general_tab_ids_prefix . 'content_width_separator',
				$main_general_tab_ids_prefix . 'elements_positioning',
				$main_general_tab_ids_prefix . 'sidebar_separator',
				$main_general_tab_ids_prefix . 'sidebar_position',
				$main_general_tab_ids_prefix . 'sidebar_style',
				$main_general_tab_ids_prefix . 'sidebar_width',
				$main_general_tab_ids_prefix . 'sidebar_width_separator',
				$main_general_tab_ids_prefix . 'featured_image_separator',
				$main_general_tab_ids_prefix . 'featured_image_width',
				$main_general_tab_ids_prefix . 'featured_image_width_separator',
				$main_general_tab_ids_prefix . 'featured_image_style',
				$main_general_tab_ids_prefix . 'featured_image_style_separator',
				$main_general_tab_ids_prefix . 'featured_image_alignment',
				$main_general_tab_ids_prefix . 'featured_image_alignment_separator',
				$main_general_tab_ids_prefix . 'title_alignment',
				$main_general_tab_ids_prefix . 'meta_control_separator',
				$main_general_tab_ids_prefix . 'meta_separator_text',
				$main_general_tab_ids_prefix . 'meta_alignment',
				$main_general_tab_ids_prefix . 'meta_alignment_separator',
				$main_general_tab_ids_prefix . 'content_alignment',
				$main_general_tab_ids_prefix . 'related_posts_separator',
				$main_general_tab_ids_prefix . 'enable_related_posts',
				$main_general_tab_ids_prefix . 'comments_separator',
				$main_general_tab_ids_prefix . 'comments',
				$main_general_tab_ids_prefix . 'container_spacing',
				$main_general_tab_ids_prefix . 'outside_container_padding',
				$main_general_tab_ids_prefix . 'inside_container_padding',
				$main_general_tab_ids_prefix . 'navigation',
				$main_general_tab_ids_prefix . 'navigation_before',
				'customize-control-responsive_post_author_box_style',
				'customize-control-responsive_responsive_disable_author_meta_separator',
				'customize-control-responsive_disable_author_meta',
				'customize-control-responsive_disable_author_meta_after_separator',
				'customize-control-responsive_responsive_blog_single_meta_separator',
				'customize-control-responsive_responsive_single_blog_meta_separator_text_separator',
				'customize-control-responsive_blog_single_elements_positioning',
				'customize-control-responsive_blog_single_meta',
			);
			responsive_tabs_button_control( $wp_customize, 'single_blog_tabs', $main_tabs_label, 'responsive_single_blog_layout', 1, '', 'responsive_single_blog_layout_general_tab', 'responsive_single_blog_layout_design_tab', $main_general_tab_ids, $main_design_tab_ids, null );

			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_single_blog_layout',
				array(
					'title'    => esc_html__( 'Single Post', 'responsive' ),
					'description' => '<div class="responsive-section-description"><p><b>' . __( 'Helpful Information', 'responsive' ) . '</b></p><p><a href="https://cyberchimps.com/docs/responsive-theme/responsive-theme-walkthrough/single-post-settings/" target="_blank">' . __( 'Single Post Overview »', 'responsive' ) . '</a></p></div>',
					'panel'    => 'responsive_post_types',
					'priority' => 30,
				)
			);

			$wp_customize->add_section(
				'responsive_rp_layout',
				array(
					'title'    => esc_html__( 'Related Posts', 'responsive' ),
					'panel'    => 'responsive_post_types',
					'priority' => 40,
					
				)
			);

			$wp_customize->add_section(
				'responsive_comments_layout',
				array(
					'title'    => esc_html__( 'Comments', 'responsive' ),
					'panel'    => 'responsive_post_types',
					'priority' => 24,
				)
			);

			$general_tab_ids = [
				'customize-control-rp_show_related',
				'customize-control-responsive_rp_order',
				'customize-control-responsive_rp_excerpt_length',
				'customize-control-responsive_single_blog_related_posts_title',
				'customize-control-responsive_single_blog_related_posts_title_alignment',
				'customize-control-responsive_single_blog_related_posts_count',
				'customize-control-responsive_single_blog_related_posts_per_row',
				'customize-control-responsive_single_blog_related_posts_taxonomy',
				'customize-control-responsive_single_blog_related_post_structure',
				'customize-control-responsive_single_blog_related_post_meta_elements',
				'customize-control-responsive_related_posts_title_separator',
				'customize-control-responsive_related_posts_title_alignment_separator',
				'customize-control-responsive_related_posts_count_separator',
				'customize-control-responsive_related_posts_per_row_separator',
				'customize-control-responsive_related_posts_taxonomy_separator',
				'customize-control-responsive_related_post_structure_separator',
				'customize-control-rp_orderby',
				'customize-control-rp_read_more',
				'customize-control-responsive_rp_read_more',
				'customize-control-responsive_related_post_meta_elements_separator',
				'customize-control-responsive_rp_enable_excerpt',
			];

			$design_tab_ids = [
				'customize-control-responsive_rp_color_separator',
				'customize-control-responsive_rp_section_title_color',
				'customize-control-responsive_rp_font_separator',
				'customize-control-responsive_rp_section_title_typography_group',
				'customize-control-responsive_rp_post_title_typography_group',
				'customize-control-responsive_rp_meta_typography_group',
				'customize-control-responsive_rp_content_typography_group',
				'customize-control-responsive_rp_section_bg_color',
				'customize-control-responsive_rp_text_color',
				'customize-control-responsive_rp_text_hover_color',
				'customize-control-responsive_rp_link_color',
				'customize-control-responsive_rp_link_hover_color',
				'customize-control-responsive_rp_meta_color',
				'customize-control-responsive_rp_meta_hover_color',
				'customize-control-responsive_related_section_title_typography_separator',
				'customize-control-responsive_related_post_title_typography_separator',
				'customize-control-responsive_related_meta_typography_separator',
				'customize-control-rp_section_title_font',
				'customize-control-rp_post_title_font',
				'customize-control-rp_meta_font',
				'customize-control-rp_content_font',
				'customize-control-rp_text_color',
				'customize-control-rp_text_color_hover',
			];

			$tabs_label = esc_html__( 'Tabs', 'responsive' );

			responsive_tabs_button_control(
				$wp_customize,
				'related_posts_tabs',                        // control id
				$tabs_label,
				'responsive_rp_layout',                     // section id
				1,                                          // priority
				'',                                        // description
				'responsive_related_posts_general_tab',    // general tab id
				'responsive_related_posts_design_tab',     // design tab id
				$general_tab_ids,
				$design_tab_ids,
				null
			);

			$wp_customize->add_setting( 'rp_orderby', [
				'default' => 'date',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			$wp_customize->add_control( 'rp_orderby', [
				'label'   => __( 'Order posts by', 'responsive' ),
				'section' => 'responsive_rp_layout',
				'type'    => 'select',
				'priority'=>60,
				'choices' => [
					'date' => __( 'Date', 'responsive' ),
					'author' => __( 'Author', 'responsive' ),
					'title' => __( 'Title', 'responsive' ),
					'comment_count' => __( 'Comment Count', 'responsive' ),
				],
			] );

			

			$rp_order_choices = array(
				'asc' => __( 'Ascending', 'responsive' ),
				'desc' => __( 'Descending', 'responsive' )
			);
			responsive_select_button_control( $wp_customize, 'rp_order', __( 'Order Direction', 'responsive' ), 'responsive_rp_layout', 70, $rp_order_choices, 'desc', null);

			responsive_toggle_control( $wp_customize, 'rp_enable_excerpt', __( 'Enable Post Excerpt', 'responsive' ), 'responsive_rp_layout', 100, 0, null );
			responsive_drag_number_control( $wp_customize, 'rp_excerpt_length', __( 'Excerpt Word Count', 'responsive' ), 'responsive_rp_layout', 110, 25, 'responsive_enable_related_posts_excerpt', 100, 1 );
			
			responsive_toggle_control( $wp_customize, 'rp_read_more', __( 'Show Read More Button', 'responsive' ), 'responsive_rp_layout', 120, 0, 'responsive_enable_related_posts_excerpt' );
		
			responsive_separator_control( $wp_customize, 'rp_color_separator', __( 'Color Controls', 'responsive' ), 'responsive_rp_layout', 8 );
			responsive_color_control( $wp_customize, 'rp_section_title', __( 'Section Title', 'responsive' ), 'responsive_rp_layout', 9, Responsive\Core\get_responsive_customizer_defaults( 'footer_background' ) );
			responsive_color_control( $wp_customize, 'rp_section_bg', __( 'Section Background', 'responsive' ), 'responsive_rp_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'rp_section_bg' ) );
			
			responsive_color_control( $wp_customize, 'rp_text', __( 'Text Color', 'responsive' ), 'responsive_rp_layout', 11, Responsive\Core\get_responsive_customizer_defaults( 'responsive_rp_body_text_color' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_rp_body_text_color' ), 'rp_text_hover' );
			responsive_color_control( $wp_customize, 'rp_link', __( 'Link Color', 'responsive' ), 'responsive_rp_layout', 13, Responsive\Core\get_responsive_customizer_defaults( 'responsive_rp_link_color' ), null, '', true,  Responsive\Core\get_responsive_customizer_defaults( 'responsive_rp_link_hover_color' ), 'rp_link_hover' );
			responsive_color_control( $wp_customize, 'rp_meta', __( 'Meta Color', 'responsive' ), 'responsive_rp_layout', 15, Responsive\Core\get_responsive_customizer_defaults( 'responsive_rp_meta_text' ), null, '', true, Responsive\Core\get_responsive_customizer_defaults( 'responsive_rp_meta_text' ), 'rp_meta_hover' );
			
			responsive_separator_control( $wp_customize, 'rp_font_separator', __( 'Font Controls', 'responsive' ), 'responsive_rp_layout', 17 );
			responsive_typography_group_control( $wp_customize, 'rp_section_title_typography_group', __( 'Section Title Font', 'responsive' ), 'responsive_rp_layout', 18, 'rp_section_title_typography' );
			responsive_horizontal_separator_control( $wp_customize, 'related_section_title_typography_separator', 1, 'responsive_rp_layout',19, 1, null );

			responsive_typography_group_control( $wp_customize, 'rp_post_title_typography_group', __( 'Post Title Font', 'responsive' ), 'responsive_rp_layout', 20, 'rp_post_title_typography' );
			responsive_horizontal_separator_control( $wp_customize, 'related_post_title_typography_separator', 1, 'responsive_rp_layout',21, 1, null );


			responsive_typography_group_control( $wp_customize, 'rp_meta_typography_group', __( 'Meta Font', 'responsive' ), 'responsive_rp_layout', 22, 'rp_meta_typography' );
			responsive_horizontal_separator_control( $wp_customize, 'related_meta_typography_separator', 1, 'responsive_rp_layout',23, 1, null );

			
			responsive_typography_group_control( $wp_customize, 'rp_content_typography_group', __( 'Content Font', 'responsive' ), 'responsive_rp_layout', 24, 'rp_content_typography' );


			// Single Blog Post Title
			responsive_section_toggle_control( $wp_customize, 'single_blog_post_title', __( 'Post Title Area', 'responsive' ), 'responsive_single_blog_layout', 1, 'section', 'responsive_single_blog_post_title_layout', true, null, 'refresh', 'Enable the toggle to customize single blog post title settings.');

			// Single Blog Post Title Tabs
			$single_blog_post_title_general_tab_ids = [
				'customize-control-responsive_single_blog_post_title_layout',
				'customize-control-responsive_single_blog_banner_container_width',
				'customize-control-responsive_single_blog_banner_custom_width',
				'customize-control-responsive_single_blog_post_title_horizontal_alignment',
				'customize-control-responsive_single_blog_title_alignment',
				'customize-control-responsive_blog_single_meta',
				'customize-control-responsive_single_blog_meta_separator_text',
				'customize-control-responsive_responsive_single_blog_meta_separator_text_separator',
				'customize-control-responsive_single_blog_meta_alignment',
				'customize-control-responsive_single_blog_meta_control_separator',
				'customize-control-responsive_single_blog_meta_alignment_separator',
				'customize-control-responsive_blog_single_elements_positioning',
				'customize-control-responsive_single_blog_featured_image_separator',
				'customize-control-responsive_single_blog_featured_image_alignment',
				'customize-control-responsive_single_blog_featured_image_position',
				'customize-control-responsive_single_blog_featured_image_ratio',
				'customize-control-responsive_single_blog_featured_image_predefined_ratio',
				'customize-control-responsive_single_blog_featured_image_custom_width',
				'customize-control-responsive_single_blog_featured_image_custom_height',
				'customize-control-responsive_single_blog_featured_image_size',
			];

			$single_blog_post_title_design_tab_ids = [
				'customize-control-responsive_single_blog_banner_min_height',
				'customize-control-responsive_single_blog_banner_background_color',
				'customize-control-responsive_single_blog_post_title_inner_elements_spacing',
				'customize-control-responsive_single_blog_post_title_inner_elements_spacing_separator',
				'customize-control-responsive_single_blog_post_title_color',
				'customize-control-responsive_single_blog_post_text_color',
				'customize-control-responsive_single_blog_post_link_color',
				'customize-control-responsive_single_blog_post_link_hover_color',
				'customize-control-responsive_single_blog_post_link_hover_separator',
				'customize-control-responsive_single_blog_post_title_typography_group',
				'customize-control-responsive_single_blog_post_text_typography_group',
				'customize-control-responsive_single_blog_post_meta_typography_group',
				'customize-control-responsive_single_blog_banner_padding_padding',
				'customize-control-responsive_single_blog_banner_margin_padding',
				'customize-control-responsive_single_blog_featured_image_overlay_color',
				'customize-control-responsive_single_blog_post_meta_typography_group_separator'
			];

			// Single Blog Post Title Tabs
			$tabs_label = esc_html__( 'Tabs', 'responsive' );

			responsive_tabs_button_control( $wp_customize, 'single_blog_post_title_tabs', $tabs_label, 'responsive_single_blog_post_title_layout', 1, '', 'responsive_single_blog_post_title_general_tab', 'responsive_single_blog_post_title_design_tab', $single_blog_post_title_general_tab_ids, $single_blog_post_title_design_tab_ids, null );

			$single_blog_post_title_layout_choices = array(
				'post_title_layout1'    => esc_html__( 'Layout 1', 'responsive' ),
				'post_title_layout2'     => esc_html__( 'Layout 2', 'responsive' ),
			);
			
			$single_blog_post_title_layout_label   = esc_html__( 'Banner Layout', 'responsive' );

			responsive_imageradio_button_control( $wp_customize, 'single_blog_post_title_layout', $single_blog_post_title_layout_label, 'responsive_single_blog_post_title_layout', 1, $single_blog_post_title_layout_choices, 'post_title_layout1', null, 'svg', 'refresh' );

			// Container Width.
			$single_blog_banner_container_width_label   = esc_html__( 'Container Width', 'responsive' );
			$single_blog_banner_container_width_choices = array(
				'full_width' => esc_html__( 'Full Width', 'responsive' ),
				'custom'     => esc_html__( 'Custom', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_banner_container_width', $single_blog_banner_container_width_label, 'responsive_single_blog_post_title_layout', 2, $single_blog_banner_container_width_choices, 'full_width', null, 'refresh' );

			// Custom Width.
			$single_blog_banner_custom_width_label = esc_html__( 'Custom Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_banner_custom_width', $single_blog_banner_custom_width_label, 'responsive_single_blog_post_title_layout', 3, 1316, null, 1920, 768, 'postMessage' );

			// Vertical Alignment.
			$single_blog_post_title_vertical_alignment_label   = esc_html__( 'Vertical Alignment', 'responsive' );
			$single_blog_post_title_vertical_alignment_choices = array(
				'flex-start'   => esc_html__( 'Top', 'responsive' ),
				'center' => esc_html__( 'Middle', 'responsive' ),
				'flex-end'  => esc_html__( 'Bottom', 'responsive' ),
			);

			// Single Blog Post Title Vertical Alignment
			responsive_select_button_control( $wp_customize, 'single_blog_post_title_vertical_alignment', $single_blog_post_title_vertical_alignment_label, 'responsive_single_blog_post_title_layout', 135, $single_blog_post_title_vertical_alignment_choices, 'flex-start', null );

			// Banner Min Height
			$single_blog_banner_min_height_label = esc_html__( 'Banner Min Height (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'single_blog_banner_min_height', $single_blog_banner_min_height_label, 'responsive_single_blog_post_title_layout', 4, 0, null, 1000, 0, 'postMessage' );

			// Banner Background Color
			$single_blog_banner_background_color_label = __( 'Banner Background Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'single_blog_banner_background', $single_blog_banner_background_color_label, 'responsive_single_blog_post_title_layout', 4, Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_blog_banner_background_color' ) );

			// Inner Elements Spacing
			$single_blog_post_title_inner_elements_spacing_label = esc_html__( 'Inner Elements Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_post_title_inner_elements_spacing', $single_blog_post_title_inner_elements_spacing_label, 'responsive_single_blog_post_title_layout', 5, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_title_inner_elements_spacing' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_post_title_inner_elements_spacing_separator', 1, 'responsive_single_blog_post_title_layout',6, 1 );

			// Padding
			responsive_unit_padding_control( $wp_customize, 'single_blog_banner_padding', 'responsive_single_blog_post_title_layout', 51, 30, 30, null, __( 'Padding', 'responsive' ), 'postMessage', 30, 30, 30, 30, 'px' );

			// Margin
			responsive_unit_padding_control( $wp_customize, 'single_blog_banner_margin', 'responsive_single_blog_post_title_layout', 52, '', '', null, __( 'Margin', 'responsive' ), 'postMessage', '', '', '', '', 'px', '' );

			// Single Blog Post Title Color
			$single_blog_post_title_color_label = __( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_post_title', $single_blog_post_title_color_label, 'responsive_single_blog_post_title_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_title_color' ) );

			// Single Blog Post Text Color
			$single_blog_post_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_post_text', $single_blog_post_text_color_label, 'responsive_single_blog_post_title_layout', 15, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_text_color' ) );

			// Single Blog Post Link Color
			$single_blog_post_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_post_link', $single_blog_post_link_color_label, 'responsive_single_blog_post_title_layout', 20, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_link_color' ) );

			// Single Blog Post Link Hover Color
			$single_blog_post_link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_post_link_hover', $single_blog_post_link_hover_color_label, 'responsive_single_blog_post_title_layout', 25, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_link_hover_color' ) );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_post_link_hover_separator', 1, 'responsive_single_blog_post_title_layout',30, 1 );

			// Single Blog Post Title Font
			$single_blog_post_title_typography_label = __( 'Title Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'single_blog_post_title_typography_group', $single_blog_post_title_typography_label, 'responsive_single_blog_post_title_layout', 35, 'single_blog_post_title_typography', true );

			// Single Blog Post Text Font
			$single_blog_post_text_typography_label = __( 'Text Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'single_blog_post_text_typography_group', $single_blog_post_text_typography_label, 'responsive_single_blog_post_title_layout', 40, 'single_blog_post_text_typography', true );
			
			// Single Blog Post Meta Font
			$single_blog_post_meta_typography_label = __( 'Meta Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'single_blog_post_meta_typography_group', $single_blog_post_meta_typography_label, 'responsive_single_blog_post_title_layout', 45, 'single_blog_post_meta_typography', true );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_post_meta_typography_group_separator', 1, 'responsive_single_blog_post_title_layout',46, 1 );

			// Main Content Width.
			$single_blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_content_width', $single_blog_content_width_label, 'responsive_single_blog_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_content_width' ), null, 100, 1, 'postMessage' );

			/**
			 * Blog Single Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_single_elements_positioning',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'blog_single_elements_positioning' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Post Elements', 'responsive' ),
						'section'  => 'responsive_single_blog_post_title_layout',
						'settings' => 'responsive_blog_single_elements_positioning',
						'priority' => 36,
						'choices'  => responsive_blog_single_elements(),
						'sub_controls' => array(
							'meta' => array(
								'responsive_single_blog_meta_separator_text'
							)
						),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$single_blog_featured_image_label = esc_html__( 'Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_featured_image_separator', $single_blog_featured_image_label, 'responsive_single_blog_post_title_layout', 50 );

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
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_alignment', $featured_image_alignment_label, 'responsive_single_blog_post_title_layout', 70, $featured_image_alignment_choices, 'left', null );

			// Image Position.
			$single_blog_featured_image_position_label   = esc_html__( 'Image Position', 'responsive' );
			$single_blog_featured_image_position_choices = array(
				'none'       => esc_html__( 'None', 'responsive' ),
				'outside'      => esc_html__( 'Outside', 'responsive' ),
				'background' => esc_html__( 'Background', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_position', $single_blog_featured_image_position_label, 'responsive_single_blog_post_title_layout', 71, $single_blog_featured_image_position_choices, 'none', null );

			// Image Ratio.
			$single_blog_featured_image_ratio_label   = esc_html__( 'Image Ratio', 'responsive' );
			$single_blog_featured_image_ratio_choices = array(
				'original'   => esc_html__( 'Original', 'responsive' ),
				'predefined' => esc_html__( 'Predefined', 'responsive' ),
				'custom'     => esc_html__( 'Custom', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_ratio', $single_blog_featured_image_ratio_label, 'responsive_single_blog_post_title_layout', 72, $single_blog_featured_image_ratio_choices, 'original', null );

			// Predefined Ratio.
			$single_blog_featured_image_predefined_ratio_label   = esc_html__( 'Predefined Ratio', 'responsive' );
			$single_blog_featured_image_predefined_ratio_choices = array(
				'1:1'  => esc_html__( '1:1', 'responsive' ),
				'4:3'  => esc_html__( '4:3', 'responsive' ),
				'16:9' => esc_html__( '16:9', 'responsive' ),
				'2:1'  => esc_html__( '2:1', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_predefined_ratio', $single_blog_featured_image_predefined_ratio_label, 'responsive_single_blog_post_title_layout', 73, $single_blog_featured_image_predefined_ratio_choices, '1:1', null );

			// Custom Width & Height.
			$single_blog_featured_image_custom_width_label = esc_html__( 'Custom Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_featured_image_custom_width', $single_blog_featured_image_custom_width_label, 'responsive_single_blog_post_title_layout', 74, '', null, 4800 );

			$single_blog_featured_image_custom_height_label = esc_html__( 'Custom Height', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_featured_image_custom_height', $single_blog_featured_image_custom_height_label, 'responsive_single_blog_post_title_layout', 75, '', null, 4800 );

			// Image Size Dropdown.
			$single_blog_featured_image_size_label   = esc_html__( 'Image Size', 'responsive' );
			$single_blog_featured_image_size_choices = array(
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
			responsive_select_control( $wp_customize, 'single_blog_featured_image_size', $single_blog_featured_image_size_label, 'responsive_single_blog_post_title_layout', 76, $single_blog_featured_image_size_choices, 'full', null );

			// Overlay Color.
			$single_blog_featured_image_overlay_color_label = esc_html__( 'Overlay Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_featured_image_overlay', $single_blog_featured_image_overlay_color_label, 'responsive_single_blog_post_title_layout', 77, Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_blog_featured_image_overlay_color' ) );

			// Alignment.
			$single_blog_title_alignment_label   = esc_html__( 'Title Alignment', 'responsive' );
			$single_blog_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_title_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_with_switchers_control( $wp_customize, 'single_blog_title_alignment', $single_blog_title_alignment_label, 'responsive_single_blog_post_title_layout', 90, $single_blog_title_alignment_choices, 'left', null );

			/**
			* Entry meta.
			*/
			$single_blog_meta_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_meta_control_separator', $single_blog_meta_label, 'responsive_single_blog_post_title_layout', 100 );

			responsive_horizontal_separator_control( $wp_customize, 'responsive_disable_author_meta_separator', 1, 'responsive_single_blog_layout', 107, 1, 'responsive_show_post_author_box' );
			responsive_horizontal_separator_control( $wp_customize, 'disable_author_meta_after_separator', 1, 'responsive_single_blog_layout', 109, 1 );

			/**
			 * Blog Single Meta
			 */
			$wp_customize->add_setting(
				'responsive_blog_single_meta',
				array(
					'default'           => array( 'author', 'date', 'categories', 'comments', 'tag' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_single_meta',
					array(
						'label'    => esc_html__( 'Meta Elements', 'responsive' ),
						'section'  => 'responsive_single_blog_post_title_layout',
						'settings' => 'responsive_blog_single_meta',
						'priority' => 110,
						'choices'  => apply_filters(
							'responsive_blog_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date Published', 'responsive' ),
								'updated'       => esc_html__( 'Last Updated', 'responsive' ),
								'categories' => esc_html__( 'Categories', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
								'tag'        => esc_html__( 'Tag', 'responsive' ),
							)
						),
					)
				)
			);

			// Meta Separator Text.
			$wp_customize->add_setting(
				'responsive_single_blog_meta_separator_text',
				array(
					'default'           => '•',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				'responsive_single_blog_meta_separator_text',
				array(
					'section'  => 'responsive_single_blog_post_title_layout',
					'settings' => 'responsive_single_blog_meta_separator_text',
					'type'     => 'hidden',
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'responsive_single_blog_meta_separator_text_separator', 1, 'responsive_single_blog_post_title_layout',121, 1 );

			// Meta Alignment.
			$single_blog_meta_alignment_label   = esc_html__( 'Meta Alignment', 'responsive' );
			$single_blog_meta_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_meta_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_with_switchers_control( $wp_customize, 'single_blog_meta_alignment', $single_blog_meta_alignment_label, 'responsive_single_blog_post_title_layout', 130, $single_blog_meta_alignment_choices, 'left', null );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_meta_alignment_separator', 1, 'responsive_single_blog_post_title_layout',131, 1 );

			// Content Alignment.
			$single_blog_content_alignment_label   = esc_html__( 'Post Content Alignment', 'responsive' );
			$single_blog_content_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_content_alignment_choices = array(
					'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
					'left'    => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center'  => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'single_blog_content_alignment', $single_blog_content_alignment_label, 'responsive_single_blog_layout', 150, $single_blog_content_alignment_choices, 'left', null );


			/**
			* Related Posts Section.
			*/
			$single_blog_related_posts_label = esc_html__( 'Related Posts', 'responsive' );
			
			responsive_separator_control( $wp_customize, 'single_blog_related_posts_separator', $single_blog_related_posts_label, 'responsive_single_blog_layout', 155 );
			responsive_section_toggle_control( $wp_customize, 'single_blog_enable_related_posts', __( 'Enable Related Posts', 'responsive' ), 'responsive_single_blog_layout', 160, 'section', 'responsive_rp_layout', false, null, 'refresh', 'Enable the toggle to customize Related Posts settings.');

			// Related Posts Section Title.
			$wp_customize->add_setting(
				'responsive_single_blog_related_posts_title',
				array(
					'default'           => 'Related Posts',
					'sanitize_callback' => 'sanitize_text_field',
					'type'              => 'theme_mod',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_single_blog_related_posts_title',
				array(
					'label'    => __( 'Title', 'responsive' ),
					'section'  => 'responsive_rp_layout',
					'settings' => 'responsive_single_blog_related_posts_title',
					'type'     => 'text',
					'priority' => 10,
					'active_callback' => null,
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'related_posts_title_separator', 1, 'responsive_rp_layout',15, 1, null );

			// Title Alignment.
			$single_blog_related_posts_title_alignment_label   = esc_html__( 'Title Alignment', 'responsive' );
			$single_blog_related_posts_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_related_posts_title_alignment', $single_blog_related_posts_title_alignment_label, 'responsive_rp_layout', 20, $single_blog_related_posts_title_alignment_choices, 'left', null );

			responsive_horizontal_separator_control( $wp_customize, 'related_posts_title_alignment_separator', 1, 'responsive_rp_layout',25, 1, null );

			// Related Posts Count.
			$single_blog_related_posts_count = esc_html__( 'Related Posts Count', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_related_posts_count', $single_blog_related_posts_count, 'responsive_rp_layout', 30, 2, null, 12, 1 );

			responsive_horizontal_separator_control( $wp_customize, 'related_posts_count_separator', 1, 'responsive_rp_layout',35, 1, null );

			// No.of Posts Per Row.
			$single_blog_related_posts_per_row = esc_html__( 'No.of Posts Per Row', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_related_posts_per_row', $single_blog_related_posts_per_row, 'responsive_rp_layout', 40, 2, null, 4, 1 );

			responsive_horizontal_separator_control( $wp_customize, 'related_posts_per_row_separator', 1, 'responsive_rp_layout',45, 1, null );

			// Related Posts Taxonomy Query.
			$single_blog_related_posts_taxonomy_query_label   = esc_html__( 'Related Posts Taxonomy', 'responsive' );
			$single_blog_related_posts_taxonomy_choices = array(
				'category'    => esc_html__( 'Category', 'responsive' ),
				'tag'        => esc_html__( 'Tag', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_related_posts_taxonomy', $single_blog_related_posts_taxonomy_query_label, 'responsive_rp_layout', 50, $single_blog_related_posts_taxonomy_choices, 'category', null );

			responsive_horizontal_separator_control( $wp_customize, 'related_posts_taxonomy_separator', 1, 'responsive_rp_layout',75, 1, null );

			/**
			 * Related Single Posts Structure
			 */
			$wp_customize->add_setting(
				'responsive_single_blog_related_post_structure',
				array(
					'default'           => array( 'title', 'featured-image', 'meta' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_single_blog_related_post_structure',
					array(
						'label'    => esc_html__( 'Related Post Elements', 'responsive' ),
						'section'  => 'responsive_rp_layout',
						'settings' => 'responsive_single_blog_related_post_structure',
						'priority' => 80,
						'choices'  => apply_filters(
							'responsive_single_blog_related_post_structure_choices',
							array(
								'title'          => esc_html__( 'Title', 'responsive' ),
								'featured-image' => esc_html__( 'Featured Image', 'responsive' ),
								'meta'           => esc_html__( 'Meta', 'responsive' ),
							)
						),
						'active_callback' => null,
					)
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'related_post_structure_separator', 1, 'responsive_rp_layout',85, 1, null );

			/**
			 * Related Single Posts Meta Elements
			 */
			$wp_customize->add_setting(
				'responsive_single_blog_related_post_meta_elements',
				array(
					'default'           => array( 'author', 'date', 'categories', 'comments', 'tag' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_single_blog_related_post_meta_elements',
					array(
						'label'    => esc_html__( 'Related Post Meta Elements', 'responsive' ),
						'section'  => 'responsive_rp_layout',
						'settings' => 'responsive_single_blog_related_post_meta_elements',
						'priority' => 90,
						'choices'  => apply_filters(
							'responsive_single_blog_related_post_meta_elements_choices',
							array(
								'author'         => esc_html__( 'Author', 'responsive' ),
								'date'           => esc_html__( 'Date', 'responsive' ),
								'categories'     => esc_html__( 'Categories', 'responsive' ),
								'comments'       => esc_html__( 'Comments', 'responsive' ),
								'tag'            => esc_html__( 'Tag', 'responsive' ),
							)
						),
						'active_callback' => null,
					)
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'related_post_meta_elements_separator', 1, 'responsive_rp_layout',95, 1, null );
			
			// Comments.
			$single_blog_comments_label = esc_html__( 'Comments', 'responsive' );
			
			responsive_separator_control( $wp_customize, 'single_blog_comments_separator', $single_blog_comments_label, 'responsive_single_blog_layout', 165 );

			responsive_section_toggle_control( $wp_customize, 'single_blog_comments', __( 'Enable Comments', 'responsive' ), 'responsive_single_blog_layout', 170, 'section', 'responsive_comments_layout', true, null, 'refresh', 'Enable the toggle to customize comments settings.');

			$comments_general_tab_ids = [
				'customize-control-responsive_comments_form_position',
			];

			$comments_design_tab_ids = [
				'customize-control-responsive_comments_border_width_border',
				'customize-control-responsive_comments_border_color_color',
				'customize-control-responsive_border_comments_border_radius',
				'customize-control-responsive_comments_padding_padding',
				'customize-control-responsive_comments_margin_padding',
			];

			responsive_tabs_button_control( $wp_customize, 'comments_tabs', $tabs_label, 'responsive_comments_layout', 1, '', 'responsive_comments_general_tab', 'responsive_comments_design_tab', $comments_general_tab_ids, $comments_design_tab_ids, null );

			$comments_form_position_choices = array(
				'below' => esc_html__( 'Below', 'responsive' ),
				'above' => esc_html__( 'Above', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'comments_form_position', 'Form Position', 'responsive_comments_layout', 4, $comments_form_position_choices, Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_position' ), null );

			if ( $wp_customize->get_control( 'responsive_comments_form_position' ) ) {
				$wp_customize->get_control( 'responsive_comments_form_position' )->note = __( 'You need at least one published comment on a post to see the effect in the live preview.', 'responsive' );
			}

			$default_comments_border_width = Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_border_width' );

			responsive_borderwidth_control( $wp_customize, 'comments_border_width', 'responsive_comments_layout', 5, $default_comments_border_width, $default_comments_border_width, null, __( 'Border Width (px)', 'responsive' ) );

			$default_comments_border_color = Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_border_color' );

			responsive_color_control( $wp_customize, 'comments_border_color', __( 'Border Color', 'responsive' ), 'responsive_comments_layout', 6, $default_comments_border_color, null );

			$default_comments_border_radius = Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_border_radius' );

			responsive_radius_control( $wp_customize, 'comments_border_radius', 'responsive_comments_layout', 7, $default_comments_border_radius, $default_comments_border_radius, null, __( 'Border Radius (px)', 'responsive' ) );

			$default_comments_padding = Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_padding' );

			responsive_padding_control( $wp_customize, 'comments_padding', 'responsive_comments_layout', 8, $default_comments_padding, $default_comments_padding, null, __( 'Padding (px)', 'responsive' ) );

			responsive_padding_control( $wp_customize, 'comments_margin', 'responsive_comments_layout', 9, Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_margin_y' ), Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_margin_x' ), null, __( 'Margin (px)', 'responsive' ), 'postMessage', null, null, null, null, 0 );
		
			// Author Box Style — only visible when author box is NOT disabled.
			$author_box_style_label   = esc_html__( 'Author Box Style', 'responsive' );
			$author_box_style_choices = array(
				'normal' => esc_html__( 'Normal', 'responsive' ),
				'center' => esc_html__( 'Center', 'responsive' ),
			);
			responsive_select_button_control(
				$wp_customize,
				'post_author_box_style',
				$author_box_style_label,
				'responsive_single_blog_layout',
				106, 
				$author_box_style_choices,
				'normal',
				'responsive_show_post_author_box',
			);
			

			// Breadcrumb Color
			$blog_breadcrumb_color_label = __( 'Breadcrumb Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_breadcrumb', $blog_breadcrumb_color_label, 'responsive_single_blog_layout', 113, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb' ), null, '', false, null, null, false, null, null, 'color', 'refresh' );

			// Breadcrumb Font
			$blog_breadcrumb_typography_label = esc_html__( 'Breadcrumb Font', 'responsive' );
			responsive_typography_group_control(
				$wp_customize,
				'single_blog_breadcrumb_typography_group',
				$blog_breadcrumb_typography_label,
				'responsive_single_blog_layout',
				114,
				'single_blog_breadcrumb_typography'
			);
			responsive_horizontal_separator_control( $wp_customize, 'single_blog_breadcrumb_typography_group_separator', 1, 'responsive_single_blog_layout',115, 1, null );

			// Site Background Color.
			$blog_site_background_color_label = __( 'Single Post Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'single_blog_site_background', $blog_site_background_color_label, 'responsive_single_blog_layout', 119, Responsive\Core\get_responsive_customizer_defaults( 'responsive_page_site_background_color' ), null, '', false, null, null, false, null, null, 'color', 'postMessage' );

			// Content Background Color.
			$blog_content_background_color_label = __( 'Single Post Content Background Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'single_blog_content_background',
				$blog_content_background_color_label,
				'responsive_single_blog_layout',
				120,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_page_content_background_color' ),
				'responsive_show_single_blog_content_background',
			);
		

			responsive_horizontal_separator_control( $wp_customize, 'single_post_boxed_separator', 1, 'responsive_single_blog_layout', 121, 1, null );

			$default_single_post_boxed_radius = Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_radius' );

			responsive_radius_control(
				$wp_customize,
				'single_post_boxed_radius',
				'responsive_single_blog_layout',
				122,
				$default_single_post_boxed_radius,
				$default_single_post_boxed_radius,
				null,
				__( 'Border Radius (px)', 'responsive' ),
				'refresh'
			);

			responsive_shadow_control(
				$wp_customize,
				'single_post_boxed_shadow',
				__( 'Box Shadow', 'responsive' ),
				'responsive_single_blog_layout',
				123,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_shadow_x' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_shadow_y' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_shadow_blur' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_shadow_spread' ),
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_shadow_inset' ),
				null
			);

			responsive_color_control(
				$wp_customize,
				'single_post_boxed_shadow',
				__( 'Box Shadow Color', 'responsive' ),
				'responsive_single_blog_layout',
				124,
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_post_boxed_shadow_color' ),
				null,
				'',
				false,
				null,
				null,
				false,
				null,
				null,
				'color',
				'refresh'
			);

			// Show Post navigation
			responsive_horizontal_separator_control( $wp_customize, 'single_blog_navigation_before', 1, 'responsive_single_blog_layout',271, 1 );
			responsive_toggle_control( $wp_customize, 'single_blog_navigation', __( 'Show Post Navigation', 'responsive' ), 'responsive_single_blog_layout', 272, 0, null );

		}

	}

endif;

return new Responsive_Single_Blog_Layout_Customizer();
