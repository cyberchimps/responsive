<?php
/**
 * Footer Template
 *
 * @file           footer-menu.php
 * @package        Responsive
 */

?>
<nav id="footer-site-navigation" class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'responsive' ); ?>">
    <h2 class="screen-reader-text"><?php esc_html_e( 'Footer Menu', 'responsive' ); ?></h2>
	<?php
	wp_nav_menu(
		array(
			'container'      => false,
			'menu_id'        => 'footer-menu',
			'theme_location' => 'footer-menu',
			'depth'          => '1',
		)
	);
	?>
</nav>
