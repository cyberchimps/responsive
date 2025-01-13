/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

    api( 'responsive_site_background_color', function( value ) {
		value.bind( function( newval ) {
			// if( api( 'responsive_site_background_image_toggle' ).get() ) {
			// 	$('body.custom-background').css({'background-color': newval });
			// }
			$('body').addClass( 'custom-background' );
			$('body.custom-background').css({'background-color': newval });
		} );
	} );

    //Header section
    //Update header background color...
    // api( 'responsive_header_background_color', function( value ) {
    //         value.bind( function( newval ) {
    //             $('.site-header').css('background-color', newval );
    //         } );
    //     } );

    //Update header border color...
    // api( 'responsive_header_border_color', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.site-header').css('border-bottom-color', newval );
    //     } );
    // } );

    //Update site title color...
    api( 'responsive_header_site_title_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-title a').css('color', newval );
        } );
    } );

    //Update site title hover color...
    api( 'responsive_header_site_title_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-title a:hover').css('color', newval );
        } );
    } );

    //Update site tagline color...
    api( 'responsive_header_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-description').css('color', newval );
        } );
    } );

    // Transparent Header
    //Update header border color...
    api( 'responsive_transparent_header_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-header').css('border-bottom-color', newval );
        } );
    } );

    //Update site title color...
    api( 'responsive_transparent_header_site_title_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-title a').css('color', newval );
        } );
    } );

    //Update site title hover color...
    api( 'responsive_transparent_header_site_title_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-title a:hover').css('color', newval );
        } );
    } );

    //Update site tagline color...
    api( 'responsive_transparent_header_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-description').css('color', newval );
        } );
    } );

    //Header Widget section
    //Update header widget text background color...
    api( 'responsive_header_widget_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets, .header-widgets h1, .header-widgets h2, .header-widgets h3, .header-widgets h4, .header-widgets h5, .header-widgets h6, .header-widgets .widget-title h4').css('color', newval );
        } );
    } );

    //Update header widget background color...
    api( 'responsive_header_widget_background_color', function( value ) {
        value.bind( function( newval ) {
            if( 'with_logo' != api('responsive_header_widget_position').get() ) {
                $('.header-widgets').css('background-color', newval );
            }
        } );
    } );

    //Update header widget border color...
    api( 'responsive_header_widget_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets').css('border-color', newval );
        } );
    } );

    //Update header widget link color...
    api( 'responsive_header_widget_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets a').css('color', newval );
        } );
    } );

    //Update header widget link hover color...
    api( 'responsive_header_widget_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets a:focus, .header-widgets a:hover').css('color', newval );
        } );
    } );

    //Header Widget section
    //Update header widget text background color...
    api( 'responsive_transparent_header_widget_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets, .res-transparent-header .header-widgets h1, .res-transparent-header .header-widgets h2, .res-transparent-header .header-widgets h3, .res-transparent-header .header-widgets h4, .res-transparent-header .header-widgets h5, .res-transparent-header .header-widgets h6, .res-transparent-header .header-widgets .widget-title h4').css('color', newval );
        } );
    } );

    //Update header widget background color...
    api( 'responsive_transparent_header_widget_background_color', function( value ) {
        value.bind( function( newval ) {
            if( 'with_logo' != api('responsive_header_widget_position').get() ) {
                $('.res-transparent-header .header-widgets').css('background-color', newval );
            }
        } );
    } );

    //Update header widget border color...
    api( 'responsive_transparent_header_widget_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets').css('border-color', newval );
        } );
    } );

    //Update header widget link color...
    api( 'responsive_transparent_header_widget_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets a').css('color', newval );
        } );
    } );

    //Update header widget link hover color...
    api( 'responsive_transparent_header_widget_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets a:focus, .res-transparent-header .header-widgets a:hover').css('color', newval );
        } );
    } );

    //Site Colors
    //Box Background Color
    api( 'responsive_box_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .responsive-single-related-posts-container,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry:not(.bbp-forum-status-open),.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .responsive-single-related-posts-container,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .site-content article.product,.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,.woocommerce.responsive-site-style-content-boxed .products-wrapper,.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce.responsive-site-style-boxed ul.products li.product,.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,.woocommerce.single-product:not(.responsive-site-style-flat) div.product').css('background-color', newval );

            if( ! api('responsive_sidebar_background_color').get() ) {
                $('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-color', newval );
            }

        } );
    } );

    //Alternate Background Color
    api( 'responsive_alt_background_color', function( value ) {
        value.bind( function( newval ) {
            $('address, blockquote, pre, code, kbd, tt, var').css('background-color', newval );
        } );
    } );

    //Body text Color
    api( 'responsive_body_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body, .wc-block-grid__product-title').css('color', newval );
        } );
    } );

    //All Heading text Color
    api( 'responsive_all_heading_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6').css('color', newval );
        } );
    } );

    //H1 text Color
    api( 'responsive_h1_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h1').css('color', newval );
        } );
    } );

    //H2 text Color
    api('responsive_h2_text_color', function(value) {
        value.bind(function(newval) {
            $('h2').each(function() {
                // Check if the <h2> is not inside an ancestor with the class "widget-area" or "site-title"
                $isNotWidgetArea = $(this).closest('.widget-area').length === 0;
                $isNotSiteTitle = $(this).closest('.site-title').length === 0
                if ( $isNotSiteTitle && $isNotWidgetArea ) {
                    $(this).css('color', newval);
                }
            });
        });
    });

    //H3 text Color
    api( 'responsive_h3_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h3').css('color', newval );
        } );
    } );

    //H4 text Color
    api( 'responsive_h4_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h4').css('color', newval );
        } );
    } );

    //H5 text Color
    api( 'responsive_h5_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h5').css('color', newval );
        } );
    } );

    //H6 text Color
    api( 'responsive_h6_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h6').css('color', newval );
        } );
    } );

    //Meta text Color
    api( 'responsive_meta_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.post-meta *, .hentry .post-meta a').css('color', newval );
        } );
    } );

    //Link Color
    api( 'responsive_link_color', function( value ) {
        value.bind( function( newval ) {
            $('a, .woocommerce a.remove:hover').css('color', newval );
        } );
    } );

    //Date Box Background Color
    api( 'responsive_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.responsive-date-box').css('background-color', newval );
        } );
    } );

    //Date box Font Color
    api( 'responsive_link_color', function( value ) {
        value.bind( function( newval ) {
            let backgroundColor = newval;
            hexcolor = backgroundColor.replace("#", "");
            let r = parseInt(hexcolor.substr(0,2),16);
            let g = parseInt(hexcolor.substr(2,2),16);
            let b = parseInt(hexcolor.substr(4,2),16);
            let o = Math.round(((parseInt(r) * 299) + (parseInt(g) * 587) + (parseInt(b) * 114)) /1000);
            if( o > 125 ) {
                $('.date-box-day').css("color", "black");
                $('.date-box-month').css("color", "black");
                $('.date-box-year').css("color", "black");
            }
            else {
                $('.date-box-day').css("color", "white");
                $('.date-box-month').css("color", "white");
                $('.date-box-year').css("color", "white");
            }
        } );
    } );

    //Link Hover Color
    api( 'responsive_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('a:hover').css('color', newval );
        } );
    } );

    //Buttons color
    api( 'responsive_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css('background-color', newval );
            if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
                jQuery( 'style#responsive-elementor-button-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-color">'
                    + '.elementor-button-wrapper .elementor-button { background-color:' + newval +'}'
                    + '</style>'
                );
            }
        } );
    } );

    //Buttons text Color
    api( 'responsive_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button').css('color', newval );
        } );
    } );

    //Buttons border color
    api( 'responsive_button_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button').css('border-color', newval );
        } );
    } );

    //Inputs color
    api( 'responsive_inputs_background_color', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('background-color', newval );
        } );
    } );

    //Inputs text Color
    api( 'responsive_inputs_text_color', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('color', newval );
        } );
    } );

    // Inputs border color
    api( 'responsive_inputs_border_color', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-color', newval );
        } );
    } );

    //Labels Text Color
    api( 'responsive_label_color', function( value ) {
        value.bind( function( newval ) {
            $('label').css('color', newval );
        } );
    } );

    //Main Menu Colors Section
    //Background Color
    api( 'responsive_header_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                $('.header-full-width.site-header-layout-vertical .main-navigation:not(.toggled),.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation:not(.toggled),.responsive-site-full-width.site-header-layout-vertical .main-navigation:not(.toggled),.site-header-layout-vertical .main-navigation:not(.toggled) div').css('background-color', newval);

                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.site-header-layout-vertical .main-navigation:not(.toggled)').css('background-color', newval);
                    }
                }

                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)")
                isMobile(x) // Call listener function at run time
                x.addListener(isMobile)
            }
        } );
    } );

    //Main Menu Colors Section
    //Background Color
    api( 'responsive_header_mobile_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                $('.header-full-width.site-header-layout-vertical .main-navigation.toggled,.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation.toggled,.responsive-site-full-width.site-header-layout-vertical .main-navigation.toggled,.site-header-layout-vertical .main-navigation.toggled div, .main-navigation.toggled').css('background-color', newval);

                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.site-header-layout-vertical .main-navigation.toggled').css('background-color', newval);
                    }
                }

                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)")
                isMobile(x) // Call listener function at run time
                x.addListener(isMobile)
            }
            else {
                $('.res-transparent-header .main-navigation.toggled').css('background-color', newval);
            }
        } );
    } );

    //Border Color
    api( 'responsive_header_menu_border_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation) .main-navigation').css('border-top', '1px solid '+newval);
                        $('.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation) .main-navigation').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isMobile(x); // Call listener function at run time
                x.addListener(isMobile);

                function isTablet(x) {
                    if (x.matches) { // If media query matches
                        $('.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-top', '1px solid '+newval);
                        $('.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(min-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isTablet(x); // Call listener function at run time
                x.addListener(isTablet);

                $('.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-site-branding-main-navigation .main-navigation').css('border-top', '1px solid '+newval);
                $('.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-main-navigation-site-branding .main-navigation').css('border-bottom', '1px solid '+newval);

            }
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu  .current_page_item > a,.main-navigation .menu  .current-menu-item > a').css('background-color', newval );
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_header_hover_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $(".main-navigation .menu li > a").hover(
                function() {
                    $(this).css("background-color", api('responsive_header_hover_menu_background_color').get());
                },
                function() {
                    $(this).css("background-color", api('responsive_header_active_menu_background_color').get());
                }
            );
        } );
    } );

    //Menu Item Link Color
    api( 'responsive_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu > li > a').css('color', newval );
            if ( api('responsive_header_menu_link_hover_color').get() === '' && api('responsive_header_active_menu_link_color').get() === '' ) {
                jQuery( 'style#responsive-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    api( 'responsive_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .res-iconify svg').css('stroke', newval );
        } );
    } );

	//Active Menu Link Color
    api( 'responsive_header_active_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu .current_page_item > a,.main-navigation .menu .current-menu-item > a,.main-navigation .menu .current-menu-item.current_page_item a').css('color', newval );
            if ( api('responsive_header_menu_link_hover_color').get() === '' ) {
                jQuery( 'style#responsive-header-active-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-active-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    api( 'responsive_header_active_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu > li.current-menu-item > a > .res-iconify svg').css('stroke', newval );
        } );
    } );

    //Sub Menu Background Color
    api( 'responsive_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children,.main-navigation .sub-menu').css('background-color', newval );
        } );
    } );

    //Sub Menu Active Background Color
    api( 'responsive_header_active_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu .sub-menu .current_page_item > a,.main-navigation .menu .sub-menu .current-menu-item > a,.main-navigation .menu .children li.current_page_item a').css('background-color', newval );
        } );
    } );

    //Sub Menu Hover Background Color
    api( 'responsive_header_hover_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children li a:hover,.main-navigation .sub-menu li a:hover, .main-navigation .menu .sub-menu .current_page_item > a:hover,.main-navigation .menu .sub-menu .current-menu-item > a:hover').css('background-color', newval );
        } );
    } );

    //Sub Menu Item Link Color
    api( 'responsive_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children li a,.main-navigation .sub-menu li a').css('color', newval );
        } );
    } );

    api( 'responsive_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .sub-menu li .res-iconify svg').css('stroke', newval );
        } );
    } );

	//Active Sub Menu Item Link Color
    api( 'responsive_header_sub_menu_active_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu .sub-menu .current_page_item > a,.main-navigation .menu .sub-menu .current-menu-item > a,.main-navigation .menu .children li.current_page_item a').css('color', newval );
        } );
    } );
