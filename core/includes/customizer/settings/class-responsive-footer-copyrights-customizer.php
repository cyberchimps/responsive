<?php
/**
 *
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Copyrights_Customizer' ) ) :
	/** Footer Customizer Options */
	class Responsive_Footer_Copyrights_Customizer {

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
			------------------------------------------------------------------
				// Copyright Text
			-------------------------------------------------------------------
			*/

			$wp_customize->add_section(
				'footer_section',
				array(
					'title'    => __( 'Footer Settings', 'responsive' ),
					'panel'    => 'responsive-footer-options',
					'priority' => 30,
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[copyright_textbox]',
				array(
					'default'           => __( 'Default copyright text', 'responsive' ),
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'type'              => 'option',
				)
			);

			$wp_customize->add_control(
				'res_copyright_textbox',
				array(
					'label'    => __( 'Copyright text', 'responsive' ),
					'section'  => 'footer_section',
					'settings' => 'responsive_theme_options[copyright_textbox]',
					'type'     => 'text',
					'priority' => 1,
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[poweredby_link]',
				array(
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_poweredby_link',
				array(
					'label'    => __( 'Display Powered By WordPress Link', 'responsive' ),
					'section'  => 'footer_section',
					'settings' => 'responsive_theme_options[poweredby_link]',
					'type'     => 'checkbox',
					'priority' => 2,
				)
			);
			$wp_customize->add_setting(
				'copyright_layout_options',
				array(
					'default'           => 'default',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'copyright_layout_options',
				array(
					'label'    => __( 'Copyright Layout', 'responsive' ),
					'section'  => 'footer_section',
					'settings' => 'copyright_layout_options',
					'type'     => 'select',
					'choices'  => apply_filters(
						'responsive_header_layout_choices',
						array(
							'default'            => esc_html__( 'Default', 'responsive' ),
							'footer-credits-left'   => esc_html__( 'Credits Left', 'responsive' ),
							'footer-credits-center' => esc_html__( 'Credits Center', 'responsive' ),
							'footer-credits-right'  => esc_html__( 'Credits Right', 'responsive' ),
						)
					),
				)
			);

			/*
			--------------------------------------------------------------
				// SOCIAL MEDIA SECTION
			--------------------------------------------------------------
			*/

            $wp_customize->add_section(
                'responsive_social_media',
                array(
                    'title'       => __( 'Social Icons', 'responsive' ),
                    'panel'       => 'responsive-footer-options',
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
		}
	}

endif;

return new Responsive_Footer_Copyrights_Customizer();
