<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */


get_header(); ?>
<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
<div id="content-outer">
<div id="content-archive" class="<?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'loop-header', get_post_type() ); ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta', get_post_type() ); ?>

				<div class="post-entry">
					<?php if( is_plugin_active('responsivepro-plugin/index.php')){  
							if (responsivepro_plugin_get_option ('archive_featured_images')) 
								responsivepro_plugin_featured_image();
					?>
					<?php } else {  ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
						</a>
					<?php endif; ?>
					<?php } ?>
					
					<?php if( is_plugin_active('responsivepro-plugin/index.php')){ 
							if( responsivepro_plugin_get_option( 'archive_post_excerpts' ) ) {
								add_filter( 'excerpt_more', 'responsive_pro_plugin_excerpt_more_text' );
								add_filter( 'excerpt_length', 'responsive_pro_plugin_excerpt_more_length' );
								the_excerpt();
								remove_filter( 'excerpt_more', 'responsive_pro_plugin_excerpt_more_text' );
								remove_filter( 'excerpt_length', 'responsive_pro_plugin_excerpt_more_length' );
						}
						else {
								the_content( __( 'Read more &#8250;', 'responsive' ) );
						}
					?>									
								
					<?php } else { ?>					
					<?php 		the_excerpt(); ?>
					<?php } ?>
					
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<?php get_template_part( 'post-data', get_post_type() ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

	else :

		get_template_part( 'loop-no-posts', get_post_type() );

	endif;
	?>

</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>