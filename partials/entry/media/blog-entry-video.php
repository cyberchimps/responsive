<?php
/**
 * Blog entry video format media
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Get post video.
$video = responsive_get_post_video_html(); ?>

<?php
// Display video if one exists and it's not a password protected post.
if ( $video && ! post_password_required() ) :
	?>

	<div class="blog-entry-media thumbnail clr">

		<div class="blog-entry-video">

			<?php echo wp_kses_post( $video ); ?>

		</div><!-- .blog-entry-video -->

	</div><!-- .blog-entry-media -->

	<?php
	// Else display post thumbnail.
else :
	?>

	<?php get_template_part( 'partials/entry/media/blog-entry' ); ?>

<?php endif; ?>
