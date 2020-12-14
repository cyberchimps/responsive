<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Page_Content_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Page_Content_Customizer {

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
				'responsive_page_content',
				array(
					'title'    => esc_html__( 'Content', 'responsive' ),
					'panel'    => 'responsive_page',
					'priority' => 20,
				)
			);
			// Main Content Width.
			$page_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_content_width', $page_content_width_label, 'responsive_page_content', 10, Responsive\Core\get_responsive_customizer_defaults( 'page_content_width' ), null, 100, 1, 'postMessage' );

			/**
			 * Entry Elements.
			 */
			$page_elements_label = esc_html__( 'Page Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_elements_separator', $page_elements_label, 'responsive_page_content', 12 );
			/**
			 * Page Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_page_single_elements_positioning',
				array(
					'default'           => array( 'title', 'featured_image', 'content' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_page_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Post Elements', 'responsive' ),
						'section'  => 'responsive_page_content',
						'settings' => 'responsive_page_single_elements_positioning',
						'priority' => 20,
						'choices'  => responsive_page_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$page_featured_image_label = esc_html__( 'Page Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_featured_image_separator', $page_featured_image_label, 'responsive_page_content', 30 );

			// Featured Image Width.
			$page_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_featured_image_width', $page_featured_image_width_label, 'responsive_page_content', 35, '', null, 4800 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'page_featured_image_style', $featured_image_style_label, 'responsive_page_content', 40, $featured_image_style_choices, 'default', null, 'postMessage' );

			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'page_featured_image_alignment', $featured_image_alignment_label, 'responsive_page_content', 50, $featured_image_alignment_choices, 'left', null );

			/**
			* Entry Elements.
			*/
			$page_title_label = esc_html__( 'Page Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_title_separator', $page_title_label, 'responsive_page_content', 60 );

			// Alignment.
			$page_title_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$page_title_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$page_title_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'page_title_alignment', $page_title_alignment_label, 'responsive_page_content', 70, $page_title_alignment_choices, 'left', null );

			/**
			* Content Elements.
			*/
			$page_content_label = esc_html__( 'Page Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_content_separator', $page_content_label, 'responsive_page_content', 80 );

			// Content Alignment.
			$page_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$page_content_alignment_choices = array(
				'justify' => esc_html__( 'Justify', 'responsive' ),
				'left'    => esc_html__( 'Left', 'responsive' ),
				'right'   => esc_html__( 'Right', 'responsive' ),
				'center'  => esc_html__( 'Center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_content_alignment_choices = array(
					'justify' => esc_html__( 'Justify', 'responsive' ),
					'left'    => esc_html__( 'Right', 'responsive' ),
					'right'   => esc_html__( 'Left', 'responsive' ),
					'center'  => esc_html__( 'Center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'page_content_alignment', $page_content_alignment_label, 'responsive_page_content', 90, $page_content_alignment_choices, 'left', null );

		}

	}

endif;

return new Responsive_Page_Content_Customizer();
