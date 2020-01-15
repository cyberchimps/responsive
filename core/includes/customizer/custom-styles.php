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

	// Site custom styles.
	$responsive_width = get_theme_mod( 'responsive_width', '' );
	if ( 'contained' === $responsive_width ) {
		$container_max_width  = get_theme_mod( 'responsive_container_width', 1140 );
		$box_background_color = get_theme_mod( 'responsive_box_background_color', '#ffffff' );

		$custom_css .= "
		.container,
		.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper {
			max-width: {$container_max_width}px;
		}
		";
	}

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
		    color: ' . get_theme_mod( "responsive_h{$i}_text_color", "#333333" ) . ';
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
	$header_menu_border_color     = get_theme_mod( 'responsive_header_menu_border_color', '#FFFFFF' );
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
	$mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_menu_breakpoint', 992 );
	$mobile_menu_style      = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );

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

	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', $custom_css ) );
}

add_action( 'wp_enqueue_scripts', 'responsive_premium_custom_color_styles', 99 );
