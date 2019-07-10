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
 		$sections = array( 'featured_image', 'title', 'meta', 'content' );

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
 		$sections = array( 'featured_image', 'title', 'meta', 'content' );

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
 if ( ! function_exists( 'responsive_page_elements' ) ) {
   /**
	* Returns blog single elements for the customizer
	*
	* @since 0.2
	*/
   function responsive_page_elements() {
	   // Default elements.
	   $elements = apply_filters(
		   'responsive_page_elements',
		   array(
			   'featured_image' => esc_html__( 'Featured Image', 'responsive' ),
			   'title'          => esc_html__( 'Title', 'responsive' ),
			   'content'        => esc_html__( 'Content', 'responsive' ),
		   )
	   );

	   // Return elements.
	   return $elements;

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

 /**
  * Return correct schema markup
  *
  * @since 1.2.10
  */
 if ( ! function_exists( 'responsive_get_schema_markup' ) ) {

 	function responsive_get_schema_markup( $location ) {

 		// Return if disable
 		if ( ! get_theme_mod( 'responsive_schema_markup', true ) ) {
 			return null;
 		}

 		// Default
 		$schema = $itemprop = $itemtype = '';

 		// HTML
 		if ( 'html' == $location ) {
 			$schema = 'itemscope itemtype="http://schema.org/WebPage"';
 		}

 		// Header
 		elseif ( 'header' == $location ) {
 			$schema = 'itemscope="itemscope" itemtype="http://schema.org/WPHeader"';
 		}

 		// Logo
 		elseif ( 'logo' == $location ) {
 			$schema = 'itemscope itemtype="http://schema.org/Brand"';
 		}

 		// Navigation
 		elseif ( 'site_navigation' == $location ) {
 			$schema = 'itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"';
 		}

 		// Main
 		elseif ( 'main' == $location ) {
 			$itemtype = 'http://schema.org/WebPageElement';
 			$itemprop = 'mainContentOfPage';
 			if ( is_singular( 'post' ) ) {
 				$itemprop = '';
 				$itemtype = 'http://schema.org/Blog';
 			}
 		}

 		// Sidebar
 		elseif ( 'sidebar' == $location ) {
 			$schema = 'itemscope="itemscope" itemtype="http://schema.org/WPSideBar"';
 		}

 		// Footer widgets
 		elseif ( 'footer' == $location ) {
 			$schema = 'itemscope="itemscope" itemtype="http://schema.org/WPFooter"';
 		}

 		// Headings
 		elseif ( 'headline' == $location ) {
 			$schema = 'itemprop="headline"';
 		}

 		// Posts
 		elseif ( 'entry_content' == $location ) {
 			$schema = 'itemprop="text"';
 		}

 		// Publish date
 		elseif ( 'publish_date' == $location ) {
 			$schema = 'itemprop="datePublished"';
 		}

 		// Author name
 		elseif ( 'author_name' == $location ) {
 			$schema = 'itemprop="name"';
 		}

 		// Author link
 		elseif ( 'author_link' == $location ) {
 			$schema = 'itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"';
 		}

 		// Item
 		elseif ( 'item' == $location ) {
 			$schema = 'itemprop="item"';
 		}

 		// Url
 		elseif ( 'url' == $location ) {
 			$schema = 'itemprop="url"';
 		}

 		// Position
 		elseif ( 'position' == $location ) {
 			$schema = 'itemprop="position"';
 		}

 		// Image
 		elseif ( 'image' == $location ) {
 			$schema = 'itemprop="image"';
 		}

 		return ' ' . apply_filters( 'responsive_schema_markup', $schema );

 	}
 }
 if ( ! function_exists( 'responsive_page_single_elements_positioning' ) ) {
    /**
 	* Returns blog single elements positioning
 	*
 	* @since 1.1.0
 	*/
    function responsive_page_single_elements_positioning() {

 	   // Default sections.
 	   $sections = array( 'featured_image', 'title', 'content' );

 	   // Get sections from Customizer.
 	   $sections = get_theme_mod( 'responsive_page_single_elements_positioning', $sections );

 	   // Turn into array if string.
 	   if ( $sections && ! is_array( $sections ) ) {
 		   $sections = explode( ',', $sections );
 	   }

 	   // Apply filters for easy modification.
 	   $sections = apply_filters( 'responsive_page_single_elements_positioning', $sections );

 	   // Return sections.
 	   return $sections;

    }
 }
 /**
  * Returns post video HTML
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'responsive_get_post_video_html' ) ) {

 	function responsive_get_post_video_html( $video = '' ) {

 		// Get video
 		$video = $video ? $video : responsive_get_post_media();

 		// Return if video is empty
 		if ( empty( $video ) ) {
 			return;
 		}

 		// Check post format for standard post type
 		if ( 'post' == get_post_type() && 'video' != get_post_format() ) {
 			return;
 		}

 		// Get oembed code and return
 		if ( ! is_wp_error( $oembed = wp_oembed_get( $video ) ) && $oembed ) {
 			return '<div class="responsive-video-wrap">'. $oembed .'</div>';
 		}

 		// Display using apply_filters if it's self-hosted
 		else {

 			$video = apply_filters( 'the_content', $video );

 			// Add responsive video wrap for youtube/vimeo embeds
 			if ( strpos( $video, 'youtube' ) || strpos( $video, 'vimeo' ) ) {
 				return '<div class="responsive-video-wrap">'. $video .'</div>';
 			}

 			// Else return without responsive wrap
 			else {
 				return $video;
 			}

 		}

 	}

 }

 /**
  * Returns post audio
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'responsive_get_post_audio_html' ) ) {

 	function responsive_get_post_audio_html( $audio = '' ) {

 		// Get audio
 		$audio = $audio ? $audio : responsive_get_post_media();

 		// Return if audio is empty
 		if ( empty( $audio ) ) {
 			return;
 		}

 		// Check post format for standard post type
 		if ( 'post' == get_post_type() && 'audio' != get_post_format() ) {
 			return;
 		}

 		// Get oembed code and return
 		if ( ! is_wp_error( $oembed = wp_oembed_get( $audio ) ) && $oembed ) {
 			return '<div class="responsive-video-wrap">'. $oembed .'</div>';
 		}

 		// Display using apply_filters if it's self-hosted
 		else {

 			$audio = apply_filters( 'the_content', $audio );

 			// Add responsive audio wrap for youtube/vimeo embeds
 			if ( strpos( $audio, 'youtube' ) || strpos( $audio, 'vimeo' ) ) {
 				return '<div class="responsive-video-wrap">'. $audio .'</div>';
 			}

 			// Else return without responsive wrap
 			else {
 				return $audio;
 			}

 		}

 	}

 }

 /**
  * Returns post media
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'responsive_get_post_media' ) ) {

 	function responsive_get_post_media( $post_id = '' ) {

 		// Define video variable
 		$video = '';

 		// Get correct ID
 		$post_id = $post_id ? $post_id : get_the_ID();

 		// Embed
 		if ( $meta = get_post_meta( $post_id, 'responsive_post_video_embed', true ) ) {
 			$video = $meta;
 		}

 		// Check for self-hosted first
 		elseif ( $meta = get_post_meta( $post_id, 'responsive_post_self_hosted_media', true ) ) {
 			$video = $meta;
 		}

 		// Check for post oembed
 		elseif ( $meta = get_post_meta( $post_id, 'responsive_post_oembed', true ) ) {
 			$video = $meta;
 		}

 		// Apply filters for child theming
 		$video = apply_filters( 'responsive_get_post_video', $video );

 		// Return data
 		return $video;

 	}
 }
 /**
  * Retrieve attachment IDs
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'responsive_get_gallery_ids' ) ) {

 	function responsive_get_gallery_ids( $post_id = '' ) {

 		$post_id        = $post_id ? $post_id : get_the_ID();
 		$attachment_ids = get_post_meta( $post_id, 'responsive_gallery_id', true );

 		if ( $attachment_ids ) {
 			return $attachment_ids;
 		}

 	}
 }

 /**
  * Retrieve attachment data
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'responsive_get_attachment' ) ) {

 	function responsive_get_attachment( $id ) {

 		$attachment = get_post( $id );

 		return array(
 			'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
 			'caption'     => $attachment->post_excerpt,
 			'description' => $attachment->post_content,
 			'href'        => get_permalink( $attachment->ID ),
 			'src'         => $attachment->guid,
 			'title'       => $attachment->post_title,
 		);

 	}
 }

 /**
  * Return gallery count
  *
  * @since 1.0.0
  */
 if ( ! function_exists( 'responsive_gallery_count' ) ) {

 	function responsive_gallery_count() {

 		$ids = responsive_get_gallery_ids();
 		return count( $ids );

 	}
 }
 /**
  * Returns correct style for the blog entry based on the customizer
  *
  * @since 1.0.4
  */
 if ( ! function_exists( 'responsive_blog_entry_style' ) ) {

 	function responsive_blog_entry_style() {

 		// Get default style from Customizer
 		$style = get_theme_mod( 'responsive_blog_style', 'large-entry' );

 		// Sanitize
 		$style = $style ? $style : 'large-entry';

 		// Apply filters for child theming
 		$style = apply_filters( 'responsive_blog_entry_style', $style );

 		// Return style
 		return $style;

 	}
 }

 /**
  * Returns correct images size
  *
  * @since 1.0.4
  */
 if ( ! function_exists( 'responsive_blog_entry_images_size' ) ) {

 	function responsive_blog_entry_images_size() {

 		// Get default size from Customizer
 		$size = get_theme_mod( 'responsive_blog_grid_images_size', 'medium' );

 		// Sanitize
 		$size = $size ? $size : 'medium';

 		// Apply filters for child theming
 		$size = apply_filters( 'responsive_blog_entry_images_size', $size );

 		// Return size
 		return $size;

 	}
 }
