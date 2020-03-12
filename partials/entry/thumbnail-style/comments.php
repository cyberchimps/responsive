<?php
/**
 * The default template for displaying post meta.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'post' == get_post_type() ) { ?>

	<div class="blog-entry-comments clr">
		<i class="icon-bubble"></i><?php comments_popup_link( esc_html__( '0 Comments', 'responsive' ), esc_html__( '1 Comment', 'responsive' ), esc_html__( '% Comments', 'responsive' ), 'comments-link' ); ?>
	</div>

<?php } ?>
