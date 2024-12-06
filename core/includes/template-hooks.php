<?php
/**
 * Calls in content using theme hooks.
 *
 * @package responsive
 */

// Exit if accessed directly.
if( ! defined( 'ABSPATH' ) ) {
   exit;
}

require get_template_directory() . '/core/includes/template-functions/header-functions.php';
require get_template_directory() . '/core/includes/template-functions/footer-functions.php';

/**
 * Responsive Header.
 *
 * @see Responsive\header_markup();
 */
add_action( 'responsive_header', 'header_markup' );

/**
 * Responsive Header Rows
 *
 * @see above_header();
 * @see primary_header();
 * @see below_header();
 */
add_action( 'responsive_above_header', 'above_header' );
add_action( 'responsive_primary_header', 'primary_header' );
add_action( 'responsive_below_header', 'below_header' );
add_action( 'responsive_header_social', 'responsive_get_social_icons' );

/**
 * Responsive Header Columns
 *
 * @see header_column();
 */
add_action( 'responsive_render_header_column', 'header_column', 10, 2 );

/**
 * Main Call for responsive footer
 *
 * @see footer_markup();
 */
add_action( 'responsive_footer', 'footer_markup' );

/**
 * Footer Above Row
 *
 * @see above_footer();
 */
add_action( 'responsive_above_footer', 'above_footer' );

/**
 * Footer Primary Row
 *
 * @see primary_footer()
 */
add_action( 'responsive_primary_footer', 'primary_footer' );

/**
 * Footer Below Row
 *
 * @see below_footer()
 */
add_action( 'responsive_below_footer', 'below_footer' );

/**
 * Footer Column
 *
 * @see footer_column()
 */
add_action( 'responsive_render_footer_column', 'footer_column', 10, 2 );

add_action( 'responsive_footer_social', 'responsive_get_social_icons' );