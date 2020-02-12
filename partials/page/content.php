<?php
/**
 * Displays post entry content
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php do_action( 'responsive_before_blog_entry_content' ); ?>
	<div class="entry-content" itemprop="text">
		<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
	</div>
<?php
do_action( 'responsive_after_blog_entry_content' );
