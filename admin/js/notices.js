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

	$( document ).on('click', '.responsive-builder-migrate', function (e){
		
		e.stopPropagation();
		e.preventDefault();

		var $this = $( this );

		if ( $this.hasClass( 'updating-message' ) ) {
			return;
		}

		$this.addClass( 'updating-message' );

		 var data = {
			action: 'responsive-migrate-to-builder',
			value: $(this).attr( 'data-value' ),
			nonce: responsive.ajax_nonce,
		};

		$.ajax({
			url: responsive.ajaxUrl,
			type: 'POST',
			data: data,
			success: function( response ) {
				$this.removeClass( 'updating-message' );
				if ( response.success ) {
					if ( data.value == '1' ) {
						// Change button classes & text.
						$this.text( responsive.old_header_footer );
						$this.attr( 'data-value', '0' );
						$this.addClass('button-primary');
					} else {
						// Change button classes & text.
						$this.text( responsive.migrate_to_builder );
						$this.attr( 'data-value', '1' );
						$this.removeClass('button-primary');
					}
				}
			}
		})
	} );
} );
