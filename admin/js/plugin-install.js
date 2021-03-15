/**
 * Remove activate button and replace with activation in progress button.
 */

/* global responsiveAboutPluginInstall */
/* global console */

jQuery( document ).ready(
	function ( $ ) {
		$.pluginInstall = {
			'init': function () {
				this.handleInstall();
				this.handleActivate();
			},

			'handleInstall': function () {
				var self = this;
				$( 'body' ).on(
					'click',
					'.responsive-install-plugin',
					function ( e ) {
						e.preventDefault();
						var button   = $( this );
						var slug     = button.attr( 'data-slug' );
						var url      = button.attr( 'href' );
						var redirect = $( button ).data( 'redirect' );
						button.text( wp.updates.l10n.installing );
						button.addClass( 'updating-message' );
						wp.updates.installPlugin(
							{
								slug: slug,
								success: function () {
									button.text( responsiveAboutPluginInstall.activating + '...' );
									self.activatePlugin( url, redirect );
								}
							}
						);
					}
				);
			},

			'activatePlugin': function ( url, redirect ) {
				if ( typeof url === 'undefined' || ! url ) {
					return;
				}
				jQuery.ajax(
					{
						async: true,
						type: 'GET',
						url: url,
						success: function () {
							// Reload the page.
							if ( typeof(redirect) !== 'undefined' && redirect !== '' ) {
								window.location.replace( redirect );
								window.location.href( redirect );
							} else {
								location.reload();
							}
						},
						error: function ( jqXHR, exception ) {
							var msg = '';
							if ( jqXHR.status === 0 ) {
								msg = responsiveAboutPluginInstall.verify_network;
							} else if ( jqXHR.status === 404 ) {
								msg = responsiveAboutPluginInstall.page_not_found;
							} else if ( jqXHR.status === 500 ) {
								msg = responsiveAboutPluginInstall.internal_server_error;
							} else if ( exception === 'parsererror' ) {
								msg = responsiveAboutPluginInstall.json_parse_failed;
							} else if ( exception === 'timeout' ) {
								msg = responsiveAboutPluginInstall.timeout_error;
							} else if ( exception === 'abort' ) {
								msg = responsiveAboutPluginInstall.ajax_req_aborted;
							} else {
								msg = responsiveAboutPluginInstall.uncaught_error;
							}
							console.log( msg );
						},
					}
				);
			},

			'handleActivate': function () {
				var self = this;
				$( 'body' ).on(
					'click',
					'.activate-now',
					function ( e ) {
						e.preventDefault();
						var button   = $( this );
						var url      = button.attr( 'href' );
						var redirect = button.attr( 'data-redirect' );
						button.addClass( 'updating-message' );
						button.text( responsiveAboutPluginInstall.activating + '...' );
						self.activatePlugin( url, redirect );
					}
				);
			},
		};
		$.pluginInstall.init();
	}
);
