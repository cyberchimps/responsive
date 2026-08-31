<?php
/**
 * Navigation template part
 *
 * @package responsive
 * @since 4.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get mobile menu settings for class names
$mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
$off_canvas_panel_move_body = get_theme_mod( 'responsive_header_mobile_off_canvas_move_body', 0 );
$off_canvas_panel_content_alignment = get_theme_mod( 'responsive_header_mobile_off_canvas_content_alignment', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_mobile_off_canvas_content_alignment' ) );

// Build navigation classes
$nav_classes = array( 'main-navigation' );

// Move Body class
if ( 1 === $off_canvas_panel_move_body ) {
	$nav_classes[] = 'off-canvas-move-body-enabled';
}

// Content Alignment class
if ( ! empty( $off_canvas_panel_content_alignment ) ) {
	$nav_classes[] = 'off-canvas-content-alignment-' . esc_attr( $off_canvas_panel_content_alignment );
}

$nav_class_string = implode( ' ', $nav_classes );

?>
<div class="site-header-item site-header-focus-item site-header-item-main-navigation">
	<nav id="site-navigation" class="<?php echo esc_attr( $nav_class_string ); ?>" role="navigation"  <?php responsive_schema_markup( 'site-title' ); ?> aria-label="<?php esc_attr_e( 'Main Menu', 'responsive' ); ?>" >
		<p class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'responsive' ); ?></p>
		<div class="main-navigation-wrapper">
			<?php
			if ( function_exists( 'responsive_hamburger_menu_label' ) ) {
				$hamburger_menu_label = responsive_hamburger_menu_label();
			} else {
				$hamburger_menu_label = '';
			}
			// Check if toggle button is present in mobile header builder
			$show_hamburger_toggle = false;
			$svg_markup = '';
			if ( function_exists( '\Responsive\Core\responsive_check_element_in_mobile_tablet_items' ) )
			{
				$show_hamburger_toggle = \Responsive\Core\responsive_check_element_in_mobile_tablet_items('toggle_button', 'header');
			}
			if( $show_hamburger_toggle )
			{
				// Get the toggle icon 
				$toggle_button_icon  = get_theme_mod(
					'responsive_header_toggle_button_icon',
					Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon' )
				);
				// Load inline SVG markup and remove stroke/outline
				$svg_markup = Responsive\Core\responsive_get_svg_inline( esc_attr( $toggle_button_icon ) );
			
			
			?>
			
			<button class="menu-toggle" aria-controls="header-menu" aria-expanded="false"><?php echo $svg_markup; ?><span class="hamburger-menu-label"><?php printf( esc_html( $hamburger_menu_label ) ); ?></span><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'responsive' ); ?></span></button>
			<?php } ?>
			<?php
			$disable_menu = get_theme_mod( 'responsive_disable_menu', 0 );

			if ( 0 === $disable_menu ) {
				wp_nav_menu(
					apply_filters(
						'responsive_nav_menu_arg',
						array(
							'container'      => false,
							'menu_id'        => 'header-menu',
							'fallback_cb'    => 'responsive_fallback_menu',
							'theme_location' => 'header-menu',
						)
					)
				);
			}
			?>
		</div>
	</nav>
	<!-- Adding Overlay Div When Mobile menu is Sidebar menu -->
	<?php if ( 'sidebar' === $mobile_menu_style ) : ?>
		<div id="sidebar-menu-overlay" class="sidebar-menu-overlay"></div>
	<?php endif; ?>
</div>
