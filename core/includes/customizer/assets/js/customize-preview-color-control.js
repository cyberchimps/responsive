/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

    //Header section
    //Update header background color...
    api( 'responsive_header_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-header').css('background-color', newval );
        } );
    } );

    //Update header border color...
    api( 'responsive_header_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-header').css('border-bottom-color', newval );
        } );
    } );

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
            $('.header-widgets').css('background-color', newval );
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

    //Site Colors
    //Box Background Color
    api( 'responsive_box_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed aside#secondary .widget-wrapper,.responsive-site-style-boxed .site-content article.product,.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,.woocommerce.responsive-site-style-content-boxed .products-wrapper,.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,.woocommerce-page.responsive-site-style-boxed ul.products li.product,.woocommerce.responsive-site-style-boxed ul.products li.product,.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,.woocommerce.single-product:not(.responsive-site-style-flat) div.product').css('background-color', newval );
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

    //H1 text Color
    api( 'responsive_h1_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h1').css('color', newval );
        } );
    } );

    //H2 text Color
    api( 'responsive_h2_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h2').css('color', newval );
        } );
    } );

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
            $('a').css('color', newval );
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
    //Active Menu Background Color
    api( 'responsive_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu  .current_page_item > a,.main-navigation .menu  .current-menu-item > a,.main-navigation .menu  li > a:hover').css('background-color', newval );
        } );
    } );

    //Menu Item Link Color
    api( 'responsive_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu > li > a').css('color', newval );
        } );
    } );

    //Sub Menu Background Color
    api( 'responsive_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children,.main-navigation .sub-menu').css('background-color', newval );
        } );
    } );

    //Sub Menu Item Link Color
    api( 'responsive_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children li a,.main-navigation .sub-menu li a').css('color', newval );
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
            $('.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button ').css('border-color', newval );
        } );
    } );

    //Button Text Color
    api( 'responsive_cart_buttons_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button').css('color', newval );
        } );
    } );

    //Checkout Button Color
    api( 'responsive_cart_checkout_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button').css('background-color', newval );
        } );
    } );

    //Checkout Button Text Color
    api( 'responsive_cart_checkout_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button').css('color', newval );
        } );
    } );

} )( jQuery );