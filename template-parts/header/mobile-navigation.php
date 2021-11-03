<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item site-header-item-mobile-navigation mobile-navigation-layout-stretch-<?php echo ( get_theme_mod( 'responsive_stretch_mobile_navigation', 0 ) ? 'true' : 'false' ); ?>" data-section="responsive_customizer_mobile_navigation">
	<?php
	/**
	 * Responsive Mobile Navigation
	 *
	 * Hooked Responsive\mobile_navigation
	 */
	do_action( 'responsive_mobile_navigation' );
	?>
</div><!-- data-section="mobile_navigation" -->
