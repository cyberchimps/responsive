/* global dismissNotices */

/**
 * Handle notice dismiss in customizer.
 */
jQuery( function ( $ ) {

	$( document ).ready( function() {
		// Add Icon for Theme Builder under Elementor Addons Submenu.
		var targetAnchor = $('li#toplevel_page_responsive .wp-submenu.wp-submenu-wrap li a:contains("Theme Builder")');
		targetAnchor.before('<span class="responsive-theme-builder-icon dashicons dashicons-editor-break"></span>').parent().css({
			'display': 'flex',
			'margin-left': '12px'
		});
		targetAnchor.hover(function() {
			$(this).css('box-shadow', 'none');
		});
	} )
	
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
