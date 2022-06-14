<?php
/**
 * All helper function for customizer
 *
 * @package Responsive
 */

if ( ! function_exists( 'responsive_is_transparent_header_enabled' ) ) {
	/**
	 * Returns true if transparent header is enabled
	 */
	function responsive_is_transparent_header_enabled() {

		$flag = get_theme_mod( 'responsive_transparent_header', 0 );
		if ( $flag ) {
			return true;
		} else {
			return false;
		}
	}
}

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
				'title'          => esc_html__( 'Title', 'responsive' ),
				'featured_image' => esc_html__( 'Featured Image', 'responsive' ),
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
		$sections = array( 'title', 'meta', 'featured_image', 'content' );

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
		$sections = array( 'author', 'date', 'categories', 'comments', 'tag' );

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
				'title'          => esc_html__( 'Title', 'responsive' ),
				'featured_image' => esc_html__( 'Featured Image', 'responsive' ),
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
		$sections = array( 'title', 'meta', 'featured_image', 'content' );

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



if ( ! function_exists( 'responsive_header_elements' ) ) {
	/**
	 * Returns header elements for the customizer
	 *
	 * @since 0.2
	 */
	function responsive_header_elements() {
		// Default elements.
		$elements = apply_filters(
			'responsive_header_elements',
			array(
				'site-branding'   => esc_html__( 'Site Branding', 'responsive' ),
				'main-navigation' => esc_html__( 'Main Navigation', 'responsive' ),
			)
		);

		// Return elements.
		return $elements;

	}
}

if ( ! function_exists( 'responsive_hamburger_menu_label' ) ) {
	/**
	 * Returns hamburger menu label value
	 */
	function responsive_hamburger_menu_label() {
		$hamburger_menu_label_set_value = get_theme_mod( 'responsive_hamburger_menu_label_text', '' );
		return $hamburger_menu_label_set_value;
	}
}

if ( ! function_exists( 'responsive_hamburger_font_size_value' ) ) {
	/**
	 * Return hamburger menu label font size
	 */
	function responsive_hamburger_font_size_value() {
		$hamburger_menu_label_font_size = get_theme_mod( 'responsive_hamburger_menu_label_font_size', 20 );
		return $hamburger_menu_label_font_size;
	}
}

	/**
	* Returns blog single meta
	*
	* @since 1.0.5.1
	*/
if ( ! function_exists( 'responsive_blog_single_meta' ) ) {
	/** Function to display blog */
	function responsive_blog_single_meta() {

		/** Default sections */
		$sections = array( 'author', 'date', 'categories', 'comments', 'tag' );

		/** Get sections from Customizer */
		$sections = get_theme_mod( 'responsive_blog_single_meta', $sections );

		/** Turn into array if string */
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		/** Apply filters for easy modification */
		$sections = apply_filters( 'responsive_blog_single_meta', $sections );

		/** Return sections */
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
				'title'          => esc_html__( 'Title', 'responsive' ),
				'featured_image' => esc_html__( 'Featured Image', 'responsive' ),
				'content'        => esc_html__( 'Content', 'responsive' ),
			)
		);

		// Return elements.
		return $elements;

	}
}

if ( ! function_exists( 'responsive_product_elements' ) ) {
	/**
	 * Returns single product view page elements for the customizer
	 *
	 * @since 0.2
	 */
	function responsive_product_elements() {
		// Default elements.
		$elements = apply_filters(
			'responsive_product_elements',
			array(
				'title'      => esc_html__( 'Title', 'responsive' ),
				'ratings'    => esc_html__( 'Rating', 'responsive' ),
				'price'      => esc_html__( 'Price', 'responsive' ),
				'short_desc' => esc_html__( 'Short Description', 'responsive' ),
				'add_cart'   => esc_html__( 'Add to Cart', 'responsive' ),
				'meta'       => esc_html__( 'Meta', 'responsive' ),
			)
		);

		// Return elements.
		return $elements;

	}
}


