<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Theme_Options_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Theme_Options_Customizer {

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
			$wp_customize->add_panel(
				'responsive-theme-options',
				array(
					'title'       => __( 'Extras (Theme Options)', 'responsive' ),
					'description' => 'All Misc Options', // Include html tags such as <p>.
					'priority'    => 16, // Mixed with top-level-section hierarchy.
				)
			);
			$wp_customize->get_section( 'header_image' )->title = __( 'header Image (Deprecated)', 'responsive' );
			$wp_customize->get_section( 'header_image' )->panel = 'responsive-theme-options'; // Add to Colors Panel.

			/*
			--------------------------------------------------------------
				// SOCIAL MEDIA SECTION
			--------------------------------------------------------------
			*/

				$wp_customize->add_section(
					'responsive_social_media',
					array(
						'title'       => __( 'Social Icons', 'responsive' ),
						'panel'       => 'responsive-theme-options',
						'priority'    => 40,
						'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'responsive' ),
					)
				);

				// Add Twitter Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[twitter_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_twitter',
						array(
							'label'    => __( 'Twitter', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[twitter_uid]',
						)
					)
				);

				// Add Facebook Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[facebook_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_facebook',
						array(
							'label'    => __( 'Facebook', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[facebook_uid]',
						)
					)
				);

				// Add LinkedIn Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[linkedin_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_linkedin',
						array(
							'label'    => __( 'LinkedIn', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[linkedin_uid]',
						)
					)
				);

				// Add Youtube Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[youtube_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_youtube',
						array(
							'label'    => __( 'YouTube', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[youtube_uid]',
						)
					)
				);

				// Add Google+ Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[googleplus_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_googleplus',
						array(
							'label'    => __( 'Google+', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[googleplus_uid]',
						)
					)
				);

				// Add RSS Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[rss_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_rss',
						array(
							'label'    => __( 'RSS Feed', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[rss_uid]',
						)
					)
				);

				// Add Instagram Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[instagram_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_instagram',
						array(
							'label'    => __( 'Instagram', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[instagram_uid]',
						)
					)
				);

				// Add Pinterest Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[pinterest_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_pinterest',
						array(
							'label'    => __( 'Pinterest', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[pinterest_uid]',
						)
					)
				);

				// Add StumbleUpon Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[stumbleupon_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_stumble',
						array(
							'label'    => __( 'StumbleUpon', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[stumbleupon_uid]',
						)
					)
				);

				// Add Vimeo Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[vimeo_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_vimeo',
						array(
							'label'    => __( 'Vimeo', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[vimeo_uid]',
						)
					)
				);

				// Add SoundCloud Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[yelp_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_yelp',
						array(
							'label'    => __( 'Yelp', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[yelp_uid]',
						)
					)
				);

				// Add Foursquare Setting.
				$wp_customize->add_setting(
					'responsive_theme_options[foursquare_uid]',
					array(
						'sanitize_callback' => 'esc_url_raw',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'res_foursquare',
						array(
							'label'    => __( 'Foursquare', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[foursquare_uid]',
						)
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[email_uid]',
					array(
						'sanitize_callback' => 'sanitize_email',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'email_uid',
						array(
							'label'    => __( 'Email Address', 'responsive' ),
							'section'  => 'responsive_social_media',
							'settings' => 'responsive_theme_options[email_uid]',
						)
					)
				);
				/* Blog page setting */
				$wp_customize->add_section(
					'blog_page',
					array(
						'title' => __( 'Blog page Settings', 'responsive' ),
						'panel' => 'responsive-theme-options',
					)
				);
				$wp_customize->add_setting( 'exclude_post_cat', array( 'sanitize_callback' => 'responsive_sanitize_multiple_checkboxes' ) );
				$wp_customize->add_control(
					new Responsive_Customize_Control_Checkbox_Multiple(
						$wp_customize,
						'exclude_post_cat',
						array(
							'section'     => 'blog_page',
							'label'       => __( 'Exclude Categories from Blog page', 'responsive' ),
							'description' => __( 'Please choose the post categories that should not be displayed on the blog page', 'responsive' ),
							'settings'    => 'exclude_post_cat',
							'choices'     => $option_all_post_cat,
						)
					)
				);

				/*
				--------------------------------------------------------------
					// Theme Elements
				--------------------------------------------------------------
				*/

				$wp_customize->add_section(
					'theme_elements',
					array(
						'title'    => __( 'Theme Elements', 'responsive' ),
						'panel'    => 'responsive-theme-options',
						'priority' => 30,
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[override_woo]',
					array(
						'sanitize_callback' => 'responsive_sanitize_checkbox',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_override_woo',
					array(
						'label'    => __( 'Override WooCommerce Templates?', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[override_woo]',
						'type'     => 'checkbox',
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[sticky-header]',
					array(
						'sanitize_callback' => 'responsive_sanitize_checkbox',
						'type'              => 'option',
						'transport'         => 'postMessage',
					)
				);
				$wp_customize->add_control(
					'res_sticky-header',
					array(
						'label'    => __( 'Enable Sticky Header?', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[sticky-header]',
						'type'     => 'checkbox',
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[featured_images]',
					array(
						'sanitize_callback' => 'responsive_sanitize_checkbox',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_featured_images',
					array(
						'label'    => __( 'Enable featured images?', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[featured_images]',
						'type'     => 'checkbox',
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[breadcrumb]',
					array(
						'sanitize_callback' => 'responsive_sanitize_checkbox',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_breadcrumb',
					array(
						'label'    => __( 'Disable breadcrumb list?', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[breadcrumb]',
						'type'     => 'checkbox',
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
						'label'    => __( 'Disable Call to Action Button?', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[cta_button]',
						'type'     => 'checkbox',
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[blog_post_title_toggle]',
					array(
						'sanitize_callback' => 'responsive_sanitize_checkbox',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_blog_post_title_toggle',
					array(
						'label'    => __( 'Enable Blog Title', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[blog_post_title_toggle]',
						'type'     => 'checkbox',
					)
				);

				$wp_customize->add_setting(
					'responsive_theme_options[blog_post_title_text]',
					array(
						'sanitize_callback' => 'sanitize_text_field',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_blog_post_title_text',
					array(
						'label'    => __( 'Title Text', 'responsive' ),
						'section'  => 'theme_elements',
						'settings' => 'responsive_theme_options[blog_post_title_text]',
						'type'     => 'text',
					)
				);

				/*
				--------------------------------------------------------------
					// Scripts
				--------------------------------------------------------------
				*/

				$wp_customize->add_section(
					'scripts',
					array(
						'title'    => __( 'Scripts', 'responsive' ),
						'panel'    => 'responsive-theme-options',
						'priority' => 300,
					)
				);
				$wp_customize->add_setting(
					'responsive_theme_options[responsive_inline_js_head]',
					array(
						'sanitize_callback' => 'wp_kses_stripslashes',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_responsive_inline_js_head',
					array(
						'label'    => __( 'Embeds to header.php', 'responsive' ),
						'section'  => 'scripts',
						'settings' => 'responsive_theme_options[responsive_inline_js_head]',
						'type'     => 'textarea',
					)
				);

				$wp_customize->add_setting(
					'responsive_theme_options[responsive_inline_js_footer]',
					array(
						'sanitize_callback' => 'wp_kses_stripslashes',
						'type'              => 'option',
					)
				);
				$wp_customize->add_control(
					'res_responsive_inline_js_footer',
					array(
						'label'    => __( 'Embeds to footer.php', 'responsive' ),
						'section'  => 'scripts',
						'settings' => 'responsive_theme_options[responsive_inline_js_footer]',
						'type'     => 'textarea',
					)
				);

		}


	}

endif;

return new Responsive_Theme_Options_Customizer();
