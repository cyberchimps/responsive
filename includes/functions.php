<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2.1
 * @filesource     wp-content/themes/responsive/includes/functions.php
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
 * @since          available since Release 1.0
 */
?>
<?php
/**
 * Fire up the engines boys and girls let's start theme setup.
 */
add_action('after_setup_theme', 'responsive_setup');

if (!function_exists('responsive_setup')):

    function responsive_setup() {

        global $content_width;

        /**
         * Global content width.
         */
        if (!isset($content_width))
            $content_width = 550;

        /**
         * Responsive is now available for translations.
         * Add your files into /languages/ directory.
		 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
         */
	    load_theme_textdomain('responsive', get_template_directory().'/languages');

            $locale = get_locale();
            $locale_file = get_template_directory().'/languages/$locale.php';
            if (is_readable( $locale_file))
	            require_once( $locale_file);
						
        /**
         * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
         * @see http://codex.wordpress.org/Function_Reference/add_editor_style
         */
        add_editor_style();

        /**
         * This feature enables post and comment RSS feed links to head.
         * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
         */
        add_theme_support('automatic-feed-links');

        /**
         * This feature enables post-thumbnail support for a theme.
         * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        /**
         * This feature enables custom-menus support for a theme.
         * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
         */	
        register_nav_menus(array(
			'top-menu'         => __('Top Menu', 'responsive'),
	        'header-menu'      => __('Header Menu', 'responsive'),
	        'sub-header-menu'  => __('Sub-Header Menu', 'responsive'),
			'footer-menu'      => __('Footer Menu', 'responsive')
		    )
	    );

		if ( function_exists('get_custom_header')) {
			
        add_theme_support('custom-background');
		
		} else {
		
		// < 3.4 Backward Compatibility
		
		/**
         * This feature allows users to use custom background for a theme.
         * @see http://codex.wordpress.org/Function_Reference/add_custom_background
         */
		
        add_custom_background();
		
		}

		// WordPress 3.4 >
		if (function_exists('get_custom_header')) {
			
		add_theme_support('custom-header', array (
	        // Header image default
	       'default-image'			=> get_template_directory_uri() . '/images/default-logo.png',
	        // Header text display default
	       'header-text'			=> false,
	        // Header image flex width
		   'flex-width'             => true,
	        // Header image width (in pixels)
	       'width'				    => 300,
		    // Header image flex height
		   'flex-height'            => true,
	        // Header image height (in pixels)
	       'height'			        => 100,
	        // Admin header style callback
	       'admin-head-callback'	=> 'responsive_admin_header_style'));
		   
		// gets included in the admin header
        function responsive_admin_header_style() {
            ?><style type="text/css">
                .appearance_page_custom-header #headimg {
					background-repeat:no-repeat;
					border:none;
				}
             </style><?php
        }		  
	   
	    } else {
		   
        // Backward Compatibility
		
		/**
         * This feature adds a callbacks for image header display.
		 * In our case we are using this to display logo.
         * @see http://codex.wordpress.org/Function_Reference/add_custom_image_header
         */
        define('HEADER_TEXTCOLOR', '');
        define('HEADER_IMAGE', '%s/images/default-logo.png'); // %s is the template dir uri
        define('HEADER_IMAGE_WIDTH', 300); // use width and height appropriate for your theme
        define('HEADER_IMAGE_HEIGHT', 100);
        define('NO_HEADER_TEXT', true);
		
		
		// gets included in the admin header
        function responsive_admin_header_style() {
            ?><style type="text/css">
                #headimg {
	                background-repeat:no-repeat;
                    border:none !important;
                    width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
                    height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
                }
             </style><?php
         }
         
		 add_custom_image_header('', 'responsive_admin_header_style');
		
	    }
    }

endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function responsive_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'responsive_page_menu_args' );

/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 * 
 * Marko Heijnen Contribution
 *
 */
class responsive_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}
 
	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		return $settings;
	}
 
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';
 
		return $args;
	}
}
new responsive_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function responsive_wp_page_menu ($page_markup) {
    preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
        $divclass = $matches[1];
        $replace = array('<div class="'.$divclass.'">', '</div>');
        $new_markup = str_replace($replace, '', $page_markup);
        $new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
        return $new_markup; }

add_filter('wp_page_menu', 'responsive_wp_page_menu');

/**
 * wp_title() Filter for better SEO.
 *
 * Adopted from Twenty Twelve
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 *
 */
function responsive_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'responsive' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'responsive_wp_title', 10, 2 );

/**
 * wp_title() Filter removal for the sake of SEO plugins
 *
 */
function responsive_wp_title_check() {
	if ( defined( 'AIOSEOP_VERSION' ) ) {
		remove_filter( 'wp_title', 'responsive_wp_title', 10, 2 );
	}
}
add_action( 'after_setup_theme', 'responsive_wp_title_check', 5 );

