<?php
/**
 * Outputs the customizer styles.
 *
 * @package Responsive
 * @since 0.2
 */

/**
 * Returns all updated available color schemes for all design styles
 *
 * @return void Description.
 */
function responsive_get_color_palettes_schemes_as_customizer_choices() {

	$responsive_color_scheme     = get_theme_mod( 'responsive_color_scheme' );
	$responsive_color_scheme_new = get_theme_mod( 'responsive_color_scheme_new' );

	if ( $responsive_color_scheme && $responsive_color_scheme !== $responsive_color_scheme_new ) {
		set_theme_mod( 'responsive_color_scheme_new', $responsive_color_scheme );
	} else {
		return;
	}

	$customizer_color_schemes = explode( '-', get_theme_mod( 'responsive_color_scheme_new' ) );

	$customizer_color_schemes_design  = $customizer_color_schemes[0];
	$customizer_color_schemes_palette = $customizer_color_schemes[1];

	$design_styles            = responsive_get_available_design_styles();
	$responsive_color_schemes = $design_styles[ $customizer_color_schemes_design ]['color_schemes'][ $customizer_color_schemes_palette ];

	set_theme_mod( 'background_color', ltrim( $responsive_color_schemes['alt_background'], '#' ) );
	set_theme_mod( 'responsive_alt_background_color', $responsive_color_schemes['alt_background'] );
	set_theme_mod( 'responsive_box_background_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_link_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_button_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_sidebar_headings_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_sidebar_background_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_body_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_meta_text_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_sidebar_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_h1_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_h2_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_h3_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_h4_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_h5_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_h6_text_color', $responsive_color_schemes['text'] );
	set_theme_mod( 'responsive_sidebar_link_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_shop_product_rating_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_add_to_cart_button_text_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_add_to_cart_button_hover_text_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_cart_buttons_text_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_cart_buttons_hover_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_cart_buttons_hover_text_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_cart_checkout_button_color', $responsive_color_schemes['accent'] );
	set_theme_mod( 'responsive_cart_checkout_button_text_color', $responsive_color_schemes['background'] );
	set_theme_mod( 'responsive_cart_checkout_button_hover_text_color', $responsive_color_schemes['background'] );

	$header_background = isset( $responsive_color_schemes['header_background'] ) ? $responsive_color_schemes['header_background'] : '#ffffff';
	$footer_background = isset( $responsive_color_schemes['footer_background'] ) ? $responsive_color_schemes['footer_background'] : '#333333';
	$header_text       = isset( $responsive_color_schemes['header_text'] ) ? $responsive_color_schemes['header_text'] : '#333333';
	$footer_text       = isset( $responsive_color_schemes['footer_text'] ) ? $responsive_color_schemes['footer_text'] : '#ffffff';

	set_theme_mod( 'responsive_header_text_color', $header_text );
	set_theme_mod( 'responsive_footer_text_color', $footer_text );
	set_theme_mod( 'responsive_header_background_color', $header_background );
	set_theme_mod( 'responsive_footer_background_color', $footer_background );
	set_theme_mod( 'responsive_header_site_title_color', $header_text );
	set_theme_mod( 'responsive_header_site_title_hover_color', $header_text );
	set_theme_mod( 'responsive_header_menu_background_color', $header_background );
	set_theme_mod( 'responsive_header_mobile_menu_background_color', $header_background );
	set_theme_mod( 'responsive_header_menu_link_color', $header_text );

}

/**
 * Outputs the custom styles for the theme.
 *
 * @return void
 */
