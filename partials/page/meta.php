<?php
/**
 * The default template for displaying post meta.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get meta sections
$sections = responsive_blog_entry_meta();

// Return if sections are empty
if ( empty( $sections ) ) {
	return;
} ?>

<?php do_action( 'responsive_before_blog_entry_meta' ); ?>
<div class="post-meta">
	<?php
		responsive_post_meta_data();
		?>

		<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash"><i class="fa fa-comments-o" aria-hidden="true"></i></span>
			<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
		</span>
			<?php
	endif;
	?>
</div><!-- end of .post-meta -->

<?php do_action( 'responsive_after_blog_entry_meta' ); ?>
