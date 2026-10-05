<?php
/**
 * Page single excerpt
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="entry-excerpt">
	<?php 
	$page_post = get_post();
	if ( has_excerpt() && ! empty( $page_post->post_excerpt ) ) {
		echo wp_kses_post( wpautop( $page_post->post_excerpt ) );
	} else {
		echo wp_kses_post( wpautop( wp_trim_words( get_the_content(), 40, ' [&hellip;]' ) ) );
	}
	?>
</div>
