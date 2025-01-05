/**
 * Update Font Preset settings live.
 *
 * @version 1.0.0
 */
// phpcs:ignoreFile
( function( $ ) {

    // Declare vars
    console.log('This is added');
    var api = wp.customize;
    const choices = {
        preset_1: {
            label: "Abril Fatface / Lato",
            bodyFont: "Lato",
            headingFont: "Abril Fatface"
        },
        preset_2: {
            label: "Alegreya Sans / Alegreya",
            bodyFont: "Alegreya",
            headingFont: "Alegreya Sans"
        },
        preset_3: {
            label: "Archivo Black / Roboto",
            bodyFont: "Roboto",
            headingFont: "Archivo Black"
        },
        preset_4: {
            label: "Bebas Neue / Old Standard TT",
            bodyFont: "Old Standard TT",
            headingFont: "Bebas Neue"
        },
        preset_5: {
            label: "Exo 2 / Alegreya Sans",
            bodyFont: "Alegreya Sans",
            headingFont: "Exo 2"
        },
        preset_6: {
            label: "Fira Sans / TPT Serif",
            bodyFont: "PT Serif",
            headingFont: "Fira Sans"
        },
        preset_7: {
            label: "Josefin Sans / Josefin Slab",
            bodyFont: "Josefin Slab",
            headingFont: "Josefin Sans"
        },
        preset_8: {
            label: "Karla / Spectral",
            bodyFont: "Spectral",
            headingFont: "Karla"
        },
        preset_9: {
            label: "Lato / Merriweather",
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
            console.log('This is called');
            console.log(control)
            console.log(value);
            var bodyFont = choices[value].bodyFont;
            var headingFont = choices[value].headingFont;
            console.log(bodyFont);
            
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
        loadGoogleFont(fontFamily);
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
        console.log(fontFamily, fontName, idfirst);
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
        loadGoogleFont(fontFamily);
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
        console.log(fontFamily, fontName, idfirst);
        jQuery( 'style.customizer-typography-font-preset-headings-font-family' ).remove();
        jQuery( 'head' ).append(
            '<style class="customizer-typography-font-preset-headings-font-family">'
            + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6' + '{ font-family:' + fontFamily +';}'
            + '</style>'
        );
    }

    /**
     * Dynamically load the Google Fonts stylesheet.
     */
    function loadGoogleFont(fontFamily) {
        var fontUrl = fontFamily.replace(" ", "%20").replace(",", "%2C");
        var fontLink = "https://fonts.googleapis.com/css?family=" + fontUrl + ":400,700";

        var fontId = "google-font-" + fontUrl;
        if (!document.getElementById(fontId)) {
            var link = document.createElement('link');
            link.id = fontId;
            link.rel = 'stylesheet';
            link.href = fontLink;
            document.head.appendChild(link);
        }
    }

})( jQuery );
