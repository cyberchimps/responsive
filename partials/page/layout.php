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

	// Add classes to the blog entry post class.
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>
		<?php responsive_entry_top(); ?>
		<div class="post-entry">
			<?php
			// Get posts format.
			$format = get_post_format();

			// Get elements.
			$elements = responsive_page_single_elements_positioning();
			// Loop through elements.
			foreach ( $elements as $element ) {

				// Featured Image.
				if ( 'featured_image' === $element
					&& ! post_password_required() ) {


					get_template_part( 'partials/page/thumbnail' );

				}

				// Title.
				if ( 'title' === $element ) {
					get_template_part( 'partials/page/header' );

				}

				// Content.
				if ( 'content' === $element ) {

					get_template_part( 'partials/page/content' );

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
		</div><!-- end of .post-entry -->

		<?php get_template_part( 'post-data', get_post_type() ); ?>

		<?php responsive_entry_bottom(); ?>
	</div><!-- end of #post-<?php the_ID(); ?> -->
