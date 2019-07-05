<?php
/**
 * All helper function for customizer
 */

 if ( ! function_exists( 'responsive_blog_entry_elements' ) ) {
 	/**
 	 * Returns blog entry elements for the customizer
 	 *
 	 * @since 0.2
 	 */
 	function responsive_blog_entry_elements() {

 		// Default elements.
 		$elements = apply_filters(
 			'responsive_blog_entry_elements',
 			array(
 				'featured_image' => esc_html__( 'Featured Image', 'responsive' ),
 				'title'          => esc_html__( 'Title', 'responsive' ),
 				'meta'           => esc_html__( 'Meta', 'responsive' ),
 				'content'        => esc_html__( 'Content', 'responsive' ),
 			)
 		);

 		// Return elements.
 		return $elements;

 	}
 }


 if ( ! function_exists( 'responsive_blog_entry_elements_positioning' ) ) {
 	/**
 	 * Returns blog entry elements positioning
 	 *
 	 * @since 0.2
 	 */
 	function responsive_blog_entry_elements_positioning() {

 		// Default sections.
 		$sections = array( 'featured_image', 'title', 'meta', 'content', 'read_more' );

 		// Get sections from Customizer.
 		$sections = get_theme_mod( 'responsive_blog_entry_elements_positioning', $sections );

 		// Turn into array if string.
 		if ( $sections && ! is_array( $sections ) ) {
 			$sections = explode( ',', $sections );
 		}

 		// Apply filters for easy modification.
 		$sections = apply_filters( 'responsive_blog_entry_elements_positioning', $sections );

 		// Return sections.
 		return $sections;

 	}
 }


 if ( ! function_exists( 'responsive_blog_entry_meta' ) ) {
 	/**
 	 * Returns blog entry meta
 	 *
 	 * @since 0.2
 	 */
 	function responsive_blog_entry_meta() {

 		// Default sections.
 		$sections = array( 'author', 'date', 'categories', 'comments', 'Tags' );

 		// Get sections from Customizer.
 		$sections = get_theme_mod( 'responsive_blog_entry_meta', $sections );

 		// Turn into array if string.
 		if ( $sections && ! is_array( $sections ) ) {
 			$sections = explode( ',', $sections );
 		}

 		// Apply filters for easy modification.
 		$sections = apply_filters( 'responsive_blog_entry_meta', $sections );

 		// Return sections.
 		return $sections;

 	}
 }


 if ( ! function_exists( 'responsive_blog_single_elements' ) ) {
 	/**
 	 * Returns blog single elements for the customizer
 	 *
 	 * @since 0.2
 	 */
 	function responsive_blog_single_elements() {
		error_log('responsive_blog_single_elements');
 		// Default elements.
 		$elements = apply_filters(
 			'responsive_blog_single_elements',
 			array(
 				'featured_image' => esc_html__( 'Featured Image', 'responsive' ),
 				'title'          => esc_html__( 'Title', 'responsive' ),
 				'meta'           => esc_html__( 'Meta', 'responsive' ),
 				'content'        => esc_html__( 'Content', 'responsive' ),
 			)
 		);

 		// Return elements.
 		return $elements;

 	}
 }


 if ( ! function_exists( 'responsive_blog_single_elements_positioning' ) ) {
 	/**
 	 * Returns blog single elements positioning
 	 *
 	 * @since 1.1.0
 	 */
 	function responsive_blog_single_elements_positioning() {

 		// Default sections.
 		$sections = array( 'featured_image', 'title', 'meta', 'content', 'tags', 'social_share', 'next_prev', 'author_box', 'related_posts', 'single_comments' );

 		// Get sections from Customizer.
 		$sections = get_theme_mod( 'responsive_blog_single_elements_positioning', $sections );

 		// Turn into array if string.
 		if ( $sections && ! is_array( $sections ) ) {
 			$sections = explode( ',', $sections );
 		}

 		// Apply filters for easy modification.
 		$sections = apply_filters( 'responsive_blog_single_elements_positioning', $sections );

 		// Return sections.
 		return $sections;

 	}
 }

 /**
  * Returns blog single meta
  *
  * @since 1.0.5.1
  */
 if ( ! function_exists( 'responsive_blog_single_meta' ) ) {

 	function responsive_blog_single_meta() {

 		// Default sections
 		$sections = array( 'author', 'date', 'categories', 'comments' );

 		// Get sections from Customizer
 		$sections = get_theme_mod( 'responsive_blog_single_meta', $sections );

 		// Turn into array if string
 		if ( $sections && ! is_array( $sections ) ) {
 			$sections = explode( ',', $sections );
 		}

 		// Apply filters for easy modification
 		$sections = apply_filters( 'responsive_blog_single_meta', $sections );

 		// Return sections
 		return $sections;

 	}
 }


/**
 * Adds custom classes to the array of body classes.
 */
if ( ! function_exists( 'responsive_body_classes' ) ) {

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since 1.0.0
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function responsive_body_classes( $classes ) {

		// Apply separate container class to the body.
		$content_layout = responsive_get_content_layout();
		if ( 'fullwidth' == $content_layout ) {
			$classes[] = 'fullwidth-layout';
		}
    if ( 'content-boxed' == $content_layout ) {
			$classes[] = 'content-boxed-layout';
		}

		return $classes;
	}
}

add_filter( 'body_class', 'responsive_body_classes' );


/**
 * Return current content layout
 */
if ( ! function_exists( 'responsive_get_content_layout' ) ) {

	/**
	 * Return current content layout
	 *
	 * @since 1.0.0
	 * @return boolean  content layout.
	 */
	function responsive_get_content_layout() {

		$value = false;

		if ( is_singular() ) {

			// If post meta value is empty,
			// Then get the POST_TYPE content layout.
			$content_layout = get_theme_mod( 'responsive_layout_styles', '', true );

			if ( empty( $content_layout ) ) {

				$post_type = get_post_type();

				if ( 'post' === $post_type || 'page' === $post_type ) {
					$content_layout = get_theme_mod( 'responsive_single_' . get_post_type() . '_layout' );
				}

				if ( 'default' == $content_layout || empty( $content_layout ) ) {

					// Get the GLOBAL content layout value.
					// NOTE: Here not used `true` in the below function call.
					$content_layout = get_theme_mod( 'responsive_layout_styles', 'full-width' );
				}
			}
		} else {

			$content_layout = '';
			$post_type      = get_post_type();

			if ( 'post' === $post_type ) {
				$content_layout = get_theme_mod( 'responsive_blog_entries_layout' );
			}

			if ( is_search() ) {
				$content_layout = get_theme_mod( 'responsive_page_layout' );
			}

			if ( 'default' == $content_layout || empty( $content_layout ) ) {

				// Get the GLOBAL content layout value.
				// NOTE: Here not used `true` in the below function call.
				$content_layout = get_theme_mod( 'responsive_layout_styles', 'full-width' );
			}
		}

		return apply_filters( 'responsive_get_content_layout', $content_layout );
	}
}

/**
 * Default color picker palettes
 *
 * @since 1.4.9
 */
if ( ! function_exists( 'responsive_default_color_palettes' ) ) {

 function responsive_default_color_palettes() {
   error_log('responsive_default_color_palettes');
   $palettes = array(
     '#000000',
     '#ffffff',
     '#dd3333',
     '#dd9933',
     '#eeee22',
     '#81d742',
     '#1e73be',
     '#8224e3',
   );

   // Apply filters and return
   return apply_filters( 'responsive_default_color_palettes', $palettes );

 }
}
