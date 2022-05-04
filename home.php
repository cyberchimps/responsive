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
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header();

Responsive\responsive_wrapper_top(); // before wrapper content hook.

if ( class_exists( 'Responsive_Addons_Pro' ) ) {
	$blog_pagination = responsive_blog_pagination();
} else {
	$blog_pagination = 'default';
}
// Elementor `archive` location.
if ( ( ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) && ! ( function_exists( 'rea_theme_template_render_at_location' ) && rea_theme_template_render_at_location( 'archive' ) ) ) ) {
	Responsive\responsive_wrapper();
	?>
	<div class="content-area-wrapper">
			<div id="main-blog" class="row">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'partials/entry/layout', get_post_type() );
						endwhile;
						?>
				</div>
						<?php
						if ( $wp_query->max_num_pages > 1 ) :
							if ( 'infinite' === $blog_pagination ) :
								ob_start();
								do_action( 'responsive_pro_pagination_infinite_enqueue_script' );
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
							// Elementor `404` location.
							if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
								get_template_part( 'loop-no-posts', get_post_type() );
							}
					endif;
						?>
				</div>
				<?php
				if ( is_home() || is_archive() ) {?>
			</div>
		<?php }?>
			</main><!-- end of #primary -->

	<?php
	get_sidebar();
	Responsive\responsive_wrapper_close();
}
	Responsive\responsive_wrapper_end(); // after wrapper hook.
	get_footer();
?>
