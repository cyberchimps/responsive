<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_social_Customizer' ) ) :
	/**
	 * Header Footer Builder Customizer Options */
	class Responsive_Footer_social_Customizer {

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
				'responsive_customizer_footer_social',
				array(
					'title'    => esc_html__( 'Footer Social', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 50,
				)
			);

			// Content Align.
			$footer_social_align_desktop_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_social_align_desktop         = __( 'Content Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_align_desktop', $footer_social_align_desktop, 'responsive_customizer_footer_social', 20, $footer_social_align_desktop_choices, 'left', null );

			$footer_social_align_tablet_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_social_align_tablet         = __( 'Content Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_align_tablet', $footer_social_align_tablet, 'responsive_customizer_footer_social', 25, $footer_social_align_tablet_choices, 'left', null );

			$footer_social_align_mobile_choices = array(
				'left'   => __( 'Left', 'responsive' ),
				'center' => __( 'Center', 'responsive' ),
				'right'  => __( 'Right', 'responsive' ),
			);
			$footer_social_align_mobile         = __( 'Content Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_align_mobile', $footer_social_align_mobile, 'responsive_customizer_footer_social', 25, $footer_social_align_mobile_choices, 'left', null );

			// Content Vertical Align.
			$footer_social_vertical_align_desktop_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_social_vertical_align_desktop         = __( 'Content Vertical Align Desktop', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_vertical_align_desktop', $footer_social_vertical_align_desktop, 'responsive_customizer_footer_social', 30, $footer_social_vertical_align_desktop_choices, 'midle', null );

			$footer_social_vertical_align_tablet_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_social_vertical_align_tablet         = __( 'Content Vertical Align Tablet', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_vertical_align_tablet', $footer_social_vertical_align_tablet, 'responsive_customizer_footer_social', 35, $footer_social_vertical_align_tablet_choices, 'middle', null );

			$footer_social_vertical_align_mobile_choices = array(
				'top'    => __( 'Top', 'responsive' ),
				'middle' => __( 'Middle', 'responsive' ),
				'bottom' => __( 'Bottom', 'responsive' ),
			);
			$footer_social_vertical_align_mobile         = __( 'Content Vertical Align Mobile', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_vertical_align_mobile', $footer_social_vertical_align_mobile, 'responsive_customizer_footer_social', 45, $footer_social_vertical_align_mobile_choices, 'middle', null );

			/**
			 * Social Links Separator.
			 */
			$social_links_separator_label = esc_html__( 'Social Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_social_links_separator', $social_links_separator_label, 'responsive_customizer_footer_social', 50 );

			// Social Link New Tab.
			$social_link_new_label = esc_html__( 'Open Social Icons in a new tab', 'responsive' );
			$social_link_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_social_link_new_tab', $social_link_new_label, 'responsive_customizer_footer_social', 55, $social_link_choices, '_self', null );

			// Add Twitter Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[twitter_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_twitter',
					array(
						'label'    => __( 'Twitter', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[twitter_footer_uid]',
						'priority' => 56,
					)
				)
			);

			// Add Facebook Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[facebook_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_facebook',
					array(
						'label'    => __( 'Facebook', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[facebook_footer_uid]',
						'priority' => 57,
					)
				)
			);

			// Add LinkedIn Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[linkedin_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_linkedin',
					array(
						'label'    => __( 'LinkedIn', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[linkedin_footer_uid]',
						'priority' => 58,
					)
				)
			);

			// Add Youtube Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[youtube_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_youtube',
					array(
						'label'    => __( 'YouTube', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[youtube_footer_uid]',
						'priority' => 59,
					)
				)
			);

			// Add RSS Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[rss_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_rss',
					array(
						'label'    => __( 'RSS Feed', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[rss_footer_uid]',
						'priority' => 60,
					)
				)
			);

			// Add Instagram Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[instagram_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_instagram',
					array(
						'label'    => __( 'Instagram', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[instagram_footer_uid]',
						'priority' => 61,
					)
				)
			);

			// Add Pinterest Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[pinterest_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_pinterest',
					array(
						'label'    => __( 'Pinterest', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[pinterest_footer_uid]',
						'priority' => 62,
					)
				)
			);

			// Add StumbleUpon Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[stumbleupon_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_stumble',
					array(
						'label'    => __( 'StumbleUpon', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[stumbleupon_footer_uid]',
						'priority' => 63,
					)
				)
			);

			// Add Vimeo Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[vimeo_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_vimeo',
					array(
						'label'    => __( 'Vimeo', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[vimeo_footer_uid]',
						'priority' => 64,
					)
				)
			);

			// Add SoundCloud Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[yelp_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_yelp',
					array(
						'label'    => __( 'Yelp', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[yelp_footer_uid]',
						'priority' => 65,
					)
				)
			);

			// Add Foursquare Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[foursquare_footer_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_footer_foursquare',
					array(
						'label'    => __( 'Foursquare', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[foursquare_footer_uid]',
						'priority' => 66,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[email_footer_uid]',
				array(
					'sanitize_callback' => 'sanitize_email',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'email_footer_uid',
					array(
						'label'    => __( 'Email Address', 'responsive' ),
						'section'  => 'responsive_customizer_footer_social',
						'settings' => 'responsive_theme_options[email_footer_uid]',
						'priority' => 67,
					)
				)
			);

			$footer_icon_size_label = esc_html__( 'Icon Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_icon_size', $footer_icon_size_label, 'responsive_customizer_footer_social', 90, 18, null, 100 );

			//Social Icon Colors.
			$footer_social_icon_color_label = __( 'Icon Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_social_icon', $footer_social_icon_color_label, 'responsive_customizer_footer_social', 95, '#fff', null );

			$footer_social_icon_hover_color_label = __( 'Icon Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_social_icon_hover', $footer_social_icon_hover_color_label, 'responsive_customizer_footer_social', 100, '#fff', null );

			$footer_social_icon_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_social_icon_background', $footer_social_icon_background_color_label, 'responsive_customizer_footer_social', 105, '', null );

			$footer_social_icon_background_hover_color_label = __( 'Background Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_social_icon_background_hover', $footer_social_icon_background_hover_color_label, 'responsive_customizer_footer_social', 110, '', null );

			$footer_social_icon_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_social_icon_border', $footer_social_icon_border_color_label, 'responsive_customizer_footer_social', 115, '#fff', null );

			$footer_social_icon_border_hover_color_label = __( 'Border Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_social_icon_border_hover', $footer_social_icon_border_hover_color_label, 'responsive_customizer_footer_social', 120, '#fff', null );

			$footer_social_border_style_choices = array(
				'none'   => __( 'None', 'responsive' ),
				'solid'  => __( 'Solid', 'responsive' ),
				'dashed' => __( 'Dashed', 'responsive' ),
				'dotted' => __( 'Dotted', 'responsive' ),
			);
			$footer_social_border_style_label = __( 'Border Style', 'responsive' );
			responsive_select_control( $wp_customize, 'footer_social_border_style', $footer_social_border_style_label, 'responsive_customizer_footer_social', 125, $footer_social_border_style_choices, 'solid', null );

			$footer_social_border_size_label = esc_html__( 'Border Width', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_social_border_size', $footer_social_border_size_label, 'responsive_customizer_footer_social', 125, 1, null, 20, 1, 'postMessage' );

			$footer_social_border_radius_label = esc_html__( 'Border Radius', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_social_border_radius', $footer_social_border_radius_label, 'responsive_customizer_footer_social', 125, 0, null, 120, 1, 'postMessage' );


		}

	}

endif;

return new Responsive_Footer_social_Customizer();
