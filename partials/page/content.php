<?php
/**
 * Displays post entry content
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php do_action( 'responsive_before_blog_entry_content' ); ?>

<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

<?php
do_action( 'responsive_after_blog_entry_content' );
