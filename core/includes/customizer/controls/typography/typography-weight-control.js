/** Updates Font Weight options according to Font Family selected
 *
 * @package Responsive
 * */

( function( $ ) {

    var api              = wp.customize;
    ResponsiveTypography = {

        /**
         * Initializes our custom logic for the Customizer.
         *
         * @since 1.0.0
         * @method init
         */

        init: function() {
            ResponsiveTypography._initFonts();
        },

        /**
         * Initializes logic for font controls.
         *
         * @since 1.0.0
         * @access private
         * @method _initFonts
         */
        _initFonts: function()
        {
            var optionName;
            var elements = ['body', 'heading_h1', 'heading_h2', 'heading_h3', 'heading_h4', 'heading_h5', 'heading_h6', 'meta', 'header_site_title', 'header_site_tagline', 'header_menu', 'content_header_heading', 'content_header_description', 'breadcrumb', 'footer', 'menu', 'menu_dropdown', 'mobile_menu_dropdown','page_title', 'blog_entry_title', 'blog_post_title', 'buttons'];
            for (var i = 0; i < elements.length; i++) {
                optionName = elements[i] + '_typography[font-family]';
                ResponsiveTypography._initFont( optionName );
            }
        },

        /**
         * Initializes logic for a single font control.
         *
         * @since 1.0.0
         * @access private
         * @method _initFont
         */
        _initFont: function(optionName)
        {
            var select = api.control( optionName ).container.find( 'select' ),
                link   = select.data( 'customize-setting-link' ),
                weight = select.data( 'connected-control' );

            if ( 'undefined' != typeof weight ) {
                api(
                    link,
                    function($swipe) {
                        $swipe.bind(
                            function (controlValue) {
                                ResponsiveTypography._setFontWeightOptions.apply( api( link ), [false] );
                            }
                        );
                    }
                );
                ResponsiveTypography._setFontWeightOptions.apply( api( link ), [ true ] );
            }
        },

        /**
         * Sets the options for a font weight control when a
         * font family control changes.
         *
         * @since 1.0.0
         * @access private
         * @method _setFontWeightOptions
         * @param {Boolean} init Whether or not we're initializing this font weight control.
         */
        _setFontWeightOptions: function( init )
        {
            var i                      = 0,
                fontSelect             = api.control( this.id ).container.find( 'select' ),
                fontValue              = this(),
                selected               = '',
                weightKey              = fontSelect.data( 'connected-control' ),
                inherit                = fontSelect.data( 'inherit' ),
                weightSelect           = api.control( weightKey ).container.find( 'select' ),
                currentWeightTitle     = weightSelect.data( 'inherit' ),
                weightValue            = init ? weightSelect.val() : '400',
                inheritWeightObject    = [ 'inherit' ],
                weightOptions          = '',
                fontValue              = fontValue.split( "," )[0].replace( /'/g, '' ),
                weightObject           = "" == fontValue ? [ 100, 200, 300, 400, 500, 600, 700, 800, 900] : get_associated_fonts( fontValue ),
                weightMap              = responsive.weigthMap;
            weightObject           = $.merge( inheritWeightObject, weightObject )
            weightMap[ 'inherit' ] = currentWeightTitle;
            if ( fontValue == 'inherit' ) {
                weightValue = init ? weightSelect.val() : 'inherit';
            }
            weightMap[ 'inherit' ] = currentWeightTitle;
            for (i = 0; i < weightObject.length; i++) {
                selected = weightObject[i] == weightValue ? 'selected="selected"' : '';
                // if ( ! weightObject[ i ].includes( "italic" ) ) {
                    weightOptions += '<option value="' + weightObject[i] + '"' + selected + '>' + weightMap[weightObject[i]] + '</option>';
                // }
            }

            weightSelect.html( weightOptions );

            if ( ! init ) {
                api( weightKey ).set( '' );
                api( weightKey ).set( weightValue );
            }
        },
    }
    $( function() { ResponsiveTypography.init(); } );

})( jQuery );

function get_associated_fonts(fontValue){
    var weightObject = [], isStandardFont = false, weight;

    for(var propName in responsive.std_fonts)
    {
        if(fontValue === propName) {
            isStandardFont = true;
            for (var i = 0; i < JSON.stringify(responsive.std_fonts[fontValue].weights.length); i++) {
                weightObject.push(JSON.stringify(responsive.std_fonts[fontValue].weights[i]));
            }
        }
    }

    if( !isStandardFont ) {
        for (var i = 0; i < JSON.stringify(responsive.googleFonts[fontValue][0].length); i++) {
            weight = JSON.stringify(responsive.googleFonts[fontValue][0][i]).replace(/"/g, '');
            if(!weight.includes('italic'))
                weightObject.push(weight);
        }
    }

    return weightObject;
}
