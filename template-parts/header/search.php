<?php
/**
 * Template part for displaying the header Search Modual
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_header_search">
	<?php
	/**
	 * Responsive Header Search
	 *
	 * Hooked Responsive\header_search
	 */
	do_action( 'responsive_header_search' );
	?>
</div><!-- data-section="header_search" -->
