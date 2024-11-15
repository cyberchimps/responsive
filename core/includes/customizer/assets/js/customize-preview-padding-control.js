/**
 * This file makes customizer preview of padding control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

    function responsive_dynamic_padding(control, selector) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        jQuery( 'style#responsive-'+control+'-padding' ).remove();
        var desktopPadding = 'padding-top:'+ api('responsive_'+control+'_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_'+control+'_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_'+control+'_left_padding').get()+'px; '+'padding-right:'+ api('responsive_'+control+'_right_padding').get()+'px;';
        var tabletPadding = 'padding-top:'+ api('responsive_'+control+'_tablet_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_'+control+'_tablet_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_'+control+'_tablet_left_padding').get()+'px; '+'padding-right:'+ api('responsive_'+control+'_tablet_right_padding').get()+'px;';
        var mobilePadding = 'padding-top:'+ api('responsive_'+control+'_mobile_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_'+control+'_mobile_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_'+control+'_mobile_left_padding').get()+'px; '+'padding-right:'+ api('responsive_'+control+'_mobile_right_padding').get()+'px;';
        jQuery( 'head' ).append(
            '<style id="responsive-'+control+'-padding">'
            + selector + '	{ ' + desktopPadding +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector + '	{ ' + tabletPadding + ' } }'
            + '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
            + '</style>'
        );

    }

    function responsive_dynamic_margin(control, selector) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        jQuery( 'style#responsive-'+control+'-margin' ).remove();
        var desktopMargin = 'margin-top:'+ api('responsive_'+control+'_top_padding').get()+'px; '+'margin-bottom:'+ api('responsive_'+control+'_bottom_padding').get()+'px; '+'margin-left:'+ api('responsive_'+control+'_left_padding').get()+'px; '+'margin-right:'+ api('responsive_'+control+'_right_padding').get()+'px;';
        var tabletMargin = 'margin-top:'+ api('responsive_'+control+'_tablet_top_padding').get()+'px; '+'margin-bottom:'+ api('responsive_'+control+'_tablet_bottom_padding').get()+'px; '+'margin-left:'+ api('responsive_'+control+'_tablet_left_padding').get()+'px; '+'margin-right:'+ api('responsive_'+control+'_tablet_right_padding').get()+'px;';
        var mobileMargin = 'margin-top:'+ api('responsive_'+control+'_mobile_top_padding').get()+'px; '+'margin-bottom:'+ api('responsive_'+control+'_mobile_bottom_padding').get()+'px; '+'margin-left:'+ api('responsive_'+control+'_mobile_left_padding').get()+'px; '+'margin-right:'+ api('responsive_'+control+'_mobile_right_padding').get()+'px;';
        jQuery( 'head' ).append(
            '<style id="responsive-'+control+'-margin">'
            + selector + '	{ ' + desktopMargin +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector + '	{ ' + tabletMargin + ' } }'
            + '@media (max-width: 544px) {' + selector + '	{ ' + mobileMargin + ' } }'
            + '</style>'
        );

    }

    function responsive_dynamic_box_padding( ) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        var style = '<style id="responsive-box-padding">';

        var selector = '.responsive-site-style-content-boxed .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .hentry,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.page.front-page.responsive-site-style-flat .widget-wrapper,.blog.front-page.responsive-site-style-flat .widget-wrapper,.responsive-site-style-boxed .widget-wrapper,.responsive-site-style-boxed .site-content article.product'
        +',.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,.woocommerce.responsive-site-style-content-boxed .products-wrapper,.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce.responsive-site-style-boxed ul.products li.product,.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,.woocommerce.single-product:not(.responsive-site-style-flat) div.product';
        var extraSelector = ',.page-template-gutenberg-fullwidth.responsive-site-style-content-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map),.page-template-gutenberg-fullwidth.responsive-site-style-boxed .hentry .post-entry > div:not(.wp-block-cover):not(.wp-block-coblocks-map)';
        var topBlogSelector = '.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var topSingleBlogSelector = '.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var topPageSelector = '.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var leftRightBlogSelector = '.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,.search.responsive-site-style-content-boxed .hentry .thumbnail,.search.responsive-site-style-boxed .hentry .thumbnail,.archive.responsive-site-style-content-boxed .hentry .thumbnail,.archive.responsive-site-style-boxed .hentry .thumbnail,.blog.responsive-site-style-content-boxed .hentry .thumbnail,.blog.responsive-site-style-boxed .hentry .thumbnail';
        var leftRightSingleBlogSelector = '.single.responsive-site-style-content-boxed .hentry .thumbnail,.single.responsive-site-style-boxed .hentry .thumbnail';
        var leftRightPageSelector = '.page.responsive-site-style-content-boxed .hentry .thumbnail,.page.responsive-site-style-boxed .hentry .thumbnail';


        var desktopTopMargin = 'margin-top: -'+ api('responsive_box_top_padding').get()+'px;';
        var tabletTopMargin = 'margin-top: -'+ api('responsive_box_tablet_top_padding').get()+'px;';
        var mobileTopMargin = 'margin-top: -'+ api('responsive_box_mobile_top_padding').get()+'px;';
        var desktopLeftRightMargin = 'margin-left: -'+ api('responsive_box_left_padding').get()+'px; margin-right: -'+ api('responsive_box_right_padding').get() +'px';
        var tabletLeftRightMargin = 'margin-left: -'+ api('responsive_box_tablet_left_padding').get()+'px; margin-right: -'+ api('responsive_box_tablet_right_padding').get() +'px';
        var mobileLeftRightMargin = 'margin-left: -'+ api('responsive_box_mobile_left_padding').get()+'px; margin-right: -'+ api('responsive_box_mobile_right_padding').get() +'px';
        if('stretched' === api( 'responsive_blog_entry_featured_image_style' ).get()) {
            style += topBlogSelector + '{ ' + desktopTopMargin + ' }'
                + leftRightBlogSelector + '{ ' + desktopLeftRightMargin + ' }'
                + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
                + topBlogSelector + '	{ ' + tabletTopMargin + ' }' +
                + leftRightBlogSelector + '{ ' + tabletLeftRightMargin + ' }' +
                ' }'+
                '@media (max-width: 544px) {'
                + topBlogSelector + '	{ ' + mobileTopMargin + ' }' +
                + leftRightBlogSelector + '{ ' + mobileLeftRightMargin +' }' +
                ' }';
        }

        if('stretched' === api( 'responsive_single_blog_featured_image_style' ).get()) {
            style += topSingleBlogSelector + '{ ' + desktopTopMargin + ' }'
                + leftRightSingleBlogSelector + '{ ' + desktopLeftRightMargin + ' }'
                + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
                + topSingleBlogSelector + '	{ ' + tabletTopMargin + ' }' +
                + leftRightSingleBlogSelector + '{ ' + tabletLeftRightMargin + ' }' +
                ' }'+
                '@media (max-width: 544px) {'
                + topSingleBlogSelector + '	{ ' + mobileTopMargin + ' }' +
                + leftRightSingleBlogSelector + '{ ' + mobileLeftRightMargin +' }' +
                ' }';
        }

        if('stretched' === api( 'responsive_page_featured_image_style' ).get()) {
            style += topPageSelector + '{ ' + desktopTopMargin + ' }'
                + leftRightPageSelector + '{ ' + desktopLeftRightMargin + ' }'
                + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
                + topPageSelector + '	{ ' + tabletTopMargin + ' }' +
                + leftRightPageSelector + '{ ' + tabletLeftRightMargin + ' }' +
                ' }'+
                '@media (max-width: 544px) {'
                + topPageSelector + '	{ ' + mobileTopMargin + ' }' +
                + leftRightPageSelector + '{ ' + mobileLeftRightMargin +' }' +
                ' }';
        }


        jQuery( 'style#responsive-box-padding' ).remove();
        var desktopPadding = 'padding-top:'+ api('responsive_box_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_box_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_box_left_padding').get()+'px; '+'padding-right:'+ api('responsive_box_right_padding').get()+'px;';
        var tabletPadding = 'padding-top:'+ api('responsive_box_tablet_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_box_tablet_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_box_tablet_left_padding').get()+'px; '+'padding-right:'+ api('responsive_box_tablet_right_padding').get()+'px;';
        var mobilePadding = 'padding-top:'+ api('responsive_box_mobile_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_box_mobile_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_box_mobile_left_padding').get()+'px; '+'padding-right:'+ api('responsive_box_mobile_right_padding').get()+'px;';
        style += selector + '	{ ' + desktopPadding +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector+ extraSelector + '	{ ' + tabletPadding + ' } }'
            + '@media (max-width: 544px) {' + selector + extraSelector + '	{ ' + mobilePadding + ' } }'
            + '</style>';
        jQuery( 'head' ).append(
            style
        );

    }


    // Header Layout
    // Logo Padding
    api( 'responsive_header_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );
    api( 'responsive_header_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );
    api( 'responsive_header_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );
    api( 'responsive_header_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );

    api( 'responsive_header_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header', '.site-branding-wrapper');
        } );
    } );
    //Theme Options Layout
    //Box Padding
    api( 'responsive_box_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );

    //Box Tablet Padding
    api( 'responsive_box_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );

    //Box Mobile Padding
    api( 'responsive_box_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );
    api( 'responsive_box_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_box_padding( );
        } );
    } );

    // Buttons Padding
    api( 'responsive_buttons_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );

    // Buttons Tablet Padding
    api( 'responsive_buttons_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button, .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button, wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );

    // Buttons Mobile Padding
    api( 'responsive_buttons_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );

    // Inputs Padding
    api( 'responsive_inputs_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_right_padding', function( value ) {
        value.bind( function( newval ) {

            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );

        } );
    } );

    // Inputs Tablet Padding
    api( 'responsive_inputs_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {

            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );

        } );
    } );

    // Inputs Mobile Padding
    api( 'responsive_inputs_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {

            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],body div.wpforms-container-full .wpforms-form input[type=date],body div.wpforms-container-full .wpforms-form input[type=datetime],body div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],body div.wpforms-container-full .wpforms-form input[type=month],body div.wpforms-container-full .wpforms-form input[type=number],body div.wpforms-container-full .wpforms-form input[type=password],body div.wpforms-container-full .wpforms-form input[type=range],body div.wpforms-container-full .wpforms-form input[type=search],body div.wpforms-container-full .wpforms-form input[type=tel],body div.wpforms-container-full .wpforms-form input[type=text],body div.wpforms-container-full .wpforms-form input[type=time],body div.wpforms-container-full .wpforms-form input[type=url],body div.wpforms-container-full .wpforms-form input[type=week],body div.wpforms-container-full .wpforms-form select,body div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );

        } );
    } );

    // Footer Widgets Padding
    api( 'responsive_footer_widgets_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );

    // Footer Widgets Tablet Padding
    api( 'responsive_footer_widgets_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );

    // Footer Widgets Mobile Padding
    api( 'responsive_footer_widgets_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );
    api( 'responsive_footer_widgets_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_widgets', '.footer-widgets');
        } );
    } );

    // Footer Bar Padding
    api( 'responsive_footer_bar_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );

    // Footer Bar Tablet Padding
    api( 'responsive_footer_bar_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );

    // Footer Bar Mobile Padding
    api( 'responsive_footer_bar_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );
    api( 'responsive_footer_bar_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('footer_bar', '.footer-bar');
        } );
    } );

    // Transparent site content Padding
    api( 'responsive_site_content_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );

    api( 'responsive_site_content_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );

    api( 'responsive_site_content_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );
    api( 'responsive_site_content_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('site_content', '.res-transparent-header .site-content');
        } );
    } );

    // Content Header Padding
    api( 'responsive_content_header_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );
    api( 'responsive_content_header_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );
    api( 'responsive_content_header_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );
    api( 'responsive_content_header_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    api( 'responsive_content_header_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('content_header', '.site-content-header');
        } );
    } );

    function responsive_dynamic_border(control, selector) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        jQuery( 'style#responsive-'+control+'-border' ).remove();
        var desktopBorder = 'border-top-width:'+ api('responsive_'+control+'_top_padding').get()+'px; '+'border-bottom-width:'+ api('responsive_'+control+'_bottom_padding').get()+'px; '+'border-left-width:'+ api('responsive_'+control+'_left_padding').get()+'px; '+'border-right-width:'+ api('responsive_'+control+'_right_padding').get()+'px;';
        var tabletBorder = 'border-top-width:'+ api('responsive_'+control+'_tablet_top_padding').get()+'px; '+'border-bottom-width:'+ api('responsive_'+control+'_tablet_bottom_padding').get()+'px; '+'border-left-width:'+ api('responsive_'+control+'_tablet_left_padding').get()+'px; '+'border-right-width:'+ api('responsive_'+control+'_tablet_right_padding').get()+'px;';
        var mobileBorder = 'border-top-width:'+ api('responsive_'+control+'_mobile_top_padding').get()+'px; '+'border-bottom-width:'+ api('responsive_'+control+'_mobile_bottom_padding').get()+'px; '+'border-left-width:'+ api('responsive_'+control+'_mobile_left_padding').get()+'px; '+'border-right-width:'+ api('responsive_'+control+'_mobile_right_padding').get()+'px;';
        jQuery( 'head' ).append(
            '<style id="responsive-'+control+'-border">'
            + selector + '	{ ' + desktopBorder +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector + '	{ ' + tabletBorder + ' } }'
            + '@media (max-width: 544px) {' + selector + '	{ ' + mobileBorder + ' } }'
            + '</style>'
        );

    }

    // Sub Menu Border
    api( 'responsive_sub_menu_border_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );
    api( 'responsive_sub_menu_border_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );
    api( 'responsive_sub_menu_border_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );
    api( 'responsive_sub_menu_border_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    api( 'responsive_sub_menu_border_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_border('sub_menu_border', '.main-navigation .children, .main-navigation .sub-menu');
        } );
    } );

    // Sidebar Outside Padding
    api( 'responsive_sidebar_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );
    api( 'responsive_sidebar_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );
    api( 'responsive_sidebar_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );
    api( 'responsive_sidebar_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', '#secondary.widget-area');
        } );
    } );

    // Sidebar Inside Padding
    api( 'responsive_sidebar_inside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );
    api( 'responsive_sidebar_inside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );
    api( 'responsive_sidebar_inside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );
    api( 'responsive_sidebar_inside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', '#secondary.widget-area .widget-wrapper');
        } );
    } );

    // Container Outside Padding
    api( 'responsive_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
        } );
    } );

    // Container Inside Padding
    api( 'responsive_blog_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_blog_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_blog_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_blog_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_blog_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    //product card padding
    api( 'responsive_product_card_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );

//product card padding -Tablet
api( 'responsive_product_card_outside_container_tablet_top_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_outside_container_tablet_left_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_outside_container_tablet_right_padding', function( value ) {
    value.bind( function( newval ) {_mobile
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_outside_container_tablet_bottom_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );

    //product card padding-Mobile
    api( 'responsive_product_card_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );

    //product card Margin
    api( 'responsive_product_card_inside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_inside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_inside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_inside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
        } );
    } );

    
//product card Margin -Tablet
api( 'responsive_product_card_inside_container_tablet_top_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_tablet_left_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_tablet_right_padding', function( value ) {
    value.bind( function( newval ) {_mobile
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_tablet_bottom_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );

//product card Margin-Mobile
api( 'responsive_product_card_inside_container_mobile_top_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_mobile_left_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_mobile_right_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_mobile_bottom_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce.responsive-site-style-boxed ul.products li.product');
    } );
} );


    //Blog Inside Padding
    api( 'responsive_blog_inside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );
    api( 'responsive_blog_inside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );
    api( 'responsive_blog_inside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );
    api( 'responsive_blog_inside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_blog_inside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    // Single Blog Outside Padding
    api( 'responsive_single_blog_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_single_blog_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_single_blog_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );
    api( 'responsive_single_blog_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    api( 'responsive_single_blog_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
        } );
    } );

    // Single Blog Inside Padding
    api( 'responsive_single_blog_inside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );
    api( 'responsive_single_blog_inside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );
    api( 'responsive_single_blog_inside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );
    api( 'responsive_single_blog_inside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    api( 'responsive_single_blog_inside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry');
        } );
    } );

    // Header Above Row Padding
    api( 'responsive_header_above_row_padding_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );
    api( 'responsive_header_above_row_padding_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );
    api( 'responsive_header_above_row_padding_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );
    api( 'responsive_header_above_row_padding_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-header-wrap');
        } );
    } );
    // Header Above Row Margin
    api( 'responsive_header_above_row_margin_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );
    api( 'responsive_header_above_row_margin_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );
    api( 'responsive_header_above_row_margin_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );
    api( 'responsive_header_above_row_margin_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-header-wrap');
        } );
    } );

    // Header Primary Row Padding
    api( 'responsive_header_primary_row_padding_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );
    api( 'responsive_header_primary_row_padding_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );
    api( 'responsive_header_primary_row_padding_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );
    api( 'responsive_header_primary_row_padding_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-header-wrap');
        } );
    } );
    // Header Primary Row Margin
    api( 'responsive_header_primary_row_margin_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );
    api( 'responsive_header_primary_row_margin_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );
    api( 'responsive_header_primary_row_margin_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );
    api( 'responsive_header_primary_row_margin_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-header-wrap');
        } );
    } );

    // Header Below Row Padding
    api( 'responsive_header_below_row_padding_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );
    api( 'responsive_header_below_row_padding_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );
    api( 'responsive_header_below_row_padding_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );
    api( 'responsive_header_below_row_padding_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-header-wrap');
        } );
    } );
    // Header Below Row Margin
    api( 'responsive_header_below_row_margin_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );
    api( 'responsive_header_below_row_margin_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );
    api( 'responsive_header_below_row_margin_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );
    api( 'responsive_header_below_row_margin_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-header-wrap');
        } );
    } );

} )( jQuery );
