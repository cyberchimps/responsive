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
		<button class="menu-toggle" aria-controls="header-menu" aria-expanded="false"><i class="icon-bars"></i><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'responsive' ); ?></span></button>

		<?php
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_id'        => 'header-menu',
				'fallback_cb'    => 'Responsive\Core\\responsive_fallback_menu',
				'theme_location' => 'header-menu',
			)
		);
		?>
	</div>
</nav>
<!-- Adding Overlay Div When Mobile menu is Sidebar menu -->
<?php if ( 'sidebar' === get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' ) ) : ?>
	<div id="sidebar-menu-overlay" class="sidebar-menu-overlay"></div>
<?php endif; ?>
