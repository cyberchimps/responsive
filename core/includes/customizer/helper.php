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
 				'read_more'      => esc_html__( 'Read More', 'responsive' ),
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
