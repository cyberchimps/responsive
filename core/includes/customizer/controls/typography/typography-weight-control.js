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
			$( '.responsive-font-family-select' ).each(
				function(e) {

					var optionName;
					optionName = $( this ).data( 'name' );
					ResponsiveTypography._initFont( optionName );

				}
			);

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
			var i                   = 0,
				fontSelect          = api.control( this.id ).container.find( 'select' ),
				fontValue           = this(),
				selected            = '',
				weightKey           = fontSelect.data( 'connected-control' ),
				inherit             = fontSelect.data( 'inherit' ),
				weightSelect        = api.control( weightKey ).container.find( 'select' ),
				currentWeightTitle  = weightSelect.data( 'inherit' ),
				weightValue         = init ? weightSelect.val() : '400',
				inheritWeightObject = [ 'inherit' ],
				weightOptions       = '',
				fontValue           = fontValue.split( "," )[0].replace( /'/g, '' ),
				weightObject        = "" == fontValue ? [ 100, 200, 300, 400, 500, 600, 700, 800, 900] : get_associated_fonts( fontValue ),
				weightMap           = responsive.weigthMap;
			weightObject            = $.merge( inheritWeightObject, weightObject )
			weightMap[ 'inherit' ]  = currentWeightTitle;
			if ( fontValue == 'inherit' ) {
				weightValue = init ? weightSelect.val() : 'inherit';
			}
			weightMap[ 'inherit' ] = currentWeightTitle;
			for (i = 0; i < weightObject.length; i++) {
				selected       = weightObject[i] == weightValue ? 'selected="selected"' : '';
				weightOptions += '<option value="' + weightObject[i] + '"' + selected + '>' + weightMap[weightObject[i]] + '</option>';
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
	var weightObject = [], isStandardFont = false, weight, isCustomFont = false, custom_fonts_data = false, missingCustomFont = false;
	for (var propName in responsive.std_fonts) {
		if (fontValue === propName) {
			isStandardFont = true;
			for (var i = 0; i < JSON.stringify( responsive.std_fonts[fontValue].weights.length ); i++) {
				weightObject.push( JSON.stringify( responsive.std_fonts[fontValue].weights[i] ) );
			}
		}
	}
	if ( ! isStandardFont && ! isCustomFont ) {
		if ( responsive.googleFonts[fontValue] == undefined ) {
			missingCustomFont = true;
		}else{
			for (var i = 0; i < JSON.stringify( responsive.googleFonts[fontValue][0].length ); i++) {
				weight = JSON.stringify( responsive.googleFonts[fontValue][0][i] ).replace( /"/g, '' );
				if ( ! weight.includes( 'italic' )) {
					weightObject.push( weight );
				}
			}
		}
		
	}
	if ( missingCustomFont ) {
		( function( $ ) {
			var api = wp.customize;
			$( '.responsive-font-family-select' ).each(
				function(e) {
					var optionName;
					optionName = $( this ).data( 'name' );
					var select = api.control( optionName ).container.find( 'select' ),
					link   = select.data( 'customize-setting-link' ),
					value = select.data( 'value' );
					if(fontValue  === value ){
						api( link ).set('');
					}
				}
			);
		})( jQuery );
	}

	return weightObject;
}
