<?php
/**
 * Helper functions for the Responsive theme
 *
 * @package Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helps file locations in child themes. If the file is not being overwritten by the child theme then
 * return the parent theme location of the file. Great for images.
 *
 * @param string $dir  directory.
 *
 * @return string complete uri
 */
function responsive_child_uri( $dir ) {
	if ( is_child_theme() ) {
		$directory = get_stylesheet_directory() . $dir;
		$test      = is_file( $directory );
		if ( is_file( $directory ) ) {
			$file = get_stylesheet_directory_uri() . $dir;
		} else {
			$file = get_template_directory_uri() . $dir;
		}
	} else {
		$file = get_template_directory_uri() . $dir;
	}

	return $file;
}

/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 *
 * @param string $output Output.
 */
function responsive_category_rel_removal( $output ) {
	$output = str_replace( ' rel="category tag"', '', $output );

	return $output;
}

add_filter( 'wp_list_categories', 'responsive_category_rel_removal' );
add_filter( 'the_category', 'responsive_category_rel_removal' );

/**
 * Filter 'get_comments_number'
 *
 * Filter 'get_comments_number' to display correct
 * number of comments (count only comments, not
 * trackbacks/pingbacks)
 *
 * @param int $count Number of comments.
 */
function responsive_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments         = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $comments );

		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

add_filter( 'get_comments_number', 'responsive_comment_count', 0 );

/**
 * Pings Callback wp_list_comments()
 *
 * Callback function wp_list_comments() for.
 * Pings (Trackbacks/Pingbacks)
 *
 * @param string $comment Comment.
 */
function responsive_comment_list_pings( $comment ) {
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo wp_kses_post( comment_author_link() ); ?></li>
	<?php
}

/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 *
 * @param  integer $length Length of excerpt.
 */
function responsive_excerpt_length( $length ) {
	return 40;
}

add_filter( 'excerpt_length', 'responsive_excerpt_length' );

/**
 * Returns a "Read more" link for excerpts
 */
function responsive_read_more() {
	global $post;
	if ( 'product' !== $post->post_type ) {
		return '<div class="read-more"><a href="' . get_permalink() . '">' . __( 'Read more &#8250;', 'responsive' ) . '</a></div><!-- end of .read-more -->';
	}
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and responsive_read_more_link().
 *
 * @param int $more More.
 */
function responsive_auto_excerpt_more( $more = 0 ) {
	return '<span class="ellipsis">&hellip;</span>' . responsive_read_more();
}

add_filter( 'excerpt_more', 'responsive_auto_excerpt_more' );

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 *
 * @param string $output Append read more text.
 */
function responsive_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= responsive_read_more();
	}
	return $output;
}

add_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );

/**
 * This function removes inline styles set by WordPress gallery.
 *
 * @param string $css Replace media gallary css.
 */
function responsive_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'responsive_remove_gallery_css' );

/**
 * This function removes default styles set by WordPress recent comments widget.
 */
function responsive_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

add_action( 'widgets_init', 'responsive_remove_recent_comments_style' );


if ( ! function_exists( 'responsive_wp_title' ) && ! defined( 'AIOSEOP_VERSION' ) ) :

	/**
	 * Filter for better SEO wp_title().
	 * Adopted from Twenty Twelve
	 *
	 * @param  [type] $title [description].
	 * @param  [type] $sep   [description].
	 * @return [type]        [description].
	 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
	 */
	function responsive_wp_title( $title, $sep ) {
		global $page, $paged;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			/* translators: %s: author */
			$title .= " $sep " . sprintf( __( 'Page %s', 'responsive' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'responsive_wp_title', 10, 2 );

endif;

/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 * Marko Heijnen Contribution
 */
class responsive_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}

	public function menu_different_class( $settings, $widget ) {
		if ( $widget instanceof WP_Nav_Menu_Widget ) {
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
		}

		return $settings;
	}

	/**
	 * Navigation Menu arguments
	 *
	 * @param array $args Arguments.
	 * @return mixed
	 */
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );

		if ( 'menu' === $args['menu_class'] ) {
			$args['menu_class'] = apply_filters( 'responsive_menu_widget_class', 'menu-widget' );
		}

		return $args;
	}
}

$GLOBALS['nav_menu_widget_classname'] = new responsive_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 *
 * @param string $page_markup Page Markup.
 */
function responsive_wp_page_menu( $page_markup ) {
	preg_match( '/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches );
	$divclass   = $matches[1];
	$replace    = array( '<div class="' . $divclass . '">', '</div>' );
	$new_markup = str_replace( $replace, '', $page_markup );
	$new_markup = preg_replace( '/^<ul>/i', '<ul class="' . $divclass . '">', $new_markup );

	return $new_markup;
}

add_filter( 'wp_page_menu', 'responsive_wp_page_menu' );