if ( ! function_exists( 'responsive_shoppage_elements' ) ) {
	/**
	 * Returns product view on shop page
	 *
	 * @since 0.2
	 */
	function responsive_shoppage_elements() {
		// Default elements.
		$elements = apply_filters(
			'responsive_shoppage_elements',
			array(
				'title'      => esc_html__( 'Title', 'responsive' ),
				'category'   => esc_html__( 'Category', 'responsive' ),
				'price'      => esc_html__( 'Price', 'responsive' ),
				'ratings'    => esc_html__( 'Ratings', 'responsive' ),
				'short_desc' => esc_html__( 'Short Description', 'responsive' ),
				'add_cart'   => esc_html__( 'Add to Cart', 'responsive' ),
			)
		);

		// Return elements.
		return $elements;

	}
}

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

				if ( 'default' === $content_layout || empty( $content_layout ) ) {

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

			if ( 'default' === $content_layout || empty( $content_layout ) ) {

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
	/** Function for default color pallates */
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

		/** Apply filters and return */
		return apply_filters( 'responsive_default_color_palettes', $palettes );

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
		$sections = array( 'title', 'featured_image', 'content' );

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
	/** Function for video posts
	 *
	 * @param  object $video    arguments.
	 */
	function responsive_get_post_video_html( $video = '' ) {

		// Get video.
		$video = $video ? $video : responsive_get_post_media();

		// Return if video is empty.
		if ( empty( $video ) ) {
			return;
		}

		// Check post format for standard post type.
		if ( 'post' === get_post_type() && 'video' !== get_post_format() ) {
			return;
		}

		// Get oembed code and return.
		$oembed = wp_oembed_get( $video );
		if ( ! is_wp_error( $oembed ) && $oembed ) {
			return '<div class="responsive-video-wrap">' . $oembed . '</div>';
		} else {

			$video = apply_filters( 'the_content', $video );

			// Add responsive video wrap for youtube/vimeo embeds.
			if ( strpos( $video, 'youtube' ) || strpos( $video, 'vimeo' ) ) {
				return '<div class="responsive-video-wrap">' . $video . '</div>';
			} else {
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
	/** Function for audio posts
	 *
	 * @param  object $audio    arguments.
	 */
	function responsive_get_post_audio_html( $audio = '' ) {

		// Get audio.
		$audio = $audio ? $audio : responsive_get_post_media();

		// Return if audio is empty.
		if ( empty( $audio ) ) {
			return;
		}

		// Check post format for standard post type.
		if ( 'post' === get_post_type() && 'audio' !== get_post_format() ) {
			return;
		}

		// Get oembed code and return.
		if ( ! is_wp_error( wp_oembed_get( $audio ) ) && $oembed ) {
			return '<div class="responsive-video-wrap">' . $oembed . '</div>';
		} else {

			$audio = apply_filters( 'the_content', $audio );

			// Add responsive audio wrap for youtube/vimeo embeds.
			if ( strpos( $audio, 'youtube' ) || strpos( $audio, 'vimeo' ) ) {
				return '<div class="responsive-video-wrap">' . $audio . '</div>';
			} else {
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
	/** Function for audio posts
	 *
	 * @param  object $post_id    arguments.
	 */
	function responsive_get_post_media( $post_id = '' ) {

		// Define video variable.
		$video = '';

		// Get correct ID.
		$post_id = $post_id ? $post_id : get_the_ID();

		// Embed.
		if ( $meta = get_post_meta( $post_id, 'responsive_post_video_embed', true ) ) {//phpcs:ignore
			$video = $meta;
		} elseif ( $meta = get_post_meta( $post_id, 'responsive_post_self_hosted_media', true ) ) {//phpcs:ignore
			$video = $meta;
		} elseif ( $meta = get_post_meta( $post_id, 'responsive_post_oembed', true ) ) {//phpcs:ignore
			$video = $meta;
		}

		// Apply filters for child theming.
		$video = apply_filters( 'responsive_get_post_video', $video );

		// Return data.
		return $video;

	}
}
/**
* Retrieve attachment IDs
*
* @since 1.0.0
*/
if ( ! function_exists( 'responsive_get_gallery_ids' ) ) {
	/** Function for audio posts
	 *
	 * @param  object $post_id    arguments.
	 */
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
	/** Function for audio posts
	 *
	 * @param  object $id    arguments.
	 */
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
	/** Function for audio posts */
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
	/** Function for audio posts */
	function responsive_blog_entry_style() {

		// Get default style from Customizer.
		$style = get_theme_mod( 'responsive_blog_style', 'large-entry' );

		// Sanitize.
		$style = $style ? $style : 'large-entry';

		// Apply filters for child theming.
		$style = apply_filters( 'responsive_blog_entry_style', $style );

		// Return style.
		return $style;

	}
}

/**
* Returns correct images size
*
* @since 1.0.4
*/
if ( ! function_exists( 'responsive_blog_entry_images_size' ) ) {
	/** Function for audio posts */
	function responsive_blog_entry_images_size() {

		// Get default size from Customizer.
		$size = get_theme_mod( 'responsive_blog_grid_images_size', 'medium' );

		// Sanitize.
		$size = $size ? $size : 'medium';

		// Apply filters for child theming.
		$size = apply_filters( 'responsive_blog_entry_images_size', $size );

		// Return size.
		return $size;

	}
}

if ( ! function_exists( 'responsive_get_schema_markup' ) ) {
	/**
	 * Schema markup
	 *
	 * @param  string $location Html tags.
	 *
	 * @return [type]           [description]
	 */
	function responsive_get_schema_markup( $location ) {

		// Default.
		$schema   = '';
		$itemprop = '';
		$itemtype = '';
		// HTML.
		switch ( $location ) {

			case 'body':
				if ( is_page() ) {

					$schema = 'itemscope itemtype="https://schema.org/WebPage"';

				} elseif ( is_search() ) {

					$schema = 'itemscope itemtype="https://schema.org/SearchResultsPage"';

				} elseif ( is_singular( 'post' ) || is_home() || is_post_type_archive( 'post' ) ) {

					$schema = 'itemscope itemtype="https://schema.org/Blog"';

				} else {

					$schema = 'itemscope itemtype="http://schema.org/WebPage"';

				}
				break;
			case 'site-header': // Header.
				$schema = 'itemscope itemtype="https://schema.org/WPHeader"';
				break;
			case 'logo': // Logo.
				$schema = 'itemprop="logo"';
				break;
			case 'site-title': // Site-title.
				$schema = 'itemprop="name"';
				break;
			case 'site-branding': // site-branding.
				$schema = 'itemscope itemtype="https://schema.org/Organization"';
				break;
			case 'main-navigation': // Navigation.
				$schema = 'itemscope itemtype="https://schema.org/SiteNavigationElement"';
				break;
			case 'sidebar': // Sidebar.
				$schema = 'itemscope itemtype="https://schema.org/WPSideBar"';
				break;
			case 'site-footer': // Footer widgets.
				$schema = 'itemscope itemtype="https://schema.org/WPFooter"';
				break;
			case 'headline': // Headings.
				$schema = 'itemscope itemprop="headline"';
				break;
			case 'entry_content': // Posts.
				$schema = 'itemscope itemprop="text"';
				break;
			case 'publish_date': // Publish date.
				$schema = 'itemscope itemprop="datePublished"';
				break;
			case 'author_name': // Author name.
				$schema = 'itemscope itemprop="name"';
				break;
			case 'entry-author': // Author link.
				$schema = 'itemscope itemtype="https://schema.org/Person"';
				break;
			case 'item': // Item.
				$schema = 'itemscope itemprop="item"';
				break;
			case 'url': // Url.
				$schema = 'itemscope itemprop="url"';
				break;
			case 'position': // Position.
				$schema = 'itemscope itemprop="position"';
				break;
			case 'image': // Image.
				$schema = 'itemscope itemprop="image" itemtype="https://schema.org/image"';
				break;
			case 'tagline':
				$schema = 'itemprop="description"';
				break;
			case 'site_title': // Image.
				$schema = 'itemprop="name"';
				break;
			case 'organization': // Image.
				$schema = 'itemscope itemtype="https://schema.org/Organization"';
				break;
			case 'creativework': // Image.
				$schema = 'itemscope itemtype="https://schema.org/CreativeWork"';
				break;
			case 'breadcrumb':
				$schema = 'itemscope itemtype="https://schema.org/BreadcrumbList"';
				break;
			default:
				$schema = '';

		}

		return ' ' . apply_filters( 'responsive_schema_markup', $schema );
	}
}
/**
 * Outputs correct schema markup
 *
 * @since 1.2.10
 */
if ( ! function_exists( 'responsive_schema_markup' ) ) {
	/**
	 * Return schema.
	 *
	 * @param  string $location Location.
	 */
	function responsive_schema_markup( $location ) {

		echo responsive_get_schema_markup( $location ); //phpcs:ignore

	}
}
/**
 * Read more text.
 *
 * @param string $text default read more text.
 * @return string read more text
 */
function responsive_read_more_text( $text ) {

	$read_more = get_theme_mod( 'responsive_blog_read_more_text', __( 'Read more &raquo;', 'responsive' ) );
	if ( '' !== $read_more ) {
		$text = $read_more;
	}

	return $text;
}

/**
 * Returns excerpt length
 *
 * @param  integer $length Length of excerpt.
 * @return integer         Length of excerpt.
 */
function responsive_custom_excerpt_length( $length ) {

	$excerpt_length = get_theme_mod( 'responsive_excerpt_length' );
	if ( ! empty( $excerpt_length ) ) {
		$length = $excerpt_length;
	}

	return $length;
}

/**
 * Returns excerpt cut with given length
 *
 * @param  string $text text of excerpt.
 * @return integer $limit       Length of excerpt.
 */
function responsive_custom_excerpt_limit_text( $text ) {
	$limit = get_theme_mod( 'responsive_excerpt_length' );
	if ( ! empty( $limit ) ) {
		$text      = wp_strip_all_tags( $text );
		$text      = strip_shortcodes( $text );
		$check_end = 0;
		if ( $limit >= str_word_count( $text, 0 ) - 1 ) {
			$check_end             = 1;
			$limit                 = str_word_count( $text, 0 ) - 1;
			$words                 = str_word_count( $text, 2 );
			$pos                   = array_keys( $words );
			$excerpt_end_text      = get_theme_mod( 'responsive_blog_read_more_text', __( 'Read more &raquo;', 'responsive' ) );
			$excerpt_end_arr       = explode( ' ', $excerpt_end_text );
			$occurence_of_end_char = strripos( $text, $excerpt_end_arr[0] );
			$text                  = substr( $text, 0, $pos[ $limit ] );
			$text_to_view          = substr( '' . $text, 0, $occurence_of_end_char );
		} else {
			$words        = str_word_count( $text, 2 );
			$pos          = array_keys( $words );
			$text         = substr( $text, 0, $pos[ $limit ] );
			$text_to_view = $text;
		}
	}
	$read_more_text = apply_filters( 'responsive_post_read_more', __( 'Read More &raquo;', 'responsive' ) );

	$post_link = sprintf(
		esc_html( '%s' ),
		'<a class="more-link" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . ' ' . $read_more_text . '</a>'
	);

	if ( 1 === $check_end ) {
		$output = '<p class="read-more"> ' . $post_link . '</p>';
	} else {
		$output = ' &hellip;<p class="read-more"> ' . $post_link . '</p>';
	}

	return $text_to_view .= $output;
}

/**
 * Function to get Read More Link of Post
 *
 * @since 3.17.2
 *
 * @return html
 */
if ( ! function_exists( 'responsive_post_link' ) ) {

	/**
	 * Function to get Read More Link of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function responsive_post_link( $output_filter = '' ) {

		$read_more_text = apply_filters( 'responsive_post_read_more', __( 'Read More &raquo;', 'responsive' ) );

		$post_link = sprintf(
			esc_html( '%s' ),
			'<a class="more-link" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . ' ' . $read_more_text . '</a>'
		);

		$output = ' &hellip;<p class="read-more"> ' . $post_link . '</p>';
		return apply_filters( 'responsive_post_link', $output, $output_filter );
	}
}
add_filter( 'excerpt_more', 'responsive_post_link', 20 );

if ( ! function_exists( 'responsive_modify_read_more_link' ) ) {
	/**
	 * Function to get Read More Link of Post
	 *
	 * @since 3.17.2
	 * @return html
	 */
	function responsive_modify_read_more_link() {
		$read_more_text = apply_filters( 'responsive_post_read_more', __( 'Read More &raquo;', 'responsive' ) );
		return '<a class="more-link" href="' . get_permalink() . '">' . $read_more_text . '</a>';
	}
}

if ( ! function_exists( 'responsive_spacing_css' ) ) {
	/**
	 * Return padding/margin values for customizer
	 *
	 * @param  integer $top    Top paddding/margin.
	 * @param  integer $right  Right paddding/margin.
	 * @param  integer $bottom bottom paddding/margin.
	 * @param  integer $left   Left paddding/margin.
	 * @return integer
	 */
	function responsive_spacing_css( $top, $right, $bottom, $left ) {

		// Add px and 0 if no value.
		$s_top    = ( isset( $top ) && '' !== $top ) ? intval( $top ) . 'px ' : '0px ';
		$s_right  = ( isset( $right ) && '' !== $right ) ? intval( $right ) . 'px ' : '0px ';
		$s_bottom = ( isset( $bottom ) && '' !== $bottom ) ? intval( $bottom ) . 'px ' : '0px ';
		$s_left   = ( isset( $left ) && '' !== $left ) ? intval( $left ) . 'px' : '0px';

		// Return one value if it is the same on every inputs.
		if ( ( intval( $s_top ) === intval( $s_right ) )
			&& ( intval( $s_right ) === intval( $s_bottom ) )
			&& ( intval( $s_bottom ) === intval( $s_left ) ) ) {
			return $s_left;
		}

		// Return.
		return $s_top . $s_right . $s_bottom . $s_left;
	}
}

/**
 * Responsive_padding_control.
 *
 * @param  object  $wp_customize  [description].
 * @param  integer $element  [description].
 * @param  string  $section  [description].
 * @param  integer $priority [description].
 * @param  integer $default_values_y [description].
 * @param  integer $default_values_x [description].
 * @param  bool    $active_call [description].
 * @param  string  $label [description].
 * @return void
 */
function responsive_padding_control( $wp_customize, $element, $section, $priority, $default_values_y = '', $default_values_x = '', $active_call = null, $label = 'Padding (px)' ) {
	/**
	 *  Padding control.
	 */
	$wp_customize->add_setting(
		'responsive_' . $element . '_top_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_left_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);

	$wp_customize->add_setting(
		'responsive_' . $element . '_bottom_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_right_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_top_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_right_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_bottom_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_left_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);

	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_top_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_right_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_bottom_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_left_padding',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_control(
		new Responsive_Customizer_Dimensions_Control(
			$wp_customize,
			'responsive_' . $element . '_padding',
			array(
				'label'           => $label,
				'section'         => $section,
				'settings'        => array(
					'desktop_top'    => 'responsive_' . $element . '_top_padding',
					'desktop_right'  => 'responsive_' . $element . '_right_padding',
					'desktop_bottom' => 'responsive_' . $element . '_bottom_padding',
					'desktop_left'   => 'responsive_' . $element . '_left_padding',
					'tablet_top'     => 'responsive_' . $element . '_tablet_top_padding',
					'tablet_right'   => 'responsive_' . $element . '_tablet_right_padding',
					'tablet_bottom'  => 'responsive_' . $element . '_tablet_bottom_padding',
					'tablet_left'    => 'responsive_' . $element . '_tablet_left_padding',
					'mobile_top'     => 'responsive_' . $element . '_mobile_top_padding',
					'mobile_right'   => 'responsive_' . $element . '_mobile_right_padding',
					'mobile_bottom'  => 'responsive_' . $element . '_mobile_bottom_padding',
					'mobile_left'    => 'responsive_' . $element . '_mobile_left_padding',
				),
				'priority'        => $priority,
				'active_callback' => $active_call,
				'input_attrs'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			)
		)
	);
}

/**
 * Responsive_meta_styles description
 *
 * @param  object  $wp_customize [description].
 * @param  string  $element      [description].
 * @param  string  $label      [description].
 * @param  string  $section      [description].
 * @param  integer $priority     [description].
 * @param  integer $default     [description].
 * @param  bool    $active_call     [description].
 * @param  string  $desc     [description].
 * @return void               [description].
 */
function responsive_color_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null, $desc = '' ) {
	// Menu Background Color.
	$wp_customize->add_setting(
		'responsive_' . $element . '_color',
		array(
			'default'           => $default,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'responsive_sanitize_background',
			'transport'         => 'postMessage',
		)
	);
	if ( class_exists( 'Responsive_Addons_Pro' ) ) {
		$plugin_path            = WP_PLUGIN_DIR . '/responsive-addons-pro/responsive-addons-pro.php';
		$plugin_info            = get_plugin_data( $plugin_path );
		$responsive_pro_version = $plugin_info['Version'];
		$compare                = version_compare( $responsive_pro_version, RESPONSIVE_PRO_OLDER_VERSION_CHECK );
		if ( -1 === $compare ) {
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_' . $element . '_color',
					array(
						'label'           => $label,
						'section'         => $section,
						'settings'        => 'responsive_' . $element . '_color',
						'type'            => 'color',
						'priority'        => $priority,
						'active_callback' => $active_call,
						'description'     => $desc,
					)
				)
			);
		} elseif ( 0 === $compare || 1 === $compare ) {
			$wp_customize->add_control(
				new Responsive_Customizer_Color_Control(
					$wp_customize,
					'responsive_' . $element . '_color',
					array(
						'label'           => $label,
						'section'         => $section,
						'settings'        => 'responsive_' . $element . '_color',
						'priority'        => $priority,
						'active_callback' => $active_call,
						'description'     => $desc,
					)
				)
			);
		}
	} else {
		$wp_customize->add_control(
			new Responsive_Customizer_Color_Control(
				$wp_customize,
				'responsive_' . $element . '_color',
				array(
					'label'           => $label,
					'section'         => $section,
					'settings'        => 'responsive_' . $element . '_color',
					'priority'        => $priority,
					'active_callback' => $active_call,
					'description'     => $desc,
				)
			)
		);
	}
}

/**
 * [responsive_drag_number_control description]
 *
 * @param  [type]  $wp_customize [description].
 * @param  [type]  $element      [description].
 * @param  [type]  $label        [description].
 * @param  [type]  $section      [description].
 * @param  [type]  $priority     [description].
 * @param  [type]  $default      [description].
 * @param  [type]  $active_call  [description].
 * @param  integer $max          [description].
 * @param  integer $min          [description].
 * @return void                [description].
 */
function responsive_drag_number_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null, $max = 4096, $min = 1, $transport = 'refresh', $step = 1 ) {

	/**
	 * Main Container Width
	 */
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'transport'         => $transport,
			'default'           => $default,
			'sanitize_callback' => 'responsive_sanitize_number',
		)
	);

	$wp_customize->add_control(
		new Responsive_Customizer_Range_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'label'           => $label,
				'section'         => $section,
				'settings'        => 'responsive_' . $element,
				'priority'        => $priority,
				'active_callback' => $active_call,
				'input_attrs'     => array(
					'min'  => $min,
					'max'  => $max,
					'step' => $step,
				),
			)
		)
	);

}

