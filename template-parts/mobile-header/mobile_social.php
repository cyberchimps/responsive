<?php
/**
 * Template part for displaying the header Social Modual
 *
 * @package responsive
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}
?>
<div class="site-mobile-header-item site-header-focus-item" data-section="responsive_customizer_mobile_header_social">
	<?php
	/**
	 * Responsive Mobile Header Social
	 *
	 * Hooked Responsive\header_social
	 */
	do_action( 'responsive_header_social', '_mobile_header' );
	?>
</div><!-- data-section="mobile_header_social" -->