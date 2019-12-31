/**
 * Customizer options
 *
 * @package Responsive WordPress theme
 */

( function( $ ) {
	// Declare vars.
	var api = wp.customize;
	api(
		"responsive_theme_options[sticky-header]",
		function( $swipe ) {
			$swipe.bind(
				function( pair ) {
					if ( pair === true ) {
						jQuery( window ).scroll(
							function()  {
								if (jQuery( this ).scrollTop() > 0) {
									if ( pair === true ) {
										jQuery( '#header_section' ).addClass( "sticky-header" );
									}
								} else {
									jQuery( '#header_section' ).removeClass( "sticky-header" );
								}

							}
						);
					} else {
						jQuery( window ).scroll(
							function()  {
								jQuery( '#header_section' ).removeClass( "sticky-header" );
							}
						);
					}
				}
			);
		}
	)
} )( jQuery );
