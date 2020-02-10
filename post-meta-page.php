<?php
/**
 * Page Meta-Data Template-Part File
 *
 * @file           post-meta-page.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/post-meta-page.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<?php if ( get_post_type() == 'page' && is_search() ) : ?>
		<h1 class="entry-title post-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<?php else : ?>
		<h1 class="entry-title post-title" itemprop="headline"><?php the_title(); ?></h1>
	<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div class="post-meta">
		<?php
		responsive_post_meta_data();
		if ( comments_open() ) :
			?>
			<span class="entry-comment">
				<span class="comments-link">
					<span class="mdash"><i class="icon-comments-o" aria-hidden="true"></i></span>
						<?php comments_popup_link( __( 'No Comments', 'responsive' ), __( '1 Comment', 'responsive' ), __( '% Comments', 'responsive' ) ); ?>
				</span>
			</span>
		<?php endif; ?>
	</div><!-- end of .post-meta -->
<?php endif; ?>
