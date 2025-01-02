<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Site_Social_Links_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Site_Social_Links_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 5.1
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 5.1
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			/**
			 * Layouts.
			 */
			$wp_customize->add_section(
				'responsive_social_links',
				array(
					'title'    => __( 'Social Links', 'responsive' ),
					'panel'    => 'responsive_site',
					'priority' => 30,
				)
			);
			
			// Social Link New Tab.
			$social_link_new_label = esc_html__( 'Open Social Icons in a new tab', 'responsive' );
			$social_link_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'social_link_new_tab', $social_link_new_label, 'responsive_social_links', 155, $social_link_choices, '_self', null );

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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[twitter_uid]',
						'priority' => 156,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[facebook_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[linkedin_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[youtube_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[rss_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[instagram_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[pinterest_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[stumbleupon_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[vimeo_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[yelp_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[foursquare_uid]',
						'priority' => 157,
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
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[email_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[bandcamp_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'bandcamp_uid',
					array(
						'label'    => __( 'Bandcamp', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[bandcamp_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[behance_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'behance_uid',
					array(
						'label'    => __( 'Behance', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[behance_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[discord_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'discord_uid',
					array(
						'label'    => __( 'Discord', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[discord_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[github_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'github_uid',
					array(
						'label'    => __( 'Github', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[github_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[googlereviews_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'googlereviews_uid',
					array(
						'label'    => __( 'Google Reviews', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[googlereviews_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[medium_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'medium_uid',
					array(
						'label'    => __( 'Medium', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[medium_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[patreon_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'patreon_uid',
					array(
						'label'    => __( 'Patreon', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[patreon_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[phone_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'phone_uid',
					array(
						'label'    => __( 'Phone', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[phone_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[reddit_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'reddit_uid',
					array(
						'label'    => __( 'Reddit', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[reddit_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[soundcloud_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'soundcloud_uid',
					array(
						'label'    => __( 'Soundcloud', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[soundcloud_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[spotify_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'spotify_uid',
					array(
						'label'    => __( 'Spotify', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[spotify_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[telegram_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'telegram_uid',
					array(
						'label'    => __( 'Telegram', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[telegram_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[threads_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'threads_uid',
					array(
						'label'    => __( 'Threads', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[threads_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[tiktok_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'tiktok_uid',
					array(
						'label'    => __( 'Tiktok', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[tiktok_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[vk_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'vk_uid',
					array(
						'label'    => __( 'VK', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[vk_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[whatsapp_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'whatsapp_uid',
					array(
						'label'    => __( 'Whatsapp', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[whatsapp_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[wordpress_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'wordpress_uid',
					array(
						'label'    => __( 'WordPress', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[wordpress_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[custom1_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'custom1_uid',
					array(
						'label'    => __( 'Custom1', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[custom1_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[custom2_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'custom2_uid',
					array(
						'label'    => __( 'Custom2', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[custom2_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[custom3_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'custom3_uid',
					array(
						'label'    => __( 'Custom3', 'responsive' ),
						'section'  => 'responsive_social_links',
						'settings' => 'responsive_theme_options[custom3_uid]',
						'priority' => 157,
					)
				)
			);
		}


	}

endif;

return new Responsive_Site_Social_Links_Customizer();
