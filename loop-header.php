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
	?>
	<h6 class="title-archive">
		<?php
		if ( is_day() ) :
			printf( __( 'Daily Archives: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			printf( __( 'Monthly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) :
			printf( __( 'Yearly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		else :
			_e( 'Blog Archives', 'responsive' );
		endif;
		?>
	</h6>
	<?php
		// Show an optional term description.
		$term_description = term_description();
		if ( ! empty( $term_description ) ) {
			printf( '<div class="taxonomy-description">%s</div>', $term_description );
		}
}

/**
 * Display Search information
 */

if ( is_search() ) {
	?>
	<h6 class="title-search-results"><?php printf( __( 'Search results for: %s', 'responsive' ), '<span>' . get_search_query() . '</span>' ); ?></h6>
<?php
}