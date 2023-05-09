( function( $ ) {

	'use strict';

	wp.customize.bind( 'ready', function () {
		wp.customize.section( 'responsive_lifterlms_sidebar', function( section ) {
			section.deferred.embedded.done( function() {
				var customMessage;
				section.headContainer.addClass( 'lifter-has-custom-message' );
				customMessage = $( wp.template( 'lifter-custom-message' )() );
				section.headContainer.append( customMessage );
			} );
		} );
	} );
} )( jQuery );
