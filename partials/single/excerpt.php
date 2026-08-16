<?php
/**
 * Post single excerpt
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Nothing to show if there's no excerpt or the post is password protected.
if ( post_password_required() || '' === get_the_excerpt() ) {
	return;
}

do_action( 'responsive_before_single_post_excerpt' );
?>

<div class="entry-content entry-excerpt" itemprop="text">
	<?php the_excerpt(); ?>
</div><!-- .entry-excerpt -->

<?php do_action( 'responsive_after_single_post_excerpt' ); ?>