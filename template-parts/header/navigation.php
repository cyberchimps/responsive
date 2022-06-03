<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package responsive
 */

namespace Responsive\Core;

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation header-navigation-layout-stretch-<?php echo ( get_theme_mod( 'responsive_stretch_primary_navigation', 0 ) ? 'true' : 'false' ); ?> header-navigation-layout-fill-stretch-<?php echo ( get_theme_mod( 'responsive_primary_navigation_fill_stretch', 0 ) ? 'true' : 'false' ); ?>" data-section="responsive_customizer_primary_navigation">
	<?php
	/**
	 * Responsive Primary Navigation
	 *
	 * Hooked Responsive\primary_navigation
	 */
	do_action( 'responsive_primary_navigation' );
	?>
</div><!-- data-section="primary_navigation" -->
