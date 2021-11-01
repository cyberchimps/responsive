<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( get_theme_mod( 'secondary_navigation_stretch' ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( get_theme_mod( 'secondary_navigation_fill_stretch' ) ? 'true' : 'false' ); ?>" data-section="responsive_customizer_secondary_navigation">
	<?php
	/**
	 * Responsive Secondary Navigation
	 *
	 * Hooked Responsive\secondary_navigation
	 */
	do_action( 'responsive_secondary_navigation' );
	?>
</div><!-- data-section="secondary_navigation" -->
