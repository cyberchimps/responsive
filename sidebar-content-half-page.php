<?php
/**
 * Sidebar/Content Half Template
 *
 * Template Name:  Sidebar/Content Half Page (Deprecated)
 *
 * @file           sidebar-content-half-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-content-half-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook. ?>
<div id="wrapper" class="clearfix">
	<div class="content-outer">
<?php responsive_in_wrapper(); // wrapper hook. ?>
<div id="primary" class="grid-right col-460 fit" role="main">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

				<?php responsive_breadcrumb_lists(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<h1 class="post-title"><?php the_title(); ?></h1>

				<?php if ( comments_open() ) : ?>
					<div class="post-meta">
						<?php responsive_post_meta_data(); ?>

						<?php if ( comments_open() ) : ?>
							<span class="comments-link">
						<span class="mdash"><i class="fa fa-comments-o" aria-hidden="true"></i></span>
								<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
						</span>
						<?php endif; ?>
					</div><!-- end of .post-meta -->
				<?php endif; ?>

				<div class="post-entry">
					<?php responsive_page_featured_image(); ?>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
				<!-- end of .post-entry -->

				<?php if ( comments_open() ) : ?>
					<div class="post-data">
						<?php the_tags( __( 'Tagged with:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
						<?php the_category( __( 'Posted in %s', 'responsive' ) . ', ' ); ?>
					</div><!-- end of .post-data -->
				<?php endif; ?>

				<?php edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

			<?php
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

		else :

			get_template_part( 'loop-no-posts', get_post_type() );

	endif;
		?>

</div><!-- end of #content -->

<?php get_sidebar( 'main-sidebar' ); ?>
</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
