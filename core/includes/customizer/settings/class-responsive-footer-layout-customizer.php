<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Layout_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Layout_Customizer {

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
			$wp_customize->add_section(
				'responsive_footer_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 10,

				)
			);

			// Full Width Footer.
			$footer_full_width_label = __( 'Full Width Footer', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'footer_full_width', $footer_full_width_label, 'responsive_footer_layout', 10, 0, 'responsive_active_site_layout_contained', 'postMessage' );

			/**
			 * Footer Widget Separator.
			 */
			$footer_widgets_separator_label = esc_html__( 'Footer Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_widgets_separator', $footer_widgets_separator_label, 'responsive_footer_layout', 15 );

			// Number of Columns.
			$number_of_columns_label = __( 'Number of Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_widgets_columns', $number_of_columns_label, 'responsive_footer_layout', 20, 0, null, 4, 0, 'postMessage' );

			// Widgets Padding.
			responsive_padding_control( $wp_customize, 'footer_widgets', 'responsive_footer_layout', 30, 20, 0, null );

			/**
			 * Footer Bar Separator.
			 */
			$footer_bar_separator_label = esc_html__( 'Footer Bar', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_bar_separator', $footer_bar_separator_label, 'responsive_footer_layout', 100 );

			/*
			------------------------------------------------------------------
			// Copyright Text
			-------------------------------------------------------------------
			*/

			$wp_customize->add_setting(
				'responsive_theme_options[copyright_textbox]',
				array(
					'default'           => get_bloginfo( 'name' ),
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'type'              => 'option',
				)
			);

			$wp_customize->add_control(
				'res_copyright_textbox',
				array(
					'label'    => __( 'Copyright text', 'responsive' ),
					'section'  => 'responsive_footer_layout',
					'settings' => 'responsive_theme_options[copyright_textbox]',
					'type'     => 'text',
					'priority' => 110,
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[poweredby_link]',
				array(
					'default'           => false,
					'sanitize_callback' => 'responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_poweredby_link',
				array(
					'label'    => __( 'Hide Powered By Responsive Theme', 'responsive' ),
					'section'  => 'responsive_footer_layout',
					'settings' => 'responsive_theme_options[poweredby_link]',
					'type'     => 'checkbox',
					'priority' => 120,
				)
			);

			// Footer Bar Layout.
			$footer_bar_layout_label = esc_html__( 'Layout', 'responsive' );
			$footer_layout_choices   = array(
				'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
				'vertical'   => esc_html__( 'Vertical', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_bar_layout', $footer_bar_layout_label, 'responsive_footer_layout', 110, $footer_layout_choices, 'horizontal', null, 'postMessage' );



			// Bar Padding.
			responsive_padding_control( $wp_customize, 'footer_bar', 'responsive_footer_layout', 120, 20, 0, null );

			/**
			 * Social Links Separator.
			 */
			$social_links_separator_label = esc_html__( 'Social Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'social_links_separator', $social_links_separator_label, 'responsive_footer_layout', 140 );

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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[twitter_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[facebook_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[linkedin_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[youtube_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[rss_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[instagram_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[pinterest_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[stumbleupon_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[vimeo_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[yelp_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[foursquare_uid]',
						'priority' => 151,
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[email_uid]',
						'priority' => 151,
					)
				)
			);

		}
	}

endif;

return new Responsive_Footer_Layout_Customizer();
