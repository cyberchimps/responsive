/* global dismissNotices */

/**
 * Handle notice dismiss in customizer.
 */
jQuery( function ( $ ) {
	$( document ).on( 'click', '.responsive-sites-active .notice-dismiss', function () {
		var control_id = $( this ).closest('div').attr( 'class' ).replace( 'responsive-sites-active', '' );
		$.ajax( {
			url: dismissNotices.ajaxurl,
			type: 'POST',
			data: {
				action: 'responsive_delete_transient_action',
        control: control_id,
        nonce: dismissNotices._notice_nonce
			},
			success: function () {
				$( '.responsive-sites-active' ).fadeOut( 300, function () {
					$( this ).remove();
				} );
			}
		} );
	} );
} );
