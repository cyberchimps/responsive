<?php
/**
 * Functions file for Gutenberg support.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to add customizer color options to gutenberg color palette.
 */
function responsive_gutenberg_color_palette() {

    $responsive_gutenberg_color_options = array(

        // Button colors.
        array(
            'name'  => __( 'Button Color', 'responsive' ),
            'slug'  => 'button-color',
            'color' => esc_html( get_theme_mod( 'button-color', '#1874cd' ) ),
        ),
        array(
            'name'  => __( 'Button Hover Color', 'responsive' ),
            'slug'  => 'button-hover-color',
            'color' => esc_html( get_theme_mod( 'button-hover-color', '#7db7f0' ) ),
        ),
        array(
            'name'  => __( 'Button Hover Text Color', 'responsive' ),
            'slug'  => 'button-hover-text-color',
            'color' => esc_html( get_theme_mod( 'button-hover-text-color', '#333333' ) ),
        ),
        array(
            'name'  => __( 'Button Text Color', 'responsive' ),
            'slug'  => 'button-text-color',
            'color' => esc_html( get_theme_mod( 'button-text-color', '#ffffff' ) ),
        ),

        // Blog Post Background Color.
        array(
            'name'  => __( 'Blog Post Background Color', 'responsive' ),
            'slug'  => 'responsive-container-background-color',
            'color' => esc_html( get_theme_mod( 'responsive_container_background_color') ),
        ),

        // Container Background Color.
        array(
            'name'  => __( 'Container Background Color', 'responsive' ),
            'slug'  => 'responsive-main-container-background-color',
            'color' => esc_html( get_theme_mod( 'responsive_main_container_background_color') ),
        ),
    );

    return $responsive_gutenberg_color_options;
}

/**
 * Add custom color classes to Gutenberg
 *
 * @param array $responsive_gutenberg_color_options List of customizer color options for Gutenberg editor.
 */
function responsive_gutenberg_colors( $responsive_gutenberg_color_options ) {

    if ( empty( $responsive_gutenberg_color_options ) ) {
        return;
   }
    $css = '';
    foreach ( $responsive_gutenberg_color_options as $color ) {
        if(!empty($color['color'])) {
            $custom_color = get_theme_mod( $color['slug'], $color['color'] );
            $css .= '.has-' . $color['slug'] . '-color { color: ' . esc_attr( $custom_color ) . '; }';
            $css .= '.has-' . $color['slug'] . '-background-color { background-color: ' . esc_attr( $custom_color ) . '; }';
        }
   }
	return wp_strip_all_tags( $css );
}
