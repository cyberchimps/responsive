/**
 * This file makes customizer preview of responsive_number_control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

    function responsive_dynamic_radius(control, selector) {
        var mobile_menu_breakpoint = api('responsive_mobile_menu_breakpoint').get();
        if (0 == api('responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        jQuery('style#responsive-' + control + '-radius').remove();
        var desktopRadius = 'border-top-left-radius:' + api('responsive_' + control + '_radius_top_left_radius').get() + 'px; ' +
                            'border-top-right-radius:' + api('responsive_' + control + '_radius_top_right_radius').get() + 'px; ' +
                            'border-bottom-left-radius:' + api('responsive_' + control + '_radius_bottom_left_radius').get() + 'px; ' +
                            'border-bottom-right-radius:' + api('responsive_' + control + '_radius_bottom_right_radius').get() + 'px;';
        var tabletRadius  = 'border-top-left-radius:' + api('responsive_' + control + '_radius_tablet_top_left_radius').get() + 'px; ' +
                            'border-top-right-radius:' + api('responsive_' + control + '_radius_tablet_top_right_radius').get() + 'px; ' +
                            'border-bottom-left-radius:' + api('responsive_' + control + '_radius_tablet_bottom_left_radius').get() + 'px; ' +
                            'border-bottom-right-radius:' + api('responsive_' + control + '_radius_tablet_bottom_right_radius').get() + 'px;';
        var mobileRadius  = 'border-top-left-radius:' + api('responsive_' + control + '_radius_mobile_top_left_radius').get() + 'px; ' +
                            'border-top-right-radius:' + api('responsive_' + control + '_radius_mobile_top_right_radius').get() + 'px; ' +
                            'border-bottom-left-radius:' + api('responsive_' + control + '_radius_mobile_bottom_left_radius').get() + 'px; ' +
                            'border-bottom-right-radius:' + api('responsive_' + control + '_radius_mobile_bottom_right_radius').get() + 'px;';

        jQuery('head').append(
            '<style id="responsive-' + control + '-radius">' +
            selector + ' { ' + desktopRadius + ' }' +
            '@media (max-width: ' + mobile_menu_breakpoint + 'px) {' + selector + ' { ' + tabletRadius + ' } }' +
            '@media (max-width: 544px) {' + selector + ' { ' + mobileRadius + ' } }' +
            '</style>'
        );
    }
    function responsive_dynamic_border_width(control, selector) {
        var mobile_menu_breakpoint = api('responsive_mobile_menu_breakpoint').get();
        if (0 == api('responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }
        jQuery('style#responsive-' + control + '-radius').remove();
        jQuery('style#responsive-' + control).remove();
        var desktopBorderWidth = 'border-top-width:' + api('responsive_' + control + '_top_border').get() + 'px; ' +
                                 'border-right-width:' + api('responsive_' + control + '_right_border').get() + 'px; ' +
                                 'border-bottom-width:' + api('responsive_' + control + '_bottom_border').get() + 'px; ' +
                                 'border-left-width:' + api('responsive_' + control + '_left_border').get() + 'px;';
        var tabletBorderWidth = 'border-top-width:' + api('responsive_' + control + '_tablet_top_border').get() + 'px; ' +
                                'border-right-width:' + api('responsive_' + control + '_tablet_right_border').get() + 'px; ' +
                                'border-bottom-width:' + api('responsive_' + control + '_tablet_bottom_border').get() + 'px; ' +
                                'border-left-width:' + api('responsive_' + control + '_tablet_left_border').get() + 'px;';
        var mobileBorderWidth = 'border-top-width:' + api('responsive_' + control + '_mobile_top_border').get() + 'px; ' +
                                'border-right-width:' + api('responsive_' + control + '_mobile_right_border').get() + 'px; ' +
                                'border-bottom-width:' + api('responsive_' + control + '_mobile_bottom_border').get() + 'px; ' +
                                'border-left-width:' + api('responsive_' + control + '_mobile_left_border').get() + 'px;';

        jQuery('head').append(
            '<style id="responsive-' + control +'">' +
            selector + ' { ' + desktopBorderWidth + ' }' +
            '@media (max-width: ' + mobile_menu_breakpoint + 'px) {' + selector + ' { ' + tabletBorderWidth + ' } }' +
            '@media (max-width: 544px) {' + selector + ' { ' + mobileBorderWidth + ' } }' +
            '</style>'
        );
    }

    function responsive_layout_box_radius(control, selector) {
        let mobile_menu_breakpoint = api('responsive_mobile_menu_breakpoint').get();
        if (0 == api('responsive_disable_mobile_menu').get()) {
            mobile_menu_breakpoint = 0;
        }

        jQuery('style#responsive-' + control + '-radius').remove();
        let desktopRadius = 'border-top-left-radius:' + api('responsive_' + control + '_top_left_radius').get() + 'px; ' +
                            'border-top-right-radius:' + api('responsive_' + control + '_top_right_radius').get() + 'px; ' +
                            'border-bottom-left-radius:' + api('responsive_' + control + '_bottom_left_radius').get() + 'px; ' +
                            'border-bottom-right-radius:' + api('responsive_' + control + '_bottom_right_radius').get() + 'px;';
        let tabletRadius  = 'border-top-left-radius:' + api('responsive_' + control + '_tablet_top_left_radius').get() + 'px; ' +
                            'border-top-right-radius:' + api('responsive_' + control + '_tablet_top_right_radius').get() + 'px; ' +
                            'border-bottom-left-radius:' + api('responsive_' + control + '_tablet_bottom_left_radius').get() + 'px; ' +
                            'border-bottom-right-radius:' + api('responsive_' + control + '_tablet_bottom_right_radius').get() + 'px;';
        let mobileRadius  = 'border-top-left-radius:' + api('responsive_' + control + '_mobile_top_left_radius').get() + 'px; ' +
                            'border-top-right-radius:' + api('responsive_' + control + '_mobile_top_right_radius').get() + 'px; ' +
                            'border-bottom-left-radius:' + api('responsive_' + control + '_mobile_bottom_left_radius').get() + 'px; ' +
                            'border-bottom-right-radius:' + api('responsive_' + control + '_mobile_bottom_right_radius').get() + 'px;';

        jQuery('head').append(
            '<style id="responsive-' + control + '-radius">' +
            selector + ' { ' + desktopRadius + ' }' +
            '@media (max-width: ' + mobile_menu_breakpoint + 'px) {' + selector + ' { ' + tabletRadius + ' } }' +
            '@media (max-width: 544px) {' + selector + ' { ' + mobileRadius + ' } }' +
            '</style>'
        );
    }

    const headerSocialBorderRadius = [
        'responsive_header_social_radius_top_left_radius',
        'responsive_header_social_radius_bottom_left_radius',
        'responsive_header_social_radius_bottom_right_radius',
        'responsive_header_social_radius_top_right_radius',
        'responsive_header_social_radius_tablet_top_left_radius',
        'responsive_header_social_radius_tablet_top_right_radius',
        'responsive_header_social_radius_tablet_bottom_right_radius',
        'responsive_header_social_radius_tablet_bottom_left_radius',
        'responsive_header_social_radius_mobile_top_left_radius',
        'responsive_header_social_radius_mobile_top_right_radius',
        'responsive_header_social_radius_mobile_bottom_right_radius',
        'responsive_header_social_radius_mobile_bottom_left_radius',
    ];

    headerSocialBorderRadius.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_radius( 'header_social', '.header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' );
            });
        });
    });

    const footerSocialBorderRadius = [
        'responsive_footer_social_radius_top_left_radius',
        'responsive_footer_social_radius_bottom_left_radius',
        'responsive_footer_social_radius_bottom_right_radius',
        'responsive_footer_social_radius_top_right_radius',
        'responsive_footer_social_radius_tablet_top_left_radius',
        'responsive_footer_social_radius_tablet_top_right_radius',
        'responsive_footer_social_radius_tablet_bottom_right_radius',
        'responsive_footer_social_radius_tablet_bottom_left_radius',
        'responsive_footer_social_radius_mobile_top_left_radius',
        'responsive_footer_social_radius_mobile_top_right_radius',
        'responsive_footer_social_radius_mobile_bottom_right_radius',
        'responsive_footer_social_radius_mobile_bottom_left_radius',
    ];

    footerSocialBorderRadius.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_radius( 'footer_social', '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' );
            });
        });
    });

    //Theme Options Layout
    //Box Radius
    api( 'responsive_border_box', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .responsive-single-related-posts-container,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .responsive-single-related-posts-container,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed aside#secondary .widget-wrapper,.responsive-site-style-boxed .site-content article.product').css('border-radius', newval+'px' );
            $('.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,.woocommerce.responsive-site-style-content-boxed .products-wrapper,.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce.responsive-site-style-boxed ul.products li.product,.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,.woocommerce.single-product:not(.responsive-site-style-flat) div.product').css('border-radius', newval+'px' );
        } );
    } );

    //Buttons radius
    api( 'responsive_buttons_radius', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button').css('border-radius', newval+'px' );
            $('.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button').css('border-radius', newval+'px' );
            $('.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button').css('border-radius', newval+'px' );
        } );
    } );

    function applyBorderRadius(controlName) {
        api(controlName, function(value) {
            value.bind( function( newval ) {
                let selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
                if ( responsiveSiteLocalOptions.isElementorVersion ) {
                    selector += ', .elementor-button-wrapper .elementor-button';
                }
                selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
                selector += ', .edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button';
    
                responsive_dynamic_radius('buttons', selector);
            } );
        });
    }

    function applyBorderWidth(controlName) {
        api(controlName, function(value) {
            value.bind( function( newval ) {
                let selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
                selector += ', #add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
                selector += ', div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid';
    
                responsive_dynamic_border_width('inputs_border_width', selector);
            } );
        });
    }
    
    // Call the function for each border radius
    applyBorderRadius('responsive_buttons_radius_top_left_radius');
    applyBorderRadius('responsive_buttons_radius_top_right_radius');
    applyBorderRadius('responsive_buttons_radius_bottom_left_radius');
    applyBorderRadius('responsive_buttons_radius_bottom_right_radius');

    applyBorderRadius('responsive_buttons_radius_tablet_top_left_radius');
    applyBorderRadius('responsive_buttons_radius_tablet_top_right_radius');
    applyBorderRadius('responsive_buttons_radius_tablet_bottom_left_radius');
    applyBorderRadius('responsive_buttons_radius_tablet_bottom_right_radius');

    applyBorderRadius('responsive_buttons_radius_mobile_top_left_radius');
    applyBorderRadius('responsive_buttons_radius_mobile_top_right_radius');
    applyBorderRadius('responsive_buttons_radius_mobile_bottom_left_radius');
    applyBorderRadius('responsive_buttons_radius_mobile_bottom_right_radius');

    // Call the function for each form input fields border width
    applyBorderWidth('responsive_inputs_border_width_top_border');
    applyBorderWidth('responsive_inputs_border_width_right_border');
    applyBorderWidth('responsive_inputs_border_width_bottom_border');
    applyBorderWidth('responsive_inputs_border_width_left_border');

    applyBorderWidth('responsive_inputs_border_width_tablet_top_border');
    applyBorderWidth('responsive_inputs_border_width_tablet_right_border');
    applyBorderWidth('responsive_inputs_border_width_tablet_bottom_border');
    applyBorderWidth('responsive_inputs_border_width_tablet_left_border');

    applyBorderWidth('responsive_inputs_border_width_mobile_top_border');
    applyBorderWidth('responsive_inputs_border_width_mobile_right_border');
    applyBorderWidth('responsive_inputs_border_width_mobile_bottom_border');
    applyBorderWidth('responsive_inputs_border_width_mobile_left_border');

    //Buttons Border Width
    function applyButtonsBorderWidth(controlName) {
        api( controlName, function( value ) {
            value.bind( function( newval ) {
                let selector = '.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button';
                selector += ', .wp-block-button__link:focus,.wp-block-button__link:hover,.read-more-button .hentry .read-more .more-link:hover,.read-more-button .hentry .read-more .more-link:focus,input[type=button]:hover,input[type=submit]:hover,input[type=button]:focus,input[type=submit]:focus,button:not(.customize-partial-edit-shortcut-button):hover,button:not(.customize-partial-edit-shortcut-button):focus,.button:not(.customize-partial-edit-shortcut-button):hover,.button:not(.customize-partial-edit-shortcut-button):focus,div.wpforms-container-full .wpforms-form input[type=submit]:hover,div.wpforms-container-full .wpforms-form input[type=submit]:focus,div.wpforms-container-full .wpforms-form input[type=submit]:active,div.wpforms-container-full .wpforms-form button[type=submit]:hover,div.wpforms-container-full .wpforms-form button[type=submit]:focus,div.wpforms-container-full .wpforms-form button[type=submit]:active,div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,div.wpforms-container-full .wpforms-form .wpforms-page-button:active,div.wpforms-container-full .wpforms-form .wpforms-page-button:focus';
                selector += ', .woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button';
                selector += ', .edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button';
                selector += ', .edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link:focus,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button:focus,.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link:hover,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button:hover';
                selector += ', .elementor-widget-rael-button .rael-button, .wp-block-search__button';
                responsive_dynamic_border_width("buttons_border_width", selector);

            } );
        } );
    }   

    //Call the function for each button border width
    applyButtonsBorderWidth('responsive_buttons_border_width_top_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_right_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_bottom_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_left_border');

    applyButtonsBorderWidth('responsive_buttons_border_width_tablet_top_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_tablet_right_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_tablet_bottom_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_tablet_left_border');

    applyButtonsBorderWidth('responsive_buttons_border_width_mobile_top_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_mobile_right_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_mobile_bottom_border');
    applyButtonsBorderWidth('responsive_buttons_border_width_mobile_left_border');

    function applyInputsRadius(controlName) {
        api(controlName, function(value) {
            value.bind( function( newval ) {
                let selector = 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea';
                selector += ', #add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea';
    
                responsive_dynamic_radius('inputs', selector);
            } );
        });
    }

    // Call the function for each input radius
    applyInputsRadius('responsive_inputs_radius_top_left_radius');
    applyInputsRadius('responsive_inputs_radius_top_right_radius');
    applyInputsRadius('responsive_inputs_radius_bottom_left_radius');
    applyInputsRadius('responsive_inputs_radius_bottom_right_radius');

    applyInputsRadius('responsive_inputs_radius_tablet_top_left_radius');
    applyInputsRadius('responsive_inputs_radius_tablet_top_right_radius');
    applyInputsRadius('responsive_inputs_radius_tablet_bottom_left_radius');
    applyInputsRadius('responsive_inputs_radius_tablet_bottom_right_radius');

    applyInputsRadius('responsive_inputs_radius_mobile_top_left_radius');
    applyInputsRadius('responsive_inputs_radius_mobile_top_right_radius');
    applyInputsRadius('responsive_inputs_radius_mobile_bottom_left_radius');
    applyInputsRadius('responsive_inputs_radius_mobile_bottom_right_radius');

    //Form Inputs Border Width
    api( 'responsive_inputs_border_width', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-width', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-width', newval+'px' );
            $('div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid').css('border-width', newval+'px' );
        } );
    } );

    //Footer Border width
    // api( 'responsive_footer_border_size', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.footer-bar').css('border-top-width', newval+'px' );
    //     } );
    // } );

    //Buttons radius
    api( 'responsive_menu_button_radius', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu-toggle').css('border-radius', newval+'px' );
            $('.main-navigation.toggled .menu-toggle').css('border-radius', newval+'px' );
        } );
    } );

    const headerButtonBorderRadius = [
        'responsive_header_button_radius_top_left_radius',
        'responsive_header_button_radius_bottom_left_radius',
        'responsive_header_button_radius_bottom_right_radius',
        'responsive_header_button_radius_top_right_radius',
        'responsive_header_button_radius_tablet_top_left_radius',
        'responsive_header_button_radius_tablet_top_right_radius',
        'responsive_header_button_radius_tablet_bottom_right_radius',
        'responsive_header_button_radius_tablet_bottom_left_radius',
        'responsive_header_button_radius_mobile_top_left_radius',
        'responsive_header_button_radius_mobile_top_right_radius',
        'responsive_header_button_radius_mobile_bottom_right_radius',
        'responsive_header_button_radius_mobile_bottom_left_radius',
    ];

    headerButtonBorderRadius.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_radius( 'header_button', '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' );
            });
        });
    });
    // Apply Header Search element border radius - Start.
    const headerSearchBorderRadius = [
        'responsive_header_search_border_radius_top_left_radius',
        'responsive_header_search_border_radius_bottom_left_radius',
        'responsive_header_search_border_radius_bottom_right_radius',
        'responsive_header_search_border_radius_top_right_radius',
        'responsive_header_search_border_radius_tablet_top_left_radius',
        'responsive_header_search_border_radius_tablet_top_right_radius',
        'responsive_header_search_border_radius_tablet_bottom_right_radius',
        'responsive_header_search_border_radius_tablet_bottom_left_radius',
        'responsive_header_search_border_radius_mobile_top_left_radius',
        'responsive_header_search_border_radius_mobile_top_right_radius',
        'responsive_header_search_border_radius_mobile_bottom_right_radius',
        'responsive_header_search_border_radius_mobile_bottom_left_radius',
    ];

    headerSearchBorderRadius.forEach(setting => {
        api(setting, function(value) {
            value.bind(function(newval) {
                responsive_dynamic_radius( 'header_search_border', '.responsive-header-search-icon-wrap' );
            });
        });
    });
    api( 'responsive_header_search_style_design', function(setting) {
        setting.bind(function(style) {
            if( 'bordered' === style ) {
                headerSearchBorderRadius.forEach(setting => {
                    responsive_dynamic_radius( 'header_search_border', '.responsive-header-search-icon-wrap' );
                });
            }
        });
    });
    // Apply Header Search element border radius - End

    function applyLayoutBoxRadius(controlName) {
        api(controlName, function(value) {
            value.bind( function( newval ) {
                let selector = '.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .give-wrap .give_forms,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .responsive-single-related-posts-container,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .give-wrap .give_forms,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .responsive-single-related-posts-container,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed aside#secondary .widget-wrapper,.responsive-site-style-boxed .site-content article.product';
    
                responsive_layout_box_radius('box', selector);
            } );
        });
    }

    // Call the function for each box radius
    applyLayoutBoxRadius('responsive_box_top_left_radius');
    applyLayoutBoxRadius('responsive_box_top_right_radius');
    applyLayoutBoxRadius('responsive_box_bottom_left_radius');
    applyLayoutBoxRadius('responsive_box_bottom_right_radius');

    applyLayoutBoxRadius('responsive_box_tablet_top_left_radius');
    applyLayoutBoxRadius('responsive_box_tablet_top_right_radius');
    applyLayoutBoxRadius('responsive_box_tablet_bottom_left_radius');
    applyLayoutBoxRadius('responsive_box_tablet_bottom_right_radius');

    applyLayoutBoxRadius('responsive_box_mobile_top_left_radius');
    applyLayoutBoxRadius('responsive_box_mobile_top_right_radius');
    applyLayoutBoxRadius('responsive_box_mobile_bottom_left_radius');
    applyLayoutBoxRadius('responsive_box_mobile_bottom_right_radius');

    function shopPageCardRadius() {
        function getRadiusValues(prefix) {
            return {
            tl: parseInt(api(prefix + '_top_left_radius')(), 10) || 0,
            tr: parseInt(api(prefix + '_top_right_radius')(), 10) || 0,
            br: parseInt(api(prefix + '_bottom_right_radius')(), 10) || 0,
            bl: parseInt(api(prefix + '_bottom_left_radius')(), 10) || 0
            };
        }

        // Desktop
        var { tl, tr, br, bl } = getRadiusValues('responsive_shop_product');

        // Tablet
        var { tl: tablet_tl, tr: tablet_tr, br: tablet_br, bl: tablet_bl } = getRadiusValues('responsive_shop_product_tablet');

        // Mobile
        var { tl: mobile_tl, tr: mobile_tr, br: mobile_br, bl: mobile_bl } = getRadiusValues('responsive_shop_product_mobile');

        // Breakpoints
        var mobileBreakPoint = 544;

        // Helper to generate CSS for a given set of radius values and a media query
        function generateProductRadiusCSS({ tl, tr, br, bl }, minWidth, maxWidth) {
            let media = '';
            if (minWidth !== undefined && maxWidth !== undefined) {
            media = `@media screen and (max-width: ${maxWidth}px) and (min-width: ${minWidth}px) {`;
            } else if (maxWidth !== undefined) {
            media = `@media screen and (max-width: ${maxWidth}px) {`;
            }
            let css = `
            .woocommerce ul.products li.product,
            .woocommerce-page ul.products li.product {
                border-radius: ${tl}px ${tr}px ${br}px ${bl}px !important;
            }
            .woocommerce ul.products li.product a.woocommerce-LoopProduct-link img,
            .woocommerce-page ul.products li.product a.woocommerce-LoopProduct-link img {
                -webkit-clip-path: inset(0 round ${tl}px ${tr}px 0 0) !important;
                    clip-path: inset(0 round ${tl}px ${tr}px 0 0) !important;
                border-top-left-radius: ${tl}px !important;
                border-top-right-radius: ${tr}px !important;
            }
            `;
            if (media) {
            css = `${media}${css}\n}`;
            }
            return css;
        }

        // Default desktop
        var radiusCSS = generateProductRadiusCSS(
            { tl, tr, br, bl }
        );

        // Tablet (mobileBreakPoint < width < 992px)
        radiusCSS += generateProductRadiusCSS(
            { tl: tablet_tl, tr: tablet_tr, br: tablet_br, bl: tablet_bl },
            parseInt(mobileBreakPoint) + 1,
            991
        );

        // Mobile (<= mobileBreakPoint)
        radiusCSS += generateProductRadiusCSS(
            { tl: mobile_tl, tr: mobile_tr, br: mobile_br, bl: mobile_bl },
            undefined,
            mobileBreakPoint
        );

        var styleTag = $('#responsive-product-radius-live');
        if (!styleTag.length) {
            styleTag = $('<style id="responsive-product-radius-live"></style>').appendTo('head');
        }
        styleTag.html(radiusCSS);
    }

    [
        'responsive_shop_product_top_left_radius',
        'responsive_shop_product_top_right_radius',
        'responsive_shop_product_bottom_right_radius',
        'responsive_shop_product_bottom_left_radius',
        'responsive_shop_product_tablet_top_left_radius',
        'responsive_shop_product_tablet_top_right_radius',
        'responsive_shop_product_tablet_bottom_right_radius',
        'responsive_shop_product_tablet_bottom_left_radius',
        'responsive_shop_product_mobile_top_left_radius',
        'responsive_shop_product_mobile_top_right_radius',
        'responsive_shop_product_mobile_bottom_right_radius',
        'responsive_shop_product_mobile_bottom_left_radius'
    ].forEach(function(id){
        api(id, function(value){ value.bind(shopPageCardRadius); });
    });

} )( jQuery );
