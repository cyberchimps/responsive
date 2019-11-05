<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Blog_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Blog_Customizer {

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
				'responsive_single_post_section',
				array(
					'title'    => esc_html__( 'Single Post', 'responsive' ),
					'panel'    => 'responsive-blog-options',
					'priority' => 208,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[single_post_layout_default]',
				array(
					'sanitize_callback' => 'responsive_sanitize_default_layouts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_single_post_layout_default',
				array(
					'label'    => __( 'Sidebar Position', 'responsive' ),
					'section'  => 'responsive_single_post_section',
					'settings' => 'responsive_theme_options[single_post_layout_default]',
					'type'     => 'select',
					'choices'  => Responsive_Options::valid_layouts(),
				)
			);
			/**
			 * Blog Single Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_single_elements_positioning',
				array(
					'default'           => array( 'title', 'meta', 'featured_image', 'content' ),
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
						'section'  => 'responsive_single_post_section',
						'settings' => 'responsive_blog_single_elements_positioning',
						'priority' => 10,
						'choices'  => responsive_blog_single_elements(),
					)
				)
			);

			/**
			 * Blog Single Meta
			 */
			$wp_customize->add_setting(
				'responsive_blog_single_meta',
				array(
					'default'           => array( 'author', 'date', 'categories', 'comments' ),
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
						'section'  => 'responsive_single_post_section',
						'settings' => 'responsive_blog_single_meta',
						'priority' => 10,
						'choices'  => apply_filters(
							'responsive_blog_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date', 'responsive' ),
								'categories' => esc_html__( 'Categories', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
							)
						),
					)
				)
			);

			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_blog_entries_section',
				array(
					'title'    => esc_html__( 'Blog Entries', 'responsive' ),
					'panel'    => 'responsive-blog-options',
					'priority' => 207,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[blog_posts_index_layout_default]',
				array(
					'sanitize_callback' => 'responsive_sanitize_blog_default_layouts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_hblog_posts_index_layout_default',
				array(
					'label'    => __( 'Default Blog Posts Index Layout', 'responsive' ),
					'section'  => 'responsive_blog_entries_section',
					'settings' => 'responsive_theme_options[blog_posts_index_layout_default]',
					'type'     => 'select',
					'choices'  => Responsive_Options::blog_valid_layouts(),
				)
			);
			/**
			 * Blog Entries Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_elements_positioning',
				array(
					'default'           => array( 'title', 'meta', 'featured_image', 'content' ),
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
						'section'  => 'responsive_blog_entries_section',
						'settings' => 'responsive_blog_entry_elements_positioning',
						'priority' => 10,
						'choices'  => responsive_blog_entry_elements(),
					)
				)
			);

			/**
			 * Blog Entries Meta
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_meta',
				array(
					'default'           => apply_filters( 'responsive_blog_meta_default', array( 'author', 'date', 'categories', 'comments' ) ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_entry_meta',
					array(
						'label'    => esc_html__( 'Post Meta', 'responsive' ),
						'section'  => 'responsive_blog_entries_section',
						'settings' => 'responsive_blog_entry_meta',
						'priority' => 10,
						'choices'  => apply_filters(
							'responsive_blog_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date', 'responsive' ),
								'categories' => esc_html__( 'Categories', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
							)
						),
					)
				)
			);

			// Show Excerpt.
			$wp_customize->add_setting(
				'responsive_show_excerpt',
				array(
					'transport'         => 'refresh',
					'default'           => 'content',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				'responsive_show_excerpt',
				array(
					'label'    => __( 'Post Content', 'responsive' ),
					'priority' => 1,
					'section'  => 'responsive_blog_entries_section',
					'settings' => 'responsive_show_excerpt',
					'type'     => 'select',
					'choices'  => array(
						'excerpt' => __( 'Excerpt', 'responsive' ),
						'content' => __( 'Content', 'responsive' ),
					),
				)
			);
			$wp_customize->add_setting(
				'responsive_excerpt_length',
				array(
					'default'           => '40',
					'sanitize_callback' => 'responsive_sanitize_number',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_excerpt_length',
					array(
						'label'       => __( 'Excerpt Length', 'responsive' ),
						'section'     => 'responsive_blog_entries_section',
						'settings'    => 'responsive_excerpt_length',
						'priority'    => 2,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 500,
							'step' => 1,
						),
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_blog_read_more_text',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => 'Read more ›',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_blog_read_more_text',
				array(
					'label'    => __( 'Read More Text', 'responsive' ),
					'priority' => 3,
					'section'  => 'responsive_blog_entries_section',
					'settings' => 'responsive_blog_read_more_text',
					'type'     => 'text',
				)
			);
			$wp_customize->add_setting(
				'responsive_display_read_more_as_button',
				array(
					'default'           => '',
					'sanitize_callback' => 'responsive_checkbox_validate',
					'type'              => 'theme_mod',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_display_read_more_as_button',
				array(
					'label'    => __( 'Display Read More as Button', 'responsive' ),
					'section'  => 'responsive_blog_entries_section',
					'settings' => 'responsive_display_read_more_as_button',
					'type'     => 'checkbox',
					'priority' => 4,
				)
			);
			$wp_customize->add_setting(
				'blog_pagination',
				array(
					'transport'         => 'refresh',
					'default'           => 'number',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				'blog_pagination',
				array(
					'label'    => __( 'Post Pagination', 'responsive' ),
					'section'  => 'responsive_blog_entries_section',
					'settings' => 'blog_pagination',
					'type'     => 'select',
					'choices'  => array(
						'default'  => __( 'Default', 'responsive' ),
						'infinite' => __( 'Infinite', 'responsive' ),
					),
				)
			);
			$wp_customize->add_setting(
				'responsive_container_background_color',
				array(
					'type'              => 'theme_mod',
					'sanitize_callback' => 'responsive_sanitize_color',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_container_background_color',
					array(
						'label'    => 'Blog Post Background Color',
						'section'  => 'responsive_blog_entries_section',
						'settings' => 'responsive_container_background_color',
						'priority' => 10,
					)
				)
			);
		}

	}

endif;

return new Responsive_Blog_Customizer();
