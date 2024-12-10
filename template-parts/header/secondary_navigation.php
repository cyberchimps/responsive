<?php
/**
 * Secondary Navigation template part
 *
 * @package responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="site-header-item site-header-focus-item site-header-item-secondary-navigation" data-section="responsive_header_secondary_menu">
	<nav id="site-secondary-navigation" class="secondary-navigation" role="navigation"  <?php responsive_schema_markup( 'site-title' ); ?> aria-label="<?php esc_attr_e( 'Secondary Menu', 'responsive' ); ?>">
		<p class="screen-reader-text"><?php esc_html_e( 'Secondary Navigation', 'responsive' ); ?></p>
		<div class="secondary-navigation-wrapper">
			<?php
				wp_nav_menu(
					apply_filters(
						'responsive_nav_secondary_menu_arg',
						array(
							'container'      => false,
							'menu_id'        => 'header-secondary-menu',
							'fallback_cb'    => false,
							'theme_location' => 'secondary-menu',
						)
					)
				);
			?>
		</div>
	</nav>
</div>