/**
 * Filter 'get_comments_number'
 * 
 * Filter 'get_comments_number' to display correct 
 * number of comments (count only comments, not 
 * trackbacks/pingbacks)
 *
 * Chip Bennett Contribution
 */
function responsive_comment_count( $count ) {  
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'responsive_comment_count', 0);

/**
 * wp_list_comments() Pings Callback
 * 
 * wp_list_comments() Callback function for 
 * Pings (Trackbacks/Pingbacks)
 */
function responsive_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 */
function responsive_excerpt_length($length) {
    return 40;
}

add_filter('excerpt_length', 'responsive_excerpt_length');

/**
 * Returns a "Read more" link for excerpts
 */
function responsive_read_more() {
    return '<div class="read-more"><a href="' . get_permalink() . '">' . __('Read more &#8250;', 'responsive') . '</a></div><!-- end of .read-more -->';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and responsive_read_more_link().
 */
function responsive_auto_excerpt_more($more) {
    return '<span class="ellipsis">&hellip;</span>' . responsive_read_more();
}

add_filter('excerpt_more', 'responsive_auto_excerpt_more');

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function responsive_custom_excerpt_more($output) {
    if (has_excerpt() && !is_attachment()) {
        $output .= responsive_read_more();
    }
    return $output;
}

add_filter('get_the_excerpt', 'responsive_custom_excerpt_more');


/**
 * This function removes inline styles set by WordPress gallery.
 */
function responsive_remove_gallery_css($css) {
    return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
}

add_filter('gallery_style', 'responsive_remove_gallery_css');

/**
 * This function removes default styles set by WordPress recent comments widget.
 */
function responsive_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'responsive_remove_recent_comments_style' );

/**
 * This function prints post meta data.
 *
 * Ulrich Pogson Contribution 
 *
 */
if (!function_exists('responsive_post_meta_data')) :

function responsive_post_meta_data() {
	printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'responsive' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
		get_permalink(),
		esc_attr( get_the_time() ),
		get_the_date()
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
		get_the_author()
	    )
	);
}
endif;

/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 * 
 */
function responsive_category_rel_removal ($output) {
    $output = str_replace(' rel="category tag"', '', $output);
    return $output;
}

add_filter('wp_list_categories', 'responsive_category_rel_removal');
add_filter('the_category', 'responsive_category_rel_removal');

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if (!function_exists('responsive_breadcrumb_lists')) :
    
    function responsive_breadcrumb_lists() {
  
    $chevron = '<span class="chevron">&#8250;</span>';
    $home = __('Home','responsive'); // text for the 'Home' link
    $before = '<span class="breadcrumb-current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
 
        if ( !is_home() && !is_front_page() || is_paged() ) {
 
            echo '<div class="breadcrumb-list">';
 
            global $post;
            $homeLink = home_url();
            
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $chevron . ' ';
 
        if ( is_category() ) {
            global $wp_query;
			
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
      
	  if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $chevron . ' '));
      
	      echo $before; printf( __( 'Archive for %s', 'responsive' ), single_cat_title('', false) ); $after;
 
      } elseif ( is_day() ) {
      
	      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $chevron . ' ';
          echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $chevron . ' ';
          echo $before . get_the_time('d') . $after;
 
      } elseif ( is_month() ) {
     
	      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $chevron . ' ';
          echo $before . get_the_time('F') . $after;
 
      } elseif ( is_year() ) {
		  
          echo $before . get_the_time('Y') . $after;
 
      } elseif ( is_single() && !is_attachment() ) {
      
	  if ( get_post_type() != 'post' ) {
          $post_type = get_post_type_object(get_post_type());
          $slug = $post_type->rewrite;
        
		  echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $chevron . ' ';
          echo $before . get_the_title() . $after;
		  
      } else {
		  
          $cat = get_the_category(); $cat = $cat[0];
          
		  echo get_category_parents($cat, TRUE, ' ' . $chevron . ' ');
          echo $before . get_the_title() . $after;
      }
 
      } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      
	      $post_type = get_post_type_object(get_post_type());
          
		  echo $before . $post_type->labels->singular_name . $after;
 
      } elseif ( is_attachment() ) {
      
	      $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID); $cat = $cat[0];
      
	      echo get_category_parents($cat, TRUE, ' ' . $chevron . ' ');
          echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $chevron . ' ';
          echo $before . get_the_title() . $after;
 
      } elseif ( is_page() && !$post->post_parent ) {
          
		  echo $before . get_the_title() . $after;
 
      } elseif ( is_page() && $post->post_parent ) {
      
	      $parent_id  = $post->post_parent;
          $breadcrumbs = array();
      
	  while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
      }
	  
          $breadcrumbs = array_reverse($breadcrumbs);
      
	  foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $chevron . ' ';
	  
          echo $before . get_the_title() . $after;
 
      } elseif ( is_search() ) {
          
		  echo $before; printf( __( 'Search results for: %s', 'responsive' ), get_search_query() ); $after;
 
      } elseif ( is_tag() ) {
          
		  echo $before; printf( __( 'Posts tagged %s', 'responsive' ), single_tag_title('', false) ); $after;
 
      } elseif ( is_author() ) {
          
		  global $author;
      
	      $userdata = get_userdata($author);
          
		  echo $before; printf( __( 'View all posts by %s', 'responsive' ), $userdata->display_name ); $after;
 
      } elseif ( is_404() ) {
          echo $before . __('Error 404 ','responsive') . $after;
      }
 
      if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      
	      echo __('Page','responsive') . ' ' . get_query_var('paged');
      
	  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
      }
 
        echo '</div>';
 
      }
    }

