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
				new Responsive_Customizer_Toggle_Control(
					$wp_customize,
					'res_blog_post_title_toggle',
					array(
						'label'    => __( 'Enable Blog Page Title', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_theme_options[blog_post_title_toggle]',
						'priority' => 25,
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
					'priority' => 30,
					'active_callback' => 'responsive_blog_post_title_toggle',
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'blog_layout_options_separator', 1, 'responsive_blog_layout', 7, 1, );
			
			$blog_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_content_width', $blog_content_width_label, 'responsive_blog_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'blog_content_width' ), null, 100, 1, 'postMessage' );
			
			responsive_horizontal_separator_control($wp_customize, 'blog_content_width_separator', 1, 'responsive_blog_layout', 12, 1, );
			
			$entry_columns_label = esc_html__( 'Entry Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_entry_columns', $entry_columns_label, 'responsive_blog_layout', 15, Responsive\Core\get_responsive_customizer_defaults( 'entry_columns' ), null, 4 );
			
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_columns_separator', 1, 'responsive_blog_layout', 17, 1, );
			responsive_horizontal_separator_control($wp_customize, 'blog_post_title_toggle_separator', 1, 'responsive_blog_layout', 27, 1, 'responsive_blog_post_title_toggle' );
			responsive_horizontal_separator_control($wp_customize, 'blog_post_title_text_separator', 1, 'responsive_blog_layout', 32, 1, );
			
			// Display Masonry.
			$display_masonry_label = esc_html__( 'Enable Masonry Layout', 'responsive' );
			responsive_toggle_control( $wp_customize, 'blog_entry_display_masonry', $display_masonry_label, 'responsive_blog_layout', 50, 0, 'responsive_active_blog_entry_columns_multi_column' );
			
			responsive_horizontal_separator_control($wp_customize, 'exclude_post_cat_separator', 1, 'responsive_blog_layout', 79, 1, );

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

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_elements_positioning_separator', 2, 'responsive_blog_layout', 82, 1, );

			/**
			 * Entry Elements.
			 */
			$blog_entry_featured_image_label = esc_html__( 'Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_featured_image_separator', $blog_entry_featured_image_label, 'responsive_blog_layout', 90 );

			// Featured Image Width.
			$blog_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_featured_image_width', $blog_featured_image_width_label, 'responsive_blog_layout', 95, '', null, 4800 );

			responsive_horizontal_separator_control($wp_customize, 'blog_featured_image_width_separator', 1, 'responsive_blog_layout', 97, 1, );

			// Style.
			$featured_image_style_label   = esc_html__( 'Image Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_entry_featured_image_style', $featured_image_style_label, 'responsive_blog_layout', 100, $featured_image_style_choices, 'default', null, 'postMessage' );
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_featured_image_style_separator', 1, 'responsive_blog_layout', 102, 1, );
			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Image Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_featured_image_alignment', $featured_image_alignment_label, 'responsive_blog_layout', 110, $featured_image_alignment_choices, 'left', null );

			/**
			* Entry Elements.
			*/
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_title_separator', 2, 'responsive_blog_layout', 120, 1, );

			// Alignment.
			$blog_entry_title_alignment_label   = esc_html__( 'Title Alignment', 'responsive' );
			$blog_entry_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);

			if ( is_rtl() ) {
				$blog_entry_title_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_title_alignment', $blog_entry_title_alignment_label, 'responsive_blog_layout', 130, $blog_entry_title_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_title_alignment' ), null );

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_meta_separator', 2, 'responsive_blog_layout', 138, 1, );

			/**
			* Entry meta.
			*/
			$blog_entry_meta_label = esc_html__( 'Meta', 'responsive' );
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

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_meta_separator_text_separator', 1, 'responsive_blog_layout', 158, 1, );

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

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_meta_alignment_separator', 1, 'responsive_blog_layout', 168, 1, );

			// Meta Alignment.
			$blog_entry_meta_alignment_label   = esc_html__( 'Meta Alignment', 'responsive' );
			$blog_entry_meta_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$blog_entry_meta_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_meta_alignment', $blog_entry_meta_alignment_label, 'responsive_blog_layout', 170, $blog_entry_meta_alignment_choices, Responsive\Core\get_responsive_customizer_defaults( 'blog_entry_meta_alignment' ), null );

			/**
			* Content Elements.
			*/
			responsive_horizontal_separator_control($wp_customize, 'blog_entry_content_new_separator', 2, 'responsive_blog_layout', 178, 1, );
			$blog_entry_content_label = esc_html__( 'Content', 'responsive' );
			responsive_separator_control( $wp_customize, 'blog_entry_content_separator', $blog_entry_content_label, 'responsive_blog_layout', 180 );

			// Content Type.
			$blog_entry_content_type_label   = esc_html__( 'Content Type', 'responsive' );
			$blog_entry_content_type_choices = array(
				'content' => esc_html__( 'Content', 'responsive' ),
				'excerpt' => esc_html__( 'Excerpt', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_entry_content_type', $blog_entry_content_type_label, 'responsive_blog_layout', 190, $blog_entry_content_type_choices, 'excerpt', null );

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_content_type_separator', 1, 'responsive_blog_layout', 192, 1, );

			// Content Alignment.
			$blog_entry_content_alignment_label   = esc_html__( 'Content Alignment', 'responsive' );
			$blog_entry_content_alignment_choices = array(
				'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_content_alignment_choices = array(
					'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'blog_entry_content_alignment', $blog_entry_content_alignment_label, 'responsive_blog_layout', 195, $blog_entry_content_alignment_choices, 'left', null );

			responsive_horizontal_separator_control($wp_customize, 'blog_entry_content_alignment_separator', 1, 'responsive_blog_layout', 197, 1, );

			// Excerpt Length.
			$blog_entry_excerpt_length_label = esc_html__( 'Excerpt Length', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'excerpt_length', $blog_entry_excerpt_length_label, 'responsive_blog_layout', 200, 40, 'responsive_active_blog_entry_content_type_excerpt', 500 );

			responsive_horizontal_separator_control($wp_customize, 'excerpt_length_separator', 1, 'responsive_blog_layout', 202, 1, );

			// Read More Text.
			$blog_entry_read_more_text_label = esc_html__( 'Read More Text', 'responsive' );

			responsive_text_control( $wp_customize, 'blog_read_more_text', $blog_entry_read_more_text_label, 'responsive_blog_layout', 210, Responsive\Core\get_responsive_customizer_defaults( 'read_more_text' ), 'responsive_active_blog_entry_content_type_excerpt' );

			responsive_horizontal_separator_control($wp_customize, 'blog_read_more_text_separator', 1, 'responsive_blog_layout', 212, 1, );

			// Read More Type.
			$blog_entry_read_more_type_label   = esc_html__( 'Read More Type', 'responsive' );
			$blog_entry_read_more_type_choices = array(
				'link'   => esc_html__( 'Link', 'responsive' ),
				'button' => esc_html__( 'Button', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'blog_entry_read_more_type', $blog_entry_read_more_type_label, 'responsive_blog_layout', 220, $blog_entry_read_more_type_choices, 'link', 'responsive_active_blog_entry_content_type_excerpt' );

			responsive_horizontal_separator_control($wp_customize, 'blog_container_spacing_separator', 2, 'responsive_blog_layout', 228, 1, );
			responsive_horizontal_separator_control($wp_customize, 'blog_outside_container_separator', 1, 'responsive_blog_layout', 245, 1, );

		}

	}

endif;

return new Responsive_Blog_Layout_Customizer();
