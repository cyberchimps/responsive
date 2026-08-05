<?php
/**
 * Template to get thumbnail
 *
 * @package responsive
 */

?>
<?php
$page_featured_image_size      = get_theme_mod( 'responsive_page_featured_image_size', 'full' );
$page_featured_image_alignment = get_theme_mod( 'responsive_page_featured_image_alignment', 'left' );
if ( has_post_thumbnail() ) : ?>
	<div class="thumbnail" style="text-align: <?php echo esc_attr( $page_featured_image_alignment ); ?>;">
		<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" <?php responsive_schema_markup( 'url' ); ?>>
			<?php the_post_thumbnail( $page_featured_image_size ); ?>
		</a>
	</div>
<?php endif; ?>
