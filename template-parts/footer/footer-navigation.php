<?php
/**
 * Template part for displaying the header Social Modual
 *
 * @package responsive
 */

$align        = get_theme_mod( 'responsive_footer_navigation_align_desktop', 'default' );
$tablet_align = get_theme_mod( 'responsive_footer_navigation_align_tablet', 'default' );
$mobile_align = get_theme_mod( 'responsive_footer_navigation_align_mobile', 'default' );

$valign        = get_theme_mod( 'responsive_footer_navigation_vertical_align_desktop', 'default' );
$tablet_valign = get_theme_mod( 'responsive_footer_navigation_vertical_align_tablet', 'default' );
$mobile_valign = get_theme_mod( 'responsive_footer_navigation_vertical_align_mobile', 'default' );

?>
<div class="footer-widget-area widget-area site-footer-focus-item footer-navigation-wrap content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?> footer-navigation-layout-stretch-<?php echo ( get_theme_mod( 'footer_navigation_stretch' ) ? 'true' : 'false' ); ?>" data-section="responsive_customizer_footer_navigation">
	<div class="footer-widget-area-inner footer-navigation-inner">
		<?php
		/**
		 * Responsive Footer Navigation
		 *
		 * Hooked responsive\footer_navigation
		 */
		do_action( 'responsive_footer_navigation' );
		?>
	</div>
</div><!-- data-section="footer_navigation" -->
