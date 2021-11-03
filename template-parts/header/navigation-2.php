<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( get_theme_mod( 'responsive_stretch_secondary_navigation', 0 ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( get_theme_mod( 'responsive_secondary_navigation_fill_stretch', 0 ) ? 'true' : 'false' ); ?>" data-section="responsive_customizer_secondary_navigation">
	<?php
	/**
	 * Responsive Secondary Navigation
	 *
	 * Hooked Responsive\secondary_navigation
	 */
	do_action( 'responsive_secondary_navigation' );
	?>
</div><!-- data-section="secondary_navigation" -->
