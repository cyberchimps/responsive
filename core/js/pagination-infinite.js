/**
 * Infinite pagination on scroll
 *
 * @package RESPONSIVE
 */

(function ($) {

	var total          = parseInt( responsivePaginationInfinite.infinite_total ) || '',
		count          = parseInt( responsivePaginationInfinite.infinite_count ) || '',
		ajax_url       = responsivePaginationInfinite.ajax_url || '',
		infinite_nonce = responsivePaginationInfinite.infinite_nonce || '',

		pagination     = responsivePaginationInfinite.pagination || '',
		loadStatus     = true,
		infinite_event = responsivePaginationInfinite.infinite_scroll_event || '',
		loader         = jQuery( '.responsive-pagination-infinite .responsive-loader' );

	// Is 'infinite' pagination?
	if ( typeof pagination != '' && pagination == 'infinite' ) {

		var in_customizer = false;

		// check for wp.customize return boolean.
		if ( typeof wp !== 'undefined' ) {

			in_customizer = typeof wp.customize !== 'undefined' ? true : false;

			if ( in_customizer ) {
				return;
			}
		}

		if (	typeof infinite_event != '' ) {
			switch ( infinite_event ) {
				case 'click':
					$( '.responsive-load-more' ).click(
						function(event) {
							event.preventDefault();
							// For Click.
							if ( count != 'undefined' && count != '' && total != 'undefined' && total != '' ) {
								if ( count > total ) {
									return false;
								}
								NextloadPosts( count );
								count++;
							}
						}
					);

					break;

				case 'scroll':
					$( '.responsive-load-more' ).hide();

					if ( $( '#main-blog' ).find( 'div:last' ).length > 0 ) {
						var windowHeight50 = jQuery( window ).outerHeight() / 1.25;
						$( window ).scroll(
							function () {

								if ( ( $( window ).scrollTop() + windowHeight50 ) >= ( $( '#main-blog' ).find( 'div:last' ).offset().top ) ) {
									if (count > total) {
										return false;
									} else {
										if ( loadStatus == true ) {
											NextloadPosts( count );
											count++;
											loadStatus = false;
										}
									}
								}
							}
						);
					}

					break;
			}
		}

		/**
		 * Append Posts via AJAX
		 *
		 * Perform masonry operations.
		 */
		function NextloadPosts(pageNumber) {
			$( '.responsive-load-more' ).removeClass( '.active' ).hide();
			loader.show();

			var data = {
				action : 'responsive_pagination_infinite',
				page_no	: pageNumber,
				nonce: infinite_nonce,
				query_vars: responsivePaginationInfinite.query_vars,
			}
			$.post(
				ajax_url,
				data,
				function( data ) {

					var boxes = $( data );

					// Hide loader.
					loader.hide();
					$( '.responsive-load-more' ).addClass( 'active' ).show();

					// Add posts.
					$( '#primary #main-blog' ).append( boxes );

					var msg = responsivePaginationInfinite.no_more_post_message || '';

					// Display no more post message.
					if ( count > total ) {
						$( '.responsive-pagination-infinite' ).html( '<span class="responsive-load-more no-more active" style="display: inline-block;">' + msg + "</span>" );
					}

					// Complete the process.
					loadStatus = true;
				}
			);
		}
	}

})( jQuery );
