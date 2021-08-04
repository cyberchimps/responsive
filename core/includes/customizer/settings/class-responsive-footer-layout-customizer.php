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

			// Hide on Desktop.
			$footer_widget_desktop_visibility = __( 'Hide on Desktop', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'footer_widget_desktop_visibility', $footer_widget_desktop_visibility, 'responsive_footer_layout', 30, 0, null );

			// Hide on Tablet.
			$footer_widget_tablet_visibility = __( 'Hide on Tablet', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'footer_widget_tablet_visibility', $footer_widget_tablet_visibility, 'responsive_footer_layout', 30, 0, null );

			// Hide on Mobile.
			$footer_widget_mobile_visibility = __( 'Hide on Mobile', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'footer_widget_mobile_visibility', $footer_widget_mobile_visibility, 'responsive_footer_layout', 30, 0, null );

			/**
			 * Footer Widgets Alignment Separator
			 */
			$footer_widgets_columns_check = get_theme_mod( 'responsive_footer_widgets_columns' );
			if ( $footer_widgets_columns_check && '0' !== $footer_widgets_columns_check ) {
				$footer_widgets_alignment_separator_label = esc_html__( 'Footer Widgets Alignment', 'responsive' );
				responsive_separator_control( $wp_customize, 'footer_widgets_alignment_separator', $footer_widgets_alignment_separator_label, 'responsive_footer_layout', 40 );
			}

			// Footer Widget Alignment.
			$footer_widgets_columns = get_theme_mod( 'responsive_footer_widgets_columns' );
			for ( $i = 1; $i <= $footer_widgets_columns; $i++ ) {
				$_section                = 'responsive_footer_layout';
				$alignment_desktop_label = sprintf(
					/* translators: %s Column number */
					__( 'Area %s Desktop', 'responsive' ),
					$i
				);
				$alignment_tablet_label = sprintf(
					/* translators: %s Column number */
					__( 'Area %s Tablet', 'responsive' ),
					$i
				);
				$alignment_mobile_label = sprintf(
					/* translators: %s Column number */
					__( 'Area %s Mobile', 'responsive' ),
					$i
				);
				$alignment_choices = array(
					'left'   => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'Center', 'responsive' ),
					'right'  => esc_html__( 'Right', 'responsive' ),
				);
				responsive_select_control( $wp_customize, 'footer_widget_alignment_desktop_' . $i, $alignment_desktop_label, $_section, 40, $alignment_choices, 'left', null, 'postMessage' );
				responsive_select_control( $wp_customize, 'footer_widget_alignment_tablet_' . $i, $alignment_tablet_label, $_section, 40, $alignment_choices, 'center', null, 'postMessage' );
				responsive_select_control( $wp_customize, 'footer_widget_alignment_mobile_' . $i, $alignment_mobile_label, $_section, 40, $alignment_choices, 'center', null, 'postMessage' );
			}

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
					'sanitize_callback' => 'wp_kses_post',
					'type'              => 'option',
				)
			);

			$wp_customize->add_control(
				'res_copyright_textbox',
				array(
					'label'    => __( 'Copyright HTML', 'responsive' ),
					'section'  => 'responsive_footer_layout',
					'settings' => 'responsive_theme_options[copyright_textbox]',
					'type'     => 'textarea',
					'priority' => 110,
					'description' => __( 'If this is empty, site title will be visible as copyright text', 'responsive' ),
				)
			);

			// Hide Copyright Icon & Year.
			$copyright_icon_and_year_label = __( 'Hide Copyright Icon & Year', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'copyright_icon_and_year', $copyright_icon_and_year_label, 'responsive_footer_layout', 115, 0, null, 'postMessage' );

			// Open copyright in new tab.
			$copyright_new_tab = esc_html__( 'Open Powered By link in new tab', 'responsive' );
			$copyright_new_tab_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'copyright_new_tab', $copyright_new_tab, 'responsive_footer_layout', 117, $copyright_new_tab_choices, '_self', null );

			// Hide Copyright.
			$copyright_visibility_label = __( 'Hide Copyright on Desktop', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'copyright', $copyright_visibility_label, 'responsive_footer_layout', 118, 0, null );

			// Hide on Tablet.
			$copyright_visibility_tablet_label = __( 'Hide Copyright on Tablet', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'copyright_tablet', $copyright_visibility_tablet_label, 'responsive_footer_layout', 119, 0, null );

			// Hide on Mobile.
			$copyright_visibility_mobile_label = __( 'Hide Copyright on Mobile', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'copyright_mobile', $copyright_visibility_mobile_label, 'responsive_footer_layout', 120, 0, null );

			// Footer Bar Layout.
			$footer_bar_layout_label = esc_html__( 'Layout', 'responsive' );
			$footer_layout_choices   = array(
				'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
				'vertical'   => esc_html__( 'Vertical', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_bar_layout', $footer_bar_layout_label, 'responsive_footer_layout', 130, $footer_layout_choices, 'horizontal', null, 'postMessage' );

			// Bar Padding.
			responsive_padding_control( $wp_customize, 'footer_bar', 'responsive_footer_layout', 140, 20, 0, null );

			// Bottom Border.

			$footer_border_label = __( 'Border Size', 'responsive' );

			responsive_number_control( $wp_customize, 'footer_border_size', $footer_border_label, 'responsive_footer_layout', 145, 1 );



			/**
			 * Social Links Separator.
			 */
			$social_links_separator_label = esc_html__( 'Social Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'social_links_separator', $social_links_separator_label, 'responsive_footer_layout', 150 );

			// Social Link New Tab.
			$social_link_new_label = esc_html__( 'Open Social Icons in a new tab', 'responsive' );
			$social_link_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'social_link_new_tab', $social_link_new_label, 'responsive_footer_layout', 155, $social_link_choices, '_self', null );


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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
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
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[email_uid]',
						'priority' => 157,
					)
				)
			);

		}
	}

endif;

return new Responsive_Footer_Layout_Customizer();
