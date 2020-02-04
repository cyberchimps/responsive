<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Single_Blog_Entry_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Single_Blog_Entry_Customizer {

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
				'responsive_single_blog_entry',
				array(
					'title'    => esc_html__( 'Blog Entry', 'responsive' ),
					'panel'    => 'responsive_single_blog',
					'priority' => 10,
				)
			);
			/**
			 * Entry Elements.
			 */
			$single_blog_elements_label = esc_html__( 'Entry Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_elements_separator', $single_blog_elements_label, 'responsive_single_blog_entry', 10 );

			/**
			 * Blog Single Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_single_elements_positioning',
				array(
					'default'           => array( 'title', 'meta', 'featured_image', 'content' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Post Elements', 'responsive' ),
						'section'  => 'responsive_single_blog_entry',
						'settings' => 'responsive_blog_single_elements_positioning',
						'priority' => 20,
						'choices'  => responsive_blog_single_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$single_blog_featured_image_label = esc_html__( 'Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_featured_image_separator', $single_blog_featured_image_label, 'responsive_single_blog_entry', 30 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_featured_image_style', $featured_image_style_label, 'responsive_single_blog_entry', 40, $featured_image_style_choices, 'default', null );

			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_featured_image_alignment', $featured_image_alignment_label, 'responsive_single_blog_entry', 50, $featured_image_alignment_choices, 'center', null );

			/**
			* Entry Elements.
			*/
			$single_blog_title_label = esc_html__( 'Entry Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_title_separator', $single_blog_title_label, 'responsive_single_blog_entry', 60 );

			// Alignment.
			$single_blog_title_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$single_blog_title_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_title_alignment', $single_blog_title_alignment_label, 'responsive_single_blog_entry', 70, $single_blog_title_alignment_choices, 'left', null );

			/**
			* Entry meta.
			*/
			$single_blog_meta_label = esc_html__( 'Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_meta_control_separator', $single_blog_meta_label, 'responsive_single_blog_entry', 80 );

			/**
			 * Blog Single Meta
			 */
			$wp_customize->add_setting(
				'responsive_blog_single_meta',
				array(
					'default'           => array( 'author', 'date', 'categories', 'comments' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_single_meta',
					array(
						'label'    => esc_html__( 'Meta Elements', 'responsive' ),
						'section'  => 'responsive_single_blog_entry',
						'settings' => 'responsive_blog_single_meta',
						'priority' => 90,
						'choices'  => apply_filters(
							'responsive_blog_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date', 'responsive' ),
								'categories' => esc_html__( 'Categories', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
							)
						),
					)
				)
			);

			// Meta Separator Text.
			$wp_customize->add_setting(
				'responsive_single_blog_meta_separator_text',
				array(
					'default'           => '-',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'responsive_single_blog_meta_separator_text',
				array(
					'label'    => __( 'Meta Separator', 'responsive' ),
					'section'  => 'responsive_single_blog_entry',
					'settings' => 'responsive_single_blog_meta_separator_text',
					'type'     => 'text',
					'priority' => 100,
				)
			);

			// Meta Alignment.
			$single_blog_meta_alignment_label   = esc_html__( 'Meta Alignment', 'responsive' );
			$single_blog_meta_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_meta_alignment', $single_blog_meta_alignment_label, 'responsive_single_blog_entry', 110, $single_blog_meta_alignment_choices, 'left', null );

			/**
			* Content Elements.
			*/
			$single_blog_content_label = esc_html__( 'Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'single_blog_content_separator', $single_blog_content_label, 'responsive_single_blog_entry', 120 );

			// Content Alignment.
			$single_blog_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$single_blog_content_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'single_blog_content_alignment', $single_blog_content_alignment_label, 'responsive_single_blog_entry', 130, $single_blog_content_alignment_choices, 'left', null );

		}

	}

endif;

return new Responsive_Single_Blog_Entry_Customizer();
