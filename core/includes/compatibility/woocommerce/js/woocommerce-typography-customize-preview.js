/**
 * Update Typography Customizer settings live.
 *
 * @version 1.0.0
 */
// phpcs:ignoreFile
( function( $ ) {

    // Declare vars
    var api = wp.customize;
    /******** TYPOGRAPHY OPTIONS LOOP *********/
    api("single_product_title_shop_typography[font-family]", function ($swipe) {
        $swipe.bind(function (pair) {
            if (pair) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = (fontName.trim().toLowerCase().replace(" ", "-"), "customizer-typography-single-product_title-font-family");
                var fontSize = fontName.replace(" ", "%20");
                fontSize = fontSize.replace(",", "%2C");
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ($("#" + idfirst).length) {
                    $("#" + idfirst).attr("href", fontSize);
                } else {
                    $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                }
            }
            jQuery( 'style.customizer-typography-single_product_title-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-font-family">'
                + '.single-product div.product .entry-title { font-family:' + pair +' }'
                + '</style>'
            );

        });
    }),  api( "single_product_title_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-font-weight">'
                + '.single-product div.product .entry-title{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-font-style">'
                + '.single-product div.product .entry-title{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-font-size">'
                + '.single-product div.product .entry-title{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.single-product div.product .entry-title{ font-size:' + api( "single_product_title_tablet_typography[font-size]" ).get()  +';}}'
                + '@media (max-width: 480px){.single-product div.product .entry-title{ font-size:' + api( "single_product_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-tablet-font-size">'
                + '@media (max-width: 768px){.single-product div.product .entry-title{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.single-product div.product .entry-title{ font-size:' + api( "single_product_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-mobile-font-size">'
                + '@media (max-width: 480px){.single-product div.product .entry-title{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-color">'
                + '.single-product div.product .entry-title{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-line-height">'
                + '.single-product div.product .entry-title{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-tablet-line-height">'
                + '@media (max-width: 768px){.single-product div.product .entry-title{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-mobile-line-height">'
                + '@media (max-width: 480px){.single-product div.product .entry-title{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-letter-spacing">'
                + '.single-product div.product .entry-title{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-tablet-letter-spacing">'
                + '@media (max-width: 768px){.single-product div.product .entry-title{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-mobile-letter-spacing">'
                + '@media (max-width: 480px){.single-product div.product .entry-title{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_title_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_title-text-transform">'
                + '.single-product div.product .entry-title{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api("single_product_price_shop_typography[font-family]", function ($swipe) {
        $swipe.bind(function (pair) {
            if (pair) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = (fontName.trim().toLowerCase().replace(" ", "-"), "customizer-typography-single-product_price-font-family");
                var fontSize = fontName.replace(" ", "%20");
                fontSize = fontSize.replace(",", "%2C");
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ($("#" + idfirst).length) {
                    $("#" + idfirst).attr("href", fontSize);
                } else {
                    $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                }
            }
            jQuery( 'style.customizer-typography-single_product_price-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-font-family">'
                + '.single-product div.product p.price,.single-product div.product p.price ins { font-family:' + pair +' }'
                + '</style>'
            );

        });
    }),  api( "single_product_price_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-font-weight">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-font-style">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-font-size">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.single-product div.product p.price,.single-product div.product p.price ins{ font-size:' + api( "single_product_price_tablet_typography[font-size]" ).get() +';}}'
                + '@media (max-width: 480px){.single-product div.product p.price,.single-product div.product p.price ins{ font-size:' + api( "single_product_price_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-tablet-font-size">'
                + '@media (max-width: 768px){.single-product div.product p.price,.single-product div.product p.price ins{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.single-product div.product p.price,.single-product div.product p.price ins{ font-size:' + api( "single_product_price_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-mobile-font-size">'
                + '@media (max-width: 480px){.single-product div.product p.price,.single-product div.product p.price ins{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-color">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-line-height">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-tablet-line-height">'
                + '@media (max-width: 768px){.single-product div.product p.price,.single-product div.product p.price ins{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-mobile-line-height">'
                + '@media (max-width: 480px){.single-product div.product p.price,.single-product div.product p.price ins{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-letter-spacing">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-tablet-letter-spacing">'
                + '@media (max-width: 768px){.single-product div.product p.price,.single-product div.product p.price ins{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-mobile-letter-spacing">'
                + '@media (max-width: 480px){.single-product div.product p.price,.single-product div.product p.price ins{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_price_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_price-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_price-text-transform">'
                + '.single-product div.product p.price,.single-product div.product p.price ins{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api("single_product_content_shop_typography[font-family]", function ($swipe) {
        $swipe.bind(function (pair) {
            if (pair) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = (fontName.trim().toLowerCase().replace(" ", "-"), "customizer-typography-single-product_content-font-family");
                var fontSize = fontName.replace(" ", "%20");
                fontSize = fontSize.replace(",", "%2C");
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ($("#" + idfirst).length) {
                    $("#" + idfirst).attr("href", fontSize);
                } else {
                    $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                }
            }
            jQuery( 'style.customizer-typography-single_product_content-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-font-family">'
                + '.single-product .woocommerce-product-details__short-description, .single-product .woocommerce-Tabs-panel--description { font-family:' + pair +' }'
                + '</style>'
            );

        });
    }),  api( "single_product_content_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-font-weight">'
                + '.single-product p{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-font-style">'
                + '.single-product p{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-font-size">'
                + '.single-product p{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.single-product p{ font-size:' + api( "single_product_content_tablet_typography[font-size]" ).get() +';}}'
                + '@media (max-width: 480px){.single-product p{ font-size:' + api( "single_product_content_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-tablet-font-size">'
                + '@media (max-width: 768px){.single-product p{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.single-product p{ font-size:' + api( "single_product_content_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-mobile-font-size">'
                + '@media (max-width: 480px){.single-product p{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-color">'
                + '.single-product p{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-line-height">'
                + '.single-product p{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-tablet-line-height">'
                + '@media (max-width: 768px){.single-product p{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-mobile-line-height">'
                + '@media (max-width: 480px){.single-product p{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-letter-spacing">'
                + '.single-product p{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-tablet-letter-spacing">'
                + '@media (max-width: 768px){.single-product p{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-mobile-letter-spacing">'
                + '@media (max-width: 480px){.single-product p{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_content_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_content-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_content-text-transform">'
                + '.single-product p{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api("single_product_page_breadcrumb_shop_typography[font-family]", function ($swipe) {
        $swipe.bind(function (pair) {
            if (pair) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = (fontName.trim().toLowerCase().replace(" ", "-"), "customizer-typography-single-product_breadcrumb-font-family");
                var fontSize = fontName.replace(" ", "%20");
                fontSize = fontSize.replace(",", "%2C");
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ($("#" + idfirst).length) {
                    $("#" + idfirst).attr("href", fontSize);
                } else {
                    $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                }
            }
            jQuery( 'style.customizer-typography-single_product_breadcrumb-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_breadcrumb-font-family">'
                + '.single-product .woocommerce-breadcrumb { font-family:' + pair +' }'
                + '</style>'
            );

        });
    }),  api( "single_product_page_breadcrumb_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-font-weight">'
                + '.single-product .woocommerce-breadcrumb{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-font-style">'
                + '.single-product .woocommerce-breadcrumb{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-font-size">'
                + '.single-product .woocommerce-breadcrumb{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.single-product .woocommerce-breadcrumb{ font-size:' + api( "single_product_page_breadcrumb_tablet_typography[font-size]" ).get() +';}}'
                + '@media (max-width: 480px){.single-product .woocommerce-breadcrumb{ font-size:' + api( "single_product_page_breadcrumb_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-tablet-font-size">'
                + '@media (max-width: 768px){.single-product .woocommerce-breadcrumb{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.single-product .woocommerce-breadcrumb{ font-size:' + api( "single_product_page_breadcrumb_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-mobile-font-size">'
                + '@media (max-width: 480px){.single-product .woocommerce-breadcrumb{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-color">'
                + '.single-product .woocommerce-breadcrumb,  .single-product .woocommerce-breadcrumb a{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-line-height">'
                + '.single-product .woocommerce-breadcrumb{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-tablet-line-height">'
                + '@media (max-width: 768px){.single-product .woocommerce-breadcrumb{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-mobile-line-height">'
                + '@media (max-width: 480px){.single-product .woocommerce-breadcrumb{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-letter-spacing">'
                + '.single-product .woocommerce-breadcrumb{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-tablet-letter-spacing">'
                + '@media (max-width: 768px){.single-product .woocommerce-breadcrumb{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-mobile-letter-spacing">'
                + '@media (max-width: 480px){.single-product .woocommerce-breadcrumb{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "single_product_page_breadcrumb_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-single_product_page_breadcrumb-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-single_product_page_breadcrumb-text-transform">'
                + '.single-product .woocommerce-breadcrumb{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api( "product_title_shop_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-product_title-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( $( "#" + idfirst ).length ) {
                    $( "#" + idfirst ).attr( "href", fontSize );
                } else {
                    $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                }
            }
            jQuery( 'style.customizer-typography-product_title-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-font-family">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title { font-family:' + pair +' }'
                + '</style>'
            );

        } );
    } ),  api( "product_title_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-font-weight">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_title_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-font-style">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_title_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-font-size">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-size:' + api( "product_title_tablet_typography[font-size]" ).get() +';}}'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-size:' + api( "product_title_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-tablet-font-size">'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-size:' + api( "product_title_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-mobile-font-size">'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-color">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_title_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-line-height">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_title_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-tablet-line-height">'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-mobile-line-height">'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-letter-spacing">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "product_title_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-tablet-letter-spacing">'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-mobile-letter-spacing">'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "product_title_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_title-text-transform">'
                + '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-product_price-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( $( "#" + idfirst ).length ) {
                    $( "#" + idfirst ).attr( "href", fontSize );
                } else {
                    $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                }
            }
            jQuery( 'style.customizer-typography-product_price-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-font-family">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price { font-family:' + pair +' }'
                + '</style>'
            );

        } );
    } ),  api( "product_price_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-font-weight">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce ul.products li.product .price ins{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-font-style">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-font-size">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-size:' + api("product_price_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-size:' + api("product_price_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-tablet-font-size">'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-size:' + api("product_price_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-mobile-font-size">'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-color">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-line-height">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_price_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-tablet-line-height">'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-mobile-line-height">'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-letter-spacing">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "product_price_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-tablet-letter-spacing">'
                + '@media (max-width: 768px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-mobile-letter-spacing">'
                + '@media (max-width: 480px){.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "product_price_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_price-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_price-text-transform">'
                + '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-shop_page_title-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( $( "#" + idfirst ).length ) {
                    $( "#" + idfirst ).attr( "href", fontSize );
                } else {
                    $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                }
            }
            jQuery( 'style.customizer-typography-shop_page_title-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-font-family">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title { font-family:' + pair +' }'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-font-weight">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-font-style">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-font-size">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-size:' + api( "shop_page_title_tablet_typography[font-size]" ).get() +';}}'
                + '@media (max-width: 480px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-size:' + api( "shop_page_title_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-tablet-font-size">'
                + '@media (max-width: 768px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-size:' + api( "shop_page_title_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-mobile-font-size">'
                + '@media (max-width: 480px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-color">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-line-height">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-tablet-line-height">'
                + '@media (max-width: 768px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-mobile-line-height">'
                + '@media (max-width: 480px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-letter-spacing">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-tablet-letter-spacing">'
                + '@media (max-width: 768px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-mobile-letter-spacing">'
                + '@media (max-width: 480px){.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "shop_page_title_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-shop_page_title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-shop_page_title-text-transform">'
                + '.woocommerce-products-header h1, .woocommerce-products-header .woocommerce-products-header__title{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-product_content-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( $( "#" + idfirst ).length ) {
                    $( "#" + idfirst ).attr( "href", fontSize );
                } else {
                    $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                }
            }
            jQuery( 'style.customizer-typography-product_content-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-font-family">'
                + '.responsive-shop-summary-wrap p { font-family:' + pair +' }'
                + '</style>'
            );

        } );
    } ),  api( "product_content_shop_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-font-weight">'
                + '.responsive-shop-summary-wrap p{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-font-style">'
                + '.responsive-shop-summary-wrap p{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-font-size">'
                + '.responsive-shop-summary-wrap p{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){.responsive-shop-summary-wrap p{ font-size:' + api( "product_content_tablet_typography[font-size]" ).get() +';}}'
                + '@media (max-width: 480px){.responsive-shop-summary-wrap p{ font-size:' + api( "product_content_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-tablet-font-size">'
                + '@media (max-width: 768px){.responsive-shop-summary-wrap p{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){.responsive-shop-summary-wrap p{ font-size:' + api( "product_content_mobile_typography[font-size]" ).get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-mobile-font-size">'
                + '@media (max-width: 480px){.responsive-shop-summary-wrap p{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[color]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-color' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-color">'
                + '.responsive-shop-summary-wrap p{ color:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-line-height">'
                + '.responsive-shop-summary-wrap p{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "product_content_tablet_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-tablet-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-tablet-line-height">'
                + '@media (max-width: 768px){.responsive-shop-summary-wrap p{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_mobile_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-mobile-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-mobile-line-height">'
                + '@media (max-width: 480px){.responsive-shop-summary-wrap p{ line-height:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-letter-spacing">'
                + '.responsive-shop-summary-wrap p{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "product_content_tablet_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-tablet-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-tablet-letter-spacing">'
                + '@media (max-width: 768px){.responsive-shop-summary-wrap p{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_mobile_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-mobile-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-mobile-letter-spacing">'
                + '@media (max-width: 480px){.responsive-shop-summary-wrap p{ letter-spacing:' + dataAndEvents +'px;}}'
                + '</style>'
            );

        } );
    } ), api( "product_content_shop_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-product_content-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-product_content-text-transform">'
                + '.responsive-shop-summary-wrap p{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } );

} )( jQuery );
