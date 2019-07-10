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
	$body_typoghrapy       = get_theme_mod( 'body_typography' );
	$headings_typography       = get_theme_mod( 'headings_typography' );
	$text_color             = get_theme_mod( 'text-color', '' );
	$heading_text_color     = get_theme_mod( 'heading-text-color', '' );
	$link_color             = get_theme_mod( 'link-color', '' );
	$link_hover_color       = get_theme_mod( 'link-hover-color', '' );
	$button_color           = get_theme_mod( 'button-color', '' );
	$button_hover_color     = get_theme_mod( 'button-hover-color', '' );
	$button_text_color      = get_theme_mod( 'button-text-color', '' );
	$label_color            = get_theme_mod( 'label-color', '' );
	$input_background_color = get_theme_mod( 'input-background-color', '' );
	$container_width        = get_theme_mod( 'responsive_main_container_width', '960' );
	$layout_style           = get_theme_mod( 'responsive_layout_styles', '' );
	$input_border_color_fs  = get_theme_mod( 'input-border-color-focus', '' );
	$input_border_color     = get_theme_mod( 'input-border-color', '' );
	error_log(print_r($body_typoghrapy,1));

	$custom_css = "
		body * {
			font-family: {$body_typoghrapy['font-family']};
			text-transform: {$body_typoghrapy['text-transform']};
			letter-spacing: {$body_typoghrapy['letter-spacing']};
			color: {$body_typoghrapy['color']};
			font-weight: {$body_typoghrapy['font-weight']};
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
			font-family: {$headings_typography['font-family']};
			text-transform: {$headings_typography['text-transform']};
			letter-spacing: {$headings_typography['letter-spacing']};
			color: {$headings_typography['color']};
			font-weight: {$headings_typography['font-weight']};
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
		button, input[type='submit'], input[type=button], a.button {
			color: {$button_text_color};
			background-color: {$button_color};
		}
		button:hover, input[type='submit']:hover, input[type=button]:hover, a.button:hover {
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
add_action( 'wp_enqueue_scripts', 'responsive_premium_custom_color_styles', 99 );
