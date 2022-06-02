<?php
/**
 * Template part for displaying the footer info
 *
 * @package responsive
 */

$align        = get_theme_mod( 'responsive_footer_widget5_align_desktop', 'left' );
$tablet_align = get_theme_mod( 'responsive_footer_widget5_align_tablet', 'left' );
$mobile_align = get_theme_mod( 'responsive_footer_widget5_align_mobile', 'left' );

$valign        = get_theme_mod( 'responsive_footer_widget5_vertical_align_desktop', 'default' );
$tablet_valign = get_theme_mod( 'responsive_footer_widget5_vertical_align_tablet', 'default' );
$mobile_valign = get_theme_mod( 'responsive_footer_widget5_vertical_align_mobile', 'default' );

?>
<div class="footer-widget-area widget-area site-footer-focus-item footer-widget5 content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?>" data-section="sidebar-widgets-footer5">
	<div class="footer-widget-area-inner site-info-inner">
		<?php
		dynamic_sidebar( 'footer-widget-5' );
		?>
	</div>
</div><!-- .footer-widget5 -->
