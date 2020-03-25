<?php
/**
 * Responsive Theme helper functions
 *
 * Queries WordPress.org API to get details on responsive theme where we can get the current version number
 *
 * @return bool
 *
 * @package Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Update social icon options
 *
 * @since    1.9.4.9
 */
function responsive_update_social_icon_options() {
	$responsive_options = Responsive\Core\responsive_get_options();
	// If new option does not exist then copy the option.
	if ( ! isset( $responsive_options['stumbleupon_uid'] ) ) {
		$responsive_options['stumbleupon_uid'] = $responsive_options['stumble_uid'];
	}

	// Update entire array.
	update_option( 'responsive_theme_options', $responsive_options );
}


	add_action( 'after_setup_theme', 'responsive_update_social_icon_options' );
	add_action( 'after_switch_theme', 'responsive_update_page_template_meta' );
/**
 * Update page templete meta data
 *
 * E.g: Change from `page-templates/full-width-page.php` to `full-width-page.php`
 *
 * This function only needes to be run once but it does not mater when. after_setup_theme should be fine.
 */
function responsive_update_page_template_meta() {
	$args = array(
		'post_type'  => 'page',
		'meta_query' => array(
			array(
				'key'     => '_wp_page_template',
				'value'   => 'default',
				'compare' => '!=',
			),
		),
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			$query->the_post();

			$meta_value         = get_post_meta( get_the_ID(), '_wp_page_template', true );
			$page_templates_dir = 'page-templates/';
			$conatins           = strpos( $meta_value, $page_templates_dir );

			if ( false !== $conatins ) {
				$meta_value = basename( $meta_value );
				update_post_meta( get_the_ID(), '_wp_page_template', $meta_value );
			}
		}
	}
}

/**
 * Responsive 2.0 update check
 *
 * Queries WordPress.org API to get details on responsive theme where we can get the current version number
 *
 * @return bool
 */
function responsive_theme_query() {

	$themes = get_theme_updates();

	$new_version = false;

	foreach ( $themes as $stylesheet => $theme ) {
		if ( 'responsive' == $stylesheet ) {
			$new_version = $theme->update['new_version'];
		}
	}

	// Check if we had a response and compare the current version on wp.org to version 2. If it is version 2 or greater display a message.
	if ( $new_version && version_compare( $new_version, '2', '>=' ) ) {
		return true;
	}

	return false;

}
