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
get_header();

Responsive\responsive_wrapper_top(); // before wrapper content hook.
// Elementor `single` location.
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
	Responsive\responsive_wrapper();

	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/single/layout', get_post_type() );
		comments_template();
	endwhile;

	?>

			</main><!-- end of #primary -->

	<?php
	get_sidebar();
	Responsive\responsive_wrapper_close();
}
	Responsive\responsive_wrapper_end(); // after wrapper hook.
	get_footer();
?>
