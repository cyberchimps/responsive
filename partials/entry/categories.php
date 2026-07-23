<?php
/**
 * Displays the post entry categories
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
?>

<div class="post-meta entry-meta">
	<span class="entry-category">
		<span class='posted-in'>
			<?php
			/* translators: %s: category list */
			echo wp_kses_post( get_the_category_list( __( ', ', 'responsive' ) ) );
			?>
		</span>
	</span>
</div>
