<?php
/**
 * Template part for displaying the footer info
 *
 * @package responsive
 */

$align        = get_theme_mod( 'responsive_footer_html_align_desktop', 'left' );
$tablet_align = get_theme_mod( 'responsive_footer_html_align_tablet', 'left' );
$mobile_align = get_theme_mod( 'responsive_footer_html_align_mobile', 'center' );

$valign        = get_theme_mod( 'responsive_footer_html_vertical_align_desktop', 'default' );
$tablet_valign = get_theme_mod( 'responsive_footer_html_vertical_align_tablet', 'default' );
$mobile_valign = get_theme_mod( 'responsive_footer_html_vertical_align_mobile', 'default' );

?>

<div class="footer-widget-area site-info site-footer-focus-item content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?>" data-section="responsive_customizer_footer_html">
	<div class="footer-widget-area-inner site-info-inner">
		<?php
		/**
		 * Responsive Footer HTML
		 *
		 * Hooked responsive\footer_html
		 */
		do_action( 'responsive_footer_html' );
		?>
	</div>
</div><!-- .site-info -->
