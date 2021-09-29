<?php
/**
 * Top bar menu template part
 *
 * @package responsive
 * @since 4.6.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="top-bar-menu-container">

<?php

$top_bar_menu_width_class = ( 1 === get_theme_mod( 'responsive_enable_top_bar_menu_full_width', 0 ) ) ? 'full-width' : 'contained';
wp_nav_menu(
	array(
		'theme_location'  => 'top-bar-menu',
		'container'       => 'div',
		'container_class' => 'main-navigation top-bar-navigation ' . $top_bar_menu_width_class,
		'menu_id'         => 'top-bar-menu',
		'menu_class'      => 'menu topbar-menu',
		'link_after'      => '<span class="res-iconify"><span class="screen-reader-text">' . __( 'Show sub menu', 'responsive' ) . '</span><svg width="10" height="6" viewBox="-2.5 -5 75 60" preserveAspectRatio="none"><path d="M0,0 l35,50 l35,-50" fill="none" stroke-linecap="round" stroke-width="10" /></svg></span>',
		'fallback_cb'     => false,
	)
);

?>

</div>
