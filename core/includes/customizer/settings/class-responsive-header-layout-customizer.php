<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Layout_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Header_Layout_Customizer {

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
				'responsive_header_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 10,

				)
			);

			// Full Width Header.
			$header_full_width_label = __( 'Full Width Header', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'header_full_width', $header_full_width_label, 'responsive_header_layout', 10, 0, 'responsive_active_site_layout_contained', 'postMessage' );

			// Full Width Header.
			$inline_logo_site_title = __( 'Inline logo & Site Title', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'inline_logo_site_title', $inline_logo_site_title, 'responsive_header_layout', 10, 0, 'responsive_active_site_layout_contained', 'postMessage' );

			/**
			 * Header Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_header_elements',
				array(
					'default'           => array( 'site-branding', 'main-navigation' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_header_elements',
					array(
						'label'    => esc_html__( 'Header Elements', 'responsive' ),
						'section'  => 'responsive_header_layout',
						'settings' => 'responsive_header_elements',
						'priority' => 10,
						'choices'  => responsive_header_elements(),
					)
				)
			);

			// Header Layout.
			$header_layout_label   = esc_html__( 'Header Layout', 'responsive' );
			$header_layout_choices = array(
				'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
				'vertical'   => esc_html__( 'Vertical', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_layout', $header_layout_label, 'responsive_header_layout', 20, $header_layout_choices, 'horizontal', null, 'postMessage' );

			// Header Alignment.
			$header_alignment_label   = esc_html__( 'Header Alignment', 'responsive' );
			$header_alignment_choices = array(
				'center' => esc_html__( 'Center', 'responsive' ),
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
			);

			if ( is_rtl() ) {
				$header_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'header_alignment', $header_alignment_label, 'responsive_header_layout', 30, $header_alignment_choices, 'center', 'responsive_active_vertical_header', 'postMessage' );

			// Logo Padding.
			$logo_padding_label = esc_html__( 'Logo Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'header', 'responsive_header_layout', 40, 28, 0, null, $logo_padding_label );

			/**
			 * Transparent Header Separator.
			 */
			$transparent_header_separator_label = esc_html__( 'Transparent Header', 'responsive' );
			responsive_separator_control( $wp_customize, 'transparent_header_separator', $transparent_header_separator_label, 'responsive_header_layout', 50 );

			// Transperant Header.
			$transparent_header_label = __( 'Enable on Complete Website', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'transparent_header', $transparent_header_label, 'responsive_header_layout', 50, 0, null );

			// Site Content Padding.
			$site_content_padding_label = esc_html__( 'Site Content Padding (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'site_content', 'responsive_header_layout', 50, 28, 0, 'responsive_is_transparent_header_enabled', $site_content_padding_label );

			$disable_archive_transparent_header_label = __( 'Disable on 404, Search & Archives?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_archive_transparent_header', $disable_archive_transparent_header_label, 'responsive_header_layout', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_blog_page_transparent_header_label = __( 'Disable on Blog page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_blog_page_transparent_header', $disable_blog_page_transparent_header_label, 'responsive_header_layout', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_latest_posts_page_transparent_header_label = __( 'Disable on Latest Posts Page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_latest_posts_page_transparent_header', $disable_latest_posts_page_transparent_header_label, 'responsive_header_layout', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_pages_transparent_header_label = __( 'Disable on Pages?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_pages_transparent_header', $disable_pages_transparent_header_label, 'responsive_header_layout', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_posts_transparent_header_label = __( 'Disable on Posts?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_posts_transparent_header', $disable_posts_transparent_header_label, 'responsive_header_layout', 50, 0, 'responsive_is_transparent_header_enabled' );

			$disable_woo_products_transparent_header_label = __( 'Disable on WooCommerce Pages?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'disable_woo_products_transparent_header', $disable_woo_products_transparent_header_label, 'responsive_header_layout', 50, 0, 'responsive_is_transparent_header_enabled' );

			/**
			 * Header Widget Separator.
			 */
			$header_widget_separator_label = esc_html__( 'Header Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'header_widget_separator', $header_widget_separator_label, 'responsive_header_layout', 60 );

			// Header Widget.
			$header_widget_label = esc_html__( 'Enable Header Widgets', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'enable_header_widget', $header_widget_label, 'responsive_header_layout', 70, 1, null, 'postMessage' );

			// Header Widget Position.
			$header_widget_position_label   = esc_html__( 'Widgets Position', 'responsive' );
			$header_widget_position_choices = array(
				'top'       => esc_html__( 'Above Header', 'responsive' ),
				'with_logo' => esc_html__( 'In Header', 'responsive' ),
				'bottom'    => esc_html__( 'Below Header', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'header_widget_position', $header_widget_position_label, 'responsive_header_layout', 70, $header_widget_position_choices, 'top', 'responsive_active_header_widget', 'postMessage' );

			// Header Alignment.
			$header_widget_alignment_label   = esc_html__( 'Widgets Alignment', 'responsive' );
			$header_widget_alignment_choices = array(
				'spread'       => esc_html__( 'Spread', 'responsive' ),
				'left'         => esc_html__( 'Left', 'responsive' ),
				'right'        => esc_html__( 'Right', 'responsive' ),
				'center'       => esc_html__( 'center', 'responsive' ),
				'space-around' => esc_html__( 'Space Around', 'responsive' ),
			);	if ( is_rtl() ) {
				$header_widget_alignment_choices = array(
					'spread'       => esc_html__( 'Spread', 'responsive' ),
					'left'         => esc_html__( 'Right', 'responsive' ),
					'right'        => esc_html__( 'Left', 'responsive' ),
					'center'       => esc_html__( 'center', 'responsive' ),
					'space-around' => esc_html__( 'Space Around', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'header_widget_alignment', $header_widget_alignment_label, 'responsive_header_layout', 80, $header_widget_alignment_choices, 'spread', 'responsive_active_header_widget', 'postMessage' );

		}
	}

endif;

return new Responsive_Header_Layout_Customizer();
