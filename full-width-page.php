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

get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook. ?>
<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php responsive_in_wrapper(); // wrapper hook. ?>
			<main id="primary" class="content-area col-940" role="main">
			<?php get_template_part( 'loop-header', get_post_type() ); ?>

			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php responsive_entry_before(); ?>
						<?php get_template_part( 'partials/page/layout', get_post_type() ); ?>
					<?php responsive_entry_after(); ?>

					<?php responsive_comments_before(); ?>
					<?php comments_template( '', true ); ?>
					<?php responsive_comments_after(); ?>

					<?php

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
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
