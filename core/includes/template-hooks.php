<?php
/**
 * Calls in content using theme hooks.
 *
 * @package responsive
 */

defined( 'ABSPATH' ) || exit;

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
 * @see top_header();
 * @see main_header();
 * @see bottom_header();
 */
add_action( 'responsive_top_header', 'top_header' );
add_action( 'responsive_main_header', 'main_header' );
add_action( 'responsive_bottom_header', 'bottom_header' );

/**
 * Responsive Header Columns
 *
 * @see header_column();
 */
add_action( 'responsive_render_header_column', 'header_column', 10, 2 );

/**
 * Responsive Mobile Header
 *
 * @see mobile_header();
 */
add_action( 'responsive_mobile_header', 'mobile_header' );

/**
 * Responsive Mobile Header Rows
 *
 * @see mobile_top_header();
 * @see mobile_main_header();
 * @see mobile_bottom_header();
 */
add_action( 'responsive_mobile_top_header', 'mobile_top_header' );
add_action( 'responsive_mobile_main_header', 'mobile_main_header' );
add_action( 'responsive_mobile_bottom_header', 'mobile_bottom_header' );

/**
 * Responsive Mobile Header Columns
 *
 * @see mobile_header_column();
 */
add_action( 'responsive_render_mobile_header_column', 'mobile_header_column', 10, 2 );

/**
 * Desktop Header Elements.
 *
 * @see site_branding();
 * @see primary_navigation();
 * @see secondary_navigation();
 * @see header_html();
 * @see header_button();
 * @see header_cart();
 * @see header_social();
 * @see header_search();
 */
add_action( 'responsive_site_branding', 'site_branding' );
add_action( 'responsive_primary_navigation', 'primary_navigation' );
add_action( 'responsive_secondary_navigation', 'secondary_navigation' );
add_action( 'responsive_header_html', 'header_html' );
add_action( 'responsive_header_button', 'header_button' );
add_action( 'responsive_header_cart', 'header_cart' );
add_action( 'responsive_header_social', 'responsive_get_social_icons' );
add_action( 'responsive_header_search', 'header_search' );
/**
 * Mobile Header Elements.
 *
 * @see mobile_site_branding();
 * @see navigation_popup_toggle();
 * @see mobile_navigation();
 * @see mobile_html();
 * @see mobile_button();
 * @see mobile_cart();
 * @see mobile_social();
 * @see primary_navigation();
 */
add_action( 'responsive_mobile_site_branding', 'mobile_site_branding' );
add_action( 'responsive_navigation_popup_toggle', 'navigation_popup_toggle' );
add_action( 'responsive_mobile_navigation', 'mobile_navigation' );
add_action( 'responsive_mobile_html', 'mobile_html' );
add_action( 'responsive_mobile_button', 'mobile_button' );
add_action( 'responsive_mobile_cart', 'mobile_cart' );
add_action( 'responsive_mobile_social', 'responsive_get_social_icons' );

/**
 * Main Call for responsive footer
 *
 * @see footer_markup();
 */
add_action( 'responsive_footer', 'footer_markup' );

/**
 * Footer Top Row
 *
 * @see top_footer();
 */
add_action( 'responsive_top_footer', 'top_footer' );

/**
 * Footer Middle Row
 *
 * @see middle_footer()
 */
add_action( 'responsive_middle_footer', 'middle_footer' );

/**
 * Footer Bottom Row
 *
 * @see bottom_footer()
 */
add_action( 'responsive_bottom_footer', 'bottom_footer' );

/**
 * Footer Column
 *
 * @see footer_column()
 */
add_action( 'responsive_render_footer_column', 'footer_column', 10, 2 );


/**
 * Footer Elements
 *
 * @see footer_html();
 * @see footer_navigation()
 * @see footer_social()
 */
add_action( 'responsive_footer_html', 'footer_html' );
add_action( 'responsive_footer_navigation', 'footer_navigation' );
add_action( 'responsive_footer_social', 'responsive_get_social_icons' );
