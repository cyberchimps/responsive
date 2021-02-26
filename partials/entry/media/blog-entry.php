<?php
/**
 * Displays the post entry thumbmnail
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if there isn't a thumbnail defined.
if ( ! has_post_thumbnail() ) {
	if ( class_exists( 'Responsive_Addons_Pro' ) && function_exists( 'responsive_date_box_toggle_value' ) ) {
		$date_box_toggle_value = responsive_date_box_toggle_value();
	} else {
		$date_box_toggle_value = 0;
	}
	// Display date box.
	if ( function_exists( 'responsive_display_date_box' ) ) {
		responsive_display_date_box( $date_box_toggle_value, has_post_thumbnail() );
	}
	return;
}

// Add images size if blog grid.
if ( 'grid-entry' == responsive_blog_entry_style() ) {
	$size = responsive_blog_entry_images_size();
} else {
	$size = 'full';
}

// Overlay class.
if ( is_customize_preview()
	&& false == get_theme_mod( 'responsive_blog_image_overlay', true ) ) {
	$class = 'no-overlay';
} else {
	$class = 'overlay';
}

// Image args.
$img_args = array(
	'alt' => get_the_title(),
);
if ( responsive_get_schema_markup( 'image' ) ) {
	$img_args['itemprop'] = 'thumbnailUrl';
}

// Caption.
$caption = get_the_post_thumbnail_caption(); ?>

<div class="thumbnail">

	<?php
	if ( class_exists( 'Responsive_Addons_Pro' ) && function_exists( 'responsive_date_box_toggle_value' ) ) {
		$date_box_toggle_value = responsive_date_box_toggle_value();
	} else {
		$date_box_toggle_value = 0;
	}
	// Display date box.
	if ( function_exists( 'responsive_display_date_box' ) ) {
		responsive_display_date_box( $date_box_toggle_value, has_post_thumbnail() );
	}
	?>

	<a href="<?php the_permalink(); ?>" class="thumbnail-link" <?php responsive_schema_markup( 'url' ); ?>>

		<?php
		// Image width.
		$img_width  = apply_filters( 'responsive_blog_entry_image_width', absint( get_theme_mod( 'responsive_blog_entry_image_width' ) ) );
		$img_height = apply_filters( 'responsive_blog_entry_image_height', absint( get_theme_mod( 'responsive_blog_entry_image_height' ) ) );

		// Images attr.
		$img_id  = get_post_thumbnail_id( get_the_ID(), 'full' );
		$img_url = wp_get_attachment_image_src( $img_id, 'full', true );

		// Display post thumbnail.
		the_post_thumbnail( $size, $img_args );


		// If overlay.
		if ( is_customize_preview()
			|| true == get_theme_mod( 'responsive_blog_image_overlay', true ) ) {
			?>
			<span class="<?php echo esc_attr( $class ); ?>"></span>
		<?php } ?>

	</a>

	<?php
	// Caption.
	if ( $caption ) {
		?>
		<div class="thumbnail-caption">
			<?php echo esc_attr( $caption ); ?>
		</div>
		<?php
	}
	?>

</div><!-- .thumbnail -->
