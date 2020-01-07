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
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/404.php
 * @link           http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook. ?>
<div id="wrapper" class="clearfix">
	<div class="content-outer">
<?php responsive_in_wrapper(); // wrapper hook. ?>
<div id="content-full" class="grid col-940" <?php responsive_schema_markup( 'main' ); ?>>

	<?php responsive_entry_before(); ?>
	<div id="post-0" class="error404">
		<?php responsive_entry_top(); ?>

		<div class="post-entry">

			<?php get_template_part( 'loop-no-posts', get_post_type() ); ?>

		</div><!-- end of .post-entry -->

		<?php responsive_entry_bottom(); ?>
	</div><!-- end of #post-0 -->
	<?php responsive_entry_after(); ?>

</div><!-- end of #content-full -->
</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
