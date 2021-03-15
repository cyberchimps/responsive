var $j = jQuery.noConflict();

$j( document ).ready( function() {
	"use strict";
    // Woo off canvas
    responsiveWooOffCanvas();
} );

/* ==============================================
WOOCOMMERCE OFF CANVAS
============================================== */
function responsiveWooOffCanvas() {
	"use strict"

	$j( document ).on( 'click', '.off_canvas_filter_btn', function( e ) {
		e.preventDefault();

		var innerWidth = $j( 'html' ).innerWidth();
		$j( 'html' ).css( 'overflow', 'hidden' );
		var hiddenInnerWidth = $j( 'html' ).innerWidth();
		$j( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );

		$j( 'body' ).addClass( 'off-canvas-enabled' );
	} );

	$j( '.responsive-off-canvas-overlay, .responsive-off-canvas-close' ).on( 'click', function() {
		$j( 'html' ).css( {
			'overflow': '',
			'margin-right': '' 
		} );

		$j( 'body' ).removeClass( 'off-canvas-enabled' );
	} );

}