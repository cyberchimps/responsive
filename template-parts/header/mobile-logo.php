<?php
/**
 * Template part for displaying the header branding/logo
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item" data-section="title_tagline">
	<?php
	/**
	 * Responsive Mobile Site Branding
	 *
	 * Hooked Responsive\mobile_site_branding
	 */
	do_action( 'responsive_mobile_site_branding' );
	?>
</div><!-- data-section="title_tagline" -->
