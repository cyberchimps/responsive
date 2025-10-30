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
    if ( responsive.isThemeGreater ) {
        api( "page_title_typography[font-family]", function( $swipe ) {
            $swipe.bind( function( pair ) {
                if ( pair ) {
                    /** @type {string} */
                    var fontName = pair.split(",")[0];
                    fontName = fontName.replace(/'/g, '');
                    var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-page_title-font-family" );
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
                jQuery( 'style.customizer-typography-page_title-font-family' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-font-family">'
                    + '.page .post-title, #main-blog h1 { font-family:' + pair +' }'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[font-weight]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-font-weight' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-font-weight">'
                    + '.page .post-title, #main-blog h1{ font-weight:' + dataAndEvents +';}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[font-style]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-font-style' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-font-style">'
                    + '.page .post-title, #main-blog h1{ font-style:' + dataAndEvents +';}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[font-size]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-font-size' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-font-size">'
                    + '.page .post-title, #main-blog h1{ font-size:' + dataAndEvents +';}'
                    + '@media (max-width: 768px){.page .post-title, #main-blog h1{ font-size:' + api( "page_title_tablet_typography[font-size]" ).get() +';}}'
                    + '@media (max-width: 480px){.page .post-title, #main-blog h1{ font-size:' + api( "page_title_mobile_typography[font-size]" ).get() +';}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_tablet_typography[font-size]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-tablet-font-size' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-tablet-font-size">'
                    + '@media (max-width: 768px){.page .post-title, #main-blog h1{ font-size:' + dataAndEvents +';}}'
                    + '@media (max-width: 480px){.page .post-title, #main-blog h1{ font-size:' + api( "page_title_mobile_typography[font-size]" ).get() +';}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_mobile_typography[font-size]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-mobile-font-size' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-mobile-font-size">'
                    + '@media (max-width: 480px){.page .post-title, #main-blog h1{ font-size:' + dataAndEvents +';}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[color]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-color' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-color">'
                    + '.page .post-title, #main-blog h1{ color:' + dataAndEvents +';}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[line-height]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-line-height' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-line-height">'
                    + '.page .post-title, #main-blog h1{ line-height:' + dataAndEvents +';}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_tablet_typography[line-height]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-tablet-line-height' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-tablet-line-height">'
                    + '@media (max-width: 768px){.page .post-title, #main-blog h1{ line-height:' + dataAndEvents +';}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_mobile_typography[line-height]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-mobile-line-height' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-mobile-line-height">'
                    + '@media (max-width: 480px){.page .post-title, #main-blog h1{ line-height:' + dataAndEvents +';}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[letter-spacing]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-letter-spacing' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-letter-spacing">'
                    + '.page .post-title, #main-blog h1{ letter-spacing:' + dataAndEvents +'px;}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_tablet_typography[letter-spacing]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-tablet-letter-spacing' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-tablet-letter-spacing">'
                    + '@media (max-width: 768px){.page .post-title, #main-blog h1{ letter-spacing:' + dataAndEvents +'px;}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_mobile_typography[letter-spacing]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-mobile-letter-spacing' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-mobile-letter-spacing">'
                    + '@media (max-width: 480px){.page .post-title, #main-blog h1{ letter-spacing:' + dataAndEvents +'px;}}'
                    + '</style>'
                );
    
            } );
        } ), api( "page_title_typography[text-transform]", function( $swipe ) {
            $swipe.bind( function( dataAndEvents ) {
                jQuery( 'style.customizer-typography-page_title-text-transform' ).remove();
                jQuery( 'head' ).append(
                    '<style class="customizer-typography-page_title-text-transform">'
                    + '.page .post-title, #main-blog h1{ text-transform:' + dataAndEvents +';}'
                    + '</style>'
                );
    
            } );
        } )
    }
    api( "body_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-body-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-body-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-family">'
                + responsive.selectorArray['body'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "body_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-body-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-weight">'
                + responsive.selectorArray['body'] + ' { font-weight:' + dataAndEvents +' }'
                + '</style>'
            );
        } );
    } ), api( "body_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-style">'
                + responsive.selectorArray['body'] + ' { font-style:' + dataAndEvents +' }'
                + '</style>'
            );
        } );
    } ), api( "body_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-size">'
                + responsive.selectorArray['body'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['body'] +'{ font-size:' + api( "body_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['body'] +'{ font-size:' + api( "body_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "body_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-tablet-font-size">'
                + '@media (max-width: 768px){'+responsive.selectorArray['body'] + ' { font-size:' + dataAndEvents +' }}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['body'] +'{ font-size:' + api( "body_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "body_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['body'] + ' { font-size:' + dataAndEvents +' }}'
                + '</style>'
            );

        } );
    } ), api( "body_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-line-height">'
                + responsive.selectorArray['body'] + ' { line-height:' + dataAndEvents +' }'
                + '</style>'
            );

        } );
    } ), api( "body_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-letter-spacing">'
                + responsive.selectorArray['body'] + ' { letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "body_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-text-transform">'
                + responsive.selectorArray['body'] + ' { text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "headings_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {

            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-headings-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-headings-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-font-family">'
                + responsive.selectorArray['headings'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "headings_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-headings-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-font-weight">'
                + responsive.selectorArray['headings'] + ' { font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "headings_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-line-height">'
                + responsive.selectorArray['headings'] + ' { line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "headings_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-letter-spacing">'
                + responsive.selectorArray['headings'] + ' { letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "headings_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-text-transform">'
                + responsive.selectorArray['headings'] + ' { text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h1-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h1-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-family">'
                + responsive.selectorArray['heading_h1'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-heading_h1-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-weight">'
                + responsive.selectorArray['heading_h1'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-style">'
                + responsive.selectorArray['heading_h1'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-size">'
                + responsive.selectorArray['heading_h1'] + '{ font-size:' + api('heading_h1_typography_font_size_value').get() + api('heading_h1_typography_font_size_unit').get() +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h1'] +'{ font-size:' + api('heading_h1_tablet_typography_font_size_value').get() + api('heading_h1_tablet_typography_font_size_unit').get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h1'] +'{ font-size:' + api('heading_h1_mobile_typography_font_size_value').get() + api('heading_h1_mobile_typography_font_size_unit').get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h1'] +'{ font-size:' + api('heading_h1_tablet_typography_font_size_value').get() + api('heading_h1_tablet_typography_font_size_unit').get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h1'] +'{ font-size:' + api('heading_h1_mobile_typography_font_size_value').get() + api('heading_h1_mobile_typography_font_size_unit').get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h1'] +'{ font-size:' + api('heading_h1_mobile_typography_font_size_value').get() + api('heading_h1_mobile_typography_font_size_unit').get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-line-height">'
                + responsive.selectorArray['heading_h1'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-letter-spacing">'
                + responsive.selectorArray['heading_h1'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h1_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-text-transform">'
                + responsive.selectorArray['heading_h1'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h2-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h2-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-family">'
                + responsive.selectorArray['heading_h2'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-heading_h2-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-weight">'
                + responsive.selectorArray['heading_h2'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-style">'
                + responsive.selectorArray['heading_h2'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-size">'
                + responsive.selectorArray['heading_h2'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h2'] +'{ font-size:' + api( "heading_h2_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h2'] +'{ font-size:' + api( "heading_h2_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h2'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h2'] +'{ font-size:' + api( "heading_h2_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h2'] +'{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-line-height">'
                + responsive.selectorArray['heading_h2'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-letter-spacing">'
                + responsive.selectorArray['heading_h2'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-text-transform">'
                + responsive.selectorArray['heading_h2'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h3-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h3-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-family">'
                + responsive.selectorArray['heading_h3'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-heading_h3-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-weight">'
                + responsive.selectorArray['heading_h3'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-style">'
                + responsive.selectorArray['heading_h3'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-size">'
                + responsive.selectorArray['heading_h3'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h3'] +'{ font-size:' + api( "heading_h3_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h3'] +'{ font-size:' + api( "heading_h3_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h3'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h3'] +'{ font-size:' + api( "heading_h3_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h3'] +'{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-line-height">'
                + responsive.selectorArray['heading_h3'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-letter-spacing">'
                + responsive.selectorArray['heading_h3'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-text-transform">'
                + responsive.selectorArray['heading_h3'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h4-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h4-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-family">'
                + responsive.selectorArray['heading_h4'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-heading_h4-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-weight">'
                + responsive.selectorArray['heading_h4'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-style">'
                + responsive.selectorArray['heading_h4'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-size">'
                + responsive.selectorArray['heading_h4'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h4'] +'{ font-size:' + api( "heading_h4_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h4'] +'{ font-size:' + api( "heading_h4_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h4'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h4'] +'{ font-size:' + api( "heading_h4_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h4'] +'{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-line-height">'
                + responsive.selectorArray['heading_h4'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-letter-spacing">'
                + responsive.selectorArray['heading_h4'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-text-transform">'
                + responsive.selectorArray['heading_h4'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api( "heading_h5_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h5-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h5-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-family">'
                + responsive.selectorArray['heading_h5'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-heading_h5-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-weight">'
                + responsive.selectorArray['heading_h5'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-style">'
                + responsive.selectorArray['heading_h5'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-size">'
                + responsive.selectorArray['heading_h5'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h5'] +'{ font-size:' + api( "heading_h5_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h5'] +'{ font-size:' + api( "heading_h5_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h5'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h5'] +'{ font-size:' + api( "heading_h5_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h5'] +'{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-line-height">'
                + responsive.selectorArray['heading_h5'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-letter-spacing">'
                + responsive.selectorArray['heading_h5'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-text-transform">'
                + responsive.selectorArray['heading_h5'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h6-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h6-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-family">'
                + responsive.selectorArray['heading_h6'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            jQuery( 'style.customizer-typography-heading_h6-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-weight">'
                + responsive.selectorArray['heading_h6'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-style">'
                + responsive.selectorArray['heading_h6'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-size">'
                + responsive.selectorArray['heading_h6'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h6'] +'{ font-size:' + api( "heading_h6_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h6'] +'{ font-size:' + api( "heading_h6_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['heading_h6'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h6'] +'{ font-size:' + api( "heading_h6_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['heading_h6'] +'{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-line-height">'
                + responsive.selectorArray['heading_h6'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-letter-spacing">'
                + responsive.selectorArray['heading_h6'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-text-transform">'
                + responsive.selectorArray['heading_h6'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;

            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-meta-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-meta-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-family">'
                + responsive.selectorArray['meta'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            // if font preset is set then it should be having max priority
            $font_preset_set  = api( "responsive_font_presets" ).get();
            if ( '' !== $font_preset_set )  return;
            
            jQuery( 'style.customizer-typography-meta-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-weight">'
                + responsive.selectorArray['meta'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-style">'
                + responsive.selectorArray['meta'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-size">'
                + responsive.selectorArray['meta'] + '{ font-size:' + dataAndEvents +';}'
                + '@media (max-width: 768px){'+ responsive.selectorArray['meta'] +'{ font-size:' + api( "meta_tablet_typography[font-size]").get() +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['meta'] +'{ font-size:' + api( "meta_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "meta_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['meta'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['meta'] +'{ font-size:' + api( "meta_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "meta_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['meta'] +'{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-line-height">'
                + responsive.selectorArray['meta'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-letter-spacing">'
                + responsive.selectorArray['meta'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-text-transform">'
                + responsive.selectorArray['meta'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-button-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-button-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-family">'
                + responsive.selectorArray['button'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-weight">'
                + responsive.selectorArray['button'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-style">'
                + responsive.selectorArray['button'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-size">'
                + responsive.selectorArray['button'] + '{ font-size:' + dataAndEvents +';}'
        		+ '@media (max-width: 768px){'+ responsive.selectorArray['button'] +'{ font-size:' + api( "button_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['button'] +'{ font-size:' + api( "button_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "button_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['button'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['button'] +'{ font-size:' + api( "button_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "button_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['button'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-line-height">'
                + responsive.selectorArray['button'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-letter-spacing">'
                + responsive.selectorArray['button'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-text-transform">'
                + responsive.selectorArray['button'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-input-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-input-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-family">'
                + responsive.selectorArray['input'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-weight">'
                + responsive.selectorArray['input'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-style">'
                + responsive.selectorArray['input'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-size">'
                + responsive.selectorArray['input'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['input'] +'{ font-size:' + api( "input_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['input'] +'{ font-size:' + api( "input_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "input_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['input'] +'{ font-size:' + dataAndEvents +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['input'] +'{ font-size:' + api( "input_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "input_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-mobile-font-size">'
                + '@media (max-width: 480px){'+responsive.selectorArray['input'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-line-height">'
                + responsive.selectorArray['input'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-letter-spacing">'
                + responsive.selectorArray['input'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-text-transform">'
                + responsive.selectorArray['input'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-header_site_title-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_site_title-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-family">'
                + responsive.selectorArray['header_site_title2'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ),api( "header_site_title_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-weight">'
                + responsive.selectorArray['header_site_title2'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-style">'
                + responsive.selectorArray['header_site_title'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-size">'
                + responsive.selectorArray['header_site_title'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_site_title'] +'{ font-size:' + api( "header_site_title_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_site_title'] +'{ font-size:' + api( "header_site_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_site_title'] +'{ font-size:' + dataAndEvents +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_site_title'] +'{ font-size:' + api( "header_site_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_site_title2'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-line-height">'
                + responsive.selectorArray['header_site_title'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-letter-spacing">'
                + responsive.selectorArray['header_site_title'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-text-transform">'
                + responsive.selectorArray['header_site_title'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-header_site_tagline-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_site_tagline-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-family">'
                + responsive.selectorArray['header_site_tagline'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-weight">'
                + responsive.selectorArray['header_site_tagline'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-style">'
                + responsive.selectorArray['header_site_tagline'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-size">'
                + responsive.selectorArray['header_site_tagline'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_site_tagline'] +'{ font-size:' + api( "header_site_tagline_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_site_tagline'] +'{ font-size:' + api( "header_site_tagline_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_site_tagline'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_site_tagline'] +'{ font-size:' + api( "header_site_tagline_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_site_tagline'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-line-height">'
                + responsive.selectorArray['header_site_tagline'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-letter-spacing">'
                + responsive.selectorArray['header_site_tagline'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-text-transform">'
                + responsive.selectorArray['header_site_tagline'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-header_widgets-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_widgets-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-family">'
                + responsive.selectorArray['header_widgets'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-weight">'
                + responsive.selectorArray['header_widgets'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-style">'
                + responsive.selectorArray['header_widgets'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-size">'
                + responsive.selectorArray['header_widgets'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_widgets'] +'{ font-size:' + api( "header_widgets_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_widgets'] +'{ font-size:' + api( "header_widgets_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_widgets'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_widgets'] +'{ font-size:' + api( "header_widgets_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_widgets'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-line-height">'
                + responsive.selectorArray['header_widgets'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-letter-spacing">'
                + responsive.selectorArray['header_widgets'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-text-transform">'
                + responsive.selectorArray['header_widgets'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_menu_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_menu_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-family">'
                + responsive.selectorArray['header_menu'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-weight">'
                + responsive.selectorArray['header_menu'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-style">'
                + responsive.selectorArray['header_menu'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-size">'
                + responsive.selectorArray['header_menu'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_menu'] +'{ font-size:' + api( "header_menu_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_menu'] +'{ font-size:' + api( "header_menu_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_menu'] +'{ font-size:' + dataAndEvents +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_menu'] +'{ font-size:' + api( "header_menu_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_menu'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-line-height">'
                + responsive.selectorArray['header_menu'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-letter-spacing">'
                + responsive.selectorArray['header_menu'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-text-transform">'
                + responsive.selectorArray['header_menu'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_secondary_menu_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-font-family">'
                + responsive.selectorArray['header_secondary_menu'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-font-weight">'
                + responsive.selectorArray['header_secondary_menu'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-font-style">'
                + responsive.selectorArray['header_secondary_menu'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-font-size">'
                + responsive.selectorArray['header_secondary_menu'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_secondary_menu'] +'{ font-size:' + api( "header_secondary_menu_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_secondary_menu'] +'{ font-size:' + api( "header_secondary_menu_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_secondary_menu'] +'{ font-size:' + dataAndEvents +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_secondary_menu'] +'{ font-size:' + api( "header_secondary_menu_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_secondary_menu'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-line-height">'
                + responsive.selectorArray['header_secondary_menu'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-letter-spacing">'
                + responsive.selectorArray['header_secondary_menu'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_secondary_menu_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_secondary_menu_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_secondary_menu_typography-text-transform">'
                + responsive.selectorArray['header_secondary_menu'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-sidebar_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-sidebar_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-family">'
                + responsive.selectorArray['sidebar'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-weight">'
                + responsive.selectorArray['sidebar'] + ' { font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-style">'
                + responsive.selectorArray['sidebar'] + ' { font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-size">'
                + responsive.selectorArray['sidebar'] + '{ font-size:' + api('sidebar_typography_font_size_value').get() + api('sidebar_typography_font_size_unit').get() +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['sidebar'] +'{ font-size:' + api('sidebar_tablet_typography_font_size_value').get() + api('sidebar_tablet_typography_font_size_unit').get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['sidebar'] +'{ font-size:' + api('sidebar_mobile_typography_font_size_value').get() + api('sidebar_mobile_typography_font_size_unit').get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['sidebar'] +'{ font-size:' + api('sidebar_tablet_typography_font_size_value').get() + api('sidebar_tablet_typography_font_size_unit').get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['sidebar'] +'{ font-size:' + api('sidebar_mobile_typography_font_size_value').get() + api('sidebar_mobile_typography_font_size_unit').get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['sidebar'] + ' { font-size:' + api('sidebar_mobile_typography_font_size_value').get() + api('sidebar_mobile_typography_font_size_unit').get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-line-height">'
                + responsive.selectorArray['sidebar'] + ' { line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-letter-spacing">'
                + responsive.selectorArray['sidebar'] + ' { letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-text-transform">'
                + responsive.selectorArray['sidebar'] + ' { text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-content_header_heading-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-content_header_heading-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-family">'
                + responsive.selectorArray['content_header_heading'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-weight">'
                + responsive.selectorArray['content_header_heading'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-style">'
                + responsive.selectorArray['content_header_heading'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-size">'
                + responsive.selectorArray['content_header_heading'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['content_header_heading'] +'{ font-size:' + api( "content_header_heading_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['content_header_heading'] +'{ font-size:' + api( "content_header_heading_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['content_header_heading'] +'{ font-size:' + dataAndEvents +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['content_header_heading'] +'{ font-size:' + api( "content_header_heading_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['content_header_heading'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-line-height">'
                + responsive.selectorArray['content_header_heading'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-letter-spacing">'
                + responsive.selectorArray['content_header_heading'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-text-transform">'
                + responsive.selectorArray['content_header_heading'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-content_header_description-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-content_header_description-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-family">'
                + responsive.selectorArray['content_header_description'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-weight">'
                + responsive.selectorArray['content_header_description'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-style">'
                + responsive.selectorArray['content_header_description'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-size">'
                + responsive.selectorArray['content_header_description'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['content_header_description'] +'{ font-size:' + api( "content_header_description_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['content_header_description'] +'{ font-size:' + api( "content_header_description_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['content_header_description'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['content_header_description'] +'{ font-size:' + api( "content_header_description_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['content_header_description'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-line-height">'
                + responsive.selectorArray['content_header_description'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-letter-spacing">'
                + responsive.selectorArray['content_header_description'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-text-transform">'
                + responsive.selectorArray['content_header_description'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-breadcrumb-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-breadcrumb-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-family">'
                + responsive.selectorArray['breadcrumb'] + '{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ),  api( "breadcrumb_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-weight">'
                + responsive.selectorArray['breadcrumb'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-style">'
                + responsive.selectorArray['breadcrumb'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-size">'
                + responsive.selectorArray['breadcrumb'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['breadcrumb'] +'{ font-size:' + api( "breadcrumb_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['breadcrumb'] +'{ font-size:' + api( "breadcrumb_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['breadcrumb'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['breadcrumb'] +'{ font-size:' + api( "breadcrumb_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['breadcrumb'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-line-height">'
                + responsive.selectorArray['breadcrumb'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-letter-spacing">'
                + responsive.selectorArray['breadcrumb'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-text-transform">'
                + responsive.selectorArray['breadcrumb'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-rp_section_title_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-rp_section_title_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-font-family">'
                +  responsive.selectorArray['rp_section_title'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ), api( "rp_section_title_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-font-weight">'
                +  responsive.selectorArray['rp_section_title'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-font-style">'
                +  responsive.selectorArray['rp_section_title'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-font-size">'
                + responsive.selectorArray['rp_section_title'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['rp_section_title'] +'{ font-size:' + api( "rp_section_title_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['rp_section_title'] +'{ font-size:' + api( "rp_section_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['rp_section_title'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_section_title'] +'{ font-size:' + api( "rp_section_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_section_title'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-line-height">'
                +  responsive.selectorArray['rp_section_title'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_section_title_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_section_title_typography-letter-spacing">'
                +  responsive.selectorArray['rp_section_title'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "rp_section_title_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp-section-title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp-section-title-text-transform">'
                + responsive.selectorArray['rp_section_title'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-rp_post_title_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-rp_post_title_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-font-family">'
                +  responsive.selectorArray['rp_post_title'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ), api( "rp_post_title_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-font-weight">'
                +  responsive.selectorArray['rp_post_title'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-font-style">'
                +  responsive.selectorArray['rp_post_title'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-font-size">'
                + responsive.selectorArray['rp_post_title'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['rp_post_title'] +'{ font-size:' + api( "rp_post_title_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['rp_post_title'] +'{ font-size:' + api( "rp_post_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['rp_post_title'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_post_title'] +'{ font-size:' + api( "rp_post_title_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_post_title'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-line-height">'
                +  responsive.selectorArray['rp_post_title'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_post_title_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_post_title_typography-letter-spacing">'
                +  responsive.selectorArray['rp_post_title'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "rp_post_title_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp-post-title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp-post-title-text-transform">'
                + responsive.selectorArray['rp_post_title'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api( "rp_meta_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-rp_meta_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-rp_meta_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-font-family">'
                +  responsive.selectorArray['rp_meta'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ), api( "rp_meta_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-font-weight">'
                +  responsive.selectorArray['rp_meta'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-font-style">'
                +  responsive.selectorArray['rp_meta'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-font-size">'
                + responsive.selectorArray['rp_meta'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['rp_meta'] +'{ font-size:' + api( "rp_meta_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['rp_meta'] +'{ font-size:' + api( "rp_meta_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['rp_meta'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_meta'] +'{ font-size:' + api( "rp_meta_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_meta'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-line-height">'
                +  responsive.selectorArray['rp_meta'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_meta_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_meta_typography-letter-spacing">'
                +  responsive.selectorArray['rp_meta'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "rp_meta_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp-meta-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp-meta-text-transform">'
                + responsive.selectorArray['rp_meta'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api( "rp_content_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-rp_content_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-rp_content_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-font-family">'
                +  responsive.selectorArray['rp_content'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ), api( "rp_content_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-font-weight">'
                +  responsive.selectorArray['rp_content'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-font-style">'
                +  responsive.selectorArray['rp_content'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-font-size">'
                + responsive.selectorArray['rp_content'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['rp_content'] +'{ font-size:' + api( "rp_content_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['rp_content'] +'{ font-size:' + api( "rp_content_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['rp_content'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_content'] +'{ font-size:' + api( "rp_content_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['rp_content'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-line-height">'
                +  responsive.selectorArray['rp_content'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp_content_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp_content_typography-letter-spacing">'
                +  responsive.selectorArray['rp_content'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "rp_content_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-rp-content-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-rp-content-text-transform">'
                + responsive.selectorArray['rp_content'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-footer_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-footer_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-family">'
                +  responsive.selectorArray['footer'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),  api( "footer_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-weight">'
                +  responsive.selectorArray['footer'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-style">'
                +  responsive.selectorArray['footer'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-size">'
                + responsive.selectorArray['footer'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['footer'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['footer'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['footer'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['footer'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['footer'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-line-height">'
                +  responsive.selectorArray['footer'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-letter-spacing">'
                +  responsive.selectorArray['footer'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "footer_copyright_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-text-transform">'
                +  responsive.selectorArray['footer_copyright'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_copyright_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-footer_copyright_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-footer_copyright_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-font-family">'
                +  responsive.selectorArray['footer_copyright'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),  api( "footer_copyright_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-font-weight">'
                +  responsive.selectorArray['footer_copyright'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_copyright_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-font-style">'
                +  responsive.selectorArray['footer_copyright'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_copyright_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-font-size">'
                + responsive.selectorArray['footer_copyright'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['footer_copyright'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['footer_copyright'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['footer_copyright'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['footer_copyright'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['footer_copyright'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_copyright_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-line-height">'
                +  responsive.selectorArray['footer_copyright'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_copyright_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-letter-spacing">'
                +  responsive.selectorArray['footer_copyright'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "footer_copyright_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_copyright_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_copyright_typography-text-transform">'
                +  responsive.selectorArray['footer_copyright'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-text-transform">'
                +  responsive.selectorArray['header_social'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_social_item_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_social_item_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-font-family">'
                +  responsive.selectorArray['header_social'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-font-weight">'
                +  responsive.selectorArray['header_social'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-font-size">'
                + responsive.selectorArray['header_social'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_social'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_social'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ), 
    api( "header_social_item_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_social'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_social'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_social'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );
        } );
    }),
    api( "header_social_item_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-line-height">'
                +  responsive.selectorArray['header_social'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-letter-spacing">'
                +  responsive.selectorArray['header_social'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-text-transform">'
                +  responsive.selectorArray['header_social'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_social_item_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_social_item_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_social_item_typography-font-style">'
                +  responsive.selectorArray['header_social'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } )
    // Footer Social.
    api( "footer_social_item_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-text-transform">'
                +  responsive.selectorArray['footer_social'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-footer_social_item_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-footer_social_item_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-font-family">'
                +  responsive.selectorArray['footer_social'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-font-weight">'
                +  responsive.selectorArray['footer_social'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-font-size">'
                + responsive.selectorArray['footer_social'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['footer_social'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['footer_social'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ), 
    api( "footer_social_item_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['footer_social'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['footer_social'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['footer_social'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );
        } );
    }),
    api( "footer_social_item_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-line-height">'
                +  responsive.selectorArray['footer_social'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-letter-spacing">'
                +  responsive.selectorArray['footer_social'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-text-transform">'
                +  responsive.selectorArray['footer_social'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "footer_social_item_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_social_item_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_social_item_typography-font-style">'
                +  responsive.selectorArray['footer_social'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } )

    // Typography line height for heading widget.
    if( responsive.isElementorActive ) {
        for ( let i=1; i < 7; i++ ) {
            api( 'heading_h'+i+'_typography[line-height]', function( $swipe ) {
                $swipe.bind( function( newval ) {
                    $(  '.elementor-widget-heading h' + i + '.elementor-heading-title').css( 'line-height', newval );
                } );
            } );
        }
    }

    api( "header_button_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-text-transform">'
                +  responsive.selectorArray['header_button'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_button_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_button_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-font-family">'
                +  responsive.selectorArray['header_button'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-font-weight">'
                +  responsive.selectorArray['header_button'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-font-size">'
                + responsive.selectorArray['header_button'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_button'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_button'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ), 
    api( "header_button_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_button'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_button'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_button'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );
        } );
    }),
    api( "header_button_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-line-height">'
                +  responsive.selectorArray['header_button'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-letter-spacing">'
                +  responsive.selectorArray['header_button'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-text-transform">'
                +  responsive.selectorArray['header_button'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_button_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_button_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_button_typography-font-style">'
                +  responsive.selectorArray['header_button'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } )

    // Header Search Label Typography - Start
    api( "header_search_label_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-text-transform">'
                +  responsive.selectorArray['header_search_label'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_search_label_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_search_label_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-font-family">'
                +  responsive.selectorArray['header_search_label'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-font-weight">'
                +  responsive.selectorArray['header_search_label'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-font-size">'
                + responsive.selectorArray['header_search_label'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_search_label'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_search_label'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ), 
    api( "header_search_label_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_search_label'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_search_label'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_search_label'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );
        } );
    }),
    api( "header_search_label_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-line-height">'
                +  responsive.selectorArray['header_search_label'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-letter-spacing">'
                +  responsive.selectorArray['header_search_label'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-text-transform">'
                +  responsive.selectorArray['header_search_label'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_search_label_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_search_label_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_search_label_typography-font-style">'
                +  responsive.selectorArray['header_search_label'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } )
    // Header Search Label Typography - End

    // Header Contact Info Element.
    api( "header_contact_info_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-text-transform">'
                +  responsive.selectorArray['header_contact_info'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_contact_info_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_contact_info_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-font-family">'
                +  responsive.selectorArray['header_contact_info'] + '{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-font-weight">'
                +  responsive.selectorArray['header_contact_info'] + '{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-font-size">'
                + responsive.selectorArray['header_contact_info'] + '{ font-size:' + dataAndEvents +';}'
		        + '@media (max-width: 768px){'+ responsive.selectorArray['header_contact_info'] +'{ font-size:' + api( "footer_tablet_typography[font-size]").get() +';}}'
		        + '@media (max-width: 480px){'+ responsive.selectorArray['header_contact_info'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ), 
    api( "header_contact_info_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-tablet-font-size">'
                + '@media (max-width: 768px){'+ responsive.selectorArray['header_contact_info'] +'{ font-size:' + dataAndEvents +';}}'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_contact_info'] +'{ font-size:' + api( "footer_mobile_typography[font-size]").get() +';}}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-mobile-font-size">'
                + '@media (max-width: 480px){'+ responsive.selectorArray['header_contact_info'] + '{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );
        } );
    }),
    api( "header_contact_info_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-line-height">'
                +  responsive.selectorArray['header_contact_info'] + '{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-letter-spacing">'
                +  responsive.selectorArray['header_contact_info'] + '{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-text-transform">'
                +  responsive.selectorArray['header_contact_info'] + '{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } ),
    api( "header_contact_info_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_contact_info_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_contact_info_typography-font-style">'
                +  responsive.selectorArray['header_contact_info'] + '{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );
        } );
    } )
    // Footer Widgets Title & Content Typography - Start
    for (let i = 1; i <= 6; i++) {
        const titleSettingBase   = `footer_widget${i}_title_typography`;
        const titleSelectorKey   = `footer_widget${i}_title`;
        const contentSettingBase = `footer_widget${i}_content_typography`;
        const contentSelectorKey = `footer_widget${i}_content`;

        // === text-transform ===
        api(`${titleSettingBase}[text-transform]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-text-transform`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-text-transform">
                        ${responsive.selectorArray[titleSelectorKey]} { text-transform:${val}; }
                    </style>`
                );
            });
        });

        // === font-family ===
        api(`${titleSettingBase}[font-family]`, function ($swipe) {
            $swipe.bind(function (val) {
                if (val) {
                    let fontName = val.split(",")[0].replace(/'/g, '').trim();
                    const id = `customize-control-${titleSettingBase}-font-family`;
                    const fontUrl = `${responsive.googleFontsUrl}/css?family=${fontName.replace(/ /g, "%20").replace(",", "%2C")}:${responsive.googleFontsWeight}`;
                    
                    if (fontName in responsive.googleFonts) {
                        if (jQuery(`#${id}`).length) {
                            jQuery(`#${id}`).attr("href", fontUrl);
                        } else {
                            jQuery('head').append(`<link id="${id}" rel="stylesheet" type="text/css" href="${fontUrl}">`);
                        }
                    }
                }
                jQuery(`style.customizer-typography-${titleSettingBase}-font-family`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-font-family">
                        ${responsive.selectorArray[titleSelectorKey]} { font-family:${val}; }
                    </style>`
                );
            });
        });

        // === font-weight ===
        api(`${titleSettingBase}[font-weight]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-font-weight`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-font-weight">
                        ${responsive.selectorArray[titleSelectorKey]} { font-weight:${val}; }
                    </style>`
                );
            });
        });

        // === font-size ===
        api(`${titleSettingBase}[font-size]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-font-size`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-font-size">
                        ${responsive.selectorArray[titleSelectorKey]} { font-size:${val}; }
                        @media (max-width: 768px) {
                            ${responsive.selectorArray[titleSelectorKey]} { font-size:${api(`footer_widget${i}_title_tablet_typography[font-size]`).get()}; }
                        }
                        @media (max-width: 480px) {
                            ${responsive.selectorArray[titleSelectorKey]} { font-size:${api(`footer_widget${i}_title_mobile_typography[font-size]`).get()}; }
                        }
                    </style>`
                );
            });
        });

        // === tablet font-size ===
        api(`footer_widget${i}_title_tablet_typography[font-size]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-tablet-font-size`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-tablet-font-size">
                        @media (max-width: 768px) {
                            ${responsive.selectorArray[titleSelectorKey]} { font-size:${val}; }
                        }
                        @media (max-width: 480px) {
                            ${responsive.selectorArray[titleSelectorKey]} { font-size:${api(`footer_widget${i}_title_mobile_typography[font-size]`).get()}; }
                        }
                    </style>`
                );
            });
        });

        // === mobile font-size ===
        api(`footer_widget${i}_title_mobile_typography[font-size]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-mobile-font-size`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-mobile-font-size">
                        @media (max-width: 480px) {
                            ${responsive.selectorArray[titleSelectorKey]} { font-size:${val}; }
                        }
                    </style>`
                );
            });
        });

        // === line-height ===
        api(`${titleSettingBase}[line-height]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-line-height`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-line-height">
                        ${responsive.selectorArray[titleSelectorKey]} { line-height:${val}; }
                    </style>`
                );
            });
        });

        // === letter-spacing ===
        api(`${titleSettingBase}[letter-spacing]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-letter-spacing`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-letter-spacing">
                        ${responsive.selectorArray[titleSelectorKey]} { letter-spacing:${val}px; }
                    </style>`
                );
            });
        });

        // === font-style ===
        api(`${titleSettingBase}[font-style]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${titleSettingBase}-font-style`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${titleSettingBase}-font-style">
                        ${responsive.selectorArray[titleSelectorKey]} { font-style:${val}; }
                    </style>`
                );
            });
        });

        // === text-transform ===
        api(`${contentSettingBase}[text-transform]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-text-transform`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-text-transform">
                        ${responsive.selectorArray[contentSelectorKey]} { text-transform:${val}; }
                    </style>`
                );
            });
        });

        // === font-family ===
        api(`${contentSettingBase}[font-family]`, function ($swipe) {
            $swipe.bind(function (val) {
                if (val) {
                    let fontName = val.split(",")[0].replace(/'/g, '').trim();
                    const id = `customize-control-${contentSettingBase}-font-family`;
                    const fontUrl = `${responsive.googleFontsUrl}/css?family=${fontName.replace(/ /g, "%20").replace(",", "%2C")}:${responsive.googleFontsWeight}`;
                    
                    if (fontName in responsive.googleFonts) {
                        if (jQuery(`#${id}`).length) {
                            jQuery(`#${id}`).attr("href", fontUrl);
                        } else {
                            jQuery('head').append(`<link id="${id}" rel="stylesheet" type="text/css" href="${fontUrl}">`);
                        }
                    }
                }
                jQuery(`style.customizer-typography-${contentSettingBase}-font-family`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-font-family">
                        ${responsive.selectorArray[contentSelectorKey]} { font-family:${val}; }
                    </style>`
                );
            });
        });

        // === font-weight ===
        api(`${contentSettingBase}[font-weight]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-font-weight`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-font-weight">
                        ${responsive.selectorArray[contentSelectorKey]} { font-weight:${val}; }
                    </style>`
                );
            });
        });

        // === font-size ===
        api(`${contentSettingBase}[font-size]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-font-size`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-font-size">
                        ${responsive.selectorArray[contentSelectorKey]} { font-size:${val}; }
                        @media (max-width: 768px) {
                            ${responsive.selectorArray[contentSelectorKey]} { font-size:${api(`footer_widget${i}_content_tablet_typography[font-size]`).get()}; }
                        }
                        @media (max-width: 480px) {
                            ${responsive.selectorArray[contentSelectorKey]} { font-size:${api(`footer_widget${i}_content_mobile_typography[font-size]`).get()}; }
                        }
                    </style>`
                );
            });
        });

        // === tablet font-size ===
        api(`footer_widget${i}_content_tablet_typography[font-size]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-tablet-font-size`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-tablet-font-size">
                        @media (max-width: 768px) {
                            ${responsive.selectorArray[contentSelectorKey]} { font-size:${val}; }
                        }
                        @media (max-width: 480px) {
                            ${responsive.selectorArray[contentSelectorKey]} { font-size:${api(`footer_widget${i}_content_mobile_typography[font-size]`).get()}; }
                        }
                    </style>`
                );
            });
        });

        // === mobile font-size ===
        api(`footer_widget${i}_content_mobile_typography[font-size]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-mobile-font-size`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-mobile-font-size">
                        @media (max-width: 480px) {
                            ${responsive.selectorArray[contentSelectorKey]} { font-size:${val}; }
                        }
                    </style>`
                );
            });
        });

        // === line-height ===
        api(`${contentSettingBase}[line-height]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-line-height`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-line-height">
                        ${responsive.selectorArray[contentSelectorKey]} { line-height:${val}; }
                    </style>`
                );
            });
        });

        // === letter-spacing ===
        api(`${contentSettingBase}[letter-spacing]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-letter-spacing`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-letter-spacing">
                        ${responsive.selectorArray[contentSelectorKey]} { letter-spacing:${val}px; }
                    </style>`
                );
            });
        });

        // === font-style ===
        api(`${contentSettingBase}[font-style]`, function ($swipe) {
            $swipe.bind(function (val) {
                jQuery(`style.customizer-typography-${contentSettingBase}-font-style`).remove();
                jQuery('head').append(
                    `<style class="customizer-typography-${contentSettingBase}-font-style">
                        ${responsive.selectorArray[contentSelectorKey]} { font-style:${val}; }
                    </style>`
                );
            });
        });
    } 
    // Footer Widgets Title & Content Typography - End
} )( jQuery );

