<?php
/**
 * Template part for displaying the Toggle Button Element
 *
 * @package responsive
 * @since 4.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get hamburger menu label
if ( function_exists( 'responsive_hamburger_menu_label' ) ) {
	$hamburger_menu_label = responsive_hamburger_menu_label();
} else {
	$hamburger_menu_label = '';
}

// Get the toggle icon 
$toggle_button_icon = get_theme_mod(
	'responsive_header_toggle_button_icon',
	Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon' )
);

// Load inline SVG markup
$svg_markup = '';
if ( function_exists( '\Responsive\Core\responsive_get_svg_inline' ) ) {
	$svg_markup = Responsive\Core\responsive_get_svg_inline( esc_attr( $toggle_button_icon ) );
}

?>
<div class="site-header-item site-header-focus-item site-header-item-toggle-button" data-section="responsive_customizer_header_toggle_button">
	<button class="menu-toggle" aria-controls="responsive-off-canvas-panel" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Menu', 'responsive' ); ?>">
		<?php echo $svg_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php if ( ! empty( $hamburger_menu_label ) ) : ?>
			<span class="hamburger-menu-label"><?php echo esc_html( $hamburger_menu_label ); ?></span>
		<?php endif; ?>
		<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'responsive' ); ?></span>
	</button>
</div>

