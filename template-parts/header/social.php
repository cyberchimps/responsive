<?php
/**
 * Template part for displaying the header Social Modual
 *
 * @package kadence
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_header_social">
	<?php
	/**
	 * Responsive Header Social
	 *
	 * Hooked Responsive\header_social
	 */
	do_action( 'responsive_header_social', '_header' );
	?>
</div><!-- data-section="header_social" -->