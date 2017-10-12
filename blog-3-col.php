<?php


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
 Template Name: Blog 3 Column
 *
 * @file           blog-3-col.php
 * @package        Responsive
 
 */

get_header();

global $more;
$more = 0;
?>
<div id="content-outer">
<div id="content-full" class="grid col-940">

	<?php get_template_part( 'loop-header', get_post_type() ); ?>

	<?php
	global $wp_query, $paged;
	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}
	$blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
	$temp_query = $wp_query;
	$wp_query = null;
	$wp_query = $blog_query;

	if ( $blog_query->have_posts() ) :
	
	?>
	<div class="blog_main_div">
	<?php 

		while( $blog_query->have_posts() ) : $blog_query->the_post();
			?>
	<div class="section-blog grid">

		<?php responsive_entry_before(); ?>
		
		<div class="post-entry">
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>
				
			</div><!-- end of .post-entry -->
			
			<?php responsive_entry_top(); ?>
					
			<?php get_template_part( 'post-meta-3-col', get_post_type() ); ?>
			<?php get_template_part( 'post-data', get_post_type() ); ?>			
			
			<?php the_excerpt( __( 'Read more &#8250;', 'responsive' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>
			</div>

		<?php
		endwhile;

		if ( $wp_query->max_num_pages > 1 ) :
			?>
			<div class="navigation">
				<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ), $wp_query->max_num_pages ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ), $wp_query->max_num_pages ); ?></div>
			</div><!-- end of .navigation -->
		<?php
		endif;

	else :

		get_template_part( 'loop-no-posts' );
?>
</div>
<?php 	
	endif;
	$wp_query = $temp_query;
	wp_reset_postdata();
	?>

</div>
</div>

<?php get_footer(); ?>
