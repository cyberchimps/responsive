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
					'panel'    => 'responsive-footer-options',
					'priority' => 1,

				)
			);

			/**
			 * Footer Widget Separator.
			 */
			$footer_widgets_separator_label = esc_html__( 'Footer Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_widgets_separator', $footer_widgets_separator_label, 'responsive_footer_layout', 2 );

			// Number of Columns.
			$number_of_columns_label = __( 'Number of Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_widgets_columns', $number_of_columns_label, 'responsive_footer_layout', 3, 0, null, 4, 0 );

			// Widgets Padding.
			responsive_padding_control( $wp_customize, 'footer_widgets', 'responsive_footer_layout', 4, 60, 0, null );

			/**
			 * Footer Bar Separator.
			 */
			$footer_bar_separator_label = esc_html__( 'Footer Bar', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_bar_separator', $footer_bar_separator_label, 'responsive_footer_layout', 5 );

			// Footer Bar Layout.
			$footer_bar_layout_label = esc_html__( 'Layout', 'responsive' );
			$footer_layout_choices   = array(
				'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
				'vertical'   => esc_html__( 'Vertical', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_bar_layout', $footer_bar_layout_label, 'responsive_footer_layout', 6, $footer_layout_choices, 'horizontal', null );

			// Bar Padding.
			responsive_padding_control( $wp_customize, 'footer_bar', 'responsive_footer_layout', 8, 60, 0, null );

			/**
			 * Social Links Separator.
			 */
			$social_links_separator_label = esc_html__( 'Social Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'social_links_separator', $social_links_separator_label, 'responsive_footer_layout', 9 );

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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[email_uid]',
					)
				)
			);

		}
	}

endif;

return new Responsive_Footer_Layout_Customizer();
