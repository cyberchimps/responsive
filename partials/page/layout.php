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
Responsive\responsive_entry_before();
	// Add classes to the blog entry post class.
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>
		<?php Responsive\responsive_entry_top(); ?>
		<div class="post-entry">
			<?php
			// Get posts format.
			$format = get_post_format();

			if ( get_theme_mod( 'responsive_page_title_layout', 'post_title_layout1' ) === 'post_title_layout1' ) {
				// Get elements.
				$elements = responsive_page_single_elements_positioning();
				// Loop through elements.
				foreach ( $elements as $element ) {

					// Skip content if it still exists in the DB settings, as it will be rendered unconditionally
					if ( 'content' === $element ) {
						continue;
					}

					// Featured Image.
					if ( 'featured_image' === $element
						&& ! post_password_required() ) {

						get_template_part( 'partials/page/thumbnail' );

					} else {
						get_template_part( 'partials/page/' . $element );

					}
				}
			}

			// Unconditionally render content
			get_template_part( 'partials/page/content' );
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

		<?php
			edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) );
			Responsive\responsive_entry_bottom();
		?>
	</article><!-- end of #post-<?php the_ID(); ?> -->
<?php
Responsive\responsive_entry_after();
?>
