<?php
/**
 * Template part for displaying the footer rows
 *
 * @package responsive
 */

?>
<div class="site-footer-wrap footer-bar">
	<?php
	/**
	 * Responsive Above footer
	 *
	 * Hooked responsive\above_footer
	 */
	do_action( 'responsive_above_footer' );
	/**
	 * Responsive Primary footer
	 *
	 * Hooked responsive\primary_footer
	 */
	do_action( 'responsive_primary_footer' );
	/**
	 * Responsive Below footer
	 *
	 * Hooked responsive\below_footer
	 */
	do_action( 'responsive_below_footer' );
	?>
</div>

