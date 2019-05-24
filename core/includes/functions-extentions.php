<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Breadcrumb Lists
 * Load the plugin from the plugin that is installed.
 *
 */
function get_responsive_breadcrumb_lists() {
	$responsive_options = get_option( 'responsive_theme_options' );
	$yoast_options = get_option( 'wpseo_internallinks' );
	if ( 1 == $responsive_options['breadcrumb'] ) {
		return;
	} elseif ( function_exists( 'bcn_display' ) ) {
		echo '<span class="breadcrumb" typeof="v:Breadcrumb">';
		bcn_display();
		echo '</span>';
	} elseif ( function_exists( 'breadcrumb_trail' ) ) {
		breadcrumb_trail();
	} elseif ( function_exists( 'yoast_breadcrumb' ) && true === $yoast_options['breadcrumbs-enable'] ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	} elseif ( ! is_search() ) {
		responsive_breadcrumb_lists();
	}

}

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if ( !function_exists( 'responsive_breadcrumb_lists' ) ) {

	function responsive_breadcrumb_lists() {

		/* === OPTIONS === */
		$text['home']     = __( 'Home', 'responsive' ); // text for the 'Home' link
		$text['category'] = __( 'Archive for %s', 'responsive' ); // text for a category page
		$text['search']   = __( 'Search results for: %s', 'responsive' ); // text for a search results page
		$text['tag']      = __( 'Posts tagged %s', 'responsive' ); // text for a tag page
		$text['author']   = __( 'View all posts by %s', 'responsive' ); // text for an author page
		$text['404']      = __( 'Error 404', 'responsive' ); // text for the 404 page

		$show['current'] = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$show['home']    = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

		$delimiter = ' <span class="chevron">&#8250;</span> '; // delimiter between crumbs
		$before    = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after     = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		$home_link   = home_url( '/' );
		$before_link = '<span class="breadcrumb" typeof="v:Breadcrumb">';
		$after_link  = '</span>';
		$link_att    = ' rel="v:url" property="v:title"';
		$link        = $before_link . '<a' . $link_att . ' href="%1$s">%2$s</a>' . $after_link;

		$post      = get_queried_object();
		$parent_id = isset( $post->post_parent ) ? $post->post_parent : '';

		$html_output = '';

		if ( is_front_page() ) {
			if ( 1 == $show['home'] ) {
				$html_output .= '<div class="breadcrumb-list"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
			}

		} else {
			$html_output .= '<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf( $link, $home_link, $text['home'] ) . $delimiter;

			if ( is_home() ) {
				if ( 1 == $show['current'] ) {
					$html_output .= $before . get_the_title( get_option( 'page_for_posts', true ) ) . $after;
				}

			} elseif ( is_category() ) {
				$this_cat = get_category( get_query_var( 'cat' ), false );
				if ( 0 != $this_cat->parent ) {
					$cats = get_category_parents( $this_cat->parent, true, $delimiter );
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
				}
				$html_output .= $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;

			} elseif ( is_search() ) {
				$html_output .= $before . sprintf( $text['search'], get_search_query() ) . $after;

			} elseif ( is_day() ) {
				$html_output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				$html_output .= sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
				$html_output .= $before . get_the_time( 'd' ) . $after;

			} elseif ( is_month() ) {
				$html_output .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				$html_output .= $before . get_the_time( 'F' ) . $after;

			} elseif ( is_year() ) {
				$html_output .= $before . get_the_time( 'Y' ) . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( 'post' != get_post_type() ) {
					$post_type    = get_post_type_object( get_post_type() );
					$archive_link = get_post_type_archive_link( $post_type->name );
					$html_output .= sprintf( $link, $archive_link, $post_type->labels->singular_name );
					if ( 1 == $show['current'] ) {
						$html_output .= $delimiter . $before . get_the_title() . $after;
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, $delimiter );
					if ( 0 == $show['current'] ) {
						$cats = preg_replace( "#^(.+)$delimiter$#", "$1", $cats );
					}
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
					if ( 1 == $show['current'] ) {
						$html_output .= $before . get_the_title() . $after;
					}
				}

			} elseif ( !is_single() && !is_page() && !is_404() && 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$html_output .= $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post( $parent_id );
				$cat    = get_the_category( $parent->ID );

				if ( isset( $cat[0] ) ) {
					$cat = $cat[0];
				}

				if ( $cat ) {
					$cats = get_category_parents( $cat, true, $delimiter );
					$cats = str_replace( '<a', $before_link . '<a' . $link_att, $cats );
					$cats = str_replace( '</a>', '</a>' . $after_link, $cats );
					$html_output .= $cats;
				}

				$html_output .= sprintf( $link, get_permalink( $parent ), $parent->post_title );
				if ( 1 == $show['current'] ) {
					$html_output .= $delimiter . $before . get_the_title() . $after;
				}

			} elseif ( is_page() && !$parent_id ) {
				if ( 1 == $show['current'] ) {
					$html_output .= $before . get_the_title() . $after;
				}

			} elseif ( is_page() && $parent_id ) {
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page_child    = get_post( $parent_id );
					$breadcrumbs[] = sprintf( $link, get_permalink( $page_child->ID ), get_the_title( $page_child->ID ) );
					$parent_id     = $page_child->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					$html_output .= $breadcrumbs[$i];
					if ( $i != count( $breadcrumbs ) - 1 ) {
						$html_output .= $delimiter;
					}
				}
				if ( 1 == $show['current'] ) {
					$html_output .= $delimiter . $before . get_the_title() . $after;
				}

			} elseif ( is_tag() ) {
				$html_output .= $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;

			} elseif ( is_author() ) {
				$user_id  = get_query_var( 'author' );
				$userdata = get_the_author_meta( 'display_name', $user_id );
				$html_output .= $before . sprintf( $text['author'], $userdata ) . $after;

			} elseif ( is_404() ) {
				$html_output .= $before . $text['404'] . $after;

			}

			if ( get_query_var( 'paged' ) || get_query_var( 'page' ) ) {
				$page_num = get_query_var( 'page' ) ? get_query_var( 'page' ) : get_query_var( 'paged' );
				$html_output .= $delimiter . sprintf( __( 'Page %s', 'responsive' ), $page_num );

			}

			$html_output .= '</div>';

		}

		echo $html_output;

	} // end responsive_breadcrumb_lists

}

