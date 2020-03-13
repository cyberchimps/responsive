<?php
/**
 * Blog single link format media
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

// Image args.
$img_args = array(
	'alt' => get_the_title(),
);
if ( responsive_get_schema_markup( 'image' ) ) {
	$img_args['itemprop'] = 'image';
}

// Caption.
$caption = get_the_post_thumbnail_caption(); ?>

<div class="thumbnail">

	<?php
	// Display post thumbnail.
	the_post_thumbnail( 'full', $img_args );

	// Caption.
	if ( $caption ) {
		?>
		<div class="thumbnail-caption">
			<?php echo esc_html( $caption ); ?>
		</div>
		<?php
	}
	?>

	<div class="link-entry clr">

		<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'responsive_link_format', true ) ); ?>" target="_<?php echo esc_attr( get_post_meta( get_the_ID(), 'responsive_link_format_target', true ) ); ?>"><i class="icon-link"></i></a>

	</div>

</div>
