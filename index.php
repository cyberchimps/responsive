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

Responsive\responsive_wrapper_top(); // before wrapper content hook.

// Elementor `archive` location.
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {
	Responsive\responsive_wrapper();

	if ( have_posts() ) {

		while ( have_posts() ) :
			the_post();
			get_template_part( 'partials/entry/layout', get_post_type() );
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

	} else {
		// Elementor `404` location.
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
			get_template_part( 'partials/page/layout', get_post_type() );
		}
	}

	?>
	</main><!-- end of #primary -->

	<?php
	get_sidebar();
	Responsive\responsive_wrapper_close();
}
	Responsive\responsive_wrapper_end(); // after wrapper hook.
	get_footer();
?>
