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
	add_filter( 'excerpt_length', 'responsive_custom_excerpt_length' );
	add_filter( 'responsive_post_read_more', 'responsive_read_more_text' );
} elseif ( 'content' === $responsive_blog_entry_content_type ) {
	add_filter( 'the_content_more_link', 'responsive_modify_read_more_link' );
	add_filter( 'responsive_post_read_more', 'responsive_read_more_text' );
}

Responsive\responsive_entry_before();

if ( class_exists( 'Responsive_Addons_Pro' ) ) {
	$date_box_toggle_value = responsive_date_box_toggle_value();
} else {
	$date_box_toggle_value = 0;
}

?>
<div class="entry-column">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>
		<?php Responsive\responsive_entry_top(); ?>

		<div class="post-entry">

		<?php
		if ( $date_box_toggle_value ) {
			$datebox_day   = esc_html( get_the_date( 'j' ) );
			$datebox_month = esc_html( get_the_date( 'M' ) );
			$datebox_year  = esc_html( get_the_date( 'Y' ) );
			echo '<div class="responsive-date-box">';
				echo '<a href="' . get_permalink() . '" class="date-box-links">';
					echo '<div class="date-box-month">' . $datebox_month . '</div>';
					echo '<div class="date-box-day">' . $datebox_day . '</div>';
					echo '<div class="date-box-year">' . $datebox_year . '</div>';
				echo '</a>';
			echo '</div>';
		}
		?>

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
			} else {
				get_template_part( 'partials/entry/' . $element );
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

		<?php
		edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) );

		Responsive\responsive_entry_bottom();
		?>
	</article><!-- end of #post-<?php the_ID(); ?> -->
</div>

<?php
Responsive\responsive_entry_after();
?>
