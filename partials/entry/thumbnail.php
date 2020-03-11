<?php
/**
 * Template to get thumbnail
 *
 * @package Responsive WordPress theme
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail(); ?>
	</a>
<?php endif; ?>
