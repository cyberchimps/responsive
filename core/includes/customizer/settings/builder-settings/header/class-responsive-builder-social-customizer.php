<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Social_Header_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Social_Header_Customizer {

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
			 * Header Builder options
			 */

			$wp_customize->add_section(
				'responsive_customizer_header_social',
				array(
					'title'    => esc_html__( 'Social', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 120,
				)
			);

			// Social Link New Tab.
			$social_link_new_label = esc_html__( 'Open Social Icons in a new tab', 'responsive' );
			$social_link_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_social_link_new_tab', $social_link_new_label, 'responsive_customizer_header_social', 10, $social_link_choices, '_self', null );

			// Add Twitter Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[twitter_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_twitter',
					array(
						'label'    => __( 'Twitter', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[twitter_header_uid]',
						'priority' => 15,
					)
				)
			);

			// Add Facebook Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[facebook_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_facebook',
					array(
						'label'    => __( 'Facebook', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[facebook_header_uid]',
						'priority' => 20,
					)
				)
			);

			// Add LinkedIn Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[linkedin_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_linkedin',
					array(
						'label'    => __( 'LinkedIn', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[linkedin_header_uid]',
						'priority' => 25,
					)
				)
			);

			// Add Youtube Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[youtube_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_youtube',
					array(
						'label'    => __( 'YouTube', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[youtube_header_uid]',
						'priority' => 30,
					)
				)
			);

			// Add RSS Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[rss_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_rss',
					array(
						'label'    => __( 'RSS Feed', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[rss_header_uid]',
						'priority' => 35,
					)
				)
			);

			// Add Instagram Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[instagram_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_instagram',
					array(
						'label'    => __( 'Instagram', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[instagram_header_uid]',
						'priority' => 40,
					)
				)
			);

			// Add Pinterest Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[pinterest_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_pinterest',
					array(
						'label'    => __( 'Pinterest', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[pinterest_header_uid]',
						'priority' => 45,
					)
				)
			);

			// Add StumbleUpon Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[stumbleupon_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_stumble',
					array(
						'label'    => __( 'StumbleUpon', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[stumbleupon_header_uid]',
						'priority' => 50,
					)
				)
			);

			// Add Vimeo Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[vimeo_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_vimeo',
					array(
						'label'    => __( 'Vimeo', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[vimeo_header_uid]',
						'priority' => 55,
					)
				)
			);

			// Add SoundCloud Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[yelp_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_yelp',
					array(
						'label'    => __( 'Yelp', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[yelp_header_uid]',
						'priority' => 60,
					)
				)
			);

			// Add Foursquare Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[foursquare_header_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_header_foursquare',
					array(
						'label'    => __( 'Foursquare', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[foursquare_header_uid]',
						'priority' => 65,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[email_header_uid]',
				array(
					'sanitize_callback' => 'sanitize_email',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'email_header_uid',
					array(
						'label'    => __( 'Email Address', 'responsive' ),
						'section'  => 'responsive_customizer_header_social',
						'settings' => 'responsive_theme_options[email_header_uid]',
						'priority' => 70,
					)
				)
			);
			
			$header_icon_size_label = esc_html__( 'Icon Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_icon_size', $header_icon_size_label, 'responsive_customizer_header_social', 90, 18, null, 100 );

			//Social Icon Colors.
			$header_social_icon_color_label = __( 'Icon Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon', $header_social_icon_color_label, 'responsive_customizer_header_social', 95, '#0066cc', null );

			$header_social_icon_hover_color_label = __( 'Icon Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_hover', $header_social_icon_hover_color_label, 'responsive_customizer_header_social', 100, '#0066cc', null );

			$header_social_icon_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_background', $header_social_icon_background_color_label, 'responsive_customizer_header_social', 105, '#fff', null );

			$header_social_icon_background_hover_color_label = __( 'Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_background_hover', $header_social_icon_background_hover_color_label, 'responsive_customizer_header_social', 110, '#fff', null );

			$header_social_icon_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_border', $header_social_icon_border_color_label, 'responsive_customizer_header_social', 115, '#fff', null );

			$header_social_icon_border_hover_color_label = __( 'Border Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_border_hover', $header_social_icon_border_hover_color_label, 'responsive_customizer_header_social', 120, '#fff', null );

			$header_social_border_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$header_social_border_style_label = __( 'Border Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_social_border_style', $header_social_border_style_label, 'responsive_customizer_header_social', 125, $header_social_border_style_choices, 'solid', null );

			$header_social_border_size_label = esc_html__( 'Border Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_social_border_size', $header_social_border_size_label, 'responsive_customizer_header_social', 125, 1, null, 20, 1, 'postMessage' );

			$header_social_border_radius_label = esc_html__( 'Border Radius', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_social_border_radius', $header_social_border_radius_label, 'responsive_customizer_header_social', 125, 0, null, 120, 1, 'postMessage' );

		}

	}

endif;

return new Responsive_Social_Header_Customizer();
