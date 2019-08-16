<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

get_header(); ?>

<div id="content-outer">
<div id="content" class="<?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>" role="main">

	<?php if ( have_posts() ) : ?>

		<?php
		error_log('why');
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'loop-header', get_post_type() ); error_log('why this1'); ?>

			<?php responsive_entry_before(); ?>
				<?php get_template_part( 'partials/page/layout', get_post_type() ); error_log('why this2'); ?>
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); error_log('why this4'); ?>
			<?php responsive_comments_after(); ?>

			<?php
		endwhile;
		error_log('if');
		get_template_part( 'loop-nav', get_post_type() );

		else :
			error_log('else');
			get_template_part( 'loop-no-posts', get_post_type() );

	endif;
		?>

</div><!-- end of #content -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
