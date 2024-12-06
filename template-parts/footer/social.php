<?php
/**
 * Template part for displaying the footer Socials.
 *
 * @package responsive
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}
?>
<div class="footer-widget-area footer-social-icons" data-section="responsive-customizer-footer-social">
	<?php
	/**
	 * Responsive footer Social
	 *
	 * Hooked Responsive\footer_social
	 */
	do_action( 'responsive_footer_social', '_footer' );
	?>
</div><!-- data-section="footer_social" -->