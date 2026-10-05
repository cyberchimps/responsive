<?php
/**
 * Displays the single post categories
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
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
