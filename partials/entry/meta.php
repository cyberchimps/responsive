<?php
/**
 * The default template for displaying post meta.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get meta sections
$sections = responsive_blog_entry_meta();

// Return if sections are empty
if ( empty( $sections ) ) {
	return;
} ?>

<?php do_action( 'responsive_before_blog_entry_meta' ); ?>
<div class="post-meta">
	<?php
	foreach ( $sections as $section ) {

		if ( 'author' == $section ) {
			// echo sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s"><span class="author-gravtar">%4$s</span>%3$s</a></span>',
			// get_author_posts_url( get_the_author_meta( 'ID' ) ),
			// sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
			// esc_attr( get_the_author() ),
			// get_avatar( get_the_author_meta( 'ID' ), 32)
			// );
			printf(
				__( '<span class="%3$s"> by </span>%4$s', 'responsive' ),
				'meta-prep meta-prep-author posted',
				sprintf(
					'<a href="%1$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s">%4$s</time></a>',
					esc_url( get_permalink() ),
					esc_attr( get_the_title() ),
					esc_html( get_the_date( 'c' ) ),
					esc_html( get_the_date() )
				),
				'byline',
				sprintf(
					'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s"><span class="author-gravtar">%4$s</span>%3$s</a></span>',
					get_author_posts_url( get_the_author_meta( 'ID' ) ),
					sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
					esc_attr( get_the_author() ),
					get_avatar( get_the_author_meta( 'ID' ), 32 )
				)
			);
		}

		if ( 'date' === $section ) {
			// printf( __( '<i class="fa fa-calendar" aria-hidden="true"></i><span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'responsive' ),
			// 'meta-prep meta-prep-author posted',
			// sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s">%4$s</time></a>',
			// esc_url( get_permalink() ),
			// esc_attr( get_the_title() ),
			// esc_html( get_the_date('c')),
			// esc_html( get_the_date() )
			// )
			// );
				printf(
					__( '<i class="fa fa-calendar" aria-hidden="true"></i><span class="%1$s">Posted on </span>%2$s', 'responsive' ),
					'meta-prep meta-prep-author posted',
					sprintf(
						'<a href="%1$s" title="%2$s" rel="bookmark"><time class="timestamp updated" datetime="%3$s">%4$s</time></a>',
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
				<span class="mdash">&mdash;</span>
					<?php comments_popup_link( __( 'No Comments &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
				</span>
			<?php endif; ?>
			<?php
		}
		if ( 'categories' === $section ) {
			?>
			<span class='posted-in'>
				<?php printf( __( 'Posted in %s', 'responsive' ), get_the_category_list( ', ' ) ); ?>
			</span>
			<?php
		}
	}
	?>
</div><!-- end of .post-meta -->

<?php do_action( 'responsive_after_blog_entry_meta' ); ?>
