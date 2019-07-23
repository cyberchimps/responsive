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
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'responsivepro-plugin/index.php' ) ) {
		responsivepro_plugin_posted_on();
		responsivepro_plugin_posted_by();
		responsivepro_plugin_comments_link();
	} else {
		responsive_post_meta_data();
		?>

		<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
			<?php comments_popup_link( __( 'No Comments &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
		</span>
			<?php
	endif;
	}
	?>
</div><!-- end of .post-meta -->

<?php do_action( 'responsive_after_blog_entry_meta' ); ?>
