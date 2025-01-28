/**
 * Update Font Preset settings live.
 *
 */
// phpcs:ignoreFile
( function( $ ) {

    // Declare vars
    var api = wp.customize;
    const choices = {
        preset_1: {
            bodyFont: "Lato",
            headingFont: "Abril Fatface",
            bodyWeight: 400,
            headingWeight: 400
        },
        preset_2: {
            bodyFont: "Alegreya",
            headingFont: "Alegreya Sans",
            bodyWeight: 400,
            headingWeight: 900
        },
        preset_3: {
            bodyFont: "Roboto",
            headingFont: "Archivo Black",
            bodyWeight: 400,
            headingWeight: 400
        },
        preset_4: {
            bodyFont: "Old Standard TT",
            headingFont: "Bebas Neue",
            bodyWeight: 400,
            headingWeight: 400
        },
        preset_5: {
            bodyFont: "Alegreya Sans",
            headingFont: "'Exo 2'",
            bodyWeight: 400,
            headingWeight: 900
        },
        preset_6: {
            bodyFont: "PT Serif",
            headingFont: "Fira Sans",
            bodyWeight: 400,
            headingWeight: 900
        },
        preset_7: {
            bodyFont: "Josefin Slab",
            headingFont: "Josefin Sans",
            bodyWeight: 600,
            headingWeight: 700
        },
        preset_8: {
            bodyFont: "Spectral",
            headingFont: "Karla",
            bodyWeight: 300,
            headingWeight: 700
        },
        preset_9: {
            bodyFont: "Merriweather",
            headingFont: "Lato",
            bodyWeight: 400,
            headingWeight: 400
        }
    };    
    /******** FONT PRESET CONTROL FOR BODY AND HEADINGS *********/
    api( "responsive_font_presets", function( control ) {
        control.bind( function( value ) {
            if( value === ''){
                control.set('');
                jQuery( 'style.customizer-typography-font-preset-body-font-family' ).remove();
                jQuery( 'style.customizer-typography-font-preset-headings-font-family' ).remove();

                 // Trigger body_typography[font-family] with its current value
                var resetValues = ["body_typography[font-family]",
                    "body_typography[font-weight]",
                    "headings_typography[font-family]",
                    "headings_typography[font-weight]",
                    "heading_h1_typography[font-family]",
                    "heading_h1_typography[font-weight]",
                    "heading_h2_typography[font-family]",
                    "heading_h2_typography[font-weight]",
                    "heading_h3_typography[font-family]",
                    "heading_h3_typography[font-weight]",
                    "heading_h4_typography[font-family]",
                    "heading_h4_typography[font-weight]",
                    "heading_h5_typography[font-family]",
                    "heading_h5_typography[font-weight]",
                    "heading_h6_typography[font-family]",
                    "heading_h6_typography[font-weight]",
                    "meta_typography[font-family]",
                    "meta_typography[font-weight]",
                ];

                resetValues.forEach(function (value) {
                    var control = api(value);
                    if (control) {
                        var currentValue = control.get(); // Get the current value
                        //if directly set to currentValue it will not trigger as it checks for change in value
                        control.set("temp-value"); // Re-set to temp value so that it get triggered
                        control.set(currentValue); // Re-set to trigger the bind logic
                    }
                });

                return ;
            }
            var bodyFont = choices[value].bodyFont;
            var headingFont = choices[value].headingFont;
            var bodyWeight = choices[value].bodyWeight;
            var headingWeight = choices[value].headingWeight;

            // Apply body font to the page
            applyFontToBody(bodyFont, bodyWeight);

            // Apply heading font to all headings
            applyFontToHeadings(headingFont, headingWeight);
        });
    });

    /**
     * Apply the selected font to the body.
     */
    function applyFontToBody(fontFamily, fontWeight) {
        if ( fontFamily ) {
            /** @type {string} */
            var fontName = fontFamily.split(",")[0];
            fontName = fontName.replace(/'/g, '');
            var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-font-preset-body-font-family" );
            var fontSize = fontName.replace( " ", "%20" );
            fontSize = fontSize.replace( ",", "%2C" );
            /** @type {string} */
            fontSize = "//fonts.googleapis.com/css?family=" + fontName + ":" + fontWeight;
            $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
        }
        jQuery( 'style.customizer-typography-font-preset-body-font-family' ).remove();
        jQuery( 'head' ).append(
            '<style class="customizer-typography-font-preset-body-font-family">'
            + 'body, .post-meta *' + '{ font-family:' + fontFamily +'; font-weight:' + fontWeight + ';}'
            + '</style>'
        );
    }

    /**
     * Apply the selected font to all headings (h1, h2, ..., h6).
     */
    function applyFontToHeadings(fontFamily, fontWeight) {
        if ( fontFamily ) {
            /** @type {string} */
            var fontName = fontFamily.split(",")[0];
            fontName = fontName.replace(/'/g, '');
            var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-font-preset-headings-font-family" );
            var fontSize = fontName.replace( " ", "%20" );
            fontSize = fontSize.replace( ",", "%2C" );
            /** @type {string} */
            fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + fontWeight;
            $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
        }
        jQuery( 'style.customizer-typography-font-preset-headings-font-family' ).remove();
        jQuery( 'head' ).append(
            '<style class="customizer-typography-font-preset-headings-font-family">'
            + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6' + '{ font-family:' + fontFamily +'; font-weight:' + fontWeight + ';}'
            + '</style>'
        );
    }

})( jQuery );
