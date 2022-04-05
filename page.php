<?php
/**
 * Pages Template
 *
 * @file           page.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
Responsive\responsive_wrapper_top(); // before wrapper content hook.
// Elementor `single` location.
if ( ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) && ! ( function_exists( 'rea_theme_template_render_at_location' ) && rea_theme_template_render_at_location( 'single' ) ) ) {
	Responsive\responsive_wrapper();

	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/page/layout', get_post_type() );
		comments_template();
	endwhile;

	get_template_part( 'loop-nav', get_post_type() );

	?>
		</main><!-- end of #primary -->

	<?php
	get_sidebar();
	Responsive\responsive_wrapper_close();
}
	Responsive\responsive_wrapper_end(); // after wrapper hook.
	get_footer();
?>