//Active Sub Menu Item Link Color
    api( 'responsive_transparent_header_sub_menu_active_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header .main-navigation .menu .children li.current_page_item a').css('color', newval );
        } );
    } );

    //Menu Toggle Background Color
    api( 'responsive_header_menu_toggle_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu-toggle').css('background-color', newval );
        } );
    } );

    //Menu Toggle Color
    api( 'responsive_header_menu_toggle_color', function( value ) {
        value.bind( function( newval ) {
         $('.main-navigation .menu-toggle').css('color', newval );
        } );
    } );

    api( 'responsive_mobile_menu_toggle_border_color', function( value ) {
        value.bind( function( newval ) {
         $('.main-navigation .menu-toggle').css({'border-color': newval});
         $('.main-navigation.toggled .menu-toggle').css({'border-color': newval} );
        } );
    } );
    //Sub Menu divider
    api( 'responsive_sub_menu_divider_color', function( value ) {
        value.bind( function( newval ) {
         $('.main-navigation .children li, .main-navigation .sub-menu li').css('border-color', newval );
        } );
    } );
    //Transparent Header Main Menu Colors Section
    //Background Color
    api( 'responsive_transparent_header_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                $('.res-transparent-header.header-full-width.site-header-layout-vertical .main-navigation:not(.toggled),.res-transparent-header.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation:not(.toggled),.res-transparent-header.responsive-site-full-width.site-header-layout-vertical .main-navigation:not(.toggled),.res-transparent-header.site-header-layout-vertical .main-navigation:not(.toggled) div').css('background-color', newval);

                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.res-transparent-header .site-header-layout-vertical .main-navigation:not(.toggled)').css('background-color', newval);
                    }
                }

                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)")
                isMobile(x) // Call listener function at run time
                x.addListener(isMobile)
            }
        } );
    } );

    //Main Menu Colors Section
    //Background Color
    api( 'responsive_transparent_header_mobile_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                $('.res-transparent-header.header-full-width.site-header-layout-vertical .main-navigation.toggled,.res-transparent-header.site-header-layout-vertical.site-header-full-width-main-navigation .main-navigation.toggled,.res-transparent-header.responsive-site-full-width.site-header-layout-vertical .main-navigation.toggled,.res-transparent-header.site-header-layout-vertical .main-navigation.toggled div,.res-transparent-header .main-navigation.toggled').css('background-color', newval);

                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.res-transparent-header.site-header-layout-vertical .main-navigation.toggled').css('background-color', newval);
                    }
                }

                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)")
                isMobile(x) // Call listener function at run time
                x.addListener(isMobile)
            }
            else {
                $('.res-transparent-header .main-navigation.toggled').css('background-color', newval);
            }
        } );
    } );

    //Border Color
    api( 'responsive_transparent_header_menu_border_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.res-transparent-header.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation) .main-navigation').css('border-top', '1px solid '+newval);
                        $('.res-transparent-header.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation) .main-navigation').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isMobile(x); // Call listener function at run time
                x.addListener(isMobile);

                function isTablet(x) {
                    if (x.matches) { // If media query matches
                        $('.res-transparent-header.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-top', '1px solid '+newval);
                        $('.res-transparent-header.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(min-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isTablet(x); // Call listener function at run time
                x.addListener(isTablet);

                $('.res-transparent-header.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-site-branding-main-navigation .main-navigation').css('border-top', '1px solid '+newval);
                $('.res-transparent-header.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-main-navigation-site-branding .main-navigation').css('border-bottom', '1px solid '+newval);

            }
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_transparent_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu .current_page_item > a,.res-transparent-header .main-navigation .menu .current-menu-item > a').css('background-color', newval );
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_transparent_header_hover_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu .current_page_item > a:hover,.res-transparent-header .main-navigation .menu .current-menu-item > a:hover,.res-transparent-header .main-navigation .menu li > a:hover,.res-transparent-header .main-navigation .menu .page_item a:hover').css('background-color', newval );
        } );
    } );

    //Menu Item Link Color
    api( 'responsive_transparent_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu > li > a').css('color', newval );
            if ( api('responsive_transparent_header_menu_link_hover_color').get() === '' && api('responsive_transparent_header_active_menu_link_color').get() === '' ) {
                jQuery( 'style#responsive-transparent-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    api( 'responsive_transparent_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .res-iconify svg').css('stroke', newval );
        } );
    } );

    //Sub Menu Background Color
    api( 'responsive_transparent_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children,.res-transparent-header .main-navigation .sub-menu').css('background-color', newval );
        } );
    } );

    //Sub Menu Active Background Color
    api( 'responsive_transparent_header_active_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children li.current_page_item a,.res-transparent-header .main-navigation .sub-menu .current-menu-item > a, .res-transparent-header .main-navigation .sub-menu .current_page_item > a').css('background-color', newval );
        } );
    } );

    //Sub Menu Hover Background Color
    api( 'responsive_transparent_header_hover_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children li a:hover,.res-transparent-header .main-navigation .sub-menu li a:hover,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a:hover,.res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a:hover').css('background-color', newval );
        } );
    } );

    //Sub Menu Item Link Color
    api( 'responsive_transparent_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children li a,.res-transparent-header .main-navigation .sub-menu li a').css('color', newval );
        } );
    } );

    api( 'responsive_transparent_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .sub-menu li .res-iconify svg').css('stroke', newval );
        } );
    } );

    //Menu Toggle Background Color
    api( 'responsive_transparent_header_menu_toggle_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu-toggle').css('background-color', newval );
        } );
    } );

    //Menu Toggle Color
    api( 'responsive_transparent_header_menu_toggle_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu-toggle').css('color', newval );
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_transparent_header_active_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu > li.current_page_item > a,.main-navigation .menu > li.current-menu-item > a').css('color', newval );
            if ( api('responsive_transparent_header_menu_link_hover_color').get() === '' ) {
                jQuery( 'style#responsive-transparent-header-active-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-active-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_sub_menu_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children, .main-navigation .sub-menu').css('border-color', newval );
        } );
    } );


    //Footer Color Section
    //Background Color
    api( 'responsive_footer_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-footer').css('background-color', newval );
        } );
    } );

    //Text Color
    api( 'responsive_footer_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-footer, .site-footer h1,.site-footer h2,.site-footer h3,.site-footer h4,.site-footer h5,.site-footer h6').css('color', newval );
        } );
    } );

    //Links Color
    api( 'responsive_footer_links_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-footer a').css('color', newval );
        } );
    } );

    //Border Color
    // api( 'responsive_footer_border_color', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.footer-bar').css('border-color', newval );
    //     } );
    // } );

    //Content Header Color Section
    //Title Color
    api( 'responsive_content_header_heading_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-content-header .page-header .page-title,.site-content-header .page-title').css('color', newval );
        } );
    } );

    //Description Color
    api( 'responsive_content_header_description_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-content-header .page-header .page-description,.site-content-header .page-description').css('color', newval );
        } );
    } );

    //Breadcrumb Color
    api( 'responsive_breadcrumb_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-content-header .breadcrumb-list,.site-content-header .breadcrumb-list a, .woocommerce .woocommerce-breadcrumb,.woocommerce .woocommerce-breadcrumb a').css('color', newval );
        } );
    } );

    //Product Catalog Options Color Section
    //Rating Color
    api( 'responsive_shop_product_rating_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce .star-rating span').css('color', newval );
        } );
    } );

    //Product Price Color
    api( 'responsive_shop_product_price_color', function( value ) {
        value.bind( function( newval ) {
            $('.wc-block-grid__product-price,.woocommerce ul.products li.product .price').css('color', newval );
        } );
    } );

    //Buttons Color
    api( 'responsive_add_to_cart_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.wc-block-grid__product-onsale,.woocommerce span.onsale').css('background-color', newval );
            $('.woocommerce div.product .woocommerce-tabs ul.tabs::before,.woocommerce div.product .woocommerce-tabs ul.tabs li').css('border-color', newval );
        } );
    } );

    //Buttons Text
    api( 'responsive_add_to_cart_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce span.onsale,.wc-block-grid__product-onsale,.woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button').css('color', newval );
        } );
    } );

    //Cart Options Color Section
    //Button Color
    api( 'responsive_cart_buttons_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button').css('background-color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button').css('background-color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button').css('border-color', newval );
            $('.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button ').css('border-color', newval );
        } );
    } );

    //Button Text Color
    api( 'responsive_cart_buttons_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button').css('color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button').css('color', newval );
        } );
    } );

    //Checkout Button Color
    api( 'responsive_cart_checkout_button_color', function( value ) {
        value.bind( function( color ) {
            jQuery('style#responsive-cart-checkout-button-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-checkout-button-color">'
                + '.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button, .page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button { background-color: ' + color + ' !important; }'
                + '</style>'
            );
        } );
    } );

    //Checkout Button Text Color
    api( 'responsive_cart_checkout_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button').css('color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button').css('color', newval );
        } );
    } );
    // Cart Buttons Text Color.
    api ( 'responsive_cart_buttons_hover_color', function(value){
        value.bind( function( newval ) {
            $(".page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button").hover(
                function() {
                    $(this).css("background-color", api('responsive_cart_buttons_hover_color').get());
                },
                function() {
                    $(this).css("background-color", api('responsive_cart_buttons_color').get());
                }
            );
        } );
    } );
    // Cart Buttons Text Hover Color.
    api ( 'responsive_cart_buttons_hover_text_color', function(value){
        value.bind( function( newval ) {
            $(".page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button").hover(
                function() {
                    $(this).css("color", api('responsive_cart_buttons_hover_text_color').get());
                },
                function() {
                    $(this).css("color", api('responsive_cart_buttons_text_color').get());
                }
            );
        } );
    } );
    //Checkout Button Hover Color
    api ( 'responsive_cart_checkout_button_hover_color', function(value){
        value.bind( function( color ) {
            jQuery('style#responsive-cart-checkout-button-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-checkout-button-hover-color">'
                + '.page.woocommerce-cart .woocommerce a.button.alt:hover,.page.woocommerce-cart .woocommerce a.button:hover,.page.woocommerce-checkout .woocommerce button.button.alt:hover,.page.woocommerce-checkout .woocommerce button.button:hover, .page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button:hover, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button:hover { background-color: ' + color + ' !important; }'
                + '</style>'
            );
        } );
    } );
    //Checkout Button Text Hover Color
    api ( 'responsive_cart_checkout_button_hover_text_color', function(value){
        value.bind( function( newval ) {
            $(".page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button").hover(
                function() {
                    $(this).css("color", api('responsive_cart_checkout_button_hover_text_color').get());
                },
                function() {
                    $(this).css("color", api('responsive_cart_checkout_button_text_color').get());
                }
            );
        } );
    } );

    //Single Product Floating Bar -> Colors
    //Floating bar background color
    api( 'responsive_floatingb_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar' ).css( 'background-color', newval );
        } );
    } );

    //Floating bar title color
    api( 'responsive_floatingb_title_color', function( value ) {
        value.bind( function( newval ) {
            $( '.floatingb-title' ).css( 'color', newval );
        } );
    } );

    //Floating bar price color
    api( 'responsive_floatingb_price_color', function( value ) {
        value.bind( function( newval ) {
            $( '.floatingb-price' ).css( 'color', newval );
        } );
    } );

    //Floating bar quantity input background color
    api( 'responsive_floatingb_qty_input_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .input-text' ).css( 'background-color', newval );
        } );
    } );

    //Floating bar quantity input font color
    api( 'responsive_floatingb_qty_input_font_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .input-text' ).css( 'color', newval );
        } );
    } );

    //Floating bar quantity input border color
    api( 'responsive_floatingb_qty_input_border_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .input-text' ).css( 'border-color', newval );
        } );
    } );

    //Floating bar add to cart background color
    api( 'responsive_floatingb_addtocart_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .floating-bar-addbtn' ).css( 'background-color', newval );
            var originalFloatingbBgHoverColor = api( 'responsive_floatingb_addtocart_bghover_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'background-color', originalFloatingbBgHoverColor );
            }, function() {
                $(this).css( 'background-color', newval );
            } );
        } );
    } );

    //Floating bar add to cart background hover color
    api( 'responsive_floatingb_addtocart_bghover_color', function( value ) {
        value.bind( function( newval ) {
            var originalFloatingbBgColor = api( 'responsive_floatingb_addtocart_background_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'background-color', newval );
            }, function() {
                $(this).css( 'background-color', originalFloatingbBgColor );
            } );
        } );
    } );

    //Floating bar add to cart font color
    api( 'responsive_floatingb_addtocart_font_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .floating-bar-addbtn' ).css( 'color', newval );
            var originalFloatingbFontHoverColor = api( 'responsive_floatingb_addtocart_fonthover_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'color', originalFloatingbFontHoverColor );
            }, function() {
                $(this).css( 'color', newval );
            } );
        } );
    } );

    //Floating bar add to cart font hover color
    api( 'responsive_floatingb_addtocart_fonthover_color', function( value ) {
        value.bind( function( newval ) {
            var originalFloatingbFontColor = api( 'responsive_floatingb_addtocart_font_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'color', newval );
            }, function() {
                $(this).css( 'color', originalFloatingbFontColor );
            } );
        } );
    } );

    //Sidebar -> Colors
    //Headings Color
    api( 'responsive_sidebar_headings_color', function( value ) {
        value.bind( function( newval ) {
            let sidebarHeadings = $('.widget-area').find('h1, h2, h3, h4, h5, h6');
            sidebarHeadings.css('color', newval);
        } );
    } );

    //Background Color
    api( 'responsive_sidebar_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.responsive-site-style-boxed aside#secondary .widget-wrapper ').css('background-color', newval );
        } );
    } );

    //Text Color
    api( 'responsive_sidebar_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.widget-area').css('color', newval );
        } );
    } );

    //Links Color
    api( 'responsive_sidebar_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.widget-area .widget-wrapper a ').css('color', newval );
        } );
    } );

    //Links Hover Color
    $(".widget-area .widget-wrapper a").hover(
        function() {
            $(this).css("color", api('responsive_sidebar_link_hover_color').get());
        },
        function() {
            $(this).css("color", api('responsive_sidebar_link_color').get());
        });

    //Scroll To Top
    //Icon Color
    api( 'responsive_scroll_to_top_icon_color', function( value ) {
        value.bind( function( newval ) {

            $('#scroll span').css('border-bottom-color', newval );        } );
    } );

    //Icon Hover Color
    $("#scroll").hover(
        function() {
            $(this).find('span').css("border-bottom-color", api('responsive_scroll_to_top_icon_hover_color').get());
        },
        function() {
            $(this).find('span').css("border-bottom-color", api('responsive_scroll_to_top_icon_color').get());
        });

    //Icon Background Color
    api( 'responsive_scroll_to_top_icon_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#scroll').css('background-color', newval );
        } );
    } );

    //Icon Background Hover Color
    $("#scroll").hover(
        function() {
            $(this).css("background-color", api('responsive_scroll_to_top_icon_background_hover_color').get());
        },
        function() {
            $(this).css("background-color", api('responsive_scroll_to_top_icon_background_color').get());
        });

    //Hover Colors

    //Links Hover Color
    $("a").hover(
        function() {
            $(this).css("color", api('responsive_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_link_color').get());
        }
    );
    //Buttons Hover Color
    $(".page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button, .elementor-widget-rael-button .rael-button").hover(
        function() {
            $(this).css("background-color", api('responsive_button_hover_color').get());
            $(this).css("color", api('responsive_button_hover_text_color').get());
            $(this).css("border-color", api('responsive_button_hover_border_color').get());
        },

        function() {
            $(this).css("background-color", api('responsive_button_color').get());
            $(this).css("color", api('responsive_button_text_color').get());
            $(this).css("border-color", api('responsive_button_border_color').get());
        }
    );
    api( 'responsive_button_hover_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-hover-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-hover-color">'
                    + '.elementor-button-wrapper .elementor-button:hover{ background-color:' + newval +' }'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_text_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-text-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-text-color">'
                    + '.elementor-button-wrapper .elementor-button{ color:' + newval +' !important;}'
                    + '.elementor-button-wrapper .elementor-button{ fill:' + newval +'}'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_hover_text_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-text-hover-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-text-hover-color">'
                    + '.elementor-button-wrapper .elementor-button:hover{ color:' + newval +' !important; }'
                    + '.elementor-button-wrapper .elementor-button:hover svg{ fill:' + newval +'}'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_border_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-border-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-border-color">'
                    + '.elementor-button-wrapper .elementor-button{ border-color:' + newval +'; }'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_hover_border_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-border-hover-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-border-hover-color">'
                    + '.elementor-button-wrapper .elementor-button:hover{ border-color:' + newval +'; }'
                    + '</style>'
                );
            } );
        }
    } );

    // //site title hover color
    $(".site-title a").hover(
        function() {
            $(this).css("color", api('responsive_header_site_title_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_site_title_color').get());
        }
    );
    //site title hover color
    $(".res-transparent-header .site-title a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_site_title_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_site_title_color').get());
        }
    );

   //Header widget link hover color...
    $(".header-widgets a").hover(
        function() {
            $(this).css("color", api('responsive_header_widget_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_widget_link_color').get());
        }
    );

    //Menu Links Hover Color
    $(".main-navigation .menu > li > a").hover(
        function() {
            $(this).css("color", api('responsive_header_menu_link_hover_color').get());
            if (api('responsive_header_menu_link_hover_color').get() !== '' ) {
                jQuery( 'style#responsive-header-menu-link-hover-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-link-hover-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api("responsive_header_menu_link_hover_color").get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api("responsive_header_menu_link_hover_color").get()+' }'
                    + '</style>'
                );
            } else {
                jQuery( 'style#responsive-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_header_menu_link_color').get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_header_menu_link_color').get()+' }'
                    + '</style>'
                );
                if (api('responsive_header_active_menu_link_color').get() !== '') {
                    jQuery( 'style#responsive-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_header_active_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_header_active_menu_link_color').get()+' }'
                        + '</style>'
                    );
                } else {
                    jQuery( 'style#responsive-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_header_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_header_menu_link_color').get()+' }'
                        + '</style>'
                    );
                }
            }
        },

        function() {
            $(this).css("color", api('responsive_header_menu_link_color').get());
        }
    );
    $(".main-navigation .menu li .res-iconify svg, .main-navigation .menu > li > a:not(.sub-menu) > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_header_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_header_menu_link_color').get());
        }
    );
    //Menu item link hover color
    $(".res-transparent-header .main-navigation .menu > li > a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_menu_link_hover_color').get());
            if (api('responsive_transparent_header_menu_link_hover_color').get() !== '' ) {
                jQuery( 'style#responsive-transparent-header-menu-link-hover-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-link-hover-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api("responsive_transparent_header_menu_link_hover_color").get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api("responsive_transparent_header_menu_link_hover_color").get()+' }'
                    + '</style>'
                );
            } else {
                jQuery( 'style#responsive-transparent-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                    + '</style>'
                );
                if (api('responsive_transparent_header_active_menu_link_color').get() !== '') {
                    jQuery( 'style#responsive-transparent-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-transparent-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_transparent_header_active_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_transparent_header_active_menu_link_color').get()+' }'
                        + '</style>'
                    );
                } else {
                    jQuery( 'style#responsive-transparent-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-transparent-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                        + '</style>'
                    );
                }
            }
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_menu_link_color').get());
        }
    );
    $(".res-transparent-header .main-navigation .menu li .res-iconify svg,.res-transparent-header .main-navigation .menu > li > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_transparent_header_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_transparent_header_menu_link_color').get());
        }
    );
    $(".res-transparent-header .main-navigation .menu > li.current_page_item > a,.res-transparent-header .main-navigation .menu > li.current-menu-item > a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_active_menu_link_color').get());
        }
    );

    //Sub Menu Links Hover Color
    $(".main-navigation .children li a,.main-navigation .sub-menu li a").hover(
        function() {
            $(this).css("color", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_sub_menu_link_color').get());
        }
    );
    $(".main-navigation .menu .sub-menu li > .res-iconify svg, .main-navigation .menu .sub-menu li > a > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_link_color').get());
        }
    );

    //Active Sub Menu Links Hover Color
    $(".main-navigation .menu .sub-menu .current_page_item > a,.main-navigation .menu .sub-menu .current-menu-item > a,.main-navigation .menu .children li.current_page_item a").hover(
        function() {
            $(this).css("color", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_sub_menu_active_link_color').get());
        }
    );
    $(".main-navigation .menu .sub-menu .current_page_item > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_active_link_color').get());
        }
    );
