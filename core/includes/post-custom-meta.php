<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Custom Post Meta
 *
 *
 * @file           post-custom-meta.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/includes/post-custom-meta.php
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();

/**
 * Get content classes
 */
function responsive_get_content_classes() {
	$content_classes = array();
	$layout          = responsive_get_layout();
	if ( in_array( $layout, array( 'default', 'content-sidebar-page' ) ) ) {
		$content_classes[] = 'grid';
		$content_classes[] = 'col-620';
	}
	elseif ( 'sidebar-content-page' == $layout ) {
		$content_classes[] = 'grid-right';
		$content_classes[] = 'col-620';
		$content_classes[] = 'fit';
	}
	elseif ( 'content-sidebar-half-page' == $layout ) {
		$content_classes[] = 'grid';
		$content_classes[] = 'col-460';
	}
	elseif ( 'sidebar-content-half-page' == $layout ) {
		$content_classes[] = 'grid-right';
		$content_classes[] = 'col-460';
		$content_classes[] = 'fit';
	}
	elseif ( 'full-width-page' == $layout ) {
		$content_classes[] = 'grid';
		$content_classes[] = 'col-940';
	}

	return apply_filters( 'responsive_content_classes', $content_classes );
}

/**
 * Get sidebar classes
 */
function responsive_get_sidebar_classes() {
	$sidebar_classes = array();
	$layout          = responsive_get_layout();
	if ( in_array( $layout, array( 'default', 'content-sidebar-page' ) ) ) {
		$sidebar_classes[] = 'grid';
		$sidebar_classes[] = 'col-300';
		$sidebar_classes[] = 'fit';
	}
	elseif ( 'sidebar-content-page' == $layout ) {
		$sidebar_classes[] = 'grid-right';
		$sidebar_classes[] = 'col-300';
		$sidebar_classes[] = 'rtl-fit';
	}
	elseif ( 'content-sidebar-half-page' == $layout ) {
		$sidebar_classes[] = 'grid';
		$sidebar_classes[] = 'col-460';
		$sidebar_classes[] = 'fit';
	}
	elseif ( 'sidebar-content-half-page' == $layout ) {
		$sidebar_classes[] = 'grid-right';
		$sidebar_classes[] = 'col-460';
		$sidebar_classes[] = 'rtl-fit';

	}

	return apply_filters( 'responsive_sidebar_classes', $sidebar_classes );
}

/**
 * Get current layout
 */
function responsive_get_layout() {
	
	/* WooCommerce Shop page */
	if ( class_exists( 'WooCommerce' ) ) {
		if( is_shop() )
		{
			return 'default';
		}
	}
	
	/* 404 pages */
	if ( is_404() ) {
		return 'default';
	}
	$layout = '';
	/* Get Theme options */
	global $responsive_options;
	$responsive_options = responsive_get_options();
	/* Get valid layouts */
	$valid_layouts = responsive_get_valid_layouts();
	/* For singular pages, get post meta */
	if ( is_singular() ) {
		global $post;
		$layout_meta_value = ( false != get_post_meta( $post->ID, '_responsive_layout', true ) ? get_post_meta( $post->ID, '_responsive_layout', true ) : 'default' );
		$layout_meta       = ( array_key_exists( $layout_meta_value, $valid_layouts ) ? $layout_meta_value : 'default' );
	}
	/* Static pages */
	if ( is_page() ) {
		$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
		/* If custom page template is defined, use it first */
		if ( 'default' != $page_template ) {
			if ( in_array( $page_template, array( 'blog.php', 'blog-excerpt.php' ) ) ) {
				$layout = $responsive_options['blog_posts_index_layout_default'];
			}
			else {
				$layout = $responsive_options['static_page_layout_default'];
			}
		}
		/* Else, if post custom meta is set, use it */
		elseif ( 'default' != $layout_meta ) {
			$layout = $layout_meta;
		}
		/* Else, use the default */
		else {
			$layout = $responsive_options['static_page_layout_default'];
		}

	}
	/* Single blog posts */
	else {
		if ( is_single() ) {
			/* If post custom meta is set, use it */
			if ( 'default' != $layout_meta ) {
				$layout = $layout_meta;
			}
			/* Else, use the default */
			else {
				$layout = $responsive_options['single_post_layout_default'];
			}

		}
		/* Posts index */
		elseif ( is_home() || is_archive() || is_search() ) {
			$layout = $responsive_options['blog_posts_index_layout_default'];
		}
		/* Fallback */
		else {
			$layout = 'default';
		}

	}

	return apply_filters( 'responsive_get_layout', $layout );
}

