<?php
/**
 * Blog Customizer Options
 *
 * @package Responsive Addons Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Addons_Blog_Customizer' ) ) :
	/**
	 * Blog Customizer Options
	 */
	class Responsive_Addons_Blog_Customizer {

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );
		}

		/**
		 * Customizer options
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			/* Setting to change layout of the blog */

			$blog_layout_choices = array(
				'blog-layout-1' => esc_html__( 'Standard', 'responsive' ),
				'blog-layout-2' => esc_html__( 'Image Right', 'responsive' ),
				'blog-layout-3' => esc_html__( 'Image Left', 'responsive' ),
			);

			$wp_customize->add_setting(
				'responsive_blog_layout_options',
				array(
					'default'           => 'blog-layout-1',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Imageradio_Button_Control(
					$wp_customize,
					'responsive_blog_layout_options',
					array(
						'label'    => esc_html__( 'Image Position', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_blog_layout_options',
						'priority' => 50,
						'choices'  => $blog_layout_choices,
						'active_callback' => 'responsive_active_blog_layout_list',
						'image_ext' => 'svg',
					)
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'blog_image_positions_layout_separator', 1, 'responsive_blog_layout', 47, 1, 'responsive_active_blog_layout_list' );

			/* End of blog layout setting */
			/* Border radius setting */
			$wp_customize->add_setting(
				'blog_border_radius',
				array(
					'default'           => 'default',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$blog_border_radius_label = esc_html__( 'Border Radius (px)', 'responsive' );
			responsive_radius_control($wp_customize, 'blog_border_radius', 'responsive_blog_layout', 30, 6, 6, null, $blog_border_radius_label, 'postMessage',);
			/* End of Border radius setting */
			responsive_horizontal_separator_control($wp_customize, 'blog_border_radius_separator', 1, 'responsive_blog_layout', 32, 1, null );

			// Post Title Size.
			$blog_post_title_size_label = esc_html__( 'Post Title Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_post_title_size', $blog_post_title_size_label, 'responsive_blog_layout', 79, 20, null, 100, 8, 'postMessage', 1 );

			// Meta Font Size.
			$blog_meta_font_size_label = esc_html__( 'Meta Font Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_meta_font_size', $blog_meta_font_size_label, 'responsive_blog_layout', 91, 14, null, 60, 8, 'postMessage', 1 );

			// Taxonomy Font Size.
			$blog_taxonomy_font_size_label = esc_html__( 'Taxonomy Font Size', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'blog_taxonomy_font_size', $blog_taxonomy_font_size_label, 'responsive_blog_layout', 93, 14, null, 60, 8, 'postMessage', 1 );

			responsive_horizontal_separator_control($wp_customize, 'blog_taxonomy_font_separator', 1, 'responsive_blog_layout', 94, 1, null );

			$blog_category_color_label = __( 'Item Category Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'blog_category',                                                                      
				$blog_category_color_label,                                                            
				'responsive_blog_layout',                                                              
				94,                                                                                     
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_blog_category_color' ), 
				null,                                                                                   
				'',                                                                                     
				true,                                                                                   
				Responsive\Core\get_responsive_customizer_defaults( 'blog_category_hover' ),            
				'blog_category_hover',
				'refresh',                                                                  
			);

			$item_category_typography_label = esc_html__( 'Item Category Font', 'responsive' );

			responsive_typography_group_control(
				$wp_customize,
				'item_category_typography_group',   
				$item_category_typography_label,    
				'responsive_blog_layout',
				95,
				'item_category_typography'          
			);
			
			$blog_meta_color_label = __( 'Item Meta Color', 'responsive' );
			responsive_color_control(
				$wp_customize,
				'blog_item_meta',                                                                      
				$blog_meta_color_label,                                                            
				'responsive_blog_layout',                                                              
				96,                                                                                     
				Responsive\Core\get_responsive_customizer_defaults( 'responsive_blog_item_meta_color' ), 
				null,                                                                                   
				'',                                                                                     
				true,                                                                                   
				Responsive\Core\get_responsive_customizer_defaults( 'blog_item_meta_hover' ),            
				'blog_item_meta_hover',
				'refresh',                                                                  
			);

			$item_meta_typography_label = esc_html__( 'Item Meta Font', 'responsive' );

			responsive_typography_group_control(
				$wp_customize,
				'item_meta_typography_group',   
				$item_meta_typography_label,    
				'responsive_blog_layout',
				97,
				'item_meta_typography'          
			);
			
			responsive_horizontal_separator_control($wp_customize, 'blog_item_meta_font_separator', 1, 'responsive_blog_layout', 98, 1, null );

			// Blog/Archive Site Background Color.
			$blog_site_background_color_label = __( 'Site Background', 'responsive' );
			responsive_color_control( $wp_customize, 'blog_site_background', $blog_site_background_color_label, 'responsive_blog_layout', 99, Responsive\Core\get_responsive_customizer_defaults('responsive_blog_site_background_color') );

			// Blog/Archive Content Background Color.
			$blog_content_background_color_label = __( 'Content Background', 'responsive' );
			responsive_color_control( $wp_customize, 'blog_content_background', $blog_content_background_color_label, 'responsive_blog_layout', 100, Responsive\Core\get_responsive_customizer_defaults('responsive_blog_content_background_color') );

			responsive_horizontal_separator_control($wp_customize, 'blog_content_background_separator', 1, 'responsive_blog_layout', 101, 1, null );

			/* Date box setting */
			$date_box_label = esc_html__( 'Enable Date Box', 'responsive' );
			responsive_toggle_control( $wp_customize, 'date_box_toggle', $date_box_label, 'responsive_blog_layout', 280, 0, '' );
			/* End of date box setting */

			/* Setting for changing style of the date box */
			$responsive_date_box_style_choices = array(
				'square' => esc_html__( 'Square', 'responsive' ),
				'round'  => esc_html__( 'Circle', 'responsive' ),
			);

			$wp_customize->add_setting(
				'responsive_date_box_style',
				array(
					'default'           => 'square',
					'sanitize_callback' => 'responsive_sanitize_select',
					'transport'         => 'refresh',
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'date_box_toggle_separator', 1, 'responsive_blog_layout', 285, 1, 'responsive_date_box_toggle_callback' );

			$wp_customize->add_control(
				new Responsive_Customizer_Imageradio_Button_Control(
					$wp_customize,
					'responsive_date_box_style',
					array(
						'label'    => esc_html__( 'Date Box Style', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_date_box_style',
						'priority' => 290,
						'choices'  => array(
							'square' => esc_html__( 'Square', 'responsive' ),
							'round'  => esc_html__( 'Round', 'responsive' ),
						),
						'active_callback' => 'responsive_date_box_toggle_callback'
					)
				)
			);

			/* End of date box style setting */

			$wp_customize->add_setting(
				'blog_pagination',
				array(
					'default'           => 'default',
					'transport'         => 'refresh',
					'sanitize_callback' => 'responsive_sanitize_select',
				)
			);
			$wp_customize->add_control(
				new Responsive_Customizer_Select_Button_Control(
					$wp_customize,
					'blog_pagination',
					array(
						'label'    => __( 'Post Pagination', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'priority' => 240,
						'settings' => 'blog_pagination',
						'choices'  => array(
							'default'  => esc_html__( 'Default', 'responsive' ),
							'infinite' => esc_html__( 'Infinite', 'responsive' ),
						),
					)
				)
			);

			$theme = wp_get_theme(); // gets the current theme.
			if ( 'Responsive' === $theme->name || 'Responsive' === $theme->parent_theme ) {

				if ( 'Responsive' === $theme->parent_theme ) {
					$theme = wp_get_theme( 'responsive' );
				}

				if ( version_compare( $theme['Version'], '4.4.3', '>' ) ) {
					$wp_customize->add_setting(
						'responsive_disable_author_meta',
						array(
							'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_checkbox',
							'transport'         => 'postMessage',
							'default'           => 0,
						)
					);
					$wp_customize->add_control(
						new Responsive_Customizer_Toggle_Control(
							$wp_customize,
							'responsive_disable_author_meta',
							array(
								'label'    => __( ' Disable Author Profile Box ?', 'responsive' ),
								'section'  => 'responsive_single_blog_layout',
								'settings' => 'responsive_disable_author_meta',
								'priority' => 105,
							)
						)
					);
				}
			}
		}
	}

endif;

return new Responsive_Addons_Blog_Customizer();
