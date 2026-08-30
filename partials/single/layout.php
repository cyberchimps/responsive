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
Responsive\responsive_entry_before();

$single_featured_image_position  = get_theme_mod( 'responsive_single_blog_featured_image_position', 'none' );
$single_title_layout             = get_theme_mod( 'responsive_single_blog_post_title_layout', 'post_title_layout1' );
$single_featured_image_ratio     = get_theme_mod( 'responsive_single_blog_featured_image_ratio', 'original' );
$single_featured_image_alignment = get_theme_mod( 'responsive_single_blog_featured_image_alignment', 'left' );

$ratio_css = '';
if ( 'predefined' === $single_featured_image_ratio ) {
	$predefined_ratio = get_theme_mod( 'responsive_single_blog_featured_image_predefined_ratio', '1:1' );
	$ratio_value = str_replace( ':', '/', $predefined_ratio );
	$ratio_css = 'aspect-ratio: ' . esc_attr( $ratio_value ) . ';';
} elseif ( 'custom' === $single_featured_image_ratio ) {
	$custom_width  = get_theme_mod( 'responsive_single_blog_featured_image_custom_width', '' );
	$custom_height = get_theme_mod( 'responsive_single_blog_featured_image_custom_height', '' );
	if ( $custom_width && $custom_height ) {
		$ratio_css = 'aspect-ratio: ' . esc_attr( $custom_width ) . '/' . esc_attr( $custom_height ) . ';';
	}
}

if ( in_array( $single_title_layout, array( 'post_title_layout1', 'post_title_layout2' ) ) && 'outside' === $single_featured_image_position && has_post_thumbnail() && ! post_password_required() ) {
	?>
	<div class="responsive-single-post-featured-section post-thumb responsive-article-image-container--wide" style="text-align: <?php echo esc_attr( $single_featured_image_alignment ); ?>;">
		<?php 
		if ( $ratio_css ) {
			echo '<style>.responsive-single-post-featured-section.post-thumb img { ' . $ratio_css . ' object-fit: cover; width: 100%; height: 100%; }</style>';
		}
		$single_featured_image_size = get_theme_mod( 'responsive_single_blog_featured_image_size', 'full' );
		the_post_thumbnail( $single_featured_image_size ); 
		?>
	</div>
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php responsive_schema_markup( 'creativework' ); ?>>

	<?php Responsive\responsive_entry_top(); ?>

	<div class="post-entry">

		<?php
		// Get posts format.
		$format = get_post_format();

		// Get elements.
		$elements = responsive_blog_single_elements_positioning();

		if ( get_theme_mod( 'responsive_single_blog_post_title_layout', 'post_title_layout1' ) === 'post_title_layout1' ) {
			?>
			<?php
			$header_style = '';
			if ( 'background' === $single_featured_image_position && has_post_thumbnail() && ! post_password_required() ) {
				$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				if ( $featured_image_url ) {
					$overlay_color = Responsive\Core\responsive_prepare_css_value( 'responsive_single_blog_featured_image_overlay_color', '' );
					$overlay_css = empty( $overlay_color ) ? 'transparent' : $overlay_color;
					$bg_css = '--overlay-color: ' . $overlay_css . '; background-image: linear-gradient(var(--overlay-color), var(--overlay-color)), url(' . esc_url( $featured_image_url ) . '); background-repeat: no-repeat; background-size: cover; background-attachment: scroll; background-position: center center;';
					if ( $ratio_css ) {
						$bg_css .= ' ' . $ratio_css;
					}
					$header_style = ' style="' . $bg_css . '"';
				}
			}
			?>
			<header class="entry-header"<?php echo $header_style; ?>>
				<?php
				// Loop through elements.
				foreach ( $elements as $element ) {
					if ( 'content' === $element ) {
						continue;
					}

					// Featured Image.
					if ( 'featured_image' === $element
						&& ! post_password_required() ) {

						if ( ! in_array( $single_featured_image_position, array( 'outside', 'background' ), true ) ) {
							$format = $format ? $format : 'thumbnail';
							get_template_part( 'partials/single/media/blog-single', $format );
						}

					} else {
						get_template_part( 'partials/single/' . $element );
					}
				}
				?>
			</header>
			<?php
		}

		get_template_part( 'partials/single/content' );
		?>

		<?php if ( '' !== get_the_author_meta( 'description' ) && 0 === get_theme_mod( 'responsive_disable_author_meta', 0 ) ) : ?>

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

	<?php
	edit_post_link( __( '<span class="post-edit">Edit</span>', 'responsive' ) );

	Responsive\responsive_entry_bottom();

	?>
</article><!-- end of #post-<?php the_ID(); ?> -->
<?php
Responsive\responsive_entry_after();
if ( 1 === (int) get_theme_mod( 'responsive_single_blog_navigation', 0 ) ) {
	the_post_navigation(
		array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post is ', 'responsive' ) . ' </span>&#8249; %title',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post is', 'responsive' ) . ' </span>%title &#8250;',
			'excluded_terms' => get_theme_mod( 'exclude_post_cat' ),
		)
	);
}
Responsive\responsive_single_blog_related_posts_entry();
?>
