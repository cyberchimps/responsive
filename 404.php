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
		<?php Responsive\responsive_404_content(); ?>
		<?php Responsive\responsive_wrapper_bottom(); // after wrapper content hook. ?>
	</div> <!-- row -->
</div> <!-- end of #wrapper -->
	<?php
}
Responsive\responsive_wrapper_end(); // after wrapper hook.
get_footer();
?>
