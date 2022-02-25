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
	 * Responsive Site Branding
	 *
	 * Hooked Responsive\site_branding
	 */
	do_action( 'responsive_site_branding' );
	?>
</div><!-- data-section="title_tagline" -->
