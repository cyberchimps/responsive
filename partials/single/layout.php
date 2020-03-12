<?php
/**
 * Single post layout
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>

	<?php responsive_entry_top(); ?>

	<div class="post-entry">

		<?php
		// Get posts format.
		$format = get_post_format();

		// Get elements.
		$elements = responsive_blog_single_elements_positioning();
		// Loop through elements.
		foreach ( $elements as $element ) {

			// Featured Image.
			if ( 'featured_image' === $element
				&& ! post_password_required() ) {

				$format = $format ? $format : 'thumbnail';

				get_template_part( 'partials/single/media/blog-single', $format );

			} else {
				get_template_part( 'partials/single/' . $element );
			}
		}
		?>
		<?php if ( '' !== get_the_author_meta( 'description' ) ) : ?>

			<div id="author-meta">
				<?php
				if ( function_exists( 'get_avatar' ) ) {
					echo get_avatar( get_the_author_meta( 'email' ), '80' );
				}
				?>
				<div class="about-author"><?php esc_html_e( 'About', 'responsive' ); ?> <?php the_author_posts_link(); ?></div>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end of #author-meta -->

		<?php endif; // no description, no author's meta. ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- end of .post-entry -->

	<?php get_template_part( 'post-data', get_post_type() ); ?>

	<?php responsive_entry_bottom(); ?>
</article><!-- end of #post-<?php the_ID(); ?> -->
<?php
the_post_navigation(
	array(
		'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post is ', 'responsive' ) . ' </span>&#8249; %title',
		'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post is', 'responsive' ) . ' </span>%title &#8250;',
	)
);
?>
