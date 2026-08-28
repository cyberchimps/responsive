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
        var style = '<style id="responsive-blog-box-padding">';

        var topBlogSelector = '.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var leftRightBlogSelector = '.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,.search.responsive-site-style-content-boxed .hentry .thumbnail,.search.responsive-site-style-boxed .hentry .thumbnail,.archive.responsive-site-style-content-boxed .hentry .thumbnail,.archive.responsive-site-style-boxed .hentry .thumbnail,.blog.responsive-site-style-content-boxed .hentry .thumbnail,.blog.responsive-site-style-boxed .hentry .thumbnail';
        function formatNegativeMargin(l, r) {
            var css = '';
            if (l !== '' && l !== undefined) css += 'margin-left: -' + l + 'px; ';
            if (r !== '' && r !== undefined) css += 'margin-right: -' + r + 'px; ';
            return css;
        }

        var blogDesktopTopMargin = (api('responsive_blog_inside_container_top_padding').get() !== '') ? 'margin-top: -'+ api('responsive_blog_inside_container_top_padding').get()+'px;' : '';
        var blogTabletTopMargin = (api('responsive_blog_inside_container_tablet_top_padding').get() !== '') ? 'margin-top: -'+ api('responsive_blog_inside_container_tablet_top_padding').get()+'px;' : '';
        var blogMobileTopMargin = (api('responsive_blog_inside_container_mobile_top_padding').get() !== '') ? 'margin-top: -'+ api('responsive_blog_inside_container_mobile_top_padding').get()+'px;' : '';
        
        var blogDesktopLeftRightMargin = formatNegativeMargin(api('responsive_blog_inside_container_left_padding').get(), api('responsive_blog_inside_container_right_padding').get());
        var blogTabletLeftRightMargin = formatNegativeMargin(api('responsive_blog_inside_container_tablet_left_padding').get(), api('responsive_blog_inside_container_tablet_right_padding').get());
        var blogMobileLeftRightMargin = formatNegativeMargin(api('responsive_blog_inside_container_mobile_left_padding').get(), api('responsive_blog_inside_container_mobile_right_padding').get());

        if('stretched' === api( 'responsive_blog_entry_featured_image_style' ).get()) {
            style += topBlogSelector + '{ ' + blogDesktopTopMargin + ' }'
            + leftRightBlogSelector + '{ ' + blogDesktopLeftRightMargin + ' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
            + topBlogSelector + '	{ ' + blogTabletTopMargin + ' }'
            + leftRightBlogSelector + '{ ' + blogTabletLeftRightMargin + ' }'
            + ' }'
            + '@media (max-width: 544px) {'
            + topBlogSelector + '	{ ' + blogMobileTopMargin + ' }'
            + leftRightBlogSelector + '{ ' + blogMobileLeftRightMargin +' }'
            + ' }';
        }
        style += '</style>';

        jQuery( 'style#responsive-blog-box-padding' ).remove();
        jQuery( 'style#responsive-'+control+'-padding' ).remove();
        var desktopPadding = 'padding-top:'+ api('responsive_'+control+'_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_'+control+'_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_'+control+'_left_padding').get()+'px; '+'padding-right:'+ api('responsive_'+control+'_right_padding').get()+'px;';
        var tabletPadding = 'padding-top:'+ api('responsive_'+control+'_tablet_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_'+control+'_tablet_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_'+control+'_tablet_left_padding').get()+'px; '+'padding-right:'+ api('responsive_'+control+'_tablet_right_padding').get()+'px;';
        var mobilePadding = 'padding-top:'+ api('responsive_'+control+'_mobile_top_padding').get()+'px; '+'padding-bottom:'+ api('responsive_'+control+'_mobile_bottom_padding').get()+'px; '+'padding-left:'+ api('responsive_'+control+'_mobile_left_padding').get()+'px; '+'padding-right:'+ api('responsive_'+control+'_mobile_right_padding').get()+'px;';
        jQuery( 'head' ).append(
            style +
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

    function responsive_dynamic_unit_padding(control, selector) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        // fetching global outside container padding values
        let globalOutsideContainerPaddingDesktopTop = api('responsive_outside_container_top_padding').get();
        let globalOutsideContainerPaddingDesktopBottom = api('responsive_outside_container_bottom_padding').get();
        let globalOutsideContainerPaddingDesktopLeft = api('responsive_outside_container_left_padding').get();
        let globalOutsideContainerPaddingDesktopRight = api('responsive_outside_container_right_padding').get();
        let globalOutsideContainerPaddingTabletTop = api('responsive_outside_container_tablet_top_padding').get();
        let globalOutsideContainerPaddingTabletBottom = api('responsive_outside_container_tablet_bottom_padding').get();
        let globalOutsideContainerPaddingTabletLeft = api('responsive_outside_container_tablet_left_padding').get();
        let globalOutsideContainerPaddingTabletRight = api('responsive_outside_container_tablet_right_padding').get();
        let globalOutsideContainerPaddingMobileTop = api('responsive_outside_container_mobile_top_padding').get();
        let globalOutsideContainerPaddingMobileBottom = api('responsive_outside_container_mobile_bottom_padding').get();
        let globalOutsideContainerPaddingMobileLeft = api('responsive_outside_container_mobile_left_padding').get();
        let globalOutsideContainerPaddingMobileRight = api('responsive_outside_container_mobile_right_padding').get();
        // units
        let globalOutsideContainerDesktopUnit = api('responsive_outside_container_desktop_unit') ? api('responsive_outside_container_desktop_unit').get() : 'px';
        let globalOutsideContainerTabletUnit = api('responsive_outside_container_tablet_unit') ? api('responsive_outside_container_tablet_unit').get() : 'px';
        let globalOutsideContainerMobileUnit = api('responsive_outside_container_mobile_unit') ? api('responsive_outside_container_mobile_unit').get() : 'px';
        // individual units
        var desktopUnit = api('responsive_'+control+'_desktop_unit') ? api('responsive_'+control+'_desktop_unit').get() : 'px';
        var tabletUnit = api('responsive_'+control+'_tablet_unit') ? api('responsive_'+control+'_tablet_unit').get() : 'px';
        var mobileUnit = api('responsive_'+control+'_mobile_unit') ? api('responsive_'+control+'_mobile_unit').get() : 'px';

        function formatPadding(t, b, l, r, unit, device) {
            var css = '';

            // pick the right global fallback values/unit for the given device
            var globalTop, globalBottom, globalLeft, globalRight, globalUnit;

            if (device === 'tablet') {
                globalTop    = globalOutsideContainerPaddingTabletTop;
                globalBottom = globalOutsideContainerPaddingTabletBottom;
                globalLeft   = globalOutsideContainerPaddingTabletLeft;
                globalRight  = globalOutsideContainerPaddingTabletRight;
                globalUnit   = globalOutsideContainerTabletUnit;
            } else if (device === 'mobile') {
                globalTop    = globalOutsideContainerPaddingMobileTop;
                globalBottom = globalOutsideContainerPaddingMobileBottom;
                globalLeft   = globalOutsideContainerPaddingMobileLeft;
                globalRight  = globalOutsideContainerPaddingMobileRight;
                globalUnit   = globalOutsideContainerMobileUnit;
            } else {
                // default: desktop
                globalTop    = globalOutsideContainerPaddingDesktopTop;
                globalBottom = globalOutsideContainerPaddingDesktopBottom;
                globalLeft   = globalOutsideContainerPaddingDesktopLeft;
                globalRight  = globalOutsideContainerPaddingDesktopRight;
                globalUnit   = globalOutsideContainerDesktopUnit;
            }

            if (t !== '') 
            {
                css += 'padding-top:' + t + unit + '; ';
            }
            else if(control === 'single_blog_outside_container' || control === 'blog_outside_container' || control === 'blog_outside' || control === 'page_outside_container' || control === 'page_outside')
            {
                css += 'padding-top:' + globalTop + globalUnit + '; ';
            }
            if (b !== '') 
            {
                css += 'padding-bottom:' + b + unit + '; ';
            }
            else if(control === 'single_blog_outside_container' || control === 'blog_outside_container' || control === 'blog_outside' || control === 'page_outside_container' || control === 'page_outside')
            {
                css += 'padding-bottom:' + globalBottom + globalUnit + '; ';
            }
            
            if (l !== '') 
            {
                css += 'padding-left:' + l + unit + '; ';
            }
            else if(control === 'single_blog_outside_container' || control === 'blog_outside_container' || control === 'blog_outside' || control === 'page_outside_container' || control === 'page_outside')
            {
                css += 'padding-left:' + globalLeft + globalUnit + '; ';
            }
            
            if (r !== '') 
            {
                css += 'padding-right:' + r + unit + '; ';
            }
            else if(control === 'single_blog_outside_container' || control === 'blog_outside_container' || control === 'blog_outside' || control === 'page_outside_container' || control === 'page_outside')
            {
                css += 'padding-right:' + globalRight + globalUnit + '; ';
            }
            
            return css;
        }

        jQuery( 'style#responsive-'+control+'-padding' ).remove();
        var desktopPadding = formatPadding(api('responsive_'+control+'_top_padding').get(), api('responsive_'+control+'_bottom_padding').get(), api('responsive_'+control+'_left_padding').get(), api('responsive_'+control+'_right_padding').get(), desktopUnit, 'desktop');
        var tabletPadding = formatPadding(api('responsive_'+control+'_tablet_top_padding').get(), api('responsive_'+control+'_tablet_bottom_padding').get(), api('responsive_'+control+'_tablet_left_padding').get(), api('responsive_'+control+'_tablet_right_padding').get(), tabletUnit, 'tablet');
        var mobilePadding = formatPadding(api('responsive_'+control+'_mobile_top_padding').get(), api('responsive_'+control+'_mobile_bottom_padding').get(), api('responsive_'+control+'_mobile_left_padding').get(), api('responsive_'+control+'_mobile_right_padding').get(), mobileUnit, 'mobile');
        jQuery( 'head' ).append(
            '<style id="responsive-'+control+'-padding">'
            + selector + '	{ ' + desktopPadding +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector + '	{ ' + tabletPadding + ' } }'
            + '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
            + '</style>'
        );
    }

    function responsive_dynamic_unit_margin(control, selector) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        var desktopUnit = api('responsive_'+control+'_desktop_unit') ? api('responsive_'+control+'_desktop_unit').get() : 'px';
        var tabletUnit = api('responsive_'+control+'_tablet_unit') ? api('responsive_'+control+'_tablet_unit').get() : 'px';
        var mobileUnit = api('responsive_'+control+'_mobile_unit') ? api('responsive_'+control+'_mobile_unit').get() : 'px';

        function formatMargin(t, b, l, r, unit) {
            if (t === '' && b === '' && l === '' && r === '') {
                return 'margin: 0 auto;';
            }
            var css = '';
            if (t !== '') css += 'margin-top:' + t + unit + '; ';
            if (b !== '') css += 'margin-bottom:' + b + unit + '; ';
            
            if (l !== '') {
                css += 'margin-left:' + l + unit + '; ';
            } 
            
            if (r !== '') {
                css += 'margin-right:' + r + unit + '; ';
            } 

            var leftVal = (l !== '' ? l + unit : '0px');
            var rightVal = (r !== '' ? r + unit : '0px');
            css += 'width: calc(100% - ' + leftVal + ' - ' + rightVal + '); ';
            
            return css;
        }

        var desktopMargin = formatMargin(api('responsive_'+control+'_top_padding').get(), api('responsive_'+control+'_bottom_padding').get(), api('responsive_'+control+'_left_padding').get(), api('responsive_'+control+'_right_padding').get(), desktopUnit);
        var tabletMargin = formatMargin(api('responsive_'+control+'_tablet_top_padding').get(), api('responsive_'+control+'_tablet_bottom_padding').get(), api('responsive_'+control+'_tablet_left_padding').get(), api('responsive_'+control+'_tablet_right_padding').get(), tabletUnit);
        var mobileMargin = formatMargin(api('responsive_'+control+'_mobile_top_padding').get(), api('responsive_'+control+'_mobile_bottom_padding').get(), api('responsive_'+control+'_mobile_left_padding').get(), api('responsive_'+control+'_mobile_right_padding').get(), mobileUnit);

        jQuery( 'style#responsive-'+control+'-margin' ).remove();
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

        function safeGet(key, fallback) {
            fallback = (fallback === undefined) ? '' : fallback;
            var setting = api(key);
            return setting ? setting.get() : fallback;
        }

        var style = '<style id="responsive-box-padding">';

        var selector = '.responsive-site-style-content-boxed .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .hentry,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.page.front-page.responsive-site-style-flat .widget-wrapper,.blog.front-page.responsive-site-style-flat .widget-wrapper,.responsive-site-style-boxed .widget-wrapper,.responsive-site-style-boxed .site-content article.product'
        +',.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,.woocommerce.responsive-site-style-content-boxed .products-wrapper,.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce.responsive-site-style-boxed ul.products li.product,.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,.woocommerce.single-product:not(.responsive-site-style-flat) div.product';
        var extraSelector = '';
        var topBlogSelector = '.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var topSingleBlogSelector = '.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var topPageSelector = '.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child';
        var leftRightBlogSelector = '.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,.search.responsive-site-style-content-boxed .hentry .thumbnail,.search.responsive-site-style-boxed .hentry .thumbnail,.archive.responsive-site-style-content-boxed .hentry .thumbnail,.archive.responsive-site-style-boxed .hentry .thumbnail,.blog.responsive-site-style-content-boxed .hentry .thumbnail,.blog.responsive-site-style-boxed .hentry .thumbnail';
        var leftRightSingleBlogSelector = '.single.responsive-site-style-content-boxed .hentry .thumbnail,.single.responsive-site-style-boxed .hentry .thumbnail';
        var leftRightPageSelector = '.page.responsive-site-style-content-boxed .hentry .thumbnail,.page.responsive-site-style-boxed .hentry .thumbnail';

        var desktopUnit = safeGet('responsive_box_desktop_unit', 'px');
        var tabletUnit = safeGet('responsive_box_tablet_unit', 'px');
        var mobileUnit = safeGet('responsive_box_mobile_unit', 'px');

        function formatNegativeMargin(l, r, unit) {
            var css = '';
            unit = unit || 'px';
            if (l !== '' && l !== undefined) css += 'margin-left: -' + l + unit + '; ';
            if (r !== '' && r !== undefined) css += 'margin-right: -' + r + unit + '; ';
            return css;
        }

        var desktopTopMargin = (safeGet('responsive_box_top_padding') !== '') ? 'margin-top: -'+ safeGet('responsive_box_top_padding')+desktopUnit+';' : '';
        var tabletTopMargin = (safeGet('responsive_box_tablet_top_padding') !== '') ? 'margin-top: -'+ safeGet('responsive_box_tablet_top_padding')+tabletUnit+';' : '';
        var mobileTopMargin = (safeGet('responsive_box_mobile_top_padding') !== '') ? 'margin-top: -'+ safeGet('responsive_box_mobile_top_padding')+mobileUnit+';' : '';
        var desktopLeftRightMargin = formatNegativeMargin(safeGet('responsive_box_left_padding'), safeGet('responsive_box_right_padding'), desktopUnit);
        var tabletLeftRightMargin = formatNegativeMargin(safeGet('responsive_box_tablet_left_padding'), safeGet('responsive_box_tablet_right_padding'), tabletUnit);
        var mobileLeftRightMargin = formatNegativeMargin(safeGet('responsive_box_mobile_left_padding'), safeGet('responsive_box_mobile_right_padding'), mobileUnit);

        var blogDesktopTopMargin = (safeGet('responsive_blog_inside_container_top_padding') !== '')
        ? 'margin-top: -' + safeGet('responsive_blog_inside_container_top_padding') + desktopUnit + ';'
        : 'margin-top: -' + safeGet('responsive_box_top_padding') + desktopUnit + ';';

        var blogTabletTopMargin = (safeGet('responsive_blog_inside_container_tablet_top_padding') !== '')
            ? 'margin-top: -' + safeGet('responsive_blog_inside_container_tablet_top_padding') + tabletUnit + ';'
            : 'margin-top: -' + safeGet('responsive_box_tablet_top_padding') + tabletUnit + ';';

        var blogMobileTopMargin = (safeGet('responsive_blog_inside_container_mobile_top_padding') !== '')
            ? 'margin-top: -' + safeGet('responsive_blog_inside_container_mobile_top_padding') + mobileUnit + ';'
            : 'margin-top: -' + safeGet('responsive_box_mobile_top_padding') + mobileUnit + ';';

        var blogDesktopLeftRightMargin = formatNegativeMargin(
            (safeGet('responsive_blog_inside_container_left_padding') !== '') ? safeGet('responsive_blog_inside_container_left_padding') : safeGet('responsive_box_left_padding'),
            (safeGet('responsive_blog_inside_container_right_padding') !== '') ? safeGet('responsive_blog_inside_container_right_padding') : safeGet('responsive_box_right_padding'),
            desktopUnit
        );
        var blogTabletLeftRightMargin = formatNegativeMargin(
            (safeGet('responsive_blog_inside_container_tablet_left_padding') !== '') ? safeGet('responsive_blog_inside_container_tablet_left_padding') : safeGet('responsive_box_tablet_left_padding'),
            (safeGet('responsive_blog_inside_container_tablet_right_padding') !== '') ? safeGet('responsive_blog_inside_container_tablet_right_padding') : safeGet('responsive_box_tablet_right_padding'),
            tabletUnit
        );
        var blogMobileLeftRightMargin = formatNegativeMargin(
            (safeGet('responsive_blog_inside_container_mobile_left_padding') !== '') ? safeGet('responsive_blog_inside_container_mobile_left_padding') : safeGet('responsive_box_mobile_left_padding'),
            (safeGet('responsive_blog_inside_container_mobile_right_padding') !== '') ? safeGet('responsive_blog_inside_container_mobile_right_padding') : safeGet('responsive_box_mobile_right_padding'),
            mobileUnit
        );
        if('stretched' === safeGet('responsive_blog_entry_featured_image_style')) {
            style += topBlogSelector + '{ ' + blogDesktopTopMargin + ' }'
                + leftRightBlogSelector + '{ ' + blogDesktopLeftRightMargin + ' }'
                + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
                + topBlogSelector + '	{ ' + blogTabletTopMargin + ' }'
                + leftRightBlogSelector + '{ ' + blogTabletLeftRightMargin + ' }'
                + ' }'
                + '@media (max-width: 544px) {'
                + topBlogSelector + '	{ ' + blogMobileTopMargin + ' }'
                + leftRightBlogSelector + '{ ' + blogMobileLeftRightMargin +' }'
                + ' }';
        }

        if('stretched' === safeGet('responsive_single_blog_featured_image_style')) {
            style += topSingleBlogSelector + '{ ' + desktopTopMargin + ' }'
                + leftRightSingleBlogSelector + '{ ' + desktopLeftRightMargin + ' }'
                + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
                + topSingleBlogSelector + '	{ ' + tabletTopMargin + ' }'
                + leftRightSingleBlogSelector + '{ ' + tabletLeftRightMargin + ' }'
                + ' }'
                + '@media (max-width: 544px) {'
                + topSingleBlogSelector + '	{ ' + mobileTopMargin + ' }'
                + leftRightSingleBlogSelector + '{ ' + mobileLeftRightMargin +' }'
                + ' }';
        }

        if('stretched' === safeGet('responsive_page_featured_image_style')) {
            style += topPageSelector + '{ ' + desktopTopMargin + ' }'
                + leftRightPageSelector + '{ ' + desktopLeftRightMargin + ' }'
                + '@media (max-width: ' + mobile_menu_breakpoint +'px) {'
                + topPageSelector + '	{ ' + tabletTopMargin + ' }'
                + leftRightPageSelector + '{ ' + tabletLeftRightMargin + ' }'
                + ' }'
                + '@media (max-width: 544px) {'
                + topPageSelector + '	{ ' + mobileTopMargin + ' }'
                + leftRightPageSelector + '{ ' + mobileLeftRightMargin +' }'
                + ' }';
        }

        jQuery( 'style#responsive-box-padding' ).remove();
        var desktopPadding = 'padding-top:'+ safeGet('responsive_box_top_padding')+desktopUnit+'; '+'padding-bottom:'+ safeGet('responsive_box_bottom_padding')+desktopUnit+'; '+'padding-left:'+ safeGet('responsive_box_left_padding')+desktopUnit+'; '+'padding-right:'+ safeGet('responsive_box_right_padding')+desktopUnit+';';
        var tabletPadding = 'padding-top:'+ safeGet('responsive_box_tablet_top_padding')+tabletUnit+'; '+'padding-bottom:'+ safeGet('responsive_box_tablet_bottom_padding')+tabletUnit+'; '+'padding-left:'+ safeGet('responsive_box_tablet_left_padding')+tabletUnit+'; '+'padding-right:'+ safeGet('responsive_box_tablet_right_padding')+tabletUnit+';';
        var mobilePadding = 'padding-top:'+ safeGet('responsive_box_mobile_top_padding')+mobileUnit+'; '+'padding-bottom:'+ safeGet('responsive_box_mobile_bottom_padding')+mobileUnit+'; '+'padding-left:'+ safeGet('responsive_box_mobile_left_padding')+mobileUnit+'; '+'padding-right:'+ safeGet('responsive_box_mobile_right_padding')+mobileUnit+';';
        style += selector + '	{ ' + desktopPadding +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector+ extraSelector + '	{ ' + tabletPadding + ' } }'
            + '@media (max-width: 544px) {' + selector + extraSelector + '	{ ' + mobilePadding + ' } }'
            + '</style>';
        jQuery( 'head' ).append(
            style
        );

    }

    function responsive_dynamic_unit_box_padding(control, selector) {
        var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
        if( 0 == api( 'responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        // fetching global inside container padding values
        let globalInsideContainerPaddingDesktopTop = api('responsive_box_top_padding').get();
        let globalInsideContainerPaddingDesktopBottom = api('responsive_box_bottom_padding').get();
        let globalInsideContainerPaddingDesktopLeft = api('responsive_box_left_padding').get();
        let globalInsideContainerPaddingDesktopRight = api('responsive_box_right_padding').get();
        let globalInsideContainerPaddingTabletTop = api('responsive_box_tablet_top_padding').get();
        let globalInsideContainerPaddingTabletBottom = api('responsive_box_tablet_bottom_padding').get();
        let globalInsideContainerPaddingTabletLeft = api('responsive_box_tablet_left_padding').get();
        let globalInsideContainerPaddingTabletRight = api('responsive_box_tablet_right_padding').get();
        let globalInsideContainerPaddingMobileTop = api('responsive_box_mobile_top_padding').get();
        let globalInsideContainerPaddingMobileBottom = api('responsive_box_mobile_bottom_padding').get();
        let globalInsideContainerPaddingMobileLeft = api('responsive_box_mobile_left_padding').get();
        let globalInsideContainerPaddingMobileRight = api('responsive_box_mobile_right_padding').get();
        // units
        let globalInsideContainerDesktopUnit = api('responsive_box_desktop_unit') ? api('responsive_box_desktop_unit').get() : 'px';
        let globalInsideContainerTabletUnit = api('responsive_box_tablet_unit') ? api('responsive_box_tablet_unit').get() : 'px';
        let globalInsideContainerMobileUnit = api('responsive_box_mobile_unit') ? api('responsive_box_mobile_unit').get() : 'px';
        // individual units
        var desktopUnit = api('responsive_'+control+'_desktop_unit') ? api('responsive_'+control+'_desktop_unit').get() : 'px';
        var tabletUnit = api('responsive_'+control+'_tablet_unit') ? api('responsive_'+control+'_tablet_unit').get() : 'px';
        var mobileUnit = api('responsive_'+control+'_mobile_unit') ? api('responsive_'+control+'_mobile_unit').get() : 'px';

        function formatPadding(t, b, l, r, unit, device) {
            var css = '';

            // pick the right global fallback values/unit for the given device
            var globalTop, globalBottom, globalLeft, globalRight, globalUnit;

            if (device === 'tablet') {
                globalTop    = globalInsideContainerPaddingTabletTop;
                globalBottom = globalInsideContainerPaddingTabletBottom;
                globalLeft   = globalInsideContainerPaddingTabletLeft;
                globalRight  = globalInsideContainerPaddingTabletRight;
                globalUnit   = globalInsideContainerTabletUnit;
            } else if (device === 'mobile') {
                globalTop    = globalInsideContainerPaddingMobileTop;
                globalBottom = globalInsideContainerPaddingMobileBottom;
                globalLeft   = globalInsideContainerPaddingMobileLeft;
                globalRight  = globalInsideContainerPaddingMobileRight;
                globalUnit   = globalInsideContainerMobileUnit;
            } else {
                // default: desktop
                globalTop    = globalInsideContainerPaddingDesktopTop;
                globalBottom = globalInsideContainerPaddingDesktopBottom;
                globalLeft   = globalInsideContainerPaddingDesktopLeft;
                globalRight  = globalInsideContainerPaddingDesktopRight;
                globalUnit   = globalInsideContainerDesktopUnit;
            }

            if (t !== '') 
            {
                css += 'padding-top:' + t + unit + '; ';
            }
            else if(control === 'single_blog_inside_container' || control === 'blog_inside_container' || control === 'page_inside_container' )
            {
                css += 'padding-top:' + globalTop + globalUnit + '; ';
            }
            if (b !== '') 
            {
                css += 'padding-bottom:' + b + unit + '; ';
            }
            else if(control === 'single_blog_inside_container' || control === 'blog_inside_container' || control === 'page_inside_container' )
            {
                css += 'padding-bottom:' + globalBottom + globalUnit + '; ';
            }
            
            if (l !== '') 
            {
                css += 'padding-left:' + l + unit + '; ';
            }
            else if(control === 'single_blog_inside_container' || control === 'blog_inside_container' || control === 'page_inside_container' )
            {
                css += 'padding-left:' + globalLeft + globalUnit + '; ';
            }
            
            if (r !== '') 
            {
                css += 'padding-right:' + r + unit + '; ';
            }
            else if(control === 'single_blog_inside_container' || control === 'blog_inside_container' || control === 'page_inside_container' )
            {
                css += 'padding-right:' + globalRight + globalUnit + '; ';
            }
            
            return css;
        }

        jQuery( 'style#responsive-'+control+'-padding' ).remove();
        var desktopPadding = formatPadding(api('responsive_'+control+'_top_padding').get(), api('responsive_'+control+'_bottom_padding').get(), api('responsive_'+control+'_left_padding').get(), api('responsive_'+control+'_right_padding').get(), desktopUnit, 'desktop');
        var tabletPadding = formatPadding(api('responsive_'+control+'_tablet_top_padding').get(), api('responsive_'+control+'_tablet_bottom_padding').get(), api('responsive_'+control+'_tablet_left_padding').get(), api('responsive_'+control+'_tablet_right_padding').get(), tabletUnit, 'tablet');
        var mobilePadding = formatPadding(api('responsive_'+control+'_mobile_top_padding').get(), api('responsive_'+control+'_mobile_bottom_padding').get(), api('responsive_'+control+'_mobile_left_padding').get(), api('responsive_'+control+'_mobile_right_padding').get(), mobileUnit, 'mobile');
        jQuery( 'head' ).append(
            '<style id="responsive-'+control+'-padding">'
            + selector + '	{ ' + desktopPadding +' }'
            + '@media (max-width: ' + mobile_menu_breakpoint +'px) {' + selector + '	{ ' + tabletPadding + ' } }'
            + '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
            + '</style>'
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

    // Global Inside Container Padding Settings.
    const globalInsideContainerPaddingSettings = [
        'responsive_box_top_padding',
        'responsive_box_left_padding',
        'responsive_box_bottom_padding',
        'responsive_box_right_padding',
        'responsive_box_tablet_top_padding',
        'responsive_box_tablet_right_padding',
        'responsive_box_tablet_bottom_padding',
        'responsive_box_tablet_left_padding',
        'responsive_box_mobile_top_padding',
        'responsive_box_mobile_right_padding',
        'responsive_box_mobile_bottom_padding',
        'responsive_box_mobile_left_padding',
        'responsive_box_desktop_unit',
        'responsive_box_tablet_unit',
        'responsive_box_mobile_unit'
    ];

    globalInsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_box_padding( );
                responsive_dynamic_unit_box_padding( 'page_inside_container', '.page:not(.front-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.page-template-gutenberg-fullwidth) .site-content .hentry' );
                responsive_dynamic_unit_box_padding( 'single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry' );
                responsive_dynamic_unit_box_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry' );
            });
        });
    });

    // Buttons Padding
    // Buttons Padding
    api( 'responsive_buttons_top_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_desktop_unit', function( value ) {
        value.bind( function() {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_unit', function( value ) {
        value.bind( function() {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_unit', function( value ) {
        value.bind( function() {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
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
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button, .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button, wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
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
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
        } );
    } );
    api( 'responsive_buttons_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            var selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,body div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],body div.wpforms-container-full .wpforms-form .wpforms-page-button';
            if ( responsiveSiteLocalOptions.isElementorVersion ) {
                selector += ', .elementor-button-wrapper .elementor-button';
            }
            selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button , .wp-block-search__button';
            responsive_dynamic_unit_padding('buttons', selector );
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

    const headerSocialMargin = [
        'responsive_header_social_item_margin_top_padding',
        'responsive_header_social_item_margin_right_padding',
        'responsive_header_social_item_margin_bottom_padding',
        'responsive_header_social_item_margin_left_padding',
        'responsive_header_social_item_margin_tablet_top_padding',
        'responsive_header_social_item_margin_tablet_right_padding',
        'responsive_header_social_item_margin_tablet_bottom_padding',
        'responsive_header_social_item_margin_tablet_left_padding',
        'responsive_header_social_item_margin_mobile_top_padding',
        'responsive_header_social_item_margin_mobile_right_padding',
        'responsive_header_social_item_margin_mobile_bottom_padding',
        'responsive_header_social_item_margin_mobile_left_padding',
    ];
    
    headerSocialMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('header_social_item_margin', '.header-layouts.social-icon .social-icons');
            });
        });
    });

    const mobileHeaderSocialMargin = [
        'responsive_mobile_header_social_item_margin_top_padding',
        'responsive_mobile_header_social_item_margin_right_padding',
        'responsive_mobile_header_social_item_margin_bottom_padding',
        'responsive_mobile_header_social_item_margin_left_padding',
        'responsive_mobile_header_social_item_margin_tablet_top_padding',
        'responsive_mobile_header_social_item_margin_tablet_right_padding',
        'responsive_mobile_header_social_item_margin_tablet_bottom_padding',
        'responsive_mobile_header_social_item_margin_tablet_left_padding',
        'responsive_mobile_header_social_item_margin_mobile_top_padding',
        'responsive_mobile_header_social_item_margin_mobile_right_padding',
        'responsive_mobile_header_social_item_margin_mobile_bottom_padding',
        'responsive_mobile_header_social_item_margin_mobile_left_padding',
    ];

    mobileHeaderSocialMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('mobile_header_social_item_margin', '.site-mobile-header-item .header-layouts.social-icon .social-icons');
            });
        });
    });

    const footerSocialMargin = [
        'responsive_footer_social_item_margin_top_padding',
        'responsive_footer_social_item_margin_right_padding',
        'responsive_footer_social_item_margin_bottom_padding',
        'responsive_footer_social_item_margin_left_padding',
        'responsive_footer_social_item_margin_tablet_top_padding',
        'responsive_footer_social_item_margin_tablet_right_padding',
        'responsive_footer_social_item_margin_tablet_bottom_padding',
        'responsive_footer_social_item_margin_tablet_left_padding',
        'responsive_footer_social_item_margin_mobile_top_padding',
        'responsive_footer_social_item_margin_mobile_right_padding',
        'responsive_footer_social_item_margin_mobile_bottom_padding',
        'responsive_footer_social_item_margin_mobile_left_padding',
    ];
    
    footerSocialMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('footer_social_item_margin', '.footer-layouts.social-icon .social-icons');
            });
        });
    });

    // Sidebar Outside Padding
    api( 'responsive_sidebar_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );
    api( 'responsive_sidebar_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );
    api( 'responsive_sidebar_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );
    api( 'responsive_sidebar_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    api( 'responsive_sidebar_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_outside_container', 'aside#secondary.widget-area, #secondary.widget-area, aside#secondary, #secondary');
        } );
    } );

    // Sidebar Inside Padding
    api( 'responsive_sidebar_inside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );
    api( 'responsive_sidebar_inside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );
    api( 'responsive_sidebar_inside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );
    api( 'responsive_sidebar_inside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    api( 'responsive_sidebar_inside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('sidebar_inside_container', 'aside#secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, aside#secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-boxed.widget-area .widget-wrapper, #secondary.responsive-sidebar-style-unboxed.widget-area .widget-wrapper, #secondary.widget-area .widget-wrapper');
        } );
    } );

    // Global Outside Container Padding Settings.
    const globalOutsideContainerPaddingSettings = [
        'responsive_outside_container_top_padding',
        'responsive_outside_container_left_padding',
        'responsive_outside_container_bottom_padding',
        'responsive_outside_container_right_padding',
        'responsive_outside_container_tablet_top_padding',
        'responsive_outside_container_tablet_right_padding',
        'responsive_outside_container_tablet_bottom_padding',
        'responsive_outside_container_tablet_left_padding',
        'responsive_outside_container_mobile_top_padding',
        'responsive_outside_container_mobile_right_padding',
        'responsive_outside_container_mobile_bottom_padding',
        'responsive_outside_container_mobile_left_padding',
        'responsive_outside_container_desktop_unit',
        'responsive_outside_container_tablet_unit',
        'responsive_outside_container_mobile_unit'
    ];

    globalOutsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('outside_container', '.responsive-site-style-content-boxed #primary.content-area, .responsive-site-style-boxed #primary.content-area');
                responsive_dynamic_unit_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
                responsive_dynamic_unit_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area' );
                responsive_dynamic_unit_padding('page_outside_container', '.page:not(.front-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.page-template-gutenberg-fullwidth) .site-content #primary');
            });
        });
    });

    // Blog Outside Container Padding Settings.
    const blogOutsideContainerPaddingSettings = [
        'responsive_blog_outside_container_top_padding',
        'responsive_blog_outside_container_left_padding',
        'responsive_blog_outside_container_bottom_padding',
        'responsive_blog_outside_container_right_padding',
        'responsive_blog_outside_container_tablet_top_padding',
        'responsive_blog_outside_container_tablet_right_padding',
        'responsive_blog_outside_container_tablet_bottom_padding',
        'responsive_blog_outside_container_tablet_left_padding',
        'responsive_blog_outside_container_mobile_top_padding',
        'responsive_blog_outside_container_mobile_right_padding',
        'responsive_blog_outside_container_mobile_bottom_padding',
        'responsive_blog_outside_container_mobile_left_padding',
        'responsive_blog_outside_container_desktop_unit',
        'responsive_blog_outside_container_tablet_unit',
        'responsive_blog_outside_container_mobile_unit'
    ];

    blogOutsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('blog_outside_container', '.blog.responsive-site-style-content-boxed #primary.content-area, .blog.responsive-site-style-boxed #primary.content-area, .archive.responsive-site-style-content-boxed #primary.content-area, .archive.responsive-site-style-boxed #primary.content-area' );
            });
        });
    });

    //product card padding
    api( 'responsive_product_card_outside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );

//product card padding -Tablet
api( 'responsive_product_card_outside_container_tablet_top_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_outside_container_tablet_left_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_outside_container_tablet_right_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_outside_container_tablet_bottom_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );

    //product card padding-Mobile
    api( 'responsive_product_card_outside_container_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_outside_container_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('product_card_outside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );

    //product card Margin
    api( 'responsive_product_card_inside_container_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_inside_container_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_inside_container_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );
    api( 'responsive_product_card_inside_container_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page.responsive-site-style-boxed ul.products li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
        } );
    } );

    
