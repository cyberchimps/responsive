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
	$body_typography        = get_theme_mod( 'body_typography' );
	$headings_typography    = get_theme_mod( 'headings_typography' );
	$heading_text_color     = get_theme_mod( 'heading-text-color', '' );
	$link_color             = get_theme_mod( 'link-color', '#078ce1' );
	$link_hover_color       = get_theme_mod( 'link-hover-color', '#10659c' );
	$button_color           = get_theme_mod( 'button-color', '#1874cd' );
	$button_hover_color     = get_theme_mod( 'button-hover-color', '#7db7f0' );
	$button_text_color      = get_theme_mod( 'button-text-color', '#ffffff' );
	$label_color            = get_theme_mod( 'label-color', '#10659c' );
	$input_background_color = get_theme_mod( 'input-background-color', '#ffffff' );
	$container_width        = get_theme_mod( 'responsive_main_container_width', '960' );
	$layout_style           = get_theme_mod( 'responsive_layout_styles', '' );
	$input_border_color_fs  = get_theme_mod( 'input-border-color-focus', '#eaeaea' );
	$input_border_color     = get_theme_mod( 'input-border-color', '#eaeaea' );
	$input_text_color       = get_theme_mod( 'input-text-color', '#333333' );
	$header_text_color      = get_theme_mod( 'responsive_fullwidth_header_color', '' );
	$button_radius          = get_theme_mod( 'responsive_button_border_radius', '2' );

	$button_hover_text_color = get_theme_mod( 'button-hover-text-color', '#ffffff' );

	$background_color = get_theme_mod( 'background_color' );

	// Single Product colors.
	$product_rating_color     = get_theme_mod( 'responsive_product_rating_color', '#585858' );
	$product_title_color      = get_theme_mod( 'responsive_product_title_color', '#585858' );
	$product_price_color      = get_theme_mod( 'responsive_product_price_color', '#585858' );
	$product_content_color    = get_theme_mod( 'responsive_product_content_color', '#585858' );
	$product_breadcrumb_color = get_theme_mod( 'responsive_product_breadcrumb_color', '#585858' );

	// Shop product colors.
	$shop_product_title_color   = get_theme_mod( 'responsive_shop_product_title_color', '#585858' );
	$shop_product_price_color   = get_theme_mod( 'responsive_shop_product_price_color', '#585858' );
	$shop_product_content_color = get_theme_mod( 'responsive_shop_product_content_color', '#585858' );

	// Menu colors.
	$menu_gradients_checkbox = get_theme_mod( 'responsive_menu_gradients_checkbox' );
	$menu_background_color   = get_theme_mod( 'responsive_menu_background_colorpicker' );
	$menu_background_color_2 = get_theme_mod( 'responsive_menu_background_colorpicker_2' );
	$menu_background_color_2 = ( $menu_gradients_checkbox == 1 & $menu_background_color_2 != '' ? $menu_background_color_2 : $menu_background_color ); //phpcs:ignore
	$menu_text_color         = get_theme_mod( 'responsive_menu_text_colorpicker' );
	$menu_text_hover_color   = get_theme_mod( 'responsive_menu_text_hover_colorpicker' );
	$menu_active_color       = get_theme_mod( 'responsive_menu_active_colorpicker' );
	$menu_hover_color        = get_theme_mod( 'responsive_menu_item_hover_colorpicker' );
	$menu_active_text_color  = get_theme_mod( 'responsive_menu_active_text_colorpicker' );
	$menu_border_color       = get_theme_mod( 'responsive_menu_border_color' );

	// Sidebar colors.
	$sidebar_background_color = get_theme_mod( 'responsive_sidebar_background_color' );

	$sidebar_padding_right  = get_theme_mod( 'responsive_sidebar_right_padding' );
	$sidebar_padding_left   = get_theme_mod( 'responsive_sidebar_left_padding' );
	$sidebar_padding_top    = get_theme_mod( 'responsive_sidebar_top_padding' );
	$sidebar_padding_bottom = get_theme_mod( 'responsive_sidebar_bottom_padding' );

	$sidebar_tablet_padding_right  = get_theme_mod( 'responsive_sidebar_tablet_right_padding' );
	$sidebar_tablet_padding_left   = get_theme_mod( 'responsive_sidebar_tablet_left_padding' );
	$sidebar_tablet_padding_top    = get_theme_mod( 'responsive_sidebar_tablet_top_padding' );
	$sidebar_tablet_padding_bottom = get_theme_mod( 'responsive_sidebar_tablet_bottom_padding' );

	$sidebar_mobile_padding_right  = get_theme_mod( 'responsive_sidebar_mobile_right_padding' );
	$sidebar_mobile_padding_left   = get_theme_mod( 'responsive_sidebar_mobile_left_padding' );
	$sidebar_mobile_padding_top    = get_theme_mod( 'responsive_sidebar_mobile_top_padding' );
	$sidebar_mobile_padding_bottom = get_theme_mod( 'responsive_sidebar_mobile_bottom_padding' );

	$sidebar_radius        = get_theme_mod( 'responsive_sidebar_radius' );
	$sidebar_heading_color = get_theme_mod( 'responsive_sidebar_heading_color' );
	$sidebar_text_color    = get_theme_mod( 'responsive_sidebar_text_color' );

	$fullwidth_title_color  = get_theme_mod( 'responsive_fullwidth_sitetitle_color' );
	$site_description_color = get_theme_mod( 'responsive_site_description_color' );
	$blog_background_color  = get_theme_mod( 'responsive_container_background_color' );

	// Container Padding.
	$container_padding_right  = get_theme_mod( 'responsive_container_right_padding' );
	$container_padding_left   = get_theme_mod( 'responsive_container_left_padding' );
	$container_padding_top    = get_theme_mod( 'responsive_container_top_padding' );
	$container_padding_bottom = get_theme_mod( 'responsive_container_bottom_padding' );

	$container_tablet_padding_right  = get_theme_mod( 'responsive_container_tablet_right_padding' );
	$container_tablet_padding_left   = get_theme_mod( 'responsive_container_tablet_left_padding' );
	$container_tablet_padding_top    = get_theme_mod( 'responsive_container_tablet_top_padding' );
	$container_tablet_padding_bottom = get_theme_mod( 'responsive_container_tablet_bottom_padding' );

	$container_mobile_padding_right  = get_theme_mod( 'responsive_container_mobile_right_padding' );
	$container_mobile_padding_left   = get_theme_mod( 'responsive_container_mobile_left_padding' );
	$container_mobile_padding_top    = get_theme_mod( 'responsive_container_mobile_top_padding' );
	$container_mobile_padding_bottom = get_theme_mod( 'responsive_container_mobile_bottom_padding' );
	$container_background_color      = get_theme_mod( 'responsive_main_container_background_color' );

	// Footer colors.
	$footer_background_color = get_theme_mod( 'responsive_footer_background_color' );
	$footer_text_color       = get_theme_mod( 'responsive_footer_text_color' );

	// Footer Padding.
	$footer_padding_right  = get_theme_mod( 'responsive_footer_right_padding' );
	$footer_padding_left   = get_theme_mod( 'responsive_footer_left_padding' );
	$footer_padding_top    = get_theme_mod( 'responsive_footer_top_padding' );
	$footer_padding_bottom = get_theme_mod( 'responsive_footer_bottom_padding' );

	$footer_tablet_padding_right  = get_theme_mod( 'responsive_footer_tablet_right_padding' );
	$footer_tablet_padding_left   = get_theme_mod( 'responsive_footer_tablet_left_padding' );
	$footer_tablet_padding_top    = get_theme_mod( 'responsive_footer_tablet_top_padding' );
	$footer_tablet_padding_bottom = get_theme_mod( 'responsive_footer_tablet_bottom_padding' );

	$footer_mobile_padding_right  = get_theme_mod( 'responsive_footer_mobile_right_padding' );
	$footer_mobile_padding_left   = get_theme_mod( 'responsive_footer_mobile_left_padding' );
	$footer_mobile_padding_top    = get_theme_mod( 'responsive_footer_mobile_top_padding' );
	$footer_mobile_padding_bottom = get_theme_mod( 'responsive_footer_mobile_bottom_padding' );

	// Scroll to top settings.
	$stt_devices                     = get_theme_mod( 'responsive_scroll_to_top_on_devices' );
	$stt_position                    = get_theme_mod( 'responsive_scroll_to_top_icon_position' );
	$stt_icon_size                   = get_theme_mod( 'responsive_scroll_to_top_icon_size' );
	$stt_icon_radius                 = get_theme_mod( 'responsive_scroll_to_top_icon_radius' );
	$stt_icon_color                  = get_theme_mod( 'responsive_scroll_to_top_icon_color' );
	$stt_icon_hover_color            = get_theme_mod( 'responsive_scroll_to_top_icon_hover_color' );
	$stt_icon_background_color       = get_theme_mod( 'responsive_scroll_to_top_icon_background_color' );
	$stt_icon_background_hover_color = get_theme_mod( 'responsive_scroll_to_top_icon_background_hover_color' );

	$header_border_color = get_theme_mod( 'responsive_header_border_color' );

	// Mobile Menu Breakpoint.
	$mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_header_breakpoint', 768 );

	// Mobile Menu Style.
	$mobile_menu_style = get_theme_mod( 'mobile_menu_style', 'dropdown' );

	// Submenu styles.
	$responsive_submenu_top_border    = get_theme_mod( 'responsive_submenu_top_border' );
	$responsive_submenu_right_border  = get_theme_mod( 'responsive_submenu_right_border' );
	$responsive_submenu_bottom_border = get_theme_mod( 'responsive_submenu_bottom_border' );
	$responsive_submenu_left_border   = get_theme_mod( 'responsive_submenu_left_border' );
	$responsive_submenu_border_color  = get_theme_mod( 'responsive_submenu_border_color', '#e5e5e5' );
	$responsive_submenu_divider_color = get_theme_mod( 'responsive_submenu_divider_color', '#e5e5e5' );
	$responsive_submenu_divider       = get_theme_mod( 'responsive_submenu_divider', '1' );
	$responsive_submenu_color         = get_theme_mod( 'responsive_submenu_color' );

	if ( isset( $body_typography['color'] ) ) {
		$body_color = $body_typography['color'];
	} else {
		$body_color = '#929292';
	}

	if ( isset( $headings_typography['color'] ) ) {
		$heading_color = $headings_typography['color'];
	} else {
		$heading_color = '#333333';
	}

	if ( isset( $body_typography['text-transform'] ) ) {
		$text_transform = $body_typography['text-transform'];
	} else {
		$text_transform = 'inherit';
	}

	if ( isset( $headings_typography['text-transform'] ) ) {
		$headingtext_transform = $headings_typography['text-transform'];
	} else {
		$headingtext_transform = 'inherit';
	}

	if ( isset( $body_typography['letter-spacing'] ) ) {
		$letter_spacing = $body_typography['letter-spacing'];
	} else {
		$letter_spacing = '0';
	}

	if ( isset( $headings_typography['letter-spacing'] ) ) {
		$headingsletter_spacing = $headings_typography['letter-spacing'];
	} else {
		$headingsletter_spacing = '0';
	}

	if ( isset( $body_typography['font-weight'] ) ) {
		$font_weight = $body_typography['font-weight'];
	} else {
		$font_weight = '400';
	}

	if ( isset( $headings_typography['font-weight'] ) ) {
		$headingsfont_weight = $headings_typography['font-weight'];
	} else {
		$headingsfont_weight = '700';
	}

	if ( isset( $body_typography['line-height'] ) ) {
		$line_height = $body_typography['line-height'];
	} else {
		$line_height = '1.8';
	}

	if ( isset( $headings_typography['line-height'] ) ) {
		$headingsline_height = $headings_typography['line-height'];
	} else {
		$headingsline_height = '1.4';
	}

	if ( isset( $body_typography['font-style'] ) ) {
		$font_style = $body_typography['font-style'];
	} else {
		$font_style = 'normal';
	}

	if ( isset( $headings_typography['font-style'] ) ) {
		$headingsfont_style = $headings_typography['font-style'];
	} else {
		$headingsfont_style = 'normal';
	}
	if ( isset( $body_typography['font-family'] ) ) {
		$font_family = $body_typography['font-family'];
	} else {
		$font_family = 'Arial, Helvetica, sans-serif';
	}
	if ( isset( $headings_typography['font-family'] ) ) {
		$headings_font_family = $headings_typography['font-family'];
	} else {
		$headings_font_family = 'Arial, Helvetica, sans-serif';
	}
	if ( isset( $body_typography['font-size'] ) ) {
		$body_font_size = $body_typography['font-size'];
	} else {
		$body_font_size = '14px';
	}
	$custom_css = "
		body {
			font-family: {$font_family};
			text-transform: {$text_transform};
			letter-spacing: {$letter_spacing}px;
			color: {$body_color};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			box-sizing: border-box;
			font-size: {$body_font_size};
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
			font-family: {$headings_font_family};
			text-transform: {$headingtext_transform};
			letter-spacing: {$headingsletter_spacing}px;
			color: {$heading_color};
			font-weight: {$headingsfont_weight};
			line-height: {$headingsline_height};
			font-style: {$headingsfont_style};
		}
		a {
			color: {$link_color};
		}
		a:hover {
			color: {$link_hover_color};
		}
		input, .widget-wrapper input[type=email], .widget-wrapper input[type=password], .widget-wrapper input[type=text], .widget-wrapper select {
			color: {$input_text_color};
			background-color: {$input_background_color};
			border-color: {$input_border_color};
			font-family: {$font_family};
			font-size: {$body_font_size};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			letter-spacing: {$letter_spacing}px;
		}
		input:focus, input[type=text]:focus {
			background-color: {$input_background_color};
			border-color: {$input_border_color_fs};
		}
		div.wpforms-container-full .wpforms-form .wpforms-field-label{
			font-family: {$font_family};
			text-transform: {$text_transform};
			letter-spacing: {$letter_spacing}px;
			color: {$label_color};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			box-sizing: border-box;
			font-size: {$body_font_size};
		}
		div.wpforms-container-full .wpforms-form input[type=email], div.wpforms-container-full .wpforms-form input[type=number], div.wpforms-container-full .wpforms-form input[type=password], div.wpforms-container-full .wpforms-form input[type=search], div.wpforms-container-full .wpforms-form input[type=tel], div.wpforms-container-full .wpforms-form input[type=text], div.wpforms-container-full .wpforms-form select, div.wpforms-container-full .wpforms-form textarea{
			color: {$input_text_color};
			background-color: {$input_background_color};
			border-color: {$input_border_color};
			font-family: {$font_family};
			font-size: {$body_font_size};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			letter-spacing: {$letter_spacing}px;
		}
		div.wpforms-container-full .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button{
			color: {$button_text_color};
			background-color: {$button_color};
			border-radius: {$button_radius}px;
			font-family: {$font_family};
			font-size: {$body_font_size};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			letter-spacing: {$letter_spacing}px;
		}
		div.wpforms-container-full .wpforms-form input[type=submit]:hover, div.wpforms-container-full .wpforms-form input[type=submit]:active, div.wpforms-container-full .wpforms-form button[type=submit]:hover, div.wpforms-container-full .wpforms-form button[type=submit]:focus, div.wpforms-container-full .wpforms-form button[type=submit]:active, div.wpforms-container-full .wpforms-form .wpforms-page-button:hover, div.wpforms-container-full .wpforms-form .wpforms-page-button:active, div.wpforms-container-full .wpforms-form .wpforms-page-button:focus{
			background-color: {$button_hover_color};
			color: {$button_hover_text_color};
		}

		#content-woocommerce .product .single_add_to_cart_button, .added_to_cart.wc-forward, .woocommerce ul.products li.product .button,
		input[type='submit'], input[type=button], a.button, .button, .call-to-action a.button, button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
		.woocommerce #respond input#submit, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #searchsubmit, #footer_widget #searchsubmit {
			color: {$button_text_color};
			background-color: {$button_color};
			border-radius: {$button_radius}px;
			font-family: {$font_family};
			font-size: {$body_font_size};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			letter-spacing: {$letter_spacing}px;
		}
		input#searchsubmit{
			background-image: none;
		}
		button:hover, input[type='submit']:hover, input[type=button]:hover, a.button:hover, .button:hover, .woocommerce a.button:hover, .woocommerce input.button:hover , .call-to-action a.button:hover,
		#content-woocommerce .product .single_add_to_cart_button:hover, #content-woocommerce .product .single_add_to_cart_button:focus, .added_to_cart.wc-forward:hover, .added_to_cart.wc-forward:focus, .woocommerce ul.products li.product .button:hover, .woocommerce ul.products li.product .button:focus,
		.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, #searchsubmit:hover, #footer_widget #searchsubmit:hover {
				background-color: {$button_hover_color};
				color: {$button_hover_text_color};
		}

		.woocommerce a.button:disabled, .woocommerce a.button.disabled, .woocommerce a.button:disabled[disabled],
		.woocommerce button.button:disabled,
		.woocommerce button.button.disabled,
		.woocommerce button.button:disabled[disabled],
		.woocommerce input.button:disabled,
		.woocommerce input.button.disabled,
		.woocommerce input.button:disabled[disabled],
		.woocommerce #respond input#submit:disabled,
		.woocommerce #respond input#submit.disabled,
		.woocommerce #respond input#submit:disabled[disabled] {
			color: {$button_text_color};
			background-color: {$button_color};
		}

		.woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled]:hover,
		.woocommerce button.button.alt.disabled,
		.woocommerce button.button.alt:disabled,
		.woocommerce button.button.alt:disabled[disabled],
		.woocommerce button.button.alt.disabled:hover,
		.woocommerce button.button.alt:disabled:hover,
		.woocommerce button.button.alt:disabled[disabled]:hover,
		.woocommerce input.button.alt.disabled,
		.woocommerce input.button.alt:disabled,
		.woocommerce input.button.alt:disabled[disabled],
		.woocommerce input.button.alt.disabled:hover,
		.woocommerce input.button.alt:disabled:hover,
		.woocommerce input.button.alt:disabled[disabled]:hover,
		.woocommerce #respond input#submit.alt.disabled,
		.woocommerce #respond input#submit.alt:disabled,
		.woocommerce #respond input#submit.alt:disabled[disabled],
		.woocommerce #respond input#submit.alt.disabled:hover,
		.woocommerce #respond input#submit.alt:disabled:hover,
		.woocommerce #respond input#submit.alt:disabled[disabled]:hover{
		background-color: {$button_hover_color};
		color: {$button_hover_text_color};
		}
		label {
			color: {$label_color};
		}
		.fullwidth-layout
		.container, div#container {
			width: {$container_width}px;
			max-width: 100%;
		}

		.boxed-layout
		.content-area, body.default-layout #content-outer, body.full-width-layout #content-outer, body.full-width-no-box #content-outer, .menu, #footer {
			max-width: {$container_width}px;
		}
		.woocommerce ul.products li.product .onsale.circle-outline, .woocommerce ul.products li.product .onsale.square-outline, .woocommerce div.product .onsale.circle-outline, .woocommerce div.product .onsale.square-outline {
			background: #ffffff;
			border: 2px solid {$link_color};
			color: {$link_color};
		}
		.woocommerce ul.products li.product .onsale, .woocommerce span.onsale {
			background-color: {$link_color};
			color: #ffffff;
		}
		";
	if ( ! empty( $product_title_color ) ) {
		$custom_css .= ".single-product div.product .entry-title {
			color: {$product_title_color};
		}";
	}
	if ( ! empty( $product_content_color ) ) {
		$custom_css .= ".single-product div.product .woocommerce-product-details__short-description, .single-product div.product .product_meta, .single-product div.product .entry-content {
			color: {$product_content_color};
		}";
	}
	if ( ! empty( $product_price_color ) ) {
		$custom_css .= ".single-product div.product p.price, .single-product div.product span.price {
			color: {$product_price_color};
		}";
	}
	if ( ! empty( $shop_product_title_color ) ) {
		$custom_css .= ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title {
			color: {$shop_product_title_color};
		}";
	}
	if ( ! empty( $shop_product_price_color ) ) {
		$custom_css .= ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price {
			color: {$shop_product_price_color};
		}";
	}
	if ( ! empty( $product_rating_color ) ) {
		$custom_css .= ".woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before {
			color: {$product_rating_color};
		}";
	}
	if ( ! empty( $product_breadcrumb_color ) ) {
		$custom_css .= ".single-product .woocommerce-breadcrumb, .single-product .woocommerce-breadcrumb a {
			color: {$product_breadcrumb_color};
		}";
	}
	if ( ! empty( $shop_product_content_color ) ) {
		$custom_css .= ".woocommerce ul.products li.product .responsive-woo-product-category, .woocommerce-page ul.products li.product .responsive-woo-product-category, .woocommerce ul.products li.product .responsive-woo-shop-product-description, .woocommerce-page ul.products li.product .responsive-woo-shop-product-description {
			color: {$shop_product_content_color};
		}";
	}

	if ( ! empty( $menu_text_color ) ) {
		$custom_css .= ".menu a, .full-width-no-box .menu a {
			color: {$menu_text_color};
		}
		@media (min-width: 768px){
			.menu li li a {
				color: {$menu_text_color};
			}
		}";
	}
	if ( ! empty( $menu_text_hover_color ) ) {
		$custom_css .= ".menu a:hover, .full-width-no-box .menu a:hover{
			color: {$menu_text_hover_color};
		}
		@media (min-width: 768px){
			.menu li li:hover {
				color: {$menu_text_hover_color};
			}
		}";
	}
	if ( ! empty( $menu_active_color ) ) {
		$custom_css .= "
		.full-width-no-box .menu .current-menu-item a, .full-width-no-box .menu .current_page_item a,
		.menu .current-menu-item a, .menu .current_page_item a  {
			background-color: {$menu_active_color};
		}";
	}
	if ( ! empty( $menu_active_text_color ) ) {
		$custom_css .= "
		.full-width-no-box .menu .current-menu-item a, .full-width-no-box .menu .current_page_item a,
		.menu .current-menu-item a, .menu .current_page_item a  {
			color: {$menu_active_text_color};
		}";
	}
	if ( ! empty( $menu_hover_color ) ) {
		$custom_css .= ".menu a:hover, .full-width-no-box .menu a:hover {
			background-color: {$menu_hover_color};
			background-image: unset;
		}
		@media (min-width: 768px){
			.menu li li a:hover {
				background-color: {$menu_hover_color};
				background-image: unset;
			}
		}
		";
	}
	if ( ! empty( $menu_item_hover_color ) ) {
		$custom_css .= ".menu:hover a,
		ul.menu:hover > li,
		.menu:hover .current_page_item a,
		.menu:hover .current-menu-item a,
		.front-page .menu:hover .current_page_item a,
		.full-width-no-box .menu:hover .current_page_item a,
		.full-width-no-box .menu:hover .current-menu-item a,
		.full-width-no-box .menu:hover a {
			background: {$menu_item_hover_color};
			background-image: none;
			filter: none;
		}
		@media (min-width: 768px){
			.menu li li:hover a {
				background: {$menu_item_hover_color};
				background-image: none;
				filter: none;
			}
		}";
	}
	if ( ! empty( $menu_background_color ) ) {
		$custom_css .= ".menu li:hover>ul, .main-nav, .full-width-no-box .main-nav, .full-width-no-box .menu, .menu {
			background-color:{$menu_background_color};
			background-image: -webkit-gradient(linear, left top, left bottom, from({$menu_background_color}), to({$menu_background_color_2}));
			background-image: -webkit-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: -moz-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: -ms-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: -o-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr={$menu_background_color}, endColorstr={$menu_background_color_2});
		}
		@media (min-width: 768px){
			.menu li li {
				background-color:{$menu_background_color};
				background-image: -webkit-gradient(linear, left top, left bottom, from({$menu_background_color}), to({$menu_background_color_2}));
				background-image: -webkit-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -moz-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -ms-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -o-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr={$menu_background_color}, endColorstr={$menu_background_color_2});
			}
		}
		@media screen and (max-width: {$mobile_menu_breakpoint}px) {
			.js #header .main-nav {
				background-color:{$menu_background_color};
				background-image: -webkit-gradient(linear, left top, left bottom, from({$menu_background_color}), to({$menu_background_color_2}));
				background-image: -webkit-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -moz-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -ms-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -o-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr={$menu_background_color}, endColorstr={$menu_background_color_2});
			}
		}";
	}
	if ( ! empty( $sidebar_background_color ) ) {
		$custom_css .= "#widgets .widget-wrapper {
			background-color: {$sidebar_background_color};
		}";
	}
	if ( ! empty( $sidebar_padding_right ) ) {
		$custom_css .= "#widgets .widget-wrapper {
			padding-right: {$sidebar_padding_right}px;
		}";
	}
	if ( ! empty( $sidebar_padding_left ) ) {
		$custom_css .= "#widgets .widget-wrapper {
			padding-left: {$sidebar_padding_left}px;
		}";
	}
	if ( ! empty( $sidebar_padding_top ) ) {
		$custom_css .= "#widgets .widget-wrapper {
			padding-top: {$sidebar_padding_top}px;
		}";
	}
	if ( ! empty( $sidebar_padding_bottom ) ) {
		$custom_css .= "#widgets .widget-wrapper {
			padding-bottom: {$sidebar_padding_bottom}px;
		}";
	}
	// Tablet container padding.
	if ( isset( $sidebar_tablet_padding_top )
		|| isset( $sidebar_tablet_padding_right )
		|| isset( $sidebar_tablet_padding_bottom )
		|| isset( $sidebar_tablet_padding_left ) ) {
		$custom_css .= '@media (max-width: 768px){
			#widgets .widget-wrapper {
				padding:' . responsive_spacing_css( $sidebar_tablet_padding_top, $sidebar_tablet_padding_right, $sidebar_tablet_padding_bottom, $sidebar_tablet_padding_left ) . '
			}
		}';
	}

	// Mobile container padding.
	if ( isset( $sidebar_mobile_padding_top )
		|| isset( $sidebar_mobile_padding_right )
		|| isset( $sidebar_mobile_padding_bottom )
		|| isset( $sidebar_mobile_padding_left ) ) {
		$custom_css .= '@media (max-width: 480px){
			#widgets .widget-wrapper {
				padding:' . responsive_spacing_css( $sidebar_mobile_padding_top, $sidebar_mobile_padding_right, $sidebar_mobile_padding_bottom, $sidebar_mobile_padding_left ) . '
			}
		}';
	}
	if ( isset( $sidebar_radius ) ) {
		$custom_css .= "#widgets .widget-wrapper {
			border-radius: {$sidebar_radius}px;
		}";
	}
	if ( ! empty( $fullwidth_title_color ) ) {
		$custom_css .= ".full-width-no-box .site-name a, .site-name a{
			color: {$fullwidth_title_color};
		}";
	}
	if ( ! empty( $sidebar_heading_color ) ) {
		$custom_css .= "#widgets .widget-wrapper .widget-title h3 {
			color: {$sidebar_heading_color};
		}";
	}
	if ( ! empty( $sidebar_text_color ) ) {
		$custom_css .= "#widgets .widget-wrapper * {
			color: {$sidebar_text_color};
		}";
	}
	if ( ! empty( $blog_background_color ) ) {
		$custom_css .= ".section-blog-2-col, .section-blog-3-col, .section-blog-4-col {
			background-color: {$blog_background_color};
		}
		.page div#content, .post-entry {
			background-color: {$blog_background_color};
    		padding: 10px;
		}
		";
	}
	if ( ! empty( $container_padding_right ) ) {
		$custom_css .= "#content-outer {
			padding-right: {$container_padding_right}px;
		}.menu {
		    padding-right: {$container_padding_right}px;
		} @media screen and (max-width: {$mobile_menu_breakpoint}px){
		    .menu {
		        padding-right: 0px;
		    }
		}";
	}
	if ( ! empty( $container_padding_left ) ) {
		$custom_css .= "#content-outer {
			padding-left: {$container_padding_left}px;
		}
		.menu {
		    padding-left: {$container_padding_left}px;
		} @media screen and (max-width: {$mobile_menu_breakpoint}px){
		    .menu {
		        padding-left: 0px;
		    }
		}";
	}
	if ( ! empty( $container_padding_top ) ) {
		$custom_css .= "#content-outer {
			padding-top: {$container_padding_top}px;
		}";
	}
	if ( ! empty( $container_padding_bottom ) ) {
		$custom_css .= "#content-outer {
			padding-bottom: {$container_padding_bottom}px;
		}";
	}
	// Tablet container padding.
	if ( isset( $container_tablet_padding_top )
		|| isset( $container_tablet_padding_right )
		|| isset( $container_tablet_padding_bottom )
		|| isset( $container_tablet_padding_left ) ) {
		$custom_css .= '@media (max-width: 768px){
			#content-outer{
				padding:' . responsive_spacing_css( $container_tablet_padding_top, $container_tablet_padding_right, $container_tablet_padding_bottom, $container_tablet_padding_left ) . '
			}
		}';
	}

	// Mobile container padding.
	if ( isset( $container_mobile_padding_top )
		|| isset( $container_mobile_padding_right )
		|| isset( $container_mobile_padding_bottom )
		|| isset( $container_mobile_padding_left ) ) {
		$custom_css .= '@media (max-width: 480px){
			#content-outer{
				padding:' . responsive_spacing_css( $container_mobile_padding_top, $container_mobile_padding_right, $container_mobile_padding_bottom, $container_mobile_padding_left ) . '
			}
		}';
	}
	if ( ! empty( $menu_border_color ) ) {
		$custom_css .= ".menu a {
			border-color: {$menu_border_color};
		}";
	}
	if ( ! empty( $button_color ) ) {
		$custom_css .= ".woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
			background-color: {$button_color};
		}";
	}
	if ( ! empty( $button_hover_color ) ) {
		$custom_css .= ".price_slider.ui-slider.ui-slider-horizontal.ui-widget.ui-widget-content.ui-corner-all {
			background-color: {$button_hover_color};
		}";
	}
	if ( ! empty( $background_color ) ) {
		$custom_css .= "body.home #wrapper, #wrapper{
			background-color: #{$background_color};
		}";
	}

	if ( ! empty( $footer_background_color ) ) {
		$custom_css .= "#footer, .full-width-no-box #footer-wrapper .footer_div{
			background-color: {$footer_background_color};
		}";
	}
	if ( ! empty( $footer_text_color ) ) {
		$custom_css .= "#footer *, .full-width-no-box #footer-wrapper .footer_div *{
			color: {$footer_text_color};
		}";
	}
	if ( ! empty( $footer_padding_right ) ) {
		$custom_css .= "#footer, body.full-width-no-box div#footer {
			padding-right: {$footer_padding_right}px;
		}";
	}
	if ( ! empty( $footer_padding_left ) ) {
		$custom_css .= "#footer, body.full-width-no-box div#footer {
			padding-left: {$footer_padding_left}px;
		}";
	}
	if ( ! empty( $footer_padding_top ) ) {
		$custom_css .= "#footer, body.full-width-no-box div#footer {
			padding-top: {$footer_padding_top}px;
		}";
	}
	if ( ! empty( $footer_padding_bottom ) ) {
		$custom_css .= "#footer, body.full-width-no-box div#footer {
			padding-bottom: {$footer_padding_bottom}px;
		}";
	}
	// Tablet container padding.
	if ( isset( $footer_tablet_padding_top )
		|| isset( $footer_tablet_padding_right )
		|| isset( $footer_tablet_padding_bottom )
		|| isset( $footer_tablet_padding_left ) ) {
		$custom_css .= '@media (max-width: 768px){
			#footer, body.full-width-no-box div#footer {
				padding:' . responsive_spacing_css( $footer_tablet_padding_top, $footer_tablet_padding_right, $footer_tablet_padding_bottom, $footer_tablet_padding_left ) . '
			}
		}';
	}

	// Mobile container padding.
	if ( isset( $footer_mobile_padding_top )
		|| isset( $footer_mobile_padding_right )
		|| isset( $footer_mobile_padding_bottom )
		|| isset( $footer_mobile_padding_left ) ) {
		$custom_css .= '@media (max-width: 480px){
			#footer, body.full-width-no-box div#footer{
				padding:' . responsive_spacing_css( $footer_mobile_padding_top, $footer_mobile_padding_right, $footer_mobile_padding_bottom, $footer_mobile_padding_left ) . '
			}
		}';
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
	if ( ! empty( $responsive_transparent_container ) ) {
		$custom_css .= "#wrapper {
			opacity : {$responsive_transparent_container};
		}";
	}
	if ( ! empty( $header_border_color ) ) {
		$custom_css .= "#header {
			border-bottom: 1px solid {$header_border_color};
		}";
	}
	if ( ! empty( $container_background_color ) ) {
		$custom_css .= "div#wrapper {
			background-color: {$container_background_color};
		}";
	}
	if ( ! empty( $header_text_color ) ) {
		$custom_css .= "#header, .full-width-no-box #header {
			background-color: {$header_text_color};
		}";
	}
	if ( ! empty( $site_description_color ) ) {
		$custom_css .= ".site-description {
			color: {$site_description_color};
		}";
	}

	// Mobile Menu breakpoint.
	$custom_css .= "@media screen and (max-width: {$mobile_menu_breakpoint}px){
		.js .main-nav {
            position: relative;
            background-color: #585858;
            background-image: -webkit-gradient(linear,left top,left bottom,from(#585858),to(#3d3d3d));
            background-image: -webkit-linear-gradient(top,#585858,#3d3d3d);
            background-image: -moz-linear-gradient(top,#585858,#3d3d3d);
            background-image: -ms-linear-gradient(top,#585858,#3d3d3d);
            background-image: -o-linear-gradient(top,#585858,#3d3d3d);
            background-image: linear-gradient(to top,#585858,#3d3d3d);
            clear: both;
            margin: 0 auto
        }
        .js .main-nav .menu {
            display: none;
            position: absolute;
            width: 100%;
            top: 30px;
            z-index: 1000
        }
        .js .main-nav #responsive_current_menu_item {
            display: block;
            padding: 5px 40px 5px 10px;
            color: #fff;
            font-weight: 700;
            cursor: pointer
        }
        .js .main-nav a#responsive_menu_button {
            position: absolute;
            display: block;
            top: 0;
            left: 100%;
            height: 30px;
            width: 23px;
            margin-left: -30px;
            cursor: pointer
        }
        .js .main-nav, #header #content-outer.responsive-header #logo {
		    width: 100%
	    }
	    #header .responsive-header {
		    display: inline-block;
	    }
	    .header-logo-left .main-nav ul li {
		    display: block;
	    }
	    body header #content-outer {
	        width: 100%;
	    }
	}";

	if ( 'dropdown' === $mobile_menu_style ) {
		$custom_css .= "@media screen and (max-width: {$mobile_menu_breakpoint}px){
            .js .responsive-mobile-dropdown .main-nav .menu ul {
                margin-top: 1px
            }
            .js .responsive-mobile-dropdown .main-nav .menu li {
                float: none;
                background-color: #fff;
                border: none
            }
            .js .responsive-mobile-dropdown .main-nav .menu li a {
                color: #444;
                font-size: 13px;
                font-weight: 400;
                height: 45px;
                line-height: 45px;
                padding: 0 15px;
                border: none;
                border-bottom: 1px solid #f5f5f5;
                text-shadow: none;
                text-align: left;
                cursor: pointer
            }
            .js .responsive-mobile-dropdown .main-nav .menu li.current_page_item,.js .menu .current-menu-item a,.js .menu .current_page_item a {
                background-color: #f5f5f5
            }
            .js .responsive-mobile-dropdown .main-nav .menu li li:hover {
                background: 0 0!important
            }
            .js .responsive-mobile-dropdown .main-nav .menu li li a {
                position: relative;
                padding: 0 10px 0 30px
            }
            .js .responsive-mobile-dropdown .main-nav .menu li li li a {
                position: relative;
                padding: 0 10px 0 40px
            }
            .js .responsive-mobile-dropdown .main-nav .menu li a:hover,.js .main-nav .menu li li a:hover {
                background-image: none;
                filter: none;
                background-color: #f5f5f5!important
            }
            .js .responsive-mobile-dropdown .main-nav .menu li li a::before {
                position: absolute;
                top: 0;
                left: 20px
            }
            .js .responsive-mobile-dropdown .main-nav .menu li li li a::before {
                position: absolute;
                top: 0;
                left: 20px
            }
            .js .responsive-mobile-dropdown .main-nav .menu li li li a::after {
                position: absolute;
                top: 0;
                left: 30px
            }
			.js .responsive-mobile-dropdown .main-nav .menu li li a::before {
				content: '-';
			}
			.js .responsive-mobile-dropdown .main-nav .menu li li li a::before {
				content: '-';
			}
			.js .responsive-mobile-dropdown .main-nav .menu li li li a::after {
				content: '-';
			}
            .js .responsive-mobile-dropdown .main-nav .menu li ul {
                position: static;
                visibility: visible;
                background-color: #fff
            }
            .js .responsive-mobile-dropdown .main-nav .menu ul {
                min-width: 0;
            }
	    }";
	}

	if ( 'fullscreen' === $mobile_menu_style ) {
		$custom_css .= "@media screen and (max-width: {$mobile_menu_breakpoint}px){
            .js .responsive-mobile-fullscreen #mobile-fullscreen .main-nav .menu {
                display: block;
                position: relative;
            }
            .js .responsive-mobile-fullscreen #mobile-fullscreen .main-nav {
                background-image: none;
                background-color: #ffffff;
            }
            .js .responsive-mobile-fullscreen #mobile-fullscreen .main-nav .current_page_item a {
                background-color: #D3D3D3;
            }
	    }";
	}
	if ( 'sidebar' === $mobile_menu_style ) {
		$custom_css .= "@media screen and (max-width: {$mobile_menu_breakpoint}px){
            .js .responsive-mobile-sidebar #mobile-sidebar .main-nav .menu {
                display: block;
                position: relative;
            }
            .js .responsive-mobile-sidebar #mobile-sidebar .main-nav {
                background-image: none;
                background-color: #ffffff;
            }
            .js .responsive-mobile-sidebar #mobile-sidebar .main-nav .current_page_item a {
                background-color: #D3D3D3;
            }
	    }";
	}
	if ( isset( $responsive_submenu_top_border ) ) {
		$custom_css .= ".menu li:hover > ul {
			border-top: {$responsive_submenu_top_border}px solid;
		} ";
	}
	if ( isset( $responsive_submenu_right_border ) ) {
		$custom_css .= ".menu li:hover > ul {
			border-right: {$responsive_submenu_right_border}px solid;
		} ";
	}
	if ( isset( $responsive_submenu_bottom_border ) ) {
		$custom_css .= ".menu li:hover > ul {
			border-bottom: {$responsive_submenu_bottom_border}px solid;
		} ";
	}
	if ( isset( $responsive_submenu_left_border ) ) {
		$custom_css .= ".menu li:hover > ul{
			border-left: {$responsive_submenu_left_border}px solid;
		} ";
	}
	if ( isset( $responsive_submenu_border_color ) ) {
		$custom_css .= ".menu li:hover > ul {
			border-color: {$responsive_submenu_border_color};
		} ";
	}
	if ( isset( $responsive_submenu_divider_color ) ) {
		$custom_css .= ".menu li li {
			border-bottom-color: {$responsive_submenu_divider_color};
		} ";
	}
	if ( 0 == $responsive_submenu_divider ) { //phpcs:ignore
		$custom_css .= '.menu li li {
			border-bottom: none;
		} ';
	}
	if ( isset( $responsive_submenu_color ) ) {
		$custom_css .= ".menu li li {
			background-color: {$responsive_submenu_color};
		} ";
	}
	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', $custom_css ) );
}
add_action( 'wp_enqueue_scripts', 'responsive_premium_custom_color_styles', 99 );
