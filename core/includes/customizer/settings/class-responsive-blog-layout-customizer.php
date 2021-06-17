<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Blog_Layout_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Blog_Layout_Customizer {

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
				'responsive_blog_layout',
				array(
					'title'    => esc_html__( 'Blog / Archive', 'responsive' ),
					'panel'    => 'responsive_blog',
					'priority' => 10,
				)
			);

			$wp_customize->add_setting(
				'responsive_theme_options[blog_post_title_toggle]',
				array(
					'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Checkbox_Control(
					$wp_customize,
					'res_blog_post_title_toggle',
					array(
						'label'    => __( 'Enable Blog Page Title', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_theme_options[blog_post_title_toggle]',
						'priority' => 10,
					)
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
					'section'  => 'responsive_blog_layout',
					'settings' => 'responsive_theme_options[blog_post_title_text]',
					'type'     => 'text',
					'priority' => 20,
				)
			);

			$blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_content_width', $blog_content_width_label, 'responsive_blog_layout', 30, Responsive\Core\get_responsive_customizer_defaults( 'blog_content_width' ), null, 100, 1, 'postMessage' );

			$entry_columns_label = esc_html__( 'Entry Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_entry_columns', $entry_columns_label, 'responsive_blog_layout', 40, Responsive\Core\get_responsive_customizer_defaults( 'entry_columns' ), null, 4 );

			// Display Masonry.
			$display_masonry_label = esc_html__( 'Enable Masonry Layout', 'responsive' );
			responsive_checkbox_control( $wp_customize, 'blog_entry_display_masonry', $display_masonry_label, 'responsive_blog_layout', 50, 0, 'responsive_active_blog_entry_columns_multi_column' );

			/**
			 * Entry Elements.
			 */
			$blog_entry_elements_label = esc_html__( 'Entry Elements', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_elements_separator', $blog_entry_elements_label, 'responsive_blog_layout', 70 );

			/**
			 * Blog Entries Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_elements_positioning',
				array(
					'default'           => Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_elements_positioning' ),
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
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_blog_entry_elements_positioning',
						'priority' => 80,
						'choices'  => responsive_blog_entry_elements(),
					)
				)
			);

			/**
			 * Entry Elements.
			 */
			$blog_entry_featured_image_label = esc_html__( 'Entry Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_featured_image_separator', $blog_entry_featured_image_label, 'responsive_blog_layout', 90 );

			// Featured Image Width.
			$blog_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_featured_image_width', $blog_featured_image_width_label, 'responsive_blog_layout', 95, '', null, 4800 );

			// Style.
			$featured_image_style_label   = esc_html__( 'Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'blog_entry_featured_image_style', $featured_image_style_label, 'responsive_blog_layout', 100, $featured_image_style_choices, 'default', null, 'postMessage' );
			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'Left', 'responsive' ),
				'right'  => esc_html__( 'Right', 'responsive' ),
				'center' => esc_html__( 'Center', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'   => esc_html__( 'Right', 'responsive' ),
					'right'  => esc_html__( 'Left', 'responsive' ),
					'center' => esc_html__( 'Center', 'responsive' ),
				);
			}
			responsive_select_control( $wp_customize, 'blog_entry_featured_image_alignment', $featured_image_alignment_label, 'responsive_blog_layout', 110, $featured_image_alignment_choices, 'left', null );

			/**
			* Entry Elements.
			*/
			$blog_entry_title_label = esc_html__( 'Entry Title', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_title_separator', $blog_entry_title_label, 'responsive_blog_layout', 120 );

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
			responsive_select_control( $wp_customize, 'blog_entry_title_alignment', $blog_entry_title_alignment_label, 'responsive_blog_layout', 130, $blog_entry_title_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_title_alignment' ), null );

			/**
			* Entry meta.
			*/
			$blog_entry_meta_label = esc_html__( 'Entry Meta', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_meta_control_separator', $blog_entry_meta_label, 'responsive_blog_layout', 140 );

			/**
			 * Blog Entries Meta Elements.
			 */
			$wp_customize->add_setting(
				'responsive_blog_entry_meta',
				array(
					'default'           => apply_filters( 'responsive_blog_meta_default', array( 'author', 'date', 'categories', 'comments', 'tag' ) ),
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
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_blog_entry_meta',
						'priority' => 150,
						'choices'  => apply_filters(
							'responsive_blog_meta_choices',
							array(
								'author'     => esc_html__( 'Author', 'responsive' ),
								'date'       => esc_html__( 'Date', 'responsive' ),
								'categories' => esc_html__( 'Categories', 'responsive' ),
								'comments'   => esc_html__( 'Comments', 'responsive' ),
								'tag'        => esc_html__( 'Tag', 'responsive' ),
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
					'section'  => 'responsive_blog_layout',
					'settings' => 'responsive_blog_entry_meta_separator_text',
					'type'     => 'text',
					'priority' => 160,
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
			responsive_select_control( $wp_customize, 'blog_entry_meta_alignment', $blog_entry_meta_alignment_label, 'responsive_blog_layout', 170, $blog_entry_meta_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_meta_alignment' ), null );

			/**
			* Content Elements.
			*/
			$blog_entry_content_label = esc_html__( 'Entry Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_content_separator', $blog_entry_content_label, 'responsive_blog_layout', 180 );

			// Content Type.
			$blog_entry_content_type_label   = esc_html__( 'Content Type', 'responsive' );
			$blog_entry_content_type_choices = array(
				'content' => esc_html__( 'Content', 'responsive' ),
				'excerpt' => esc_html__( 'Excerpt', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'blog_entry_content_type', $blog_entry_content_type_label, 'responsive_blog_layout', 190, $blog_entry_content_type_choices, 'excerpt', null );

			// Content Alignment.
			$blog_entry_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$blog_entry_content_alignment_choices = array(
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
			responsive_select_control( $wp_customize, 'blog_entry_content_alignment', $blog_entry_content_alignment_label, 'responsive_blog_layout', 195, $blog_entry_content_alignment_choices, 'left', null );

			// Excerpt Length.
			$blog_entry_excerpt_length_label = esc_html__( 'Excerpt Length', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'excerpt_length', $blog_entry_excerpt_length_label, 'responsive_blog_layout', 200, 40, 'responsive_active_blog_entry_content_type_excerpt', 500 );

			// Read More Text.
			$blog_entry_read_more_text_label = esc_html__( 'Read More Text', 'responsive' );

			responsive_text_control( $wp_customize, 'blog_read_more_text', $blog_entry_read_more_text_label, 'responsive_blog_layout', 210, Responsive\Core\get_responsive_customizer_defaults( 'read_more_text' ), 'responsive_active_blog_entry_content_type_excerpt' );

			// Read More Type.
			$blog_entry_read_more_type_label   = esc_html__( 'Read More Type', 'responsive' );
			$blog_entry_read_more_type_choices = array(
				'link'   => esc_html__( 'Link', 'responsive' ),
				'button' => esc_html__( 'Button', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'blog_entry_read_more_type', $blog_entry_read_more_type_label, 'responsive_blog_layout', 220, $blog_entry_read_more_type_choices, 'link', 'responsive_active_blog_entry_content_type_excerpt' );

		}

	}

endif;

return new Responsive_Blog_Layout_Customizer();
