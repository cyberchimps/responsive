<?php
/**
 * Template part for displaying the a button in the mobile header.
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_mobile_button">
	<?php
	/**
	 * Responsive Mobile Header Button
	 *
	 * Hooked Responsive\mobile_button
	 */
	do_action( 'responsive_mobile_button' );
	?>
</div><!-- data-section="mobile_button" -->
