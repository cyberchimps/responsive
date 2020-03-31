<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Blog_Content_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Blog_Content_Customizer {

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
				'responsive_blog_content',
				array(
					'title'    => esc_html__( 'Content', 'responsive' ),
					'panel'    => 'responsive_blog',
					'priority' => 20,
				)
			);

			/**
			 * Entry Elements.
			 */
			$blog_entry_elements_label = esc_html__( 'Entry Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_elements_separator', $blog_entry_elements_label, 'responsive_blog_content', 10 );

			/**
			 * Blog Entries Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_elements_positioning',
				array(
					'default'           => array( 'title', 'meta', 'featured_image', 'content' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_entry_elements_positioning',
					array(
						'label'    => esc_html__( 'Entry Elements', 'responsive' ),
						'section'  => 'responsive_blog_content',
						'settings' => 'responsive_blog_entry_elements_positioning',
						'priority' => 20,
						'choices'  => responsive_blog_entry_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$blog_entry_featured_image_label = esc_html__( 'Entry Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_featured_image_separator', $blog_entry_featured_image_label, 'responsive_blog_content', 30 );

			// Featured Image Width.
			$blog_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_featured_image_width', $blog_featured_image_width_label, 'responsive_blog_content', 35, '', null, 4800 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'blog_entry_featured_image_style', $featured_image_style_label, 'responsive_blog_content', 40, $featured_image_style_choices, 'default', null, 'postMessage' );
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
			responsive_select_control( $wp_customize, 'blog_entry_featured_image_alignment', $featured_image_alignment_label, 'responsive_blog_content', 50, $featured_image_alignment_choices, 'left', null );

			/**
			* Entry Elements.
			*/
			$blog_entry_title_label = esc_html__( 'Entry Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_title_separator', $blog_entry_title_label, 'responsive_blog_content', 60 );

			// Alignment.
			$blog_entry_title_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$blog_entry_title_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$blog_entry_title_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'blog_entry_title_alignment', $blog_entry_title_alignment_label, 'responsive_blog_content', 70, $blog_entry_title_alignment_choices, 'left', null );

			/**
			* Entry meta.
			*/
			$blog_entry_meta_label = esc_html__( 'Entry Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_meta_control_separator', $blog_entry_meta_label, 'responsive_blog_content', 80 );

			/**
			 * Blog Entries Meta Elements.
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_meta',
				array(
					'default'           => apply_filters( 'responsive_blog_meta_default', array( 'author', 'date', 'categories', 'comments' ) ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_blog_entry_meta',
					array(
						'label'    => esc_html__( 'Meta Elements', 'responsive' ),
						'section'  => 'responsive_blog_content',
						'settings' => 'responsive_blog_entry_meta',
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
				'responsive_blog_entry_meta_separator_text',
				array(
					'default'           => '-',
					'sanitize_callback' => 'wp_check_invalid_utf8',
					'type'              => 'theme_mod',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				'responsive_blog_entry_meta_separator_text',
				array(
					'label'    => __( 'Meta Separator', 'responsive' ),
					'section'  => 'responsive_blog_content',
					'settings' => 'responsive_blog_entry_meta_separator_text',
					'type'     => 'text',
					'priority' => 100,
				)
			);

			// Meta Alignment.
			$blog_entry_meta_alignment_label   = esc_html__( 'Meta Alignment', 'responsive' );
			$blog_entry_meta_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$blog_entry_meta_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'blog_entry_meta_alignment', $blog_entry_meta_alignment_label, 'responsive_blog_content', 110, $blog_entry_meta_alignment_choices, 'left', null );

			/**
			* Content Elements.
			*/
			$blog_entry_content_label = esc_html__( 'Entry Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_content_separator', $blog_entry_content_label, 'responsive_blog_content', 120 );

			// Content Type.
			$blog_entry_content_type_label   = esc_html__( 'Content Type', 'responsive' );
			$blog_entry_content_type_choices = array(
				'content' => esc_html__( 'Content', 'responsive' ),
				'excerpt' => esc_html__( 'Excerpt', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'blog_entry_content_type', $blog_entry_content_type_label, 'responsive_blog_content', 130, $blog_entry_content_type_choices, 'excerpt', null );

			// Content Alignment.
			$blog_entry_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$blog_entry_content_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$blog_entry_content_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'blog_entry_content_alignment', $blog_entry_content_alignment_label, 'responsive_blog_content', 140, $blog_entry_content_alignment_choices, 'left', null );

			// Excerpt Length.
			$blog_entry_excerpt_length_label = esc_html__( 'Excerpt Length', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'excerpt_length', $blog_entry_excerpt_length_label, 'responsive_blog_content', 150, 40, 'responsive_active_blog_entry_content_type_excerpt', 500 );

			// Read More Text.
			$blog_entry_read_more_text_label = esc_html__( 'Read More Text', 'responsive' );
			responsive_text_control( $wp_customize, 'blog_read_more_text', $blog_entry_read_more_text_label, 'responsive_blog_content', 160, 'Read more &raquo;', 'responsive_active_blog_entry_content_type_excerpt' );

			// Read More Type.
			$blog_entry_read_more_type_label   = esc_html__( 'Read More Type', 'responsive' );
			$blog_entry_read_more_type_choices = array(
				'link'   => esc_html__( 'Link', 'responsive' ),
				'button' => esc_html__( 'Button', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'blog_entry_read_more_type', $blog_entry_read_more_type_label, 'responsive_blog_content', 170, $blog_entry_read_more_type_choices, 'link', 'responsive_active_blog_entry_content_type_excerpt' );
		}

	}

endif;

return new Responsive_Blog_Content_Customizer();
