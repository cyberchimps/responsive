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

			// Main Content Width.
			$single_blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_content_width', $single_blog_content_width_label, 'responsive_single_blog_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'single_blog_content_width' ), null, 100, 1, 'postMessage' );

			/**
			 * Entry Elements.
			 */
			$single_blog_elements_label = esc_html__( 'Post Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_elements_separator', $single_blog_elements_label, 'responsive_single_blog_layout', 30 );

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
						'priority' => 40,
						'choices'  => responsive_blog_single_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$single_blog_featured_image_label = esc_html__( 'Post Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_featured_image_separator', $single_blog_featured_image_label, 'responsive_single_blog_layout', 50 );

			// Featured Image Width.
			$single_blog_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_featured_image_width', $single_blog_featured_image_width_label, 'responsive_single_blog_layout', 55, '', null, 4800 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_featured_image_style', $featured_image_style_label, 'responsive_single_blog_layout', 60, $featured_image_style_choices, 'default', null, 'postMessage' );

			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'single_blog_featured_image_alignment', $featured_image_alignment_label, 'responsive_single_blog_layout', 70, $featured_image_alignment_choices, 'left', null );

			/**
			* Entry Elements.
			*/
			$single_blog_title_label = esc_html__( 'Post Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_title_separator', $single_blog_title_label, 'responsive_single_blog_layout', 80 );

			// Alignment.
			$single_blog_title_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$single_blog_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_title_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'single_blog_title_alignment', $single_blog_title_alignment_label, 'responsive_single_blog_layout', 90, $single_blog_title_alignment_choices, 'left', null );

			/**
			* Entry meta.
			*/
			$single_blog_meta_label = esc_html__( 'Post Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_meta_control_separator', $single_blog_meta_label, 'responsive_single_blog_layout', 100 );

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
								'date'       => esc_html__( 'Date', 'responsive' ),
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

			// Meta Alignment.
			$single_blog_meta_alignment_label   = esc_html__( 'Meta Alignment', 'responsive' );
			$single_blog_meta_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_meta_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'single_blog_meta_alignment', $single_blog_meta_alignment_label, 'responsive_single_blog_layout', 130, $single_blog_meta_alignment_choices, 'left', null );

			/**
			* Content Elements.
			*/
			$single_blog_content_label = esc_html__( 'Post Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_content_separator', $single_blog_content_label, 'responsive_single_blog_layout', 140 );

			// Content Alignment.
			$single_blog_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$single_blog_content_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_content_alignment_choices = array(
					'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'single_blog_content_alignment', $single_blog_content_alignment_label, 'responsive_single_blog_layout', 150, $single_blog_content_alignment_choices, 'left', null );


			/**
			* Related Posts Section.
			*/
			$single_blog_related_posts_label = esc_html__( 'Related Posts', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_related_posts_separator', $single_blog_related_posts_label, 'responsive_single_blog_layout', 190 );

			// Enable Related Posts.
			$enable_single_blog_related_posts_label = __( 'Enable Related Posts', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'single_blog_enable_related_posts', $enable_single_blog_related_posts_label, 'responsive_single_blog_layout', 200, 0, null );

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
					'label'    => __( 'Section Title', 'responsive' ),
					'section'  => 'responsive_single_blog_layout',
					'settings' => 'responsive_single_blog_related_posts_title',
					'type'     => 'text',
					'priority' => 210,
					'active_callback' => 'responsive_single_blog_disabled_related_posts',
				)
			);

			// Title Alignment.
			$single_blog_related_posts_title_alignment_label   = esc_html__( 'Title Alignment', 'responsive' );
			$single_blog_related_posts_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'single_blog_related_posts_title_alignment', $single_blog_related_posts_title_alignment_label, 'responsive_single_blog_layout', 220, $single_blog_related_posts_title_alignment_choices, 'left', 'responsive_single_blog_disabled_related_posts' );

			// Related Posts Count.
			$single_blog_related_posts_count = esc_html__( 'Related Posts Count', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_related_posts_count', $single_blog_related_posts_count, 'responsive_single_blog_layout', 230, 3, 'responsive_single_blog_disabled_related_posts', 12, 1 );

			// No.of Posts Per Row.
			$single_blog_related_posts_per_row = esc_html__( 'No.of Posts Per Row', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'single_blog_related_posts_per_row', $single_blog_related_posts_per_row, 'responsive_single_blog_layout', 240, 2, 'responsive_single_blog_disabled_related_posts', 4, 1 );

			// Related Posts Taxonomy Query.
			$single_blog_related_posts_taxonomy_query_label   = esc_html__( 'Related Posts Taxonomy', 'responsive' );
			$single_blog_related_posts_taxonomy_choices = array(
				'category'    => esc_html__( 'Category', 'responsive' ),
				'tag'        => esc_html__( 'Tag', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_related_posts_taxonomy', $single_blog_related_posts_taxonomy_query_label, 'responsive_single_blog_layout', 250, $single_blog_related_posts_taxonomy_choices, 'category', 'responsive_single_blog_disabled_related_posts' );

			/**
			 * Related Single Posts Structure
			 */
			$wp_customize->add_setting(
				'responsive_single_blog_related_post_structure',
				array(
					'default'           => array( 'title', 'featured-image', 'meta', 'excerpt' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_single_blog_related_post_structure',
					array(
						'label'    => esc_html__( 'Related Post Structure', 'responsive' ),
						'section'  => 'responsive_single_blog_layout',
						'settings' => 'responsive_single_blog_related_post_structure',
						'priority' => 260,
						'choices'  => apply_filters(
							'responsive_single_blog_related_post_structure_choices',
							array(
								'title'          => esc_html__( 'Title', 'responsive' ),
								'featured-image' => esc_html__( 'Featured Image', 'responsive' ),
								'meta'           => esc_html__( 'Meta', 'responsive' ),
								'excerpt'        => esc_html__( 'Excerpt', 'responsive' ),
							)
						),
						'active_callback' => 'responsive_single_blog_disabled_related_posts',
					)
				)
			);

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
						'section'  => 'responsive_single_blog_layout',
						'settings' => 'responsive_single_blog_related_post_meta_elements',
						'priority' => 270,
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
						'active_callback' => 'responsive_single_blog_disabled_related_posts',
					)
				)
			);
		}

	}

endif;

return new Responsive_Single_Blog_Layout_Customizer();
