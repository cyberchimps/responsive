<?php
/**
 * Default post entry layout
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get post format
$format = get_post_format();

	// Add classes to the blog entry post class
	// $classes = responsive_post_entry_classes(); ?>
	<?php // responsive_blog_entry_elements_positioning() ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php responsive_entry_top(); ?>
		<div class="post-entry">

		<?php // get_template_part( 'post-meta', get_post_type() ); ?>

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
					// get_template_part( 'partials/entry/thumbnail' );

				}

				// Title.
				if ( 'title' === $element ) {

					get_template_part( 'partials/entry/header' );

				}

				// Meta.
				if ( 'meta' === $element ) {

					get_template_part( 'partials/entry/meta' );

				}

				// Content
				if ( 'content' === $element ) {

					get_template_part( 'partials/entry/content' );

				}
			}
			?>



			<?php // the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

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
