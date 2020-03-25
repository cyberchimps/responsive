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


	/**
	* Returns blog single meta
	*
	* @since 1.0.5.1
	*/
if ( ! function_exists( 'responsive_blog_single_meta' ) ) {
	/** Function to display blog */
	function responsive_blog_single_meta() {

		/** Default sections */
		$sections = array( 'author', 'date', 'categories', 'comments' );

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
add_filter( 'excerpt_more', 'responsive_post_link' );

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
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_left_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);

	$wp_customize->add_setting(
		'responsive_' . $element . '_bottom_padding',
		array(
			'transport'         => 'refesh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_right_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_top_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_right_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_bottom_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_left_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);

	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_top_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_right_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_bottom_padding',
		array(
			'transport'         => 'refresh',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_left_padding',
		array(
			'transport'         => 'refresh',
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
function responsive_drag_number_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null, $max = 4096, $min = 1 ) {

	/**
	 * Main Container Width
	 */
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'transport'         => 'refresh',
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
					'step' => 1,
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
 * [responsive_active_sidebar_menu description].
 *
 * @return [type] [description]
 */
function responsive_active_sidebar_menu() {

	return ( 'sidebar' === get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' ) ) ? true : false;
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
	return ( 0 === $responsive_options['breadcrumb'] ) ? true : false;

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
function responsive_text_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null ) {

	// Add Twitter Setting.
	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => 'sanitize_text_field',
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
				'type'            => 'text',
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
function responsive_select_control( $wp_customize, $element, $label, $section, $priority, $choices, $default, $active_call ) {

	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => 'responsive_sanitize_select',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'responsive_' . $element,
		array(
			'label'           => $label,
			'section'         => $section,
			'settings'        => 'responsive_' . $element,
			'type'            => 'select',
			'priority'        => $priority,
			'active_callback' => $active_call,
			'choices'         => apply_filters( 'responsive_' . $element . '_choices', $choices ),
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
 * [responsive_disabled_mobile_menu description]
 *
 * @return [type] [description]
 */
function responsive_disabled_mobile_menu() {
	return ( 1 === get_theme_mod( 'responsive_disable_mobile_menu', 1 ) ) ? true : false;
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
function responsive_checkbox_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null ) {

	$wp_customize->add_setting(
		'responsive_' . $element,
		array(
			'default'           => $default,
			'sanitize_callback' => 'responsive_checkbox_validate',
		)
	);
	$wp_customize->add_control(
		'responsive_' . $element,
		array(
			'label'           => $label,
			'section'         => $section,
			'settings'        => 'responsive_' . $element,
			'type'            => 'checkbox',
			'priority'        => $priority,
			'active_callback' => $active_call,
		)
	);
}