/**
 * [responsive_separator_control description].
 *
 * @param  [type] $wp_customize [description].
 * @param  [type] $element      [description].
 * @param  [type] $label        [description].
 * @param  [type] $section      [description].
 * @param  [type] $priority     [description].
 * @param  [type] $active_call     [description].
 *
 * @return void               [description].
 */
function responsive_separator_control( $wp_customize, $element, $label, $section, $priority, $active_call = null ) {

	/**
	*  Heading.
	*/
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'sanitize_callback' => 'wp_kses',
		)
	);

	$wp_customize->add_control(
		new Responsive_Customizer_Heading_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'label'           => $label,
				'section'         => $section,
				'priority'        => $priority,
				'active_callback' => $active_call,
			)
		)
	);
}

/**
 * [responsive_active_vertical_header description].
 *
 * @return [type] [description]
 */
function responsive_active_vertical_header() {

	return ( 'vertical' === get_theme_mod( 'responsive_header_layout', 'horizontal' ) ) ? true : false;
}

/**
 * [responsive_active_vertical_header_and_main_menu description].
 *
 * @return [type] [description]
 */
function responsive_active_vertical_header_and_main_menu() {
	return ( 0 === get_theme_mod( 'responsive_disable_menu', 0 ) && 'vertical' === get_theme_mod( 'responsive_header_layout', 'horizontal' ) ) ? true : false;
}

