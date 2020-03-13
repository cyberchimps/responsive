<?php
/**
 * Home page Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Home_Page_Customizer' ) ) :
	/**
	 * Home page Customizer Options
	 */
	class Responsive_Home_Page_Customizer {

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
		 * @param  object $wp_customize    arguments.
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {
			/*
			--------------------------------------------------------------
				// Home Page
			--------------------------------------------------------------
			*/
			$args                  = array(
				'type'         => 'post',
				'orderby'      => 'name',
				'order'        => 'ASC',
				'hide_empty'   => 1,
				'hierarchical' => 1,
				'taxonomy'     => 'category',
			);
			$option_categories     = array();
			$category_lists        = get_categories( $args );
			$option_categories[''] = esc_html( __( 'Choose Category', 'responsive' ) );
			foreach ( $category_lists as $category ) {
				$option_categories[ $category->term_id ] = $category->name;
			}

			$option_all_post_cat = array();
			foreach ( $category_lists as $category ) {
				$option_all_post_cat[ $category->term_id ] = $category->name;
			}

			/* Option list of all post */
			$options_posts     = array();
			$options_posts_obj = get_posts( 'posts_per_page=-1' );
			$options_posts[''] = esc_html( __( 'Choose Post', 'responsive' ) );
			foreach ( $options_posts_obj as $posts ) {
				$options_posts[ $posts->ID ] = $posts->post_title;
			}

			// Custom Home Section.
			$custom_home_page_section_label = esc_html__( 'Custom Home Page', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_home_page_section_separtor', $custom_home_page_section_label, 'static_front_page', 10 );

			$wp_customize->add_setting(
				'responsive_theme_options[front_page]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'res_front_page',
				array(
					'label'       => __( 'Enable Custom Front Page', 'responsive' ),
					'section'     => 'static_front_page',
					'settings'    => 'responsive_theme_options[front_page]',
					'type'        => 'checkbox',
					'priority'    => 10,
					'description' => __( 'Overrides the WordPress front page option', 'responsive' ),
				)
			);

			// Hero Area.
			$custom_hero_area_label = esc_html__( 'Hero Area', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_hero_area_separtor', $custom_hero_area_label, 'static_front_page', 10, 'responsive_custom_home_active' );

			$wp_customize->add_setting(
				'responsive_theme_options[home_headline]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'HAPPINESS', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_home_headline',
				array(
					'label'           => __( 'Headline', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[home_headline]',
					'type'            => 'text',
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[home_subheadline]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'IS A WARM CUP', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_home_subheadline',
				array(
					'label'           => __( 'Subheadline', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[home_subheadline]',
					'type'            => 'text',
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[home_content_area]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'default'           => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ),
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_home_content_area',
				array(
					'label'           => __( 'Content Area', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[home_content_area]',
					'type'            => 'textarea',
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[cta_button]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_cta_button',
				array(
					'label'           => __( 'Disable Call to Action Button?', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[cta_button]',
					'type'            => 'checkbox',
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[cta_url]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '#nogo',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_cta_url',
				array(
					'label'           => __( 'Call to Action (URL)', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[cta_url]',
					'type'            => 'text',
					'active_callback' => 'responsive_custom_home_active',
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[cta_text]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => 'Call to Action',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_cta_text',
				array(
					'label'           => __( 'Call to Action (Text)', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[cta_text]',
					'type'            => 'text',
					'active_callback' => 'responsive_custom_home_active',
				)
			);

				// Call to action button style.
			$wp_customize->add_setting(
				'responsive_theme_options[button_style]',
				array(
					'default'           => 'Gradient',
					'type'              => 'option',
					'sanitize_callback' => 'responsive_pro_button_style_validate',
				)
			);

			// Call to action button style.
				$wp_customize->add_control(
					'static_page_layout_default',
					array(
						'label'           => __( 'Call to Action Button Style', 'responsive' ),
						'section'         => 'static_front_page',
						'settings'        => 'responsive_theme_options[button_style]',
						'type'            => 'select',
						'priority'        => 15,
						'active_callback' => 'responsive_custom_home_active',
						'choices'         => array(
							'default'    => __( 'Gradient', 'responsive' ),
							'flat_style' => __( 'Flat', 'responsive' ),

						),
					)
				);

			$wp_customize->add_setting(
				'responsive_theme_options[featured_content]',
				array(
					'sanitize_callback' => 'wp_kses_post',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_featured_content',
				array(
					'label'           => __( 'Featured Content', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[featured_content]',
					'type'            => 'textarea',
					'description'     => __( 'Paste your shortcode, video or image source', 'responsive' ),
					'priority'        => 20,
					'active_callback' => 'responsive_custom_home_active',
				)
			);

			// About Section.
			$custom_about_section_label = esc_html__( 'About Section', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_about_section_separtor', $custom_about_section_label, 'static_front_page', 21, 'responsive_custom_home_active' );

			$wp_customize->add_setting(
				'responsive_theme_options[about]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'about',
				array(
					'label'           => __( 'Enable About Section', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[about]',
					'type'            => 'checkbox',
					'priority'        => 22,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[about_title]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'About Box Title', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'about_title',
				array(
					'label'           => __( 'About Title', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[about_title]',
					'type'            => 'text',
					'priority'        => 22,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[about_text]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'about_text',
				array(
					'label'           => __( 'About Text', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[about_text]',
					'type'            => 'text',
					'priority'        => 22,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[about_cta_text]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => 'Call to Action',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'about_cta_text',
				array(
					'label'           => __( 'Call to Action (Text)', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[about_cta_text]',
					'type'            => 'text',
					'priority'        => 22,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[about_cta_url]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '#',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'about_cta_url',
				array(
					'label'           => __( 'Call to Action (URL)', 'responsive' ),
					'section'         => 'static_front_page',
					'description'     => __( 'Enter url as http://www.example.com', 'responsive' ),
					'settings'        => 'responsive_theme_options[about_cta_url]',
					'type'            => 'text',
					'priority'        => 22,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[feature]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);

			// Feature Section.
			$custom_feature_section_label = esc_html__( 'Feature Section', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_feature_section_separtor', $custom_feature_section_label, 'static_front_page', 22, 'responsive_custom_home_active' );

			$wp_customize->add_control(
				'feature_front_page',
				array(
					'label'           => __( 'Enable Feature Section', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[feature]',
					'type'            => 'checkbox',
					'priority'        => 23,
					'active_callback' => 'responsive_custom_home_active',
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[feature_title]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'Features', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'feature_title',
				array(
					'label'           => __( 'Feature Title', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[feature_title]',
					'type'            => 'text',
					'priority'        => 23,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[feature1]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'feature1',
				array(
					'label'           => __( 'Select post for feature 1', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[feature1]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the feature. Recommended image size for the featured images: 130 x 130px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 23,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[feature2]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'feature2',
				array(
					'label'           => __( 'Select post for feature 2', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[feature2]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the feature. Recommended image size for the featured images: 130 x 130px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 23,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[feature3]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'feature3',
				array(
					'label'           => __( 'Select post for feature 3', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[feature3]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the feature. Recommended image size for the featured images: 130 x 130px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 23,
					'active_callback' => 'responsive_custom_home_active',
				)
			);

			// Testimonial Section.
			$custom_testimonial_section_label = esc_html__( 'Testimonial Section', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_testimonial_section_separtor', $custom_testimonial_section_label, 'static_front_page', 24, 'responsive_custom_home_active' );

			$wp_customize->add_setting(
				'responsive_theme_options[testimonials]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'testimonial_front_page',
				array(
					'label'           => __( 'Enable Testimonial Section', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[testimonials]',
					'type'            => 'checkbox',
					'priority'        => 25,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[testimonial_title]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'Testimonial', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'testimonial_title',
				array(
					'label'           => __( 'Testimonial Title', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[testimonial_title]',
					'type'            => 'text',
					'priority'        => 30,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[testimonial_val]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'testimonial_val',
				array(
					'label'           => __( 'Select Post', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[testimonial_val]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the client testimonials. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 35,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			// Team Section.
			$custom_team_section_label = esc_html__( 'Team Section', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_team_section_separtor', $custom_team_section_label, 'static_front_page', 35, 'responsive_custom_home_active' );

			$wp_customize->add_setting(
				'responsive_theme_options[team]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'team_front_page',
				array(
					'label'           => __( 'Enable Team Section', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[team]',
					'type'            => 'checkbox',
					'priority'        => 36,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[team_title]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'team', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'team_title',
				array(
					'label'           => __( 'Team Title', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[team_title]',
					'type'            => 'text',
					'priority'        => 37,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[teammember1]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'teammember1',
				array(
					'label'           => __( 'Select post for team member1', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[teammember1]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the team member. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 38,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[teammember2]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'teammember2',
				array(
					'label'           => __( 'Select post for team member2', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[teammember2]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the team member. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 39,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[teammember3]',
				array(
					'sanitize_callback' => 'responsive_sanitize_posts',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'teammember3',
				array(
					'label'           => __( 'Select post for team member3', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[teammember3]',
					'description'     => __( 'The featured image, title and content from the posts will be used to display the team member. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
					'type'            => 'select',
					'choices'         => $options_posts,
					'priority'        => 40,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[home-widgets]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'home-widgets',
				array(
					'label'           => __( 'Click to disable home page widgets', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[home-widgets]',
					'type'            => 'checkbox',
					'priority'        => 41,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			// Contact Section.
			$custom_contact_section_label = esc_html__( 'Contact Section', 'responsive' );
			responsive_separator_control( $wp_customize, 'custom_contact_section_separtor', $custom_contact_section_label, 'static_front_page', 41, 'responsive_custom_home_active' );

			$wp_customize->add_setting(
				'responsive_theme_options[contact]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_front_page',
				array(
					'label'           => __( 'Enable Contact Section', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact]',
					'type'            => 'checkbox',
					'priority'        => 42,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[contact_title]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'Contact Us', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_title',
				array(
					'label'           => __( 'Contact section Title', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact_title]',
					'type'            => 'text',
					'priority'        => 43,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[contact_subtitle]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'default'           => __( 'Contact subtitle', 'responsive' ),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_subtitle',
				array(
					'label'           => __( 'Contact section Subtitle', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact_subtitle]',
					'type'            => 'text',
					'priority'        => 44,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[contact_add]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_add',
				array(
					'label'           => __( 'Address', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact_add]',
					'type'            => 'text',
					'priority'        => 45,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[contact_email]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_email',
				array(
					'label'           => __( 'Email', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact_email]',
					'type'            => 'text',
					'priority'        => 46,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[contact_ph]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_ph',
				array(
					'label'           => __( 'Phone no', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact_ph]',
					'type'            => 'text',
					'priority'        => 47,
					'active_callback' => 'responsive_custom_home_active',
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[contact_content]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'postMessage',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'contact_content',
				array(
					'label'           => __( 'Contact form shortcode', 'responsive' ),
					'section'         => 'static_front_page',
					'settings'        => 'responsive_theme_options[contact_content]',
					'description'     => __( 'You can put Contact Form 7 shortcode here.', 'responsive' ),
					'type'            => 'text',
					'priority'        => 48,
					'active_callback' => 'responsive_custom_home_active',
				)
			);

		}
	}

endif;

return new Responsive_Home_Page_Customizer();
