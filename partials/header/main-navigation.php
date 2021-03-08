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

?>
<nav id="site-navigation" class="main-navigation" role="navigation"  <?php responsive_schema_markup( 'site-title' ); ?> aria-label="<?php esc_attr_e( 'Main Menu', 'responsive' ); ?>" >
	<h2 class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'responsive' ); ?></h2>
	<div class="main-navigation-wrapper">
		<?php
		if ( function_exists( 'responsive_hamburger_menu_label' ) ) {
			$hamburger_menu_label = responsive_hamburger_menu_label();
		} else {
			$hamburger_menu_label = '';
		}
		?>
		<button class="menu-toggle" aria-controls="header-menu" aria-expanded="false"><i class="icon-bars"></i><span class="hamburger-menu-label"><?php printf( esc_html( $hamburger_menu_label ) ); ?></span><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'responsive' ); ?></span></button>

		<?php $disable_menu = get_theme_mod( 'responsive_disable_menu', 0 );

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
<?php if ( 'sidebar' === get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' ) ) : ?>
	<div id="sidebar-menu-overlay" class="sidebar-menu-overlay"></div>
<?php endif; ?>
