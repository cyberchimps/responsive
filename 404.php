<?php
/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Error 404 Template
 *
 * @file           404.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/404.php
 * @link           http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since          available since Release 1.0
 */

get_header();

Responsive\responsive_wrapper_top(); // before wrapper content hook.
// Elementor `404` location.
if ( ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) && ! ( function_exists( 'rea_theme_template_render_at_location' ) && rea_theme_template_render_at_location( 'single' ) ) ) {
	?>
<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php Responsive\responsive_in_wrapper(); // wrapper hook. ?>
			<main id="primary" class="content-area grid col-940" <?php responsive_schema_markup( 'main' ); ?> role="main">
				<?php get_template_part( 'loop-header', get_post_type() ); ?>
				<?php Responsive\responsive_entry_before(); ?>
				<section id="post-0" class="error404 hentry">
					<?php Responsive\responsive_entry_top(); ?>

					<div class="post-entry">
							<?php get_template_part( 'loop-no-posts', get_post_type() ); ?>
					</div><!-- end of .post-entry -->

					<?php Responsive\responsive_entry_bottom(); ?>
				</section><!-- end of #post-0 -->
				<?php Responsive\responsive_entry_after(); ?>

			</main><!-- end of #content-full -->
			<?php get_sidebar(); ?>
		</div>
		<?php Responsive\responsive_wrapper_bottom(); // after wrapper content hook. ?>
	</div> <!-- row -->
</div> <!-- end of #wrapper -->
	<?php
}
Responsive\responsive_wrapper_end(); // after wrapper hook.
get_footer();
?>
