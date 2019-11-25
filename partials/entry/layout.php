<?php
/**
 * Default post entry layout
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get post format.
$format = get_post_format();

global $responsive_show_excerpt;
$responsive_show_excerpt = get_theme_mod( 'responsive_show_excerpt' );
if ( 'excerpt' === $responsive_show_excerpt ) {
	add_filter( 'excerpt_length', 'responsive_custom_excerpt_length' );
	add_filter( 'responsive_post_read_more', 'responsive_read_more_text' );
	add_filter( 'responsive_post_read_more_class', 'responsive_read_more_class' );
} elseif ( 'content' === $responsive_show_excerpt ) {
	add_filter( 'the_content_more_link', 'responsive_modify_read_more_link' );
	add_filter( 'responsive_post_read_more', 'responsive_read_more_text' );
	add_filter( 'responsive_post_read_more_class', 'responsive_read_more_class' );
}
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>
		<?php responsive_entry_top(); ?>
		<div class="post-entry">


			<?php
			// Get posts format.
			$format = get_post_format();

			// Get elements.
			$elements = responsive_blog_entry_elements_positioning();

			// Loop through elements.
			foreach ( $elements as $element ) {

				// Featured Image.
				if ( 'featured_image' === $element
					&& ! post_password_required() ) {
						get_template_part( 'partials/entry/media/blog-entry', $format );
				}

				// Title.
				if ( 'title' === $element ) {

					get_template_part( 'partials/entry/header' );

				}

				// Meta.
				if ( 'meta' === $element ) {

					get_template_part( 'partials/entry/meta' );

				}

				// Content.
				if ( 'content' === $element ) {

					get_template_part( 'partials/entry/content' );

				}
			}
			?>

			<?php
			wp_link_pages(
				array(
					'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<!-- end of .post-entry -->

		<?php get_template_part( 'post-data', get_post_type() ); ?>

		<?php responsive_entry_bottom(); ?>
	</div><!-- end of #post-<?php the_ID(); ?> -->
