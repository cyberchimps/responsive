<?php
/**
 * Header Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Content_Header_Layout_Customizer' ) ) :
	/**
	 * Header Customizer Options */
	class Responsive_Content_Header_Layout_Customizer {

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
				'responsive_content_header_layout',
				array(
					'title'    => esc_html__( 'Content Header', 'responsive' ),
					'panel'    => 'responsive_header',
					'priority' => 15,

				)
			);
			
			$wp_customize->add_setting(
				'responsive_theme_options[breadcrumb]',
				array(
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'type'              => 'option',
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'res_breadcrumb' ),
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'res_breadcrumb',
					array(
						'label'    => __( 'Enable Breadcrumbs', 'responsive' ),
						'section'  => 'responsive_breadcrumb',
						'settings' => 'responsive_theme_options[breadcrumb]',
						'priority' => 10,
					)
				)
			);

			responsive_horizontal_separator_control( $wp_customize, 'breadcrumb_enable_separator', 2, 'responsive_breadcrumb',15, 1, 'responsive_active_breadcrumb' );

			// Breadcrumb Position.
			$breadcrumb_position_label   = esc_html__( 'Breadcrumb Position', 'responsive' );
			$breadcrumb_position_choices = array(
				'before' => esc_html__( 'Before Heading', 'responsive' ),
				'after'  => esc_html__( 'After Heading', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'breadcrumb_position', $breadcrumb_position_label, 'responsive_breadcrumb', 20, $breadcrumb_position_choices, 'before', 'responsive_active_breadcrumb' );

			responsive_horizontal_separator_control( $wp_customize, 'breadcrumb_position_separator', 1, 'responsive_breadcrumb',20, 1, 'responsive_active_breadcrumb' );

			// Breadcrumb separator.
			$breadcrumb_separator_label   = esc_html__( 'Breadcrumb Separator', 'responsive' );
			$breadcrumb_separator_choices = array(
				'rsaquo' => esc_html__( '›', 'responsive' ),
				'raquo' => esc_html__( '»', 'responsive' ),
				'sol' => esc_html__( '/', 'responsive' ),
				'unicode' => esc_html('[/]','responsive'),
			);
			responsive_select_button_control( $wp_customize, 'breadcrumb_separator', $breadcrumb_separator_label, 'responsive_breadcrumb', 25, $breadcrumb_separator_choices, 'rsaquo', 'responsive_active_breadcrumb', 'refresh' );

			responsive_horizontal_separator_control( $wp_customize, 'breadcrumb_separator_separator', 1, 'responsive_breadcrumb',25, 1, 'responsive_active_breadcrumb' );

			// Content Header Allignment.
			$content_header_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$content_header_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);

			if ( is_rtl() ) {
				$content_header_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'content_header_alignment', $content_header_alignment_label, 'responsive_breadcrumb', 30, $content_header_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb_alignment' ), 'responsive_active_breadcrumb', 'postMessage' );

			responsive_horizontal_separator_control( $wp_customize, 'content_header_alignment_separator', 1, 'responsive_breadcrumb',30, 1, 'responsive_active_breadcrumb' );

			// Breadcrumb Separator Text.
			$wp_customize->add_setting(
				'responsive_breadcrumb_unicode',
				array(
					'default'           => '\\00BB',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				'responsive_breadcrumb_unicode',
				array(
					'label'    => __( 'Custom Icon (Unicode)', 'responsive' ),
					'section'  => 'responsive_breadcrumb',
					'settings' => 'responsive_breadcrumb_unicode',
					'type'     => 'text',
					'priority' => 25,
					'active_callback' => 'responsive_breadcrumb_separator_unicode'
				)
			);

			// Padding (px).
			$content_header_spacing_label = __( 'Spacing (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'content_header', 'responsive_breadcrumb', 35, 30, 30, 'responsive_active_breadcrumb', $content_header_spacing_label );

			$breadcrumb_display_settings_separator_label = esc_html__( 'Display Settings', 'responsive' );
			responsive_separator_control( $wp_customize, 'breadcrumb_display_settings_separator', $breadcrumb_display_settings_separator_label, 'responsive_breadcrumb',40, 'responsive_active_breadcrumb' );

			// Option: Enalbe Breadcrumb on Home Page.
			$breadcrumb_enable_home_page = __( 'Enable on Home Page', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_home_page', $breadcrumb_enable_home_page, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );

			// Option: Enable Breadcrumb on Blog / Posts Page.
			$breadcrumb_enable_blog_posts_page = __( 'Enable on Blog / Posts Page', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_blog_posts_page', $breadcrumb_enable_blog_posts_page, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );

			// Option: Enable Breadcrumb on Search.
			$breadcrumb_enable_search = __( 'Enable on Search', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_search', $breadcrumb_enable_search, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );

			// Option: Enable Breadcrumb on Archive.
			$breadcrumb_enable_archive = __( 'Enable on Archive', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_archive', $breadcrumb_enable_archive, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );

			// Option: Enable Breadcrumb on single page.
			$breadcrumb_enable_single_page = __( 'Enable on Single Page', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_single_page', $breadcrumb_enable_single_page, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );

			// Option: Enable Breadcrumb on single post.
			$breadcrumb_enable_single_post = __( 'Enable on Single Post', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_single_post', $breadcrumb_enable_single_post, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );

			// Option: Enable Breadcrumb on 404 page.
			$breadcrumb_enable_404_page = __( 'Enable on 404 Page', 'responsive' );
			responsive_toggle_control( $wp_customize, 'breadcrumb_enable_404_page', $breadcrumb_enable_404_page, 'responsive_breadcrumb', 45, 0, 'responsive_active_breadcrumb' );
		}
	}

endif;

return new Responsive_Content_Header_Layout_Customizer();
