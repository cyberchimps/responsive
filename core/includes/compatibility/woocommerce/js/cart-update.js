jQuery( function( $ ) {
	// Update from mini
	$( document.body ).on( 'removed_from_cart', function() {
		$( document ).trigger( 'wc_update_cart' );
	} );
});