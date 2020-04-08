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
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    // document.body.style.backgroundColor = "yellow";
                    $('.search:not(.woocommerce) .content-area,.archive:not(.woocommerce) .content-area,.blog:not(.woocommerce):not(.custom-home-page-active) .content-area').css('width', newval+'%' );
                    $('.search:not(.woocommerce) aside.widget-area,.archive:not(.woocommerce) aside.widget-area,.blog:not(.woocommerce):not(.custom-home-page-active) aside.widget-area').css('width', 'calc(100% -' + newval + '%)' );
                }
            }

            var x = window.matchMedia("(min-width:992px)")
            isDesktop(x) // Call listener function at run time

            x.addListener(isDesktop)
        } );
    } );

    //Blog Post Layout
    //Main Content Width
    api( 'responsive_single_blog_content_width', function( value ) {
        value.bind( function( newval ) {
            function isDesktop(x) {
                if (x.matches) { // If media query matches
                    // document.body.style.backgroundColor = "yellow";
                    $('.single:not(.woocommerce) .content-area').css('width', newval+'%' );
                    $('.single:not(.woocommerce) aside.widget-area').css('width', 'calc(100% -' + newval + '%)' );
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
                    $('.page:not(.page-template-gutenberg-fullwidth):not(.page-template-full-width-page):not(.woocommerce):not(.woocommerce-cart):not(.woocommerce-checkout):not(.front-page) .content-area ').css('width', newval+'%' );
                    $('.page:not(.woocommerce) aside.widget-area:not(.home-widgets)').css('width', 'calc(100% -' + newval + '%)' );
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
                    $('.single-product.woocommerce aside.widget-area,.single-product.woocommerce aside.widget-area').css('width', 'calc(100% -' + newval + '%)' );
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
                    $('.search.woocommerce aside.widget-area,.archive.woocommerce aside.widget-area').css('width', 'calc(100% -' + newval + '%)' );
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

} )( jQuery );