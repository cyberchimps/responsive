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
if ( 'excerpt' === $responsive_show_excerpt ) {
	the_excerpt();
} else {
	the_content();
}
?>

<?php
do_action( 'responsive_after_blog_entry_content' );
