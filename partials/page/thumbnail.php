<?php
/**
 * Template to get thumbnail
 *
 * @package responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_featured_image_size      = get_theme_mod( 'responsive_page_featured_image_size', 'full' );
$page_featured_image_alignment = get_theme_mod( 'responsive_page_featured_image_alignment', 'left' );
$page_featured_image_ratio     = get_theme_mod( 'responsive_page_featured_image_ratio', 'original' );

$ratio_css = '';
if ( 'predefined' === $page_featured_image_ratio ) {
	$predefined_ratio = get_theme_mod( 'responsive_page_featured_image_predefined_ratio', '1:1' );
	$ratio_value      = str_replace( ':', '/', $predefined_ratio );
	$ratio_css        = 'aspect-ratio: ' . esc_attr( $ratio_value ) . ';';
} elseif ( 'custom' === $page_featured_image_ratio ) {
	$custom_width  = get_theme_mod( 'responsive_page_featured_image_custom_width', '' );
	$custom_height = get_theme_mod( 'responsive_page_featured_image_custom_height', '' );
	if ( $custom_width && $custom_height ) {
		$ratio_css = 'aspect-ratio: ' . esc_attr( $custom_width ) . '/' . esc_attr( $custom_height ) . ';';
	}
}

// Image args.
$img_args = array();
if ( responsive_get_schema_markup( 'image' ) ) {
	$img_args['itemprop'] = 'thumbnailUrl';
}

if ( $ratio_css ) {
	$img_args['style'] = $ratio_css . ' object-fit: cover;';
}

if ( has_post_thumbnail() ) : ?>
	<div class="thumbnail" style="text-align: <?php echo esc_attr( $page_featured_image_alignment ); ?>;">
		<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" <?php responsive_schema_markup( 'url' ); ?>>
			<?php the_post_thumbnail( $page_featured_image_size, $img_args ); ?>
		</a>
	</div>
<?php endif; ?>
