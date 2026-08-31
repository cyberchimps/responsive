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
		var $notice = $( this ).closest( '.responsive-sites-active' );
		var action = $( this ).data( 'action' );
		var control_id = $notice.attr( 'class' ).replace( 'responsive-sites-active', '' );
		
		// Determine the action based on notice class or data attribute
		var ajaxAction = 'responsive_delete_transient_action'; // default
		
		if ( action ) {
			// Use data-action if specified
			ajaxAction = action;
		} else if ( $notice.hasClass( 'responsive-mobile-header-update-notice' ) ) {
			// Mobile header notice
			ajaxAction = 'responsive_delete_mobile_header_admin_notice_action';
		} else if ( $notice.hasClass( 'responsive-header-footer-builder-update-notice' ) ) {
			// Header footer builder notice
			ajaxAction = 'responsive_delete_header_footer_builder_admin_notice_action';
		}
		
		$.ajax( {
			url: dismissNotices.ajaxurl,
			type: 'POST',
			data: {
				action: ajaxAction,
				control: control_id,
				nonce: dismissNotices._notice_nonce
			},
			success: function () {
				$notice.fadeOut( 300, function () {
					$( this ).remove();
				} );
			}
		} );
	} );
} );
