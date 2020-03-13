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
?>
<?php if ( post_password_required() ) { ?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'responsive' ); ?></p>

	<?php
	return;
}
?>

<?php if ( have_comments() ) : ?>
	<div class="comments-area">
		<h3 id="comments">
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
				<!-- end of .previous -->
				<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;', 'responsive' ) ); ?></div>
				<!-- end of .next -->
			</div><!-- end of.navigation -->
		<?php endif; ?>

		<ol class="commentlist">
			<?php wp_list_comments( 'avatar_size=50&type=comment' ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments', 'responsive' ) ); ?></div>
				<!-- end of .previous -->
				<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;', 'responsive' ) ); ?></div>
				<!-- end of .next -->
			</div><!-- end of.navigation -->
		<?php endif; ?>
	</div><!-- end of comments area -->
	<?php else : ?>

	<?php endif; ?>

	<?php
	if ( ! empty( $comments_by_type['pings'] ) ) : // let's seperate pings/trackbacks from comments.
		$count                  = count( $comments_by_type['pings'] );
		( 1 !== $count ) ? $txt = __( 'Pings&#47;Trackbacks', 'responsive' ) : $txt = __( 'Pings&#47;Trackbacks', 'responsive' );
		?>

		<?php /* translators: 1 : Count, 2 : Pings 3 : Post title */ ?>
		<h6 id="pings"><?php printf( '%1$d %2$s for "%3$s"', esc_html( $count ), esc_html( $txt ), esc_html( get_the_title() ) ); ?></h6>

		<ol class="commentlist">
			<?php wp_list_comments( 'type=pings&max_depth=<em>' ); ?>
		</ol>


	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

		<?php
		$fields = array(
			'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name', 'responsive' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'E-mail', 'responsive' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
			'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'responsive' ) . '</label>' .
			'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

		$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', $fields ) );

		comment_form( $defaults );
		?>


<?php endif; ?>
