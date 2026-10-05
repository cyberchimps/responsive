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

$responsive_blog_entry_content_type = get_theme_mod( 'responsive_blog_entry_content_type', 'excerpt' );
if ( 'excerpt' === $responsive_blog_entry_content_type ) {
	add_filter( 'responsive_post_read_more', 'responsive_read_more_text' );
} elseif ( 'content' === $responsive_blog_entry_content_type ) {
	add_filter( 'responsive_post_read_more', 'responsive_read_more_text' );
}

Responsive\responsive_entry_before();

?>
<div class="entry-column">
	<article
		id="post-<?php the_ID(); ?>"
		<?php post_class( responsive_active_blog_layout_cover() ? 'cover-layout' : '' ); ?>
		<?php if ( responsive_active_blog_layout_cover() && has_post_thumbnail() ) : ?>
			style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');"
		<?php endif; ?>
		<?php responsive_schema_markup( 'creativework' ); ?>
	>
		<?php Responsive\responsive_entry_top(); ?>

		<div class="post-entry">

		<?php
		// Get posts format.
		$format = get_post_format();

		// Get elements.
		$elements = responsive_blog_entry_elements_positioning();
		// Loop through elements.
		if ( 'blog-layout-1' === get_theme_mod( 'responsive_blog_layout_options' ) || responsive_active_blog_layout_grid() || responsive_active_blog_layout_cover()) {
			foreach ( $elements as $element ) {
				// Featured Image.
				if ( 'featured_image' === $element && ! post_password_required() ) {
					get_template_part( 'partials/entry/media/blog-entry', $format );
				} else {
					get_template_part( 'partials/entry/' . $element );
				}
			}
		} else {
			// Featured Image.
			foreach ( $elements as $element ) {
				if ( 'featured_image' === $element && ! post_password_required() ) {
					get_template_part( 'partials/entry/media/blog-entry', $format );
				}
			}

			echo '<div class="blog-entry-content-wrapper">';
			foreach ( $elements as $element ) {
				if ( 'featured_image' !== $element ) {
					get_template_part( 'partials/entry/' . $element );
				}
			}
			echo '</div>';
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

		<?php
		edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) );

		Responsive\responsive_entry_bottom();
		?>
	</article><!-- end of #post-<?php the_ID(); ?> -->
</div>

<?php
Responsive\responsive_entry_after();
?>
