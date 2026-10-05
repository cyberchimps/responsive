<?php
/**
 * Page single meta
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sections = get_theme_mod( 'responsive_page_single_meta', array( 'author', 'date', 'comments' ) );
if ( $sections && ! is_array( $sections ) ) {
	$sections = explode( ',', $sections );
}

if ( empty( $sections ) ) {
	return;
}

do_action( 'responsive_before_single_page_meta' );

?>

<div class="post-meta entry-meta">
	<?php
	$separator_text = get_theme_mod( 'responsive_page_single_meta_separator_text', '•' );
	if ( 'none' === strtolower( $separator_text ) ) {
		$separator_text = '';
	}
	$separator_html = '<span class="meta-separator">' . esc_html( $separator_text ) . '</span>';
	$meta_items = array();

	// Loop through meta sections.
	foreach ( $sections as $section ) {

		if ( 'author' === $section ) {
			ob_start();
			?>
			<span class="entry-author" <?php responsive_schema_markup( 'entry-author' ); ?>>
				<?php
					echo sprintf(
						'<span class="author vcard">
							<a class="url fn n" href="%1$s" aria-label="%2$s" title="%2$s" itemprop="url">
								<span itemprop="name">%3$s</span>
							</a>
						</span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'responsive' ), get_the_author() ) ),
						esc_attr( wp_kses_post( get_the_author() ) )
					);
				?>
			</span>
			<?php
			$meta_items[] = ob_get_clean();
		}

		if ( 'date' === $section ) {
			ob_start();
			?>
				<span class="entry-date">
					<?php
					printf(
						'<span class="%1$s" itemprop="datePublished">%2$s</span>',
						'meta-prep meta-prep-author posted',
						sprintf(
							'<a href="%1$s" aria-label="%2$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s" itemprop="dateModified">%4$s</time></a>',
							esc_url( get_permalink() ),
							esc_attr( get_the_title() ),
							esc_html( get_the_date( 'c' ) ),
							esc_html( get_the_date( 'M j, Y' ) )
						)
					);
					?>
				</span>
			<?php
			$meta_items[] = ob_get_clean();
		}

		if ( 'updated' === $section ) {
			ob_start();
			?>
				<span class="entry-updated">
					<?php
						printf(
							'<i class="icon-calendar" aria-hidden="true"></i><span>' . esc_html_e( 'Last updated on ', 'responsive' ) . '</span><span class="%1$s" itemprop="datePublished">%2$s</span>',
							'meta-prep meta-prep-author posted',
							sprintf(
								'<a href="%1$s" aria-label="%2$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s" itemprop="dateModified">%4$s</time></a>',
								esc_url( get_permalink() ),
								esc_attr( get_the_title() ),
								esc_html( get_the_modified_date( 'c' ) ),
								esc_html( get_the_modified_date( 'M j, Y' ) )
							)
						);
					?>
				</span>
			<?php
			$meta_items[] = ob_get_clean();
		}

		if ( 'comments' === $section && ( comments_open() || get_comments_number() || is_customize_preview() ) && ! post_password_required() ) {
			ob_start();
			?>
				<span class="entry-comment">
					<?php if ( comments_open() || get_comments_number() || is_customize_preview() ) : ?>
						<span class="comments-link">
						<span class="mdash"><i class="icon-comments-o" aria-hidden="true"></i></span>
							<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
						</span>
					<?php endif; ?>
				</span>
			<?php
			$meta_items[] = ob_get_clean();
		}

		if ( 'tag' === $section ) {
			if ( has_tag() ) {
				ob_start();
				?>
				<span class="entry-tag">
						<span class="post-data">
							<?php
							printf( esc_html__( 'Tagged with %s', 'responsive' ), wp_kses_post( get_the_tag_list( '', __( ', ', 'responsive' ) ) ) );
							?>
						</span>
				</span>
				<?php
				$meta_items[] = ob_get_clean();
			}
		}

		if ( 'categories' === $section ) {
			$categories = get_the_category_list( __( ', ', 'responsive' ) );
			if ( $categories ) {
				ob_start();
				?>
				<span class="entry-category">
					<span class='posted-in'>
						<?php echo wp_kses_post( $categories ); ?>
					</span>
				</span>
				<?php
				$meta_items[] = ob_get_clean();
			}
		}
	}

	$meta_output = implode( $separator_html, $meta_items );
	echo $meta_output;
	?>
</div><!-- end of .post-meta -->
<?php do_action( 'responsive_after_single_page_meta' ); ?>
