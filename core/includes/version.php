<?php
/**
 * Version Control
 *
 * @file           version.php
 * @package        WordPress
 * @subpackage     Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/includes/version.php
 * @link           N/A
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
/**
 * Responsive theme template data
 */
function responsive_template_data() {
	echo '<!-- We need this for debugging -->' . "\n";
	echo '<!-- ' . esc_html( responsive_get_template_name() ) . ' ' . esc_html( responsive_get_template_version() ) . ' -->' . "\n";
}

add_action( 'wp_head', 'responsive_template_data' );

/**
 * Responsive theme data
 */
function responsive_theme_data() {
	if ( is_child_theme() ) {
		echo '<!-- ' . esc_html( responsive_get_theme_name() ) . ' ' . esc_html( responsive_get_theme_version() ) . ' -->' . "\n";
	}
}

add_action( 'wp_head', 'responsive_theme_data' );

/**
 * Get theme name
 *
 * @return mixed theme name
 */
function responsive_get_theme_name() {
	$theme = wp_get_theme();

	return $theme->get( 'Name' );
}

/**
 * Get theme version
 *
 * @return mixed theme version
 */
function responsive_get_theme_version() {
	$theme = wp_get_theme();

	return $theme->get( 'Version' );
}

/**
 * Get Template name
 *
 * @return mixed template name
 */
function responsive_get_template_name() {
	$theme  = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent ) {
		$theme = $parent;
	}

	return $theme->get( 'Name' );
}

/**
 * Get template version
 *
 * @return mixed template version
 */
function responsive_get_template_version() {
	$theme  = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent ) {
		$theme = $parent;
	}

	return $theme->get( 'Version' );
}
