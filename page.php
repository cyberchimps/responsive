<?php
/**
 * Pages Template
 *
 * @file           page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
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
get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook. ?>
<div id="wrapper" class="clearfix">
	<div class="content-outer">
<?php responsive_in_wrapper(); // wrapper hook. ?>
<div id="primary" class="<?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>" role="main">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'loop-header', get_post_type() ); ?>

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
			get_template_part( 'loop-no-posts', get_post_type() );

	endif;
		?>

</div><!-- end of #content -->

<?php get_sidebar(); ?>
</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
