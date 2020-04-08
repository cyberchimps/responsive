(function ($) {
	jQuery( document ).ready(
		function($) {
			var masthead = document.querySelector( '.site-header' );
			if ( jQuery( '#scroll' ) && jQuery( '#scroll' ).length ) {
				 responsive_scroll_top = function () {

					 var responsive_scroll_top = jQuery( '#scroll' ),
					content                    = responsive_scroll_top.css( 'content' ),
					device                     = responsive_scroll_top.data( 'on-devices' );
					content                    = content.replace( /[^0-9]/g, '' );
					if ( 'both' == device || ( 'desktop' == device && '769' == content ) || ( 'mobile' == device && '' == content ) ) {

						// Get current window / document scroll.
						var  scrollTop = window.pageYOffset || document.body.scrollTop;
						// If masthead found.
						if ( masthead && masthead.length ) {
							if (scrollTop > masthead.offsetHeight + 100) {
								responsive_scroll_top.show();
							} else {
								responsive_scroll_top.hide();
							}
						} else {
							// If there is no masthead set default start scroll
							if ( jQuery( window ).scrollTop() > 300 ) {
								responsive_scroll_top.show();
							} else {
								responsive_scroll_top.hide();
							}
						}
					} else {
						responsive_scroll_top.hide();
					}
				 };
				responsive_scroll_top();
				jQuery( window ).on(
					'scroll',
					function () {
						responsive_scroll_top();
					}
				);
				jQuery( '#scroll' ).on(
					'click',
					function (e) {
						e.preventDefault();
						jQuery( 'html,body' ).animate(
							{
								scrollTop: 0
							},
							200
						);
					}
				);
			}
		}
	);

})( jQuery );
