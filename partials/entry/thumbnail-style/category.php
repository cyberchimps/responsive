<?php
/**
 * Category for the thumbnail style.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get positioning elements.
$elements = responsive_blog_entry_elements_positioning();

// Return if categories element is not enabled in Post Elements settings.
if ( ! in_array( 'categories', $elements, true ) ) {
	return;
}

if ( 'post' == get_post_type() ) { ?>

	<div class="blog-entry-category clr">
		<?php the_category( ' / ', get_the_ID() ); ?>
	</div>

<?php } ?>