/**
 * Get valid layouts
 */
function responsive_get_valid_layouts() {
	$layouts = array(
		'default'                   => __( 'Default', 'responsive' ),
		'content-sidebar-page'      => __( 'Content/Sidebar', 'responsive' ),
		'sidebar-content-page'      => __( 'Sidebar/Content', 'responsive' ),
		'content-sidebar-half-page' => __( 'Content/Sidebar Half Page', 'responsive' ),
		'sidebar-content-half-page' => __( 'Sidebar/Content Half Page', 'responsive' ),
		'full-width-page'           => __( 'Full Width Page (no sidebar)', 'responsive' ),
		'blog-3-col'      			=> __( 'Blog 3 Column', 'responsive' )
	);

	return apply_filters( 'responsive_valid_layouts', $layouts );
}

/**
 * Add Layout Meta Box
 *
 * @link    http://codex.wordpress.org/Function_Reference/_2            __()
 * @link    http://codex.wordpress.org/Function_Reference/add_meta_box    add_meta_box()
 */
function responsive_add_layout_meta_box( $post ) {
	global $post, $wp_meta_boxes;

	$context  = apply_filters( 'responsive_layout_meta_box_context', 'side' ); // 'normal', 'side', 'advanced'
	$priority = apply_filters( 'responsive_layout_meta_box_priority', 'default' ); // 'high', 'core', 'low', 'default'

	add_meta_box(
		'responsive_layout',
		__( 'Layout', 'responsive' ),
		'responsive_layout_meta_box',
		'post',
		$context,
		$priority
	);
}

// Hook meta boxes into 'add_meta_boxes'
add_action( 'add_meta_boxes', 'responsive_add_layout_meta_box' );

/**
 * Define Layout Meta Box
 *
 * Define the markup for the meta box
 * for the "layout" post custom meta
 * data. The metabox will consist of
 * radio selection options for "default"
 * and each defined, valid layout
 * option for single blog posts or
 * static pages, depending on the
 * context.
 *
 * @uses    responsive_get_option_parameters()    Defined in \functions\options.php
 * @uses    checked()
 * @uses    get_post_custom()
 */
function responsive_layout_meta_box() {
	global $post;
	$custom        = ( get_post_custom( $post->ID ) ? get_post_custom( $post->ID ) : false );
	$layout        = ( isset( $custom['_responsive_layout'][0] ) ? $custom['_responsive_layout'][0] : 'default' );
	$valid_layouts = responsive_get_valid_layouts();
	?>
	<p>
		<select name="_responsive_layout">
		<?php foreach( $valid_layouts as $slug => $name ) { ?>
			<?php $selected = selected( $layout, $slug, false ); ?>
			<option value="<?php echo $slug; ?>" <?php echo $selected; ?>><?php echo $name; ?></option>
		<?php } ?>
		</select>
	</p>
<?php
}

/**
 * Validate, sanitize, and save post metadata.
 *
 * Validates the user-submitted post custom
 * meta data, ensuring that the selected layout
 * option is in the array of valid layout
 * options; otherwise, it returns 'default'.
 *
 * @link    http://codex.wordpress.org/Function_Reference/update_post_meta    update_post_meta()
 *
 * @link    http://php.net/manual/en/function.array-key-exists.php            array_key_exists()
 *
 * @uses    responsive_get_option_parameters()    Defined in \functions\options.php
 */
function responsive_save_layout_post_metadata() {
	global $post;
	if ( !isset( $post ) || !is_object( $post ) ) {
		return;
	}
	$valid_layouts = responsive_get_valid_layouts();
	$layout        = ( isset( $_POST['_responsive_layout'] ) && array_key_exists( $_POST['_responsive_layout'], $valid_layouts ) ? $_POST['_responsive_layout'] : 'default' );

	update_post_meta( $post->ID, '_responsive_layout', $layout );
}

// Hook the save layout post custom meta data into
// publish_{post-type}, draft_{post-type}, and future_{post-type}
add_action( 'publish_post', 'responsive_save_layout_post_metadata' );
add_action( 'publish_page', 'responsive_save_layout_post_metadata' );
add_action( 'draft_post', 'responsive_save_layout_post_metadata' );
add_action( 'draft_page', 'responsive_save_layout_post_metadata' );
add_action( 'future_post', 'responsive_save_layout_post_metadata' );
add_action( 'future_page', 'responsive_save_layout_post_metadata' );
