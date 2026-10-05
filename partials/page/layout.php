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
	
$page_featured_image_position  = get_theme_mod( 'responsive_page_featured_image_position', 'none' );
$page_title_layout             = get_theme_mod( 'responsive_page_title_layout', 'post_title_layout1' );
$page_featured_image_ratio     = get_theme_mod( 'responsive_page_featured_image_ratio', 'original' );
$page_featured_image_alignment = get_theme_mod( 'responsive_page_featured_image_alignment', 'left' );

$ratio_css = '';
if ( 'predefined' === $page_featured_image_ratio ) {
	$predefined_ratio = get_theme_mod( 'responsive_page_featured_image_predefined_ratio', '1:1' );
	$ratio_value = str_replace( ':', '/', $predefined_ratio );
	$ratio_css = 'aspect-ratio: ' . esc_attr( $ratio_value ) . ';';
} elseif ( 'custom' === $page_featured_image_ratio ) {
	$custom_width  = get_theme_mod( 'responsive_page_featured_image_custom_width', '' );
	$custom_height = get_theme_mod( 'responsive_page_featured_image_custom_height', '' );
	if ( $custom_width && $custom_height ) {
		$ratio_css = 'aspect-ratio: ' . esc_attr( $custom_width ) . '/' . esc_attr( $custom_height ) . ';';
	}
}

if ( in_array( $page_title_layout, array( 'post_title_layout1', 'post_title_layout2' ) ) && 'outside' === $page_featured_image_position && has_post_thumbnail() && ! post_password_required() && in_array( 'featured_image', responsive_page_single_elements_positioning(), true ) ) {
	?>
	<div class="responsive-single-post-featured-section post-thumb responsive-article-image-container--wide" style="text-align: <?php echo esc_attr( $page_featured_image_alignment ); ?>;">
		<?php 
		if ( $ratio_css ) {
			echo '<style>.responsive-single-post-featured-section.post-thumb img { ' . $ratio_css . ' object-fit: cover; width: 100%; height: 100%; }</style>';
		}
		$page_featured_image_size = get_theme_mod( 'responsive_page_featured_image_size', 'full' );
		the_post_thumbnail( $page_featured_image_size ); 
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

			if ( get_theme_mod( 'responsive_page_title_layout', 'post_title_layout1' ) === 'post_title_layout1' ) {
				// Get elements.
				$elements = responsive_page_single_elements_positioning();
				?>
				<?php
				$header_style = '';
				if ( 'background' === $page_featured_image_position && has_post_thumbnail() && ! post_password_required() && in_array( 'featured_image', $elements, true ) ) {
					$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
					if ( $featured_image_url ) {
						$overlay_color = Responsive\Core\responsive_prepare_css_value( 'responsive_page_featured_image_overlay_color', '' );
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

						// Skip content if it still exists in the DB settings, as it will be rendered unconditionally
						if ( 'content' === $element ) {
							continue;
						}

						// Featured Image.
						if ( 'featured_image' === $element
							&& ! post_password_required() ) {

							if ( ! in_array( $page_featured_image_position, array( 'outside', 'background' ), true ) ) {
								get_template_part( 'partials/page/thumbnail' );
							}

						} else {
							get_template_part( 'partials/page/' . $element );

						}
					}
					?>
				</header>
				<?php
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