/**
 * [responsive_active_vertical_transparent_header description].
 *
 * @return [type] [description]
 */
function responsive_active_vertical_transparent_header() {

	return ( 'vertical' === get_theme_mod( 'responsive_header_layout', 'horizontal' ) && responsive_is_transparent_header_enabled() ) ? true : false;
}

/**
 * [responsive_active_mobile_vertical_header description].
 *
 * @return [type] [description]
 */
function responsive_active_mobile_vertical_header() {

	return ( 'vertical' === get_theme_mod( 'responsive_mobile_header_layout', 'horizontal' ) ) ? true : false;
}

/**
 * [responsive_active_sidebar_menu description].
 *
 * @return [type] [description]
 */
function responsive_active_sidebar_menu() {

	return ( 0 === get_theme_mod( 'responsive_disable_menu', 0 ) && 1 === get_theme_mod( 'responsive_disable_mobile_menu', 1 ) && 'sidebar' === get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' ) ) ? true : false;
}

/**
 * [responsive_active_header_widget description].
 *
 * @return [type] [description]
 */
function responsive_active_header_widget() {

	return ( 1 === get_theme_mod( 'responsive_enable_header_widget', 0 ) ) ? true : false;
}

/**
 * [responsive_active_site_layout_contained description].
 *
 * @return [type] [description]
 */
function responsive_active_site_layout_contained() {

	$header_layout = get_theme_mod( 'responsive_width', 'contained' );

	return ( 'contained' === $header_layout ) ? true : false;
}

/**
 * [responsive_not_active_site_style_flat description]
 *
 * @return [type] [description]
 */
function responsive_not_active_site_style_flat() {

	$header_layout = get_theme_mod( 'responsive_style', 'contained' );

	return ( 'flat' === $header_layout ) ? false : true;
}

/**
 * [responsive_active_breadcrumb description].
 *
 * @return [type] [description]
 */
function responsive_active_breadcrumb() {

	$responsive_options = get_option( 'responsive_theme_options' );
	return ( $responsive_options['breadcrumb'] ) ? false : true;

}

/**
 * [responsive_enable_header_bottom_border_check description].
 */
function responsive_enable_header_bottom_border_check() {
	return ( 1 === get_theme_mod( 'responsive_enable_header_bottom_border', 1 ) ) ? true : false;
}

/**
 * [responsive_enable_transparent_header_bottom_border_check description].
 */
function responsive_enable_transparent_header_bottom_border_check() {
	return ( 1 === get_theme_mod( 'responsive_enable_transparent_header_bottom_border', 1 ) ) ? true : false;
}

/**
 * Returns the default design style
 *
 * @return string
 */
function responsive_get_default_design_style() {

	/**
	 * Filters the default design style.
	 *
	 * @since 0.1.0
	 *
	 * @param array $default_design_style The slug of the default design style.
	 */
	return (string) apply_filters( 'responsive_default_design_style', 'traditional' );

}

/**
 * Sanitize a radio field setting from the customizer.
 *
 * @param string $value   The radio field value being saved.
 * @param string $setting The name of the setting being saved.
 *
 * @return string
 */
function sanitize_radio( $value, $setting ) {

	$input = sanitize_title( $value );

	$choices = $setting->manager->get_control( $setting->id . '_control' )->choices;

	return array_key_exists( $input, $choices ) ? $input : $setting->default;

}

/**
 * Returns the default color scheme
 *
 * @return string
 */
function responsive_get_default_color_scheme() {
	/**
	 * Filters the default color scheme.
	 *
	 * @param array $default_color_scheme The slug of the default color scheme.
	 */
	return (string) apply_filters( 'responsive_default_color_scheme', 'default' );

}

/**
 * Returns the avaliable design styles.
 *
 * @return array
 */
function responsive_get_available_design_styles() {

		$default_design_styles = array(
			'playful'     => array(
				'slug'          => 'playful',
				'label'         => _x( 'Playful', 'design style name', 'responsive' ),
				'color_schemes' => array(
					'default' => array(
						'label'             => _x( 'Default', 'color palette name', 'responsive' ),
						'accent'            => '#0066CC',
						'text'              => '#333333',
						'background'        => '#ffffff',
						'alt_background'    => '#eaeaea',
						'header_background' => '#ffffff',
						'header_text'       => '#999999',
						'footer_background' => '#333333',
					),
					'one'     => array(
						'label'             => _x( 'Frolic', 'color palette name', 'responsive' ),
						'accent'            => '#3f46ae',
						'text'              => '#ecb43d',
						'alt_background'    => '#f7fbff',
						'background'        => '#ffffff',
						'header_background' => '#3f46ae',
						'header_text'       => '#fafafa',
						'footer_text'       => '#fafafa',
						'footer_background' => '#3f46ae',
					),
					'two'     => array(
						'label'             => _x( 'Coral', 'color palette name', 'responsive' ),
						'accent'            => '#e06b6d',
						'text'              => '#40896e',
						'alt_background'    => '#fff7f7',
						'background'        => '#ffffff',
						'header_background' => '#eb616a',
						'header_text'       => '#fafafa',
						'footer_text'       => '#fafafa',
						'footer_background' => '#eb616a',
					),
					'three'   => array(
						'label'             => _x( 'Organic', 'color palette name', 'responsive' ),
						'accent'            => '#3c896d',
						'text'              => '#6b0369',
						'alt_background'    => '#f2f9f7',
						'background'        => '#ffffff',
						'header_background' => '#3c896d',
						'header_text'       => '#fafafa',
						'footer_text'       => '#fafafa',
						'footer_background' => '#3c896d',
					),
					'four'    => array(
						'label'             => _x( 'Berry', 'color palette name', 'responsive' ),
						'accent'            => '#117495',
						'text'              => '#d691c1',
						'alt_background'    => '#f7feff',
						'background'        => '#ffffff',
						'header_background' => '#117495',
						'header_text'       => '#fafafa',
						'footer_text'       => '#fafafa',
						'footer_background' => '#117495',
					),
				),
			),

			'traditional' => array(
				'slug'          => 'traditional',
				'label'         => _x( 'Traditional', 'design style name', 'responsive' ),
				'color_schemes' => array(
					'one'   => array(
						'label'          => _x( 'Apricot', 'color palette name', 'responsive' ),
						'accent'         => '#c76919',
						'text'           => '#122538',
						'alt_background' => '#f8f8f8',
						'background'     => '#ffffff',
					),
					'two'   => array(
						'label'          => _x( 'Emerald', 'color palette name', 'responsive' ),
						'accent'         => '#165153',
						'text'           => '#212121',
						'alt_background' => '#f3f1f0',
						'background'     => '#ffffff',
					),
					'three' => array(
						'label'          => _x( 'Brick', 'color palette name', 'responsive' ),
						'accent'         => '#87200e',
						'text'           => '#242611',
						'alt_background' => '#f9f2ef',
						'background'     => '#ffffff',
					),
					'four'  => array(
						'label'          => _x( 'Bronze', 'color palette name', 'responsive' ),
						'accent'         => '#a88548',
						'text'           => '#05212d',
						'alt_background' => '#f9f4ef',
						'background'     => '#ffffff',
					),
				),
			),

			'modern'      => array(
				'slug'          => 'modern',
				'label'         => _x( 'Modern', 'design style name', 'responsive' ),
				'color_schemes' => array(
					'one'   => array(
						'label'          => _x( 'Shade', 'color palette name', 'responsive' ),
						'accent'         => '#000000',
						'text'           => '#455a64',
						'alt_background' => '#eceff1',
						'background'     => '#ffffff',
					),
					'two'   => array(
						'label'          => _x( 'Blush', 'color palette name', 'responsive' ),
						'accent'         => '#c2185b',
						'text'           => '#ec407a',
						'alt_background' => '#fce4ec',
						'background'     => '#ffffff',
					),
					'three' => array(
						'label'          => _x( 'Indiresponsive', 'color palette name', 'responsive' ),
						'accent'         => '#303f9f',
						'text'           => '#5c6bc0',
						'alt_background' => '#e8eaf6',
						'background'     => '#ffffff',
					),
					'four'  => array(
						'label'          => _x( 'Pacific', 'color palette name', 'responsive' ),
						'accent'         => '#00796b',
						'text'           => '#26a69a',
						'alt_background' => '#e0f2f1',
						'background'     => '#ffffff',
					),
				),
			),

			'trendy'      => array(
				'slug'          => 'trendy',
				'label'         => _x( 'Trendy', 'design style name', 'responsive' ),
				'color_schemes' => array(
					'one'   => array(
						'label'             => _x( 'Plum', 'color palette name', 'responsive' ),
						'accent'            => '#000000',
						'text'              => '#4d0859',
						'alt_background'    => '#ded9e2',
						'background'        => '#ffffff',
						'footer_background' => '#000000',
						'header_background' => '#000000',
						'header_text'       => '#ffffff',
						'footer_text'       => '#ffffff',
					),

					'two'   => array(
						'label'             => _x( 'Steel', 'color palette name', 'responsive' ),
						'accent'            => '#000000',
						'text'              => '#003c68',
						'alt_background'    => '#c0c9d0',
						'background'        => '#ffffff',
						'footer_background' => '#000000',
						'header_background' => '#000000',
						'header_text'       => '#ffffff',
						'footer_text'       => '#ffffff',
					),
					'three' => array(
						'label'             => _x( 'Avocado', 'color palette name', 'responsive' ),
						'accent'            => '#000000',
						'text'              => '#02493b',
						'alt_background'    => '#b4c6af',
						'background'        => '#ffffff',
						'footer_background' => '#000000',
						'header_background' => '#000000',
						'header_text'       => '#ffffff',
						'footer_text'       => '#ffffff',
					),
					'four'  => array(
						'label'             => _x( 'Champagne', 'color palette name', 'responsive' ),
						'accent'            => '#000000',
						'text'              => '#cc224f',
						'alt_background'    => '#e5dede',
						'background'        => '#ffffff',
						'footer_background' => '#000000',
						'header_background' => '#000000',
						'header_text'       => '#ffffff',
						'footer_text'       => '#ffffff',
					),
				),
			),

			'welcoming'   => array(
				'slug'          => 'welcoming',
				'label'         => _x( 'Welcoming', 'design style name', 'responsive' ),
				'color_schemes' => array(
					'one'   => array(
						'label'             => _x( 'Forest', 'color palette name', 'responsive' ),
						'accent'            => '#165144',
						'text'              => '#01332e',
						'alt_background'    => '#c9c9c9',
						'background'        => '#eeeeee',
						'header_background' => '#ffffff',
					),
					'two'   => array(
						'label'             => _x( 'Spruce', 'color palette name', 'responsive' ),
						'accent'            => '#233a6b',
						'text'              => '#01133d',
						'alt_background'    => '#c9c9c9',
						'background'        => '#eeeeee',
						'header_background' => '#ffffff',
					),
					'three' => array(
						'label'             => _x( 'Mocha', 'color palette name', 'responsive' ),
						'accent'            => '#5b3f20',
						'text'              => '#3f2404',
						'alt_background'    => '#c9c9c9',
						'background'        => '#eeeeee',
						'header_background' => '#ffffff',
					),
					'four'  => array(
						'label'             => _x( 'Lavender', 'color palette name', 'responsive' ),
						'accent'            => '#443a82',
						'text'              => '#2b226b',
						'alt_background'    => '#c9c9c9',
						'background'        => '#eeeeee',
						'header_background' => '#ffffff',
					),
				),
			),
		);

		/**
		 * Filters the supported design styles.
		 *
		 * @since 0.1.0
		 *
		 * @param array $design_styles Array containings the supported design styles,
		 * where the index is the slug of design style and value an array of options that sets up the design styles.
		 */
		$supported_design_styles = (array) apply_filters( 'responsive_design_styles', $default_design_styles );

		return $supported_design_styles;

}


/**
 * Returns all available color schemes for all design styles
 * in an array for use in the Customizer control.
 *
 * @return array
 */
function responsive_get_color_schemes_as_choices() {
	$design_styles = responsive_get_available_design_styles();
	$color_schemes = array();
	array_walk(
		$design_styles,
		function( $style_data, $design_style ) use ( &$color_schemes ) {
			array_walk(
				$style_data['color_schemes'],
				function( $data, $name ) use ( $design_style, &$color_schemes ) {
					$color_schemes[ "${design_style}-${name}" ] = $data;
				}
			);
		}
	);

	return $color_schemes;
}

/**
 * [responsive_number_control description]
 *
 * @param  [type] $wp_customize [description].
 * @param  [type] $element      [description].
 * @param  [type] $label        [description].
 * @param  [type] $section      [description].
 * @param  [type] $priority     [description].
 * @param  [type] $default      [description].
 * @param  [type] $active_call      [description].
 * @return void               [description].
 */
function responsive_number_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null ) {

	// Add Twitter Setting.
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => 'responsive_sanitize_number',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'active_callback' => $active_call,
				'label'           => $label,
				'priority'        => $priority,
				'section'         => $section,
				'settings'        => 'responsive_' . $element,
				'type'            => 'number',
			)
		)
	);
}
/**
 * [responsive_text_control description]
 *
 * @param  [type] $wp_customize [description].
 * @param  [type] $element      [description].
 * @param  [type] $label        [description].
 * @param  [type] $section      [description].
 * @param  [type] $priority     [description].
 * @param  [type] $default      [description].
 * @param  [type] $active_call      [description].
 * @return void               [description].
 */