function responsive_customizer_styles() {
	responsive_get_color_palettes_schemes_as_customizer_choices();
	$custom_css = '';

	// Box Padding.
	$box_padding_right  = esc_html( get_theme_mod( 'responsive_box_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_padding_left   = esc_html( get_theme_mod( 'responsive_box_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_padding_top    = esc_html( get_theme_mod( 'responsive_box_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_padding_bottom = esc_html( get_theme_mod( 'responsive_box_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );

	$box_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_box_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_box_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_box_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_box_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );

	$box_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_box_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_box_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_box_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
	$box_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_box_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );

	// Box Radius.
	$box_radius = esc_html( get_theme_mod( 'responsive_box_radius', 0 ) );

	// Paragraph Margin Bottom.
	$paragraph_margin_bottom = esc_html( get_theme_mod( 'responsive_paragraph_margin_bottom', '' ) );

	// Site custom styles.

	$container_max_width = esc_html( get_theme_mod( 'responsive_container_width', 1140 ) );

	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', Responsive\Core\get_responsive_customizer_defaults( 'box_background' ) ) );
	$alt_background_color = esc_html( get_theme_mod( 'responsive_alt_background_color', Responsive\Core\get_responsive_customizer_defaults( 'alt_background' ) ) );

	$custom_css .= "
	.container,
	[class*='__inner-container'],
	.site-header-full-width-main-navigation.site-mobile-header-layout-vertical:not(.responsive-site-full-width) .main-navigation-wrapper {
		max-width: {$container_max_width}px;
	}
	.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,
	.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,
	.responsive-site-style-content-boxed .custom-home-about-section,
	.responsive-site-style-content-boxed .custom-home-feature-section,
	.responsive-site-style-content-boxed .custom-home-team-section,
	.responsive-site-style-content-boxed .custom-home-testimonial-section,
	.responsive-site-style-content-boxed .custom-home-contact-section,
	.responsive-site-style-content-boxed .custom-home-widget-section,
	.responsive-site-style-content-boxed .custom-home-featured-area,
	.responsive-site-style-content-boxed .site-content-header,
	.responsive-site-style-content-boxed .content-area-wrapper,
	.responsive-site-style-content-boxed .site-content .hentry,
	.responsive-site-style-content-boxed .give-wrap .give_forms,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-content-boxed .comment-respond,
	.responsive-site-style-boxed .custom-home-about-section,
	.responsive-site-style-boxed .custom-home-feature-section,
	.responsive-site-style-boxed .custom-home-team-section,
	.responsive-site-style-boxed .custom-home-testimonial-section,
	.responsive-site-style-boxed .custom-home-contact-section,
	.responsive-site-style-boxed .custom-home-widget-section,
	.responsive-site-style-boxed .custom-home-featured-area,
	.responsive-site-style-boxed .site-content-header,
	.responsive-site-style-boxed .site-content .hentry,
	.responsive-site-style-boxed .give-wrap .give_forms,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .comments-area,
	.responsive-site-style-boxed .comment-respond,
	.responsive-site-style-boxed .comment-respond,
	.responsive-site-style-boxed aside#secondary .widget-wrapper,
	.responsive-site-style-boxed .site-content article.product {
		background-color:{$box_background_color};
		border-radius:{$box_radius}px;
	}
	address, blockquote, pre, code, kbd, tt, var {
		background-color:{$alt_background_color};
	}
	p, .entry-content p {
		margin-bottom:{$paragraph_margin_bottom}em;
	}
	";

	$custom_css .= '.responsive-site-style-content-boxed .hentry,
	.responsive-site-style-content-boxed .give-wrap .give_forms,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-content-boxed .comment-respond,
	.responsive-site-style-boxed .give-wrap .give_forms,
	.responsive-site-style-boxed .hentry,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .comments-area,
	.responsive-site-style-boxed .comment-respond,
	.page.front-page.responsive-site-style-flat .widget-wrapper,
	.blog.front-page.responsive-site-style-flat .widget-wrapper,
	.responsive-site-style-boxed .widget-wrapper,
	.responsive-site-style-boxed .site-content article.product {
	    padding: ' . responsive_spacing_css( $box_padding_top, $box_padding_right, $box_padding_bottom, $box_padding_left ) . ';
	}

	@media screen and ( max-width: 992px ) {
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .give-wrap .give_forms,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-content-boxed .comment-respond,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .give-wrap .give_forms,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.page.front-page.responsive-site-style-flat .widget-wrapper,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product,
		.page-template-gutenberg-fullwidth.responsive-site-style-content-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map),
		.page-template-gutenberg-fullwidth.responsive-site-style-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map) {
		    padding: ' . responsive_spacing_css( $box_tablet_padding_top, $box_tablet_padding_right, $box_tablet_padding_bottom, $box_tablet_padding_left ) . ';
		}
	}

	@media screen and ( max-width: 576px ) {
		.responsive-site-style-content-boxed .give-wrap .give_forms,
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-content-boxed .comment-respond,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .give-wrap .give_forms,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.page.front-page.responsive-site-style-flat .widget-wrapper,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product,
		.page-template-gutenberg-fullwidth.responsive-site-style-content-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map),
		.page-template-gutenberg-fullwidth.responsive-site-style-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map) {
			padding: ' . responsive_spacing_css( $box_mobile_padding_top, $box_mobile_padding_right, $box_mobile_padding_bottom, $box_mobile_padding_left ) . ';
		}
	}';

	$body_text_color      = esc_html( get_theme_mod( 'responsive_body_text_color', Responsive\Core\get_responsive_customizer_defaults( 'body_text' ) ) );
	$meta_text_color      = esc_html( get_theme_mod( 'responsive_meta_text_color', Responsive\Core\get_responsive_customizer_defaults( 'meta_text' ) ) );
	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', Responsive\Core\get_responsive_customizer_defaults( 'box_background' ) ) );

	$link_color       = esc_html( get_theme_mod( 'responsive_link_color', Responsive\Core\get_responsive_customizer_defaults( 'link' ) ) );
	$link_hover_color = esc_html( get_theme_mod( 'responsive_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'link_hover' ) ) );

	$button_color              = esc_html( get_theme_mod( 'responsive_button_color', Responsive\Core\get_responsive_customizer_defaults( 'button' ) ) );
	$button_hover_color        = esc_html( get_theme_mod( 'responsive_button_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'button_hover' ) ) );
	$button_text_color         = esc_html( get_theme_mod( 'responsive_button_text_color', Responsive\Core\get_responsive_customizer_defaults( 'button_text' ) ) );
	$button_hover_text_color   = esc_html( get_theme_mod( 'responsive_button_hover_text_color', Responsive\Core\get_responsive_customizer_defaults( 'button_hover_text' ) ) );
	$button_border_color       = esc_html( get_theme_mod( 'responsive_button_border_color', Responsive\Core\get_responsive_customizer_defaults( 'button_border' ) ) );
	$button_hover_border_color = esc_html( get_theme_mod( 'responsive_button_hover_border_color', Responsive\Core\get_responsive_customizer_defaults( 'button_hover_border' ) ) );

	// Buttons Padding.
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

	// Inputs Padding.
	$inputs_padding_right  = esc_html( get_theme_mod( 'responsive_inputs_right_padding', 3 ) );
	$inputs_padding_left   = esc_html( get_theme_mod( 'responsive_inputs_left_padding', 3 ) );
	$inputs_padding_top    = esc_html( get_theme_mod( 'responsive_inputs_top_padding', 3 ) );
	$inputs_padding_bottom = esc_html( get_theme_mod( 'responsive_inputs_bottom_padding', 3 ) );

	$inputs_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_inputs_tablet_right_padding', 3 ) );
	$inputs_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_inputs_tablet_left_padding', 3 ) );
	$inputs_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_inputs_tablet_top_padding', 3 ) );
	$inputs_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_inputs_tablet_bottom_padding', 3 ) );

	$inputs_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_inputs_mobile_right_padding', 3 ) );
	$inputs_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_inputs_mobile_left_padding', 3 ) );
	$inputs_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_inputs_mobile_top_padding', 3 ) );
	$inputs_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_inputs_mobile_bottom_padding', 3 ) );

	$inputs_radius           = esc_html( get_theme_mod( 'responsive_inputs_radius', 0 ) );
	$inputs_border_width     = esc_html( get_theme_mod( 'responsive_inputs_border_width', 1 ) );
	$inputs_border_color     = esc_html( get_theme_mod( 'responsive_inputs_border_color', Responsive\Core\get_responsive_customizer_defaults( 'inputs_border' ) ) );
	$inputs_text_color       = esc_html( get_theme_mod( 'responsive_inputs_text_color', Responsive\Core\get_responsive_customizer_defaults( 'inputs_text' ) ) );
	$inputs_background_color = esc_html( get_theme_mod( 'responsive_inputs_background_color', Responsive\Core\get_responsive_customizer_defaults( 'inputs_background' ) ) );

	$label_color     = esc_html( get_theme_mod( 'responsive_label_color', Responsive\Core\get_responsive_customizer_defaults( 'label' ) ) );
	$body_typography = get_theme_mod( 'body_typography' );

	if ( $body_typography ) {
		foreach ( $body_typography as $key => $value ) {
			if ( 'font-family' === $key ) {
				$custom_css .= '.has-body-font-family{' . $key . ':' . $value . '; }';
			}
		}
	}
	for ( $i = 1; $i < 7; $i++ ) {
		if ( get_theme_mod( 'heading_h' . $i . '_typography' ) ) {
			foreach ( get_theme_mod( 'heading_h' . $i . '_typography' ) as $key => $value ) {
				if ( 'font-family' === $key ) {
					$custom_css .= '.has-h' . $i . '-font-family{' . $key . ':' . $value . '; }';
				}
			}
		}
	}

	$custom_css .= "
	body {
		color:{$body_text_color};
	}
	.post-data *, .hentry .post-data a, .hentry .post-data,
	.post-meta *, .hentry .post-meta a {
	    color:{$meta_text_color};
	}
	a {
		color:{$link_color};
	}
	.entry-content .woocommerce a.remove:hover {
		color:{$link_color} !important;
		border-color:{$link_color};
	}
	a:hover {
		color:{$link_hover_color};
	}
	label {
		color:{$label_color};
	}
	";

	$custom_css .= "
		.responsive-block-editor-addons-button__wrapper > .not-inherited-from-theme, .responsive-block-editor-addons-button__wrapper > .inherited-from-theme {
			color: {$button_text_color};
		}
		.responsive-block-editor-addons-button__wrapper:hover > .not-inherited-from-theme, .responsive-block-editor-addons-button__wrapper:hover > .inherited-from-theme {
			color: {$button_hover_text_color};
		}
	";

	$sensei_button       = '';
	$sensei_button_hover = '';
	if ( class_exists( 'Sensei_Main' ) ) {
		$custom_css .= "
		.responsive-site-style-content-boxed .sensei-pagination,
		.responsive-site-style-content-boxed.single-course nav.post-entries.fix,
		.responsive-site-style-boxed .sensei-pagination,
		.responsive-site-style-boxed.single-course nav.post-entries.fix {
			background-color:{$box_background_color};
			border-radius:{$box_radius}px;
		}";

		$sensei_button = '.course #commentform #submit,
		.course .submit,
		.course a.button,
		.course a.button:visited,
		.course a.comment-reply-link,
		.course button.button,
		.course input.button,
		.course input[type=submit],
		.course-container #commentform #submit,
		.course-container .submit,
		.course-container a.button,
		.course-container a.button:visited,
		.course-container a.comment-reply-link,
		.course-container button.button,
		.course-container input.button,
		.course-container input[type=submit],
		.lesson #commentform #submit,
		.lesson .submit,
		.lesson a.button,
		.lesson a.button:visited,
		.lesson a.comment-reply-link,
		.lesson button.button,
		.lesson input.button,
		.lesson input[type=submit],
		.quiz #commentform #submit,
		.quiz .submit,
		.quiz a.button,
		.quiz a.button:visited,
		.quiz a.comment-reply-link,
		.quiz button.button,
		.quiz input.button,
		.quiz input[type=submit],';

		$sensei_button_hover = '.course #commentform #submit:hover,
		.course .submit:hover,
		.course a.button:hover,
		.course a.button:visited:hover,
		.course a.comment-reply-link:hover,
		.course button.button:hover,
		.course input.button:hover,
		.course input[type=submit]:hover,
		.course-container #commentform #submit:hover,
		.course-container .submit:hover,
		.course-container a.button:hover,
		.course-container a.button:visited:hover,
		.course-container a.comment-reply-link:hover,
		.course-container button.button:hover,
		.course-container input.button:hover,
		.course-container input[type=submit]:hover,
		.lesson #commentform #submit:hover,
		.lesson .submit:hover,
		.lesson a.button:hover,
		.lesson a.button:visited:hover,
		.lesson a.comment-reply-link:hover,
		.lesson button.button:hover,
		.lesson input.button:hover,
		.lesson input[type=submit]:hover,
		.quiz #commentform #submit:hover,
		.quiz .submit:hover,
		.quiz a.button:hover,
		.quiz a.button:visited:hover,
		.quiz a.comment-reply-link:hover,
		.quiz button.button:hover,
		.quiz input.button:hover,
		.quiz input[type=submit]:hover,';
	}

	$custom_css .= $sensei_button . '
	.page.front-page .button,
	.blog.front-page .button,
	.read-more-button .hentry .read-more .more-link,
	input[type=button],
	input[type=submit],
	button,
	.button,
	.wp-block-button__link,
	body div.wpforms-container-full .wpforms-form input[type=submit],
	body div.wpforms-container-full .wpforms-form button[type=submit],
	body div.wpforms-container-full .wpforms-form .wpforms-page-button, .main-navigation .menu .res-button-menu .res-custom-button {
		background-color:' . $button_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_border_color . ';
		border-radius:' . $buttons_radius . 'px;
	    color: ' . $button_text_color . ';
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
	}
	@media screen and ( max-width: 992px ) {
		' . $sensei_button . '
		.page.front-page .button,
		.blog.front-page .button,
		.read-more-button .hentry .read-more .more-link,
		input[type=button],
		.wp-block-button__link,
		input[type=submit],
		button,
		.button,
		body div.wpforms-container-full .wpforms-form input[type=submit],
		body div.wpforms-container-full .wpforms-form button[type=submit],
		body div.wpforms-container-full .wpforms-form .wpforms-page-button, .main-navigation .menu .res-button-menu .res-custom-button {
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
		}
	}

	@media screen and ( max-width: 576px ) {
		' . $sensei_button . '
		.page.front-page .button,
		.blog.front-page .button,
		.read-more-button .hentry .read-more .more-link,
		input[type=button],
		.wp-block-button__link,
		input[type=submit],
		button,
		.button,
		body div.wpforms-container-full .wpforms-form input[type=submit],
		body div.wpforms-container-full .wpforms-form button[type=submit],
		body div.wpforms-container-full .wpforms-form .wpforms-page-button, .main-navigation .menu .res-button-menu .res-custom-button {
			padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
		}
	}

	.page.front-page .button:focus,
	.blog.front-page .button:focus,
	.page.front-page .button:hover,
	.blog.front-page .button:hover,
	.wp-block-button__link.has-text-color.has-background:focus,
	.wp-block-button__link.has-text-color.has-background:hover,
	.wp-block-button__link.has-text-color:focus,
	.wp-block-button__link.has-text-color:hover,
	.wp-block-button__link.has-background:hover,
	.wp-block-button__link.has-background:focus, .main-navigation .menu .res-button-menu .res-custom-button:hover {
		color:' . $button_hover_text_color . ' !important;
		background-color:' . $button_hover_color . ' !important;
	}

	' . $sensei_button_hover . '
	.wp-block-button__link:focus,
	.wp-block-button__link:hover,
	.read-more-button .hentry .read-more .more-link:hover,
	.read-more-button .hentry .read-more .more-link:focus,
	input[type=button]:hover,
	input[type=submit]:hover,
	input[type=button]:focus,
	input[type=submit]:focus,
	button:hover,
	button:focus,
	.button:hover,
	.button:focus,
	body div.wpforms-container-full .wpforms-form input[type=submit]:hover,
	body div.wpforms-container-full .wpforms-form input[type=submit]:focus,
	body div.wpforms-container-full .wpforms-form input[type=submit]:active,
	body div.wpforms-container-full .wpforms-form button[type=submit]:hover,
	body div.wpforms-container-full .wpforms-form button[type=submit]:focus,
	body div.wpforms-container-full .wpforms-form button[type=submit]:active,
	body div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,
	body div.wpforms-container-full .wpforms-form .wpforms-page-button:active,
	body div.wpforms-container-full .wpforms-form .wpforms-page-button:focus, .main-navigation .menu .res-button-menu .res-custom-button:hover {
	    color:' . $button_hover_text_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_hover_border_color . ';
		background-color:' . $button_hover_color . ';
	}

	select,
	textarea,
	input[type=tel],
	input[type=email],
	input[type=number],
	input[type=search],
	input[type=text],
	input[type=date],
	input[type=datetime],
	input[type=datetime-local],
	input[type=month],
	input[type=password],
	input[type=range],
	input[type=time],
	input[type=url],
	input[type=week],
	body div.wpforms-container-full .wpforms-form input[type=date],
	body div.wpforms-container-full .wpforms-form input[type=datetime],
	body div.wpforms-container-full .wpforms-form input[type=datetime-local],
	body div.wpforms-container-full .wpforms-form input[type=email],
	body div.wpforms-container-full .wpforms-form input[type=month],
	body div.wpforms-container-full .wpforms-form input[type=number],
	body div.wpforms-container-full .wpforms-form input[type=password],
	body div.wpforms-container-full .wpforms-form input[type=range],
	body div.wpforms-container-full .wpforms-form input[type=search],
	body div.wpforms-container-full .wpforms-form input[type=tel],
	body div.wpforms-container-full .wpforms-form input[type=text],
	body div.wpforms-container-full .wpforms-form input[type=time],
	body div.wpforms-container-full .wpforms-form input[type=url],
	body div.wpforms-container-full .wpforms-form input[type=week],
	body div.wpforms-container-full .wpforms-form select,
	body div.wpforms-container-full .wpforms-form textarea {
		color: ' . $inputs_text_color . ';
		background-color: ' . $inputs_background_color . ';
		border: ' . $inputs_border_width . 'px solid ' . $inputs_border_color . ';
		border-radius: ' . $inputs_radius . 'px;
		line-height: 1.75;
		padding: ' . responsive_spacing_css( $inputs_padding_top, $inputs_padding_right, $inputs_padding_bottom, $inputs_padding_left ) . ';
		height: auto;
	}
	.entry-content div.wpforms-container-full .wpforms-form select,
	body div.wpforms-container-full .wpforms-form select,
	select {
		background-image:
			linear-gradient(45deg, transparent 50%, ' . $inputs_text_color . ' 50%),
			linear-gradient(135deg, ' . $inputs_text_color . ' 50%, transparent 50%);
		background-position:
			calc(100% - 20px) calc(50% + 2px),
			calc(100% - 15px) calc(50% + 2px),
			calc(100% - .5em) .5em;
		background-size:
			5px 5px,
			5px 5px,
			1.5em 1.5em;
		background-repeat: no-repeat;
		-webkit-appearance: none;
		-moz-appearance: none;
	}
	body div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,
	body div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,
	body div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,
	body div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,
	body div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,
	body div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid {
		border-width: ' . $inputs_border_width . 'px;
	}
	@media screen and ( max-width: 992px ) {
		select,
		textarea,
		input[type=tel],
		input[type=email],
		input[type=number],
		input[type=search],
		input[type=text],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=month],
		input[type=password],
		input[type=range],
		input[type=time],
		input[type=url],
		input[type=week],
		body div.wpforms-container-full .wpforms-form input[type=date],
		body div.wpforms-container-full .wpforms-form input[type=datetime],
		body div.wpforms-container-full .wpforms-form input[type=datetime-local],
		body div.wpforms-container-full .wpforms-form input[type=email],
		body div.wpforms-container-full .wpforms-form input[type=month],
		body div.wpforms-container-full .wpforms-form input[type=number],
		body div.wpforms-container-full .wpforms-form input[type=password],
		body div.wpforms-container-full .wpforms-form input[type=range],
		body div.wpforms-container-full .wpforms-form input[type=search],
		body div.wpforms-container-full .wpforms-form input[type=tel],
		body div.wpforms-container-full .wpforms-form input[type=text],
		body div.wpforms-container-full .wpforms-form input[type=time],
		body div.wpforms-container-full .wpforms-form input[type=url],
		body div.wpforms-container-full .wpforms-form input[type=week],
		body div.wpforms-container-full .wpforms-form select,
		body div.wpforms-container-full .wpforms-form textarea {
			padding: ' . responsive_spacing_css( $inputs_tablet_padding_top, $inputs_tablet_padding_right, $inputs_tablet_padding_bottom, $inputs_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		select,
		textarea,
		input[type=tel],
		input[type=email],
		input[type=number],
		input[type=search],
		input[type=text],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=month],
		input[type=password],
		input[type=range],
		input[type=time],
		input[type=url],
		input[type=week],
		body div.wpforms-container-full .wpforms-form input[type=date],
		body div.wpforms-container-full .wpforms-form input[type=datetime],
		body div.wpforms-container-full .wpforms-form input[type=datetime-local],
		body div.wpforms-container-full .wpforms-form input[type=email],
		body div.wpforms-container-full .wpforms-form input[type=month],
		body div.wpforms-container-full .wpforms-form input[type=number],
		body div.wpforms-container-full .wpforms-form input[type=password],
		body div.wpforms-container-full .wpforms-form input[type=range],
		body div.wpforms-container-full .wpforms-form input[type=search],
		body div.wpforms-container-full .wpforms-form input[type=tel],
		body div.wpforms-container-full .wpforms-form input[type=text],
		body div.wpforms-container-full .wpforms-form input[type=time],
		body div.wpforms-container-full .wpforms-form input[type=url],
		body div.wpforms-container-full .wpforms-form input[type=week],
		body div.wpforms-container-full .wpforms-form select,
		body div.wpforms-container-full .wpforms-form textarea {
			padding: ' . responsive_spacing_css( $inputs_mobile_padding_top, $inputs_mobile_padding_right, $inputs_mobile_padding_bottom, $inputs_mobile_padding_left ) . ';
		}
	}
	';

	for ( $i = 1; $i < 7; $i++ ) {
		$heading_color = get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( "h{$i}_text" ) );

		$custom_css .= 'h' . $i . ' {
		    color: ' . esc_html( get_theme_mod( "responsive_h{$i}_text_color", $heading_color ) ) . ';
		}';
	}

	// Site Background Image.
	$site_background_img_new_posi  = esc_html( get_theme_mod( 'responsive_site_background_img_position', 'left-top' ) );
	$site_background_img_new_posi  = str_replace( '-', ' ', $site_background_img_new_posi );
	$site_background_image_attach  = esc_html( get_theme_mod( 'responsive_site_background_image_attachment', 'fixed' ) );
	$site_background_image_repeats = esc_html( get_theme_mod( 'responsive_site_background_image_repeat', 'repeat' ) );
	$site_background_image_sizes   = esc_html( get_theme_mod( 'responsive_site_background_image_size', 'cover' ) );
	if ( $site_background_img_new_posi ) {
		$custom_css .= "body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width {
			background-position: {$site_background_img_new_posi};
		}";
	}

	if ( $site_background_image_attach ) {
		$custom_css .= "body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width {
			background-attachment: {$site_background_image_attach};
		}";
	}

	if ( $site_background_image_repeats ) {
		$custom_css .= "body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width {
			background-repeat: {$site_background_image_repeats};
		}";
	}

	if ( $site_background_image_sizes ) {
		$custom_css .= "body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width {
			background-size: {$site_background_image_sizes};
		}";
	}

	// Site Content Padding.
	$site_content_padding_right  = esc_html( get_theme_mod( 'responsive_site_content_right_padding' ) );
	$site_content_padding_left   = esc_html( get_theme_mod( 'responsive_site_content_left_padding' ) );
	$site_content_padding_top    = esc_html( get_theme_mod( 'responsive_site_content_top_padding', 120 ) );
	$site_content_padding_bottom = esc_html( get_theme_mod( 'responsive_site_content_bottom_padding', 120 ) );

	$site_content_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_site_content_tablet_right_padding' ) );
	$site_content_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_site_content_tablet_left_padding' ) );
	$site_content_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_site_content_tablet_top_padding', 28 ) );
	$site_content_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_site_content_tablet_bottom_padding', 28 ) );

	$site_content_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_site_content_mobile_right_padding' ) );
	$site_content_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_site_content_mobile_left_padding' ) );
	$site_content_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_site_content_mobile_top_padding', 28 ) );
	$site_content_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_site_content_mobile_bottom_padding', 28 ) );

	// Header Padding.
	$header_padding_right  = esc_html( get_theme_mod( 'responsive_header_right_padding' ) );
	$header_padding_left   = esc_html( get_theme_mod( 'responsive_header_left_padding' ) );
	$header_padding_top    = esc_html( get_theme_mod( 'responsive_header_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'logo_padding' ) ) );
	$header_padding_bottom = esc_html( get_theme_mod( 'responsive_header_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'logo_padding' ) ) );

	$header_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_header_tablet_right_padding' ) );
	$header_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_header_tablet_left_padding' ) );
	$header_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_header_tablet_top_padding', 28 ) );
	$header_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_header_tablet_bottom_padding', 28 ) );

	$header_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_header_mobile_right_padding' ) );
	$header_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_header_mobile_left_padding' ) );
	$header_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_header_mobile_top_padding', 28 ) );
	$header_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_header_mobile_bottom_padding', 28 ) );

	if ( Responsive\Core\responsive_is_transparent_header() ) {

		// Header colors.
		$header_background_color       = '';
		$header_border_color           = esc_html( get_theme_mod( 'responsive_transparent_header_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_border' ) ) );
		$header_site_title_color       = esc_html( get_theme_mod( 'responsive_transparent_header_site_title_color', Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ) ) );
		$header_site_title_hover_color = esc_html( get_theme_mod( 'responsive_transparent_header_site_title_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ) ) );
		$header_text_color             = esc_html( get_theme_mod( 'responsive_transparent_header_text_color', Responsive\Core\get_responsive_customizer_defaults( 'header_text' ) ) );

		// Menu Color.
		$header_menu_background_color        = esc_html( get_theme_mod( 'responsive_transparent_header_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) ) );
		$header_mobile_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_mobile_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) ) );
		$header_menu_border_color            = esc_html( get_theme_mod( 'responsive_transparent_header_menu_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ) ) );
		$header_menu_link_color              = esc_html( get_theme_mod( 'responsive_transparent_header_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) ) );
		$header_menu_link_hover_color        = esc_html( get_theme_mod( 'responsive_transparent_header_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) ) );
		$header_active_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_active_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$header_hover_menu_background_color  = esc_html( get_theme_mod( 'responsive_transparent_header_hover_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$menu_active_link_color              = esc_html( get_theme_mod( 'responsive_transparent_header_active_menu_link_color', '' ) );

		// Sub Menu Color.
		$header_sub_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_active_sub_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_active_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_hover_sub_menu_background_color  = esc_html( get_theme_mod( 'responsive_transparent_header_hover_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_sub_menu_link_color       = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ) ) );
		$header_sub_menu_link_hover_color = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ) ) );
		$sub_menu_active_link_color       = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_active_link_color', '' ) );

		// Toggle Button Color.
		$header_menu_toggle_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_menu_toggle_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ) ) );
		$header_menu_toggle_color            = esc_html( get_theme_mod( 'responsive_transparent_header_menu_toggle_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle' ) ) );

		// Header Widgets Color.
		$header_widget_text_color       = esc_html( get_theme_mod( 'responsive_transparent_header_widget_text_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ) ) );
		$header_widget_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_widget_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ) ) );
		$header_widget_border_color     = esc_html( get_theme_mod( 'responsive_transparent_header_widget_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ) ) );
		$header_widget_link_color       = esc_html( get_theme_mod( 'responsive_transparent_header_widget_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ) ) );
		$header_widget_link_hover_color = esc_html( get_theme_mod( 'responsive_transparent_header_widget_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ) ) );

		$header_bottom_border = 0;
		if ( 1 === get_theme_mod( 'responsive_enable_transparent_header_bottom_border', 1 ) ) {
			$header_bottom_border = esc_html( get_theme_mod( 'responsive_transparent_bottom_border', 0 ) );
		}
	} else {

		// Header colors.
		$header_background_color = esc_html( get_theme_mod( 'responsive_header_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_background' ) ) );

		$header_border_color           = esc_html( get_theme_mod( 'responsive_header_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_border' ) ) );
		$header_site_title_color       = esc_html( get_theme_mod( 'responsive_header_site_title_color', Responsive\Core\get_responsive_customizer_defaults( 'header_site_title' ) ) );
		$header_site_title_hover_color = esc_html( get_theme_mod( 'responsive_header_site_title_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_site_title_hover' ) ) );
		$header_text_color             = esc_html( get_theme_mod( 'responsive_header_text_color', Responsive\Core\get_responsive_customizer_defaults( 'header_text' ) ) );

		// Menu Color.
		$header_menu_background_color        = esc_html( get_theme_mod( 'responsive_header_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) ) );
		$header_mobile_menu_background_color = esc_html( get_theme_mod( 'responsive_header_mobile_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) ) );
		$header_menu_border_color            = esc_html( get_theme_mod( 'responsive_header_menu_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ) ) );
		$header_menu_link_color              = esc_html( get_theme_mod( 'responsive_header_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) ) );
		$header_menu_link_hover_color        = esc_html( get_theme_mod( 'responsive_header_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) ) );
		$header_active_menu_background_color = esc_html( get_theme_mod( 'responsive_header_active_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$header_hover_menu_background_color  = esc_html( get_theme_mod( 'responsive_header_hover_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$menu_active_link_color              = esc_html( get_theme_mod( 'responsive_header_active_menu_link_color', '' ) );

		// Sub Menu Color.
		$header_sub_menu_background_color        = esc_html( get_theme_mod( 'responsive_header_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_active_sub_menu_background_color = esc_html( get_theme_mod( 'responsive_header_active_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_hover_sub_menu_background_color  = esc_html( get_theme_mod( 'responsive_header_hover_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_sub_menu_link_color              = esc_html( get_theme_mod( 'responsive_header_sub_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ) ) );
		$header_sub_menu_link_hover_color        = esc_html( get_theme_mod( 'responsive_header_sub_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ) ) );
		$sub_menu_active_link_color              = esc_html( get_theme_mod( 'responsive_header_sub_menu_active_link_color', '' ) );

		// Toggle Button Color.
		$header_menu_toggle_background_color = esc_html( get_theme_mod( 'responsive_header_menu_toggle_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle_background' ) ) );
		$header_menu_toggle_color            = esc_html( get_theme_mod( 'responsive_header_menu_toggle_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_toggle' ) ) );

		// Header Widgets Color.
		$header_widget_text_color       = esc_html( get_theme_mod( 'responsive_header_widget_text_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ) ) );
		$header_widget_background_color = esc_html( get_theme_mod( 'responsive_header_widget_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ) ) );
		$header_widget_border_color     = esc_html( get_theme_mod( 'responsive_header_widget_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ) ) );
		$header_widget_link_color       = esc_html( get_theme_mod( 'responsive_header_widget_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ) ) );
		$header_widget_link_hover_color = esc_html( get_theme_mod( 'responsive_header_widget_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ) ) );

		$header_bottom_border = 0;
		if ( 1 === get_theme_mod( 'responsive_enable_header_bottom_border', 1 ) ) {
			$header_bottom_border = esc_html( get_theme_mod( 'responsive_bottom_border', 0 ) );
		}
	}
	// Sidebar Color.
	$sidebar_headings_color   = esc_html( get_theme_mod( 'responsive_sidebar_headings_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_h4_text_color' ) ) );
	$sidebar_background_color = esc_html( get_theme_mod( 'responsive_sidebar_background_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_box_background_color' ) ) );
	$sidebar_text_color       = esc_html( get_theme_mod( 'responsive_sidebar_text_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_body_text_color' ) ) );
	$sidebar_link_color       = esc_html( get_theme_mod( 'responsive_sidebar_link_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_link_color' ) ) );
	$sidebar_link_hover_color = esc_html( get_theme_mod( 'responsive_sidebar_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_link_hover_color' ) ) );

	$custom_css .= "
    .widget-area .widget-title h4{
        color: {$sidebar_headings_color};
    }

	.responsive-site-style-boxed aside#secondary .widget-wrapper {
		background-color:{$sidebar_background_color};
	}

    .widget-area {
        color: {$sidebar_text_color};
    }
    .widget-area .widget-wrapper a {
        color: {$sidebar_link_color};
    }

    .widget-area .widget-wrapper a:hover {
        color: {$sidebar_link_hover_color};
    }
    ";

	// Header Height.
	$header_height_size = get_theme_mod( 'responsive_header_height', 0 );
	if ( null !== $header_height_size ) {
		$header_height_half     = $header_height_size / 2;
		$mobile_menu_breakpoint = esc_html( get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 ) );
		$custom_css            .= "body:not(.res-transparent-header) .site-header {
			padding-top: {$header_height_half}px;
			padding-bottom: {$header_height_half}px;
		}
		
		@media screen and (max-width: {$mobile_menu_breakpoint}px) {
			body.site-header-layout-vertical.site-mobile-header-layout-horizontal:not(.res-transparent-header) .site-header .main-navigation {
				border-top: 0;
			}
		}";
	}

	// Transparent Header Height.
	$transparent_header_height_size = get_theme_mod( 'responsive_transparent_header_height', 0 );
	if ( null !== $transparent_header_height_size ) {
		$transparent_header_height_half = $transparent_header_height_size / 2;
		$mobile_menu_breakpoint         = esc_html( get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 ) );
		$custom_css                    .= "body.res-transparent-header .site-header {
			padding-top: {$transparent_header_height_half}px;
			padding-bototm: {$transparent_header_height_half}px;
		}
		
		@media screen and (max-width: {$mobile_menu_breakpoint}px) {
			body.site-header-layout-vertical.site-mobile-header-layout-horizontal.res-transparent-header .site-header .main-navigation {
				border-top: 0;
			}
		}";
	}

	// Mobile Menu.
	$mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
	// Mobile Menu Breakpoint.
	$disable_mobile_menu    = get_theme_mod( 'responsive_disable_mobile_menu', 1 );
	$mobile_menu_breakpoint = esc_html( get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 ) );

	$disable_menu = get_theme_mod( 'responsive_disable_menu', 0 );

	if ( 0 === $disable_mobile_menu ) {
		$mobile_menu_breakpoint = 0;
	}

	$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
		.main-navigation .menu-toggle {
			display: none;
		}
		.site-branding {
			width: auto;
		}
		.main-navigation .menu {
			display: block;
		}
		.main-navigation .menu > li {
		    border-bottom: none;
		    float: left;
			margin-left: 2px;
		}
		.main-navigation .children,
		.main-navigation .sub-menu {
		    background-color: #ffffff;
		    box-shadow: 0 0px 2px #cccccc;
		    left: -9999em;
		    margin-left: 0;
		    top: 100%;
		    position: absolute;
		    width: 240px;
		    z-index: 9999;
		}
		.main-navigation .children > li.focus > .children, .main-navigation .children > li.focus > .sub-menu, .main-navigation .children > li:hover > .children, .main-navigation .children > li:hover > .sub-menu,
		.main-navigation .sub-menu > li.focus > .children,
		.main-navigation .sub-menu > li.focus > .sub-menu,
		.main-navigation .sub-menu > li:hover > .children,
		.main-navigation .sub-menu > li:hover > .sub-menu {
		    left: 100%;
		    top: 0;
		}
		.main-navigation .children > li:first-child,
		.main-navigation .sub-menu > li:first-child {
	    	border-top: none;
	  	}
	  	.main-navigation .children a,
		.main-navigation .sub-menu a {
	    	padding: 15px 15px;
	  	}
	  	.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu > li {
		    margin-left: 0;
			margin-right: 2px;
		}
	  	.site-header-layout-vertical .site-header .row {
	    	flex-direction: column;
	  	}
	  	.site-header-layout-vertical .main-navigation .menu > li {
		    margin-left: 0;
			margin-right: 2px;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu {
		    display: table;
		    margin-left: auto;
		    margin-right: auto;
		    width: auto;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu > li {
		    margin-left: 1px;
		    margin-right: 1px;
		}
	  	.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu {
		    display: table;
		    margin-right: 0;
		    margin-left: auto;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu > li {
		    margin-left: 1px;
		    margin-right: 0;
	  	}
	  	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation {
		    margin-left: calc( 50% - 50vw );
		    margin-right: calc( 50% - 50vw );
		    max-width: 100vw;
		    width: 100vw;
	  	}
		.site-header-layout-horizontal .site-header .row {
	    	flex-wrap: nowrap;
	    }
		.site-header-layout-vertical.site-header-alignment-center .site-branding {
		    text-align: center;
		}
		.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu-toggle {
		    text-align: center;
		    margin: auto;
		}
		.site-header-layout-vertical.site-header-alignment-right .site-branding {
		    text-align: right;
		}
		.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu-toggle {
		    text-align: right;
		    float: right;
		}
		.site-header-layout-horizontal.header-widget-position-with_logo .site-branding {
		    padding-right: 75px;
		}
		.site-header-layout-vertical.site-header-alignment-center .site-branding {
		    text-align: center;
		}
		.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu-toggle {
		    text-align: center;
		    margin: auto;
		}
		.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu > li {
		    margin-left: 1px;
		    margin-right: 1px;
		}
		.site-header-layout-vertical.site-header-alignment-right .site-branding {
		    text-align: right;
		}
		.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu-toggle {
		    text-align: right;
		    float: right;
		}
		.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu > li {
		    margin-left: 1px;
		    margin-right: 1px;
		}
		.site-header-layout-vertical.site-header-site-branding-main-navigation.site-header-full-width-main-navigation .main-navigation {
		    border-top: 1px solid #eaeaea;
		}
		.site-header-layout-vertical.site-header-site-branding-main-navigation.site-header-full-width-main-navigation .main-navigation div {
		    border-bottom: 0;
		}
		.site-header-layout-vertical.site-header-main-navigation-site-branding.site-header-full-width-main-navigation .main-navigation {
		    border-bottom: 1px solid #eaeaea;
		    border-top: 0;
		}
		.site-header-layout-vertical.site-header-main-navigation-site-branding.site-header-full-width-main-navigation .main-navigation div {
		    border-bottom: 0;
		}
		.children .res-iconify.no-menu {
		  transform: rotate( -139deg );
		  right: 0.5rem;
		}
		.main-navigation .menu .sub-menu .res-iconify svg {
		  transform: translate(0,-50%) rotate(270deg);
		}
	}
  	@media screen and ( max-width: {$mobile_menu_breakpoint}px ) {
		.site-mobile-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_tablet_padding_bottom}px;
		}
		.site-mobile-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_tablet_padding_top}px;
		}
		.site-mobile-header-layout-horizontal.header-widget-position-with_logo .site-branding {
			padding-right: 75px;
		}
		.site-mobile-header-layout-vertical.site-mobile-header-alignment-center .site-branding {
			text-align: center;
		}
		.site-mobile-header-layout-vertical.site-mobile-header-alignment-center .main-navigation .menu-toggle {
			text-align: center;
			margin: auto;
		}
		.site-mobile-header-layout-vertical.site-mobile-header-alignment-center .main-navigation .menu > li {
			margin-left: 1px;
			margin-right: 1px;
		}
		.site-mobile-header-layout-vertical.site-mobile-header-alignment-right .site-branding {
			text-align: right;
		}
		.site-mobile-header-layout-vertical.site-mobile-header-alignment-right .main-navigation .menu-toggle {
			text-align: right;
			float: right;
		}
		.site-mobile-header-layout-vertical.site-mobile-header-alignment-right .main-navigation .menu > li {
			margin-left: 1px;
			margin-right: 1px;
		}
		.site-mobile-header-layout-vertical.site-header-site-branding-main-navigation.site-header-full-width-main-navigation .main-navigation {
			border-top: 1px solid #eaeaea;
		}
		.site-mobile-header-layout-vertical.site-header-site-branding-main-navigation.site-header-full-width-main-navigation .main-navigation div {
			border-bottom: 0;
		}
		.site-mobile-header-layout-vertical.site-header-main-navigation-site-branding.site-header-full-width-main-navigation .main-navigation {
			border-bottom: 1px solid #eaeaea;
			border-top: 0;
		}
		.site-mobile-header-layout-vertical.site-header-main-navigation-site-branding.site-header-full-width-main-navigation .main-navigation div {
			border-bottom: 0;
		}
		.main-navigation .children, .main-navigation .sub-menu{
			display: none;
		}
		.res-iconify {
			top: 0.3px;
		}
		.main-navigation .res-iconify.no-menu {
			top: 16.3px;
		}
	}
	@media screen and ( max-width: 576px ) {
		.site-mobile-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_mobile_padding_bottom}px;
		}
		.site-mobile-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_mobile_padding_top}px;
		}
		.site-mobile-header-layout-horizontal.header-widget-position-with_logo .site-branding {
			padding-right: 15px;
		}
	}
	.site-title a {
		color: {$header_site_title_color};
	}
	.site-title a:hover {
		color: {$header_site_title_hover_color};
	}
	.site-description {
		color: {$header_text_color};
	}
	.site-header {
		border-bottom-color: {$header_border_color};
		background-color: {$header_background_color};
	}

	.header-full-width.site-header-layout-vertical .main-navigation,
	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation,
	.responsive-site-full-width.site-header-layout-vertical .main-navigation,
	.site-header-layout-vertical .main-navigation div, .site-header-layout-vertical.site-header-site-branding-main-navigation.last-item-spread-away .main-navigation .menu {
		background-color: {$header_menu_background_color};
	}

	.header-full-width.site-header-layout-vertical .main-navigation.toggled,
	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation.toggled,
	.responsive-site-full-width.site-header-layout-vertical .main-navigation.toggled,
	.site-header-layout-vertical .main-navigation.toggled div,
	.main-navigation.toggled {
		background-color: {$header_mobile_menu_background_color};
	}
	@media ( max-width: {$mobile_menu_breakpoint}px ) {
		.site-mobile-header-layout-vertical .main-navigation {
			background-color: {$header_menu_background_color};
		}
		.site-mobile-header-layout-vertical .main-navigation.toggled {
			background-color: {$header_mobile_menu_background_color};
		}
		.site-mobile-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation) .main-navigation {
			border-top: 1px solid {$header_menu_border_color};
		}
		.site-mobile-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation) .main-navigation {
			border-bottom: 1px solid {$header_menu_border_color};
		}

	}
	@media ( min-width: {$mobile_menu_breakpoint}px ) {
		.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,
		.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,
		.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation > div {
			border-top: 1px solid {$header_menu_border_color};
		}

		.header-full-width.site-header-layout-vertical.site-header-main-navigation-site-branding .main-navigation,
		.responsive-site-full-width.site-header-layout-vertical.site-header-main-navigation-site-branding .main-navigation,
		.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation > div {
			border-bottom: 1px solid {$header_menu_border_color};
		}
	}
	.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-site-branding-main-navigation .main-navigation {
		border-top: 1px solid {$header_menu_border_color};
	}
	.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-main-navigation-site-branding .main-navigation {
		border-bottom: 1px solid {$header_menu_border_color};
	}
	.main-navigation .menu > li > a {
		color: {$header_menu_link_color};
	}
	.main-navigation .res-iconify svg{
		stroke: {$header_menu_link_color};
	}
	.main-navigation .menu > li.current_page_item > a,
	.main-navigation .menu > li.current-menu-item > a {
		color: {$menu_active_link_color};
		background-color: {$header_active_menu_background_color};
	}
	.main-navigation .menu > li.current-menu-item > .res-iconify {
		color: {$menu_active_link_color};
	}
	.main-navigation .menu > li.current-menu-item > a > .res-iconify svg {
		stroke: {$menu_active_link_color};
	}
	.main-navigation .menu li > a:hover {
		color: {$header_menu_link_hover_color};
		background-color: {$header_hover_menu_background_color};
	}
	.main-navigation .menu li:hover .res-iconify svg:hover, .main-navigation .menu > li:hover > a:not(.sub-menu) > .res-iconify svg {
		stroke: {$header_menu_link_hover_color};
	}
	.main-navigation .children,
	.main-navigation .sub-menu {
		background-color: {$header_sub_menu_background_color};
	}
	.main-navigation .children li a,
	.main-navigation .sub-menu li a {
		color: {$header_sub_menu_link_color};
	}
	.main-navigation .sub-menu li .res-iconify svg {
		stroke: {$header_sub_menu_link_color};
	}
	.main-navigation .menu .sub-menu .current_page_item > a,
	.main-navigation .menu .sub-menu .current-menu-item > a,
	.main-navigation .menu .children li.current_page_item a {
		color: {$sub_menu_active_link_color};
		background-color: {$header_active_sub_menu_background_color};
	}
	.main-navigation .menu .children li.current_page_item .res-iconify svg {
		stroke: {$sub_menu_active_link_color};
	}
	.main-navigation .children li a:hover,
	.main-navigation .sub-menu li a:hover, .main-navigation .menu .sub-menu .current_page_item > a:hover,
	.main-navigation .menu .sub-menu .current-menu-item > a:hover {
		color: {$header_sub_menu_link_hover_color};
		background-color: {$header_hover_sub_menu_background_color};
	}
	.main-navigation .menu .sub-menu li:hover > .res-iconify svg,
	.main-navigation .menu .sub-menu li:hover > a > .res-iconify svg {
		stroke: {$header_sub_menu_link_hover_color};
	}
	.main-navigation .menu-toggle {
		background-color: {$header_menu_toggle_background_color};
		color: {$header_menu_toggle_color};
	}
	.site-header {
		border-bottom-width: {$header_bottom_border}px;
		border-bottom-style: solid;
	}";

	$sub_menu_border_right  = esc_html( get_theme_mod( 'responsive_sub_menu_border_right_padding', 0 ) );
	$sub_menu_border_left   = esc_html( get_theme_mod( 'responsive_sub_menu_border_left_padding', 0 ) );
	$sub_menu_border_top    = esc_html( get_theme_mod( 'responsive_sub_menu_border_top_padding', 0 ) );
	$sub_menu_border_bottom = esc_html( get_theme_mod( 'responsive_sub_menu_border_bottom_padding', 0 ) );

	$sub_menu_border_tablet_right  = esc_html( get_theme_mod( 'responsive_sub_menu_border_tablet_right_padding', 0 ) );
	$sub_menu_border_tablet_left   = esc_html( get_theme_mod( 'responsive_sub_menu_border_tablet_left_padding', 0 ) );
	$sub_menu_border_tablet_top    = esc_html( get_theme_mod( 'responsive_sub_menu_border_tablet_top_padding', 0 ) );
	$sub_menu_border_tablet_bottom = esc_html( get_theme_mod( 'responsive_sub_menu_border_tablet_bottom_padding', 0 ) );

	$sub_menu_border_mobile_right  = esc_html( get_theme_mod( 'responsive_sub_menu_border_mobile_right_padding', 0 ) );
	$sub_menu_border_mobile_left   = esc_html( get_theme_mod( 'responsive_sub_menu_border_mobile_left_padding', 0 ) );
	$sub_menu_border_mobile_top    = esc_html( get_theme_mod( 'responsive_sub_menu_border_mobile_top_padding', 0 ) );
	$sub_menu_border_mobile_bottom = esc_html( get_theme_mod( 'responsive_sub_menu_border_mobile_bottom_padding', 0 ) );

	$sub_menu_border_color        = esc_html( get_theme_mod( 'responsive_sub_menu_border_color', '' ) );

	$sub_menu_divider       = esc_html( get_theme_mod( 'responsive_sub_menu_divider', 0 ) );
	$sub_menu_divider_color = esc_html( get_theme_mod( 'responsive_sub_menu_divider_color', '#eaeaea' ) );

	$custom_css .= ".main-navigation .children, .main-navigation .sub-menu {
		border-top-width: {$sub_menu_border_top}px;
		border-bottom-width: {$sub_menu_border_bottom}px;
		border-left-width: {$sub_menu_border_left}px;
		border-right-width: {$sub_menu_border_right}px;
		border-color: $sub_menu_border_color;
		border-style: solid;

	}
	@media screen and ( max-width: 992px ) {
		.main-navigation .children, .main-navigation .sub-menu {
			border-top-width: {$sub_menu_border_tablet_top}px;
			border-bottom-width: {$sub_menu_border_tablet_bottom}px;
			border-left-width: {$sub_menu_border_tablet_left}px;
			border-right-width: {$sub_menu_border_tablet_right}px;
			border-color: $sub_menu_border_color;
			border-style: solid;
		}
	}
	@media screen and ( max-width: 576px ) {
		.main-navigation .children, .main-navigation .sub-menu {
			border-top-width: {$sub_menu_border_mobile_top}px;
			border-bottom-width: {$sub_menu_border_mobile_bottom}px;
			border-left-width: {$sub_menu_border_mobile_left}px;
			border-right-width: {$sub_menu_border_mobile_right}px;
			border-color: $sub_menu_border_color;
			border-style: solid;
		}
	}";

	if ( 1 == $sub_menu_divider ) {
		$custom_css .= "
	.main-navigation .children li, .main-navigation .sub-menu li {
		border-bottom-width: 1px;
		border-style: solid;
		border-color: $sub_menu_divider_color;
	}
	.main-navigation .children li:last-child, .main-navigation .sub-menu li:last-child {
		border-style: none;
	}
	";
}


		if ( ( 1 == $disable_menu ) && ( 0 == $disable_mobile_menu ) ) {
			$custom_css .= ".site-branding {

	    		width: -webkit-fill-available;
				}";
	}

	$custom_css .= '.site-branding-wrapper {
		padding: ' . responsive_spacing_css( $header_padding_top, $header_padding_right, $header_padding_bottom, $header_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
		.site-branding-wrapper {
			padding: ' . responsive_spacing_css( $header_tablet_padding_top, $header_tablet_padding_right, $header_tablet_padding_bottom, $header_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.site-branding-wrapper {
			padding: ' . responsive_spacing_css( $header_mobile_padding_top, $header_mobile_padding_right, $header_mobile_padding_bottom, $header_mobile_padding_left ) . ';
		}
	}';
	$custom_css .= '.res-transparent-header .site-content {
		padding: ' . responsive_spacing_css( $site_content_padding_top, $site_content_padding_right, $site_content_padding_bottom, $site_content_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
		.res-transparent-header .site-content {
			padding: ' . responsive_spacing_css( $site_content_tablet_padding_top, $site_content_tablet_padding_right, $site_content_tablet_padding_bottom, $site_content_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.res-transparent-header .site-content {
			padding: ' . responsive_spacing_css( $site_content_mobile_padding_top, $site_content_mobile_padding_right, $site_content_mobile_padding_bottom, $site_content_mobile_padding_left ) . ';
		}
	}';

	if ( is_rtl() ) {
		$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
			.main-navigation .menu > li {
				float: right;
				margin-right: 2px;
			}

			.main-navigation .res-iconify {
				left: 0;
				margin-right: 5px;
			}

			.main-navigation .children,
			.main-navigation .sub-menu {
				right: -9999em;
				margin-right: 0;
			}

			.main-navigation .children > li.focus > .children,
			.main-navigation .children > li.focus > .sub-menu, .main-navigation .children > li:hover > .children,
			.main-navigation .children > li:hover > .sub-menu,
			.main-navigation .sub-menu > li.focus > .children,
			.main-navigation .sub-menu > li.focus > .sub-menu,
			.main-navigation .sub-menu > li:hover > .children,
			.main-navigation .sub-menu > li:hover > .sub-menu {
				right: 100% !important;
			}

			.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu > li {
				margin-right: 0;
				margin-left: 2px;
			}

			.site-header-layout-vertical .main-navigation .menu > li {
				margin-right: 0;
				margin-left: 2px;
			}

			.site-header-layout-vertical.site-header-alignment-left .main-navigation .menu {
				display: table;
				margin-left: 0;
				margin-right: auto;
			}

		}";
	}
	if ( 'fullscreen' === $mobile_menu_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.main-navigation.toggled {
				background-color: {$header_mobile_menu_background_color};
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 50px;
				position: fixed;
				top: 0;
				width: 100%;
			    z-index: 100000;
			}
			.main-navigation.toggled .menu {
				margin-top: 70px;
			    margin: 0 auto;
			}
			.site-mobile-header-layout-vertical .main-navigation.toggled .menu {
				margin-top: 0px;
			}
		}";

	} elseif ( 'sidebar' === $mobile_menu_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.mobile-menu-style-sidebar .main-navigation {
				-webkit-transition-property: width, display; /* Safari */
				-webkit-transition-duration: 0.6s; /* Safari */
				-webkit-transition-delay: 0s; /* Safari */
				transition-property: width, display;
				transition-duration: 0.6s;
				transition-delay: 0s;
			}
			.mobile-menu-style-sidebar .main-navigation.toggled {
			    background-color: {$header_mobile_menu_background_color};
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 15px;
				position: fixed;
				top: 0;
				width: 300px;
			    z-index: 100000;
			}
			.mobile-menu-style-sidebar .main-navigation.toggled .menu-toggle {
				position: absolute;
				top: 28px;
				right: 15px;
			}
			.site-mobile-header-layout-vertical .main-navigation.toggled .menu,
			.main-navigation.toggled .menu {
				margin-top: 70px;
			}
			.site-header-layout-vertical.site-header-alignment-left .main-navigation.toggled .menu-toggle {
				text-align: right;
			}
			.site-header-layout-vertical.site-header-alignment-right .main-navigation.toggled .menu-toggle {
				text-align: left;
			}
		}";

		if ( 'right' === get_theme_mod( 'responsive_sidebar_menu_alignment', 'left' ) ) {
			$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.mobile-menu-style-sidebar .main-navigation.toggled {
					left: auto;
					right: 0;
				}
				.mobile-menu-style-sidebar .main-navigation.toggled .menu-toggle {
					left: 15px;
					right: auto;
				}
			}";
		}
	}
	// Stack on mobile menu.
	$stacked_mobile_menu = get_theme_mod( 'responsive_stacked_mobile_menu', 1 );
	$stacked_mobile_menu = ( 1 === $stacked_mobile_menu ) ? 'column' : 'row';
	$custom_css         .= "@media (max-width:{$mobile_menu_breakpoint}px) {
		.main-navigation.toggled .menu{
			flex-direction: {$stacked_mobile_menu};
		}
	}";

	// Menu Item Hover Style.
	$menu_item_hover_style_selected                  = get_theme_mod( 'responsive_menu_item_hover_style', 'none' );
	$menu_item_link_color_set                        = get_theme_mod( 'responsive_header_menu_link_color', '#333333' );
	$menu_item_link_hover_color_set                  = get_theme_mod( 'responsive_header_menu_link_hover_color', '#10659C' );
	$menu_item_active_link_color_set                 = get_theme_mod( 'responsive_header_active_menu_link_color', '' );
	$menu_item_underline_overline                    = '';
	$active_menu_item_underline_overline             = '';
	$transparent_header_enabled_check                = get_theme_mod( 'responsive_transparent_header', 0 );
	$transparent_menu_item_link_color_set            = get_theme_mod( 'responsive_transparent_header_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) );
	$transparent_menu_item_link_hover_color_set      = get_theme_mod( 'responsive_transparent_header_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) );
	$transparent_menu_item_active_link_color_set     = get_theme_mod( 'responsive_transparent_header_active_menu_link_color', '' );
	$transparent_menu_item_underline_overline        = '';
	$transparent_active_menu_item_underline_overline = '';

	if ( '' !== $menu_item_link_hover_color_set ) {
		$menu_item_underline_overline        = $menu_item_link_hover_color_set;
		$active_menu_item_underline_overline = $menu_item_link_hover_color_set;
	} else {
		if ( '' !== $menu_item_active_link_color_set ) {
			$active_menu_item_underline_overline = $menu_item_active_link_color_set;
		} else {
			$active_menu_item_underline_overline = $menu_item_link_color_set;
		}
		$menu_item_underline_overline = $menu_item_link_color_set;
	}

	if ( '' !== $transparent_menu_item_link_hover_color_set ) {
		$transparent_menu_item_underline_overline        = $transparent_menu_item_link_hover_color_set;
		$transparent_active_menu_item_underline_overline = $transparent_menu_item_link_hover_color_set;
	} else {
		if ( '' !== $transparent_menu_item_active_link_color_set ) {
			$transparent_active_menu_item_underline_overline = $transparent_menu_item_active_link_color_set;
		} else {
			$transparent_active_menu_item_underline_overline = $transparent_menu_item_link_color_set;
		}
		$transparent_menu_item_underline_overline = $transparent_menu_item_link_color_set;
	}

	if ( $transparent_header_enabled_check ) {
		if ( 'underline' === $menu_item_hover_style_selected ) {
			$custom_css .= ".menu-item-hover-style-underline .menu.nav-menu > li::after {
				display: block;
				content: '';
				border-bottom: solid 3px {$transparent_menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after {
				border-bottom: solid 3px {$transparent_active_menu_item_underline_overline};
			}
			.menu-item-hover-style-underline .menu.nav-menu > li:hover::after { transform: scaleX(1); }
			.menu-item-hover-style-underline .menu.nav-menu > li::after{  transform-origin: 0% 50%; }";
		} elseif ( 'overline' === $menu_item_hover_style_selected ) {
			$custom_css .= ".menu-item-hover-style-overline .menu.nav-menu > li::before {
				display: block;
				content: '';
				border-bottom: solid 3px {$transparent_menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.menu-item-hover-style-overline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before {
				border-bottom: solid 3px {$transparent_active_menu_item_underline_overline};
			}
			.menu-item-hover-style-overline .menu.nav-menu > li:hover::before { transform: scaleX(1); }
			.menu-item-hover-style-overline .menu.nav-menu > li::before{  transform-origin: 0% 50%; }";
		}
	} else {
		if ( 'underline' === $menu_item_hover_style_selected ) {
			$custom_css .= ".menu-item-hover-style-underline .menu.nav-menu > li::after {
				display: block;
				content: '';
				border-bottom: solid 3px {$menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after {
				border-bottom: solid 3px {$active_menu_item_underline_overline};
			}
			.menu-item-hover-style-underline .menu.nav-menu > li:hover::after { transform: scaleX(1); }
			.menu-item-hover-style-underline .menu.nav-menu > li::after{  transform-origin: 0% 50%; }";
		} elseif ( 'overline' === $menu_item_hover_style_selected ) {
			$custom_css .= ".menu-item-hover-style-overline .menu.nav-menu > li::before {
				display: block;
				content: '';
				border-bottom: solid 3px {$menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.menu-item-hover-style-overline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before {
				border-bottom: solid 3px {$active_menu_item_underline_overline};
			}
			.menu-item-hover-style-overline .menu.nav-menu > li:hover::before { transform: scaleX(1); }
			.menu-item-hover-style-overline .menu.nav-menu > li::before{  transform-origin: 0% 50%; }";
		}
	}

	if ( 'zoom' === $menu_item_hover_style_selected ) {
		$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
			.menu-item-hover-style-zoom .menu.nav-menu > li > a:hover, .menu.nav-menu > .menu-item > .menu-link:hover {
				transition: all 0.3s ease-in-out;
				transform: scale(1.1);
			}
		}";
	}

	// Hamburger Menu Width Style.
	$hamburger_menu_width_style = get_theme_mod( 'responsive_hamburger_menu_label_text', '' );
	if ( '' !== $hamburger_menu_width_style ) {
		$custom_css .= ".main-navigation .menu-toggle {
			width: auto;
			padding-left: 10px;
			padding-right: 10px;
		}";
	} else {
		$custom_css .= ".main-navigation .menu-toggle {
			width: 49px;
		}";
	}

	// Hamburger Menu Label Font Size.
	$hamburger_menu_label_font_value = get_theme_mod( 'responsive_hamburger_menu_label_font_size', 20 );
	if ( $hamburger_menu_label_font_value ) {
		$custom_css .= ".hamburger-menu-label {
			font-size: {$hamburger_menu_label_font_value}px;
		}";
	}

	// Menu Toggle Styles.
	$mobile_menu_toggle_border_color = esc_html( get_theme_mod( 'responsive_mobile_menu_toggle_border_color', Responsive\Core\get_responsive_customizer_defaults( 'mobile_menu_toggle_border_color' ) ) );
	$mobile_menu_border_radius       = esc_html( get_theme_mod( 'responsive_menu_button_radius', Responsive\Core\get_responsive_customizer_defaults( 'menu_button_radius' ) ) );
	$mobile_menu_toggle_style        = get_theme_mod( 'responsive_mobile_menu_toggle_style', 'fill' );
	if ( 'fill' === $mobile_menu_toggle_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.main-navigation.toggled .menu-toggle{
					background-color:{$header_menu_toggle_background_color};
					border: none;
					border-radius: {$mobile_menu_border_radius}px;
				}
				.main-navigation .menu-toggle{
					background-color: {$header_menu_toggle_background_color} ;
					border:none;
					border-radius: {$mobile_menu_border_radius}px;
				}

			}";

	} elseif ( 'minimal' === $mobile_menu_toggle_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.main-navigation.toggled .menu-toggle{
					background-color: {$header_background_color};
					border: none;
				}
				.main-navigation .menu-toggle{
					background-color: {$header_background_color}  ;
					border:none;
				}
				.main-navigation {
					background-color: {$header_background_color};
				}
			}";
	} elseif ( 'outline' === $mobile_menu_toggle_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.main-navigation.toggled .menu-toggle{
					background-color: {$header_background_color};
					border-style: solid;
					border-width: 1px;
					border-color:{$mobile_menu_toggle_border_color };
					border-radius: {$mobile_menu_border_radius}px;

				}
				.main-navigation .menu-toggle{
					background-color: {$header_background_color}  ;
					border-style: solid;
					border-width: 1px;
					border-color:{$mobile_menu_toggle_border_color };
					border-radius: {$mobile_menu_border_radius}px;
				}
				.main-navigation {
					background-color: {$header_background_color};
				}
			}";
	}

	$responsive_mobile_logo_option = get_theme_mod( 'responsive_mobile_logo_option', 0 );
	$responsive_mobile_logo        = get_theme_mod( 'responsive_mobile_logo' );
	if ( '' !== $responsive_mobile_logo && '1' == $responsive_mobile_logo_option ) {
		$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
			.mobile-custom-logo {
				display: none;
			}
			.custom-logo-link {
				display: block;
			}
		}
		";
	} else {
		$custom_css .= ".custom-logo-link {
			display: block;
		}";
	}
	$responsive_hide_last_item_mobile_menu = get_theme_mod( 'responsive_hide_last_item_mobile_menu', 0 );
	if ( '1' == $responsive_hide_last_item_mobile_menu ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.res-cart-link, .res-last-item {
				display: none;
			}
		}
		";
	}

	// Sub-menu Container Top Offset.
	$sub_menu_container_top_offset_value = esc_html( get_theme_mod( 'responsive_sub_menu_container_top_offset', 0 ) );
	if ( $sub_menu_container_top_offset_value ) {
		$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
			.main-navigation .menu.nav-menu > li:hover > ul,
			.main-navigation .menu.nav-menu > li.focus > ul {
				margin-top: {$sub_menu_container_top_offset_value}px;
			}
			.main-navigation .menu.nav-menu > .menu-item-has-children:hover > ul::before,
			.main-navigation .menu.nav-menu > .page_item_has_children:hover > ul::before {
				position: absolute;
				content: '';
				top: 0;
				left: 0;
				width: 100%;
				transform: translateY(-100%);
				height: {$sub_menu_container_top_offset_value}px;
			}
		}";
	}

	// Content_Header colors.
	$content_header_heading_color     = esc_html( get_theme_mod( 'responsive_content_header_heading_color', Responsive\Core\get_responsive_customizer_defaults( 'content_header_heading' ) ) );
	$content_header_description_color = esc_html( get_theme_mod( 'responsive_content_header_description_color', Responsive\Core\get_responsive_customizer_defaults( 'content_header_heading' ) ) );
	$breadcrumb_color                 = esc_html( get_theme_mod( 'responsive_breadcrumb_color', Responsive\Core\get_responsive_customizer_defaults( 'content_header_heading' ) ) );

	// Content Header Padding.
	$content_header_padding_right  = esc_html( get_theme_mod( 'responsive_content_header_right_padding', 30 ) );
	$content_header_padding_left   = esc_html( get_theme_mod( 'responsive_content_header_left_padding', 30 ) );
	$content_header_padding_top    = esc_html( get_theme_mod( 'responsive_content_header_top_padding', 30 ) );
	$content_header_padding_bottom = esc_html( get_theme_mod( 'responsive_content_header_bottom_padding', 30 ) );

	$content_header_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_content_header_tablet_right_padding', 30 ) );
	$content_header_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_content_header_tablet_left_padding', 30 ) );
	$content_header_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_content_header_tablet_top_padding', 30 ) );
	$content_header_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_content_header_tablet_bottom_padding', 30 ) );

	$content_header_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_content_header_mobile_right_padding', 30 ) );
	$content_header_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_content_header_mobile_left_padding', 30 ) );
	$content_header_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_content_header_mobile_top_padding', 30 ) );
	$content_header_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_content_header_mobile_bottom_padding', 30 ) );

	$custom_css .= "
	.site-content-header .page-header .page-title,
	.site-content-header .page-title {
		color: {$content_header_heading_color};
	}
	.site-content-header .page-header .page-description,
	.site-content-header .page-description {
		color: {$content_header_description_color};
	}
	.site-content-header .breadcrumb-list,
	.site-content-header .breadcrumb-list a {
		color: {$breadcrumb_color};
	}";

	$custom_css .= '.site-content-header {
		padding: ' . responsive_spacing_css( $content_header_padding_top, $content_header_padding_right, $content_header_padding_bottom, $content_header_padding_left ) . ';
	}
	@media screen and ( max-width: 768px ) {
		.site-content-header {
			padding: ' . responsive_spacing_css( $content_header_tablet_padding_top, $content_header_tablet_padding_right, $content_header_tablet_padding_bottom, $content_header_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.site-content-header {
			padding: ' . responsive_spacing_css( $content_header_mobile_padding_top, $content_header_mobile_padding_right, $content_header_mobile_padding_bottom, $content_header_mobile_padding_left ) . ';
		}
	}';

	// Entry Blog Styles.
	$blog_content_width = esc_html( get_theme_mod( 'responsive_blog_content_width', Responsive\Core\get_responsive_customizer_defaults( 'blog_content_width' ) ) );

	$custom_css        .= "
	@media (min-width:992px) {
		.search:not(.post-type-archive-product) .content-area,
		.archive:not(.post-type-archive-product):not(.post-type-archive-course) .content-area,
		.blog:not(.custom-home-page-active) .content-area {
			width:{$blog_content_width}%;
		}
		.search:not(.post-type-archive-product) aside.widget-area,
		.archive:not(.post-type-archive-product) aside.widget-area,
		.blog:not(.custom-home-page-active) aside.widget-area {
			width: calc(100% - {$blog_content_width}%);
		}
	}";

	// Entry Blog featured image.
	$blog_entry_featured_image_style = get_theme_mod( 'responsive_blog_featured_image_width' ) ? esc_html( get_theme_mod( 'responsive_blog_featured_image_width' ) . 'px' ) : 'auto';

	$custom_css .= "
		.search .site-content article.product .post-entry .thumbnail img,
		.search .hentry .thumbnail img,
		.archive .hentry .thumbnail img,
		.blog .hentry .thumbnail img {
			width: {$blog_entry_featured_image_style};
		}";

	$blog_entry_featured_image_style = get_theme_mod( 'responsive_blog_entry_featured_image_style', 'default' );

	if ( 'stretched' === $blog_entry_featured_image_style ) {
		$custom_css .= "
		.search .thumbnail-caption,
		.archive .thumbnail-caption,
		.blog .thumbnail-caption {
			text-align: center;
		}
		.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,
		.search.responsive-site-style-content-boxed .hentry .thumbnail,
		.search.responsive-site-style-boxed .hentry .thumbnail,
		.archive.responsive-site-style-content-boxed .hentry .thumbnail,
		.archive.responsive-site-style-boxed .hentry .thumbnail,
		.blog.responsive-site-style-content-boxed .hentry .thumbnail,
		.blog.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,
		.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
		.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
		.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,
			.search.responsive-site-style-content-boxed .hentry .thumbnail,
			.search.responsive-site-style-boxed .hentry .thumbnail,
			.archive.responsive-site-style-content-boxed .hentry .thumbnail,
			.archive.responsive-site-style-boxed .hentry .thumbnail,
			.blog.responsive-site-style-content-boxed .hentry .thumbnail,
			.blog.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
			.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_tablet_padding_top}px;
			}
		}
		@media (max-width:576px) {
			.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,
			.search.responsive-site-style-content-boxed .hentry .thumbnail,
			.search.responsive-site-style-boxed .hentry .thumbnail,
			.archive.responsive-site-style-content-boxed .hentry .thumbnail,
			.archive.responsive-site-style-boxed .hentry .thumbnail,
			.blog.responsive-site-style-content-boxed .hentry .thumbnail,
			.blog.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
			.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_mobile_padding_top}px;
			}
		}";
	}

	// Entry Blog Meta Separator.
	$blog_entry_meta_separator = esc_html( get_theme_mod( 'responsive_blog_entry_meta_separator_text', '-' ) );

	$custom_css .= "
	.search .hentry .post-meta > span::after,
	.archive .hentry .post-meta > span::after,
	.blog .hentry .post-meta > span::after {
	    content: '{$blog_entry_meta_separator}';
	}";

	// Single Blog Styles.
	$single_blog_content_width = esc_html( get_theme_mod( 'responsive_single_blog_content_width', Responsive\Core\get_responsive_customizer_defaults( 'single_blog_content_width' ) ) );
	$custom_css               .= "
	@media (min-width:992px) {
		.single:not(.single-product) .content-area {
			width:{$single_blog_content_width}%;
		}
		.single:not(.single-product) aside.widget-area {
			width: calc(100% - {$single_blog_content_width}%);
		}
	}";

	// Single Blog featured image.
	$single_blog_entry_featured_image_style = get_theme_mod( 'responsive_single_blog_featured_image_width' ) ? esc_html( get_theme_mod( 'responsive_single_blog_featured_image_width' ) . 'px' ) : 'auto';

	$custom_css .= "
		.single .hentry .thumbnail img {
			width: {$single_blog_entry_featured_image_style};
		}";

	$single_blog_entry_featured_image_style = esc_html( get_theme_mod( 'responsive_single_blog_featured_image_style', 'default' ) );

	if ( 'stretched' === $single_blog_entry_featured_image_style ) {
		$custom_css .= "
		.single .thumbnail-caption {
			text-align: center;
		}
		.single.responsive-site-style-content-boxed .hentry .thumbnail,
		.single.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.single.responsive-site-style-content-boxed .hentry .thumbnail,
			.single.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
			.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_tablet_padding_top}px;
			}
		}
		@media (max-width:576px) {
			.single.responsive-site-style-content-boxed .hentry .thumbnail,
			.single.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
			.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_mobile_padding_top}px;
			}
		}";
	}

	// Entry Blog Meta Separator.
	$single_blog_entry_meta_separator = esc_html( get_theme_mod( 'responsive_single_blog_meta_separator_text', '-' ) );

	$custom_css .= "
	.single .hentry .post-meta > span::after {
	    content: '{$single_blog_entry_meta_separator}';
	}";

	// Page Styles.
	if ( is_page() ) {
		$page_content_width = get_post_meta( get_the_ID(), 'responsive_page_meta_content_width', true ) ? get_post_meta( get_the_ID(), 'responsive_page_meta_content_width', true ) : esc_html( get_theme_mod( 'responsive_page_content_width', Responsive\Core\get_responsive_customizer_defaults( 'page_content_width' ) ) );
	} else {
		$page_content_width = esc_html( get_theme_mod( 'responsive_page_content_width', Responsive\Core\get_responsive_customizer_defaults( 'page_content_width' ) ) );
	}

	$custom_css .= "
	@media (min-width:992px) {
		.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) .content-area {
			width:{$page_content_width}%;
		}
		.page aside.widget-area:not(.home-widgets) {
			width: calc(100% - {$page_content_width}%);
		}
	}";

	// Page featured image.
	$page_entry_featured_image_style = get_theme_mod( 'responsive_page_featured_image_width' ) ? esc_html( get_theme_mod( 'responsive_page_featured_image_width' ) . 'px' ) : 'auto';

	$custom_css .= "
		.page .hentry .thumbnail img {
			width: {$page_entry_featured_image_style};
		}";

	$page_entry_featured_image_style = get_theme_mod( 'responsive_page_featured_image_style', 'default' );

	if ( 'stretched' === $page_entry_featured_image_style ) {
		$custom_css .= "
		.page .thumbnail-caption {
			text-align: center;
		}
		.page.responsive-site-style-content-boxed .hentry .thumbnail,
		.page.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.page.responsive-site-style-content-boxed .hentry .thumbnail,
			.page.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
			.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_tablet_padding_top}px;
			}
		}
		@media (max-width:576px) {
			.page.responsive-site-style-content-boxed .hentry .thumbnail,
			.page.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
			.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
			.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
				margin-top: -{$box_mobile_padding_top}px;
			}
		}";
	}

	$custom_css .= "
		.header-widgets {
			background-color: {$header_widget_background_color};
			color: {$header_widget_text_color};
			border-color: {$header_widget_border_color};
		}
		.header-widgets h1,
		.header-widgets h2,
		.header-widgets h3,
		.header-widgets h4,
		.header-widgets h5,
		.header-widgets h6 {
			color:{$header_widget_text_color};
		}
		.header-widgets .widget-title h4 {
			color: {$header_widget_text_color};
		}
		.header-widgets a {
			color: {$header_widget_link_color};
		}
		.header-widgets a:focus,
		.header-widgets a:hover {
			color: {$header_widget_link_hover_color};
		}
	";

	// Footer Widget Alignment.
	$footer_widgets_columns = get_theme_mod( 'responsive_footer_widgets_columns' );
	for ( $i = 1; $i <= $footer_widgets_columns; $i++ ) {
		$alignment_desktop = esc_html( get_theme_mod( 'responsive_footer_widget_alignment_desktop_' . $i, 'left' ) );
		$alignment_tablet  = esc_html( get_theme_mod( 'responsive_footer_widget_alignment_tablet_' . $i, 'center' ) );
		$alignment_mobile  = esc_html( get_theme_mod( 'responsive_footer_widget_alignment_mobile_' . $i, 'center' ) );
		$custom_css       .= ".footer-widget-{$i} .widget-wrapper {
			text-align: {$alignment_desktop};
		}
		@media screen and ( max-width: 992px ) {
			.footer-widget-{$i} .widget-wrapper {
				text-align: {$alignment_tablet};
			}
		}
		@media screen and ( max-width: 576px ) {
			.footer-widget-{$i} .widget-wrapper {
				text-align: {$alignment_mobile};
			}
		}
		";
	}

	// footer_widgets Padding.
	$footer_widgets_padding_right  = esc_html( get_theme_mod( 'responsive_footer_widgets_right_padding', 0 ) );
	$footer_widgets_padding_left   = esc_html( get_theme_mod( 'responsive_footer_widgets_left_padding', 0 ) );
	$footer_widgets_padding_top    = esc_html( get_theme_mod( 'responsive_footer_widgets_top_padding', 20 ) );
	$footer_widgets_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_widgets_bottom_padding', 20 ) );

	$footer_widgets_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_right_padding', 0 ) );
	$footer_widgets_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_left_padding', 0 ) );
	$footer_widgets_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_top_padding', 20 ) );
	$footer_widgets_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_widgets_tablet_bottom_padding', 20 ) );

	$footer_widgets_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_right_padding', 0 ) );
	$footer_widgets_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_left_padding', 0 ) );
	$footer_widgets_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_top_padding', 20 ) );
	$footer_widgets_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_widgets_mobile_bottom_padding', 20 ) );

	// Hide on select Devices.
	$footer_widget_desktop_visibility = get_theme_mod( 'responsive_footer_widget_desktop_visibility', 0 );
	$footer_widget_desktop_visibility = ( 1 === $footer_widget_desktop_visibility ) ? 'none' : 'block';

	$footer_widget_tablet_visibility = get_theme_mod( 'responsive_footer_widget_tablet_visibility', 0 );
	$footer_widget_tablet_visibility = ( 1 === $footer_widget_tablet_visibility ) ? 'none' : 'block';

	$footer_widget_mobile_visibility = get_theme_mod( 'responsive_footer_widget_mobile_visibility', 0 );
	$footer_widget_mobile_visibility = ( 1 === $footer_widget_mobile_visibility ) ? 'none' : 'block';

	$custom_css .= ".footer-widgets {
		display: {$footer_widget_desktop_visibility};
	    padding: " . responsive_spacing_css( $footer_widgets_padding_top, $footer_widgets_padding_right, $footer_widgets_padding_bottom, $footer_widgets_padding_left ) . ";

	}
	@media screen and ( max-width: 992px ) {
	    .footer-widgets {
			display: {$footer_widget_tablet_visibility};
	        padding: " . responsive_spacing_css( $footer_widgets_tablet_padding_top, $footer_widgets_tablet_padding_right, $footer_widgets_tablet_padding_bottom, $footer_widgets_tablet_padding_left ) . ";
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .footer-widgets {
			display: {$footer_widget_mobile_visibility};
	        padding: " . responsive_spacing_css( $footer_widgets_mobile_padding_top, $footer_widgets_mobile_padding_right, $footer_widgets_mobile_padding_bottom, $footer_widgets_mobile_padding_left ) . ';
	    }
	}';

	// footer_bar Padding.
	$footer_bar_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_right_padding', 0 ) );
	$footer_bar_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_left_padding', 0 ) );
	$footer_bar_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_top_padding', 20 ) );
	$footer_bar_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_bottom_padding', 20 ) );

	$footer_bar_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_right_padding', 0 ) );
	$footer_bar_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_left_padding', 0 ) );
	$footer_bar_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_top_padding', 20 ) );
	$footer_bar_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_bottom_padding', 20 ) );

	$footer_bar_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_right_padding', 0 ) );
	$footer_bar_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_left_padding', 0 ) );
	$footer_bar_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_top_padding', 20 ) );
	$footer_bar_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_bottom_padding', 20 ) );

	$custom_css .= '.footer-bar {
	    padding: ' . responsive_spacing_css( $footer_bar_padding_top, $footer_bar_padding_right, $footer_bar_padding_bottom, $footer_bar_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
	    .footer-bar {
	        padding: ' . responsive_spacing_css( $footer_bar_tablet_padding_top, $footer_bar_tablet_padding_right, $footer_bar_tablet_padding_bottom, $footer_bar_tablet_padding_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .footer-bar {
	        padding: ' . responsive_spacing_css( $footer_bar_mobile_padding_top, $footer_bar_mobile_padding_right, $footer_bar_mobile_padding_bottom, $footer_bar_mobile_padding_left ) . ';
	    }
	}';

	// Footer Colors.
	$footer_text_color       = esc_html( get_theme_mod( 'responsive_footer_text_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_text' ) ) );
	$footer_background_color = esc_html( get_theme_mod( 'responsive_footer_background_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_background' ) ) );
	$footer_link_color       = esc_html( get_theme_mod( 'responsive_footer_links_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_links' ) ) );
	$footer_link_hover_color = esc_html( get_theme_mod( 'responsive_footer_links_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_links_hover' ) ) );
	$footer_border_color     = esc_html( get_theme_mod( 'responsive_footer_border_color', '#aaaaaa' ) );
	$footer_border_size      = esc_html( get_theme_mod( 'responsive_footer_border_size', 1 ) );

	$custom_css .= "
	.site-footer {
		color:{$footer_text_color};
		background-color:{$footer_background_color};
	}
	.site-footer h1,
	.site-footer h2,
	.site-footer h3,
	.site-footer h4,
	.site-footer h5,
	.site-footer h6 {
		color:{$footer_text_color};
	}
	.site-footer a {
		color:{$footer_link_color};
	}
	.site-footer a:focus,
	.site-footer a:hover {
		color:{$footer_link_hover_color};
	}
	.footer-bar {
		border-color: {$footer_border_color};
		border-top-width: {$footer_border_size}px;
		border-top-style: solid;
	}
	";

	// Hide Copyright on selected Devices

	$copyright_desktop_visibility = get_theme_mod( 'responsive_copyright', 0 );
	$copyright_desktop_visibility = ( 1 === $copyright_desktop_visibility ) ? 'none' : 'block';

	$copyright_tablet_visibility = get_theme_mod( 'responsive_copyright_tablet', 0 );
	$copyright_tablet_visibility = ( 1 === $copyright_tablet_visibility ) ? 'none' : 'block';

	$copyright_mobile_visibility = get_theme_mod( 'responsive_copyright_mobile', 0 );
	$copyright_mobile_visibility = ( 1 === $copyright_mobile_visibility ) ? 'none' : 'block';

	$custom_css .= ".footer-layouts.copyright {
	    display: {$copyright_desktop_visibility};
	}
	@media screen and ( max-width: 992px ) {
		.footer-layouts.copyright {
				display: {$copyright_tablet_visibility};
		}
	}
	@media screen and ( max-width: 576px ) {
		.footer-layouts.copyright {
				display: {$copyright_mobile_visibility};
		}
	}";

	// Scroll To Top
	$scroll_totop                    = get_theme_mod( 'responsive_scroll_to_top' );
	$stt_devices                     = get_theme_mod( 'responsive_scroll_to_top_on_devices' );
	$stt_position                    = get_theme_mod( 'responsive_scroll_to_top_icon_position' );
	$stt_icon_size                   = get_theme_mod( 'responsive_scroll_to_top_icon_size' );
	$stt_icon_radius                 = get_theme_mod( 'responsive_scroll_to_top_icon_radius' );
	$stt_icon_color                  = get_theme_mod( 'responsive_scroll_to_top_icon_color' );
	$stt_icon_hover_color            = get_theme_mod( 'responsive_scroll_to_top_icon_hover_color' );
	$stt_icon_background_color       = get_theme_mod( 'responsive_scroll_to_top_icon_background_color' );
	$stt_icon_background_hover_color = get_theme_mod( 'responsive_scroll_to_top_icon_background_hover_color' );

	if ( 1 == $scroll_totop ) {
		$custom_css .= '@media (min-width: 769px) {
	    #scroll {
	    content: "769"; } }

	    #scroll {
	        position: fixed;
	        right: 2%;
	        bottom: 10px;
	        cursor: pointer;
	        width: 50px;
	        height: 50px;
	        background-color: #a8a6a6;
	        text-indent: -9999px;
	        z-index: 99999999;
	        -webkit-border-radius: 60px;
	        -moz-border-radius: 60px;
	        border-radius: 60px; }

	    #scroll span {
	        position: absolute;
	        top: 50%;
	        left: 50%;
	        margin-left: -8px;
	        margin-top: -12px;
	        height: 0;
	        width: 0;
	        border: 8px solid transparent;
	        border-bottom-color: #fff; }

	    #scroll:hover {
	        background-color: #d1cfcf; }
	    ';
	}
	if ( ! empty( $stt_icon_size ) ) {
		$custom_css .= "#scroll {
			height: {$stt_icon_size}px;
			width: {$stt_icon_size}px;
		}";
	}
	if ( ! empty( $stt_position ) ) {
		$custom_css .= "#scroll {
			{$stt_position}: 2px;
		}";
	}
	if ( isset( $stt_icon_radius ) ) {
		$custom_css .= "#scroll {
			border-radius: {$stt_icon_radius}%;
		}";
	}
	if ( ! empty( $stt_icon_background_color ) ) {
		$custom_css .= "#scroll {
			background-color: {$stt_icon_background_color};
		}";
	}
	if ( ! empty( $stt_icon_background_hover_color ) ) {
		$custom_css .= "#scroll:hover {
			background-color: {$stt_icon_background_hover_color};
		}";
	}
	if ( ! empty( $stt_icon_color ) ) {
		$custom_css .= "#scroll span {
			border-bottom-color : {$stt_icon_color};
		}";
	}
	if ( ! empty( $stt_icon_hover_color ) ) {
		$custom_css .= "#scroll:hover span {
			border-bottom-color : {$stt_icon_hover_color};
		}";
	}

	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', responsive_minimize_css( $custom_css ) ) );

	if ( class_exists( 'WooCommerce' ) ) {
		// WooCommerce.
		$woocommerce_custom_css = '';

		$woocommerce_custom_css .= "
		.wc-block-grid__product-title {
			color:{$body_text_color};
		}
		.woocommerce .woocommerce-breadcrumb,
		.woocommerce .woocommerce-breadcrumb a {
			color: {$breadcrumb_color};
		}";

		$woocommerce_custom_css .= '
		.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
		.woocommerce-page.responsive-site-style-boxed ul.products li.product,
		.woocommerce.responsive-site-style-boxed ul.products li.product,
		.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
		.woocommerce.single-product:not(.responsive-site-style-flat) div.product, .elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap {
			background-color: ' . $box_background_color . ';
			border-radius: ' . $box_radius . 'px;
			padding: ' . responsive_spacing_css( $box_padding_top, $box_padding_right, $box_padding_bottom, $box_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
			.woocommerce-page.responsive-site-style-boxed ul.products li.product,
			.woocommerce.responsive-site-style-boxed ul.products li.product,
			.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
			.woocommerce.single-product:not(.responsive-site-style-flat) div.product, .elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap {
				padding: ' . responsive_spacing_css( $box_tablet_padding_top, $box_tablet_padding_right, $box_tablet_padding_bottom, $box_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
			.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce.responsive-site-style-content-boxed .products-wrapper,
			.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
			.woocommerce-page.responsive-site-style-boxed ul.products li.product,
			.woocommerce.responsive-site-style-boxed ul.products li.product,
			.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
			.woocommerce.single-product:not(.responsive-site-style-flat) div.product, .elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap {
				padding: ' . responsive_spacing_css( $box_mobile_padding_top, $box_mobile_padding_right, $box_mobile_padding_bottom, $box_mobile_padding_left ) . ';
			}
			.woocommerce ul.products[class*=columns-] li.product, .woocommerce-page ul.products[class*=columns-] li.product{
		        width:100%;
		    }
		}';

		// Shop Styles.
		$shop_content_width                  = esc_html( get_theme_mod( 'responsive_shop_content_width', Responsive\Core\get_responsive_customizer_defaults( 'shop_content_width' ) ) );
		$shop_product_rating_color           = esc_html( get_theme_mod( 'responsive_shop_product_rating_color', '#0066CC' ) );
		$shop_product_price_color            = esc_html( get_theme_mod( 'responsive_shop_product_price_color', Responsive\Core\get_responsive_customizer_defaults( 'shop_product_price' ) ) );
		$add_to_cart_button_color            = esc_html( get_theme_mod( 'responsive_add_to_cart_button_color', Responsive\Core\get_responsive_customizer_defaults( 'add_to_cart_button' ) ) );
		$add_to_cart_button_text_color       = esc_html( get_theme_mod( 'responsive_add_to_cart_button_text_color', '#ffffff' ) );
		$add_to_cart_button_hover_color      = esc_html( get_theme_mod( 'responsive_add_to_cart_button_hover_color', '#10659C' ) );
		$add_to_cart_button_hover_text_color = esc_html( get_theme_mod( 'responsive_add_to_cart_button_hover_text_color', '#ffffff' ) );
		$shop_sidebar_position               = esc_html( get_theme_mod( 'responsive_shop_sidebar_position', 'no' ) );
		$single_product_sidebar_position        = esc_html( get_theme_mod( 'responsive_single_product_sidebar_position', 'no' ) );

		if ( 'no' !== $shop_sidebar_position ) {
			$woocommerce_custom_css .= '
			@media (min-width:992px) {
				.search.woocommerce .content-area,
				.archive.woocommerce:not(.post-type-archive-course) .content-area, .page.woocommerce-cart .content-area {
					max-width: 70%;
				}
				.search.woocommerce aside.widget-area,
				.archive.woocommerce aside.widget-area, .woocommerce-cart aside.widget-area, .woocommerce-checkout aside.widget-area {
					min-width: 30%;
				}
			}';
		}

		if ( 'no' !== $single_product_sidebar_position ) {
			$woocommerce_custom_css .= '
			@media (min-width:992px) {
				.single-product.woocommerce .content-area {
					max-width: 70%;
				}
				.single-product.woocommerce aside.widget-area {
					min-width: 30%;
				}
			}';
		}

		$enable_off_canvas_filter         = get_theme_mod( 'responsive_enable_off_canvas_filter', 0 );
		$enable_off_canvas_filter         = $enable_off_canvas_filter ? 'inline-block' : 'none';
		$close_button_color               = get_theme_mod( 'responsive_off_canvas_close_button_color', '#CCCCCC' );
		$close_button_hover_color         = get_theme_mod( 'responsive_off_canvas_close_button_hover_color', '#777777' );
		$filter_button_color              = get_theme_mod( 'responsive_off_canvas_filter_button_color', 'transparent' );
		$filter_text_color                = get_theme_mod( 'responsive_off_canvas_filter_button_text_color', '#808080' );
		$filter_button_border_color       = get_theme_mod( 'responsive_off_canvas_filter_button_border_color', '#808080' );
		$filter_button_color_hover        = get_theme_mod( 'responsive_off_canvas_filter_button_hover_color', 'transparent' );
		$filter_text_color_hover          = get_theme_mod( 'responsive_off_canvas_filter_button_text_hover_color', '#10659c' );
		$filter_button_border_color_hover = get_theme_mod( 'responsive_off_canvas_filter_button_border_hover_color', '#10659c' );

		$woocommerce_custom_css  .= "
		@media (min-width:992px) {
			.search.woocommerce .content-area,
			.archive.woocommerce:not(.post-type-archive-course) .content-area {
				width: {$shop_content_width}%;
			}
			.search.woocommerce aside.widget-area,
			.archive.woocommerce aside.widget-area, .page.woocommerce-cart.woocommerce-page aside.widget-area, .page.woocommerce-checkout.woocommerce-page aside.widget-area {
				width: calc(100% - {$shop_content_width}%);
			}
		}

		.woocommerce span.onsale,
		.wc-block-grid__product-onsale {
			color: {$add_to_cart_button_text_color};
		}

		.product-sale-style-square-outline .wc-block-grid__product-onsale,
		.product-sale-style-circle-outline .wc-block-grid__product-onsale,
		.woocommerce span.onsale.square-outline,
		.woocommerce span.onsale.circle-outline {
			border-color: {$link_color};
			color: {$link_color};
		}
		.wc-block-grid__product-price,
		.woocommerce ul.products li.product .price {
			color: {$shop_product_price_color};
		}
		.woocommerce .star-rating span{
			color: {$shop_product_rating_color};
		}

		.woocommerce #respond input#submit,
		.wp-block-button__link.add_to_cart_button,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce button.button.alt,
		.woocommerce button.button,
		.woocommerce a.button, .woocommerce a.button.alt {
			background-color: {$add_to_cart_button_color};
			color: {$add_to_cart_button_text_color};
		}

		.woocommerce #respond input#submit:hover,
		.wp-block-button__link.add_to_cart_button:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
		.woocommerce button.button:focus,
		.woocommerce button.button.alt:focus,
		.woocommerce button.button:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button:hover,
		.woocommerce button.button:focus,
		.woocommerce a.button:focus,
		.woocommerce a.button:hover, .woocommerce a.button.alt:focus, .woocommerce a.button.alt:hover {
			background-color: {$add_to_cart_button_hover_color};
			color: {$add_to_cart_button_hover_text_color};
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {
			color: {$add_to_cart_button_hover_text_color};
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
			border-bottom-color: {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active::before {
			box-shadow: 2px 2px 0 {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active::after {
			box-shadow: -2px 2px 0 {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs::before,
		.woocommerce div.product .woocommerce-tabs ul.tabs li {
			border-color: {$add_to_cart_button_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li::after,
		.woocommerce div.product .woocommerce-tabs ul.tabs li::before {
			border-color: {$add_to_cart_button_hover_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li::after {
			box-shadow: -2px 2px 0 {$add_to_cart_button_color};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li::before {
			box-shadow: 2px 2px 0 {$add_to_cart_button_color};
		}

		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.wc-block-grid__product-onsale,
		.woocommerce span.onsale {
			background-color: {$add_to_cart_button_color};
		}
		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
			background-color: {$add_to_cart_button_hover_color};
		}
		.off_canvas_filter_btn {
			display:{$enable_off_canvas_filter};
			background-color: {$filter_button_color};
			border: 1px solid {$filter_button_border_color};
    		color: {$filter_text_color};
		}
		.off_canvas_filter_btn:hover {
			background-color: {$filter_button_color_hover};
			border: 1px solid {$filter_button_border_color_hover};
    		color: {$filter_text_color_hover};
		}
		button.responsive-off-canvas-close svg{
			fill: {$close_button_color };
		}
		button.responsive-off-canvas-close:hover svg{
			fill: {$close_button_hover_color };
		}
		";

		// Single Product Styles.
		$single_product_content_width = esc_html( get_theme_mod( 'responsive_single_product_content_width', 100 ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.single-product.woocommerce .content-area,
			.single-product.woocommerce .content-area {
				width:{$single_product_content_width}%;
			}
			.single-product.woocommerce aside.widget-area,
			.single-product.woocommerce aside.widget-area {
				width: calc(100% - {$single_product_content_width}%);
			}
		}";

		// Single product floating bar styles.
		$floatingb_bg_color                  = esc_html( get_theme_mod( 'responsive_floatingb_background_color', 'rgba(51,51,51,0.9)' ) );
		$floatingb_title_color               = esc_html( get_theme_mod( 'responsive_floatingb_title_color', '#ffffff' ) );
		$floatingb_price_color               = esc_html( get_theme_mod( 'responsive_floatingb_price_color', '#ffffff' ) );
		$floatingb_qty_input_bg_color        = esc_html( get_theme_mod( 'responsive_floatingb_qty_input_background_color', '#ffffff' ) );
		$floatingb_qty_input_font_color      = esc_html( get_theme_mod( 'responsive_floatingb_qty_input_font_color', '#000000' ) );
		$floatingb_qty_input_border_color    = esc_html( get_theme_mod( 'responsive_floatingb_qty_input_border_color', '#333333' ) );
		$floatingb_addtocart_bg_color        = esc_html( get_theme_mod( 'responsive_floatingb_addtocart_background_color', '#0066cc' ) );
		$floatingb_addtocart_bghover_color   = esc_html( get_theme_mod( 'responsive_floatingb_addtocart_bghover_color', '#10659c' ) );
		$floatingb_addtocart_font_color      = esc_html( get_theme_mod( 'responsive_floatingb_addtocart_font_color', '#ffffff' ) );
		$floatingb_addtocart_fonthover_color = esc_html( get_theme_mod( 'responsive_floatingb_addtocart_fonthover_color', '#f1f1f1' ) );
		$floatingb_width                     = esc_html( get_theme_mod( 'responsive_width', 'contained' ) );
		$floatingb_container_width           = esc_html( get_theme_mod( 'responsive_container_width', 1140 ) );

		if ( is_admin_bar_showing() ) {
			$woocommerce_custom_css .= "
			@media (min-width: 769px) {
				.responsive-floating-bar {
					top: 32px;
				}
			}
			";
		}

		if ( 'contained' === $floatingb_width && $floatingb_container_width ) {
			$woocommerce_custom_css .= "
				.floatingb-container {
					width: {$floatingb_container_width}px;
					margin-left: auto;
					margin-right: auto;
					padding-right: 15px;
					padding-left: 15px;
				}

				@media (max-width: 768px) {
					.floatingb-container {
						width: 100%;
					}
				}
			";
		} else {
			$woocommerce_custom_css .= '
				.floatingb-container {
					width: 100%;
				}
			';
		}

		if ( $floatingb_bg_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar {
					background-color: {$floatingb_bg_color};
				}
			";
		}

		if ( $floatingb_title_color ) {
			$woocommerce_custom_css .= "
				.floatingb-title {
					color: {$floatingb_title_color};
				}
			";
		}

		if ( $floatingb_price_color ) {
			$woocommerce_custom_css .= "
				.floatingb-price {
					color: {$floatingb_price_color};
				}
			";
		}

		if ( $floatingb_qty_input_bg_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .input-text {
					background-color: {$floatingb_qty_input_bg_color};
				}
			";
		}

		if ( $floatingb_qty_input_font_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .input-text {
					color: {$floatingb_qty_input_font_color};
				}
			";
		}

		if ( $floatingb_qty_input_border_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .input-text {
					border-color: {$floatingb_qty_input_border_color};
				}
			";
		}

		if ( $floatingb_addtocart_bg_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .floating-bar-addbtn {
					background-color: {$floatingb_addtocart_bg_color};
				}
			";
		}

		if ( $floatingb_addtocart_bghover_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .floating-bar-addbtn:hover {
					background-color: {$floatingb_addtocart_bghover_color};
				}
			";
		}

		if ( $floatingb_addtocart_font_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .floating-bar-addbtn {
					color: {$floatingb_addtocart_font_color};
				}
			";
		}

		if ( $floatingb_addtocart_fonthover_color ) {
			$woocommerce_custom_css .= "
				.responsive-floating-bar .floating-bar-addbtn:hover {
					color: {$floatingb_addtocart_fonthover_color};
				}
			";
		}

		// cart Styles.
		$cart_content_width            = esc_html( get_theme_mod( 'responsive_cart_content_width', 70 ) );
		$cart_buttons_color            = esc_html( get_theme_mod( 'responsive_cart_buttons_color', '#10659C' ) );
		$cart_buttons_text_color       = esc_html( get_theme_mod( 'responsive_cart_buttons_text_color', '#ffffff' ) );
		$cart_buttons_hover_color      = esc_html( get_theme_mod( 'responsive_cart_buttons_hover_color', '#0066CC' ) );
		$cart_buttons_hover_text_color = esc_html( get_theme_mod( 'responsive_cart_buttons_hover_text_color', '#ffffff' ) );

		$cart_checkout_button_color            = esc_html( get_theme_mod( 'responsive_cart_checkout_button_color', '#0066CC' ) );
		$cart_checkout_button_text_color       = esc_html( get_theme_mod( 'responsive_cart_checkout_button_text_color', '#ffffff' ) );
		$cart_checkout_button_hover_color      = esc_html( get_theme_mod( 'responsive_cart_checkout_button_hover_color', '#10659C' ) );
		$cart_checkout_button_hover_text_color = esc_html( get_theme_mod( 'responsive_cart_checkout_button_hover_text_color', '#ffffff' ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.page.woocommerce-cart .content-area {
				width:{$cart_content_width}%;
			}
		}
		.page.woocommerce-cart .woocommerce button.button:disabled,
		.page.woocommerce-cart .woocommerce button.button:disabled[disabled],
		.page.woocommerce-cart .woocommerce button.button {
			background-color: {$cart_buttons_color};
			color: {$cart_buttons_text_color};
		}

		.page.woocommerce-cart .woocommerce button.button:disabled:hover,
		.page.woocommerce-cart .woocommerce button.button:disabled[disabled]:hover,
		.page.woocommerce-cart .woocommerce button.button:hover {
			background-color: {$cart_buttons_hover_color};
			color: {$cart_buttons_hover_text_color};
		}
		.page.woocommerce-cart .woocommerce a.button.alt,
		.page.woocommerce-cart .woocommerce a.button {
			background-color: {$cart_checkout_button_color};
			color: {$cart_checkout_button_text_color};
		}
		.page.woocommerce-cart .woocommerce a.button.alt:hover,
		.page.woocommerce-cart .woocommerce a.button:hover {
			background-color: {$cart_checkout_button_hover_color};
			color: {$cart_checkout_button_hover_text_color};
		}
		";

		// checkout Styles.
		$checkout_content_width = esc_html( get_theme_mod( 'responsive_checkout_content_width', 70 ) );

		$woocommerce_custom_css .= "
		@media (min-width:992px) {
			.page.woocommerce-checkout .content-area {
				width:{$checkout_content_width}%;
			}
		}
		.page.woocommerce-checkout .woocommerce button.button.alt,
		.page.woocommerce-checkout .woocommerce button.button {
			background-color: {$cart_checkout_button_color};
			color: {$cart_checkout_button_text_color};
		}
		.page.woocommerce-checkout .woocommerce button.button.alt:hover,
		.page.woocommerce-checkout .woocommerce button.button:hover {
			background-color: {$cart_checkout_button_hover_color};
			color: {$cart_checkout_button_hover_text_color};
		}";

		$woocommerce_custom_css .= '#add_payment_method table.cart td.actions .coupon .input-text,
		.woocommerce-cart table.cart td.actions .coupon .input-text,
		.woocommerce-checkout table.cart td.actions .coupon .input-text,
		.woocommerce form .form-row input.input-text,
		.woocommerce form .form-row textarea {
			color: ' . $inputs_text_color . ';
			background-color: ' . $inputs_background_color . ';
			border: ' . $inputs_border_width . 'px solid ' . $inputs_border_color . ';
			border-radius: ' . $inputs_radius . 'px;
			line-height: 1.75;
			padding: ' . responsive_spacing_css( $inputs_padding_top, $inputs_padding_right, $inputs_padding_bottom, $inputs_padding_left ) . ';
		}

		@media screen and ( max-width: 992px ) {
			#add_payment_method table.cart td.actions .coupon .input-text,
			.woocommerce-cart table.cart td.actions .coupon .input-text,
			.woocommerce-checkout table.cart td.actions .coupon .input-text {
				padding: ' . responsive_spacing_css( $inputs_tablet_padding_top, $inputs_tablet_padding_right, $inputs_tablet_padding_bottom, $inputs_tablet_padding_left ) . ';

			}
		}
		@media screen and ( max-width: 576px ) {
			#add_payment_method table.cart td.actions .coupon .input-text,
			.woocommerce-cart table.cart td.actions .coupon .input-text,
			.woocommerce-checkout table.cart td.actions .coupon .input-text {
				padding: ' . responsive_spacing_css( $inputs_mobile_padding_top, $inputs_mobile_padding_right, $inputs_mobile_padding_bottom, $inputs_mobile_padding_left ) . ';
			}
		}
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button {
			line-height: 1;
			border: ' . $buttons_border_width . 'px solid ' . $cart_buttons_color . ';
			border-radius:' . $buttons_radius . 'px;
			padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
			}
		}';

		for ( $i = 1; $i < 11; $i++ ) {
			$woocommerce_custom_css .= "
			@media screen and ( min-width: 992px ) {
				.woocommerce-page ul.products.columns-$i li.product,
				.woocommerce ul.products.columns-$i li.product {
					width: calc( ( 100% / $i )  - (19px + {$i}px));
				}
			}";
		}
		$sorting_option_text       = esc_html( get_theme_mod( 'responsive_sorting_option_text_color', '#333333' ) );
		$sorting_option_background = esc_html( get_theme_mod( 'responsive_sorting_option_background_color', '#ffffff' ) );
		$woocommerce_custom_css   .= "
		 .woocommerce-ordering .orderby{
			color: {$sorting_option_text};
			background-color: {$sorting_option_background};
		 }
		";
		wp_add_inline_style( 'responsive-woocommerce-style', apply_filters( 'responsive_head_css', responsive_minimize_css( $woocommerce_custom_css ) ) );
	}
}
add_action( 'wp_enqueue_scripts', 'responsive_customizer_styles', 99 );

/**
 * [responsive_minimize_css description].
 *
 * @param  string $css [description].
 * @return string      [description]
 */
function responsive_minimize_css( $css ) {
	$css = preg_replace( '/\/\*((?!\*\/).)*\*\//', '', $css ); // negative look ahead.
	$css = preg_replace( '/\s{2,}/', ' ', $css );
	$css = preg_replace( '/\s*([:;{}])\s*/', '$1', $css );
	$css = preg_replace( '/;}/', '}', $css );
	return $css;
}
