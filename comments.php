<?php
/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Comments Template
 *
 * @file           comments.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/comments.php
 * @link           http://codex.wordpress.org/Theme_Development#Comments_.28comments.php.29
 * @since          available since Release 1.0
 */

$is_comments_enabled = get_theme_mod( 'responsive_single_blog_comments', Responsive\Core\get_responsive_customizer_defaults( 'responsive_single_blog_comments' ) );

// Exit early if password protected, comments disabled, or no comments and discussion is off.
if ( post_password_required() || ! $is_comments_enabled || ( ! have_comments() && ! comments_open() && ! pings_open() ) ) {
	return;
}
?>
<?php Responsive\responsive_comments_before(); ?>

<div id="comments" class="comments-area">

	<?php
	function responsive_render_comment_form() {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );

		$fields = array(
			'author' => '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'responsive' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',

			'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'E-mail', 'responsive' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',

			'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'responsive' ) . '</label>' .
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

		comment_form( array(
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		) );
	}

	$comments_form_position = get_theme_mod( 'responsive_comments_form_position', Responsive\Core\get_responsive_customizer_defaults( 'responsive_comments_position' ) );

	if ( 'above' === $comments_form_position ) {
		responsive_render_comment_form();
	}

	if ( have_comments() ) :
		?>
		<div class="responsive-comments-list">
			<h3 id="comments-title">
				<?php
				$responsive_comment_count = get_comments_number();
				if ( '1' === $responsive_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One Comment on &ldquo;%1$s&rdquo;', 'responsive' ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', $responsive_comment_count, 'comments title', 'responsive' ) ),
						number_format_i18n( $responsive_comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				?>
			</h3>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<div class="navigation">
					<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments', 'responsive' ) ); ?></div>
					<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;', 'responsive' ) ); ?></div>
				</div>
			<?php endif; ?>

			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=50&type=comment' ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<div class="navigation">
					<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments', 'responsive' ) ); ?></div>
					<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;', 'responsive' ) ); ?></div>
				</div>
			<?php endif; ?>
		</div><!-- .responsive-comments-list -->

	<?php endif; ?>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) :
		$count = count( $comments_by_type['pings'] );
		$txt   = __( 'Pings&#47;Trackbacks', 'responsive' );
		?>
		<div class="responsive-pings-list">
			<h6 id="pings"><?php printf( '%1$d %2$s for "%3$s"', esc_html( $count ), esc_html( $txt ), esc_html( get_the_title() ) ); ?></h6>
			<ol class="commentlist">
				<?php wp_list_comments( 'type=pings&max_depth=<em>' ); ?>
			</ol>
		</div><!-- .responsive-pings-list -->
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'responsive' ); ?></p>
	<?php endif; ?>

	<?php if ( 'below' === $comments_form_position ) {
		responsive_render_comment_form();
	} ?>

</div><!-- #comments -->

<?php Responsive\responsive_comments_after(); ?>