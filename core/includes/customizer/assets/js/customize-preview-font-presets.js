/**
 * Update Font Preset settings live.
 *
 * @version 1.0.0
 */
// phpcs:ignoreFile
( function( $ ) {

    // Declare vars
    var api = wp.customize;
    const choices = {
        preset_1: {
            bodyFont: "Lato",
            headingFont: "Abril Fatface"
        },
        preset_2: {
            bodyFont: "Alegreya",
            headingFont: "Alegreya Sans"
        },
        preset_3: {
            bodyFont: "Roboto",
            headingFont: "Archivo Black"
        },
        preset_4: {
            bodyFont: "Old Standard TT",
            headingFont: "Bebas Neue"
        },
        preset_5: {
            bodyFont: "Alegreya Sans",
            headingFont: "Exo 2"
        },
        preset_6: {
            bodyFont: "PT Serif",
            headingFont: "Fira Sans"
        },
        preset_7: {
            bodyFont: "Josefin Slab",
            headingFont: "Josefin Sans"
        },
        preset_8: {
            bodyFont: "Spectral",
            headingFont: "Karla"
        },
        preset_9: {
            bodyFont: "Merriweather",
            headingFont: "Lato"
        }
    };    
    /******** FONT PRESET CONTROL FOR BODY AND HEADINGS *********/
    api( "responsive_font_presets", function( control ) {
        control.bind( function( value ) {
            if( value === ''){
                control.set('');
                jQuery( 'style.customizer-typography-font-preset-body-font-family' ).remove();
                jQuery( 'style.customizer-typography-font-preset-headings-font-family' ).remove();
                return ;
            }
            var bodyFont = choices[value].bodyFont;
            var headingFont = choices[value].headingFont;

            // Apply body font to the page
            applyFontToBody(bodyFont);

            // Apply heading font to all headings
            applyFontToHeadings(headingFont);
        });
    });

    /**
     * Apply the selected font to the body.
     */
    function applyFontToBody(fontFamily) {
        if ( fontFamily ) {
            /** @type {string} */
            var fontName = fontFamily.split(",")[0];
            fontName = fontName.replace(/'/g, '');
            var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-font-preset-body-font-family" );
            var fontSize = fontName.replace( " ", "%20" );
            fontSize = fontSize.replace( ",", "%2C" );
            /** @type {string} */
            fontSize = "//fonts.googleapis.com/css?family=" + fontName + ":" + responsive.googleFontsWeight;
            if ( fontName in responsive.googleFonts ) {
                if ($("#" + idfirst).length) {
                    $("#" + idfirst).attr("href", fontSize);
                } else {
                    $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                }
            }
        }
        jQuery( 'style.customizer-typography-font-preset-body-font-family' ).remove();
        jQuery( 'head' ).append(
            '<style class="customizer-typography-font-preset-body-font-family">'
            + 'body' + '{ font-family:' + fontFamily +';}'
            + '</style>'
        );
    }

    /**
     * Apply the selected font to all headings (h1, h2, ..., h6).
     */
    function applyFontToHeadings(fontFamily) {
        if ( fontFamily ) {
            /** @type {string} */
            var fontName = fontFamily.split(",")[0];
            fontName = fontName.replace(/'/g, '');
            var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-font-preset-headings-font-family" );
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
        jQuery( 'style.customizer-typography-font-preset-headings-font-family' ).remove();
        jQuery( 'head' ).append(
            '<style class="customizer-typography-font-preset-headings-font-family">'
            + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6' + '{ font-family:' + fontFamily +';}'
            + '</style>'
        );
    }

})( jQuery );
