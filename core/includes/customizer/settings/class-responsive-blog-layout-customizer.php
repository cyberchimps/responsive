<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Blog_Layout_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Blog_Layout_Customizer {

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
			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_blog_layout',
				array(
					'title'    => esc_html__( 'Blog / Archive', 'responsive' ),
					'description' => '<div class="responsive-section-description">
										<p><b>' . __( 'Helpful Information', 'responsive' ) . '</b></p>

										<p>
											<a href="https://cyberchimps.com/docs/responsive-theme/responsive-theme-walkthrough/show-last-updated-dates-on-your-blog-posts/" target="_blank">
												' . __( 'Show Last Updated Dates on Your Blog Posts »', 'responsive' ) . '
											</a>
										</p>

										<p>
											<a href="https://cyberchimps.com/docs/responsive-theme/responsive-theme-walkthrough/blog-archive-settings/" target="_blank">
												' . __( 'Blog Archive Settings »', 'responsive' ) . '
											</a>
										</p>
									</div>',
					'panel'    => 'responsive_post_types',
					'priority' => 20,
				)
			);

			// Adding General and Design tabs
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_border_blog_border_radius',
				$design_tab_ids_prefix . 'responsive_date_box_toggle',
				$design_tab_ids_prefix . 'responsive_date_box_toggle_separator',
				$design_tab_ids_prefix . 'responsive_date_box_style',
				$design_tab_ids_prefix . 'responsive_blog_post_title_size',
				$design_tab_ids_prefix . 'responsive_blog_border_radius_separator',
				$design_tab_ids_prefix . 'responsive_blog_meta_font_size',
				$design_tab_ids_prefix . 'responsive_blog_taxonomy_font_size',
				$design_tab_ids_prefix . 'responsive_blog_taxonomy_font_separator',
				$design_tab_ids_prefix . 'responsive_blog_category_color',
				$design_tab_ids_prefix . 'responsive_item_category_typography_group',
				$design_tab_ids_prefix . 'responsive_item_meta_typography_group',
				$design_tab_ids_prefix . 'responsive_blog_item_meta_color',
				$design_tab_ids_prefix . 'responsive_blog_site_background_color',
				$design_tab_ids_prefix . 'responsive_blog_content_background_color',
				$design_tab_ids_prefix . 'responsive_archive_grid_boxed_shadow_separator',
				$design_tab_ids_prefix . 'responsive_archive_grid_boxed_shadow',
				$design_tab_ids_prefix . 'responsive_archive_grid_boxed_shadow_color',
				$design_tab_ids_prefix . 'responsive_blog_border_radius_separator'
			);

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_blog_title_area',
				$general_tab_ids_prefix . 'responsive_blog_post_title_toggle',
				$general_tab_ids_prefix . 'res_blog_post_title_text',
				$general_tab_ids_prefix . 'responsive_blog_sidebar_separator',
				$general_tab_ids_prefix . 'responsive_blog_sidebar_position',
				$general_tab_ids_prefix . 'responsive_blog_sidebar_style',
				$general_tab_ids_prefix . 'responsive_blog_sidebar_width',
				$general_tab_ids_prefix . 'responsive_blog_layout_separator',
				$general_tab_ids_prefix . 'responsive_blog_layout',
				$general_tab_ids_prefix . 'responsive_blog_image_positions_layout_separator',
				$general_tab_ids_prefix . 'responsive_blog_layout_options',
				$general_tab_ids_prefix . 'responsive_blog_layout_options_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_columns',
				$general_tab_ids_prefix . 'responsive_blog_content_width_separator',
				$general_tab_ids_prefix . 'responsive_blog_content_width',
				$general_tab_ids_prefix . 'responsive_blog_entry_display_masonry',
				$general_tab_ids_prefix . 'responsive_blog_entry_display_masonry_separator',
				$general_tab_ids_prefix . 'responsive_blog_post_elements_head',
				$general_tab_ids_prefix . 'responsive_blog_entry_elements_positioning',
				$general_tab_ids_prefix . 'responsive_blog_entry_meta_control_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_meta',
				$general_tab_ids_prefix . 'responsive_blog_entry_meta_separator_text_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_meta_separator_text',
				$general_tab_ids_prefix . 'responsive_blog_entry_meta_alignment_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_meta_alignment',
				$general_tab_ids_prefix . 'responsive_blog_entry_featured_image_separator',
				$general_tab_ids_prefix . 'responsive_blog_featured_image_width',
				$general_tab_ids_prefix . 'responsive_blog_featured_image_width_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_featured_image_style',
				$general_tab_ids_prefix . 'responsive_blog_entry_featured_image_style_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_featured_image_alignment',
				$general_tab_ids_prefix . 'responsive_blog_entry_title_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_title_alignment',
				$general_tab_ids_prefix . 'responsive_blog_entry_content_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_content_type',
				$general_tab_ids_prefix . 'responsive_blog_entry_content_type_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_content_alignment',
				$general_tab_ids_prefix . 'responsive_blog_entry_content_alignment_separator',
				$general_tab_ids_prefix . 'responsive_excerpt_length',
				$general_tab_ids_prefix . 'responsive_excerpt_length_separator',
				$general_tab_ids_prefix . 'responsive_blog_read_more_text',
				$general_tab_ids_prefix . 'responsive_blog_read_more_text_separator',
				$general_tab_ids_prefix . 'responsive_blog_entry_read_more_type',
				$general_tab_ids_prefix . 'responsive_blog_exclude_post_cat_separator',
				$general_tab_ids_prefix . 'exclude_post_cat',
				$general_tab_ids_prefix . 'responsive_blog_pagination_separator',
				$general_tab_ids_prefix . 'blog_pagination',
				$general_tab_ids_prefix . 'responsive_blog_container_spacing',
				$general_tab_ids_prefix . 'responsive_blog_outside_container_padding',
				$general_tab_ids_prefix . 'responsive_blog_outside_container_separator',
				$general_tab_ids_prefix . 'responsive_blog_inside_container_padding',
				$general_tab_ids_prefix . 'responsive_blog_container_layout',
                $general_tab_ids_prefix . 'responsive_blog_container_style',
				$general_tab_ids_prefix . 'responsive_blog_container_style_separator',
				$general_tab_ids_prefix . 'responsive_blog_container_layout_separator',
				$general_tab_ids_prefix . 'responsive_blog_post_per_page',
			);

			responsive_tabs_button_control( $wp_customize, 'blog_archive_tabs', $tabs_label, 'responsive_blog_layout', 1, '', 'responsive_blog_layout_general_tab', 'responsive_blog_layout_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Blog Title Tabs
			$blog_title_area_general_tab_ids = [
				'customize-control-responsive_blog_title_layout',
				'customize-control-responsive_blog_title_elements_positioning',
				'customize-control-responsive_blog_title_description',
				'customize-control-responsive_blog_post_title_toggle',
				'customize-control-res_blog_post_title_text',
				'customize-control-responsive_blog_post_title_horizontal_alignment',
				'customize-control-responsive_blog_single_meta',
				'customize-control-responsive_responsive_blog_single_meta_separator',
				'customize-control-responsive_blog_single_elements_positioning',
				'customize-control-responsive_blog_post_title_vertical_alignment'

			];

			$blog_title_area_design_tab_ids = [
				'customize-control-responsive_blog_banner_min_height',
				'customize-control-responsive_blog_banner_background_color',
				'customize-control-responsive_blog_post_title_inner_elements_spacing',
				'customize-control-responsive_blog_post_title_inner_elements_spacing_separator',
				'customize-control-responsive_blog_banner_padding_padding',
				'customize-control-responsive_blog_banner_margin_padding',
				'customize-control-responsive_blog_post_title_color',
				'customize-control-responsive_blog_post_text_color',
				'customize-control-responsive_blog_post_link_color',
				'customize-control-responsive_blog_post_link_hover_color',
				'customize-control-responsive_blog_post_link_hover_separator',
				'customize-control-responsive_blog_post_title_typography_group',
				'customize-control-responsive_blog_post_text_typography_group',
				'customize-control-responsive_blog_post_text_typography_group_separator'
			];
			
			// Blog Title Area Toggle
			responsive_section_toggle_control( $wp_customize, 'blog_title_area', __( 'Blog Title Area', 'responsive' ), 'responsive_blog_layout', 5, 'section', 'responsive_blog_title_layout', true, null, 'refresh', 'Enable the toggle to customize blog title area settings.');

			// Blog Title Area Tabs
			$tabs_label = esc_html__( 'Tabs', 'responsive' );

			responsive_tabs_button_control( $wp_customize, 'blog_title_area_tabs', $tabs_label, 'responsive_blog_title_layout', 1, '', 'responsive_blog_title_general_tab', 'responsive_blog_title_design_tab', $blog_title_area_general_tab_ids, $blog_title_area_design_tab_ids, null );

			$blog_title_layout_choices = array(
				'post_title_layout1'    => esc_html__( 'Layout 1', 'responsive' ),
				'post_title_layout2'     => esc_html__( 'Layout 2', 'responsive' ),
			);
			
			$blog_title_layout_label   = esc_html__( 'Banner Layout', 'responsive' );

			responsive_imageradio_button_control( $wp_customize, 'blog_title_layout', $blog_title_layout_label, 'responsive_blog_title_layout', 1, $blog_title_layout_choices, 'post_title_layout1', null, 'svg', 'refresh' );
			
			// Container Width.
			$blog_banner_container_width_label   = esc_html__( 'Container Width', 'responsive' );
			$blog_banner_container_width_choices = array(
				'full_width' => esc_html__( 'Full Width', 'responsive' ),
				'custom'     => esc_html__( 'Custom', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_banner_container_width', $blog_banner_container_width_label, 'responsive_blog_title_layout', 2, $blog_banner_container_width_choices, 'full_width', null, 'refresh' );

			// Custom Width.
			$blog_banner_custom_width_label = esc_html__( 'Custom Width (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_banner_custom_width', $blog_banner_custom_width_label, 'responsive_blog_title_layout', 3, 1316, null, 1920, 768, 'postMessage' );

			$wp_customize->add_setting(
				'responsive_blog_title_elements_positioning',
				array(
					'default'           => array( 'title', 'description', 'breadcrumb' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_title_elements_positioning',
					array(
						'label'       => esc_html__( 'Blog Title Elements', 'responsive' ),
						'description' => esc_html__( 'Note: Title and description only appear when Layout 2 is selected.', 'responsive' ),
						'section'     => 'responsive_blog_title_layout',
						'settings'    => 'responsive_blog_title_elements_positioning',
						'priority'    => 5,
						'choices'     => array(
							'title'       => esc_html__( 'Title', 'responsive' ),
							'description' => esc_html__( 'Description', 'responsive' ),
							'breadcrumb'  => esc_html__( 'Breadcrumb', 'responsive' ),
						),
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_blog_title_description',
				array(
					'default'           => '',
					'sanitize_callback' => 'wp_kses_post',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'responsive_blog_title_description',
				array(
					'label'       => esc_html__( 'Blog Description', 'responsive' ),
					'description' => esc_html__( 'Note: Title and description only appear when Layout 2 is selected.', 'responsive' ),
					'section'     => 'responsive_blog_title_layout',
					'settings'    => 'responsive_blog_title_description',
					'type'        => 'textarea',
					'priority'    => 8,
				)
			);
			
			$wp_customize->add_setting(
				'responsive_blog_post_title_toggle',
				array(
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'type'              => 'theme_mod',
					'default'           => 0,
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'responsive_blog_post_title_toggle',
					array(
						'label'    => __( 'Enable on Blog / Posts Page?', 'responsive' ),
						'section'  => 'responsive_blog_title_layout',
						'settings' => 'responsive_blog_post_title_toggle',
						'priority' => 6,
					)
				)
			);

			// Vertical Alignment.
			$blog_post_title_vertical_alignment_label   = esc_html__( 'Vertical Alignment', 'responsive' );
			$blog_post_title_vertical_alignment_choices = array(
				'flex-start'   => esc_html__( 'Top', 'responsive' ),
				'center' => esc_html__( 'Middle', 'responsive' ),
				'flex-end'  => esc_html__( 'Bottom', 'responsive' ),
			);

			// Blog Post Title Vertical Alignment
			responsive_select_button_control( $wp_customize, 'blog_post_title_vertical_alignment', $blog_post_title_vertical_alignment_label, 'responsive_blog_title_layout', 8, $blog_post_title_vertical_alignment_choices, 'flex-start', null );

			// Horizontal Alignment.
			$blog_post_title_horizontal_alignment_label   = esc_html__( 'Horizontal Alignment', 'responsive' );
			$blog_post_title_horizontal_alignment_choices = array(
				'flex-start' => esc_html__( 'Left', 'responsive' ),
				'center'     => esc_html__( 'Center', 'responsive' ),
				'flex-end'   => esc_html__( 'Right', 'responsive' ),
			);

			// Blog Post Title Horizontal Alignment
			responsive_select_button_with_switchers_control( $wp_customize, 'blog_post_title_horizontal_alignment', $blog_post_title_horizontal_alignment_label, 'responsive_blog_title_layout', 9, $blog_post_title_horizontal_alignment_choices, 'center', null, 'refresh', '', 'center', 'center' );


			// Banner Min Height
			$blog_banner_min_height_label = esc_html__( 'Banner Min Height (px)', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'blog_banner_min_height', $blog_banner_min_height_label, 'responsive_blog_title_layout', 21, 0, null, 1000, 0, 'postMessage' );

			// Banner Background Color
			$blog_banner_background_color_label = __( 'Banner Background Color', 'responsive' );
			responsive_color_control_with_device_switchers( $wp_customize, 'blog_banner_background', $blog_banner_background_color_label, 'responsive_blog_title_layout', 22, Responsive\Core\get_responsive_customizer_defaults( 'responsive_blog_banner_background_color' ) );

			// Inner Elements Spacing
			$blog_post_title_inner_elements_spacing_label = esc_html__( 'Inner Elements Spacing (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_post_title_inner_elements_spacing', $blog_post_title_inner_elements_spacing_label, 'responsive_blog_title_layout', 23, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_title_inner_elements_spacing' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'blog_post_title_inner_elements_spacing_separator', 1, 'responsive_blog_title_layout',24, 1 );

			// Padding
			responsive_unit_padding_control( $wp_customize, 'blog_banner_padding', 'responsive_blog_title_layout', 51, 30, 30, null, __( 'Padding', 'responsive' ), 'postMessage', 30, 30, 30, 30, 'px' );

			// Margin
			responsive_unit_padding_control( $wp_customize, 'blog_banner_margin', 'responsive_blog_title_layout', 56, '', '', null, __( 'Margin', 'responsive' ), 'postMessage', '', '', '', '', 'px', 24, null, 24, null, 24, null );
			
			// Blog Post Title Color
			$blog_post_title_color_label = __( 'Title Color', 'responsive' );
			responsive_color_control( $wp_customize, 'blog_post_title', $blog_post_title_color_label, 'responsive_blog_title_layout', 27, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_title_color' ) );

			// Blog Post Text Color
			$blog_post_text_color_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'blog_post_text', $blog_post_text_color_label, 'responsive_blog_title_layout', 28, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_text_color' ) );

			// Blog Post Link Color
			$blog_post_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'blog_post_link', $blog_post_link_color_label, 'responsive_blog_title_layout', 29, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_link_color' ) );

			// Blog Post Link Hover Color
			$blog_post_link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'blog_post_link_hover', $blog_post_link_hover_color_label, 'responsive_blog_title_layout', 30, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_post_link_hover_color' ) );

			responsive_horizontal_separator_control( $wp_customize, 'blog_post_link_hover_separator', 1, 'responsive_blog_title_layout',30, 1 );

			// Blog Post Title Font
			$blog_post_title_typography_label = __( 'Title Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'blog_post_title_typography_group', $blog_post_title_typography_label, 'responsive_blog_title_layout', 35, 'blog_post_title_typography', true );

			// Blog Post Text Font
			$blog_post_text_typography_label = __( 'Text Font', 'responsive' );
			responsive_typography_group_control( $wp_customize, 'blog_post_text_typography_group', $blog_post_text_typography_label, 'responsive_blog_title_layout', 40, 'blog_post_text_typography', true );

			responsive_horizontal_separator_control( $wp_customize, 'blog_post_text_typography_group_separator', 1, 'responsive_blog_title_layout',41, 1 );

			$wp_customize->add_setting(
				'responsive_theme_options[blog_post_title_text]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'type'              => 'option',
					'default'           => 'Blog Page',
				)
			);
			$wp_customize->add_control(
				'res_blog_post_title_text',
				array(
					'label'    => __( 'Blog Page Title', 'responsive' ),
					'section'  => 'responsive_blog_title_layout',
					'settings' => 'responsive_theme_options[blog_post_title_text]',
					'type'     => 'text',
					'priority' => 7,
					'active_callback' => 'responsive_blog_post_title_toggle_callback',
				)
			);

			$blog_layout_heading_label = esc_html__( 'Blog Layout', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_layout_separator', $blog_layout_heading_label, 'responsive_blog_layout', 40 );

			// Blog Layout.
            $layout_label   = esc_html__('Layout', 'responsive');
            $layout_choices = array(
                'grid' => esc_html__('Grid', 'responsive'),
                'list' => esc_html__('List', 'responsive'),
				'cover' => esc_html__('Cover', 'responsive'),
            );
            if (is_rtl()) {
                $layout_choices = array(
					'list' => esc_html__('List', 'responsive'),
					'grid' => esc_html__('Grid', 'responsive'),
					'cover' => esc_html__('Cover', 'responsive'),
                );
            }
            responsive_imageradio_button_control($wp_customize, 'blog_layout', $layout_label, 'responsive_blog_layout', 45, $layout_choices, 'grid', null, 'svg');

			responsive_horizontal_separator_control($wp_customize, 'blog_layout_options_separator', 1, 'responsive_blog_layout', 53, 1, 'responsive_active_blog_layout_grid' );
			
			$entry_columns_label = esc_html__( 'Blog Archive Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_entry_columns', $entry_columns_label, 'responsive_blog_layout', 55, Responsive\Core\get_responsive_customizer_defaults( 'entry_columns' ), 'responsive_active_blog_layout_grid', 4, 2 );

			responsive_horizontal_separator_control($wp_customize, 'blog_content_width_separator', 1, 'responsive_blog_layout', 57, 1, 'responsive_active_blog_entry_columns_multi_column' );

			// Display Masonry.
			$display_masonry_label = esc_html__( 'Enable Masonry Layout', 'responsive' );
			responsive_toggle_control( $wp_customize, 'blog_entry_display_masonry', $display_masonry_label, 'responsive_blog_layout', 58, 0, 'responsive_active_blog_entry_columns_multi_column' );
			
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_display_masonry_separator', 1, 'responsive_blog_layout', 59, 1 );

						
			$blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_content_width', $blog_content_width_label, 'responsive_blog_layout', 60, Responsive\Core\get_responsive_customizer_defaults( 'blog_content_width' ), null, 100, 1, 'postMessage' );
			
			responsive_horizontal_separator_control($wp_customize, 'blog_content_width_separator', 1, 'responsive_blog_layout', 61, 1 );

			$blog_post_per_page_label = esc_html__( 'Post Per Page', 'responsive' );
			responsive_drag_number_control_with_switchers( $wp_customize, 'blog_post_per_page', $blog_post_per_page_label, 'responsive_blog_layout', 62, 10, null, 100, 0, 'refresh', 1 );

			$blog_post_elements_heading_label = esc_html__( 'Post Structure', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_post_elements_head', $blog_post_elements_heading_label, 'responsive_blog_layout', 65 );

			/**
			 * Blog Entries Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_elements_positioning',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_elements_positioning' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_entry_elements_positioning',
					array(
						'label'    => esc_html__( 'Post Elements', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_blog_entry_elements_positioning',
						'priority' => 70,
						'choices'  => responsive_blog_entry_elements(),
						'sub_controls' => array(
							'meta' => array(
								'responsive_blog_entry_meta_divider'
							)
						),
					)
				)
			);

			$wp_customize->add_setting(
				'responsive_blog_entry_meta_divider',
				array(
					'default'           => '/',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_blog_entry_meta_divider',
				array(
					'section'  => 'responsive_blog_layout',
					'settings' => 'responsive_blog_entry_meta_divider',
					'type'     => 'hidden',
				)
			);

			/**
			 * Entry Elements.
			 */
			$blog_entry_featured_image_label = esc_html__( 'Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_featured_image_separator', $blog_entry_featured_image_label, 'responsive_blog_layout', 95 );

			// Featured Image Width.
			$blog_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_featured_image_width', $blog_featured_image_width_label, 'responsive_blog_layout', 95, '', null, 4800 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Image Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_entry_featured_image_style', $featured_image_style_label, 'responsive_blog_layout', 100, $featured_image_style_choices, 'stretched', null, 'postMessage' );
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_featured_image_style_separator', 1, 'responsive_blog_layout', 102, 1, );
			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Image Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_featured_image_alignment', $featured_image_alignment_label, 'responsive_blog_layout', 110, $featured_image_alignment_choices, 'left', null );

			/**
			* Entry Elements.
			*/
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_title_separator', 1, 'responsive_blog_layout', 120, 1, );

			// Alignment.
			$blog_entry_title_alignment_label   = esc_html__( 'Post Title Alignment', 'responsive' );
			$blog_entry_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);

			if ( is_rtl() ) {
				$blog_entry_title_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_title_alignment', $blog_entry_title_alignment_label, 'responsive_blog_layout', 130, $blog_entry_title_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_title_alignment' ), null );

			/**
			* Entry meta.
			*/
			$blog_entry_meta_label = esc_html__( 'Post Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_meta_control_separator', $blog_entry_meta_label, 'responsive_blog_layout', 75 );

			/**
			 * Blog Entries Meta Elements.
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_meta',
				array(
					'default'           => apply_filters( 'responsive_blog_meta_default', array( 'author', 'date', 'categories', 'tag' ) ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_entry_meta',
					array(
						'label'    => esc_html__( 'Meta Elements', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_blog_entry_meta',
						'priority' => 80,
						'choices'  => apply_filters(
							'responsive_blog_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date Published', 'responsive' ),
								'updated'    => esc_html__( 'Last Updated', 'responsive' ),
								'categories' => esc_html__( 'Categories', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
								'tag'        => esc_html__( 'Tag', 'responsive' ),
							)
						),
					)
				)
			);

			// Author Meta Sub-Controls
			$wp_customize->add_setting(
				'responsive_blog_author_prefix_label',
				array(
					'default'           => 'By',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_setting(
				'responsive_blog_author_avatar',
				array(
					'default'           => 0,
					'sanitize_callback' => 'responsive_sanitize_toggle',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_setting(
				'responsive_blog_author_avatar_size',
				array( 
					'default'           => 30,
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'postMessage',
				)
			);

			// Date Meta Sub-Controls
			$wp_customize->add_setting(
				'responsive_blog_date_format',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			// Updated Meta Sub-Controls
			$wp_customize->add_setting(
				'responsive_blog_updated_format',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			// Categories Meta Sub-Controls
			$wp_customize->add_setting(
				'responsive_blog_categories_style',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			// Tag Meta Sub-Controls
			$wp_customize->add_setting(
				'responsive_blog_tag_style',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_meta_separator_text_separator', 1, 'responsive_blog_layout', 82, 1, );

			// Meta Separator Text.
			$wp_customize->add_setting(
				'responsive_blog_entry_meta_separator_text',
				array(
					'default'           => '•',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				'responsive_blog_entry_meta_separator_text',
				array(
					'label'    => __( 'Meta Separator', 'responsive' ),
					'section'  => 'responsive_blog_layout',
					'settings' => 'responsive_blog_entry_meta_separator_text',
					'type'     => 'text',
					'priority' => 85,
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_meta_alignment_separator', 1, 'responsive_blog_layout', 87, 1, );

			// Meta Alignment.
			$blog_entry_meta_alignment_label   = esc_html__( 'Meta Alignment', 'responsive' );
			$blog_entry_meta_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$blog_entry_meta_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_meta_alignment', $blog_entry_meta_alignment_label, 'responsive_blog_layout', 90, $blog_entry_meta_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_meta_alignment' ), null );

			/**
			* Content Elements.
			*/
			$blog_entry_content_label = esc_html__( 'Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_content_separator', $blog_entry_content_label, 'responsive_blog_layout', 180 );

			// Content Type.
			$blog_entry_content_type_label   = esc_html__( 'Content Type', 'responsive' );
			$blog_entry_content_type_choices = array(
				'excerpt' => esc_html__( 'Excerpt', 'responsive' ),
				'content' => esc_html__( 'Full Content', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_entry_content_type', $blog_entry_content_type_label, 'responsive_blog_layout', 190, $blog_entry_content_type_choices, 'excerpt', null );

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_content_type_separator', 1, 'responsive_blog_layout', 192, 1, );

			// Content Alignment.
			$blog_entry_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$blog_entry_content_alignment_choices = array(
				'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$blog_entry_content_alignment_choices = array(
					'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
					'left'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_content_alignment', $blog_entry_content_alignment_label, 'responsive_blog_layout', 195, $blog_entry_content_alignment_choices, 'left', null );

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_content_alignment_separator', 1, 'responsive_blog_layout', 197, 1, null );

			// Excerpt Length.
			$blog_entry_excerpt_length_label = esc_html__( 'Excerpt Word Count', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'excerpt_length', $blog_entry_excerpt_length_label, 'responsive_blog_layout', 200, 25, null, 500 );

			responsive_horizontal_separator_control($wp_customize, 'excerpt_length_separator', 1, 'responsive_blog_layout', 202, 1, null );

			// Read More Text.
			$blog_entry_read_more_text_label = esc_html__( 'Read More Text', 'responsive' );

			responsive_text_control( $wp_customize, 'blog_read_more_text', $blog_entry_read_more_text_label, 'responsive_blog_layout', 210, Responsive\Core\get_responsive_customizer_defaults( 'read_more_text' ), null );

			responsive_horizontal_separator_control($wp_customize, 'blog_read_more_text_separator', 1, 'responsive_blog_layout', 212, 1, null );

			// Read More Type.
			$blog_entry_read_more_type_label   = esc_html__( 'Read More Type', 'responsive' );
			$blog_entry_read_more_type_choices = array(
				'link'   => esc_html__( 'Link', 'responsive' ),
				'button' => esc_html__( 'Button', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_entry_read_more_type', $blog_entry_read_more_type_label, 'responsive_blog_layout', 220, $blog_entry_read_more_type_choices, 'link', null );

			responsive_horizontal_separator_control($wp_customize, 'blog_exclude_post_cat_separator', 1, 'responsive_blog_layout', 225, 1, );
			responsive_horizontal_separator_control($wp_customize, 'blog_pagination_separator', 1, 'responsive_blog_layout', 235, 1, );
			responsive_horizontal_separator_control($wp_customize, 'blog_outside_container_separator', 1, 'responsive_blog_layout', 265, 1, );
			
		}

	}

endif;

return new Responsive_Blog_Layout_Customizer();