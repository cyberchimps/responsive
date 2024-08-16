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
						'label'    => esc_html__( 'Blog/Archive Layouts (Desktop)', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_blog_layout_options',
						'priority' => 5,
						'choices'  => $blog_layout_choices,
					)
				)
			);

			/* End of blog layout setting */

			$date_box_label = esc_html__( 'Enable Date Box', 'responsive' );
			responsive_toggle_control( $wp_customize, 'date_box_toggle', $date_box_label, 'responsive_blog_layout', 35, 0, '' );
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

			responsive_horizontal_separator_control($wp_customize, 'date_box_toggle_separator', 1, 'responsive_blog_layout', 37, 1, 'responsive_date_box_toggle_callback' );

			$wp_customize->add_control(
				new Responsive_Customizer_Imageradio_Button_Control(
					$wp_customize,
					'responsive_date_box_style',
					array(
						'label'    => esc_html__( 'Date Box Style', 'responsive' ),
						'section'  => 'responsive_blog_layout',
						'settings' => 'responsive_date_box_style',
						'priority' => 40,
						'choices'  => array(
							'square' => esc_html__( 'Square', 'responsive' ),
							'round'  => esc_html__( 'Round', 'responsive' ),
						),
						'active_callback' => 'responsive_date_box_toggle_callback'
					)
				)
			);
			responsive_horizontal_separator_control($wp_customize, 'date_box_style_separator', 1, 'responsive_blog_layout', 42, 1, );
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
						'priority' => 20,
						'settings' => 'blog_pagination',
						'choices'  => array(
							'default'  => esc_html__( 'Default', 'responsive' ),
							'infinite' => esc_html__( 'Infinite', 'responsive' ),
						),
					)
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'blog_pagination_separator', 1, 'responsive_blog_layout', 22, 1, );

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
