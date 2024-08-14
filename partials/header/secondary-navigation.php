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
<nav id="site-secondary-navigation" class="secondary-navigation" role="navigation"  <?php responsive_schema_markup( 'site-title' ); ?> aria-label="<?php esc_attr_e( 'Secondary Menu', 'responsive' ); ?>">
	<p class="screen-reader-text"><?php esc_html_e( 'Secondary Navigation', 'responsive' ); ?></p>
	<div class="secondary-navigation-wrapper">
		<?php
		$disable_secondary_menu = get_theme_mod( 'responsive_disable_secondary_menu', 0 );

		if ( 0 === $disable_secondary_menu ) {

			wp_nav_menu(
				apply_filters(
					'responsive_nav_secondary_menu_arg',
					array(
						'container'      =>  false,
						'menu_id'        => 'header-secondary-menu',
						'fallback_cb'    => 'responsive_fallback_menu',
						'theme_location' => 'secondary-menu',
					)
				)
			);
		}
		?>
	</div>
</nav>
