<?php
/**
 * Post single meta
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get meta sections.
$sections = responsive_blog_single_meta();

// Return if sections are empty.
if ( empty( $sections )
	|| 'post' !== get_post_type() ) {
	return;
}

// Return if quote format.
if ( 'quote' == get_post_format() ) {
	return;
}

do_action( 'responsive_before_single_post_meta' );

?>

<div class="post-meta">
	<?php
	// Loop through meta sections.
	foreach ( $sections as $section ) {

		if ( 'author' === $section ) {
			?>
			<span class="entry-author" <?php responsive_schema_markup( 'entry-author' ); ?>>
				<?php
					echo sprintf(
						'<span class="author vcard">
							<a class="url fn n" href="%1$s" aria-label="%2$s" title="%2$s" itemprop="url">
								<i class="icon-user"></i>
								<span itemprop="name">%3$s</span>
							</a>
						</span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						/* translators: %s view posts by */
						sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
						esc_attr( get_the_author() )
					);
				?>
			</span>
			<?php
		}

		if ( 'date' === $section ) {
			?>
				<span class="entry-date">
					<?php
					printf(
						/* translators: 1: class, 2: date */
						'<i class="icon-calendar" aria-hidden="true"></i><span>' . esc_html_e( 'Posted on ', 'responsive' ) . '</span><span class="%1$s" itemprop="datePublished">%2$s</span>',
						'meta-prep meta-prep-author posted',
						sprintf(
							'<a href="%1$s" aria-label="%2$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s" itemprop="dateModified">%4$s</time></a>',
							esc_url( get_permalink() ),
							esc_attr( get_the_title() ),
							esc_html( get_the_date( 'c' ) ),
							esc_html( get_the_date() )
						)
					);
					?>
				</span>
			<?php
		}

		if ( 'comments' === $section && comments_open() && ! post_password_required() ) {
			?>
				<span class="entry-comment">
					<?php if ( comments_open() ) : ?>
						<span class="comments-link">
						<span class="mdash"><i class="icon-comments-o" aria-hidden="true"></i></span>
							<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
						</span>
					<?php endif; ?>
				</span>
			<?php
		}
		if ( 'categories' === $section ) {
			?>
			<span class="entry-category">
				<span class='posted-in'><i class="icon-folder-open" aria-hidden="true"></i>
					<?php
					/* translators: %s: category list */
					printf( esc_html__( 'Posted in %s', 'responsive' ), wp_kses_post( get_the_category_list( __( ', ', 'responsive' ) ) ) );
					?>
				</span>
			</span>
			<?php
		}
		if ( 'tag' === $section ) {
			?>
			<?php if ( has_tag() ) { ?>
				<span class="entry-tag">
						<span class="post-data">
							<?php
							/* translators: %s: tag list */
							printf( esc_html__( 'Tagged with %s', 'responsive' ), wp_kses_post( get_the_tag_list( '', __( ', ', 'responsive' ) ) ) );
							?>
						</span><!-- end of .post-data -->
						<?php
				}
				?>
				</span>
			</span>
			<?php
		}
	}
	?>


</div><!-- end of .post-meta -->
<?php do_action( 'responsive_after_single_post_meta' ); ?>
