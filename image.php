<?php
/**
 * Image Attachment Template
 *
 * @file           image.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/image.php
 * @link           http://codex.wordpress.org/Using_Image_and_File_Attachments
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php get_header(); ?>

<div id="content-images" class="grid col-620">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<h1 class="post-title"><?php the_title(); ?></h1>

				<p><?php esc_html_e( '&#8249; Return to', 'responsive' ); ?> <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery" <?php responsive_schema_markup( 'url' ); ?>><?php echo esc_html( get_the_title( $post->post_parent ) ); ?></a>
				</p>

				<div class="post-meta">
					<?php responsive_post_meta_data(); ?>

					<?php if ( comments_open() ) : ?>
						<span class="comments-link">
						<span class="mdash"><i class="icon-comments-o" aria-hidden="true"></i></span>
							<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
						</span>
					<?php endif; ?>
				</div>
				<!-- end of .post-meta -->

				<div class="attachment-entry">
					<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" <?php responsive_schema_markup( 'url' ); ?>><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a>
					<?php
					if ( ! empty( $post->post_excerpt ) ) {
						the_excerpt();
					}
					?>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
				<!-- end of .attachment-entry -->

				<div class="navigation">
					<div class="previous"><?php previous_image_link( 'thumbnail' ); ?></div>
					<div class="next"><?php next_image_link( 'thumbnail' ); ?></div>
				</div>
				<!-- end of .navigation -->

				<?php if ( comments_open() ) : ?>
					<div class="post-data">
						<?php the_tags( __( 'Tagged with:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
						<?php
							/* translators: %s posted in categories */
							the_category( __( 'Posted in %s', 'responsive' ) . ', ' );
						?>
					</div><!-- end of .post-data -->
				<?php endif; ?>

				<?php edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

			<?php
		endwhile;

		get_template_part( 'loop-nav', get_post_type() );

		else :
			// Elementor `404` location.
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

				get_template_part( 'loop-no-posts', get_post_type() );
			}

	endif;
		?>

</div><!-- end of #content-image -->

<?php get_sidebar( 'gallery' ); ?>
<?php get_footer(); ?>