function responsive_text_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null, $sanitize_function = 'sanitize_text_field', $type = 'text', $transport = 'refresh' ) {

	// Add Twitter Setting.
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => $sanitize_function,
			'transport'         => $transport,
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'active_callback' => $active_call,
				'label'           => $label,
				'priority'        => $priority,
				'section'         => $section,
				'settings'        => 'responsive_' . $element,
				'type'            => $type,
			)
		)
	);
}

/**
 * [responsive_select_control description].
 *
 * @param  [type] $wp_customize [description].
 * @param  [type] $element      [description].
 * @param  [type] $label        [description].
 * @param  [type] $section      [description].
 * @param  [type] $priority     [description].
 * @param  [type] $choices      [description].
 * @param  [type] $default      [description].
 * @param  [type] $active_call  [description].
 *
 * @return void               [description].
 */
function responsive_select_control( $wp_customize, $element, $label, $section, $priority, $choices, $default, $active_call, $transport = 'refresh', $description = '' ) {

	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => 'responsive_sanitize_select',
			'transport'         => $transport,
		)
	);
	$wp_customize->add_control(
		new Responsive_Customizer_Select_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'label'           => $label,
				'description'     => $description,
				'section'         => $section,
				'settings'        => 'responsive_' . $element,
				'priority'        => $priority,
				'active_callback' => $active_call,
				'choices'         => apply_filters( 'responsive_' . $element . '_choices', $choices ),
			)
		)
	);
}

