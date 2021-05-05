<?php
/**
 * Functions file for Gutenberg support.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to add customizer color options to gutenberg color palette.
 */
function responsive_gutenberg_color_palette() {

	$body_typography      = get_theme_mod( 'body_typography' );
	$body_text_color      = esc_html( get_theme_mod( 'responsive_body_text_color', '#333333' ) );
	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );

	$button_color            = esc_html( get_theme_mod( 'responsive_button_color', '#0066CC' ) );
	$button_hover_color      = esc_html( get_theme_mod( 'responsive_button_hover_color', '#10659C' ) );
	$button_text_color       = esc_html( get_theme_mod( 'responsive_button_text_color', '#FFFFFF' ) );
	$button_hover_text_color = esc_html( get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' ) );

	$responsive_gutenberg_color_options = array(

		// Button colors.
		array(
			'name'  => __( 'Button Color', 'responsive' ),
			'slug'  => 'button-color',
			'color' => $button_color,
		),
		array(
			'name'  => __( 'Button Hover Color', 'responsive' ),
			'slug'  => 'button-hover-color',
			'color' => $button_hover_color,
		),
		array(
			'name'  => __( 'Button Hover Text Color', 'responsive' ),
			'slug'  => 'button-hover-text-color',
			'color' => $button_hover_text_color,
		),
		array(
			'name'  => __( 'Button Text Color', 'responsive' ),
			'slug'  => 'button-text-color',
			'color' => $button_text_color,
		),

		// Blog Post Background Color.
		array(
			'name'  => __( 'Text color', 'responsive' ),
			'slug'  => 'responsive-container-background-color',
			'color' => $body_text_color,
		),

		// Container Background Color.
		array(
			'name'  => __( 'Container Background Color', 'responsive' ),
			'slug'  => 'responsive-main-container-background-color',
			'color' => $box_background_color,
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
		if ( ! empty( $color['color'] ) ) {
			$custom_color = get_theme_mod( $color['slug'], $color['color'] );
			$css         .= ':root .has-' . $color['slug'] . '-color { color: ' . esc_attr( $custom_color ) . '; }';
			$css         .= ':root .has-' . $color['slug'] . '-background-color { background-color: ' . esc_attr( $custom_color ) . '; }';
		}
	}
	return wp_strip_all_tags( $css );
}

/**
 * [customizer_css description].
 *
 * @return string.
 */
function responsive_gutenberg_customizer_css() {
	$body_text_color = esc_html( get_theme_mod( 'responsive_body_text_color', '#333333' ) );

	$link_color       = esc_html( get_theme_mod( 'responsive_link_color', '#0066CC' ) );
	$link_hover_color = esc_html( get_theme_mod( 'responsive_link_hover_color', '#10659C' ) );

	$button_color              = esc_html( get_theme_mod( 'responsive_button_color', '#0066CC' ) );
	$button_hover_color        = esc_html( get_theme_mod( 'responsive_button_hover_color', '#10659C' ) );
	$button_text_color         = esc_html( get_theme_mod( 'responsive_button_text_color', '#FFFFFF' ) );
	$button_hover_text_color   = esc_html( get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' ) );
	$button_border_color       = esc_html( get_theme_mod( 'responsive_button_border_color', '#10659C' ) );
	$button_hover_border_color = esc_html( get_theme_mod( 'responsive_button_hover_border_color', '#0066CC' ) );

	$buttons_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_right_padding', 10 ) );
	$buttons_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_left_padding', 10 ) );
	$buttons_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_top_padding', 10 ) );
	$buttons_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_bottom_padding', 10 ) );

	$buttons_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_tablet_right_padding', 10 ) );
	$buttons_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_tablet_left_padding', 10 ) );
	$buttons_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_tablet_top_padding', 10 ) );
	$buttons_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_tablet_bottom_padding', 10 ) );

	$buttons_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_mobile_right_padding', 10 ) );
	$buttons_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_mobile_left_padding', 10 ) );
	$buttons_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_mobile_top_padding', 10 ) );
	$buttons_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_mobile_bottom_padding', 10 ) );

	$buttons_radius       = esc_html( get_theme_mod( 'responsive_buttons_radius', Responsive\Core\get_responsive_customizer_defaults( 'buttons_radius' ) ) );
	$buttons_border_width = esc_html( get_theme_mod( 'responsive_buttons_border_width', 0 ) );

	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );
	$alt_background_color = esc_html( get_theme_mod( 'responsive_alt_background_color', '#eaeaea' ) );

	$h1_typography   = get_theme_mod( 'heading_h1_typography' );
	$body_typography = get_theme_mod( 'body_typography' );

	$custom_css = '';

	if ( $h1_typography ) {
		$custom_css .= '
		.edit-post-visual-editor.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
		.editor-post-title__block .editor-post-title__input {
			color: ' . esc_html( get_theme_mod( 'responsive_h1_text_color', '#333333' ) ) . ';';

		foreach ( $h1_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	for ( $i = 1; $i < 7; $i++ ) {
		$custom_css .= '
		.edit-post-visual-editor.editor-styles-wrapper .wp-block h' . $i . ',
		.wp-block-freeform.block-library-rich-text__tinymce h' . $i . ',
		.wp-block-heading h' . $i . '.editor-rich-text__tinymce {
			color: ' . esc_html( get_theme_mod( "responsive_h{$i}_text_color", '#333333' ) ) . ';
		}';

		if ( get_theme_mod( 'heading_h' . $i . '_typography' ) ) {
			foreach ( get_theme_mod( 'heading_h' . $i . '_typography' ) as $key => $value ) {
				if ( 'font-family' === $key ) {
					$custom_css .= '.has-h' . $i . '-font-family{' . $key . ':' . $value . '; }';
				}
			}
			$custom_css .= '
			.edit-post-visual-editor.editor-styles-wrapper .wp-block h' . $i . ',
			.wp-block-freeform.block-library-rich-text__tinymce h' . $i . ',
			.wp-block-heading h' . $i . '.editor-rich-text__tinymce {';

			foreach ( get_theme_mod( 'heading_h' . $i . '_typography' ) as $key => $value ) {
				$custom_css .= $key . ':' . $value . ';';
			}
			$custom_css .= '}';
		}
	}

	$custom_css .= "
	.edit-post-visual-editor.editor-styles-wrapper,
	.wp-block-freeform,
	.editor-writing-flow,
	.editor-styles-wrapper{
		background-color: {$box_background_color};
		color: {$body_text_color};
	}";

	if ( $body_typography ) {

		foreach ( $body_typography as $key => $value ) {
			if ( 'font-family' === $key ) {
				$custom_css .= '.has-body-font-family{' . $key . ':' . $value . '; }';
			}
		}

		$custom_css .= '
		.edit-post-visual-editor.editor-styles-wrapper,
		.wp-block-freeform,
		.editor-writing-flow,
		.editor-styles-wrapper,
		.wp-block-quote__citation {';

		foreach ( $body_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	$custom_css .= ".edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a,
	.wp-block-freeform.block-library-rich-text__tinymce a,
	.editor-writing-flow a,
	.editor-styles-wrapper .wp-block a,
	.editor-styles-wrapper .wp-block a * {
		color:{$link_color};
		text-decoration: none;
	}
	.edit-post-visual-editor.editor-styles-wrapper{
		background-color: {$box_background_color};
	}

	.edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a:focus,
	.edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a:hover,
	.wp-block-freeform.block-library-rich-text__tinymce a:hover,
	.wp-block-freeform.block-library-rich-text__tinymce a:focus,
	.editor-writing-flow a:hover,
	.editor-writing-flow a:focus{
		color: {$link_hover_color};
	}

	.edit-post-visual-editor.editor-styles-wrapper blockquote,
	.edit-post-visual-editor.editor-styles-wrapper blockquote p,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote,
	.wp-block-freeform.block-library-rich-text__tinymce code,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce pre,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-preformatted pre,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-code .block-editor-plain-text,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-verse pre,
	.edit-post-visual-editor.editor-styles-wrapper pre {
    	background: {$alt_background_color};
	}";

	$custom_css .= '
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button{
		background-color:' . $button_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_border_color . ';
		border-radius:' . $buttons_radius . 'px;
	    color: ' . $button_text_color . ';
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
    }

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper > .not-inherited-from-theme {
		color: ' . $button_text_color . ';
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link {
		background-color: ' . $button_color . ' !important;
		border-color: ' . $button_border_color . ' !important;
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link > .inherited-from-theme {
		color: ' . $button_text_color . ' !important;
	}

	.wp-block-button__link.has-text-color.has-background:focus,
	.wp-block-button__link.has-text-color.has-background:hover,
	.wp-block-button__link.has-text-color:focus,
	.wp-block-button__link.has-text-color:hover,
	.wp-block-button__link.has-background:hover,
	.wp-block-button__link.has-background:focus {
		color:' . $button_hover_text_color . ' !important;
		background-color:' . $button_hover_color . ' !important;
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper:hover > .not-inherited-from-theme {
		color: ' . $button_hover_text_color . ';
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link:hover {
		background-color: ' . $button_hover_color . ' !important;
		border-color: ' . $button_hover_border_color . ' !important;
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link:hover > .inherited-from-theme {
		color: ' . $button_hover_text_color . ' !important;
	}

	.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link:focus,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button:focus,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link:hover,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button:hover {
		color:' . $button_hover_text_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_hover_border_color . ';
		background-color:' . $button_hover_color . ';
	}

	@media screen and ( max-width: 992px ) {
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button{
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button{
			padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
		}
	}
	';

	return $custom_css;
}
/**
 *  Enqueue block styles  in editor
 */
function responsive_block_styles() {
	$suffix = '';
	if ( is_rtl() ) {
		$suffix = '-rtl' . $suffix;
	}
	wp_enqueue_style( 'responsive-gutenberg-blocks', get_stylesheet_directory_uri() . '/core/css/gutenberg-editor' . $suffix . '.css', array(), '4.1' );
	wp_add_inline_style( 'responsive-gutenberg-blocks', responsive_gutenberg_customizer_css() );

	// Add customizer colors to Gutenberg editor in backend.
	wp_add_inline_style( 'responsive-gutenberg-blocks', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
	wp_add_inline_style( 'responsive-style', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
}
add_action( 'enqueue_block_editor_assets', 'responsive_block_styles' );
