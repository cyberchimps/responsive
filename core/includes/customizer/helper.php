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
if ( ! function_exists( 'responsive_mobile_trigger_label' ) ) {
	/**
	 * Returns hamburger menu label value
	 */
	function responsive_mobile_trigger_label() {
		$hamburger_menu_label_set_value = get_theme_mod( 'responsive_mobile_trigger_label', '' );
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
 * Responsive_margin_control.
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
function responsive_margin_control( $wp_customize, $element, $section, $priority, $default_values_y = '', $default_values_x = '', $active_call = null, $label = 'Margin (px)' ) {
	/**
	 *  Margin control.
	 */
	$wp_customize->add_setting(
		'responsive_' . $element . '_top_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_left_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);

	$wp_customize->add_setting(
		'responsive_' . $element . '_bottom_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_right_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_top_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_right_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_bottom_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_tablet_left_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);

	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_top_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_right_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_bottom_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_y,
		)
	);
	$wp_customize->add_setting(
		'responsive_' . $element . '_mobile_left_margin',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'responsive_sanitize_number',
			'default'           => $default_values_x,
		)
	);
	$wp_customize->add_control(
		new Responsive_Customizer_Dimensions_Control(
			$wp_customize,
			'responsive_' . $element . '_margin',
			array(
				'label'           => $label,
				'section'         => $section,
				'settings'        => array(
					'desktop_top'    => 'responsive_' . $element . '_top_margin',
					'desktop_right'  => 'responsive_' . $element . '_right_margin',
					'desktop_bottom' => 'responsive_' . $element . '_bottom_margin',
					'desktop_left'   => 'responsive_' . $element . '_left_margin',
					'tablet_top'     => 'responsive_' . $element . '_tablet_top_margin',
					'tablet_right'   => 'responsive_' . $element . '_tablet_right_margin',
					'tablet_bottom'  => 'responsive_' . $element . '_tablet_bottom_margin',
					'tablet_left'    => 'responsive_' . $element . '_tablet_left_margin',
					'mobile_top'     => 'responsive_' . $element . '_mobile_top_margin',
					'mobile_right'   => 'responsive_' . $element . '_mobile_right_margin',
					'mobile_bottom'  => 'responsive_' . $element . '_mobile_bottom_margin',
					'mobile_left'    => 'responsive_' . $element . '_mobile_left_margin',
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
 * [responsive_editor_control description]
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
function responsive_editor_control( $wp_customize, $element, $label, $section, $priority, $default, $active_call = null, $sanitize_function = 'wp_kses_post', $transport = 'refresh' ) {

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
		new Responsive_Customizer_Editor_Control(
			$wp_customize,
			'responsive_' . $element,
			array(
				'active_callback' => $active_call,
				'label'           => $label,
				'priority'        => $priority,
				'section'         => $section,
				'settings'        => 'responsive_' . $element,
				'type'            => 'responsive_editor_control',
				'input_attrs'     => array(
					'id' => 'responsive_' . $element,
				),
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
 * [responsive_header_cart_style description]
 *
 * @return [type] [description]
 */
function responsive_header_cart_style() {
	return ( 'slide' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ) ? true : false;
}
/**
 * [responsive_header_mobile_cart_style description]
 *
 * @return [type] [description]
 */
function responsive_header_mobile_cart_style() {
	return ( 'slide' === get_theme_mod( 'responsive_header_mobile_cart_style', 'link' ) ) ? true : false;
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
/**
 * Check if sidepanel is active
 *
 * @return bool
 */
function is_sidepanel_active() {
	return ( 'sidepanel' === get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ) ? true : false;
}
/**
 * Check if sidepanel is active
 *
 * @return bool
 */
function is_fullwidth_active() {
	return ( 'fullwidth' === get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ) ? true : false;
}
/**
 * Check if sidepanel is active
 *
 * @return bool
 */
function is_menu_collapsible() {
	return get_theme_mod( 'responsive_mobile_navigation_collapse', true ) ? true : false;
}

/**
 * Check if stretch primary navigation is active
 *
 * @return bool
 */
function is_stretch_primary_navigation() {
	return get_theme_mod( 'responsive_stretch_primary_navigation', true ) ? true : false;
}
/**
 * Check if stretch secondary navigation is active
 *
 * @return bool
 */
function is_stretch_secondary_navigation() {
	return get_theme_mod( 'responsive_stretch_secondary_navigation', true ) ? true : false;
}

/**
 * Check if Header Search Style is Outline
 *
 * @return bool
 */
function is_header_search_style_bordered() {
	return get_theme_mod( 'responsive_header_search_style', 'outline' ) === 'bordered' ? true : false;
}

/**
 * Get an SVG Icon
 *
 * @param string $icon the icon name.
 * @param string $icon_title the icon title for screen readers.
 * @param bool   $base if the baseline class should be added.
 */
function get_icon( $icon = 'search', $icon_title = '', $base = true, $aria = false ) {
	$display_title = apply_filters( 'responsive_svg_icons_have_title', true );
	$output        = '<span class="responsive-svg-iconset' . ( $base ? ' svg-baseline' : '' ) . '">';
	switch ( $icon ) {
		case 'moon':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-moon-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Dark Mode', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
				</svg>';
			break;
		case 'moonAlt':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-moon-alt-svg" fill="currentColor" version="1.1" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Dark Mode', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M11.185 1.008c-0.941-0.543-1.947-0.874-2.962-1.008 1.921 2.501 2.262 6.012 0.587 8.913s-4.886 4.361-8.012 3.948c0.623 0.812 1.412 1.518 2.354 2.061 3.842 2.218 8.756 0.902 10.974-2.941s0.902-8.756-2.94-10.974z"></path>
				</svg>';
			break;
		case 'sun':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-sun-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Light Mode', 'responsive' ) ) . '</title>';
			}
			$output .= '<circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
				</svg>';
			break;
		case 'sunAlt':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-sun-alt-svg" fill="currentColor" version="1.1" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Light Mode', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 4c-2.209 0-4 1.791-4 4s1.791 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zM8 13c0.552 0 1 0.448 1 1v1c0 0.552-0.448 1-1 1s-1-0.448-1-1v-1c0-0.552 0.448-1 1-1zM8 3c-0.552 0-1-0.448-1-1v-1c0-0.552 0.448-1 1-1s1 0.448 1 1v1c0 0.552-0.448 1-1 1zM15 7c0.552 0 1 0.448 1 1s-0.448 1-1 1h-1c-0.552 0-1-0.448-1-1s0.448-1 1-1h1zM3 8c0 0.552-0.448 1-1 1h-1c-0.552 0-1-0.448-1-1s0.448-1 1-1h1c0.552 0 1 0.448 1 1zM12.95 11.536l0.707 0.707c0.39 0.39 0.39 1.024 0 1.414s-1.024 0.39-1.414 0l-0.707-0.707c-0.39-0.39-0.39-1.024 0-1.414s1.024-0.39 1.414 0zM3.050 4.464l-0.707-0.707c-0.391-0.391-0.391-1.024 0-1.414s1.024-0.391 1.414 0l0.707 0.707c0.391 0.391 0.391 1.024 0 1.414s-1.024 0.391-1.414 0zM12.95 4.464c-0.39 0.391-1.024 0.391-1.414 0s-0.39-1.024 0-1.414l0.707-0.707c0.39-0.391 1.024-0.391 1.414 0s0.39 1.024 0 1.414l-0.707 0.707zM3.050 11.536c0.39-0.39 1.024-0.39 1.414 0s0.391 1.024 0 1.414l-0.707 0.707c-0.391 0.39-1.024 0.39-1.414 0s-0.391-1.024 0-1.414l0.707-0.707z"></path>
				</svg>';
			break;
		case 'sunrise':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-sunrise-svg" fill="currentColor" version="1.1" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Light Mode', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M18 18c0-1.657-0.673-3.158-1.757-4.243s-2.586-1.757-4.243-1.757-3.158 0.673-4.243 1.757-1.757 2.586-1.757 4.243c0 0.552 0.448 1 1 1s1-0.448 1-1c0-1.105 0.447-2.103 1.172-2.828s1.723-1.172 2.828-1.172 2.103 0.447 2.828 1.172 1.172 1.723 1.172 2.828c0 0.552 0.448 1 1 1s1-0.448 1-1zM3.513 10.927l1.42 1.42c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-1.42-1.42c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414zM1 19h2c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2c-0.552 0-1 0.448-1 1s0.448 1 1 1zM21 19h2c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2c-0.552 0-1 0.448-1 1s0.448 1 1 1zM19.067 12.347l1.42-1.42c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-1.42 1.42c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0zM23 21h-22c-0.552 0-1 0.448-1 1s0.448 1 1 1h22c0.552 0 1-0.448 1-1s-0.448-1-1-1zM8.707 6.707l2.293-2.293v4.586c0 0.552 0.448 1 1 1s1-0.448 1-1v-4.586l2.293 2.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-4-4c-0.092-0.092-0.202-0.166-0.324-0.217-0.245-0.101-0.521-0.101-0.766 0-0.118 0.049-0.228 0.121-0.324 0.217l-4 4c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0z"></path>
				</svg>';
			break;
		case 'sunset':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-sunset-svg" fill="currentColor" version="1.1" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Dark Mode', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M18 18c0-1.657-0.673-3.158-1.757-4.243s-2.586-1.757-4.243-1.757-3.158 0.673-4.243 1.757-1.757 2.586-1.757 4.243c0 0.552 0.448 1 1 1s1-0.448 1-1c0-1.105 0.447-2.103 1.172-2.828s1.723-1.172 2.828-1.172 2.103 0.447 2.828 1.172 1.172 1.723 1.172 2.828c0 0.552 0.448 1 1 1s1-0.448 1-1zM3.513 10.927l1.42 1.42c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-1.42-1.42c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414zM1 19h2c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2c-0.552 0-1 0.448-1 1s0.448 1 1 1zM21 19h2c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2c-0.552 0-1 0.448-1 1s0.448 1 1 1zM19.067 12.347l1.42-1.42c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-1.42 1.42c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0zM23 21h-22c-0.552 0-1 0.448-1 1s0.448 1 1 1h22c0.552 0 1-0.448 1-1s-0.448-1-1-1zM15.293 4.293l-2.293 2.293v-4.586c0-0.552-0.448-1-1-1s-1 0.448-1 1v4.586l-2.293-2.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414l4 4c0.096 0.096 0.206 0.168 0.324 0.217s0.247 0.076 0.383 0.076 0.265-0.027 0.383-0.076c0.118-0.049 0.228-0.121 0.324-0.217l4-4c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0z"></path>
				</svg>';
			break;
		case 'settings':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-settings-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Settings', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M29.181 19.070c-1.679-2.908-0.669-6.634 2.255-8.328l-3.145-5.447c-0.898 0.527-1.943 0.829-3.058 0.829-3.361 0-6.085-2.742-6.085-6.125h-6.289c0.008 1.044-0.252 2.103-0.811 3.070-1.679 2.908-5.411 3.897-8.339 2.211l-3.144 5.447c0.905 0.515 1.689 1.268 2.246 2.234 1.676 2.903 0.672 6.623-2.241 8.319l3.145 5.447c0.895-0.522 1.935-0.82 3.044-0.82 3.35 0 6.067 2.725 6.084 6.092h6.289c-0.003-1.034 0.259-2.080 0.811-3.038 1.676-2.903 5.399-3.894 8.325-2.219l3.145-5.447c-0.899-0.515-1.678-1.266-2.232-2.226zM16 22.479c-3.578 0-6.479-2.901-6.479-6.479s2.901-6.479 6.479-6.479c3.578 0 6.479 2.901 6.479 6.479s-2.901 6.479-6.479 6.479z"></path>
				</svg>';
			break;
		case 'home':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-home-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Home', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M9.984 20.016h-4.969v-8.016h-3l9.984-9 9.984 9h-3v8.016h-4.969v-6h-4.031v6z"></path>
				</svg>';
			break;
		case 'search':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-search-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Search', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M18 13c0-3.859-3.141-7-7-7s-7 3.141-7 7 3.141 7 7 7 7-3.141 7-7zM26 26c0 1.094-0.906 2-2 2-0.531 0-1.047-0.219-1.406-0.594l-5.359-5.344c-1.828 1.266-4.016 1.937-6.234 1.937-6.078 0-11-4.922-11-11s4.922-11 11-11 11 4.922 11 11c0 2.219-0.672 4.406-1.937 6.234l5.359 5.359c0.359 0.359 0.578 0.875 0.578 1.406z"></path>
				</svg>';
			break;
		case 'search2':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-search2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Search', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path>
				</svg>';
			break;
		case 'zoom':
			$output .= '<svg class="responsive-svg-icon responsive-zoom-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Zoom In', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M18 13c0-3.859-3.141-7-7-7s-7 3.141-7 7 3.141 7 7 7 7-3.141 7-7zM26 26c0 1.094-0.906 2-2 2-0.531 0-1.047-0.219-1.406-0.594l-5.359-5.344c-1.828 1.266-4.016 1.937-6.234 1.937-6.078 0-11-4.922-11-11s4.922-11 11-11 11 4.922 11 11c0 2.219-0.672 4.406-1.937 6.234l5.359 5.359c0.359 0.359 0.578 0.875 0.578 1.406z"></path>
				</svg>';
			break;
		case 'bag':
			$output .= '<svg class="responsive-svg-icon responsive-bag-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Bag', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M11 3v-0.5c0-1.381-1.119-2.5-2.5-2.5-0.563 0-1.082 0.186-1.5 0.5-0.418-0.314-0.937-0.5-1.5-0.5-1.381 0-2.5 1.119-2.5 2.5v1.7l-2 0.3v10.5h2l1 1 10-1.5v-10.5l-3-1zM3 14h-1v-8.639l1-0.15v8.789zM8.5 1c0.827 0 1.5 0.673 1.5 1.5v0.65l-2 0.3v-0.95c0-0.454-0.122-0.88-0.333-1.247 0.239-0.16 0.525-0.253 0.833-0.253zM4 2.5c0-0.827 0.673-1.5 1.5-1.5 0.308 0 0.595 0.093 0.833 0.253-0.212 0.367-0.333 0.792-0.333 1.247v1.25l-2 0.3v-1.55zM13 13.639l-8 1.2v-8.478l8-1.2v8.478z"></path>
				</svg>';
			break;
		case 'facebook':
			$output .= '<svg class="responsive-svg-icon responsive-facebook-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Facebook', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M19.5 2c2.484 0 4.5 2.016 4.5 4.5v15c0 2.484-2.016 4.5-4.5 4.5h-2.938v-9.297h3.109l0.469-3.625h-3.578v-2.312c0-1.047 0.281-1.75 1.797-1.75l1.906-0.016v-3.234c-0.328-0.047-1.469-0.141-2.781-0.141-2.766 0-4.672 1.687-4.672 4.781v2.672h-3.125v3.625h3.125v9.297h-8.313c-2.484 0-4.5-2.016-4.5-4.5v-15c0-2.484 2.016-4.5 4.5-4.5h15z"></path>
				</svg>';
			break;
		case 'facebookAlt':
			$output .= '<svg class="responsive-svg-icon responsive-facebook-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Facebook', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M17 3v2h-2c-0.552 0-1.053 0.225-1.414 0.586s-0.586 0.862-0.586 1.414v3c0 0.552 0.448 1 1 1h2.719l-0.5 2h-2.219c-0.552 0-1 0.448-1 1v7h-2v-7c0-0.552-0.448-1-1-1h-2v-2h2c0.552 0 1-0.448 1-1v-3c0-1.105 0.447-2.103 1.172-2.828s1.723-1.172 2.828-1.172zM18 1h-3c-1.657 0-3.158 0.673-4.243 1.757s-1.757 2.586-1.757 4.243v2h-2c-0.552 0-1 0.448-1 1v4c0 0.552 0.448 1 1 1h2v7c0 0.552 0.448 1 1 1h4c0.552 0 1-0.448 1-1v-7h2c0.466 0 0.858-0.319 0.97-0.757l1-4c0.134-0.536-0.192-1.079-0.728-1.213-0.083-0.021-0.167-0.031-0.242-0.030h-3v-2h3c0.552 0 1-0.448 1-1v-4c0-0.552-0.448-1-1-1z"></path>
				</svg>';
			break;
		case 'facebookAlt2':
			$output .= '<svg class="responsive-svg-icon responsive-facebook-alt2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="28" viewBox="0 0 16 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Facebook', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14.984 0.187v4.125h-2.453c-1.922 0-2.281 0.922-2.281 2.25v2.953h4.578l-0.609 4.625h-3.969v11.859h-4.781v-11.859h-3.984v-4.625h3.984v-3.406c0-3.953 2.422-6.109 5.953-6.109 1.687 0 3.141 0.125 3.563 0.187z"></path>
				</svg>';
			break;
		case 'twitter':
			$output .= '<svg class="responsive-svg-icon responsive-twitter-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Twitter', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M25.312 6.375c-0.688 1-1.547 1.891-2.531 2.609 0.016 0.219 0.016 0.438 0.016 0.656 0 6.672-5.078 14.359-14.359 14.359-2.859 0-5.516-0.828-7.75-2.266 0.406 0.047 0.797 0.063 1.219 0.063 2.359 0 4.531-0.797 6.266-2.156-2.219-0.047-4.078-1.5-4.719-3.5 0.313 0.047 0.625 0.078 0.953 0.078 0.453 0 0.906-0.063 1.328-0.172-2.312-0.469-4.047-2.5-4.047-4.953v-0.063c0.672 0.375 1.453 0.609 2.281 0.641-1.359-0.906-2.25-2.453-2.25-4.203 0-0.938 0.25-1.797 0.688-2.547 2.484 3.062 6.219 5.063 10.406 5.281-0.078-0.375-0.125-0.766-0.125-1.156 0-2.781 2.25-5.047 5.047-5.047 1.453 0 2.766 0.609 3.687 1.594 1.141-0.219 2.234-0.641 3.203-1.219-0.375 1.172-1.172 2.156-2.219 2.781 1.016-0.109 2-0.391 2.906-0.781z"></path>
				</svg>';
			break;
		case 'twitterAlt':
			$output .= '<svg class="responsive-svg-icon responsive-twitter-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Twitter', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M20.833 5.262c-0.186 0.242-0.391 0.475-0.616 0.696-0.233 0.232-0.347 0.567-0.278 0.908 0.037 0.182 0.060 0.404 0.061 0.634 0 5.256-2.429 8.971-5.81 10.898-2.647 1.509-5.938 1.955-9.222 1.12 1.245-0.361 2.46-0.921 3.593-1.69 0.147-0.099 0.273-0.243 0.352-0.421 0.224-0.505-0.003-1.096-0.508-1.32-2.774-1.233-4.13-2.931-4.769-4.593-0.417-1.084-0.546-2.198-0.52-3.227 0.021-0.811 0.138-1.56 0.278-2.182 0.394 0.343 0.803 0.706 1.235 1.038 2.051 1.577 4.624 2.479 7.395 2.407 0.543-0.015 0.976-0.457 0.976-1v-1.011c-0.002-0.179 0.009-0.357 0.034-0.533 0.113-0.806 0.504-1.569 1.162-2.141 0.725-0.631 1.636-0.908 2.526-0.846s1.753 0.463 2.384 1.188c0.252 0.286 0.649 0.416 1.033 0.304 0.231-0.067 0.463-0.143 0.695-0.228zM22.424 2.183c-0.74 0.522-1.523 0.926-2.287 1.205-0.931-0.836-2.091-1.302-3.276-1.385-1.398-0.097-2.836 0.339-3.977 1.332-1.036 0.901-1.652 2.108-1.83 3.372-0.037 0.265-0.055 0.532-0.054 0.8-1.922-0.142-3.693-0.85-5.15-1.97-0.775-0.596-1.462-1.309-2.034-2.116-0.32-0.45-0.944-0.557-1.394-0.237-0.154 0.109-0.267 0.253-0.335 0.409 0 0-0.132 0.299-0.285 0.76-0.112 0.337-0.241 0.775-0.357 1.29-0.163 0.722-0.302 1.602-0.326 2.571-0.031 1.227 0.12 2.612 0.652 3.996 0.683 1.775 1.966 3.478 4.147 4.823-1.569 0.726-3.245 1.039-4.873 0.967-0.552-0.024-1.019 0.403-1.043 0.955-0.017 0.389 0.19 0.736 0.513 0.918 4.905 2.725 10.426 2.678 14.666 0.261 4.040-2.301 6.819-6.7 6.819-12.634-0.001-0.167-0.008-0.33-0.023-0.489 1.006-1.115 1.676-2.429 1.996-3.781 0.127-0.537-0.206-1.076-0.743-1.203-0.29-0.069-0.58-0.003-0.807 0.156z"></path>
				</svg>';
			break;
		case 'tiktok':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-tiktok-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'TikTok', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M16.707 0.027c1.747-0.027 3.48-0.013 5.213-0.027 0.107 2.040 0.84 4.12 2.333 5.56 1.493 1.48 3.6 2.16 5.653 2.387v5.373c-1.92-0.067-3.853-0.467-5.6-1.293-0.76-0.347-1.467-0.787-2.16-1.24-0.013 3.893 0.013 7.787-0.027 11.667-0.107 1.867-0.72 3.72-1.8 5.253-1.747 2.56-4.773 4.227-7.88 4.28-1.907 0.107-3.813-0.413-5.44-1.373-2.693-1.587-4.587-4.493-4.867-7.613-0.027-0.667-0.040-1.333-0.013-1.987 0.24-2.533 1.493-4.96 3.44-6.613 2.213-1.92 5.307-2.84 8.2-2.293 0.027 1.973-0.053 3.947-0.053 5.92-1.32-0.427-2.867-0.307-4.027 0.493-0.84 0.547-1.48 1.387-1.813 2.333-0.28 0.68-0.2 1.427-0.187 2.147 0.32 2.187 2.427 4.027 4.667 3.827 1.493-0.013 2.92-0.88 3.693-2.147 0.253-0.44 0.533-0.893 0.547-1.413 0.133-2.387 0.080-4.76 0.093-7.147 0.013-5.373-0.013-10.733 0.027-16.093z"></path>
				</svg>';
			break;
		case 'discord':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-discord-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Discord', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M13.92 13.853c-0.76 0-1.36 0.667-1.36 1.48s0.613 1.48 1.36 1.48c0.76 0 1.36-0.667 1.36-1.48 0.013-0.813-0.6-1.48-1.36-1.48zM18.787 13.853c-0.76 0-1.36 0.667-1.36 1.48s0.613 1.48 1.36 1.48c0.76 0 1.36-0.667 1.36-1.48s-0.6-1.48-1.36-1.48z"></path>
				<path d="M25.267 2.667h-17.867c-1.507 0-2.733 1.227-2.733 2.747v18.027c0 1.52 1.227 2.747 2.733 2.747h15.12l-0.707-2.467 1.707 1.587 1.613 1.493 2.867 2.533v-23.92c0-1.52-1.227-2.747-2.733-2.747zM20.12 20.080s-0.48-0.573-0.88-1.080c1.747-0.493 2.413-1.587 2.413-1.587-0.547 0.36-1.067 0.613-1.533 0.787-0.667 0.28-1.307 0.467-1.933 0.573-1.28 0.24-2.453 0.173-3.453-0.013-0.76-0.147-1.413-0.36-1.96-0.573-0.307-0.12-0.64-0.267-0.973-0.453-0.040-0.027-0.080-0.040-0.12-0.067-0.027-0.013-0.040-0.027-0.053-0.040-0.24-0.133-0.373-0.227-0.373-0.227s0.64 1.067 2.333 1.573c-0.4 0.507-0.893 1.107-0.893 1.107-2.947-0.093-4.067-2.027-4.067-2.027 0-4.293 1.92-7.773 1.92-7.773 1.92-1.44 3.747-1.4 3.747-1.4l0.133 0.16c-2.4 0.693-3.507 1.747-3.507 1.747s0.293-0.16 0.787-0.387c1.427-0.627 2.56-0.8 3.027-0.84 0.080-0.013 0.147-0.027 0.227-0.027 0.813-0.107 1.733-0.133 2.693-0.027 1.267 0.147 2.627 0.52 4.013 1.28 0 0-1.053-1-3.32-1.693l0.187-0.213s1.827-0.040 3.747 1.4c0 0 1.92 3.48 1.92 7.773 0 0-1.133 1.933-4.080 2.027z"></path>
				</svg>';
			break;
		case 'instagram':
			$output .= '<svg class="responsive-svg-icon responsive-instagram-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Instagram', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M21.138 0.242c3.767 0.007 3.914 0.038 4.65 0.144 1.52 0.219 2.795 0.825 3.837 1.821 0.584 0.562 0.987 1.112 1.349 1.848 0.442 0.899 0.659 1.75 0.758 3.016 0.021 0.271 0.031 4.592 0.031 8.916s-0.009 8.652-0.030 8.924c-0.098 1.245-0.315 2.104-0.743 2.986-0.851 1.755-2.415 3.035-4.303 3.522-0.685 0.177-1.304 0.26-2.371 0.31-0.381 0.019-4.361 0.024-8.342 0.024s-7.959-0.012-8.349-0.029c-0.921-0.044-1.639-0.136-2.288-0.303-1.876-0.485-3.469-1.784-4.303-3.515-0.436-0.904-0.642-1.731-0.751-3.045-0.031-0.373-0.039-2.296-0.039-8.87 0-2.215-0.002-3.866 0-5.121 0.006-3.764 0.037-3.915 0.144-4.652 0.219-1.518 0.825-2.795 1.825-3.833 0.549-0.569 1.105-0.975 1.811-1.326 0.915-0.456 1.756-0.668 3.106-0.781 0.374-0.031 2.298-0.038 8.878-0.038h5.13zM15.999 4.364v0c-3.159 0-3.555 0.014-4.796 0.070-1.239 0.057-2.084 0.253-2.824 0.541-0.765 0.297-1.415 0.695-2.061 1.342s-1.045 1.296-1.343 2.061c-0.288 0.74-0.485 1.586-0.541 2.824-0.056 1.241-0.070 1.638-0.070 4.798s0.014 3.556 0.070 4.797c0.057 1.239 0.253 2.084 0.541 2.824 0.297 0.765 0.695 1.415 1.342 2.061s1.296 1.046 2.061 1.343c0.74 0.288 1.586 0.484 2.825 0.541 1.241 0.056 1.638 0.070 4.798 0.070s3.556-0.014 4.797-0.070c1.239-0.057 2.085-0.253 2.826-0.541 0.765-0.297 1.413-0.696 2.060-1.343s1.045-1.296 1.343-2.061c0.286-0.74 0.482-1.586 0.541-2.824 0.056-1.241 0.070-1.637 0.070-4.797s-0.015-3.557-0.070-4.798c-0.058-1.239-0.255-2.084-0.541-2.824-0.298-0.765-0.696-1.415-1.343-2.061s-1.295-1.045-2.061-1.342c-0.742-0.288-1.588-0.484-2.827-0.541-1.241-0.056-1.636-0.070-4.796-0.070zM14.957 6.461c0.31-0 0.655 0 1.044 0 3.107 0 3.475 0.011 4.702 0.067 1.135 0.052 1.75 0.241 2.16 0.401 0.543 0.211 0.93 0.463 1.337 0.87s0.659 0.795 0.871 1.338c0.159 0.41 0.349 1.025 0.401 2.16 0.056 1.227 0.068 1.595 0.068 4.701s-0.012 3.474-0.068 4.701c-0.052 1.135-0.241 1.75-0.401 2.16-0.211 0.543-0.463 0.93-0.871 1.337s-0.794 0.659-1.337 0.87c-0.41 0.16-1.026 0.349-2.16 0.401-1.227 0.056-1.595 0.068-4.702 0.068s-3.475-0.012-4.702-0.068c-1.135-0.052-1.75-0.242-2.161-0.401-0.543-0.211-0.931-0.463-1.338-0.87s-0.659-0.794-0.871-1.337c-0.159-0.41-0.349-1.025-0.401-2.16-0.056-1.227-0.067-1.595-0.067-4.703s0.011-3.474 0.067-4.701c0.052-1.135 0.241-1.75 0.401-2.16 0.211-0.543 0.463-0.931 0.871-1.338s0.795-0.659 1.338-0.871c0.41-0.16 1.026-0.349 2.161-0.401 1.073-0.048 1.489-0.063 3.658-0.065v0.003zM16.001 10.024c-3.3 0-5.976 2.676-5.976 5.976s2.676 5.975 5.976 5.975c3.3 0 5.975-2.674 5.975-5.975s-2.675-5.976-5.975-5.976zM16.001 12.121c2.142 0 3.879 1.736 3.879 3.879s-1.737 3.879-3.879 3.879c-2.142 0-3.879-1.737-3.879-3.879s1.736-3.879 3.879-3.879zM22.212 8.393c-0.771 0-1.396 0.625-1.396 1.396s0.625 1.396 1.396 1.396 1.396-0.625 1.396-1.396c0-0.771-0.625-1.396-1.396-1.396v0.001z"></path>
				</svg>';
			break;
		case 'instagramAlt':
			$output .= '<svg class="responsive-svg-icon responsive-instagram-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Instagram', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M7 1c-1.657 0-3.158 0.673-4.243 1.757s-1.757 2.586-1.757 4.243v10c0 1.657 0.673 3.158 1.757 4.243s2.586 1.757 4.243 1.757h10c1.657 0 3.158-0.673 4.243-1.757s1.757-2.586 1.757-4.243v-10c0-1.657-0.673-3.158-1.757-4.243s-2.586-1.757-4.243-1.757zM7 3h10c1.105 0 2.103 0.447 2.828 1.172s1.172 1.723 1.172 2.828v10c0 1.105-0.447 2.103-1.172 2.828s-1.723 1.172-2.828 1.172h-10c-1.105 0-2.103-0.447-2.828-1.172s-1.172-1.723-1.172-2.828v-10c0-1.105 0.447-2.103 1.172-2.828s1.723-1.172 2.828-1.172zM16.989 11.223c-0.15-0.972-0.571-1.857-1.194-2.567-0.754-0.861-1.804-1.465-3.009-1.644-0.464-0.074-0.97-0.077-1.477-0.002-1.366 0.202-2.521 0.941-3.282 1.967s-1.133 2.347-0.93 3.712 0.941 2.521 1.967 3.282 2.347 1.133 3.712 0.93 2.521-0.941 3.282-1.967 1.133-2.347 0.93-3.712zM15.011 11.517c0.122 0.82-0.1 1.609-0.558 2.227s-1.15 1.059-1.969 1.18-1.609-0.1-2.227-0.558-1.059-1.15-1.18-1.969 0.1-1.609 0.558-2.227 1.15-1.059 1.969-1.18c0.313-0.046 0.615-0.042 0.87-0.002 0.74 0.11 1.366 0.47 1.818 0.986 0.375 0.428 0.63 0.963 0.72 1.543zM17.5 7.5c0.552 0 1-0.448 1-1s-0.448-1-1-1-1 0.448-1 1 0.448 1 1 1z"></path>
				</svg>';
			break;
		case 'vimeo':
			$output .= '<svg class="responsive-svg-icon responsive-vimeo-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Vimeo', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M26.703 8.094c-0.109 2.469-1.844 5.859-5.187 10.172-3.469 4.484-6.375 6.734-8.781 6.734-1.484 0-2.734-1.375-3.75-4.109-0.688-2.5-1.375-5.016-2.063-7.531-0.75-2.734-1.578-4.094-2.453-4.094-0.187 0-0.844 0.391-1.984 1.188l-1.203-1.531c1.25-1.109 2.484-2.234 3.719-3.313 1.656-1.469 2.922-2.203 3.766-2.281 1.984-0.187 3.187 1.156 3.656 4.047 0.484 3.125 0.844 5.078 1.031 5.828 0.578 2.594 1.188 3.891 1.875 3.891 0.531 0 1.328-0.828 2.406-2.516 1.062-1.687 1.625-2.969 1.703-3.844 0.141-1.453-0.422-2.172-1.703-2.172-0.609 0-1.234 0.141-1.891 0.406 1.25-4.094 3.641-6.078 7.172-5.969 2.609 0.078 3.844 1.781 3.687 5.094z"></path>
				</svg>';
			break;
		case 'youtube':
			$output .= '<svg class="responsive-svg-icon responsive-youtube-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'YouTube', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M11.109 17.625l7.562-3.906-7.562-3.953v7.859zM14 4.156c5.891 0 9.797 0.281 9.797 0.281 0.547 0.063 1.75 0.063 2.812 1.188 0 0 0.859 0.844 1.109 2.781 0.297 2.266 0.281 4.531 0.281 4.531v2.125s0.016 2.266-0.281 4.531c-0.25 1.922-1.109 2.781-1.109 2.781-1.062 1.109-2.266 1.109-2.812 1.172 0 0-3.906 0.297-9.797 0.297v0c-7.281-0.063-9.516-0.281-9.516-0.281-0.625-0.109-2.031-0.078-3.094-1.188 0 0-0.859-0.859-1.109-2.781-0.297-2.266-0.281-4.531-0.281-4.531v-2.125s-0.016-2.266 0.281-4.531c0.25-1.937 1.109-2.781 1.109-2.781 1.062-1.125 2.266-1.125 2.812-1.188 0 0 3.906-0.281 9.797-0.281v0z"></path>
				</svg>';
			break;
		case 'youtubeAlt':
			$output .= '<svg class="responsive-svg-icon responsive-youtube-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'YouTube', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M21.563 6.637c0.287 1.529 0.448 3.295 0.437 5.125 0.019 1.528-0.123 3.267-0.437 5.021-0.057 0.208-0.15 0.403-0.272 0.575-0.227 0.321-0.558 0.565-0.949 0.675-0.604 0.161-2.156 0.275-3.877 0.341-2.23 0.086-4.465 0.086-4.465 0.086s-2.235 0-4.465-0.085c-1.721-0.066-3.273-0.179-3.866-0.338-0.205-0.057-0.396-0.149-0.566-0.268-0.311-0.22-0.55-0.536-0.67-0.923-0.285-1.526-0.444-3.286-0.433-5.11-0.021-1.54 0.121-3.292 0.437-5.060 0.057-0.208 0.15-0.403 0.272-0.575 0.227-0.321 0.558-0.565 0.949-0.675 0.604-0.161 2.156-0.275 3.877-0.341 2.23-0.085 4.465-0.085 4.465-0.085s2.235 0 4.466 0.078c1.719 0.060 3.282 0.163 3.856 0.303 0.219 0.063 0.421 0.165 0.598 0.299 0.307 0.232 0.538 0.561 0.643 0.958zM23.51 6.177c-0.217-0.866-0.718-1.59-1.383-2.093-0.373-0.282-0.796-0.494-1.249-0.625-0.898-0.22-2.696-0.323-4.342-0.38-2.267-0.079-4.536-0.079-4.536-0.079s-2.272 0-4.541 0.087c-1.642 0.063-3.45 0.175-4.317 0.407-0.874 0.247-1.581 0.77-2.064 1.45-0.27 0.381-0.469 0.811-0.587 1.268-0.006 0.024-0.011 0.049-0.015 0.071-0.343 1.898-0.499 3.793-0.476 5.481-0.012 1.924 0.161 3.831 0.477 5.502 0.006 0.031 0.013 0.062 0.021 0.088 0.245 0.86 0.77 1.567 1.451 2.048 0.357 0.252 0.757 0.443 1.182 0.561 0.879 0.235 2.686 0.347 4.328 0.41 2.269 0.087 4.541 0.087 4.541 0.087s2.272 0 4.541-0.087c1.642-0.063 3.449-0.175 4.317-0.407 0.873-0.247 1.581-0.77 2.063-1.45 0.27-0.381 0.47-0.811 0.587-1.267 0.006-0.025 0.012-0.050 0.015-0.071 0.34-1.884 0.496-3.765 0.476-5.44 0.012-1.925-0.161-3.833-0.477-5.504-0.004-0.020-0.008-0.040-0.012-0.057zM10.75 13.301v-3.102l2.727 1.551zM10.244 15.889l5.75-3.27c0.48-0.273 0.648-0.884 0.375-1.364-0.093-0.164-0.226-0.292-0.375-0.375l-5.75-3.27c-0.48-0.273-1.091-0.105-1.364 0.375-0.090 0.158-0.132 0.33-0.131 0.494v6.54c0 0.552 0.448 1 1 1 0.182 0 0.352-0.049 0.494-0.131z"></path>
				</svg>';
			break;
		case 'github':
			$output .= '<svg class="responsive-svg-icon responsive-github-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Github', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M12 2c6.625 0 12 5.375 12 12 0 5.297-3.437 9.797-8.203 11.391-0.609 0.109-0.828-0.266-0.828-0.578 0-0.391 0.016-1.687 0.016-3.297 0-1.125-0.375-1.844-0.812-2.219 2.672-0.297 5.484-1.313 5.484-5.922 0-1.313-0.469-2.375-1.234-3.219 0.125-0.313 0.531-1.531-0.125-3.187-1-0.313-3.297 1.234-3.297 1.234-0.953-0.266-1.984-0.406-3-0.406s-2.047 0.141-3 0.406c0 0-2.297-1.547-3.297-1.234-0.656 1.656-0.25 2.875-0.125 3.187-0.766 0.844-1.234 1.906-1.234 3.219 0 4.594 2.797 5.625 5.469 5.922-0.344 0.313-0.656 0.844-0.766 1.609-0.688 0.313-2.438 0.844-3.484-1-0.656-1.141-1.844-1.234-1.844-1.234-1.172-0.016-0.078 0.734-0.078 0.734 0.781 0.359 1.328 1.75 1.328 1.75 0.703 2.141 4.047 1.422 4.047 1.422 0 1 0.016 1.937 0.016 2.234 0 0.313-0.219 0.688-0.828 0.578-4.766-1.594-8.203-6.094-8.203-11.391 0-6.625 5.375-12 12-12zM4.547 19.234c0.031-0.063-0.016-0.141-0.109-0.187-0.094-0.031-0.172-0.016-0.203 0.031-0.031 0.063 0.016 0.141 0.109 0.187 0.078 0.047 0.172 0.031 0.203-0.031zM5.031 19.766c0.063-0.047 0.047-0.156-0.031-0.25-0.078-0.078-0.187-0.109-0.25-0.047-0.063 0.047-0.047 0.156 0.031 0.25 0.078 0.078 0.187 0.109 0.25 0.047zM5.5 20.469c0.078-0.063 0.078-0.187 0-0.297-0.063-0.109-0.187-0.156-0.266-0.094-0.078 0.047-0.078 0.172 0 0.281s0.203 0.156 0.266 0.109zM6.156 21.125c0.063-0.063 0.031-0.203-0.063-0.297-0.109-0.109-0.25-0.125-0.313-0.047-0.078 0.063-0.047 0.203 0.063 0.297 0.109 0.109 0.25 0.125 0.313 0.047zM7.047 21.516c0.031-0.094-0.063-0.203-0.203-0.25-0.125-0.031-0.266 0.016-0.297 0.109s0.063 0.203 0.203 0.234c0.125 0.047 0.266 0 0.297-0.094zM8.031 21.594c0-0.109-0.125-0.187-0.266-0.172-0.141 0-0.25 0.078-0.25 0.172 0 0.109 0.109 0.187 0.266 0.172 0.141 0 0.25-0.078 0.25-0.172zM8.937 21.438c-0.016-0.094-0.141-0.156-0.281-0.141-0.141 0.031-0.234 0.125-0.219 0.234 0.016 0.094 0.141 0.156 0.281 0.125s0.234-0.125 0.219-0.219z"></path>
				</svg>';
			break;
		case 'githubAlt':
			$output .= '<svg class="responsive-svg-icon responsive-github-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Github', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8.713 18.042c-1.268 0.38-2.060 0.335-2.583 0.17-0.231-0.073-0.431-0.176-0.614-0.302-0.411-0.284-0.727-0.675-1.119-1.172-0.356-0.451-0.85-1.107-1.551-1.476-0.185-0.098-0.386-0.177-0.604-0.232-0.536-0.134-1.079 0.192-1.213 0.728s0.192 1.079 0.728 1.213c0.074 0.023 0.155 0.060 0.155 0.060 0.252 0.133 0.487 0.404 0.914 0.946 0.366 0.464 0.856 1.098 1.553 1.579 0.332 0.229 0.711 0.426 1.149 0.564 1.015 0.321 2.236 0.296 3.76-0.162 0.529-0.159 0.829-0.716 0.67-1.245s-0.716-0.829-1.245-0.67zM17 22v-3.792c0.052-0.684-0.056-1.343-0.292-1.942 0.777-0.171 1.563-0.427 2.297-0.823 2.083-1.124 3.496-3.242 3.496-6.923 0-1.503-0.516-2.887-1.379-3.981 0.355-1.345 0.226-2.726-0.293-3.933-0.122-0.283-0.359-0.482-0.634-0.564-0.357-0.106-1.732-0.309-4.373 1.362-2.273-0.541-4.557-0.509-6.646-0.002-2.639-1.669-4.013-1.466-4.37-1.36-0.296 0.088-0.521 0.3-0.635 0.565-0.554 1.292-0.624 2.672-0.292 3.932-0.93 1.178-1.387 2.601-1.379 4.017 0 3.622 1.389 5.723 3.441 6.859 0.752 0.416 1.56 0.685 2.357 0.867-0.185 0.468-0.286 0.961-0.304 1.456-0.005 0.141-0.003 0.283 0.005 0.424l0.001 3.838c0 0.552 0.448 1 1 1s1-0.448 1-1v-3.87c0-0.021-0.001-0.045-0.002-0.069-0.006-0.084-0.007-0.168-0.004-0.252 0.020-0.568 0.241-1.126 0.665-1.564 0.145-0.149 0.246-0.347 0.274-0.572 0.068-0.548-0.321-1.048-0.869-1.116-0.34-0.042-0.677-0.094-1.006-0.159-0.79-0.156-1.518-0.385-2.147-0.733-1.305-0.723-2.391-2.071-2.41-5.042 0.013-1.241 0.419-2.319 1.224-3.165 0.257-0.273 0.35-0.671 0.212-1.040-0.28-0.748-0.341-1.58-0.14-2.392 0.491 0.107 1.354 0.416 2.647 1.282 0.235 0.157 0.533 0.214 0.825 0.133 1.997-0.557 4.242-0.602 6.47 0.002 0.271 0.073 0.569 0.033 0.818-0.135 1.293-0.866 2.156-1.175 2.647-1.282 0.189 0.766 0.157 1.595-0.141 2.392-0.129 0.352-0.058 0.755 0.213 1.040 0.758 0.795 1.224 1.872 1.224 3.060 0 3.075-1.114 4.445-2.445 5.163-0.623 0.336-1.343 0.555-2.123 0.7-0.322 0.060-0.651 0.106-0.983 0.143-0.21 0.023-0.418 0.114-0.584 0.275-0.397 0.384-0.408 1.017-0.024 1.414 0.067 0.070 0.13 0.143 0.188 0.22 0.34 0.449 0.521 1.015 0.474 1.617 0 0.024-0.001 0.051-0.003 0.078v3.872c0 0.552 0.448 1 1 1s1-0.448 1-1z"></path>
				</svg>';
			break;
		case 'rss':
			$output .= '<svg class="responsive-svg-icon responsive-rss-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'RSS', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 20c0-1.109-0.891-2-2-2s-2 0.891-2 2 0.891 2 2 2 2-0.891 2-2zM13.484 21.469c-0.266-4.844-4.109-8.687-8.953-8.953-0.141-0.016-0.281 0.047-0.375 0.141s-0.156 0.219-0.156 0.359v2c0 0.266 0.203 0.484 0.469 0.5 3.203 0.234 5.781 2.812 6.016 6.016 0.016 0.266 0.234 0.469 0.5 0.469h2c0.141 0 0.266-0.063 0.359-0.156s0.156-0.234 0.141-0.375zM19.484 21.484c-0.266-8.125-6.844-14.703-14.969-14.969-0.156-0.016-0.266 0.031-0.359 0.141-0.094 0.094-0.156 0.219-0.156 0.359v2c0 0.266 0.219 0.484 0.484 0.5 6.484 0.234 11.766 5.516 12 12 0.016 0.266 0.234 0.484 0.5 0.484h2c0.141 0 0.266-0.063 0.359-0.156 0.109-0.094 0.156-0.219 0.141-0.359zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15c-2.484 0-4.5-2.016-4.5-4.5v-15c0-2.484 2.016-4.5 4.5-4.5h15c2.484 0 4.5 2.016 4.5 4.5z"></path>
				</svg>';
			break;
		case 'rssAlt':
			$output .= '<svg class="responsive-svg-icon responsive-rss-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'RSS', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M4 12c2.209 0 4.208 0.894 5.657 2.343s2.343 3.448 2.343 5.657c0 0.552 0.448 1 1 1s1-0.448 1-1c0-2.761-1.12-5.263-2.929-7.071s-4.31-2.929-7.071-2.929c-0.552 0-1 0.448-1 1s0.448 1 1 1zM4 5c4.142 0 7.891 1.678 10.607 4.393s4.393 6.465 4.393 10.607c0 0.552 0.448 1 1 1s1-0.448 1-1c0-4.694-1.904-8.946-4.979-12.021s-7.327-4.979-12.021-4.979c-0.552 0-1 0.448-1 1s0.448 1 1 1zM7 19c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414z"></path>
				</svg>';
			break;
		case 'facebook_group':
			$output .= '<svg class="responsive-svg-icon responsive-facebook-group-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Facebook Group', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M9.266 14c-1.625 0.047-3.094 0.75-4.141 2h-2.094c-1.563 0-3.031-0.75-3.031-2.484 0-1.266-0.047-5.516 1.937-5.516 0.328 0 1.953 1.328 4.062 1.328 0.719 0 1.406-0.125 2.078-0.359-0.047 0.344-0.078 0.688-0.078 1.031 0 1.422 0.453 2.828 1.266 4zM26 23.953c0 2.531-1.672 4.047-4.172 4.047h-13.656c-2.5 0-4.172-1.516-4.172-4.047 0-3.531 0.828-8.953 5.406-8.953 0.531 0 2.469 2.172 5.594 2.172s5.063-2.172 5.594-2.172c4.578 0 5.406 5.422 5.406 8.953zM10 4c0 2.203-1.797 4-4 4s-4-1.797-4-4 1.797-4 4-4 4 1.797 4 4zM21 10c0 3.313-2.688 6-6 6s-6-2.688-6-6 2.688-6 6-6 6 2.688 6 6zM30 13.516c0 1.734-1.469 2.484-3.031 2.484h-2.094c-1.047-1.25-2.516-1.953-4.141-2 0.812-1.172 1.266-2.578 1.266-4 0-0.344-0.031-0.688-0.078-1.031 0.672 0.234 1.359 0.359 2.078 0.359 2.109 0 3.734-1.328 4.062-1.328 1.984 0 1.937 4.25 1.937 5.516zM28 4c0 2.203-1.797 4-4 4s-4-1.797-4-4 1.797-4 4-4 4 1.797 4 4z"></path>
				</svg>';
			break;
		case 'dribbble':
			$output .= '<svg class="responsive-svg-icon responsive-dribbble-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Dribbble', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M16 23.438c-0.156-0.906-0.75-4.031-2.188-7.781-0.016 0-0.047 0.016-0.063 0.016 0 0-6.078 2.125-8.047 6.406-0.094-0.078-0.234-0.172-0.234-0.172 1.781 1.453 4.047 2.344 6.531 2.344 1.422 0 2.766-0.297 4-0.812zM13.109 13.953c-0.25-0.578-0.531-1.156-0.828-1.734-5.281 1.578-10.344 1.453-10.516 1.453-0.016 0.109-0.016 0.219-0.016 0.328 0 2.625 1 5.031 2.625 6.844v0c2.797-4.984 8.328-6.766 8.328-6.766 0.141-0.047 0.281-0.078 0.406-0.125zM11.438 10.641c-1.781-3.156-3.672-5.719-3.813-5.906-2.859 1.344-4.984 3.984-5.656 7.156 0.266 0 4.547 0.047 9.469-1.25zM22.125 15.625c-0.219-0.063-3.078-0.969-6.391-0.453 1.344 3.703 1.891 6.719 2 7.328 2.297-1.547 3.922-4.016 4.391-6.875zM9.547 4.047c-0.016 0-0.016 0-0.031 0.016 0 0 0.016-0.016 0.031-0.016zM18.766 6.312c-1.797-1.594-4.172-2.562-6.766-2.562-0.828 0-1.641 0.109-2.422 0.297 0.156 0.203 2.094 2.75 3.844 5.969 3.859-1.437 5.313-3.656 5.344-3.703zM22.25 13.891c-0.031-2.422-0.891-4.656-2.328-6.406-0.031 0.031-1.672 2.406-5.719 4.062 0.234 0.484 0.469 0.984 0.688 1.484 0.078 0.172 0.141 0.359 0.219 0.531 3.531-0.453 7.016 0.313 7.141 0.328zM24 14c0 6.625-5.375 12-12 12s-12-5.375-12-12 5.375-12 12-12 12 5.375 12 12z"></path>
				</svg>';
			break;
		case 'xing':
			$output .= '<svg class="responsive-svg-icon responsive-xing-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Xing', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M9.328 10.422c0 0-0.156 0.266-4.016 7.125-0.203 0.344-0.469 0.719-1.016 0.719h-3.734c-0.219 0-0.391-0.109-0.484-0.266s-0.109-0.359 0-0.562l3.953-7c0.016 0 0.016 0 0-0.016l-2.516-4.359c-0.109-0.203-0.125-0.422-0.016-0.578 0.094-0.156 0.281-0.234 0.5-0.234h3.734c0.562 0 0.844 0.375 1.031 0.703 2.547 4.453 2.562 4.469 2.562 4.469zM21.922 0.391c0.109 0.156 0.109 0.375 0 0.578l-8.25 14.594c-0.016 0-0.016 0.016 0 0.016l5.25 9.609c0.109 0.203 0.109 0.422 0.016 0.578-0.109 0.156-0.281 0.234-0.5 0.234h-3.734c-0.562 0-0.859-0.375-1.031-0.703-5.297-9.703-5.297-9.719-5.297-9.719s0.266-0.469 8.297-14.719c0.203-0.359 0.438-0.703 1-0.703h3.766c0.219 0 0.391 0.078 0.484 0.234z"></path>
				</svg>';
			break;
		case 'wordpress': // phpcs:ignore WordPress.WP.CapitalPDangit.Misspelled
			$output .= '<svg class="responsive-svg-icon responsive-wordpress-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'WordPress', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M1.984 14c0-1.734 0.375-3.391 1.047-4.891l5.734 15.703c-4.016-1.953-6.781-6.062-6.781-10.813zM22.109 13.391c0 1.031-0.422 2.219-0.922 3.891l-1.188 4-4.344-12.906s0.719-0.047 1.375-0.125c0.641-0.078 0.562-1.031-0.078-0.984-1.953 0.141-3.203 0.156-3.203 0.156s-1.172-0.016-3.156-0.156c-0.656-0.047-0.734 0.938-0.078 0.984 0.609 0.063 1.25 0.125 1.25 0.125l1.875 5.125-2.625 7.875-4.375-13s0.719-0.047 1.375-0.125c0.641-0.078 0.562-1.031-0.078-0.984-1.937 0.141-3.203 0.156-3.203 0.156-0.219 0-0.484-0.016-0.766-0.016 2.141-3.266 5.828-5.422 10.031-5.422 3.125 0 5.969 1.203 8.109 3.156h-0.156c-1.172 0-2.016 1.016-2.016 2.125 0 0.984 0.578 1.813 1.188 2.812 0.469 0.797 0.984 1.828 0.984 3.313zM14.203 15.047l3.703 10.109c0.016 0.063 0.047 0.125 0.078 0.172-1.25 0.438-2.578 0.688-3.984 0.688-1.172 0-2.312-0.172-3.391-0.5zM24.531 8.234c0.938 1.719 1.484 3.672 1.484 5.766 0 4.438-2.406 8.297-5.984 10.375l3.672-10.594c0.609-1.75 0.922-3.094 0.922-4.312 0-0.438-0.031-0.844-0.094-1.234zM14 0c7.719 0 14 6.281 14 14s-6.281 14-14 14-14-6.281-14-14 6.281-14 14-14zM14 27.359c7.359 0 13.359-6 13.359-13.359s-6-13.359-13.359-13.359-13.359 6-13.359 13.359 6 13.359 13.359 13.359z"></path>
				</svg>';
			break;
		case 'whatsapp':
			$output .= '<svg class="responsive-svg-icon responsive-whatsapp-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'WhatsApp', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M15.391 15.219c0.266 0 2.812 1.328 2.922 1.516 0.031 0.078 0.031 0.172 0.031 0.234 0 0.391-0.125 0.828-0.266 1.188-0.359 0.875-1.813 1.437-2.703 1.437-0.75 0-2.297-0.656-2.969-0.969-2.234-1.016-3.625-2.75-4.969-4.734-0.594-0.875-1.125-1.953-1.109-3.031v-0.125c0.031-1.031 0.406-1.766 1.156-2.469 0.234-0.219 0.484-0.344 0.812-0.344 0.187 0 0.375 0.047 0.578 0.047 0.422 0 0.5 0.125 0.656 0.531 0.109 0.266 0.906 2.391 0.906 2.547 0 0.594-1.078 1.266-1.078 1.625 0 0.078 0.031 0.156 0.078 0.234 0.344 0.734 1 1.578 1.594 2.141 0.719 0.688 1.484 1.141 2.359 1.578 0.109 0.063 0.219 0.109 0.344 0.109 0.469 0 1.25-1.516 1.656-1.516zM12.219 23.5c5.406 0 9.812-4.406 9.812-9.812s-4.406-9.812-9.812-9.812-9.812 4.406-9.812 9.812c0 2.063 0.656 4.078 1.875 5.75l-1.234 3.641 3.781-1.203c1.594 1.047 3.484 1.625 5.391 1.625zM12.219 1.906c6.5 0 11.781 5.281 11.781 11.781s-5.281 11.781-11.781 11.781c-1.984 0-3.953-0.5-5.703-1.469l-6.516 2.094 2.125-6.328c-1.109-1.828-1.687-3.938-1.687-6.078 0-6.5 5.281-11.781 11.781-11.781z"></path>
				</svg>';
			break;
		case 'vk':
			$output .= '<svg class="responsive-svg-icon responsive-vk-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="31" height="28" viewBox="0 0 31 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'VK', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M29.953 8.125c0.234 0.641-0.5 2.141-2.344 4.594-3.031 4.031-3.359 3.656-0.859 5.984 2.406 2.234 2.906 3.313 2.984 3.453 0 0 1 1.75-1.109 1.766l-4 0.063c-0.859 0.172-2-0.609-2-0.609-1.5-1.031-2.906-3.703-4-3.359 0 0-1.125 0.359-1.094 2.766 0.016 0.516-0.234 0.797-0.234 0.797s-0.281 0.297-0.828 0.344h-1.797c-3.953 0.25-7.438-3.391-7.438-3.391s-3.813-3.938-7.156-11.797c-0.219-0.516 0.016-0.766 0.016-0.766s0.234-0.297 0.891-0.297l4.281-0.031c0.406 0.063 0.688 0.281 0.688 0.281s0.25 0.172 0.375 0.5c0.703 1.75 1.609 3.344 1.609 3.344 1.563 3.219 2.625 3.766 3.234 3.437 0 0 0.797-0.484 0.625-4.375-0.063-1.406-0.453-2.047-0.453-2.047-0.359-0.484-1.031-0.625-1.328-0.672-0.234-0.031 0.156-0.594 0.672-0.844 0.766-0.375 2.125-0.391 3.734-0.375 1.266 0.016 1.625 0.094 2.109 0.203 1.484 0.359 0.984 1.734 0.984 5.047 0 1.062-0.203 2.547 0.562 3.031 0.328 0.219 1.141 0.031 3.141-3.375 0 0 0.938-1.625 1.672-3.516 0.125-0.344 0.391-0.484 0.391-0.484s0.25-0.141 0.594-0.094l4.5-0.031c1.359-0.172 1.578 0.453 1.578 0.453z"></path>
				</svg>';
			break;
		case 'tumblr':
			$output .= '<svg class="responsive-svg-icon responsive-tumblr-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="28" viewBox="0 0 17 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Tumblr', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14.75 20.766l1.25 3.703c-0.469 0.703-2.594 1.5-4.5 1.531-5.672 0.094-7.812-4.031-7.812-6.937v-8.5h-2.625v-3.359c3.938-1.422 4.891-4.984 5.109-7.016 0.016-0.125 0.125-0.187 0.187-0.187h3.813v6.625h5.203v3.937h-5.219v8.094c0 1.094 0.406 2.609 2.5 2.562 0.688-0.016 1.609-0.219 2.094-0.453z"></path>
				</svg>';
			break;
		case 'reddit':
			$output .= '<svg class="responsive-svg-icon responsive-reddit-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Reddit', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14.672 17.641c0.109 0.109 0.109 0.297 0 0.406-0.766 0.766-2.234 0.828-2.672 0.828s-1.906-0.063-2.672-0.828c-0.109-0.109-0.109-0.297 0-0.406 0.109-0.125 0.297-0.125 0.406 0 0.484 0.484 1.531 0.656 2.266 0.656s1.781-0.172 2.266-0.656c0.109-0.125 0.297-0.125 0.406 0zM10.563 15.203c0 0.656-0.547 1.203-1.203 1.203s-1.203-0.547-1.203-1.203c0-0.672 0.547-1.203 1.203-1.203s1.203 0.531 1.203 1.203zM15.844 15.203c0 0.656-0.547 1.203-1.203 1.203s-1.203-0.547-1.203-1.203c0-0.672 0.547-1.203 1.203-1.203s1.203 0.531 1.203 1.203zM19.203 13.594c0-0.875-0.719-1.594-1.609-1.594-0.438 0-0.844 0.187-1.141 0.484-1.094-0.75-2.562-1.234-4.172-1.281l0.844-3.797 2.672 0.609c0.016 0.656 0.547 1.188 1.203 1.188s1.203-0.547 1.203-1.203-0.547-1.203-1.203-1.203c-0.469 0-0.875 0.266-1.078 0.672l-2.953-0.656c-0.156-0.047-0.297 0.063-0.328 0.203l-0.938 4.188c-1.609 0.063-3.063 0.547-4.141 1.297-0.297-0.313-0.703-0.5-1.156-0.5-0.891 0-1.609 0.719-1.609 1.594 0 0.641 0.375 1.188 0.906 1.453-0.047 0.234-0.078 0.5-0.078 0.75 0 2.547 2.859 4.609 6.391 4.609s6.406-2.063 6.406-4.609c0-0.266-0.031-0.516-0.094-0.766 0.516-0.266 0.875-0.812 0.875-1.437zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15c-2.484 0-4.5-2.016-4.5-4.5v-15c0-2.484 2.016-4.5 4.5-4.5h15c2.484 0 4.5 2.016 4.5 4.5z"></path>
				</svg>';
			break;
		case 'redditAlt':
			$output .= '<svg class="responsive-svg-icon responsive-reddit-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Reddit', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M4 10c0-0.552 0.448-1 1-1s1 0.448 1 1c0 0.552-0.448 1-1 1s-1-0.448-1-1zM10 10c0-0.552 0.448-1 1-1s1 0.448 1 1c0 0.552-0.448 1-1 1s-1-0.448-1-1zM10.049 12.137c0.258-0.203 0.631-0.159 0.834 0.099s0.159 0.631-0.099 0.834c-0.717 0.565-1.81 0.93-2.783 0.93s-2.066-0.365-2.784-0.93c-0.258-0.203-0.302-0.576-0.099-0.834s0.576-0.302 0.834-0.099c0.413 0.325 1.23 0.675 2.049 0.675s1.636-0.35 2.049-0.675zM16 8c0-1.105-0.895-2-2-2-0.752 0-1.406 0.415-1.748 1.028-1.028-0.562-2.28-0.926-3.645-1.010l1.193-2.68 2.284 0.659c0.206 0.583 0.761 1.002 1.415 1.002 0.828 0 1.5-0.672 1.5-1.5s-0.672-1.5-1.5-1.5c-0.571 0-1.068 0.319-1.321 0.789l-2.545-0.735c-0.285-0.082-0.587 0.058-0.707 0.329l-1.621 3.641c-1.33 0.094-2.551 0.453-3.557 1.004-0.342-0.613-0.996-1.028-1.748-1.028-1.105 0-2 0.895-2 2 0 0.817 0.491 1.52 1.193 1.83-0.126 0.375-0.193 0.767-0.193 1.17 0 2.761 3.134 5 7 5s7-2.239 7-5c0-0.403-0.067-0.795-0.193-1.17 0.703-0.31 1.193-1.013 1.193-1.83zM13.5 2.938c0.311 0 0.563 0.252 0.563 0.563s-0.252 0.563-0.563 0.563-0.563-0.252-0.563-0.563 0.252-0.563 0.563-0.563zM1 8c0-0.551 0.449-1 1-1 0.399 0 0.743 0.234 0.904 0.573-0.523 0.396-0.956 0.854-1.276 1.355-0.368-0.148-0.628-0.508-0.628-0.928zM8 14.813c-3.21 0-5.813-1.707-5.813-3.813s2.602-3.813 5.813-3.813c3.21 0 5.813 1.707 5.813 3.813s-2.602 3.813-5.813 3.813zM14.372 8.928c-0.32-0.502-0.753-0.959-1.276-1.355 0.161-0.338 0.505-0.573 0.904-0.573 0.551 0 1 0.449 1 1 0 0.42-0.26 0.78-0.628 0.928z"></path>
				</svg>';
			break;
		case 'patreon':
			$output .= '<svg class="responsive-svg-icon responsive-patreon-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Patreon', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M21.37 0.033c-6.617 0-12.001 5.383-12.001 11.999 0 6.597 5.383 11.963 12.001 11.963 6.597 0 11.963-5.367 11.963-11.963 0-6.617-5.367-11.999-11.963-11.999z"></path>
					<path d="M0.004 31.996h5.859v-31.963h-5.859z"></path>
				</svg>';
			break;
		case 'medium':
			$output .= '<svg class="responsive-svg-icon responsive-medium-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Medium', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M0 0v32h32v-32zM26.584 7.581l-1.716 1.645c-0.121 0.092-0.198 0.237-0.198 0.399 0 0.030 0.003 0.059 0.007 0.087l-0-0.003v12.089c-0.004 0.025-0.007 0.053-0.007 0.083 0 0.162 0.077 0.306 0.196 0.398l0.001 0.001 1.676 1.645v0.361h-8.429v-0.36l1.736-1.687c0.171-0.171 0.171-0.22 0.171-0.48v-9.773l-4.827 12.26h-0.653l-5.621-12.26v8.217c-0.007 0.046-0.010 0.099-0.010 0.152 0 0.307 0.122 0.586 0.321 0.791l-0-0 2.259 2.739v0.361h-6.403v-0.36l2.26-2.74c0.189-0.196 0.306-0.464 0.306-0.759 0-0.065-0.006-0.129-0.017-0.19l0.001 0.007v-9.501c0.003-0.025 0.004-0.055 0.004-0.085 0-0.245-0.106-0.465-0.274-0.617l-0.001-0.001-2.008-2.419v-0.36h6.232l4.817 10.564 4.235-10.565h5.941z"></path>
				</svg>';
			break;
		case 'behance':
			$output .= '<svg class="responsive-svg-icon responsive-behance-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="28" viewBox="0 0 32 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Behance', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M28.875 5.297h-7.984v1.937h7.984v-1.937zM24.938 11.953c-1.875 0-3.125 1.172-3.25 3.047h6.375c-0.172-1.891-1.156-3.047-3.125-3.047zM25.188 21.094c1.188 0 2.719-0.641 3.094-1.859h3.453c-1.062 3.266-3.266 4.797-6.672 4.797-4.5 0-7.297-3.047-7.297-7.484 0-4.281 2.953-7.547 7.297-7.547 4.469 0 6.937 3.516 6.937 7.734 0 0.25-0.016 0.5-0.031 0.734h-10.281c0 2.281 1.203 3.625 3.5 3.625zM4.328 20.312h4.625c1.766 0 3.203-0.625 3.203-2.609 0-2.016-1.203-2.812-3.109-2.812h-4.719v5.422zM4.328 11.922h4.391c1.547 0 2.641-0.672 2.641-2.344 0-1.813-1.406-2.25-2.969-2.25h-4.062v4.594zM0 3.969h9.281c3.375 0 6.297 0.953 6.297 4.875 0 1.984-0.922 3.266-2.688 4.109 2.422 0.688 3.594 2.516 3.594 4.984 0 4-3.359 5.719-6.937 5.719h-9.547v-19.688z"></path>
				</svg>';
			break;
		case 'anchor':
			$output .= '<svg class="responsive-svg-icon responsive-anchor-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Anchor', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M23.214 8.166S22.209 7.69 21.164 8c-.782.23-1.638.824-2.125 2.055-.939 2.363-.126 6.484-.444 6.484s-1.319-3.797-2.658-7.752c-1.34-3.954-2.497-8.061-4.588-7.73-1.854.293-1.279 4.976-.553 9.362.658 3.976 1.419 7.698.984 7.698-.777.001-3.326-10.988-5.939-10.57-2.613.416.753 12.525.046 12.548-.581.019-2.006-7.37-4.121-7.031-1.602.257-.175 6.006-.109 7.61.016.402.141 1.157-.461 1.157H0v1.118h1.958c.402-.02.72-.174.881-.57.544-1.342-.884-7.042-.55-7.084.23-.028.725 1.707 1.416 3.67.69 1.963 1.383 3.995 2.696 3.995 2.83 0-.057-11.121.504-11.121.297 0 1.106 2.26 1.995 4.738 1.089 3.028 2.416 6.387 4.018 6.387 1.912 0 1.29-4.338.698-8.495-.513-3.598-1.114-6.978-.793-6.978.721 0 3.447 15.467 6.72 15.467 1.64 0 1.658-3.233 1.658-6.72 0-2.448-.204-4.68 1.331-5.217.73-.254 1.468.198 1.468.198Z"/>
				</svg>';
			break;
		case 'soundcloud':
			$output .= '<svg class="responsive-svg-icon responsive-soundcloud-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'SoundCloud', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M27.874 16.069c-0.565 0-1.105 0.11-1.596 0.308-0.328-3.574-3.447-6.377-7.25-6.377-0.931 0-1.834 0.176-2.635 0.474-0.311 0.116-0.393 0.235-0.393 0.466v12.585c0 0.243 0.195 0.445 0.441 0.469 0.011 0.001 11.36 0.007 11.434 0.007 2.278 0 4.125-1.776 4.125-3.965s-1.848-3.966-4.126-3.966zM12.5 24h1l0.5-7.007-0.5-6.993h-1l-0.5 6.993zM9.5 24h-1l-0.5-5.086 0.5-4.914h1l0.5 5zM4.5 24h1l0.5-4-0.5-4h-1l-0.5 4zM0.5 22h1l0.5-2-0.5-2h-1l-0.5 2z"></path>
				</svg>';
			break;
		case 'soundcloudAlt':
			$output .= '<svg class="responsive-svg-icon responsive-soundcloud-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'SoundCloud', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M29 0h-26c-1.65 0-3 1.35-3 3v26c0 1.65 1.35 3 3 3h26c1.65 0 3-1.35 3-3v-26c0-1.65-1.35-3-3-3zM5.5 22h-1l-0.5-3 0.5-3h1l0.5 3-0.5 3zM9.5 22h-1l-0.5-4 0.5-4h1l0.5 4-0.5 4zM13.5 22h-1l-0.5-6 0.5-6h1l0.5 6-0.5 6zM25.788 22c-0.063 0-9.413-0.006-9.419-0.006-0.2-0.019-0.363-0.194-0.369-0.4v-10.787c0-0.2 0.069-0.3 0.325-0.4 0.663-0.256 1.406-0.406 2.175-0.406 3.131 0 5.7 2.4 5.975 5.469 0.406-0.169 0.85-0.262 1.313-0.262 1.875 0 3.4 1.525 3.4 3.4s-1.525 3.394-3.4 3.394z"></path>
				</svg>';
			break;
		case 'email':
			$output .= '<svg class="responsive-svg-icon responsive-email-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Email', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M15 2h-14c-0.55 0-1 0.45-1 1v10c0 0.55 0.45 1 1 1h14c0.55 0 1-0.45 1-1v-10c0-0.55-0.45-1-1-1zM5.831 9.773l-3 2.182c-0.1 0.073-0.216 0.108-0.33 0.108-0.174 0-0.345-0.080-0.455-0.232-0.183-0.251-0.127-0.603 0.124-0.786l3-2.182c0.251-0.183 0.603-0.127 0.786 0.124s0.127 0.603-0.124 0.786zM13.955 11.831c-0.11 0.151-0.282 0.232-0.455 0.232-0.115 0-0.23-0.035-0.33-0.108l-3-2.182c-0.251-0.183-0.307-0.534-0.124-0.786s0.535-0.307 0.786-0.124l3 2.182c0.251 0.183 0.307 0.535 0.124 0.786zM13.831 4.955l-5.5 4c-0.099 0.072-0.215 0.108-0.331 0.108s-0.232-0.036-0.331-0.108l-5.5-4c-0.251-0.183-0.307-0.534-0.124-0.786s0.535-0.307 0.786-0.124l5.169 3.759 5.169-3.759c0.251-0.183 0.603-0.127 0.786 0.124s0.127 0.603-0.124 0.786z"></path>
				</svg>';
			break;
		case 'emailAlt':
			$output .= '<svg class="responsive-svg-icon responsive-email-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Email', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M28 11.094v12.406c0 1.375-1.125 2.5-2.5 2.5h-23c-1.375 0-2.5-1.125-2.5-2.5v-12.406c0.469 0.516 1 0.969 1.578 1.359 2.594 1.766 5.219 3.531 7.766 5.391 1.313 0.969 2.938 2.156 4.641 2.156h0.031c1.703 0 3.328-1.188 4.641-2.156 2.547-1.844 5.172-3.625 7.781-5.391 0.562-0.391 1.094-0.844 1.563-1.359zM28 6.5c0 1.75-1.297 3.328-2.672 4.281-2.438 1.687-4.891 3.375-7.313 5.078-1.016 0.703-2.734 2.141-4 2.141h-0.031c-1.266 0-2.984-1.437-4-2.141-2.422-1.703-4.875-3.391-7.297-5.078-1.109-0.75-2.688-2.516-2.688-3.938 0-1.531 0.828-2.844 2.5-2.844h23c1.359 0 2.5 1.125 2.5 2.5z"></path>
				</svg>';
			break;
		case 'emailAlt2':
			$output .= '<svg class="responsive-svg-icon responsive-email-alt2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Email', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M3 7.921l8.427 5.899c0.34 0.235 0.795 0.246 1.147 0l8.426-5.899v10.079c0 0.272-0.11 0.521-0.295 0.705s-0.433 0.295-0.705 0.295h-16c-0.272 0-0.521-0.11-0.705-0.295s-0.295-0.433-0.295-0.705zM1 5.983c0 0.010 0 0.020 0 0.030v11.987c0 0.828 0.34 1.579 0.88 2.12s1.292 0.88 2.12 0.88h16c0.828 0 1.579-0.34 2.12-0.88s0.88-1.292 0.88-2.12v-11.988c0-0.010 0-0.020 0-0.030-0.005-0.821-0.343-1.565-0.88-2.102-0.541-0.54-1.292-0.88-2.12-0.88h-16c-0.828 0-1.579 0.34-2.12 0.88-0.537 0.537-0.875 1.281-0.88 2.103zM20.894 5.554l-8.894 6.225-8.894-6.225c0.048-0.096 0.112-0.183 0.188-0.259 0.185-0.185 0.434-0.295 0.706-0.295h16c0.272 0 0.521 0.11 0.705 0.295 0.076 0.076 0.14 0.164 0.188 0.259z"></path>
				</svg>';
			break;
		case 'phone':
			$output .= '<svg class="responsive-svg-icon responsive-phone-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="12" height="28" viewBox="0 0 12 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Phone', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M7.25 22c0-0.688-0.562-1.25-1.25-1.25s-1.25 0.562-1.25 1.25 0.562 1.25 1.25 1.25 1.25-0.562 1.25-1.25zM10.5 19.5v-11c0-0.266-0.234-0.5-0.5-0.5h-8c-0.266 0-0.5 0.234-0.5 0.5v11c0 0.266 0.234 0.5 0.5 0.5h8c0.266 0 0.5-0.234 0.5-0.5zM7.5 6.25c0-0.141-0.109-0.25-0.25-0.25h-2.5c-0.141 0-0.25 0.109-0.25 0.25s0.109 0.25 0.25 0.25h2.5c0.141 0 0.25-0.109 0.25-0.25zM12 6v16c0 1.094-0.906 2-2 2h-8c-1.094 0-2-0.906-2-2v-16c0-1.094 0.906-2 2-2h8c1.094 0 2 0.906 2 2z"></path>
				</svg>';
			break;
		case 'phoneAlt':
			$output .= '<svg class="responsive-svg-icon responsive-phone-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Phone', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M7 1c-0.828 0-1.58 0.337-2.121 0.879s-0.879 1.293-0.879 2.121v16c0 0.828 0.337 1.58 0.879 2.121s1.293 0.879 2.121 0.879h10c0.828 0 1.58-0.337 2.121-0.879s0.879-1.293 0.879-2.121v-16c0-0.828-0.337-1.58-0.879-2.121s-1.293-0.879-2.121-0.879zM7 3h10c0.276 0 0.525 0.111 0.707 0.293s0.293 0.431 0.293 0.707v16c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293h-10c-0.276 0-0.525-0.111-0.707-0.293s-0.293-0.431-0.293-0.707v-16c0-0.276 0.111-0.525 0.293-0.707s0.431-0.293 0.707-0.293zM12 19c0.552 0 1-0.448 1-1s-0.448-1-1-1-1 0.448-1 1 0.448 1 1 1z"></path>
				</svg>';
			break;
		case 'phoneAlt2':
			$output .= '<svg class="responsive-svg-icon responsive-phone-alt2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Phone', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M20 18.641c0-0.078 0-0.172-0.031-0.25-0.094-0.281-2.375-1.437-2.812-1.687-0.297-0.172-0.656-0.516-1.016-0.516-0.688 0-1.703 2.047-2.312 2.047-0.313 0-0.703-0.281-0.984-0.438-2.063-1.156-3.484-2.578-4.641-4.641-0.156-0.281-0.438-0.672-0.438-0.984 0-0.609 2.047-1.625 2.047-2.312 0-0.359-0.344-0.719-0.516-1.016-0.25-0.438-1.406-2.719-1.687-2.812-0.078-0.031-0.172-0.031-0.25-0.031-0.406 0-1.203 0.187-1.578 0.344-1.031 0.469-1.781 2.438-1.781 3.516 0 1.047 0.422 2 0.781 2.969 1.25 3.422 4.969 7.141 8.391 8.391 0.969 0.359 1.922 0.781 2.969 0.781 1.078 0 3.047-0.75 3.516-1.781 0.156-0.375 0.344-1.172 0.344-1.578zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15c-2.484 0-4.5-2.016-4.5-4.5v-15c0-2.484 2.016-4.5 4.5-4.5h15c2.484 0 4.5 2.016 4.5 4.5z"></path>
				</svg>';
			break;
		case 'google_reviews':
			$output .= '<svg class="responsive-svg-icon responsive-google-reviews-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Google Reviews', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M12 12.281h11.328c0.109 0.609 0.187 1.203 0.187 2 0 6.844-4.594 11.719-11.516 11.719-6.641 0-12-5.359-12-12s5.359-12 12-12c3.234 0 5.953 1.188 8.047 3.141l-3.266 3.141c-0.891-0.859-2.453-1.859-4.781-1.859-4.094 0-7.438 3.391-7.438 7.578s3.344 7.578 7.438 7.578c4.75 0 6.531-3.406 6.813-5.172h-6.813v-4.125z"></path>
				</svg>';
			break;
		case 'telegram':
			$output .= '<svg class="responsive-svg-icon responsive-telegram-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Telegram', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M26.070 3.996c-0.342 0.026-0.659 0.105-0.952 0.23l0.019-0.007h-0.004c-0.285 0.113-1.64 0.683-3.7 1.547l-7.382 3.109c-5.297 2.23-10.504 4.426-10.504 4.426l0.062-0.024s-0.359 0.118-0.734 0.375c-0.234 0.15-0.429 0.339-0.582 0.56l-0.004 0.007c-0.184 0.27-0.332 0.683-0.277 1.11 0.090 0.722 0.558 1.155 0.894 1.394 0.34 0.242 0.664 0.355 0.664 0.355h0.008l4.883 1.645c0.219 0.703 1.488 4.875 1.793 5.836 0.18 0.574 0.355 0.933 0.574 1.207 0.106 0.14 0.23 0.257 0.379 0.351 0.071 0.042 0.152 0.078 0.238 0.104l0.008 0.002-0.050-0.012c0.015 0.004 0.027 0.016 0.038 0.020 0.040 0.011 0.067 0.015 0.118 0.023 0.773 0.234 1.394-0.246 1.394-0.246l0.035-0.028 2.883-2.625 4.832 3.707 0.11 0.047c1.007 0.442 2.027 0.196 2.566-0.238 0.543-0.437 0.754-0.996 0.754-0.996l0.035-0.090 3.734-19.129c0.106-0.472 0.133-0.914 0.016-1.343-0.126-0.443-0.404-0.808-0.774-1.043l-0.007-0.004c-0.277-0.171-0.613-0.272-0.972-0.272-0.033 0-0.066 0.001-0.099 0.003l0.005-0zM25.969 6.046c-0.004 0.063 0.008 0.056-0.020 0.177v0.011l-3.699 18.93c-0.016 0.027-0.043 0.086-0.117 0.145-0.078 0.062-0.14 0.101-0.465-0.028l-5.91-4.531-3.57 3.254 0.75-4.79 9.656-9c0.398-0.37 0.265-0.448 0.265-0.448 0.028-0.454-0.601-0.133-0.601-0.133l-12.176 7.543-0.004-0.020-5.851-1.972c0.012-0.004 0.022-0.008 0.032-0.013l-0.002 0.001 0.032-0.016 0.031-0.011s5.211-2.196 10.508-4.426c2.652-1.117 5.324-2.242 7.379-3.11 2.055-0.863 3.574-1.496 3.66-1.53 0.082-0.032 0.043-0.032 0.102-0.032z"></path>
				</svg>';
			break;
		case 'telegramAlt':
			$output .= '<svg class="responsive-svg-icon responsive-telegram-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Telegram', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M18.578 20.422l2.297-10.828c0.203-0.953-0.344-1.328-0.969-1.094l-13.5 5.203c-0.922 0.359-0.906 0.875-0.156 1.109l3.453 1.078 8.016-5.047c0.375-0.25 0.719-0.109 0.438 0.141l-6.484 5.859-0.25 3.563c0.359 0 0.516-0.156 0.703-0.344l1.687-1.625 3.5 2.578c0.641 0.359 1.094 0.172 1.266-0.594zM28 14c0 7.734-6.266 14-14 14s-14-6.266-14-14 6.266-14 14-14 14 6.266 14 14z"></path>
				</svg>';
			break;
		case 'trip_advisor':
			$output .= '<svg class="responsive-svg-icon responsive-trip-advisor-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="36" height="28" viewBox="0 0 36 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Trip Advisor', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M10.172 15.578c0 0.812-0.656 1.469-1.453 1.469-0.812 0-1.469-0.656-1.469-1.469 0-0.797 0.656-1.453 1.469-1.453 0.797 0 1.453 0.656 1.453 1.453zM28.203 15.563c0 0.812-0.656 1.469-1.469 1.469s-1.469-0.656-1.469-1.469 0.656-1.453 1.469-1.453 1.469 0.641 1.469 1.453zM11.953 15.578c0-1.656-1.359-3.016-3.016-3.016-1.672 0-3.016 1.359-3.016 3.016 0 1.672 1.344 3.016 3.016 3.016 1.656 0 3.016-1.344 3.016-3.016zM29.969 15.563c0-1.656-1.344-3.016-3.016-3.016-1.656 0-3.016 1.359-3.016 3.016 0 1.672 1.359 3.016 3.016 3.016 1.672 0 3.016-1.344 3.016-3.016zM13.281 15.578c0 2.406-1.937 4.359-4.344 4.359s-4.359-1.953-4.359-4.359c0-2.391 1.953-4.344 4.359-4.344s4.344 1.953 4.344 4.344zM31.313 15.563c0 2.406-1.953 4.344-4.359 4.344-2.391 0-4.344-1.937-4.344-4.344s1.953-4.344 4.344-4.344c2.406 0 4.359 1.937 4.359 4.344zM16.25 15.609c0-3.984-3.234-7.219-7.219-7.219-3.969 0-7.203 3.234-7.203 7.219s3.234 7.219 7.203 7.219c3.984 0 7.219-3.234 7.219-7.219zM26.688 6.656c-2.578-1.125-5.484-1.734-8.687-1.734s-6.391 0.609-8.953 1.719c4.953 0.016 8.953 4.016 8.953 8.969 0-4.859 3.859-8.813 8.687-8.953zM34.172 15.609c0-3.984-3.219-7.219-7.203-7.219s-7.219 3.234-7.219 7.219 3.234 7.219 7.219 7.219 7.203-3.234 7.203-7.219zM30.016 6.766h5.984c-0.938 1.094-1.625 2.562-1.797 3.578 1.078 1.484 1.719 3.297 1.719 5.266 0 4.953-4.016 8.953-8.953 8.953-2.812 0-5.313-1.281-6.953-3.297 0 0-0.734 0.875-2.016 2.797-0.219-0.453-1.328-2.031-2-2.812-1.641 2.031-4.156 3.313-6.969 3.313-4.937 0-8.953-4-8.953-8.953 0-1.969 0.641-3.781 1.719-5.266-0.172-1.016-0.859-2.484-1.797-3.578h5.703c3.063-2.047 7.516-3.328 12.297-3.328s8.953 1.281 12.016 3.328z"></path>
				</svg>';
			break;
		case 'yelp':
			$output .= '<svg class="responsive-svg-icon responsive-yelp-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Yelp', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M12.078 20.609v1.984c-0.016 4.406-0.016 4.562-0.094 4.766-0.125 0.328-0.406 0.547-0.797 0.625-1.125 0.187-4.641-1.109-5.375-1.984-0.156-0.172-0.234-0.375-0.266-0.562-0.016-0.141 0.016-0.281 0.063-0.406 0.078-0.219 0.219-0.391 3.359-4.109 0 0 0.016 0 0.938-1.094 0.313-0.391 0.875-0.516 1.391-0.328 0.516 0.203 0.797 0.641 0.781 1.109zM9.75 16.688c-0.031 0.547-0.344 0.953-0.812 1.094l-1.875 0.609c-4.203 1.344-4.344 1.375-4.562 1.375-0.344-0.016-0.656-0.219-0.844-0.562-0.125-0.25-0.219-0.672-0.266-1.172-0.172-1.531 0.031-3.828 0.484-4.547 0.219-0.344 0.531-0.516 0.875-0.5 0.234 0 0.422 0.094 4.953 1.937 0 0-0.016 0.016 1.313 0.531 0.469 0.187 0.766 0.672 0.734 1.234zM22.656 21.328c-0.156 1.125-2.484 4.078-3.547 4.5-0.359 0.141-0.719 0.109-0.984-0.109-0.187-0.141-0.375-0.422-2.875-4.484l-0.734-1.203c-0.281-0.438-0.234-1 0.125-1.437 0.344-0.422 0.844-0.562 1.297-0.406 0 0 0.016 0.016 1.859 0.625 4.203 1.375 4.344 1.422 4.516 1.563 0.281 0.219 0.406 0.547 0.344 0.953zM12.156 11.453c0.078 1.625-0.609 1.828-0.844 1.906-0.219 0.063-0.906 0.266-1.781-1.109-5.75-9.078-5.906-9.344-5.906-9.344-0.078-0.328 0.016-0.688 0.297-0.969 0.859-0.891 5.531-2.203 6.75-1.891 0.391 0.094 0.672 0.344 0.766 0.703 0.063 0.391 0.625 8.813 0.719 10.703zM22.5 13.141c0.031 0.391-0.109 0.719-0.406 0.922-0.187 0.125-0.375 0.187-5.141 1.344-0.766 0.172-1.188 0.281-1.422 0.359l0.016-0.031c-0.469 0.125-1-0.094-1.297-0.562s-0.281-0.984 0-1.359c0 0 0.016-0.016 1.172-1.594 2.562-3.5 2.688-3.672 2.875-3.797 0.297-0.203 0.656-0.203 1.016-0.031 1.016 0.484 3.063 3.531 3.187 4.703v0.047z"></path>
				</svg>';
			break;
		case 'user':
			$output .= '<svg class="responsive-svg-icon responsive-user-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'User', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M9 11.041v-0.825c1.102-0.621 2-2.168 2-3.716 0-2.485 0-4.5-3-4.5s-3 2.015-3 4.5c0 1.548 0.898 3.095 2 3.716v0.825c-3.392 0.277-6 1.944-6 3.959h14c0-2.015-2.608-3.682-6-3.959z"></path>
				</svg>';
			break;
		case 'comments':
			$output .= '<svg class="responsive-svg-icon responsive-comments-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Comments', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M11 6c-4.875 0-9 2.75-9 6 0 1.719 1.156 3.375 3.156 4.531l1.516 0.875-0.547 1.313c0.328-0.187 0.656-0.391 0.969-0.609l0.688-0.484 0.828 0.156c0.781 0.141 1.578 0.219 2.391 0.219 4.875 0 9-2.75 9-6s-4.125-6-9-6zM11 4c6.078 0 11 3.578 11 8s-4.922 8-11 8c-0.953 0-1.875-0.094-2.75-0.25-1.297 0.922-2.766 1.594-4.344 2-0.422 0.109-0.875 0.187-1.344 0.25h-0.047c-0.234 0-0.453-0.187-0.5-0.453v0c-0.063-0.297 0.141-0.484 0.313-0.688 0.609-0.688 1.297-1.297 1.828-2.594-2.531-1.469-4.156-3.734-4.156-6.266 0-4.422 4.922-8 11-8zM23.844 22.266c0.531 1.297 1.219 1.906 1.828 2.594 0.172 0.203 0.375 0.391 0.313 0.688v0c-0.063 0.281-0.297 0.484-0.547 0.453-0.469-0.063-0.922-0.141-1.344-0.25-1.578-0.406-3.047-1.078-4.344-2-0.875 0.156-1.797 0.25-2.75 0.25-2.828 0-5.422-0.781-7.375-2.063 0.453 0.031 0.922 0.063 1.375 0.063 3.359 0 6.531-0.969 8.953-2.719 2.609-1.906 4.047-4.484 4.047-7.281 0-0.812-0.125-1.609-0.359-2.375 2.641 1.453 4.359 3.766 4.359 6.375 0 2.547-1.625 4.797-4.156 6.266z"></path>
				</svg>';
			break;
		case 'commentsAlt':
			$output .= '<svg class="responsive-svg-icon responsive-comments-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Comments', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M10 14c0 1.109-0.891 2-2 2s-2-0.891-2-2 0.891-2 2-2 2 0.891 2 2zM16 14c0 1.109-0.891 2-2 2s-2-0.891-2-2 0.891-2 2-2 2 0.891 2 2zM22 14c0 1.109-0.891 2-2 2s-2-0.891-2-2 0.891-2 2-2 2 0.891 2 2zM14 6c-6.5 0-12 3.656-12 8 0 2.328 1.563 4.547 4.266 6.078l1.359 0.781-0.422 1.5c-0.297 1.109-0.688 1.969-1.094 2.688 1.578-0.656 3.016-1.547 4.297-2.672l0.672-0.594 0.891 0.094c0.672 0.078 1.359 0.125 2.031 0.125 6.5 0 12-3.656 12-8s-5.5-8-12-8zM28 14c0 5.531-6.266 10-14 10-0.766 0-1.531-0.047-2.266-0.125-2.047 1.813-4.484 3.094-7.187 3.781-0.562 0.156-1.172 0.266-1.781 0.344h-0.078c-0.313 0-0.594-0.25-0.672-0.594v-0.016c-0.078-0.391 0.187-0.625 0.422-0.906 0.984-1.109 2.109-2.047 2.844-4.656-3.219-1.828-5.281-4.656-5.281-7.828 0-5.516 6.266-10 14-10v0c7.734 0 14 4.484 14 10z"></path>
				</svg>';
			break;
		case 'folder':
			$output .= '<svg class="responsive-svg-icon responsive-comments-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Categories', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M24 20.5v-11c0-0.828-0.672-1.5-1.5-1.5h-11c-0.828 0-1.5-0.672-1.5-1.5v-1c0-0.828-0.672-1.5-1.5-1.5h-5c-0.828 0-1.5 0.672-1.5 1.5v15c0 0.828 0.672 1.5 1.5 1.5h19c0.828 0 1.5-0.672 1.5-1.5zM26 9.5v11c0 1.922-1.578 3.5-3.5 3.5h-19c-1.922 0-3.5-1.578-3.5-3.5v-15c0-1.922 1.578-3.5 3.5-3.5h5c1.922 0 3.5 1.578 3.5 3.5v0.5h10.5c1.922 0 3.5 1.578 3.5 3.5z"></path>
				</svg>';
			break;
		case 'grid':
			$output .= '<svg class="responsive-svg-icon responsive-grid-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Grid', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 19.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM8 11.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM18 19.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM8 3.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM18 11.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM28 19.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM18 3.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM28 11.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5zM28 3.5v3c0 0.828-0.672 1.5-1.5 1.5h-5c-0.828 0-1.5-0.672-1.5-1.5v-3c0-0.828 0.672-1.5 1.5-1.5h5c0.828 0 1.5 0.672 1.5 1.5z"></path>
				</svg>';
			break;
		case 'gridlarge':
			$output .= '<svg class="responsive-svg-icon responsive-gridlarge-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Grid', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M12 16v6c0 1.094-0.906 2-2 2h-8c-1.094 0-2-0.906-2-2v-6c0-1.094 0.906-2 2-2h8c1.094 0 2 0.906 2 2zM12 4v6c0 1.094-0.906 2-2 2h-8c-1.094 0-2-0.906-2-2v-6c0-1.094 0.906-2 2-2h8c1.094 0 2 0.906 2 2zM26 16v6c0 1.094-0.906 2-2 2h-8c-1.094 0-2-0.906-2-2v-6c0-1.094 0.906-2 2-2h8c1.094 0 2 0.906 2 2zM26 4v6c0 1.094-0.906 2-2 2h-8c-1.094 0-2-0.906-2-2v-6c0-1.094 0.906-2 2-2h8c1.094 0 2 0.906 2 2z"></path>
				</svg>';
			break;
		case 'list':
			$output .= '<svg class="responsive-svg-icon responsive-list-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'List', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M1 3h14v3h-14zM1 7h14v3h-14zM1 11h14v3h-14z"></path>
				</svg>';
			break;
		case 'account':
			$output .= '<svg class="responsive-svg-icon responsive-account-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Account', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M21 21v-2c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464h-8c-1.38 0-2.632 0.561-3.536 1.464s-1.464 2.156-1.464 3.536v2c0 0.552 0.448 1 1 1s1-0.448 1-1v-2c0-0.829 0.335-1.577 0.879-2.121s1.292-0.879 2.121-0.879h8c0.829 0 1.577 0.335 2.121 0.879s0.879 1.292 0.879 2.121v2c0 0.552 0.448 1 1 1s1-0.448 1-1zM17 7c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464-2.632 0.561-3.536 1.464-1.464 2.156-1.464 3.536 0.561 2.632 1.464 3.536 2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536zM15 7c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121 0.335-1.577 0.879-2.121 1.292-0.879 2.121-0.879 1.577 0.335 2.121 0.879 0.879 1.292 0.879 2.121z"></path>
				</svg>';
			break;
		case 'account2':
			$output .= '<svg class="responsive-svg-icon responsive-account2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Account', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M23.797 20.922c-0.406-2.922-1.594-5.516-4.25-5.875-1.375 1.5-3.359 2.453-5.547 2.453s-4.172-0.953-5.547-2.453c-2.656 0.359-3.844 2.953-4.25 5.875 2.172 3.063 5.75 5.078 9.797 5.078s7.625-2.016 9.797-5.078zM20 10c0-3.313-2.688-6-6-6s-6 2.688-6 6 2.688 6 6 6 6-2.688 6-6zM28 14c0 7.703-6.25 14-14 14-7.734 0-14-6.281-14-14 0-7.734 6.266-14 14-14s14 6.266 14 14z"></path>
				</svg>';
			break;
		case 'account3':
			$output .= '<svg class="responsive-svg-icon responsive-account3-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Account', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14 0c7.734 0 14 6.266 14 14 0 7.688-6.234 14-14 14-7.75 0-14-6.297-14-14 0-7.734 6.266-14 14-14zM23.672 21.109c1.453-2 2.328-4.453 2.328-7.109 0-6.609-5.391-12-12-12s-12 5.391-12 12c0 2.656 0.875 5.109 2.328 7.109 0.562-2.797 1.922-5.109 4.781-5.109 1.266 1.234 2.984 2 4.891 2s3.625-0.766 4.891-2c2.859 0 4.219 2.312 4.781 5.109zM20 11c0-3.313-2.688-6-6-6s-6 2.688-6 6 2.688 6 6 6 6-2.688 6-6z"></path>
				</svg>';
			break;
		case 'feed':
			$output .= '<svg class="responsive-svg-icon responsive-feed-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'RSS', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M6 21c0 1.656-1.344 3-3 3s-3-1.344-3-3 1.344-3 3-3 3 1.344 3 3zM14 22.922c0.016 0.281-0.078 0.547-0.266 0.75-0.187 0.219-0.453 0.328-0.734 0.328h-2.109c-0.516 0-0.938-0.391-0.984-0.906-0.453-4.766-4.234-8.547-9-9-0.516-0.047-0.906-0.469-0.906-0.984v-2.109c0-0.281 0.109-0.547 0.328-0.734 0.172-0.172 0.422-0.266 0.672-0.266h0.078c3.328 0.266 6.469 1.719 8.828 4.094 2.375 2.359 3.828 5.5 4.094 8.828zM22 22.953c0.016 0.266-0.078 0.531-0.281 0.734-0.187 0.203-0.438 0.313-0.719 0.313h-2.234c-0.531 0-0.969-0.406-1-0.938-0.516-9.078-7.75-16.312-16.828-16.844-0.531-0.031-0.938-0.469-0.938-0.984v-2.234c0-0.281 0.109-0.531 0.313-0.719 0.187-0.187 0.438-0.281 0.688-0.281h0.047c5.469 0.281 10.609 2.578 14.484 6.469 3.891 3.875 6.188 9.016 6.469 14.484z"></path>
				</svg>';
			break;
		case 'pinterest':
			$output .= '<svg class="responsive-svg-icon responsive-pinterest-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Pinterest', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M19.5 2c2.484 0 4.5 2.016 4.5 4.5v15c0 2.484-2.016 4.5-4.5 4.5h-11.328c0.516-0.734 1.359-2 1.687-3.281 0 0 0.141-0.531 0.828-3.266 0.422 0.797 1.625 1.484 2.906 1.484 3.813 0 6.406-3.484 6.406-8.141 0-3.516-2.984-6.797-7.516-6.797-5.641 0-8.484 4.047-8.484 7.422 0 2.031 0.781 3.844 2.438 4.531 0.266 0.109 0.516 0 0.594-0.297 0.047-0.203 0.172-0.734 0.234-0.953 0.078-0.297 0.047-0.406-0.172-0.656-0.469-0.578-0.781-1.297-0.781-2.344 0-3 2.25-5.672 5.844-5.672 3.187 0 4.937 1.937 4.937 4.547 0 3.422-1.516 6.312-3.766 6.312-1.234 0-2.172-1.031-1.875-2.297 0.359-1.5 1.047-3.125 1.047-4.203 0-0.969-0.516-1.781-1.594-1.781-1.266 0-2.281 1.313-2.281 3.063 0 0 0 1.125 0.375 1.891-1.297 5.5-1.531 6.469-1.531 6.469-0.344 1.437-0.203 3.109-0.109 3.969h-2.859c-2.484 0-4.5-2.016-4.5-4.5v-15c0-2.484 2.016-4.5 4.5-4.5h15z"></path>
				</svg>';
			break;
		case 'pinterestAlt':
			$output .= '<svg class="responsive-svg-icon responsive-pinterest-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Pinterest', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 0c-4.412 0-8 3.587-8 8s3.587 8 8 8 8-3.588 8-8-3.588-8-8-8zM8 14.931c-0.716 0-1.403-0.109-2.053-0.309 0.281-0.459 0.706-1.216 0.862-1.816 0.084-0.325 0.431-1.647 0.431-1.647 0.225 0.431 0.888 0.797 1.587 0.797 2.091 0 3.597-1.922 3.597-4.313 0-2.291-1.869-4.003-4.272-4.003-2.991 0-4.578 2.009-4.578 4.194 0 1.016 0.541 2.281 1.406 2.684 0.131 0.063 0.2 0.034 0.231-0.094 0.022-0.097 0.141-0.566 0.194-0.787 0.016-0.069 0.009-0.131-0.047-0.2-0.287-0.347-0.516-0.988-0.516-1.581 0-1.528 1.156-3.009 3.128-3.009 1.703 0 2.894 1.159 2.894 2.819 0 1.875-0.947 3.175-2.178 3.175-0.681 0-1.191-0.563-1.025-1.253 0.197-0.825 0.575-1.713 0.575-2.306 0-0.531-0.284-0.975-0.878-0.975-0.697 0-1.253 0.719-1.253 1.684 0 0.612 0.206 1.028 0.206 1.028s-0.688 2.903-0.813 3.444c-0.141 0.6-0.084 1.441-0.025 1.988-2.578-1.006-4.406-3.512-4.406-6.45 0-3.828 3.103-6.931 6.931-6.931s6.931 3.103 6.931 6.931c0 3.828-3.103 6.931-6.931 6.931z"></path>
				</svg>';
			break;
		case 'mobile':
			$output .= '<svg class="responsive-svg-icon responsive-mobile-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="12" height="28" viewBox="0 0 12 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Mobile', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M7.25 22c0-0.688-0.562-1.25-1.25-1.25s-1.25 0.562-1.25 1.25 0.562 1.25 1.25 1.25 1.25-0.562 1.25-1.25zM10.5 19.5v-11c0-0.266-0.234-0.5-0.5-0.5h-8c-0.266 0-0.5 0.234-0.5 0.5v11c0 0.266 0.234 0.5 0.5 0.5h8c0.266 0 0.5-0.234 0.5-0.5zM7.5 6.25c0-0.141-0.109-0.25-0.25-0.25h-2.5c-0.141 0-0.25 0.109-0.25 0.25s0.109 0.25 0.25 0.25h2.5c0.141 0 0.25-0.109 0.25-0.25zM12 6v16c0 1.094-0.906 2-2 2h-8c-1.094 0-2-0.906-2-2v-16c0-1.094 0.906-2 2-2h8c1.094 0 2 0.906 2 2z"></path>
				</svg>';
			break;
		case 'hours':
			$output .= '<svg class="responsive-svg-icon responsive-hours-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Hours', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14 8.5v7c0 0.281-0.219 0.5-0.5 0.5h-5c-0.281 0-0.5-0.219-0.5-0.5v-1c0-0.281 0.219-0.5 0.5-0.5h3.5v-5.5c0-0.281 0.219-0.5 0.5-0.5h1c0.281 0 0.5 0.219 0.5 0.5zM20.5 14c0-4.688-3.813-8.5-8.5-8.5s-8.5 3.813-8.5 8.5 3.813 8.5 8.5 8.5 8.5-3.813 8.5-8.5zM24 14c0 6.625-5.375 12-12 12s-12-5.375-12-12 5.375-12 12-12 12 5.375 12 12z"></path>
				</svg>';
			break;
		case 'hoursAlt':
			$output .= '<svg class="responsive-svg-icon responsive-hours-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Hours', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M23 12c0-3.037-1.232-5.789-3.222-7.778s-4.741-3.222-7.778-3.222-5.789 1.232-7.778 3.222-3.222 4.741-3.222 7.778 1.232 5.789 3.222 7.778 4.741 3.222 7.778 3.222 5.789-1.232 7.778-3.222 3.222-4.741 3.222-7.778zM21 12c0 2.486-1.006 4.734-2.636 6.364s-3.878 2.636-6.364 2.636-4.734-1.006-6.364-2.636-2.636-3.878-2.636-6.364 1.006-4.734 2.636-6.364 3.878-2.636 6.364-2.636 4.734 1.006 6.364 2.636 2.636 3.878 2.636 6.364zM11 6v6c0 0.389 0.222 0.727 0.553 0.894l4 2c0.494 0.247 1.095 0.047 1.342-0.447s0.047-1.095-0.447-1.342l-3.448-1.723v-5.382c0-0.552-0.448-1-1-1s-1 0.448-1 1z"></path>
				</svg>';
			break;
		case 'hoursAlt2':
			$output .= '<svg class="responsive-svg-icon responsive-hours-alt2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Hours', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 0c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zM10.293 11.707l-3.293-3.293v-4.414h2v3.586l2.707 2.707-1.414 1.414z"></path>
				</svg>';
			break;
		case 'location':
			$output .= '<svg class="responsive-svg-icon responsive-location-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="28" viewBox="0 0 16 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Location', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M12 10c0-2.203-1.797-4-4-4s-4 1.797-4 4 1.797 4 4 4 4-1.797 4-4zM16 10c0 0.953-0.109 1.937-0.516 2.797l-5.688 12.094c-0.328 0.688-1.047 1.109-1.797 1.109s-1.469-0.422-1.781-1.109l-5.703-12.094c-0.406-0.859-0.516-1.844-0.516-2.797 0-4.422 3.578-8 8-8s8 3.578 8 8z"></path>
				</svg>';
			break;
		case 'locationAlt':
			$output .= '<svg class="responsive-svg-icon responsive-location-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Location', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M22 10c0-2.761-1.12-5.263-2.929-7.071s-4.31-2.929-7.071-2.929-5.263 1.12-7.071 2.929-2.929 4.31-2.929 7.071c0 0.569 0.053 1.128 0.15 1.676 0.274 1.548 0.899 3.004 1.682 4.32 2.732 4.591 7.613 7.836 7.613 7.836 0.331 0.217 0.765 0.229 1.109 0 0 0 4.882-3.245 7.613-7.836 0.783-1.316 1.408-2.772 1.682-4.32 0.098-0.548 0.151-1.107 0.151-1.676zM20 10c0 0.444-0.041 0.887-0.119 1.328-0.221 1.25-0.737 2.478-1.432 3.646-1.912 3.214-5.036 5.747-6.369 6.74-1.398-0.916-4.588-3.477-6.53-6.74-0.695-1.168-1.211-2.396-1.432-3.646-0.077-0.441-0.118-0.884-0.118-1.328 0-2.209 0.894-4.208 2.343-5.657s3.448-2.343 5.657-2.343 4.208 0.894 5.657 2.343 2.343 3.448 2.343 5.657zM16 10c0-1.104-0.449-2.106-1.172-2.828s-1.724-1.172-2.828-1.172-2.106 0.449-2.828 1.172-1.172 1.724-1.172 2.828 0.449 2.106 1.172 2.828 1.724 1.172 2.828 1.172 2.106-0.449 2.828-1.172 1.172-1.724 1.172-2.828zM14 10c0 0.553-0.223 1.051-0.586 1.414s-0.861 0.586-1.414 0.586-1.051-0.223-1.414-0.586-0.586-0.861-0.586-1.414 0.223-1.051 0.586-1.414 0.861-0.586 1.414-0.586 1.051 0.223 1.414 0.586 0.586 0.861 0.586 1.414z"></path>
				</svg>';
			break;
		case 'locationAlt2':
			$output .= '<svg class="responsive-svg-icon responsive-location-alt2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Location', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 0c-2.761 0-5 2.239-5 5 0 5 5 9 5 9s5-4 5-9c0-2.761-2.239-5-5-5zM8 8c-1.657 0-3-1.343-3-3s1.343-3 3-3c1.657 0 3 1.343 3 3s-1.343 3-3 3zM12.285 10.9c-0.222 0.348-0.451 0.678-0.682 0.988 0.037 0.017 0.073 0.035 0.108 0.052 0.76 0.38 1.101 0.806 1.101 1.059s-0.34 0.679-1.101 1.059c-0.957 0.479-2.31 0.753-3.712 0.753s-2.754-0.275-3.712-0.753c-0.76-0.38-1.101-0.806-1.101-1.059s0.34-0.679 1.101-1.059c0.036-0.018 0.072-0.035 0.108-0.052-0.231-0.31-0.461-0.64-0.682-0.988-1.061 0.541-1.715 1.282-1.715 2.1 0 1.657 2.686 3 6 3s6-1.343 6-3c0-0.817-0.654-1.558-1.715-2.1z"></path>
				</svg>';
			break;
		case 'envelop':
			$output .= '<svg class="responsive-svg-icon responsive-envelop-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Envelop', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14.5 2h-13c-0.825 0-1.5 0.675-1.5 1.5v10c0 0.825 0.675 1.5 1.5 1.5h13c0.825 0 1.5-0.675 1.5-1.5v-10c0-0.825-0.675-1.5-1.5-1.5zM6.23 8.6l-4.23 3.295v-7.838l4.23 4.543zM2.756 4h10.488l-5.244 3.938-5.244-3.938zM6.395 8.777l1.605 1.723 1.605-1.723 3.29 4.223h-9.79l3.29-4.223zM9.77 8.6l4.23-4.543v7.838l-4.23-3.295z"></path>
				</svg>';
			break;
		case 'linkedin':
			$output .= '<svg class="responsive-svg-icon responsive-linkedin-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Linkedin', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M3.703 22.094h3.609v-10.844h-3.609v10.844zM7.547 7.906c-0.016-1.062-0.781-1.875-2.016-1.875s-2.047 0.812-2.047 1.875c0 1.031 0.781 1.875 2 1.875h0.016c1.266 0 2.047-0.844 2.047-1.875zM16.688 22.094h3.609v-6.219c0-3.328-1.781-4.875-4.156-4.875-1.937 0-2.797 1.078-3.266 1.828h0.031v-1.578h-3.609s0.047 1.016 0 10.844v0h3.609v-6.062c0-0.313 0.016-0.641 0.109-0.875 0.266-0.641 0.859-1.313 1.859-1.313 1.297 0 1.813 0.984 1.813 2.453v5.797zM24 6.5v15c0 2.484-2.016 4.5-4.5 4.5h-15c-2.484 0-4.5-2.016-4.5-4.5v-15c0-2.484 2.016-4.5 4.5-4.5h15c2.484 0 4.5 2.016 4.5 4.5z"></path>
				</svg>';
			break;
		case 'linkedinAlt':
			$output .= '<svg class="responsive-svg-icon responsive-linkedin-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Linkedin', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M16 7c-1.933 0-3.684 0.785-4.95 2.050s-2.050 3.017-2.050 4.95v7c0 0.552 0.448 1 1 1h4c0.552 0 1-0.448 1-1v-7c0-0.276 0.111-0.525 0.293-0.707s0.431-0.293 0.707-0.293 0.525 0.111 0.707 0.293 0.293 0.431 0.293 0.707v7c0 0.552 0.448 1 1 1h4c0.552 0 1-0.448 1-1v-7c0-1.933-0.785-3.684-2.050-4.95s-3.017-2.050-4.95-2.050zM16 9c1.381 0 2.63 0.559 3.536 1.464s1.464 2.155 1.464 3.536v6h-2v-6c0-0.828-0.337-1.58-0.879-2.121s-1.293-0.879-2.121-0.879-1.58 0.337-2.121 0.879-0.879 1.293-0.879 2.121v6h-2v-6c0-1.381 0.559-2.63 1.464-3.536s2.155-1.464 3.536-1.464zM2 8c-0.552 0-1 0.448-1 1v12c0 0.552 0.448 1 1 1h4c0.552 0 1-0.448 1-1v-12c0-0.552-0.448-1-1-1zM3 10h2v10h-2zM7 4c0-0.828-0.337-1.58-0.879-2.121s-1.293-0.879-2.121-0.879-1.58 0.337-2.121 0.879-0.879 1.293-0.879 2.121 0.337 1.58 0.879 2.121 1.293 0.879 2.121 0.879 1.58-0.337 2.121-0.879 0.879-1.293 0.879-2.121zM5 4c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293-0.525-0.111-0.707-0.293-0.293-0.431-0.293-0.707 0.111-0.525 0.293-0.707 0.431-0.293 0.707-0.293 0.525 0.111 0.707 0.293 0.293 0.431 0.293 0.707z"></path>
				</svg>';
			break;
		case 'goodreads':
			$output .= '<svg class="responsive-svg-icon responsive-goodreads-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Goodreads', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M26.033 21.303v-20.649h-2.745v3.875h-0.085c-0.281-0.607-0.641-1.188-1.123-1.743-0.48-0.549-1.023-1.036-1.643-1.459-0.621-0.419-1.283-0.748-2.025-0.981-0.737-0.225-1.52-0.345-2.361-0.345-1.613 0-3.067 0.3-4.328 0.893-1.263 0.596-2.324 1.409-3.18 2.44s-1.511 2.235-1.96 3.615c-0.448 1.383-0.675 2.839-0.675 4.377 0 1.599 0.188 3.101 0.567 4.509 0.381 1.409 0.983 2.635 1.824 3.683 0.841 1.040 1.883 1.863 3.167 2.444 1.281 0.581 2.825 0.881 4.628 0.881 1.664 0 3.107-0.42 4.349-1.261s2.184-1.964 2.825-3.367h0.081v3.045c0 2.725-0.561 4.809-1.685 6.273-1.12 1.441-2.965 2.184-5.528 2.184-0.763 0-1.504-0.081-2.225-0.241-0.723-0.16-1.381-0.42-1.983-0.76-0.583-0.361-1.103-0.801-1.524-1.384-0.421-0.58-0.701-1.281-0.843-2.124h-2.809c0.089 1.183 0.42 2.205 0.983 3.067 0.565 0.861 1.281 1.563 2.136 2.124 0.855 0.541 1.823 0.941 2.896 1.203 1.081 0.259 2.185 0.4 3.325 0.4 1.844 0 3.388-0.26 4.648-0.74 1.263-0.501 2.285-1.203 3.068-2.144 0.801-0.944 1.361-2.065 1.724-3.408 0.36-1.343 0.56-2.845 0.56-4.489zM16.055 20.56c-1.273 0-2.379-0.252-3.305-0.761-0.929-0.507-1.703-1.176-2.309-2.004-0.623-0.828-1.063-1.776-1.363-2.852s-0.443-2.177-0.443-3.312c0-1.161 0.14-2.3 0.401-3.417 0.28-1.12 0.72-2.116 1.323-2.987 0.601-0.869 1.383-1.576 2.304-2.112s2.044-0.807 3.347-0.807 2.404 0.279 3.327 0.828c0.901 0.553 1.663 1.279 2.244 2.179 0.581 0.903 1.001 1.905 1.263 3.007 0.26 1.101 0.38 2.208 0.38 3.309 0 1.136-0.16 2.237-0.46 3.312-0.301 1.076-0.763 2.024-1.384 2.852-0.62 0.828-1.361 1.497-2.264 2.004-0.901 0.509-1.944 0.761-3.145 0.761z"></path>
				</svg>';
			break;
		case 'amazon':
			$output .= '<svg class="responsive-svg-icon responsive-amazon-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Amazon', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14.463 13.831c-1.753 1.294-4.291 1.981-6.478 1.981-3.066 0-5.825-1.131-7.912-3.019-0.163-0.147-0.019-0.35 0.178-0.234 2.253 1.313 5.041 2.1 7.919 2.1 1.941 0 4.075-0.403 6.041-1.238 0.294-0.125 0.544 0.197 0.253 0.409z"></path>
				<path d="M15.191 13c-0.225-0.287-1.481-0.137-2.047-0.069-0.172 0.019-0.197-0.128-0.044-0.238 1.003-0.703 2.647-0.5 2.838-0.266 0.194 0.238-0.050 1.884-0.991 2.672-0.144 0.122-0.281 0.056-0.219-0.103 0.216-0.528 0.688-1.709 0.463-1.997z"></path>
				<path d="M11.053 11.838l0.003 0.003c0.387-0.341 1.084-0.95 1.478-1.278 0.156-0.125 0.128-0.334 0.006-0.509-0.353-0.488-0.728-0.884-0.728-1.784v-3c0-1.272 0.088-2.438-0.847-3.313-0.738-0.706-1.963-0.956-2.9-0.956-1.831 0-3.875 0.684-4.303 2.947-0.047 0.241 0.131 0.369 0.287 0.403l1.866 0.203c0.175-0.009 0.3-0.181 0.334-0.356 0.159-0.778 0.813-1.156 1.547-1.156 0.397 0 0.847 0.144 1.081 0.5 0.269 0.397 0.234 0.938 0.234 1.397v0.25c-1.116 0.125-2.575 0.206-3.619 0.666-1.206 0.522-2.053 1.584-2.053 3.147 0 2 1.259 3 2.881 3 1.369 0 2.116-0.322 3.172-1.403 0.35 0.506 0.463 0.753 1.103 1.284 0.147 0.078 0.328 0.072 0.456-0.044zM9.113 7.144c0 0.75 0.019 1.375-0.359 2.041-0.306 0.544-0.791 0.875-1.331 0.875-0.737 0-1.169-0.563-1.169-1.394 0-1.641 1.472-1.938 2.863-1.938v0.416z"></path>
				</svg>';
			break;
		case 'bookbub':
			$output .= '<svg class="responsive-svg-icon responsive-bookbub-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'BookBub', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M6.4 4.267c-1.179 0-2.133 0.955-2.133 2.133v19.2c0 1.179 0.955 2.133 2.133 2.133h19.2c1.179 0 2.133-0.955 2.133-2.133v-19.2c0-1.179-0.955-2.133-2.133-2.133h-19.2zM7.467 10.667h3.435c2.158 0 3.646 0.867 3.646 2.454 0 1.321-1.030 2.191-2.088 2.45 1.541 0.329 2.537 1.261 2.544 2.735 0.009 1.871-1.571 3-2.885 3.006-0.605 0.002-4.642 0.021-4.642 0.021l-0.010-10.667zM17.067 10.667h3.435c2.158 0 3.646 0.867 3.646 2.454 0 1.321-1.030 2.191-2.087 2.45 1.541 0.329 2.537 1.261 2.544 2.735 0.009 1.871-1.571 3-2.885 3.006-0.605 0.002-4.642 0.021-4.642 0.021l-0.010-10.667zM9.531 12.329v2.723h1.465c0.631-0.001 1.448-0.52 1.448-1.385s-0.521-1.338-1.74-1.338h-1.173zM19.131 12.329v2.723h1.465c0.631-0.001 1.448-0.52 1.448-1.385s-0.521-1.338-1.74-1.338h-1.173zM9.533 16.66v3.033h1.679c0.723 0 1.66-0.487 1.66-1.542 0.001-0.893-0.597-1.492-1.994-1.492h-1.346zM19.133 16.66v3.033h1.679c0.723 0 1.66-0.487 1.66-1.542 0.001-0.893-0.597-1.492-1.994-1.492h-1.346z"></path>
				</svg>';
			break;
		case 'quotes':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-quotes-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Quotes', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M3.516 7c1.933 0 3.5 1.567 3.5 3.5s-1.567 3.5-3.5 3.5-3.5-1.567-3.5-3.5l-0.016-0.5c0-3.866 3.134-7 7-7v2c-1.336 0-2.591 0.52-3.536 1.464-0.182 0.182-0.348 0.375-0.497 0.578 0.179-0.028 0.362-0.043 0.548-0.043zM12.516 7c1.933 0 3.5 1.567 3.5 3.5s-1.567 3.5-3.5 3.5-3.5-1.567-3.5-3.5l-0.016-0.5c0-3.866 3.134-7 7-7v2c-1.336 0-2.591 0.52-3.536 1.464-0.182 0.182-0.348 0.375-0.497 0.578 0.179-0.028 0.362-0.043 0.549-0.043z"></path>
				</svg>';
			break;
		case 'arrow-left':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-left-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Previous', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M15.707 17.293l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-6 6c-0.391 0.391-0.391 1.024 0 1.414l6 6c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path>
				</svg>';
			break;
		case 'arrow-right':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-right-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Next', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M9.707 18.707l6-6c0.391-0.391 0.391-1.024 0-1.414l-6-6c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0z"></path>
				</svg>';
			break;
		case 'arrow-right-alt':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-right-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Continue', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M27 13.953c0 0.141-0.063 0.281-0.156 0.375l-6 5.531c-0.156 0.141-0.359 0.172-0.547 0.094-0.172-0.078-0.297-0.25-0.297-0.453v-3.5h-19.5c-0.281 0-0.5-0.219-0.5-0.5v-3c0-0.281 0.219-0.5 0.5-0.5h19.5v-3.5c0-0.203 0.109-0.375 0.297-0.453s0.391-0.047 0.547 0.078l6 5.469c0.094 0.094 0.156 0.219 0.156 0.359v0z"></path>
				</svg>';
			break;
		case 'arrow-left-alt':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-left-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Previous', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M28 12.5v3c0 0.281-0.219 0.5-0.5 0.5h-19.5v3.5c0 0.203-0.109 0.375-0.297 0.453s-0.391 0.047-0.547-0.078l-6-5.469c-0.094-0.094-0.156-0.219-0.156-0.359v0c0-0.141 0.063-0.281 0.156-0.375l6-5.531c0.156-0.141 0.359-0.172 0.547-0.094 0.172 0.078 0.297 0.25 0.297 0.453v3.5h19.5c0.281 0 0.5 0.219 0.5 0.5z"></path>
				</svg>';
			break;
		case 'arrow-down':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-down-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Expand', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M5.293 9.707l6 6c0.391 0.391 1.024 0.391 1.414 0l6-6c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
				</svg>';
			break;
		case 'arrow-up':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-up-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Arrow Up', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M5.707 12.707l5.293-5.293v11.586c0 0.552 0.448 1 1 1s1-0.448 1-1v-11.586l5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-7-7c-0.092-0.092-0.202-0.166-0.324-0.217s-0.253-0.076-0.383-0.076c-0.256 0-0.512 0.098-0.707 0.293l-7 7c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0z"></path>
				</svg>';
			break;
		case 'arrow-up2':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-arrow-up2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Arrow Up', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M25.172 15.172c0 0.531-0.219 1.031-0.578 1.406l-1.172 1.172c-0.375 0.375-0.891 0.594-1.422 0.594s-1.047-0.219-1.406-0.594l-4.594-4.578v11c0 1.125-0.938 1.828-2 1.828h-2c-1.062 0-2-0.703-2-1.828v-11l-4.594 4.578c-0.359 0.375-0.875 0.594-1.406 0.594s-1.047-0.219-1.406-0.594l-1.172-1.172c-0.375-0.375-0.594-0.875-0.594-1.406s0.219-1.047 0.594-1.422l10.172-10.172c0.359-0.375 0.875-0.578 1.406-0.578s1.047 0.203 1.422 0.578l10.172 10.172c0.359 0.375 0.578 0.891 0.578 1.422z"></path>
				</svg>';
			break;
		case 'chevron-up':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-chevron-up-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Arrow Up', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M18.707 14.293l-6-6c-0.391-0.391-1.024-0.391-1.414 0l-6 6c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path>
				</svg>';
			break;
		case 'chevron-up2':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-chevron-up2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Arrow Up', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M26.297 20.797l-2.594 2.578c-0.391 0.391-1.016 0.391-1.406 0l-8.297-8.297-8.297 8.297c-0.391 0.391-1.016 0.391-1.406 0l-2.594-2.578c-0.391-0.391-0.391-1.031 0-1.422l11.594-11.578c0.391-0.391 1.016-0.391 1.406 0l11.594 11.578c0.391 0.391 0.391 1.031 0 1.422z"></path>
				</svg>';
			break;
		case 'menu':
			$output .= '<svg' . ( ! $aria ? ' aria-hidden="true"' : '' ) . ' class="responsive-svg-icon responsive-menu-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Toggle Menu', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path>
				</svg>';
			break;
		case 'menu2':
			$output .= '<svg class="responsive-svg-icon responsive-menu2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Toggle Menu', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M24 21v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 13v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 5v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1z"></path>
				</svg>';
			break;
		case 'menu3':
			$output .= '<svg class="responsive-svg-icon responsive-menu3-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Toggle Menu', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M6 3c0-1.105 0.895-2 2-2s2 0.895 2 2c0 1.105-0.895 2-2 2s-2-0.895-2-2zM6 8c0-1.105 0.895-2 2-2s2 0.895 2 2c0 1.105-0.895 2-2 2s-2-0.895-2-2zM6 13c0-1.105 0.895-2 2-2s2 0.895 2 2c0 1.105-0.895 2-2 2s-2-0.895-2-2z"></path>
				</svg>';
			break;
		case 'listFilter':
			$output .= '<svg class="responsive-svg-icon responsive-list-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Filter', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M8 7h13c0.552 0 1-0.448 1-1s-0.448-1-1-1h-13c-0.552 0-1 0.448-1 1s0.448 1 1 1zM8 13h13c0.552 0 1-0.448 1-1s-0.448-1-1-1h-13c-0.552 0-1 0.448-1 1s0.448 1 1 1zM8 19h13c0.552 0 1-0.448 1-1s-0.448-1-1-1h-13c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7c0.552 0 1-0.448 1-1s-0.448-1-1-1-1 0.448-1 1 0.448 1 1 1zM3 13c0.552 0 1-0.448 1-1s-0.448-1-1-1-1 0.448-1 1 0.448 1 1 1zM3 19c0.552 0 1-0.448 1-1s-0.448-1-1-1-1 0.448-1 1 0.448 1 1 1z"></path>
				</svg>';
			break;
		case 'listFilterAlt':
			$output .= '<svg class="responsive-svg-icon responsive-list-filter-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Filter', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M6 12.984v-1.969h12v1.969h-12zM3 6h18v2.016h-18v-2.016zM9.984 18v-2.016h4.031v2.016h-4.031z"></path>
				</svg>';
			break;
		case 'close':
			$output .= '<svg class="responsive-svg-icon responsive-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Toggle Menu Close', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
				</svg>';
			break;
		case 'closeAlt':
			$output .= '<svg class="responsive-svg-icon responsive-close-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Toggle Menu Close', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M5 2c-0.828 0-1.58 0.337-2.121 0.879s-0.879 1.293-0.879 2.121v14c0 0.828 0.337 1.58 0.879 2.121s1.293 0.879 2.121 0.879h14c0.828 0 1.58-0.337 2.121-0.879s0.879-1.293 0.879-2.121v-14c0-0.828-0.337-1.58-0.879-2.121s-1.293-0.879-2.121-0.879zM5 4h14c0.276 0 0.525 0.111 0.707 0.293s0.293 0.431 0.293 0.707v14c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293h-14c-0.276 0-0.525-0.111-0.707-0.293s-0.293-0.431-0.293-0.707v-14c0-0.276 0.111-0.525 0.293-0.707s0.431-0.293 0.707-0.293zM14.293 8.293l-2.293 2.293-2.293-2.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414l2.293 2.293-2.293 2.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l2.293-2.293 2.293 2.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-2.293-2.293 2.293-2.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0z"></path>
				</svg>';
			break;
		case 'closeAlt2':
			$output .= '<svg class="responsive-svg-icon responsive-close-alt2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Toggle Menu Close', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M23 12c0-3.037-1.232-5.789-3.222-7.778s-4.741-3.222-7.778-3.222-5.789 1.232-7.778 3.222-3.222 4.741-3.222 7.778 1.232 5.789 3.222 7.778 4.741 3.222 7.778 3.222 5.789-1.232 7.778-3.222 3.222-4.741 3.222-7.778zM21 12c0 2.486-1.006 4.734-2.636 6.364s-3.878 2.636-6.364 2.636-4.734-1.006-6.364-2.636-2.636-3.878-2.636-6.364 1.006-4.734 2.636-6.364 3.878-2.636 6.364-2.636 4.734 1.006 6.364 2.636 2.636 3.878 2.636 6.364zM8.293 9.707l2.293 2.293-2.293 2.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l2.293-2.293 2.293 2.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-2.293-2.293 2.293-2.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-2.293 2.293-2.293-2.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path>
				</svg>';
			break;
		case 'shopping-bag':
			$output .= '<svg class="responsive-svg-icon responsive-shopping-bag-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Shopping Cart', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M19 5h-14l1.5-2h11zM21.794 5.392l-2.994-3.992c-0.196-0.261-0.494-0.399-0.8-0.4h-12c-0.326 0-0.616 0.156-0.8 0.4l-2.994 3.992c-0.043 0.056-0.081 0.117-0.111 0.182-0.065 0.137-0.096 0.283-0.095 0.426v14c0 0.828 0.337 1.58 0.879 2.121s1.293 0.879 2.121 0.879h14c0.828 0 1.58-0.337 2.121-0.879s0.879-1.293 0.879-2.121v-14c0-0.219-0.071-0.422-0.189-0.585-0.004-0.005-0.007-0.010-0.011-0.015zM4 7h16v13c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293h-14c-0.276 0-0.525-0.111-0.707-0.293s-0.293-0.431-0.293-0.707zM15 10c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121c0-0.552-0.448-1-1-1s-1 0.448-1 1c0 1.38 0.561 2.632 1.464 3.536s2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536c0-0.552-0.448-1-1-1s-1 0.448-1 1z"></path>
				</svg>';
			break;
		case 'shopping-cart':
			$output .= '<svg class="responsive-svg-icon responsive-shopping-cart-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Shopping Cart', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M11 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM22 21c0-0.552-0.225-1.053-0.586-1.414s-0.862-0.586-1.414-0.586-1.053 0.225-1.414 0.586-0.586 0.862-0.586 1.414 0.225 1.053 0.586 1.414 0.862 0.586 1.414 0.586 1.053-0.225 1.414-0.586 0.586-0.862 0.586-1.414zM7.221 7h14.57l-1.371 7.191c-0.046 0.228-0.166 0.425-0.332 0.568-0.18 0.156-0.413 0.246-0.688 0.241h-9.734c-0.232 0.003-0.451-0.071-0.626-0.203-0.19-0.143-0.329-0.351-0.379-0.603zM1 2h3.18l0.848 4.239c0.108 0.437 0.502 0.761 0.972 0.761h1.221l-0.4-2h-0.821c-0.552 0-1 0.448-1 1 0 0.053 0.004 0.105 0.012 0.155 0.004 0.028 0.010 0.057 0.017 0.084l1.671 8.347c0.149 0.751 0.57 1.383 1.14 1.811 0.521 0.392 1.17 0.613 1.854 0.603h9.706c0.748 0.015 1.455-0.261 1.995-0.727 0.494-0.426 0.848-1.013 0.985-1.683l1.602-8.402c0.103-0.543-0.252-1.066-0.795-1.17-0.065-0.013-0.13-0.019-0.187-0.018h-16.18l-0.84-4.196c-0.094-0.462-0.497-0.804-0.98-0.804h-4c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path>
				</svg>';
			break;
		case 'apple_podcasts':
			$output .= '<svg class="responsive-svg-icon responsive-apple-podcasts-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Apple Podcasts', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M5.34 0A5.328 5.328 0 000 5.34v13.32A5.328 5.328 0 005.34 24h13.32A5.328 5.328 0 0024 18.66V5.34A5.328 5.328 0 0018.66 0zm6.525 2.568c2.336 0 4.448.902 6.056 2.587 1.224 1.272 1.912 2.619 2.264 4.392.12.59.12 2.2.007 2.864a8.506 8.506 0 01-3.24 5.296c-.608.46-2.096 1.261-2.336 1.261-.088 0-.096-.091-.056-.46.072-.592.144-.715.48-.856.536-.224 1.448-.874 2.008-1.435a7.644 7.644 0 002.008-3.536c.208-.824.184-2.656-.048-3.504-.728-2.696-2.928-4.792-5.624-5.352-.784-.16-2.208-.16-3 0-2.728.56-4.984 2.76-5.672 5.528-.184.752-.184 2.584 0 3.336.456 1.832 1.64 3.512 3.192 4.512.304.2.672.408.824.472.336.144.408.264.472.856.04.36.03.464-.056.464-.056 0-.464-.176-.896-.384l-.04-.03c-2.472-1.216-4.056-3.274-4.632-6.012-.144-.706-.168-2.392-.03-3.04.36-1.74 1.048-3.1 2.192-4.304 1.648-1.737 3.768-2.656 6.128-2.656zm.134 2.81c.409.004.803.04 1.106.106 2.784.62 4.76 3.408 4.376 6.174-.152 1.114-.536 2.03-1.216 2.88-.336.43-1.152 1.15-1.296 1.15-.023 0-.048-.272-.048-.603v-.605l.416-.496c1.568-1.878 1.456-4.502-.256-6.224-.664-.67-1.432-1.064-2.424-1.246-.64-.118-.776-.118-1.448-.008-1.02.167-1.81.562-2.512 1.256-1.72 1.704-1.832 4.342-.264 6.222l.413.496v.608c0 .336-.027.608-.06.608-.03 0-.264-.16-.512-.36l-.034-.011c-.832-.664-1.568-1.842-1.872-2.997-.184-.698-.184-2.024.008-2.72.504-1.878 1.888-3.335 3.808-4.019.41-.145 1.133-.22 1.814-.211zm-.13 2.99c.31 0 .62.06.844.178.488.253.888.745 1.04 1.259.464 1.578-1.208 2.96-2.72 2.254h-.015c-.712-.331-1.096-.956-1.104-1.77 0-.733.408-1.371 1.112-1.745.224-.117.534-.176.844-.176zm-.011 4.728c.988-.004 1.706.349 1.97.97.198.464.124 1.932-.218 4.302-.232 1.656-.36 2.074-.68 2.356-.44.39-1.064.498-1.656.288h-.003c-.716-.257-.87-.605-1.164-2.644-.341-2.37-.416-3.838-.218-4.302.262-.616.974-.966 1.97-.97z" />
				</svg>';
			break;
		case 'spotify':
			$output .= '<svg class="responsive-svg-icon responsive-spotify-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Spotify', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z" />
				</svg>';
			break;
		case 'flickr':
			$output .= '<svg class="responsive-svg-icon responsive-flicker-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Flicker', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M0 12c0 3.074 2.494 5.564 5.565 5.564 3.075 0 5.569-2.49 5.569-5.564S8.641 6.436 5.565 6.436C2.495 6.436 0 8.926 0 12zm12.866 0c0 3.074 2.493 5.564 5.567 5.564C21.496 17.564 24 15.074 24 12s-2.492-5.564-5.564-5.564c-3.075 0-5.57 2.49-5.57 5.564z" />
				</svg>';
			break;
		case '500px':
			$output .= '<svg class="responsive-svg-icon responsive-500px-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( '500PX', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M7.433 9.01A2.994 2.994 0 0 0 4.443 12a2.993 2.993 0 0 0 2.99 2.99 2.994 2.994 0 0 0 2.99-2.99 2.993 2.993 0 0 0-2.99-2.99m0 5.343A2.357 2.357 0 0 1 5.079 12a2.357 2.357 0 0 1 2.354-2.353A2.356 2.356 0 0 1 9.786 12a2.356 2.356 0 0 1-2.353 2.353m6.471-5.343a2.994 2.994 0 0 0-2.99 2.99 2.993 2.993 0 0 0 2.99 2.99 2.994 2.994 0 0 0 2.99-2.99 2.994 2.994 0 0 0-2.99-2.99m0 5.343A2.355 2.355 0 0 1 11.552 12a2.355 2.355 0 0 1 2.352-2.353A2.356 2.356 0 0 1 16.257 12a2.356 2.356 0 0 1-2.353 2.353m-11.61-3.55a2.1 2.1 0 0 0-1.597.423V9.641h2.687c.093 0 .16-.017.16-.292 0-.269-.108-.28-.18-.28H.39c-.174 0-.265.14-.265.294v2.602c0 .136.087.183.247.214.141.028.223.012.285-.057l.006-.01c.283-.408.9-.804 1.486-.732.699.086 1.262.644 1.34 1.327a1.512 1.512 0 0 1-1.5 1.685c-.636 0-1.19-.408-1.422-1.001-.035-.088-.092-.152-.343-.062-.229.083-.243.18-.212.268a2.11 2.11 0 0 0 1.976 1.386 2.102 2.102 0 0 0 .305-4.18M18.938 9.04c-.805.062-1.434.77-1.434 1.61v2.66c0 .155.117.187.293.187s.293-.031.293-.186v-2.668c0-.524.382-.974.868-1.024a.972.972 0 0 1 .758.247.984.984 0 0 1 .322.73c0 .08-.039.34-.217.58-.135.182-.39.399-.844.399h-.009c-.115 0-.215.005-.234.28-.013.186-.012.269.148.29.286.04.576-.016.865-.166.492-.256.822-.741.861-1.267a1.562 1.562 0 0 0-.452-1.222 1.56 1.56 0 0 0-1.218-.45m3.919 1.56l1.085-1.086c.04-.039.132-.132-.055-.324-.08-.083-.153-.125-.217-.125h-.001a.163.163 0 0 0-.121.058L22.46 10.21l-1.086-1.093c-.088-.088-.19-.067-.322.065-.135.136-.157.24-.069.328l1.086 1.092-1.064 1.064-.007.007c-.026.025-.065.063-.065.125-.001.063.042.139.126.223.07.071.138.107.2.107.069 0 .114-.045.139-.07l1.068-1.067 1.09 1.092a.162.162 0 0 0 .115.045h.002c.069 0 .142-.04.217-.118.122-.129.143-.236.06-.319z" />
				</svg>';
			break;
		case 'bandcamp':
			$output .= '<svg class="responsive-svg-icon responsive-bandcamp-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Bandcamp', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M0 18.75l7.437-13.5H24l-7.438 13.5H0z" />
				</svg>';
			break;
		case 'imdb':
			$output .= '<svg class="responsive-svg-icon responsive-imdb-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'IMDB', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14.406 12.453v2.844c0 0.562 0.109 1.078-0.594 1.062v-4.828c0.688 0 0.594 0.359 0.594 0.922zM19.344 13.953v1.891c0 0.313 0.094 0.828-0.359 0.828-0.094 0-0.172-0.047-0.219-0.141-0.125-0.297-0.063-2.547-0.063-2.578 0-0.219-0.063-0.734 0.281-0.734 0.422 0 0.359 0.422 0.359 0.734zM2.812 17.641h1.906v-7.375h-1.906v7.375zM9.594 17.641h1.656v-7.375h-2.484l-0.438 3.453c-0.156-1.156-0.313-2.312-0.5-3.453h-2.469v7.375h1.672v-4.875l0.703 4.875h1.188l0.672-4.984v4.984zM16.234 12.875c0-0.469 0.016-0.969-0.078-1.406-0.25-1.297-1.813-1.203-2.828-1.203h-1.422v7.375c4.969 0 4.328 0.344 4.328-4.766zM21.187 15.953v-2.078c0-1-0.047-1.734-1.281-1.734-0.516 0-0.859 0.156-1.203 0.531v-2.406h-1.828v7.375h1.719l0.109-0.469c0.328 0.391 0.688 0.562 1.203 0.562 1.141 0 1.281-0.875 1.281-1.781zM24 4.5v19c0 1.375-1.125 2.5-2.5 2.5h-19c-1.375 0-2.5-1.125-2.5-2.5v-19c0-1.375 1.125-2.5 2.5-2.5h19c1.375 0 2.5 1.125 2.5 2.5z"></path>
				</svg>';
			break;
		case 'spinner':
			$output .= '<svg class="responsive-svg-icon responsive-spinner-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Loading', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M16 6h-6l2.243-2.243c-1.133-1.133-2.64-1.757-4.243-1.757s-3.109 0.624-4.243 1.757c-1.133 1.133-1.757 2.64-1.757 4.243s0.624 3.109 1.757 4.243c1.133 1.133 2.64 1.757 4.243 1.757s3.109-0.624 4.243-1.757c0.095-0.095 0.185-0.192 0.273-0.292l1.505 1.317c-1.466 1.674-3.62 2.732-6.020 2.732-4.418 0-8-3.582-8-8s3.582-8 8-8c2.209 0 4.209 0.896 5.656 2.344l2.343-2.344v6z"></path>
				</svg>';
			break;
		case 'check':
			$output .= '<svg class="responsive-svg-icon responsive-check-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Done', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14 2.5l-8.5 8.5-3.5-3.5-1.5 1.5 5 5 10-10z"></path>
				</svg>';
			break;
		case 'checkbox':
			$output .= '<svg class="responsive-svg-icon responsive-checkbox-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Check Mark', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M0 0v16h16v-16h-16zM15 15h-14v-14h14v14z"></path>
					<path d="M2.5 8l1.5-1.5 2.5 2.5 5.5-5.5 1.5 1.5-7 7z"></path>
				</svg>';
			break;
		case 'checkbox_alt':
			$output .= '<svg class="responsive-svg-icon responsive-checkbox-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Check Mark', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M14 0h-12c-1.1 0-2 0.9-2 2v12c0 1.1 0.9 2 2 2h12c1.1 0 2-0.9 2-2v-12c0-1.1-0.9-2-2-2zM7 12.414l-3.707-3.707 1.414-1.414 2.293 2.293 4.793-4.793 1.414 1.414-6.207 6.207z"></path>
				</svg>';
			break;
		case 'shield_check':
			$output .= '<svg class="responsive-svg-icon responsive-checkbox-alt-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Check Mark', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M13.739 3.061l-5.5-3c-0.075-0.041-0.157-0.061-0.239-0.061s-0.165 0.020-0.239 0.061l-5.5 3c-0.161 0.088-0.261 0.256-0.261 0.439v4c0 2.2 0.567 3.978 1.735 5.437 0.912 1.14 2.159 2.068 4.042 3.010 0.070 0.035 0.147 0.053 0.224 0.053s0.153-0.018 0.224-0.053c1.883-0.942 3.13-1.87 4.042-3.010 1.167-1.459 1.735-3.238 1.735-5.437l0-4c0-0.183-0.1-0.351-0.261-0.439zM6.5 11.296l-2.796-2.796 0.796-0.795 2 2 5-5 0.796 0.795-5.795 5.795z"></path>
				</svg>';
			break;
		case 'disc':
			$output .= '<svg class="responsive-svg-icon responsive-disc-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
			if ( $display_title ) {
				$output .= '<title>' . ( ! empty( $icon_title ) ? $icon_title : esc_html__( 'Disc', 'responsive' ) ) . '</title>';
			}
			$output .= '<path d="M5 8c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.657-1.343 3-3 3s-3-1.343-3-3z"></path>
				</svg>';
			break;
		case 'visa':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M750,40c0,-22.077 -17.923,-40 -40,-40l-670,0c-22.077,0 -40,17.923 -40,40l0,391c0,22.077 17.923,40 40,40l670,0c22.077,0 40,-17.923 40,-40l0,-391Z" style="fill:rgb(14,69,149);"/><path d="M278.197,334.228l33.361,-195.763l53.36,0l-33.385,195.763l-53.336,0Zm246.11,-191.54c-10.572,-3.966 -27.136,-8.222 -47.822,-8.222c-52.725,0 -89.865,26.55 -90.18,64.603c-0.298,28.13 26.513,43.822 46.753,53.186c20.77,9.594 27.752,15.714 27.654,24.283c-0.132,13.121 -16.587,19.116 -31.923,19.116c-21.357,0 -32.703,-2.966 -50.226,-10.276l-6.876,-3.111l-7.49,43.824c12.464,5.464 35.51,10.198 59.438,10.443c56.09,0 92.501,-26.246 92.916,-66.882c0.2,-22.268 -14.016,-39.216 -44.8,-53.188c-18.65,-9.055 -30.072,-15.099 -29.951,-24.268c0,-8.137 9.667,-16.839 30.556,-16.839c17.45,-0.27 30.089,3.535 39.937,7.5l4.781,2.26l7.234,-42.43m137.307,-4.222l-41.231,0c-12.774,0 -22.332,3.487 -27.942,16.234l-79.245,179.404l56.032,0c0,0 9.161,-24.123 11.233,-29.418c6.124,0 60.554,0.084 68.337,0.084c1.596,6.853 6.491,29.334 6.491,29.334l49.513,0l-43.188,-195.638Zm-65.418,126.407c4.413,-11.279 21.26,-54.723 21.26,-54.723c-0.316,0.522 4.38,-11.334 7.075,-18.684l3.606,16.879c0,0 10.217,46.728 12.352,56.528l-44.293,0Zm-363.293,-126.406l-52.24,133.496l-5.567,-27.13c-9.725,-31.273 -40.025,-65.155 -73.898,-82.118l47.766,171.203l56.456,-0.065l84.004,-195.386l-56.521,0Z" style="fill:white;"/><path d="M131.92,138.465l-86.041,0l-0.681,4.073c66.938,16.204 111.231,55.363 129.618,102.414l-18.71,-89.96c-3.23,-12.395 -12.597,-16.094 -24.186,-16.526" style="fill:rgb(242,174,20);"/></g></svg>';
			break;
		case 'visa_gray':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M750,40c0,-22.077 -17.923,-40 -40,-40l-670,0c-22.077,0 -40,17.923 -40,40l0,391c0,22.077 17.923,40 40,40l670,0c22.077,0 40,-17.923 40,-40l0,-391Zm-225.693,102.688c-10.572,-3.966 -27.136,-8.222 -47.822,-8.222c-52.725,0 -89.865,26.55 -90.18,64.603c-0.298,28.13 26.513,43.822 46.753,53.186c20.77,9.594 27.752,15.714 27.654,24.283c-0.132,13.121 -16.587,19.116 -31.923,19.116c-21.357,0 -32.703,-2.966 -50.226,-10.276l-6.876,-3.111l-7.49,43.824c12.464,5.464 35.51,10.198 59.438,10.443c56.09,0 92.501,-26.246 92.916,-66.882c0.2,-22.268 -14.016,-39.216 -44.8,-53.188c-18.65,-9.055 -30.072,-15.099 -29.951,-24.268c0,-8.137 9.667,-16.839 30.556,-16.839c17.45,-0.27 30.089,3.535 39.937,7.5l4.781,2.26l7.234,-42.43l-0.001,0.001Zm-246.11,191.54l33.361,-195.763l53.36,0l-33.385,195.763l-53.336,0Zm383.418,-195.763l-41.231,0c-12.774,0 -22.332,3.487 -27.942,16.234l-79.245,179.404l56.032,0c0,0 9.161,-24.123 11.233,-29.418c6.124,0 60.554,0.084 68.337,0.084c1.596,6.853 6.491,29.334 6.491,29.334l49.513,0l-43.188,-195.638Zm-487.354,103.818l-18.155,-87.291c-3.23,-12.395 -12.597,-16.094 -24.186,-16.526l0,-0.001l-86.041,0l-0.681,4.073c21.085,5.104 39.924,12.486 56.42,21.679l47.347,169.7l56.456,-0.065l84.004,-195.386l-56.521,0l-52.24,133.496l-5.567,-27.13c-0.264,-0.847 -0.542,-1.697 -0.836,-2.549Zm421.936,22.589c4.413,-11.279 21.26,-54.723 21.26,-54.723c-0.316,0.522 4.38,-11.334 7.075,-18.684l3.606,16.879c0,0 10.217,46.728 12.352,56.528l-44.293,0Z"/></g></svg>';
			break;
		case 'mastercard':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M750,40c0,-22.077 -17.923,-40 -40,-40l-670,0c-22.077,0 -40,17.923 -40,40l0,391c0,22.077 17.923,40 40,40l670,0c22.077,0 40,-17.923 40,-40l0,-391Z" style="fill:rgb(244,244,244);"/><path d="M618.579,422.143c-1.213,0.03 -2.213,0.432 -2.998,1.207c-0.785,0.776 -1.192,1.746 -1.22,2.911c0.028,1.157 0.435,2.125 1.22,2.904c0.785,0.78 1.785,1.184 2.998,1.215c1.185,-0.03 2.171,-0.436 2.96,-1.215c0.787,-0.78 1.196,-1.747 1.226,-2.904c-0.03,-1.165 -0.437,-2.135 -1.223,-2.91c-0.786,-0.776 -1.774,-1.179 -2.963,-1.208Zm0,7.329c-0.925,-0.023 -1.687,-0.336 -2.287,-0.94c-0.6,-0.602 -0.91,-1.36 -0.932,-2.27c0.021,-0.916 0.332,-1.672 0.932,-2.27c0.6,-0.599 1.362,-0.909 2.287,-0.93c0.904,0.021 1.655,0.331 2.25,0.93c0.596,0.598 0.905,1.354 0.927,2.27c-0.022,0.91 -0.33,1.668 -0.926,2.27c-0.596,0.604 -1.347,0.917 -2.251,0.94Zm0.242,-5.139l-1.766,0l0,3.826l0.817,0l0,-1.433l0.374,0l1.16,1.433l0.978,0l-1.25,-1.443c0.39,-0.05 0.69,-0.176 0.901,-0.38c0.21,-0.204 0.317,-0.465 0.32,-0.781c-0.004,-0.378 -0.137,-0.675 -0.4,-0.891c-0.264,-0.216 -0.642,-0.326 -1.134,-0.33l0,-0.001Zm-0.01,0.717c0.219,0 0.39,0.043 0.515,0.127c0.124,0.084 0.197,0.228 0.19,0.378c0.007,0.153 -0.065,0.298 -0.19,0.386c-0.124,0.086 -0.296,0.129 -0.515,0.129l-0.939,0l0,-1.02l0.939,0Zm-458.605,2.703l-8.755,0l0,-40.883l8.584,0l0,4.982c0,0 7.539,-6.089 12.017,-6.013c8.706,0.148 13.905,7.559 13.905,7.559c0,0 4.217,-7.559 13.733,-7.559c14.073,0 16.137,12.884 16.137,12.884l0,28.857l-8.412,0l0,-25.422c0,0 0.03,-7.73 -9.098,-7.73c-9.44,0 -10.3,7.73 -10.3,7.73l0,25.423l-8.755,0l0,-25.595c0,0 -0.841,-8.073 -8.756,-8.073c-10.278,0 -10.471,8.245 -10.471,8.245l0.171,25.595Zm266.254,-41.92c-4.478,-0.075 -12.016,6.013 -12.016,6.013l0,-4.971l-8.593,0l0,40.874l8.76,0l-0.167,-25.593c0,0 0.193,-8.228 10.472,-8.228c1.909,0 3.391,0.463 4.565,1.175l0,-0.033l2.853,-7.96c-1.722,-0.725 -3.68,-1.239 -5.874,-1.276l0,-0.001Zm123.33,0c-4.477,-0.075 -12.015,6.013 -12.015,6.013l0,-4.971l-8.593,0l0,40.874l8.76,0l-0.167,-25.593c0,0 0.193,-8.228 10.472,-8.228c1.909,0 3.391,0.463 4.565,1.175l0,-0.033l2.853,-7.96c-1.722,-0.725 -3.68,-1.239 -5.874,-1.276l-0.001,-0.001Zm-305.653,-0.167c-13.103,0 -20.037,11.784 -20.072,21.629c-0.036,10.091 7.894,21.73 20.44,21.73c7.32,0 13.334,-5.407 13.334,-5.407l-0.016,4.164l8.618,0l0,-40.922l-8.648,0l0,5.155c0,0 -5.647,-6.348 -13.656,-6.348l0,-0.001Zm1.678,8.33c7.04,0 12.754,6.126 12.754,13.668c0,7.543 -5.715,13.636 -12.754,13.636c-7.04,0 -12.721,-6.093 -12.721,-13.636c0,-7.542 5.681,-13.669 12.72,-13.669l0.001,0.001Zm249.646,-8.33c-13.103,0 -20.037,11.784 -20.072,21.629c-0.036,10.091 7.894,21.73 20.44,21.73c7.32,0 13.334,-5.407 13.334,-5.407l-0.016,4.164l8.618,0l0,-40.922l-8.648,0l0,5.155c0,0 -5.647,-6.348 -13.656,-6.348l0,-0.001Zm1.678,8.33c7.04,0 12.754,6.126 12.754,13.668c0,7.543 -5.715,13.636 -12.754,13.636c-7.04,0 -12.721,-6.093 -12.721,-13.636c0,-7.542 5.681,-13.669 12.72,-13.669l0.001,0.001Zm81.066,-8.33c-13.102,0 -20.036,11.784 -20.071,21.629c-0.036,10.091 7.893,21.73 20.44,21.73c7.32,0 13.334,-5.407 13.334,-5.407l-0.016,4.164l8.618,0l0,-57.078l-8.648,0l0,21.31c0,0 -5.648,-6.348 -13.657,-6.348Zm1.678,8.33c7.04,0 12.755,6.126 12.755,13.668c0,7.543 -5.715,13.636 -12.755,13.636c-7.04,0 -12.72,-6.093 -12.72,-13.636c0,-7.542 5.68,-13.669 12.72,-13.669l0,0.001Zm-287.148,35.13c-8.926,0 -17.167,-5.497 -17.167,-5.497l3.777,-5.84c0,0 7.797,3.607 13.39,3.607c3.634,0 9.712,-1.174 9.785,-4.81c0.078,-3.842 -10.214,-4.981 -10.214,-4.981c0,0 -15.364,-0.21 -15.364,-12.883c0,-7.97 7.673,-13.055 17.51,-13.055c5.684,0 16.308,4.981 16.308,4.981l-4.291,6.7c0,0 -8.204,-3.28 -12.532,-3.436c-3.655,-0.132 -8.069,1.62 -8.069,4.81c0,8.668 25.58,-0.676 25.58,16.834c0,11.487 -10.418,13.57 -18.713,13.57Zm32.93,-54.108l0,11.892l-7.619,0l0,8.597l7.62,0l0,20.555c0,0 -0.675,13.904 14.264,13.904c4.13,0 12.218,-3.056 12.218,-3.056l-3.457,-8.934c0,0 -3.217,2.745 -6.848,2.653c-6.904,-0.174 -6.713,-4.6 -6.713,-4.6l0,-20.524l14.233,0l0,-8.595l-14.232,0l0,-11.891l-9.465,0l-0.001,-0.001Zm51.858,11.15c-14.05,0 -21.07,11.58 -21.012,21.63c0.06,10.335 6.392,21.965 21.85,21.965c6.617,0 15.91,-5.81 15.91,-5.81l-3.994,-6.953c0,0 -6.341,4.5 -11.915,4.5c-11.16,0 -11.882,-10.915 -11.882,-10.915l29.872,0c0,0 2.229,-24.416 -18.83,-24.416l0.001,-0.001Zm-1.276,8.028c0.331,-0.02 0.687,0 1.04,0c10.514,0 10.44,9.94 10.44,9.94l-21.247,0c0,0 -0.503,-9.356 9.767,-9.94Zm90.132,22.699l4.006,8.017c0,0 -6.349,4.13 -13.474,4.13c-14.751,0 -22.943,-11.11 -22.943,-21.621c0,-16.52 13.036,-21.378 21.85,-21.378c8.001,0 14.931,4.616 14.931,4.616l-4.491,8.016c0,0 -2.723,-4.25 -10.682,-4.25c-7.946,0 -12.14,6.854 -12.14,13.36c0,7.291 4.881,13.483 12.261,13.483c5.79,0 10.682,-4.373 10.682,-4.373Z"/><path d="M624.508,278.631l0,-5.52l-1.44,0l-1.658,3.796l-1.657,-3.796l-1.44,0l0,5.52l1.017,0l0,-4.164l1.553,3.59l1.055,0l1.553,-3.6l0,4.174l1.017,0Zm-9.123,0l0,-4.578l1.845,0l0,-0.933l-4.698,0l0,0.933l1.845,0l0,4.578l1.008,0Zm9.412,-82.071c0,85.425 -69.077,154.676 -154.288,154.676c-85.21,0 -154.288,-69.25 -154.288,-154.676c0,-85.426 69.077,-154.677 154.289,-154.677c85.21,0 154.288,69.251 154.288,154.677l-0.001,0Z" style="fill:rgb(247,159,26);"/><path d="M434.46,196.56c0,85.425 -69.078,154.676 -154.288,154.676c-85.212,0 -154.288,-69.25 -154.288,-154.676c0,-85.426 69.076,-154.677 154.288,-154.677c85.21,0 154.287,69.251 154.287,154.677l0.001,0Z" style="fill:rgb(234,0,27);"/><path d="M375.34,74.797c-35.999,28.317 -59.107,72.318 -59.107,121.748c0,49.43 23.108,93.466 59.108,121.782c35.999,-28.316 59.107,-72.352 59.107,-121.782c0,-49.43 -23.108,-93.431 -59.107,-121.748l-0.001,0Z" style="fill:rgb(255,95,1);"/></g></svg>';
			break;
		case 'mastercard_gray':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M750,40c0,-22.077 -17.923,-40 -40,-40l-670,0c-22.077,0 -40,17.923 -40,40l0,391c0,22.077 17.923,40 40,40l670,0c22.077,0 40,-17.923 40,-40l0,-391Zm-48.331,195.506c0,106.794 -86.583,193.377 -193.382,193.374c-46.345,0 -88.516,-16.223 -121.821,-43.405c25.405,-24.524 44.799,-55.238 55.205,-89.951l-16.067,0c-10.071,30.866 -27.755,58.092 -50.751,79.947c-23.144,-22.041 -40.469,-49.479 -50.42,-79.851l-16.07,0c10.36,34.517 29.424,65.268 54.632,89.721c-33.223,26.907 -75.197,43.542 -121.278,43.542c-106.803,0 -193.386,-86.583 -193.386,-193.381c0,-106.802 86.587,-193.385 193.386,-193.385c46.085,0 88.055,16.635 121.278,43.542c-25.562,24.759 -44.371,55.649 -54.632,89.724l16.07,0c9.951,-30.372 27.275,-57.81 50.42,-79.85c22.993,21.851 40.68,49.081 50.751,79.943l16.067,0c-10.406,-34.713 -29.8,-65.423 -55.205,-89.951c33.305,-27.185 75.476,-43.405 121.821,-43.405c106.799,0 193.382,86.583 193.382,193.386Zm-524.108,-24.234l-2.993,15.464c4.744,-0.494 17.465,-2.491 24.197,-2.245c6.74,0.249 14.219,-0.747 11.974,9.977c-4.989,0.502 -39.91,-4.988 -45.394,24.941c-2.245,14.725 10.472,22.204 20.45,21.71c9.978,-0.502 12.721,-1.751 16.216,-4.249l2.494,3.992l18.204,0l7.736,-38.91c1.997,-9.729 5.234,-33.179 -27.438,-33.179c-5.985,0.253 -12.718,0 -25.446,2.499Zm329.276,0l-3,15.464c4.748,-0.494 17.461,-2.491 24.201,-2.245c6.736,0.249 14.223,-0.747 11.974,9.977c-4.989,0.502 -39.911,-4.988 -45.394,24.941c-2.249,14.725 10.468,22.204 20.446,21.71c9.985,-0.502 12.721,-1.751 16.219,-4.249l2.498,3.992l18.201,0l7.74,-38.91c1.996,-9.729 5.234,-33.179 -27.446,-33.179c-5.982,0.253 -12.718,0 -25.439,2.499Zm-206.046,-20.208l-13.473,67.85c-3.747,19.454 10.974,22.205 15.461,22.205c4.495,0 10.231,-0.755 14.472,-3.498l1.249,-14.465c-11.226,1.747 -11.728,-3.245 -10.728,-8.736l5.491,-28.933l9.977,0l3.487,-15.465l-10.472,0l3.993,-18.958l-19.457,0Zm84.315,57.873c2.245,-11.48 7.487,-39.911 -26.688,-39.911c-31.434,0 -35.423,31.178 -36.17,35.665c-0.748,4.495 -1.246,36.171 32.427,36.171c8.234,0.253 20.208,-0.747 24.951,-3.245l2.993,-14.71c-2.993,0.74 -14.223,1.743 -21.959,1.743c-7.729,0 -20.201,0.502 -17.959,-15.713l42.405,0Zm-102.769,-22.948l4.487,-14.472c-9.23,-3.491 -16.461,-2.74 -19.208,-2.74c-2.747,0 -26.104,-0.286 -29.684,16.963c-2.743,13.223 2.097,18.691 6.736,20.702c7.487,3.246 11.729,6.238 15.721,8.234c4.937,2.469 4.03,10.725 -2.498,10.725c-2.996,0 -15.963,1.495 -25.691,-1.751l-2.744,14.718c8.982,2.498 16.209,2.498 22.952,2.498c4.736,0 27.937,1.249 31.174,-20.208c1.584,-10.461 -2.992,-15.219 -6.736,-17.454c-3.739,-2.498 -9.977,-5.988 -13.966,-7.739c-3.993,-1.744 -6.985,-8.476 0.249,-10.472c4.487,-0.502 13.714,-0.502 19.208,0.996Zm376.414,-8.487c-3.747,-2.74 -5.982,-8.476 -15.22,-8.476c-10.724,0 -27.438,-1.996 -36.914,30.431c-6.338,21.673 6.483,41.409 20.446,41.409c6.491,-0.246 12.974,-2.993 16.959,-5.736l2.506,5.736l20.948,0l16.966,-90.795l-20.461,0l-5.23,27.431Zm-273.088,63.36l13.223,-70.84l16.714,0l1.744,6.986c3,-3.495 8.736,-6.986 18.457,-6.986l-4.989,18.71c-4.732,0 -13.97,-1.494 -19.706,19.699l-5.982,32.435l-19.461,0l0,-0.004Zm-229.548,0l16.212,-86.308l-31.926,0l-23.702,52.386l-3.744,-52.386l-31.178,0l-16.713,86.308l19.453,0l11.974,-62.36l5.241,62.36l18.458,0l27.193,-60.862l-11.476,60.862l20.208,0Zm336.752,-66.353l12.725,-12.717c-4.989,-5.491 -10.732,-10.881 -26.691,-11.476c-13.469,-0.498 -36.55,9.331 -43.907,36.167c-9.978,36.424 11.97,54.379 32.178,54.379c10.725,0 17.216,-1.494 23.699,-4.487l-5.736,-17.461c-19.959,6.729 -34.175,-3.494 -30.929,-24.197c2.736,-17.501 17.208,-23.698 23.691,-23.698c6.491,0 9.974,0.494 14.97,3.49Zm66.676,66.294l13.353,-71.554l16.881,0l1.766,7.052c3.026,-3.531 8.822,-7.052 18.647,-7.052l-5.286,18.64c-4.792,0 -13.863,-1.253 -19.655,20.159l-6.048,32.755l-19.658,0Zm-352.042,-31.866c-3.245,-0.51 -10.479,-2.498 -16.717,1.743c-6.238,4.242 -7.981,11.718 -1.495,14.223c6.242,2.398 15.458,-1.743 16.714,-8.241l1.498,-7.725Zm329.273,0c-3.245,-0.51 -10.476,-2.498 -16.714,1.743c-6.238,4.242 -7.985,11.718 -1.494,14.223c6.245,2.398 15.457,-1.743 16.706,-8.241l1.502,-7.725Zm114.992,-2.249c-3.491,8.732 -7.978,14.468 -15.216,14.472c-6.732,0 -12.721,-7.733 -9.977,-17.956c4.196,-15.643 17.962,-21.951 23.944,-13.97c2.156,2.874 3.245,10.97 1.249,17.454Zm-307.82,-10.721l24.197,0c1.249,-6.986 -0.996,-12.974 -8.728,-12.974c-7.736,0 -13.223,3.992 -15.469,12.974Z"/></g></svg>';
			break;
		case 'amex':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 752 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M751,40c0,-22.077 -17.923,-40 -40,-40l-670,0c-22.077,0 -40,17.923 -40,40l0,391c0,22.077 17.923,40 40,40l670,0c22.077,0 40,-17.923 40,-40l0,-391Z" style="fill:rgb(37,87,214);"/><path d="M1,221.185l36.027,0l8.123,-19.51l18.185,0l8.101,19.51l70.88,0l0,-14.915l6.327,14.98l36.796,0l6.327,-15.202l0,15.138l176.151,0l-0.082,-32.026l3.408,0c2.386,0.083 3.083,0.302 3.083,4.226l0,27.8l91.106,0l0,-7.455c7.349,3.92 18.779,7.455 33.819,7.455l38.328,0l8.203,-19.51l18.185,0l8.021,19.51l73.86,0l0,-18.532l11.186,18.532l59.187,0l0,-122.508l-58.576,0l0,14.468l-8.202,-14.468l-60.105,0l0,14.468l-7.532,-14.468l-81.188,0c-13.59,0 -25.536,1.889 -35.186,7.153l0,-7.153l-56.026,0l0,7.153c-6.14,-5.426 -14.508,-7.153 -23.812,-7.153l-204.686,0l-13.734,31.641l-14.104,-31.641l-64.47,0l0,14.468l-7.083,-14.468l-54.983,0l-25.534,58.246l0,64.261Zm227.399,-17.67l-21.614,0l-0.08,-68.794l-30.573,68.793l-18.512,0l-30.652,-68.854l0,68.854l-42.884,0l-8.101,-19.592l-43.9,0l-8.183,19.592l-22.9,0l37.756,-87.837l31.326,0l35.859,83.164l0,-83.164l34.412,0l27.593,59.587l25.347,-59.587l35.104,0l0,87.837l0.003,0l-0.001,0.001Zm-159.622,-37.823l-14.43,-35.017l-14.35,35.017l28.78,0Zm245.642,37.821l-70.433,0l0,-87.837l70.433,0l0,18.291l-49.348,0l0,15.833l48.165,0l0,18.005l-48.166,0l0,17.542l49.348,0l0,18.166l0.001,0Zm99.256,-64.18c0,14.004 -9.386,21.24 -14.856,23.412c4.613,1.748 8.553,4.838 10.43,7.397c2.976,4.369 3.49,8.271 3.49,16.116l0,17.255l-21.266,0l-0.08,-11.077c0,-5.285 0.508,-12.886 -3.328,-17.112c-3.081,-3.09 -7.777,-3.76 -15.368,-3.76l-22.633,0l0,31.95l-21.084,0l0,-87.838l48.495,0c10.775,0 18.714,0.283 25.53,4.207c6.67,3.924 10.67,9.652 10.67,19.45Zm-26.652,13.042c-2.898,1.752 -6.324,1.81 -10.43,1.81l-25.613,0l0,-19.51l25.962,0c3.674,0 7.508,0.164 9.998,1.584c2.735,1.28 4.427,4.003 4.427,7.765c0,3.84 -1.61,6.929 -4.344,8.351Zm60.466,51.138l-21.513,0l0,-87.837l21.513,0l0,87.837Zm249.74,0l-29.879,0l-39.964,-65.927l0,65.927l-42.94,0l-8.204,-19.592l-43.799,0l-7.96,19.592l-24.673,0c-10.248,0 -23.224,-2.257 -30.572,-9.715c-7.41,-7.458 -11.265,-17.56 -11.265,-33.533c0,-13.027 2.304,-24.936 11.366,-34.347c6.816,-7.01 17.49,-10.242 32.02,-10.242l20.412,0l0,18.821l-19.984,0c-7.694,0 -12.039,1.14 -16.224,5.203c-3.594,3.699 -6.06,10.69 -6.06,19.897c0,9.41 1.878,16.196 5.797,20.628c3.245,3.476 9.144,4.53 14.694,4.53l9.469,0l29.716,-69.076l31.592,0l35.696,83.081l0,-83.08l32.103,0l37.062,61.174l0,-61.174l21.596,0l0,87.834l0.001,-0.001Zm-128.159,-37.82l-14.591,-35.017l-14.51,35.017l29.101,0Zm181.885,178.074c-5.121,7.458 -15.101,11.239 -28.611,11.239l-40.718,0l0,-18.84l40.553,0c4.022,0 6.837,-0.527 8.532,-2.175c1.602,-1.472 2.508,-3.555 2.493,-5.73c0,-2.56 -1.024,-4.592 -2.575,-5.81c-1.53,-1.341 -3.757,-1.95 -7.429,-1.95c-19.797,-0.67 -44.495,0.609 -44.495,-27.194c0,-12.743 8.125,-26.157 30.25,-26.157l41.998,0l0,-17.48l-39.02,0c-11.776,0 -20.33,2.808 -26.388,7.174l0,-7.175l-57.715,0c-9.23,0 -20.063,2.279 -25.187,7.175l0,-7.175l-103.065,0l0,7.175c-8.203,-5.892 -22.043,-7.175 -28.431,-7.175l-67.983,0l0,7.175c-6.49,-6.258 -20.92,-7.175 -29.716,-7.175l-76.085,0l-17.41,18.763l-16.307,-18.763l-113.656,0l0,122.592l111.516,0l17.94,-19.06l16.9,19.06l68.739,0.061l0,-28.838l6.757,0c9.12,0.14 19.878,-0.226 29.368,-4.31l0,33.085l56.697,0l0,-31.952l2.735,0c3.49,0 3.834,0.143 3.834,3.616l0,28.333l172.234,0c10.935,0 22.365,-2.787 28.695,-7.845l0,7.845l54.632,0c11.369,0 22.471,-1.587 30.918,-5.651l0,-22.838Zm-341.503,-47.154c0,24.406 -18.286,29.445 -36.716,29.445l-26.306,0l0,29.469l-40.98,0l-25.962,-29.085l-26.981,29.085l-83.517,0l0,-87.859l84.8,0l25.941,28.799l26.819,-28.799l67.371,0c16.732,0 35.532,4.613 35.532,28.945l-0.001,0Zm-167.625,40.434l-51.839,0l0,-17.481l46.289,0l0,-17.926l-46.289,0l0,-15.973l52.86,0l23.062,25.604l-24.083,25.776Zm83.526,10.06l-32.37,-35.788l32.37,-34.651l0,70.439Zm47.875,-39.066l-27.248,0l0,-22.374l27.492,0c7.612,0 12.896,3.09 12.896,10.773c0,7.598 -5.04,11.601 -13.14,11.601Zm142.741,-40.373l70.37,0l0,18.17l-49.372,0l0,15.973l48.167,0l0,17.925l-48.167,0l0,17.481l49.372,0.08l0,18.23l-70.37,0l0,-87.859Zm-27.053,47.03c4.693,1.724 8.53,4.816 10.329,7.375c2.977,4.29 3.408,8.293 3.493,16.037l0,17.417l-21.168,0l0,-10.992c0,-5.286 0.511,-13.112 -3.408,-17.198c-3.08,-3.147 -7.777,-3.9 -15.468,-3.9l-22.533,0l0,32.09l-21.186,0l0,-87.859l48.678,0c10.674,0 18.448,0.47 25.369,4.146c6.654,4.004 10.839,9.488 10.839,19.51c-0.003,14.024 -9.395,21.18 -14.945,23.373l0,0.001Zm-11.916,-11.108c-2.82,1.667 -6.308,1.81 -10.41,1.81l-25.614,0l0,-19.733l25.962,0c3.754,0 7.51,0.08 10.062,1.587c2.732,1.423 4.366,4.144 4.366,7.903c0,3.76 -1.634,6.788 -4.366,8.433Zm190.336,5.597c4.106,4.23 6.306,9.572 6.306,18.614c0,18.9 -11.858,27.723 -33.122,27.723l-41.065,0l0,-18.84l40.9,0c4,0 6.836,-0.527 8.613,-2.175c1.45,-1.359 2.49,-3.333 2.49,-5.73c0,-2.56 -1.125,-4.592 -2.573,-5.81c-1.612,-1.34 -3.836,-1.95 -7.508,-1.95c-19.717,-0.67 -44.41,0.61 -44.41,-27.193c0,-12.744 8.04,-26.158 30.144,-26.158l42.269,0l0,18.7l-38.677,0c-3.834,0 -6.327,0.143 -8.447,1.587c-2.31,1.422 -3.166,3.534 -3.166,6.32c0,3.315 1.96,5.57 4.613,6.545c2.224,0.77 4.613,0.996 8.205,0.996l11.35,0.305c11.446,0.278 19.303,2.249 24.078,7.066Zm83.664,-23.52l-38.427,0c-3.836,0 -6.385,0.143 -8.532,1.587c-2.224,1.423 -3.081,3.534 -3.081,6.322c0,3.314 1.878,5.569 4.61,6.544c2.225,0.77 4.614,0.996 8.126,0.996l11.427,0.304c11.531,0.284 19.228,2.258 23.921,7.072c0.855,0.67 1.368,1.422 1.956,2.175l0,-25Z" style="fill:white;"/></g></svg>';
			break;
		case 'amex_gray':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 752 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M750.955,343.767c-5.121,7.458 -15.101,11.239 -28.611,11.239l-40.718,0l0,-18.84l40.553,0c4.022,0 6.837,-0.527 8.532,-2.175c1.602,-1.472 2.508,-3.555 2.493,-5.73c0,-2.56 -1.024,-4.592 -2.575,-5.81c-1.53,-1.341 -3.757,-1.95 -7.429,-1.95c-19.797,-0.67 -44.495,0.609 -44.495,-27.194c0,-12.743 8.125,-26.157 30.25,-26.157l41.998,0l0,-17.48l-39.02,0c-11.776,0 -20.33,2.808 -26.388,7.174l0,-7.175l-57.715,0c-9.23,0 -20.063,2.279 -25.187,7.175l0,-7.175l-103.065,0l0,7.175c-8.203,-5.892 -22.043,-7.175 -28.431,-7.175l-67.983,0l0,7.175c-6.49,-6.258 -20.92,-7.175 -29.716,-7.175l-76.085,0l-17.41,18.763l-16.307,-18.763l-113.656,0l0,122.592l111.516,0l17.94,-19.06l16.9,19.06l68.739,0.061l0,-28.838l6.757,0c9.12,0.14 19.878,-0.226 29.368,-4.31l0,33.085l56.697,0l0,-31.952l2.735,0c3.49,0 3.834,0.143 3.834,3.616l0,28.333l172.234,0c10.935,0 22.365,-2.787 28.695,-7.845l0,7.845l54.632,0c11.369,0 22.471,-1.587 30.918,-5.651l0,-22.838Zm-234.986,-76.099l70.37,0l0,18.17l-49.372,0l0,15.973l48.167,0l0,17.925l-48.167,0l0,17.481l49.372,0.08l0,18.23l-70.37,0l0,-87.859Zm-27.053,47.03c4.693,1.724 8.53,4.816 10.329,7.375c2.977,4.29 3.408,8.293 3.493,16.037l0,17.417l-21.168,0l0,-10.992c0,-5.286 0.511,-13.112 -3.408,-17.198c-3.08,-3.147 -7.777,-3.9 -15.468,-3.9l-22.533,0l0,32.09l-21.186,0l0,-87.859l48.678,0c10.674,0 18.448,0.47 25.369,4.146c6.654,4.004 10.839,9.488 10.839,19.51c-0.003,14.024 -9.395,21.18 -14.945,23.373l0,0.001Zm-79.464,-18.085c0,24.406 -18.286,29.445 -36.716,29.445l-26.306,0l0,29.469l-40.98,0l-25.962,-29.085l-26.981,29.085l-83.517,0l0,-87.859l84.8,0l25.941,28.799l26.819,-28.799l67.371,0c16.732,0 35.532,4.613 35.532,28.945l-0.001,0Zm257.884,12.574c4.106,4.23 6.306,9.572 6.306,18.614c0,18.9 -11.858,27.723 -33.122,27.723l-41.065,0l0,-18.84l40.9,0c4,0 6.836,-0.527 8.613,-2.175c1.45,-1.359 2.49,-3.333 2.49,-5.73c0,-2.56 -1.125,-4.592 -2.573,-5.81c-1.612,-1.34 -3.836,-1.95 -7.508,-1.95c-19.717,-0.67 -44.41,0.61 -44.41,-27.193c0,-12.744 8.04,-26.158 30.144,-26.158l42.269,0l0,18.7l-38.677,0c-3.834,0 -6.327,0.143 -8.447,1.587c-2.31,1.422 -3.166,3.534 -3.166,6.32c0,3.315 1.96,5.57 4.613,6.545c2.224,0.77 4.613,0.996 8.205,0.996l11.35,0.305c11.446,0.278 19.303,2.249 24.078,7.066Zm-341.983,37.92l-32.37,-35.788l32.37,-34.651l0,70.439Zm-83.526,-10.06l-51.839,0l0,-17.481l46.289,0l0,-17.926l-46.289,0l0,-15.973l52.86,0l23.062,25.604l-24.083,25.776Zm131.401,-29.006l-27.248,0l0,-22.374l27.492,0c7.612,0 12.896,3.09 12.896,10.773c0,7.598 -5.04,11.601 -13.14,11.601Zm103.772,-4.451c-2.82,1.667 -6.308,1.81 -10.41,1.81l-25.614,0l0,-19.733l25.962,0c3.754,0 7.51,0.08 10.062,1.587c2.732,1.423 4.366,4.144 4.366,7.903c0,3.76 -1.634,6.788 -4.366,8.433Zm-476,-263.59c0,-22.077 17.923,-40 40,-40l670,0c22.077,0 40,17.923 40,40l0,245.667l-38.427,0c-3.836,0 -6.385,0.143 -8.532,1.587c-2.224,1.423 -3.081,3.534 -3.081,6.322c0,3.314 1.878,5.569 4.61,6.544c2.225,0.77 4.614,0.996 8.126,0.996l11.427,0.304c11.531,0.284 19.228,2.258 23.921,7.072c0.855,0.67 1.368,1.422 1.956,2.175l0,120.333c0,22.077 -17.923,40 -40,40l-670,0c-22.077,0 -40,-17.923 -40,-40l0,-209.815l36.027,0l8.123,-19.51l18.185,0l8.101,19.51l70.88,0l0,-14.915l6.327,14.98l36.796,0l6.327,-15.202l0,15.138l176.151,0l-0.082,-32.026l3.408,0c2.386,0.083 3.083,0.302 3.083,4.226l0,27.8l91.106,0l0,-7.455c7.349,3.92 18.779,7.455 33.819,7.455l38.328,0l8.203,-19.51l18.185,0l8.021,19.51l73.86,0l0,-18.532l11.186,18.532l59.187,0l0,-122.508l-58.576,0l0,14.468l-8.202,-14.468l-60.105,0l0,14.468l-7.532,-14.468l-81.188,0c-13.59,0 -25.536,1.889 -35.186,7.153l0,-7.153l-56.026,0l0,7.153c-6.14,-5.426 -14.508,-7.153 -23.812,-7.153l-204.686,0l-13.734,31.641l-14.104,-31.641l-64.47,0l0,14.468l-7.083,-14.468l-54.983,0l-25.534,58.246l0,-116.924Zm227.399,163.515l-21.614,0l-0.08,-68.794l-30.573,68.793l-18.512,0l-30.652,-68.854l0,68.854l-42.884,0l-8.101,-19.592l-43.9,0l-8.183,19.592l-22.9,0l37.756,-87.837l31.326,0l35.859,83.164l0,-83.164l34.412,0l27.593,59.587l25.347,-59.587l35.104,0l0,87.837l0.003,0l-0.001,0.001Zm468.829,-0.002l-29.878,0l-39.964,-65.927l0,65.927l-42.94,0l-8.204,-19.592l-43.799,0l-7.96,19.592l-24.673,0c-10.248,0 -23.224,-2.257 -30.572,-9.715c-7.41,-7.458 -11.265,-17.56 -11.265,-33.533c0,-13.027 2.304,-24.936 11.366,-34.347c6.816,-7.01 17.49,-10.242 32.02,-10.242l20.412,0l0,18.821l-19.984,0c-7.694,0 -12.039,1.14 -16.224,5.203c-3.594,3.699 -6.06,10.69 -6.06,19.897c0,9.41 1.878,16.196 5.797,20.628c3.245,3.476 9.144,4.53 14.694,4.53l9.469,0l29.716,-69.076l31.592,0l35.696,83.081l0,-83.08l32.103,0l37.062,61.174l0,-61.174l21.596,0l0,87.833l0.001,0l-0.001,0.001l0,-0.001Zm-283.553,-64.18c0,14.004 -9.386,21.24 -14.856,23.412c4.613,1.748 8.553,4.838 10.43,7.397c2.976,4.369 3.49,8.271 3.49,16.116l0,17.255l-21.266,0l-0.08,-11.077c0,-5.285 0.508,-12.886 -3.328,-17.112c-3.081,-3.09 -7.777,-3.76 -15.368,-3.76l-22.633,0l0,31.95l-21.084,0l0,-87.838l48.495,0c10.775,0 18.714,0.283 25.53,4.207c6.67,3.924 10.67,9.652 10.67,19.45Zm33.814,64.18l-21.513,0l0,-87.837l21.513,0l0,87.837Zm-133.07,-69.546l-49.348,0l0,15.833l48.165,0l0,18.005l-48.166,0l0,17.542l49.348,0l0,18.166l-70.432,0l0,-87.837l70.433,0l0,18.291Zm254.651,31.726l-14.591,-35.017l-14.51,35.017l29.101,0Zm-500.293,-0.001l-14.43,-35.017l-14.35,35.017l28.78,0Zm318.246,-13.317c2.734,-1.422 4.344,-4.511 4.344,-8.351c0,-3.762 -1.692,-6.485 -4.427,-7.765c-2.49,-1.42 -6.324,-1.584 -9.998,-1.584l-25.962,0l0,19.51l25.613,0c4.106,0 7.532,-0.058 10.43,-1.81Z"/></g></svg>';
			break;
		case 'discover':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 780 501" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M54.992,0c-30.365,0 -54.992,24.63 -54.992,55.004l0,390.992c0,30.38 24.619,55.004 54.992,55.004l670.016,0c30.365,0 54.992,-24.63 54.992,-55.004l0,-390.992c0,-30.38 -24.619,-55.004 -54.992,-55.004l-670.016,0Z" style="fill:rgb(77,77,77);"/><path d="M415.13,161.213c30.941,0 56.022,23.58 56.022,52.709l0,0.033c0,29.13 -25.081,52.742 -56.021,52.742c-30.94,0 -56.022,-23.613 -56.022,-52.742l0,-0.033c0,-29.13 25.082,-52.71 56.022,-52.71l-0.001,0.001Zm-87.978,0.68c8.837,0 16.248,1.784 25.268,6.09l0,22.751c-8.544,-7.863 -15.955,-11.154 -25.756,-11.154c-19.264,0 -34.414,15.015 -34.414,34.05c0,20.075 14.681,34.196 35.37,34.196c9.312,0 16.586,-3.12 24.8,-10.857l0,22.763c-9.341,4.14 -16.911,5.776 -25.756,5.776c-31.278,0 -55.582,-22.596 -55.582,-51.737c0,-28.826 24.951,-51.878 56.07,-51.878Zm-97.113,0.627c11.546,0 22.11,3.72 30.943,10.994l-10.748,13.248c-5.35,-5.646 -10.41,-8.028 -16.564,-8.028c-8.853,0 -15.3,4.745 -15.3,10.989c0,5.354 3.619,8.188 15.944,12.482c23.365,8.044 30.29,15.176 30.29,30.926c0,19.193 -14.976,32.553 -36.32,32.553c-15.63,0 -26.994,-5.795 -36.458,-18.872l13.268,-12.03c4.73,8.61 12.622,13.222 22.42,13.222c9.163,0 15.947,-5.952 15.947,-13.984c0,-4.164 -2.055,-7.734 -6.158,-10.258c-2.066,-1.195 -6.158,-2.977 -14.2,-5.647c-19.291,-6.538 -25.91,-13.527 -25.91,-27.185c0,-16.225 14.214,-28.41 32.846,-28.41Zm234.723,1.728l22.437,0l28.084,66.592l28.446,-66.592l22.267,0l-45.494,101.686l-11.053,0l-44.687,-101.686Zm-397.348,0.152l30.15,0c33.312,0 56.534,20.382 56.534,49.641c0,14.59 -7.104,28.696 -19.118,38.057c-10.108,7.901 -21.626,11.445 -37.574,11.445l-29.992,0l0,-99.143Zm96.135,0l20.54,0l0,99.143l-20.54,0l0,-99.143Zm411.734,0l58.252,0l0,16.8l-37.725,0l0,22.005l36.336,0l0,16.791l-36.336,0l0,26.762l37.726,0l0,16.785l-58.252,0l0,-99.143l-0.001,0Zm71.858,0l30.455,0c23.69,0 37.265,10.71 37.265,29.272c0,15.18 -8.514,25.14 -23.986,28.105l33.148,41.766l-25.26,0l-28.429,-39.828l-2.678,0l0,39.828l-20.515,0l0,-99.143Zm20.515,15.616l0,30.025l6.002,0c13.117,0 20.069,-5.362 20.069,-15.328c0,-9.648 -6.954,-14.697 -19.745,-14.697l-6.326,0Zm-579.716,1.183l0,65.559l5.512,0c13.273,0 21.656,-2.394 28.11,-7.88c7.103,-5.955 11.376,-15.465 11.376,-24.98c0,-9.499 -4.273,-18.725 -11.376,-24.681c-6.785,-5.78 -14.837,-8.018 -28.11,-8.018l-5.512,0Z" style="fill:white;"/><path d="M779.982,288.361c-26.05,18.33 -221.077,149.34 -558.754,212.623l503.762,0c30.365,0 54.992,-24.63 54.992,-55.004l0,-157.619Z" style="fill:rgb(244,114,22);"/></g></svg>';
			break;
		case 'discover_gray':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 780 501" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M54.992,0c-30.365,0 -54.992,24.63 -54.992,55.004l0,390.992c0,30.38 24.619,55.004 54.992,55.004l670.016,0c30.365,0 54.992,-24.63 54.992,-55.004l0,-390.992c0,-30.38 -24.619,-55.004 -54.992,-55.004l-670.016,0Zm714.99,285.188c-25.214,17.741 -213.979,144.545 -540.814,205.796l487.588,0c29.39,0 53.226,-23.839 53.226,-53.238l0,-152.558Zm-354.852,-123.975c30.941,0 56.022,23.58 56.022,52.709l0,0.033c0,29.13 -25.081,52.742 -56.021,52.742c-30.94,0 -56.022,-23.613 -56.022,-52.742l0,-0.033c0,-29.13 25.082,-52.71 56.022,-52.71l-0.001,0.001Zm49.632,3.035l22.437,0l28.084,66.592l28.446,-66.592l22.267,0l-45.494,101.686l-11.053,0l-44.687,-101.686Zm-234.723,-1.728c-18.632,0 -32.846,12.185 -32.846,28.41c0,13.658 6.619,20.647 25.91,27.185c8.042,2.67 12.134,4.452 14.2,5.647c4.103,2.524 6.158,6.094 6.158,10.258c0,8.032 -6.784,13.984 -15.947,13.984c-9.798,0 -17.69,-4.612 -22.42,-13.222l-13.268,12.03c9.464,13.077 20.828,18.872 36.458,18.872c21.344,0 36.32,-13.36 36.32,-32.553c0,-15.75 -6.925,-22.882 -30.29,-30.926c-12.325,-4.294 -15.944,-7.128 -15.944,-12.482c0,-6.244 6.447,-10.989 15.3,-10.989c6.154,0 11.214,2.382 16.564,8.028l10.748,-13.248c-8.833,-7.274 -19.397,-10.994 -30.943,-10.994Zm97.113,-0.627c-31.119,0 -56.07,23.052 -56.07,51.878c0,29.141 24.304,51.737 55.582,51.737c8.845,0 16.415,-1.636 25.756,-5.776l0,-22.763c-8.214,7.737 -15.488,10.857 -24.8,10.857c-20.689,0 -35.37,-14.121 -35.37,-34.196c0,-19.035 15.15,-34.05 34.414,-34.05c9.801,0 17.212,3.291 25.756,11.154l0,-22.751c-9.02,-4.306 -16.431,-6.09 -25.268,-6.09Zm-259.738,2.507l30.15,0c33.312,0 56.534,20.382 56.534,49.641c0,14.59 -7.104,28.696 -19.118,38.057c-10.108,7.901 -21.626,11.445 -37.574,11.445l-29.992,0l0,-99.143Zm96.135,0l20.54,0l0,99.143l-20.54,0l0,-99.143Zm411.735,0l0,99.143l58.252,0l0,-16.785l-37.726,0l0,-26.762l36.336,0l0,-16.791l-36.336,0l0,-22.005l37.725,0l0,-16.8l-58.251,0Zm71.857,0l30.455,0c23.69,0 37.265,10.71 37.265,29.272c0,15.18 -8.514,25.14 -23.986,28.105l33.148,41.766l-25.26,0l-28.429,-39.828l-2.678,0l0,39.828l-20.515,0l0,-99.143Zm-559.201,16.799l0,65.559l5.512,0c13.273,0 21.656,-2.394 28.11,-7.88c7.103,-5.955 11.376,-15.465 11.376,-24.98c0,-9.499 -4.273,-18.725 -11.376,-24.681c-6.785,-5.78 -14.837,-8.018 -28.11,-8.018l-5.512,0Zm579.716,-1.183l0,30.025l6.002,0c13.117,0 20.069,-5.362 20.069,-15.328c0,-9.648 -6.954,-14.697 -19.745,-14.697l-6.326,0Z"/></g></svg>';
			break;
		case 'paypal':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 780 501" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g><path d="M54.992,0c-30.365,0 -54.992,24.63 -54.992,55.004l0,390.992c0,30.38 24.619,55.004 54.992,55.004l670.016,0c30.365,0 54.992,-24.63 54.992,-55.004l0,-390.992c0,-30.38 -24.619,-55.004 -54.992,-55.004l-670.016,0Z" style="fill:rgb(247,247,247);"/><g><path d="M515.551,209.243c-2.905,19.077 -17.473,19.077 -31.561,19.077l-8.017,0l5.626,-35.618c0.343,-2.151 2.193,-3.734 4.372,-3.734l3.679,0c9.593,0 18.652,0 23.325,5.461c2.789,3.269 3.631,8.12 2.576,14.814m-6.132,-49.773l-53.145,0c-3.621,0.002 -6.735,2.66 -7.305,6.235l-21.474,136.268c-0.036,0.227 -0.054,0.456 -0.054,0.685c0,2.429 1.997,4.429 4.425,4.434l27.272,0c2.542,0 4.707,-1.851 5.105,-4.358l6.098,-38.646c0.562,-3.584 3.659,-6.236 7.291,-6.236l16.815,0c35.014,0 55.214,-16.931 60.49,-50.513c2.378,-14.678 0.096,-26.217 -6.777,-34.295c-7.558,-8.881 -20.953,-13.581 -38.735,-13.581" style="fill:rgb(0,156,222);fill-rule:nonzero;"/><path d="M136.493,209.243c-2.906,19.077 -17.473,19.077 -31.568,19.077l-8.017,0l5.625,-35.618c0.343,-2.151 2.193,-3.734 4.372,-3.734l3.68,0c9.593,0 18.651,0 23.324,5.461c2.796,3.269 3.639,8.12 2.584,14.814m-6.133,-49.773l-53.145,0c-3.632,0 -6.729,2.645 -7.298,6.235l-21.481,136.268c-0.036,0.229 -0.054,0.46 -0.054,0.692c0,2.428 1.998,4.426 4.426,4.427l25.38,0c3.632,0 6.722,-2.645 7.291,-6.236l5.803,-36.761c0.562,-3.591 3.659,-6.236 7.291,-6.236l16.815,0c35.014,0 55.214,-16.938 60.49,-50.52c2.378,-14.678 0.096,-26.217 -6.776,-34.295c-7.558,-8.881 -20.954,-13.581 -38.735,-13.581m123.379,98.705c-2.467,14.54 -13.999,24.304 -28.724,24.304c-7.38,0 -13.293,-2.378 -17.089,-6.873c-3.769,-4.454 -5.181,-10.806 -3.988,-17.87c2.288,-14.417 14.019,-24.489 28.518,-24.489c7.229,0 13.088,2.398 16.966,6.934c3.899,4.57 5.434,10.956 4.317,17.994m35.466,-49.541l-25.448,0c-2.177,-0.003 -4.049,1.598 -4.386,3.748l-1.11,7.112l-1.781,-2.576c-5.509,-7.996 -17.795,-10.676 -30.061,-10.676c-28.114,0 -52.13,21.31 -56.804,51.186c-2.432,14.917 1.021,29.162 9.477,39.105c7.763,9.133 18.843,12.936 32.047,12.936c22.667,0 35.234,-14.553 35.234,-14.553l-1.138,7.071c-0.036,0.229 -0.054,0.46 -0.054,0.692c0,2.428 1.998,4.426 4.426,4.426c0.003,0 0.005,0 0.007,0l22.913,0c3.632,0 6.729,-2.638 7.298,-6.235l13.759,-87.111c0.035,-0.227 0.053,-0.456 0.053,-0.685c0,-2.432 -2.001,-4.433 -4.433,-4.433c-0.002,0 -0.004,0 -0.006,0" style="fill:rgb(0,48,135);fill-rule:nonzero;"/><path d="M632.804,258.168c-2.466,14.54 -13.998,24.304 -28.724,24.304c-7.379,0 -13.293,-2.378 -17.089,-6.873c-3.768,-4.454 -5.18,-10.806 -3.988,-17.87c2.289,-14.417 14.013,-24.489 28.519,-24.489c7.229,0 13.087,2.398 16.966,6.934c3.898,4.57 5.433,10.956 4.316,17.994m35.467,-49.541l-25.449,0c-2.176,-0.003 -4.049,1.598 -4.385,3.748l-1.11,7.112l-1.782,-2.576c-5.509,-7.996 -17.795,-10.676 -30.06,-10.676c-28.107,0 -52.124,21.31 -56.804,51.186c-2.432,14.917 1.028,29.162 9.483,39.105c7.764,9.133 18.844,12.936 32.048,12.936c22.673,0 35.24,-14.553 35.24,-14.553l-1.137,7.071c-0.038,0.233 -0.057,0.469 -0.057,0.706c0,2.42 1.992,4.412 4.413,4.412c0.003,0 0.006,0 0.008,0l22.907,0c3.632,0 6.729,-2.638 7.304,-6.235l13.759,-87.111c0.036,-0.227 0.054,-0.456 0.054,-0.685c0,-2.432 -2.002,-4.433 -4.434,-4.433c-0.001,0 -0.003,0 -0.005,0" style="fill:rgb(0,156,222);fill-rule:nonzero;"/><path d="M424.754,208.634l-25.586,0c-2.446,0 -4.728,1.212 -6.098,3.241l-35.289,51.966l-14.958,-49.938c-0.934,-3.119 -3.822,-5.272 -7.078,-5.276l-25.14,0c-2.432,0.001 -4.432,2.002 -4.432,4.433c0,0.487 0.081,0.971 0.238,1.432l28.162,82.678l-26.49,37.378c-0.528,0.748 -0.811,1.641 -0.811,2.556c0,2.43 1.999,4.431 4.429,4.433l25.558,0c2.412,0 4.68,-1.185 6.064,-3.172l85.063,-122.776c0.516,-0.742 0.793,-1.625 0.793,-2.529c0,-2.428 -1.997,-4.425 -4.425,-4.426" style="fill:rgb(0,48,135);fill-rule:nonzero;"/><path d="M698.263,163.218l-21.817,138.762c-0.036,0.227 -0.054,0.456 -0.054,0.685c0,2.432 2.001,4.433 4.432,4.433l21.934,0c3.631,0 6.728,-2.644 7.297,-6.235l21.509,-136.275c0.036,-0.229 0.054,-0.46 0.054,-0.692c0,-2.428 -1.998,-4.426 -4.426,-4.426c-0.002,0 -0.004,0 -0.007,0l-24.544,0c-2.174,-0.006 -4.045,1.593 -4.378,3.741" style="fill:rgb(0,156,222);fill-rule:nonzero;"/></g></g></svg>';
			break;
		case 'paypal_gray':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 780 501" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M54.992,0c-30.365,0 -54.992,24.63 -54.992,55.004l0,390.992c0,30.38 24.619,55.004 54.992,55.004l670.016,0c30.365,0 54.992,-24.63 54.992,-55.004l0,-390.992c0,-30.38 -24.619,-55.004 -54.992,-55.004l-670.016,0Zm369.762,208.634l-25.586,0c-2.446,0 -4.728,1.212 -6.098,3.241l-35.289,51.966l-14.958,-49.938c-0.934,-3.119 -3.822,-5.272 -7.078,-5.276l-25.14,0c-2.432,0.001 -4.432,2.002 -4.432,4.433c0,0.487 0.081,0.971 0.238,1.432l28.162,82.678l-26.49,37.378c-0.528,0.748 -0.811,1.641 -0.811,2.556c0,2.43 1.999,4.431 4.429,4.433l25.558,0c2.412,0 4.68,-1.185 6.064,-3.172l85.063,-122.776c0.516,-0.742 0.793,-1.625 0.793,-2.529c0,-2.428 -1.997,-4.425 -4.425,-4.426Zm243.517,-0.007l-25.449,0c-2.176,-0.003 -4.049,1.598 -4.385,3.748l-1.11,7.112l-1.782,-2.576c-5.509,-7.996 -17.795,-10.676 -30.06,-10.676c-28.107,0 -52.124,21.31 -56.804,51.186c-2.432,14.917 1.028,29.162 9.483,39.105c7.764,9.133 18.844,12.936 32.048,12.936c22.673,0 35.24,-14.553 35.24,-14.553l-1.137,7.071c-0.038,0.233 -0.057,0.469 -0.057,0.706c0,2.42 1.992,4.412 4.413,4.412l22.915,0c3.632,0 6.729,-2.638 7.304,-6.235l13.759,-87.111c0.036,-0.227 0.054,-0.456 0.054,-0.685c0,-2.432 -2.002,-4.433 -4.434,-4.433c-0.001,0 -0.003,0 -0.005,0l0.007,-0.007Zm-379.059,0l-25.448,0c-2.177,-0.003 -4.049,1.598 -4.386,3.748l-1.11,7.112l-1.781,-2.576c-5.509,-7.996 -17.795,-10.676 -30.061,-10.676c-28.114,0 -52.13,21.31 -56.804,51.186c-2.432,14.917 1.021,29.162 9.477,39.105c7.763,9.133 18.843,12.936 32.047,12.936c22.667,0 35.234,-14.553 35.234,-14.553l-1.138,7.071c-0.036,0.229 -0.054,0.46 -0.054,0.692c0,2.428 1.998,4.426 4.426,4.426l22.92,0c3.632,0 6.729,-2.638 7.298,-6.235l13.759,-87.111c0.035,-0.227 0.053,-0.456 0.053,-0.685c0,-2.432 -2.001,-4.433 -4.433,-4.433c-0.002,0 -0.004,0 -0.006,0l0.007,-0.007Zm409.051,-45.409l-21.817,138.762c-0.036,0.227 -0.054,0.456 -0.054,0.685c0,2.432 2.001,4.433 4.432,4.433l21.934,0c3.631,0 6.728,-2.644 7.297,-6.235l21.509,-136.275c0.036,-0.229 0.054,-0.46 0.054,-0.692c0,-2.428 -1.998,-4.426 -4.426,-4.426l-24.551,0c-2.174,-0.006 -4.045,1.593 -4.378,3.741l0,0.007Zm-567.903,-3.748l-53.145,0c-3.632,0 -6.729,2.645 -7.298,6.235l-21.481,136.268c-0.036,0.229 -0.054,0.46 -0.054,0.692c0,2.428 1.998,4.426 4.426,4.427l25.38,0c3.632,0 6.722,-2.645 7.291,-6.236l5.803,-36.761c0.562,-3.591 3.659,-6.236 7.291,-6.236l16.815,0c35.014,0 55.214,-16.938 60.49,-50.52c2.378,-14.678 0.096,-26.217 -6.776,-34.295c-7.558,-8.881 -20.954,-13.581 -38.735,-13.581l-0.007,0.007Zm379.059,0l-53.145,0c-3.621,0.002 -6.735,2.66 -7.305,6.235l-21.474,136.268c-0.036,0.227 -0.054,0.456 -0.054,0.685c0,2.429 1.997,4.429 4.425,4.434l27.272,0c2.542,0 4.707,-1.851 5.105,-4.358l6.098,-38.646c0.562,-3.584 3.659,-6.236 7.291,-6.236l16.815,0c35.014,0 55.214,-16.931 60.49,-50.513c2.378,-14.678 0.096,-26.217 -6.777,-34.295c-7.558,-8.881 -20.953,-13.581 -38.735,-13.581l-0.006,0.007Zm123.385,98.698c-2.466,14.54 -13.998,24.304 -28.724,24.304c-7.379,0 -13.293,-2.378 -17.089,-6.873c-3.768,-4.454 -5.18,-10.806 -3.988,-17.87c2.289,-14.417 14.013,-24.489 28.519,-24.489c7.229,0 13.087,2.398 16.966,6.934c3.898,4.57 5.433,10.956 4.316,17.994Zm-379.058,0c-2.467,14.54 -13.999,24.304 -28.724,24.304c-7.38,0 -13.293,-2.378 -17.089,-6.873c-3.769,-4.454 -5.181,-10.806 -3.988,-17.87c2.288,-14.417 14.019,-24.489 28.518,-24.489c7.229,0 13.088,2.398 16.966,6.934c3.899,4.57 5.434,10.956 4.317,17.994Zm-117.253,-48.925c-2.906,19.077 -17.473,19.077 -31.568,19.077l-8.017,0l5.625,-35.618c0.343,-2.151 2.193,-3.734 4.372,-3.734l3.68,0c9.593,0 18.651,0 23.324,5.461c2.796,3.269 3.639,8.12 2.584,14.814Zm379.058,0c-2.905,19.077 -17.473,19.077 -31.561,19.077l-8.017,0l5.626,-35.618c0.343,-2.151 2.193,-3.734 4.372,-3.734l3.679,0c9.593,0 18.652,0 23.325,5.461c2.789,3.269 3.631,8.12 2.576,14.814Z"/></svg>';
			break;
		case 'applepay':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 2500 1601" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path id="XMLID_4_" d="M2323.12,0l-2146.25,0c-15.104,0 -31.718,1.51 -46.822,4.531c-15.104,3.021 -30.207,7.552 -45.311,15.104c-13.594,6.041 -27.187,16.614 -37.76,27.187c-10.572,10.572 -21.145,24.166 -27.186,37.759c-7.552,13.594 -12.083,28.697 -15.104,45.311c-3.021,15.104 -3.021,31.718 -4.531,46.822l0,1246.06c0,15.104 1.51,31.718 4.531,46.822c3.021,15.104 7.552,30.208 15.104,45.311c7.552,13.594 16.614,27.187 27.186,37.76c10.573,10.573 24.166,21.145 37.76,27.187c13.593,7.552 28.697,12.083 45.311,15.103c15.104,3.021 31.718,3.021 46.822,4.532l2146.25,0c15.104,0 31.718,-1.511 46.822,-4.532c15.104,-3.02 30.207,-7.551 45.311,-15.103c13.594,-7.552 27.187,-16.614 37.76,-27.187c10.572,-10.573 21.145,-24.166 27.186,-37.76c7.552,-13.593 12.083,-28.697 15.104,-45.311c3.021,-15.104 3.021,-31.718 4.531,-46.822l0,-1246.06c0,-15.104 -1.51,-31.718 -4.531,-46.822c-3.021,-15.103 -7.552,-30.207 -15.104,-45.311c-7.552,-13.593 -16.614,-27.187 -27.186,-37.759c-10.573,-10.573 -24.166,-21.146 -37.76,-27.187c-13.593,-7.552 -28.697,-12.083 -45.311,-15.104c-15.104,-3.021 -31.718,-3.021 -46.822,-4.531Z" style="fill-rule:nonzero;"/><path id="XMLID_3_" d="M2276.3,52.863l46.822,0c12.083,0 25.677,1.511 39.27,3.021c12.083,1.51 21.145,4.531 30.207,9.062c9.063,4.531 16.615,10.573 24.167,18.125c7.551,7.552 13.593,15.104 18.124,24.166c4.531,9.062 7.552,18.124 9.062,30.207c3.021,13.594 3.021,27.187 3.021,39.27l0,1246.06c0,12.083 -1.51,25.677 -3.021,39.27c-1.51,10.573 -4.531,21.146 -9.062,30.208c-4.531,9.062 -10.573,16.614 -18.124,24.166c-7.552,7.552 -15.104,13.593 -24.167,18.124c-9.062,4.532 -18.124,7.552 -30.207,9.063c-13.593,3.02 -27.187,3.02 -39.27,3.02l-2146.25,0c-10.573,0 -25.677,-1.51 -39.27,-3.02c-10.573,-1.511 -21.145,-4.531 -30.207,-10.573c-9.063,-4.531 -16.615,-10.573 -24.167,-18.125c-7.551,-7.551 -13.593,-15.103 -18.124,-24.166c-4.531,-9.062 -7.552,-18.124 -9.062,-30.207c-3.021,-13.593 -3.021,-27.187 -3.021,-39.27l0,-1244.55c0,-12.083 1.51,-25.676 3.021,-39.27c1.51,-10.572 4.531,-21.145 9.062,-30.207c4.531,-9.062 10.573,-16.614 18.124,-24.166c7.552,-7.552 15.104,-13.594 24.167,-18.125c9.062,-4.531 18.124,-7.552 30.207,-9.062c13.593,-3.021 27.187,-3.021 39.27,-3.021l2099.42,0" style="fill:white;fill-rule:nonzero;"/><path d="M682.853,537.694c21.146,-27.186 36.249,-63.436 31.718,-99.685c-31.718,1.511 -69.477,21.146 -92.133,46.822c-19.635,22.656 -37.759,60.415 -33.228,95.154c36.249,4.531 70.988,-15.104 93.643,-42.291m31.718,51.353c-51.353,-3.021 -95.154,28.697 -119.32,28.697c-24.166,0 -61.925,-27.186 -102.705,-27.186c-52.863,1.51 -101.196,30.207 -128.382,78.539c-54.374,95.154 -15.104,235.619 39.269,312.648c25.677,37.76 57.395,80.05 98.175,78.54c39.27,-1.51 54.374,-25.677 101.195,-25.677c46.822,0 60.415,25.677 102.706,24.167c42.291,-1.511 69.477,-37.76 95.154,-77.03c30.207,-43.801 42.29,-86.091 42.29,-87.602c-1.51,-1.51 -83.07,-31.718 -83.07,-125.361c-1.511,-78.54 63.435,-116.299 66.456,-117.809c-34.739,-54.374 -92.133,-60.415 -111.768,-61.926" style="fill-rule:nonzero;"/><g><path d="M1158.62,481.81c111.768,0 188.797,77.03 188.797,187.287c0,111.768 -78.539,188.797 -191.818,188.797l-122.34,0l0,194.839l-89.112,0l0,-570.923l214.473,0Zm-126.872,302.076l102.706,0c77.029,0 120.83,-42.291 120.83,-113.278c0,-72.499 -43.801,-113.279 -120.83,-113.279l-102.706,0l0,226.557Zm338.325,152.548c0,-72.498 55.884,-117.809 155.569,-123.851l114.789,-6.041l0,-31.718c0,-46.822 -31.718,-74.009 -83.071,-74.009c-49.843,0 -80.05,24.166 -87.602,60.415l-81.56,0c4.531,-75.519 69.477,-131.403 172.183,-131.403c101.195,0 166.141,52.864 166.141,137.445l0,286.971l-81.56,0l0,-67.967l-1.511,0c-24.166,46.822 -77.029,75.519 -131.403,75.519c-84.581,0 -141.975,-51.353 -141.975,-125.361Zm270.358,-37.759l0,-33.229l-102.706,6.042c-51.353,3.02 -80.05,25.676 -80.05,61.925c0,36.249 30.207,60.415 75.519,60.415c60.415,0 107.237,-40.78 107.237,-95.153Zm161.61,309.627l0,-69.477c6.041,1.51 21.145,1.51 27.187,1.51c39.27,0 60.415,-16.614 74.008,-58.905c0,-1.51 7.552,-25.676 7.552,-25.676l-151.038,-416.864l92.133,0l105.727,339.835l1.51,0l105.727,-339.835l90.622,0l-155.569,439.519c-36.249,101.196 -77.029,132.914 -163.12,132.914c-6.042,-1.511 -27.187,-1.511 -34.739,-3.021Z" style="fill-rule:nonzero;"/></g></svg>';
			break;
		case 'applepay_gray':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 780 501" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M54.992,0c-30.365,0 -54.992,24.63 -54.992,55.004l0,390.992c0,30.38 24.619,55.004 54.992,55.004l670.016,0c30.365,0 54.992,-24.63 54.992,-55.004l0,-390.992c0,-30.38 -24.619,-55.004 -54.992,-55.004l-670.016,0Zm531.934,386.558c2.679,0.536 10.178,0.536 12.321,1.072c30.532,0 44.995,-11.249 57.851,-47.139l55.174,-155.878l-32.14,0l-37.497,120.525l-0.535,0l-37.497,-120.525l-32.675,0l53.566,147.843c0,0 -2.678,8.571 -2.678,9.107c-4.821,14.998 -12.32,20.891 -26.248,20.891c-2.142,0 -7.499,0 -9.642,-0.536l0,24.64Zm-153.199,-96.419c0,26.248 20.355,44.46 50.352,44.46c19.284,0 38.032,-10.178 46.603,-26.783l0.535,0l0,24.105l28.926,0l0,-101.776c0,-29.997 -23.033,-48.746 -58.923,-48.746c-36.425,0 -59.458,19.82 -61.065,46.603l28.926,0c2.678,-12.856 13.391,-21.426 31.068,-21.426c18.213,0 29.461,9.642 29.461,26.247l0,11.249l-40.71,2.143c-35.354,2.142 -55.173,18.212 -55.173,43.924Zm-232.478,-123.202c-18.212,-1.072 -33.747,10.177 -42.317,10.177c-8.571,0 -21.962,-9.642 -36.425,-9.642c-18.748,0.536 -35.89,10.714 -45.532,27.855c-19.283,33.746 -5.356,83.563 13.928,110.882c9.106,13.392 20.355,28.39 34.818,27.854c13.927,-0.535 19.284,-9.106 35.889,-9.106c16.606,0 21.427,9.106 36.425,8.571c14.999,-0.536 24.641,-13.392 33.747,-27.319c10.713,-15.534 14.999,-30.533 14.999,-31.069c-0.536,-0.535 -29.462,-11.248 -29.462,-44.46c-0.536,-27.854 22.498,-41.246 23.569,-41.781c-12.32,-19.284 -32.675,-21.427 -39.639,-21.962Zm157.485,-38.032c39.639,0 66.958,27.318 66.958,66.422c0,39.639 -27.855,66.958 -68.029,66.958l-43.389,0l0,69.1l-31.604,0l0,-202.48l76.064,0Zm170.876,147.842l0,-11.784l-36.425,2.143c-18.212,1.071 -28.39,9.106 -28.39,21.962c0,12.856 10.714,21.426 26.783,21.426c21.427,0 38.032,-14.463 38.032,-33.747Zm-215.872,-40.71l36.425,0c27.319,0 42.853,-14.998 42.853,-40.175c0,-25.711 -15.534,-40.174 -42.853,-40.174l-36.425,0l0,80.349Zm-123.738,-87.313c7.5,-9.642 12.856,-22.498 11.249,-35.354c-11.249,0.536 -24.64,7.5 -32.675,16.606c-6.964,8.035 -13.392,21.426 -11.785,33.747c12.856,1.607 25.176,-5.357 33.211,-14.999Z"/></svg>';
			break;
		case 'stripe':
			$output .= '<svg width="100%" height="100%" viewBox="0 0 119 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M113,26l-107,0c-3.314,0 -6,-2.686 -6,-6l0,-14c0,-3.314 2.686,-6 6,-6l107,0c3.314,0 6,2.686 6,6l0,14c0,3.314 -2.686,6 -6,6Zm5,-20c0,-2.761 -2.239,-5 -5,-5l-107,0c-2.761,0 -5,2.239 -5,5l0,14c0,2.761 2.239,5 5,5l107,0c2.761,0 5,-2.239 5,-5l0,-14Z" style="fill:rgb(66,71,112);"/><path d="M60.7,18.437l-1.305,0l1.01,-2.494l-2.01,-5.072l1.379,0l1.263,3.452l1.273,-3.452l1.379,0l-2.989,7.566Zm-5.01,-2.178c-0.452,0 -0.916,-0.168 -1.336,-0.495l0,0.369l-1.347,0l0,-7.567l1.347,0l0,2.663c0.42,-0.316 0.884,-0.484 1.336,-0.484c1.41,0 2.378,1.136 2.378,2.757c0,1.62 -0.968,2.757 -2.378,2.757Zm-0.284,-4.357c-0.368,0 -0.737,0.158 -1.052,0.474l0,2.252c0.315,0.315 0.684,0.473 1.052,0.473c0.758,0 1.284,-0.652 1.284,-1.599c0,-0.947 -0.526,-1.6 -1.284,-1.6Zm-7.852,3.862c-0.41,0.327 -0.873,0.495 -1.336,0.495c-1.4,0 -2.378,-1.137 -2.378,-2.757c0,-1.621 0.978,-2.757 2.378,-2.757c0.463,0 0.926,0.168 1.336,0.484l0,-2.663l1.358,0l0,7.567l-1.358,0l0,-0.369Zm0,-3.388c-0.305,-0.316 -0.673,-0.474 -1.041,-0.474c-0.769,0 -1.295,0.653 -1.295,1.6c0,0.947 0.526,1.599 1.295,1.599c0.368,0 0.736,-0.158 1.041,-0.473l0,-2.252Zm-8.019,1.494c0.084,0.8 0.716,1.347 1.599,1.347c0.485,0 1.021,-0.179 1.568,-0.495l0,1.127c-0.599,0.273 -1.199,0.41 -1.789,0.41c-1.589,0 -2.704,-1.158 -2.704,-2.799c0,-1.589 1.094,-2.715 2.599,-2.715c1.379,0 2.315,1.084 2.315,2.63c0,0.148 0,0.316 -0.021,0.495l-3.567,0Zm1.221,-2.084c-0.653,0 -1.158,0.485 -1.221,1.211l2.294,0c-0.042,-0.716 -0.473,-1.211 -1.073,-1.211Zm-4.768,0.832l0,3.515l-1.347,0l0,-5.262l1.347,0l0,0.526c0.379,-0.421 0.842,-0.652 1.294,-0.652c0.148,0 0.295,0.01 0.442,0.052l0,1.2c-0.147,-0.042 -0.315,-0.063 -0.473,-0.063c-0.442,0 -0.916,0.242 -1.263,0.684Zm-6.009,1.252c0.084,0.8 0.715,1.347 1.599,1.347c0.484,0 1.021,-0.179 1.568,-0.495l0,1.127c-0.6,0.273 -1.2,0.41 -1.789,0.41c-1.589,0 -2.704,-1.158 -2.704,-2.799c0,-1.589 1.094,-2.715 2.599,-2.715c1.378,0 2.315,1.084 2.315,2.63c0,0.148 0,0.316 -0.021,0.495l-3.567,0Zm1.22,-2.084c-0.652,0 -1.157,0.485 -1.22,1.211l2.294,0c-0.042,-0.716 -0.474,-1.211 -1.074,-1.211Zm-5.925,4.347l-1.074,-3.578l-1.063,3.578l-1.21,0l-1.81,-5.262l1.347,0l1.063,3.578l1.063,-3.578l1.22,0l1.063,3.578l1.063,-3.578l1.347,0l-1.799,5.262l-1.21,0Zm-8.231,0.126c-1.589,0 -2.715,-1.147 -2.715,-2.757c0,-1.621 1.126,-2.757 2.715,-2.757c1.589,0 2.705,1.136 2.705,2.757c0,1.61 -1.116,2.757 -2.705,2.757Zm0,-4.388c-0.789,0 -1.336,0.663 -1.336,1.631c0,0.968 0.547,1.631 1.336,1.631c0.779,0 1.326,-0.663 1.326,-1.631c0,-0.968 -0.547,-1.631 -1.326,-1.631Zm-5.915,1.662l-1.21,0l0,2.6l-1.347,0l0,-7.241l2.557,0c1.474,0 2.526,0.958 2.526,2.326c0,1.368 -1.052,2.315 -2.526,2.315Zm-0.189,-3.546l-1.021,0l0,2.452l1.021,0c0.779,0 1.326,-0.495 1.326,-1.221c0,-0.736 -0.547,-1.231 -1.326,-1.231Z" style="fill:rgb(66,71,112);"/><path d="M111.116,14.051l-5.559,0c0.127,1.331 1.102,1.723 2.209,1.723c1.127,0 2.015,-0.238 2.789,-0.628l0,2.287c-0.771,0.428 -1.79,0.736 -3.147,0.736c-2.766,0 -4.704,-1.732 -4.704,-5.156c0,-2.892 1.644,-5.188 4.345,-5.188c2.697,0 4.105,2.295 4.105,5.203c0,0.275 -0.025,0.87 -0.038,1.023Zm-4.085,-3.911c-0.71,0 -1.499,0.536 -1.499,1.815l2.936,0c0,-1.278 -0.74,-1.815 -1.437,-1.815Zm-8.923,8.029c-0.994,0 -1.601,-0.419 -2.009,-0.718l-0.006,3.213l-2.839,0.604l-0.001,-13.254l2.5,0l0.148,0.701c0.392,-0.366 1.111,-0.89 2.224,-0.89c1.994,0 3.872,1.796 3.872,5.102c0,3.608 -1.858,5.242 -3.889,5.242Zm-0.662,-7.829c-0.651,0 -1.06,0.238 -1.356,0.563l0.017,4.219c0.276,0.299 0.673,0.539 1.339,0.539c1.05,0 1.754,-1.143 1.754,-2.672c0,-1.485 -0.715,-2.649 -1.754,-2.649Zm-8.297,-2.326l2.85,0l0,9.952l-2.85,0l0,-9.952Zm0,-3.178l2.85,-0.606l0,2.313l-2.85,0.606l0,-2.313Zm-3.039,6.383l0,6.747l-2.838,0l0,-9.952l2.455,0l0.178,0.839c0.665,-1.222 1.992,-0.974 2.37,-0.838l0,2.61c-0.361,-0.117 -1.494,-0.287 -2.165,0.594Zm-6.086,3.256c0,1.673 1.792,1.152 2.155,1.007l0,2.311c-0.378,0.208 -1.064,0.376 -1.992,0.376c-1.685,0 -2.95,-1.241 -2.95,-2.922l0.013,-9.109l2.772,-0.59l0.002,2.466l2.156,0l0,2.421l-2.156,0l0,4.04Zm-3.539,0.484c0,2.044 -1.627,3.21 -3.988,3.21c-0.979,0 -2.049,-0.19 -3.105,-0.644l0,-2.711c0.953,0.518 2.167,0.907 3.108,0.907c0.633,0 1.089,-0.17 1.089,-0.695c0,-1.355 -4.316,-0.845 -4.316,-3.988c0,-2.01 1.535,-3.213 3.838,-3.213c0.941,0 1.881,0.144 2.822,0.519l0,2.675c-0.864,-0.467 -1.961,-0.731 -2.824,-0.731c-0.595,0 -0.965,0.172 -0.965,0.615c0,1.278 4.341,0.67 4.341,4.056Z" style="fill:rgb(66,71,112);"/></svg>';
			break;
		default:
			$output .= '';
			break;
	}
	$output .= '</span>';

	$output = apply_filters( 'responsive_svg_icon', $output, $icon, $icon_title, $base );

	return $output;
}
