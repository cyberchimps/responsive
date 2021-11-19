<?php
/**
 * Template part for displaying the footer info
 *
 * @package responsive
 */

namespace responsive;

$align        = get_theme_mod( 'footer_widget1_align', 'default' );
$tablet_align = get_theme_mod( 'footer_widget1_align', 'default' );
$mobile_align = get_theme_mod( 'footer_widget1_align', 'default' );

$valign        = get_theme_mod( 'footer_widget1_vertical_align', 'default' );
$tablet_valign = get_theme_mod( 'footer_widget1_vertical_align', 'default' );
$mobile_valign = get_theme_mod( 'footer_widget1_vertical_align', 'default' );

?>
<div class="footer-widget-area widget-area site-footer-focus-item footer-widget1 content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?>" data-section="sidebar-widgets-footer1">
	<div class="footer-widget-area-inner site-info-inner">
		<?php
		dynamic_sidebar( 'footer-widget-1' );
		?>
	</div>
</div><!-- .footer-widget1 -->
