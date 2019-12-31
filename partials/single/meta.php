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
} ?>

<?php do_action( 'responsive_before_single_post_meta' ); ?>

<div class="post-meta">
	<?php
	// Loop through meta sections.
	foreach ( $sections as $section ) {

		if ( 'author' === $section ) {
			echo sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" itemscope itemtype="http://schema.org/Person"><span class="author-gravtar" itemprop="image">%4$s</span><span itemprop="name">%3$s</span></a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
				esc_attr( get_the_author() ),
				get_avatar( get_the_author_meta( 'ID' ), 32 )
			);
		}

		if ( 'date' === $section ) {
			printf(
				__( '<i class="fa fa-calendar" aria-hidden="true"></i><span>Posted on </span><span class="%1$s" itemprop="datePublished">%2$s</span>', 'responsive' ),
				'meta-prep meta-prep-author posted',
				sprintf(
					'<a href="%1$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s" itemprop="dateModified">%4$s</time></a>',
					esc_url( get_permalink() ),
					esc_attr( get_the_title() ),
					esc_html( get_the_date( 'c' ) ),
					esc_html( get_the_date() )
				)
			);
		}

		if ( 'comments' === $section && comments_open() && ! post_password_required() ) {
			?>
			<?php if ( comments_open() ) : ?>
				<span class="comments-link">
				<span class="mdash"><i class="fa fa-comments-o" aria-hidden="true"></i></span>
					<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
				</span>
			<?php endif; ?>
			<?php
		}
		if ( 'categories' === $section ) {
			?>
			<span class='posted-in'><i class="fa fa-folder-open" aria-hidden="true"></i>
				<?php printf( __( 'Posted in %s', 'responsive' ), get_the_category_list( ', ' ) ); ?>
			</span>
			<?php
		}
	}
	?>


</div><!-- end of .post-meta -->
<?php do_action( 'responsive_after_single_post_meta' ); ?>
