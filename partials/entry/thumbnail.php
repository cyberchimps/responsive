<?php
/**
 * Template to get thumbnail
 */
?>
<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail(); ?>
	</a>
<?php endif; ?>
