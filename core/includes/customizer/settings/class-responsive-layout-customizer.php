<?php
/**
 * Layout Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Layout_Customizer' ) ) :
	/** Layout Customizer Options */
	class Responsive_Layout_Customizer {

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

			$wp_customize->add_panel(
				'responsive-layout-options',
				array(
					'title'       => __( 'Layout', 'responsive' ),
					'description' => 'Layout Options', // Include html tags such as <p>.
					'priority'    => 21, // Mixed with top-level-section hierarchy.
				)
			);

			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_layout_section',
				array(
					'title'    => esc_html__( 'Container', 'responsive' ),
					'panel'    => 'responsive-layout-options',
					'priority' => 200,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[site_layout_option]',
				array(
					'sanitize_callback' => 'responsive_validate_site_layout',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'site_layout_option',
				array(
					'label'    => __( 'Choose Site Layout', 'responsive' ),
					'section'  => 'responsive_layout_section',
					'settings' => 'responsive_theme_options[site_layout_option]',
					'type'     => 'select',
					'choices'  => array(
						'default-layout'    => __( 'Default', 'responsive' ),
						'full-width-layout' => __( 'Full Width Layout', 'responsive' ),
						'full-width-no-box' => __( 'Full Width Without boxes', 'responsive' ),
					),
				)
			);
			/**
			 * Main Container Width
			 */
			$wp_customize->add_setting(
				'responsive_main_container_width',
				array(
					'transport'         => 'refresh',
					'default'           => '960',
					'sanitize_callback' => 'responsive_sanitize_number',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Range_Control(
					$wp_customize,
					'responsive_main_container_width',
					array(
						'label'       => __( 'Container Width (px)', 'responsive' ),
						'section'     => 'responsive_layout_section',
						'settings'    => 'responsive_main_container_width',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 4096,
							'step' => 1,
						),
					)
				)
			);
			/**
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_single_post_section',
				array(
					'title'    => esc_html__( 'Single Post', 'responsive' ),
					'panel'    => 'responsive-layout-options',
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
					'panel'    => 'responsive-layout-options',
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

			$wp_customize->add_section(
				'responsive_page_section',
				array(
					'title'    => esc_html__( 'Page', 'responsive' ),
					'panel'    => 'responsive-layout-options',
					'priority' => 209,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[static_page_layout_default]',
				array(
					'sanitize_callback' => 'responsive_sanitize_default_layouts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_static_page_layout_default',
				array(
					'label'    => __( 'Sidebar Position', 'responsive' ),
					'section'  => 'responsive_page_section',
					'settings' => 'responsive_theme_options[static_page_layout_default]',
					'type'     => 'select',
					'choices'  => Responsive_Options::valid_layouts(),
				)
			);
			/**
			 * Blog Single Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_page_single_elements_positioning',
				array(
					'default'           => array( 'title', 'featured_image', 'content' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_page_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Post Elements', 'responsive' ),
						'section'  => 'responsive_page_section',
						'settings' => 'responsive_page_single_elements_positioning',
						'priority' => 10,
						'choices'  => responsive_page_elements(),
					)
				)
			);
			$wp_customize->add_setting(
				'res_hide_site_title',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',

				)
			);
			$wp_customize->add_control(
				'res_hide_site_title',
				array(
					'label'   => esc_html__( 'Hide Site Title', 'responsive' ),
					'section' => 'title_tagline',
					'type'    => 'checkbox',

				)
			);
			$wp_customize->add_setting(
				'res_hide_tagline',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'default'           => false,
				)
			);
			$wp_customize->add_control(
				'res_hide_tagline',
				array(
					'label'   => esc_html__( 'Hide Tagline', 'responsive' ),
					'section' => 'title_tagline',
					'type'    => 'checkbox',

				)
			);
		}


	}

endif;

return new Responsive_Layout_Customizer();
