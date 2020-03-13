<?php
/**
 * Index Template
 *
 * @file           index.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/index.php
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */

/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
responsive_wrapper_top(); // before wrapper content hook.
// Elementor `archive` location.
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {
?>
<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php responsive_in_wrapper(); // wrapper hook. ?>

			<main id="primary" class="content-area grid col-620" role="main">

			<?php if ( have_posts() ) : ?>
				<?php
					while ( have_posts() ) :
						the_post();
						?>

						<?php responsive_entry_before(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php responsive_entry_top(); ?>

						<?php get_template_part( 'post-meta', get_post_type() ); ?>

						<div class="post-entry">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" <?php responsive_schema_markup( 'url' ); ?>>
									<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>
							<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
							<?php
							wp_link_pages(
								array(
									'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- end of .post-entry -->

							<?php get_template_part( 'post-data', get_post_type() ); ?>

							<?php responsive_entry_bottom(); ?>
					</div><!-- end of #post-

						<?php
						the_ID();
						responsive_entry_after();
						responsive_comments_before();
						comments_template( '', true );
						responsive_comments_after();

				endwhile;

					get_template_part( 'loop-nav', get_post_type() );

				?>

				<?php
				else :
					// Elementor `404` location.
					if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

						get_template_part( 'loop-no-posts', get_post_type() );
					}

				endif;
				?>

			</div><!-- end of #content -->

		<?php get_sidebar(); ?>
	</main><!-- end of #primary -->
	</div>
	<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
    <?php }
    responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
