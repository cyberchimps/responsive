<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item site-header-item-navgation-popup-toggle" data-section="responsive_customizer_mobile_trigger">
	<?php
	/**
	 * Responsive Mobile Navigation Popup Toggle
	 *
	 * Hooked Responsive\navigation_popup_toggle
	 */
	do_action( 'responsive_navigation_popup_toggle' );
	?>
</div><!-- data-section="mobile_trigger" -->
