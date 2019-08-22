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
					'default'           => array( 'featured_image', 'title', 'meta', 'content' ),
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
		}

	}

endif;

return new Responsive_Blog_Customizer();
