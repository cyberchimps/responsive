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

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>

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

			}

			// Title.
			if ( 'title' === $element ) {

				get_template_part( 'partials/single/header' );

			}

			// Meta.
			if ( 'meta' === $element ) {

				get_template_part( 'partials/single/meta' );

			}

			// Content.
			if ( 'content' === $element ) {

				get_template_part( 'partials/single/content' );

			}
		}
		?>
		<?php if ( get_the_author_meta( 'description' ) != '' ) : ?>

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

	<div class="navigation">
		<div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
		<div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
	</div><!-- end of .navigation -->

	<?php get_template_part( 'post-data', get_post_type() ); ?>

	<?php responsive_entry_bottom(); ?>
</div><!-- end of #post-<?php the_ID(); ?> -->
