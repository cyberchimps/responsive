<?php
/**
 * Blog Template
 *
 * @since   1.0.0
 * @package Responsive
 */

// Exit if accessed directly.
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
$responsive_options = responsive_get_options();
global $responsive_blog_layout_columns;
$responsive_category_id = get_query_var( 'cat' );
if ( isset( $responsive_options['blog_posts_index_layout_default'] ) && ( in_array( $responsive_options['blog_posts_index_layout_default'], $responsive_blog_layout_columns, true ) ) ) {
	?>
	<div id="content-outer">
		<div id="content-blog" class="grid col-940 <?php echo $responsive_options['blog_posts_index_layout_default']; ?>">

			<!-- Blog page title -->
			<?php if ( responsive_free_get_option( 'blog_post_title_toggle' ) ) { ?>
				<h1 class="blogtitle"> <?php echo responsive_free_get_option( 'blog_post_title_text' ); ?> </h1>
			<?php } ?>

			<?php get_template_part( 'loop-header', get_post_type() ); ?>

			<?php if ( have_posts() ) : ?>

			<div id="main-blog" class="blog_main_div">
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<div class="section-<?php echo $responsive_options['blog_posts_index_layout_default']; ?> grid">
						<?php responsive_entry_before(); ?>
							<?php get_template_part( 'partials/entry/layout', get_post_type() ); ?>
						<?php responsive_entry_after(); ?>
					</div>

					<?php
				endwhile;

				?>
				</div>
				<?php
				$blog_pagination = get_theme_mod( 'blog_pagination', 'default' );

				if ( $wp_query->max_num_pages > 1 ) :
					if ( 'infinite' === $blog_pagination ) :
						ob_start();
						do_action( 'responsive_pagination_infinite_enqueue_script' );
						?>
						<nav class="responsive-pagination-infinite">
							<div class="responsive-loader">
								<div class="responsive-loader-1"></div>
								<div class="responsive-loader-2"></div>
								<div class="responsive-loader-3"></div>
							</div>
						</nav>
						<?php
					else :
						the_posts_pagination(
							array(
								'mid_size'  => 2,
								'prev_text' => __( 'Previous', 'responsive' ),
								'next_text' => __( 'Next', 'responsive' ),
							)
						);
									endif;
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

		<div id="main-blog">
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

			$blog_pagination = get_theme_mod( 'blog_pagination', 'default' );

			?>
	</div>
			<?php
			if ( $wp_query->max_num_pages > 1 ) :
				if ( 'infinite' === $blog_pagination ) :
					ob_start();
					do_action( 'responsive_pagination_infinite_enqueue_script' );
					?>
					<nav class="responsive-pagination-infinite">
						<div class="responsive-loader">
							<div class="responsive-loader-1"></div>
							<div class="responsive-loader-2"></div>
							<div class="responsive-loader-3"></div>
						</div>
					</nav>
						<?php
				else :
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => __( 'Previous', 'responsive' ),
							'next_text' => __( 'Next', 'responsive' ),
						)
					);
				endif;
			endif;
			else :

				get_template_part( 'loop-no-posts', get_post_type() );

		endif;
			?>

	</div><!-- end of #content-blog -->

	<?php get_sidebar(); ?>
</div>
<?php } ?>
<?php get_footer(); ?>
