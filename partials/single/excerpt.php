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

// Nothing to show if the post is password protected.
if ( post_password_required() ) {
	return;
}

do_action( 'responsive_before_single_post_excerpt' );
?>

<div class="entry-content entry-excerpt" itemprop="text">
	<?php 
	$single_post = get_post();
	if ( has_excerpt() && ! empty( $single_post->post_excerpt ) ) {
		echo wp_kses_post( wpautop( $single_post->post_excerpt ) );
	} else {
		$content = get_the_content();
		if ( ! empty( $content ) ) {
			echo wp_kses_post( wpautop( wp_trim_words( $content, 40, ' [&hellip;]' ) ) );
		}
	}
	?>
</div><!-- .entry-excerpt -->

<?php do_action( 'responsive_after_single_post_excerpt' ); ?>