/**
 * [responsive_active_blog_entry_content_type_excerpt description]
 *
 * @return [type] [description]
 */
function responsive_active_blog_entry_content_type_excerpt() {
	return ( 'excerpt' === get_theme_mod( 'responsive_blog_entry_content_type', 'excerpt' ) ) ? true : false;
}


/**
 * [responsive_active_blog_entry_columns_multi_column description]
 *
 * @return [type] [description]
 */
function responsive_active_blog_entry_columns_multi_column() {
	return ( 1 < get_theme_mod( 'responsive_blog_entry_columns', 1 ) ) ? true : false;
}

/**
 * [responsive_disable_menu description]
 *
 * @return [type] [description]
 */
function responsive_disabled_main_menu() {
	return ( 0 === get_theme_mod( 'responsive_disable_menu', 0 ) ) ? true : false;
}

/**
 * [responsive_disabled_mobile_menu description]
 *
 * @return [type] [description]
 */
function responsive_disabled_mobile_menu() {
	return ( ( 0 === get_theme_mod( 'responsive_disable_menu', 0 ) ) && ( 1 === get_theme_mod( 'responsive_disable_mobile_menu', 1 ) ) ) ? true : false;
}
/**
 * Toggle style if outline border color control.
 *
 * @return void
 */
function responsive_toggle_border_color() {
	return ( 0 === get_theme_mod( 'responsive_disable_menu', 0 ) && 1 === get_theme_mod( 'responsive_disable_mobile_menu', 1 ) && 'outline' === get_theme_mod( 'responsive_mobile_menu_toggle_style', 'fill' ) ) ? true : false;
}
/**
 * Toggle style if outline & fill border radius control.
 *
 * @return void
 */
