<?php
/**
 * Displays the post single thumbmnail
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if there isn't a thumbnail defined.
if ( ! has_post_thumbnail() ) {
	return;
}

// Fetch Customizer Settings
$single_featured_image_size      = get_theme_mod( 'responsive_single_blog_featured_image_size', 'full' );
$single_featured_image_alignment = get_theme_mod( 'responsive_single_blog_featured_image_alignment', 'left' );
$single_featured_image_ratio     = get_theme_mod( 'responsive_single_blog_featured_image_ratio', 'original' );

$ratio_css = '';
if ( 'predefined' === $single_featured_image_ratio ) {
	$predefined_ratio = get_theme_mod( 'responsive_single_blog_featured_image_predefined_ratio', '1:1' );
	$ratio_value      = str_replace( ':', '/', $predefined_ratio );
	$ratio_css        = 'aspect-ratio: ' . esc_attr( $ratio_value ) . ';';
} elseif ( 'custom' === $single_featured_image_ratio ) {
	$custom_width  = get_theme_mod( 'responsive_single_blog_featured_image_custom_width', '' );
	$custom_height = get_theme_mod( 'responsive_single_blog_featured_image_custom_height', '' );
	if ( $custom_width && $custom_height ) {
		$ratio_css = 'aspect-ratio: ' . esc_attr( $custom_width ) . '/' . esc_attr( $custom_height ) . ';';
	}
}

// Image args.
$img_args = array(
	'alt' => get_the_title(),
);
if ( responsive_get_schema_markup( 'image' ) ) {
	$img_args['itemprop'] = 'thumbnailUrl';
}

if ( $ratio_css ) {
	$img_args['style'] = $ratio_css . ' object-fit: cover;';
}

// Caption.
$caption = get_the_post_thumbnail_caption(); ?>

<div class="thumbnail" style="text-align: <?php echo esc_attr( $single_featured_image_alignment ); ?>;">

	<?php
	// Display post thumbnail.
	the_post_thumbnail( $single_featured_image_size, $img_args );

	// Caption.
	if ( $caption ) {
		?>
		<div class="thumbnail-caption">
			<?php echo esc_html( $caption ); ?>
		</div>
		<?php
	}
	?>

</div><!-- .thumbnail -->
