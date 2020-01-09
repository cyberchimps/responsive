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
	$link_color             = get_theme_mod( 'link-color', '#0066cc' );
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

	$button_hover_text_color = get_theme_mod( 'button-hover-text-color', '#333333' );

	$background_color = get_theme_mod( 'background_color' );

	$blog_title_color             = get_theme_mod( 'responsive_blog_title_color', '' );
	$single_post_title_color      = get_theme_mod( 'responsive_single_post_title_color', '' );
	$single_post_background_color = get_theme_mod( 'responsive_single_post_background_color', '' );

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

	// Header Menu Container Padding.
	$responsive_header_menu_right_padding  = get_theme_mod( 'responsive_header_menu_right_padding', 0 );
	$responsive_header_menu_left_padding   = get_theme_mod( 'responsive_header_menu_left_padding', 0 );
	$responsive_header_menu_top_padding    = get_theme_mod( 'responsive_header_menu_top_padding', 0 );
	$responsive_header_menu_bottom_padding = get_theme_mod( 'responsive_header_menu_bottom_padding', 0 );

	$responsive_header_menu_tablet_right_padding  = get_theme_mod( 'responsive_header_menu_tablet_right_padding', 0 );
	$responsive_header_menu_tablet_left_padding   = get_theme_mod( 'responsive_header_menu_tablet_left_padding', 0 );
	$responsive_header_menu_tablet_top_padding    = get_theme_mod( 'responsive_header_menu_tablet_top_padding', 0 );
	$responsive_header_menu_tablet_bottom_padding = get_theme_mod( 'responsive_header_menu_tablet_bottom_padding', 0 );

	$responsive_header_menu_mobile_right_padding  = get_theme_mod( 'responsive_header_menu_mobile_right_padding', 0 );
	$responsive_header_menu_mobile_left_padding   = get_theme_mod( 'responsive_header_menu_mobile_left_padding', 0 );
	$responsive_header_menu_mobile_top_padding    = get_theme_mod( 'responsive_header_menu_mobile_top_padding', 0 );
	$responsive_header_menu_mobile_bottom_padding = get_theme_mod( 'responsive_header_menu_mobile_bottom_padding', 0 );

	// Header Padding.
	$header_padding_right  = get_theme_mod( 'responsive_header_right_padding' );
	$header_padding_left   = get_theme_mod( 'responsive_header_left_padding' );
	$header_padding_top    = get_theme_mod( 'responsive_header_top_padding' );
	$header_padding_bottom = get_theme_mod( 'responsive_header_bottom_padding' );
	$header_menu_position  = get_theme_mod( 'menu_position', 'in_header' );

	$header_tablet_padding_right  = get_theme_mod( 'responsive_header_tablet_right_padding', 20 );
	$header_tablet_padding_left   = get_theme_mod( 'responsive_header_tablet_left_padding', 20 );
	$header_tablet_padding_top    = get_theme_mod( 'responsive_header_tablet_top_padding' );
	$header_tablet_padding_bottom = get_theme_mod( 'responsive_header_tablet_bottom_padding' );

	$header_mobile_padding_right  = get_theme_mod( 'responsive_header_mobile_right_padding', 20 );
	$header_mobile_padding_left   = get_theme_mod( 'responsive_header_mobile_left_padding', 20 );
	$header_mobile_padding_top    = get_theme_mod( 'responsive_header_mobile_top_padding' );
	$header_mobile_padding_bottom = get_theme_mod( 'responsive_header_mobile_bottom_padding' );

	// Padding Between Main Menu.
	$responsive_menu_left_right_padding = get_theme_mod( 'responsive_menu_left_right_padding' );

	// Menu colors.
	$menu_gradients_checkbox = get_theme_mod( 'responsive_menu_gradients_checkbox' );
	$menu_background_color   = get_theme_mod( 'responsive_menu_background_colorpicker' );
	$menu_background_color_2 = get_theme_mod( 'responsive_menu_background_colorpicker_2' );

	$menu_background_color_2 = ( 1 === $menu_gradients_checkbox & '' !== $menu_background_color_2 ? $menu_background_color_2 : $menu_background_color );

	$menu_text_color        = get_theme_mod( 'responsive_menu_text_colorpicker' );
	$menu_text_hover_color  = get_theme_mod( 'responsive_menu_text_hover_colorpicker' );
	$menu_active_color      = get_theme_mod( 'responsive_menu_active_colorpicker' );
	$menu_hover_color       = get_theme_mod( 'responsive_menu_item_hover_colorpicker' );
	$menu_active_text_color = get_theme_mod( 'responsive_menu_active_text_colorpicker' );
	$menu_border_color      = get_theme_mod( 'responsive_menu_border_color' );

	// Sidebar colors.
	$sidebar_background_color = get_theme_mod( 'responsive_sidebar_background_color' );

	// Sidebar Width.
	$responsive_sidebar_width = get_theme_mod( 'responsive_sidebar_width' );

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

	$sidebar_radius        = get_theme_mod( 'responsive_sidebar_radius', '4' );
	$sidebar_heading_color = get_theme_mod( 'responsive_sidebar_heading_color' );
	$sidebar_text_color    = get_theme_mod( 'responsive_sidebar_text_color' );

	$fullwidth_title_color  = get_theme_mod( 'responsive_fullwidth_sitetitle_color' );
	$site_description_color = get_theme_mod( 'responsive_site_description_color', '#afafaf' );
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

	// Footer colors.
	$footer_background_color = get_theme_mod( 'responsive_footer_background_color', '#585858' );
	$footer_text_color       = get_theme_mod( 'responsive_footer_text_color', '#ffffff' );

	$footer_border       = get_theme_mod( 'responsive_footer_border', '0' );
	$footer_border_color = get_theme_mod( 'responsive_footer_border_color', '#ffffff' );

	$social_icons_color       = get_theme_mod( 'responsive_social_icons_color', '#ffffff' );
	$social_icons_hover_color = get_theme_mod( 'responsive_social_icons_hover_color', $text_color );

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

	// Blog Entries Meta settings.
	$blog_entries_meta_icon_display = get_theme_mod( 'responsive_blog_entries_meta_icon_display', true );
	$blog_entries_meta_separator    = get_theme_mod( 'responsive_blog_entries_meta_separator', '|' );
	$blog_entries_meta_position     = get_theme_mod( 'responsive_blog_entries_meta_position', 'left' );

	// Blog single Meta settings.
	$single_post_meta_icon_display = get_theme_mod( 'responsive_single_post_meta_icon_display', true );
	$single_post_meta_separator    = get_theme_mod( 'responsive_single_post_meta_separator', '|' );
	$single_post_meta_position     = get_theme_mod( 'responsive_single_post_meta_position', 'left' );

	// Scroll to top settings.
	$stt_devices                     = get_theme_mod( 'responsive_scroll_to_top_on_devices' );
	$stt_position                    = get_theme_mod( 'responsive_scroll_to_top_icon_position' );
	$stt_icon_size                   = get_theme_mod( 'responsive_scroll_to_top_icon_size' );
	$stt_icon_radius                 = get_theme_mod( 'responsive_scroll_to_top_icon_radius' );
	$stt_icon_color                  = get_theme_mod( 'responsive_scroll_to_top_icon_color' );
	$stt_icon_hover_color            = get_theme_mod( 'responsive_scroll_to_top_icon_hover_color' );
	$stt_icon_background_color       = get_theme_mod( 'responsive_scroll_to_top_icon_background_color' );
	$stt_icon_background_hover_color = get_theme_mod( 'responsive_scroll_to_top_icon_background_hover_color' );

	$header_width = get_theme_mod( 'header_width', 'container' );
	$footer_width = get_theme_mod( 'responsive_footer_width', 'container' );

	$header_border_color = get_theme_mod( 'responsive_header_border_color' );

	// Mobile Menu Breakpoint.
	$mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_header_breakpoint', 768 );

	// Mobile Menu Style.
	$mobile_menu_style = get_theme_mod( 'mobile_menu_style', 'dropdown' );

	// Mobile Menu Toggle button color.
	$mobile_menu_toggle_button_color = get_theme_mod( 'responsive_menu_toggle_button_color', '#555555' );

	// Mobile Menu Border Color.
	$responsive_mobile_menu_border_color = get_theme_mod( 'responsive_mobile_menu_border_color', '#f5f5f5' );

	// Mobile Menu Border Color.
	$responsive_mobile_menu_border_color = get_theme_mod( 'responsive_mobile_menu_border_color', '#f5f5f5' );

	// Submenu styles.
	$responsive_submenu_top_border    = get_theme_mod( 'responsive_submenu_top_border' );
	$responsive_submenu_right_border  = get_theme_mod( 'responsive_submenu_right_border' );
	$responsive_submenu_bottom_border = get_theme_mod( 'responsive_submenu_bottom_border' );
	$responsive_submenu_left_border   = get_theme_mod( 'responsive_submenu_left_border' );
	$responsive_submenu_border_color  = get_theme_mod( 'responsive_submenu_border_color', '#e5e5e5' );
	$responsive_submenu_divider_color = get_theme_mod( 'responsive_submenu_divider_color', '#e5e5e5' );
	$responsive_submenu_divider       = get_theme_mod( 'responsive_submenu_divider', '1' );
	$responsive_submenu_color         = get_theme_mod( 'responsive_submenu_color' );

	// Header Layout.
	$responsive_header_layout = get_theme_mod( 'header_layout_options', 'default' );

	$image_width      = get_theme_mod( 'responsive_featured_image_width' );
	$blog_image_width = get_theme_mod( 'responsive_blog_featured_image_width' );

	$blog_padding                      = get_theme_mod( 'responsive_blog_padding', '25' );
	$single_blog_padding               = get_theme_mod( 'responsive_single_blog_padding', '0' );
	$display_thumbnail_without_padding = get_theme_mod( 'responsive_display_thumbnail_without_padding', true );

	// Blog_entries Padding.
	$blog_entries_padding_right  = get_theme_mod( 'responsive_blog_entries_right_padding', '10' );
	$blog_entries_padding_left   = get_theme_mod( 'responsive_blog_entries_left_padding', '10' );
	$blog_entries_padding_top    = get_theme_mod( 'responsive_blog_entries_top_padding', '10' );
	$blog_entries_padding_bottom = get_theme_mod( 'responsive_blog_entries_bottom_padding', '10' );

	$blog_entries_tablet_padding_right  = get_theme_mod( 'responsive_blog_entries_tablet_right_padding' );
	$blog_entries_tablet_padding_left   = get_theme_mod( 'responsive_blog_entries_tablet_left_padding' );
	$blog_entries_tablet_padding_top    = get_theme_mod( 'responsive_blog_entries_tablet_top_padding' );
	$blog_entries_tablet_padding_bottom = get_theme_mod( 'responsive_blog_entries_tablet_bottom_padding' );

	$blog_entries_mobile_padding_right  = get_theme_mod( 'responsive_blog_entries_mobile_right_padding' );
	$blog_entries_mobile_padding_left   = get_theme_mod( 'responsive_blog_entries_mobile_left_padding' );
	$blog_entries_mobile_padding_top    = get_theme_mod( 'responsive_blog_entries_mobile_top_padding' );
	$blog_entries_mobile_padding_bottom = get_theme_mod( 'responsive_blog_entries_mobile_bottom_padding' );

	// single_blog Padding.
	$single_blog_padding_right  = get_theme_mod( 'responsive_single_blog_right_padding' );
	$single_blog_padding_left   = get_theme_mod( 'responsive_single_blog_left_padding' );
	$single_blog_padding_top    = get_theme_mod( 'responsive_single_blog_top_padding' );
	$single_blog_padding_bottom = get_theme_mod( 'responsive_single_blog_bottom_padding' );

	$single_blog_tablet_padding_right  = get_theme_mod( 'responsive_single_blog_tablet_right_padding' );
	$single_blog_tablet_padding_left   = get_theme_mod( 'responsive_single_blog_tablet_left_padding' );
	$single_blog_tablet_padding_top    = get_theme_mod( 'responsive_single_blog_tablet_top_padding' );
	$single_blog_tablet_padding_bottom = get_theme_mod( 'responsive_single_blog_tablet_bottom_padding' );

	$single_blog_mobile_padding_right  = get_theme_mod( 'responsive_single_blog_mobile_right_padding' );
	$single_blog_mobile_padding_left   = get_theme_mod( 'responsive_single_blog_mobile_left_padding' );
	$single_blog_mobile_padding_top    = get_theme_mod( 'responsive_single_blog_mobile_top_padding' );
	$single_blog_mobile_padding_bottom = get_theme_mod( 'responsive_single_blog_mobile_bottom_padding' );

	$buttons_padding_top    = get_theme_mod( 'responsive_buttons_top_padding' );
	$buttons_padding_right  = get_theme_mod( 'responsive_buttons_right_padding' );
	$buttons_padding_left   = get_theme_mod( 'responsive_buttons_left_padding' );
	$buttons_padding_bottom = get_theme_mod( 'responsive_buttons_bottom_padding' );

	$buttons_tablet_padding_right  = get_theme_mod( 'responsive_buttons_tablet_right_padding' );
	$buttons_tablet_padding_left   = get_theme_mod( 'responsive_buttons_tablet_left_padding' );
	$buttons_tablet_padding_top    = get_theme_mod( 'responsive_buttons_tablet_top_padding' );
	$buttons_tablet_padding_bottom = get_theme_mod( 'responsive_buttons_tablet_bottom_padding' );

	$buttons_mobile_padding_right  = get_theme_mod( 'responsive_buttons_mobile_right_padding' );
	$buttons_mobile_padding_left   = get_theme_mod( 'responsive_buttons_mobile_left_padding' );
	$buttons_mobile_padding_top    = get_theme_mod( 'responsive_buttons_mobile_top_padding' );
	$buttons_mobile_padding_bottom = get_theme_mod( 'responsive_buttons_mobile_bottom_padding' );

	$footer_layout   = get_theme_mod( 'responsive_footer_layout_options', 'row' );
	$layout_position = get_theme_mod( 'responsive_layout_position', '' );

	$blog_alignment   = get_theme_mod( 'responsive_blog_title_alignment_options', 'left' );
	$single_alignment = get_theme_mod( 'responsive_single_title_alignment_options', 'left' );
	$page_alignment   = get_theme_mod( 'responsive_page_title_alignment_options', 'left' );

	if ( isset( $body_typography['color'] ) ) {
		$body_color = $body_typography['color'];
	} else {
		$body_color = '#575757';
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
		.sidebar-box,
		.widget-title,
		.site-title a {
			font-family: {$headings_font_family};
			text-transform: {$headingtext_transform};
			letter-spacing: {$headingsletter_spacing}px;
			color: {$heading_color};
			font-weight: {$headingsfont_weight};
			line-height: {$headingsline_height};
			font-style: {$headingsfont_style};
		}
		.post-meta *{
		    color: {$body_color};
		}
		a:hover, .post-meta .timestamp.updated:hover, .post-meta .author.vcard .url.fn.n span:hover{
			color: {$link_hover_color};
		}

		a {
			color: {$link_color};
		}

		input[type=text], input[type=email], input[type=password], input[type=search], .widget-wrapper input[type=search], .widget-wrapper input[type=email], .widget-wrapper input[type=password], .widget-wrapper input[type=text], .widget-wrapper select {
			color: {$input_text_color};
			background-color: {$input_background_color};
			border: 1px solid {$input_border_color};
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
		.wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-label, #footer .wpforms-container.wpforms-container-full .wpforms-form .wpforms-field-label{
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
		.wpforms-container.wpforms-container-full .wpforms-form input[type=email], .wpforms-container.wpforms-container-full .wpforms-form input[type=number], .wpforms-container.wpforms-container-full .wpforms-form input[type=password], .wpforms-container.wpforms-container-full .wpforms-form input[type=search], .wpforms-container.wpforms-container-full .wpforms-form input[type=tel], .wpforms-container.wpforms-container-full .wpforms-form input[type=text], .wpforms-container.wpforms-container-full .wpforms-form select, .wpforms-container.wpforms-container-full .wpforms-form textarea, #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=email], #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=number], #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=password], #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=search], #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=tel], #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=text], #footer .wpforms-container.wpforms-container-full .wpforms-form select, #footer .wpforms-container.wpforms-container-full .wpforms-form textarea{
			color: {$input_text_color};
			border-color: {$input_border_color};
			background-color: {$input_background_color};
			font-family: {$font_family};
			font-size: {$body_font_size};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			letter-spacing: {$letter_spacing}px;
		}

		.wpforms-container.wpforms-container-full .wpforms-form input[type=submit], .wpforms-container.wpforms-container-full .wpforms-form button[type=submit], .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button,
		#footer .wpforms-container.wpforms-container-full .wpforms-form input[type=submit], #footer .wpforms-container.wpforms-container-full .wpforms-form button[type=submit], #footer .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button{
			color: {$button_text_color};
			background-color: {$button_color};
			border-radius: {$button_radius}px;
			border-color: {$input_border_color};
			font-family: {$font_family};
			font-size: {$body_font_size};
			font-weight: {$font_weight};
			line-height: {$line_height};
			font-style: {$font_style};
			letter-spacing: {$letter_spacing}px;
		}
		.wpforms-container.wpforms-container-full .wpforms-form input[type=submit]:hover, .wpforms-container.wpforms-container-full .wpforms-form input[type=submit]:active, .wpforms-container.wpforms-container-full .wpforms-form button[type=submit]:hover, .wpforms-container.wpforms-container-full .wpforms-form button[type=submit]:focus, .wpforms-container.wpforms-container-full .wpforms-form button[type=submit]:active, .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button:hover, .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button:active, .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button:focus, #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=submit]:hover, #footer .wpforms-container.wpforms-container-full .wpforms-form input[type=submit]:active, #footer .wpforms-container.wpforms-container-full .wpforms-form button[type=submit]:hover, #footer .wpforms-container.wpforms-container-full .wpforms-form button[type=submit]:focus, #footer .wpforms-container.wpforms-container-full .wpforms-form button[type=submit]:active, #footer .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button:hover, #footer .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button:active, #footer .wpforms-container.wpforms-container-full .wpforms-form .wpforms-page-button:focus{
			background-color: {$button_hover_color};
			color: {$button_hover_text_color};
		}

		#content-woocommerce .product .single_add_to_cart_button, .added_to_cart.wc-forward, .woocommerce ul.products li.product .button,
		input[type='submit'], input[type=button], a.button, .button, .call-to-action a.button, button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
		.woocommerce #respond input#submit, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #searchsubmit, #footer-widgets #searchsubmit{
			color: {$button_text_color};
			background-color: {$button_color};
			border-radius: {$button_radius}px;
		}
		.wp-block-button__link:not(.has-background){
			color: {$button_text_color};
			background-color: {$button_color};
		}
		.wp-block-button__link {
			border-radius: {$button_radius}px;
		}
		input#searchsubmit{
			background-image: none;
		}
		.wp-block-button .wp-block-button__link:hover,.wp-block-button .wp-block-button__link.has-button-hover-color-color:hover, button:hover, input[type='submit']:hover, input[type=button]:hover, a.button:hover, .button:hover, .woocommerce a.button:hover, .woocommerce input.button:hover , .call-to-action a.button:hover,
		#content-woocommerce .product .single_add_to_cart_button:hover, #content-woocommerce .product .single_add_to_cart_button:focus, .added_to_cart.wc-forward:hover, .added_to_cart.wc-forward:focus, .woocommerce ul.products li.product .button:hover, .woocommerce ul.products li.product .button:focus,
		.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, #searchsubmit:hover, #footer-widgets #searchsubmit:hover {
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
		.content-outer, body.blog.blog-boxed .content-outer, body.single.single-boxed .content-outer, body.archive.blog-boxed .content-outer, body.blog.blog-content-boxed .content-outer,
		body.single.single-content-boxed .content-outer, body.archive.blog-content-boxed .content-outer, body.page.page-boxed .content-outer, body.page.page-content-boxed .content-outer, body.fullwidth-stretched.page.page-fullwidth-content .content-outer, body.fullwidth-stretched.blog.blog-fullwidth-content .content-outer, body.fullwidth-stretched.archive.blog-fullwidth-content .content-outer, body.fullwidth-stretched.single.single-fullwidth-content .content-outer, #content-outer {
			max-width: {$container_width}px;
			margin-left: auto;
			margin-right: auto;
		}
		.wp-block-cover__inner-container, .boxed-layout	.content-area, body.default-layout .content-outer, body.full-width-layout .content-outer, body.full-width-no-box .content-outer, #footer .content-outer{
			max-width: {$container_width}px;
		}

		body:not(.fullwidth-stretched) .grid.col-940:not(.blog-2-col):not(.blog-3-col):not(.blog-4-col) .alignwide,
		body.blog:not(.fullwidth-stretched) .grid.col-940 #main-blog > *.post .post-entry .alignwide {
			padding-left: calc((100vw - {$container_width}px)/4);
			padding-right: calc((100vw - {$container_width}px)/4);
		}

		.woocommerce ul.products li.product .onsale.circle-outline, .woocommerce ul.products li.product .onsale.square-outline, .woocommerce div.product .onsale.circle-outline, .woocommerce div.product .onsale.square-outline, .wc-block-grid__product-onsale {
			background: #ffffff;
			border: 2px solid {$link_color};
			color: {$link_color};
		}
		.woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .wc-block-grid__product-onsale{
			background-color: {$link_color};
			color: #ffffff;
		}
		@media (min-width: {$mobile_menu_breakpoint}px) {
			.main-nav {
				padding: {$responsive_header_menu_top_padding}px {$responsive_header_menu_right_padding}px {$responsive_header_menu_bottom_padding}px {$responsive_header_menu_left_padding}px;
			}
		}
		@media (min-width: 480px) and (max-width: {$mobile_menu_breakpoint}px) {
			.js .main-nav a#responsive_menu_button {
				margin: {$responsive_header_menu_tablet_top_padding}px {$responsive_header_menu_tablet_right_padding}px {$responsive_header_menu_tablet_bottom_padding}px 0px;
			}
			.main-nav > .menu {
				margin: calc({$responsive_header_menu_tablet_top_padding}px + 1em) -{$responsive_header_menu_tablet_right_padding}px -{$responsive_header_menu_tablet_bottom_padding}px -{$responsive_header_menu_tablet_left_padding}px;
			}
			.js .main-nav {
				padding: {$responsive_header_menu_tablet_top_padding}px {$responsive_header_menu_tablet_right_padding}px {$responsive_header_menu_tablet_bottom_padding}px {$responsive_header_menu_tablet_left_padding}px;
			}
		}
		@media (max-width: 480px){
			.js .main-nav a#responsive_menu_button {
				margin: {$responsive_header_menu_mobile_top_padding}px {$responsive_header_menu_mobile_right_padding}px {$responsive_header_menu_mobile_bottom_padding}px 0px;
			}
			.main-nav > .menu {
				margin: calc({$responsive_header_menu_mobile_top_padding}px + 1em) -{$responsive_header_menu_mobile_right_padding}px -{$responsive_header_menu_mobile_bottom_padding}px -{$responsive_header_menu_mobile_left_padding}px;
			}
			.js .main-nav {
				padding: {$responsive_header_menu_mobile_top_padding}px {$responsive_header_menu_mobile_right_padding}px {$responsive_header_menu_mobile_bottom_padding}px {$responsive_header_menu_mobile_left_padding}px;
			}
		}
		@media screen and (min-width:768px){
		  #header {
		    padding: " . responsive_spacing_css( $header_padding_top, $header_padding_right, $header_padding_bottom, $header_padding_left ) . ';
		  }
		}
		@media (min-width: 480px) and (max-width: 768px) {
		  #header {
		    padding: ' . responsive_spacing_css( $header_tablet_padding_top, $header_tablet_padding_right, $header_tablet_padding_bottom, $header_tablet_padding_left ) . ';
		  }
		}
		@media (max-width: 480px){
		  #header {
		    padding: ' . responsive_spacing_css( $header_mobile_padding_top, $header_mobile_padding_right, $header_mobile_padding_bottom, $header_mobile_padding_left ) . ";
		  }
		}
		body.search .post-meta .posted-in:after,
		body.search .post-meta .comments-link:after,
		body.search .post-meta .meta-prep-author:after,
		body.search .post-meta .vcard:after,
		body.archive .post-meta .posted-in:after,
		body.archive .post-meta .comments-link:after,
		body.archive .post-meta .meta-prep-author:after,
		body.archive .post-meta .vcard:after,
		body.blog .post-meta .posted-in:after,
		body.blog .post-meta .comments-link:after,
		body.blog .post-meta .meta-prep-author:after,
		body.blog .post-meta .vcard:after{
			content: '{$blog_entries_meta_separator}';
		}

		body.search .post-meta > :last-child:after,
		body.archive .post-meta > :last-child:after,
		body.blog .post-meta > :last-child:after {
		    content: none;
		}
		body.search .post-meta,
		body.archive .post-meta,
		body.blog .post-meta{
			text-align: {$blog_entries_meta_position};
		}
		body.single .post-meta .posted-in:after,
		body.single .post-meta .comments-link:after,
		body.single .post-meta .timestamp:after,
		body.single .post-meta .vcard:after{
			content: '{$single_post_meta_separator}';
		}

		body.single .post-meta > :last-child:after {
		    content: none;
		}
		body.single .post-meta{
			text-align: {$single_post_meta_position};
		}
		body.page .entry-title, #main-blog h1 {
			text-align: {$page_alignment};
		}
		body.blog .entry-title, body.search .entry-title, body.archive .entry-title{
			text-align: {$blog_alignment};
		}
		body.single .entry-title{
			text-align: {$single_alignment};
		}
		.footer-bar.grid.col-940 .content-outer{
			flex-direction: {$footer_layout};
		}
		#footer{
			border-top-style: solid;
			border-top-width: {$footer_border}px;
			border-top-color: {$footer_border_color};
		}
		#footer .social-icons .fa {
			color:{$social_icons_color};
		}
		#footer .social-icons .fa:hover {
			color:{$social_icons_hover_color};
		}
		";

	if ( 'column' === $footer_layout ) {
		$custom_css .= '.footer-bar{
					text-align: center;
				}
				.footer-layouts.copyright{
					text-align: center;
				}
				.social-icon{
					text-align: center;
					margin-bottom:-10px;
				}
				.footer-menu li{
					display: inline-block;
					float:none;
				}
				.footer-bar.grid.col-940 .content-outer .footer-layouts.footer-menu-container{
					margin-bottom: 1em;
				}
				';
	}

	if ( ! $blog_entries_meta_icon_display ) {
		$custom_css .= 'body.search .post-meta .author-gravtar,
		body.search .post-meta .fa,
		body.archive .post-meta .author-gravtar,
		body.archive .post-meta .fa,
		body.blog .post-meta .author-gravtar,
		body.blog .post-meta .fa{
			display:none;
		}';
	}

	if ( ! $single_post_meta_icon_display ) {
		$custom_css .= 'body.single .post-meta .author-gravtar,
		body.single .post-meta .fa{
			display:none;
		}
		body.single .post-meta > span	 {
			padding-left: 6px;
		}';
	}

	if ( $blog_entries_padding_top || $blog_entries_padding_right || $blog_entries_padding_bottom || $blog_entries_padding_left ) {
		$custom_css .= 'body.search .post,
		body.search .page,
		body.archive .post,
		body.blog .post{
			padding:' . responsive_spacing_css( $blog_entries_padding_top, $blog_entries_padding_right, $blog_entries_padding_bottom, $blog_entries_padding_left ) . '
		}';
	}

	if ( $blog_entries_tablet_padding_top || $blog_entries_tablet_padding_right || $blog_entries_tablet_padding_bottom || $blog_entries_tablet_padding_left ) {
		$custom_css .= '@media screen and (max-width:768px){
			body.search .post,
			body.search .page,
			body.archive .post,
			body.blog .post{
				padding:' . responsive_spacing_css( $blog_entries_tablet_padding_top, $blog_entries_tablet_padding_right, $blog_entries_tablet_padding_bottom, $blog_entries_tablet_padding_left ) . '
			}
		}';
	}

	if ( $blog_entries_mobile_padding_top || $blog_entries_mobile_padding_right || $blog_entries_mobile_padding_bottom || $blog_entries_mobile_padding_left ) {
		$custom_css .= '@media screen and (max-width:480px){
			body.search .post,
			body.search .page,
			body.archive .post,
			body.blog .post{
				padding:' . responsive_spacing_css( $blog_entries_mobile_padding_top, $blog_entries_mobile_padding_right, $blog_entries_mobile_padding_bottom, $blog_entries_mobile_padding_left ) . '
			}
		}';
	}

	if ( $single_blog_padding_top || $single_blog_padding_right || $single_blog_padding_bottom || $single_blog_padding_left ) {
		$custom_css .= 'body.single #primary,body.single.fullwidth-content #primary,body.single.single-fullwidth-stretched #primary{
			padding:' . responsive_spacing_css( $single_blog_padding_top, $single_blog_padding_right, $single_blog_padding_bottom, $single_blog_padding_left ) . '
		}';
	}

	if ( $single_blog_tablet_padding_top || $single_blog_tablet_padding_right || $single_blog_tablet_padding_bottom || $single_blog_tablet_padding_left ) {
		$custom_css .= '@media screen and (max-width:768px){
			body.single #primary,body.single.fullwidth-content #primary,body.single.single-fullwidth-stretched #primary {
				padding:' . responsive_spacing_css( $single_blog_tablet_padding_top, $single_blog_tablet_padding_right, $single_blog_tablet_padding_bottom, $single_blog_tablet_padding_left ) . '
			}
		}';
	}

	if ( $single_blog_mobile_padding_top || $single_blog_mobile_padding_right || $single_blog_mobile_padding_bottom || $single_blog_mobile_padding_left ) {
		$custom_css .= '@media screen and (max-width:480px){
			body.single #primary,body.single.fullwidth-content #primary,body.single.single-fullwidth-stretched #primary {
				padding:' . responsive_spacing_css( $single_blog_mobile_padding_top, $single_blog_mobile_padding_right, $single_blog_mobile_padding_bottom, $single_blog_mobile_padding_left ) . '
			}
		}';
	}

	if ( 'full' === $header_width ) {
		$custom_css .= 'body.full-width-no-box header div.content-outer,
		body.full-width-layout header div.content-outer,
		header div.content-outer {
			max-width: 100%;
		}
		#site-branding{
			padding: 0 0.9em;
		}
		header .content-outer.responsive-header{
			width: 100%;
		}
		#header{
			padding-left: 0;
			padding-right: 0;
		}';
	} else {
		$custom_css .= '
		body.fullwidth-stretched header div.content-outer,
        header div.content-outer,
		nav.main-nav{
			max-width: ' . get_theme_mod( 'responsive_main_container_width', '960' ) . 'px;
			margin:0 auto;
		}
		#site-branding{
			padding: 0;
		}';
	}

	if ( 'full' === $footer_width ) {
		$custom_css .= '#footer .content-outer {
			max-width: 100%;
			width: 100%;
		}';
	}

	if ( $buttons_padding_top || $buttons_padding_right || $buttons_padding_bottom || $buttons_padding_left ) {
		$custom_css .= '#content-woocommerce .product .single_add_to_cart_button, .added_to_cart.wc-forward, .woocommerce ul.products li.product .button,input[type="submit"], input[type=button], a.button, .button, .call-to-action a.button, button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, input[type=submit]#searchsubmit, #footer-widgets #searchsubmit,.wp-block-button__link {
			padding:' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . '
		}';
	}

	if ( $buttons_tablet_padding_top || $buttons_tablet_padding_right || $buttons_tablet_padding_bottom || $buttons_tablet_padding_left ) {
		$custom_css .= '@media screen and (max-width:768px){
				#content-woocommerce .product .single_add_to_cart_button, .added_to_cart.wc-forward, .woocommerce ul.products li.product .button,input[type="submit"], input[type=button], a.button, .button, .call-to-action a.button, button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, input[type=submit]#searchsubmit, #footer-widgets #searchsubmit,.wp-block-button__link {
				padding:' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . '
			}
		}';
	}

	if ( $buttons_mobile_padding_top || $buttons_mobile_padding_right || $buttons_mobile_padding_bottom || $buttons_mobile_padding_left ) {
		$custom_css .= '@media screen and (max-width:480px){
				#content-woocommerce .product .single_add_to_cart_button, .added_to_cart.wc-forward, .woocommerce ul.products li.product .button,input[type="submit"], input[type=button], a.button, .button, .call-to-action a.button, button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, input[type=submit]#searchsubmit, #footer-widgets #searchsubmit,.wp-block-button__link {
				padding:' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . '
			}
		}';
	}
	if ( ! empty( $responsive_sidebar_width ) ) {
		$responsive_content_width = 97 - $responsive_sidebar_width;

		$custom_css .= "@media screen and (min-width: 981px){
			#wrapper #primary.col-620, #primary.col-620 , #content-woocommerce.col-620 {

				width: {$responsive_content_width}.8723404255%;
			}
			#wrapper aside#secondary.col-300 {
				width: {$responsive_sidebar_width}%;
			}
		}";
	}

	if ( ! empty( $product_title_color ) ) {
		$custom_css .= ".single-product div.product .entry-title {
			color: {$product_title_color};
		}";
	}
	if ( ! empty( $product_content_color ) ) {
		$custom_css .= ".single-product div.product .woocommerce-product-details__short-description, .single-product div.product .product_meta, .single-product div.product .entry-content{
			color: {$product_content_color};
		}";
	}
	if ( ! empty( $product_price_color ) ) {
		$custom_css .= ".single-product div.product p.price, .single-product div.product span.price {
			color: {$product_price_color};
		}";
	}
	if ( ! empty( $shop_product_title_color ) ) {
		$custom_css .= ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, .single-product div.product .woocommerce-product-details__short-description, .single-product div.product .product_meta, .single-product div.product .entry-content, .wc-block-grid__product-title {
			color: {$shop_product_title_color};
		}";
	}
	if ( ! empty( $shop_product_price_color ) ) {

		$custom_css .= ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .wc-block-grid__product-price, .wc-block-grid__product-price>del {

			color: {$shop_product_price_color};
		}";
	}
	if ( ! empty( $product_rating_color ) ) {
		$custom_css .= ".woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before, .wc-block-grid__product-rating, .wc-block-grid__product-rating .star-rating span:before  {
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

	if ( ! empty( $responsive_menu_left_right_padding ) ) {
		$custom_css .= ".menu a{
			padding: 0 {$responsive_menu_left_right_padding}em;
		}";
	}

	if ( ! empty( $menu_text_color ) ) {
		$custom_css .= ".menu a,.menu .menu-item-has-children::after, .full-width-no-box .menu a, .js .main-nav a#responsive_menu_button,.js .main-nav #responsive_current_menu_item {
			color: {$menu_text_color};
		}
		@media (min-width: 768px){
			.menu li li a, .js .main-nav a#responsive_menu_button {
				color: {$menu_text_color};
			}
		}";
	}
	if ( ! empty( $menu_text_hover_color ) ) {
		$custom_css .= ".menu a:hover, .full-width-no-box .menu a:hover,.menu .menu-item-has-children:hover::after{
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
		.menu .current-menu-item a, .menu .current_page_item a, .current_page_item.menu-item-has-children::after  {
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
		$custom_css .= "
			.menu li:hover>ul, .main-nav, .full-width-no-box .main-nav, .full-width-no-box .menu, .menu {
			background-color:{$menu_background_color};
			background-image: -webkit-gradient(linear, left top, left bottom, from({$menu_background_color}), to({$menu_background_color_2}));
			background-image: -webkit-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: -moz-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: -ms-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: -o-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
			background-image: linear-gradient(to top, {$menu_background_color}, {$menu_background_color_2});
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
				background-image: linear-gradient(to top, {$menu_background_color}, {$menu_background_color_2});
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr={$menu_background_color}, endColorstr={$menu_background_color_2});
			}
		}
		@media screen and (max-width: {$mobile_menu_breakpoint}px) {
    		.js #main-nav {
				background-color:{$menu_background_color} ;
				background-image: -webkit-gradient(linear, left top, left bottom, from({$menu_background_color}), to({$menu_background_color_2}));
				background-image: -webkit-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -moz-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -ms-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: -o-linear-gradient(top, {$menu_background_color}, {$menu_background_color_2});
				background-image: linear-gradient(to top, {$menu_background_color}, {$menu_background_color_2});
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr={$menu_background_color}, endColorstr={$menu_background_color_2});
			}
		}";
	}
	if ( $sidebar_background_color ) {
		$custom_css .= "#secondary .widget-wrapper {
			background-color: {$sidebar_background_color};
		}";
	}
	if ( $sidebar_padding_right ) {
		$custom_css .= "#secondary .widget-wrapper {
			padding-right: {$sidebar_padding_right}px;
		}";
	}
	if ( $sidebar_padding_left ) {
		$custom_css .= "#secondary .widget-wrapper {
			padding-left: {$sidebar_padding_left}px;
		}";
	}
	if ( $sidebar_padding_top ) {
		$custom_css .= "#secondary .widget-wrapper {
			padding-top: {$sidebar_padding_top}px;
		}";
	}
	if ( $sidebar_padding_bottom ) {
		$custom_css .= "#secondary .widget-wrapper {
			padding-bottom: {$sidebar_padding_bottom}px;
		}";
	}
	// Tablet container padding.
	if ( isset( $sidebar_tablet_padding_top )
		|| isset( $sidebar_tablet_padding_right )
		|| isset( $sidebar_tablet_padding_bottom )
		|| isset( $sidebar_tablet_padding_left ) ) {
		$custom_css .= '@media (max-width: 768px){
			#secondary .widget-wrapper {
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
			#secondary .widget-wrapper {
				padding:' . responsive_spacing_css( $sidebar_mobile_padding_top, $sidebar_mobile_padding_right, $sidebar_mobile_padding_bottom, $sidebar_mobile_padding_left ) . '
			}
		}';
	}
	if ( $sidebar_radius >= 0 ) {
		$custom_css .= "#secondary .widget-wrapper {
			border-radius: {$sidebar_radius}px;
		}";
	}
	if ( ! empty( $fullwidth_title_color ) ) {
		$custom_css .= ".full-width-no-box .site-name a, .site-name a, .site-name a:hover{
			color: {$fullwidth_title_color};
		}";
	}
	if ( ! empty( $sidebar_heading_color ) ) {
		$custom_css .= "#secondary .widget-wrapper .widget-title h3 {
			color: {$sidebar_heading_color};
		}";
	}
	if ( ! empty( $sidebar_text_color ) ) {
		$custom_css .= "#secondary .widget-wrapper p,#secondary .widget-wrapper li,#secondary .widget-wrapper a,#secondary .widget-wrapper div {
			color: {$sidebar_text_color};
		}";
	}
	if ( ! empty( $blog_background_color ) ) {
		$custom_css .= ".section-blog-2-col,.section-blog-3-col,.section-blog-4-col,body.search .post,body.archive .post,body.blog .post,body.blog.boxed #primary .post,body.blog.content-boxed #primary .post  {
			background-color: {$blog_background_color};
		}
		";
	}

	if ( ! empty( $display_thumbnail_without_padding ) ) {
		$custom_css .= "body.search .post-entry > :first-child.thumbnail,
		body.archive .post-entry > :first-child.thumbnail,
		body.blog .post-entry > :first-child.thumbnail {
    		margin: 0 -{$blog_entries_padding_right}px 25px -{$blog_entries_padding_left}px;
		}
		body.search .post-entry .thumbnail,
		body.archive .post-entry .thumbnail,
		body.blog .post-entry .thumbnail {
    		margin: 0 -{$blog_entries_padding_right}px 25px -{$blog_entries_padding_left}px;
		}

		@media screen and (max-width:768px){
			body.search .post-entry > *:first-child.thumbnail,
			body.archive .post-entry > *:first-child.thumbnail,
			body.blog .post-entry > *:first-child.thumbnail {
	    		margin: 0 -{$blog_entries_tablet_padding_right}px 20px -{$blog_entries_tablet_padding_left}px;
			}
			body.search .post-entry .thumbnail,
			body.archive .post-entry .thumbnail,
			body.blog .post-entry .thumbnail {
	    		margin: 0 -{$blog_entries_tablet_padding_right}px 20px -{$blog_entries_tablet_padding_left}px;
			}
		}
		@media screen and (max-width:480px){
			body.search .post-entry > *:first-child.thumbnail,
			body.archive .post-entry > *:first-child.thumbnail,
			body.blog .post-entry > *:first-child.thumbnail {
	    		margin: 0 -{$blog_entries_mobile_padding_right}px 15px -{$blog_entries_mobile_padding_left}px;
			}
			body.search .post-entry .thumbnail,
			body.archive .post-entry .thumbnail,
			body.blog .post-entry .thumbnail {
	    		margin: 0 -{$blog_entries_mobile_padding_right}px 15px -{$blog_entries_mobile_padding_left}px;
			}
		}";
	} else {
		$custom_css .= 'body.search .post-entry > *:first-child.thumbnail,
		body.archive .post-entry > *:first-child.thumbnail,
		body.blog .post-entry > *:first-child.thumbnail {
    		padding: 0 0 25px 0;
		}
		body.search .post-entry .thumbnail ,
		body.archive .post-entry .thumbnail ,
		body.blog .post-entry .thumbnail {
    		padding: 0;
		}';
	}

	if ( ! empty( $container_padding_right ) ) {
		$custom_css .= ".wp-block-cover__inner-container,.header-widgets,.content-outer {
			padding-right: {$container_padding_right}px;
		} @media screen and (max-width: {$mobile_menu_breakpoint}px){
		    .menu {
		        padding-right: 0px;
		    }
		}";
		if ( 'default' === $responsive_header_layout ) {
			$custom_css .= ".menu {
		    	padding-right: {$container_padding_right}px;
			}";
		}
	}
	if ( ! empty( $container_padding_left ) ) {
		$custom_css .= ".wp-block-cover__inner-container,.header-widgets,.content-outer {
			padding-left: {$container_padding_left}px;
		} @media screen and (max-width: {$mobile_menu_breakpoint}px){
		    .menu {
		        padding-left: 0px;
		    }
		}";
		if ( 'default' === $responsive_header_layout ) {
			$custom_css .= ".menu {
		    	padding-left: {$container_padding_left}px;
			}";
		}
	}
	if ( 'header-logo-center' === $responsive_header_layout ) {
		$custom_css .= '
		.menu{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }';
	}
	if ( ! empty( $container_padding_top ) ) {
		$custom_css .= ".wp-block-cover__inner-container,.header-widgets,.content-outer {
			padding-top: {$container_padding_top}px;
		}";
	}
	if ( ! empty( $container_padding_bottom ) ) {
		$custom_css .= ".wp-block-cover__inner-container,.content-outer {
			padding-bottom: {$container_padding_bottom}px;
		}";
	}
	// Tablet container padding.
	if ( isset( $container_tablet_padding_top )
		|| isset( $container_tablet_padding_right )
		|| isset( $container_tablet_padding_bottom )
		|| isset( $container_tablet_padding_left ) ) {
		$custom_css .= '@media (max-width: 768px){
			.wp-block-cover__inner-container,.header-widgets,.content-outer{
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
			.wp-block-cover__inner-container,.header-widgets,.content-outer{
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
		$custom_css .= "body.home #wrapper, #wrapper, body.page.page-boxed, body.page.page-content-boxed, body.page.page-fullwidth-stretched, body.page.page-fullwidth-content, body.blog.blog-boxed, body.archive.blog-boxed, body.single.single-boxed, body.archive.blog-content-boxed, body.blog.blog-content-boxed, body.single.single-content-boxed, body.archive.blog-fullwidth-content, body.blog.blog-fullwidth-content, body.single.single-fullwidth-content, body.archive.blog-fullwidth-stretched, body.blog.blog-fullwidth-stretched, body.single.single-fullwidth-stretched, .page.page-fullwidth-stretched #primary, .page.page-fullwidth-content #primary, .blog.blog-fullwidth-stretched #primary, .blog.blog-fullwidth-content #primary, .archive.blog-fullwidth-stretched #primary, .archive.blog-fullwidth-content #primary, .single.single-fullwidth-stretched #primary, .single.single-fullwidth-content #primary{
			background-color: #{$background_color};
		}";
	}
	if ( $single_post_background_color ) {
		$custom_css .= ".single.single-fullwidth-content #primary,.single.single-fullwidth-stretched #primary,body.single #primary, body.single.single-content-boxed #primary, body.single.single-boxed #primary {background-color: {$single_post_background_color};}";

	}
	if ( ! empty( $footer_background_color ) ) {
		$custom_css .= "#footer, .full-width-no-box .footer_div, #footer-widgets.grid.col-940 .content-outer .widget-wrapper{
			background-color: {$footer_background_color};
		}";
	}
	if ( ! empty( $footer_text_color ) ) {
		$custom_css .= "#footer *, .full-width-no-box .footer_div *, #footer a{
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
	if ( $stt_icon_radius ) {
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
	if ( ! empty( $blog_title_color ) ) {
		$custom_css .= "#main-blog > h1 {
			color: {$blog_title_color};
		}";
	}
	if ( ! empty( $single_post_title_color ) ) {
		$custom_css .= "h1.entry-title.post-title {
			color: {$single_post_title_color};
		}";
	}
	if ( ! empty( $image_width ) ) {
		$custom_css .= "body.single.single-post img.wp-post-image,body.single.single-post img.attachment-full {
			width: {$image_width}px;
		}";
	}
	if ( ! empty( $blog_image_width ) ) {
		$custom_css .= "#content-archive img.wp-post-image, body.blog img.wp-post-image, body.archive.category img.wp-post-image {
			width: {$blog_image_width}px;
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
            left:0px;
            z-index: 1000;
            padding:0;
        }
        .js .main-nav #responsive_current_menu_item {
            display: inline;
            padding: 5px 40px 5px 10px;
            font-weight: 700;
            cursor: pointer
        }
        .js .main-nav a#responsive_menu_button {
            position: relative;
            display: inline;
            cursor: pointer;
            font-size: 3em;
            line-height: 1;
            text-align: center;
			margin: calc(50% - 1em);
		    padding: 0 .5em;
        }
        .js .main-nav, #header .content-outer.responsive-header #site-branding {
		    width: 100%
	    }
	    #header .responsive-header {
		    display: inline-block;
	    }
	    .header-logo-left .main-nav ul li {
		    display: block;
	    }
	    body header .content-outer {
	        width: 100%;
	    }

	}";
	if ( ! empty( $mobile_menu_toggle_button_color ) ) {
		$custom_css .= ".js .main-nav a#responsive_menu_button {
	    	background-color: {$mobile_menu_toggle_button_color};
	    }";
	}
	// Hide toggle button.
	$custom_css .= "@media screen and (min-width: {$mobile_menu_breakpoint}px){
		#responsive_menu_button {
            display: none
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
                border: none;
            }
            .js .responsive-mobile-dropdown .main-nav .menu li a {
                color: #444;
				background-color: #fff;
                font-size: 13px;
                font-weight: 400;
                height: 45px;
                line-height: 45px;
                padding: 0 20px;
                border: none;
                border-bottom: 1px solid {$responsive_mobile_menu_border_color};
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
	if ( $responsive_submenu_top_border ) {
		$custom_css .= ".menu li:hover > ul {
			border-top: {$responsive_submenu_top_border}px solid;
		} ";
	}
	if ( $responsive_submenu_right_border ) {
		$custom_css .= ".menu li:hover > ul {
			border-right: {$responsive_submenu_right_border}px solid;
		} ";
	}
	if ( $responsive_submenu_bottom_border ) {
		$custom_css .= ".menu li:hover > ul {
			border-bottom: {$responsive_submenu_bottom_border}px solid;
		} ";
	}
	if ( $responsive_submenu_left_border ) {
		$custom_css .= ".menu li:hover > ul{
			border-left: {$responsive_submenu_left_border}px solid;
		} ";
	}
	if ( $responsive_submenu_border_color ) {
		$custom_css .= ".menu li:hover > ul {
			border-color: {$responsive_submenu_border_color};
		} ";
	}
	if ( $responsive_submenu_divider_color ) {
		$custom_css .= ".menu li li {
			border-bottom-color: {$responsive_submenu_divider_color};
		} ";
	}
	if ( 0 === $responsive_submenu_divider ) {

		$custom_css .= '.menu li li {
			border-bottom: none;
		} ';
	}
	if ( $responsive_submenu_color ) {
		$custom_css .= ".menu li li {
			background-color: {$responsive_submenu_color};
			background-image: none;
		} ";
	}
	$header_tablet_padding = (int) $header_tablet_padding_right + (int) $header_tablet_padding_left;
	$header_mobile_padding = (int) $header_mobile_padding_right + (int) $header_mobile_padding_left;

	if ( 'in_header' === $header_menu_position ) {
		$custom_css .= "@media screen and (max-width: {$mobile_menu_breakpoint}px){
		.header-logo-right#header .responsive-header,
		.header-logo-left#header .responsive-header {
				display: flex;
			}
		.js .header-logo-right#header .main-nav {
			margin:auto;
			text-align: left;
			background-image: none;
		    background-color: transparent;
		}
		.js .header-logo-left#header .main-nav{
			margin:auto;
			text-align: right;
		    background-image: none;
		    background-color: transparent;
		}
		.js .header-logo-right#header .main-nav .menu{
			min-width:calc(200% + {$header_tablet_padding}px);
			right: calc(-100% - {$header_tablet_padding}px/2);
		}
		.js .header-logo-left#header .main-nav .menu{
			min-width:calc(200% + {$header_tablet_padding}px);
			left: calc(-100% - {$header_tablet_padding}px/2);
		}
		.js .header-logo-left#header .main-nav a#responsive_menu_button {
			margin-right:0;
		}
		.js .header-logo-right#header .main-nav a#responsive_menu_button {
			margin-left:0;
		}
		@media screen and (max-width: 480px){
				.js .header-logo-right#header .main-nav .menu{
				min-width:calc(200% + {$header_mobile_padding}px);
				right: calc(-100% - {$header_mobile_padding}px/2);
			}
			.js .header-logo-left#header .main-nav .menu{
				min-width:calc(200% + {$header_mobile_padding}px);
				left: calc(-100% - {$header_mobile_padding}px/2);
			}
		}";

	}

	$container_padding_left  = $container_padding_left ? $container_padding_left : 0;
	$container_padding_right = $container_padding_right ? $container_padding_right : 0;

	$custom_css .= "@media screen and (max-width:1024px) {
		body:not(.fullwidth-stretched) .grid.col-940:not(.blog-2-col):not(.blog-3-col):not(.blog-4-col) .alignwide,
		body.blog:not(.fullwidth-stretched) .grid.col-940 #main-blog > *.post .post-entry .alignwide {
			padding-left: calc(({$container_padding_left}px/2 + 10px));
			padding-right: calc(({$container_padding_right}px/2 + 10px));
		}
	}";

	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', $custom_css ) );
}

add_action( 'wp_enqueue_scripts', 'responsive_premium_custom_color_styles', 99 );
