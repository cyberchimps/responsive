<?php
/**
 * Template to get thumbnail
 *
 * @package responsive
 */

?>
<div class="thumbnail">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" <?php responsive_schema_markup( 'url' ); ?>>
			<?php the_post_thumbnail(); ?>
		</a>
	<?php endif; ?>
</div>
