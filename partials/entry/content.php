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

<?php
global $responsive_show_excerpt;
if ( 'content' === $responsive_show_excerpt ) {
	the_content();
} else {
	the_excerpt();
}
?>

<?php
do_action( 'responsive_after_blog_entry_content' );
