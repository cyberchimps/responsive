<?php
/**
 * Outputs the customizer styles.
 *
 * @package Responsive
 * @since 0.2
 */

/**
 * Outputs the custom styles for the theme.
 *
 * @return void
 */
function responsive_premium_custom_color_styles() {
	$text_color             = get_theme_mod( 'text-color', '#333333' );
	$heading_text_color     = get_theme_mod( 'heading-text-color', '#333333' );
	$link_color             = get_theme_mod( 'link-color', '#078ce1' );
	$link_hover_color       = get_theme_mod( 'link-hover-color', '#10659c' );
	$button_color           = get_theme_mod( 'button-color', '#333333' );
	$button_hover_color     = get_theme_mod( 'button-hover-color', '#333333' );
	$button_text_color      = get_theme_mod( 'button-text-color', '#078ce1' );
	$label_color            = get_theme_mod( 'label-color', '#10659c' );
	$input_background_color = get_theme_mod( 'input-background-color', '#078ce1' );
	$container_width        = get_theme_mod( 'responsive_main_container_width', '1200' );
	$layout_style           = get_theme_mod( 'responsive_layout_styles', 'minimal' );
	$input_border_color_fs  = get_theme_mod( 'input-border-color-focus', '#eaeaea' );
	$input_border_color     = get_theme_mod( 'input-border-color', '#eaeaea' );

	$custom_css = "
		body * {
			color: {$text_color};
		}
		h1,h2,h3,h4,h5,h6,
		.theme-heading,
		.widget-title,
		.responsive-widget-recent-posts-title,
		.comment-reply-title,
		.entry-title a,
		entry-title,
		.sidebar-box,
		.widget-title,
		.site-title a, .site-description {
			color: {$heading_text_color};
		}
		a {
			color: {$link_color};
		}
		a:hover {
			color: {$link_hover_color};
		}
		input {
			background-color: {$input_background_color};
			border-color: {$input_border_color};
		}
		input:focus {
			background-color: {$input_background_color};
			border-color: {$input_border_color_fs};
		}
		button, input[type='submit'], input[type=button] {
			color: {$button_text_color};
			background-color: {$button_color};
		}
		button:hover, input[type='submit']:hover, input[type=button]:hover {
				background-color: {$button_hover_color};
		}
		label {
			color: {$label_color};
		}
		.fullwidth-layout
		.container {
			width: {$container_width}px;
		}
		.boxed-layout
		.content-area {
			width: {$container_width}px;
		}
	";

	wp_add_inline_style( 'responsive-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'responsive_premium_custom_color_styles', 100 );
