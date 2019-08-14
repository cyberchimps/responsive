<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog Template
 *
 * @file           home.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header();

get_template_part( 'wp-admin/includes', 'plugin' );
global $responsive_options;
$responsive_options             = responsive_get_options();
global $responsive_blog_layout_columns;
if ( isset( $responsive_options['blog_posts_index_layout_default'] ) && ( in_array( $responsive_options['blog_posts_index_layout_default'], $responsive_blog_layout_columns, true ) ) ) {
	?>
	<div id="content-outer">
		<div id="content-full" class="grid col-940 <?php echo $responsive_options['blog_posts_index_layout_default']; ?>">

			<!-- Blog page title -->
			<?php if ( responsive_free_get_option( 'blog_post_title_toggle' ) ) { ?>
				<h1 class="blogtitle"> <?php echo responsive_free_get_option( 'blog_post_title_text' ); ?> </h1>
			<?php } ?>

			<?php get_template_part( 'loop-header', get_post_type() ); ?>

			<?php if ( have_posts() ) : ?>

			<div class="blog_main_div">
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<div class="section-<?php echo $responsive_options['blog_posts_index_layout_default']; ?> grid">
						<?php responsive_entry_before(); ?>

						<div class="post-entry">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>

						</div><!-- end of .post-entry -->

						<?php responsive_entry_top(); ?>

						<?php get_template_part( 'post-meta-3-col', get_post_type() ); ?>
						<?php get_template_part( 'post-data', get_post_type() ); ?>

						<?php the_excerpt( __( 'Read more &#8250;', 'responsive' ) ); ?>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
								'after'  => '</div>',
							)
						);
						?>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php responsive_entry_bottom(); ?>
						</div><!-- end of #post-<?php the_ID(); ?> -->
						<?php responsive_entry_after(); ?>
					</div>

					<?php
				endwhile;

				if ( $wp_query->max_num_pages > 1 ) :
					?>
					<div class="navigation">
						<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ), $wp_query->max_num_pages ); ?></div>
						<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ), $wp_query->max_num_pages ); ?></div>
					</div><!-- end of .navigation -->
					<?php
				endif;

				else :

					get_template_part( 'loop-no-posts' );
				endif;
				?>
			</div>
		</div>
	</div>
<?php } else { ?>

	<div id="content-outer">
	<div id="content-blog" class="<?php echo esc_attr( implode( ' ', responsive_get_content_classes() ) ); ?>">

		<!-- Blog page title -->
		<?php if ( responsive_free_get_option( 'blog_post_title_toggle' ) ) { ?>
			<h1> <?php echo responsive_free_get_option( 'blog_post_title_text' ); ?> </h1>
		<?php } ?>

		<?php get_template_part( 'loop-header', get_post_type() ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php responsive_entry_before(); ?>
					<?php get_template_part( 'partials/entry/layout', get_post_type() ); ?>
				<?php responsive_entry_after(); ?>

				<?php
			endwhile;

			get_template_part( 'loop-nav', get_post_type() );

			else :

				get_template_part( 'loop-no-posts', get_post_type() );

		endif;
			?>

	</div><!-- end of #content-blog -->

	<?php get_sidebar(); ?>
</div>
<?php } ?>
<?php get_footer(); ?>