//product card Margin -Tablet
api( 'responsive_product_card_inside_container_tablet_top_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_tablet_left_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_tablet_right_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product,.woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_tablet_bottom_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product, .woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );

//product card Margin-Mobile
api( 'responsive_product_card_inside_container_mobile_top_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product, .woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_mobile_left_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product, .woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_mobile_right_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product, .woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );
api( 'responsive_product_card_inside_container_mobile_bottom_padding', function( value ) {
    value.bind( function( newval ) {
        responsive_dynamic_margin('product_card_inside_container', '.woocommerce-page ul.products[class*=columns-] li.product, .woocommerce ul.products li.product, .woocommerce.responsive-site-style-flat ul.products li.product,.woocommerce ul.products li.product,.woocommerce.responsive-site-style-content-boxed ul.products li.product');
    } );
} );

    // Blog Inside Container Padding Settings.
    const blogInsideContainerPaddingSettings = [
        'responsive_blog_inside_container_top_padding',
        'responsive_blog_inside_container_left_padding',
        'responsive_blog_inside_container_bottom_padding',
        'responsive_blog_inside_container_right_padding',
        'responsive_blog_inside_container_tablet_top_padding',
        'responsive_blog_inside_container_tablet_right_padding',
        'responsive_blog_inside_container_tablet_bottom_padding',
        'responsive_blog_inside_container_tablet_left_padding',
        'responsive_blog_inside_container_mobile_top_padding',
        'responsive_blog_inside_container_mobile_right_padding',
        'responsive_blog_inside_container_mobile_bottom_padding',
        'responsive_blog_inside_container_mobile_left_padding',
        'responsive_blog_inside_container_desktop_unit',
        'responsive_blog_inside_container_tablet_unit',
        'responsive_blog_inside_container_mobile_unit'
    ];

    blogInsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_box_padding('blog_inside_container', '.blog.responsive-site-style-content-boxed .site-content .hentry, .blog.responsive-site-style-boxed .site-content .hentry, .archive.responsive-site-style-content-boxed .site-content .hentry, .archive.responsive-site-style-boxed .site-content .hentry' );
                responsive_dynamic_box_padding();
            });
        });
    });

    // Single Blog Outside Padding
    const singleBlogOutsidePaddingSettings = [
        'responsive_single_blog_outside_container_top_padding',
        'responsive_single_blog_outside_container_left_padding',
        'responsive_single_blog_outside_container_bottom_padding',
        'responsive_single_blog_outside_container_right_padding',
        'responsive_single_blog_outside_container_tablet_top_padding',
        'responsive_single_blog_outside_container_tablet_right_padding',
        'responsive_single_blog_outside_container_tablet_bottom_padding',
        'responsive_single_blog_outside_container_tablet_left_padding',
        'responsive_single_blog_outside_container_mobile_top_padding',
        'responsive_single_blog_outside_container_mobile_right_padding',
        'responsive_single_blog_outside_container_mobile_bottom_padding',
        'responsive_single_blog_outside_container_mobile_left_padding',
        'responsive_single_blog_outside_container_desktop_unit',
        'responsive_single_blog_outside_container_tablet_unit',
        'responsive_single_blog_outside_container_mobile_unit'
    ];

    singleBlogOutsidePaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('single_blog_outside_container', '.single.single-post.responsive-site-style-content-boxed #primary.content-area, .single.single-post.responsive-site-style-boxed #primary.content-area');
            });
        });
    });

    // Blog Inside Container Padding Settings.
    const singleBlogInsideContainerPaddingSettings = [
        'responsive_single_blog_inside_container_top_padding',
        'responsive_single_blog_inside_container_left_padding',
        'responsive_single_blog_inside_container_bottom_padding',
        'responsive_single_blog_inside_container_right_padding',
        'responsive_single_blog_inside_container_tablet_top_padding',
        'responsive_single_blog_inside_container_tablet_right_padding',
        'responsive_single_blog_inside_container_tablet_bottom_padding',
        'responsive_single_blog_inside_container_tablet_left_padding',
        'responsive_single_blog_inside_container_mobile_top_padding',
        'responsive_single_blog_inside_container_mobile_right_padding',
        'responsive_single_blog_inside_container_mobile_bottom_padding',
        'responsive_single_blog_inside_container_mobile_left_padding',
        'responsive_single_blog_inside_container_desktop_unit',
        'responsive_single_blog_inside_container_tablet_unit',
        'responsive_single_blog_inside_container_mobile_unit'
    ];

    singleBlogInsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_box_padding('single_blog_inside_container', '.single.single-post.responsive-site-style-content-boxed .site-content .hentry, .single.single-post.responsive-site-style-boxed .site-content .hentry' );
            });
        });
    });

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
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_padding_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_above_row_padding', '.responsive-site-above-mobile-header-wrap');
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
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_above_row_margin_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_above_row_margin', '.responsive-site-above-mobile-header-wrap');
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
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_padding_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_primary_row_padding', '.responsive-site-primary-mobile-header-wrap');
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
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_primary_row_margin_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_primary_row_margin', '.responsive-site-primary-mobile-mobile-header-wrap');
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
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_padding_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_padding('header_below_row_padding', '.responsive-site-below-mobile-header-wrap');
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
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_tablet_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_top_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_left_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    api( 'responsive_header_below_row_margin_mobile_right_padding', function( value ) {
        value.bind( function( newval ) {
            responsive_dynamic_margin('header_below_row_margin', '.responsive-site-below-mobile-header-wrap');
        } );
    } );

    const hfbFooterRows = [
        { type: 'above', selector: '.rspv-site-above-footer-wrap' },
        { type: 'primary', selector: '.rspv-site-primary-footer-wrap' },
        { type: 'below', selector: '.rspv-site-below-footer-wrap' },
    ];
    const hfbFooterRowsItems = [
        { type: 'above', selector: '.rspv-site-above-footer-wrap .footer-widget-wrapper' },
        { type: 'primary', selector: '.rspv-site-primary-footer-wrap .footer-widget-wrapper' },
        { type: 'below', selector: '.rspv-site-below-footer-wrap .footer-widget-wrapper' },
    ];

    // Common suffixes for both margin and padding
    const suffixes = [
        'right_padding',
        'left_padding',
        'bottom_padding',
        'top_padding',
        'tablet_top_padding',
        'tablet_bottom_padding',
        'tablet_left_padding',
        'tablet_right_padding',
        'mobile_top_padding',
        'mobile_bottom_padding',
        'mobile_left_padding',
        'mobile_right_padding',
    ];

    // Generic function to bind changes dynamically for both margin and padding
    function responsive_bind_changes(type, suffix, row_type, selector, callback) {
        const setting_id = `responsive_footer_${row_type}_row_${type}_${suffix}`;
        wp.customize(setting_id, function (value) {
            value.bind(function () {
                callback(`footer_${row_type}_row_${type}`, selector);
            });
        });
    }

    // Loop through rows, suffixes, and types (margin/padding) to bind all settings
    hfbFooterRows.forEach(function (row) {
        suffixes.forEach(function (suffix) {

            responsive_bind_changes('padding', suffix, row.type, row.selector, responsive_dynamic_padding);

            responsive_bind_changes('margin', suffix, row.type, row.selector, responsive_dynamic_margin);
        });
    });

    hfbFooterRowsItems.forEach(function (row) {
        suffixes.forEach(function (suffix) {
            const setting_id = `responsive_footer_${row.type}_row_item_padding_${suffix}`;
            wp.customize(setting_id, function (value) {
                value.bind(function () {
                    responsive_dynamic_padding(`footer_${row.type}_row_item_padding`, row.selector);
                });
            });
        });
    });

    // copyright padding
    suffixes.forEach(function (suffix) {
        // Bind padding changes
        responsive_bind_copyright_padding_changes(suffix, responsive_dynamic_padding);
    });

    function responsive_bind_copyright_padding_changes( suffix, callback) {
        const setting_id = `responsive_footer_copyright_${suffix}`;
        wp.customize(setting_id, function (value) {
            value.bind(function () {
                callback(`footer_copyright`, '.footer-layouts.copyright');
            });
        });
    }

    // footer_menu padding
    suffixes.forEach(function (suffix) {
        // Bind padding changes
        responsive_bind_footer_menu_padding_changes(suffix, responsive_dynamic_padding);
    });

    function responsive_bind_footer_menu_padding_changes( suffix, callback) {
        const setting_id = `responsive_footer_menu_${suffix}`;
        wp.customize(setting_id, function (value) {
            value.bind(function () {
                callback(`footer_menu`, '.footer-navigation');
            });
        });
    }
    // Generic function to bind cart padding and amrgin changes dynamically.
    function responsive_bind_spacing_changes(type, suffix, control, selector, callback) {
        const setting_id = `responsive_${control}_${type}_${suffix}`;
        wp.customize(setting_id, function (value) {
            value.bind(function () {
                callback(`${control}_${type}`, selector);
            });
        });
    }
    suffixes.forEach(function (suffix) {
        responsive_bind_spacing_changes('padding', suffix, 'header_woo_cart', '.responsive-header-cart .res-addon-cart-wrap', responsive_dynamic_padding);
        responsive_bind_spacing_changes('margin', suffix, 'header_woo_cart', '.responsive-header-cart .res-addon-cart-wrap', responsive_dynamic_margin);
    });

    // Generic function to bind header search padding and amrgin changes dynamically.
    function responsive_bind_spacing_changes(type, suffix, control, selector, callback) {
        const setting_id = `responsive_${control}_${type}_${suffix}`;
        wp.customize(setting_id, function (value) {
            value.bind(function () {
                callback(`${control}_${type}`, selector);
            });
        });
    }
    suffixes.forEach(function (suffix) {
        responsive_bind_spacing_changes('padding', suffix, 'header_search', '.responsive-header-search-icon-wrap', responsive_dynamic_padding);
        responsive_bind_spacing_changes('margin', suffix, 'header_search', '.responsive-header-search-icon-wrap', responsive_dynamic_margin);
    });

    const headerButtonPadding = [
        'responsive_header_button_top_padding',
        'responsive_header_button_right_padding',
        'responsive_header_button_bottom_padding',
        'responsive_header_button_left_padding',
        'responsive_header_button_tablet_top_padding',
        'responsive_header_button_tablet_right_padding',
        'responsive_header_button_tablet_bottom_padding',
        'responsive_header_button_tablet_left_padding',
        'responsive_header_button_mobile_top_padding',
        'responsive_header_button_mobile_right_padding',
        'responsive_header_button_mobile_bottom_padding',
        'responsive_header_button_mobile_left_padding',
    ];
    
    headerButtonPadding.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_padding('header_button', '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size');
            });
        });
    });

    const headerButtonMargin = [
        'responsive_header_button_margin_top_padding',
        'responsive_header_button_margin_right_padding',
        'responsive_header_button_margin_bottom_padding',
        'responsive_header_button_margin_left_padding',
        'responsive_header_button_margin_tablet_top_padding',
        'responsive_header_button_margin_tablet_right_padding',
        'responsive_header_button_margin_tablet_bottom_padding',
        'responsive_header_button_margin_tablet_left_padding',
        'responsive_header_button_margin_mobile_top_padding',
        'responsive_header_button_margin_mobile_right_padding',
        'responsive_header_button_margin_mobile_bottom_padding',
        'responsive_header_button_margin_mobile_left_padding',
    ];

    headerButtonMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('header_button_margin', '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button');
            });
        });
    });

    const mobileHeaderButtonPadding = [
        'responsive_mobile_header_button_top_padding',
        'responsive_mobile_header_button_right_padding',
        'responsive_mobile_header_button_bottom_padding',
        'responsive_mobile_header_button_left_padding',
        'responsive_mobile_header_button_tablet_top_padding',
        'responsive_mobile_header_button_tablet_right_padding',
        'responsive_mobile_header_button_tablet_bottom_padding',
        'responsive_mobile_header_button_tablet_left_padding',
        'responsive_mobile_header_button_mobile_top_padding',
        'responsive_mobile_header_button_mobile_right_padding',
        'responsive_mobile_header_button_mobile_bottom_padding',
        'responsive_mobile_header_button_mobile_left_padding',
    ];
    
    mobileHeaderButtonPadding.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_padding('mobile_header_button', '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button.responsive-header-button-custom-size');
            });
        });
    });

    const mobileHeaderButtonMargin = [
        'responsive_mobile_header_button_margin_top_padding',
        'responsive_mobile_header_button_margin_right_padding',
        'responsive_mobile_header_button_margin_bottom_padding',
        'responsive_mobile_header_button_margin_left_padding',
        'responsive_mobile_header_button_margin_tablet_top_padding',
        'responsive_mobile_header_button_margin_tablet_right_padding',
        'responsive_mobile_header_button_margin_tablet_bottom_padding',
        'responsive_mobile_header_button_margin_tablet_left_padding',
        'responsive_mobile_header_button_margin_mobile_top_padding',
        'responsive_mobile_header_button_margin_mobile_right_padding',
        'responsive_mobile_header_button_margin_mobile_bottom_padding',
        'responsive_mobile_header_button_margin_mobile_left_padding',
    ];

    mobileHeaderButtonMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('mobile_header_button_margin', '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button');
            });
        });
    });

    const headerContactInfoMargin = [
        'responsive_header_contact_info_margin_top_padding',
        'responsive_header_contact_info_margin_right_padding',
        'responsive_header_contact_info_margin_bottom_padding',
        'responsive_header_contact_info_margin_left_padding',
        'responsive_header_contact_info_margin_tablet_top_padding',
        'responsive_header_contact_info_margin_tablet_right_padding',
        'responsive_header_contact_info_margin_tablet_bottom_padding',
        'responsive_header_contact_info_margin_tablet_left_padding',
        'responsive_header_contact_info_margin_mobile_top_padding',
        'responsive_header_contact_info_margin_mobile_right_padding',
        'responsive_header_contact_info_margin_mobile_bottom_padding',
        'responsive_header_contact_info_margin_mobile_left_padding',
    ];
    const mobileHeaderContactInfoMargin = [
        'responsive_mobile_header_contact_info_margin_top_padding',
        'responsive_mobile_header_contact_info_margin_right_padding',
        'responsive_mobile_header_contact_info_margin_bottom_padding',
        'responsive_mobile_header_contact_info_margin_left_padding',
        'responsive_mobile_header_contact_info_margin_tablet_top_padding',
        'responsive_mobile_header_contact_info_margin_tablet_right_padding',
        'responsive_mobile_header_contact_info_margin_tablet_bottom_padding',
        'responsive_mobile_header_contact_info_margin_tablet_left_padding',
        'responsive_mobile_header_contact_info_margin_mobile_top_padding',
        'responsive_mobile_header_contact_info_margin_mobile_right_padding',
        'responsive_mobile_header_contact_info_margin_mobile_bottom_padding',
        'responsive_mobile_header_contact_info_margin_mobile_left_padding',
    ];

    headerContactInfoMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('header_contact_info_margin', '.site-header-item .responsive-header-contact-info');
            });
        });
    });

    mobileHeaderContactInfoMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('mobile_header_contact_info_margin', '.site-mobile-header-item .responsive-header-contact-info');
            });
        });
    });

    const headerHtmlMargin = [
        'responsive_header_html_margin_top_padding',
        'responsive_header_html_margin_right_padding',
        'responsive_header_html_margin_bottom_padding',
        'responsive_header_html_margin_left_padding',
        'responsive_header_html_margin_tablet_top_padding',
        'responsive_header_html_margin_tablet_right_padding',
        'responsive_header_html_margin_tablet_bottom_padding',
        'responsive_header_html_margin_tablet_left_padding',
        'responsive_header_html_margin_mobile_top_padding',
        'responsive_header_html_margin_mobile_right_padding',
        'responsive_header_html_margin_mobile_bottom_padding',
        'responsive_header_html_margin_mobile_left_padding',
    ];

    headerHtmlMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('header_html_margin', '.site-header .responsive-header-html .responsive-header-html-inner');
            });
        });
    });

    const mobileHeaderHtmlMargin = [
        'responsive_mobile_header_html_margin_top_padding',
        'responsive_mobile_header_html_margin_right_padding',
        'responsive_mobile_header_html_margin_bottom_padding',
        'responsive_mobile_header_html_margin_left_padding',
        'responsive_mobile_header_html_margin_tablet_top_padding',
        'responsive_mobile_header_html_margin_tablet_right_padding',
        'responsive_mobile_header_html_margin_tablet_bottom_padding',
        'responsive_mobile_header_html_margin_tablet_left_padding',
        'responsive_mobile_header_html_margin_mobile_top_padding',
        'responsive_mobile_header_html_margin_mobile_right_padding',
        'responsive_mobile_header_html_margin_mobile_bottom_padding',
        'responsive_mobile_header_html_margin_mobile_left_padding',
    ];

    mobileHeaderHtmlMargin.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('mobile_header_html_margin', '.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner');
            });
        });
    });

    /**
     * Generates the margin settings array for a specific widget number (1-6)
     * @param {number} widgetNum - The widget number (1 to 6)
     * @returns {string[]} An array of setting keys
     */
    const generateFooterWidgetsMarginSettings = (widgetNum) => {
        const prefixes = [
            'margin',
            'margin_tablet',
            'margin_mobile'
        ];
        const directions = [
            'top_padding',
            'right_padding',
            'bottom_padding',
            'left_padding'
        ];
        const settings = [];

        prefixes.forEach(prefix => {
            directions.forEach(direction => {
                settings.push(
                    `responsive_footer_widget${widgetNum}_${prefix}_${direction}`
                );
            });
        });

        return settings;
    };

    // Loop through widgets 1 to 6
    for (let i = 1; i <= 6; i++) {
        const footerWidgetsMargin = generateFooterWidgetsMarginSettings(i);
        const selectorClass       = `.footer-widgets.footer-widget-${i}`;
        const controlId           = `footer_widget${i}_margin`;

        footerWidgetsMargin.forEach(setting => {
            api(setting, function(value) {
                value.bind(function(newval) {
                    responsive_dynamic_margin(controlId, selectorClass);
                });
            });
        });
    }

    // Off-Canvas Menu Spacing (Padding) Controls
    const offCanvasMenuSpacingSettings = [
        'responsive_header_off_canvas_menu_spacing_top_padding',
        'responsive_header_off_canvas_menu_spacing_right_padding',
        'responsive_header_off_canvas_menu_spacing_bottom_padding',
        'responsive_header_off_canvas_menu_spacing_left_padding',
        'responsive_header_off_canvas_menu_spacing_tablet_top_padding',
        'responsive_header_off_canvas_menu_spacing_tablet_right_padding',
        'responsive_header_off_canvas_menu_spacing_tablet_bottom_padding',
        'responsive_header_off_canvas_menu_spacing_tablet_left_padding',
        'responsive_header_off_canvas_menu_spacing_mobile_top_padding',
        'responsive_header_off_canvas_menu_spacing_mobile_right_padding',
        'responsive_header_off_canvas_menu_spacing_mobile_bottom_padding',
        'responsive_header_off_canvas_menu_spacing_mobile_left_padding'
    ];

    offCanvasMenuSpacingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_padding('header_off_canvas_menu_spacing', '.off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a');
            });
        });
    });

    // Off-Canvas Menu Margin Controls
    const offCanvasMenuMarginSettings = [
        'responsive_header_off_canvas_menu_margin_top_padding',
        'responsive_header_off_canvas_menu_margin_right_padding',
        'responsive_header_off_canvas_menu_margin_bottom_padding',
        'responsive_header_off_canvas_menu_margin_left_padding',
        'responsive_header_off_canvas_menu_margin_tablet_top_padding',
        'responsive_header_off_canvas_menu_margin_tablet_right_padding',
        'responsive_header_off_canvas_menu_margin_tablet_bottom_padding',
        'responsive_header_off_canvas_menu_margin_tablet_left_padding',
        'responsive_header_off_canvas_menu_margin_mobile_top_padding',
        'responsive_header_off_canvas_menu_margin_mobile_right_padding',
        'responsive_header_off_canvas_menu_margin_mobile_bottom_padding',
        'responsive_header_off_canvas_menu_margin_mobile_left_padding'
    ];

    offCanvasMenuMarginSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('header_off_canvas_menu_margin', '.off-canvas-widget-area #off-canvas-menu, #off-canvas-site-navigation .menu');
            });
        });
    });

    // Comments Padding Settings.
    const commentsPaddingSettings = [
        'responsive_comments_padding_top_padding',
        'responsive_comments_padding_left_padding',
        'responsive_comments_padding_bottom_padding',
        'responsive_comments_padding_right_padding',
        'responsive_comments_padding_tablet_top_padding',
        'responsive_comments_padding_tablet_right_padding',
        'responsive_comments_padding_tablet_bottom_padding',
        'responsive_comments_padding_tablet_left_padding',
        'responsive_comments_padding_mobile_top_padding',
        'responsive_comments_padding_mobile_right_padding',
        'responsive_comments_padding_mobile_bottom_padding',
        'responsive_comments_padding_mobile_left_padding'
    ];

    commentsPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_padding('comments_padding', 'body .site .comments-area');
            });
        });
    });

    // Comments Margin Settings.
    const commentsMarginSettings = [
        'responsive_comments_margin_top_padding',
        'responsive_comments_margin_left_padding',
        'responsive_comments_margin_bottom_padding',
        'responsive_comments_margin_right_padding',
        'responsive_comments_margin_tablet_top_padding',
        'responsive_comments_margin_tablet_right_padding',
        'responsive_comments_margin_tablet_bottom_padding',
        'responsive_comments_margin_tablet_left_padding',
        'responsive_comments_margin_mobile_top_padding',
        'responsive_comments_margin_mobile_right_padding',
        'responsive_comments_margin_mobile_bottom_padding',
        'responsive_comments_margin_mobile_left_padding'
    ];

    commentsMarginSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_margin('comments_margin', 'body .site .comments-area');
            });
        });
    });

    // Single Blog Banner Padding Settings.
    const singleBlogBannerPaddingSettings = [
        'responsive_single_blog_banner_padding_top_padding',
        'responsive_single_blog_banner_padding_left_padding',
        'responsive_single_blog_banner_padding_bottom_padding',
        'responsive_single_blog_banner_padding_right_padding',
        'responsive_single_blog_banner_padding_tablet_top_padding',
        'responsive_single_blog_banner_padding_tablet_right_padding',
        'responsive_single_blog_banner_padding_tablet_bottom_padding',
        'responsive_single_blog_banner_padding_tablet_left_padding',
        'responsive_single_blog_banner_padding_mobile_top_padding',
        'responsive_single_blog_banner_padding_mobile_right_padding',
        'responsive_single_blog_banner_padding_mobile_bottom_padding',
        'responsive_single_blog_banner_padding_mobile_left_padding',
        'responsive_single_blog_banner_padding_desktop_unit',
        'responsive_single_blog_banner_padding_tablet_unit',
        'responsive_single_blog_banner_padding_mobile_unit'
    ];

    singleBlogBannerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('single_blog_banner_padding', 'body .responsive-blog-single-banner2, .archive:not(.woocommerce) .site-content-header');
            });
        });
    });

    // Single Blog Banner Margin Settings.
    const singleBlogBannerMarginSettings = [
        'responsive_single_blog_banner_margin_top_padding',
        'responsive_single_blog_banner_margin_left_padding',
        'responsive_single_blog_banner_margin_bottom_padding',
        'responsive_single_blog_banner_margin_right_padding',
        'responsive_single_blog_banner_margin_tablet_top_padding',
        'responsive_single_blog_banner_margin_tablet_right_padding',
        'responsive_single_blog_banner_margin_tablet_bottom_padding',
        'responsive_single_blog_banner_margin_tablet_left_padding',
        'responsive_single_blog_banner_margin_mobile_top_padding',
        'responsive_single_blog_banner_margin_mobile_right_padding',
        'responsive_single_blog_banner_margin_mobile_bottom_padding',
        'responsive_single_blog_banner_margin_mobile_left_padding',
        'responsive_single_blog_banner_margin_desktop_unit',
        'responsive_single_blog_banner_margin_tablet_unit',
        'responsive_single_blog_banner_margin_mobile_unit'
    ];

    singleBlogBannerMarginSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_margin('single_blog_banner_margin', 'body .responsive-blog-single-banner2, .archive:not(.woocommerce) .site-content-header');
            });
        });
    });

    // Blog Banner Padding Settings.
    const blogBannerPaddingSettings = [
        'responsive_blog_banner_padding_top_padding',
        'responsive_blog_banner_padding_left_padding',
        'responsive_blog_banner_padding_bottom_padding',
        'responsive_blog_banner_padding_right_padding',
        'responsive_blog_banner_padding_tablet_top_padding',
        'responsive_blog_banner_padding_tablet_right_padding',
        'responsive_blog_banner_padding_tablet_bottom_padding',
        'responsive_blog_banner_padding_tablet_left_padding',
        'responsive_blog_banner_padding_mobile_top_padding',
        'responsive_blog_banner_padding_mobile_right_padding',
        'responsive_blog_banner_padding_mobile_bottom_padding',
        'responsive_blog_banner_padding_mobile_left_padding',
        'responsive_blog_banner_padding_desktop_unit',
        'responsive_blog_banner_padding_tablet_unit',
        'responsive_blog_banner_padding_mobile_unit'
    ];

    blogBannerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('blog_banner_padding', 'body .responsive-archive-entry-banner, body.archive:not(.woocommerce) .site-content-header');
            });
        });
    });

    // Blog Banner Margin Settings.
    const blogBannerMarginSettings = [
        'responsive_blog_banner_margin_top_padding',
        'responsive_blog_banner_margin_left_padding',
        'responsive_blog_banner_margin_bottom_padding',
        'responsive_blog_banner_margin_right_padding',
        'responsive_blog_banner_margin_tablet_top_padding',
        'responsive_blog_banner_margin_tablet_right_padding',
        'responsive_blog_banner_margin_tablet_bottom_padding',
        'responsive_blog_banner_margin_tablet_left_padding',
        'responsive_blog_banner_margin_mobile_top_padding',
        'responsive_blog_banner_margin_mobile_right_padding',
        'responsive_blog_banner_margin_mobile_bottom_padding',
        'responsive_blog_banner_margin_mobile_left_padding',
        'responsive_blog_banner_margin_desktop_unit',
        'responsive_blog_banner_margin_tablet_unit',
        'responsive_blog_banner_margin_mobile_unit'
    ];

    blogBannerMarginSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_margin('blog_banner_margin', 'body .responsive-archive-entry-banner, body.archive:not(.woocommerce) .site-content-header');
            });
        });
    });

    // Page Title Banner Padding Settings.
    const pageTitleBannerPaddingSettings = [
        'responsive_page_title_banner_padding_top_padding',
        'responsive_page_title_banner_padding_left_padding',
        'responsive_page_title_banner_padding_bottom_padding',
        'responsive_page_title_banner_padding_right_padding',
        'responsive_page_title_banner_padding_tablet_top_padding',
        'responsive_page_title_banner_padding_tablet_right_padding',
        'responsive_page_title_banner_padding_tablet_bottom_padding',
        'responsive_page_title_banner_padding_tablet_left_padding',
        'responsive_page_title_banner_padding_mobile_top_padding',
        'responsive_page_title_banner_padding_mobile_right_padding',
        'responsive_page_title_banner_padding_mobile_bottom_padding',
        'responsive_page_title_banner_padding_mobile_left_padding',
        'responsive_page_title_banner_padding_desktop_unit',
        'responsive_page_title_banner_padding_tablet_unit',
        'responsive_page_title_banner_padding_mobile_unit'
    ];

    pageTitleBannerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('page_title_banner_padding', 'body .responsive-single-entry-banner, article.page .entry-header');
            });
        });
    });

    // Page Margin Settings.
    const pageTitleBannerMarginSettings = [
        'responsive_page_title_banner_margin_top_padding',
        'responsive_page_title_banner_margin_left_padding',
        'responsive_page_title_banner_margin_bottom_padding',
        'responsive_page_title_banner_margin_right_padding',
        'responsive_page_title_banner_margin_tablet_top_padding',
        'responsive_page_title_banner_margin_tablet_right_padding',
        'responsive_page_title_banner_margin_tablet_bottom_padding',
        'responsive_page_title_banner_margin_tablet_left_padding',
        'responsive_page_title_banner_margin_mobile_top_padding',
        'responsive_page_title_banner_margin_mobile_right_padding',
        'responsive_page_title_banner_margin_mobile_bottom_padding',
        'responsive_page_title_banner_margin_mobile_left_padding',
        'responsive_page_title_banner_margin_desktop_unit',
        'responsive_page_title_banner_margin_tablet_unit',
        'responsive_page_title_banner_margin_mobile_unit'
    ];

    pageTitleBannerMarginSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_margin('page_title_banner_margin', 'body .responsive-single-entry-banner, article.page .entry-header');
            });
        });
    });

    // page margin is actually a Padding which is applied to the <main> tag - it is labelled as Outside Container Padding
    const pageOutsideContainerPaddingSettings = [
        'responsive_page_outside_container_top_padding',
        'responsive_page_outside_container_left_padding',
        'responsive_page_outside_container_bottom_padding',
        'responsive_page_outside_container_right_padding',
        'responsive_page_outside_container_tablet_top_padding',
        'responsive_page_outside_container_tablet_right_padding',
        'responsive_page_outside_container_tablet_bottom_padding',
        'responsive_page_outside_container_tablet_left_padding',
        'responsive_page_outside_container_mobile_top_padding',
        'responsive_page_outside_container_mobile_right_padding',
        'responsive_page_outside_container_mobile_bottom_padding',
        'responsive_page_outside_container_mobile_left_padding',
        'responsive_page_outside_container_desktop_unit',
        'responsive_page_outside_container_tablet_unit',
        'responsive_page_outside_container_mobile_unit'
    ];

    pageOutsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_padding('page_outside_container', '.page:not(.front-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.page-template-gutenberg-fullwidth) .site-content #primary');
            });
        });
    });

    // Page Padding
    const pageInsideContainerPaddingSettings = [
        'responsive_page_inside_container_top_padding',
        'responsive_page_inside_container_right_padding',
        'responsive_page_inside_container_bottom_padding',
        'responsive_page_inside_container_left_padding',
        'responsive_page_inside_container_tablet_top_padding',
        'responsive_page_inside_container_tablet_right_padding',
        'responsive_page_inside_container_tablet_bottom_padding',
        'responsive_page_inside_container_tablet_left_padding',
        'responsive_page_inside_container_mobile_top_padding',
        'responsive_page_inside_container_mobile_right_padding',
        'responsive_page_inside_container_mobile_bottom_padding',
        'responsive_page_inside_container_mobile_left_padding',
        'responsive_page_inside_container_desktop_unit',
        'responsive_page_inside_container_tablet_unit',
        'responsive_page_inside_container_mobile_unit'
    ];

    pageInsideContainerPaddingSettings.forEach(function(setting) {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_unit_box_padding(
                    'page_inside_container',
                    '.page:not(.front-page):not(.woocommerce-cart):not(.woocommerce-checkout):not(.page-template-gutenberg-fullwidth) .site-content .hentry'
                );
            });
        });
    });

} )( jQuery );