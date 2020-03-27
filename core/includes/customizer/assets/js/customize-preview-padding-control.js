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
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );

    // Buttons Tablet Padding
    api( 'responsive_buttons_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );

    // Buttons Mobile Padding
    api( 'responsive_buttons_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
            responsive_dynamic_padding('buttons', selector );
        } );
    } );

    // Inputs Padding
    api( 'responsive_inputs_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_right_padding', function( value ) {
        value.bind( function( newval ) {

            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );

        } );
    } );

    // Inputs Tablet Padding
    api( 'responsive_inputs_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {

            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );

        } );
    } );

    // Inputs Mobile Padding
    api( 'responsive_inputs_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
            selector += ',#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
            responsive_dynamic_padding('inputs', selector );
        } );
    } );
    api( 'responsive_inputs_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {

            var selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
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

} )( jQuery );
