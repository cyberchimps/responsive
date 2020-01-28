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

	$custom_css = '';

	// Box Padding.
	$box_padding_right  = get_theme_mod( 'responsive_box_right_padding', 30 );
	$box_padding_left   = get_theme_mod( 'responsive_box_left_padding', 30 );
	$box_padding_top    = get_theme_mod( 'responsive_box_top_padding', 30 );
	$box_padding_bottom = get_theme_mod( 'responsive_box_bottom_padding', 30 );

	$box_tablet_padding_right  = get_theme_mod( 'responsive_box_tablet_right_padding', 30 );
	$box_tablet_padding_left   = get_theme_mod( 'responsive_box_tablet_left_padding', 30 );
	$box_tablet_padding_top    = get_theme_mod( 'responsive_box_tablet_top_padding', 30 );
	$box_tablet_padding_bottom = get_theme_mod( 'responsive_box_tablet_bottom_padding', 30 );

	$box_mobile_padding_right  = get_theme_mod( 'responsive_box_mobile_right_padding', 30 );
	$box_mobile_padding_left   = get_theme_mod( 'responsive_box_mobile_left_padding', 30 );
	$box_mobile_padding_top    = get_theme_mod( 'responsive_box_mobile_top_padding', 30 );
	$box_mobile_padding_bottom = get_theme_mod( 'responsive_box_mobile_bottom_padding', 30 );

	// Box Radius.
	$box_radius = get_theme_mod( 'responsive_box_radius', 0 );

	// Site custom styles.

	$container_max_width  = get_theme_mod( 'responsive_container_width', 1140 );
	$box_background_color = get_theme_mod( 'responsive_box_background_color', '#ffffff' );

	$custom_css .= "
	.container,
	.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper {
		max-width: {$container_max_width}px;
	}
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
	.responsive-site-style-content-boxed .hentry,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-boxed .custom-home-about-section,
	.responsive-site-style-boxed .custom-home-feature-section,
	.responsive-site-style-boxed .custom-home-team-section,
	.responsive-site-style-boxed .custom-home-testimonial-section,
	.responsive-site-style-boxed .custom-home-contact-section,
	.responsive-site-style-boxed .custom-home-widget-section,
	.responsive-site-style-boxed .custom-home-featured-area,
	.responsive-site-style-boxed .site-content-header,
	.responsive-site-style-boxed .hentry,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .comments-area,
	.responsive-site-style-boxed .widget-wrapper {
		background-color:{$box_background_color};
		border-radius:{$box_radius}px;
	}
	";

	$custom_css .= '.responsive-site-style-content-boxed .hentry,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .site-content-header,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-boxed .hentry,
	.responsive-site-style-boxed .site-content-header,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .comments-area,
	.blog.front-page.responsive-site-style-flat .widget-wrapper,
	.responsive-site-style-boxed .widget-wrapper {
	    padding: ' . responsive_spacing_css( $box_padding_top, $box_padding_right, $box_padding_bottom, $box_padding_left ) . ';
	}

	@media screen and ( max-width: 992px ) {
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .site-content-header,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-boxed .site-content-header,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .comments-area,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper {
		    padding: ' . responsive_spacing_css( $box_tablet_padding_top, $box_tablet_padding_right, $box_tablet_padding_bottom, $box_tablet_padding_left ) . ';
		}
	}

	@media screen and ( max-width: 576px ) {
		.responsive-site-style-content-boxed .site-content-header,
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-boxed .site-content-header,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .comments-area,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper {
			padding: ' . responsive_spacing_css( $box_mobile_padding_top, $box_mobile_padding_right, $box_mobile_padding_bottom, $box_mobile_padding_left ) . ';
		}
	}';

	$body_text_color      = get_theme_mod( 'responsive_body_text_color', '#333333' );
	$background_color     = get_theme_mod( 'responsive_background_color', '#eaeaea' );
	$meta_text_color      = get_theme_mod( 'responsive_meta_text_color', '#999999' );
	$box_background_color = get_theme_mod( 'responsive_box_background_color', '#ffffff' );

	$link_color       = get_theme_mod( 'responsive_link_color', '#0066CC' );
	$link_hover_color = get_theme_mod( 'responsive_link_hover_color', '#10659C' );

	$button_color            = get_theme_mod( 'responsive_button_color', '#0066CC' );
	$button_hover_color      = get_theme_mod( 'responsive_button_hover_color', '#10659C' );
	$button_text_color       = get_theme_mod( 'responsive_button_text_color', '#FFFFFF' );
	$button_hover_text_color = get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' );

	$custom_css .= "
	body {
		color:{$body_text_color};
		background-color:{$background_color};
	}
	.meta {
	    color:{$meta_text_color};
	}
	a {
		color:{$link_color};
	}
	a:hover {
		color:{$link_hover_color};
	}
	button, .button {
	    color:{$button_text_color};
		background-color:{$button_color};
	}
	button:hover, .button:hover {
	    color:{$button_hover_text_color};
		background-color:{$button_hover_color};
	}";

	for ( $i = 1; $i < 7; $i++ ) {
		$custom_css .= 'h' . $i . ' {
		    color: ' . get_theme_mod( "responsive_h{$i}_text_color", '#333333' ) . ';
		}';
	}

	// Header Padding.
	$header_padding_right  = get_theme_mod( 'responsive_header_right_padding' );
	$header_padding_left   = get_theme_mod( 'responsive_header_left_padding' );
	$header_padding_top    = get_theme_mod( 'responsive_header_top_padding', 28 );
	$header_padding_bottom = get_theme_mod( 'responsive_header_bottom_padding', 28 );

	$header_tablet_padding_right  = get_theme_mod( 'responsive_header_tablet_right_padding' );
	$header_tablet_padding_left   = get_theme_mod( 'responsive_header_tablet_left_padding' );
	$header_tablet_padding_top    = get_theme_mod( 'responsive_header_tablet_top_padding', 28 );
	$header_tablet_padding_bottom = get_theme_mod( 'responsive_header_tablet_bottom_padding', 28 );

	$header_mobile_padding_right  = get_theme_mod( 'responsive_header_mobile_right_padding' );
	$header_mobile_padding_left   = get_theme_mod( 'responsive_header_mobile_left_padding' );
	$header_mobile_padding_top    = get_theme_mod( 'responsive_header_mobile_top_padding', 28 );
	$header_mobile_padding_bottom = get_theme_mod( 'responsive_header_mobile_bottom_padding', 28 );

	// Header colors.
	$header_background_color       = get_theme_mod( 'responsive_header_background_color', '#ffffff' );
	$header_border_color           = get_theme_mod( 'responsive_header_border_color', '#eaeaea' );
	$header_site_title_color       = get_theme_mod( 'responsive_header_site_title_color', '#333333' );
	$header_site_title_hover_color = get_theme_mod( 'responsive_header_site_title_hover_color', '#10659C' );
	$header_text_color             = get_theme_mod( 'responsive_header_text_color', '#999999' );

	// Menu Color.
	$header_menu_background_color = get_theme_mod( 'responsive_header_menu_background_color', '#FFFFFF' );
	$header_menu_border_color     = get_theme_mod( 'responsive_header_menu_border_color', '#eaeaea' );
	$header_menu_link_color       = get_theme_mod( 'responsive_header_menu_link_color', '#10659C' );
	$header_menu_link_hover_color = get_theme_mod( 'responsive_header_menu_link_hover_color', '#eaeaea' );

	// Sub Menu Color.
	$header_sub_menu_background_color = get_theme_mod( 'responsive_header_sub_menu_background_color', '#FFFFFF' );
	$header_sub_menu_link_color       = get_theme_mod( 'responsive_header_sub_menu_link_color', '#333333' );
	$header_sub_menu_link_hover_color = get_theme_mod( 'responsive_header_sub_menu_link_hover_color', '#10659C' );

	// Toggle Button Color.
	$header_menu_toggle_background_color = get_theme_mod( 'responsive_header_menu_toggle_background_color', 'transparent' );
	$header_menu_toggle_color            = get_theme_mod( 'responsive_header_menu_toggle_color', '#333333' );

	// Mobile Menu.
	$mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
	// Mobile Menu Breakpoint.
	$disable_mobile_menu    = get_theme_mod( 'responsive_disable_mobile_menu', 1 );
	$mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_menu_breakpoint', 992 );

	if ( 0 === $disable_mobile_menu ) {
		$mobile_menu_breakpoint = 0;
	}

	$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
		.main-navigation .menu-toggle {
			display: none;
		}
		.main-navigation .menu {
			display: block;
		}
		.main-navigation .menu > li {
		    border-bottom: none;
		    float: left;
		    margin-left: 30px;
		}
		.main-navigation .menu > li.menu-item-has-children > a:after, .main-navigation .menu > li.page_item_has_children > a:after {
			content: '\f0d7';
			font-family: Fontawesome;
			margin-left: 5px;
		}
		.main-navigation .children,
		.main-navigation .sub-menu {
		    background-color: #ffffff;
		    box-shadow: 0 5px 10px #eaeaea;
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
	  	.main-navigation .children > li.menu-item-has-children > a:after, .main-navigation .children > li.page_item_has_children > a:after,
		.main-navigation .sub-menu > li.menu-item-has-children > a:after,
		.main-navigation .sub-menu > li.page_item_has_children > a:after {
		    content: '\f0da';
		    float: right;
		    font-family: Fontawesome;
		    margin-left: 5px;
	  	}
	  	.main-navigation .children a,
		.main-navigation .sub-menu a {
	    	padding: 5px 15px;
	  	}
	  	.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu > li {
		    margin-left: 0;
		    margin-right: 30px;
		}
	  	.site-header-layout-vertical .site-header .row {
	    	flex-direction: column;
	  	}
	  	.site-header-layout-vertical .main-navigation .menu > li {
		    margin-left: 0;
		    margin-right: 30px;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu {
		    display: table;
		    margin-left: auto;
		    margin-right: auto;
		    width: auto;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-center .main-navigation .menu > li {
		    margin-left: 15px;
		    margin-right: 15px;
		}
	  	.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu {
		    display: table;
		    margin-right: 0;
		    margin-left: auto;
	  	}
	  	.site-header-layout-vertical.site-header-alignment-right .main-navigation .menu > li {
		    margin-left: 15px;
		    margin-right: 0;
	  	}
	  	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation {
		    margin-left: calc( 50% - 50vw );
		    margin-right: calc( 50% - 50vw );
		    max-width: 100vw;
		    width: 100vw;
	  	}
	}
  	@media screen and ( max-width: {$mobile_menu_breakpoint}px ) {
		.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_tablet_padding_bottom}px;
		}
		.site-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_tablet_padding_top}px;
		}
	}
	@media screen and ( max-width: 576px ) {
		.site-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_mobile_padding_bottom}px;
		}
		.site-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_mobile_padding_top}px;
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
	.site-header-layout-vertical .main-navigation {
		background-color: {$header_menu_background_color};
	}
	.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation{
		border-top-color:{$header_menu_border_color};
	}
	.site-header-layout-vertical.site-header-main-navigation-site-branding .main-navigation{
		border-bottom-color:{$header_menu_border_color};
	}
	.main-navigation .menu > li > a {
		color: {$header_menu_link_color};
	}
	.main-navigation .menu > li > a:hover {
		color: {$header_menu_link_hover_color};
	}
	.main-navigation .children,
	.main-navigation .sub-menu {
		background-color: {$header_sub_menu_background_color};
	}
	.main-navigation .children li a,
	.main-navigation .sub-menu li a {
		color: {$header_sub_menu_link_color};
	}
	.main-navigation .children li a:hover,
	.main-navigation .sub-menu li a:hover {
		color: {$header_sub_menu_link_hover_color};
	}
	.main-navigation .menu-toggle {
		background-color: {$header_menu_toggle_background_color};
		color: {$header_menu_toggle_color};
	}";

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

	if ( 'fullscreen' === $mobile_menu_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.main-navigation.toggled {
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 50px;
				position: fixed;
				top: 0;
				width: 100%;
			    z-index: 100000;
			}
			.main-navigation .menu > li > a{
				font-weight: bold;
			}
			.main-navigation.toggled .menu {
				margin-top: 45px;
			    margin: 0 auto;
			}
			.site-header-layout-vertical .main-navigation.toggled .menu {
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
			    background-color: white;
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 15px;
				position: fixed;
				top: 0;
				width: 300px;
			    z-index: 100000;
			}
			.main-navigation .menu > li > a {
				font-weight: bold;
			}
			.main-navigation.toggled .menu {
				margin-top: 45px;
			}
			.site-header-alignment-right .main-navigation.toggled {
				left: auto;
				right: 0;
			}
			.site-header-layout-vertical.site-header-alignment-left .main-navigation.toggled .menu-toggle {
				text-align: right;
			}
			.site-header-layout-vertical.site-header-alignment-right .main-navigation.toggled .menu-toggle {
				text-align: left;
			}
			.site-header-layout-vertical .main-navigation.toggled .menu {
				margin-top: 0px;
			}

		}";

	}

	// Content_Header colors.
	$content_header_heading_color     = get_theme_mod( 'responsive_content_header_heading_color', '#333333' );
	$content_header_description_color = get_theme_mod( 'responsive_content_header_description_color', '#333333' );
	$breadcrumb_color                 = get_theme_mod( 'responsive_breadcrumb_color', '#999999' );

	$custom_css .= "
	.site-content-header .page-title {
		color: {$content_header_heading_color};
	}
	.site-content-header .page-description {
		color: {$content_header_description_color};
	}
	.site-content-header .breadcrumb-list,
	.site-content-header .breadcrumb-list a {
		color: {$breadcrumb_color};
	}";

	// Entry Blog Styles.
	$blog_content_width = get_theme_mod( 'responsive_blog_content_width', 66 );

	$custom_css .= "
	@media (min-width:992px) {
		.search .content-area,
		.archive .content-area,
		.blog .content-area {
			width:{$blog_content_width}%;
		}
		.search aside.widget-area,
		.archive aside.widget-area,
		.blog aside.widget-area {
			width: calc(100% - {$blog_content_width}%);
		}
	}";

	// Entry Blog featured image.
	$blog_entry_featured_image_style = get_theme_mod( 'responsive_blog_entry_featured_image_style', 'default' );

	if ( 'stretched' === $blog_entry_featured_image_style ) {
		$custom_css .= "
		.search .thumbnail-caption,
		.archive .thumbnail-caption,
		.blog .thumbnail-caption {
			text-align: center;
		}
		.search.responsive-site-style-content-boxed .hentry .thumbnail,
		.search.responsive-site-style-boxed .hentry .thumbnail,
		.archive.responsive-site-style-content-boxed .hentry .thumbnail,
		.archive.responsive-site-style-boxed .hentry .thumbnail,
		.blog.responsive-site-style-content-boxed .hentry .thumbnail,
		.blog.responsive-site-style-boxed .hentry .thumbnail {
			margin-left: -{$box_padding_left}px;
			margin-right: -{$box_padding_right}px;
		}
		.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
		.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,
		.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,
		.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child {
			margin-top: -{$box_padding_top}px;
		}
		@media (max-width:992px) {
			.search.responsive-site-style-content-boxed .hentry .thumbnail,
			.search.responsive-site-style-boxed .hentry .thumbnail,
			.archive.responsive-site-style-content-boxed .hentry .thumbnail,
			.archive.responsive-site-style-boxed .hentry .thumbnail,
			.blog.responsive-site-style-content-boxed .hentry .thumbnail,
			.blog.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_tablet_padding_left}px;
				margin-right: -{$box_tablet_padding_right}px;
			}
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
			.search.responsive-site-style-content-boxed .hentry .thumbnail,
			.search.responsive-site-style-boxed .hentry .thumbnail,
			.archive.responsive-site-style-content-boxed .hentry .thumbnail,
			.archive.responsive-site-style-boxed .hentry .thumbnail,
			.blog.responsive-site-style-content-boxed .hentry .thumbnail,
			.blog.responsive-site-style-boxed .hentry .thumbnail {
				margin-left: -{$box_mobile_padding_left}px;
				margin-right: -{$box_mobile_padding_right}px;
			}
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
	if ( $single_post_background_color ) {
		$custom_css .= ".single.single-fullwidth-content #primary,.single.single-fullwidth-stretched #primary,body.single #primary, body.single.single-content-boxed #primary, body.single.single-boxed #primary {background-color: {$single_post_background_color};}";

	// Entry Blog Meta Separator.
	$blog_entry_meta_separator = get_theme_mod( 'responsive_blog_entry_meta_separator_text', '-' );

	$custom_css .= "
	.search .hentry .post-meta > span::after,
	.archive .hentry .post-meta > span::after,
	.blog .hentry .post-meta > span::after {
	    content: '{$blog_entry_meta_separator}';
	}";

	// Single Blog Styles.
	$single_blog_content_width = get_theme_mod( 'responsive_single_blog_content_width', 66 );

	$custom_css .= "
	@media (min-width:992px) {
		.single .content-area {
			width:{$single_blog_content_width}%;
		}
		.single aside.widget-area {
			width: calc(100% - {$single_blog_content_width}%);
		}
	}";

	// Single Blog featured image.
	$single_blog_entry_featured_image_style = get_theme_mod( 'responsive_single_blog_featured_image_style', 'default' );

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

	// Entry Blog Meta Separator.
	$single_blog_entry_meta_separator = get_theme_mod( 'responsive_single_blog_meta_separator_text', '-' );

	$custom_css .= "
	.single .hentry .post-meta > span::after {
	    content: '{$single_blog_entry_meta_separator}';
	}";

	// Page Styles.
	$page_content_width = get_theme_mod( 'responsive_page_content_width', 66 );

	$custom_css .= "
	@media (min-width:992px) {
		.page:not(.page-template-gutenberg-fullwidth) .content-area {
			width:{$page_content_width}%;
		}
		.page aside.widget-area {
			width: calc(100% - {$page_content_width}%);
		}
	}";

	// Page featured image.
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

	// Header Widgets Color.
	$header_widget_text_color       = get_theme_mod( 'responsive_header_widget_text_color', '#333333' );
	$header_widget_background_color = get_theme_mod( 'responsive_header_widget_background_color', '#FFFFFF' );
	$header_widget_border_color     = get_theme_mod( 'responsive_header_widget_border_color', '#eaeaea' );
	$header_widget_link_color       = get_theme_mod( 'responsive_header_widget_link_color', '#0066CC' );
	$header_widget_link_hover_color = get_theme_mod( 'responsive_header_widget_link_hover_color', '#eaeaea' );

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

	// footer_widgets Padding.
	$footer_widgets_padding_right  = get_theme_mod( 'responsive_footer_widgets_right_padding', 0 );
	$footer_widgets_padding_left   = get_theme_mod( 'responsive_footer_widgets_left_padding', 0 );
	$footer_widgets_padding_top    = get_theme_mod( 'responsive_footer_widgets_top_padding', 60 );
	$footer_widgets_padding_bottom = get_theme_mod( 'responsive_footer_widgets_bottom_padding', 60 );

	$footer_widgets_tablet_padding_right  = get_theme_mod( 'responsive_footer_widgets_tablet_right_padding', 0 );
	$footer_widgets_tablet_padding_left   = get_theme_mod( 'responsive_footer_widgets_tablet_left_padding', 0 );
	$footer_widgets_tablet_padding_top    = get_theme_mod( 'responsive_footer_widgets_tablet_top_padding', 60 );
	$footer_widgets_tablet_padding_bottom = get_theme_mod( 'responsive_footer_widgets_tablet_bottom_padding', 60 );

	$footer_widgets_mobile_padding_right  = get_theme_mod( 'responsive_footer_widgets_mobile_right_padding', 0 );
	$footer_widgets_mobile_padding_left   = get_theme_mod( 'responsive_footer_widgets_mobile_left_padding', 0 );
	$footer_widgets_mobile_padding_top    = get_theme_mod( 'responsive_footer_widgets_mobile_top_padding', 60 );
	$footer_widgets_mobile_padding_bottom = get_theme_mod( 'responsive_footer_widgets_mobile_bottom_padding', 60 );

	$custom_css .= '.footer-widgets {
	    padding: ' . responsive_spacing_css( $footer_widgets_padding_top, $footer_widgets_padding_right, $footer_widgets_padding_bottom, $footer_widgets_padding_left ) . ';

	}
	@media screen and ( max-width: 992px ) {
	    .footer-widgets {
	        padding: ' . responsive_spacing_css( $footer_widgets_tablet_padding_top, $footer_widgets_tablet_padding_right, $footer_widgets_tablet_padding_bottom, $footer_widgets_tablet_padding_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .footer-widgets {
	        padding: ' . responsive_spacing_css( $footer_widgets_mobile_padding_top, $footer_widgets_mobile_padding_right, $footer_widgets_mobile_padding_bottom, $footer_widgets_mobile_padding_left ) . ';
	    }
	}';

	// footer_bar Padding.
	$footer_bar_padding_right  = get_theme_mod( 'responsive_footer_bar_right_padding', 0 );
	$footer_bar_padding_left   = get_theme_mod( 'responsive_footer_bar_left_padding', 0 );
	$footer_bar_padding_top    = get_theme_mod( 'responsive_footer_bar_top_padding', 60 );
	$footer_bar_padding_bottom = get_theme_mod( 'responsive_footer_bar_bottom_padding', 60 );

	$footer_bar_tablet_padding_right  = get_theme_mod( 'responsive_footer_bar_tablet_right_padding', 0 );
	$footer_bar_tablet_padding_left   = get_theme_mod( 'responsive_footer_bar_tablet_left_padding', 0 );
	$footer_bar_tablet_padding_top    = get_theme_mod( 'responsive_footer_bar_tablet_top_padding', 60 );
	$footer_bar_tablet_padding_bottom = get_theme_mod( 'responsive_footer_bar_tablet_bottom_padding', 60 );

	$footer_bar_mobile_padding_right  = get_theme_mod( 'responsive_footer_bar_mobile_right_padding', 0 );
	$footer_bar_mobile_padding_left   = get_theme_mod( 'responsive_footer_bar_mobile_left_padding', 0 );
	$footer_bar_mobile_padding_top    = get_theme_mod( 'responsive_footer_bar_mobile_top_padding', 60 );
	$footer_bar_mobile_padding_bottom = get_theme_mod( 'responsive_footer_bar_mobile_bottom_padding', 60 );

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
	$footer_text_color       = get_theme_mod( 'responsive_footer_text_color', '#ffffff' );
	$footer_background_color = get_theme_mod( 'responsive_footer_background_color', '#333333' );
	$footer_link_color       = get_theme_mod( 'responsive_footer_links_color', '#eaeaea' );
	$footer_link_hover_color = get_theme_mod( 'responsive_footer_links_hover_color', '#ffffff' );

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
	";
	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', $custom_css ) );
}

add_action( 'wp_enqueue_scripts', 'responsive_premium_custom_color_styles', 99 );