endif;

    /**
     * A safe way of adding JavaScripts to a WordPress generated page.
     */
    if (!is_admin())
        add_action('wp_enqueue_scripts', 'responsive_js');

    if (!function_exists('responsive_js')) {

        function responsive_js() {
			// JS at the bottom for fast page loading. 
			// except for Modernizr which enables HTML5 elements & feature detects.
			wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/responsive-modernizr.js', array('jquery'), '2.6.1', false);
            wp_enqueue_script('responsive-scripts', get_template_directory_uri() . '/js/responsive-scripts.js', array('jquery'), '1.2.3', true);
			wp_enqueue_script('responsive-plugins', get_template_directory_uri() . '/js/responsive-plugins.js', array('jquery'), '1.2.2', true);
        }

    }

    /**
     * A comment reply.
     */
        function responsive_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }

    add_action( 'wp_enqueue_scripts', 'responsive_enqueue_comment_reply' );

    /**
     * Theme Options Support and Information
     */	
    function responsive_theme_support () {
    ?>
    
    <div id="info-box-wrapper" class="grid col-940">
        <div class="info-box notice">
            <a class="button" href="<?php echo esc_url(__('http://themeid.com/support/','responsive')); ?>" title="<?php esc_attr_e('Theme Support', 'responsive'); ?>" target="_blank">
            <?php printf(__('Theme Support','responsive')); ?></a>
            
            <a class="button" href="<?php echo esc_url(__('http://themeid.com/themes/','responsive')); ?>" title="<?php esc_attr_e('More Themes', 'responsive'); ?>" target="_blank">
            <?php printf(__('More Themes','responsive')); ?></a>
            
            <a class="button" href="<?php echo esc_url(__('http://themeid.com/showcase/','responsive')); ?>" title="<?php esc_attr_e('Showcase', 'responsive'); ?>" target="_blank">
            <?php printf(__('Showcase','responsive')); ?></a>
            
            <a class="button-primary" href="<?php echo esc_url(__('http://themeid.com/donate/','responsive')); ?>" title="<?php esc_attr_e('Donate Now', 'responsive'); ?>" target="_blank">
            <?php printf(__('Donate Now','responsive')); ?></a>
        </div>
    </div>

    <?php }
 
    add_action('responsive_theme_options','responsive_theme_support');

	 
    /**
     * WordPress Widgets start right here.
     */
    function responsive_widgets_init() {

        register_sidebar(array(
            'name' => __('Main Sidebar', 'responsive'),
            'description' => __('Area 1 - sidebar.php', 'responsive'),
            'id' => 'main-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Right Sidebar', 'responsive'),
            'description' => __('Area 2 - sidebar-right.php', 'responsive'),
            'id' => 'right-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
				
        register_sidebar(array(
            'name' => __('Left Sidebar', 'responsive'),
            'description' => __('Area 3 - sidebar-left.php', 'responsive'),
            'id' => 'left-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Left Sidebar Half Page', 'responsive'),
            'description' => __('Area 4 - sidebar-left-half.php', 'responsive'),
            'id' => 'left-sidebar-half',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Right Sidebar Half Page', 'responsive'),
            'description' => __('Area 5 - sidebar-right-half.php', 'responsive'),
            'id' => 'right-sidebar-half',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 1', 'responsive'),
            'description' => __('Area 6 - sidebar-home.php', 'responsive'),
            'id' => 'home-widget-1',
            'before_title' => '<div id="widget-title-one" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 2', 'responsive'),
            'description' => __('Area 7 - sidebar-home.php', 'responsive'),
            'id' => 'home-widget-2',
            'before_title' => '<div id="widget-title-two" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 3', 'responsive'),
            'description' => __('Area 8 - sidebar-home.php', 'responsive'),
            'id' => 'home-widget-3',
            'before_title' => '<div id="widget-title-three" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Gallery Sidebar', 'responsive'),
            'description' => __('Area 9 - sidebar-gallery.php', 'responsive'),
            'id' => 'gallery-widget',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Colophon Widget', 'responsive'),
            'description' => __('Area 10 - sidebar-colophon.php', 'responsive'),
            'id' => 'colophon-widget',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="colophon-widget widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Top Widget', 'responsive'),
            'description' => __('Area 11 - sidebar-top.php', 'responsive'),
            'id' => 'top-widget',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>'
        ));
    }
	
    add_action('widgets_init', 'responsive_widgets_init');
?>