<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loop Header Template-Part File
 *
 * @file           loop-header.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/loop-header.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * Display breadcrumb
 */
get_responsive_breadcrumb_lists();

/**
 * Display archive information
 */
if ( is_category() || is_tag() || is_author() || is_date() ) {
	
	// Replaced old code using new WP core functions
	the_archive_title( '<h6 class="title-archive">', '</h6>' ); 
	the_archive_description( '<div class="taxonomy-description">', '</div>' );
}

/**
 * Display Search information
 */

if ( is_search() ) {
	?>
	<h6 class="title-search-results"><?php printf( __( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' ); ?></h6>
<?php
}
