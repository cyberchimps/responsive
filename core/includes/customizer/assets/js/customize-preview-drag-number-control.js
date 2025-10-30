/**
 * This file makes customizer preview of responsive_drag_number_control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;
    var mobile_menu_breakpoint;
    var disable_mobile_menu_flag;

    //Theme Options Layout
    //Box Radius
    api( 'responsive_container_width', function( value ) {
        value.bind( function( newval ) {
            $('.container,[class*=\'__inner-container\'],.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper').css('max-width', newval+'px' );
            if ( $(window).width() > 769 ) {
                $( '.floatingb-container' ).css( 'width', newval+'px' );
            } else {
                $( '.floatingb-container' ).css( 'width', '100%' );    
            }
            
        } );
    } );
    //Logo Width
    api( 'responsive_logo_width', function( value ) {
        value.bind( function( newval ) {
            if( newval.length !== 0 ){
                $('.site-header .custom-logo').css('width', newval+'px' );         
            }
            else{
                $('.site-header .custom-logo').css('width', '100%' ); 
            }
        } );
    } );

    api('responsive_logo_width_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-logo-width-tablet').remove();

            var widthValue = (newval.length !== 0) ? (newval + 'px') : '100%';

            jQuery('head').append(
                '<style id="responsive-logo-width-tablet">' +
                    '@media (max-width: 992px) {' +
                        '.site-header .custom-logo { width: ' + widthValue + ' !important; }' +
                    '}' +
                '</style>'
            );
        });
    });

    api('responsive_logo_width_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-logo-width-mobile').remove();

            var widthValue = (newval.length !== 0) ? (newval + 'px') : '100%';

            jQuery('head').append(
                '<style id="responsive-logo-width-mobile">' +
                    '@media screen and (max-width: 576px) {' +
                        '.site-header .custom-logo { width: ' + widthValue + ' !important; }' +
                    '}' +
                '</style>'
            );
        });
    });

    // Page Sidebar width
    api('responsive_page_sidebar_width', function(value) {
        value.bind(function(newval) {
            api('responsive_page_sidebar_position', function(posSetting) {
                if (posSetting.get() === 'default') {
                    return;
                }

                function isDesktop(x) {
                    if (x.matches) {
                        if ($('.page #secondary').length > 0) {
                            $('.page aside.widget-area:not(.home-widgets)#secondary').css('width', newval + '%');
                            $('.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) #primary.content-area').css('width', (100 - newval) + '%');
                        }
                    } else {
                        $('.page aside.widget-area:not(.home-widgets)#secondary').css('width', '100%');
                        // $('.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) #primary.content-area').css('width', '100%');
                    }
                }

                var x = window.matchMedia("(min-width:992px)");
                isDesktop(x);
                x.addListener(isDesktop);
            });
        });
    });

    // Blog/Archive Sidebar Width
    api('responsive_blog_sidebar_width', function(value) {
    value.bind(function(newval) {
        api('responsive_blog_sidebar_position', function(posSetting) {
            if (posSetting.get() === 'default') {
                return;
            }

            function isDesktop(x) {
                if (x.matches) {
                    if ($('.archive:not(.post-type-archive-product) #secondary').length > 0 || $('.blog:not(.custom-home-page-active) #secondary').length > 0) {
                        $('.archive:not(.post-type-archive-product) aside.widget-area#secondary,.blog:not(.custom-home-page-active) aside.widget-area#secondary').css('width', newval + '%');
                        $('.archive:not(.post-type-archive-product):not(.post-type-archive-course) #primary.content-area,.blog:not(.custom-home-page-active) #primary.content-area').css('width', (100 - newval) + '%');
                    }
                } else {
                    $('.archive:not(.post-type-archive-product):not(.post-type-archive-course) #primary.content-area,.blog:not(.custom-home-page-active) #primary.content-area').css('width', '100%');
                    $('.archive:not(.post-type-archive-product) aside.widget-area#secondary,.blog:not(.custom-home-page-active) aside.widget-area#secondary').css('width', '100%');
                }
            }

            var x = window.matchMedia("(min-width:992px)");
            isDesktop(x);
            x.addListener(isDesktop);
            });
        });
    });

    // Single Post Sidebar width
    api('responsive_single_blog_sidebar_width', function(value) {
    value.bind(function(newval) {
        api('responsive_single_blog_sidebar_position', function(posSetting) {
            if (posSetting.get() === 'default') {
                return; 
            }

            function isDesktop(x) {
                if (x.matches) {
                    if ($('.single:not(.single-product) #secondary').length > 0) {
                        if ($(window).width() > 992) {
                            $('.single:not(.single-product) aside.widget-area#secondary').css('width', newval + '%');
                            $('.single:not(.single-product) #primary.content-area').css('width', (100 - newval) + '%');
                        }
                    }
                } else {
                    $('.single:not(.single-product) aside.widget-area#secondary').css('width', '100%');
                    // $('.single:not(.single-product) #primary.content-area').css('width', '100%');
                }
            }

            var x = window.matchMedia("(min-width:992px)");
            isDesktop(x);
            x.addListener(isDesktop);
            });
        });
    });


     var globalSidebarWidth = 30; 

    api('responsive_default_sidebar_width', function(setting) {
        globalSidebarWidth = parseInt(setting.get()) || 30;

        setting.bind(function(newval) {
            globalSidebarWidth = parseInt(newval) || 30;

            ['page', 'blog', 'single_blog'].forEach(function(type) {
                var posSettingId = 'responsive_' + type + '_sidebar_position';
                api(posSettingId, function(posSetting) {
                    if (posSetting.get() === 'default') {
                        applySidebarWidth(sidebarContexts[type], globalSidebarWidth);
                    }
                });
            });
        });
    });

    function applySidebarWidth(context, width) {
        var isDesktop = window.matchMedia("(min-width:992px)").matches;

        if (!isDesktop) {
            $(context.sidebar).css('width', '100%');
            $(context.content).css('width', '100%');
            return;
        }

        if ($(context.sidebar).length > 0) {
            $(context.sidebar).css('width', width + '%');
            $(context.content).css('width', (100 - width) + '%');
        }
    }

    var sidebarContexts = {
        page: {
            sidebar: '.page aside.widget-area:not(.home-widgets)#secondary',
            content: '.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) #primary.content-area'
        },
        blog: {
            sidebar: '.archive:not(.post-type-archive-product) aside.widget-area#secondary,.blog:not(.custom-home-page-active) aside.widget-area#secondary',
            content: '.archive:not(.post-type-archive-product):not(.post-type-archive-course) #primary.content-area,.blog:not(.custom-home-page-active) #primary.content-area'
        },
        single_blog: {
            sidebar: '.single:not(.single-product) aside.widget-area#secondary',
            content: '.single:not(.single-product) #primary.content-area'
        }
    };

    var mq = window.matchMedia("(min-width:992px)");
    function refreshAllSidebars() {
        Object.keys(sidebarContexts).forEach(function(type) {
            var posSettingId = 'responsive_' + type + '_sidebar_position';
            api(posSettingId, function(posSetting) {
                var width = (posSetting.get() === 'default') ? globalSidebarWidth : parseInt(api('responsive_' + type + '_sidebar_width').get()) || globalSidebarWidth;
                applySidebarWidth(sidebarContexts[type], width);
            });
        });
    }

    mq.addListener(refreshAllSidebars);
    refreshAllSidebars(); 
    
    Object.keys(sidebarContexts).forEach(function(type) {
        var posSettingId = 'responsive_' + type + '_sidebar_position';
        api(posSettingId, function(posSetting) {
            posSetting.bind(function(newval) {
                if (newval === 'default') {
                    applySidebarWidth(sidebarContexts[type], globalSidebarWidth);
                }
            });
        });
    });

    // WooCommerce Shop Sidebar Width
    api('responsive_shop_sidebar_width', function(value) {

        value.bind(function(newval) {

            function applySidebarWidth(x) {
                if (x.matches) {
                    // Desktop: apply new widths
                        $('.shop-has-site-header aside.widget-area#secondary')
                            .css('width', newval + '%');

                        $('.shop-has-site-header #primary.content-area')
                            .css('width', (100 - newval) + '%');
                } else {
                    // Mobile/tablet: reset to full width
                    $('.shop-has-site-header aside.widget-area#secondary')
                        .css('width', '100%');

                    $('.shop-has-site-header #primary.content-area')
                        .css('width', '100%');
                }
            }

            var mediaQuery = window.matchMedia("(min-width:992px)");
            applySidebarWidth(mediaQuery);
            mediaQuery.addListener(applySidebarWidth);
        });
    });


    // Single Product Sidebar Width
    api('responsive_single_product_sidebar_width', function(value) {
        value.bind(function(newval) {
            function applySidebarWidth(x) {
                if (x.matches) {
                    // Desktop: apply new widths
                        $('.single-product-has-site-header.woocommerce aside.widget-area#secondary')
                            .css('width', newval + '%');

                        $('.single-product-has-site-header.woocommerce #primary.content-area')
                            .css('width', (100 - newval) + '%');
                } else {
                    // Mobile/tablet: reset to full width
                    $('.single-product-has-site-header aside.widget-area#secondary')
                        .css('width', '100%');

                    $('.single-product-has-site-header #primary.content-area')
                        .css('width', '100%');
                }
            }

            var mediaQuery = window.matchMedia("(min-width:992px)");
            applySidebarWidth(mediaQuery);
            mediaQuery.addListener(applySidebarWidth);
        });
    });


    api( 'responsive_width', function( value ) {
      value.bind( function( newval ) {
        if(newval !== "contained")
          $('.container,[class*=\'__inner-container\'],.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper').css('max-width', 'none' );
        else
          $('.container,[class*=\'__inner-container\'],.site-header-full-width-main-navigation:not(.responsive-site-full-width) .main-navigation-wrapper').css('max-width', api( 'responsive_container_width' ).get()+'px' );
      } );
    } );

    //Footer Layout -> Footer Widgets
    //Number Of Columns
    api(
        "responsive_footer_widgets_columns",
        function( $swipe ) {

            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('footer-widgets-columns-');
                    jQuery( 'body' ).addClass( "footer-widgets-columns-"+ newval );


                }
            );
        }
    );

    //Blog Layout
    //Main Content Width
    api( 'responsive_blog_content_width', function( value ) {
        value.bind( function( newval ) {
            if( api('responsive_blog_sidebar_position').get() === 'no' ) {
                function isDesktop(x) {
                    if (x.matches) { // If media query matches
                        // document.body.style.backgroundColor = "yellow";
                        $('.search:not(.post-type-archive-product) .content-area,.archive:not(.post-type-archive-product):not(.post-type-archive-course) .content-area,.blog:not(.custom-home-page-active) .content-area').css('width', newval+'%' );
                        $('.search:not(.post-type-archive-product) aside.widget-area,.archive:not(.post-type-archive-product) aside.widget-area,.blog:not(.custom-home-page-active) aside.widget-area').css('width',  ( 100 - newval ) + '%' );
                    }
                }
    
                var x = window.matchMedia("(min-width:992px)")
                isDesktop(x) // Call listener function at run time
    
                x.addListener(isDesktop)
            }
        } );
    } );

    //Blog Post Layout
    //Main Content Width
    api( 'responsive_single_blog_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    // document.body.style.backgroundColor = "yellow";
                    $('.single:not(.single-product) .content-area').css('width', newval+'%' );
                    $('.single:not(.single-product) aside.widget-area').css('width',( 100 - newval ) + '%' );
                }
            }
            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time
            x.addListener(isDesktop)
        } );
    } );

    //Page Layout
    //Main Content Width
    api( 'responsive_page_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    $('.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) .content-area ').css('width', newval+'%' );
                    $('.page aside.widget-area:not(.home-widgets)').css('width', ( 100 - newval ) + '%' );
                }
            }
            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time
            x.addListener(isDesktop)
        } );
    } );

    //Main Menu Layout
    //Enable Mobile Menu
    api( 'responsive_disable_mobile_menu', function( setting ) {
        disable_mobile_menu_flag = setting.get();
        setting.bind( function (newval) {
            disable_mobile_menu_flag = newval;
            if( 0 == newval) {
                mobile_menu_breakpoint = 0;
            } else {
                mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
            }
        })
    });

    //Mobile Menu Breakpoint
    api( 'responsive_mobile_menu_breakpoint', function( setting ) {
        mobile_menu_breakpoint = setting.get();
        if( 0 == disable_mobile_menu_flag) {
            mobile_menu_breakpoint = 0;
        }
        setting.bind( function (newval) {
            mobile_menu_breakpoint = newval;
            if( 0 == disable_mobile_menu_flag) {
                mobile_menu_breakpoint = 0;
            }
        })
        // ...
    });

    //Hamburger Menu Font Size Preview
    api( 'responsive_hamburger_menu_label_font_size', function( value ) {
        value.bind( function( newval ) {
            $( '.hamburger-menu-label' ).css( 'font-size', newval+'px' );
        } );
    } );

    //Woocommerce Cart Layout
    //Main Content Width
    api( 'responsive_cart_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    $('.page.woocommerce-cart .content-area').css('width', newval+'%' );
                }
            }
            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time
            x.addListener(isDesktop)
        } );
    } );

    //Woocommerce Checkout
    //Main Content Width
    api( 'responsive_checkout_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    $('.page.woocommerce-checkout .content-area').css('width', newval+'%' );
                }
            }
            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time
            x.addListener(isDesktop)
        } );
    } );

    //Product Options Layout
    //Main Content Width
    api( 'responsive_single_product_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    $('.single-product.woocommerce .content-area,.single-product.woocommerce .content-area').css('width', newval+'%' );
                    $('.single-product.woocommerce aside.widget-area,.single-product.woocommerce aside.widget-area').css('width', ( 100 - newval ) + '%' );
                }
            }
            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time
            x.addListener(isDesktop)
        } );
    } );

    //Product Catalog Options Layout
    //Main Content Width
    api( 'responsive_shop_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    $('.search.woocommerce .content-area,.archive.woocommerce .content-area').css('width', newval+'%' );
                    $('.search.woocommerce aside.widget-area,.archive.woocommerce aside.widget-area').css('width', ( 100 - newval ) + '%' );
                }
            }
            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time
            x.addListener(isDesktop)
        } );
    } );

    //Scroll To Top
    //Icon Size
    api( 'responsive_scroll_to_top_icon_size', function( value ) {
        value.bind( function( newval ) {
            $('#scroll').css('height', newval+'px' );
            $('#scroll').css('width', newval+'px' );
        } );
    } );

    //Border Radius
    api( 'responsive_scroll_to_top_icon_radius', function( value ) {
        value.bind( function( newval ) {
            $('#scroll').css('border-radius', newval+'%' );
        } );
    } );

    api( 'responsive_paragraph_margin_bottom', function( value ) {
        value.bind( function( newval ) {
            $('p, .entry-content p').css('margin-bottom', newval+'em' );
        } );
    } );

    // Header -> Main Navigation
    // Main Menu Item Offset
    api( 'responsive_sub_menu_container_top_offset', function( value ) {
        value.bind( function( newval ) {
            var mobileMenuBreakpointValue = api( 'responsive_mobile_menu_breakpoint' ).get();
            if ( $(window).width() > mobileMenuBreakpointValue ) {
                jQuery( 'style#responsive-sub-menu-container-top-offset' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-sub-menu-container-top-offset">'
                    + '.main-navigation .menu.nav-menu > .menu-item-has-children:hover > ul::before, .main-navigation .menu.nav-menu > .page_item_has_children:hover > ul::before {position: absolute, content: "", top: 0, left: 0, width: 100%, transform: translateY(-100%), height: '+newval+'}'
                    + '.main-navigation .menu.nav-menu > li:hover > ul, .main-navigation .menu.nav-menu > li.focus > ul {margin-top: '+newval+'px}'
                    + '</style>'
                );
            }
        } );
    } );

	// Header
	// Header Height
	// api( 'responsive_header_height', function( value ) {
	// 	value.bind( function( newval ) {
	// 		var headerHeightHalf = newval / 2;
	// 		var mobileMenuBreakpointValue = api( 'responsive_mobile_menu_breakpoint' ).get();
	// 		$('body:not(.res-transparent-header) .site-header').css({'padding-top':headerHeightHalf+'px', 'padding-bottom':headerHeightHalf+'px'});

	// 		if ( window.matchMedia(`(max-width: ${mobileMenuBreakpointValue}px)`).matches ) {
	// 			$('body.site-header-layout-vertical.site-mobile-header-layout-horizontal:not(.res-transparent-header) .site-header .main-navigation').css('border-top', 0);
	// 		}
	// 	} );
	// } );

	// Header
	// Transparent Header Height
	// api( 'responsive_transparent_header_height', function( value ) {
	// 	value.bind( function( newval ) {
	// 		var transparentHeaderHeightHalf = newval / 2;
	// 		var mobileMenuBreakpointValue = api( 'responsive_mobile_menu_breakpoint' ).get();
	// 		$('body.res-transparent-header .site-header').css({'padding-top':transparentHeaderHeightHalf+'px', 'padding-bottom':transparentHeaderHeightHalf+'px'});

	// 		if ( window.matchMedia(`(max-width: ${mobileMenuBreakpointValue}px)`).matches ) {
	// 			$('body.site-header-layout-vertical.site-mobile-header-layout-horizontal.res-transparent-header .site-header .main-navigation').css('border-top', 0);
	// 		}
	// 	} )
	// } );

	// Header
	// Header Bottom Border
	// api( 'responsive_bottom_border', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.site-header').css('border-bottom-width', newval+'px' );
    //     } );
    // } );

	// Header -> Transparent Header
	// Transparent Header Bottom Border
	api( 'responsive_transparent_bottom_border', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-header').css('border-bottom-width', newval+'px' );
        } );
    } );

    // Above Header Row Height
    api('responsive_header_above_row_height', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-above-row-height-desktop').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-height-desktop">'
                + '.site-above-header-inner-wrap { min-height: ' + newval + 'px; }'
                + '</style>'
            );
        });
    });
    
    api('responsive_header_above_row_height_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-above-row-height-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-height-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.site-above-header-inner-wrap { min-height: ' + newval + 'px; }'
                + '} </style>'
            );
        });
    });
    
    api('responsive_header_above_row_height_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-above-row-height-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-height-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.site-above-header-inner-wrap { min-height: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });

    // Primary Header Row Height
    api('responsive_header_primary_row_height', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-primary-row-height-desktop').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-height-desktop">'
                + '.site-primary-header-inner-wrap { min-height: ' + newval + 'px; }'
                + '</style>'
            );
        });
    });
    
    api('responsive_header_primary_row_height_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-primary-row-height-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-height-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.site-primary-header-inner-wrap { min-height: ' + newval + 'px; }'
                + '} </style>'
            );
        });
    });
    
    api('responsive_header_primary_row_height_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-primary-row-height-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-height-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.site-primary-header-inner-wrap { min-height: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });

    // Below Header Row Height
    api('responsive_header_below_row_height', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-below-row-height-desktop').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-height-desktop">'
                + '.site-below-header-inner-wrap { min-height: ' + newval + 'px; }'
                + '</style>'
            );
        });
    });
    
    api('responsive_header_below_row_height_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-below-row-height-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-height-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.site-below-header-inner-wrap { min-height: ' + newval + 'px; }'
                + '} </style>'
            );
        });
    });
    
    api('responsive_header_below_row_height_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-below-row-height-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-height-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.site-below-header-inner-wrap { min-height: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    
    //Header Above Row Bottom Border Size
    api('responsive_header_above_row_bottom_border_size', function(value) {
        value.bind(function(newval) {
            $('.responsive-site-above-header-wrap').css('border-bottom', newval + 'px solid ' + api('responsive_header_above_row_bottom_border_color').get());
        });
    });

    //Header Primary Row Bottom Border Size
    api('responsive_header_primary_row_bottom_border_size', function(value) {
        value.bind(function(newval) {
            $('.responsive-site-primary-header-wrap').css('border-bottom', newval + 'px solid ' + api('responsive_header_primary_row_bottom_border_color').get());
        });
    });

    //Header Below Row Bottom Border Size
    api('responsive_header_below_row_bottom_border_size', function(value) {
        value.bind(function(newval) {
            $('.responsive-site-below-header-wrap').css('border-bottom', newval + 'px solid ' + api('responsive_header_below_row_bottom_border_color').get());
        });
    });
    // primary footer
    api( 'responsive_footer_primary_height', function(value) {
        value.bind(function(newval) {
            $( '.rspv-site-primary-footer-inner-wrap' ).css( 'min-height', newval + 'px' );
        });
    });
    api( 'responsive_footer_primary_inner_column_spacing', function(value) {
        value.bind(function(newval) {
            $( '.rspv-site-primary-footer-inner-wrap' ).css( 'gap', newval + 'px' );
        });
    });
    api('responsive_footer_primary_inner_column_spacing_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-footer-primary-inner-column-spacing-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-primary-inner-column-spacing-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.rspv-site-primary-footer-inner-wrap { gap: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    
    api('responsive_footer_primary_inner_column_spacing_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-footer-primary-inner-column-spacing-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-primary-inner-column-spacing-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.rspv-site-primary-footer-inner-wrap { gap: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    api( 'responsive_footer_primary_row_top_border_size', function(value){
        value.bind(function(newval) {
           $( '.rspv-site-primary-footer-wrap' ).css( 'border-top', newval + 'px solid '+ api('responsive_footer_primary_row_border_color').get() );
        });
    });
    // above footer
    api( 'responsive_footer_above_height', function(value) {
        value.bind(function(newval) {
            $( '.rspv-site-above-footer-inner-wrap' ).css( 'min-height', newval + 'px' );
        });
    });
    api( 'responsive_footer_above_inner_column_spacing', function(value) {
        value.bind(function(newval) {
            $( '.rspv-site-above-footer-inner-wrap' ).css( 'gap', newval + 'px' );
        });
    });
    api('responsive_footer_above_inner_column_spacing_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-footer-above-inner-column-spacing-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-above-inner-column-spacing-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.rspv-site-above-footer-inner-wrap { gap: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    api('responsive_footer_above_inner_column_spacing_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-footer-above-inner-column-spacing-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-above-inner-column-spacing-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.rspv-site-above-footer-inner-wrap { gap: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    api( 'responsive_footer_above_row_top_border_size', function(value){
        value.bind(function(newval) {
           $( '.rspv-site-above-footer-wrap' ).css( 'border-top', newval + 'px solid '+ api('responsive_footer_above_row_border_color').get() );
        });
    });
    // below footer
    api( 'responsive_footer_below_height', function(value) {
        value.bind(function(newval) {
            $( '.rspv-site-below-footer-inner-wrap' ).css( 'min-height', newval + 'px' );
        });
    });
    api( 'responsive_footer_below_inner_column_spacing', function(value) {
        value.bind(function(newval) {
            $( '.rspv-site-below-footer-inner-wrap' ).css( 'gap', newval + 'px' );
        });
    });
    api('responsive_footer_below_inner_column_spacing_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-footer-below-inner-column-spacing-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-below-inner-column-spacing-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.rspv-site-below-footer-inner-wrap { gap: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    api('responsive_footer_below_inner_column_spacing_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-footer-below-inner-column-spacing-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-below-inner-column-spacing-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.rspv-site-below-footer-inner-wrap { gap: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    api( 'responsive_footer_below_row_top_border_size', function(value){
        value.bind(function(newval) {
           $( '.rspv-site-below-footer-wrap' ).css( 'border-top', newval + 'px solid '+ api('responsive_footer_below_row_border_color').get() );
        });
    });
    api( 'responsive_header_button_border_width', function(value) {
        value.bind(function(newval) {
            let header_button_border_style = api('responsive_header_button_border_style').get();
            if ( 'none' !== header_button_border_style ) {
                $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'border-width', newval + 'px' );
            }
        });
    });
    api( 'responsive_header_social_item_spacing', function(value){
        value.bind(function(newval) {
           $( '.header-layouts.social-icon .social-icons' ).css( 'gap', newval + 'px' );
        });
    });
    api( 'responsive_footer_social_item_spacing', function(value){
        value.bind(function(newval) {
           $( '.footer-layouts.social-icon .social-icons' ).css( 'gap', newval + 'px' );
        });
    });
    api( 'responsive_header_social_item_icon_size', function(value){
        value.bind(function(newval) {
           $( '.header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'font-size', newval + 'px' );
           $( '.header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg' ).css( 'width', newval + 'px' );
           $( '.header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg' ).css( 'height', newval + 'px' );
        });
    });
    api( 'responsive_footer_social_item_icon_size', function(value){
        value.bind(function(newval) {
           $( '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'font-size', newval + 'px' );
           $( '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg' ).css( 'width', newval + 'px' );
           $( '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor .responsive-social-icon-wrapper svg' ).css( 'height', newval + 'px' );
        });
    });
    api( 'responsive_header_social_item_border_width', function(value) {
        value.bind(function(newval) {
            $( '.header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'border-width', newval + 'px' );
        });
    });
    api( 'responsive_footer_social_item_border_width', function(value) {
        value.bind(function(newval) {
            $( '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'border-width', newval + 'px' );
        });
    });
    api( 'responsive_header_contact_info_icon_size', function(value) {
        value.bind(function(newval) {
            $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container' ).css( 'width', (newval * 2.5) + 'px' );
            $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container' ).css( 'height', (newval * 2.5) + 'px' );
            $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg' ).css( 'width', newval + 'px' );
            $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg' ).css( 'height', newval + 'px' );
        });
    });
    api( 'responsive_header_contact_info_item_spacing', function(value) {
        value.bind(function(newval) {
            $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types' ).css( 'gap', newval + 'px' );
        });
    });

    // Header Search Icon Size.
    api('responsive_header_search_icon_size', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-search-icon-size').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-icon-size">'
                + '.responsive-header-search-icon svg { height: ' + newval + 'px; }'
                + '.responsive-header-search-icon svg { width: ' + newval + 'px; }'
                + '.responsive-header-search input[type=search] { height: ' + newval + 'px; }'
                + '</style>'
            );
        });
    });
    
    api('responsive_header_search_icon_size_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-search-icon-size-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-icon-size-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.responsive-header-search-icon svg { height: ' + newval + 'px !important; }'
                + '.responsive-header-search-icon svg { width: ' + newval + 'px !important; }'
                + '.responsive-header-search input[type=search] { height: ' + newval + 'px; }'
                + '} </style>'
            );
        });
    });
    
    api('responsive_header_search_icon_size_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-search-icon-size-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-icon-size-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.responsive-header-search-icon svg { height: ' + newval + 'px !important; }'
                + '.responsive-header-search-icon svg { width: ' + newval + 'px !important; }'
                + '.responsive-header-search input[type=search] { height: ' + newval + 'px; }'
                + '} </style>'
            );
        });
    });
    // Header Search Width.
    api('responsive_header_search_width', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-search-width').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-width">'
                + '.responsive-header-search input[type=search].search-field { width: ' + newval + 'px; }'
                + '</style>'
            );
        });
    });
    
    api('responsive_header_search_width_tablet', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-search-width-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-width-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.responsive-header-search input[type=search].search-field { width: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });
    
    api('responsive_header_search_width_mobile', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-header-search-width-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-width-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.responsive-header-search input[type=search].search-field { width: ' + newval + 'px !important; }'
                + '} </style>'
            );
        });
    });

} )( jQuery );
