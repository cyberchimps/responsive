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
			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_single_blog_layout',
				array(
					'title'    => esc_html__( 'Single Post', 'responsive' ),
					'panel'    => 'responsive_blog',
					'priority' => 20,
				)
			);

			$wp_customize->add_section(
				'responsive_rp_layout',
				array(
					'title'    => esc_html__( 'Related Posts', 'responsive' ),
					'panel'    => 'responsive_blog',
					'priority' => 22,
					
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







			// Main Content Width.
			$single_blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_content_width', $single_blog_content_width_label, 'responsive_single_blog_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_content_width' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_content_width_separator', 1, 'responsive_single_blog_layout',11, 1 );

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
						'section'  => 'responsive_single_blog_layout',
						'settings' => 'responsive_blog_single_elements_positioning',
						'priority' => 36,
						'choices'  => responsive_blog_single_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$single_blog_featured_image_label = esc_html__( 'Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_featured_image_separator', $single_blog_featured_image_label, 'responsive_single_blog_layout', 50 );

			// Featured Image Width.
			$single_blog_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_featured_image_width', $single_blog_featured_image_width_label, 'responsive_single_blog_layout', 55, '', null, 4800 );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_featured_image_width_separator', 1, 'responsive_single_blog_layout',56, 1 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Image Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_style', $featured_image_style_label, 'responsive_single_blog_layout', 60, $featured_image_style_choices, 'default', null, 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_featured_image_style_separator', 1, 'responsive_single_blog_layout',61, 1 );

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
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_alignment', $featured_image_alignment_label, 'responsive_single_blog_layout', 70, $featured_image_alignment_choices, 'left', null );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_featured_image_alignment_separator', 2, 'responsive_single_blog_layout',71, 1 );

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
			responsive_select_button_control( $wp_customize, 'single_blog_title_alignment', $single_blog_title_alignment_label, 'responsive_single_blog_layout', 90, $single_blog_title_alignment_choices, 'left', null );

			/**
			* Entry meta.
			*/
			$single_blog_meta_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_meta_control_separator', $single_blog_meta_label, 'responsive_single_blog_layout', 100 );

			responsive_horizontal_separator_control( $wp_customize, 'responsive_disable_author_meta_separator', 1, 'responsive_single_blog_layout',106, 1 );

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
						'section'  => 'responsive_single_blog_layout',
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

			responsive_horizontal_separator_control( $wp_customize, 'responsive_blog_single_meta_separator', 1, 'responsive_single_blog_layout',111, 1 );

			// Meta Separator Text.
			$wp_customize->add_setting(
				'responsive_single_blog_meta_separator_text',
				array(
					'default'           => '-',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				'responsive_single_blog_meta_separator_text',
				array(
					'label'    => __( 'Meta Separator', 'responsive' ),
					'section'  => 'responsive_single_blog_layout',
					'settings' => 'responsive_single_blog_meta_separator_text',
					'type'     => 'text',
					'priority' => 120,
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'responsive_single_blog_meta_separator_text_separator', 1, 'responsive_single_blog_layout',121, 1 );

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
			responsive_select_button_control( $wp_customize, 'single_blog_meta_alignment', $single_blog_meta_alignment_label, 'responsive_single_blog_layout', 130, $single_blog_meta_alignment_choices, 'left', null );

			responsive_horizontal_separator_control( $wp_customize, 'single_blog_meta_alignment_separator', 2, 'responsive_single_blog_layout',131, 1 );

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
			responsive_section_toggle_control( $wp_customize, 'single_blog_enable_related_posts', __( 'Enable Related Posts', 'responsive' ), 'responsive_single_blog_layout', 160, 'section', 'responsive_rp_layout', null, 'refresh', 'Enable the toggle to customize Related Posts settings.');

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
		}

	}

endif;

return new Responsive_Single_Blog_Layout_Customizer();
