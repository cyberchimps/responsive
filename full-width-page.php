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
 * Full Content Template
 *
 * Template Name:  Full Width Page (no sidebar)
 *
 * @file           full-width-page.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header();

Responsive\responsive_wrapper_top(); // before wrapper content hook. ?>

<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php Responsive\responsive_in_wrapper(); // wrapper hook. ?>
			<main id="primary" class="content-area col-940">
			<?php
			get_template_part( 'loop-header', get_post_type() );

			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					Responsive\responsive_entry_before();
					get_template_part( 'partials/page/layout', get_post_type() );
					Responsive\responsive_entry_after();
					Responsive\responsive_comments_before();
					comments_template( '', true );
					Responsive\responsive_comments_after();
				endwhile;
				get_template_part( 'loop-nav', get_post_type() );

				else :
						// Elementor `404` location.
					if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
						get_template_part( 'loop-no-posts', get_post_type() );
					}

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
