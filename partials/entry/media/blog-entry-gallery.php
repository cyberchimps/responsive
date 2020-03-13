<?php
/**
 * Blog entry gallery format media
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Get attachments.
$attachments = responsive_get_gallery_ids( get_the_ID() );

// Return standard entry style if password protected or there aren't any attachments.
if ( post_password_required() || empty( $attachments ) ) {
	get_template_part( 'partials/entry/media/blog-entry' );
	return;
}

// Add images size if blog grid.
if ( 'grid-entry' == responsive_blog_entry_style() ) {
	$size = responsive_blog_entry_images_size();
} else {
	$size = 'full';
} ?>

<div class="thumbnail">

	<div class="gallery-format clr">

		<?php
		// Loop through each attachment ID.
		foreach ( $attachments as $attachment ) :

			// Get attachment data.
			$attachment_title = get_the_title( $attachment );
			$attachment_alt   = get_post_meta( $attachment, '_wp_attachment_image_alt', true );
			$attachment_alt   = $attachment_alt ? $attachment_alt : $attachment_title;

			// Image width.
			$img_width  = apply_filters( 'responsive_blog_entry_image_width', absint( get_theme_mod( 'responsive_blog_entry_image_width' ) ) );
			$img_height = apply_filters( 'responsive_blog_entry_image_height', absint( get_theme_mod( 'responsive_blog_entry_image_height' ) ) );

			// Images url.
			$img_url = wp_get_attachment_image_src( $attachment, 'full', true );

				// Image args.
				$img_args = array(
					'alt' => $attachment_alt,
				);
				if ( responsive_schema_markup( 'image' ) ) {
					$img_args['itemprop'] = 'image';
				}

				// Get image output.
				$attachment_html = wp_get_attachment_image( $attachment, $size, '', $img_args );


				// Display with lightbox.
				if ( responsive_gallery_is_lightbox_enabled() == 'on' ) {
					?>

				<a href="<?php echo esc_url( wp_get_attachment_url( $attachment ) ); ?>" aria-label="<?php echo esc_attr( $attachment_alt ); ?>" title="<?php echo esc_attr( $attachment_alt ); ?>" class="gallery-lightbox">
						<?php echo wp_kses_post( $attachment_html ); ?>
				</a>

					<?php
					// Display single image.
				} else {
					?>

				<a href="<?php the_permalink(); ?>" class="thumbnail-link">
						<?php echo wp_kses_post( $attachment_html ); ?>
				</a>

					<?php
				}

		endforeach;
		?>

	</div>

</div>