/**
 * Use shortcode_atts_gallery filter to add new defaults to the WordPress gallery shortcode.
 * Allows user input in the post gallery shortcode.
 *
 */
function responsive_gallery_atts( $out, $pairs, $atts ) {

	$full_width = is_page_template( 'full-width-page.php' ) || is_page_template( 'landing-page.php' );

	// Check if the size attribute has been set, if so use it and skip the responsive sizes
	if ( array_key_exists( 'size', $atts ) ) {
		$size = $atts['size'];
	} else {

		if ( $full_width ) {
			switch ( $out['columns'] ) {
				case 1:
					$size = 'responsive-900'; //900
					break;
				case 2:
					$size = 'responsive-450'; //450
					break;
				case 3:
					$size = 'responsive-300'; //300
					break;
				case 4:
					$size = 'responsive-200'; //225
					break;
				case 5:
					$size = 'responsive-200'; //180
					break;
				case 6:
					$size = 'responsive-150'; //150
					break;
				case 7:
					$size = 'responsive-150'; //125
					break;
				case 8:
					$size = 'responsive-150'; //112
					break;
				case 9:
					$size = 'responsive-100'; //100
					break;
			}
		} else {
			switch ( $out['columns'] ) {
				case 1:
					$size = 'responsive-600'; //600
					break;
				case 2:
					$size = 'responsive-300'; //300
					break;
				case 3:
					$size = 'responsive-200'; //200
					break;
				case 4:
					$size = 'responsive-150'; //150
					break;
				case 5:
					$size = 'responsive-150'; //120
					break;
				case 6:
					$size = 'responsive-100'; //100
					break;
				case 7:
					$size = 'responsive-100'; //85
					break;
				case 8:
					$size = 'responsive-100'; //75
					break;
				case 9:
					$size = 'responsive-100'; //66
					break;
			}
		}

	}

	$atts = shortcode_atts(
		array(
			'size' => $size,
		),
		$atts
	);

	$out['size'] = $atts['size'];

	return $out;

}

add_filter( 'shortcode_atts_gallery', 'responsive_gallery_atts', 10, 3 );

/*
 * Create image sizes for the galley
 */
