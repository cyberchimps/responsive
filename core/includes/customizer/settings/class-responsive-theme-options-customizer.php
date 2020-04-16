<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Theme_Options_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Theme_Options_Customizer {

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
			$args                  = array(
				'type'         => 'post',
				'orderby'      => 'name',
				'order'        => 'ASC',
				'hide_empty'   => 1,
				'hierarchical' => 1,
				'taxonomy'     => 'category',
			);
			$option_categories     = array();
			$category_lists        = get_categories( $args );
			$option_categories[''] = esc_html( __( 'Choose Category', 'responsive' ) );
			foreach ( $category_lists as $category ) {
				$option_categories[ $category->term_id ] = $category->name;
			}

			$option_all_post_cat = array();
			foreach ( $category_lists as $category ) {
				$option_all_post_cat[ $category->term_id ] = $category->name;
			}

				/* Blog page setting */
				$wp_customize->add_setting( 'exclude_post_cat', array( 'sanitize_callback' => 'Responsive\Customizer\\responsive_sanitize_multiple_checkboxes' ) );
				$wp_customize->add_control(
					new Responsive_Customize_Control_Checkbox_Multiple(
						$wp_customize,
						'exclude_post_cat',
						array(
							'section'     => 'responsive_blog_layout',
							'label'       => __( 'Exclude Categories from Blog page', 'responsive' ),
							'description' => __( 'Please choose the post categories that should not be displayed on the blog page', 'responsive' ),
							'settings'    => 'exclude_post_cat',
							'choices'     => $option_all_post_cat,
							'priority'    => 50,
						)
					)
				);
		}
	}

endif;

return new Responsive_Theme_Options_Customizer();
