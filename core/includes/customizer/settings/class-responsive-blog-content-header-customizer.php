<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Blog_Content_Header_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Blog_Content_Header_Customizer {

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
			 * Section
			 */
			$wp_customize->add_section(
				'responsive_blog_content_header',
				array(
					'title'    => esc_html__( 'Content Header', 'responsive' ),
					'panel'    => 'responsive_blog',
					'priority' => 10,
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[blog_post_title_toggle]',
				array(
					'sanitize_callback' => Responsive\Customizer\responsive_sanitize_checkbox(),
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				'res_blog_post_title_toggle',
				array(
					'label'    => __( 'Enable Blog Page Title', 'responsive' ),
					'section'  => 'responsive_blog_content_header',
					'settings' => 'responsive_theme_options[blog_post_title_toggle]',
					'type'     => 'checkbox',
					'priority' => 10,
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[blog_post_title_text]',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'type'              => 'option',
					'default'           => '',
				)
			);
			$wp_customize->add_control(
				'res_blog_post_title_text',
				array(
					'label'    => __( 'Blog Page Title', 'responsive' ),
					'section'  => 'responsive_blog_content_header',
					'settings' => 'responsive_theme_options[blog_post_title_text]',
					'type'     => 'text',
					'priority' => 20,
				)
			);

		}

	}

endif;

return new Responsive_Blog_Content_Header_Customizer();
