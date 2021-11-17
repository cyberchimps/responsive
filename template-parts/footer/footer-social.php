<?php
/**
 * Template part for displaying the Footer Social Module
 *
 * @package responsive
 */

namespace responsive;

$align        = get_theme_mod( 'footer_social_align', 'default' );
$tablet_align = get_theme_mod( 'footer_social_align', 'default' );
$mobile_align = get_theme_mod( 'footer_social_align', 'default' );

$valign        = get_theme_mod( 'footer_social_vertical_align', 'default' );
$tablet_valign = get_theme_mod( 'footer_social_vertical_align', 'default' );
$mobile_valign = get_theme_mod( 'footer_social_vertical_align', 'default' );
if ( ! wp_style_is( 'responsive-header', 'enqueued' ) ) {
	wp_enqueue_style( 'responsive-header' );
}
?>
<div class="footer-widget-area widget-area site-footer-focus-item footer-social content-align-<?php echo esc_attr( $align ); ?> content-tablet-align-<?php echo esc_attr( $tablet_align ); ?> content-mobile-align-<?php echo esc_attr( $mobile_align ); ?> content-valign-<?php echo esc_attr( $valign ); ?> content-tablet-valign-<?php echo esc_attr( $tablet_valign ); ?> content-mobile-valign-<?php echo esc_attr( $mobile_valign ); ?>" data-section="responsive_customizer_footer_social">
	<div class="footer-widget-area-inner footer-social-inner">
		<?php
		/**
		 * Responsive Footer Social
		 *
		 * Hooked responsive\footer_social
		 */
		do_action( 'responsive_footer_social', 'footer' );
		?>
	</div>
</div><!-- data-section="footer_social" -->