function responsive_toggle_border_radius() {
	return ( ( 'outline' === get_theme_mod( 'responsive_mobile_menu_toggle_style', 'fill' ) || 'fill' === get_theme_mod( 'responsive_mobile_menu_toggle_style', 'fill' ) ) && 1 === get_theme_mod( 'responsive_disable_mobile_menu', 1 ) && 0 === get_theme_mod( 'responsive_disable_menu', 0 ) ) ? true : false;
}

/**
 * [responsive_custom_home_active description]
 *
 * @return [type] [description]
 */
function responsive_custom_home_active() {
	$responsive_options = Responsive\Core\responsive_get_options();

	return ( $responsive_options['front_page'] ) ? true : false;
}

/**
 * [responsive_last_item_in_menu_active]
 *
 * @return [type] [description]
 */
function responsive_last_item_in_menu_active() {
	return ( 'none' !== get_theme_mod( 'responsive_menu_last_item' ) && 0 === get_theme_mod( 'responsive_disable_menu', 0 ) ) ? true : false;
}

/**
 * [responsive_last_item_in_menu_and_mobile_menu_enabled description]
 *
 * @return [type] [description]
 */
function responsive_last_item_in_menu_and_mobile_menu_enabled() {
	return ( 0 === get_theme_mod( 'responsive_disable_menu', 0 ) && 1 === get_theme_mod( 'responsive_disable_mobile_menu', 1 ) && 'none' !== get_theme_mod( 'responsive_menu_last_item' ) ) ? true : false;
}

