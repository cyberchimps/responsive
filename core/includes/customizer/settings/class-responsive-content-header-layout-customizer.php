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
				new Responsive_Customizer_Checkbox_Control(
					$wp_customize,
					'res_breadcrumb',
					array(
						'label'    => __( 'Disable breadcrumb list?', 'responsive' ),
						'section'  => 'responsive_content_header_layout',
						'settings' => 'responsive_theme_options[breadcrumb]',
						'priority' => 10,
					)
				)
			);

			// Breadcrumb Position.
			$breadcrumb_position_label   = esc_html__( 'Breadcrumb Position', 'responsive' );
			$breadcrumb_position_choices = array(
				'before' => esc_html__( 'Before Heading', 'responsive' ),
				'after'  => esc_html__( 'After Heading', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'breadcrumb_position', $breadcrumb_position_label, 'responsive_content_header_layout', 20, $breadcrumb_position_choices, 'before', 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on Home Page.
			$breadcrumb_disable_home_page = __( 'Disable on Home Page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_home_page', $breadcrumb_disable_home_page, 'responsive_content_header_layout', 20, 1, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on Blog / Posts Page.
			$breadcrumb_disable_blog_posts_page = __( 'Disable on Blog / Posts Page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_blog_posts_page', $breadcrumb_disable_blog_posts_page, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on Search.
			$breadcrumb_disable_search = __( 'Disable on Search?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_search', $breadcrumb_disable_search, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on Archive?.
			$breadcrumb_disable_archive = __( 'Disable on Archive?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_archive', $breadcrumb_disable_archive, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on single page.
			$breadcrumb_disable_single_page = __( 'Disable on Single Page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_single_page', $breadcrumb_disable_single_page, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on single post.
			$breadcrumb_disable_single_post = __( 'Disable on Single Post?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_single_post', $breadcrumb_disable_single_post, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on singular.
			$breadcrumb_disable_singular = __( 'Disable on Singular?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_singular', $breadcrumb_disable_singular, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Option: Disable Breadcrumb on 404 page.
			$breadcrumb_disable_404_page = __( 'Disable on 404 Page?', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'breadcrumb_disable_404_page', $breadcrumb_disable_404_page, 'responsive_content_header_layout', 20, 0, 'responsive_active_breadcrumb' );

			// Content Header Allignment.
			$content_header_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$content_header_alignment_choices = array(
				'center' => esc_html__( 'Center', 'responsive' ),
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
			);

			if ( is_rtl() ) {
				$content_header_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'content_header_alignment', $content_header_alignment_label, 'responsive_content_header_layout', 30, $content_header_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'breadcrumb_alignment' ), 'responsive_active_breadcrumb', 'postMessage' );

			// Padding (px).
			$content_header_spacing_label = __( 'Spacing (px)', 'responsive' );
			responsive_padding_control( $wp_customize, 'content_header', 'responsive_content_header_layout', 35, 30, 30, 'responsive_active_breadcrumb', $content_header_spacing_label );

		}
	}

endif;

return new Responsive_Content_Header_Layout_Customizer();
