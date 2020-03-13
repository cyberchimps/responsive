<?php
/**
 * Post Meta-Data Template-Part File for Blog 3 Column
 *
 * @file           post-meta-3-col.php
 * @package        Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( is_single() ) : ?>
	<h1 class="entry-title post-title" itemprop="headline"><?php the_title(); ?></h1>
<?php else : ?>
	<h2 class="entry-title post-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php endif; ?>

<div class="post-meta">
	<?php
		responsive_post_meta_data();
		if ( comments_open() ) :
			?>
			<span class="entry-comment">
				<span class="comments-link" style="display:block">
					<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
				</span>
			</span>
			<?php
		endif;

	?>
</div><!-- end of .post-meta -->
