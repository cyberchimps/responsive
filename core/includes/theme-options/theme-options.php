<?php
/**
 * Theme Options
 *
 * @file           theme-options.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.9.6
 * @filesource     wp-content/themes/responsive/includes/theme-options.php
 * @link           http://themeshaper.com/2010/06/03/sample-theme-options/
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Call the options class
 */
require get_template_directory() . '/core/includes/classes/Responsive_Options.php';

/**
 * Add inline css
 */
function responsive_inline_css() {
	global $responsive_options;
	if ( ! empty( $responsive_options['responsive_inline_css'] ) ) {
		echo '<!-- Custom CSS Styles -->' . "\n";
		echo '<style type="text/css" media="screen">' . "\n";
		echo $responsive_options['responsive_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action( 'wp_head', 'responsive_inline_css', 110 );

/**
 * Add inline js to head
 */
function responsive_inline_js_head() {
	global $responsive_options;
	if ( ! empty( $responsive_options['responsive_inline_js_head'] ) ) {
		echo '<!-- Custom Scripts -->' . "\n";
		echo $responsive_options['responsive_inline_js_head'];
		echo "\n";
	}
}

add_action( 'wp_head', 'responsive_inline_js_head' );

/**
 * Add inline js to footer
 */
function responsive_inline_js_footer() {
	global $responsive_options;
	if ( ! empty( $responsive_options['responsive_inline_js_footer'] ) ) {
		echo '<!-- Custom Scripts -->' . "\n";
		echo $responsive_options['responsive_inline_js_footer'];
		echo "\n";
	}
}

add_action( 'wp_footer', 'responsive_inline_js_footer' );
