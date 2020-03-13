<?php
/**
 * No-Posts Loop Content Template-Part File
 *
 * @file           loop-no-posts.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/loop-no-posts.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * If there are no posts in the loop,
 * display default content
 */
/* translators: %s search term */
$responsive_title = ( is_search() ? sprintf( __( 'Your search for %s did not match any entries.', 'responsive' ), get_search_query() ) : __( '404 &#8212; Fancy meeting you here!', 'responsive' ) );

?>
<div class="entry-column">
	<section id="404" class="hentry">
		<h1 class="title-404"><?php echo esc_html( $responsive_title ); ?></h1>
		<p><?php esc_html_e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive' ); ?></p>

		<h6>
			<?php
			printf(
				/* translators: %s: link */
				wp_kses_post( 'You can return %s or search for the page you were looking for.', 'responsive' ),
				sprintf(
					'<a href="%1$s" aria-label="%2$s" title="%2$s">%3$s</a>',
					esc_url( get_home_url() ),
					esc_attr__( 'Home', 'responsive' ),
					esc_attr__( '&larr; Home', 'responsive' )
				)
			);
			?>
			</h6>

			<?php get_search_form(); ?>
	</section>
</div>