function responsive_add_image_size() {
	add_image_size( 'responsive-100', 100, 9999 );
	add_image_size( 'responsive-150', 150, 9999 );
	add_image_size( 'responsive-200', 200, 9999 );
	add_image_size( 'responsive-300', 300, 9999 );
	add_image_size( 'responsive-450', 450, 9999 );
	add_image_size( 'responsive-600', 600, 9999 );
	add_image_size( 'responsive-900', 900, 9999 );
}
add_action( 'after_setup_theme', 'responsive_add_image_size' );
/*
 * Get social icons.
 *
 * @since    1.9.4.9
 */
function responsive_get_social_icons() {

	$responsive_options = responsive_get_options();

	$sites = array (
		'twitter'     => __( 'Twitter', 'responsive' ),
		'facebook'    => __( 'Facebook', 'responsive' ),
		'linkedin'    => __( 'LinkedIn', 'responsive' ),
		'youtube'     => __( 'YouTube', 'responsive' ),
		'stumbleupon' => __( 'StumbleUpon', 'responsive' ),
		'rss'         => __( 'RSS Feed', 'responsive' ),
		'googleplus'  => __( 'Google+', 'responsive' ),
		'instagram'   => __( 'Instagram', 'responsive' ),
		'pinterest'   => __( 'Pinterest', 'responsive' ),
		'yelp'        => __( 'Yelp!', 'responsive' ),
		'vimeo'       => __( 'Vimeo', 'responsive' ),
		'foursquare'  => __( 'foursquare', 'responsive' ),
		'email' => __( 'Email', 'responsive' ),
	);

	$html = '<ul class="social-icons">';
	foreach( $sites as $key => $value ) {
		if ( !empty( $responsive_options[$key . '_uid'] ) ) {
			if ($key == 'email') {
				$html .= '<li class="' . esc_attr( $key ) . '-icon"><a href="mailto:' . $responsive_options[$key . '_uid'] . '">' . '<img src="' . responsive_child_uri( '/core/icons/' . esc_attr( $key ) . '-icon.png' ) . '" width="24" height="24" alt="' . esc_html( $value ) . '">' . '</a></li>';
			}
			else{
				$html .= '<li class="' . esc_attr( $key ) . '-icon"><a href="' . $responsive_options[$key . '_uid'] . '">' . '<img src="' . responsive_child_uri( '/core/icons/' . esc_attr( $key ) . '-icon.png' ) . '" width="24" height="24" alt="' . esc_html( $value ) . '">' . '</a></li>';
			}
		}
	}
	$html .= '</ul><!-- .social-icons -->';

	$html = apply_filters( 'responsive_social_skin' , $html );

	return $html;

}
function responsive_get_social_icons_new() {
	$responsive_options = responsive_get_options();
?>
	<ul class="social-icons">
<?php 	
	if ( !empty( $responsive_options['facebook_uid'] ) ){?><li><a href="<?php echo $responsive_options['facebook_uid'];?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php }?>						<?php if ( !empty( $responsive_options['twitter_uid'] ) ){?><li><a href="<?php echo $responsive_options['twitter_uid'];?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['rss_uid'] ) ){?><li><a href="<?php echo $responsive_options['rss_uid'];?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['google_plus_uid'] ) ){?><li><a href="<?php echo $responsive_options['google_plus_uid'];?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['linkedin_uid'] ) ){?><li><a href="<?php echo $responsive_options['linkedin_uid'];?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['youtube_uid'] ) ){?><li><a href="<?php echo $responsive_options['youtube_uid'];?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['stumble_uid'] ) ){?><li><a href=""<?php echo $responsive_options['stumble_uid'];?>" target="_blank"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['instagram_uid'] ) ){?><li><a href="<?php echo $responsive_options['instagram_uid'];?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['pinterest_uid'] ) ){?><li><a href="<?php echo $responsive_options['pinterest_uid'];?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['yelp_uid'] ) ){?><li><a href="<?php echo $responsive_options['yelp_uid'];?>" target="_blank"><i class="fa fa-yelp" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['vimeo_uid'] ) ){?><li><a href="<?php echo $responsive_options['vimeo_uid'];?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['foursquare_uid'] ) ){?><li><a href="<?php echo $responsive_options['foursquare_uid'];?>" target="_blank"><i class="fa fa-foursquare" aria-hidden="true"></i></a></li><?php }?>
				<?php if ( !empty( $responsive_options['email_uid'] ) ){?><li><a href="mailto:<?php echo $responsive_options['email_uid'];?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li><?php }?>
		
	</ul>
<?php 
}
