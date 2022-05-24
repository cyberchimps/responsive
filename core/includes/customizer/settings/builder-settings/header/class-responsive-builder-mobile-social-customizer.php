<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Mobile_Social_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Mobile_Social_Customizer {

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
				'responsive_customizer_mobile_social',
				array(
					'title'    => esc_html__( 'Mobile Social', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 130,
				)
			);

			// Social Link New Tab.
			$social_link_new_label = esc_html__( 'Open Social Icons in a new tab', 'responsive' );
			$social_link_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'mobile_social_link_new_tab', $social_link_new_label, 'responsive_customizer_mobile_social', 10, $social_link_choices, '_self', null );

			$header_mobile_social_label_visibility_label = __( 'Show Icon label', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_mobile_social_label_visibility', $header_mobile_social_label_visibility_label, 'responsive_customizer_mobile_social', 10, 0, null );

			// Add Twitter Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[twitter_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_twitter',
					array(
						'label'    => __( 'Twitter', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[twitter_mobile_uid]',
						'priority' => 15,
					)
				)
			);

			// Add Facebook Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[facebook_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_facebook',
					array(
						'label'    => __( 'Facebook', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[facebook_mobile_uid]',
						'priority' => 20,
					)
				)
			);

			// Add LinkedIn Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[linkedin_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_linkedin',
					array(
						'label'    => __( 'LinkedIn', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[linkedin_mobile_uid]',
						'priority' => 25,
					)
				)
			);

			// Add Youtube Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[youtube_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_youtube',
					array(
						'label'    => __( 'YouTube', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[youtube_mobile_uid]',
						'priority' => 30,
					)
				)
			);

			// Add RSS Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[rss_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_rss',
					array(
						'label'    => __( 'RSS Feed', 'responsive' ),
						'section'  => 'responsive_mobile_layout',
						'settings' => 'responsive_theme_options[rss_header_uid]',
						'priority' => 35,
					)
				)
			);

			// Add Instagram Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[instagram_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_instagram',
					array(
						'label'    => __( 'Instagram', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[instagram_mobile_uid]',
						'priority' => 40,
					)
				)
			);

			// Add Pinterest Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[pinterest_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_pinterest',
					array(
						'label'    => __( 'Pinterest', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[pinterest_mobile_uid]',
						'priority' => 45,
					)
				)
			);

			// Add StumbleUpon Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[stumbleupon_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_stumble',
					array(
						'label'    => __( 'StumbleUpon', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[stumbleupon_mobile_uid]',
						'priority' => 50,
					)
				)
			);

			// Add Vimeo Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[vimeo_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_vimeo',
					array(
						'label'    => __( 'Vimeo', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[vimeo_mobile_uid]',
						'priority' => 55,
					)
				)
			);

			// Add SoundCloud Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[yelp_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_yelp',
					array(
						'label'    => __( 'Yelp', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[yelp_mobile_uid]',
						'priority' => 60,
					)
				)
			);

			// Add Foursquare Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[foursquare_mobile_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_mobile_foursquare',
					array(
						'label'    => __( 'Foursquare', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[foursquare_mobile_uid]',
						'priority' => 65,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[email_mobile_uid]',
				array(
					'sanitize_callback' => 'sanitize_email',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'email_mobile_uid',
					array(
						'label'    => __( 'Email Address', 'responsive' ),
						'section'  => 'responsive_customizer_mobile_social',
						'settings' => 'responsive_theme_options[email_mobile_uid]',
						'priority' => 70,
					)
				)
			);

			$header_icon_size_tablet_label = esc_html__( 'Icon Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_icon_size_tablet', $header_icon_size_tablet_label, 'responsive_customizer_mobile_social', 90, 18, null, 100, 1, 'postMessage' );

			//Social Icon Colors.
			$header_social_icon_color_tablet_label = __( 'Icon Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_tablet', $header_social_icon_color_tablet_label, 'responsive_customizer_mobile_social', 95, '#333', null );

			$header_social_icon_hover_color_tablet_label = __( 'Icon Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_hover_tablet', $header_social_icon_hover_color_tablet_label, 'responsive_customizer_mobile_social', 100, '#333', null );

			$header_social_icon_background_color_tablet_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_background_tablet', $header_social_icon_background_color_tablet_label, 'responsive_customizer_mobile_social', 105, '#fff', null );

			$header_social_icon_background_hover_color_tablet_label = __( 'Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_background_hover_tablet', $header_social_icon_background_hover_color_tablet_label, 'responsive_customizer_mobile_social', 110, '#fff', null );

			$header_social_icon_border_color_tablet_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_border_tablet', $header_social_icon_border_color_tablet_label, 'responsive_customizer_mobile_social', 115, '#fff', null );

			$header_social_icon_border_hover_color_tablet_label = __( 'Border Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_social_icon_border_hover_tablet', $header_social_icon_border_hover_color_tablet_label, 'responsive_customizer_mobile_social', 120, '#fff', null );

			$header_social_border_style_tablet_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$header_social_border_style_tablet_label = __( 'Border Style', 'responsive' );
			responsive_select_control( $wp_customize, 'header_social_border_style_tablet', $header_social_border_style_tablet_label, 'responsive_customizer_mobile_social', 125, $header_social_border_style_tablet_choices, 'solid', null );

			$header_social_border_size_tablet_label = esc_html__( 'Border Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_social_border_size_tablet', $header_social_border_size_tablet_label, 'responsive_customizer_mobile_social', 125, 1, null, 20, 1, 'postMessage' );

			$header_social_border_radius_tablet_label = esc_html__( 'Border Radius', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_social_border_radius_tablet', $header_social_border_radius_tablet_label, 'responsive_customizer_mobile_social', 125, 0, null, 120, 1, 'postMessage' );

			$header_mobile_social_item_spacing_label = esc_html__( 'Item Spacing', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'header_mobile_social_item_spacing', $header_mobile_social_item_spacing_label, 'responsive_customizer_mobile_social', 130, 6, null, 120, 1, 'postMessage' );

		}

	}

endif;

return new Responsive_Mobile_Social_Customizer();