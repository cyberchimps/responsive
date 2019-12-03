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
	$title          = get_the_title();
	$page_alignment = get_theme_mod( 'page_title_alignment_options', 'default' );
if ( ! empty( $title ) ) {
	?>
	<h1 class="entry-title post-title <?php echo esc_attr( $page_alignment ); ?>" itemprop="headline"><?php the_title(); ?></h1>
<?php } ?>

<?php do_action( 'responsive_after_blog_entry_title' ); ?>