//Active Sub Menu Links Hover Color
    $(".res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header .main-navigation .menu .children li.current_page_item a,.res-transparent-header .main-navigation .menu .sub-menu li:hover > .res-iconify svg").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_link_color').get());
        }
    );
    $(".res-transparent-header .main-navigation .menu .sub-menu li > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_transparent_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_transparent_header_sub_menu_link_color').get());
        }
    );
//Active Sub Menu Links Hover Color
    $(".res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header .main-navigation .menu .children li.current_page_item a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_active_link_color').get());
        }
    );
    //Footer Links Hover Color
    $(".site-footer a").hover(
        function() {
            $(this).css("color", api('responsive_footer_links_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_footer_links_color').get());
        }
    );

    //Add to cart Button Text Hover Color
    $(".woocommerce span.onsale,.wc-block-grid__product-onsale,.woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button").hover(
        function() {
            $(this).css("color", api('responsive_add_to_cart_button_hover_text_color').get());
        },

        function() {
            $(this).css("color", api('responsive_add_to_cart_button_text_color').get());
        }
    );

    //Cart Button Text Hover Color
    $(".page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button").hover(
        function() {
            $(this).css("color", api('responsive_cart_buttons_hover_text_color').get());
        },

        function() {
            $(this).css("color", api('responsive_cart_buttons_text_color').get());
        }
    );

    //Checkout Button Hover text Color
    $(".page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button").hover(
        function() {
            $(this).css("color", api('responsive_cart_checkout_button_hover_text_color').get());
        },

        function() {
            $(this).css("color", api('responsive_cart_checkout_button_text_color').get());
        }
    );

    //Add to Cart Button Hover Color
    $(".woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce button.button,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button").hover(
        function() {
            $(this).css("background-color", api('responsive_add_to_cart_button_hover_color').get());
        },

        function() {
            $(this).css("background-color", api('responsive_add_to_cart_button_color').get());
        }
    );

    //Cart Button Hover Color
    $(".page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button").hover(
        function() {
            $(this).css("background-color", api('responsive_cart_buttons_hover_color').get());
        },

        function() {
            $(this).css("background-color", api('responsive_cart_buttons_color').get());
        }
    );
    // Woocommerce off canvas filter.
    api( 'responsive_off_canvas_close_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.responsive-off-canvas-close svg').css('fill', newval );
        } );
    } );

    $(".responsive-off-canvas-close svg").hover(
        function() {
            $(this).css("fill", api('responsive_off_canvas_close_button_hover_color').get());
        },

        function() {
            $(this).css("fill", api('responsive_off_canvas_close_button_color').get());
        }
    );
    
    api( 'responsive_off_canvas_filter_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.off_canvas_filter_btn').css('background-color', newval );
        } );
    } );

    api( 'responsive_off_canvas_filter_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.off_canvas_filter_btn').css('color', newval );
        } );
    } );

    api( 'responsive_off_canvas_filter_button_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.off_canvas_filter_btn').css('border-color', newval );
        } );
    } );
    api( 'responsive_off_canvas_filter_button_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_off_canvas_filter_button_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_off_canvas_filter_button_hover_color">.off_canvas_filter_btn:hover {background-color:' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});
    api( 'responsive_off_canvas_filter_button_text_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_off_canvas_filter_button_text_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_off_canvas_filter_button_text_hover_color">.off_canvas_filter_btn:hover {color:' + to + ';} element.style{color: unset}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});
    api( 'responsive_off_canvas_filter_button_border_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_off_canvas_filter_button_border_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_off_canvas_filter_button_border_hover_color">.off_canvas_filter_btn:hover {border-color:' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    api( 'responsive_sorting_option_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce-ordering .orderby').css('color', newval );
        } );
    } );

    api( 'responsive_sorting_option_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce-ordering .orderby').css('background-color', newval );
        } );
    } );

    //Header Top Row Background Color
    api( 'responsive_header_above_row_bg_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-color">'
                + '.responsive-site-above-header-wrap { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Top Row Hover Background Color
    api( 'responsive_header_above_row_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-hover-color">'
                + '.responsive-site-above-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Top Row Bottom Border Color
    api('responsive_header_above_row_bottom_border_color', function(value) {
        value.bind(function(newColor) {
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size').get() || 0;
            $('.responsive-site-above-header-wrap').css('border-bottom', currentBorderSize + 'px solid ' + newColor);
        });
    });    
    
    ////Header Top Row Bottom Border Hover Color
    api( 'responsive_header_above_row_bottom_border_hover_color', function( value ) {
        value.bind( function( newColor ) {
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size').get() || 0;
            const normalColor = api('responsive_header_above_row_bottom_border_color').get();
            $(".responsive-site-above-header-wrap").hover(
                function() {
                    $(this).css('border-bottom', currentBorderSize + 'px solid ' + newColor);
                },
                function() {
                    $(this).css('border-bottom', currentBorderSize + 'px solid ' + normalColor);
                }
            );
        } );
    } );

    //Header Primary Row Background Color
    api( 'responsive_header_primary_row_bg_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-color">'
                + '.responsive-site-primary-header-wrap { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Hover Background Color
    api( 'responsive_header_primary_row_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-hover-color">'
                + '.responsive-site-primary-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Bottom Border Color
    api('responsive_header_primary_row_bottom_border_color', function(value) {
        value.bind(function(newColor) {
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size').get() || 0;
            $('.responsive-site-primary-header-wrap').css('border-bottom', currentBorderSize + 'px solid ' + newColor);
        });
    });    
    
    ////Header Primary Row Bottom Border Hover Color
    api( 'responsive_header_primary_row_bottom_border_hover_color', function( value ) {
        value.bind( function( newColor ) {
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size').get() || 0;
            const normalColor = api('responsive_header_primary_row_bottom_border_color').get();
            $(".responsive-site-primary-header-wrap").hover(
                function() {
                    $(this).css('border-bottom', currentBorderSize + 'px solid ' + newColor);
                },
                function() {
                    $(this).css('border-bottom', currentBorderSize + 'px solid ' + normalColor);
                }
            );
        } );
    } );

    //Header Below Row Background Color
    api( 'responsive_header_below_row_bg_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-color">'
                + '.responsive-site-below-header-wrap { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Hover Background Color
    api( 'responsive_header_below_row_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-hover-color">'
                + '.responsive-site-below-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Bottom Border Color
    api('responsive_header_below_row_bottom_border_color', function(value) {
        value.bind(function(newColor) {
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size').get() || 0;
            $('.responsive-site-below-header-wrap').css('border-bottom', currentBorderSize + 'px solid ' + newColor);
        });
    });    
    
    ////Header Below Row Bottom Border Hover Color
    api( 'responsive_header_below_row_bottom_border_hover_color', function( value ) {
        value.bind( function( newColor ) {
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size').get() || 0;
            const normalColor = api('responsive_header_below_row_bottom_border_color').get();
            $(".responsive-site-below-header-wrap").hover(
                function() {
                    $(this).css('border-bottom', currentBorderSize + 'px solid ' + newColor);
                },
                function() {
                    $(this).css('border-bottom', currentBorderSize + 'px solid ' + normalColor);
                }
            );
        } );
    } );

    api( 'responsive_header_secondary_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.secondary-navigation').css('background-color', newval );
        } );
    } );
    api( 'responsive_header_secondary_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            // $('.secondary-navigation .menu li a').attr('style', 'color: ' + newval + ' !important;');
            $('.secondary-navigation .menu li a').css('color', newval );
            $('.secondary-navigation .res-iconify svg').css('stroke', newval );
            $(".secondary-navigation-wrapper > ul > li a").hover(
                function() {
                    $('.secondary-navigation .menu li a').css("color", api('responsive_header_secondary_menu_link_color').get());
                },
                function() {
                    $('.secondary-navigation .menu li a').css("color", api('responsive_header_secondary_menu_link_color').get());
                }
            );
        } );
    } );
    
    $(".secondary-navigation-wrapper > ul > li").hover(
        function() {
            let selectedHoverStyle = api('responsive_secondary_menu_item_hover_style').get();
            let hoverColor = api('responsive_header_secondary_menu_link_color').get();
            
            $(this).css("color", hoverColor);
            if (selectedHoverStyle === 'underline') {
                $('style#secondary-menu-item-hover-style').remove();
                $('head').append(
                    '<style id="secondary-menu-item-hover-style">' +
                    '.secondary-navigation-wrapper > ul > li::after {' +
                    'display: block;' +
                    'content: "";' +
                    'border-bottom: solid 3px ' + hoverColor + ';' +
                    'transform: scaleX(0);' +
                    'transition: transform 250ms ease-in-out;' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li:hover::after {' +
                    'transform: scaleX(1);' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li::after {' +
                    'transform-origin: 0% 50%;' +
                    '}' +
                    '</style>'
                );
            } else if (selectedHoverStyle === 'overline') {
                $('style#secondary-menu-item-hover-style').remove();
                $('head').append(
                    '<style id="secondary-menu-item-hover-style">' +
                    '.secondary-navigation-wrapper > ul > li::before {' +
                    'display: block;' +
                    'content: "";' +
                    'border-bottom: solid 3px ' + hoverColor + ';' +
                    'transform: scaleX(0);' +
                    'transition: transform 250ms ease-in-out;' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li:hover::before {' +
                    'transform: scaleX(1);' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li::before {' +
                    'transform-origin: 0% 50%;' +
                    '}' +
                    '</style>'
                );
            } else if (selectedHoverStyle === 'zoom') {
                $('style#secondary-menu-item-hover-style').remove();
                $('head').append(
                    '<style id="secondary-menu-item-hover-style">' +
                    '.secondary-navigation-wrapper > ul > li > a:hover {' +
                    'transition: all 0.3s ease-in-out;' +
                    'transform: scale(1.1);' +
                    '}' +
                    '</style>'
                );
            }
        },
        function() {
            $('style#secondary-menu-item-hover-style').remove();
        },
        $(".secondary-navigation-wrapper > ul > li a").hover(
            function() {
                $('.secondary-navigation .menu li a').css("color", api('responsive_header_secondary_menu_link_color').get());
            },
            function() {
                $('.secondary-navigation .menu li a').css("color", api('responsive_header_secondary_menu_link_color').get());
            }
        ),
    );
    api( 'responsive_sticky_header_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-bg-color">'
                + '#masthead.sticky-header, .res-transparent-header #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_site_title_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-site-title-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-site-title-color">'
                + '#masthead.sticky-header .site-title a, .res-transparent-header #masthead.sticky-header .site-title a { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_site_title_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-site-title-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-site-title-hover-color">'
                + '#masthead.sticky-header .site-title a:hover, .res-transparent-header #masthead.sticky-header .site-title a:hover { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_text_color', function( value ) {
        value.bind( function( newval ) {
            // $('#masthead.sticky-header .site-description, .res-transparent-header #masthead.sticky-header .site-description').css('color', newval );
            jQuery('style#responsive-sticky-header-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-text-color">'
                + '#masthead.sticky-header .site-description, .res-transparent-header #masthead.sticky-header .site-description { color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-menu-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-menu-background-color">'
                + '#masthead.sticky-header .main-navigation, .res-transparent-header #masthead.sticky-header .main-navigation, #masthead.sticky-header .main-navigation div, .res-transparent-header #masthead.sticky-header .main-navigation div { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-active-menu-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-active-menu-background-color">'
                + '#masthead.sticky-header .main-navigation .menu .current_page_item > a, #masthead.sticky-header .main-navigation .menu .current-menu-item > a, #masthead.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current_page_item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current-menu-item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu li > a:hover { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-menu-link-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-menu-link-color">'
                + '#masthead.sticky-header .main-navigation .menu > li > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu > li > a { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_menu_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-menu-link-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-menu-link-hover-color">'
                + '#masthead.sticky-header .main-navigation .menu .current_page_item > a, #masthead.sticky-header .main-navigation .menu .current-menu-item > a, #masthead.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current_page_item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current-menu-item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu li > a:hover { color: ' + newval + '!important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-sub-menu-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-sub-menu-bg-color">'
                + '#masthead.sticky-header .main-navigation .children, #masthead.sticky-header .main-navigation .sub-menu, .res-transparent-header #masthead.sticky-header .main-navigation .children,	.res-transparent-header #masthead.sticky-header .main-navigation .sub-menu { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-sub-menu-link-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-sub-menu-link-color">'
                + '#masthead.sticky-header .main-navigation .children li a,	#masthead.sticky-header .main-navigation .sub-menu li a, .res-transparent-header #masthead.sticky-header .main-navigation .children li a, .res-transparent-header #masthead.sticky-header .main-navigation .sub-menu li a { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_sub_menu_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-sub-menu-link-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-sub-menu-link-hover-color">'
                + '#masthead.sticky-header .main-navigation .children li a:hover, #masthead.sticky-header .main-navigation .sub-menu li a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .children li a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .sub-menu li a:hover { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    // primary footer
    api( 'responsive_footer_primary_row_bg_color', function(val){
        val.bind(function(newval){
            $( '.rspv-site-primary-footer-wrap' ).css( 'background-color', newval );
        });
    });
    api( 'responsive_footer_primary_row_border_color', function(val){
        val.bind(function(newval){
            $( '.rspv-site-primary-footer-wrap' ).css( 'border-top', api('responsive_footer_primary_row_top_border_size').get() + 'px solid '+ newval );
        });
    });
    // above footer
    api( 'responsive_footer_above_row_bg_color', function(val){
        val.bind(function(newval){
            $( '.rspv-site-above-footer-wrap' ).css( 'background-color', newval );
        });
    });
    api( 'responsive_footer_above_row_border_color', function(val){
        val.bind(function(newval){
            $( '.rspv-site-above-footer-wrap' ).css( 'border-top', api('responsive_footer_above_row_top_border_size').get() + 'px solid '+ newval );
        });
    });
    // below footer
    api( 'responsive_footer_below_row_bg_color', function(val){
        val.bind(function(newval){
            $( '.rspv-site-below-footer-wrap' ).css( 'background-color', newval );
        });
    });
    api( 'responsive_footer_below_row_border_color', function(val){
        val.bind(function(newval){
            $( '.rspv-site-below-footer-wrap' ).css( 'border-top', api('responsive_footer_below_row_top_border_size').get() + 'px solid '+ newval );
        });
    });

    api( 'responsive_footer_menu_background_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-menu-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color">'
                + '.footer-navigation { background-color: ' + newval + ' }'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_menu_background_hover_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-menu-background-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-hover-color">'
                + '.footer-navigation:hover { background-color: ' + newval + '}'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_copyright_text_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-color">'
                + '.footer-layouts.copyright { color: ' + newval + '}'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_copyright_text_hover_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-hover-color">'
                + '.footer-layouts.copyright:hover { color: ' + newval + '}'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_copyright_links_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-color">'
                + '.footer-layouts.copyright a { color: ' + newval + '!important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_copyright_links_hover_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-hover-color">'
                + '.footer-layouts.copyright a:hover { color: ' + newval + '!important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_cart_count_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-cart-count-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-count-color">'
                + '.responsive-header-cart-total { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_cart_count_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-cart-count-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-count-hover-color">'
                + '.responsive-header-cart-total:hover { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    api('responsive_header_cart_button_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-button-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout),
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(
                `<style id="responsive-header-cart-button-color">${css}</style>`
            );
        });
    });
    api('responsive_header_cart_button_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-button-hover-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover,
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(
                `<style id="responsive-header-cart-button-hover-color">${css}</style>`
            );
        });
    });
    
    api( 'responsive_header_cart_button_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-button-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-button-text-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout), .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_header_cart_button_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-button-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-button-text-hover-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover, .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_header_cart_checkout_button_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-checkout-button-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward,
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-checkout-button-color">${css}</style>`);
        });
    });
    api('responsive_header_cart_checkout_button_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-checkout-button-hover-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover,
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-checkout-button-hover-color">${css}</style>`);
        });
    });
    
    api( 'responsive_header_cart_checkout_button_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-checkout-button-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-checkout-button-text-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward, .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_header_cart_checkout_button_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-checkout-button-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-checkout-button-text-hover-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover, .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    // header cart tray background color
    api('responsive_header_cart_tray_bg_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-bg-color').remove();
            const css = `
                .rspv-header-cart-drawer, .responsive-header-cart .woocommerce.widget_shopping_cart {
                    background-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-bg-color">${css}</style>`);
        });
    });
    // header cart tray background hover color
    api('responsive_header_cart_tray_bg_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-bg-hover-color').remove();
            const css = `
                .rspv-header-cart-drawer:hover, .responsive-header-cart .woocommerce.widget_shopping_cart:hover {
                    background-color: ${color} !important;
                }
                `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-bg-hover-color">${css}</style>`);
        });
    });
    // header cart tray separator color
    api( 'responsive_header_cart_tray_separator_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-tray-separator-color').remove();
            const css = `
               .responsive-header-cart .woocommerce.widget_shopping_cart .woocommerce-mini-cart__total,
			    .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-content .woocommerce-mini-cart__total,
			    .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-header {
                    border-top-color: ${color} !important;
                    border-bottom-color: ${color} !important;
                }
                .responsive-header-cart .widget_shopping_cart .mini_cart_item,
                .rspv-header-cart-drawer .rspv-cart-drawer-content .widget_shopping_cart_content ul li {
                    border-bottom-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-separator-color">${css}</style>`);
        });
    });
    // header cart tray links color
    api('responsive_header_cart_tray_link_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-link-color').remove();
            const css = `
                .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button), .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button) {
                    color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-link-color">${css}</style>`);
        });
    });
    // header cart tray links hover color
    api('responsive_header_cart_tray_link_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-link-hover-color').remove();
            const css = `
                .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button):hover, .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button):hover {
                    color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-link-hover-color">${css}</style>`);
        });
    });
} )( jQuery );
