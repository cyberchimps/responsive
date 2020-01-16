<?php
/**
 * Displays the post entry header
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php do_action( 'responsive_before_blog_entry_title' ); ?>
<?php
	$page_title = get_the_title();
if ( ! empty( $page_title ) ) {
	?>
	<h1 class="entry-title post-title" itemprop="headline"><?php the_title(); ?></h1>
<?php } ?>
<?php do_action( 'responsive_after_blog_entry_title' ); ?>
