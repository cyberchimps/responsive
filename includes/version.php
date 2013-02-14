<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Version Control
 *
 *
 * @file           version.php
 * @package        WordPress 
 * @subpackage     Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/includes/version.php
 * @link           N/A
 * @since          available since Release 1.0
 */
?>
<?php
if ( function_exists('wp_get_theme')) {
	
function responsive_template_data() {
    echo '<!-- We need this for debugging -->' . "\n";
    echo '<!-- ' . get_responsive_template_name() . ' ' . get_responsive_template_version() . ' -->' . "\n";
}
 
add_action('wp_head', 'responsive_template_data');

function responsive_theme_data() {
    if ( is_child_theme() ) {
        echo '<!-- ' . get_responsive_theme_name() . ' ' . get_responsive_theme_version() . ' -->' . "\n";
    }
}

add_action('wp_head', 'responsive_theme_data');

function get_responsive_theme_name() {
	$theme = wp_get_theme();
	return $theme->Name;
}

function get_responsive_theme_version() {
	$theme = wp_get_theme();
	return $theme->Version;	
}

function get_responsive_template_name() {
	$theme = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent )
		$theme = $parent;
	
	return $theme->Name;
}

function get_responsive_template_version() {
	$theme = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent )
		$theme = $parent;

	return $theme->Version;	
}

} else {
	
/**
 * < 3.4 Backward Compatibility
 *
 * Konstantin Kovshenin Contribution
 *
 */
	
$theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
define('responsive_current_theme', $theme_name = $theme_data['Name']);

function responsive_template_data() {

    $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    $responsive_template_name = $theme_data['Name'];
    $responsive_template_version = $theme_data['Version'];

    echo '<!-- We need this for debugging -->' . "\n";
    echo '<meta name="template" content="' . $responsive_template_name . ' ' . $responsive_template_version . '" />' . "\n";
}

add_action('wp_head', 'responsive_template_data');

function responsive_theme_data() {
    if (is_child_theme()) {
        $theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
        $responsive_theme_name = $theme_data['Name'];
        $responsive_theme_version = $theme_data['Version'];

        echo '<meta name="theme" content="' . $responsive_theme_name . ' ' . $responsive_theme_version . '" />' . "\n";
    }
}

add_action('wp_head', 'responsive_theme_data');
}