<?php
/**
 * Template part for displaying the footer info
 *
 * @package responsive
 */

namespace responsive;

$align        = get_theme_mod( 'footer_html_align', 'default' );
$tablet_align = get_theme_mod( 'footer_html_align', 'default' );
$mobile_align = get_theme_mod( 'footer_html_align', 'default' );

$valign        = get_theme_mod( 'footer_html_vertical_align', 'default' );
$tablet_valign = get_theme_mod( 'footer_html_vertical_align', 'default' );
$mobile_valign = get_theme_mod( 'footer_html_vertical_align', 'default' );

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
