<?php

use function Responsive\Core\responsive_prepare_css_value;

	add_action( 'wp_head', function() 
	{

		// Bail if local fonts or preload are not enabled
		if ( 1 !== (int) get_theme_mod( 'responsive_load_google_fonts_locally', 0 ) ) {
			return;
		}
		if ( 1 !== (int) get_theme_mod( 'responsive_preload_local_fonts', 0 ) ) {
			return;
		}

		// Make sure the class exists
		if ( ! class_exists( 'Responsive_Local_Fonts' ) ) {
			return;
		}

		if ( class_exists('Responsive_Local_Fonts') ) {
			Responsive_Local_Fonts::preload_all_fonts();
		}

	}, 20 );

if ( ! function_exists( 'is_responsive_version_greater' ) ) {
	/**
	 * Verify if the version of specified products is greater or not.
	 *
	 * @since 4.9.7
	 */
	function is_responsive_version_greater() {
		$theme                    = wp_get_theme( 'responsive' );
		$is_theme_version_greater = false;
		if ( version_compare( $theme['Version'], '4.9.6', '>' ) ) {
			$is_theme_version_greater = true;
		}
		return $is_theme_version_greater;
	}
}

/* To convert font size units */
if ( ! function_exists( 'typography_unit_conversion' ) ) {
	function typography_unit_conversion($font_size,$parent_font_size = 0,$root_font_size = 0)
	{
		if ( false !== strpos( $font_size, 'px' ) ) {
			$font_size = str_replace( 'px', '', $font_size );
		} else if ( false !== strpos( $font_size, 'rem' ) ) {
			$font_size = str_replace( 'rem', '', $font_size );
			$font_size = $font_size * $root_font_size;
			
		} else if ( false !== strpos( $font_size, 'em' ) ) {
			$font_size = str_replace( "em", '', $font_size );
			$font_size = $font_size * $parent_font_size;

		} else if ( false !== strpos( $font_size, '%' ) ) {
			$font_size = str_replace( '%', '', $font_size );
			$font_size = ($font_size * $parent_font_size) / 100;
		}

		return $font_size;
	}
}

/**
 * Outputs the custom styles for the theme.
 *
 * @return void
 */
function responsive_customizer_styles() {
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

	$box_radius = esc_html( get_theme_mod( 'responsive_border_box', 0 ) );

	$box_top_left_radius     = esc_html( get_theme_mod( 'responsive_box_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_top_right_radius    = esc_html( get_theme_mod( 'responsive_box_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_bottom_right_radius = esc_html( get_theme_mod( 'responsive_box_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_box_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );

	$box_tablet_top_left_radius     = esc_html( get_theme_mod( 'responsive_box_tablet_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_tablet_top_right_radius    = esc_html( get_theme_mod( 'responsive_box_tablet_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_tablet_bottom_right_radius = esc_html( get_theme_mod( 'responsive_box_tablet_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_tablet_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_box_tablet_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );

	$box_mobile_top_left_radius     = esc_html( get_theme_mod( 'responsive_box_mobile_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_mobile_top_right_radius    = esc_html( get_theme_mod( 'responsive_box_mobile_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_mobile_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_box_mobile_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );
	$box_mobile_bottom_right_radius = esc_html( get_theme_mod( 'responsive_box_mobile_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_border_box' ) ) );

	// Paragraph Margin Bottom.
	$paragraph_margin_bottom = esc_html( get_theme_mod( 'responsive_paragraph_margin_bottom', '' ) );

	$underline_content_links = esc_html( get_theme_mod( 'responsive_underline_content_links', false ) );
	// Site custom styles.

	$container_max_width = esc_html( get_theme_mod( 'responsive_container_width', 1140 ) );
	$logo_custom_width   = esc_html( get_theme_mod( 'responsive_logo_width' ) );
	$logo_custom_width_tablet = esc_html( get_theme_mod( 'responsive_logo_width_tablet' ) );
	$logo_custom_width_mobile = esc_html( get_theme_mod( 'responsive_logo_width_mobile') );

	$global_sidebar_position = get_theme_mod( 'responsive_default_sidebar_position', 'no' );
	$page_sidebar_setting = get_theme_mod( 'responsive_page_sidebar_position', 'no' );
	$responsive_page_sidebar_position = esc_html( ($page_sidebar_setting === 'default') ? $global_sidebar_position : $page_sidebar_setting);
	if($page_sidebar_setting === 'default')
	{
		$responsive_page_sidebar_width = esc_html(get_theme_mod('responsive_default_sidebar_width', 30)); 
		$page_primary_content_area_width  = 100 - $responsive_page_sidebar_width;
	}
	else if( $page_sidebar_setting === 'left' || $page_sidebar_setting === 'right' )
	{
		$responsive_page_sidebar_width = esc_html(get_theme_mod('responsive_page_sidebar_width', 30)); 
		$page_primary_content_area_width  = 100 - $responsive_page_sidebar_width;
	}
	else 
	{
		$responsive_page_sidebar_width = 0; 
		$page_primary_content_area_width = 100;
	}

	$blog_sidebar_setting    = get_theme_mod( 'responsive_blog_sidebar_position', 'no' );

	$responsive_blog_archive_sidebar_position = esc_html(
		( $blog_sidebar_setting === 'default' ) ? $global_sidebar_position : $blog_sidebar_setting
	);

	if($blog_sidebar_setting === 'left' || $blog_sidebar_setting === 'right')
	{
		$responsive_blog_archive_sidebar_width    = esc_html( get_theme_mod( 'responsive_blog_sidebar_width', 30 ) );
		$blog_archive_primary_content_area_width  = 100 - $responsive_blog_archive_sidebar_width;
	}
	else if($blog_sidebar_setting === 'default')
	{
		$responsive_blog_archive_sidebar_width = esc_html( get_theme_mod( 'responsive_default_sidebar_width', 30) ); 
		$blog_archive_primary_content_area_width  = 100 - $responsive_blog_archive_sidebar_width;
	}
	else 
	{
		$responsive_blog_archive_sidebar_width = 0; 
		$blog_archive_primary_content_area_width  = 100;

	}

	$single_blog_sidebar_setting = get_theme_mod('responsive_single_blog_sidebar_position', 'no');

	$responsive_single_blog_sidebar_position = esc_html(
		( $single_blog_sidebar_setting === 'default' ) ? $global_sidebar_position : $single_blog_sidebar_setting 
	);

	if($single_blog_sidebar_setting === 'default')
	{
		$responsive_single_blog_sidebar_width = esc_html(get_theme_mod('responsive_default_sidebar_width', 30));
		$single_blog_primary_content_area_width  = 100 - $responsive_single_blog_sidebar_width;
	}
	else if($single_blog_sidebar_setting === 'left' || $single_blog_sidebar_setting === 'right' )
	{
		$responsive_single_blog_sidebar_width = esc_html(get_theme_mod('responsive_single_blog_sidebar_width', 30)); 
		$single_blog_primary_content_area_width  = 100 - $responsive_single_blog_sidebar_width;
	}
	else 
	{
		$responsive_single_blog_sidebar_width = 0; 
		$single_blog_primary_content_area_width = 100;
	}

	$box_background_color = esc_html( responsive_prepare_css_value( 'responsive_box_background_color' ) );
	$box_background_gradient_color = esc_html( get_theme_mod( 'responsive_box_background_gradient_color', Responsive\Core\get_responsive_customizer_defaults( 'background_gradient_color' ) ) );
	$box_background_color_type = get_theme_mod( 'responsive_box_background_color_type', 'color' );

	$alt_background_color  = esc_html( responsive_prepare_css_value( 'responsive_alt_background_color' ) );
	$site_background_color = esc_html( responsive_prepare_css_value( 'responsive_site_background_color' ) );
	$site_background_gradient_color = get_theme_mod( 'responsive_site_background_gradient_color' );
	$site_background_color_type = get_theme_mod( 'responsive_site_background_color_type', 'color' );

	// Detect the operating system and set the typical scrollbar width.
	$user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
	$scrollbar_widths = [
		'Win'     => '17px',
		'Mac'     => '0px',
		'Linux'   => '15px',
	];

	$scrollbar_width = '0';
	foreach ( $scrollbar_widths as $platform => $width ) {
		if ( strpos( $user_agent, $platform ) !== false ) {
			$scrollbar_width = $width;
			break;
		}
	}

	$custom_css .= '
		:root {
			--responsive-scrollbar-width: ' . $scrollbar_width . ';
		}
	';
	if ( 'gradient' === $box_background_color_type && ! empty( $box_background_gradient_color ) ) {
		$custom_css .= "
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
		.responsive-site-style-boxed .site-content article.product,
		.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
		.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
		.woocommerce.single-product:not(.responsive-site-style-flat) div.product,
		.elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap {
			background: " . esc_attr( $box_background_gradient_color ) . ";
			border-radius: {$box_top_left_radius}px {$box_top_right_radius}px {$box_bottom_right_radius}px {$box_bottom_left_radius}px;
		}
		";
	} elseif ( 'color' === $box_background_color_type && ! empty( $box_background_color ) ) {
		$custom_css .= "
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
		.responsive-site-style-boxed .site-content article.product,
		.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,
		.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce.responsive-site-style-content-boxed .products-wrapper,
		.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,
		.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,
		.woocommerce.single-product:not(.responsive-site-style-flat) div.product, .elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap {
			background-color: " . esc_attr( $box_background_color ) . ";
			border-radius: {$box_top_left_radius}px {$box_top_right_radius}px {$box_bottom_right_radius}px {$box_bottom_left_radius}px;
			background: '';
		}
		";
	}
	$custom_css .= "
	.container,
	[class*='__inner-container'],
	.site-header-full-width-main-navigation.site-mobile-header-layout-vertical:not(.responsive-site-full-width) .main-navigation-wrapper {
		max-width: {$container_max_width}px;
	}
	
	@media screen and ( max-width: 992px ) {
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
		.responsive-site-style-content-boxed .responsive-single-related-posts-container,
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
		.responsive-site-style-boxed .responsive-single-related-posts-container,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.responsive-site-style-boxed .comment-respond,
		.responsive-site-style-boxed aside#secondary .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product {
			border-radius:{$box_tablet_top_left_radius}px {$box_tablet_top_right_radius}px {$box_tablet_bottom_right_radius}px {$box_tablet_bottom_left_radius}px;
		}
	}
	@media screen and ( max-width: 576px ) {
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
		.responsive-site-style-content-boxed .responsive-single-related-posts-container,
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
		.responsive-site-style-boxed .responsive-single-related-posts-container,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.responsive-site-style-boxed .comment-respond,
		.responsive-site-style-boxed aside#secondary .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product {
			border-radius:{$box_mobile_top_left_radius}px {$box_mobile_top_right_radius}px {$box_mobile_bottom_right_radius}px {$box_mobile_bottom_left_radius}px;
		}
	}
	address, blockquote, pre, code, kbd, tt, var {
		background-color:{$alt_background_color};
	}
	p, .entry-content p {
		margin-bottom:{$paragraph_margin_bottom}em;
	}
	";

	if ( $underline_content_links === '1' || $underline_content_links === true ) {
		$custom_css .= '
			.entry-content a:not(li > a),
			.comment-content a:not(.comment-edit-link):not(li > a),
			.woocommerce div.product .woocommerce-product-details__short-description a:not(li > a) {
				text-decoration: underline;
			}
			.woocommerce-MyAccount-content a {
				text-decoration: unset !important;
			}
		';
	} else {
		$custom_css .= '
			.entry-content a:not(li > a),
			.comment-content a:not(.comment-edit-link):not(li > a),
			.woocommerce div.product .woocommerce-product-details__short-description a:not(li > a) {
				text-decoration: unset;
			}
		';
	}
	
	$custom_css .= '.responsive-site-style-content-boxed .hentry,
	.responsive-site-style-content-boxed .give-wrap .give_forms,
	.responsive-site-style-content-boxed .navigation,
	.responsive-site-style-content-boxed .responsive-single-related-posts-container,
	.responsive-site-style-content-boxed .comments-area,
	.responsive-site-style-content-boxed .comment-respond,
	.responsive-site-style-boxed .give-wrap .give_forms,
	.responsive-site-style-boxed .hentry,
	.responsive-site-style-boxed .navigation,
	.responsive-site-style-boxed .responsive-single-related-posts-container,
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
		.responsive-site-style-content-boxed .responsive-single-related-posts-container,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-content-boxed .comment-respond,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .give-wrap .give_forms,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .responsive-single-related-posts-container,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.page.front-page.responsive-site-style-flat .widget-wrapper,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product,
		{
		    padding: ' . responsive_spacing_css( $box_tablet_padding_top, $box_tablet_padding_right, $box_tablet_padding_bottom, $box_tablet_padding_left ) . ';
		}
	}

	@media screen and ( max-width: 576px ) {
		.responsive-site-style-content-boxed .give-wrap .give_forms,
		.responsive-site-style-content-boxed .hentry,
		.responsive-site-style-content-boxed .navigation,
		.responsive-site-style-content-boxed .responsive-single-related-posts-container,
		.responsive-site-style-content-boxed .comments-area,
		.responsive-site-style-content-boxed .comment-respond,
		.responsive-site-style-boxed .hentry,
		.responsive-site-style-boxed .give-wrap .give_forms,
		.responsive-site-style-boxed .navigation,
		.responsive-site-style-boxed .responsive-single-related-posts-container,
		.responsive-site-style-boxed .comments-area,
		.responsive-site-style-boxed .comment-respond,
		.page.front-page.responsive-site-style-flat .widget-wrapper,
		.blog.front-page.responsive-site-style-flat .widget-wrapper,
		.responsive-site-style-boxed .widget-wrapper,
		.responsive-site-style-boxed .site-content article.product,
		{
			padding: ' . responsive_spacing_css( $box_mobile_padding_top, $box_mobile_padding_right, $box_mobile_padding_bottom, $box_mobile_padding_left ) . ';
		}
	}';
	if ( $logo_custom_width ) {
		$custom_css .= ".site-header .custom-logo {
			width: {$logo_custom_width}px;
		}";
	}

	if( $logo_custom_width_tablet ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.site-header .custom-logo {
				width: {$logo_custom_width_tablet}px;
			}
		}";
	}

	if( $logo_custom_width_mobile ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.site-header .custom-logo {
				width: {$logo_custom_width_mobile}px;
			}
		}";
	}

	if ( $responsive_page_sidebar_position !== 'no' ) {
		$custom_css .= "
		@media screen and ( min-width: 992px ) {
			.page aside.widget-area:not(.home-widgets)#secondary{
				width: {$responsive_page_sidebar_width}%;
			}
			.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page)  #primary.content-area {
				width: {$page_primary_content_area_width}%;
			}
		}
		@media screen and ( max-width: 991px ) {
			.page aside.widget-area:not(.home-widgets)#secondary{
				width: 100%;
			}
		}";
	}
	if ( $responsive_blog_archive_sidebar_position !== 'no' ) {
		$custom_css .= "
		@media screen and ( min-width: 992px ) {
			.archive:not(.post-type-archive-product) aside.widget-area#secondary,
			.blog:not(.custom-home-page-active) aside.widget-area#secondary{
				width: {$responsive_blog_archive_sidebar_width}%;
			}
			.archive:not(.post-type-archive-product):not(.post-type-archive-course) #primary.content-area,
			.blog:not(.custom-home-page-active) #primary.content-area{
				width: {$blog_archive_primary_content_area_width}%;
			}
		}
		@media screen and ( max-width: 991px ) {
			.archive:not(.post-type-archive-product) aside.widget-area#secondary,
			.blog:not(.custom-home-page-active) aside.widget-area#secondary{
				width: 100%;
			}
		}";
	}
	if ( $responsive_single_blog_sidebar_position !== 'no' ) {
		$custom_css .= "
		@media screen and ( min-width: 992px ) {
			.single:not(.single-product) aside.widget-area#secondary{
				width: {$responsive_single_blog_sidebar_width}%;
			}
			.single:not(.single-product) #primary.content-area {
				width: {$single_blog_primary_content_area_width}%;
			}
		}
		@media screen and ( max-width: 991px ) {
			.single:not(.single-product) aside.widget-area#secondary{
				width: 100%;
			}
		}";
	}

	if ( is_responsive_version_greater() ) {
		$site_background_image                      = get_theme_mod( 'responsive_site_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_site_background_image' ) ) : null ;
		$footer_background_image                    = get_theme_mod( 'responsive_footer_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_footer_background_image' ) ) : null ;
		$header_background_image                    = get_theme_mod( 'responsive_header_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_header_background_image' ) ) : null ;
		$header_widget_background_image             = get_theme_mod( 'responsive_header_widget_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_header_widget_background_image' ) ) : null ;
		$transparent_header_widget_background_image = get_theme_mod( 'responsive_transparent_header_widget_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_transparent_header_widget_background_image' ) ) : null ;
		$sidebar_background_image                   = get_theme_mod( 'responsive_sidebar_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_sidebar_background_image' ) ) : null ;
		$box_background_image                       = get_theme_mod( 'responsive_box_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_box_background_image' ) ) : null ;
		$button_background_image                    = get_theme_mod( 'responsive_button_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_button_background_image' ) ) : null ;
		$inputs_background_image                    = get_theme_mod( 'responsive_inputs_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_inputs_background_image' ) ) : null ;

		if ( $box_background_image ) {
			if ( class_exists( 'Sensei_Main' ) ) {
				$custom_css .= '
				.responsive-site-style-content-boxed .sensei-pagination,
				.responsive-site-style-content-boxed.single-course nav.post-entries.fix,
				.responsive-site-style-boxed .sensei-pagination,
				.responsive-site-style-boxed.single-course nav.post-entries.fix,';
			}

				$custom_css .= ".page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,
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
				background-image: linear-gradient(to right, {$box_background_color}, {$box_background_color}), url({$box_background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
		}
	}

	$sensei_button = '';
	if ( class_exists( 'Sensei_Main' ) ) {

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
	}

	if ( is_responsive_version_greater() ) {
		$button_background_color = esc_html( responsive_prepare_css_value( 'responsive_button_color' ) );
		if ( $button_background_image ) {
			$custom_css .= $sensei_button . "
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
				body div.wpforms-container-full .wpforms-form .wpforms-page-button {
					background-color:{$button_background_color};
					background-image: linear-gradient(to right, {$button_background_color}, {$button_background_color}), url({$button_background_image});
					background-repeat: no-repeat;
					background-size: cover;
					background-attachment: scroll;
				}";
		}

		$inputs_background_color = esc_html( get_theme_mod( 'responsive_inputs_background_color', '#ffffff' ) );

		if ( $inputs_background_image ) {
			$custom_css .= "select,
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
				body div.wpforms-container-full .wpforms-form textarea,
				#add_payment_method table.cart td.actions .coupon .input-text,
				.woocommerce-cart table.cart td.actions .coupon .input-text,
				.woocommerce-checkout table.cart td.actions .coupon .input-text,
				.woocommerce form .form-row input.input-text,
				.woocommerce form .form-row textarea {
					background-color: ' . $inputs_background_color . ';
					background-image: linear-gradient(to right, {$inputs_background_color}, {$inputs_background_color}), url({$inputs_background_image});
					background-repeat: no-repeat;
					background-size: cover;
					background-attachment: scroll;

				}";
		}

		$default_sidebar_color = '#ffffff';
		$sidebar_background_color = esc_html( responsive_prepare_css_value( 'responsive_sidebar_background_color' ) );
		$box_background_color = esc_html( responsive_prepare_css_value( 'responsive_box_background_color' ) );
		$box_background_gradient_color = esc_html( get_theme_mod( 'responsive_box_background_gradient_color', Responsive\Core\get_responsive_customizer_defaults( 'background_gradient_color' ) ) );
		$box_background_color_type = get_theme_mod( 'responsive_box_background_color_type', 'color' );

		$is_sidebar_color_default = ( get_theme_mod( 'responsive_sidebar_background_color', null ) === null );
		
		// Priority to Sidebar Background Image and Color Over Box Background Image and Color
		if ( $sidebar_background_image || ( !$is_sidebar_color_default && $sidebar_background_color !== $default_sidebar_color ) ) {
			$background_image = $sidebar_background_image ? $sidebar_background_image : $box_background_image;
			$custom_css .= ".responsive-site-style-boxed aside#secondary.main-sidebar .widget-wrapper {
				background-color: $sidebar_background_color;
				background-image: linear-gradient(to right, {$sidebar_background_color}, {$sidebar_background_color}), url({$background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
		} else {
			if( 'gradient' === $box_background_color_type ) {
				$custom_css .= ".responsive-site-style-boxed aside#secondary.main-sidebar .widget-wrapper {
					background: $box_background_gradient_color;
					background-repeat: no-repeat;
					background-size: cover;
					background-attachment: scroll;
				}";
			} else {
				$custom_css .= ".responsive-site-style-boxed aside#secondary.main-sidebar .widget-wrapper {
					background-color: $box_background_color;
					background-image: linear-gradient(to right, {$box_background_color}, {$box_background_color}), url({$box_background_image});
					background-repeat: no-repeat;
					background-size: cover;
					background-attachment: scroll;
				}";
			}
		}

		$header_background_color = esc_html( get_theme_mod( 'responsive_header_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) ) );

		if ( $header_background_image ) {
			$custom_css .= "body:not(.res-transparent-header) .site-header {
				background-color: ' . $header_background_color . ';
				background-image: linear-gradient(to right, {$header_background_color}, {$header_background_color}), url({$header_background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
		}

		$header_widget_background_color = esc_html( get_theme_mod( 'responsive_header_widget_background_color', '#ffffff' ) );

		if ( $header_widget_background_image ) {
				$custom_css .= "body:not(.res-transparent-header) .header-widgets {
					background-color: ' . $header_widget_background_color . ';
					background-image: linear-gradient(to right, {$header_widget_background_color}, {$header_widget_background_color}), url({$header_widget_background_image});
					background-repeat: no-repeat;
					background-size: cover;
					background-attachment: scroll;
			}";
		}

		$transparent_header_widget_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_widget_background_color', '' ) );

		if ( $transparent_header_widget_background_image ) {
			$custom_css .= ".res-transparent-header .header-widgets {
				background-color: ' . $transparent_header_widget_background_color . ';
				background-image: linear-gradient(to right, {$transparent_header_widget_background_color}, {$transparent_header_widget_background_color}), url({$transparent_header_widget_background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
		}

		// Mobile Header Widgets (colors)
		// Apply only under the mobile menu breakpoint to avoid affecting desktop header widgets.
		$mobile_header_widget_text_color        = esc_html( get_theme_mod( 'responsive_mobile_header_widget_text_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_text' ) ) );
		$mobile_header_widget_background_color  = esc_html( get_theme_mod( 'responsive_mobile_header_widget_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_background' ) ) );
		$mobile_header_widget_border_color      = esc_html( get_theme_mod( 'responsive_mobile_header_widget_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_border' ) ) );
		$mobile_header_widget_link_color        = esc_html( get_theme_mod( 'responsive_mobile_header_widget_link_color',  Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link' ) ) );
		$mobile_header_widget_link_hover_color  = esc_html( get_theme_mod( 'responsive_mobile_header_widget_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_widget_link_hover' ) ) );

		if ( $mobile_header_widget_text_color || $mobile_header_widget_background_color || $mobile_header_widget_border_color || $mobile_header_widget_link_color || $mobile_header_widget_link_hover_color ) {
			$custom_css .= "@media (max-width:992px) {";
				if ( $mobile_header_widget_text_color ) {
					$custom_css .= ".mobile-header-widgets .mobile-header-widgets-wrapper,
									.mobile-header-widgets .mobile-header-widgets-wrapper h1,
									.mobile-header-widgets .mobile-header-widgets-wrapper h2,
									.mobile-header-widgets .mobile-header-widgets-wrapper h3,
									.mobile-header-widgets .mobile-header-widgets-wrapper h4,
									.mobile-header-widgets .mobile-header-widgets-wrapper h5,
									.mobile-header-widgets .mobile-header-widgets-wrapper h6,
									.mobile-header-widgets .mobile-header-widgets-wrapper .widget-title h4 { color: {$mobile_header_widget_text_color}; }";
				}
				if ( $mobile_header_widget_background_color ) {
					$custom_css .= ".mobile-header-widgets { background-color: {$mobile_header_widget_background_color}; }";
				}
				if ( $mobile_header_widget_border_color ) {
					$custom_css .= ".mobile-header-widgets { border-color: {$mobile_header_widget_border_color}; }";
				}
				if ( $mobile_header_widget_link_color ) {
					$custom_css .= ".mobile-header-widgets .mobile-header-widgets-wrapper a { color: {$mobile_header_widget_link_color}; }";
				}
				if ( $mobile_header_widget_link_hover_color ) {
					$custom_css .= ".mobile-header-widgets .mobile-header-widgets-wrapper a:focus,
.mobile-header-widgets .mobile-header-widgets-wrapper a:hover { color: {$mobile_header_widget_link_hover_color}; }";
				}
			$custom_css .= "}";
		}

		$footer_background_color = esc_html( get_theme_mod( 'responsive_footer_background_color', '#333333' ) );

		if ( $footer_background_image ) {
			$custom_css .= ".site-footer {
				background-color: ' . $footer_background_color . ';
				background-image: linear-gradient(to right, {$footer_background_color}, {$footer_background_color}), url({$footer_background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
		}
		if ( $site_background_image ) {
			$custom_css .= "body.custom-background {
				background-image: url({$site_background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
		}

		if ( 'gradient' === $site_background_color_type && ! empty( $site_background_gradient_color ) ) {
			// If gradient is active and has a value, use 'background'
			$custom_css .= "body.custom-background {
				background: " . esc_attr( $site_background_gradient_color ) . ";
				/* Ensure background-color is reset or not present to avoid conflict */
				background-color: ''; /* Explicitly reset */
			}";
		} elseif ( 'color' === $site_background_color_type && ! empty( $site_background_color ) ) {
			// If solid color is active and has a value, use 'background-color'
			$custom_css .= "body.custom-background {
				/* Ensure background is reset or not present to avoid conflict */
				background: ''; /* Explicitly reset */
				background-color: " . esc_attr( $site_background_color ) . ";
			}";
		}
	}

	// lifter settings

	if ( class_exists( 'LifterLMS' ) ) {

		// container width.

		$lifter_container_max_width = esc_html( get_theme_mod( 'lifterlms_container_width', 1140 ) );

		if ( $lifter_container_max_width >= 1500 ) {

			$lifter_container_max_width = 1500;

		}

		$custom_css .= "
		.responsive-site-llms-contained #content {
			width: {$lifter_container_max_width}px;
		}
		";

		// box radius.

		$lifter_box_radius = esc_html( get_theme_mod( 'lifterlms_box_radius', 0 ) );

		$custom_css .= "
		.responsive-site-style-llms-content-boxed .site-content .hentry,
		.responsive-site-style-llms-boxed aside#secondary .widget-wrapper,
		.responsive-site-style-llms-boxed .site-content .hentry {
			border-radius:{$lifter_box_radius}px;
		}
		";

		// box padding

		$lifter_box_padding_right  = esc_html( get_theme_mod( 'lifterlms_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_padding_left   = esc_html( get_theme_mod( 'lifterlms_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_padding_top    = esc_html( get_theme_mod( 'lifterlms_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_padding_bottom = esc_html( get_theme_mod( 'lifterlms_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );

		$lifter_box_tablet_padding_right  = esc_html( get_theme_mod( 'lifterlms_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_tablet_padding_left   = esc_html( get_theme_mod( 'lifterlms_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_tablet_padding_top    = esc_html( get_theme_mod( 'lifterlms_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_tablet_padding_bottom = esc_html( get_theme_mod( 'lifterlms_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );

		$lifter_box_mobile_padding_right  = esc_html( get_theme_mod( 'lifterlms_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_mobile_padding_left   = esc_html( get_theme_mod( 'lifterlms_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_mobile_padding_top    = esc_html( get_theme_mod( 'lifterlms_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );
		$lifter_box_mobile_padding_bottom = esc_html( get_theme_mod( 'lifterlms_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'box_padding' ) ) );

		$custom_css .= '.responsive-site-style-llms-content-boxed .hentry,
		.responsive-site-style-llms-boxed .hentry,
		.responsive-site-style-llms-boxed .widget-wrapper,
		.responsive-site-style-llms-boxed .site-content article.product {
			padding: ' . responsive_spacing_css( $lifter_box_padding_top, $lifter_box_padding_right, $lifter_box_padding_bottom, $lifter_box_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.responsive-site-style-llms-content-boxed .hentry,
			.responsive-site-style-llms-boxed .hentry,
			.responsive-site-style-llms-boxed .widget-wrapper,
			.responsive-site-style-llms-boxed .site-content article.product {
				padding: ' . responsive_spacing_css( $lifter_box_tablet_padding_top, $lifter_box_tablet_padding_right, $lifter_box_tablet_padding_bottom, $lifter_box_tablet_padding_left ) . ';
			}
		}

		@media screen and ( max-width: 576px ) {
			.responsive-site-style-llms-content-boxed .hentry,
			.responsive-site-style-llms-boxed .hentry,
			.responsive-site-style-llms-boxed .widget-wrapper,
			.responsive-site-style-llms-boxed .site-content article.product {
				padding: ' . responsive_spacing_css( $lifter_box_mobile_padding_top, $lifter_box_mobile_padding_right, $lifter_box_mobile_padding_bottom, $lifter_box_mobile_padding_left ) . ';
			}
		}
		';

	}

	$body_text_color      = esc_html( responsive_prepare_css_value( 'responsive_body_text_color' ) );
	$meta_text_color      = esc_html( responsive_prepare_css_value( 'responsive_meta_text_color' ) );
	$box_background_gradient_color = esc_html( get_theme_mod( 'responsive_box_background_gradient_color', Responsive\Core\get_responsive_customizer_defaults( 'background_gradient_color' ) ) );
	$box_background_color_type = get_theme_mod( 'responsive_box_background_color_type', 'color' );


	$link_color       = esc_html( responsive_prepare_css_value( 'responsive_link_color' ) );
	$link_hover_color = esc_html( responsive_prepare_css_value( 'responsive_link_hover_color' ) );

	$button_color              = esc_html( responsive_prepare_css_value( 'responsive_button_color' ) );
	$button_hover_color        = esc_html( responsive_prepare_css_value( 'responsive_button_hover_color' ) );
	$button_text_color         = esc_html( responsive_prepare_css_value( 'responsive_button_text_color', Responsive\Core\get_responsive_customizer_defaults( 'button_text' ) ) );
	$button_hover_text_color   = esc_html( responsive_prepare_css_value( 'responsive_button_hover_text_color', Responsive\Core\get_responsive_customizer_defaults( 'button_hover_text' ) ) );
	$button_border_color       = esc_html( responsive_prepare_css_value( 'responsive_button_border_color', Responsive\Core\get_responsive_customizer_defaults( 'button_border' ) ) );
	$button_hover_border_color = esc_html( responsive_prepare_css_value( 'responsive_button_hover_border_color', Responsive\Core\get_responsive_customizer_defaults( 'button_hover_border' ) ) );

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

	$buttons_radius = esc_html( get_theme_mod( 'responsive_buttons_radius', Responsive\Core\get_responsive_customizer_defaults( 'buttons_radius' ) ) );
	/*new control- start*/
	$button_top_left_radius     = esc_html( get_theme_mod( 'responsive_buttons_radius_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_top_right_radius    = esc_html( get_theme_mod( 'responsive_buttons_radius_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_bottom_right_radius = esc_html( get_theme_mod( 'responsive_buttons_radius_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_buttons_radius_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );

	// Tablet button.
	$button_tablet_top_left_radius     = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_tablet_top_right_radius    = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_tablet_bottom_right_radius = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_tablet_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );

	// Mobile value.
	$button_mobile_top_left_radius     = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_mobile_top_right_radius    = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_mobile_bottom_right_radius = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_mobile_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	
	// Border width new control.
	$buttons_border_width_top = esc_html( get_theme_mod( 'responsive_buttons_border_width_top_border', 1 ) );
	$buttons_border_width_right = esc_html( get_theme_mod( 'responsive_buttons_border_width_right_border', 1 ) );
	$buttons_border_width_bottom = esc_html( get_theme_mod( 'responsive_buttons_border_width_bottom_border', 1 ) );
	$buttons_border_width_left = esc_html( get_theme_mod( 'responsive_buttons_border_width_left_border', 1 ) );

	$buttons_border_tablet_width_top = esc_html( get_theme_mod( 'responsive_buttons_border_width_tablet_top_border', 1 ) );
	$buttons_border_tablet_width_right = esc_html( get_theme_mod( 'responsive_buttons_border_width_tablet_right_border', 1 ) );
	$buttons_border_tablet_width_bottom = esc_html( get_theme_mod( 'responsive_buttons_border_width_tablet_bottom_border', 1 ) );
	$buttons_border_tablet_width_left = esc_html( get_theme_mod( 'responsive_buttons_border_width_tablet_left_border', 1 ) );

	$buttons_border_mobile_width_top = esc_html( get_theme_mod( 'responsive_buttons_border_width_mobile_top_border', 1 ) );
	$buttons_border_mobile_width_right = esc_html( get_theme_mod( 'responsive_buttons_border_width_mobile_right_border', 1 ) );
	$buttons_border_mobile_width_bottom = esc_html( get_theme_mod( 'responsive_buttons_border_width_mobile_bottom_border', 1 ) );
	$buttons_border_mobile_width_left = esc_html( get_theme_mod( 'responsive_buttons_border_width_mobile_left_border', 1 ) );

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

	$inputs_radius       = esc_html( get_theme_mod( 'responsive_inputs_radius', 0 ) );

	/*new control- start*/
	$inputs_top_left_radius     = esc_html( get_theme_mod( 'responsive_inputs_radius_top_left_radius', 0 ) );
	$inputs_top_right_radius    = esc_html( get_theme_mod( 'responsive_inputs_radius_top_right_radius', 0 ) );
	$inputs_bottom_right_radius = esc_html( get_theme_mod( 'responsive_inputs_radius_bottom_right_radius', 0 ) );
	$inputs_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_inputs_radius_bottom_left_radius', 0 ) );

	// Tablet Inputs.
	$inputs_tablet_top_left_radius     = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_top_left_radius', 0 ) );
	$inputs_tablet_top_right_radius    = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_top_right_radius', 0 ) );
	$inputs_tablet_bottom_right_radius = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_bottom_right_radius', 0 ) );
	$inputs_tablet_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_bottom_left_radius', 0 ) );

	// Mobile Inputs.
	$inputs_mobile_top_left_radius     = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_top_left_radius', 0 ) );
	$inputs_mobile_top_right_radius    = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_top_right_radius', 0 ) );
	$inputs_mobile_bottom_right_radius = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_bottom_right_radius', 0 ) );
	$inputs_mobile_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_bottom_left_radius', 0 ) );

	// New Border width control start from here.
	$input_border_top_width           = esc_html( get_theme_mod( 'responsive_inputs_border_width_top_border', 1 ) );
	$input_border_right_width         = esc_html( get_theme_mod( 'responsive_inputs_border_width_right_border', 1 ) );
	$input_border_bottom_width        = esc_html( get_theme_mod( 'responsive_inputs_border_width_bottom_border', 1 ) );
	$input_border_left_width          = esc_html( get_theme_mod( 'responsive_inputs_border_width_left_border', 1 ) );

	$input_border_tablet_top_width    = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_top_border', 1 ) );
	$input_border_tablet_right_width  = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_right_border', 1 ) );
	$input_border_tablet_bottom_width = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_bottom_border', 1 ) );
	$input_border_tablet_left_width   = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_left_border', 1 ) );

	$input_border_mobile_top_width    = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_top_border', 1 ) );
	$input_border_mobile_right_width  = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_right_border', 1 ) );
	$input_border_mobile_bottom_width = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_bottom_border', 1 ) );
	$input_border_mobile_left_width   = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_left_border', 1 ) );

	// New Border width control ends here.
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
				// Typography line height for heading widget.
				if ( 'line-height' === $key ) {
					if ( defined( 'ELEMENTOR_VERSION' ) ) {
						$custom_css .= '.elementor-widget-heading h' . $i . '.elementor-heading-title{' . $key . ':' . $value . '; }';
					}
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
	.wp-block-file__button,
	body div.wpforms-container-full .wpforms-form input[type=submit],
	body div.wpforms-container-full .wpforms-form button[type=submit],
	body div.wpforms-container-full .wpforms-form .wpforms-page-button, .main-navigation .menu .res-button-menu .res-custom-button,
	form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button,
	#off-canvas-site-navigation .menu .res-button-menu .res-custom-button {
		background-color:' . $button_color . ';
		border-style: solid;
		border-color: ' . $button_border_color . ';
		border-top-width: ' . $buttons_border_width_top . 'px;
		border-right-width: ' . $buttons_border_width_right . 'px;
		border-bottom-width: ' . $buttons_border_width_bottom . 'px;
		border-left-width: ' . $buttons_border_width_left . 'px;
		border-radius:' . responsive_spacing_css( $button_top_left_radius, $button_top_right_radius, $button_bottom_right_radius, $button_bottom_left_radius ) . ';
	    color: ' . $button_text_color . ';
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
	}

	.wp-block-search__button{
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
		border-color: ' . $button_border_color . ';
		border-style: solid;
		border-top-width: ' . $buttons_border_width_top . 'px;
		border-right-width: ' . $buttons_border_width_right . 'px;
		border-bottom-width: ' . $buttons_border_width_bottom . 'px;
		border-left-width: ' . $buttons_border_width_left . 'px;
    }
	@media screen and ( max-width: 992px ) {
		' . $sensei_button . '
		.page.front-page .button,
		.blog.front-page .button,
		.read-more-button .hentry .read-more .more-link,
		input[type=button],
		.wp-block-button__link,
		.wp-block-file__button,
		input[type=submit],
		button,
		.button,
		body div.wpforms-container-full .wpforms-form input[type=submit],
		body div.wpforms-container-full .wpforms-form button[type=submit],
		body div.wpforms-container-full .wpforms-form .wpforms-page-button, .main-navigation .menu .res-button-menu .res-custom-button, #off-canvas-site-navigation .menu .res-button-menu .res-custom-button {
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
			border-radius:' . responsive_spacing_css( $button_tablet_top_left_radius, $button_tablet_top_right_radius, $button_tablet_bottom_right_radius, $button_tablet_bottom_left_radius ) . ';
			border-color: ' . $button_border_color . ';
			border-style: solid;
			border-top-width: ' . $buttons_border_tablet_width_top . 'px;
			border-right-width: ' . $buttons_border_tablet_width_right . 'px;
			border-bottom-width: ' . $buttons_border_tablet_width_bottom . 'px;
			border-left-width: ' . $buttons_border_tablet_width_left . 'px;
		}

		.wp-block-search__button{
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
			border-color: ' . $button_border_color . ';
			border-style: solid;
			border-top-width: ' . $buttons_border_tablet_width_top . 'px;
			border-right-width: ' . $buttons_border_tablet_width_right . 'px;
			border-bottom-width: ' . $buttons_border_tablet_width_bottom . 'px;
			border-left-width: ' . $buttons_border_tablet_width_left . 'px;
		}
	}

	@media screen and ( max-width: 576px ) {
		' . $sensei_button . '
		.page.front-page .button,
		.blog.front-page .button,
		.read-more-button .hentry .read-more .more-link,
		input[type=button],
		.wp-block-button__link,
		.wp-block-file__button,
		input[type=submit],
		button,
		.button,
		body div.wpforms-container-full .wpforms-form input[type=submit],
		body div.wpforms-container-full .wpforms-form button[type=submit],
		body div.wpforms-container-full .wpforms-form .wpforms-page-button, .main-navigation .menu .res-button-menu .res-custom-button, #off-canvas-site-navigation .menu .res-button-menu .res-custom-button {
			padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
			border-radius:' . responsive_spacing_css( $button_mobile_top_left_radius, $button_mobile_top_right_radius, $button_mobile_bottom_right_radius, $button_mobile_bottom_left_radius ) . ';
			border-color: ' . $button_border_color . ';
			border-style: solid;
			border-top-width: ' . $buttons_border_mobile_width_top . 'px;
			border-right-width: ' . $buttons_border_mobile_width_right . 'px;
			border-bottom-width: ' . $buttons_border_mobile_width_bottom . 'px;
			border-left-width: ' . $buttons_border_mobile_width_left . 'px;
		}

		.wp-block-search__button{
		padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
		border-color: ' . $button_border_color . ';
		border-style: solid;
		border-top-width: ' . $buttons_border_mobile_width_top . 'px;
		border-right-width: ' . $buttons_border_mobile_width_right . 'px;
		border-bottom-width: ' . $buttons_border_mobile_width_bottom . 'px;
		border-left-width: ' . $buttons_border_mobile_width_left . 'px;
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
	.wp-block-button__link.has-background:focus, .main-navigation .menu .res-button-menu .res-custom-button:hover, #off-canvas-site-navigation .menu .res-button-menu .res-custom-button:hover {
		color:' . $button_hover_text_color . ' !important;
		background-color:' . $button_hover_color . ' !important;
	}

	' . $sensei_button_hover . '
	.wp-block-button__link:focus,
	.wp-block-button__link:hover,
	.wp-block-file__button:focus,
	.wp-block-file__button:hover,
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
	body div.wpforms-container-full .wpforms-form .wpforms-page-button:focus, .main-navigation .menu .res-button-menu .res-custom-button:hover, #off-canvas-site-navigation .menu .res-button-menu .res-custom-button:hover {
	    color:' . $button_hover_text_color . ';
		border-color: ' . $button_hover_border_color . ';	
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
		border-color: ' . $inputs_border_color. ';
		border-top-width: '. $input_border_top_width. 'px;
		border-right-width: '. $input_border_right_width. 'px;
		border-bottom-width: '. $input_border_bottom_width. 'px;
		border-left-width: '. $input_border_left_width. 'px;
		border-radius: ' . responsive_spacing_css( $inputs_top_left_radius, $inputs_top_right_radius, $inputs_bottom_right_radius, $inputs_bottom_left_radius ) . ';
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
		border-top-width: '. $input_border_top_width. 'px;
		border-right-width: '. $input_border_right_width. 'px;
		border-bottom-width: '. $input_border_bottom_width. 'px;
		border-left-width: '. $input_border_left_width. 'px;
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
			border-radius: ' . responsive_spacing_css( $inputs_tablet_top_left_radius, $inputs_tablet_top_right_radius, $inputs_tablet_bottom_right_radius, $inputs_tablet_bottom_left_radius ) . ';
			border-top-width: '. $input_border_tablet_top_width. 'px;
			border-right-width: '. $input_border_tablet_right_width. 'px;
			border-bottom-width: '. $input_border_tablet_bottom_width. 'px;
			border-left-width: '. $input_border_tablet_left_width. 'px;
		}
		body div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,
		body div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,
		body div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,
		body div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,
		body div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,
		body div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid {
			border-top-width: '. $input_border_tablet_top_width. 'px;
			border-right-width: '. $input_border_tablet_right_width. 'px;
			border-bottom-width: '. $input_border_tablet_bottom_width. 'px;
			border-left-width: '. $input_border_tablet_left_width. 'px;
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
			border-radius: ' . responsive_spacing_css( $inputs_mobile_top_left_radius, $inputs_mobile_top_right_radius, $inputs_mobile_bottom_right_radius, $inputs_mobile_bottom_left_radius ) . ';
			border-top-width: '. $input_border_mobile_top_width. 'px;
			border-right-width: '. $input_border_mobile_right_width. 'px;
			border-bottom-width: '. $input_border_mobile_bottom_width. 'px;
			border-left-width: '. $input_border_mobile_left_width. 'px;
		}
		body div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,
		body div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,
		body div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,
		body div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,
		body div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,
		body div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid {
			border-top-width: '. $input_border_mobile_top_width. 'px;
			border-right-width: '. $input_border_mobile_right_width. 'px;
			border-bottom-width: '. $input_border_mobile_bottom_width. 'px;
			border-left-width: '. $input_border_mobile_left_width. 'px;
		}
	}
	';

	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		$custom_css .= '.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button{ padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . '; }';
		$custom_css .= '@media screen and ( max-width: 992px ) {
			.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button {
				padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . '
			}
		}';
		$custom_css .= '@media screen and ( max-width: 576px ) {
			.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button {
				padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . '
			}
		}';

		$custom_css .= '.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button {
			border-style: solid;
			border-top-left-radius: ' . $button_top_left_radius . 'px;
			border-top-right-radius: ' . $button_top_right_radius . 'px;
			border-bottom-left-radius: ' . $button_bottom_left_radius . 'px;
			border-bottom-right-radius: ' . $button_bottom_right_radius . 'px;
			border-top-width: ' . $buttons_border_width_top . 'px;
			border-right-width: ' . $buttons_border_width_right . 'px;
			border-bottom-width: ' . $buttons_border_width_bottom . 'px;
			border-left-width: ' . $buttons_border_width_left . 'px;
			border-color: ' . $button_border_color . ';
		}';

		$custom_css .= '@media screen and ( max-width: 992px ) {
			.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button {
				border-top-left-radius: ' . $button_tablet_top_left_radius . 'px;
				border-top-right-radius: ' . $button_tablet_top_right_radius . 'px;
				border-bottom-left-radius: ' . $button_tablet_bottom_left_radius . 'px;
				border-bottom-right-radius: ' . $button_tablet_bottom_right_radius . 'px;
				border-top-width: ' . $buttons_border_tablet_width_top . 'px;
				border-right-width: ' . $buttons_border_tablet_width_right . 'px;
				border-bottom-width: ' . $buttons_border_tablet_width_bottom . 'px;
				border-left-width: ' . $buttons_border_tablet_width_left . 'px;
			}
		}';

		$custom_css .= '@media screen and ( max-width: 576px ) {
			.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button {
				border-top-left-radius: ' . $button_mobile_top_left_radius . 'px;
				border-top-right-radius: ' . $button_mobile_top_right_radius . 'px;
				border-bottom-left-radius: ' . $button_mobile_bottom_left_radius . 'px;
				border-bottom-right-radius: ' . $button_mobile_bottom_right_radius . 'px;
				border-top-width: ' . $buttons_border_mobile_width_top . 'px;
				border-right-width: ' . $buttons_border_mobile_width_right . 'px;
				border-bottom-width: ' . $buttons_border_mobile_width_bottom . 'px;
				border-left-width: ' . $buttons_border_mobile_width_left . 'px;
			}
		}';
	}
	
	for ( $i = 1; $i < 7; $i++ ) {
		$custom_css .= 'h' . $i . ' {
		    color: ' . esc_html( responsive_prepare_css_value( "responsive_h{$i}_text_color" ) ) . ';
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
		$header_mobile_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_mobile_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ) ) );
		$header_menu_border_color            = esc_html( get_theme_mod( 'responsive_transparent_header_menu_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ) ) );
		$header_menu_link_color              = esc_html( get_theme_mod( 'responsive_transparent_header_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' ) ) );
		$header_menu_link_hover_color        = esc_html( get_theme_mod( 'responsive_transparent_header_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) ) );
		$header_active_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_active_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$header_hover_menu_background_color  = esc_html( get_theme_mod( 'responsive_transparent_header_hover_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$menu_active_link_color              = esc_html( get_theme_mod( 'responsive_transparent_header_active_menu_link_color', '' ) );
		$off_canvas_menu_link_default 		 = $header_menu_link_color;
		$off_canvas_menu_link_hover 		 = $header_menu_link_hover_color;
		$off_canvas_menu_link_active         = $menu_active_link_color;
		$off_canvas_menu_bg_default          = $header_mobile_menu_background_color;
		$off_canvas_menu_bg_hover            = $header_hover_menu_background_color;
		$off_canvas_menu_bg_active           = $header_active_menu_background_color;

		// Sub Menu Color.
		$header_sub_menu_background_color        = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_active_sub_menu_background_color = esc_html( get_theme_mod( 'responsive_transparent_header_active_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_hover_sub_menu_background_color  = esc_html( get_theme_mod( 'responsive_transparent_header_hover_sub_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_background' ) ) );
		$header_sub_menu_link_color              = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link' ) ) );
		$header_sub_menu_link_hover_color        = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_sub_menu_link_hover' ) ) );
		$sub_menu_active_link_color              = esc_html( get_theme_mod( 'responsive_transparent_header_sub_menu_active_link_color', '' ) );

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
		if ( 1 === get_theme_mod( 'responsive_enable_transparent_header_bottom_border', 0 ) ) {
			$header_bottom_border = esc_html( get_theme_mod( 'responsive_transparent_bottom_border', 0 ) );
		}
		$custom_css .= "
			.res-transparent-header .site-header {
				border-bottom-width: {$header_bottom_border}px;
				border-bottom-style: solid;
				border-bottom-color: {$header_border_color};
			}
		";
	} else {

		// Header colors.
		$header_background_color = esc_html( get_theme_mod( 'responsive_header_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_background' ) ) );

		// $header_border_color           = esc_html( get_theme_mod( 'responsive_header_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_border' ) ) );
		$header_site_title_color       = esc_html( responsive_prepare_css_value( 'responsive_header_site_title_color' ) );
		$header_site_title_hover_color = esc_html( responsive_prepare_css_value( 'responsive_header_site_title_hover_color' ) );
		$header_text_color             = esc_html( responsive_prepare_css_value( 'responsive_header_text_color' ) );
		// Menu Color.
		$header_menu_background_color        = esc_html( get_theme_mod( 'responsive_header_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_background' ) ) );
		$header_mobile_menu_background_color = esc_html( get_theme_mod( 'responsive_header_mobile_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ) ) );
		$header_menu_border_color            = esc_html( get_theme_mod( 'responsive_header_menu_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_border' ) ) );
		$header_menu_link_color              = esc_html( responsive_prepare_css_value( 'responsive_header_menu_link_color' ) );
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

		// $header_bottom_border = 0;
		// if ( 1 === get_theme_mod( 'responsive_enable_header_bottom_border', 1 ) ) {
		// 	$header_bottom_border = esc_html( get_theme_mod( 'responsive_bottom_border', 0 ) );
		// }

		$off_canvas_menu_link_default = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_link_default_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link' )  ) );
		$off_canvas_menu_link_hover = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_menu_link_hover' ) ) );
		$off_canvas_menu_link_active = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_link_active_color', '#000000' ) );
		$off_canvas_menu_bg_default = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_bg_default_color', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ) ) );
		$off_canvas_menu_bg_hover = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_bg_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
		$off_canvas_menu_bg_active = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_bg_active_color', Responsive\Core\get_responsive_customizer_defaults( 'header_active_menu_background' ) ) );
	}
	// Sidebar Color.
	$sidebar_headings_color   = esc_html( responsive_prepare_css_value( 'responsive_sidebar_headings_color' ) );
	$sidebar_background_color = esc_html( responsive_prepare_css_value( 'responsive_sidebar_background_color' ) );
	$sidebar_text_color       = esc_html( responsive_prepare_css_value( 'responsive_sidebar_text_color' ) );
	$sidebar_link_color       = esc_html( responsive_prepare_css_value( 'responsive_sidebar_link_color' ) );
	$sidebar_link_hover_color = esc_html( get_theme_mod( 'responsive_sidebar_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'link_hover' ) ) );

	$custom_css .= "
    .widget-area h1, .widget-area h2, .widget-area h3, .widget-area h4, .widget-area h5, .widget-area h6 {
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
	// $header_height_size = get_theme_mod( 'responsive_header_height', 0 );
	// if ( null !== $header_height_size ) {
	// 	$header_height_half     = $header_height_size / 2;
	// 	$mobile_menu_breakpoint = esc_html( get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 ) );
	// 	$custom_css            .= "body:not(.res-transparent-header) .site-header {
	// 		padding-top: {$header_height_half}px;
	// 		padding-bottom: {$header_height_half}px;
	// 	}

	// 	@media screen and (max-width: {$mobile_menu_breakpoint}px) {
	// 		body.site-header-layout-vertical.site-mobile-header-layout-horizontal:not(.res-transparent-header) .site-header .main-navigation {
	// 			border-top: 0;
	// 		}
	// 	}";
	// }

	// Transparent Header Height.
	// $transparent_header_height_size = get_theme_mod( 'responsive_transparent_header_height', 0 );
	// if ( null !== $transparent_header_height_size ) {
	// 	$transparent_header_height_half = $transparent_header_height_size / 2;
	// 	$mobile_menu_breakpoint         = esc_html( get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 ) );
	// 	$custom_css                    .= "body.res-transparent-header .site-header {
	// 		padding-top: {$transparent_header_height_half}px;
	// 		padding-bottom: {$transparent_header_height_half}px;
	// 	}

	// 	@media screen and (max-width: {$mobile_menu_breakpoint}px) {
	// 		body.site-header-layout-vertical.site-mobile-header-layout-horizontal.res-transparent-header .site-header .main-navigation {
	// 			border-top: 0;
	// 		}
	// 	}";
	// }

	// Mobile Menu.
	$mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
	// Mobile Menu Breakpoint.
	$disable_mobile_menu    = get_theme_mod( 'responsive_disable_mobile_menu', 1 );
	$mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 );

	$hamburger_menu_default_padding = Responsive\Core\get_responsive_customizer_defaults( 'hamburger_menu_padding' );

	$hamburger_menu_padding_right  = esc_html( get_theme_mod( 'responsive_hamburger_menu_right_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_padding_left   = esc_html( get_theme_mod( 'responsive_hamburger_menu_left_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_padding_top    = esc_html( get_theme_mod( 'responsive_hamburger_menu_top_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_padding_bottom = esc_html( get_theme_mod( 'responsive_hamburger_menu_bottom_padding', $hamburger_menu_default_padding ) );

	$hamburger_menu_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_hamburger_menu_tablet_right_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_hamburger_menu_tablet_left_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_hamburger_menu_tablet_top_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_hamburger_menu_tablet_bottom_padding', $hamburger_menu_default_padding ) );

	$hamburger_menu_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_hamburger_menu_mobile_right_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_hamburger_menu_mobile_left_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_hamburger_menu_mobile_top_padding', $hamburger_menu_default_padding ) );
	$hamburger_menu_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_hamburger_menu_mobile_bottom_padding', $hamburger_menu_default_padding ) );

	$disable_menu = get_theme_mod( 'responsive_disable_menu', 0 );

	if ( 0 === $disable_mobile_menu ) {
		$mobile_menu_breakpoint = 0;
	}
	// adding custom css when the menu is going out of the screen
	$custom_css .= "
		.main-navigation .children > li.focus > .children, .main-navigation .children > li.focus > .sub-menu-edge, .main-navigation .children > li:hover > .children, .main-navigation .children > li:hover > .sub-menu-edge,
		.main-navigation .sub-menu > li.focus > .children,
		.main-navigation .sub-menu > li.focus > .sub-menu-edge,
		.main-navigation .sub-menu > li:hover > .children,
		.main-navigation .sub-menu > li:hover > .sub-menu-edge,
		.sub-menu .sub-menu-edge:hover {
			left: auto !important;
			right: 100%;
			top: 0 !important;
		}
		.main-navigation .children > li.focus > .children, .main-navigation .children > li.focus > .sub-menu-edge-rtl, .main-navigation .children > li:hover > .children, .main-navigation .children > li:hover > .sub-menu-edge-rtl,
		.main-navigation .sub-menu > li.focus > .children,
		.main-navigation .sub-menu > li.focus > .sub-menu-edge-rtl,
		.main-navigation .sub-menu > li:hover > .children,
		.main-navigation .sub-menu > li:hover > .sub-menu-edge-rtl {
			left: 100% !important;
			right: auto !important;
			top: 0 !important;
		}";

	$custom_css .= "@media (min-width:" . ($mobile_menu_breakpoint + 1) . "px) {
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
		.site-below-header-inner-wrap:has(.main-navigation.toggled),
		  	.site-above-header-inner-wrap:has(.main-navigation.toggled) {
			grid-template-columns: none;
		}
		.site-primary-header-inner-wrap:has(.main-navigation.toggled) {
  		  	display: block;
  		}
		.site-primary-header-inner-wrap .main-navigation .menu-toggle, #masthead-mobile #responsive-off-canvas-panel .responsive-off-canvas-panel-close {
			display: flex;
			justify-content: center;
			align-items: center;
    		top: calc(16px * 1.75 * 0.575);
    		right: 15px;
    		height: calc(16px * 1.75 * 1.75);
    		font-size: 20px;
    		line-height: calc(16px * 1.75 * 1.75);
    		text-align: center;
    		z-index: 999999;
		}
		.site-mobile-header-layout-horizontal.site-header-main-navigation-site-branding .main-navigation .menu-toggle {
			bottom:{$header_tablet_padding_bottom}px;
		}
		.site-mobile-header-layout-horizontal.site-header-site-branding-main-navigation .main-navigation .menu-toggle {
			top:{$header_tablet_padding_top}px;
			margin: -14px;
			margin-right: 2px;
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
			top: 5.3px;
			display: block;
			position: absolute;
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
			top: {$header_mobile_padding_top}px;
		}
		.site-mobile-header-layout-horizontal.header-widget-position-with_logo .site-branding {
			padding-right: 15px;
		}
	}
	
	.site-description {
		color: {$header_text_color};
	}

	/* Default hidden for all, visible only for selected breakpoints */
	[data-title-visibility] .site-title,
	[data-tagline-visibility] .site-description {
		display: none;
	}

	/* Desktop */
	@media (min-width: 993px) {
		[data-title-visibility*='\\\"desktop\\\"'] .site-title,
		[data-tagline-visibility*='\\\"desktop\\\"'] .site-description {
			display: block;
		}
	}

	/* Tablet */
	@media (min-width: 577px) and (max-width: 992px) {
		[data-title-visibility*='\\\"tablet\\\"'] .site-title,
		[data-tagline-visibility*='\\\"tablet\\\"'] .site-description {
			display: block;
		}
	}

	/* Mobile */
	@media (max-width: 576px) {
		[data-title-visibility*='\\\"mobile\\\"'] .site-title,
		[data-tagline-visibility*='\\\"mobile\\\"'] .site-description {
			display: block;
		}
	}

	.site-header-row .main-navigation .main-navigation-wrapper {
		background-color: {$header_menu_background_color};
	}

	.header-full-width.site-header-layout-vertical .main-navigation.toggled,
	.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation.toggled,
	.responsive-site-full-width.site-header-layout-vertical .main-navigation.toggled,
	.site-header-row .main-navigation.toggled,
	.site-header-row .main-navigation.toggled .main-navigation-wrapper {
		background-color: {$header_mobile_menu_background_color};
	}
	@media ( max-width: {$mobile_menu_breakpoint}px ) {
		.site-mobile-header-layout-vertical .main-navigation {
			background-color: {$header_menu_background_color};
		}
		.site-header-row .main-navigation.toggled {
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
	.responsive-llms-dash-wrap .llms-sd-item .llms-sd-link {
		color: {$link_color};
	}
	.responsive-llms-dash-wrap .llms-sd-item .llms-sd-link:hover {
		color: {$link_hover_color};
	}
	.llms-student-dashboard .responsive-llms-dash-nav-left .llms-sd-item.current a {
	border-right: 5px solid {$button_border_color};
	}
	.llms-student-dashboard .responsive-llms-dash-nav-left .llms-sd-item a:hover {
		border-right: 5px solid {$button_hover_border_color};
		}
	.llms-student-dashboard .responsive-llms-dash-nav-right .llms-sd-item.current a {
		border-left: 5px solid {$button_border_color};
		}
		.llms-student-dashboard .responsive-llms-dash-nav-right .llms-sd-item a:hover {
		border-left: 5px solid {$button_hover_border_color};
		}	
	.llms-student-dashboard .responsive-llms-dash-nav-right nav.llms-sd-nav	{
	border-left:1px solid {$button_border_color};
	}
	.llms-student-dashboard .responsive-llms-dash-nav-left nav.llms-sd-nav{
		border-right:1px solid {$button_border_color};
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
	}";

	if(Responsive\Core\responsive_check_element_present_in_hfb('primary_navigation', 'header'))
	{
		$custom_css.="
		.site-header-row .main-navigation .main-navigation-wrapper {
		background-color: {$header_menu_background_color};
		}

		.header-full-width.site-header-layout-vertical .main-navigation.toggled,
		.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation.toggled,
		.responsive-site-full-width.site-header-layout-vertical .main-navigation.toggled,
		.site-header-row .main-navigation.toggled,
		.site-header-row .main-navigation.toggled .main-navigation-wrapper {
			background-color: {$header_mobile_menu_background_color};
		}
		@media ( max-width: {$mobile_menu_breakpoint}px ) {
			.site-mobile-header-layout-vertical .main-navigation {
				background-color: {$header_menu_background_color};
			}
			.site-header-row .main-navigation.toggled {
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
		";
	}

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

	$sub_menu_border_color = esc_html( get_theme_mod( 'responsive_sub_menu_border_color', '' ) );

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
	if ( "1" === $sub_menu_divider ) {
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

	if ( ( 1 === $disable_menu ) && ( 0 === $disable_mobile_menu ) ) {
		$custom_css .= '.site-branding {

	    		width: -webkit-fill-available;
				}';
	}

	if(Responsive\Core\responsive_check_element_present_in_hfb('logo', 'header')) {
		$custom_css .= ".site-branding-wrapper {
			padding: " . responsive_spacing_css( $header_padding_top, $header_padding_right, $header_padding_bottom, $header_padding_left ) . ";

		}
		@media screen and ( max-width: 992px ) {
			.site-branding-wrapper {
				padding: " . responsive_spacing_css( $header_tablet_padding_top, $header_tablet_padding_right, $header_tablet_padding_bottom, $header_tablet_padding_left ) . ";
			}
		}
		@media screen and ( max-width: 576px ) {
			.site-branding-wrapper {
				padding: " . responsive_spacing_css( $header_mobile_padding_top, $header_mobile_padding_right, $header_mobile_padding_bottom, $header_mobile_padding_left ) . ";
			}
		}
		.site-title a {
			color: {$header_site_title_color};
		}
		.site-title a:hover {
			color: {$header_site_title_hover_color};
		}
		.site-branding-wrapper.site-branding-inline {
		display: flex;
		align-items: center;
		gap: 12px;
		}
		.site-branding-wrapper.site-branding-inline .site-title-tagline.site-title-inline {
			display: flex;
			flex-direction: column;
		}
		.site-branding-wrapper.site-branding-inline .site-title-tagline.site-title-inline .site-title {
			margin: 0;
		}
		@media screen and (max-width: 800px) {
			.site-mobile-header-section .custom-logo-link .customize-partial-edit-shortcut button,
			.site-mobile-header-section .site-description .customize-partial-edit-shortcut-button{
				left: -10px;
				top: -7px;
			}
		}";
	}
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
				right: 100%;
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
			.main-navigation.toggled, .responsive-off-canvas-panel-fullscreen.active .off-canvas-navigation {
				background-color: {$header_mobile_menu_background_color};
				height: 100%;
				left: 0;
			    overflow-y: scroll;
				padding: 50px;
				position: fixed;
				top: 0;
				width: 100%;
			    z-index: 100000;
				padding-top: 80px;
			}
			.main-navigation.toggled .menu, .responsive-off-canvas-panel-fullscreen.active .off-canvas-navigation .menu {
				margin-top: 20px;
			}
			.site-mobile-header-layout-vertical .main-navigation.toggled .menu, .responsive-off-canvas-panel-fullscreen.active .off-canvas-navigation .menu {
				margin-top: 0px;
			}
			#responsive-off-canvas-panel .responsive-off-canvas-panel-close .icon-times{
				margin-right: 0px;
			}
		}";

	} elseif ( 'sidebar' === $mobile_menu_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.mobile-menu-style-sidebar .main-navigation, .mobile-menu-style-sidebar .responsive-off-canvas-panel {
				-webkit-transition-property: width, display; /* Safari */
				-webkit-transition-duration: 0.6s; /* Safari */
				-webkit-transition-delay: 0s; /* Safari */
				transition-property: width, display;
				transition-duration: 0.6s;
				transition-delay: 0s;
			}
			.mobile-menu-style-sidebar .main-navigation.toggled, .mobile-menu-style-sidebar .responsive-off-canvas-panel-sidebar.active {
			    background-color: {$header_mobile_menu_background_color};
				height: 100%;
				right: 0;
				left : auto;
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
				margin: 0;
			}
			
			.site-mobile-header-layout-vertical .main-navigation.toggled .menu,
			.main-navigation.toggled .menu, .mobile-menu-style-sidebar #masthead-mobile #responsive-off-canvas-panel.responsive-off-canvas-panel-sidebar.active .menu {
				margin-top: 70px;
			}
			.site-header-layout-vertical.site-header-alignment-left .main-navigation.toggled .menu-toggle {
				text-align: right;
			}
			.site-header-layout-vertical.site-header-alignment-right .main-navigation.toggled .menu-toggle {
				text-align: left;
			}
			#responsive-off-canvas-panel .responsive-off-canvas-panel-close .icon-times{
				margin-right: 0px;
			}
			#masthead-mobile .site-header-item-toggle-button .menu-toggle[aria-expanded='true'] {
				display: none;
			}
		}";

		if ( 'left' === get_theme_mod( 'responsive_sidebar_menu_alignment', 'left' ) ) {
			$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.mobile-menu-style-sidebar .main-navigation.toggled {
					left: auto;
					right: 0;
				}	
				.mobile-menu-style-sidebar .main-navigation.toggled .menu-toggle, .mobile-menu-style-sidebar .responsive-off-canvas-panel-sidebar.active {
					left: 0;
					right: auto;
				}
				.responsive-off-canvas-overlay.active {
					right: 0;
					left: auto;
				}
				.mobile-menu-style-sidebar #masthead-mobile #responsive-off-canvas-panel.responsive-off-canvas-panel-sidebar.active .responsive-off-canvas-panel-close  {
					position: absolute;
					top: 28px;
					right: 15px;
					left: auto;
					margin: 0;
				}
			}";
		}
		else {
			$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.mobile-menu-style-sidebar .main-navigation.toggled {
					left: auto;
					right: 0;
				}	
				.mobile-menu-style-sidebar .main-navigation.toggled .menu-toggle {
					left: 15px;
					right: auto;
				}
				.mobile-menu-style-sidebar .responsive-off-canvas-panel-sidebar.active {
					right: 0;
					left: auto;
				}
				.responsive-off-canvas-overlay.active {
					left: 0;
					right: auto;
				}
				.mobile-menu-style-sidebar #masthead-mobile #responsive-off-canvas-panel.responsive-off-canvas-panel-sidebar.active .responsive-off-canvas-panel-close  {
					position: absolute;
					top: 28px;
					left: 15px;
					right: auto;
					margin: 0;
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
	$menu_item_link_color_set                        = responsive_prepare_css_value( 'responsive_header_menu_link_color' );
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

			$custom_css .= ".off-canvas-widget-area .menu > li::after{
				display: block;
				content: '';
				border-bottom: solid 3px {$transparent_menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.off-canvas-widget-area .menu > li.current-menu-item::after,
				#off-canvas-site-navigation .menu > li.current-menu-item::after,
			{
				border-bottom: solid 3px {$transparent_active_menu_item_underline_overline};
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li:hover::after {
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li::after {
				transform-origin: 0% 50%;
			}";
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

			$custom_css .= ".off-canvas-widget-area .menu > li::before {
				display: block;
				content: '';
				border-bottom: solid 3px {$transparent_menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.off-canvas-widget-area .menu > li.current-menu-item::before,
			.off-canvas-widget-area .menu > li.current_page_item::before {
				border-bottom: solid 3px {$transparent_active_menu_item_underline_overline};
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li:hover::before {
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li::before {
				transform-origin: 0% 50%;
			}";
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

			$custom_css .= ".off-canvas-widget-area .menu > li::after{
				display: block;
				content: '';
				border-bottom: solid 3px {$menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.off-canvas-widget-area .menu > li.current-menu-item::after,
				#off-canvas-site-navigation .menu > li.current-menu-item::after,
			{
				border-bottom: solid 3px {$active_menu_item_underline_overline};
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li:hover::after {
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li::after {
				transform-origin: 0% 50%;
			}";
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

			$custom_css .= ".off-canvas-widget-area .menu > li::before {
				display: block;
				content: '';
				border-bottom: solid 3px {$menu_item_underline_overline};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.off-canvas-widget-area .menu > li.current-menu-item::before,
			.off-canvas-widget-area .menu > li.current_page_item::before {
				border-bottom: solid 3px {$active_menu_item_underline_overline};
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li:hover::before {
				transform: scaleX(1);
			}
			.off-canvas-widget-area .menu > li::before {
				transform-origin: 0% 50%;
			}";
		}
	}

	if ( 'zoom' === $menu_item_hover_style_selected ) {
		$custom_css .= '.menu-item-hover-style-zoom .menu.nav-menu > li > a:hover, .menu.nav-menu > .menu-item > .menu-link:hover {
			transition: all 0.3s ease-in-out;
			transform: scale(1.1);
		}';

		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.menu-item-hover-style-zoom .menu.nav-menu > li > a:hover, .menu.nav-menu > .menu-item > .menu-link:hover {
				transition: all 0.3s ease-in-out;
				transform: scale(1.01);
			}
		}";

		$custom_css .= ".off-canvas-widget-area .menu > li > a:hover {
			transition: all 0.3s ease-in-out;
			transform: scale(1.05);
		}";
	}

	// Hamburger Menu Width Style.
	$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
		.main-navigation .menu-toggle{			
			padding:{$hamburger_menu_padding_top}px {$hamburger_menu_padding_right}px {$hamburger_menu_padding_bottom}px {$hamburger_menu_padding_left}px;
		}
	}";
	$custom_css .=
	'@media (max-width:992px) {
		.main-navigation .menu-toggle {
		width: auto;
		padding:' . $hamburger_menu_tablet_padding_top . 'px ' . $hamburger_menu_tablet_padding_right . 'px ' . $hamburger_menu_tablet_padding_bottom . 'px ' . $hamburger_menu_tablet_padding_left . 'px;
		}
	}
	@media (max-width:576px) {
		.main-navigation .menu-toggle {
		width: auto;
		padding:' . $hamburger_menu_mobile_padding_top . 'px ' . $hamburger_menu_mobile_padding_right . 'px ' . $hamburger_menu_mobile_padding_bottom . 'px ' . $hamburger_menu_mobile_padding_left . 'px;
		}
	}';

	// Hamburger Menu Label Font Size.
	$hamburger_menu_label_font_value = get_theme_mod( 'responsive_hamburger_menu_label_font_size', 20 );
	if ( $hamburger_menu_label_font_value ) {
		$custom_css .= ".hamburger-menu-label {
			font-size: {$hamburger_menu_label_font_value}px;
			text-transform: none;
		}";
	}

	// Hamburger Menu Label Color - Apply same color as toggle button icon.
	$header_mobile_tablet_menu_icon_color = get_theme_mod( 'responsive_header_toggle_button_icon_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon_color' ) );
	if ( $header_mobile_tablet_menu_icon_color ) {
		$custom_css .= ".hamburger-menu-label , .menu-toggle, .responsive-off-canvas-panel-close {
			color: {$header_mobile_tablet_menu_icon_color};
		}";
	}

	// Menu Toggle Styles.
	$mobile_menu_toggle_border_color = esc_html( get_theme_mod( 'responsive_mobile_menu_toggle_border_color', Responsive\Core\get_responsive_customizer_defaults( 'mobile_menu_toggle_border_color' ) ) );
	$mobile_menu_border_radius       = esc_html( get_theme_mod( 'responsive_menu_button_radius', Responsive\Core\get_responsive_customizer_defaults( 'menu_button_radius' ) ) );
	$mobile_menu_toggle_style        = get_theme_mod( 'responsive_mobile_menu_toggle_style', 'fill' );

	// Border Width - Outline Toggle button
	$hmt_toggle_mobile_border_width_top = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_top_border', 0);
	$hmt_toggle_mobile_border_width_right = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_right_border', 0);
	$hmt_toggle_mobile_border_width_bottom = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_bottom_border', 0);
	$hmt_toggle_mobile_border_width_left = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_left_border', 0);

	if ( 'fill' === $mobile_menu_toggle_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.site-header-item-toggle-button .menu-toggle, #responsive-off-canvas-panel .responsive-off-canvas-panel-close{
					background-color:{$header_menu_toggle_background_color};
					border: none;
					margin: 0;
				}
			}";

	} elseif ( 'minimal' === $mobile_menu_toggle_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.site-header-item-toggle-button .menu-toggle, #responsive-off-canvas-panel .responsive-off-canvas-panel-close{
					background-color: inherit;
					border: none;
					margin: 0;
				}
				.site-header-item-toggle-button .menu-toggle svg rect:first-child, #responsive-off-canvas-panel .responsive-off-canvas-panel-close svg rect:first-child{
					fill: inherit;
				}	
				.main-navigation .menu-toggle, .responsive-off-canvas-panel-close{
					background-color: {$header_background_color}  ;
					border:none;
				}
				.main-navigation {
					background-color: {$header_background_color};
				}
				
			}";
	} elseif ( 'outline' === $mobile_menu_toggle_style ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				.site-header-item-toggle-button .menu-toggle, #responsive-off-canvas-panel .responsive-off-canvas-panel-close{
					background-color: inherit;
					border-style: solid;
					border-width : {$hmt_toggle_mobile_border_width_top}px {$hmt_toggle_mobile_border_width_right}px {$hmt_toggle_mobile_border_width_bottom}px {$hmt_toggle_mobile_border_width_left}px;
					border-color:{$mobile_menu_toggle_border_color };
					margin: 0;

				}
				.site-header-item-toggle-button .menu-toggle svg rect:first-child, .responsive-off-canvas-panel-close svg rect:first-child{
					fill: inherit;
				}	
			}";
	}

	$responsive_mobile_logo_option = get_theme_mod( 'responsive_mobile_logo_option', 0 );
	$responsive_mobile_logo        = get_theme_mod( 'responsive_mobile_logo' );
	if ( '' !== $responsive_mobile_logo && 1 === $responsive_mobile_logo_option ) {
		$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
			.mobile-custom-logo {
				display: none;
			}
			.custom-logo-link {
				display: grid;
			}
		}
		";
	} else {
		$custom_css .= '.custom-logo-link {
			display: grid;
		}';
	}
	$responsive_hide_last_item_mobile_menu = get_theme_mod( 'responsive_hide_last_item_mobile_menu', 0 );
	if ( 1 === $responsive_hide_last_item_mobile_menu ) {
		$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
			.res-cart-link, .res-last-item {
				display: none;
			}
		}
		";
	}

	// Mobile Menu CSS coming because of Toggle Button
	if ( \Responsive\Core\responsive_check_element_in_mobile_tablet_items('toggle_button', 'header'))
	{
		// removing the stroke from the toggle button SVG 
		$custom_css .= "
			.menu-toggle svg rect:first-child{
				stroke: none;
			}

			.off-canvas-widget-area ul {
				margin-right: 28px;
			}
		

			
		";
		// Applying the Icon color and Icon Size
		$header_mobile_tablet_menu_icon_color = get_theme_mod( 'responsive_header_toggle_button_icon_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon_color' ) );
		$header_mobile_tablet_menu_icon_size  = get_theme_mod( 'responsive_header_toggle_button_icon_size', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_toggle_button_icon_size' ) );

		$custom_css .= "
			.menu-toggle svg > *:not(:first-child) {
				fill: {$header_mobile_tablet_menu_icon_color};
			}
		";
		$custom_css .= "

			.menu-toggle {
				--menu-icon-size: {$header_mobile_tablet_menu_icon_size}px;
			}
			.menu-toggle svg {
				height : {$header_mobile_tablet_menu_icon_size}px;
				width : {$header_mobile_tablet_menu_icon_size}px;
			}
		";

		$header_mobile_tablet_toggle_style = get_theme_mod( 'responsive_mobile_menu_toggle_style', 'fill');
		if( $header_mobile_tablet_toggle_style === 'fill')
		{
			// Apply background color to the entire toggle button (including label area)
			$custom_css .= "
				.site-header-item-toggle-button .menu-toggle {
					background-color: {$header_menu_toggle_background_color};
				}	
				.menu-toggle svg rect:first-child{
					fill : {$header_menu_toggle_background_color};
				}
				.menu-toggle svg circle:first-child{
					fill : {$header_menu_toggle_background_color};
				}
			";
		}

		// Taking the Border Radius Value in case toggle style is not minimal
		if( $header_mobile_tablet_toggle_style !== 'minimal' )
		{
			// Tablet Borders
			$hmt_toggle_tablet_border_top    = get_theme_mod( 'responsive_header_toggle_button_border_radius_tablet_top_padding', 0);
			$hmt_toggle_tablet_border_right  = get_theme_mod( 'responsive_header_toggle_button_border_radius_tablet_right_padding', 0);
			$hmt_toggle_tablet_border_bottom = get_theme_mod( 'responsive_header_toggle_button_border_radius_tablet_bottom_padding', 0);
			$hmt_toggle_tablet_border_left   = get_theme_mod( 'responsive_header_toggle_button_border_radius_tablet_left_padding', 0);
			
			// Tablet Border Width - Toggle button
			$hmt_toggle_tablet_border_width_top = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_tablet_top_border', 0);
			$hmt_toggle_tablet_border_width_right = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_tablet_right_border', 0);
			$hmt_toggle_tablet_border_width_bottom = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_tablet_bottom_border', 0);
			$hmt_toggle_tablet_border_width_left = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_tablet_left_border', 0);


			// Mobile Borders
			$hmt_toggle_mobile_border_top    = get_theme_mod( 'responsive_header_toggle_button_border_radius_mobile_top_padding', 0);
			$hmt_toggle_mobile_border_right  = get_theme_mod( 'responsive_header_toggle_button_border_radius_mobile_right_padding', 0);
			$hmt_toggle_mobile_border_bottom = get_theme_mod( 'responsive_header_toggle_button_border_radius_mobile_bottom_padding', 0);
			$hmt_toggle_mobile_border_left   = get_theme_mod( 'responsive_header_toggle_button_border_radius_mobile_left_padding', 0); 
			
			// Mobile Border Width - Toggle button
			$hmt_toggle_mobile_border_width_top = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_top_border', 0);
			$hmt_toggle_mobile_border_width_right = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_right_border', 0);
			$hmt_toggle_mobile_border_width_bottom = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_bottom_border', 0);
			$hmt_toggle_mobile_border_width_left = get_theme_mod( 'responsive_mobile_menu_toggle_border_width_mobile_left_border', 0);



			$custom_css .= "
				@media (max-width:{$mobile_menu_breakpoint}px) {
					.site-header-item-toggle-button .menu-toggle{
						border-radius : {$hmt_toggle_tablet_border_top}px {$hmt_toggle_tablet_border_right}px {$hmt_toggle_tablet_border_bottom}px {$hmt_toggle_tablet_border_left}px;
						border-width : {$hmt_toggle_tablet_border_width_top}px {$hmt_toggle_tablet_border_width_right}px {$hmt_toggle_tablet_border_width_bottom}px {$hmt_toggle_tablet_border_width_left}px;
					}
				}
			";
			
			$custom_css .= "
				@media (max-width:544px) {
					.site-header-item-toggle-button .menu-toggle{
						border-radius : {$hmt_toggle_mobile_border_top}px {$hmt_toggle_mobile_border_right}px {$hmt_toggle_mobile_border_bottom}px {$hmt_toggle_mobile_border_left}px;
						border-width : {$hmt_toggle_mobile_border_width_top}px {$hmt_toggle_mobile_border_width_right}px {$hmt_toggle_mobile_border_width_bottom}px {$hmt_toggle_mobile_border_width_left}px;
					}
				}
			";
		}

		// Taking the Margin Values around the toggle button
		$hmt_toggle_tablet_margin_top = get_theme_mod( 'responsive_header_toggle_button_margin_tablet_top_padding', 0);
		$hmt_toggle_tablet_margin_right = get_theme_mod( 'responsive_header_toggle_button_margin_tablet_right_padding', 0);
		$hmt_toggle_tablet_margin_bottom = get_theme_mod( 'responsive_header_toggle_button_margin_tablet_bottom_padding', 0);
		$hmt_toggle_tablet_margin_left = get_theme_mod( 'responsive_header_toggle_button_margin_tablet_left_padding', 0);
		$hmt_toggle_mobile_margin_top = get_theme_mod( 'responsive_header_toggle_button_margin_mobile_top_padding', 0);
		$hmt_toggle_mobile_margin_right = get_theme_mod( 'responsive_header_toggle_button_margin_mobile_right_padding', 0);
		$hmt_toggle_mobile_margin_bottom = get_theme_mod( 'responsive_header_toggle_button_margin_mobile_bottom_padding', 0);
		$hmt_toggle_mobile_margin_left = get_theme_mod( 'responsive_header_toggle_button_margin_mobile_left_padding', 0);
		
		$custom_css .= "
				@media (max-width:{$mobile_menu_breakpoint}px) {
					.site-header-item-toggle-button .menu-toggle{
						margin : {$hmt_toggle_tablet_margin_top}px {$hmt_toggle_tablet_margin_right}px {$hmt_toggle_tablet_margin_bottom}px {$hmt_toggle_tablet_margin_left}px;
					}
				}
		";
			
		$custom_css .= "
			@media (max-width:544px) {
				.site-header-item-toggle-button .menu-toggle{
					margin : {$hmt_toggle_mobile_margin_top}px {$hmt_toggle_mobile_margin_right}px {$hmt_toggle_mobile_margin_bottom}px {$hmt_toggle_mobile_margin_left}px;
				}
			}
		";


		// Applying OFF Canvas Panel Styles
		// Content Alignment
		$off_canvas_panel_content_alignment = get_theme_mod( 'responsive_header_mobile_off_canvas_content_alignment', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_mobile_off_canvas_content_alignment' ) );
		$item_aligner = 'left'; 
		$self_aligner = 'flex-start';
		if($off_canvas_panel_content_alignment === 'center') 
		{
			$item_aligner = 'center';
			$self_aligner = 'center';

			$custom_css .= "
				.off-canvas-navigation .menu li.menu-item-has-children a{
		 			padding-left: calc(50% - 23px);
				}
				.off-canvas-navigation .menu:not(.menu-item-has-children){
					text-align: center;
				}
				.off-canvas-navigation .menu li.menu-item-has-children .sub-menu li:not(.menu-item-has-children) a {
					justify-content: center;
				}
				.off-canvas-navigation .menu li.menu-item-has-children .sub-menu li.menu-item-has-children a {
					padding-left: calc(50% - 23px);
				}
			";
		}
		else if($off_canvas_panel_content_alignment === 'right')
		{
			$item_aligner = 'right';
			$self_aligner = 'flex-end';
		}

		if($off_canvas_panel_content_alignment === 'left' || $off_canvas_panel_content_alignment === 'right')
		{
				$custom_css .= "
				#off-canvas-site-navigation .menu:not(#off-canvas-menu) li{
					width: 100%;
				}
				.nav-menu li {
					
					text-align: {$item_aligner};
				}
				#off-canvas-site-navigation li {
					
					text-align: {$item_aligner};
				}

				#off-canvas-site-navigation #off-canvas-menu li.menu-item-has-children a {
					display : flex;
					justify-content: space-between;
					align-items: center;
				}

				.responsive-off-canvas-panel-inner > :not(.off-canvas-widget-area) {
					align-self: {$self_aligner};
				}
			";
		}
		

		if($off_canvas_panel_content_alignment === 'right')
		{
			$custom_css .= "#off-canvas-site-navigation #off-canvas-menu li.menu-item-has-children a {
				flex-direction: row-reverse;

			}";
		}

		// Show/hide menus based on breakpoints when both header-menu and off-canvas-menu exist
		// Only apply these styles when both menus are rendered (both have the respective classes)
		// Desktop: Show header-menu-desktop, hide header-menu-mobile
		// Mobile/Tablet: Hide header-menu-desktop, show header-menu-mobile
		$has_off_canvas_menu = has_nav_menu( 'off-canvas-menu' );
		$has_header_menu = has_nav_menu( 'header-menu' );
		
		if ( $has_off_canvas_menu && $has_header_menu ) {
			$custom_css .= "@media (min-width:" . ($mobile_menu_breakpoint + 1) . "px) {
				.main-navigation .header-menu-mobile {
					display: none !important;
				}
				.main-navigation .header-menu-desktop {
					display: block;
				}
			}
			@media (max-width:{$mobile_menu_breakpoint}px) {
				.main-navigation .header-menu-desktop {
					display: none !important;
				}
				.main-navigation .header-menu-mobile {
					display: block;
				}
				.main-navigation:not(.toggled) .header-menu-mobile {
					display: none;
				}
			}";
		}

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
	if(Responsive\Core\responsive_check_element_present_in_hfb('secondary_navigation', 'header'))
	{

		//-------------------------------------------------
		//************* Secondary Menu Styles *************
		//-------------------------------------------------

		// Sub Menu Animation Style
		$responsive_submenu_animation_style                  = get_theme_mod( 'responsive_submenu_animation_style', 'none' );
		
		if ( 'slide-up' === $responsive_submenu_animation_style ) {
			$custom_css .= "
			.secondary-navigation .menu-item-has-children:hover .sub-menu
			{	
				display: block;
			}

			.secondary-navigation .sub-menu{
			display: none;
		
			}	
			.secondary-navigation .sub-menu	li{
				display: block;
				opacity: 1;
			}

			.secondary-navigation .sub-menu
			{	
				animation: growUp 300ms ease-in-out forwards;
				transform-origin: bottom center;
			}

				@keyframes growUp {
				0% {
					transform: scaleY(0);
				}
				80% {
					transform: scaleY(1.1);
				}
				100% {
					transform: scaleY(1);
				}
			}";
		} elseif ( 'slide-down' === $responsive_submenu_animation_style ) {

			$custom_css .= "
			.secondary-navigation .menu-item-has-children:hover .sub-menu
			{	
				display: block;
			}

			.secondary-navigation .sub-menu{
			display: none;
		
			}	
			.secondary-navigation .sub-menu	li{
				display: block;
				opacity: 1;
			}

			.secondary-navigation .sub-menu
			{	
				animation: growDown 300ms ease-in-out forwards;
				transform-origin: top center;
			}

				@keyframes growDown {
				0% {
					transform: scaleY(0);
				}
				80% {
					transform: scaleY(1.1);
				}
				100% {
					transform: scaleY(1);
				}
			}";
		} else if('fade' === $responsive_submenu_animation_style) {
			$custom_css .= "
			.secondary-navigation .menu-item-has-children:hover .sub-menu
			{	
				display: block;
			}

			.secondary-navigation .sub-menu{
			display: none;
		
			}	
			.secondary-navigation .sub-menu	li{
				display: block;
				opacity: 1;
			}

			.secondary-navigation .sub-menu
			{	
				animation: fadeIn 0.5s ease-in forwards;
				opacity: 0; 
			}

				@keyframes fadeIn {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
				}
			}";
		}

		$header_secondary_menu_background_color        = esc_html( get_theme_mod( 'responsive_header_secondary_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_secondary_menu_background' ) ) );
		$header_secondary_menu_link_color              = esc_html( responsive_prepare_css_value( 'responsive_header_secondary_menu_link_color' ) );
		
		// Secondary menu item hover style
		$secondary_menu_item_hover_style_selected                  = get_theme_mod( 'responsive_secondary_menu_item_hover_style', 'none' );
		$secondary_menu_css_selector = ".secondary-navigation-wrapper>ul>li";

		if ( 'underline' === $secondary_menu_item_hover_style_selected ) {
			$custom_css .= "$secondary_menu_css_selector::after {
				display: block;
				content: '';
				border-bottom: solid 3px {$header_secondary_menu_link_color};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
			}
			.secondary-menu-item-hover-style-underline .secondary-navigation .secondary-menu > li.current-secondary-menu-item::after, .secondary-menu-item-hover-style-underline .secondary-navigation .secondary-menu > li.current_page_item::after , $secondary_menu_css_selector::after{
				border-bottom: solid 3px {$header_secondary_menu_link_color};
			}
			$secondary_menu_css_selector:hover::after { transform: scaleX(1); }
			$secondary_menu_css_selector::after{  transform-origin: 0% 50%; }";
		} elseif ( 'overline' === $secondary_menu_item_hover_style_selected ) {
			$custom_css .= "$secondary_menu_css_selector::before {
				display: block;
				content: '';
				border-bottom: solid 3px {$header_secondary_menu_link_color};
				transform: scaleX(0);
				transition: transform 250ms ease-in-out;
				}
			$secondary_menu_css_selector::before{
				border-bottom: solid 3px {$header_secondary_menu_link_color};
			}
			$secondary_menu_css_selector:hover::before { transform: scaleX(1); }
			$secondary_menu_css_selector::before{  transform-origin: 0% 50%; }";
		}
		else if ( 'zoom' == $secondary_menu_item_hover_style_selected) {
			
			$custom_css .= " .secondary-navigation-wrapper>ul>li > a:hover{
				transition: all 0.3s ease-in-out;
				transform: scale(1.1);
			}";
		
		}
		
		// Hide secondary menu on selected Devices.
		$secondary_menu_desktop_visibility = get_theme_mod( 'responsive_secondary_menu_desktop_visibility', 0 );
		$secondary_menu_desktop_visibility = ( 1 === $secondary_menu_desktop_visibility ) ? 'none' : 'flex';

		$secondary_menu_tablet_visibility = get_theme_mod( 'responsive_secondary_menu_tablet_visibility', 0 );
		$secondary_menu_tablet_visibility = ( 1 === $secondary_menu_tablet_visibility ) ? 'none' : 'flex';

		// $secondary_menu_mobile_visibility = get_theme_mod( 'responsive_secondary_menu_mobile_visibility', 0 );
		// $secondary_menu_mobile_visibility = ( 1 === $secondary_menu_mobile_visibility ) ? 'none' : 'flex';

		$custom_css .= ".secondary-navigation-wrapper {
			display: {$secondary_menu_desktop_visibility};
		}
		
		@media screen and ( max-width: 992px ) {
			.secondary-navigation-wrapper {
				display: {$secondary_menu_tablet_visibility};
			}
		}";

		// @media screen and ( max-width: 576px ) {
		// 	.secondary-navigation-wrapper{
		// 			display: {$secondary_menu_mobile_visibility};
		// 	}
		// ";

		// Secondary Menu Top Offset.
		$secondary_menu_top_offset_value = esc_html( get_theme_mod( 'responsive_secondary_menu_top_offset', 0 ) );
		if ( $secondary_menu_top_offset_value ) {
			$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
				.secondary-navigation li:hover > ul,
				.secondary-navigation li.focus > ul {
					margin-top: {$secondary_menu_top_offset_value}px;
				}
				.secondary-navigation .menu-item-has-children:hover > ul::before,
				.secondary-navigation .page_item_has_children:hover > ul::before {
					position: absolute;
					content: '';
					top: 0;
					left: 0;
					width: 100%;
					transform: translateY(-100%);
					height: {$secondary_menu_top_offset_value}px;
				}
			}";
		}

		// Secondary Sub Menu Width
		$secondary_sub_menu_width = esc_html( get_theme_mod( 'responsive_secondary_sub_menu_width', 0 ) );
		if ( $secondary_sub_menu_width ) {
			$custom_css .= "@media (min-width:{$mobile_menu_breakpoint}px) {
				.secondary-navigation .sub-menu{
					width: {$secondary_sub_menu_width}vw;
				}
			}";
		}
		
		// Secondary Menu items Padding 
		$secondary_menu_padding_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_right_padding', 0 ) );
		$secondary_menu_padding_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_left_padding', 0 ) );
		$secondary_menu_padding_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_top_padding', 0 ) );
		$secondary_menu_padding_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_bottom_padding', 0 ) );

		$secondary_menu_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_right_padding', 0 ) );
		$secondary_menu_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_left_padding', 0 ) );
		$secondary_menu_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_top_padding', 0 ) );
		$secondary_menu_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_bottom_padding', 0 ) );

		$secondary_menu_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_right_padding', 0 ) );
		$secondary_menu_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_left_padding', 0 ) );
		$secondary_menu_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_top_padding', 0 ) );
		$secondary_menu_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_bottom_padding', 0 ) );

		$custom_css .= " #header-secondary-menu>li{
			padding:  {$secondary_menu_padding_top}px {$secondary_menu_padding_right}px {$secondary_menu_padding_bottom}px {$secondary_menu_padding_left}px ; 

		}
		@media ( max-width: 992px ) {
			#header-secondary-menu>li{
				padding:  {$secondary_menu_tablet_padding_top}px {$secondary_menu_tablet_padding_right}px {$secondary_menu_tablet_padding_bottom}px {$secondary_menu_tablet_padding_left}px ; 
			}
		}
		@media ( max-width: 576px ) {
			#header-secondary-menu>li{
				padding:  {$secondary_menu_mobile_padding_top}px {$secondary_menu_mobile_padding_right}px {$secondary_menu_mobile_padding_bottom}px {$secondary_menu_mobile_padding_left}px ; 
			}
		}";

		// Secondary Menu items Margin
		$secondary_menu_margin_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_right_padding', 0 ) );
		$secondary_menu_margin_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_left_padding', 0 ) );
		$secondary_menu_margin_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_top_padding', 0 ) );
		$secondary_menu_margin_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_bottom_padding', 0 ) );

		$secondary_menu_tablet_margin_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_right_padding', 0 ) );
		$secondary_menu_tablet_margin_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_left_padding', 0 ) );
		$secondary_menu_tablet_margin_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_top_padding', 0 ) );
		$secondary_menu_tablet_margin_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_bottom_padding', 0 ) );

		$secondary_menu_mobile_margin_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_right_padding', 0 ) );
		$secondary_menu_mobile_margin_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_left_padding', 0 ) );
		$secondary_menu_mobile_margin_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_top_padding', 0 ) );
		$secondary_menu_mobile_margin_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_bottom_padding', 0 ) );

		$custom_css .= " #header-secondary-menu>li{
			margin:  {$secondary_menu_margin_top}px {$secondary_menu_margin_right}px {$secondary_menu_margin_bottom}px {$secondary_menu_margin_left}px ; 

		}
		@media ( max-width: 992px ) {
			#header-secondary-menu>li{
				margin:  {$secondary_menu_tablet_margin_top}px {$secondary_menu_tablet_margin_right}px {$secondary_menu_tablet_margin_bottom}px {$secondary_menu_tablet_margin_left}px ; 
			}
		}
		@media ( max-width: 576px ) {
			#header-secondary-menu>li{
				margin:  {$secondary_menu_mobile_margin_top}px {$secondary_menu_mobile_margin_right}px {$secondary_menu_mobile_margin_bottom}px {$secondary_menu_mobile_margin_left}px ; 
			}
		}";

		
		// Secondary Menu colors


		$custom_css .= 	"	
			.secondary-navigation a {
				color: {$header_secondary_menu_link_color} ; 
			}
			.secondary-navigation a:hover {
				color: {$header_secondary_menu_link_color} ; 
			}";


		$custom_css .= "		
			.secondary-navigation {
				background-color: {$header_secondary_menu_background_color};
			}";

		$secondary_sub_menu_divider       = esc_html( get_theme_mod( 'responsive_secondary_sub_menu_divider', 0 ) );


		if ( 1 == $secondary_sub_menu_divider ) {
			
			$custom_css .= "
			.secondary-navigation .children li, .secondary-navigation .sub-menu li {
				border-bottom-width: 1px;
				border-style: solid;
				border-color: black ; /* for now */
			}
			.secondary-navigation .children li:last-child, .secondary-navigation .sub-menu li:last-child {
				border-style: none;
			}
			";
		}

		// Drop down icon styling
		$custom_css .= ".secondary-navigation .res-iconify svg{
			float: right;
			stroke: {$header_secondary_menu_link_color};

		}";
		$custom_css .= ".secondary-navigation .menu-item-has-children > a {
			display: flex;
			align-items: center;
		}";
		$custom_css .= ".secondary-navigation .res-iconify.no-menu {
				top: 16.3px;
		}";
	}

	// Mobile Header Secondary Menu Element CSS - Start
	// Apply mobile-specific styles when secondary menu is in mobile header items
	if ( Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'secondary_navigation', 'header' ) ) {
		// Get the same secondary menu settings (shared between desktop and mobile)
		$secondary_menu_desktop_visibility = get_theme_mod( 'responsive_secondary_menu_desktop_visibility', 0 );
		$secondary_menu_tablet_visibility = get_theme_mod( 'responsive_secondary_menu_tablet_visibility', 0 );
		
		// Apply visibility settings for mobile header
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation .secondary-navigation-wrapper {";
		$custom_css .= "display: " . ( 1 === $secondary_menu_desktop_visibility ? 'none' : 'flex' ) . ";";
		$custom_css .= "}";
		
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation .secondary-navigation-wrapper {";
		$custom_css .= "display: " . ( 1 === $secondary_menu_tablet_visibility ? 'none' : 'flex' ) . ";";
		$custom_css .= "}";
		$custom_css .= "}";
		
		// Apply the same styling from desktop secondary menu
		$header_secondary_menu_background_color = esc_html( get_theme_mod( 'responsive_header_secondary_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_secondary_menu_background' ) ) );
		$header_secondary_menu_link_color = esc_html( responsive_prepare_css_value( 'responsive_header_secondary_menu_link_color' ) );
		
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation .secondary-navigation a {";
		$custom_css .= "color: {$header_secondary_menu_link_color};";
		$custom_css .= "}";
		
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation .secondary-navigation a:hover {";
		$custom_css .= "color: {$header_secondary_menu_link_color};";
		$custom_css .= "}";
		
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation .secondary-navigation {";
		$custom_css .= "background-color: {$header_secondary_menu_background_color};";
		$custom_css .= "}";
		
		// Secondary Menu items Padding for mobile/tablet
		$secondary_menu_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_right_padding', 0 ) );
		$secondary_menu_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_left_padding', 0 ) );
		$secondary_menu_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_top_padding', 0 ) );
		$secondary_menu_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_tablet_bottom_padding', 0 ) );

		$secondary_menu_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_right_padding', 0 ) );
		$secondary_menu_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_left_padding', 0 ) );
		$secondary_menu_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_top_padding', 0 ) );
		$secondary_menu_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-padding_mobile_bottom_padding', 0 ) );

		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation #header-secondary-menu>li {";
		$custom_css .= "padding: {$secondary_menu_tablet_padding_top}px {$secondary_menu_tablet_padding_right}px {$secondary_menu_tablet_padding_bottom}px {$secondary_menu_tablet_padding_left}px;";
		$custom_css .= "}";
		$custom_css .= "}";
		
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation #header-secondary-menu>li {";
		$custom_css .= "padding: {$secondary_menu_mobile_padding_top}px {$secondary_menu_mobile_padding_right}px {$secondary_menu_mobile_padding_bottom}px {$secondary_menu_mobile_padding_left}px;";
		$custom_css .= "}";
		$custom_css .= "}";
		
		// Secondary Menu items Margin for mobile/tablet
		$secondary_menu_tablet_margin_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_right_padding', 0 ) );
		$secondary_menu_tablet_margin_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_left_padding', 0 ) );
		$secondary_menu_tablet_margin_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_top_padding', 0 ) );
		$secondary_menu_tablet_margin_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_tablet_bottom_padding', 0 ) );

		$secondary_menu_mobile_margin_right  = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_right_padding', 0 ) );
		$secondary_menu_mobile_margin_left   = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_left_padding', 0 ) );
		$secondary_menu_mobile_margin_top    = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_top_padding', 0 ) );
		$secondary_menu_mobile_margin_bottom = esc_html( get_theme_mod( 'responsive_secondary-menu-margin_mobile_bottom_padding', 0 ) );

		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation #header-secondary-menu>li {";
		$custom_css .= "margin: {$secondary_menu_tablet_margin_top}px {$secondary_menu_tablet_margin_right}px {$secondary_menu_tablet_margin_bottom}px {$secondary_menu_tablet_margin_left}px;";
		$custom_css .= "}";
		$custom_css .= "}";
		
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".responsive-mobile-header-wrapper .site-header-item-secondary-navigation #header-secondary-menu>li {";
		$custom_css .= "margin: {$secondary_menu_mobile_margin_top}px {$secondary_menu_mobile_margin_right}px {$secondary_menu_mobile_margin_bottom}px {$secondary_menu_mobile_margin_left}px;";
		$custom_css .= "}";
		$custom_css .= "}";
		
		//Mobile Header Secondary Menu Element CSS - End
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

	$custom_css .= "
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

	$page_priority = is_page() && get_post_meta( get_the_ID(), 'responsive_page_meta_content_width', true ) ? '!important' : '';
	$custom_css .= "
	@media (min-width:992px) {
		.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) .content-area {
			width:{$page_content_width}%" . "{$page_priority};
		}
		.page aside.widget-area:not(.home-widgets) {
			width: calc(100% - {$page_content_width}%)" . "{$page_priority};
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

	if(Responsive\Core\responsive_check_element_present_in_hfb('header_widgets1', 'header'))
	{
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
	}

	// Footer Widget Alignment.
	$footer_widgets_columns = get_theme_mod( 'responsive_footer_widgets_columns' );
	for ( $i = 1; $i <= $footer_widgets_columns; $i++ ) {
		$alignment_desktop = esc_html( get_theme_mod( 'responsive_footer_widget_alignment_desktop_' . $i, 'left' ) );
		$alignment_tablet  = esc_html( get_theme_mod( 'responsive_footer_widget_alignment_tablet_' . $i, 'center' ) );
		$alignment_mobile  = esc_html( get_theme_mod( 'responsive_footer_widget_alignment_mobile_' . $i, 'center' ) );
		$custom_css       .= ".footer-widget-{$i} .footer-widget-wrapper {
			text-align: {$alignment_desktop};
		}
		@media screen and ( max-width: 992px ) {
			.footer-widget-{$i} .footer-widget-wrapper {
				text-align: {$alignment_tablet};
			}
		}
		@media screen and ( max-width: 576px ) {
			.footer-widget-{$i} .footer-widget-wrapper {
				text-align: {$alignment_mobile};
			}
		}
		";
	}

	// Hide on select Devices.
	$footer_widget_desktop_visibility = get_theme_mod( 'responsive_footer_widget_desktop_visibility', 0 );
	$footer_widget_desktop_visibility = ( 1 === $footer_widget_desktop_visibility ) ? 'none' : 'block';

	$footer_widget_tablet_visibility = get_theme_mod( 'responsive_footer_widget_tablet_visibility', 0 );
	$footer_widget_tablet_visibility = ( 1 === $footer_widget_tablet_visibility ) ? 'none' : 'block';

	$footer_widget_mobile_visibility = get_theme_mod( 'responsive_footer_widget_mobile_visibility', 0 );
	$footer_widget_mobile_visibility = ( 1 === $footer_widget_mobile_visibility ) ? 'none' : 'block';

	$custom_css .= ".footer-widgets {
		display: {$footer_widget_desktop_visibility};

	}
	@media screen and ( max-width: 992px ) {
	    .footer-widgets {
			display: {$footer_widget_tablet_visibility};
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .footer-widgets {
			display: {$footer_widget_mobile_visibility};
	    }
	}";

	// footer_bar Padding.
	$footer_bar_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_right_padding', 0 ) );
	$footer_bar_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_left_padding', 0 ) );
	$footer_bar_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_top_padding', 0 ) );
	$footer_bar_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_bottom_padding', 0 ) );

	$footer_bar_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_right_padding', 0 ) );
	$footer_bar_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_left_padding', 0 ) );
	$footer_bar_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_top_padding', 0 ) );
	$footer_bar_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_tablet_bottom_padding', 0 ) );

	$footer_bar_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_right_padding', 0 ) );
	$footer_bar_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_left_padding', 0 ) );
	$footer_bar_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_top_padding', 0 ) );
	$footer_bar_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_footer_bar_mobile_bottom_padding', 0 ) );

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
	// $footer_border_color     = esc_html( get_theme_mod( 'responsive_footer_border_color', '#aaaaaa' ) );
	// $footer_border_size      = esc_html( get_theme_mod( 'responsive_footer_border_size', 1 ) );

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
	}";

	// Hide Copyright on selected Devices.

	$copyright_desktop_visibility = get_theme_mod( 'responsive_copyright', 0 );
	$copyright_desktop_visibility = ( 1 === $copyright_desktop_visibility ) ? 'none' : 'block';

	$copyright_tablet_visibility = get_theme_mod( 'responsive_copyright_tablet', 0 );
	$copyright_tablet_visibility = ( 1 === $copyright_tablet_visibility ) ? 'none' : 'block';

	$copyright_mobile_visibility = get_theme_mod( 'responsive_copyright_mobile', 0 );
	$copyright_mobile_visibility = ( 1 === $copyright_mobile_visibility ) ? 'none' : 'block';

	if(Responsive\Core\responsive_check_element_present_in_hfb('footer_copyright', 'footer')) {
		$custom_css .= ".footer-layouts.copyright {
			display: {$copyright_desktop_visibility};
		}";
	}

	if(Responsive\Core\responsive_check_element_in_mobile_tablet_items('footer_copyright', 'footer')) {
		$custom_css .= "
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
	}

	// Scroll To Top.
	if ( Responsive\Core\responsive_check_element_present_in_hfb( 'scroll_to_top', 'footer' ) || Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'scroll_to_top', 'footer' ) ) {
		$stt_devices                     = get_theme_mod( 'responsive_scroll_to_top_on_devices' );
		$stt_position                    = get_theme_mod( 'responsive_scroll_to_top_icon_position', 'right' );
		$stt_icon_size                   = get_theme_mod( 'responsive_scroll_to_top_icon_size' );
		$stt_icon_size_tablet            = get_theme_mod( 'responsive_scroll_to_top_icon_size_tablet', $stt_icon_size );
		$stt_icon_size_mobile            = get_theme_mod( 'responsive_scroll_to_top_icon_size_mobile', $stt_icon_size );
		$stt_icon_radius                 = get_theme_mod( 'responsive_scroll_to_top_icon_radius', 50 );
		$stt_icon_radius_tablet          = get_theme_mod( 'responsive_scroll_to_top_icon_radius_tablet', $stt_icon_radius );
		$stt_icon_radius_mobile          = get_theme_mod( 'responsive_scroll_to_top_icon_radius_mobile', $stt_icon_radius );
		$stt_icon_color                  = get_theme_mod( 'responsive_scroll_to_top_icon_color' );
		$stt_icon_color_tablet           = get_theme_mod( 'responsive_scroll_to_top_icon_color_tablet', $stt_icon_color );
		$stt_icon_color_mobile           = get_theme_mod( 'responsive_scroll_to_top_icon_color_mobile', $stt_icon_color );
		$stt_icon_hover_color            = get_theme_mod( 'responsive_scroll_to_top_icon_color_hover' );
		$stt_icon_hover_color_tablet     = get_theme_mod( 'responsive_scroll_to_top_icon_color_tablet_hover', $stt_icon_hover_color );
		$stt_icon_hover_color_mobile     = get_theme_mod( 'responsive_scroll_to_top_icon_color_mobile_hover', $stt_icon_hover_color );
		$stt_icon_background_color       = get_theme_mod( 'responsive_scroll_to_top_icon_background_color' );
		$stt_icon_backgrond_color_tablet = get_theme_mod( 'responsive_scroll_to_top_icon_background_color_tablet', $stt_icon_background_color );
		$stt_icon_background_color_mobile = get_theme_mod( 'responsive_scroll_to_top_icon_background_color_mobile', $stt_icon_background_color );
		$stt_icon_background_hover_color = get_theme_mod( 'responsive_scroll_to_top_icon_background_color_hover' );
		$stt_icon_background_hover_color_tablet = get_theme_mod( 'responsive_scroll_to_top_icon_background_color_tablet_hover', $stt_icon_background_hover_color );
		$stt_icon_background_hover_color_mobile = get_theme_mod( 'responsive_scroll_to_top_icon_background_color_mobile_hover', $stt_icon_background_hover_color );

		$custom_css .= '@media (min-width: 769px) {
		#scroll {
		content: "769"; } }

		#scroll {
			position: fixed;
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
		if ( ! empty( $stt_icon_size ) ) {
			$custom_css .= "#scroll {
				height: {$stt_icon_size}px;
				width: {$stt_icon_size}px;
			}";
		}
		if ( ! empty( $stt_icon_size_tablet ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				#scroll {
					height: {$stt_icon_size_tablet}px;
					width: {$stt_icon_size_tablet}px;
				}
			}";
		}
		if ( ! empty( $stt_icon_size_mobile ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				#scroll {
					height: {$stt_icon_size_mobile}px;
					width: {$stt_icon_size_mobile}px;
				}
			}";
		}
		if ( ! empty( $stt_position ) && 'left' === $stt_position ) {
			$custom_css .= ".responsive-scroll-wrap {
				margin-right: auto;
			}
			.site-footer-row-columns-1:has(.footer-section-inner-items-1 .responsive-scroll-wrap){
				justify-content: flex-start;
			}";
		} else {
			$custom_css .= ".responsive-scroll-wrap, .site-footer-row-columns-1:has(.footer-section-inner-items-1 .responsive-scroll-wrap) {
				margin-left: auto;
			}
			.site-footer-row-columns-1:has(.footer-section-inner-items-1 .responsive-scroll-wrap){
				justify-content: flex-end;
			}";
		}
		if ( isset( $stt_icon_radius ) ) {
			$custom_css .= "#scroll {
				border-radius: {$stt_icon_radius}%;
			}";
		}
		if ( isset( $stt_icon_radius_tablet ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				#scroll {
					border-radius: {$stt_icon_radius_tablet}%;
				}
			}";
		}
		if ( isset( $stt_icon_radius_mobile ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				#scroll {
					border-radius: {$stt_icon_radius_mobile}%;
				}
			}";
		}
		if ( ! empty( $stt_icon_background_color ) ) {
			$custom_css .= "#scroll {
				background-color: {$stt_icon_background_color};
			}";
		}
		if( ! empty( $stt_icon_backgrond_color_tablet ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				#scroll {
					background-color: {$stt_icon_backgrond_color_tablet};
				}
			}";
		}
		if( ! empty( $stt_icon_background_color_mobile ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				#scroll {
					background-color: {$stt_icon_background_color_mobile};
				}
			}";
		}
		if ( ! empty( $stt_icon_background_color_hover ) ) {
			$custom_css .= "#scroll:hover {
				background-color: {$stt_icon_background_color_hover};
			}";
		}
		if( ! empty( $stt_icon_background_color_tablet_hover ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				#scroll:hover {
					background-color: {$stt_icon_background_color_tablet_hover};
				}
			}";
		}
		if( ! empty( $stt_icon_background_color_mobile_hover ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				#scroll:hover {
					background-color: {$stt_icon_background_color_mobile_hover};
				}
			}";
		}
		if ( ! empty( $stt_icon_color ) ) {
			$custom_css .= "#scroll span {
				border-bottom-color : {$stt_icon_color};
			}";
		}
		if( ! empty( $stt_icon_color_tablet ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				#scroll span {
					border-bottom-color : {$stt_icon_color_tablet};
				}
			}";
		}
		if( ! empty( $stt_icon_color_mobile ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				#scroll span {
					border-bottom-color : {$stt_icon_color_mobile};
				}
			}";
		}
		if ( ! empty( $stt_icon_hover_color ) ) {
			$custom_css .= "#scroll:hover span {
				border-bottom-color : {$stt_icon_hover_color};
			}";
		}
		if( ! empty( $stt_icon_hover_color_tablet ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				#scroll:hover span {
					border-bottom-color : {$stt_icon_hover_color_tablet};
				}
			}";
		}
		if( ! empty( $stt_icon_hover_color_mobile ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				#scroll:hover span {
					border-bottom-color : {$stt_icon_hover_color_mobile};
				}
			}";
		}
	}
	$responsive_single_blog_related_posts_title_alignment = get_theme_mod( 'responsive_single_blog_related_posts_title_alignment', 'left' );
	$custom_css                        .= ".single:not(.single-product) .responsive-related-single-posts-title{
		text-align : $responsive_single_blog_related_posts_title_alignment;
	}";
	$related_single_posts_per_row_count = absint( get_theme_mod( 'responsive_single_blog_related_posts_per_row', 2 ) );
	$section_background_color           = get_theme_mod( 'responsive_rp_section_bg_color', get_theme_mod( 'responsive_box_background_color', Responsive\Core\get_responsive_customizer_defaults( 'rp_section_bg' ) ) );
	$section_title_color 				= get_theme_mod( 'responsive_rp_section_title_color', '#333333' );
	$custom_css                        .= "
	.responsive-single-related-posts-container, .responsive-single-related-posts-container .responsive-related-single-posts-wrapper .responsive-related-single-post {
		background: {$section_background_color};
	}
	.responsive-related-single-posts-title {
		color: {$section_title_color};
	}
	.responsive-single-related-posts-container .responsive-related-single-posts-wrapper {
	    display: grid;
		grid-column-gap: 25px;
		grid-row-gap: 25px;
	}
	@media screen and ( min-width: 993px ) {
	    .responsive-single-related-posts-container .responsive-related-single-posts-wrapper {
			grid-template-columns: repeat( $related_single_posts_per_row_count, 1fr );
	    }
	}
	@media screen and ( max-width: 992px ) {
	    .responsive-single-related-posts-container .responsive-related-single-posts-wrapper {
			grid-template-columns: repeat( 2, 1fr );
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .responsive-single-related-posts-container .responsive-related-single-posts-wrapper {
			grid-template-columns: repeat( 1 , 1fr );
	    }
	}";
	// Apply Global Button colors for Elementor buttons when disable default colors is checked.
	$disable_elementor_default_color_setting = 'yes' === get_option( 'elementor_disable_color_schemes' ) ? true : false;

	if( $disable_elementor_default_color_setting ) {
		$custom_css .= "
			.elementor-button-wrapper .elementor-button, .elementor-widget-button .elementor-button {
				background-color: {$button_color};
				color: {$button_text_color};
				fill: {$button_text_color};
				border-color: {$button_border_color}
			}
			.elementor-button-wrapper .elementor-button:hover, .elementor-widget-button .elementor-button:hover {
				background-color: {$button_hover_color};
				color: {$button_hover_text_color};
				border-color: {$button_hover_border_color}
			}
			.elementor-button-wrapper .elementor-button:hover svg, .elementor-widget-button .elementor-button:hover svg {
				fill: {$button_hover_text_color};
			}
		";
	}
	// Apply Global Button Settings for RAE Button widget.
	// $button_
	$custom_css .="
		.elementor-widget-rael-button .rael-button {
			border-style: solid;
			border-color: ' . $button_border_color . ';
			border-top-width: ' . $buttons_border_width_top . 'px;
			border-right-width: ' . $buttons_border_width_right . 'px;
			border-bottom-width: ' . $buttons_border_width_bottom . 'px;
			border-left-width: ' . $buttons_border_width_left . 'px;
		}
		.elementor-widget-rael-button .rael-button:hover {
			border-style: solid;
			border-color: ' . $button_hover_border_color . ';
			border-top-width: ' . $buttons_border_width_top . 'px;
			border-right-width: ' . $buttons_border_width_right . 'px;
			border-bottom-width: ' . $buttons_border_width_bottom . 'px;
			border-left-width: ' . $buttons_border_width_left . 'px;
		}
	";

	/**Header Footer Builder Styles */
	$custom_css .= "
		.site-header-row {
			display: grid;
			grid-template-columns: auto auto;
			overflow-wrap: anywhere;
		}
		.site-header-section-right {
			justify-content: flex-end;
		}

		.site-header-row.site-header-row-center-column {
			grid-template-columns: 1fr auto 1fr;
		}

		.site-header-section {
			display: flex;
			max-height: inherit;
			align-items: center;
		}

		.site-header-section > .site-header-item:last-child {
			margin-right: 0;
		}

		.site-header-section-center {
			justify-content: center;
		}

		.site-header-item {
			display: flex;
			align-items: center;
			margin-right: 10px;
			max-height: inherit;
		}

		.site-header-row { /* for backward compatibility */
			margin-right: -15px;
			margin-left: -15px;
		}

		.site-header-row > .site-header-section {
			flex-wrap: nowrap;
		}

		.site-header-section:has(.main-navigation.toggled) {
			display: block;
		}
		.res-transparent-header {
			#masthead,
			#masthead-mobile,
			#main-header-mobile,
			.responsive-site-above-header-wrap,
			.responsive-site-primary-header-wrap,
			.responsive-site-below-header-wrap,
			.responsive-site-above-mobile-header-wrap,
			.responsive-site-primary-mobile-header-wrap,
			.responsive-site-below-mobile-header-wrap,
			.responsive-site-below-header-wrap:hover,
			.responsive-site-primary-header-wrap:hover,
			.responsive-site-above-header-wrap:hover,
			.responsive-site-below-mobile-header-wrap:hover,
			.responsive-site-primary-mobile-header-wrap:hover,
			.responsive-site-above-mobile-header-wrap:hover {
				background: transparent;
			}
		}
		.sticky-header {
			.responsive-site-above-header-wrap,
			.responsive-site-primary-header-wrap,
			.responsive-site-below-header-wrap,
			.responsive-site-below-header-wrap:hover,
			.responsive-site-primary-header-wrap:hover,
			.responsive-site-above-header-wrap:hover, 
			.responsive-site-above-mobile-header-wrap,
			.responsive-site-primary-mobile-header-wrap,
			.responsive-site-below-mobile-header-wrap,
			.responsive-site-below-mobile-header-wrap:hover,
			.responsive-site-primary-mobile-header-wrap:hover,
			.responsive-site-above-mobile-header-wrap:hover {
				background: transparent;
			}
		}
		.site-header-focus-item > .customize-partial-edit-shortcut button {
			left: 0;
		}

		/* Mobile Header Row Styles - Items in same row displayed horizontally */
		.site-mobile-header-row {
			display: grid;
			grid-template-columns: auto auto;
			overflow-wrap: anywhere;
		}
		.site-mobile-header-section-right {
			justify-content: flex-end;
		}
		.site-mobile-header-row.site-mobile-header-row-center-column {
			grid-template-columns: 1fr auto 1fr;
		}
		.site-mobile-header-section {
			display: flex;
			max-height: inherit;
			align-items: center;
		}
		.site-mobile-header-section > .site-mobile-header-item:last-child {
			margin-right: 0;
		}
		.site-mobile-header-section-center {
			justify-content: center;
		}
		.site-mobile-header-item {
			display: flex;
			align-items: center;
			margin-right: 10px;
			max-height: inherit;
		}
		.site-mobile-header-row {
			margin-right: -15px;
			margin-left: -15px;
		}
		.site-mobile-header-row > .site-mobile-header-section {
			flex-wrap: nowrap;
		}
	";
	$hfb_header_above_row_visibility = get_theme_mod( 'responsive_header_above_row_visibility', array( 'desktop', 'tablet', 'mobile' ) );
	if( ! in_array( 'desktop', $hfb_header_above_row_visibility ) ) {
		$custom_css .= ".responsive-site-above-header-wrap {
			display: none;
		}";
	} else {
		$custom_css .= ".responsive-site-above-header-wrap {
			display: block;
		}";
	}
	if( ! in_array( 'tablet', $hfb_header_above_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-above-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-above-header-wrap {
					display: block;
			}
		}";
	}
	if( ! in_array( 'mobile', $hfb_header_above_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-above-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-above-header-wrap {
					display: block;
			}
		}";
	}

	$hfb_header_primary_row_visibility = get_theme_mod( 'responsive_header_primary_row_visibility', array( 'desktop', 'tablet', 'mobile' ) );
	if( ! in_array( 'desktop', $hfb_header_primary_row_visibility ) ) {
		$custom_css .= ".responsive-site-primary-header-wrap {
			display: none;
		}";
	} else {
		$custom_css .= ".responsive-site-primary-header-wrap {
			display: block;
		}";
	}
	if( ! in_array( 'tablet', $hfb_header_primary_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-primary-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-primary-header-wrap {
					display: block;
			}
		}";
	}
	if( ! in_array( 'mobile', $hfb_header_primary_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-primary-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-primary-header-wrap {
					display: block;
			}
		}";
	}

	$hfb_header_below_row_visibility = get_theme_mod( 'responsive_header_below_row_visibility', array( 'desktop', 'tablet', 'mobile' ) );
	if( ! in_array( 'desktop', $hfb_header_below_row_visibility ) ) {
		$custom_css .= ".responsive-site-below-header-wrap {
			display: none;
		}";
	} else {
		$custom_css .= ".responsive-site-below-header-wrap {
			display: block;
		}";
	}
	if( ! in_array( 'tablet', $hfb_header_below_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-below-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-below-header-wrap {
					display: block;
			}
		}";
	}
	if( ! in_array( 'mobile', $hfb_header_below_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-below-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-below-header-wrap {
					display: block;
			}
		}";
	}

	/**
	 * For Desktop and Mobile Header Height
	 */
	$hfb_header_above_row_height_desktop = get_theme_mod( 'responsive_header_above_row_height', 0 );
	$hfb_header_above_row_height_tablet  = get_theme_mod( 'responsive_header_above_row_height_tablet', 0 );
	$hfb_header_above_row_height_mobile  = get_theme_mod( 'responsive_header_above_row_height_mobile', 0 );

	$hfb_header_primary_row_height_desktop = get_theme_mod( 'responsive_header_primary_row_height', 0 );
	$hfb_header_primary_row_height_tablet  = get_theme_mod( 'responsive_header_primary_row_height_tablet', 0 );
	$hfb_header_primary_row_height_mobile  = get_theme_mod( 'responsive_header_primary_row_height_mobile', 0 );

	$hfb_header_below_row_height_desktop = get_theme_mod( 'responsive_header_below_row_height', 0 );
	$hfb_header_below_row_height_tablet  = get_theme_mod( 'responsive_header_below_row_height_tablet', 0 );
	$hfb_header_below_row_height_mobile  = get_theme_mod( 'responsive_header_below_row_height_mobile', 0 );
	$custom_css .= "
		.site-above-header-inner-wrap {
			min-height: {$hfb_header_above_row_height_desktop}px;
		}
		@media screen and ( max-width: 992px ) {
			.site-above-mobile-header-inner-wrap {
				min-height: {$hfb_header_above_row_height_tablet}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.site-above-mobile-header-inner-wrap {
				min-height: {$hfb_header_above_row_height_mobile}px;
			}
		}
		.site-primary-header-inner-wrap {
			min-height: {$hfb_header_primary_row_height_desktop}px;
		}
		@media screen and ( max-width: 992px ) {
			.site-primary-mobile-header-inner-wrap {
				min-height: {$hfb_header_primary_row_height_tablet}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.site-primary-mobile-header-inner-wrap {
				min-height: {$hfb_header_primary_row_height_mobile}px;
			}
		}
		.site-below-header-inner-wrap {
			min-height: {$hfb_header_below_row_height_desktop}px;
		}
		@media screen and ( max-width: 992px ) {
			.site-below-mobile-header-inner-wrap {
				min-height: {$hfb_header_below_row_height_tablet}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.site-below-mobile-header-inner-wrap {
				min-height: {$hfb_header_below_row_height_mobile}px;
			}
		}
	";

	// Desktop colors
	$header_above_row_bg_color = get_theme_mod( 'responsive_header_above_row_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_above_row_bg_color' ) );
	$header_above_row_bg_hover_color = get_theme_mod( 'responsive_header_above_row_bg_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_above_row_bg_hover_color' ) );
	
	// Tablet colors (for mobile header on tablet)
	$header_above_row_bg_color_tablet = get_theme_mod( 'responsive_header_above_row_bg_color_tablet', $header_above_row_bg_color );
	$header_above_row_bg_hover_color_tablet = get_theme_mod( 'responsive_header_above_row_bg_color_tablet_hover', $header_above_row_bg_hover_color );
	
	// Mobile colors (for mobile header on mobile)
	$header_above_row_bg_color_mobile = get_theme_mod( 'responsive_header_above_row_bg_color_mobile', $header_above_row_bg_color );
	$header_above_row_bg_hover_color_mobile = get_theme_mod( 'responsive_header_above_row_bg_color_mobile_hover', $header_above_row_bg_hover_color );
	
	// Desktop border size
	$header_above_row_bottom_border_size  = get_theme_mod( 'responsive_header_above_row_bottom_border_size', 0 );
	$header_above_row_bottom_border_size_tablet = get_theme_mod( 'responsive_header_above_row_bottom_border_size_tablet', $header_above_row_bottom_border_size );
	$header_above_row_bottom_border_size_mobile = get_theme_mod( 'responsive_header_above_row_bottom_border_size_mobile', $header_above_row_bottom_border_size );
	
	// Desktop border colors
	$header_above_row_bottom_border_color = get_theme_mod( 'responsive_header_above_row_bottom_border_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_above_row_bottom_border_color' ) );
	$header_above_row_bottom_border_hover_color = get_theme_mod( 'responsive_header_above_row_bottom_border_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_above_row_bottom_border_hover_color' ) );
	
	// Tablet border colors (for mobile header on tablet)
	$header_above_row_bottom_border_color_tablet = get_theme_mod( 'responsive_header_above_row_bottom_border_color_tablet', $header_above_row_bottom_border_color );
	$header_above_row_bottom_border_hover_color_tablet = get_theme_mod( 'responsive_header_above_row_bottom_border_color_tablet_hover', $header_above_row_bottom_border_hover_color );
	
	// Mobile border colors (for mobile header on mobile)
	$header_above_row_bottom_border_color_mobile = get_theme_mod( 'responsive_header_above_row_bottom_border_color_mobile', $header_above_row_bottom_border_color );
	$header_above_row_bottom_border_hover_color_mobile = get_theme_mod( 'responsive_header_above_row_bottom_border_color_mobile_hover', $header_above_row_bottom_border_hover_color );

	// Desktop colors
	$header_primary_row_bg_color = get_theme_mod( 'responsive_header_primary_row_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_primary_row_bg_color' ) );
	$header_primary_row_bg_hover_color = get_theme_mod( 'responsive_header_primary_row_bg_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_primary_row_bg_hover_color' ) );
	
	// Tablet colors (for mobile header on tablet)
	$header_primary_row_bg_color_tablet = get_theme_mod( 'responsive_header_primary_row_bg_color_tablet', $header_primary_row_bg_color );
	$header_primary_row_bg_hover_color_tablet = get_theme_mod( 'responsive_header_primary_row_bg_color_tablet_hover', $header_primary_row_bg_hover_color );
	
	// Mobile colors (for mobile header on mobile)
	$header_primary_row_bg_color_mobile = get_theme_mod( 'responsive_header_primary_row_bg_color_mobile', $header_primary_row_bg_color );
	$header_primary_row_bg_hover_color_mobile = get_theme_mod( 'responsive_header_primary_row_bg_color_mobile_hover', $header_primary_row_bg_hover_color );
	
	// Desktop border size - Primary Row
	$header_primary_row_bottom_border_size  = get_theme_mod( 'responsive_header_primary_row_bottom_border_size', 1 );
	$header_primary_row_bottom_border_size_tablet = get_theme_mod( 'responsive_header_primary_row_bottom_border_size_tablet', $header_primary_row_bottom_border_size );
	$header_primary_row_bottom_border_size_mobile = get_theme_mod( 'responsive_header_primary_row_bottom_border_size_mobile', $header_primary_row_bottom_border_size );
	
	// Desktop border colors
	$header_primary_row_bottom_border_color = get_theme_mod( 'responsive_header_primary_row_bottom_border_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_primary_row_bottom_border_color' ) );
	$header_primary_row_bottom_border_hover_color = get_theme_mod( 'responsive_header_primary_row_bottom_border_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_primary_row_bottom_border_hover_color' ) );
	
	// Tablet border colors (for mobile header on tablet)
	$header_primary_row_bottom_border_color_tablet = get_theme_mod( 'responsive_header_primary_row_bottom_border_color_tablet', $header_primary_row_bottom_border_color );
	$header_primary_row_bottom_border_hover_color_tablet = get_theme_mod( 'responsive_header_primary_row_bottom_border_color_tablet_hover', $header_primary_row_bottom_border_hover_color );
	
	// Mobile border colors (for mobile header on mobile)
	$header_primary_row_bottom_border_color_mobile = get_theme_mod( 'responsive_header_primary_row_bottom_border_color_mobile', $header_primary_row_bottom_border_color );
	$header_primary_row_bottom_border_hover_color_mobile = get_theme_mod( 'responsive_header_primary_row_bottom_border_color_mobile_hover', $header_primary_row_bottom_border_hover_color );

	// Desktop colors
	$header_below_row_bg_color = get_theme_mod( 'responsive_header_below_row_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_below_row_bg_color' ) );
	$header_below_row_bg_hover_color = get_theme_mod( 'responsive_header_below_row_bg_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_below_row_bg_hover_color' ) );
	
	// Tablet colors (for mobile header on tablet)
	$header_below_row_bg_color_tablet = get_theme_mod( 'responsive_header_below_row_bg_color_tablet', $header_below_row_bg_color );
	$header_below_row_bg_hover_color_tablet = get_theme_mod( 'responsive_header_below_row_bg_color_tablet_hover', $header_below_row_bg_hover_color );
	
	// Mobile colors (for mobile header on mobile)
	$header_below_row_bg_color_mobile = get_theme_mod( 'responsive_header_below_row_bg_color_mobile', $header_below_row_bg_color );
	$header_below_row_bg_hover_color_mobile = get_theme_mod( 'responsive_header_below_row_bg_color_mobile_hover', $header_below_row_bg_hover_color );
	
	// Desktop border size - Below Row
	$header_below_row_bottom_border_size  = get_theme_mod( 'responsive_header_below_row_bottom_border_size', 0 );
	$header_below_row_bottom_border_size_tablet = get_theme_mod( 'responsive_header_below_row_bottom_border_size_tablet', $header_below_row_bottom_border_size );
	$header_below_row_bottom_border_size_mobile = get_theme_mod( 'responsive_header_below_row_bottom_border_size_mobile', $header_below_row_bottom_border_size );
	
	// Desktop border colors - Below Row
	$header_below_row_bottom_border_color = get_theme_mod( 'responsive_header_below_row_bottom_border_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_below_row_bottom_border_color' ) );
	$header_below_row_bottom_border_hover_color = get_theme_mod( 'responsive_header_below_row_bottom_border_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_below_row_bottom_border_hover_color' ) );
	
	// Tablet border colors (for mobile header on tablet)
	$header_below_row_bottom_border_color_tablet = get_theme_mod( 'responsive_header_below_row_bottom_border_color_tablet', $header_below_row_bottom_border_color );
	$header_below_row_bottom_border_hover_color_tablet = get_theme_mod( 'responsive_header_below_row_bottom_border_color_tablet_hover', $header_below_row_bottom_border_hover_color );
	
	// Mobile border colors (for mobile header on mobile)
	$header_below_row_bottom_border_color_mobile = get_theme_mod( 'responsive_header_below_row_bottom_border_color_mobile', $header_below_row_bottom_border_color );
	$header_below_row_bottom_border_hover_color_mobile = get_theme_mod( 'responsive_header_below_row_bottom_border_color_mobile_hover', $header_below_row_bottom_border_hover_color );

	$custom_css .= "
		.responsive-site-above-header-wrap {
			background-color: {$header_above_row_bg_color};
			border-bottom: {$header_above_row_bottom_border_size}px solid {$header_above_row_bottom_border_color};
		}
		.responsive-site-above-header-wrap:hover {
			background-color: {$header_above_row_bg_hover_color};
			border-bottom: {$header_above_row_bottom_border_size}px solid {$header_above_row_bottom_border_hover_color};
		}
		.responsive-site-primary-header-wrap {
			background-color: {$header_primary_row_bg_color};
			border-bottom: {$header_primary_row_bottom_border_size}px solid {$header_primary_row_bottom_border_color};
		}
		.responsive-site-primary-header-wrap:hover {
			background-color: {$header_primary_row_bg_hover_color};
			border-bottom: {$header_primary_row_bottom_border_size}px solid {$header_primary_row_bottom_border_hover_color};
		}
		.responsive-site-below-header-wrap {
			background-color: {$header_below_row_bg_color};
			border-bottom: {$header_below_row_bottom_border_size}px solid {$header_below_row_bottom_border_color};
		}
		.responsive-site-below-header-wrap:hover {
			background-color: {$header_below_row_bg_hover_color};
			border-bottom: {$header_below_row_bottom_border_size}px solid {$header_below_row_bottom_border_hover_color};
		}
		
		/* Mobile Header - Tablet screens (max-width: mobile_menu_breakpoint px) */
		@media screen and ( max-width: {$mobile_menu_breakpoint}px ) {
			.responsive-site-above-mobile-header-wrap {
				background-color: {$header_above_row_bg_color_tablet};
				border-bottom: {$header_above_row_bottom_border_size_tablet}px solid {$header_above_row_bottom_border_color_tablet};
			}
			.responsive-site-above-mobile-header-wrap:hover {
				background-color: {$header_above_row_bg_hover_color_tablet};
				border-bottom: {$header_above_row_bottom_border_size_tablet}px solid {$header_above_row_bottom_border_hover_color_tablet};
			}
			
			.responsive-site-primary-mobile-header-wrap {
				background-color: {$header_primary_row_bg_color_tablet};
				border-bottom: {$header_primary_row_bottom_border_size_tablet}px solid {$header_primary_row_bottom_border_color_tablet};
			}
			.responsive-site-primary-mobile-header-wrap:hover {
				background-color: {$header_primary_row_bg_hover_color_tablet};
				border-bottom: {$header_primary_row_bottom_border_size_tablet}px solid {$header_primary_row_bottom_border_hover_color_tablet};
			}
			
			.responsive-site-below-mobile-header-wrap {
				background-color: {$header_below_row_bg_color_tablet};
				border-bottom: {$header_below_row_bottom_border_size_tablet}px solid {$header_below_row_bottom_border_color_tablet};
			}
			.responsive-site-below-mobile-header-wrap:hover {
				background-color: {$header_below_row_bg_hover_color_tablet};
				border-bottom: {$header_below_row_bottom_border_size_tablet}px solid {$header_below_row_bottom_border_hover_color_tablet};
			}
		}
		
		/* Mobile Header - Mobile screens (max-width: 576px) */
		@media screen and ( max-width: 576px ) {
			.responsive-site-above-mobile-header-wrap {
				background-color: {$header_above_row_bg_color_mobile};
				border-bottom: {$header_above_row_bottom_border_size_mobile}px solid {$header_above_row_bottom_border_color_mobile};
			}
			.responsive-site-above-mobile-header-wrap:hover {
				background-color: {$header_above_row_bg_hover_color_mobile};
				border-bottom: {$header_above_row_bottom_border_size_mobile}px solid {$header_above_row_bottom_border_hover_color_mobile};
			}
			
			.responsive-site-primary-mobile-header-wrap {
				background-color: {$header_primary_row_bg_color_mobile};
				border-bottom: {$header_primary_row_bottom_border_size_mobile}px solid {$header_primary_row_bottom_border_color_mobile};
			}
			.responsive-site-primary-mobile-header-wrap:hover {
				background-color: {$header_primary_row_bg_hover_color_mobile};
				border-bottom: {$header_primary_row_bottom_border_size_mobile}px solid {$header_primary_row_bottom_border_hover_color_mobile};
			}
			
			.responsive-site-below-mobile-header-wrap {
				background-color: {$header_below_row_bg_color_mobile};
				border-bottom: {$header_below_row_bottom_border_size_mobile}px solid {$header_below_row_bottom_border_color_mobile};
			}
			.responsive-site-below-mobile-header-wrap:hover {
				background-color: {$header_below_row_bg_hover_color_mobile};
				border-bottom: {$header_below_row_bottom_border_size_mobile}px solid {$header_below_row_bottom_border_hover_color_mobile};
			}
		}
	";

	// Heder Above Row Padding.
	$header_above_row_padding_right  = esc_html( get_theme_mod( 'responsive_header_above_row_padding_right_padding', 0 ) );
	$header_above_row_padding_left   = esc_html( get_theme_mod( 'responsive_header_above_row_padding_left_padding', 0 ) );
	$header_above_row_padding_top    = esc_html( get_theme_mod( 'responsive_header_above_row_padding_top_padding', 0 ) );
	$header_above_row_padding_bottom = esc_html( get_theme_mod( 'responsive_header_above_row_padding_bottom_padding', 0 ) );

	$header_above_row_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_header_above_row_padding_tablet_right_padding', 0 ) );
	$header_above_row_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_header_above_row_padding_tablet_left_padding', 0 ) );
	$header_above_row_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_header_above_row_padding_tablet_top_padding', 0 ) );
	$header_above_row_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_header_above_row_padding_tablet_bottom_padding', 0 ) );

	$header_above_row_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_header_above_row_padding_mobile_right_padding', 0 ) );
	$header_above_row_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_header_above_row_padding_mobile_left_padding', 0 ) );
	$header_above_row_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_header_above_row_padding_mobile_top_padding', 0 ) );
	$header_above_row_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_header_above_row_padding_mobile_bottom_padding', 0 ) );

	// Heder Above Row Margin.
	$header_above_row_margin_right  = esc_html( get_theme_mod( 'responsive_header_above_row_margin_right_padding', 0 ) );
	$header_above_row_margin_left   = esc_html( get_theme_mod( 'responsive_header_above_row_margin_left_padding', 0 ) );
	$header_above_row_margin_top    = esc_html( get_theme_mod( 'responsive_header_above_row_margin_top_padding', 0 ) );
	$header_above_row_margin_bottom = esc_html( get_theme_mod( 'responsive_header_above_row_margin_bottom_padding', 0 ) );

	$header_above_row_tablet_margin_right  = esc_html( get_theme_mod( 'responsive_header_above_row_margin_tablet_right_padding', 0 ) );
	$header_above_row_tablet_margin_left   = esc_html( get_theme_mod( 'responsive_header_above_row_margin_tablet_left_padding', 0 ) );
	$header_above_row_tablet_margin_top    = esc_html( get_theme_mod( 'responsive_header_above_row_margin_tablet_top_padding', 0 ) );
	$header_above_row_tablet_margin_bottom = esc_html( get_theme_mod( 'responsive_header_above_row_margin_tablet_bottom_padding', 0 ) );

	$header_above_row_mobile_margin_right  = esc_html( get_theme_mod( 'responsive_header_above_row_margin_mobile_right_padding', 0 ) );
	$header_above_row_mobile_margin_left   = esc_html( get_theme_mod( 'responsive_header_above_row_margin_mobile_left_padding', 0 ) );
	$header_above_row_mobile_margin_top    = esc_html( get_theme_mod( 'responsive_header_above_row_margin_mobile_top_padding', 0 ) );
	$header_above_row_mobile_margin_bottom = esc_html( get_theme_mod( 'responsive_header_above_row_margin_mobile_bottom_padding', 0 ) );

	$custom_css .= '.responsive-site-above-header-wrap {
	    padding: ' . responsive_spacing_css( $header_above_row_padding_top, $header_above_row_padding_right, $header_above_row_padding_bottom, $header_above_row_padding_left ) . ';
	    margin: ' . responsive_spacing_css( $header_above_row_margin_top, $header_above_row_margin_right, $header_above_row_margin_bottom, $header_above_row_margin_left ) . ';
	}
	@media screen and ( max-width: ' . $mobile_menu_breakpoint .'px ) {
	    .responsive-site-above-mobile-header-wrap {
	        padding: ' . responsive_spacing_css( $header_above_row_tablet_padding_top, $header_above_row_tablet_padding_right, $header_above_row_tablet_padding_bottom, $header_above_row_tablet_padding_left ) . ';
	        margin: ' . responsive_spacing_css( $header_above_row_tablet_margin_top, $header_above_row_tablet_margin_right, $header_above_row_tablet_margin_bottom, $header_above_row_tablet_margin_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .responsive-site-above-mobile-header-wrap {
	        padding: ' . responsive_spacing_css( $header_above_row_mobile_padding_top, $header_above_row_mobile_padding_right, $header_above_row_mobile_padding_bottom, $header_above_row_mobile_padding_left ) . ';
	        margin: ' . responsive_spacing_css( $header_above_row_mobile_margin_top, $header_above_row_mobile_margin_right, $header_above_row_mobile_margin_bottom, $header_above_row_mobile_margin_left ) . ';
	    }
	}';

	// Header Primary Row Padding.
	$header_primary_row_padding_right  = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_right_padding', 0 ) );
	$header_primary_row_padding_left   = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_left_padding', 0 ) );
	$header_primary_row_padding_top    = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_top_padding', 0 ) );
	$header_primary_row_padding_bottom = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_bottom_padding', 0 ) );

	$header_primary_row_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_tablet_right_padding', 0 ) );
	$header_primary_row_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_tablet_left_padding', 0 ) );
	$header_primary_row_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_tablet_top_padding', 0 ) );
	$header_primary_row_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_tablet_bottom_padding', 0 ) );

	$header_primary_row_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_mobile_right_padding', 0 ) );
	$header_primary_row_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_mobile_left_padding', 0 ) );
	$header_primary_row_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_mobile_top_padding', 0 ) );
	$header_primary_row_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_header_primary_row_padding_mobile_bottom_padding', 0 ) );

	// Header Primary Row Margin.
	$header_primary_row_margin_right  = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_right_padding', 0 ) );
	$header_primary_row_margin_left   = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_left_padding', 0 ) );
	$header_primary_row_margin_top    = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_top_padding', 0 ) );
	$header_primary_row_margin_bottom = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_bottom_padding', 0 ) );

	$header_primary_row_tablet_margin_right  = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_tablet_right_padding', 0 ) );
	$header_primary_row_tablet_margin_left   = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_tablet_left_padding', 0 ) );
	$header_primary_row_tablet_margin_top    = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_tablet_top_padding', 0 ) );
	$header_primary_row_tablet_margin_bottom = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_tablet_bottom_padding', 0 ) );

	$header_primary_row_mobile_margin_right  = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_mobile_right_padding', 0 ) );
	$header_primary_row_mobile_margin_left   = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_mobile_left_padding', 0 ) );
	$header_primary_row_mobile_margin_top    = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_mobile_top_padding', 0 ) );
	$header_primary_row_mobile_margin_bottom = esc_html( get_theme_mod( 'responsive_header_primary_row_margin_mobile_bottom_padding', 0 ) );

	$custom_css .= '.responsive-site-primary-header-wrap {
	    padding: ' . responsive_spacing_css( $header_primary_row_padding_top, $header_primary_row_padding_right, $header_primary_row_padding_bottom, $header_primary_row_padding_left ) . ';
	    margin: ' . responsive_spacing_css( $header_primary_row_margin_top, $header_primary_row_margin_right, $header_primary_row_margin_bottom, $header_primary_row_margin_left ) . ';
	}
	@media screen and ( max-width: '. $mobile_menu_breakpoint .'px ) {
	    .responsive-site-primary-mobile-header-wrap {
	        padding: ' . responsive_spacing_css( $header_primary_row_tablet_padding_top, $header_primary_row_tablet_padding_right, $header_primary_row_tablet_padding_bottom, $header_primary_row_tablet_padding_left ) . ';
	        margin: ' . responsive_spacing_css( $header_primary_row_tablet_margin_top, $header_primary_row_tablet_margin_right, $header_primary_row_tablet_margin_bottom, $header_primary_row_tablet_margin_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .responsive-site-primary-mobile-header-wrap {
	        padding: ' . responsive_spacing_css( $header_primary_row_mobile_padding_top, $header_primary_row_mobile_padding_right, $header_primary_row_mobile_padding_bottom, $header_primary_row_mobile_padding_left ) . ';
	        margin: ' . responsive_spacing_css( $header_primary_row_mobile_margin_top, $header_primary_row_mobile_margin_right, $header_primary_row_mobile_margin_bottom, $header_primary_row_mobile_margin_left ) . ';
	    }
	}';

	// Header Below Row Padding.
	$header_below_row_padding_right  = esc_html( get_theme_mod( 'responsive_header_below_row_padding_right_padding', 0 ) );
	$header_below_row_padding_left   = esc_html( get_theme_mod( 'responsive_header_below_row_padding_left_padding', 0 ) );
	$header_below_row_padding_top    = esc_html( get_theme_mod( 'responsive_header_below_row_padding_top_padding', 0 ) );
	$header_below_row_padding_bottom = esc_html( get_theme_mod( 'responsive_header_below_row_padding_bottom_padding', 0 ) );

	$header_below_row_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_header_below_row_padding_tablet_right_padding', 0 ) );
	$header_below_row_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_header_below_row_padding_tablet_left_padding', 0 ) );
	$header_below_row_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_header_below_row_padding_tablet_top_padding', 0 ) );
	$header_below_row_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_header_below_row_padding_tablet_bottom_padding', 0 ) );

	$header_below_row_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_header_below_row_padding_mobile_right_padding', 0 ) );
	$header_below_row_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_header_below_row_padding_mobile_left_padding', 0 ) );
	$header_below_row_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_header_below_row_padding_mobile_top_padding', 0 ) );
	$header_below_row_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_header_below_row_padding_mobile_bottom_padding', 0 ) );

	// Heder Below Row Margin.
	$header_below_row_margin_right  = esc_html( get_theme_mod( 'responsive_header_below_row_margin_right_padding', 0 ) );
	$header_below_row_margin_left   = esc_html( get_theme_mod( 'responsive_header_below_row_margin_left_padding', 0 ) );
	$header_below_row_margin_top    = esc_html( get_theme_mod( 'responsive_header_below_row_margin_top_padding', 0 ) );
	$header_below_row_margin_bottom = esc_html( get_theme_mod( 'responsive_header_below_row_margin_bottom_padding', 0 ) );

	$header_below_row_tablet_margin_right  = esc_html( get_theme_mod( 'responsive_header_below_row_margin_tablet_right_padding', 0 ) );
	$header_below_row_tablet_margin_left   = esc_html( get_theme_mod( 'responsive_header_below_row_margin_tablet_left_padding', 0 ) );
	$header_below_row_tablet_margin_top    = esc_html( get_theme_mod( 'responsive_header_below_row_margin_tablet_top_padding', 0 ) );
	$header_below_row_tablet_margin_bottom = esc_html( get_theme_mod( 'responsive_header_below_row_margin_tablet_bottom_padding', 0 ) );

	$header_below_row_mobile_margin_right  = esc_html( get_theme_mod( 'responsive_header_below_row_margin_mobile_right_padding', 0 ) );
	$header_below_row_mobile_margin_left   = esc_html( get_theme_mod( 'responsive_header_below_row_margin_mobile_left_padding', 0 ) );
	$header_below_row_mobile_margin_top    = esc_html( get_theme_mod( 'responsive_header_below_row_margin_mobile_top_padding', 0 ) );
	$header_below_row_mobile_margin_bottom = esc_html( get_theme_mod( 'responsive_header_below_row_margin_mobile_bottom_padding', 0 ) );

	$custom_css .= '.responsive-site-below-header-wrap {
	    padding: ' . responsive_spacing_css( $header_below_row_padding_top, $header_below_row_padding_right, $header_below_row_padding_bottom, $header_below_row_padding_left ) . ';
	    margin: ' . responsive_spacing_css( $header_below_row_margin_top, $header_below_row_margin_right, $header_below_row_margin_bottom, $header_below_row_margin_left ) . ';
	}
	@media screen and ( max-width: '. $mobile_menu_breakpoint .'px ) {
	    .responsive-site-below-mobile-header-wrap {
	        padding: ' . responsive_spacing_css( $header_below_row_tablet_padding_top, $header_below_row_tablet_padding_right, $header_below_row_tablet_padding_bottom, $header_below_row_tablet_padding_left ) . ';
	        margin: ' . responsive_spacing_css( $header_below_row_tablet_margin_top, $header_below_row_tablet_margin_right, $header_below_row_tablet_margin_bottom, $header_below_row_tablet_margin_left ) . ';
	    }
	}
	@media screen and ( max-width: 576px ) {
	    .responsive-site-below-mobile-header-wrap {
	        padding: ' . responsive_spacing_css( $header_below_row_mobile_padding_top, $header_below_row_mobile_padding_right, $header_below_row_mobile_padding_bottom, $header_below_row_mobile_padding_left ) . ';
	        margin: ' . responsive_spacing_css( $header_below_row_mobile_margin_top, $header_below_row_mobile_margin_right, $header_below_row_mobile_margin_bottom, $header_below_row_mobile_margin_left ) . ';
	    }
	}';
	// Footer Builder
	$above_footer_inner_column_spacing = get_theme_mod( 'responsive_footer_above_inner_column_spacing', 30 );
	$above_footer_inner_column_tablet_spacing = get_theme_mod( 'responsive_footer_above_inner_column_spacing_tablet', 30 );
	$above_footer_inner_column_mobile_spacing = get_theme_mod( 'responsive_footer_above_inner_column_spacing_mobile', 30 );
	$above_footer_height 			   = get_theme_mod( 'responsive_footer_above_height', 30 );
	$above_footer_height_tablet          = get_theme_mod( 'responsive_footer_above_height_tablet', $above_footer_height );
	$above_footer_height_mobile          = get_theme_mod( 'responsive_footer_above_height_mobile', $above_footer_height );
	$above_footer_vertical_alignment   = get_theme_mod( 'responsive_footer_above_vertical_alignment', 'flex-start' );
	$above_footer_vertical_alignment_tablet   = get_theme_mod( 'responsive_footer_above_vertical_alignment_tablet', $above_footer_vertical_alignment );
	$above_footer_vertical_alignment_mobile   = get_theme_mod( 'responsive_footer_above_vertical_alignment_mobile', $above_footer_vertical_alignment );
	$above_footer_bg_color   		   = get_theme_mod( 'responsive_footer_above_row_bg_color', '#333' );
	$above_footer_bg_color_tablet      = get_theme_mod( 'responsive_footer_above_row_bg_color_tablet', '#333' );
	$above_footer_bg_color_mobile	   = get_theme_mod( 'responsive_footer_above_row_bg_color_mobile', '#333' );
	$above_footer_top_border_size      = get_theme_mod( 'responsive_footer_above_row_top_border_size', 0 );
	$above_footer_top_border_size_tablet = get_theme_mod( 'responsive_footer_above_row_top_border_size_tablet', $above_footer_top_border_size );
	$above_footer_top_border_size_mobile = get_theme_mod( 'responsive_footer_above_row_top_border_size_mobile', $above_footer_top_border_size );
	$above_footer_top_border_color     = get_theme_mod( 'responsive_footer_above_row_border_color', '#FFF' );
	$above_footer_top_border_color_tablet = get_theme_mod( 'responsive_footer_above_row_border_color_tablet', $above_footer_top_border_color );
	$above_footer_top_border_color_mobile = get_theme_mod( 'responsive_footer_above_row_border_color_mobile', $above_footer_top_border_color );

	$custom_css .= "
		.rspv-site-above-footer-inner-wrap {
			gap: {$above_footer_inner_column_spacing}px;
			min-height: {$above_footer_height}px;
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-above-footer-inner-wrap {
				min-height: {$above_footer_height_tablet}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-above-footer-inner-wrap {
				min-height: {$above_footer_height_mobile}px;
			}
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-above-footer-inner-wrap {
				gap: {$above_footer_inner_column_tablet_spacing}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-above-footer-inner-wrap {
				gap: {$above_footer_inner_column_mobile_spacing}px;
			}
		}
		.rspv-site-above-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-above-footer-wrap .site-footer-row {
			align-items: {$above_footer_vertical_alignment};
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-above-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-above-footer-wrap .site-footer-row {
				align-items: {$above_footer_vertical_alignment_tablet};
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-above-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-above-footer-wrap .site-footer-row {
				align-items: {$above_footer_vertical_alignment_mobile};
			}
		}
		.rspv-site-above-footer-wrap{
			background-color: {$above_footer_bg_color};
		}
		
	";

	$custom_css .= "
		@media screen and ( max-width: 992px ) {
			.rspv-site-above-footer-wrap {
				background-color: {$above_footer_bg_color_tablet};
			}
		}";

	$custom_css .= "
		@media screen and ( max-width: 576px ) {
			.rspv-site-above-footer-wrap {
				background-color: {$above_footer_bg_color_mobile};
			}
		}";

	if( 0 < $above_footer_top_border_size ) {
		$custom_css.= "
		@media screen and ( min-width: 993px ) {
			.rspv-site-above-footer-wrap {
				border-top: {$above_footer_top_border_size}px solid {$above_footer_top_border_color};
			}
		}";
	}
	if( 0 < $above_footer_top_border_size_tablet ) {
		$custom_css.= "
		@media screen and ( min-width: 577px ) and ( max-width: 992px ) {
			.rspv-site-above-footer-wrap {
				border-top: {$above_footer_top_border_size_tablet}px solid {$above_footer_top_border_color_tablet};
			}
		}";
	}
	if( 0 < $above_footer_top_border_size_mobile ) {
		$custom_css.= "
		@media screen and ( max-width: 576px ) {
			.rspv-site-above-footer-wrap {
				border-top: {$above_footer_top_border_size_mobile}px solid {$above_footer_top_border_color_mobile};
			}
		}";
	}
	
	// Primary Footer
	$primary_footer_inner_column_spacing 	    = get_theme_mod( 'responsive_footer_primary_inner_column_spacing', 30 );
	$primary_footer_inner_column_tablet_spacing = get_theme_mod( 'responsive_footer_primary_inner_column_spacing_tablet', 30 );
	$primary_footer_inner_column_mobile_spacing = get_theme_mod( 'responsive_footer_primary_inner_column_spacing_mobile', 30 );
	$primary_footer_height 			            = get_theme_mod( 'responsive_footer_primary_height', 30 );
	$primary_footer_height_tablet 	            = get_theme_mod( 'responsive_footer_primary_height_tablet', $primary_footer_height );
	$primary_footer_height_mobile 	            = get_theme_mod( 'responsive_footer_primary_height_mobile', $primary_footer_height );
	$primary_footer_vertical_alignment          = get_theme_mod( 'responsive_footer_primary_vertical_alignment', 'center' );
	$primary_footer_vertical_alignment_tablet   = get_theme_mod( 'responsive_footer_primary_vertical_alignment_tablet', $primary_footer_vertical_alignment );
	$primary_footer_vertical_alignment_mobile   = get_theme_mod( 'responsive_footer_primary_vertical_alignment_mobile', $primary_footer_vertical_alignment );
	$primary_footer_bg_color   		     	    = get_theme_mod( 'responsive_footer_primary_row_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_bg_color' ) );
	$primary_footer_bg_color_tablet             = get_theme_mod( 'responsive_footer_primary_row_bg_color_tablet', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_bg_color' ) );
	$primary_footer_bg_color_mobile             = get_theme_mod( 'responsive_footer_primary_row_bg_color_mobile', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_primary_row_bg_color' ) );
	$primary_footer_top_border_size             = get_theme_mod( 'responsive_footer_primary_row_top_border_size', 1 );
	$primary_footer_top_border_size_tablet      = get_theme_mod( 'responsive_footer_primary_row_top_border_size_tablet', $primary_footer_top_border_size );
	$primary_footer_top_border_size_mobile      = get_theme_mod( 'responsive_footer_primary_row_top_border_size_mobile', $primary_footer_top_border_size );
	$primary_footer_top_border_color            = get_theme_mod( 'responsive_footer_primary_row_border_color', '#aaaaaa' );
	$primary_footer_top_border_color_tablet     = get_theme_mod( 'responsive_footer_primary_row_border_color_tablet', $primary_footer_top_border_color );
	$primary_footer_top_border_color_mobile     = get_theme_mod( 'responsive_footer_primary_row_border_color_mobile', $primary_footer_top_border_color );

	$custom_css .= "
		.rspv-site-primary-footer-inner-wrap {
			gap: {$primary_footer_inner_column_spacing}px;
			min-height: {$primary_footer_height}px;
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-primary-footer-inner-wrap {
				gap: {$primary_footer_inner_column_tablet_spacing}px;
				min-height: {$primary_footer_height_tablet}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-primary-footer-inner-wrap {
				gap: {$primary_footer_inner_column_mobile_spacing}px;
				min-height: {$primary_footer_height_mobile}px;
			}
		}
		.rspv-site-primary-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-primary-footer-wrap .site-footer-row {
			align-items: {$primary_footer_vertical_alignment};
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-primary-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-primary-footer-wrap .site-footer-row {
				align-items: {$primary_footer_vertical_alignment_tablet};
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-primary-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-primary-footer-wrap .site-footer-row {
				align-items: {$primary_footer_vertical_alignment_mobile};
			}
		}
		.rspv-site-primary-footer-wrap{
			background-color: {$primary_footer_bg_color};
		}
		
	";

	$custom_css .= "
		@media screen and ( max-width: 992px ) {
			.rspv-site-primary-footer-wrap {
				background-color: {$primary_footer_bg_color_tablet};
			}
		}";
	$custom_css .= "
		@media screen and ( max-width: 576px ) {
			.rspv-site-primary-footer-wrap {
				background-color: {$primary_footer_bg_color_mobile};
			}
		}";

	if( 0 < $primary_footer_top_border_size ) {
		$custom_css.= "
		@media screen and ( min-width: 993px ) {
			.rspv-site-primary-footer-wrap {
				border-top: {$primary_footer_top_border_size}px solid {$primary_footer_top_border_color};
			}
		}";
	}
	if( 0 < $primary_footer_top_border_size_tablet ) {
		$custom_css.= "
		@media screen and ( min-width: 577px ) and ( max-width: 992px ) {
			.rspv-site-primary-footer-wrap {
				border-top: {$primary_footer_top_border_size_tablet}px solid {$primary_footer_top_border_color_tablet};
			}
		}";
	}
	if( 0 < $primary_footer_top_border_size_mobile ) {
		$custom_css.= "
		@media screen and ( max-width: 576px ) {
			.rspv-site-primary-footer-wrap {
				border-top: {$primary_footer_top_border_size_mobile}px solid {$primary_footer_top_border_color_mobile};
			}
		}";
	}
	// Below Footer
	$below_footer_inner_column_spacing = get_theme_mod( 'responsive_footer_below_inner_column_spacing', 30 );
	$below_footer_inner_column_tablet_spacing = get_theme_mod( 'responsive_footer_below_inner_column_spacing_tablet', 30 );
	$below_footer_inner_column_mobile_spacing = get_theme_mod( 'responsive_footer_below_inner_column_spacing_mobile', 30 );
	$below_footer_height 			   = get_theme_mod( 'responsive_footer_below_height', 30 );
	$below_footer_height_tablet          = get_theme_mod( 'responsive_footer_below_height_tablet', $below_footer_height );
	$below_footer_height_mobile          = get_theme_mod( 'responsive_footer_below_height_mobile', $below_footer_height );
	$below_footer_vertical_alignment   = get_theme_mod( 'responsive_footer_below_vertical_alignment', 'flex-start' );
	$below_footer_vertical_alignment_tablet   = get_theme_mod( 'responsive_footer_below_vertical_alignment_tablet', $below_footer_vertical_alignment );
	$below_footer_vertical_alignment_mobile   = get_theme_mod( 'responsive_footer_below_vertical_alignment_mobile', $below_footer_vertical_alignment );
	$below_footer_bg_color   		   = get_theme_mod( 'responsive_footer_below_row_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_below_row_bg_color' ) );
	$below_footer_bg_color_tablet      = get_theme_mod( 'responsive_footer_below_row_bg_color_tablet', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_below_row_bg_color' ) );
	$below_footer_bg_color_mobile      = get_theme_mod( 'responsive_footer_below_row_bg_color_mobile', Responsive\Core\get_responsive_customizer_defaults( 'responsive_footer_below_row_bg_color' ) );
	$below_footer_top_border_size      = get_theme_mod( 'responsive_footer_below_row_top_border_size', 1 );
	$below_footer_top_border_size_tablet = get_theme_mod( 'responsive_footer_below_row_top_border_size_tablet', $below_footer_top_border_size );
	$below_footer_top_border_size_mobile = get_theme_mod( 'responsive_footer_below_row_top_border_size_mobile', $below_footer_top_border_size );
	$below_footer_top_border_color     = get_theme_mod( 'responsive_footer_below_row_border_color', '#0066CC' );
	$below_footer_top_border_color_tablet = get_theme_mod( 'responsive_footer_below_row_border_color_tablet', $below_footer_top_border_color );
	$below_footer_top_border_color_mobile = get_theme_mod( 'responsive_footer_below_row_border_color_mobile', $below_footer_top_border_color );
	

	$custom_css .= "
		.rspv-site-below-footer-inner-wrap {
			gap: {$below_footer_inner_column_spacing}px;
			min-height: {$below_footer_height}px;
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-below-footer-inner-wrap {
				gap: {$below_footer_inner_column_tablet_spacing}px;
				min-height: {$below_footer_height_tablet}px;
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-below-footer-inner-wrap {
				gap: {$below_footer_inner_column_mobile_spacing}px;
				min-height: {$below_footer_height_mobile}px;
			}
		}
		.rspv-site-below-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-below-footer-wrap .site-footer-row {
			align-items: {$below_footer_vertical_alignment};
		}
		@media screen and ( max-width: 992px ) {
			.rspv-site-below-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-below-footer-wrap .site-footer-row {
				align-items: {$below_footer_vertical_alignment_tablet};
			}
		}
		@media screen and ( max-width: 576px ) {
			.rspv-site-below-footer-wrap.rspv-hfb-footer-row-stack .site-footer-row, .rspv-site-below-footer-wrap .site-footer-row {
				align-items: {$below_footer_vertical_alignment_mobile};
			}
		}
		.rspv-site-below-footer-wrap{
			background-color: {$below_footer_bg_color};
		}
	";
	$custom_css .= "
		@media screen and ( max-width: 992px ) {
			.rspv-site-below-footer-wrap {
				background-color: {$below_footer_bg_color_tablet};
			}
		}";
	$custom_css .= "
		@media screen and ( max-width: 576px ) {
			.rspv-site-below-footer-wrap {
				background-color: {$below_footer_bg_color_mobile};
			}
		}";	
	if( 0 < $below_footer_top_border_size ) {
		$custom_css.= "
		@media screen and ( min-width: 993px ) {
			.rspv-site-below-footer-wrap {
				border-top: {$below_footer_top_border_size}px solid {$below_footer_top_border_color};
			}
		}";
	}
	if( 0 < $below_footer_top_border_size_tablet ) {
		$custom_css.= "
		@media screen and ( min-width: 577px ) and ( max-width: 992px ) {
			.rspv-site-below-footer-wrap {
				border-top: {$below_footer_top_border_size_tablet}px solid {$below_footer_top_border_color_tablet};
			}
		}";
	}
	if( 0 < $below_footer_top_border_size_mobile ) {
		$custom_css.= "
		@media screen and ( max-width: 576px ) {
			.rspv-site-below-footer-wrap {
				border-top: {$below_footer_top_border_size_mobile}px solid {$below_footer_top_border_color_mobile};
			}
		}";
	}
	if( ! function_exists( 'get_responsive_spacing_values' ) ) {
		// Function to get padding and margin values dynamically for different breakpoints
		function get_responsive_spacing_values($prefix, $default_top = 0,$default_right = 0, $default_bottom = 0, $default_left = 0, $breakpoints = ['desktop', 'tablet', 'mobile']) {
			$values = [];
			foreach ($breakpoints as $breakpoint) {
				if ($breakpoint === 'desktop') {
					$values[$breakpoint] = [
						'top'    => esc_html(get_theme_mod("{$prefix}_top_padding", $default_top)),
						'right'  => esc_html(get_theme_mod("{$prefix}_right_padding", $default_right)),
						'bottom' => esc_html(get_theme_mod("{$prefix}_bottom_padding", $default_bottom)),
						'left'   => esc_html(get_theme_mod("{$prefix}_left_padding", $default_left)),
					];
				} else {
					$values[$breakpoint] = [
						'top'    => esc_html(get_theme_mod("{$prefix}_{$breakpoint}_top_padding", $default_top)),
						'right'  => esc_html(get_theme_mod("{$prefix}_{$breakpoint}_right_padding", $default_right)),
						'bottom' => esc_html(get_theme_mod("{$prefix}_{$breakpoint}_bottom_padding", $default_bottom)),
						'left'   => esc_html(get_theme_mod("{$prefix}_{$breakpoint}_left_padding", $default_left)),
					];
				}
			}
			return $values;
		}
	}

	if ( ! function_exists( 'responsive_build_responsive_spacing_css' ) ) {
		function responsive_build_responsive_spacing_css($padding, $margin) {
			return "padding: " . responsive_spacing_css($padding['top'], $padding['right'], $padding['bottom'], $padding['left']) . ";
					margin: " . responsive_spacing_css($margin['top'], $margin['right'], $margin['bottom'], $margin['left']) . ";";
		}
	}
	if ( ! function_exists( 'responsive_build_responsive_padding_spacing_css' ) ) {
		function responsive_build_responsive_padding_spacing_css( $padding ) {
			return "padding: " . responsive_spacing_css($padding['top'], $padding['right'], $padding['bottom'], $padding['left']) . "";
		}
	}
	if ( ! function_exists( 'responsive_build_responsive_margin_spacing_css' ) ) {
		function responsive_build_responsive_margin_spacing_css( $margin ) {
			return "margin: " . responsive_spacing_css($margin['top'], $margin['right'], $margin['bottom'], $margin['left']) . "";
		}
	}

	// Fetch above footer row padding and margin values.
	$above_footer_padding_values = get_responsive_spacing_values('responsive_footer_above_row_padding', 20, 0, 20, 0);
	$above_footer_margin_values  = get_responsive_spacing_values('responsive_footer_above_row_margin');

	$custom_css .= ".rspv-site-above-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($above_footer_padding_values['desktop'], $above_footer_margin_values['desktop']);
	$custom_css .= "}";

	$custom_css .= "@media screen and (max-width: 992px) {";
	$custom_css .= ".rspv-site-above-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($above_footer_padding_values['tablet'], $above_footer_margin_values['tablet']);
	$custom_css .= "}}";

	$custom_css .= "@media screen and (max-width: 576px) {";
	$custom_css .= ".rspv-site-above-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($above_footer_padding_values['mobile'], $above_footer_margin_values['mobile']);
	$custom_css .= "}}";

	// Fetch padding and margin values.
	$primary_footer_padding_values = get_responsive_spacing_values('responsive_footer_primary_row_padding', 20, 0, 20, 0);
	$primary_footer_margin_values  = get_responsive_spacing_values('responsive_footer_primary_row_margin');

	$custom_css .= ".rspv-site-primary-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($primary_footer_padding_values['desktop'], $primary_footer_margin_values['desktop']);
	$custom_css .= "}";

	$custom_css .= "@media screen and (max-width: 992px) {";
	$custom_css .= ".rspv-site-primary-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($primary_footer_padding_values['tablet'], $primary_footer_margin_values['tablet']);
	$custom_css .= "}}";

	$custom_css .= "@media screen and (max-width: 576px) {";
	$custom_css .= ".rspv-site-primary-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($primary_footer_padding_values['mobile'], $primary_footer_margin_values['mobile']);
	$custom_css .= "}}";

	// Fetch padding and margin values.
	$below_footer_padding_values = get_responsive_spacing_values('responsive_footer_below_row_padding', 20, 0, 20, 0);
	$below_footer_margin_values  = get_responsive_spacing_values('responsive_footer_below_row_margin');

	$custom_css .= ".rspv-site-below-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($below_footer_padding_values['desktop'], $below_footer_margin_values['desktop']);
	$custom_css .= "}";

	$custom_css .= "@media screen and (max-width: 992px) {";
	$custom_css .= ".rspv-site-below-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($below_footer_padding_values['tablet'], $below_footer_margin_values['tablet']);
	$custom_css .= "}}";

	$custom_css .= "@media screen and (max-width: 576px) {";
	$custom_css .= ".rspv-site-below-footer-wrap {";
	$custom_css .= responsive_build_responsive_spacing_css($below_footer_padding_values['mobile'], $below_footer_margin_values['mobile']);
	$custom_css .= "}}";

	$copyright_alignment         = get_theme_mod( 'responsive_footer_copyright_alignment', 'left' );
	$copyright_alignment_tablet  = get_theme_mod( 'responsive_footer_copyright_alignment_tablet', $copyright_alignment );
	$copyright_alignment_mobile  = get_theme_mod( 'responsive_footer_copyright_alignment_mobile', $copyright_alignment );
	
	// Desktop colors
	$copyright_text_color        = get_theme_mod( 'responsive_footer_copyright_text_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_copyright_text' ) );
	$copyright_text_hover_color  = get_theme_mod( 'responsive_footer_copyright_text_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'footer_copyright_text_hover' )  );
	
	// Tablet colors
	$copyright_text_color_tablet = get_theme_mod( 'responsive_footer_copyright_text_color_tablet', $copyright_text_color );
	$copyright_text_hover_color_tablet = get_theme_mod( 'responsive_footer_copyright_text_color_tablet_hover', $copyright_text_hover_color );
	
	// Mobile colors
	$copyright_text_color_mobile = get_theme_mod( 'responsive_footer_copyright_text_color_mobile', $copyright_text_color );
	$copyright_text_hover_color_mobile = get_theme_mod( 'responsive_footer_copyright_text_color_mobile_hover', $copyright_text_hover_color );
	
	// Desktop link colors
	$copyright_links_color       = get_theme_mod( 'responsive_footer_copyright_links_color', '#0066CC' );
	$copyright_links_hover_color = get_theme_mod( 'responsive_footer_copyright_links_color_hover', '#0066CC' );
	
	// Tablet link colors
	$copyright_links_color_tablet = get_theme_mod( 'responsive_footer_copyright_links_color_tablet', $copyright_links_color );
	$copyright_links_hover_color_tablet = get_theme_mod( 'responsive_footer_copyright_links_color_tablet_hover', $copyright_links_hover_color );
	
	// Mobile link colors
	$copyright_links_color_mobile = get_theme_mod( 'responsive_footer_copyright_links_color_mobile', $copyright_links_color );
	$copyright_links_hover_color_mobile = get_theme_mod( 'responsive_footer_copyright_links_color_mobile_hover', $copyright_links_hover_color );
	
	if(Responsive\Core\responsive_check_element_present_in_hfb('footer_copyright', 'footer')) 
	{
		$custom_css .= "
			.footer-layouts.copyright {
				text-align: {$copyright_alignment};
				color: {$copyright_text_color};
			}
			.footer-layouts.copyright:hover {
				color: {$copyright_text_hover_color};
			}
			.footer-layouts.copyright a {
				color: {$copyright_links_color};
			}
			.footer-layouts.copyright a:hover {
				color: {$copyright_links_hover_color};
			}
		";
		// copyright padding - desktop
		$copyright_padding_values = get_responsive_spacing_values('responsive_footer_copyright', 30, 30, 30, 30);

		$custom_css .= ".footer-layouts.copyright {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($copyright_padding_values['desktop']);
		$custom_css .= "}";
	}
	
	if(Responsive\Core\responsive_check_element_in_mobile_tablet_items('footer_copyright', 'footer')) 
	{
		// Tablet styles
		$custom_css .= "
			@media screen and ( max-width: 992px ) {
				.footer-layouts.copyright {
					text-align: {$copyright_alignment_tablet};
					color: {$copyright_text_color_tablet};
				}
				.footer-layouts.copyright:hover {
					color: {$copyright_text_hover_color_tablet};
				}
				.footer-layouts.copyright a {
					color: {$copyright_links_color_tablet};
				}
				.footer-layouts.copyright a:hover {
					color: {$copyright_links_hover_color_tablet};
				}
			}
		";
		
		// Mobile styles
		$custom_css .= "
			@media screen and ( max-width: 576px ) {
				.footer-layouts.copyright {
					text-align: {$copyright_alignment_mobile};
					color: {$copyright_text_color_mobile};
				}
				.footer-layouts.copyright:hover {
					color: {$copyright_text_hover_color_mobile};
				}
				.footer-layouts.copyright a {
					color: {$copyright_links_color_mobile};
				}
				.footer-layouts.copyright a:hover {
					color: {$copyright_links_hover_color_mobile};
				}
			}
		";
		// copyright padding - tablet and mobile
		$copyright_padding_values = get_responsive_spacing_values('responsive_footer_copyright', 30, 30, 30, 30);

		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".footer-layouts.copyright {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($copyright_padding_values['tablet']);
		$custom_css .= "}}";

		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".footer-layouts.copyright {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($copyright_padding_values['mobile']);
		$custom_css .= "}}";
	}

	// footer menu padding
	$footer_menu_padding_values = get_responsive_spacing_values('responsive_footer_menu', 15, 15, 15, 15);
	$footer_menu_bg_color       = get_theme_mod( 'responsive_footer_menu_background_color', '#333' );
	$footer_menu_bg_hover_color = get_theme_mod( 'responsive_footer_menu_background_color_hover', get_theme_mod( 'responsive_footer_menu_background_hover_color', '#333') );
	$footer_menu_bg_color_tablet = get_theme_mod( 'responsive_footer_menu_background_color_tablet', $footer_menu_bg_color );
	$footer_menu_bg_hover_color_tablet = get_theme_mod( 'responsive_footer_menu_background_color_tablet_hover', $footer_menu_bg_hover_color );
	$footer_menu_bg_color_mobile = get_theme_mod( 'responsive_footer_menu_background_color_mobile', $footer_menu_bg_color );
	$footer_menu_bg_hover_color_mobile = get_theme_mod( 'responsive_footer_menu_background_color_mobile_hover', $footer_menu_bg_hover_color );

	if(Responsive\Core\responsive_check_element_present_in_hfb('footer_navigation', 'footer'))
	{
		$custom_css .= ".footer-navigation {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($footer_menu_padding_values['desktop']);
		$custom_css .= "}";
	
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".footer-navigation {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($footer_menu_padding_values['tablet']);
		$custom_css .= "}}";
	
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".footer-navigation {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($footer_menu_padding_values['mobile']);
		$custom_css .= "}}";
		$custom_css .= "
			.footer-navigation {
				background-color: {$footer_menu_bg_color};
			}
			.footer-navigation:hover {
				background-color: {$footer_menu_bg_hover_color};
			}
		";
	}

	if( Responsive\Core\responsive_check_element_in_mobile_tablet_items('footer_navigation', 'footer') )
	{
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".footer-navigation {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($footer_menu_padding_values['tablet']);
		$custom_css .= "}}";

		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".footer-navigation {";
		$custom_css .= responsive_build_responsive_padding_spacing_css($footer_menu_padding_values['mobile']);
		$custom_css .= "}}";

		$custom_css .= "
			@media screen and ( max-width: 992px ) {
				.footer-navigation {
					background-color: {$footer_menu_bg_color_tablet};
				}
				.footer-navigation:hover {
					background-color: {$footer_menu_bg_hover_color_tablet};
				}
			}

			@media screen and ( max-width: 576px ) {
				.footer-navigation {
					background-color: {$footer_menu_bg_color_mobile};
				}
				.footer-navigation:hover {
					background-color: {$footer_menu_bg_hover_color_mobile};
				}
			}
		";
	}


	// Fetch above footer row items padding and margin values.
	$above_footer_padding_values = get_responsive_spacing_values('responsive_footer_above_row_item_padding');

	$custom_css .= ".rspv-site-above-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($above_footer_padding_values['desktop']);
	$custom_css .= "}";

	$custom_css .= "@media screen and (max-width: 992px) {";
	$custom_css .= ".rspv-site-above-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($above_footer_padding_values['tablet']);
	$custom_css .= "}}";

	$custom_css .= "@media screen and (max-width: 576px) {";
	$custom_css .= ".rspv-site-above-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($above_footer_padding_values['mobile']);
	$custom_css .= "}}";
	// Fetch primary footer row items padding and margin values.
	$primary_footer_padding_values = get_responsive_spacing_values('responsive_footer_primary_row_item_padding');

	$custom_css .= ".rspv-site-primary-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($primary_footer_padding_values['desktop']);
	$custom_css .= "}";

	$custom_css .= "@media screen and (max-width: 992px) {";
	$custom_css .= ".rspv-site-primary-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($primary_footer_padding_values['tablet']);
	$custom_css .= "}}";

	$custom_css .= "@media screen and (max-width: 576px) {";
	$custom_css .= ".rspv-site-primary-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($primary_footer_padding_values['mobile']);
	$custom_css .= "}}";

	// Fetch below footer row items padding and margin values.
	$below_footer_padding_values = get_responsive_spacing_values('responsive_footer_below_row_item_padding');

	$custom_css .= ".rspv-site-below-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($below_footer_padding_values['desktop']);
	$custom_css .= "}";

	$custom_css .= "@media screen and (max-width: 992px) {";
	$custom_css .= ".rspv-site-below-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($below_footer_padding_values['tablet']);
	$custom_css .= "}}";

	$custom_css .= "@media screen and (max-width: 576px) {";
	$custom_css .= ".rspv-site-below-footer-wrap .footer-widget-wrapper {";
	$custom_css .= responsive_build_responsive_padding_spacing_css($below_footer_padding_values['mobile']);
	$custom_css .= "}}";

	// Header HTML Element.
	if ( Responsive\Core\responsive_check_element_present_in_hfb( 'header_html', 'header' ) ) {
		// Add underline link style CSS
		$custom_css .= '.site-header .responsive-header-html .responsive-header-html-inner.responsive-header-html-underline-link a { text-decoration: underline; }';
		
		$header_html_link_color       = get_theme_mod( 'responsive_header_html_link_color', Responsive\Core\get_responsive_customizer_defaults( 'header_html_link_color' ) );
		$header_html_link_color_hover = get_theme_mod( 'responsive_header_html_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_html_link_color_hover' ) );
		$custom_css .= ".site-header .responsive-header-html .responsive-header-html-inner a { color:" . $header_html_link_color . "}";
		$custom_css .= ".site-header .responsive-header-html .responsive-header-html-inner a:hover { color:" . $header_html_link_color_hover . "}";

		$header_html_margin_top    = get_theme_mod( 'responsive_header_html_margin_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ) );
		$header_html_margin_left   = get_theme_mod( 'responsive_header_html_margin_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ) );
		$header_html_margin_bottom = get_theme_mod( 'responsive_header_html_margin_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ) );
		$header_html_margin_right  = get_theme_mod( 'responsive_header_html_margin_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ) );

		$header_html_margin_tablet_top    = get_theme_mod( 'responsive_header_html_margin_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ) );
		$header_html_margin_tablet_right  = get_theme_mod( 'responsive_header_html_margin_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ) );
		$header_html_margin_tablet_bottom = get_theme_mod( 'responsive_header_html_margin_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ) );
		$header_html_margin_tablet_left   = get_theme_mod( 'responsive_header_html_margin_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ) );

		$header_html_margin_mobile_top    = get_theme_mod( 'responsive_header_html_margin_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ) );
		$header_html_margin_mobile_right  = get_theme_mod( 'responsive_header_html_margin_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ) );
		$header_html_margin_mobile_bottom = get_theme_mod( 'responsive_header_html_margin_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_y' ) );
		$header_html_margin_mobile_left   = get_theme_mod( 'responsive_header_html_margin_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'header_html_margin_x' ) );

		$custom_css .= '.site-header .responsive-header-html .responsive-header-html-inner {
			margin: ' . responsive_spacing_css( $header_html_margin_top, $header_html_margin_right, $header_html_margin_bottom, $header_html_margin_left ) . ';
		}';

		$custom_css .= '@media screen and (max-width: 992px) {
			.site-header .responsive-header-html .responsive-header-html-inner {
				margin: ' . responsive_spacing_css( $header_html_margin_tablet_top, $header_html_margin_tablet_right, $header_html_margin_tablet_bottom, $header_html_margin_tablet_left ) . ';
			}
		}';
		$custom_css .= '@media screen and (max-width: 576px) {
			.site-header .responsive-header-html .responsive-header-html-inner {
				margin: ' . responsive_spacing_css( $header_html_margin_mobile_top, $header_html_margin_mobile_right, $header_html_margin_mobile_bottom, $header_html_margin_mobile_left ) . ';
			}
		}';
	}

	// Mobile Header HTML Element.
	if ( Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'header_html', 'header' ) ) {
		// Add underline link style CSS
		$custom_css .= '.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner.responsive-mobile-header-html-underline-link a { text-decoration: underline; }';
		
		$mobile_header_html_link_color       = get_theme_mod( 'responsive_mobile_header_html_link_color', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_link_color' ) );
		$mobile_header_html_link_color_hover = get_theme_mod( 'responsive_mobile_header_html_link_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_link_color_hover' ) );
		$custom_css .= ".site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner a { color:" . $mobile_header_html_link_color . "}";
		$custom_css .= ".site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner a:hover { color:" . $mobile_header_html_link_color_hover . "}";

		$mobile_header_html_margin_top    = get_theme_mod( 'responsive_mobile_header_html_margin_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_y' ) );
		$mobile_header_html_margin_left   = get_theme_mod( 'responsive_mobile_header_html_margin_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_x' ) );
		$mobile_header_html_margin_bottom = get_theme_mod( 'responsive_mobile_header_html_margin_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_y' ) );
		$mobile_header_html_margin_right  = get_theme_mod( 'responsive_mobile_header_html_margin_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_x' ) );

		$mobile_header_html_margin_tablet_top    = get_theme_mod( 'responsive_mobile_header_html_margin_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_y' ) );
		$mobile_header_html_margin_tablet_right  = get_theme_mod( 'responsive_mobile_header_html_margin_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_x' ) );
		$mobile_header_html_margin_tablet_bottom = get_theme_mod( 'responsive_mobile_header_html_margin_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_y' ) );
		$mobile_header_html_margin_tablet_left   = get_theme_mod( 'responsive_mobile_header_html_margin_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_x' ) );

		$mobile_header_html_margin_mobile_top    = get_theme_mod( 'responsive_mobile_header_html_margin_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_y' ) );
		$mobile_header_html_margin_mobile_right  = get_theme_mod( 'responsive_mobile_header_html_margin_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_x' ) );
		$mobile_header_html_margin_mobile_bottom = get_theme_mod( 'responsive_mobile_header_html_margin_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_y' ) );
		$mobile_header_html_margin_mobile_left   = get_theme_mod( 'responsive_mobile_header_html_margin_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'mobile_header_html_margin_x' ) );

		$custom_css .= '.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner {
			margin: ' . responsive_spacing_css( $mobile_header_html_margin_top, $mobile_header_html_margin_right, $mobile_header_html_margin_bottom, $mobile_header_html_margin_left ) . ';
		}';

		$custom_css .= '@media screen and (max-width: 992px) {
			.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner {
				margin: ' . responsive_spacing_css( $mobile_header_html_margin_tablet_top, $mobile_header_html_margin_tablet_right, $mobile_header_html_margin_tablet_bottom, $mobile_header_html_margin_tablet_left ) . ';
			}
		}';
		$custom_css .= '@media screen and (max-width: 576px) {
			.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner {
				margin: ' . responsive_spacing_css( $mobile_header_html_margin_mobile_top, $mobile_header_html_margin_mobile_right, $mobile_header_html_margin_mobile_bottom, $mobile_header_html_margin_mobile_left ) . ';
			}
		}';
	}
	/**Header Footer Builder Styles */
	$hfb_header_above_row_visibility = get_theme_mod( 'responsive_header_above_row_visibility', array( 'desktop', 'tablet', 'mobile' ) );
	if( ! in_array( 'desktop', $hfb_header_above_row_visibility ) ) {
		$custom_css .= ".responsive-site-above-header-wrap {
			display: none;
		}";
	} else {
		$custom_css .= ".responsive-site-above-header-wrap {
			display: block;
		}";
	}
	if( ! in_array( 'tablet', $hfb_header_above_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-above-mobile-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-above-mobile-header-wrap {
					display: block;
			}
		}";
	}
	if( ! in_array( 'mobile', $hfb_header_above_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-above-mobile-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-above-mobile-header-wrap {
					display: block;
			}
		}";
	}

	$hfb_header_primary_row_visibility = get_theme_mod( 'responsive_header_primary_row_visibility', array( 'desktop', 'tablet', 'mobile' ) );
	if( ! in_array( 'desktop', $hfb_header_primary_row_visibility ) ) {
		$custom_css .= ".responsive-site-primary-header-wrap {
			display: none;
		}";
	} else {
		$custom_css .= ".responsive-site-primary-header-wrap {
			display: block;
		}";
	}
	if( ! in_array( 'tablet', $hfb_header_primary_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-primary-mobile-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-primary-mobile-header-wrap {
					display: block;
			}
		}";
	}
	if( ! in_array( 'mobile', $hfb_header_primary_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-primary-mobile-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-primary-mobile-header-wrap {
					display: block;
			}
		}";
	}

	$hfb_header_below_row_visibility = get_theme_mod( 'responsive_header_below_row_visibility', array( 'desktop', 'tablet', 'mobile' ) );
	if( ! in_array( 'desktop', $hfb_header_below_row_visibility ) ) {
		$custom_css .= ".responsive-site-below-header-wrap {
			display: none;
		}";
	} else {
		$custom_css .= ".responsive-site-below-header-wrap {
			display: block;
		}";
	}
	if( ! in_array( 'tablet', $hfb_header_below_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-below-mobile-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 992px ) {
			.responsive-site-below-mobile-header-wrap {
					display: block;
			}
		}";
	}
	if( ! in_array( 'mobile', $hfb_header_below_row_visibility ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-below-mobile-header-wrap {
					display: none;
			}
		}";
	} else {
		$custom_css .= "@media screen and ( max-width: 576px ) {
			.responsive-site-below-mobile-header-wrap {
					display: block;
			}
		}";
	}

	// Header Button.
	if( Responsive\Core\responsive_check_element_present_in_hfb('header_button', 'header'))
	{
		$header_button_style = get_theme_mod( 'responsive_header_button_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_style' ) );
		$header_button_color = get_theme_mod( 'responsive_header_button_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_color' ) );
		$header_button_hover_color = responsive_prepare_css_value( 'responsive_header_button_hover_color' );
		$header_button_bg_color = get_theme_mod( 'responsive_header_button_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_bg_color' ) );
		$header_button_bg_hover_color = responsive_prepare_css_value( 'responsive_header_button_bg_hover_color' );

		if ( 'filled' === $header_button_style ) {
			$custom_css .= ".site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				color: " . $header_button_color . ";
				background-color: " . $header_button_bg_color . ";
			}";
			$custom_css .= ".site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover {
				color: " . $header_button_hover_color . ";
				background-color: " . $header_button_bg_hover_color . ";
			}";
		}

		if ( 'outlined' === $header_button_style ) {
			$custom_css .= ".site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				color: " . get_theme_mod( 'responsive_header_button_color', '#2B6CB0' ) . ";
				background: transparent;
			}";
			$custom_css .= ".site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover {
				color: " . $header_button_hover_color . ";
				background: transparent;
			}";
		}

		$header_button_size = get_theme_mod( 'responsive_header_button_size', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_size' ) );
		$header_button_top_padding = get_theme_mod( 'responsive_header_button_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$header_button_right_padding = get_theme_mod( 'responsive_header_button_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );
		$header_button_bottom_padding = get_theme_mod( 'responsive_header_button_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$header_button_left_padding = get_theme_mod( 'responsive_header_button_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );

		$header_button_tablet_top_padding = get_theme_mod( 'responsive_header_button_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$header_button_tablet_right_padding = get_theme_mod( 'responsive_header_button_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );
		$header_button_tablet_bottom_padding = get_theme_mod( 'responsive_header_button_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$header_button_tablet_left_padding = get_theme_mod( 'responsive_header_button_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );

		$header_button_mobile_top_padding = get_theme_mod( 'responsive_header_button_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$header_button_mobile_right_padding = get_theme_mod( 'responsive_header_button_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );
		$header_button_mobile_bottom_padding = get_theme_mod( 'responsive_header_button_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$header_button_mobile_left_padding = get_theme_mod( 'responsive_header_button_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );

		if ( 'custom' === $header_button_size ) {
			$custom_css .= ".site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size {
				padding: " . responsive_spacing_css( $header_button_top_padding, $header_button_right_padding, $header_button_bottom_padding, $header_button_left_padding ) . "
			}";
			$custom_css .= "@media screen and (max-width: 992px) {
				.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size {
					padding: " . responsive_spacing_css( $header_button_tablet_top_padding, $header_button_tablet_right_padding, $header_button_tablet_bottom_padding, $header_button_tablet_left_padding ) . "
				}
			}";
			$custom_css .= "@media screen and (max-width: 576px) {
				.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size {
					padding: " . responsive_spacing_css( $header_button_mobile_top_padding, $header_button_mobile_right_padding, $header_button_mobile_bottom_padding, $header_button_mobile_left_padding ) . "
				}
			}";
		}

		$header_button_border_style = get_theme_mod( 'responsive_header_button_border_style' , Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_border_style' ) );

		if ( 'none' !== $header_button_border_style ) {
			$header_button_border_width       = get_theme_mod( 'responsive_header_button_border_width', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_border_width') );
			$header_button_border_color       = get_theme_mod( 'responsive_header_button_border_color', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_border_color') );
			$header_button_border_color_hover = get_theme_mod( 'responsive_header_button_border_hover_color', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_border_color_hover') );

			$header_button_border_radius_top_left     = get_theme_mod( 'responsive_header_button_radius_top_left_radius' );
			$header_button_border_radius_top_right    = get_theme_mod( 'responsive_header_button_radius_top_right_radius' );
			$header_button_border_radius_bottom_right = get_theme_mod( 'responsive_header_button_radius_bottom_right_radius' );
			$header_button_border_radius_bottom_left  = get_theme_mod( 'responsive_header_button_radius_bottom_left_radius' );

			$header_button_border_radius_tablet_top_left     = get_theme_mod( 'responsive_header_button_radius_tablet_top_left_radius' );
			$header_button_border_radius_tablet_top_right    = get_theme_mod( 'responsive_header_button_radius_tablet_top_right_radius' );
			$header_button_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_header_button_radius_tablet_bottom_right_radius' );
			$header_button_border_radius_tablet_bottom_left  = get_theme_mod( 'responsive_header_button_radius_tablet_bottom_left_radius' );

			$header_button_border_radius_mobile_top_left     = get_theme_mod( 'responsive_header_button_radius_mobile_top_left_radius' );
			$header_button_border_radius_mobile_top_right    = get_theme_mod( 'responsive_header_button_radius_mobile_top_right_radius' );
			$header_button_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_header_button_radius_mobile_bottom_right_radius' );
			$header_button_border_radius_mobile_bottom_left  = get_theme_mod( 'responsive_header_button_radius_mobile_bottom_left_radius' );

			$custom_css .= '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				border-style: ' . $header_button_border_style . ';
				border-width: ' . $header_button_border_width . 'px;
				border-color: ' . $header_button_border_color . ';
				border-radius: ' . responsive_spacing_css( $header_button_border_radius_top_left, $header_button_border_radius_top_right, $header_button_border_radius_bottom_right, $header_button_border_radius_bottom_left ) . ';
			}';
			$custom_css .= '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover {
				border-color: ' . $header_button_border_color_hover . ';
			}';
			$custom_css .= '@media screen and (max-width: 992px) {
				.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
					border-radius: ' . responsive_spacing_css( $header_button_border_radius_tablet_top_left, $header_button_border_radius_tablet_top_right, $header_button_border_radius_tablet_bottom_right, $header_button_border_radius_tablet_bottom_left ) . ';
				}
			}';
			$custom_css .= '@media screen and (max-width: 576px) {
				.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
					border-radius: ' . responsive_spacing_css( $header_button_border_radius_mobile_top_left, $header_button_border_radius_mobile_top_right, $header_button_border_radius_mobile_bottom_right, $header_button_border_radius_mobile_bottom_left ) . ';
				}
			}';
		}

		$header_button_margin_top = get_theme_mod( 'responsive_header_button_margin_top_padding' );
		$header_button_margin_left = get_theme_mod( 'responsive_header_button_margin_left_padding' );
		$header_button_margin_bottom = get_theme_mod( 'responsive_header_button_margin_bottom_padding' );
		$header_button_margin_right = get_theme_mod( 'responsive_header_button_margin_right_padding' );

		$header_button_margin_tablet_top = get_theme_mod( 'responsive_header_button_margin_tablet_top_padding' );
		$header_button_margin_tablet_right = get_theme_mod( 'responsive_header_button_margin_tablet_right_padding' );
		$header_button_margin_tablet_bottom = get_theme_mod( 'responsive_header_button_margin_tablet_bottom_padding' );
		$header_button_margin_tablet_left = get_theme_mod( 'responsive_header_button_margin_tablet_left_padding' );

		$header_button_margin_mobile_top = get_theme_mod( 'responsive_header_button_margin_mobile_top_padding' );
		$header_button_margin_mobile_right = get_theme_mod( 'responsive_header_button_margin_mobile_right_padding' );
		$header_button_margin_mobile_bottom = get_theme_mod( 'responsive_header_button_margin_mobile_bottom_padding' );
		$header_button_margin_mobile_left = get_theme_mod( 'responsive_header_button_margin_mobile_left_padding' );

		$custom_css .= '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
			margin: ' . responsive_spacing_css( $header_button_margin_top, $header_button_margin_right, $header_button_margin_bottom, $header_button_margin_left ) . ';
		}';

		$custom_css .= '@media screen and (max-width: 992px) {
			.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				margin: ' . responsive_spacing_css( $header_button_margin_tablet_top, $header_button_margin_tablet_right, $header_button_margin_tablet_bottom, $header_button_margin_tablet_left ) . ';
			}
		}';
		$custom_css .= '@media screen and (max-width: 576px) {
			.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				margin: ' . responsive_spacing_css( $header_button_margin_mobile_top, $header_button_margin_mobile_right, $header_button_margin_mobile_bottom, $header_button_margin_mobile_left ) . ';
			}
		}';
		$header_button_shadow_x = get_theme_mod( 'responsive_header_button_shadow_x_axis', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_x' ) );
		$header_button_shadow_y = get_theme_mod( 'responsive_header_button_shadow_y_axis', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_y' ) );
		$header_button_shadow_blur = get_theme_mod( 'responsive_header_button_shadow_blur', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_blur' ) );
		$header_button_shadow_spread = get_theme_mod( 'responsive_header_button_shadow_spread', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_spread' ) );
		$header_button_shadow_inset = get_theme_mod( 'responsive_header_button_shadow_inset', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_inset' ) );
		$header_button_shadow_color = get_theme_mod( 'responsive_header_button_shadow_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_inset' ) );

		$header_button_shadow_inset_style = $header_button_shadow_inset ? 'inset' : '';

		$custom_css .= '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
			box-shadow: ' . $header_button_shadow_inset_style . ' ' . $header_button_shadow_x . 'px ' . $header_button_shadow_y . 'px ' . $header_button_shadow_blur . 'px ' . $header_button_shadow_spread . 'px ' . $header_button_shadow_color . ';
		}';
	}

	// Mobile Header Button.
	if ( Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'header_button', 'header' ) ) {
		$mobile_header_button_style = get_theme_mod( 'responsive_mobile_header_button_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_style' ) );
		$mobile_header_button_color = get_theme_mod( 'responsive_mobile_header_button_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_color' ) );
		$mobile_header_button_bg_color = get_theme_mod( 'responsive_mobile_header_button_bg_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_bg_color' ) );
		$mobile_header_button_bg_hover_color = responsive_prepare_css_value( 'responsive_mobile_header_button_bg_hover_color' );
		$mobile_header_button_hover_color = responsive_prepare_css_value( 'responsive_mobile_header_button_hover_color' );

		if ( 'filled' === $mobile_header_button_style ) {
			$custom_css .= ".site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				color: " . $mobile_header_button_color . ";
				background-color: " . $mobile_header_button_bg_color . ";
			}";
			$custom_css .= ".site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover {
				color: " . $mobile_header_button_hover_color . ";
				background-color: " . $mobile_header_button_bg_hover_color . ";
			}";
		}

		if ( 'outlined' === $mobile_header_button_style ) {
			$custom_css .= ".site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				color: " . $mobile_header_button_color . ";
				background: transparent;
			}";
			$custom_css .= ".site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover {
				color: " . $mobile_header_button_hover_color . ";
				background: transparent;
			}";
		}

		$mobile_header_button_size = get_theme_mod( 'responsive_mobile_header_button_size', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_size' ) );
		$mobile_header_button_top_padding = get_theme_mod( 'responsive_mobile_header_button_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$mobile_header_button_right_padding = get_theme_mod( 'responsive_mobile_header_button_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );
		$mobile_header_button_bottom_padding = get_theme_mod( 'responsive_mobile_header_button_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$mobile_header_button_left_padding = get_theme_mod( 'responsive_mobile_header_button_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );

		$mobile_header_button_tablet_top_padding = get_theme_mod( 'responsive_mobile_header_button_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$mobile_header_button_tablet_right_padding = get_theme_mod( 'responsive_mobile_header_button_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );
		$mobile_header_button_tablet_bottom_padding = get_theme_mod( 'responsive_mobile_header_button_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$mobile_header_button_tablet_left_padding = get_theme_mod( 'responsive_mobile_header_button_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );

		$mobile_header_button_mobile_top_padding = get_theme_mod( 'responsive_mobile_header_button_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$mobile_header_button_mobile_right_padding = get_theme_mod( 'responsive_mobile_header_button_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );
		$mobile_header_button_mobile_bottom_padding = get_theme_mod( 'responsive_mobile_header_button_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_y' ) );
		$mobile_header_button_mobile_left_padding = get_theme_mod( 'responsive_mobile_header_button_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_padding_x' ) );

		if ( 'custom' === $mobile_header_button_size ) {
			$custom_css .= ".site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size {
				padding: " . responsive_spacing_css( $mobile_header_button_top_padding, $mobile_header_button_right_padding, $mobile_header_button_bottom_padding, $mobile_header_button_left_padding ) . "
			}";
			$custom_css .= "@media screen and (max-width: 992px) {
				.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size {
					padding: " . responsive_spacing_css( $mobile_header_button_tablet_top_padding, $mobile_header_button_tablet_right_padding, $mobile_header_button_tablet_bottom_padding, $mobile_header_button_tablet_left_padding ) . "
				}
			}";
			$custom_css .= "@media screen and (max-width: 576px) {
				.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size {
					padding: " . responsive_spacing_css( $mobile_header_button_mobile_top_padding, $mobile_header_button_mobile_right_padding, $mobile_header_button_mobile_bottom_padding, $mobile_header_button_mobile_left_padding ) . "
				}
			}";
		}

		$mobile_header_button_border_style = get_theme_mod( 'responsive_mobile_header_button_border_style' , Responsive\Core\get_responsive_customizer_defaults( 'responsive_mobile_header_button_border_style' ) );

		if ( 'none' !== $mobile_header_button_border_style ) {
			$mobile_header_button_border_width       = get_theme_mod( 'responsive_mobile_header_button_border_width', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_border_width') );
			$mobile_header_button_border_color       = get_theme_mod( 'responsive_mobile_header_button_border_color', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_border_color') );
			$mobile_header_button_border_color_hover = get_theme_mod( 'responsive_mobile_header_button_border_hover_color', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_border_color_hover') );

			$mobile_header_button_border_radius_top_left     = get_theme_mod( 'responsive_mobile_header_button_radius_top_left_radius' );
			$mobile_header_button_border_radius_top_right    = get_theme_mod( 'responsive_mobile_header_button_radius_top_right_radius' );
			$mobile_header_button_border_radius_bottom_right = get_theme_mod( 'responsive_mobile_header_button_radius_bottom_right_radius' );
			$mobile_header_button_border_radius_bottom_left  = get_theme_mod( 'responsive_mobile_header_button_radius_bottom_left_radius' );

			$mobile_header_button_border_radius_tablet_top_left     = get_theme_mod( 'responsive_mobile_header_button_radius_tablet_top_left_radius' );
			$mobile_header_button_border_radius_tablet_top_right    = get_theme_mod( 'responsive_mobile_header_button_radius_tablet_top_right_radius' );
			$mobile_header_button_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_mobile_header_button_radius_tablet_bottom_right_radius' );
			$mobile_header_button_border_radius_tablet_bottom_left  = get_theme_mod( 'responsive_mobile_header_button_radius_tablet_bottom_left_radius' );

			$mobile_header_button_border_radius_mobile_top_left     = get_theme_mod( 'responsive_mobile_header_button_radius_mobile_top_left_radius' );
			$mobile_header_button_border_radius_mobile_top_right    = get_theme_mod( 'responsive_mobile_header_button_radius_mobile_top_right_radius' );
			$mobile_header_button_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_mobile_header_button_radius_mobile_bottom_right_radius' );
			$mobile_header_button_border_radius_mobile_bottom_left  = get_theme_mod( 'responsive_mobile_header_button_radius_mobile_bottom_left_radius' );

			$custom_css .= '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				border-style: ' . $mobile_header_button_border_style . ';
				border-width: ' . $mobile_header_button_border_width . 'px;
				border-color: ' . $mobile_header_button_border_color . ';
				border-radius: ' . responsive_spacing_css( $mobile_header_button_border_radius_top_left, $mobile_header_button_border_radius_top_right, $mobile_header_button_border_radius_bottom_right, $mobile_header_button_border_radius_bottom_left ) . ';
			}';
			$custom_css .= '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover {
				border-color: ' . $mobile_header_button_border_color_hover . ';
			}';
			$custom_css .= '@media screen and (max-width: 992px) {
				.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
					border-radius: ' . responsive_spacing_css( $mobile_header_button_border_radius_tablet_top_left, $mobile_header_button_border_radius_tablet_top_right, $mobile_header_button_border_radius_tablet_bottom_right, $mobile_header_button_border_radius_tablet_bottom_left ) . ';
				}
			}';
			$custom_css .= '@media screen and (max-width: 576px) {
				.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
					border-radius: ' . responsive_spacing_css( $mobile_header_button_border_radius_mobile_top_left, $mobile_header_button_border_radius_mobile_top_right, $mobile_header_button_border_radius_mobile_bottom_right, $mobile_header_button_border_radius_mobile_bottom_left ) . ';
				}
			}';
		}

		$mobile_header_button_margin_top = get_theme_mod( 'responsive_mobile_header_button_margin_top_padding' );
		$mobile_header_button_margin_left = get_theme_mod( 'responsive_mobile_header_button_margin_left_padding' );
		$mobile_header_button_margin_bottom = get_theme_mod( 'responsive_mobile_header_button_margin_bottom_padding' );
		$mobile_header_button_margin_right = get_theme_mod( 'responsive_mobile_header_button_margin_right_padding' );

		$mobile_header_button_margin_tablet_top = get_theme_mod( 'responsive_mobile_header_button_margin_tablet_top_padding' );
		$mobile_header_button_margin_tablet_right = get_theme_mod( 'responsive_mobile_header_button_margin_tablet_right_padding' );
		$mobile_header_button_margin_tablet_bottom = get_theme_mod( 'responsive_mobile_header_button_margin_tablet_bottom_padding' );
		$mobile_header_button_margin_tablet_left = get_theme_mod( 'responsive_mobile_header_button_margin_tablet_left_padding' );

		$mobile_header_button_margin_mobile_top = get_theme_mod( 'responsive_mobile_header_button_margin_mobile_top_padding' );
		$mobile_header_button_margin_mobile_right = get_theme_mod( 'responsive_mobile_header_button_margin_mobile_right_padding' );
		$mobile_header_button_margin_mobile_bottom = get_theme_mod( 'responsive_mobile_header_button_margin_mobile_bottom_padding' );
		$mobile_header_button_margin_mobile_left = get_theme_mod( 'responsive_mobile_header_button_margin_mobile_left_padding' );

		$custom_css .= '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
			margin: ' . responsive_spacing_css( $mobile_header_button_margin_top, $mobile_header_button_margin_right, $mobile_header_button_margin_bottom, $mobile_header_button_margin_left ) . ';
		}';

		$custom_css .= '@media screen and (max-width: 992px) {
			.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				margin: ' . responsive_spacing_css( $mobile_header_button_margin_tablet_top, $mobile_header_button_margin_tablet_right, $mobile_header_button_margin_tablet_bottom, $mobile_header_button_margin_tablet_left ) . ';
			}
		}';
		$custom_css .= '@media screen and (max-width: 576px) {
			.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
				margin: ' . responsive_spacing_css( $mobile_header_button_margin_mobile_top, $mobile_header_button_margin_mobile_right, $mobile_header_button_margin_mobile_bottom, $mobile_header_button_margin_mobile_left ) . ';
			}
		}';

		$mobile_header_button_shadow_x = get_theme_mod( 'responsive_mobile_header_button_shadow_x_axis', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_x' ) );
		$mobile_header_button_shadow_y = get_theme_mod( 'responsive_mobile_header_button_shadow_y_axis', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_y' ) );
		$mobile_header_button_shadow_blur = get_theme_mod( 'responsive_mobile_header_button_shadow_blur', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_blur' ) );
		$mobile_header_button_shadow_spread = get_theme_mod( 'responsive_mobile_header_button_shadow_spread', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_spread' ) );
		$mobile_header_button_shadow_inset = get_theme_mod( 'responsive_mobile_header_button_shadow_inset', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_inset' ) );
		$mobile_header_button_shadow_color = get_theme_mod( 'responsive_mobile_header_button_shadow_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_shadow_color' ) );

		$mobile_header_button_shadow_inset_style = $mobile_header_button_shadow_inset ? 'inset' : '';

		$custom_css .= '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button {
			box-shadow: ' . $mobile_header_button_shadow_inset_style . ' ' . $mobile_header_button_shadow_x . 'px ' . $mobile_header_button_shadow_y . 'px ' . $mobile_header_button_shadow_blur . 'px ' . $mobile_header_button_shadow_spread . 'px ' . $mobile_header_button_shadow_color . ';
		}';
	}
  
	// Header Social.
	if ( Responsive\Core\responsive_check_element_present_in_hfb( 'social', 'header' ) ) {
		$header_social_item_spacing = get_theme_mod( 'responsive_header_social_item_spacing', 0 );
		if ( $header_social_item_spacing > 0 ) {
			$custom_css .= ".site-header-item .header-layouts.social-icon .social-icons { gap: " . $header_social_item_spacing . "px }";
		}
		$header_social_item_style = get_theme_mod( 'responsive_header_social_item_style', 'filled' );
		$header_use_brand_colors = get_theme_mod( 'responsive_header_social_item_use_brand_colors', 'no' );
		if ( 'no' === $header_use_brand_colors ) {
			$header_social_item_color = get_theme_mod( 'responsive_header_social_item_color', Responsive\Core\get_responsive_customizer_defaults( 'header_social_item_color' ) );
			if ( $header_social_item_color ) {
				$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' . $header_social_item_color . '; fill: ' . $header_social_item_color . '}';
			}
			$header_social_item_color_hover = get_theme_mod( 'responsive_header_social_item_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'header_social_item_hover_color' ) );
			if ( $header_social_item_color_hover ) {
				$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' . $header_social_item_color_hover . '; fill: ' . $header_social_item_color_hover . '}';
			}
			if ( 'filled' === $header_social_item_style ) {
				$header_social_item_bg_color = get_theme_mod( 'responsive_header_social_item_background_color' );
				if ( $header_social_item_bg_color ) {
					$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' . $header_social_item_bg_color . '; }';
				}
				$header_social_item_bg_color_hover = get_theme_mod( 'responsive_header_social_item_background_hover_color' );
				if ( $header_social_item_bg_color_hover ) {
					$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' . $header_social_item_bg_color_hover . '; }';
				}
			}
			$header_social_item_border_style = get_theme_mod( 'responsive_header_social_item_border_style' );
			if ( 'none' !== $header_social_item_border_style ) {
				$header_social_item_border_width = get_theme_mod( 'responsive_header_social_item_border_width' );
				if ( $header_social_item_border_style ) {
					$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-style: ' . $header_social_item_border_style . '; }';
				}
				if ( $header_social_item_border_width > 0 ) {
					$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-width: ' . $header_social_item_border_width . 'px; }';
				}
				$header_social_border_radius_top_left    = get_theme_mod( 'responsive_header_social_radius_top_left_radius' );
				$header_social_border_radius_top_right  = get_theme_mod( 'responsive_header_social_radius_top_right_radius' );
				$header_social_border_radius_bottom_right = get_theme_mod( 'responsive_header_social_radius_bottom_right_radius' );
				$header_social_border_radius_bottom_left   = get_theme_mod( 'responsive_header_social_radius_bottom_left_radius' );

				$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $header_social_border_radius_top_left, $header_social_border_radius_top_right, $header_social_border_radius_bottom_right, $header_social_border_radius_bottom_left ) . '; }';

				$header_social_border_radius_tablet_top_left    = get_theme_mod( 'responsive_header_social_radius_tablet_top_left_radius' );
				$header_social_border_radius_tablet_top_right  = get_theme_mod( 'responsive_header_social_radius_tablet_top_right_radius' );
				$header_social_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_header_social_radius_tablet_bottom_right_radius' );
				$header_social_border_radius_tablet_bottom_left   = get_theme_mod( 'responsive_header_social_radius_tablet_bottom_left_radius' );

				$custom_css .= '@media screen and ( max-width: 992px ) {
					.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $header_social_border_radius_tablet_top_left, $header_social_border_radius_tablet_top_right, $header_social_border_radius_tablet_bottom_right, $header_social_border_radius_tablet_bottom_left ) . '; }
				}';

				$header_social_border_radius_mobile_top_left    = get_theme_mod( 'responsive_header_social_radius_mobile_top_left_radius' );
				$header_social_border_radius_mobile_top_right  = get_theme_mod( 'responsive_header_social_radius_mobile_top_right_radius' );
				$header_social_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_header_social_radius_mobile_bottom_right_radius' );
				$header_social_border_radius_mobile_bottom_left   = get_theme_mod( 'responsive_header_social_radius_mobile_bottom_left_radius' );
				
				$custom_css .= '@media screen and ( max-width: 576px ) {
					.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $header_social_border_radius_mobile_top_left, $header_social_border_radius_mobile_top_right, $header_social_border_radius_mobile_bottom_right, $header_social_border_radius_mobile_bottom_left ) . '; }
				}';

				$header_social_item_border_color = get_theme_mod( 'responsive_header_social_item_border_color' );
				$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' . $header_social_item_border_color . '; }';

				$header_social_item_border_hover_color = get_theme_mod( 'responsive_header_social_item_border_hover_color' );
				$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' . $header_social_item_border_hover_color . '; }';

			}
		}

		$header_social_item_icon_size = get_theme_mod( 'responsive_header_social_item_icon_size', 16 );
		$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { font-size: ' . $header_social_item_icon_size . 'px }';
		$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg { width: ' . $header_social_item_icon_size . 'px; height: ' . $header_social_item_icon_size . 'px }';

		$header_social_item_margin_top    = get_theme_mod( 'responsive_header_social_item_margin_top_padding', 0 );
		$header_social_item_margin_left   = get_theme_mod( 'responsive_header_social_item_margin_left_padding', 0 );
		$header_social_item_margin_bottom = get_theme_mod( 'responsive_header_social_item_margin_bottom_padding', 0 );
		$header_social_item_margin_right  = get_theme_mod( 'responsive_header_social_item_margin_right_padding', 0 );

		$header_social_item_margin_tablet_top    = get_theme_mod( 'responsive_header_social_item_margin_tablet_top_padding', 0 );
		$header_social_item_margin_tablet_left   = get_theme_mod( 'responsive_header_social_item_margin_tablet_left_padding', 0 );
		$header_social_item_margin_tablet_bottom = get_theme_mod( 'responsive_header_social_item_margin_tablet_bottom_padding', 0 );
		$header_social_item_margin_tablet_right  = get_theme_mod( 'responsive_header_social_item_margin_tablet_right_padding', 0 );

		$header_social_item_margin_mobile_top    = get_theme_mod( 'responsive_header_social_item_margin_mobile_top_padding', 0 );
		$header_social_item_margin_mobile_left   = get_theme_mod( 'responsive_header_social_item_margin_mobile_left_padding', 0 );
		$header_social_item_margin_mobile_bottom = get_theme_mod( 'responsive_header_social_item_margin_mobile_bottom_padding', 0 );
		$header_social_item_margin_mobile_right  = get_theme_mod( 'responsive_header_social_item_margin_mobile_right_padding', 0 );

		$custom_css .= '.site-header-item .header-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $header_social_item_margin_top, $header_social_item_margin_right, $header_social_item_margin_bottom, $header_social_item_margin_left ) . ' }';
		$custom_css .= '@media screen and ( max-width: 992px ) {
			.site-header-item .header-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $header_social_item_margin_tablet_top, $header_social_item_margin_tablet_right, $header_social_item_margin_tablet_bottom, $header_social_item_margin_tablet_left ) . '; }
		}';
		$custom_css .= '@media screen and ( max-width: 576px ) {
			.site-header-item .header-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $header_social_item_margin_mobile_top, $header_social_item_margin_mobile_right, $header_social_item_margin_mobile_bottom, $header_social_item_margin_mobile_left ) . '; }
		}';
	}

	// Mobile Header Social
	if( Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'social', 'header ') ) {
		$mobile_header_social_item_spacing = get_theme_mod( 
			'responsive_mobile_header_social_item_spacing', 0 );
		if( $mobile_header_social_item_spacing > 0 ) {
			$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons { gap : " . $mobile_header_social_item_spacing . "px } ";
		}

		$mobile_header_social_item_style = get_theme_mod( 'responsive_mobile_header_social_item_style', 'filled' );
		$mobile_header_use_brand_colors = get_theme_mod(
			'responsive_mobile_header_social_item_use_brand_colors', 'no' );
		if ( 'no' === $mobile_header_use_brand_colors ) {
			$mobile_header_social_item_color = get_theme_mod(
				'responsive_mobile_header_social_item_color', 
				Responsive\Core\get_responsive_customizer_defaults(
					'header_social_item_color' ) );
			if( $mobile_header_social_item_color ) {
				$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color : " . $mobile_header_social_item_color . "; fill: " . $mobile_header_social_item_color . "}";
			}

			$mobile_header_social_item_color_hover = get_theme_mod('responsive_mobile_header_social_item_hover_color', Responsive\Core\get_responsive_customizer_defaults('header_social_item_hover_color' ) );
			if ( $mobile_header_social_item_color_hover ) {
				$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' . $mobile_header_social_item_color_hover . '; fill: ' . $mobile_header_social_item_color_hover . '}';
			}
			if ( 'filled' === $mobile_header_social_item_style ) {
				$mobile_header_social_item_bg_color = get_theme_mod( 'responsive_mobile_header_social_item_background_color' );
				if ( $mobile_header_social_item_bg_color ) {
					$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' . $mobile_header_social_item_bg_color . '; }';
				}
				$mobile_header_social_item_bg_color_hover = get_theme_mod( 'responsive_mobile_header_social_item_background_hover_color' );
				if ( $mobile_header_social_item_bg_color_hover ) {
					$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' . $mobile_header_social_item_bg_color_hover . '; }';
				}
			}

			$mobile_header_social_item_border_style = get_theme_mod( 'responsive_mobile_header_social_item_border_style', 'none' );
			if ( 'none' !== $mobile_header_social_item_border_style ) {
				$mobile_header_social_item_border_width = get_theme_mod( 'responsive_mobile_header_social_item_border_width' );
				if ( $mobile_header_social_item_border_style ) {
					$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-style: ' . $mobile_header_social_item_border_style . '; }';
				}
				if ( $mobile_header_social_item_border_width > 0 ) {
					$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-width: ' . $mobile_header_social_item_border_width . 'px; }';
				}
				$mobile_header_social_border_radius_top_left    = get_theme_mod( 'responsive_mobile_header_social_radius_top_left_radius' );
				$mobile_header_social_border_radius_top_right  = get_theme_mod( 'responsive_mobile_header_social_radius_top_right_radius' );
				$mobile_header_social_border_radius_bottom_right = get_theme_mod( 'responsive_mobile_header_social_radius_bottom_right_radius' );
				$mobile_header_social_border_radius_bottom_left   = get_theme_mod( 'responsive_mobile_header_social_radius_bottom_left_radius' );

				$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $mobile_header_social_border_radius_top_left, $mobile_header_social_border_radius_top_right, $mobile_header_social_border_radius_bottom_right, $mobile_header_social_border_radius_bottom_left ) . '; }';

				$mobile_header_social_border_radius_tablet_top_left    = get_theme_mod( 'responsive_mobile_header_social_radius_tablet_top_left_radius' );
				$mobile_header_social_border_radius_tablet_top_right  = get_theme_mod( 'responsive_mobile_header_social_radius_tablet_top_right_radius' );
				$mobile_header_social_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_mobile_header_social_radius_tablet_bottom_right_radius' );
				$mobile_header_social_border_radius_tablet_bottom_left   = get_theme_mod( 'responsive_mobile_header_social_radius_tablet_bottom_left_radius' );

				$custom_css .= '@media screen and ( max-width: 992px ) {
					.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $mobile_header_social_border_radius_tablet_top_left, $mobile_header_social_border_radius_tablet_top_right, $mobile_header_social_border_radius_tablet_bottom_right, $mobile_header_social_border_radius_tablet_bottom_left ) . '; }
				}';

				$mobile_header_social_border_radius_mobile_top_left    = get_theme_mod( 'responsive_mobile_header_social_radius_mobile_top_left_radius' );
				$mobile_header_social_border_radius_mobile_top_right  = get_theme_mod( 'responsive_mobile_header_social_radius_mobile_top_right_radius' );
				$mobile_header_social_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_mobile_header_social_radius_mobile_bottom_right_radius' );
				$mobile_header_social_border_radius_mobile_bottom_left   = get_theme_mod( 'responsive_mobile_header_social_radius_mobile_bottom_left_radius' );
				
				$custom_css .= '@media screen and ( max-width: 576px ) {
					.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $mobile_header_social_border_radius_mobile_top_left, $mobile_header_social_border_radius_mobile_top_right, $mobile_header_social_border_radius_mobile_bottom_right, $mobile_header_social_border_radius_mobile_bottom_left ) . '; }
				}';

				$mobile_header_social_item_border_color = get_theme_mod( 'responsive_mobile_header_social_item_border_color', Responsive\Core\get_responsive_customizer_defaults( 'header_social_border_color' ) );
				
				$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' . $mobile_header_social_item_border_color . '; }';

				$mobile_header_social_item_border_hover_color = get_theme_mod( 'responsive_mobile_header_social_item_border_hover_color' );
				$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' . $mobile_header_social_item_border_hover_color . '; }';

			}
		}

		$mobile_header_social_item_icon_size = get_theme_mod( 'responsive_mobile_header_social_item_icon_size', 16 );
		$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { font-size: ' . $mobile_header_social_item_icon_size . 'px }';
		$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg { width: ' . $mobile_header_social_item_icon_size . 'px; height: ' . $mobile_header_social_item_icon_size . 'px }';

		$mobile_header_social_item_margin_top    = get_theme_mod( 'responsive_mobile_header_social_item_margin_top_padding', 0 );
		$mobile_header_social_item_margin_left   = get_theme_mod( 'responsive_mobile_header_social_item_margin_left_padding', 0 );
		$mobile_header_social_item_margin_bottom = get_theme_mod( 'responsive_mobile_header_social_item_margin_bottom_padding', 0 );
		$mobile_header_social_item_margin_right  = get_theme_mod( 'responsive_mobile_header_social_item_margin_right_padding', 0 );

		$mobile_header_social_item_margin_tablet_top    = get_theme_mod( 'responsive_mobile_header_social_item_margin_tablet_top_padding', 0 );
		$mobile_header_social_item_margin_tablet_left   = get_theme_mod( 'responsive_mobile_header_social_item_margin_tablet_left_padding', 0 );
		$mobile_header_social_item_margin_tablet_bottom = get_theme_mod( 'responsive_mobile_header_social_item_margin_tablet_bottom_padding', 0 );
		$mobile_header_social_item_margin_tablet_right  = get_theme_mod( 'responsive_mobile_header_social_item_margin_tablet_right_padding', 0 );

		$mobile_header_social_item_margin_mobile_top    = get_theme_mod( 'responsive_mobile_header_social_item_margin_mobile_top_padding', 0 );
		$mobile_header_social_item_margin_mobile_left   = get_theme_mod( 'responsive_mobile_header_social_item_margin_mobile_left_padding', 0 );
		$mobile_header_social_item_margin_mobile_bottom = get_theme_mod( 'responsive_mobile_header_social_item_margin_mobile_bottom_padding', 0 );
		$mobile_header_social_item_margin_mobile_right  = get_theme_mod( 'responsive_mobile_header_social_item_margin_mobile_right_padding', 0 );

		$custom_css .= '.site-mobile-header-item .header-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $mobile_header_social_item_margin_top, $mobile_header_social_item_margin_right, $mobile_header_social_item_margin_bottom, $mobile_header_social_item_margin_left ) . ' }';
		$custom_css .= '@media screen and ( max-width: 992px ) {
			.site-mobile-header-item .header-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $mobile_header_social_item_margin_tablet_top, $mobile_header_social_item_margin_tablet_right, $mobile_header_social_item_margin_tablet_bottom, $mobile_header_social_item_margin_tablet_left ) . '; }
		}';
		$custom_css .= '@media screen and ( max-width: 576px ) {
			.site-mobile-header-item .header-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $mobile_header_social_item_margin_mobile_top, $mobile_header_social_item_margin_mobile_right, $mobile_header_social_item_margin_mobile_bottom, $mobile_header_social_item_margin_mobile_left ) . '; }
		}';

		// Mobile Header Social Typography
		$mobile_header_social_item_typography = get_theme_mod( 'mobile_header_social_item_typography' );
		if ( $mobile_header_social_item_typography && is_array( $mobile_header_social_item_typography ) ) {
			$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-label {";
			foreach ( $mobile_header_social_item_typography as $prop => $val ) {
				if ( $val ) {
					$custom_css .= $prop . ': ' . $val . ';';
				}
			}
			$custom_css .= "}";
		}

		// Mobile Header Social Tablet Typography
		$mobile_header_social_item_tablet_typography = get_theme_mod( 'mobile_header_social_item_tablet_typography' );
		if ( $mobile_header_social_item_tablet_typography && is_array( $mobile_header_social_item_tablet_typography ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {";
			$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-label {";
			foreach ( $mobile_header_social_item_tablet_typography as $prop => $val ) {
				if ( $val ) {
					$custom_css .= $prop . ': ' . $val . ';';
				}
			}
			$custom_css .= "}";
			$custom_css .= "}";
		}

		// Mobile Header Social Mobile Typography
		$mobile_header_social_item_mobile_typography = get_theme_mod( 'mobile_header_social_item_mobile_typography' );
		if ( $mobile_header_social_item_mobile_typography && is_array( $mobile_header_social_item_mobile_typography ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {";
			$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-label {";
			foreach ( $mobile_header_social_item_mobile_typography as $prop => $val ) {
				if ( $val ) {
					$custom_css .= $prop . ': ' . $val . ';';
				}
			}
			$custom_css .= "}";
			$custom_css .= "}";
		}
	}

	// Footer Social.
	if ( Responsive\Core\responsive_check_element_present_in_hfb( 'social', 'footer' ) || Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'social', 'footer' ) ) {
		$footer_social_item_spacing 	   = get_theme_mod( 'responsive_footer_social_item_spacing', 0 );
		$footer_social_item_spacing_tablet = get_theme_mod( 'responsive_footer_social_item_spacing_tablet', $footer_social_item_spacing );
		$footer_social_item_spacing_mobile = get_theme_mod( 'responsive_footer_social_item_spacing_mobile', $footer_social_item_spacing );
		if ( $footer_social_item_spacing > 0 ) {
			$custom_css .= ".footer-layouts.social-icon .social-icons { gap: " . $footer_social_item_spacing . "px }";
		}
		if ( $footer_social_item_spacing_tablet > 0 ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {
				.footer-layouts.social-icon .social-icons { gap: " . $footer_social_item_spacing_tablet . "px }
			}";
		}
		if ( $footer_social_item_spacing_mobile > 0 ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {
				.footer-layouts.social-icon .social-icons { gap: " . $footer_social_item_spacing_mobile . "px }
			}";
		}
		
		$footer_social_item_style = get_theme_mod( 'responsive_footer_social_item_style', 'filled' );
		if ( 'filled' === $footer_social_item_style ) {
			$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: #EDF2F7}';
		}
		$footer_use_brand_colors = get_theme_mod( 'responsive_footer_social_item_use_brand_colors', 'no' );
		if ( 'no' === $footer_use_brand_colors ) {
			// Desktop color
			$footer_social_item_color = get_theme_mod( 'responsive_footer_social_item_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_social_item_color' ) );
			if ( $footer_social_item_color ) {
				$custom_css .= '@media screen and (min-width: 993px) {';
				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' . $footer_social_item_color . '; fill: ' . $footer_social_item_color . '}';
				$custom_css .= '}';
			}
			// Tablet color
			$footer_social_item_color_tablet = get_theme_mod( 'responsive_footer_social_item_color_tablet', $footer_social_item_color );
			if ( $footer_social_item_color_tablet ) {
				$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' . $footer_social_item_color_tablet . '; fill: ' . $footer_social_item_color_tablet . '}';
				$custom_css .= '}';
			}
			// Mobile color
			$footer_social_item_color_mobile = get_theme_mod( 'responsive_footer_social_item_color_mobile', $footer_social_item_color );
			if ( $footer_social_item_color_mobile ) {
				$custom_css .= '@media screen and (max-width: 556px) {';
				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' . $footer_social_item_color_mobile . '; fill: ' . $footer_social_item_color_mobile . '}';
				$custom_css .= '}';
			}
			// Desktop hover color
			$footer_social_item_color_hover = get_theme_mod( 'responsive_footer_social_item_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'footer_social_item_hover_color' ) );
			// Backward compatibility: check old setting name
			if ( ! $footer_social_item_color_hover ) {
				$footer_social_item_color_hover = get_theme_mod( 'responsive_footer_social_item_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_social_item_hover_color' ) );
			}
			if ( $footer_social_item_color_hover ) {
				$custom_css .= '@media screen and (min-width: 993px) {';
				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' . $footer_social_item_color_hover . '; fill: ' . $footer_social_item_color_hover . '}';
				$custom_css .= '}';
			}
			// Tablet hover color
			$footer_social_item_color_tablet_hover = get_theme_mod( 'responsive_footer_social_item_color_tablet_hover', $footer_social_item_color_hover );
			if ( $footer_social_item_color_tablet_hover ) {
				$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' . $footer_social_item_color_tablet_hover . '; fill: ' . $footer_social_item_color_tablet_hover . '}';
				$custom_css .= '}';
			}
			// Mobile hover color
			$footer_social_item_color_mobile_hover = get_theme_mod( 'responsive_footer_social_item_color_mobile_hover', $footer_social_item_color_hover );
			if ( $footer_social_item_color_mobile_hover ) {
				$custom_css .= '@media screen and (max-width: 556px) {';
				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' . $footer_social_item_color_mobile_hover . '; fill: ' . $footer_social_item_color_mobile_hover . '}';
				$custom_css .= '}';
			}
			if ( 'filled' === $footer_social_item_style ) {
				// Desktop background color
				$footer_social_item_bg_color = get_theme_mod( 'responsive_footer_social_item_background_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_social_item_bg_color' ) );
				if ( $footer_social_item_bg_color ) {
					$custom_css .= '@media screen and (min-width: 993px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' . $footer_social_item_bg_color . '; }';
					$custom_css .= '}';
				}
				// Tablet background color
				$footer_social_item_bg_color_tablet = get_theme_mod( 'responsive_footer_social_item_background_color_tablet', $footer_social_item_bg_color );
				if ( $footer_social_item_bg_color_tablet ) {
					$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' . $footer_social_item_bg_color_tablet . '; }';
					$custom_css .= '}';
				}
				// Mobile background color
				$footer_social_item_bg_color_mobile = get_theme_mod( 'responsive_footer_social_item_background_color_mobile', $footer_social_item_bg_color );
				if ( $footer_social_item_bg_color_mobile ) {
					$custom_css .= '@media screen and (max-width: 556px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' . $footer_social_item_bg_color_mobile . '; }';
					$custom_css .= '}';
				}
				// Desktop background hover color
				$footer_social_item_bg_color_hover = get_theme_mod( 'responsive_footer_social_item_background_color_hover', Responsive\Core\get_responsive_customizer_defaults( 'footer_social_item_bg_hover_color' ) );
				// Backward compatibility: check old setting name
				if ( ! $footer_social_item_bg_color_hover ) {
					$footer_social_item_bg_color_hover = get_theme_mod( 'responsive_footer_social_item_background_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_social_item_bg_hover_color' ) );
				}
				if ( $footer_social_item_bg_color_hover ) {
					$custom_css .= '@media screen and (min-width: 993px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' . $footer_social_item_bg_color_hover . '; }';
					$custom_css .= '}';
				}
				// Tablet background hover color
				$footer_social_item_bg_color_tablet_hover = get_theme_mod( 'responsive_footer_social_item_background_color_tablet_hover', $footer_social_item_bg_color_hover );
				if ( $footer_social_item_bg_color_tablet_hover ) {
					$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' . $footer_social_item_bg_color_tablet_hover . '; }';
					$custom_css .= '}';
				}
				// Mobile background hover color
				$footer_social_item_bg_color_mobile_hover = get_theme_mod( 'responsive_footer_social_item_background_color_mobile_hover', $footer_social_item_bg_color_hover );
				if ( $footer_social_item_bg_color_mobile_hover ) {
					$custom_css .= '@media screen and (max-width: 556px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' . $footer_social_item_bg_color_mobile_hover . '; }';
					$custom_css .= '}';
				}
			}
			$footer_social_item_border_style = get_theme_mod( 'responsive_footer_social_item_border_style' );
			if ( 'none' !== $footer_social_item_border_style ) {
				if ( $footer_social_item_border_style ) {
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-style: ' . $footer_social_item_border_style . '; }';
				}
				// Desktop border width
				$footer_social_item_border_width = get_theme_mod( 'responsive_footer_social_item_border_width', 0 );
				if ( $footer_social_item_border_width > 0 ) {
					$custom_css .= '@media screen and (min-width: 993px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-width: ' . $footer_social_item_border_width . 'px; }';
					$custom_css .= '}';
				}
				// Tablet border width
				$footer_social_item_border_width_tablet = get_theme_mod( 'responsive_footer_social_item_border_width_tablet', $footer_social_item_border_width );
				if ( $footer_social_item_border_width_tablet > 0 ) {
					$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-width: ' . $footer_social_item_border_width_tablet . 'px; }';
					$custom_css .= '}';
				}
				// Mobile border width
				$footer_social_item_border_width_mobile = get_theme_mod( 'responsive_footer_social_item_border_width_mobile', $footer_social_item_border_width );
				if ( $footer_social_item_border_width_mobile > 0 ) {
					$custom_css .= '@media screen and (max-width: 556px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-width: ' . $footer_social_item_border_width_mobile . 'px; }';
					$custom_css .= '}';
				}
				$footer_social_border_radius_top_left    = get_theme_mod( 'responsive_footer_social_radius_top_left_radius' );
				$footer_social_border_radius_top_right  = get_theme_mod( 'responsive_footer_social_radius_top_right_radius' );
				$footer_social_border_radius_bottom_right = get_theme_mod( 'responsive_footer_social_radius_bottom_right_radius' );
				$footer_social_border_radius_bottom_left   = get_theme_mod( 'responsive_footer_social_radius_bottom_left_radius' );

				$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $footer_social_border_radius_top_left, $footer_social_border_radius_top_right, $footer_social_border_radius_bottom_right, $footer_social_border_radius_bottom_left ) . '; }';

				$footer_social_border_radius_tablet_top_left    = get_theme_mod( 'responsive_footer_social_radius_tablet_top_left_radius' );
				$footer_social_border_radius_tablet_top_right  = get_theme_mod( 'responsive_footer_social_radius_tablet_top_right_radius' );
				$footer_social_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_footer_social_radius_tablet_bottom_right_radius' );
				$footer_social_border_radius_tablet_bottom_left   = get_theme_mod( 'responsive_footer_social_radius_tablet_bottom_left_radius' );

				$custom_css .= '@media screen and ( max-width: 992px ) {
					.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $footer_social_border_radius_tablet_top_left, $footer_social_border_radius_tablet_top_right, $footer_social_border_radius_tablet_bottom_right, $footer_social_border_radius_tablet_bottom_left ) . '; }
				}';

				$footer_social_border_radius_mobile_top_left    = get_theme_mod( 'responsive_footer_social_radius_mobile_top_left_radius' );
				$footer_social_border_radius_mobile_top_right  = get_theme_mod( 'responsive_footer_social_radius_mobile_top_right_radius' );
				$footer_social_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_footer_social_radius_mobile_bottom_right_radius' );
				$footer_social_border_radius_mobile_bottom_left   = get_theme_mod( 'responsive_footer_social_radius_mobile_bottom_left_radius' );
				
				$custom_css .= '@media screen and ( max-width: 576px ) {
					.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-radius: ' . responsive_spacing_css( $footer_social_border_radius_mobile_top_left, $footer_social_border_radius_mobile_top_right, $footer_social_border_radius_mobile_bottom_right, $footer_social_border_radius_mobile_bottom_left ) . '; }
				}';

				// Desktop border color
				$footer_social_item_border_color = get_theme_mod( 'responsive_footer_social_item_border_color' );
				if ( $footer_social_item_border_color ) {
					$custom_css .= '@media screen and (min-width: 993px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' . $footer_social_item_border_color . '; }';
					$custom_css .= '}';
				}
				// Tablet border color
				$footer_social_item_border_color_tablet = get_theme_mod( 'responsive_footer_social_item_border_color_tablet', $footer_social_item_border_color );
				if ( $footer_social_item_border_color_tablet ) {
					$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' . $footer_social_item_border_color_tablet . '; }';
					$custom_css .= '}';
				}
				// Mobile border color
				$footer_social_item_border_color_mobile = get_theme_mod( 'responsive_footer_social_item_border_color_mobile', $footer_social_item_border_color );
				if ( $footer_social_item_border_color_mobile ) {
					$custom_css .= '@media screen and (max-width: 556px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' . $footer_social_item_border_color_mobile . '; }';
					$custom_css .= '}';
				}
				// Desktop border hover color
				$footer_social_item_border_hover_color = get_theme_mod( 'responsive_footer_social_item_border_color_hover' );
				// Backward compatibility: check old setting name
				if ( ! $footer_social_item_border_hover_color ) {
					$footer_social_item_border_hover_color = get_theme_mod( 'responsive_footer_social_item_border_hover_color' );
				}
				if ( $footer_social_item_border_hover_color ) {
					$custom_css .= '@media screen and (min-width: 993px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' . $footer_social_item_border_hover_color . '; }';
					$custom_css .= '}';
				}
				// Tablet border hover color
				$footer_social_item_border_hover_color_tablet = get_theme_mod( 'responsive_footer_social_item_border_color_tablet_hover', $footer_social_item_border_hover_color );
				if ( $footer_social_item_border_hover_color_tablet ) {
					$custom_css .= '@media screen and (min-width: 577px) and (max-width: 992px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' . $footer_social_item_border_hover_color_tablet . '; }';
					$custom_css .= '}';
				}
				// Mobile border hover color
				$footer_social_item_border_hover_color_mobile = get_theme_mod( 'responsive_footer_social_item_border_color_mobile_hover', $footer_social_item_border_hover_color );
				if ( $footer_social_item_border_hover_color_mobile ) {
					$custom_css .= '@media screen and (max-width: 556px) {';
					$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' . $footer_social_item_border_hover_color_mobile . '; }';
					$custom_css .= '}';
				}

			}

			$footer_social_item_icon_size_tablet = get_theme_mod( 'responsive_footer_social_item_icon_size_tablet', get_theme_mod( 'responsive_footer_social_item_icon_size', 21 ));
			$footer_social_item_icon_size_mobile = get_theme_mod( 'responsive_footer_social_item_icon_size_mobile', get_theme_mod( 'responsive_footer_social_item_icon_size', 21 ));

			$custom_css .= '@media screen and ( max-width: 992px ) {
				.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { font-size: ' . $footer_social_item_icon_size_tablet . 'px }
				.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg { width: ' . $footer_social_item_icon_size_tablet . 'px; height: ' . $footer_social_item_icon_size_tablet . 'px }
			}';

			$custom_css .= '@media screen and ( max-width: 576px ) {
				.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { font-size: ' . $footer_social_item_icon_size_mobile . 'px }
				.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg { width: ' . $footer_social_item_icon_size_mobile . 'px; height: ' . $footer_social_item_icon_size_mobile . 'px }
			}';
		}

		$footer_social_item_icon_size = get_theme_mod( 'responsive_footer_social_item_icon_size', 21 );
		$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { font-size: ' . $footer_social_item_icon_size . 'px }';
		$custom_css .= '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg { width: ' . $footer_social_item_icon_size . 'px; height: ' . $footer_social_item_icon_size . 'px }';		
		$footer_social_item_margin_top    = get_theme_mod( 'responsive_footer_social_item_margin_top_padding', 0 );
		$footer_social_item_margin_left   = get_theme_mod( 'responsive_footer_social_item_margin_left_padding', 0 );
		$footer_social_item_margin_bottom = get_theme_mod( 'responsive_footer_social_item_margin_bottom_padding', 0 );
		$footer_social_item_margin_right  = get_theme_mod( 'responsive_footer_social_item_margin_right_padding', 0 );

		$footer_social_item_margin_tablet_top    = get_theme_mod( 'responsive_footer_social_item_margin_tablet_top_padding', 0 );
		$footer_social_item_margin_tablet_left   = get_theme_mod( 'responsive_footer_social_item_margin_tablet_left_padding', 0 );
		$footer_social_item_margin_tablet_bottom = get_theme_mod( 'responsive_footer_social_item_margin_tablet_bottom_padding', 0 );
		$footer_social_item_margin_tablet_right  = get_theme_mod( 'responsive_footer_social_item_margin_tablet_right_padding', 0 );

		$footer_social_item_margin_mobile_top    = get_theme_mod( 'responsive_footer_social_item_margin_mobile_top_padding', 0 );
		$footer_social_item_margin_mobile_left   = get_theme_mod( 'responsive_footer_social_item_margin_mobile_left_padding', 0 );
		$footer_social_item_margin_mobile_bottom = get_theme_mod( 'responsive_footer_social_item_margin_mobile_bottom_padding', 0 );
		$footer_social_item_margin_mobile_right  = get_theme_mod( 'responsive_footer_social_item_margin_mobile_right_padding', 0 );

		$custom_css .= '.footer-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $footer_social_item_margin_top, $footer_social_item_margin_right, $footer_social_item_margin_bottom, $footer_social_item_margin_left ) . ' }';
		$custom_css .= '@media screen and ( max-width: 992px ) {
			.footer-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $footer_social_item_margin_tablet_top, $footer_social_item_margin_tablet_right, $footer_social_item_margin_tablet_bottom, $footer_social_item_margin_tablet_left ) . '; }
		}';
		$custom_css .= '@media screen and ( max-width: 576px ) {
			.footer-layouts.social-icon .social-icons { margin: ' . responsive_spacing_css( $footer_social_item_margin_mobile_top, $footer_social_item_margin_mobile_right, $footer_social_item_margin_mobile_bottom, $footer_social_item_margin_mobile_left ) . '; }
		}';
	}

	// Fetch header woo cart padding and margin values.
	$header_woo_cart_padding_values = get_responsive_spacing_values('responsive_header_woo_cart_padding', 10, 10, 10, 10);
	$header_woo_cart_margin_values  = get_responsive_spacing_values('responsive_header_woo_cart_margin');
	if(Responsive\Core\responsive_check_element_present_in_hfb('woo-cart', 'header'))
	{
		$custom_css .= ".responsive-header-cart .res-addon-cart-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_woo_cart_padding_values['desktop'], $header_woo_cart_margin_values['desktop']);
		$custom_css .= "}";
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".responsive-header-cart .res-addon-cart-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_woo_cart_padding_values['tablet'], $header_woo_cart_margin_values['tablet']);
		$custom_css .= "}}";
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".responsive-header-cart .res-addon-cart-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_woo_cart_padding_values['mobile'], $header_woo_cart_margin_values['mobile']);
		$custom_css .= "}}";
	}

	// Fetch mobile header woo cart padding and margin values.
	$mobile_header_woo_cart_padding_values = get_responsive_spacing_values('responsive_mobile_header_woo_cart_padding', 10, 10, 10, 10);
	$mobile_header_woo_cart_margin_values  = get_responsive_spacing_values('responsive_mobile_header_woo_cart_margin');
	if(Responsive\Core\responsive_check_element_in_mobile_tablet_items('woo-cart', 'header'))
	{
		$custom_css .= ".site-mobile-header-item .responsive-header-cart .res-addon-cart-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($mobile_header_woo_cart_padding_values['desktop'], $mobile_header_woo_cart_margin_values['desktop']);
		$custom_css .= "}";
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".site-mobile-header-item .responsive-header-cart .res-addon-cart-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($mobile_header_woo_cart_padding_values['tablet'], $mobile_header_woo_cart_margin_values['tablet']);
		$custom_css .= "}}";
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".site-mobile-header-item .responsive-header-cart .res-addon-cart-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($mobile_header_woo_cart_padding_values['mobile'], $mobile_header_woo_cart_margin_values['mobile']);
		$custom_css .= "}}";
	}

	if ( Responsive\Core\responsive_check_element_present_in_hfb( 'search', 'header' )  || Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'search', 'header' ) ) {
		//Header Search Element CSS - Start
		$header_search_label_visibility = get_theme_mod( 'responsive_header_search_label_visibility', array( 'desktop', 'tablet', 'mobile' ) );
		$custom_css .= ".responsive-header-search-icon-wrap .responsive-header-search-label { display: " . ( in_array( 'desktop', $header_search_label_visibility ) ? "block" : "none" ) . "; }";
	
		$custom_css .= "@media screen and (max-width: 992px) { .responsive-header-search-icon-wrap .responsive-header-search-label { display: " . ( in_array( 'tablet', $header_search_label_visibility ) ? "block" : "none" ) . "; } }";
		
		$custom_css .= "@media screen and (max-width: 576px) { .responsive-header-search-icon-wrap .responsive-header-search-label { display: " . ( in_array( 'mobile', $header_search_label_visibility ) ? "block" : "none" ) . "; } }";
	
		$header_search_design_style                      = esc_html( get_theme_mod( 'responsive_header_search_style_design', 'bordered' ) );
		$header_search_border_width                      = esc_html( get_theme_mod( 'responsive_header_search_border', 1 ) );
		$header_search_width                             = esc_html( get_theme_mod( 'responsive_header_search_width', 300 ) );
		$header_search_width_tablet                      = esc_html( get_theme_mod( 'responsive_header_search_width_tablet', 200 ) );
		$header_search_width_mobile                      = esc_html( get_theme_mod( 'responsive_header_search_width_mobile', 100 ) );
		$header_search_icon_size                         = esc_html( get_theme_mod( 'responsive_header_search_icon_size', 16 ) );
		$header_search_icon_size_tablet                  = esc_html( get_theme_mod( 'responsive_header_search_icon_size_tablet', 16 ) );
		$header_search_icon_size_mobile                  = esc_html( get_theme_mod( 'responsive_header_search_icon_size_mobile', 16 ) );
		$header_search_color                             = esc_html( get_theme_mod( 'responsive_header_search_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_color' ) ) );
		$header_search_hover_color                       = esc_html( get_theme_mod( 'responsive_header_search_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_hover_color' ) ) );
		$header_search_background_color                  = esc_html( get_theme_mod( 'responsive_header_search_background_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_background_color' ) ) );
		$header_search_background_hover_color            = esc_html( get_theme_mod( 'responsive_header_search_background_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_background_hover_color' ) ) );
		$header_search_text_color                        = esc_html( get_theme_mod( 'responsive_header_search_text_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_text_color' ) ) );
		$header_search_text_hover_color                  = esc_html( get_theme_mod( 'responsive_header_search_text_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_text_hover_color' ) ) );
		$header_search_modal_background_color            = esc_html( get_theme_mod( 'responsive_header_search_modal_background_color', '#FFFFFF' ) );
		$header_search_modal_background_color_tablet     = esc_html( get_theme_mod( 'responsive_header_search_modal_background_color_tablet', '#FFFFFF' ) );
		$header_search_modal_background_color_mobile     = esc_html( get_theme_mod( 'responsive_header_search_modal_background_color_mobile', '#FFFFFF' ) );
		$header_search_border_radius_top_left            = get_theme_mod( 'responsive_header_search_border_radius_top_left_radius', 0 );
		$header_search_border_radius_top_right           = get_theme_mod( 'responsive_header_search_border_radius_top_right_radius', 0 );
		$header_search_border_radius_bottom_right        = get_theme_mod( 'responsive_header_search_border_radius_bottom_right_radius', 0 );
		$header_search_border_radius_bottom_left         = get_theme_mod( 'responsive_header_search_border_radius_bottom_left_radius', 0 );
		$header_search_border_radius_tablet_top_left     = get_theme_mod( 'responsive_header_search_border_radius_tablet_top_left_radius', 0 );
		$header_search_border_radius_tablet_top_right    = get_theme_mod( 'responsive_header_search_border_radius_tablet_top_right_radius', 0 );
		$header_search_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_header_search_border_radius_tablet_bottom_right_radius', 0 );
		$header_search_border_radius_tablet_bottom_left  = get_theme_mod( 'responsive_header_search_border_radius_tablet_bottom_left_radius', 0 );
		$header_search_border_radius_mobile_top_left     = get_theme_mod( 'responsive_header_search_border_radius_mobile_top_left_radius', 0 );
		$header_search_border_radius_mobile_top_right    = get_theme_mod( 'responsive_header_search_border_radius_mobile_top_right_radius', 0 );
		$header_search_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_header_search_border_radius_mobile_bottom_right_radius', 0 );
		$header_search_border_radius_mobile_bottom_left  = get_theme_mod( 'responsive_header_search_border_radius_mobile_bottom_left_radius', 0 );

		$custom_css .= "
			.responsive-header-search input[type=search] {
				height: {$header_search_icon_size}px;
			}
			.responsive-header-search-icon-wrap, .responsive-header-search input[type=search] {
				color: {$header_search_color};
				background: {$header_search_background_color};
			}
			.responsive-header-search-icon-wrap:hover, .responsive-header-search-icon-wrap:hover input[type=search] {
				color: {$header_search_hover_color};
				background: {$header_search_background_hover_color};
			}
			.responsive-header-search-icon svg {
				width: {$header_search_icon_size}px;
				height: {$header_search_icon_size}px;
			}
			.full-screen .site-header-item .full-screen-search-wrapper {
				background: {$header_search_modal_background_color};
			}
			.responsive-header-search input[type=search].search-field  {
				width: {$header_search_width}px;
			}
			@media screen and ( max-width: 992px ) {
				.responsive-header-search-icon svg {
					width: {$header_search_icon_size_tablet}px;
					height: {$header_search_icon_size_tablet}px;
				}
				.full-screen .site-header-item .full-screen-search-wrapper {
					background: {$header_search_modal_background_color_tablet};
				}
				.responsive-header-search input[type=search].search-field {
					width: {$header_search_width_tablet}px;
				}
			}
			@media screen and ( max-width: 576px ) {
				.responsive-header-search-icon svg {
					width: {$header_search_icon_size_mobile}px;
					height: {$header_search_icon_size_mobile}px;
				}
				.full-screen .site-header-item .full-screen-search-wrapper {
					background: {$header_search_modal_background_color_mobile};
				}
				.responsive-header-search input[type=search].search-field {
					width: {$header_search_width_mobile}px;
				}
			}
			.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input[type=search],
			.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input::placeholder,
			.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper,
			.full-screen .site-header-item .full-screen-search-wrapper #search-close {
				color: {$header_search_text_color};
			}
			.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input[type=search]:hover,
			.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input:hover::placeholder,
			.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper:hover,
			.full-screen .site-header-item .full-screen-search-wrapper #search-close:hover {
				color: {$header_search_text_hover_color};
			}
		";

		if ( 'bordered' === $header_search_design_style ) {
			$custom_css.= "
				.responsive-header-search-icon-wrap {
					border: ". $header_search_border_width. "px solid currentColor;
					border-radius: " . responsive_spacing_css( $header_search_border_radius_top_left, $header_search_border_radius_top_right, $header_search_border_radius_bottom_right, $header_search_border_radius_bottom_left ) . ";
				}
				@media screen and ( max-width: 992px ) {
					.responsive-header-search-icon-wrap {
						border-radius: " . responsive_spacing_css( $header_search_border_radius_tablet_top_left, $header_search_border_radius_tablet_top_right, $header_search_border_radius_tablet_bottom_right, $header_search_border_radius_tablet_bottom_left ) . ";
					}
				}
				@media screen and ( max-width: 576px ) {
					.responsive-header-search-icon-wrap {
						border-radius: " . responsive_spacing_css( $header_search_border_radius_mobile_top_left, $header_search_border_radius_mobile_top_right, $header_search_border_radius_mobile_bottom_right, $header_search_border_radius_mobile_bottom_left ) . ";
					}
				}
			";
		} else {
			$custom_css.= ".responsive-header-search-icon-wrap { border: ". 0 . ";}";
		}

		$header_search_label = get_theme_mod( 'responsive_header_search_label', '' );
		if ( ! empty( $header_search_label ) && 'full-screen' === get_theme_mod( 'search_style', 'search' ) ) {
			$custom_css .= "
				.responsive-header-search-icon-wrap {
					gap: 5px;
				}
			";
		}
		if ( is_customize_preview() ) {
			$custom_css .= "
				.responsive-header-search .search-submit {
					background: 0 0 !important;
					border: none !important;
					color: currentColor !important;
				}
			";
		}
		// Fetch header search padding and margin values.
		$header_search_padding_values = get_responsive_spacing_values('responsive_header_search_padding', 10, 10, 10, 10);
		$header_search_margin_values  = get_responsive_spacing_values('responsive_header_search_margin');
		$custom_css .= ".responsive-header-search-icon-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_search_padding_values['desktop'], $header_search_margin_values['desktop']);
		$custom_css .= "}";
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".responsive-header-search-icon-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_search_padding_values['tablet'], $header_search_margin_values['tablet']);
		$custom_css .= "}}";
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".responsive-header-search-icon-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_search_padding_values['mobile'], $header_search_margin_values['mobile']);
		$custom_css .= "}}";
	
		//Header Search Element CSS - End
	}

	// Mobile Header Search Element CSS - Start
	// Apply mobile-specific styles when search is in mobile header items
	if ( Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'search', 'header' ) ) {
		// Get the same search settings (shared between desktop and mobile)
		$header_search_label_visibility = get_theme_mod( 'responsive_header_search_label_visibility', array( 'desktop', 'tablet', 'mobile' ) );
		$custom_css .= ".site-mobile-header-item .responsive-header-search-icon-wrap .responsive-header-search-label { display: " . ( in_array( 'desktop', $header_search_label_visibility ) ? "block" : "none" ) . "; }";
	
		$custom_css .= "@media screen and (max-width: 992px) { .site-mobile-header-item .responsive-header-search-icon-wrap .responsive-header-search-label { display: " . ( in_array( 'tablet', $header_search_label_visibility ) ? "block" : "none" ) . "; } }";
		
		$custom_css .= "@media screen and (max-width: 576px) { .site-mobile-header-item .responsive-header-search-icon-wrap .responsive-header-search-label { display: " . ( in_array( 'mobile', $header_search_label_visibility ) ? "block" : "none" ) . "; } }";
	
		$header_search_design_style                      = esc_html( get_theme_mod( 'responsive_header_search_style_design', 'bordered' ) );
		$header_search_border_width                      = esc_html( get_theme_mod( 'responsive_header_search_border', 1 ) );
		$header_search_width                             = esc_html( get_theme_mod( 'responsive_header_search_width', 300 ) );
		$header_search_width_tablet                      = esc_html( get_theme_mod( 'responsive_header_search_width_tablet', 200 ) );
		$header_search_width_mobile                      = esc_html( get_theme_mod( 'responsive_header_search_width_mobile', 100 ) );
		$header_search_icon_size                         = esc_html( get_theme_mod( 'responsive_header_search_icon_size', 16 ) );
		$header_search_icon_size_tablet                  = esc_html( get_theme_mod( 'responsive_header_search_icon_size_tablet', 16 ) );
		$header_search_icon_size_mobile                  = esc_html( get_theme_mod( 'responsive_header_search_icon_size_mobile', 16 ) );
		$header_search_color                             = esc_html( get_theme_mod( 'responsive_header_search_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_color' ) ) );
		$header_search_hover_color                       = esc_html( get_theme_mod( 'responsive_header_search_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_hover_color' ) ) );
		$header_search_background_color                  = esc_html( get_theme_mod( 'responsive_header_search_background_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_background_color' ) ) );
		$header_search_background_hover_color            = esc_html( get_theme_mod( 'responsive_header_search_background_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_background_hover_color' ) ) );
		$header_search_text_color                        = esc_html( get_theme_mod( 'responsive_header_search_text_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_text_color' ) ) );
		$header_search_text_hover_color                  = esc_html( get_theme_mod( 'responsive_header_search_text_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_search_text_hover_color' ) ) );
		$header_search_modal_background_color            = esc_html( get_theme_mod( 'responsive_header_search_modal_background_color', '#FFFFFF' ) );
		$header_search_modal_background_color_tablet     = esc_html( get_theme_mod( 'responsive_header_search_modal_background_color_tablet', '#FFFFFF' ) );
		$header_search_modal_background_color_mobile     = esc_html( get_theme_mod( 'responsive_header_search_modal_background_color_mobile', '#FFFFFF' ) );
		$header_search_border_radius_top_left            = get_theme_mod( 'responsive_header_search_border_radius_top_left_radius', 0 );
		$header_search_border_radius_top_right           = get_theme_mod( 'responsive_header_search_border_radius_top_right_radius', 0 );
		$header_search_border_radius_bottom_right        = get_theme_mod( 'responsive_header_search_border_radius_bottom_right_radius', 0 );
		$header_search_border_radius_bottom_left         = get_theme_mod( 'responsive_header_search_border_radius_bottom_left_radius', 0 );
		$header_search_border_radius_tablet_top_left     = get_theme_mod( 'responsive_header_search_border_radius_tablet_top_left_radius', 0 );
		$header_search_border_radius_tablet_top_right    = get_theme_mod( 'responsive_header_search_border_radius_tablet_top_right_radius', 0 );
		$header_search_border_radius_tablet_bottom_right = get_theme_mod( 'responsive_header_search_border_radius_tablet_bottom_right_radius', 0 );
		$header_search_border_radius_tablet_bottom_left  = get_theme_mod( 'responsive_header_search_border_radius_tablet_bottom_left_radius', 0 );
		$header_search_border_radius_mobile_top_left     = get_theme_mod( 'responsive_header_search_border_radius_mobile_top_left_radius', 0 );
		$header_search_border_radius_mobile_top_right    = get_theme_mod( 'responsive_header_search_border_radius_mobile_top_right_radius', 0 );
		$header_search_border_radius_mobile_bottom_right = get_theme_mod( 'responsive_header_search_border_radius_mobile_bottom_right_radius', 0 );
		$header_search_border_radius_mobile_bottom_left  = get_theme_mod( 'responsive_header_search_border_radius_mobile_bottom_left_radius', 0 );

		$custom_css .= "
			.site-mobile-header-item .responsive-header-search input[type=search] {
				height: {$header_search_icon_size}px;
			}
			.site-mobile-header-item .responsive-header-search-icon-wrap, .site-mobile-header-item .responsive-header-search input[type=search] {
				color: {$header_search_color};
				background: {$header_search_background_color};
			}
			.site-mobile-header-item .responsive-header-search-icon-wrap:hover, .site-mobile-header-item .responsive-header-search-icon-wrap:hover input[type=search] {
				color: {$header_search_hover_color};
				background: {$header_search_background_hover_color};
			}
			.site-mobile-header-item .responsive-header-search-icon svg {
				width: {$header_search_icon_size}px;
				height: {$header_search_icon_size}px;
			}
			.full-screen .site-mobile-header-item .full-screen-search-wrapper {
				background: {$header_search_modal_background_color};
			}
			.site-mobile-header-item .responsive-header-search input[type=search].search-field  {
				width: {$header_search_width}px;
			}
			@media screen and ( max-width: 992px ) {
				.site-mobile-header-item .responsive-header-search-icon svg {
					width: {$header_search_icon_size_tablet}px;
					height: {$header_search_icon_size_tablet}px;
				}
				.full-screen .site-mobile-header-item .full-screen-search-wrapper {
					background: {$header_search_modal_background_color_tablet};
				}
				.site-mobile-header-item .responsive-header-search input[type=search].search-field {
					width: {$header_search_width_tablet}px;
				}
			}
			@media screen and ( max-width: 576px ) {
				.site-mobile-header-item .responsive-header-search-icon svg {
					width: {$header_search_icon_size_mobile}px;
					height: {$header_search_icon_size_mobile}px;
				}
				.full-screen .site-mobile-header-item .full-screen-search-wrapper {
					background: {$header_search_modal_background_color_mobile};
				}
				.site-mobile-header-item .responsive-header-search input[type=search].search-field {
					width: {$header_search_width_mobile}px;
				}
			}
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input[type=search],
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input::placeholder,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .search-close,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper #search-close {
				color: {$header_search_text_color};
			}
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input[type=search]:hover,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input:hover::placeholder,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper:hover,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper .search-close:hover,
			.full-screen .site-mobile-header-item .full-screen-search-wrapper #search-close:hover {
				color: {$header_search_text_hover_color};
			}
		";

		if ( 'bordered' === $header_search_design_style ) {
			$custom_css.= "
				.site-mobile-header-item .responsive-header-search-icon-wrap {
					border: ". $header_search_border_width. "px solid currentColor;
					border-radius: " . responsive_spacing_css( $header_search_border_radius_top_left, $header_search_border_radius_top_right, $header_search_border_radius_bottom_right, $header_search_border_radius_bottom_left ) . ";
				}
				@media screen and ( max-width: 992px ) {
					.site-mobile-header-item .responsive-header-search-icon-wrap {
						border-radius: " . responsive_spacing_css( $header_search_border_radius_tablet_top_left, $header_search_border_radius_tablet_top_right, $header_search_border_radius_tablet_bottom_right, $header_search_border_radius_tablet_bottom_left ) . ";
					}
				}
				@media screen and ( max-width: 576px ) {
					.site-mobile-header-item .responsive-header-search-icon-wrap {
						border-radius: " . responsive_spacing_css( $header_search_border_radius_mobile_top_left, $header_search_border_radius_mobile_top_right, $header_search_border_radius_mobile_bottom_right, $header_search_border_radius_mobile_bottom_left ) . ";
					}
				}
			";
		} else {
			$custom_css.= ".site-mobile-header-item .responsive-header-search-icon-wrap { border: ". 0 . ";}";
		}

		$header_search_label = get_theme_mod( 'responsive_header_search_label', '' );
		if ( ! empty( $header_search_label ) && 'full-screen' === get_theme_mod( 'search_style', 'search' ) ) {
			$custom_css .= "
				.site-mobile-header-item .responsive-header-search-icon-wrap {
					gap: 5px;
				}
			";
		}
		if ( is_customize_preview() ) {
			$custom_css .= "
				.site-mobile-header-item .responsive-header-search .search-submit {
					background: 0 0 !important;
					border: none !important;
					color: currentColor !important;
				}
			";
		}
		// Fetch header search padding and margin values.
		$header_search_padding_values = get_responsive_spacing_values('responsive_header_search_padding', 10, 10, 10, 10);
		$header_search_margin_values  = get_responsive_spacing_values('responsive_header_search_margin');
		$custom_css .= ".site-mobile-header-item .responsive-header-search-icon-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_search_padding_values['desktop'], $header_search_margin_values['desktop']);
		$custom_css .= "}";
		$custom_css .= "@media screen and (max-width: 992px) {";
		$custom_css .= ".site-mobile-header-item .responsive-header-search-icon-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_search_padding_values['tablet'], $header_search_margin_values['tablet']);
		$custom_css .= "}}";
		$custom_css .= "@media screen and (max-width: 576px) {";
		$custom_css .= ".site-mobile-header-item .responsive-header-search-icon-wrap {";
		$custom_css .= responsive_build_responsive_spacing_css($header_search_padding_values['mobile'], $header_search_margin_values['mobile']);
		$custom_css .= "}}";
	
		//Mobile Header Search Element CSS - End
	}
	// Header Contact Info Element.
	if ( Responsive\Core\responsive_check_element_present_in_hfb( 'header_contact_info', 'header' ) ) {
		$header_contact_info_icons_color       = get_theme_mod( 'responsive_header_contact_info_icons_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icons_color' ) );
		$header_contact_info_icons_hover_color = get_theme_mod( 'responsive_header_contact_info_icons_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icons_hover_color' ) );
		$header_contact_info_icon_shape        = get_theme_mod( 'responsive_header_contact_info_icon_shape', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_shape' ) );
		$header_contact_info_icon_style        = get_theme_mod( 'responsive_header_contact_info_icon_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_style' ) );

		$custom_css .= ".site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container svg { fill:" . $header_contact_info_icons_color . "}";
		$custom_css .= ".site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container svg:hover { fill:" . $header_contact_info_icons_hover_color . "}";
		
		$header_contact_info_background_color       = get_theme_mod( 'responsive_header_contact_info_background_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_background_color' ) );
		$header_contact_info_background_hover_color = get_theme_mod( 'responsive_header_contact_info_background_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_background_hover_color' ) );

		if ( 'none' !== $header_contact_info_icon_shape ) {
			if ( 'filled' === $header_contact_info_icon_style ) {
				$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container { background-color: ' . $header_contact_info_background_color . '}';
				$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container:hover { background-color: ' . $header_contact_info_background_hover_color . '}';
			}
			if ( 'outline' === $header_contact_info_icon_style ) {
				$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container { border: 1px solid ' . $header_contact_info_background_color . '}';
				$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container:hover { border: 1px solid ' . $header_contact_info_background_hover_color . '}';
			}
		}

		$header_contact_info_font_color       = get_theme_mod( 'responsive_header_contact_info_font_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_font_color' ) );
		$header_contact_info_font_hover_color = get_theme_mod( 'responsive_header_contact_info_font_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_font_hover_color' ) );

		$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-title, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link { color: ' . $header_contact_info_font_color . '}';
		$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-title:hover, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text:hover, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link:hover { color: ' . $header_contact_info_font_hover_color . '}';

		$header_contact_info_margin_top    = get_theme_mod( 'responsive_header_contact_info_margin_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$header_contact_info_margin_right  = get_theme_mod( 'responsive_header_contact_info_margin_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );
		$header_contact_info_margin_bottom = get_theme_mod( 'responsive_header_contact_info_margin_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$header_contact_info_margin_left   = get_theme_mod( 'responsive_header_contact_info_margin_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );

		$header_contact_info_margin_top_tablet    = get_theme_mod( 'responsive_header_contact_info_margin_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$header_contact_info_margin_right_tablet  = get_theme_mod( 'responsive_header_contact_info_margin_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );
		$header_contact_info_margin_bottom_tablet = get_theme_mod( 'responsive_header_contact_info_margin_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$header_contact_info_margin_left_tablet   = get_theme_mod( 'responsive_header_contact_info_margin_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );

		$header_contact_info_margin_top_mobile    = get_theme_mod( 'responsive_header_contact_info_margin_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$header_contact_info_margin_right_mobile  = get_theme_mod( 'responsive_header_contact_info_margin_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );
		$header_contact_info_margin_bottom_mobile = get_theme_mod( 'responsive_header_contact_info_margin_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$header_contact_info_margin_left_mobile   = get_theme_mod( 'responsive_header_contact_info_margin_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );

		$custom_css .= '.site-header-item .responsive-header-contact-info { margin: ' . responsive_spacing_css( $header_contact_info_margin_top, $header_contact_info_margin_right, $header_contact_info_margin_bottom, $header_contact_info_margin_left ) . ' }';
		$custom_css .= '@media screen and ( max-width: 992px ) {
			.site-header-item .responsive-header-contact-info { margin: ' . responsive_spacing_css( $header_contact_info_margin_top_tablet, $header_contact_info_margin_right_tablet, $header_contact_info_margin_bottom_tablet, $header_contact_info_margin_left_tablet ) . '; }
		}';
		$custom_css .= '@media screen and ( max-width: 576px ) {
			.site-header-item .responsive-header-contact-info { margin: ' . responsive_spacing_css( $header_contact_info_margin_top_mobile, $header_contact_info_margin_right_mobile, $header_contact_info_margin_bottom_mobile, $header_contact_info_margin_left_mobile ) . '; }
		}';

		$header_contact_info_icon_size = get_theme_mod( 'responsive_header_contact_info_icon_size', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_size' ) );

		$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container { width: ' . ($header_contact_info_icon_size * 2.5) . 'px; height: ' . ($header_contact_info_icon_size * 2.5) . 'px }';

		$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container svg { width: ' . $header_contact_info_icon_size . 'px; height: ' . $header_contact_info_icon_size . 'px }';

		$header_contact_info_icon_spacing = get_theme_mod( 'responsive_header_contact_info_item_spacing', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_item_spacing' ) );

		$custom_css .= '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types { gap: ' . $header_contact_info_icon_spacing . 'px }';
	}

	if( Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'header_contact_info', 'header' ) ) {
		$mobile_header_contact_info_icons_color       = get_theme_mod( 'responsive_mobile_header_contact_info_icons_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icons_color' ) );
		$mobile_header_contact_info_icons_hover_color = get_theme_mod( 'responsive_mobile_header_contact_info_icons_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icons_hover_color' ) );
		$mobile_header_contact_info_icon_shape        = get_theme_mod( 'responsive_mobile_header_contact_info_icon_shape', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_shape' ) );
		$mobile_header_contact_info_icon_style        = get_theme_mod( 'responsive_mobile_header_contact_info_icon_style', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_style' ) );

		$custom_css .= ".site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container svg { fill:" . $mobile_header_contact_info_icons_color . "}";
		$custom_css .= ".site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container svg:hover { fill:" . $mobile_header_contact_info_icons_hover_color . "}";
		
		$mobile_header_contact_info_background_color       = get_theme_mod( 'responsive_mobile_header_contact_info_background_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_background_color' ) );
		$mobile_header_contact_info_background_hover_color = get_theme_mod( 'responsive_mobile_header_contact_info_background_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_background_hover_color' ) );

		if ( 'none' !== $mobile_header_contact_info_icon_shape ) {
			if ( 'filled' === $mobile_header_contact_info_icon_style ) {
				$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container { background-color: ' . $mobile_header_contact_info_background_color . '}';
				$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container:hover { background-color: ' . $mobile_header_contact_info_background_hover_color . '}';
			}
			if ( 'outline' === $mobile_header_contact_info_icon_style ) {
				$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container { border: 1px solid ' . $mobile_header_contact_info_background_color . '}';
				$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container:hover { border: 1px solid ' . $mobile_header_contact_info_background_hover_color . '}';
			}
		}

		$mobile_header_contact_info_font_color       = get_theme_mod( 'responsive_mobile_header_contact_info_font_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_font_color' ) );
		$mobile_header_contact_info_font_hover_color = get_theme_mod( 'responsive_mobile_header_contact_info_font_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_font_hover_color' ) );

		$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link { color: ' . $mobile_header_contact_info_font_color . '}';
		$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-title:hover, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text:hover, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link:hover { color: ' . $mobile_header_contact_info_font_hover_color . '}';

		$mobile_header_contact_info_margin_top    = get_theme_mod( 'responsive_mobile_header_contact_info_margin_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$mobile_header_contact_info_margin_right  = get_theme_mod( 'responsive_mobile_header_contact_info_margin_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );
		$mobile_header_contact_info_margin_bottom = get_theme_mod( 'responsive_mobile_header_contact_info_margin_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$mobile_header_contact_info_margin_left   = get_theme_mod( 'responsive_mobile_header_contact_info_margin_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );

		$mobile_header_contact_info_margin_top_tablet    = get_theme_mod( 'responsive_mobile_header_contact_info_margin_tablet_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$mobile_header_contact_info_margin_right_tablet  = get_theme_mod( 'responsive_mobile_header_contact_info_margin_tablet_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );
		$mobile_header_contact_info_margin_bottom_tablet = get_theme_mod( 'responsive_mobile_header_contact_info_margin_tablet_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$mobile_header_contact_info_margin_left_tablet   = get_theme_mod( 'responsive_mobile_header_contact_info_margin_tablet_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );

		$mobile_header_contact_info_margin_top_mobile    = get_theme_mod( 'responsive_mobile_header_contact_info_margin_mobile_top_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$mobile_header_contact_info_margin_right_mobile  = get_theme_mod( 'responsive_mobile_header_contact_info_margin_mobile_right_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );
		$mobile_header_contact_info_margin_bottom_mobile = get_theme_mod( 'responsive_mobile_header_contact_info_margin_mobile_bottom_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_y' ) );
		$mobile_header_contact_info_margin_left_mobile   = get_theme_mod( 'responsive_mobile_header_contact_info_margin_mobile_left_padding', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_margin_x' ) );

		$custom_css .= '.site-mobile-header-item .responsive-header-contact-info { margin: ' . responsive_spacing_css( $mobile_header_contact_info_margin_top, $mobile_header_contact_info_margin_right, $mobile_header_contact_info_margin_bottom, $mobile_header_contact_info_margin_left ) . ' }';
		$custom_css .= '@media screen and ( max-width: 992px ) {
			.site-mobile-header-item .responsive-header-contact-info { margin: ' . responsive_spacing_css( $mobile_header_contact_info_margin_top_tablet, $mobile_header_contact_info_margin_right_tablet, $mobile_header_contact_info_margin_bottom_tablet, $mobile_header_contact_info_margin_left_tablet ) . '; }
		}';
		$custom_css .= '@media screen and ( max-width: 576px ) {
			.site-mobile-header-item .responsive-header-contact-info { margin: ' . responsive_spacing_css( $mobile_header_contact_info_margin_top_mobile, $mobile_header_contact_info_margin_right_mobile, $mobile_header_contact_info_margin_bottom_mobile, $mobile_header_contact_info_margin_left_mobile ) . '; }
		}';

		$mobile_header_contact_info_icon_size = get_theme_mod( 'responsive_mobile_header_contact_info_icon_size', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_icon_size' ) );

		$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container { width: ' . ($mobile_header_contact_info_icon_size * 2.5) . 'px; height: ' . ($mobile_header_contact_info_icon_size * 2.5) . 'px }';

		$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icon-container svg { width: ' . $mobile_header_contact_info_icon_size . 'px; height: ' . $mobile_header_contact_info_icon_size . 'px }';

		$mobile_header_contact_info_icon_spacing = get_theme_mod( 'responsive_mobile_header_contact_info_item_spacing', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_contact_info_item_spacing' ) );

		$custom_css .= '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types { gap: ' . $mobile_header_contact_info_icon_spacing . 'px }';

		// Mobile Header Contact Info Typography
		$mobile_header_contact_info_typography = get_theme_mod( 'mobile_header_contact_info_typography' );
		if ( $mobile_header_contact_info_typography && is_array( $mobile_header_contact_info_typography ) ) {
			$custom_css .= ".site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text {";
			foreach ( $mobile_header_contact_info_typography as $prop => $val ) {
				if ( $val ) {
					$custom_css .= $prop . ': ' . $val . ';';
				}
			}
			$custom_css .= "}";
		}

		// Mobile Header Contact Info Tablet Typography
		$mobile_header_contact_info_tablet_typography = get_theme_mod( 'mobile_header_contact_info_tablet_typography' );
		if ( $mobile_header_contact_info_tablet_typography && is_array( $mobile_header_contact_info_tablet_typography ) ) {
			$custom_css .= "@media screen and ( max-width: 992px ) {";
			$custom_css .= ".site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text {";
			foreach ( $mobile_header_contact_info_tablet_typography as $prop => $val ) {
				if ( $val ) {
					$custom_css .= $prop . ': ' . $val . ';';
				}
			}
			$custom_css .= "}";
			$custom_css .= "}";
		}

		// Mobile Header Contact Info Mobile Typography
		$mobile_header_contact_info_mobile_typography = get_theme_mod( 'mobile_header_contact_info_mobile_typography' );
		if ( $mobile_header_contact_info_mobile_typography && is_array( $mobile_header_contact_info_mobile_typography ) ) {
			$custom_css .= "@media screen and ( max-width: 576px ) {";
			$custom_css .= ".site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text {";
			foreach ( $mobile_header_contact_info_mobile_typography as $prop => $val ) {
				if ( $val ) {
					$custom_css .= $prop . ': ' . $val . ';';
				}
			}
			$custom_css .= "}";
			$custom_css .= "}";
		}
	}
	if ( ! class_exists( 'Responsive_Addons_Pro' ) ) {
		// Outside Container Spacing.
		$outside_container_padding_right  = esc_html( get_theme_mod( 'responsive_outside_container_right_padding', 15 ) );
		$outside_container_padding_left   = esc_html( get_theme_mod( 'responsive_outside_container_left_padding', 15 ) );
		$outside_container_padding_top    = esc_html( get_theme_mod( 'responsive_outside_container_top_padding', 0 ) );
		$outside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_outside_container_bottom_padding', 0 ) );

		$outside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_outside_container_tablet_right_padding', 15 ) );
		$outside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_outside_container_tablet_left_padding', 15 ) );
		$outside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_outside_container_tablet_top_padding', 0 ) );
		$outside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_outside_container_tablet_bottom_padding', 0 ) );

		$outside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_outside_container_mobile_right_padding', 15 ) );
		$outside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_outside_container_mobile_left_padding', 15 ) );
		$outside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_outside_container_mobile_top_padding', 0 ) );
		$outside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_outside_container_mobile_bottom_padding', 0 ) );

		// Outside Container Spacing.
		$blog_outside_container_padding_right  = esc_html( get_theme_mod( 'responsive_blog_outside_container_right_padding', 15 ) );
		$blog_outside_container_padding_left   = esc_html( get_theme_mod( 'responsive_blog_outside_container_left_padding', 15 ) );
		$blog_outside_container_padding_top    = esc_html( get_theme_mod( 'responsive_blog_outside_container_top_padding', 0 ) );
		$blog_outside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_blog_outside_container_bottom_padding', 0 ) );

		$blog_outside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_blog_outside_container_tablet_right_padding', 15 ) );
		$blog_outside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_blog_outside_container_tablet_left_padding', 15 ) );
		$blog_outside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_blog_outside_container_tablet_top_padding', 0 ) );
		$blog_outside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_blog_outside_container_tablet_bottom_padding', 0 ) );

		$blog_outside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_blog_outside_container_mobile_right_padding', 15 ) );
		$blog_outside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_blog_outside_container_mobile_left_padding', 15 ) );
		$blog_outside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_blog_outside_container_mobile_top_padding', 0 ) );
		$blog_outside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_blog_outside_container_mobile_bottom_padding', 0 ) );

		// Inside Container Spacing.
		$blog_inside_container_padding_right  = esc_html( get_theme_mod( 'responsive_blog_inside_container_right_padding', 15 ) );
		$blog_inside_container_padding_left   = esc_html( get_theme_mod( 'responsive_blog_inside_container_left_padding', 15 ) );
		$blog_inside_container_padding_top    = esc_html( get_theme_mod( 'responsive_blog_inside_container_top_padding', 15 ) );
		$blog_inside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_blog_inside_container_bottom_padding', 15 ) );

		$blog_inside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_blog_inside_container_tablet_right_padding', 15 ) );
		$blog_inside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_blog_inside_container_tablet_left_padding', 15 ) );
		$blog_inside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_blog_inside_container_tablet_top_padding', 15 ) );
		$blog_inside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_blog_inside_container_tablet_bottom_padding', 15 ) );

		$blog_inside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_blog_inside_container_mobile_right_padding', 15 ) );
		$blog_inside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_blog_inside_container_mobile_left_padding', 15 ) );
		$blog_inside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_blog_inside_container_mobile_top_padding', 15 ) );
		$blog_inside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_blog_inside_container_mobile_bottom_padding', 15 ) );

		// Outside Container Spacing.
		$single_blog_outside_container_padding_right  = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_right_padding', 15 ) );
		$single_blog_outside_container_padding_left   = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_left_padding', 15 ) );
		$single_blog_outside_container_padding_top    = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_top_padding', 0 ) );
		$single_blog_outside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_bottom_padding', 0 ) );

		$single_blog_outside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_tablet_right_padding', 15 ) );
		$single_blog_outside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_tablet_left_padding', 15 ) );
		$single_blog_outside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_tablet_top_padding', 0 ) );
		$single_blog_outside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_tablet_bottom_padding', 0 ) );

		$single_blog_outside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_mobile_right_padding', 15 ) );
		$single_blog_outside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_mobile_left_padding', 15 ) );
		$single_blog_outside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_mobile_top_padding', 0 ) );
		$single_blog_outside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_single_blog_outside_container_mobile_bottom_padding', 0 ) );

		// Inside Container Spacing.
		$single_blog_inside_container_padding_right  = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_right_padding', 15 ) );
		$single_blog_inside_container_padding_left   = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_left_padding', 15 ) );
		$single_blog_inside_container_padding_top    = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_top_padding', 15 ) );
		$single_blog_inside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_bottom_padding', 15 ) );

		$single_blog_inside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_tablet_right_padding', 15 ) );
		$single_blog_inside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_tablet_left_padding', 15 ) );
		$single_blog_inside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_tablet_top_padding', 15 ) );
		$single_blog_inside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_tablet_bottom_padding', 15 ) );

		$single_blog_inside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_mobile_right_padding', 15 ) );
		$single_blog_inside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_mobile_left_padding', 15 ) );
		$single_blog_inside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_mobile_top_padding', 15 ) );
		$single_blog_inside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_single_blog_inside_container_mobile_bottom_padding', 15 ) );

		// Outside Container Spacing.
		$sidebar_outside_container_padding_right  = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_right_padding', 15 ) );
		$sidebar_outside_container_padding_left   = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_left_padding', 15 ) );
		$sidebar_outside_container_padding_top    = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_top_padding', 0 ) );
		$sidebar_outside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_bottom_padding', 0 ) );

		$sidebar_outside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_tablet_right_padding', 15 ) );
		$sidebar_outside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_tablet_left_padding', 15 ) );
		$sidebar_outside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_tablet_top_padding', 0 ) );
		$sidebar_outside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_tablet_bottom_padding', 0 ) );

		$sidebar_outside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_mobile_right_padding', 15 ) );
		$sidebar_outside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_mobile_left_padding', 15 ) );
		$sidebar_outside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_mobile_top_padding', 0 ) );
		$sidebar_outside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_sidebar_outside_container_mobile_bottom_padding', 0 ) );

		// Inside Container Spacing.
		$sidebar_inside_container_padding_right  = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_right_padding', 28 ) );
		$sidebar_inside_container_padding_left   = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_left_padding', 28 ) );
		$sidebar_inside_container_padding_top    = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_top_padding', 28 ) );
		$sidebar_inside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_bottom_padding', 28 ) );

		$sidebar_inside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_tablet_right_padding', 28 ) );
		$sidebar_inside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_tablet_left_padding', 28 ) );
		$sidebar_inside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_tablet_top_padding', 28 ) );
		$sidebar_inside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_tablet_bottom_padding', 28 ) );

		$sidebar_inside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_mobile_right_padding', 28 ) );
		$sidebar_inside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_mobile_left_padding', 28 ) );
		$sidebar_inside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_mobile_top_padding', 28 ) );
		$sidebar_inside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_sidebar_inside_container_mobile_bottom_padding', 28 ) );

		$custom_css .= '
		.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area{
			padding: ' . responsive_spacing_css( $outside_container_padding_top, $outside_container_padding_right, $outside_container_padding_bottom, $outside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area{
				padding: ' . responsive_spacing_css( $outside_container_tablet_padding_top, $outside_container_tablet_padding_right, $outside_container_tablet_padding_bottom, $outside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area{
				padding: ' . responsive_spacing_css( $outside_container_mobile_padding_top, $outside_container_mobile_padding_right, $outside_container_mobile_padding_bottom, $outside_container_mobile_padding_left ) . ';
			}
		}

		.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area{
			padding: ' . responsive_spacing_css( $blog_outside_container_padding_top, $blog_outside_container_padding_right, $blog_outside_container_padding_bottom, $blog_outside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area{
				padding: ' . responsive_spacing_css( $blog_outside_container_tablet_padding_top, $blog_outside_container_tablet_padding_right, $blog_outside_container_tablet_padding_bottom, $blog_outside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area{
				padding: ' . responsive_spacing_css( $blog_outside_container_mobile_padding_top, $blog_outside_container_mobile_padding_right, $blog_outside_container_mobile_padding_bottom, $blog_outside_container_mobile_padding_left ) . ';
			}
		}

		.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry{
			padding: ' . responsive_spacing_css( $blog_inside_container_padding_top, $blog_inside_container_padding_right, $blog_inside_container_padding_bottom, $blog_inside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry{
				padding: ' . responsive_spacing_css( $blog_inside_container_tablet_padding_top, $blog_inside_container_tablet_padding_right, $blog_inside_container_tablet_padding_bottom, $blog_inside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry{
				padding: ' . responsive_spacing_css( $blog_inside_container_mobile_padding_top, $blog_inside_container_mobile_padding_right, $blog_inside_container_mobile_padding_bottom, $blog_inside_container_mobile_padding_left ) . ';
			}
		}

		.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area{
			padding: ' . responsive_spacing_css( $single_blog_outside_container_padding_top, $single_blog_outside_container_padding_right, $single_blog_outside_container_padding_bottom, $single_blog_outside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area{
				padding: ' . responsive_spacing_css( $single_blog_outside_container_tablet_padding_top, $single_blog_outside_container_tablet_padding_right, $single_blog_outside_container_tablet_padding_bottom, $single_blog_outside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area{
				padding: ' . responsive_spacing_css( $single_blog_outside_container_mobile_padding_top, $single_blog_outside_container_mobile_padding_right, $single_blog_outside_container_mobile_padding_bottom, $single_blog_outside_container_mobile_padding_left ) . ';
			}
		}
		.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry{
			padding: ' . responsive_spacing_css( $single_blog_inside_container_padding_top, $single_blog_inside_container_padding_right, $single_blog_inside_container_padding_bottom, $single_blog_inside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry{
				padding: ' . responsive_spacing_css( $single_blog_inside_container_tablet_padding_top, $single_blog_inside_container_tablet_padding_right, $single_blog_inside_container_tablet_padding_bottom, $single_blog_inside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry{
				padding: ' . responsive_spacing_css( $single_blog_inside_container_mobile_padding_top, $single_blog_inside_container_mobile_padding_right, $single_blog_inside_container_mobile_padding_bottom, $single_blog_inside_container_mobile_padding_left ) . ';
			}
		}

		#secondary.widget-area {
			padding: ' . responsive_spacing_css( $sidebar_outside_container_padding_top, $sidebar_outside_container_padding_right, $sidebar_outside_container_padding_bottom, $sidebar_outside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			#secondary.widget-area {
				padding: ' . responsive_spacing_css( $sidebar_outside_container_tablet_padding_top, $sidebar_outside_container_tablet_padding_right, $sidebar_outside_container_tablet_padding_bottom, $sidebar_outside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			#secondary.widget-area {
				padding: ' . responsive_spacing_css( $sidebar_outside_container_mobile_padding_top, $sidebar_outside_container_mobile_padding_right, $sidebar_outside_container_mobile_padding_bottom, $sidebar_outside_container_mobile_padding_left ) . ';
			}
		}
		#secondary.widget-area .widget-wrapper{
			padding: ' . responsive_spacing_css( $sidebar_inside_container_padding_top, $sidebar_inside_container_padding_right, $sidebar_inside_container_padding_bottom, $sidebar_inside_container_padding_left ) . ';
		}
		@media screen and ( max-width: 992px ) {
			#secondary.widget-area .widget-wrapper{
				padding: ' . responsive_spacing_css( $sidebar_inside_container_tablet_padding_top, $sidebar_inside_container_tablet_padding_right, $sidebar_inside_container_tablet_padding_bottom, $sidebar_inside_container_tablet_padding_left ) . ';
			}
		}
		@media screen and ( max-width: 576px ) {
			#secondary.widget-area .widget-wrapper{
				padding: ' . responsive_spacing_css( $sidebar_inside_container_mobile_padding_top, $sidebar_inside_container_mobile_padding_right, $sidebar_inside_container_mobile_padding_bottom, $sidebar_inside_container_mobile_padding_left ) . ';
			}
		}
		';

		// Mobile Menu Breakpoint.
		$disable_mobile_menu    = get_theme_mod( 'responsive_disable_mobile_menu', 1 );
		$mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 );

		if ( 0 === $disable_mobile_menu ) {
			$mobile_menu_breakpoint = 0;
		}

		$responsive_disable_sticky_header_mobile_menu = get_theme_mod( 'responsive_disable_sticky_header_mobile_menu', 0 );
		if ( '1' == $responsive_disable_sticky_header_mobile_menu ) {
			$custom_css .= "@media (max-width:{$mobile_menu_breakpoint}px) {
				#masthead.sticky-header, .res-transparent-header #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header,
				#masthead-mobile.sticky-header, .res-transparent-header #masthead-mobile.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead-mobile.sticky-header {
					position: relative;
					scroll-behavior: smooth;
				}
				#wrapper.site-content {
					margin-top: 0px !important;
				}
			}";
		}

		$sticky_header_background_color             = get_theme_mod( 'responsive_sticky_header_background_color' );
		$sticky_header_site_title_color             = get_theme_mod( 'responsive_sticky_header_site_title_color' );
		$sticky_header_site_title_hover_color       = get_theme_mod( 'responsive_sticky_header_site_title_hover_color' );
		$sticky_header_text_color                   = get_theme_mod( 'responsive_sticky_header_text_color' );
		$sticky_header_menu_background_color        = get_theme_mod( 'responsive_sticky_header_menu_background_color' );
		$sticky_header_active_menu_background_color = get_theme_mod( 'responsive_sticky_header_active_menu_background_color' );
		$sticky_header_menu_link_color              = get_theme_mod( 'responsive_sticky_header_menu_link_color' );
		$sticky_header_menu_link_hover_color        = get_theme_mod( 'responsive_sticky_header_menu_link_hover_color' );
		$sticky_header_sub_menu_background_color    = get_theme_mod( 'responsive_sticky_header_sub_menu_background_color' );
		$sticky_header_sub_menu_link_color          = get_theme_mod( 'responsive_sticky_header_sub_menu_link_color' );
		$sticky_header_sub_menu_link_hover_color    = get_theme_mod( 'responsive_sticky_header_sub_menu_link_hover_color' );

		$custom_css .= "
			#masthead.sticky-header, .res-transparent-header #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header {
				background-color: {$sticky_header_background_color};
			}
			#masthead-mobile.sticky-header, .res-transparent-header #masthead-mobile.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead-mobile.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead-mobile.sticky-header {
				background-color: {$sticky_header_background_color};
			}
			#masthead.sticky-header .site-title a, .res-transparent-header #masthead.sticky-header .site-title a {
				color: {$sticky_header_site_title_color};
			}
			#masthead-mobile.sticky-header .site-title a, .res-transparent-header #masthead-mobile.sticky-header .site-title a {
				color: {$sticky_header_site_title_color};
			}
			#masthead.sticky-header .site-title a:hover, .res-transparent-header #masthead.sticky-header .site-title a:hover {
				color: {$sticky_header_site_title_hover_color};
			}
			#masthead-mobile.sticky-header .site-title a:hover, .res-transparent-header #masthead-mobile.sticky-header .site-title a:hover {
				color: {$sticky_header_site_title_hover_color};
			}
			#masthead.sticky-header .site-description, .res-transparent-header #masthead.sticky-header .site-description {
				color: {$sticky_header_text_color};
			}
			#masthead-mobile.sticky-header .site-description, .res-transparent-header #masthead-mobile.sticky-header .site-description {
				color: {$sticky_header_text_color};
			}
			#masthead.sticky-header .site-header-row .main-navigation .main-navigation-wrapper, #masthead.sticky-header .site-header-row .main-navigation.toggled {
				background-color: {$sticky_header_menu_background_color};
			}
			#masthead-mobile.sticky-header .site-mobile-header-row .main-navigation .main-navigation-wrapper, #masthead-mobile.sticky-header .site-mobile-header-row .main-navigation.toggled {
				background-color: {$sticky_header_menu_background_color};
			}
			#masthead.sticky-header .main-navigation .menu > li > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu > li > a {
				color: {$sticky_header_menu_link_color};
			}
			#masthead-mobile.sticky-header .main-navigation .menu > li > a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu > li > a {
				color: {$sticky_header_menu_link_color};
			}

			#masthead.sticky-header .main-navigation .menu .current_page_item > a,
			#masthead.sticky-header .main-navigation .menu .current-menu-item > a,
			#masthead.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current_page_item > a,
			.res-transparent-header #masthead.sticky-header .main-navigation .menu .current-menu-item > a,
			.res-transparent-header #masthead.sticky-header .main-navigation .menu li > a:hover {
				color: {$sticky_header_menu_link_hover_color};
				background-color: {$sticky_header_active_menu_background_color};
			}
			#masthead-mobile.sticky-header .main-navigation .menu .current_page_item > a,
			#masthead-mobile.sticky-header .main-navigation .menu .current-menu-item > a,
			#masthead-mobile.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu .current_page_item > a,
			.res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu .current-menu-item > a,
			.res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu li > a:hover {
				color: {$sticky_header_menu_link_hover_color};
				background-color: {$sticky_header_active_menu_background_color};
			}
			#masthead.sticky-header .main-navigation .children,
			#masthead.sticky-header .main-navigation .sub-menu, .res-transparent-header #masthead.sticky-header .main-navigation .children,
			.res-transparent-header #masthead.sticky-header .main-navigation .sub-menu {
				background-color: {$sticky_header_sub_menu_background_color};
			}
			#masthead-mobile.sticky-header .main-navigation .children,
			#masthead-mobile.sticky-header .main-navigation .sub-menu, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .children,
			.res-transparent-header #masthead-mobile.sticky-header .main-navigation .sub-menu {
				background-color: {$sticky_header_sub_menu_background_color};
			}
			#masthead.sticky-header .main-navigation .children li a,
			#masthead.sticky-header .main-navigation .sub-menu li a, .res-transparent-header #masthead.sticky-header .main-navigation .children li a,
			.res-transparent-header #masthead.sticky-header .main-navigation .sub-menu li a {
				color: {$sticky_header_sub_menu_link_color};
			}
			#masthead-mobile.sticky-header .main-navigation .children li a,
			#masthead-mobile.sticky-header .main-navigation .sub-menu li a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .children li a,
			.res-transparent-header #masthead-mobile.sticky-header .main-navigation .sub-menu li a {
				color: {$sticky_header_sub_menu_link_color};
			}
			#masthead.sticky-header .main-navigation .children li a:hover,
			#masthead.sticky-header .main-navigation .sub-menu li a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .children li a:hover,
			.res-transparent-header #masthead.sticky-header .main-navigation .sub-menu li a:hover {
				color: {$sticky_header_sub_menu_link_hover_color};
			}
			#masthead-mobile.sticky-header .main-navigation .children li a:hover,
			#masthead-mobile.sticky-header .main-navigation .sub-menu li a:hover, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .children li a:hover,
			.res-transparent-header #masthead-mobile.sticky-header .main-navigation .sub-menu li a:hover {
				color: {$sticky_header_sub_menu_link_hover_color};
			}
			";

		// Styling for blog/archive date box.
		$responsive_date_box             = esc_html( get_theme_mod( 'responsive_date_box_toggle' ) );
		$date_box_background_color       = esc_html( responsive_prepare_css_value( 'responsive_link_color' ) );
		$date_box_calculated_color_value = required_font_color_value( $date_box_background_color );

		/* Taking body font size value for all views */
		$body_font_val_desktop = ( isset( get_theme_mod( 'body_typography' )['font-size'] ) && '' !== get_theme_mod( 'body_typography' )['font-size'] ) ? get_theme_mod( 'body_typography' )['font-size'] : '16px';
		$body_font_val_desktop = typography_unit_conversion($body_font_val_desktop, 16);
		$body_font_val_tablet  = ( isset( get_theme_mod( 'body_tablet_typography' )['font-size'] ) && '' !== get_theme_mod( 'body_tablet_typography' )['font-size'] ) ? get_theme_mod( 'body_tablet_typography' )['font-size'] : '16px';
		$body_font_val_tablet = typography_unit_conversion($body_font_val_tablet, 16);
		$body_font_val_mobile  = ( isset( get_theme_mod( 'body_mobile_typography' )['font-size'] ) && '' !== get_theme_mod( 'body_mobile_typography' )['font-size'] ) ? get_theme_mod( 'body_mobile_typography' )['font-size'] : '16px';
		$body_font_val_mobile = typography_unit_conversion($body_font_val_mobile, 16);

		/* Calculation for desktop view */
		$datebox_month_year_font_desktop        = $body_font_val_desktop - 2.5;
		$datebox_day_font_desktop               = $body_font_val_desktop * 2;
		$datebox_container_width_height_desktop = ( $body_font_val_desktop * 2 ) + $datebox_day_font_desktop + 20;

		/* Calculation for tablet view */
		$datebox_month_year_font_tablet        = $body_font_val_tablet - 2.5;
		$datebox_day_font_tablet               = $body_font_val_tablet * 2;
		$datebox_container_width_height_tablet = ( $body_font_val_tablet * 2 ) + $datebox_day_font_tablet + 20;
		
		/* Calculation for mobile view */
		$datebox_month_year_font_mobile        = $body_font_val_mobile - 2.5;
		$datebox_day_font_mobile               = $body_font_val_mobile * 2;
		$datebox_container_width_height_mobile = ( $body_font_val_mobile * 2 ) + $datebox_day_font_mobile + 20;

		if ( $responsive_date_box ) {
			$custom_css .= ".responsive-date-box {
				background-color: {$date_box_background_color};
				width: {$datebox_container_width_height_desktop}px;
				height: {$datebox_container_width_height_desktop}px;
			}
			.date-box-day {
				color: {$date_box_calculated_color_value};
				font-size: {$datebox_day_font_desktop}px;
			}
			.date-box-month {
				color: {$date_box_calculated_color_value};
				font-size: {$datebox_month_year_font_desktop}px;
			}
			.date-box-year {
				color: {$date_box_calculated_color_value};
				font-size: {$datebox_month_year_font_desktop}px;
			}
			@media (min-width: 576px) and (max-width: 768px) {
				.responsive-date-box {
					width: {$datebox_container_width_height_tablet}px;
					height: {$datebox_container_width_height_tablet}px;
				}
				.date-box-day {
					font-size: {$datebox_day_font_tablet}px;
				}
				.date-box-month,
				.date-box-year {
					font-size: {$datebox_month_year_font_tablet}px;
				}
			}
			@media (max-width: 575px) {
				.responsive-date-box {
					width: {$datebox_container_width_height_mobile}px;
					height: {$datebox_container_width_height_mobile}px;
				}
				.date-box-day {
					font-size: {$datebox_day_font_mobile}px;
				}
				.date-box-month,
				.date-box-year {
					font-size: {$datebox_month_year_font_mobile}px;
				}
			}";
		}

		// Change of blog/archive date box style.
		$responsive_date_box_style = esc_html( get_theme_mod( 'responsive_date_box_style' ) );
		if ( 'round' === $responsive_date_box_style ) {
			$custom_css .= '.responsive-date-box {
				border-radius: 100%;
			}';
		} elseif ( 'square' === $responsive_date_box_style ) {
			$custom_css .= '.responsive-date-box {
				border-radius: 0;
			}';
		} else {
			$custom_css .= '.responsive-date-box {
				border-radius: 0;
			}';
		}
	}

	//font preset css conditional addition
	$font_preset_css = "";
	$preset = get_theme_mod( 'responsive_font_presets', '' );
	if ( $preset !== '' ) {
		$choices = json_decode( get_theme_mod( 'font_presets_value'),true );
		if ( isset( $choices[ $preset ] ) ) {
			$headingFontFamily = $choices[ $preset ]['headingFont'];
			$bodyFontFamily = $choices[ $preset ]['bodyFont'];
			$bodyFontWeight = $choices[ $preset ]['bodyWeight'];
			$headingFontWeight = $choices[ $preset ]['headingWeight'];
			responsive_enqueue_google_font($bodyFontFamily);
			responsive_enqueue_google_font($headingFontFamily);
			$font_preset_css .= "
			/* Font Preset */
			body, .post-meta * {
				font-family: {$bodyFontFamily};
				font-weight: {$bodyFontWeight};
			}
			h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
				font-family: {$headingFontFamily};
				font-weight: {$headingFontWeight};
			}";
		}
	}

	// Footer Builder Widget Elements alignments.
	for ( $i = 1; $i <= 6; $i++ ) {
		// Check if element is present in footer builder.
		if ( Responsive\Core\responsive_check_element_present_in_hfb( "widget-{$i}", 'footer' ) || Responsive\Core\responsive_check_element_in_mobile_tablet_items( "widget-{$i}", 'footer' ) ) {

			// Content Alignment.
			$widget_align_desktop = get_theme_mod( "responsive_footer_widget{$i}_content_align", 'left' );
			$widget_align_tablet  = get_theme_mod( "responsive_footer_widget{$i}_content_align_tablet", 'left' );
			$widget_align_mobile  = get_theme_mod( "responsive_footer_widget{$i}_content_align_mobile", 'left' );
			// Content Vertical Alignment.
			$widget_vertical_align_desktop = get_theme_mod( "responsive_footer_widget{$i}_content_vertical_align", 'flex-start' );
			$widget_vertical_align_tablet  = get_theme_mod( "responsive_footer_widget{$i}_content_vertical_align_tablet", 'flex-start' );
			$widget_vertical_align_mobile  = get_theme_mod( "responsive_footer_widget{$i}_content_vertical_align_mobile", 'flex-start' );
			// Heading Color
			$widget_heading_color = get_theme_mod( "responsive_footer_widget{$i}_title_color", get_theme_mod( 'responsive_footer_text_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_title_color' ) ) );
			$widget_heading_color_tablet = get_theme_mod( "responsive_footer_widget{$i}_title_color_tablet", $widget_heading_color );
			$widget_heading_color_mobile = get_theme_mod( "responsive_footer_widget{$i}_title_color_mobile", $widget_heading_color_tablet );
			// Content Color
			$widget_content_color = get_theme_mod( "responsive_footer_widget{$i}_content_color", get_theme_mod( 'responsive_footer_text_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_content_color' ) ) );
			$widget_content_color_tablet = get_theme_mod( "responsive_footer_widget{$i}_content_color_tablet", $widget_content_color );
			$widget_content_color_mobile = get_theme_mod( "responsive_footer_widget{$i}_content_color_mobile", $widget_content_color_tablet );
			// Link Colors
			$widget_link_color       = get_theme_mod( "responsive_footer_widget{$i}_link_color", get_theme_mod( 'responsive_footer_links_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_link_color' ) ) );
			$widget_link_color_tablet = get_theme_mod( "responsive_footer_widget{$i}_link_color_tablet", $widget_link_color );
			$widget_link_color_mobile = get_theme_mod( "responsive_footer_widget{$i}_link_color_mobile", $widget_link_color );
			$widget_link_hover_color = get_theme_mod( "responsive_footer_widget{$i}_link_hover_color", get_theme_mod( 'responsive_footer_links_hover_color', Responsive\Core\get_responsive_customizer_defaults( 'footer_widget_link_hover_color' ) ) );
			$widget_link_hover_color_tablet = get_theme_mod( "responsive_footer_widget{$i}_link_hover_color_tablet", $widget_link_hover_color );
			$widget_link_hover_color_mobile = get_theme_mod( "responsive_footer_widget{$i}_link_hover_color_mobile", $widget_link_hover_color );


			$custom_css .= "
			.footer-mobile-items, .footer-desktop-items {
				width: 100%;
			}
			.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
				text-align: {$widget_align_desktop};
			}
			.rspv-hfb-footer-row-inline .footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
				align-self: {$widget_vertical_align_desktop};
			}
			@media screen and (max-width: 992px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
					text-align: {$widget_align_tablet};
				}
				.rspv-hfb-footer-row-inline .footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
					align-self: {$widget_vertical_align_tablet};
				}
			}
			@media screen and (max-width: 576px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
					text-align: {$widget_align_mobile};
				}
				.rspv-hfb-footer-row-inline .footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
					align-self: {$widget_vertical_align_mobile};
				}
			}
			.footer-widget-area[data-section='responsive-footer-widget-{$i}'] h1, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h2, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h3, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h4, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h5, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h6 {
				color: {$widget_heading_color};
			}
			@media screen and (max-width: 992px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'] h1, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h2, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h3, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h4, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h5, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h6 {
					color: {$widget_heading_color_tablet};
				}
			}
			@media screen and (max-width: 576px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'] h1, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h2, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h3, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h4, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h5, .footer-widget-area[data-section='responsive-footer-widget-{$i}'] h6 {
					color: {$widget_heading_color_mobile};
				}
			}
			.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
				color: {$widget_content_color};
			}
			@media screen and (max-width: 992px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
					color: {$widget_content_color_tablet};
				}
			}
			@media screen and (max-width: 576px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} {
					color: {$widget_content_color_mobile};
				}
			}
			.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} a {
				color: {$widget_link_color};
			}
			@media screen and (max-width: 992px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} a {
					color: {$widget_link_color_tablet};
				}
			}
			@media screen and (max-width: 576px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} a {
					color: {$widget_link_color_mobile};
				}
			}
			.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} a:hover {
				color: {$widget_link_hover_color};
			}
			@media screen and (max-width: 992px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} a:hover {
					color: {$widget_link_hover_color_tablet};
				}
			}
			@media screen and (max-width: 576px) {
				.footer-widget-area[data-section='responsive-footer-widget-{$i}'].footer-widget-{$i} a:hover {
					color: {$widget_link_hover_color_mobile};
				}
			}
			";
			// Widget Margin.
			$widget_margin_values  = get_responsive_spacing_values("responsive_footer_widget{$i}_margin");
		
			$custom_css .= ".footer-widget-area[data-section='responsive-footer-widget-{$i}'] {";
			$custom_css .= responsive_build_responsive_margin_spacing_css( $widget_margin_values['desktop'] );
			$custom_css .= "}";
		
			$custom_css .= "@media screen and (max-width: 992px) {";
			$custom_css .= ".footer-widget-area[data-section='responsive-footer-widget-{$i}'] {";
			$custom_css .= responsive_build_responsive_margin_spacing_css( $widget_margin_values['tablet'] );
			$custom_css .= "}}";
		
			$custom_css .= "@media screen and (max-width: 576px) {";
			$custom_css .= ".footer-widget-area[data-section='responsive-footer-widget-{$i}'] {";
			$custom_css .= responsive_build_responsive_margin_spacing_css( $widget_margin_values['mobile'] );
			$custom_css .= "}}";
		}
	}

	// Header visibility based on device type
	// Show desktop header on screens wider than 992px, hide on mobile/tablet
	// Show mobile/tablet header on screens 992px and below, hide on desktop
	$custom_css .= "
	.responsive-desktop-header-wrapper {
		display: block;
	}
	.responsive-mobile-header-wrapper {
		display: none;
	}
	@media screen and ( max-width: {$mobile_menu_breakpoint}px ) {
		.responsive-desktop-header-wrapper {
			display: none;
		}
		.responsive-mobile-header-wrapper {
			display: block;
		}
	}
	";
	
	// Off-Canvas Panel Styles - Only visible on mobile/tablet
	// Hide off-canvas panel on desktop by default
	$custom_css .= "
	.responsive-off-canvas-panel,
	.responsive-off-canvas-overlay {
		display: none;
	}
	";
	
	// Show and style off-canvas panel on mobile/tablet only when toggle button exists
	if ( function_exists( '\Responsive\Core\responsive_check_element_in_mobile_tablet_items' ) && \Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'toggle_button', 'header' ) ) {
		// Get mobile menu settings (these should already be defined above in the file)
		$off_canvas_mobile_menu_breakpoint = get_theme_mod( 'responsive_mobile_menu_breakpoint', 767 );
		$off_canvas_mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
		$off_canvas_header_mobile_menu_background_color = esc_html( get_theme_mod( 'responsive_header_mobile_menu_background_color', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_menu_background' ) ) );
		$off_canvas_header_mobile_content_alignment = esc_html( get_theme_mod( 'responsive_header_mobile_off_canvas_content_alignment', 'left' ) );
		$off_canvas_inner_element_spacing = esc_html( get_theme_mod( 'responsive_header_mobile_off_canvas_inner_element_spacing', 0 ) );
		$off_canvas_close_icon_color = esc_html( get_theme_mod( 'responsive_header_toggle_button_icon_color', '#000000' ) );
		$item_aligner = 'flex-start';
		if( $off_canvas_header_mobile_content_alignment === 'center' )
		{
			$item_aligner = 'center';
		}
		if( $off_canvas_header_mobile_content_alignment === 'right' )
		{
			$item_aligner = 'flex-end';
		}

		$custom_css .= "
		@media screen and ( max-width: {$off_canvas_mobile_menu_breakpoint}px ) {
			.responsive-off-canvas-panel {
				display: block;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				z-index: 999999;
				background-color: {$off_canvas_header_mobile_menu_background_color};
				overflow-y: auto;
				opacity: 0;
				visibility: hidden;
				transition: opacity 0.3s ease, visibility 0.3s ease;
				pointer-events: none;
			}
			.responsive-off-canvas-panel.active {
				opacity: 1;
				visibility: visible;
				pointer-events: auto;
			}
			.responsive-off-canvas-panel-inner {
				min-height: 100%;
				display: flex;
				flex-direction: column;
				gap: {$off_canvas_inner_element_spacing}px;
			}
			.responsive-off-canvas-panel nav ul {
				list-style: none;
				display: flex;
				flex-direction: column;
				align-items: {$item_aligner};
			}
			.responsive-off-canvas-overlay {
				display: block;
				position: fixed;
				top: 0;
				width: calc(100% - 300px);
				height: 100%;
				background-color: rgba(0, 0, 0, 0.5);
				z-index: 999998;
				opacity: 0;
				visibility: hidden;
				transition: opacity 0.3s ease, visibility 0.3s ease;
				pointer-events: none;
			}
			
			.responsive-off-canvas-overlay.active {
				opacity: 1;
				visibility: visible;
				pointer-events: auto;
			}
			#masthead-mobile .responsive-off-canvas-panel-close {
				position: absolute;
				top: 15px;
				right: 15px;
				border: none;
				color: {$off_canvas_close_icon_color};
				font-size: 24px;
				cursor: pointer;
				z-index: 1000000;
				line-height: 1;
			}
			#masthead-mobile .responsive-off-canvas-panel-close {
		    	padding: {$hamburger_menu_padding_top}px {$hamburger_menu_padding_right}px {$hamburger_menu_padding_bottom}px {$hamburger_menu_padding_left}px;
			}
			@media screen and ( min-width: 577px ) and (max-width: {$mobile_menu_breakpoint}px ) {
				#masthead-mobile .responsive-off-canvas-panel-close {
			    	padding: {$hamburger_menu_tablet_padding_top}px {$hamburger_menu_tablet_padding_right}px {$hamburger_menu_tablet_padding_bottom}px {$hamburger_menu_tablet_padding_left}px;
				}
			}
			@media screen and ( max-width: 576px ) {
				#masthead-mobile .responsive-off-canvas-panel-close {
			    	padding: {$hamburger_menu_mobile_padding_top}px {$hamburger_menu_mobile_padding_right}px {$hamburger_menu_mobile_padding_bottom}px {$hamburger_menu_mobile_padding_left}px;
				}
			}

			#masthead-mobile .responsive-off-canvas-panel-close:hover,
			#masthead-mobile .responsive-off-canvas-panel-close:focus {
				background-color: transparent;
				outline: none;
			}
			#masthead-mobile .responsive-off-canvas-panel-close svg {
				fill: {$off_canvas_close_icon_color};
			}
			.site-header-item .menu-toggle[aria-expanded='true'] {
				color: {$off_canvas_close_icon_color};
			}
			.responsive-off-canvas-panel-close:hover {
				opacity: 0.7;
				background: inherit;
			}
			.responsive-off-canvas-panel .sub-menu,
			.responsive-off-canvas-panel .children {
				display: none;
				position: static;
				left: auto;
				width: auto;
			}
			.responsive-off-canvas-panel .res-submenu-expanded > .sub-menu,
			.responsive-off-canvas-panel .res-submenu-expanded > .children {
				display: block !important;
			}
			.responsive-off-canvas-panel .menu-item-has-children > .sub-menu,
			.responsive-off-canvas-panel .page_item_has_children > .children {
				margin-left: 28px;
			}
			.responsive-off-canvas-panel .res-iconify,
			#off-canvas-menu .res-iconify {
				display: inline-block !important;
				position: relative;
				vertical-align: middle;
				margin-left: 8px;
				cursor: pointer;
				transform: translateY(-5px);
			}
			.responsive-off-canvas-panel .res-iconify svg,
			#off-canvas-menu .res-iconify svg {
				stroke: #000000;
				fill: #000000;
			}
			.responsive-off-canvas-panel .menu-item-has-children > a,
			#off-canvas-menu .menu-item-has-children > a {
				position: relative;
			}
		}
		";
		
		if( 'dropdown' === $off_canvas_mobile_menu_style ) {
			// dropdown style - panel appears below header, positioned relative to header
			$off_canvas_panel_move_body = get_theme_mod( 'responsive_header_mobile_off_canvas_move_body', 0);
			
			if( $off_canvas_panel_move_body == 1 ) {
				// Move body enabled: dropdown pushes body content down when active
				$custom_css .= "
				@media screen and ( max-width: {$off_canvas_mobile_menu_breakpoint}px ) {
					#masthead-mobile {
						position: relative;
					}
					.responsive-off-canvas-panel.responsive-off-canvas-panel-dropdown {
						position: relative;
						top: 0;
						left: 0;
						width: 100%;
						max-height: 0;
						height: 0;
						overflow: hidden;
						z-index: 999997;
						transition: max-height 0.3s ease, opacity 0.3s ease, visibility 0.3s ease;
						opacity: 0;
						visibility: hidden;
					}
					.responsive-off-canvas-panel.responsive-off-canvas-panel-dropdown.active {
						max-height: calc(100vh - 100px);
						height: auto;
						opacity: 1;
						visibility: visible;
					}
				}
				";
			} else {
				// Move body disabled: dropdown appears over body content (absolute positioning)
				$custom_css .= "
				@media screen and ( max-width: {$off_canvas_mobile_menu_breakpoint}px ) {
					#masthead-mobile {
						position: relative;
					}
					.responsive-off-canvas-panel.responsive-off-canvas-panel-dropdown {
						position: absolute;
						top: 100%;
						left: 0;
						width: 100%;
						max-height: calc(100vh - 100px);
						height: auto;
						z-index: 999997;
						transform: translateY(-20px);	
						transition: transform 0.3s ease, opacity 0.3s ease, visibility 0.3s ease;
					}
					.responsive-off-canvas-panel.responsive-off-canvas-panel-dropdown.active {
						transform: translateY(0);
					}
				}
				";
			}
		}
		
		// Hide overlay for dropdown style (overlay should only show for sidebar and fullscreen)
		if ( 'dropdown' === $off_canvas_mobile_menu_style ) {
			$custom_css .= "
			@media screen and ( max-width: {$off_canvas_mobile_menu_breakpoint}px ) {
				#masthead-mobile .responsive-off-canvas-panel-dropdown ~ .responsive-off-canvas-overlay {
					display: none !important;
					visibility: hidden !important;
					opacity: 0 !important;
					pointer-events: none !important;
				}
			}
			";
		}
		
		// Hide off-canvas panel on desktop (screens wider than breakpoint)
		$custom_css .= "
		@media screen and ( min-width: " . ($off_canvas_mobile_menu_breakpoint + 1) . "px ) {
			.responsive-off-canvas-panel,
			.responsive-off-canvas-overlay {
				display: none !important;
			}
		}
		";
	}
	
	// Show toggle button only on mobile/tablet, hide on desktop (regardless of whether off-canvas panel exists)
	// Use 992px breakpoint to match mobile header visibility (mobile header is shown up to 992px)
	$toggle_button_breakpoint = $mobile_menu_breakpoint;
	$custom_css .= "
	.site-header-item-toggle-button {
		display: block;
	}
	.site-header-item-toggle-button .menu-toggle {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		padding: 13px;
	}
	@media screen and ( min-width: " . ($toggle_button_breakpoint + 1) . "px ) {
		.responsive-desktop-header-wrapper .site-header-item-toggle-button,
		.responsive-desktop-header-wrapper .site-header-item-toggle-button .menu-toggle {
			display: none !important;
		}
	}
	@media screen and ( max-width: {$toggle_button_breakpoint}px ) {
		.responsive-mobile-header-wrapper .site-header-item-toggle-button,
		.responsive-mobile-header-wrapper .site-header-item-toggle-button .menu-toggle {
			display: block;
		}
		.responsive-mobile-header-wrapper .site-header-item-toggle-button .menu-toggle {
			display: inline-flex;
		}
		.responsive-desktop-header-wrapper .site-header-item-toggle-button,
		.responsive-desktop-header-wrapper .site-header-item-toggle-button .menu-toggle {
			display: none !important;
		}
	}
	";

	// Mobile Header Widgets Typography
	$mobile_header_widgets_typography = get_theme_mod( 'mobile_header_widgets_typography' );
	if ( $mobile_header_widgets_typography && is_array( $mobile_header_widgets_typography ) ) {
		$custom_css .= ".mobile-header-widgets {";
		foreach ( $mobile_header_widgets_typography as $prop => $val ) {
			if ( $val ) {
				$custom_css .= $prop . ': ' . $val . ';';
			}
		}
		$custom_css .= "}";
	}

	// Mobile Header Social Typography
	$mobile_header_social_item_typography = get_theme_mod( 'mobile_header_social_item_typography' );
	if ( $mobile_header_social_item_typography && is_array( $mobile_header_social_item_typography ) ) {
		$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-label {";
		foreach ( $mobile_header_social_item_typography as $prop => $val ) {
			if ( $val ) {
				$custom_css .= $prop . ': ' . $val . ';';
			}
		}
		$custom_css .= "}";
	}

	// Mobile Header Social Tablet Typography
	$mobile_header_social_item_tablet_typography = get_theme_mod( 'mobile_header_social_item_tablet_typography' );
	if ( $mobile_header_social_item_tablet_typography && is_array( $mobile_header_social_item_tablet_typography ) ) {
		$custom_css .= "@media screen and ( max-width: 992px ) {";
		$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-label {";
		foreach ( $mobile_header_social_item_tablet_typography as $prop => $val ) {
			if ( $val ) {
				$custom_css .= $prop . ': ' . $val . ';';
			}
		}
		$custom_css .= "}";
		$custom_css .= "}";
	}

	// Mobile Header Social Mobile Typography
	$mobile_header_social_item_mobile_typography = get_theme_mod( 'mobile_header_social_item_mobile_typography' );
	if ( $mobile_header_social_item_mobile_typography && is_array( $mobile_header_social_item_mobile_typography ) ) {
		$custom_css .= "@media screen and ( max-width: 576px ) {";
		$custom_css .= ".site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-label {";
		foreach ( $mobile_header_social_item_mobile_typography as $prop => $val ) {
			if ( $val ) {
				$custom_css .= $prop . ': ' . $val . ';';
			}
		}
		$custom_css .= "}";
		$custom_css .= "}";
	}

	// Off-Canvas Menu Styles (from Off Canvas Menu Customizer Section)
	// Get off-canvas menu style settings
	$off_canvas_menu_items_divider = get_theme_mod( 'responsive_header_off_canvas_menu_items_divider', 1 );
	$off_canvas_menu_visibility = get_theme_mod( 'responsive_header_off_canvas_menu_visibility', array('desktop','tablet','mobile') );
	// Get Item divider size and color settings
	$off_canvas_menu_items_divider_size = get_theme_mod( 'responsive_header_off_canvas_menu_item_divider_size', 1);
	$off_canvas_menu_items_divider_color = esc_html( get_theme_mod( 'responsive_header_off_canvas_menu_item_divider_color_color', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_off_canvas_menu_item_divider_color_color' ) ) );//get_theme_mod( 'responsive_header_off_canvas_menu_item_divider_color_color');
	// Get typography settings
	$off_canvas_menu_typography = get_theme_mod( 'header_off_canvas_menu_typography' );
	$header_menu_typography = get_theme_mod( 'header_menu_typography' );
	// Get spacing (padding) settings
	$off_canvas_menu_spacing_top = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_top_padding', 0 );
	$off_canvas_menu_spacing_right = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_right_padding', 0 );
	$off_canvas_menu_spacing_bottom = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_bottom_padding', 0 );
	$off_canvas_menu_spacing_left = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_left_padding', 0 );
	
	$off_canvas_menu_spacing_tablet_top = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_tablet_top_padding', 10 );
	$off_canvas_menu_spacing_tablet_right = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_tablet_right_padding', 33 );
	$off_canvas_menu_spacing_tablet_bottom = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_tablet_bottom_padding', 10 );
	$off_canvas_menu_spacing_tablet_left = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_tablet_left_padding', 33 );
	
	$off_canvas_menu_spacing_mobile_top = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_mobile_top_padding', 10 );
	$off_canvas_menu_spacing_mobile_right = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_mobile_right_padding', 33 );
	$off_canvas_menu_spacing_mobile_bottom = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_mobile_bottom_padding', 10 );
	$off_canvas_menu_spacing_mobile_left = get_theme_mod( 'responsive_header_off_canvas_menu_spacing_mobile_left_padding', 33);

	// Get margin settings
	$off_canvas_menu_margin_top = get_theme_mod( 'responsive_header_off_canvas_menu_margin_top_padding', 0 );
	$off_canvas_menu_margin_right = get_theme_mod( 'responsive_header_off_canvas_menu_margin_right_padding', 0 );
	$off_canvas_menu_margin_bottom = get_theme_mod( 'responsive_header_off_canvas_menu_margin_bottom_padding', 0 );
	$off_canvas_menu_margin_left = get_theme_mod( 'responsive_header_off_canvas_menu_margin_left_padding', 0 );
	
	$off_canvas_menu_margin_tablet_top = get_theme_mod( 'responsive_header_off_canvas_menu_margin_tablet_top_padding', 0 );
	$off_canvas_menu_margin_tablet_right = get_theme_mod( 'responsive_header_off_canvas_menu_margin_tablet_right_padding', 0 );
	$off_canvas_menu_margin_tablet_bottom = get_theme_mod( 'responsive_header_off_canvas_menu_margin_tablet_bottom_padding', 0 );
	$off_canvas_menu_margin_tablet_left = get_theme_mod( 'responsive_header_off_canvas_menu_margin_tablet_left_padding', 0 );
	
	$off_canvas_menu_margin_mobile_top = get_theme_mod( 'responsive_header_off_canvas_menu_margin_mobile_top_padding', 0 );
	$off_canvas_menu_margin_mobile_right = get_theme_mod( 'responsive_header_off_canvas_menu_margin_mobile_right_padding', 0 );
	$off_canvas_menu_margin_mobile_bottom = get_theme_mod( 'responsive_header_off_canvas_menu_margin_mobile_bottom_padding', 0 );
	$off_canvas_menu_margin_mobile_left = get_theme_mod( 'responsive_header_off_canvas_menu_margin_mobile_left_padding', 0 );

	// Apply base off-canvas menu styles
	$custom_css .= "
	/* Off-Canvas Menu Styles */
	.off-canvas-widget-area #off-canvas-menu li, #off-canvas-site-navigation .menu li {
		background-color: {$off_canvas_menu_bg_default};
	}
	.off-canvas-widget-area #off-canvas-menu, #off-canvas-site-navigation .menu {
		margin: {$off_canvas_menu_margin_top}px {$off_canvas_menu_margin_right}px {$off_canvas_menu_margin_bottom}px {$off_canvas_menu_margin_left}px;
	}
	.off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a {
		color: {$off_canvas_menu_link_default};
		background-color: {$off_canvas_menu_bg_default};
		padding: {$off_canvas_menu_spacing_top}px {$off_canvas_menu_spacing_right}px {$off_canvas_menu_spacing_bottom}px {$off_canvas_menu_spacing_left}px;
		display: block;
		transition: all 0.3s ease;
	}
	.off-canvas-widget-area #off-canvas-menu li a:hover, #off-canvas-site-navigation .menu li a:hover {
		color: {$off_canvas_menu_link_hover};
		background-color: {$off_canvas_menu_bg_hover};
	}
	.off-canvas-widget-area #off-canvas-menu li.current-menu-item > a,
	.off-canvas-widget-area #off-canvas-menu li.current_page_item > a,
	#off-canvas-site-navigation .menu li.current_page_item > a {
		color: {$off_canvas_menu_link_active};
		background-color: {$off_canvas_menu_bg_active};
	}
	";

	// Apply typography styles if set
	if ( $off_canvas_menu_typography && is_array( $off_canvas_menu_typography ) ) {
		$custom_css .= ".off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a {";
		foreach ( $off_canvas_menu_typography as $key => $value ) {
			if ( $value ) {
				$custom_css .= $key . ': ' . $value . ';';
			}
		}
		$custom_css .= "}";
	}

	$custom_css .= "
		.off-canvas-widget-area li.menu-item {
				width: 100%;
		}	
		.off-canvas-widget-area li.menu-item .res-iconify {
			line-height: 1;
		}
	";
	// Apply items divider
	if ( $off_canvas_menu_items_divider ) {
		$custom_css .= "
		.off-canvas-widget-area #off-canvas-menu > li {
			border-bottom: {$off_canvas_menu_items_divider_size}px solid {$off_canvas_menu_items_divider_color};
		}
		.off-canvas-widget-area #off-canvas-menu li:last-child {
			border-bottom: none;
		}

		@media screen and (max-width: 992px) {
			.off-canvas-widget-area .menu > li.menu-item {
				border-bottom:  {$off_canvas_menu_items_divider_size}px solid {$off_canvas_menu_items_divider_color};
			}	
			li.menu-item:last-child {
				border-bottom: none;
			}

			#off-canvas-site-navigation .menu > li{
				border-bottom: {$off_canvas_menu_items_divider_size}px solid {$off_canvas_menu_items_divider_color};
			}

			#off-canvas-site-navigation .menu li:last-child {
				border-bottom: none;
			}
		}
		";
	}

	// Off-Canvas Menu Item Hover Style based on responsive_menu_item_hover_style
	$off_canvas_menu_item_hover_style_selected = get_theme_mod( 'responsive_menu_item_hover_style', 'none' );
	$off_canvas_menu_hover_color = $off_canvas_menu_link_hover;
	// Use active color if hover color is not set, otherwise use hover color
	if ( '' === $off_canvas_menu_link_hover || ! $off_canvas_menu_link_hover ) {
		$off_canvas_menu_hover_color = $off_canvas_menu_link_active ? $off_canvas_menu_link_active : $off_canvas_menu_link_default;
	}

	// Tablet responsive styles
	$custom_css .= "
	@media (max-width: {$mobile_menu_breakpoint}px) {
		.off-canvas-widget-area #off-canvas-menu, #off-canvas-site-navigation .menu{
			margin: {$off_canvas_menu_margin_tablet_top}px {$off_canvas_menu_margin_tablet_right}px {$off_canvas_menu_margin_tablet_bottom}px {$off_canvas_menu_margin_tablet_left}px;
		}
		.off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a {
			padding: {$off_canvas_menu_spacing_tablet_top}px {$off_canvas_menu_spacing_tablet_right}px {$off_canvas_menu_spacing_tablet_bottom}px {$off_canvas_menu_spacing_tablet_left}px;
		}
	}
	";

	// Mobile responsive styles
	$custom_css .= "
	@media (max-width: 544px) {
		.off-canvas-widget-area #off-canvas-menu, #off-canvas-site-navigation .menu{
			margin: {$off_canvas_menu_margin_mobile_top}px {$off_canvas_menu_margin_mobile_right}px {$off_canvas_menu_margin_mobile_bottom}px {$off_canvas_menu_margin_mobile_left}px;
		}
		.off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a {
			padding: {$off_canvas_menu_spacing_mobile_top}px {$off_canvas_menu_spacing_mobile_right}px {$off_canvas_menu_spacing_mobile_bottom}px {$off_canvas_menu_spacing_mobile_left}px;
		}
	}
	";

	// Apply submenu styles to off-canvas menus (using same settings as main menu submenus)
	// Submenu background color
	$custom_css .= "
	.responsive-off-canvas-panel .sub-menu,
	.responsive-off-canvas-panel .sub-menu li,
	.responsive-off-canvas-panel .sub-menu li a,
	.responsive-off-canvas-panel .children,
	#off-canvas-menu .sub-menu,
	#off-canvas-menu .sub-menu li,
	#off-canvas-menu .sub-menu li a,
	#off-canvas-menu .children,
	.off-canvas-widget-area #off-canvas-menu .sub-menu,
	.off-canvas-widget-area #off-canvas-menu .sub-menu li,
	.off-canvas-widget-area #off-canvas-menu .sub-menu li a,
	.off-canvas-widget-area #off-canvas-menu .children,
	#off-canvas-site-navigation .menu .sub-menu,
	#off-canvas-site-navigation .menu .sub-menu li,
	#off-canvas-site-navigation .menu .sub-menu li a,
	#off-canvas-site-navigation .menu .children {
		background-color: {$header_sub_menu_background_color};
	}
	";

	// Submenu link colors
	$custom_css .= "
	.responsive-off-canvas-panel .sub-menu li a,
	.responsive-off-canvas-panel .children li a,
	#off-canvas-menu .sub-menu li a,
	#off-canvas-menu .children li a,
	.off-canvas-widget-area #off-canvas-menu .sub-menu li a,
	.off-canvas-widget-area #off-canvas-menu .children li a,
	#off-canvas-site-navigation .menu .sub-menu li a,
	#off-canvas-site-navigation .menu .children li a {
		color: {$header_sub_menu_link_color};
	}
	";

	// Submenu active link colors
	$custom_css .= "
	.responsive-off-canvas-panel .sub-menu .current_page_item > a,
	.responsive-off-canvas-panel .sub-menu .current-menu-item > a,
	.responsive-off-canvas-panel .children li.current_page_item a,
	#off-canvas-menu .sub-menu .current_page_item > a,
	#off-canvas-menu .sub-menu .current-menu-item > a,
	#off-canvas-menu .children li.current_page_item a,
	.off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,
	.off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,
	.off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,
	#off-canvas-site-navigation .menu .sub-menu .current_page_item > a,
	#off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,
	#off-canvas-site-navigation .menu .children li.current_page_item a {
		color: {$sub_menu_active_link_color};
		background-color: {$header_active_sub_menu_background_color};
	}
	";

	// Submenu hover link colors
	$custom_css .= "
	.responsive-off-canvas-panel .sub-menu li a:hover,
	.responsive-off-canvas-panel .children li a:hover,
	.responsive-off-canvas-panel .sub-menu .current_page_item > a:hover,
	.responsive-off-canvas-panel .sub-menu .current-menu-item > a:hover,
	#off-canvas-menu .sub-menu li a:hover,
	#off-canvas-menu .children li a:hover,
	#off-canvas-menu .sub-menu .current_page_item > a:hover,
	#off-canvas-menu .sub-menu .current-menu-item > a:hover,
	.off-canvas-widget-area #off-canvas-menu .sub-menu li a:hover,
	.off-canvas-widget-area #off-canvas-menu .children li a:hover,
	.off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a:hover,
	.off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a:hover,
	#off-canvas-site-navigation .menu .sub-menu li a:hover,
	#off-canvas-site-navigation .menu .children li a:hover,
	#off-canvas-site-navigation .menu .sub-menu .current_page_item > a:hover,
	#off-canvas-site-navigation .menu .sub-menu .current-menu-item > a:hover {
		color: {$header_sub_menu_link_hover_color};
		background-color: {$header_hover_sub_menu_background_color};
	}
	";

	// Submenu border styles
	$custom_css .= "
	.responsive-off-canvas-panel .sub-menu,
	.responsive-off-canvas-panel .children,
	#off-canvas-menu .sub-menu,
	#off-canvas-menu .children,
	.off-canvas-widget-area #off-canvas-menu .sub-menu,
	.off-canvas-widget-area #off-canvas-menu .children,
	#off-canvas-site-navigation .menu .sub-menu,
	#off-canvas-site-navigation .menu .children {
		border-top-width: {$sub_menu_border_top}px;
		border-bottom-width: {$sub_menu_border_bottom}px;
		border-left-width: {$sub_menu_border_left}px;
		border-right-width: {$sub_menu_border_right}px;
		border-color: {$sub_menu_border_color};
		border-style: solid;
	}
	@media screen and ( max-width: 992px ) {
		.responsive-off-canvas-panel .sub-menu,
		.responsive-off-canvas-panel .children,
		#off-canvas-menu .sub-menu,
		#off-canvas-menu .children,
		.off-canvas-widget-area #off-canvas-menu .sub-menu,
		.off-canvas-widget-area #off-canvas-menu .children,
		#off-canvas-site-navigation .menu .sub-menu,
		#off-canvas-site-navigation .menu .children {
			border-top-width: {$sub_menu_border_tablet_top}px;
			border-bottom-width: {$sub_menu_border_tablet_bottom}px;
			border-left-width: {$sub_menu_border_tablet_left}px;
			border-right-width: {$sub_menu_border_tablet_right}px;
			border-color: {$sub_menu_border_color};
			border-style: solid;
		}
	}
	@media screen and ( max-width: 576px ) {
		.responsive-off-canvas-panel .sub-menu,
		.responsive-off-canvas-panel .children,
		#off-canvas-menu .sub-menu,
		#off-canvas-menu .children,
		.off-canvas-widget-area #off-canvas-menu .sub-menu,
		.off-canvas-widget-area #off-canvas-menu .children,
		#off-canvas-site-navigation .menu .sub-menu,
		#off-canvas-site-navigation .menu .children {
			border-top-width: {$sub_menu_border_mobile_top}px;
			border-bottom-width: {$sub_menu_border_mobile_bottom}px;
			border-left-width: {$sub_menu_border_mobile_left}px;
			border-right-width: {$sub_menu_border_mobile_right}px;
			border-color: {$sub_menu_border_color};
			border-style: solid;
		}
	}
	";

	// Submenu divider styles
	if ( "1" === $sub_menu_divider ) {
		$custom_css .= "
		.responsive-off-canvas-panel .sub-menu li,
		.responsive-off-canvas-panel .children li,
		#off-canvas-menu .sub-menu li,
		#off-canvas-menu .children li,
		.off-canvas-widget-area #off-canvas-menu .sub-menu li,
		.off-canvas-widget-area #off-canvas-menu .children li,
		#off-canvas-site-navigation .menu .sub-menu li,
		#off-canvas-site-navigation .menu .children li {
			border-bottom-width: 1px;
			border-style: solid;
			border-color: {$sub_menu_divider_color};
		}
		.responsive-off-canvas-panel .sub-menu li:last-child,
		.responsive-off-canvas-panel .children li:last-child,
		#off-canvas-menu .sub-menu li:last-child,
		#off-canvas-menu .children li:last-child,
		.off-canvas-widget-area #off-canvas-menu .sub-menu li:last-child,
		.off-canvas-widget-area #off-canvas-menu .children li:last-child,
		#off-canvas-site-navigation .menu .sub-menu li:last-child,
		#off-canvas-site-navigation .menu .children li:last-child {
			border-style: none;
		}
		";
	}

	// Handle visibility settings
	if ( is_array( $off_canvas_menu_visibility ) ) {
		// Desktop visibility (screens wider than 992px)
		if ( ! in_array( 'desktop', $off_canvas_menu_visibility ) ) {
			$custom_css .= "
			@media screen and ( min-width: 993px ) {
				.off-canvas-widget-area {
					display: none !important;
				}
			}
			";
		}
		
		// Tablet visibility (screens between 545px and 992px)
		if ( ! in_array( 'tablet', $off_canvas_menu_visibility ) ) {
			$custom_css .= "
			@media screen and ( min-width: 545px ) and ( max-width: 992px ) {
				.off-canvas-widget-area {
					display: none !important;
				}
			}
			";
		}
		
		// Mobile visibility (screens 544px and below)
		if ( ! in_array( 'mobile', $off_canvas_menu_visibility ) ) {
			$custom_css .= "
			@media screen and ( max-width: 544px ) {
				.off-canvas-widget-area {
					display: none !important;
				}
			}
			";
		}
	}

	wp_add_inline_style( 'responsive-style', apply_filters( 'responsive_head_css', responsive_minimize_css( $custom_css ) ) );
	wp_add_inline_style('responsive-style', responsive_minimize_css( $font_preset_css));

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
		$shop_product_rating_color           = esc_html( responsive_prepare_css_value( 'responsive_shop_product_rating_color' ) );
		$shop_product_price_color            = esc_html( get_theme_mod( 'responsive_shop_product_price_color', Responsive\Core\get_responsive_customizer_defaults( 'shop_product_price' ) ) );
		$add_to_cart_button_color            = esc_html( get_theme_mod( 'responsive_add_to_cart_button_color', Responsive\Core\get_responsive_customizer_defaults( 'add_to_cart_button' ) ) );
		$add_to_cart_button_text_color       = esc_html( responsive_prepare_css_value( 'responsive_add_to_cart_button_text_color' ) );
		$add_to_cart_button_hover_color      = esc_html( responsive_prepare_css_value( 'responsive_add_to_cart_button_hover_color' ) );
		$add_to_cart_button_hover_text_color = esc_html( responsive_prepare_css_value( 'responsive_add_to_cart_button_hover_text_color' ) );
		$shop_sidebar_position               = esc_html( get_theme_mod( 'responsive_shop_sidebar_position', 'no' ) );
		$single_product_sidebar_position     = esc_html( get_theme_mod( 'responsive_single_product_sidebar_position', 'no' ) );
		$product_bg_color 					 = esc_html( get_theme_mod( 'responsive_shop_product_background_color', '#ffffff'));
		$tl 								 = intval  ( get_theme_mod( 'responsive_shop_product_top_left_radius', 8 ) );
		$tr 								 = intval  ( get_theme_mod( 'responsive_shop_product_top_right_radius', 8 ) );
		$br 								 = intval  ( get_theme_mod( 'responsive_shop_product_bottom_right_radius', 8 ) );
		$bl 								 = intval  ( get_theme_mod( 'responsive_shop_product_bottom_left_radius', 8 ) );
		$mobile_tl 							 = intval  ( get_theme_mod( 'responsive_shop_product_mobile_top_left_radius', 8)); 
		$mobile_tr 							 = intval  ( get_theme_mod( 'responsive_shop_product_mobile_top_right_radius', 8));
		$mobile_br							 = intval  ( get_theme_mod( 'responsive_shop_product_mobile_bottom_right_radius', 8));
		$mobile_bl							 = intval  ( get_theme_mod( 'responsive_shop_product_mobile_bottom_left_radius', 8)); 
		$tablet_tl							 = intval  ( get_theme_mod( 'responsive_shop_product_tablet_top_left_radius', 8)); 
		$tablet_tr							 = intval  ( get_theme_mod( 'responsive_shop_product_tablet_top_right_radius', 8)); 
		$tablet_br 							 = intval  ( get_theme_mod( 'responsive_shop_product_tablet_bottom_right_radius', 8)); 
		$tablet_bl							 = intval  ( get_theme_mod( 'responsive_shop_product_tablet_bottom_left_radius', 8)); 
		$single_product_breadcrumbs_flag = get_theme_mod( 'responsive_single_product_breadcrumbs', 1 );
		$single_product_breadcrumb_display_value     = $single_product_breadcrumbs_flag ? 'block' : 'none';

		$mobile_breakpoint 					 = 544; 

		if( $shop_sidebar_position === 'default')
		{
			$shop_sidebar_width = esc_html( get_theme_mod('responsive_default_sidebar_width',30)); 
		}
		else if( $shop_sidebar_position !== 'no')
		{
			$shop_sidebar_width = esc_html( get_theme_mod('responsive_shop_sidebar_width', 30));
		}
		else 
		{
			$shop_sidebar_width = 0;
		}

		// $woocommerce_custom_css .= "
		// 	/* Default: 100% width for mobile & tablet */
		// 	#secondary.widget-area {
		// 		width: 100%;
		// 	}

		// 	/* Laptops and above */
		// 	@media (min-width: 992px) {
		// 		#secondary.widget-area {
		// 			width: {$shop_sidebar_width}%;
		// 		}
		// 	}
		// ";
		

		$woocommerce_custom_css .= sprintf(
		'li.product {
			background-color: %s !important;
    	}',
			$product_bg_color
		);





		$woocommerce_custom_css .= sprintf(
			'.woocommerce-breadcrumb.is-single-product {
				display: %1$s;
			}
			body.single-product-has-site-header .site-content-header {
				display: %1$s;
			}',
			$single_product_breadcrumb_display_value
		);

		/**
		 * Desktop (≥992px)
		 */
		$woocommerce_custom_css .= sprintf(
			'.woocommerce ul.products li.product,
			.woocommerce-page ul.products li.product {
				border-radius: %1$dpx %2$dpx %3$dpx %4$dpx !important;
				position: relative;
			}
			.woocommerce ul.products li.product a.woocommerce-LoopProduct-link img,
			.woocommerce-page ul.products li.product a.woocommerce-LoopProduct-link img {
				-webkit-clip-path: inset(0 round %1$dpx %2$dpx 0 0) !important;
						clip-path: inset(0 round %1$dpx %2$dpx 0 0) !important;
				border-top-left-radius: %1$dpx !important;
				border-top-right-radius: %2$dpx !important;
			}',
			$tl, $tr, $br, $bl
		);

		/**
		 * Tablet (mobile_breakpoint+1 → 991px)
		 */
		$woocommerce_custom_css .= sprintf(
			'@media screen and (max-width: 991px) and (min-width: %5$dpx) {
				.woocommerce ul.products li.product,
				.woocommerce-page ul.products li.product {
					border-radius: %1$dpx %2$dpx %3$dpx %4$dpx !important;
				}
				.woocommerce ul.products li.product a.woocommerce-LoopProduct-link img,
				.woocommerce-page ul.products li.product a.woocommerce-LoopProduct-link img {
					-webkit-clip-path: inset(0 round %1$dpx %2$dpx 0 0) !important;
							clip-path: inset(0 round %1$dpx %2$dpx 0 0) !important;
					border-top-left-radius: %1$dpx !important;
					border-top-right-radius: %2$dpx !important;
				}
			}',
			$tablet_tl, $tablet_tr, $tablet_br, $tablet_bl,
			($mobile_breakpoint + 1)
		);

		/**
		 * Mobile (≤ mobile_breakpoint)
		 */
		$woocommerce_custom_css .= sprintf(
			'@media screen and (max-width: %5$dpx) {
				.woocommerce ul.products li.product,
				.woocommerce-page ul.products li.product {
					border-radius: %1$dpx %2$dpx %3$dpx %4$dpx !important;
				}
				.woocommerce ul.products li.product a.woocommerce-LoopProduct-link img,
				.woocommerce-page ul.products li.product a.woocommerce-LoopProduct-link img {
					-webkit-clip-path: inset(0 round %1$dpx %2$dpx 0 0) !important;
							clip-path: inset(0 round %1$dpx %2$dpx 0 0) !important;
					border-top-left-radius: %1$dpx !important;
					border-top-right-radius: %2$dpx !important;
				}
			}',
			$mobile_tl, $mobile_tr, $mobile_br, $mobile_bl,
			$mobile_breakpoint
		);




		$single_product_setting        = get_theme_mod( 'responsive_single_product_sidebar_position', 'no' );
		$single_product_sidebar_position = esc_html( $single_product_setting === 'default' ? $global_sidebar : $single_product_setting );
		$single_product_sidebar_width = get_theme_mod( 'responsive_single_product_sidebar_width', 30 );
		$shop_content_width = 100 - $shop_sidebar_width;
		$single_product_content_width = 100 - $single_product_sidebar_width;
		if ( 'no' !== $shop_sidebar_position ) {
			$woocommerce_custom_css .= "
			@media (min-width:992px) {
				.search.woocommerce .content-area,
				.shop-has-site-header .archive.woocommerce:not(.post-type-archive-course) .content-area,
				.page.woocommerce-cart .content-area {
					max-width: {$shop_content_width}%;
				}
				.search.woocommerce aside.widget-area,
				.shop-has-site-header .archive.woocommerce aside.widget-area,
				.woocommerce-cart aside.widget-area,
				.woocommerce-checkout aside.widget-area {
					min-width: {$shop_sidebar_width}%;
				}
			}";
		}

		if ( 'no' !== $single_product_sidebar_position ) {
			$woocommerce_custom_css .= "
			@media (min-width:992px) {
				.single-product-has-site-header.woocommerce #primary.content-area {
					width: {$single_product_content_width}%;
				}
				.single-product-has-site-header.woocommerce aside.widget-area#secondary {
					width: {$single_product_sidebar_width}%;
				}
			}";
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
		// product card spacing desktop
		$product_card_outside_container_padding_top    = esc_html( get_theme_mod( 'responsive_product_card_outside_container_top_padding', 15 ) );
		$product_card_outside_container_padding_bottom = esc_html( get_theme_mod( 'responsive_product_card_outside_container_bottom_padding', 15 ) );
		$product_card_outside_container_padding_left   = esc_html( get_theme_mod( 'responsive_product_card_outside_container_left_padding', 15 ) );
		$product_card_outside_container_padding_right  = esc_html( get_theme_mod( 'responsive_product_card_outside_container_right_padding', 15 ) );

		// product card spacing tablet
		$product_card_outside_container_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_product_card_outside_container_tablet_top_padding', 15 ) );
		$product_card_outside_container_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_product_card_outside_container_tablet_bottom_padding', 15 ) );
		$product_card_outside_container_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_product_card_outside_container_tablet_left_padding', 15 ) );
		$product_card_outside_container_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_product_card_outside_container_tablet_right_padding', 15 ) );

		// product card spacing mobile
		$product_card_outside_container_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_product_card_outside_container_mobile_top_padding', 15 ) );
		$product_card_outside_container_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_product_card_outside_container_mobile_bottom_padding', 15 ) );
		$product_card_outside_container_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_product_card_outside_container_mobile_left_padding', 15 ) );
		$product_card_outside_container_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_product_card_outside_container_mobile_right_padding', 15 ) );

		// product card Margin desktop
		$product_card_inside_container_margin_top    = esc_html( get_theme_mod( 'responsive_product_card_inside_container_top_padding', 10 ) );
		$product_card_inside_container_margin_bottom = esc_html( get_theme_mod( 'responsive_product_card_inside_container_bottom_padding', 10 ) );
		$product_card_inside_container_margin_left   = esc_html( get_theme_mod( 'responsive_product_card_inside_container_left_padding', 10 ) );
		$product_card_inside_container_padding_right = esc_html( get_theme_mod( 'responsive_product_card_inside_container_right_padding', 10 ) );

		// product card Margin tablet
		$product_card_inside_container_tablet_margin_top    = esc_html( get_theme_mod( 'responsive_product_card_inside_container_tablet_top_padding', 10 ) );
		$product_card_inside_container_tablet_margin_bottom = esc_html( get_theme_mod( 'responsive_product_card_inside_container_tablet_bottom_padding', 10 ) );
		$product_card_inside_container_tablet_margin_left   = esc_html( get_theme_mod( 'responsive_product_card_inside_container_tablet_left_padding', 0 ) );
		$product_card_inside_container_tablet_margin_right  = esc_html( get_theme_mod( 'responsive_product_card_inside_container_tablet_right_padding', 7 ) );

		// //product card Margin mobile
		$product_card_inside_container_mobile_margin_top    = esc_html( get_theme_mod( 'responsive_product_card_inside_container_mobile_top_padding', 10 ) );
		$product_card_inside_container_mobile_margin_bottom = esc_html( get_theme_mod( 'responsive_product_card_inside_container_mobile_bottom_padding', 10 ) );
		$product_card_inside_container_mobile_margin_left   = esc_html( get_theme_mod( 'responsive_product_card_inside_container_mobile_left_padding', 0 ) );
		$product_card_inside_container_mobile_margin_right  = esc_html( get_theme_mod( 'responsive_product_card_inside_container_mobile_right_padding', 0 ) );

		$woocommerce_custom_css .= '.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce-page.responsive-site-style-flat ul.products li.product,.woocommerce-page.responsive-site-style-content-boxed ul.products li.product, .woocommerce ul.products li.product{
		padding: ' . responsive_spacing_css( $product_card_outside_container_padding_top, $product_card_outside_container_padding_right, $product_card_outside_container_padding_bottom, $product_card_outside_container_padding_left ) . ';
		margin: ' . responsive_spacing_css( $product_card_inside_container_margin_top, $product_card_inside_container_padding_right, $product_card_inside_container_margin_bottom, $product_card_inside_container_margin_left ) . ';
	}

	@media screen and ( max-width: 992px ) {
		.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce-page.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product, .woocommerce-page.responsive-site-style-content-boxed ul.products li.product {
			padding: ' . responsive_spacing_css(
			$product_card_outside_container_tablet_padding_top,
			$product_card_outside_container_tablet_padding_right,
			$product_card_outside_container_tablet_padding_bottom,
			$product_card_outside_container_tablet_padding_left
		) . ';
			margin: ' . responsive_spacing_css(
			$product_card_inside_container_tablet_margin_top,
			$product_card_inside_container_tablet_margin_right,
			$product_card_inside_container_tablet_margin_bottom,
			$product_card_inside_container_tablet_margin_left
		) . ';

		}
	}
	@media screen and ( max-width: 576px ) {
		.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce-page.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product, .woocommerce-page.responsive-site-style-content-boxed ul.products li.product {
			padding: ' . responsive_spacing_css(
			$product_card_outside_container_mobile_padding_top,
			$product_card_outside_container_mobile_padding_right,
			$product_card_outside_container_mobile_padding_bottom,
			$product_card_outside_container_mobile_padding_left
		) . ';
			margin: ' . responsive_spacing_css(
			$product_card_inside_container_mobile_margin_top,
			$product_card_inside_container_mobile_margin_right,
			$product_card_inside_container_mobile_margin_bottom,
			$product_card_inside_container_mobile_margin_left
		) . ';
			
		}
	}';

		$woocommerce_custom_css .= "
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
		button.responsive-off-canvas-panel-close svg{
			fill: {$close_button_color };
		}
		button.responsive-off-canvas-panel-close:hover svg{
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
			$woocommerce_custom_css .= '
			@media (min-width: 769px) {
				.responsive-floating-bar {
					top: 32px;
				}
			}
			';
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
		$cart_buttons_text_color       = esc_html( responsive_prepare_css_value( 'responsive_cart_buttons_text_color', 'palette4' ) );
		$cart_buttons_hover_color      = esc_html( get_theme_mod( 'responsive_cart_buttons_hover_color', '#0066CC' ) );
		$cart_buttons_hover_text_color = esc_html( responsive_prepare_css_value( 'responsive_cart_buttons_hover_text_color', 'palette4' ) );

		$cart_checkout_button_color            = esc_html( responsive_prepare_css_value( 'responsive_cart_checkout_button_color' ) );
		$cart_checkout_button_text_color       = esc_html( responsive_prepare_css_value( 'responsive_cart_checkout_button_text_color', 'palette4' ) );
		$cart_checkout_button_hover_color      = esc_html( responsive_prepare_css_value( 'responsive_cart_checkout_button_hover_color' ) );
		$cart_checkout_button_hover_text_color = esc_html( responsive_prepare_css_value( 'responsive_cart_checkout_button_hover_text_color', 'palette4' ) );

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
		.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button{
			background-color: {$cart_buttons_color};
			color: {$cart_buttons_text_color};
		}
		.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button:hover{
			background-color: {$cart_buttons_hover_color};
			color: {$cart_buttons_hover_text_color};
		}
		.page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button {
			background-color: {$cart_checkout_button_color};
			color: {$cart_checkout_button_text_color};
		}
		.page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button:hover {
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
		}
		.page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button {
			background-color: {$cart_checkout_button_color};
			color: {$cart_checkout_button_text_color};
		}
		.page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button:hover {
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
			border-color: ' . $inputs_border_color. ';
			border-top-width: '. $input_border_top_width. 'px;
			border-right-width: '. $input_border_right_width. 'px;
			border-bottom-width: '. $input_border_bottom_width. 'px;
			border-left-width: '. $input_border_left_width. 'px;
			border-radius: ' . responsive_spacing_css( $inputs_top_left_radius, $inputs_top_right_radius, $inputs_bottom_right_radius, $inputs_bottom_left_radius ) . ';
			line-height: 1.75;
			padding: ' . responsive_spacing_css( $inputs_padding_top, $inputs_padding_right, $inputs_padding_bottom, $inputs_padding_left ) . ';
		}

		@media screen and ( max-width: 992px ) {
			#add_payment_method table.cart td.actions .coupon .input-text,
			.woocommerce-cart table.cart td.actions .coupon .input-text,
			.woocommerce-checkout table.cart td.actions .coupon .input-text {
				padding: ' . responsive_spacing_css( $inputs_tablet_padding_top, $inputs_tablet_padding_right, $inputs_tablet_padding_bottom, $inputs_tablet_padding_left ) . ';
				border-radius: ' . responsive_spacing_css( $inputs_tablet_top_left_radius, $inputs_tablet_top_right_radius, $inputs_tablet_bottom_right_radius, $inputs_tablet_bottom_left_radius ) . ';
				border-top-width: '. $input_border_tablet_top_width. 'px;
				border-right-width: '. $input_border_tablet_right_width. 'px;
				border-bottom-width: '. $input_border_tablet_bottom_width. 'px;
				border-left-width: '. $input_border_tablet_left_width. 'px;
			}
		}
		@media screen and ( max-width: 576px ) {
			#add_payment_method table.cart td.actions .coupon .input-text,
			.woocommerce-cart table.cart td.actions .coupon .input-text,
			.woocommerce-checkout table.cart td.actions .coupon .input-text {
				padding: ' . responsive_spacing_css( $inputs_mobile_padding_top, $inputs_mobile_padding_right, $inputs_mobile_padding_bottom, $inputs_mobile_padding_left ) . ';
				border-radius: ' . responsive_spacing_css( $inputs_mobile_top_left_radius, $inputs_mobile_top_right_radius, $inputs_mobile_bottom_right_radius, $inputs_mobile_bottom_left_radius ) . ';
				border-top-width: '. $input_border_mobile_top_width. 'px;
				border-right-width: '. $input_border_mobile_right_width. 'px;
				border-bottom-width: '. $input_border_mobile_bottom_width. 'px;
				border-left-width: '. $input_border_mobile_left_width. 'px;
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
			border-color: ' . $cart_buttons_color . ';
			border-style: solid;
			border-top-width: ' . $buttons_border_width_top . 'px;
			border-right-width: ' . $buttons_border_width_right . 'px;
			border-bottom-width: ' . $buttons_border_width_bottom . 'px;
			border-left-width: ' . $buttons_border_width_left . 'px;
			// border-radius:' . $buttons_radius . 'px;
			border-radius:' . responsive_spacing_css( $button_top_left_radius, $button_top_right_radius, $button_bottom_right_radius, $button_bottom_left_radius ) . ';
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
				border-radius:' . responsive_spacing_css( $button_tablet_top_left_radius, $button_tablet_top_right_radius, $button_tablet_bottom_right_radius, $button_tablet_bottom_left_radius ) . ';
				border-color: ' . $cart_buttons_color . ';
				border-style: solid;
				border-top-width: ' . $buttons_border_tablet_width_top . 'px;
				border-right-width: ' . $buttons_border_tablet_width_right . 'px;
				border-bottom-width: ' . $buttons_border_tablet_width_bottom . 'px;
				border-left-width: ' . $buttons_border_tablet_width_left . 'px;

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
				border-radius:' . responsive_spacing_css( $button_mobile_top_left_radius, $button_mobile_top_right_radius, $button_mobile_bottom_right_radius, $button_mobile_bottom_left_radius ) . ';
				border-style: solid;
				border-top-width: ' . $buttons_border_mobile_width_top . 'px;
				border-right-width: ' . $buttons_border_mobile_width_right . 'px;
				border-bottom-width: ' . $buttons_border_mobile_width_bottom . 'px;
				border-left-width: ' . $buttons_border_mobile_width_left . 'px;
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
		// Header Woo Cart
		$cart_count_color               			  = get_theme_mod( 'responsive_cart_count_color', '#000' );
		$cart_count_hover_color         			  = get_theme_mod( 'responsive_cart_count_hover_color', '#000' );
		$header_cart_button_color       			  = get_theme_mod( 'responsive_header_cart_button_color', '#10659C' );
		$header_cart_button_hover_color 			  = responsive_prepare_css_value( 'responsive_header_cart_button_hover_color' );
		$header_cart_button_text_color                = get_theme_mod( 'responsive_header_cart_button_text_color', '#ffffff' );
		$header_cart_button_text_hover_color          = get_theme_mod( 'responsive_header_cart_button_text_hover_color', '#ffffff' );
		$header_cart_checkout_button_color            = get_theme_mod( 'responsive_header_cart_checkout_button_color', '#0066CC' );
		$header_cart_checkout_button_hover_color      = responsive_prepare_css_value( 'responsive_header_cart_checkout_button_hover_color' );
		$header_cart_checkout_button_text_color       = get_theme_mod( 'responsive_header_cart_checkout_button_text_color', '#ffffff' );
		$header_cart_checkout_button_text_hover_color = get_theme_mod( 'responsive_header_cart_checkout_button_text_hover_color', '#ffffff' );
		$cart_click_action                            = get_theme_mod( 'responsive_header_woo_cart_click_action', 'dropdown' );
		$header_cart_tray_bg_color                    = get_theme_mod( 'responsive_header_cart_tray_bg_color', '#ffffff' );
		$header_cart_tray_bg_hover_color              = get_theme_mod( 'responsive_header_cart_tray_bg_hover_color', '#ffffff' );
		$header_cart_tray_link_color                  = get_theme_mod( 'responsive_header_cart_tray_link_color', '#333333' );
		$header_cart_tray_link_hover_color            = get_theme_mod( 'responsive_header_cart_tray_link_hover_color', '#333333' );
		$header_cart_tray_separator_color             = get_theme_mod( 'responsive_header_cart_tray_separator_color', '#D1D5DB' );

		if(Responsive\Core\responsive_check_element_present_in_hfb('woo-cart', 'header'))
		{
			$woocommerce_custom_css .= "
			.responsive-header-cart-total {
				color: {$cart_count_color};
			}
			.responsive-header-cart-total:hover {
				color: {$cart_count_hover_color};
			}
			.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout),
			.rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) {
				background-color: {$header_cart_button_color};
				border-color: {$header_cart_button_color};
				color: {$header_cart_button_text_color};
			}
			.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover,
			.rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover {
				background-color: {$header_cart_button_hover_color};
				border-color: {$header_cart_button_hover_color};
				color: {$header_cart_button_text_hover_color};
			}
			.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward,
			.rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout {
				background-color: {$header_cart_checkout_button_color};
				border-color: {$header_cart_checkout_button_color};
				color: {$header_cart_checkout_button_text_color};
			}
			.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover,
			.rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover {
				background-color: {$header_cart_checkout_button_hover_color};
				border-color: {$header_cart_checkout_button_hover_color};
				color: {$header_cart_checkout_button_text_hover_color};
			}
			.rspv-header-cart-drawer, .responsive-header-cart .woocommerce.widget_shopping_cart {
				background-color: {$header_cart_tray_bg_color};
			}
			.rspv-header-cart-drawer:hover, .responsive-header-cart .woocommerce.widget_shopping_cart:hover {
				background-color: {$header_cart_tray_bg_hover_color};
			}
			.rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button), .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button) {
				color: {$header_cart_tray_link_color};
			}
			.rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button):hover, .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button):hover {
				color: {$header_cart_tray_link_hover_color};
			}
			.responsive-header-cart .woocommerce.widget_shopping_cart .woocommerce-mini-cart__total,
			.woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-content .woocommerce-mini-cart__total,
			.woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-header {
				border-top-color: {$header_cart_tray_separator_color};
   				border-bottom-color: {$header_cart_tray_separator_color};
			}
			.responsive-header-cart .widget_shopping_cart .mini_cart_item,
			.rspv-header-cart-drawer .rspv-cart-drawer-content .widget_shopping_cart_content ul li {
				border-bottom-color: {$header_cart_tray_separator_color};
			}
			";
		}

		// Mobile Header Woo Cart
		$mobile_cart_count_color               			  = get_theme_mod( 'responsive_mobile_cart_count_color', '#000' );
		$mobile_cart_count_hover_color         			  = get_theme_mod( 'responsive_mobile_cart_count_hover_color', '#000' );
		$mobile_cart_color                      			  = get_theme_mod( 'responsive_mobile_cart_color', '#333333' );
		$mobile_cart_hover_color                 			  = get_theme_mod( 'responsive_mobile_cart_hover_color', '#333333' );
		$mobile_cart_icon_size                 			  = get_theme_mod( 'responsive_mobile_cart_icon_size', 24 );
		$mobile_header_cart_button_color       			  = get_theme_mod( 'responsive_mobile_header_cart_button_color', '#10659C' );
		$mobile_header_cart_button_hover_color 			  = responsive_prepare_css_value( 'responsive_mobile_header_cart_button_hover_color' );
		$mobile_header_cart_button_text_color                = get_theme_mod( 'responsive_mobile_header_cart_button_text_color', '#ffffff' );
		$mobile_header_cart_button_text_hover_color          = get_theme_mod( 'responsive_mobile_header_cart_button_text_hover_color', '#ffffff' );
		$mobile_header_cart_checkout_button_color            = get_theme_mod( 'responsive_mobile_header_cart_checkout_button_color', '#0066CC' );
		$mobile_header_cart_checkout_button_hover_color      = responsive_prepare_css_value( 'responsive_mobile_header_cart_checkout_button_hover_color' );
		$mobile_header_cart_checkout_button_text_color       = get_theme_mod( 'responsive_mobile_header_cart_checkout_button_text_color', '#ffffff' );
		$mobile_header_cart_checkout_button_text_hover_color = get_theme_mod( 'responsive_mobile_header_cart_checkout_button_text_hover_color', '#ffffff' );
		$mobile_header_cart_tray_bg_color                    = get_theme_mod( 'responsive_mobile_header_cart_tray_bg_color', '#ffffff' );
		$mobile_header_cart_tray_bg_hover_color              = get_theme_mod( 'responsive_mobile_header_cart_tray_bg_hover_color', '#ffffff' );
		$mobile_header_cart_tray_link_color                  = get_theme_mod( 'responsive_mobile_header_cart_tray_link_color', '#333333' );
		$mobile_header_cart_tray_link_hover_color            = get_theme_mod( 'responsive_mobile_header_cart_tray_link_hover_color', '#333333' );
		$mobile_header_cart_tray_separator_color             = get_theme_mod( 'responsive_mobile_header_cart_tray_separator_color', '#D1D5DB' );

		if(Responsive\Core\responsive_check_element_in_mobile_tablet_items('woo-cart', 'header'))
		{
			$woocommerce_custom_css .= "
			.site-mobile-header-item .responsive-header-cart .res-cart-icon svg {
				width: {$mobile_cart_icon_size}px;
				height: {$mobile_cart_icon_size}px;
			}
			.site-mobile-header-item .responsive-header-cart .res-cart-icon {
				color: {$mobile_cart_color};
			}
			.site-mobile-header-item .responsive-header-cart .res-cart-icon:hover {
				color: {$mobile_cart_hover_color};
			}
			.site-mobile-header-item .responsive-header-cart-total {
				color: {$mobile_cart_count_color};
			}
			.site-mobile-header-item .responsive-header-cart-total:hover {
				color: {$mobile_cart_count_hover_color};
			}
			.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout),
			.site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) {
				background-color: {$mobile_header_cart_button_color};
				border-color: {$mobile_header_cart_button_color};
				color: {$mobile_header_cart_button_text_color};
			}
			.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover,
			.site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover {
				background-color: {$mobile_header_cart_button_hover_color};
				border-color: {$mobile_header_cart_button_hover_color};
				color: {$mobile_header_cart_button_text_hover_color};
			}
			.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward,
			.site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout {
				background-color: {$mobile_header_cart_checkout_button_color};
				border-color: {$mobile_header_cart_checkout_button_color};
				color: {$mobile_header_cart_checkout_button_text_color};
			}
			.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover,
			.site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover {
				background-color: {$mobile_header_cart_checkout_button_hover_color};
				border-color: {$mobile_header_cart_checkout_button_hover_color};
				color: {$mobile_header_cart_checkout_button_text_hover_color};
			}
			.site-mobile-header-item .rspv-header-cart-drawer, .site-mobile-header-item .responsive-header-cart .woocommerce.widget_shopping_cart {
				background-color: {$mobile_header_cart_tray_bg_color};
			}
			.site-mobile-header-item .rspv-header-cart-drawer:hover, .site-mobile-header-item .responsive-header-cart .woocommerce.widget_shopping_cart:hover {
				background-color: {$mobile_header_cart_tray_bg_hover_color};
			}
			.site-mobile-header-item .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button), .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button) {
				color: {$mobile_header_cart_tray_link_color};
			}
			.site-mobile-header-item .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button):hover, .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button):hover {
				color: {$mobile_header_cart_tray_link_hover_color};
			}
			.site-mobile-header-item .responsive-header-cart .woocommerce.widget_shopping_cart .woocommerce-mini-cart__total,
			.site-mobile-header-item .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-content .woocommerce-mini-cart__total,
			.site-mobile-header-item .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-header {
				border-top-color: {$mobile_header_cart_tray_separator_color};
   				border-bottom-color: {$mobile_header_cart_tray_separator_color};
			}
			.site-mobile-header-item .responsive-header-cart .widget_shopping_cart .mini_cart_item,
			.site-mobile-header-item .rspv-header-cart-drawer .rspv-cart-drawer-content .widget_shopping_cart_content ul li {
				border-bottom-color: {$mobile_header_cart_tray_separator_color};
			}
			";
		}
		wp_add_inline_style( 'responsive-woocommerce-style', apply_filters( 'responsive_head_css', responsive_minimize_css( $woocommerce_custom_css ) ) );
		wp_add_inline_style('responsive-woocommerce-style', responsive_minimize_css($font_preset_css));
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
