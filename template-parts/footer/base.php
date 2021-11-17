<?php
/**
 * Template part for displaying the footer info
 *
 * @package responsive
 */

namespace responsive;

?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-footer-wrap">
		<?php
		/**
		 * Responsive Top footer
		 *
		 * Hooked responsive\top_footer
		 */
		do_action( 'responsive_top_footer' );
		/**
		 * Responsive Middle footer
		 *
		 * Hooked responsive\middle_footer
		 */
		do_action( 'responsive_middle_footer' );
		/**
		 * Responsive Bottom footer
		 *
		 * Hooked responsive\bottom_footer
		 */
		do_action( 'responsive_bottom_footer' );
		?>
	</div>
</footer><!-- #colophon -->

