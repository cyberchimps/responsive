<?php
/**
 * Gutenberg Fullwidth Template
 *
 * Template Name: Gutenberg Fullwidth No title
 *
 * @file           landing-page.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/landing-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

Responsive\responsive_wrapper_top(); // before wrapper content hook.
?>

<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php Responsive\responsive_in_wrapper(); // wrapper hook. ?>
			<main id="primary" class="content-area col-940" role="main">

				<?php if ( have_posts() ) : ?>

					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<?php Responsive\responsive_entry_before(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php Responsive\responsive_entry_top(); ?>
							<div class="post-entry">
								<?php
								responsive_page_featured_image();
								the_content( __( 'Read more &#8250;', 'responsive' ) );
								wp_link_pages(
									array(
										'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
										'after'  => '</div>',
									)
								);
								?>
							</div><!-- end of .post-entry -->

							<?php
								edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) );
								Responsive\responsive_entry_bottom();
							?>
						</div><!-- end of #post-<?php the_ID(); ?> -->
						<?php
						Responsive\responsive_entry_after();
					endwhile;

					get_template_part( 'loop-nav', get_post_type() );

					else :

						get_template_part( 'loop-no-posts', get_post_type() );

				endif;
					?>

			</main><!-- end of #content-full -->
		</div>
	</div>
	<?php Responsive\responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php
Responsive\responsive_wrapper_end(); // after wrapper hook.
get_footer();
?>
