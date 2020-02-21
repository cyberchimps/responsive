<?php
/**
 * Single Posts Template
 *
 * @file           single.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook.
// Elementor `single` location.
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
?>
<div id="wrapper" class="site-content clearfix">

	<div class="content-outer container">
		<div class="row">
			<?php responsive_in_wrapper(); // wrapper hook. ?>

			<main id="primary" class="content-area <?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>" role="main">

				<?php get_template_part( 'loop-header', get_post_type() ); ?>
				<?php if ( have_posts() ) : ?>

						<?php
						while ( have_posts() ) :
							the_post();
							?>

							<?php responsive_entry_before(); ?>
							<?php
							get_template_part( 'partials/single/layout', get_post_type() );
							?>
							<?php responsive_entry_after(); ?>

							<?php responsive_comments_before(); ?>
							<?php comments_template( '', true ); ?>
							<?php responsive_comments_after(); ?>

							<?php
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

			</main><!-- end of #primary -->

			<?php get_sidebar(); ?>
		</div>
	</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php }
responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
