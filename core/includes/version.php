<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Version Control
 *
 *
 * @file           version.php
 * @package        WordPress
 * @subpackage     Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/includes/version.php
 * @link           N/A
 * @since          available since Release 1.0
 */
?>
<?php
function responsive_template_data() {
	echo '<!-- We need this for debugging -->' . "\n";
	echo '<!-- ' . get_responsive_template_name() . ' ' . get_responsive_template_version() . ' -->' . "\n";
}

add_action( 'wp_head', 'responsive_template_data' );

function responsive_theme_data() {
	if ( is_child_theme() ) {
		echo '<!-- ' . get_responsive_theme_name() . ' ' . get_responsive_theme_version() . ' -->' . "\n";
	}
}

add_action( 'wp_head', 'responsive_theme_data' );

function get_responsive_theme_name() {
	$theme = wp_get_theme();

	return $theme->Name;
}

function get_responsive_theme_version() {
	$theme = wp_get_theme();

	return $theme->Version;
}

function get_responsive_template_name() {
	$theme  = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent ) {
		$theme = $parent;
	}

	return $theme->Name;
}

function get_responsive_template_version() {
	$theme  = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent ) {
		$theme = $parent;
	}

	return $theme->Version;
}