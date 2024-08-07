/**
 * This file makes customizer preview of responsive_number_control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

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

    //Buttons Border Width
    api( 'responsive_buttons_border_width', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button').css('border-width', newval+'px' );
            $('.wp-block-button__link:focus,.wp-block-button__link:hover,.read-more-button .hentry .read-more .more-link:hover,.read-more-button .hentry .read-more .more-link:focus,input[type=button]:hover,input[type=submit]:hover,input[type=button]:focus,input[type=submit]:focus,button:hover,button:focus,.button:hover,.button:focus,div.wpforms-container-full .wpforms-form input[type=submit]:hover,div.wpforms-container-full .wpforms-form input[type=submit]:focus,div.wpforms-container-full .wpforms-form input[type=submit]:active,div.wpforms-container-full .wpforms-form button[type=submit]:hover,div.wpforms-container-full .wpforms-form button[type=submit]:focus,div.wpforms-container-full .wpforms-form button[type=submit]:active,div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,div.wpforms-container-full .wpforms-form .wpforms-page-button:active,div.wpforms-container-full .wpforms-form .wpforms-page-button:focus').css('border-width', newval+'px' );
            $('.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button').css('border-width', newval+'px' );
            $('.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button').css('border-width', newval+'px' );
            $('.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link:focus,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button:focus,.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link:hover,.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button:hover').css('border-width', newval+'px' );
        } );
    } );

    //Form Inputs radius
    api( 'responsive_inputs_radius', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-radius', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-radius', newval+'px' );
        } );
    } );

    //Form Inputs Border Width
    api( 'responsive_inputs_border_width', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-width', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-width', newval+'px' );
            $('div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid').css('border-width', newval+'px' );
        } );
    } );

    //Form Inputs Border Top Width
    api( 'responsive_inputs_border_width_top_border', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-top-width', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-top-width', newval+'px' );
            $('div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid').css('border-top-width', newval+'px' );
        } );
    } );

    //Footer Border Right width
    api( 'responsive_inputs_border_width_right_border', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-right-width', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-right-width', newval+'px' );
            $('div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid').css('border-right-width', newval+'px' );
        } );
    } );

    //Footer Border Bottom width
    api( 'responsive_inputs_border_width_bottom_border', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-bottom-width', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-bottom-width', newval+'px' );
            $('div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid').css('border-bottom-width', newval+'px' );
        } );
    } );
    //Footer Border Left width
    api( 'responsive_inputs_border_width_left_border', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('border-left-width', newval+'px' );
            $('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-left-width', newval+'px' );
            $('div.wpforms-container-full .wpforms-form .wpforms-field input.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field input.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field textarea.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field textarea.user-invalid,div.wpforms-container-full .wpforms-form .wpforms-field select.wpforms-error,div.wpforms-container-full .wpforms-form .wpforms-field select.user-invalid').css('border-left-width', newval+'px' );
        } );
    } );

    //Footer Border width
    api( 'responsive_footer_border_size', function( value ) {
        value.bind( function( newval ) {
            $('.footer-bar').css('border-top-width', newval+'px' );
        } );
    } );

    //Buttons radius
    api( 'responsive_menu_button_radius', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu-toggle').css('border-radius', newval+'px' );
            $('.main-navigation.toggled .menu-toggle').css('border-radius', newval+'px' );
        } );
    } );

} )( jQuery );
