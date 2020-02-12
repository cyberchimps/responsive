<?php
/**
 * Footer Template
 *
 * @file           footer-menu.php
 * @package        Responsive
 */

?>
<nav id="footer-site-navigation" class="footer-navigation" role="navigation">
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
