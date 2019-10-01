<?php
/**
 * Mobile nav template part.
 *
 * @package Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?> <?php
	wp_nav_menu(
		array(
			'container'      => false,
			'fallback_cb'    => 'false',
			'theme_location' => 'header-menu',
		)
	);
