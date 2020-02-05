<?php
/**
 * Blog single audio format media
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get audio html.
$audio = responsive_get_post_audio_html();

// Display audio if audio exists and the post isn't protected.
if ( $audio && ! post_password_required() ) : ?>

	<div id="post-media" class="thumbnail clr">
		<div class="blog-post-audio clr"><?php echo wp_kses_post( $audio ); ?></div>
	</div>

	<?php
	// Else display post thumbnail.
else :
	?>

	<?php get_template_part( 'partials/single/media/blog-single' ); ?>

<?php endif; ?>
