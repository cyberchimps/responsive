/* global dismissNotices */

/**
 * Handle notice dismiss in customizer.
 */
jQuery( function ( $ ) {
  if (localStorage) { //if local storage
        if (localStorage.getItem('visited')) { // if not site is visited before
            $('#responsive-sites-active').hide(); //hide element
        }
    } else { //if not local storage use cookies or just show element in old browsers
        $('#responsive-sites-active').show();
    }
	$( document ).on( 'click', '.responsive-sites-active .notice-dismiss', function () {
		var control_id = $( this ).closest('div').attr( 'class' ).replace( 'responsive-sites-active', '' );
		$.ajax( {
			url: dismissNotices.ajaxurl,
			type: 'POST',
			data: {
				action: 'dismissed_notice_handler',
        control: control_id
			},
			success: function () {
				$( '.responsive-sites-active' ).fadeOut( 300, function () {
					$( this ).remove();
				} );
        localStorage.setItem('visited', true); //set flag, site now visited and element hidden
        return false;
			}
		} );
	} );
} );