/**
 * [responsive_menu_last_item_cta description]
 *
 * @return [type] [description]
 */
function responsive_menu_last_item_cta() {
	return ( 'button' === get_theme_mod( 'responsive_menu_last_item', 'none' ) ) ? true : false;
}

/**
 * [responsive_menu_last_item_text description]
 *
 * @return [type] [description]
 */
function responsive_menu_last_item_text() {
	return ( 'text-html' === get_theme_mod( 'responsive_menu_last_item', 'none' ) ) ? true : false;
}

/**
 * [responsive_checkbox_control description]
 *
 * @param  [type] $wp_customize [description].
 * @param  [type] $element      [description].
 * @param  [type] $label        [description].
 * @param  [type] $section      [description].
 * @param  [type] $priority     [description].
 * @param  [type] $default      [description].
 * @param  [type] $active_call  [description].
 * @return void               [description].
 */
function responsive_checkbox_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null, $transport = 'refresh', $desc = '' ) {

	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => 'responsive_checkbox_validate',
			'transport'         => $transport,
		)
	);
	if ( class_exists( 'Responsive_Addons_Pro' ) ) {
		$plugin_path            = WP_PLUGIN_DIR . '/responsive-addons-pro/responsive-addons-pro.php';
		$plugin_info            = get_plugin_data( $plugin_path );
		$responsive_pro_version = $plugin_info['Version'];
		$compare                = version_compare( $responsive_pro_version, RESPONSIVE_PRO_OLDER_VERSION_CHECK );
		if ( -1 === $compare ) {
			$wp_customize->add_control(
				'responsive_' . $element,
				array(
					'label'           => $label,
					'section'         => $section,
					'settings'        => 'responsive_' . $element,
					'type'            => 'checkbox',
					'priority'        => $priority,
					'active_callback' => $active_call,
					'description'     => $desc,
				)
			);
		} else {
			$wp_customize->add_control(
				new Responsive_Customizer_Checkbox_Control(
					$wp_customize,
					'responsive_' . $element,
					array(
						'label'           => $label,
						'section'         => $section,
						'settings'        => 'responsive_' . $element,
						'priority'        => $priority,
						'active_callback' => $active_call,
						'description'     => $desc,
					)
				)
			);
		}
	} else {
		$wp_customize->add_control(
			new Responsive_Customizer_Checkbox_Control(
				$wp_customize,
				'responsive_' . $element,
				array(
					'label'           => $label,
					'section'         => $section,
					'settings'        => 'responsive_' . $element,
					'priority'        => $priority,
					'active_callback' => $active_call,
					'description'     => $desc,
				)
			)
		);
	}
}

/**
 * [responsive_redirect_control description]
 *
 * @param  [type] $wp_customize [description].
 * @param  [type] $element      [description].
 * @param  [type] $label        [description].
 * @param  [type] $section      [description].
 * @param  [type] $priority     [description].
 * @param  [type] $value        [description].
 * @param  [type] $active_call  [description].
 * @return void                 [description].
 */
function responsive_redirect_control( $wp_customize, $element, $label, $section, $priority, $linktype, $linkval, $active_call = null ) {
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_redirect_sanitize_link',
		)
	);

	$wp_customize->add_control(
		new Responsive_Customizer_Redirect_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'label'           => $label,
				'section'         => $section,
				'settings'        => 'responsive_' . $element,
				'priority'        => $priority,
				'active_callback' => $active_call,
				'link_type'       => $linktype,
				'linked'          => $linkval,
			)
		)
	);
}

/**
 * Check if off canvas is active
 *
 * @return void
 */
function enable_off_canvas_filter_check() {
	return ( 0 !== get_theme_mod( 'responsive_enable_off_canvas_filter', 0 ) ) ? true : false;
}
/**
 * Check if off canvas close button is active
 *
 * @return void
 */
function enable_enable_off_canvas_close_btn() {
	return ( 0 !== get_theme_mod( 'responsive_enable_off_canvas_close_btn', 0 ) ) ? true : false;
}

if ( ! function_exists( 'responsive_hamburger_off_canvas_btn_label_text_label' ) ) {
	/**
	 * Returns hamburger menu label value
	 */
	function responsive_hamburger_off_canvas_btn_label_text_label() {
		$hamburger_off_canvas_btn_label_text_label = get_theme_mod( 'responsive_hamburger_off_canvas_btn_label_text', 'Filter' );
		return $hamburger_off_canvas_btn_label_text_label;
	}
}
